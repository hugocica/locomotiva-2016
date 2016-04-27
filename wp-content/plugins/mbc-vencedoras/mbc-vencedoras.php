<?php
/**
 * Plugin Name: MPE Brasil - Vencedoras
 * Description: Este plugin foi criado especificamente para a listagem de Vencedoras do MPE Brasil
 * Version: 1.0
 * Author: Grupoi9
 */

add_action( 'init', 'create_vencedoras_post_type' );
add_action( 'init', 'vencedoras_include_needed_files' );
add_action( 'init', 'register_vencedoras_sidebar' );
add_action( 'wp_footer', 'vencedoras_enqueue_scripts' );
add_action( 'pre_get_posts', 'vencedoras_custom_parse_request_tricksy' );
add_filter('single_template', 'vencedoras_set_single_template_for');
add_action( 'plugins_loaded', array( 'PageTemplateVencedoras', 'get_instance' ) );

function create_vencedoras_post_type() {
  register_taxonomy( 'vencedoras_cat', 'vencedoras', 
    array(
        'labels' => array(
            'name' => __( 'Categoria Vencedoras' ),
            'search_items' =>  __( 'Procurar Categoria de Vencedoras' ),
            'all_items' => __( 'Categorias de Vencedoras' ),
            'parent_item' => __( 'Pai Categoria Vencedoras' ),
            'parent_item_colon' => __( 'Pai Categoria Vencedoras:' ),
            'edit_item' => __( 'Editar Categoria Vencedoras' ),
            'update_item' => __( 'Atualizar Categoria Vencedoras' ),
            'add_new_item' => __( 'Adicionar nova Categoria Vencedoras' ),
            'new_item_name' => __( 'Nova nome de Categoria Vencedoras' ),
            'menu_name' => __( 'Categoria Vencedoras' ),
            ),
        'show_ui' =>  true,
        'public'  =>  true,
        'hierarchical' => true,
        'rewrite' => array(
            'slug' => 'vencedoras/category', // This controls the base slug that will display before each term
            'with_front' => false, // Don't display the category base before "/locations/"
            'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
        ),
    ) );

  register_post_type( 'vencedoras',
    array(
        'labels' => array(
            'name' => __( 'Vencedoras' ),
            'singular_name' => __( 'Vencedoras' ) 
            ),
        'taxonomies' => array('vencedoras_tags', 'vencedoras_cat'),
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-awards',
        'rewrite' => array(
            'slug' => 'vencedoras', 
            'with_front' => false
            ),
        // 'rewrite' => array('slug' => ''),
        // 'rewrite' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'comments',
            'revisions',
            'thumbnail',
            'author') )
  );

  // register_taxonomy_for_object_type('post_tag', 'gabc-vagas');
}

function register_vencedoras_sidebar() {
  $args = array(
              'name'          => 'Vencedoras Sidebar',
              'id'            => 'vencedoras-sidebar',
              'before_widget' => '<aside id="%1$s" class="widget %2$s">',
              'after_widget'  => '</aside>',
              'before_title'  => '<h2 class="widget-title">',
              'after_title'   => '</h2>'
          );

  register_sidebar($args);
}

function vencedoras_include_needed_files() {
  include (dirname(__FILE__).'/metaboxes/vencedoras-spec.php');
}

function vencedoras_enqueue_scripts() {

  // including JS files
   wp_enqueue_script('functions_vencedoras', plugins_url( '/js/functions.js', __FILE__ ));
  wp_register_script('script_ajax_vencedoras', plugins_url( '/js/ajx-script.js', __FILE__ ), 'jquery', TRUE);
  wp_localize_script( 'script_ajax_vencedoras', 'VencedorasAjax', array('ajaxurl' => admin_url('admin-ajax.php')) );
  wp_enqueue_script( 'script_ajax_vencedoras' );

  // including CSS files
  wp_register_style('vencedoras_style', plugins_url( '/css/vencedoras_style.css', __FILE__ ));
  wp_enqueue_style('vencedoras_style', plugins_url( '/css/vencedoras_style.css', __FILE__ ));
  wp_register_style('vencedoras_responsivo', plugins_url( '/css/vencedoras_responsivo.css', __FILE__ ));
  wp_enqueue_style('vencedoras_responsivo', plugins_url( '/css/vencedoras_responsivo.css', __FILE__ ));
}

function vencedoras_set_single_template_for($single) {
    global $wp_query, $post;

    // Busca por post-types
    if ($post->post_type == "vencedoras"){
        if(file_exists(dirname(__FILE__). '/single-vencedoras.php'))
            return dirname(__FILE__) . '/single-vencedoras.php';
    }
    return $single;
}

/**
 * Some hackery to have WordPress match postname to any of our public post types
 * All of our public post types can have /post-name/ as the slug, so they better be unique across all posts
 * Typically core only accounts for posts and pages where the slug is /post-name/
 */
function vencedoras_custom_parse_request_tricksy( $query ) {

    // Only noop the main query
    if ( ! $query->is_main_query() )
        return;

    // Only noop our very specific rewrite rule match
    if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }

    // 'name' will be set if post permalinks are just post_name, otherwise the page rule will match
    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'post', 'vencedoras', 'page' ) );
    }
}

class PageTemplateVencedoras {

		/**
         * A Unique Identifier
         */
		 protected $plugin_slug;

        /**
         * A reference to an instance of this class.
         */
        private static $instance;

        /**
         * The array of templates that this plugin tracks.
         */
        protected $templates;


        /**
         * Returns an instance of this class. 
         */
        public static function get_instance() {

                if( null == self::$instance ) {
                        self::$instance = new PageTemplateVencedoras();
                } 

                return self::$instance;

        } 

        /**
         * Initializes the plugin by setting filters and administration functions.
         */
        private function __construct() {

                $this->templates = array();


                // Add a filter to the attributes metabox to inject template into the cache.
                add_filter(
					'page_attributes_dropdown_pages_args',
					 array( $this, 'register_project_templates' ) 
				);


                // Add a filter to the save post to inject out template into the page cache
                add_filter(
					'wp_insert_post_data', 
					array( $this, 'register_project_templates' ) 
				);


                // Add a filter to the template include to determine if the page has our 
				// template assigned and return it's path
                add_filter(
					'template_include', 
					array( $this, 'view_project_template') 
				);


                // Add your templates to this array.
                $this->templates = array(
                        'template-mbc-vencedoras.php'     => 'Vencedoras',
                );
				
        } 


        /**
         * Adds our template to the pages cache in order to trick WordPress
         * into thinking the template file exists where it doens't really exist.
         *
         */

        public function register_project_templates( $atts ) {

                // Create the key used for the themes cache
                $cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );

                // Retrieve the cache list. 
				// If it doesn't exist, or it's empty prepare an array
                $templates = wp_get_theme()->get_page_templates();
                if ( empty( $templates ) ) {
                        $templates = array();
                } 

                // New cache, therefore remove the old one
                wp_cache_delete( $cache_key , 'themes');

                // Now add our template to the list of templates by merging our templates
                // with the existing templates array from the cache.
                $templates = array_merge( $templates, $this->templates );

                // Add the modified cache to allow WordPress to pick it up for listing
                // available templates
                wp_cache_add( $cache_key, $templates, 'themes', 1800 );

                return $atts;

        } 

        /**
         * Checks if the template is assigned to the page
         */
        public function view_project_template( $template ) {

                global $post;

                if (!isset($this->templates[get_post_meta( 
					$post->ID, '_wp_page_template', true 
				)] ) ) {
					
                        return $template;
						
                } 

                $file = plugin_dir_path(__FILE__). get_post_meta( 
					$post->ID, '_wp_page_template', true 
				);
				
                // Just to be safe, we check if the file exist first
                if( file_exists( $file ) ) {
                        return $file;
                } 
				else { echo $file; }

                return $template;

        } 


} 

// Creating the widget 
class vencedoras_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            // Base ID of your widget
            'vencedoras_widget', 

            // Widget name will appear in UI
            __('Vencedoras: filtros', 'wpb_widget_domain'), 

            // Widget description
            array( 'description' => __( 'Filtros para página de listagem das empresas vencedoras' ), ) 
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $mid = $instance['casos_id'];
        // before and after widget arguments are defined by themes
        echo $args['before_widget'];

        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];

        $output = '';
        $output .= '<h2 class="filter-title">Estados</h2>';
        $output .= '<select id="filter-estados">
                      <option value="all">Todos</option>
                      <option value="nacional">Nacional</option>
                      <option value="AC">Acre</option>
                      <option value="AL">Alagoas</option>
                      <option value="AP">Amapá</option>
                      <option value="AM">Amazonas</option>
                      <option value="BA">Bahia</option>
                      <option value="CE">Ceará</option>
                      <option value="DF">Distrito Federal</option>
                      <option value="ES">Espírito Santo</option>
                      <option value="GO">Goiás</option>
                      <option value="MA">Maranhão</option>
                      <option value="MT">Mato Grosso</option>
                      <option value="MS">Mato Grosso do Sul</option>
                      <option value="MG">Minas Gerais</option>
                      <option value="PA">Pará</option>
                      <option value="PB">Paraiba</option>
                      <option value="PR">Paraná</option>
                      <option value="PE">Pernambuco</option>
                      <option value="PI">Piauí</option>
                      <option value="RJ">Rio de Janeiro</option>
                      <option value="RN">Rio Grande do Norte</option>
                      <option value="RS">Rio Grande do Sul</option>
                      <option value="RO">Rondônia</option>
                      <option value="RR">Roraima</option>
                      <option value="SC">Santa Catarina</option>
                      <option value="SP">São Paulo</option>
                      <option value="SE">Sergipe</option>
                      <option value="TO">Tocantins</option>
                    </select>';

        $output .= '<h2 class="filter-title">Categorias</h2>';
        $output .=  '<select id="filter-categorias">
                      <option value="all">Todas</option>';
        $categories = get_terms('vencedoras_cat');
        foreach ($categories as $cat) {
          $output .= '<option value="'.$cat->slug.'">'.$cat->name.'</option>';
        }

        $output .=  '</select>';

        $output .= '<h2 class="filter-title">Ciclo</h2>';
        $output .=  '<select id="filter-ciclo">
                        <option value="all">Todos</option>';
        $args = array(
                    'post_type'         =>  'vencedoras',
                    'posts_per_page'    =>  -1,
                    'meta_key'          =>  '_vencedoras_ciclo_metabox',
                    'orderby'           =>  'winner_year',
                    'order'             =>  'ASC',
                );

        $ciclo = new WP_Query($args);
        $ciclo_array = array();

        if( $ciclo->have_posts() ) {
    
            while ($ciclo->have_posts()) : $ciclo->the_post();

                $ciclo_meta = get_post_meta(get_the_id(), '_vencedoras_ciclo_metabox', true);

                if (!empty($ciclo_meta['winner_year'])) {
                  if (!in_array($ciclo_meta['winner_year'], $ciclo_array)) {
                    array_push($ciclo_array, $ciclo_meta['winner_year']);
                  }
                }
            endwhile;
            wp_reset_postdata();
        }

        sort($ciclo_array);
        foreach ($ciclo_array as $ciclo) {
          $output .= '<option value="'.$ciclo.'">'.$ciclo.'</option>';
        }
        $output .=  '</select>';

        $output .= '<button class="btn-vencedoras-filters">Aplicar filtros</button>';
        echo $output;
        // This is where you run the code and display the output
        
        echo $args['after_widget'];
    }
        
    // Widget Backend 
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        } else {
            $title = __( 'New title', 'wpb_widget_domain' );
        }
        if ( isset( $instance['casos_id'] ) )
            $mid = $instance['casos_id']
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <?php 
    }
      
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['casos_id'] = $new_instance['casos_id'];
        return $instance;
    }
}

// Register and load the widget
function wpb_load_widget_vencedoras() {
  register_widget( 'vencedoras_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget_vencedoras' );



/************ AJAX CALL ***************/
add_action("wp_ajax_filter_vencedoras", "filter_vencedoras");
add_action("wp_ajax_nopriv_filter_vencedoras", "filter_vencedoras");

function filter_vencedoras() {
  $estado = $_POST['estado'];
  $categoria = $_POST['categoria'];
  $ciclo = $_POST['ciclo'];
  $page = $_POST['page'];
  $per_page = 10;
  // $per_page = get_option('posts_per_page');

  if (empty($page))
        $page = 1;

   $args = array(
          'post_type'     =>  'vencedoras',
          'post_status'   =>  'publish',
          'meta_query'    =>  array(
                        'relation' => 'OR',
                        'national_clause' => array(
                          'key'     =>  '_vencedoras_nacional_metabox',
                          'compare'   =>  'EXISTS'
                        ),
                        'ciclo_clause' => array(
                          'key'     =>  '_vencedoras_ciclo_metabox',
                          'value'   =>  'winner_year',
                          'compare' =>  'LIKE'
                        ),
                      ),
          'orderby'     =>  array(
                        'ciclo_clause'  => 'DESC',
                        'national_clause' => 'ASC',
                      ),
          'posts_per_page'  =>  $per_page,
          'paged'       =>  $page
        );

    if ($categoria != 'all')
        $args['tax_query'] = array(
                                array(
                                    'taxonomy' => 'vencedoras_cat',
                                    'field'    => 'slug',
                                    'terms'    => $categoria,
                                )
                            );

    if ($estado != 'all' || $ciclo != 'all') {
        $args['meta_query'] = array(
                                'relation'  =>  'AND',
                            );
        $args['orderby'] = 'meta_value';
          // $args['meta_key'] = '_vencedoras_nacional_metabox';

        if ($estado != 'all') {
          if ($estado == 'nacional') {
            $args['meta_query']['national_clause'] = array(
                                                'key' =>  '_vencedoras_nacional_metabox',
                                                'compare' =>  'EXISTS'
                                            );
          }
          else
            array_push($args['meta_query'], array(
                                                'key' =>  '_vencedoras_config_metabox',
                                                'value' =>  serialize(strval($estado)),
                                                'compare' =>  'LIKE'
                                            ));
        }

        if ($ciclo != 'all') {
          $args['meta_query']['ciclo_clause'] = array(
                                                'key' =>  '_vencedoras_ciclo_metabox',
                                                'value' =>  $ciclo,
                                                'compare' =>  'LIKE'
                                              );
        } else
          $args['meta_query']['ciclo_clause'] = array(
                                                'key'     =>  '_vencedoras_ciclo_metabox',
                                                'value'   =>  serialize(strval('winner_year')),
                                                'compare' =>  'LIKE'
                                              );

    }


    // var_dump($args);
    display_winners($args);
}

function display_winners($args) {
    global $wp_query;
    $wp_query = new WP_Query($args);

    if( $wp_query->have_posts() ) {
    
        while ($wp_query->have_posts()) : $wp_query->the_post();
            $thumbsize = isset($thumbsize)? $thumbsize : 'thumbnails-post';
            $vencedoras_meta = get_post_meta( get_the_id(), '_vencedoras_config_metabox', TRUE );
            $vencedora_nacional = get_post_meta( get_the_id(), '_vencedoras_nacional_metabox', TRUE );
            $vencedora_ciclo = get_post_meta( get_the_id(), '_vencedoras_ciclo_metabox', TRUE );
        ?>
        <article class="post vencedoras-item col-md-12 col-sm-12">
              
          <div class="entry-content vencedoras-content col-md-5 col-sm-5 vcenter">
            <div class="vencedora-height-support"></div>
              <?php
                if ($vencedora_nacional['is_nacional'] == 'Sim') {
                  if ( has_post_thumbnail() ) {
                  ?>
                      <figure class="entry-thumb thumb-vencedoras">
                            <?php the_post_thumbnail( $thumbsize );?>
                          <!-- vote    -->
                          <?php do_action('wpo_rating') ?>
                           <div class="category-highlight hidden">
                              <?php echo trim($post_category); ?>
                          </div>
                      </figure>
                  <?php }
                }
                  if (get_the_title()) {
                  ?>
                    <div class="vencedora-content-meta <?php echo ($vencedora_nacional['is_nacional'] == 'Sim')?'has_logo':''; ?>">
                        <h2 class="entry-title vencedoras-title">
                            <?php the_title(); ?>
                        </h2>
                        <p class="vencedora-category">
                        <?php 
                          $categories = get_the_terms(get_the_id(), 'vencedoras_cat');
                          $cat_count = 0;
                          if (!empty($categories)) {
                            foreach ($categories as $cat) {
                              if ($cat_count != 0)
                                echo '<span class="separator">&#8226;</span>';

                              $category = $cat->name;
                              echo $cat->name;
                              $cat_count++;
                            }
                          }
                        ?>
                        </p>
                      </div>
                  <?php
              }
              ?>
          </div>
          <?php 
            $vencedora_meta = get_post_meta(get_the_id(), '_vencedoras_config_metabox', true); 
          ?>
          <div class="vencedora-local col-md-4 col-sm-4 vcenter">
            <div class="vencedora-height-support"></div>
            <div class="vencedora-local-content">
              <?php echo $vencedora_meta['cidade']; ?>
              <span>(<?php echo $vencedora_meta['estado']; ?>)</span>
            </div>
          </div>
          
          <div class="vencedora-premio-container col-md-3 col-sm-3 vcenter">
            <?php 
              if ($vencedora_nacional['is_nacional'] == 'Sim') { ?>
                <div class="vencedora-premio mb-15">
                  <div class="vencedora-premio-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/bandeiras/nacional.png">
                  </div>
                  <div class="vencedora-premio-meta">Vencedora nacional <span>(<?php echo $vencedora_ciclo['winner_year']; ?>)</span></div>
                </div>
              <?php } else {
                echo '<div class="vencedora-height-support"></div>';
              }
            ?>
            <div class="vencedora-premio">
              <div class="vencedora-premio-img">
                <img src="<?php echo get_template_directory_uri(); ?>/images/bandeiras/bandeira-<?php echo $vencedora_meta['estado']; ?>.png">
              </div>
              <div class="vencedora-premio-meta">Vencedora estadual <span>(<?php echo $vencedora_ciclo['winner_year']; ?>)</span></div>
            </div>
          </div>
          
          <div class="vencedora-mostrar-info col-md-12 col-sm-12 closed"><i class="fa fa-caret-down"></i></div>
          
          <div class="vencedora-info-container col-md-12 col-sm-12 closed">
            <div class="vencedora-details col-md-8 col-sm-8">
              <p><strong>Razão Social: </strong><?php echo $vencedora_meta['razao_social']; ?></p>
              <p><strong>CNPJ: </strong><?php echo $vencedora_meta['cnpj']; ?></p>
              <p><strong>Website: </strong><?php echo $vencedora_meta['website']; ?></p>
            </div>
            <div class="premio-details col-md-4 col-sm-4">
              <p><strong>Prêmios MPE Brasil:</strong></p>
              <ul>
              <?php if ($vencedora_nacional['is_nacional'] == 'Sim') { ?>
              <li><?php echo $vencedora_ciclo['winner_year']; ?>: Etapa Nacional - <?php echo $category; ?></li>
              <?php } ?>
                <li><?php echo $vencedora_ciclo['winner_year']; ?>: Etapa Estadual (<?php echo $vencedora_meta['estado']; ?>) - <?php echo $category; ?></li>
              </ul>
            </div>
          </div>
      </article> <?php
    endwhile; ?>
    <?php wpo_pagination_nav( $per_page, $wp_query->found_posts, $wp_query->max_num_pages ); ?>
    <?php wp_reset_postdata(); ?>
    <?php 
    } else { ?>          
        <div class="entry-content vencedoras-content no-results col-md-12">
            <h2 class="section-title vencedoras">Nenhum resultado foi encontrado.</h2>
        </div>
      <?php
    }

    die();
}
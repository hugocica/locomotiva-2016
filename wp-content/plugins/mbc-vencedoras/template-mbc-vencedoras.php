<?php 
	/* 
		Template Name: Vencedoras
	*/ 
?>

<?php //get_header(); ?>

<?php
global $wpopconfig;
// Get Page Config
$wpopconfig = $wpoEngine->wpo_getPageConfig();
$_SESSION['get_search'] = 'vencedoras';
?>

<?php get_header( $wpoEngine->wpo_getHeaderLayout() );  ?>

 <?php 
 	if( isset($wpopconfig['breadcrumb']) && $wpopconfig['breadcrumb'] ){
    do_action( 'wpo_layout_breadcrumbs_render' ); 
  } 
?>  

	<div class="mobile-sidebar closed">
		<i class="fa fa-filter"></i><span>FILTROS</span>
	</div>

<?php do_action( 'wpo_layout_template_before' ) ; ?>

	<?php 
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$per_page = get_post_meta( get_the_id(), '_per_page_metabox', true );

		if (empty($per_page['posts_per_page']) || $per_page['posts_per_page'] == 0) 
			$per_page['posts_per_page'] = get_option('posts_per_page');

		$per_page['posts_per_page'] = 10;
		$post_per_page = $per_page['posts_per_page'];
	?>

	<div class="vencedoras-header">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</div>

	<?php /*
	<div class="vencedoras-column-name clearfix">
		<div class="col-md-7">
			<p>Nome</p>
		</div>
		<div class="col-md-3">
			<p>Cidade</p>
		</div>
		<div class="col-md-2">
			<p>Estado</p>
		</div>
	</div>
	*/ ?>

	<div class="container-vencedoras clearfix" data-per-page="<?php echo $post_per_page; ?>">
		<?php
			$args = array(
					'post_type' 		=> 	'vencedoras',
					'post_status'		=> 	'publish',
					'meta_query'		=>	array(
												'relation' => 'OR',
												'national_clause' => array(
													'key' 		=>  '_vencedoras_nacional_metabox',
	                                                'compare' 	=>  'EXISTS'
												),
												'ciclo_clause' => array(
													'key' 		=>  '_vencedoras_ciclo_metabox',
													'value'		=>	'winner_year',
													'compare'	=>	'LIKE'
												),
											),
					'orderby'			=> 	array(
												'ciclo_clause'	=> 'DESC',
												'national_clause' => 'ASC',
											),
					'posts_per_page'	=>	$post_per_page,
					'paged'				=> 	$paged
				);

			global $wp_query;
			$wp_query = new WP_Query( $args );

			if ( $wp_query->have_posts() ) :
				while ($wp_query->have_posts()) : $wp_query->the_post();
					include dirname(__FILE__) . '/contents-vencedora.php';
				endwhile; ?>
    			<?php wpo_pagination_nav( $post_per_page, $wp_query->found_posts, $wp_query->max_num_pages ); ?>
    			<?php wp_reset_postdata(); ?>
    			<?php
    		else: ?>
        		<article class="post vencedoras-item col-md-12 col-sm-12">
            
		            <div class="entry-content vencedoras-content col-md-12">
		                <h2 class="no-results">Nenhum resultado foi encontrado.</h2>
		            </div>
		        </article> <?php
			endif;
		?>
	</div>
	<div id="top-nacional" data-nacional="<?php echo implode(',', $nacional_arr); ?>" style="display: none;"></div>

 <?php do_action( 'wpo_layout_template_after' ) ; ?>

<script>
	jQuery(document).ready(function($) {

		if ($(window).width() < 1024) {
			$('.mobile-sidebar').click(function() {
				if ($(this).hasClass('closed')) {
					$(this).removeClass('closed').addClass('opened').children('span').text('ESCONDER FILTROS');
					$('.wpo-sidebar').slideDown('400', function() {
						$('.fa-filter').addClass('active');
					});
				} else {
					$(this).removeClass('opened').addClass('closed').children('span').text('MOSTRAR FILTROS');
					$('.wpo-sidebar').slideUp('400', function() {
						$('.fa-filter').removeClass('active');
					});
				}
			});
		}

		$('.vencedoras-item').each(function() {
			var maior_altura = 0;

			if ($(this).children('.vencedoras-content').height() > maior_altura)
				maior_altura = $(this).children('.vencedoras-content').height();
			if ($(this).children('.vencedora-local').height() > maior_altura)
				maior_altura = $(this).children('.vencedora-local').height();
			if ($(this).children('.vencedora-premio-container').height() > maior_altura)
				maior_altura = $(this).children('.vencedora-premio-container').height();

			$(this).children('.vencedoras-content').height(maior_altura);
			$(this).children('.vencedora-local').height(maior_altura);
			$(this).children('.vencedora-premio-container').height(maior_altura);
		});
	});
</script>

<?php get_footer(); ?>
<?php 
global $wpopconfig;
$wpopconfig = array( 
				"breadcrumb"	=> true,
				"page_layout"	=> "mainright",
				"right-sidebar"	=> array( 
										"widget"	=> "left-sidebar",
										"show"	=> true,
										"class"	=> "col-xs-12 col-md-3" 
									),
				"left-sidebar"	=> array( 
										"widget"	=> "sidebar-default",
										"show"	=> false 
									),
				"main"	=> array( 
					"class"	=> "col-xs-12 col-md-9 no-sidebar-left" 
				),
			);

$_SESSION['custom_search'] = 'vencedoras';
?>

<?php get_header( wpo_theme_options('headerlayout', '') ); ?>

<?php do_action( 'wpo_layout_breadcrumbs_render' ); ?>  

<?php do_action( 'wpo_layout_template_before' ) ; ?>


<div class="post-area single-blog">
<?php while ( have_posts() ) : the_post(); ?>
	
	<?php 
		$pid = get_the_ID(); 
	?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-thumb entry-thumb-winner col-md-3">
                    <?php get_template_part( 'templates/content/content', get_post_format() ); ?> 
                </div>    

                <?php if(is_single() ) { ?>
                    <div class="post-container col-md-9">
                        <header class="entry-header col-md-12">
                        <?php if( wpo_theme_options('blog_show-title', true) ){ ?>   
                            <div class="entry-name">
                                <h2 class="entry-title section-title"> <?php the_title(); ?> </h2>
                            </div>    
                        <?php } ?>
                        </header><!-- .entry-header -->

                        <div class="winner-meta col-md-12">
                            <?php 
                                $winner_meta = get_post_meta(get_the_id(), '_vencedoras_config_metabox', true);

                                if (!empty($winner_meta['razao_social'])) { ?>
                                    <div class="winner-razao"><p><strong>Razão Social:</strong> <?php echo $winner_meta['razao_social']; ?></p></div>
                                <?php }
                                if (!empty($winner_meta['cnpj'])) { ?>
                                    <div class="winner-cnpj"><p><strong>CNPJ:</strong> <?php echo $winner_meta['cnpj']; ?></p></div>
                                <?php }
                                if (!empty($winner_meta['cidade'])) { ?>
                                    <div class="winner-cidade"><p><strong>Cidade:</strong> <?php echo $winner_meta['cidade']; ?></p></div>
                                <?php }
                                if (!empty($winner_meta['estado'])) { ?>
                                    <div class="winner-estado"><p><strong>Estado:</strong> <?php echo $winner_meta['estado']; ?></p></div>
                                <?php }
                                if (!empty($winner_meta['winner_year'])) { ?>
                                    <div class="winner-year"><p><strong>Ano da premiação:</strong> <?php echo $winner_meta['winner_year']; ?></p></div>
                                <?php }
                            ?>
                        </div><!-- .entry-meta -->
                        <div class="entry-content col-md-12">
                            <?php
                                the_content();
                            ?>
                        </div><!-- .entry-content -->
                        
                     </div>
                    <?php } ?>
            </article>    
   




<?php endwhile; // end of the loop. ?>
</div>
<?php /*
<section id="entry-author" class="ht-grid">

<div class="ht-grid-6 ht-grid-col ea-avatar">
	<div class="avatar" style="background-image: url('https://unsplash.imgix.net/34/iSGu85T8TXS9zXJ20iBU__MG_9585.JPG?q=75&fm=jpg&auto=format&s=94ae99758794654f46349cd896b18fe1');"></div>
</div>
<div class="ht-grid-6 ht-grid-col ea-info">
<h4 class="ea-name">
		<a class="ea-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php echo get_the_author(); ?></a>
	</h4>
	<div class="ea-desc">
		<?php the_author_meta('description'); ?>
	</div>
	<a class="ea-more" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php _e( "More articles by", "ht-theme" ); ?> <?php the_author_meta( 'first_name' ); ?></a>
</div>
</section>
*/?>

<?php do_action( 'wpo_layout_template_after' ) ; ?>


</main>
<!-- #content -->

</div>
<!-- /#primary -->

<script>
	jQuery(document).ready(function($) {
		if ($(window).width() > 769) {
			var defaultHeight = $('#white-container').height();
			$('#red-container').height(defaultHeight + 70);
		}

		jQuery(window).on('orientationchange', function() {
			if ($(window).width() > 769) {
				var defaultHeight = $('#white-container').height();
				$('#red-container').height(defaultHeight + 120);
			} else{
				$('#red-container').height('');
			}
		});
	});
</script>

<?php get_footer(); ?>
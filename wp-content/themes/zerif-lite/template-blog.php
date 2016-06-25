<?php
/**
 * Template Name: Blog
 */
get_header(); ?>
<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->

<div id="content" class="site-content">

	<div class="container">

		<div class="content-left-wrap col-md-12 padding-left-0 padding-right-0">

			<div id="primary" class="content-area">

				<main id="main" class="site-main" role="main">
					<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$posts_per_page = 2;

					$not_in = array();
					$args = array(
								'post_type' => 'post',
								// 'showposts' => '8',
								'posts_per_page' => $posts_per_page,
								'paged' => $paged
							);

					$wp_query = new WP_Query( $args );

					if( $wp_query->have_posts() ): ?>
						<div class="grid"> <?php
						while ($wp_query->have_posts()) : $wp_query->the_post();

							array_push( $not_in, get_the_ID() );
							get_template_part( 'content', get_post_format() );

						endwhile; ?>
						</div> <?php
						echo do_shortcode('[ajax_load_more post_type="post" repeater="default" posts_per_page="'.$posts_per_page.'" exclude="'. implode(',', $not_in) .'" transition="fade" pause="true" scroll="false" button_label="Carregar Mais"]');
						wp_reset_postdata();
					endif;
					?>
				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .content-left-wrap -->

	</div><!-- .container -->
<?php get_footer(); ?>

<?php
/**
 * The template for displaying Search Results pages.
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
					$not_in = array();
				?>

				<?php if ( have_posts() ) : ?>

					<header class="page-header">

						<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'zerif-lite' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

					</header><!-- .page-header -->

					<div class="grid"> <?php
					while ( have_posts() ) : the_post();

						array_push( $not_in, get_the_ID() );
						get_template_part( 'content', get_post_format() );

					endwhile; ?>
					</div> <?php

					//zerif_paging_nav();
					echo do_shortcode('[ajax_load_more post_type="post" repeater="default" posts_per_page="'.$posts_per_page.'" exclude="'. implode(',', $not_in) .'" transition="fade" pause="true" scroll="false" button_label="Carregar Mais"]');


				else : ?>

					<?php get_template_part( 'content', 'none' ); ?>

				<?php endif; ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .content-left-wrap -->

		<?php /*
		<div class="sidebar-wrap col-md-3 content-left-wrap">

			<?php get_sidebar(); ?>

		</div><!-- .sidebar-wrap -->
		*/ ?>

	</div><!-- .container -->

<?php get_footer(); ?>

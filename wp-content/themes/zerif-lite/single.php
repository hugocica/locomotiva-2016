<?php
/**
 * The Template for displaying all single posts.
 */
get_header(); ?>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-573147d818da4746"></script>


<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->

<div id="content" class="site-content">
	<div class="content-left-wrap col-md-12" style="padding-top:0;">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post();

				get_template_part( 'content', 'single' );

				?>
				<div class="container conteudo-interno">
					<div class="single-section-title">
						<h2>Comentários</h2>
						<span class="line-divider">
					</div>
			 	<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template('');
					endif;
				?>
				</div>
				<?php
			endwhile; // end of the loop. ?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
<?php get_footer(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('grid-item'); ?>>

	<?php //if ( ! is_search() ) : ?>

		<?php if ( has_post_thumbnail()) : ?>

		<div class="post-img-wrap">

			 	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >

				<?php the_post_thumbnail("full"); ?>

				</a>

		</div>

		<div class="listpost-content-wrap">

		<?php else: ?>

		<div class="listpost-content-wrap-full">

		<?php endif; ?>

	<?php /* else:  ?>

			<div class="listpost-content-wrap-full">

	<?php endif; */ ?>

	<div class="list-post-top">

	<header class="entry-header">

		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

	</header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>

	<div class="entry-summary">

		<?php the_excerpt(); ?>

	<?php else : ?>

	<div class="entry-content">

		<?php

			the_excerpt();

			wp_link_pages( array(

				'before' => '<div class="page-links">' . __( 'Pages:', 'zerif-lite' ),

				'after'  => '</div>',

			) );

		endif; ?>

		<div class="read-more-wrapper">
			<a class="read-more-btn" href="<?php echo the_permalink(); ?>">Leia mais</a>
		</div>

	</div><!-- .entry-content --><!-- .entry-summary -->

	<footer class="entry-footer">
		<div class="author-pic">
			<?php echo get_avatar($post->post_author, 54); ?>
		</div>
		<div class="author-meta">
			<h4 class="author-name"><?php echo get_the_author(); ?></h4>
		</div>
	</footer><!-- .entry-footer -->

	</div><!-- .list-post-top -->

</div><!-- .listpost-content-wrap -->

</article><!-- #post-## -->

<?php
/**
 * Template Name: Institucional
 */
?>

<?php get_header(); ?>

<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->

<div id="content" class="site-content institucional">

	<?php 
		if (have_posts()) :
			while (have_posts()) : the_post();
				the_content(); 
			endwhile;
		endif;
	?>

<?php get_footer(); ?>
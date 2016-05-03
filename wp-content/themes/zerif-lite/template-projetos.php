<?php
/**
 * Template Name: Empresa
 */
?>

<?php get_header(); ?>

<?php
	$projetos = get_post_meta( get_the_ID(), '_projetos_metabox', true );
	$destaque_config = get_post_meta( get_the_ID(), '_destaque_metabox', true );
?>

<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->

<div id="content" class="site-content empresa">

<?php
	$thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
	<div class="destaque-image projetos" style="background-image: url(<?php echo $thumb; ?>);">
		<div class="container">
			<div class="destaque-texto col-md-7 padding-left-0">
				<?php if ( !empty($destaque_config['frase_destaque']) ) { ?>
					<blockquote><?php echo $destaque_config['frase_destaque']; ?></blockquote>
				<?php } ?>

				<?php if ( !empty($destaque_config['texto_destaque']) ) { ?>
					<p><?php echo $destaque_config['texto_destaque']; ?></p>
				<?php } ?>
			</div>
			<div class="destaque-logo col-md-5 padding-right-0">
				<?php if ( !empty($destaque_config['foto_destaque']) ) { ?>
				<figure>
					<img src="<?php echo $destaque_config['foto_destaque']; ?>" alt="logo transparente">
				</figure>
				<?php } ?>
			</div>
		</div>
	</div>

	<div class="container">
		<?php
		/*
		if (have_posts()) :
			while (have_posts()) : the_post();
				the_content();
			endwhile;
		endif;
		*/
		?>

		<div class="projects-list-container clearfix">
			<?php
				if ( $projetos['show'] == 'Sim' ) { ?>
					<h2 class="section-title"><span>Conheça nossos</span>Projetos</h2>
			<?php
				}
			?>
		</div>

	</div>

	<script>
		jQuery(document).ready(function($) {
		});
	</script>

<?php get_footer(); ?>

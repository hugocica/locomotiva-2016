<?php
/**
 * Template Name: Projetos
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

					<div class="project-list">
						<?php if ( !empty($projetos['projetos']) ) {
							$flag_row = true;
							foreach ($projetos['projetos'] as $projeto): ?>
								<div class="projeto-item <?php echo ($flag_row)?'row-even':'row-odd'; ?> clearfix">
									<div class="projeto-img col-md-6 <?php echo ($flag_row)?'':'pull-right'; ?>" style="background-image: url(<?php echo $projeto['photo']; ?>)"></div>
									<div class="projeto-meta col-md-6 <?php echo ($flag_row)?'img-left':'img-right'; ?>">
										<?php if ( !empty($projeto['titulo']) ) { ?>
											<h3><?php echo $projeto['titulo']; ?></h3>
										<?php } ?>
										<?php if ( !empty($projeto['descricao']) ) { ?>
											<p><?php echo $projeto['descricao']; ?></p>
										<?php } ?>
										<?php if ( !empty($projeto['link']) ) { ?>
											<a target="_blank" href="<?php echo $projeto['link']; ?>">Link para o projeto</a>
										<?php } ?>
									</div>
								</div>
							<?php $flag_row = !$flag_row;
							endforeach;
						} ?>
					</div>
			<?php } ?>
		</div>

	</div>

	<script>
		jQuery(document).ready(function($) {
			$('.projeto-item').each(function() {
				$(this).children('.projeto-img').height($(this).children('.projeto-meta').outerHeight());
			});
		});
	</script>

<?php get_footer(); ?>

<?php
/**
 * Template Name: Contato
 */
?>

<?php get_header(); ?>

<?php
	$locomodivos_config = get_post_meta( get_the_ID(), '_locomodivos_metabox', true );
	$destaque_config = get_post_meta( get_the_ID(), '_empresa_metabox', true );
?>

<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->

<div id="content" class="site-content empresa">

<?php
	$thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
	<div class="mapa">

	</div>
    
	<div class="container">
		<?php
		if (have_posts()) :
			while (have_posts()) : the_post();
				the_content();
			endwhile;
		endif;
	?>

	<div class="members-list-container clearfix">
		<?php
			if ($locomodivos_config['show'] == 'Sim') { ?>
				<h2 class="section-title"><span>Conheça nossos</span>Membros</h2>
			<?php
				$aux_padding = 0;
				sort($locomodivos_config['locodivos']);
				foreach ($locomodivos_config['locodivos'] as $locomodivo) {
					?>
					<div class="locomodivo col-md-3">
						<figure class="locomodivo-pic" style="background-image: url(<?php echo $locomodivo['photo']; ?>);" data-normal="<?php echo $locomodivo['photo']; ?>" data-hover="<?php echo $locomodivo['photo_hover']; ?>">
						</figure>
						<div class="locomodivo-content">
							<h3><?php echo $locomodivo['nome']; ?></h3>
							<p><?php echo $locomodivo['cargo']; ?></p>
						</div>
					</div>
				<?php $aux_padding++;
				}
			}
		?>
		</div>

	</div>

	<script>
		jQuery(document).ready(function($) {
			$('.locomodivo-pic').on({
				mouseenter: function() {
					console.log($(this).data('hover'));
					$(this).css('background-image', 'url('+$(this).data('hover')+')');
				},
				mouseleave: function() {
					console.log('saiu');
					$(this).css('background-image', 'url('+$(this).data('normal')+')');
				}
			});
		});
	</script>

<?php get_footer(); ?>

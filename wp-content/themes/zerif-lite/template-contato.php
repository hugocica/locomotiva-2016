<?php
/**
 * Template Name: Contato
 */
?>

<?php get_header(); ?>

<?php
	$contato_config = get_post_meta( get_the_ID(), '_contato_config_metabox', true );
	$location = explode(',', $contato_config['google_maps']);
?>

<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->

<div id="content" class="site-content empresa">

	<div id="mapa" style="height: 340px;"></div>

	<div class="container">
		<?php
		if (have_posts()) :
			while (have_posts()) : the_post();
				the_content();
			endwhile;
		endif;
		?>

		<div class="contato-container clearfix">
			<div class="contato-info col-md-6">
				<h2 class="section-title"><span>Dados de</span>Contato</h2>
				<?php if ( !empty($contato_config['contato_endereco']) ) ?>
					<div class="contato-info-endereco contato-info-meta">
						<p><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $contato_config['contato_endereco']; ?></p>
					</div>
				<?php if ( !empty($contato_config['contato_email']) ) ?>
					<div class="contato-info-email contato-info-meta">
						<p><i class="fa fa-envelope" aria-hidden="true"></i><?php echo $contato_config['contato_email']; ?></p>
					</div>
				<?php if ( !empty($contato_config['contato_telefone']) ) ?>
					<div class="contato-info-telefone contato-info-meta">
						<p><i class="fa fa-phone" aria-hidden="true"></i><?php echo $contato_config['contato_telefone']; ?></p>
					</div>
				<?php if ( !empty($contato_config['contato_horario']) ) ?>
					<div class="contato-info-horario contato-info-meta">
						<p><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $contato_config['contato_horario']; ?></p>
					</div>
			</div>
			<div class="contato-form col-md-6">
				<?php if ( $contato_config['show_form'] == 'Sim' ) { ?>
				<?php } ?>
			</div>
		</div>

	</div>

	<script>
		function initMap() {
			var mapDiv = document.getElementById('mapa');
			var map = new google.maps.Map(mapDiv, {
				center: {
					lat: <?php echo $location[0]; ?>,
					lng: <?php echo $location[1]; ?>
				},
				zoom: 16,
				scrollwheel: false,
				mapTypeControl: false,
			});
			var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/';
			var marker = new google.maps.Marker({
				position: map.center,
				map: map,
			});
		}
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOdjfdmluXaFzlClwUTXMEvWOhWmMSxlI&callback=initMap" async defer></script>

<?php get_footer(); ?>

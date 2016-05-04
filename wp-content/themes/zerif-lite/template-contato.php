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
			</div>
			<div class="contato-form col-md-6"></div>
		</div>

	</div>

	<script>
		function initMap() {
			var mapDiv = document.getElementById('mapa');
			var map = new google.maps.Map(mapDiv, {
				center: {
					lat: -22.3395788,
					lng: -49.0491374
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

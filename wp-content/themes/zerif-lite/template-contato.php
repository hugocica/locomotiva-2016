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
				<h2 class="section-title"><span>Entre em</span>Contato</h2>
				<?php if ( !empty($contato_config['contato_endereco']) ) ?>
					<div class="contato-info-endereco contato-info-meta">
						<i class="fa fa-map-marker" aria-hidden="true"></i>
						<p><strong>Endereço:</strong> <?php echo $contato_config['contato_endereco']; ?></p>
					</div>
				<?php if ( !empty($contato_config['contato_email']) ) ?>
					<div class="contato-info-email contato-info-meta">
						<i class="fa fa-envelope" aria-hidden="true"></i>
						<p><strong>E-mail:</strong> <?php echo $contato_config['contato_email']; ?></p>
					</div>
				<?php if ( !empty($contato_config['contato_telefone']) ) ?>
					<div class="contato-info-telefone contato-info-meta">
						<i class="fa fa-phone" aria-hidden="true"></i>
						<p><strong>Telefone:</strong> <?php echo $contato_config['contato_telefone']; ?></p>
					</div>
				<?php if ( !empty($contato_config['contato_horario']) ) ?>
					<div class="contato-info-horario contato-info-meta">
						<i class="fa fa-clock-o" aria-hidden="true"></i>
						<p><strong>Horário de Funcionamento:</strong> <?php echo $contato_config['contato_horario']; ?></p>
					</div>
			</div>
			<div class="contato-form col-md-6">
				<?php if ( $contato_config['show_form'] == 'Sim' ) {
					echo '<h2 class="section-title"><span>Solicite um</span>Orçamento</h2>';
					echo do_shortcode('[formidable id='.$contato_config['contato_form'].']');
				} ?>
			</div>
		</div>

	</div>

	<script>
		var marker
		function initMap() {
			var mapDiv = document.getElementById('mapa');
			var map = new google.maps.Map(mapDiv, {
				center: {
					lat: <?php echo $location[0]; ?>,
					lng: <?php echo $location[1]; ?>
				},
				zoom: 17,
				scrollwheel: false,
				mapTypeControl: false,
			});
			var infowindow = new google.maps.InfoWindow({
				content: '<img width="250" src="<?php echo get_template_directory_uri(); ?>/images/logo.png">'
			});
			var iconBase = '<?php echo get_template_directory_uri(); ?>/images/mapa-pin.png';
			marker = new google.maps.Marker({
				position: map.center,
				animation: google.maps.Animation.BOUNCE,
				map: map,
				icon: iconBase
			});
			// marker.addListener('click', toggleBounce);
			// marker.addListener('click', function() {
			// 	infowindow.open(map, marker);
			// });
		}
		function toggleBounce() {
			if (marker.getAnimation() !== null) {
				marker.setAnimation(null);
			} else {
				marker.setAnimation(google.maps.Animation.BOUNCE);
			}
		}
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOdjfdmluXaFzlClwUTXMEvWOhWmMSxlI&callback=initMap" async defer></script>

<?php get_footer(); ?>

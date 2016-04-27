<?php
/**
 * Template Name: Empresa
 */
?>

<?php get_header(); ?>

<?php 
	$locomodivos_config = get_post_meta( get_the_ID(), '_locomodivos_metabox', true );
?>

<div class="clear"></div>

</header> <!-- / END HOME SECTION  -->

<div id="content" class="site-content empresa">

	<?php 
		if (have_posts()) :
			while (have_posts()) : the_post();
				the_content(); 
			endwhile;
		endif; 
	?>

	<div class="container members-list-container">
		<?php 
			if ($locomodivos_config['show'] == 'Sim') { ?>
				<h2 class="section-title"><span>Conheça nossos</span>Membros</h2>
			<?php
				$aux_padding = 0;
				foreach ($locomodivos_config['locodivos'] as $locomodivo) { 
					if ($aux_padding == 0)
						$class = "padding-left-0 padding-right-30";
					elseif ($aux_padding == 2) {
						$class = "padding-right-0 padding-left-30";
						$aux_padding = 0;
					}
					else
						$class = "margin-left-15 margin-right-15"; ?>
					<div class="locomodivo col-md-4 <?php echo $class; ?>">
						<figure class="locomodivo-pic">
							<img src="<?php echo $locomodivo['photo']; ?>">
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

<?php get_footer(); ?>
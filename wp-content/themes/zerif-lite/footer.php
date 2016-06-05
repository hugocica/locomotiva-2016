<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after
 */

?>

</div><!-- .site-content -->

<footer id="footer" role="contentinfo">

	<?php
		$contato_page_obj = get_page_by_path('contato');
		$contato_config = get_post_meta( $contato_page_obj->ID, '_contato_config_metabox', true );
	?>

	<div class="container">

		<div class="about-text col-md-4">
			<img src="<?php echo get_template_directory_uri(); ?>/images/logo-footer.png" alt="locomotiva logo branco" />
			<p>Locomotiva - Empresa Júnior de Rádio e TV</p>
			<p>Unesp Bauru</p>
		</div>

		<div class="parceiros-box col-md-4">
			<h2 class="section-title inverse">Parceiros</h2>
			<div>
				<img src="<?php echo get_template_directory_uri(); ?>/images/jrcom.png" alt="Jr.COM Empresa Júnior de Computação">
			</div>
		</div>

		<div class="contato-box col-md-4">
			<h2 class="section-title inverse">Contato</h2>
			<?php
			if ( !empty($contato_config['contato_email']) ) { ?>
				<div class="contato-info-email contato-info-meta">
					<i class="fa fa-envelope" aria-hidden="true"></i>
					<p><strong>E-mail:</strong> <?php echo $contato_config['contato_email']; ?></p>
				</div>
			<?php }
			if ( !empty($contato_config['contato_telefone']) ) { ?>
				<div class="contato-info-telefone contato-info-meta">
					<i class="fa fa-phone" aria-hidden="true"></i>
					<p><strong>Telefone:</strong> <?php echo $contato_config['contato_telefone']; ?></p>
				</div>
			<?php } ?>

			<a class="inverse-link" href="<?php echo get_permalink( get_page_by_path('contato') ); ?>">
				<span>
					<i class="fa fa-pencil" aria-hidden="true"></i> Solicite um orçamento
				</span>
			</a>
		</div>

	</div> <!-- / END CONTAINER -->

</footer> <!-- / END FOOOTER  -->

<div id="copyright-container">
	<div class="container">
		<div class="cr-box col-md-8 col-sm-7">
			<?php
				if ( date('Y') != '2016' )
					$date_range = '-' . date('Y');
			?>
			<p>© COPYRIGHT 2016<?php echo $date_range; ?>. locomotivajr.com.br TODOS OS DIREITOS RESERVADOS.</p>
			<div class="support-div"></div>
		</div>
		<div class="dev-container col-md-4 col-sm-5">
			<p>Desenvolvido por:</p>
			<div class="dev-box">
				<a href="https://github.com/hugocica/" target="_blank">
					<i class="fa fa-github" aria-hidden="true"></i>
					<span>Hugo Cicarelli</span>
				</a>
			</div>
			<div class="support-div"></div>
		</div>
	</div>
</div>

<?php /*
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-78783052-1', 'auto');
  ga('send', 'pageview');

</script>
*/ ?>

<?php wp_footer(); ?>

</body>

</html>

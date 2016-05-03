<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after
 */

?>

</div><!-- .site-content -->

<footer id="footer" role="contentinfo">

	<div class="container">

		<div class="about-text col-md-4">
			<p>Locomotiva - Empresa Júnior de Rádio e TV</p>
			<p>Unesp Bauru</p>
		</div>

		<div class="col-md-4">
			<h2 class="section-title inverse">Parceiros</h2>
			<div>
				<img src="<?php echo get_template_directory_uri(); ?>/images/jrcom.png" alt="Jr.COM Empresa Júnior de Computação">
			</div>
		</div>

		<div class="contato-box col-md-4">
			<h2 class="section-title inverse">Contato</h2>
		</div>

	</div> <!-- / END CONTAINER -->

</footer> <!-- / END FOOOTER  -->

<div id="copyright-container">
	<div class="container">
		<div class="cr-box col-md-8">
			<?php
				if ( date('Y') != '2016' )
					$date_range = '-' . date('Y');
			?>
			<p>© COPYRIGHT 2016<?php echo $date_range; ?>. locomotivajr.com.br TODOS OS DIREITOS RESERVADOS.</p>
			<div class="support-div"></div>
		</div>
		<div class="dev-container col-md-4">
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

<?php wp_footer(); ?>

</body>

</html>

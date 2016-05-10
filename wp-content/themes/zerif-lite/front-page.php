<?php get_header(); ?>

	<div class="clear"></div>

	</header> <!-- / END HOME SECTION  -->

	<script>
		(function(d, s, id) {
		  	var js, fjs = d.getElementsByTagName(s)[0];
		  	if (d.getElementById(id)) return;
		  	js = d.createElement(s); js.id = id;
		  	js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>

	<?php
		$page_config = get_post_meta( get_the_ID(), '_home_config_metabox', true );
	?>

	<div id="content" class="site-content clearfix">

		<div id="primary" class="content-area">

			<main id="main" class="site-main" role="main">

				<section id="home-section-slider">
					<?php
						echo do_shortcode("[metaslider id=".$page_config['slider']."]");
					?>
				</section>

				<section id="home-section-blog" class="page-section container">
					<h2 class="section-title margin-bottom-30"><span>Acompanhe nossas</span>Últimas notícias</h2>
					<?php
						$args = array(
								'post_type'			=> 'post',
								'posts_per_page'	=>	3
							);

						// global $wp_query;
						$home_posts = new WP_Query($args);
						$count_posts = 0;
						if ($home_posts->have_posts()) :
							while($home_posts->have_posts()) : $home_posts->the_post();
								if ($count_posts == 0)
									$class = "col-lg-8 col-md-8 col-sm-12 big";
								else
									$class = "col-lg-4 col-md-4 col-sm-6 normal";
								$count_posts++;
								$bg_img = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'big' ); ?>
								<article id="post-<?php the_ID(); ?>" class="<?php echo $class; ?> home-posts" style="background-image: url('<?php echo $bg_img[0]; ?>');">
									<div class="post-content">
										<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
									</div>
								</article>
							<?php endwhile;
						wp_reset_postdata();
						endif;
					?>
					<a href="<?php echo get_permalink( get_page_by_path('blog') ); ?>" class="btn btn-primary red-btn">
						Veja mais notícias
					</a>
				</section>

                <section id="home-content">
                    <?php while ( have_posts() ) : the_post(); ?>
					<div class="entry-content">

					<?php the_content(); ?>

				</div><!-- .entry-content -->

					<?php endwhile;  ?>
                </section>

				<?php if ( !empty($page_config['show_youtube']) || !empty($page_config['show_podcast']) ) { ?>
				<?php
					if ( $page_config['show_youtube'] == 'Sim' && $page_config['show_podcast'] == 'Sim' ) {
						$youtube_class = 'col-md-6 padding-left-0';
						$podcast_class = "col-md-6 padding-right-0";
					} else {
						$youtube_class = 'col-md-12';
						$podcast_class = 'col-md-12';
					}
				?>
				<section id="midia-home-section" class="page-section container">
					<?php if ( $page_config['show_youtube'] == 'Sim' ) { ?>
						<div class="youtube-container <?php echo $youtube_class; ?>">
							<h2 class="section-title"><span>Assista nossos</span>vídeos</h2>
								<iframe id="ytplayer" class="youtube-player" type="text/html" width="100%" src="http://www.youtube.com/embed?listType=user_uploads&list=LocomotivaJr" frameborder="0" style="margin-bottom: 15px;" /></iframe>
								<script src="https://apis.google.com/js/platform.js"></script>
								<div class="g-ytsubscribe" style="margin-top: 15px; padding-top: 15px;" data-channel="LocomotivaJr" data-layout="full" data-count="hidden"></div>
						</div>
					<?php } ?>
					<?php if ( $page_config['show_podcast'] == 'Sim' ) { ?>
						<div class="podcast-container <?php echo $podcast_class; ?>">
							<h2 class="section-title"><span>Ouça nosso</span>podcast</h2>
						</div>
					<?php } ?>
				</section>
				<?php } ?>

				<section id="social-home-section" class="page-section container">
					<h2 class="section-title"><span>Nos siga em nossas</span>redes sociais</h2>
					<div class="facebook-wrapper col-md-6">
						<div class="fb-page" data-href="https://www.facebook.com/locomotivajr" data-tabs="timeline" data-width="100%" data-height="450" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/locomotivajr"><a href="https://www.facebook.com/locomotivajr">Locomotiva - Empresa Jr. RTV</a></blockquote></div></div>
					</div>
					<div class="insta-wrapper col-md-6">

					</div>
				</section>

			</main><!-- #main -->

		</div><!-- #primary -->

<div id="fb-root"></div>

<?php get_footer(); ?>

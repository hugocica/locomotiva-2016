<?php get_header(); ?>

	<div class="clear"></div>

	</header> <!-- / END HOME SECTION  -->

	<div id="content" class="site-content clearfix">

		<div id="primary" class="content-area">

			<main id="main" class="site-main" role="main">

				<section id="home-section-slider">
					<?php
						echo do_shortcode("[metaslider id=105]"); 
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
					<a href="<?php echo get_permalink( get_page_by_path('blog') ); ?>" class="btn btn-primary red-btn">Veja mais notícias</a>
				</section>

                <section id="home-content">
                    <?php while ( have_posts() ) : the_post(); ?>
					<div class="entry-content">

					<?php the_content(); ?>

				</div><!-- .entry-content -->

					<?php endwhile;  ?>
                </section>

			</main><!-- #main -->

		</div><!-- #primary -->

<div id="fb-root"></div>
<script>
	(function(d, s, id) {
	  	var js, fjs = d.getElementsByTagName(s)[0];
	  	if (d.getElementById(id)) return;
	  	js = d.createElement(s); js.id = id;
	  	js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>

<?php get_footer(); ?>

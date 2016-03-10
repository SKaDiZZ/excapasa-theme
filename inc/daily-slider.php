<?php
/**
 * Display IDEJA Image Slider
 *
 * @package WordPress
 * @subpackage nekretnine
 * @since nekretnine 1.0
 */

function show_daily_slider() {

	query_posts(
				array(
					'post_type' 		  => 'nekretnine',
					'post_status' 		=> 'publish',
					'posts_per_page' 	=> 6,
					'meta_key'        => 'slajder',
					'meta_value'      => 'true'
					)
				);
	?>


	<!-- START Slider -->
	<section id="intro-slider">
		<div class="swiper-container">
			<div class="swiper-wrapper">

			<?php

				while (have_posts()): the_post();

                $slide_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

            ?>

				<div class="swiper-slide" style="background-image: url('<?php echo $slide_img; ?>');">
					<div class="swiper-text">
						<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<p><?php the_excerpt();?></p>
		        <a class="btn btn-default" href="<?php the_permalink(); ?>" role="button">Saznajte Više!</a>
					</div>
				</div>

				<?php endwhile; ?>

			</div>
			<div class="swiper-pagination"></div>
		</div>
	</section>
		<!-- END Slider -->
<?php
}

<?php 
/**
 * Display Daily Image Slider
 *
 * @package WordPress
 * @subpackage daily
 * @since daily 1.0
 */

function show_daily_slider() {

	query_posts(
				array(
					'post_type' 		=> 'slajdovi',
					'post_status' 		=> 'publish',
					'posts_per_page' 	=> 6,
					'order' 			=> 'ASC',
					'orderby' 			=> 'menu_order'
					)
				);
	?>

	<div class="container">
	<section id="intro-slider">
		<div class="swiper-container">
			<div class="swiper-wrapper">

			<?php  

				while (have_posts()): the_post(); 
     
                $slide_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                $slide_link = get_post_custom($post->ID);
            ?>
				<div class="swiper-slide" style="background-image: url('<?php echo $slide_img; ?>');">
					<div class="swiper-text">
						<h1><?php the_title(); ?></h1>
						<p><?php the_excerpt();?></p>
		                <a class="btn btn-default" href="<?php echo $slide_link['slidelink'][0]; ?>" role="button">Saznajte Više!</a>
					</div>
				</div>
				
				<?php endwhile; ?>

			</div>
			<div class="swiper-pagination"></div>
		</div>
	</section>
	</div>

<?php
}
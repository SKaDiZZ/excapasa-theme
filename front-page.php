<?php
/**
 * Template Name: Front Page Template
 *
 * @package WordPress
 * @subpackage xception
 * @since xception 1.0
 */

get_header();

$apartmani = new WP_Query( array(
    'post_type' 		=> array('apartmani','gallery','attachment'),
    'post_status' 	    => 'publish',
    'orderby'			=> 'menu_order',
    'posts_per_page' 	=> 10
) );

?>

<main id="main" class="site-main" role="main">
	<section id="primary" class="content-area">
		<div class="container">

            <?php if ( $apartmani->have_posts() ): ?>

                <div class="apartmani">

                    <?php while ( $apartmani->have_posts() ): $apartmani->the_post(); ?>

                        <?php $slika_apartmana = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>

                        <div class="apartman">
                             <div class="card">
                               <div class="card-image">
                                 <div class="status-apartmana dostupno">
                                    <i class="material-icons">thumb_up</i>
                                 </div>
                                    <a href="<?php echo post_permalink( $post->ID ); ?>"><img src="<?php echo $slika_apartmana; ?>" alt="Slika nije dostupna"/></a>
                                 <div class="cijena-apartmana">
                                   cijena po dogovoru
                                 </div>
                               </div>
                               <div class="card-content">
                                 <span class="card-title"><?php the_title(); ?></span>
                                 <span class="card-subtitle dostupan">Ovaj apartman trenutno je dostupan</span>
                                 <p><?php the_excerpt(); ?></p>
                               </div>
                               <div class="card-action">
                                 <a href="#">Iznajmite</a>
                                 <a href="<?php echo post_permalink( $post->ID ); ?>">Saznajte vise</a>
                               </div>
                             </div>
                         </div>


                    <?php endwhile; ?>

                </div><!-- /.apartmani -->

                <?php wp_reset_postdata(); ?>

            <?php endif; ?>

        </div><!-- /container -->
    </section><!-- /primary -->
</main><!-- main -->

<?php

get_footer();

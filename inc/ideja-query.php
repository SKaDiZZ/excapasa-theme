<?php
/**
 * IDEJA CUSTOM QUERY SHORTCODE
 *
 * @package WordPress
 * @subpackage nekretnine
 * @since nekretnine 1.0
 * [ideja tip="kuca"]
 */


function ideja_query($atts) {

  $a = shortcode_atts( array(
        'tip' => 'kuca'
    ), $atts );

  $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

	$args =  array(
        					'post_type' 		  => array('nekretnine','gallery','attachment'),
        					'post_status' 		=> 'publish',
        					'posts_per_page' 	=> '8',
                  'paged'           => $paged,
                  'meta_key'        => 'tip',
        	        'meta_value'      => $a['tip']
                );

  $posts = new WP_Query($args);

  // Pagination fix
  $temp_query = $wp_query;
  $wp_query   = NULL;
  $wp_query   = $posts;


	?>

  <div class="container">
           <div class="row">

           <?php

           if($posts->have_posts()):
               while($posts->have_posts()):$posts->the_post();

                   $nekretnine_slika = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                   $nekretnine_meta = get_post_custom($post->ID);
                   $tip_oglasa = $nekretnine_meta['tip_oglasa'][0];
                   $nekretnine_status = $nekretnine_meta['status'][0];
                   $nekretnine_cijena = $nekretnine_meta['cijena'][0];

               ?>

               <!-- Start Nekretnina Card -->
              <div class="col-xs-12 col-sm-12 col-md-3 col-lg- 3">
                 <div class="card">
                    <div class="row">

                      <!-- START Nekretnina image -->
                      <div class="col-xs-5 col-sm-5 col-md-12 col-lg-12">

                        <a class="nekretnina-img-a" href="<?php the_permalink(); ?>">

                          <?php if ($nekretnine_status) : ?>
                              <div class="ribbon"><span><?php echo $nekretnine_status; ?></span></div>
                          <?php endif; ?>

                          <?php if ($nekretnine_slika) : ?>
                              <img class="nekretnina-img" src="<?php echo $nekretnine_slika; ?>" alt=""/>
                          <?php endif; ?>

                        </a>

                      </div>
                      <!-- END Nekretnina image -->

                      <!-- START Nekretnina text area -->
                     <div class="col-xs-7 col-sm-7 col-md-12 col-lg-12">
                       <div class="nekretnina-card-text">

                      <h3><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h3>
                      <span class="objavljeno hidden-xs"><i class="fa fa-clock-o fa-lg"></i>&nbsp;&nbsp; <?php echo the_time('d. m. Y.'); ?>&nbsp;&nbsp;</span>
                      <?php if($tip_oglasa) : ?><span class="label label-danger"><?php echo $tip_oglasa; ?></span><?php endif; ?>

                      <div class="hidden-xs hidden-sm">
                        <p>
                          <?php echo get_the_excerpt(); ?>
                        </p>
                      </div>

                      </div><!--card-text-->
                    </div><!--col-->

                    <!-- START Nekretnina action area -->
                      <div class="nekretnina-card-action">

                        <span class="objavljeno hidden-md hidden-lg"><i class="fa fa-clock-o fa-lg"></i>  <?php echo the_time('d. m. Y.'); ?></span>

                          <?php

                         if($nekretnine_cijena && $nekretnine_cijena !== '0.00') {

                              echo '<span class="cijena"><i class="fa fa-money"></i>  ' . number_format($nekretnine_cijena, 2) . 'KM</span>';

                            } else {
                              ?>
                              <a href="mailto:info@sarajevodailyapartments.com" class="btn btn-danger btn-xs" role="button">
                              <?php echo 'Cijena: po dogovoru'; ?>
                              </a>
                              <?php
                            }
                             ?>
                      </div><!-- / card action -->
                  </div><!-- / row -->
              </div><!-- / card col -->
            </div><!-- /col -->
            <!-- END Nekretnina card -->

            <?php $counter++;
              if ($counter % 4 == 0) {
              echo '</div><div class="row">';
            }

               endwhile; ?>

                </div>

             <?php else:

                 get_template_part( 'template-parts/content', 'none' );


               endif; ?>



                 <?php

                 // Custom query loop pagination
                  echo ideja_paginacija($paged, $posts);

                  // Reset postdata
                  wp_reset_postdata();

                 // Reset main query object
                 $wp_query = NULL;
                 $wp_query = $temp_query;

               ?>

           </div><!-- /.row -->
           </div><!-- .container -->

<?php

}

add_shortcode('ideja', 'ideja_query');

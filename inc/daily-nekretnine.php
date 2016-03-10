<?php

// Dodaj shortcode za prikazivanje nekretnina na prvoj stranici

function show_daily_nekretnine($atts=null, $content=null)
{
    $args = array(
    	'post_type' => array('nekretnine','gallery','attachment'), 
    	'orderby' => 'menu_order', 
    	'order' => 'DESC', 
    	'post_status' => 'publish'
    );

    $posts = new WP_Query($args); ?>

	<div class="row">
 	
    <? if($posts->have_posts()):
        while($posts->have_posts()):$posts->the_post();

    		$nekretnine_slika = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
            $nekretnine_meta = get_post_custom($post->ID);
            $tip_oglasa = $nekretnine_meta['tip_oglasa'][0];
            $nekretnine_status = $nekretnine_meta['status'][0];
            $nekretnine_cijena = $nekretnine_meta['cijena'][0];

             ?>	    		           

                    <div class="col-sm-4 col-md-4">
                        <div class="card">
                                <?php if ($nekretnine_status != '') : ?>
                                    <div class="ribbon"><span><?php echo $nekretnine_status; ?></span></div>
                                <?php endif; ?>
                            <a href="<?php the_permalink(); ?>">
                                <img style="height: 200px; width: 100%; display: block;" src="<?php echo $nekretnine_slika; ?>" alt=""/>
                            </a>
                            <div class="caption text-justify">
                                <h3><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a> <small><?php echo $tip_oglasa; ?></small></h3>
                                <span class="objavljeno"><i class="fa fa-clock-o fa-lg"></i> Objavljeno: <?php echo the_time('d. m. Y.'); ?></span>
                                <?php echo the_excerpt(); ?>
                            </div>
                            <div class="card-action">
                            
                                    <?php 

                                   if($nekretnine_cijena !== '' && $nekretnine_cijena !== '0.00') { 

                                        echo '<i class="fa fa-money"></i><span class="cijena">  ' . $nekretnine_cijena . 'KM</span>';

                                      } else {
                                        ?>
                                        <a href="mailto:info@sarajevodailyapartments.com" class="btn btn-danger" role="button">
                                        <?php echo 'Cijena: po dogovoru'; ?>
                                        </a>
                                        <?php
                                      }
                                       ?>
                                
                            </div>
                        </div>
                    </div>
                
                <?php $counter++;
                  if ($counter % 3 == 0) {
                  echo '</div><div class="row">';
                }

                
        endwhile; ?>

         <div class="col-md-12">
                    <?php echo daily_paginacija(); ?>
        </div>

         <?php else:

                    get_template_part( 'template-parts/content', 'none' );

            endif; ?>
        
	</div>
    <div class="row">
        <div class="col-sm-12">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>nekretnine">Pogledajte više</a>
        </div>
    </div>
  
      <div class="row" style="padding-left: 20px; padding-right: 20px;">
<div class="extra-space-l"></div>
[google_map_easy id="1"]

</div>

    <?php
}

add_shortcode('nekretnine', 'show_daily_nekretnine');
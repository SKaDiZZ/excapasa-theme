<?php

// Dodaj shortcode za prikazivanje aranzmana na stranici

function show_daily_sainfo($atts=null, $content=null)
{
    $args = array(
    	'post_type' => 'sainfo', 
    	'orderby' => 'menu_order', 
    	'order' => 'DESC', 
    	'post_status' => 'publish'
    );

    $posts = new WP_Query($args); ?>

	<div class="row">
 	
    <? if($posts->have_posts()):
        while($posts->have_posts()):$posts->the_post();

    		$sainfo_slika = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>	    		

    				<div class="col-sm-4 col-md-4">
    					<div class="card">
                            <a href="<?php the_permalink(); ?>">
	      					    <img style="height: 200px; width: 100%; display: block;" src="<?php echo $sainfo_slika; ?>" alt=""/>
                            </a>
	      					<div class="caption text-justify">
    	        				<h3><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h3>
    	        				<?php echo the_excerpt(); ?>
	      					</div>
    					</div>
  					</div>
				
				<?php $counter++;
                  if ($counter % 3 == 0) {
                  echo '</div><div class="row">';
                }
                
        endwhile;
        else:
            echo "";
            die();
    endif;

    ?>
	</div>
    <?php
}

add_shortcode('sainfo', 'show_daily_sainfo');
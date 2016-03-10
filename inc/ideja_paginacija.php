<?php
/*-------------------------------------------------------
 *			IDEJA Pagination
 *-------------------------------------------------------*/

if(!function_exists('ideja_paginacija')):

	function ideja_paginacija($paged, $posts_query, $pages = '', $range = 2)
	{
	     $showitems = ($range * 1)+1;

	     if(empty($paged)) $paged = 1;

	     if($pages == '')
	     {
	         $pages = $posts_query->max_num_pages;

	         if(!$pages)
	         {
	             $pages = 1;
	         }
	     }

	     if(1 != $pages)
	     {
	     	echo '<div class="row">';
			echo '<div class="col-sm-12 text-center">';
			echo "<ul class='pagination'>";

			if($paged > 2 && $paged > $range+1 && $showitems < $pages){
				echo "<li><a href='".get_pagenum_link(1)."'>&laquo;</a></li>";
			}

			if($paged > 1 && $showitems < $pages){
				echo '<li>';
				previous_posts_link('<<');
				echo '</li>';
			}

			for ($i=1; $i <= $pages; $i++)
			{
				if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
				{
					echo ($paged == $i)? "<li class='active'><a href='#'>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' >".$i."</a></li>";
				}
			}

			if ($paged < $pages && $showitems < $pages){
				echo '<li>';
				next_posts_link('>>');
				echo '</li>';
			}

			if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages){
				echo "<li><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>";
			}

			echo "</ul>";
			echo "</div>";
			echo "</div>";
	     }
	}

endif;

<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage daily
 * @since daily 1.0
 */

$header_img = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

?>

<section class="header-image" style="background-image: url('<?php echo $header_img; ?>');">
</section>

<div class="container">
<div class="row">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">

				<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
					<span class="sticky-post"><?php _e( 'Featured', 'daily' ); ?></span>
				<?php endif; ?>

				<?php the_title( '<h2 class="entry-title">','</h2>' ); ?>

			</header><!-- .entry-header -->


	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
				get_the_title()
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
</div>
</div>

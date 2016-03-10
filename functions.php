<?php
/**
 * Xception functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @see https://codex.wordpress.org/Theme_Development
 * @see https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage xception
 * @since xception 1.0
 */


   function theme_setup() {

        // Dopusti Wordpressu da kontrolise document title
        add_theme_support( 'title-tag' );

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 1920, 1080, true );

        // Dodaj menije
        register_nav_menu('header-menu', __( 'Header Menu' ));

        // Ukljuci podrsku za html5 forme
        add_theme_support( 'html5', array(
              'search-form',
              'comment-form',
              'comment-list',
              'gallery',
              'caption',
        ) );

        // Ukljuci podrsku za post formate
        add_theme_support( 'post-formats', array(
              'image',
              'video',
              'gallery',
        ) );

   }

  add_action('after_setup_theme', 'theme_setup');

   // Dodaj CSS stilove i JS skripte
  function load_theme_scripts() {

     // UCITAJ GOOGLE FONTOVE
     wp_enqueue_style( 'material-icons', 'http://fonts.googleapis.com/icon?family=Material+Icons');
     wp_enqueue_style( 'dosis-font', 'https://fonts.googleapis.com/css?family=Dosis:400,700&subset=latin,latin-ext');

     // UCITAJ CSS STILOVE
     // Dodaj Bootstrap 3 CSS >> Bootstrap framework CSS
     wp_enqueue_style( 'materialize', get_template_directory_uri() .'/css/materialize.css');

     // Dodaj SWIPER CSS
     wp_enqueue_style( 'swiper', get_template_directory_uri() .'/css/swiper/swiper.min.css');

     // Dodaj glavni Style CSS
     wp_enqueue_style( 'xception', get_stylesheet_uri() );

     // UCITAJ JAVASKRIPTE
     // Dodaj JQuery 1.11.3 JS
     wp_enqueue_script( 'theme-jquery', 'https://code.jquery.com/jquery-2.1.1.min.js', array(), '', true);

     // Dodaj Masonry
     wp_enqueue_script('masonry-js', get_template_directory_uri() .'/js/masonry/masonry.pkgd.min.js', array(),'theme-jquery', true);

     // Dodaj Materialize JS
     wp_enqueue_script('materialize-js', get_template_directory_uri() .'/js/materialize/materialize.min.js', array(),'theme-jquery', true);

     // Dodaj CLASSIE JS
     wp_enqueue_script( 'classie-js', get_template_directory_uri() .'/js/classie/classie.js', array(), 'theme-jquery', true);

     // Dodaj SWIPER JS
     wp_enqueue_script('swiper-js', get_template_directory_uri() .'/js/swiper/swiper.min.js', array(),'theme-jquery', true);

     // Add theme JS file
     wp_enqueue_script('xception-js', get_template_directory_uri() .'/js/theme.js', array(),'theme-jquery', true);

  }

add_action( 'wp_enqueue_scripts', 'load_theme_scripts');

// Dodaj Daily Slider
require get_template_directory() . '/inc/daily-slider.php';

// Dodaj Daily Paginaciju
require get_template_directory() . '/inc/daily-paginacija.php';

// Dodaj IDEJA PAGINACIJA
require get_template_directory() . '/inc/ideja_paginacija.php';

// Dodaj IDEJA KONTAKT SHORTCODE
require get_template_directory() . '/inc/ideja-kontakt-shortcode.php';

// Dodaj IDEJA CUSTOM QUERY
require get_template_directory() . '/inc/ideja-query.php';

// Dodaj IDEJA PRETRAGA
require get_template_directory() . '/inc/nekretnine-search-sc.php';

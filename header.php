<?php
/**
 * The template for displaying the header
 *
 * @package WordPress
 * @subpackage xception
 * @since xception 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php wp_head(); ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body <?php body_class(); ?>>

<!--========== BEGIN HEADER ==========-->
	<header id="top-header">
    <div id="navigacija" class="navbar-base">
      <nav>
        <div class="nav-wrapper">
          <div class="container">
            <a href="#!" class="brand-logo"><?php echo get_bloginfo( 'name' ); ?></a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
              <?php wp_nav_menu( 'header-menu' ); ?>
            </ul>
            <ul class="side-nav" id="mobile-demo">
              <?php wp_nav_menu( 'header-menu' ); ?>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
<!--========== END HEADER ==========-->

<div class="slider">
    <ul class="slides">
      <li>
        <img src="http://static.asiawebdirect.com/m/bangkok/portals/bangkok-com/homepage/top10-serviced-apartment/pagePropertiesImage/top10-serviced-apartment.jpg"> <!-- random image -->
        <div class="caption center-align">
          <h3>This is our big Tagline!</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="http://www.fzp.co.za/wp-content/uploads/2014/02/img_7_jul204.jpg"> <!-- random image -->
        <div class="caption left-align">
          <h3>Left Aligned Caption</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="http://media.expedia.com/hotels/5000000/4570000/4561300/4561283/4561283_52_z.jpg"> <!-- random image -->
        <div class="caption right-align">
          <h3>Right Aligned Caption</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="http://www.zastavki.com/pictures/originals/2013/Interior___Design_of_the_city_apartments_048753_.jpg"> <!-- random image -->
        <div class="caption center-align">
          <h3>This is our big Tagline!</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
    </ul>
</div>

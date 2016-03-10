<?php
/**
 * IDEJA Kontakt query shortcode
 *
 * @package WordPress
 * @subpackage nekretnine
 * @since nekretnine 1.0
 *
 * Koristenje :
 * 	[idejakontakt tip="ideja-adresa"]
 *  [idejakontakt tip="ideja-tel"]
 *  [idejakontakt tip="ideja-fax"]
 *  [idejakontakt tip="ideja-email"]
 */


function ideja_kontakt_options($atts) {

  $a = shortcode_atts( array(
        'tip' => 'ideja-adresa'
    ), $atts );

    $tip_podataka = get_option($a['tip']);

     $output = '' . $tip_podataka . '';

     return $output;

}

add_shortcode('idejakontakt', 'ideja_kontakt_options');

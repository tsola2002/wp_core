<?php
/*
Plugin Name: smp_map_it
Plugin URI: isobotie.gopagoda.com
Description: This plugin will add shortcodes for google maps
Author: Omatsola Isaac Sobotie
Version: 1.0
Author URI: http://isobotie.gopagoda.com/
*/

function smp_map_it($atts, $content=null)
{
    shortcode_atts( array( 'title' => 'Your Map:', 'address' => ''), $atts);
    $base_map_url = 'http://maps.google.com/maps/api/staticmap?sensor=false&size=256x256&format=png&center=';
    return '
	<h2>' . $atts['title'] . '</h2>
	<img width="256" height="256"
		src="' . $base_map_url . urlencode($atts['address']) . '" />';
}

add_shortcode('map-it','smp_map_it');

<?php
/*
Plugin Name: copyright
Plugin URI: isobotie.gopagoda.com
Description: This plugin will add copyright as a template
Author: Omatsola Isaac Sobotie
Version: 1.0
Author URI: http://isobotie.gopagoda.com/
*/

global $wp_version;

if ( !version_compare($wp_version, "3.0" , ">=") )
{
    die("You need at least version 3.0 of Wordpress to use the copyright plugin");
}

function add_copyright()
{
    $copyright_message = "Copyright ".date(Y)." sobotie Productions, All Rights Reserved";
    echo $copyright_message;
}

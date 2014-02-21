<?php
/*
Plugin Name: Error Logger
Plugin URI: isobotie.gopagoda.com
Description: This plugin will get activated
Author: Omatsola Isaac Sobotie
Version: 1.0
Author URI: http://isobotie.gopagoda.com/
*/

//written function that log errors
function my_plugin_activate()
{
    // add options, build db tables, etc
    error_log("my plugin activated");
}

//registering function using activation hook
register_activation_hook(__FILE__,"my_plugin_activate");


//written function that log deactivation errors
function my_plugin_deactivate()
{
    error_log("my plugin DE-activated");
}

//registering function using deactivation hook
register_deactivation_hook(__FILE__,"my_plugin_deactivate");
<?php
/*
Plugin Name: Omatsola Isaac Sobotie's Plugin
Plugin URI: isobotie.gopagoda.com
Description: This plugin does things you never thought were possible.
Author: Omatsola Isaac Sobotie
Version: 1.0
Author URI: http://isobotie.gopagoda.com/
*/

global $wp_version;

if(!version_compare($wp_version, "3.0", ">=")){
    die("You at least version 3.0 to run this plugin");
}
<?php
/*
Plugin Name: feed_copyrighter
Plugin URI: isobotie.gopagoda.com
Description: This plugin will add copyrights to rss feed
Author: Omatsola Isaac Sobotie
Version: 1.0
Author URI: http://isobotie.gopagoda.com/
*/

function cwmp_add_content_watermark( $content )
{

    // in case we want to add to earlier versions
    if (  is_feed() )
    {
        return $content .
            "Created by Sobotie Productions, copyright  " .
            date("Y") .
            " all rights reserved.";
    }

    return $content;
}

add_filter("the_content","cwmp_add_content_watermark");
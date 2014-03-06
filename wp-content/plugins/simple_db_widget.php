<?php
/*
Plugin Name: Dashboard Widget
Plugin URI: isobotie.gopagoda.com
Description: This plugin will create a dashboard widget
Author: Omatsola Isaac Sobotie
Version: 1.0
Author URI: http://isobotie.gopagoda.com/
*/


function simple_dashboard_widget()
{
    ?>
    <h2>Simple Dashboard Widget</h2>
    <p>Welcome to WordPress development. Now you can build your own dashboard widgets. For fun and profit!</p>
    <p><a href="http://www.isobotie.gopagoda.com">Visit Isobotie's Portfolio</a></p>
<?php
}

function sdbw_register_widget()
{
    //register above widget as a dashboard widget
    wp_add_dashboard_widget('simple-dashboard-widget','Simple Dashboard Widget', 'simple_dashboard_widget');
}

//registers above action as dashboard hook
add_action('wp_dashboard_setup', 'sdbw_register_widget');

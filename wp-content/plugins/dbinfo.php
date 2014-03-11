<?php
/*
Plugin Name: wpdbinfo
Plugin URI: isobotie.gopagoda.com
Description: This plugin will display database items in dashboard widget
Author: Omatsola Isaac Sobotie
Version: 1.0
Author URI: http://isobotie.gopagoda.com/
*/

function databaseinfo_dashboard_widget()
{
    global $wpdb;
    ?>
    <h2>DB Info Dashboard Widget</h2>
    <p><b>Last Query: </b> <?php echo $wpdb->last_query ?></p>
    <p><b>Last Error: </b> <?php echo $wpdb->last_error ?></p>
    <p><b>Total Users: </b><?php echo $wpdb->query('SELECT ID FROM wp_users')?></p>
<?php
}


function databaseinfo_register_widget()
{
    wp_add_dashboard_widget('databaseinfo-dashboard-widget','Counter Dashboard Widget', 'databaseinfo_dashboard_widget');
}

add_action('wp_dashboard_setup', 'databaseinfo_register_widget');
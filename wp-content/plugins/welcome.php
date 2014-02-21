<?php
/*
Plugin Name: welcome
Plugin URI: isobotie.gopagoda.com
Description: This plugin will send add new user notification emails to new users
Author: Omatsola Isaac Sobotie
Version: 1.0
Author URI: http://isobotie.gopagoda.com/
*/


// override the wp_new_user_notification pluggable function
if ( !function_exists('wp_new_user_notification') ) {
    function wp_new_user_notification($user_id, $plaintext_pass = '') {
        $user = new WP_User($user_id);

        $user_login = stripslashes($user->user_login);
        $user_email = stripslashes($user->user_email);

        // The blogname option is escaped with esc_html on the way into the database in sanitize_option
        // we want to reverse this for the plain text arena of emails.
        $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);

        $message  = sprintf(__('New user registration on your site %s:'), $blogname) . "\r\n\r\n";
        $message .= sprintf(__('Username: %s'), $user_login) . "\r\n\r\n";
        $message .= sprintf(__('E-mail: %s'), $user_email) . "\r\n";

        @wp_mail(get_option('admin_email'), sprintf(__('[%s] New User Registration'), $blogname), $message);

        if ( empty($plaintext_pass) )
            return;

        $message  = __('Welcome to mmmStuff.com') . "\r\n\r\n";
        $message .= __('Here is your information for future reference: ') . "\r\n\r\n";
        $message .= sprintf(__('Username: %s'), $user_login) . "\r\n";
        $message .= sprintf(__('Password: %s'), $plaintext_pass) . "\r\n";
        $message .= wp_login_url() . "\r\n";
        $message .= __('Feel free to come back and check on stuff often!');

        wp_mail($user_email, sprintf(__('Welcome to: [%s]'), $blogname), $message);
    }
}
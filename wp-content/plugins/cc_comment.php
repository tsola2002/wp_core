<?php
/*
Plugin Name: cc_comment
Plugin URI: isobotie.gopagoda.com
Description: This plugin will send emails along with comments
Author: Omatsola Isaac Sobotie
Version: 1.0
Author URI: http://isobotie.gopagoda.com/
*/

//function to send email
function cc_comment()
{
    global $_REQUEST;

    $to = "tsola2002@yahoo.co.uk";
    $subject = "New comment posted @ yourblog " . $_REQUEST['subject'];
    $message = "Message from: " . $_REQUEST['name'] . " at email: " . $_REQUEST['email'] . ": \n" . $_REQUEST['comments'];
    mail($to,$subject,$message);
}

//add cc_comment to wordpresses exist comment_post action
add_action('comment_post','cc_comment');
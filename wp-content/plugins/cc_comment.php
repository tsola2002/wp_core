<?php
/*
Plugin Name: cc_comment
Plugin URI: isobotie.gopagoda.com
Description: This plugin will send emails along with comments
Author: Omatsola Isaac Sobotie
Version: 1.0
Author URI: http://isobotie.gopagoda.com/
*/



function cccomm_option_page()
{
    ?>
    <div class="wrap">
        <h2>CC Comments Option Page</h2>
        <p>Welcome to the CC Comments Plugin. Here you can edit the email(s) you wish to have your comments CC'd to.</p>

    </div>
<?php
}


function cccomm_plugin_menu()
{
    add_options_page('CC Comments Settings','CC Comments', 'manage_options', 'cc-comments-plugin', 'cccomm_option_page');
}

add_action('admin_menu', 'cccomm_plugin_menu');


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
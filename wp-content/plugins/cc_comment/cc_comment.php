<?php
/*
Plugin Name: cc_comment
Plugin URI: isobotie.gopagoda.com
Description: This plugin will send emails along with comments
Author: Omatsola Isaac Sobotie
Version: 1.0
Author URI: http://isobotie.gopagoda.com/
*/


//registering the option settings with wordpress & letting wordpress handle the rest
function cccomm_init()
{
    register_setting('cccomm_options','cccomm_cc_email');
}

add_action('admin_init','cccomm_init');

//function to add a setting field item to options.php page
function cccomm_setting_field()
{
    ?>
    <input type="text" name="cccomm_cc_email" id="cccomm_cc_email"
           value="<?php echo get_option('cccomm_cc_email'); ?>" />
<?php
}

function cccomm_setting_section()
{
    ?>
    <p>Settings for the CC Comments plugin:</p>
<?php
}



function cccomm_plugin_menu()
{
    add_settings_section('cccomm','CC Comments','cccomm_setting_section','general');
    add_settings_field('cccomm_cc_email', 'CC Comments Email','cccomm_setting_field','general','cccomm');
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
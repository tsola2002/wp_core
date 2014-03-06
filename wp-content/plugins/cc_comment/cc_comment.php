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

function cccomm_option_page()
{

    ?>
    <div class="wrap">
        <h2>CC Comments Option Page</h2>
        <p>Welcome to the CC Comments Plugin. Here you can edit the email(s) you wish to have your comments CC'd to.</p>

        <form action="options.php" method="post" id="cc-comments-email-options-form">
            <!--  this will output nonces for the entire settings group  -->
            <?php settings_fields('cccomm_options'); ?>
            <h3><label for="cccomm_cc_email">Email to send CC to: </label> <input
                    type="text" id="cccomm_cc_email" name="cccomm_cc_email"
                    value="<?php echo esc_attr( get_option('cccomm_cc_email') ); ?>" /></h3>
            <p><input type="submit" name="submit" value="Update Email" /></p>
            <input type="hidden" name="cccomm_hidden" value="Y" />
        </form>
    </div>
<?php



}


function cccomm_plugin_menu()
{
    add_menu_page('CC Comments Settings','CC Comments', 'manage_options', 'cc-comments-plugin', 'cccomm_option_page', '/wp_core/wp-content/plugins/cc_comment/cc_icon.png', 20);
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
<?php
/**
 *
 * Package: wp_core
 * Filename: Foo_Widget.php
 * Author: solidstunna101
 * Date: 04/03/14
 * Time: 09:54
 *
 */

/*
Plugin Name: Top Posts
Plugin URI: isobotie.gopagoda.com
Description: This plugin will a widget with wordpress loops
Author: Omatsola Isaac Sobotie
Version: 1.0
Author URI: http://isobotie.gopagoda.com/
*/

class Tpp_posts_widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'Tpp_posts_widget', // Base ID
            __('Top Posts', 'text_domain'), // Name
            array( 'description' => __( 'Top Posts Widget', 'text_domain' ), ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {

        ?>
        <h3>Posts on this page:</h3>
        <?php if ( have_posts()) :
            while ( have_posts()) :
                the_post();
                ?>
                <div>
                    <a href="<?php echo the_permalink(); ?>"
                       title="<?php echo the_title(); ?>"><?php echo the_title(); ?></a>
                    (<?php echo comments_number(); ?>)
                </div>
            <?php 	endwhile;
        endif;
        ?>
    <?php

    }


    public function form( $instance ) {

    }


    public function update( $new_instance, $old_instance ) {

    }

} // class Foo_Widget

// register Foo_Widget widget
function register_tpp_posts_widget() {
    register_widget( 'Tpp_posts_widget' );
}
add_action( 'widgets_init', 'register_tpp_posts_widget' );
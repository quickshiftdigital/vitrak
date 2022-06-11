<?php

/**
 * Theme setup functions and definitions
 *
 * @package WordPress
 * @subpackage Espoir
 */

/**
 * Sets up theme defaults and registers support for various WP features.
 */


add_action('wp_enqueue_scripts', 'blankslate_enqueue');
function blankslate_enqueue()
{
    wp_enqueue_style('blankslate-style', get_stylesheet_uri());
    wp_enqueue_script('jquery');
    wp_enqueue_style('font-awesome', 'https://use.fontawesome.com/releases/v5.0.13/css/all.css');
    wp_enqueue_style('style-main', get_template_directory_uri() . '/assets/css/style-vitrak.css');
}

add_action('wp_footer', 'blankslate_footer_scripts');
function blankslate_footer_scripts()
{
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array(), true);
    wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/js/swiper.min.js', array(), true);
?>
    <script>
        jQuery(document).ready(function($) {
            var deviceAgent = navigator.userAgent.toLowerCase();
            if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
                $("html").addClass("ios");
                $("html").addClass("mobile");
            }
            if (navigator.userAgent.search("MSIE") >= 0) {
                $("html").addClass("ie");
            } else if (navigator.userAgent.search("Chrome") >= 0) {
                $("html").addClass("chrome");
            } else if (navigator.userAgent.search("Firefox") >= 0) {
                $("html").addClass("firefox");
            } else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
                $("html").addClass("safari");
            } else if (navigator.userAgent.search("Opera") >= 0) {
                $("html").addClass("opera");
            }
        });
    </script>
<?php
}


//Options Pages for the Theme
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'     => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-moola-settings',
        'capability'    => 'edit_posts',
        'redirect'        => false
    ));

    acf_add_options_sub_page(array(
        'page_title'     => 'OTP Settings',
        'menu_title'    => 'OTP',
        'parent_slug'    => 'theme-moola-settings',
    ));
}


//All kind of Redirects
add_action( 'template_redirect', 'redirect_traffic' );

function redirect_traffic() {
    if ( !is_user_logged_in() && is_page('my-account') && !strpos( $_SERVER["REQUEST_URI"], "/customer-logout/") ) {
        wp_redirect( get_home_url() . '/vendor/register/' ); 
        exit;
    }

    if( is_user_logged_in() && !is_page('register-next') && checkRole('seller') && !get_field('gst', 'user_' . get_current_user_id()) && !strpos( $_SERVER["REQUEST_URI"], "customer-logout") ) {
        wp_redirect( get_home_url() . '/vendor/register-next/' ); 
        exit;
    }

    if( is_user_logged_in() && !is_page('register-next') && checkRole('distributor') && !get_field('gst', 'user_' . get_current_user_id()) && !strpos( $_SERVER["REQUEST_URI"], "customer-logout") ) {
        wp_redirect( get_home_url() . '/vendor/register-next/' ); 
        exit;
    }

    if(is_user_logged_in() && is_page('my-account') && checkRole('seller') && !strpos( $_SERVER["REQUEST_URI"], "customer-logout") ) {
        wp_redirect( get_home_url() . '/vendor/dashboard/' ); 
        exit;
    }

    if(is_user_logged_in() && is_page('cart') && checkRole('seller') && !strpos( $_SERVER["REQUEST_URI"], "customer-logout") ) {
        wp_redirect( get_home_url() . '/checkout/' ); 
        exit;
    }

    if(is_user_logged_in() && is_page('stores') && checkRole('distributor') && !strpos( $_SERVER["REQUEST_URI"], "customer-logout") ) {
        wp_redirect( get_home_url() . '/account-verification/' ); 
        exit;
    }

    if(is_user_logged_in() && is_page('my-account') && get_field('account_verification', 'user_' . get_current_user_id()) && checkRole('distributor') && !strpos( $_SERVER["REQUEST_URI"], "customer-logout") ) {
        wp_redirect( get_home_url() . '/account-verification/' ); 
        exit;
    }
    
    if(is_user_logged_in() && is_page('dashboard') && checkRole('seller') && !sellingStatus() && !strpos( $_SERVER["REQUEST_URI"], "customer-logout") ) {
        wp_redirect( get_home_url() . '/checkout/' ); 
        exit;
    }
}

//Clean the WP admim bar
function clear_node_title( $wp_admin_bar ) {

    $all_toolbar_nodes = $wp_admin_bar->get_nodes();
    $clear_titles = array(
        'elementor_inspector',
        'comments',
        'wpforms-menu'
    );
 
    foreach ( $all_toolbar_nodes as $node ) {
        if ( in_array($node->id, $clear_titles) ) {
            $args = $node;
            $args->title = '';
            $wp_admin_bar->add_node( $args );
        }
    }
}
add_action( 'admin_bar_menu', 'clear_node_title', 999 );

add_filter( 'woocommerce_page_title', 'new_woocommerce_page_title');
function new_woocommerce_page_title( $page_title ) {
  if( $page_title == 'Checkout' ) {
    return "Confirm Package";  
  }  
}
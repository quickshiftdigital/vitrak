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
    wp_enqueue_script('blankslate-footer-script', 'https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyADVn98uNVdUhU3aZnIdfuMK4GCPNqbvD8', array('jquery'), '', true);
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
    if ( !is_user_logged_in() && is_page('stores')) {
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

    if(!is_user_logged_in() && is_page('stores') && checkRole('distributor') && !strpos( $_SERVER["REQUEST_URI"], "customer-logout") ) {
        wp_redirect( get_home_url() . '/account-verification/' ); 
        exit;
    }

    if(is_user_logged_in() && is_page('my-account') && !get_field('account_verification', 'user_' . get_current_user_id()) && checkRole('distributor') && !strpos( $_SERVER["REQUEST_URI"], "customer-logout") ) {
        wp_redirect(get_home_url('/account-verification/')); 
        exit;
    }

    if(is_user_logged_in() && is_page('account-verification')) {
        wp_redirect( get_home_url()); 
        exit;
    }
    
    // if(is_user_logged_in() && is_page('dashboard') && checkRole('seller') &&  !strpos( $_SERVER["REQUEST_URI"], "customer-logout") ) {
    //     wp_redirect( get_home_url() . '/checkout/' ); 
    //     exit;
    // }
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
add_action( 'init', 'blockusers_init' ); function blockusers_init() { if ( is_admin() && ! current_user_can( 'administrator' ) && ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) { wp_redirect( home_url() ); exit; } } 


add_filter( 'woocommerce_page_title', 'new_woocommerce_page_title');
function new_woocommerce_page_title( $page_title ) {
  if( $page_title == 'Checkout' ) {
    return "Confirm Package";  
  }  
}

add_filter( 'facetwp_map_init_args', function( $args ) {
    $args['init']['styles'] = json_decode( '[
        {
            "featureType": "all",
            "elementType": "labels.text",
            "stylers": [
                {
                    "color": "#878787"
                }
            ]
        },
        {
            "featureType": "all",
            "elementType": "labels.text.stroke",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "landscape",
            "elementType": "all",
            "stylers": [
                {
                    "color": "#f9f5ed"
                }
            ]
        },
        {
            "featureType": "landscape.natural",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "all",
            "stylers": [
                {
                    "color": "#f5f5f5"
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "#c9c9c9"
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "featureType": "transit",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "all",
            "stylers": [
                {
                    "color": "#aee0f4"
                }
            ]
        }
    ]' );

    return $args;
  } );


function wps_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_node('wp-logo');
    $wp_admin_bar->remove_node('about');
    $wp_admin_bar->remove_node('wporg');
    $wp_admin_bar->remove_node('documentation');
    $wp_admin_bar->remove_node('wpforms-menu');
    $wp_admin_bar->remove_node('revslider');
    $wp_admin_bar->remove_node('view-site');
}
add_action( 'wp_before_admin_bar_render', 'wps_admin_bar' );


/**
* Format WordPress User's "Display Name" to Business Name on Login
* ------------------------------------------------------------------------------
*/

// add_action( 'wp_loaded', 'fix_username');
function fix_username() {
    //Users loop
    $blogusers = get_users( array( 'role__in' => array( 'seller', 'distributor' ) ) );
    
    foreach ( $blogusers as $user ) {
        $user_nickname = get_user_meta( $user->ID, 'nickname', true );
        $business_name = get_user_meta( $user->ID, 'business_name', true );

        if( $user_nickname != $business_name ) {
            update_user_meta( $user->ID, 'nickname', $business_name );
            $userdata = array(
                'ID' => $user->ID,
                'display_name' => $business_name,
            );
    
            wp_update_user( $userdata );
        }
    }

}


add_filter( 'get_search_form', function( $form ) {
	$form = str_replace( 'name="s"', 'name="fwp_keywords"', $form );
	$form = preg_replace( '/action=".*"/', 'action="/site-search/"', $form );
	return $form;
} );


add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}
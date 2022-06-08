
<?php 
/**
 * @package vitrak
 * @subpackage bem
*  @description: This file contains all the micro functions that run the theme 
*
*/


function checkRole($role) {
    $user = wp_get_current_user();
    $response = false;

    if ( in_array( $role, (array) $user->roles ) ) {
        $response = true;            
    }

    return $response;
}

function getUserRole() {
    $response = "";

    if(checkRole('seller')) {
        $response = 'seller';
    }
    else if(checkRole('distributor')) {
        $response = 'distributor';
    }
    return $response;
}

add_action( 'template_redirect', 'quadlayers_add_to_cart_programmatically' );
function quadlayers_add_to_cart_programmatically() {
    $product_id = 4780;
    $product_cart_id = WC()->cart->generate_cart_id( $product_id );
        if(!WC()->cart->find_product_in_cart( $product_cart_id )) {  
            if(checkRole('seller')){
                WC()->cart->add_to_cart($product_id);
            }    
        }
}


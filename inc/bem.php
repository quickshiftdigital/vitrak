
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
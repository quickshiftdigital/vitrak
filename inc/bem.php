
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

function sellingStatus() {
    $response = false;

    if(get_user_meta(get_current_user_id(), 'dokan_enable_selling', true) == 'yes') {
        $response = true;
    }

    return $response;
}

function locationDetails($pincode) {
    $response = "";
    $url = "https://gist.githubusercontent.com/juzer09/2dfeac0677b55d0517b161a15cfc9c31/raw/fde8dd6cce9a5276744ec56375ffe2ada21f68c8/indian-cities-pincodes-list.json";
    $results = json_decode(file_get_contents($url), true);

    foreach($results as $result) {
        if($result['pincode'] == $pincode) {
            $response = $result;
            break;
        }
    }

    return $response;
}

add_action( 'template_redirect', 'vendorPackage_atc' );
function vendorPackage_atc() {
    $product_id = 4780;
    $product_cart_id = WC()->cart->generate_cart_id( $product_id );
        if(!WC()->cart->find_product_in_cart( $product_cart_id )) {  
            if(checkRole('seller')){
                WC()->cart->add_to_cart($product_id);
            }    
        }
}

add_action( 'woocommerce_email', 'unhook_those_pesky_emails' );

function unhook_those_pesky_emails( $email_class ) {

		/**
		 * Hooks for sending emails during store events
		 **/
		remove_action( 'woocommerce_low_stock_notification', array( $email_class, 'low_stock' ) );
		remove_action( 'woocommerce_no_stock_notification', array( $email_class, 'no_stock' ) );
		remove_action( 'woocommerce_product_on_backorder_notification', array( $email_class, 'backorder' ) );
		
		// New order emails
		remove_action( 'woocommerce_order_status_pending_to_processing_notification', array( $email_class->emails['WC_Email_New_Order'], 'trigger' ) );
		remove_action( 'woocommerce_order_status_pending_to_completed_notification', array( $email_class->emails['WC_Email_New_Order'], 'trigger' ) );
		remove_action( 'woocommerce_order_status_pending_to_on-hold_notification', array( $email_class->emails['WC_Email_New_Order'], 'trigger' ) );
		remove_action( 'woocommerce_order_status_failed_to_processing_notification', array( $email_class->emails['WC_Email_New_Order'], 'trigger' ) );
		remove_action( 'woocommerce_order_status_failed_to_completed_notification', array( $email_class->emails['WC_Email_New_Order'], 'trigger' ) );
		remove_action( 'woocommerce_order_status_failed_to_on-hold_notification', array( $email_class->emails['WC_Email_New_Order'], 'trigger' ) );
		
		// Processing order emails
		remove_action( 'woocommerce_order_status_pending_to_processing_notification', array( $email_class->emails['WC_Email_Customer_Processing_Order'], 'trigger' ) );
		remove_action( 'woocommerce_order_status_pending_to_on-hold_notification', array( $email_class->emails['WC_Email_Customer_Processing_Order'], 'trigger' ) );
		
		// Completed order emails
		remove_action( 'woocommerce_order_status_completed_notification', array( $email_class->emails['WC_Email_Customer_Completed_Order'], 'trigger' ) );
			
		// Note emails
		remove_action( 'woocommerce_new_customer_note_notification', array( $email_class->emails['WC_Email_Customer_Note'], 'trigger' ) );
}


if( current_user_can('distributor') ) {   
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 20);
} 
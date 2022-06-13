<?php 
    // define('WP_USE_THEMES', false);  
	require_once('../../../../wp-load.php');

    $GST = esc_html($_POST['distributor_gst']);
    $business_address = esc_html($_POST['business_address']);
    $distributor_city = esc_html($_POST['distributor_city']);
    $distributor_state = esc_html($_POST['distributor_state']);
    $distributor_pcode = esc_html($_POST['distributor_pcode']);
    $distributor_country = esc_html($_POST['distributor_country']);
    $distributor_shop = esc_html($_POST['distributor_shop']);
    $distributor_salesman = esc_html($_POST['distributor_salesman']);
    $distributor_delivery = esc_html($_POST['distributor_delivery']);
    $distributor_vehicle = esc_html($_POST['distributor_vehicle']);
    $distributor_turnover = esc_html($_POST['distributor_turnover']);
    $distributor_funding = esc_html($_POST['distributor_funding']);
    $distributor_shops = esc_html($_POST['distributor_shops']);

    if(!empty($distributor_pcode) && $distributor_pcode == 'true') {
        if(!empty($GST) && !empty($business_address) && !empty($distributor_city) && !empty($distributor_state) && !empty($distributor_country) && !empty($distributor_shop) && !empty($distributor_salesman) && !empty($distributor_delivery) && !empty($distributor_vehicle) && !empty($distributor_turnover) && !empty($distributor_funding) && !empty($distributor_shops)) {
                if(!username_exists($phone)) {                    
                    $user_id = wp_create_user( $phone);
                    $user = new WP_User( $user_id );
                    update_user_meta( $user_id, 'gst', $GST );
                    update_user_meta( $user_id, 'business_address', $business_address );
                    update_user_meta( $user_id, 'distributor_city', $distributor_city );
                    update_user_meta( $user_id, 'distributor_state', $distributor_state );
                    update_user_meta( $user_id, 'distributor_pincode', $distributor_pcode );
                    update_user_meta( $user_id, 'distributor_country', $distributor_country );
                    update_user_meta( $user_id, 'business_address', $business_address );
                    update_user_meta( $user_id, 'shop_type', $distributor_shop );
                    update_user_meta( $user_id, 'no_of_salesman', $distributor_salesman );
                    update_user_meta( $user_id, 'no_of_delivery_boys', $distributor_delivery );
                    update_user_meta( $user_id, 'no_of_vehicles', $distributor_vehicle );
                    update_user_meta( $user_id, 'annual_turnover', $distributor_turnover );
                    update_user_meta( $user_id, 'funding_possibilities', $distributor_funding );
                    update_user_meta( $user_id, 'no_of_shopsoutlets_covered', $distributor_shops );
                    $user->save();
                }
            }
        else {
            $response['state'] = 'Error';
            $response['message'] = 'Please fill all the fields';
        }
    }
    else {
        $response['state'] = 'Error';
        $response['message'] = 'Please verify your Pin Code number';
    }
    $response = json_encode($response, true);
    print_r($response);
?>
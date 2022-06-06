<?php 
    // define('WP_USE_THEMES', false);  
	require_once('../../../../wp-load.php');

    $GST = esc_html($_POST['vendor_gst']);
    $business_address = esc_html($_POST['business_address']);
    $vendor_ctype = esc_html($_POST['vendor_ctype']);
    $vendor_turnover = esc_html($_POST['vendor_turnover']);
    $vendor_category = esc_html($_POST['vendor_category']);
    $vendor_subcategory = esc_html($_POST['vendor_subcategory']);
    $vendor_yearbusiness = esc_html($_POST['vendor_yearbusiness']);
    $vendor_name = esc_html($_POST['vendor_name']);
    $vendor_mobile = esc_html($_POST['vendor_mobile']);
    $vendor_email = esc_html($_POST['vendor_email']);
    $vendor_designation = esc_html($_POST['vendor_designation']);

    if(!empty($vendor_ctype) && $vendor_ctype == 'true') {
        if(!empty($GST) && !empty($business_address) && !emptyZz($vendor_ctype) && !empty($vendor_turnover) && !empty($vendor_category) && !empty($vendor_subcategory) && !empty($vendor_yearbusiness) && !empty($vendor_name) && !empty($vendor_mobile) && !empty($vendor_email) && !empty($vendor_designation)) {
                if(!username_exists($phone)) {                    
                    $user_id = wp_create_user( $phone);
                    $user = new WP_User( $user_id );
                    update_user_meta( $user_id, 'gst', $GST ); //update_field
                    update_user_meta( $user_id, 'business_address', $business_address );
                    update_user_meta( $user_id, 'company_type', $vendor_ctype );
                    update_user_meta( $user_id, 'annual_turnover', $vendor_turnover );
                    update_user_meta( $user_id, 'category', $vendor_category );
                    update_user_meta( $user_id, 'sub_category', $vendor_subcategory );
                    update_user_meta( $user_id, 'no_of_years_in_business', $vendor_yearbusiness );
                    update_user_meta( $user_id, 'name', $vendor_name );
                    update_user_meta( $user_id, 'mobile', $vendor_mobile );
                    update_user_meta( $user_id, 'email', $vendor_email );
                    update_user_meta( $user_id, 'designation', $vendor_designation );
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
        $response['message'] = 'Please verify your company type';
    }
    $response = json_encode($response, true);
    print_r($response);
?>
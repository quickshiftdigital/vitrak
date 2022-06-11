<?php
// define('WP_USE_THEMES', false);  
require_once('../../../../wp-load.php');
the_post();

$stage = sanitize_text_field($_POST['stage']);
$response = array();

if ($stage == 'GET OTP') {
    $phone = sanitize_text_field($_POST['reg_phone']);

    if (!empty($phone)) {
        $user = get_user_by('login', $phone);

        if ($user) {
            $response['status'] = 'Error';
            $response['message'] = 'Phone number already exists';
        } 
        else {
            $sms = sendSMS($phone, 'OTP', '');

            $response['sms'] = $sms;
            $response['phone'] = $phone;
            $response['status'] = 'Success';
            $response['message'] = 'Phone number is valid';
        }
    } 
    else {
        $response['status'] = 'Error';
        $response['message'] = 'Phone number is required';
    }
} 
else if ($stage == 'VERIFY OTP') {
    $phone = sanitize_text_field($_POST['reg_phone']);
    $otp = sanitize_text_field($_POST['reg_otp']);
    $logID = sanitize_text_field($_POST['reg_logID']);

    if (!empty($otp) && !empty($logID)) {
        $otp_verify = checkOTP($logID, $otp);

        if ($otp_verify['status']) {
            $response['phone'] = $phone;
            $response['status'] = 'Success';
            $response['message'] = 'Phone number is valid';
        } 
        else {
            $response['result'] = $otp_verify;
            $response['data'] = $_POST;
            $response['logID'] = $logID;
            $response['status'] = 'Error';
            $response['message'] = 'Please Enter the Correct OTP';
        }
    } 
    else {
        $response['data'] = $_POST;
        $response['logID'] = $logID;
        $response['status'] = 'Error';
        $response['message'] = 'Please Enter the Correct OTP';
    }
} 
else if ($stage == 'First') {
    $phone = sanitize_text_field($_POST['reg_phone']);
} 
else if ($stage == 'Second') {
    $reg_phone = sanitize_text_field($_POST['sc_reg_phone']);
    $reg_firstname = sanitize_text_field($_POST['reg_first_name']);
    $reg_lastname = sanitize_text_field($_POST['reg_last_name']);
    $reg_username = esc_html($_POST['sc_reg_phone']);
    $reg_email = esc_html($_POST['reg_email']);
    $reg_password = esc_html($_POST['reg_password']);
    $reg_cpassword = esc_html($_POST['reg_cpassword']);
    $business_name = esc_html($_POST['business_name']);
    $pincode = esc_html($_POST['business_pincode']);
    $business_type = esc_html($_POST['reg_businesstype']);

    if (!empty($reg_phone) && !empty($reg_email) && !empty($reg_firstname) && !empty($reg_lastname) && !empty($reg_password) && !empty($business_name)  && !empty($pincode) && !empty($business_type)) {
        if (is_email($reg_email)) {
            if(strpos($reg_phone, '+') == false && strlen($reg_phone) == 10) {
                if (!username_exists($phone)) {
                    if(!email_exists($reg_email)) {
                        if($reg_password == $reg_cpassword) {

                            $user_id = wp_create_user($reg_username, $reg_password, $reg_email);
                            if (!is_wp_Error($user_id)) {
                                $user = new WP_User($user_id);

                                //User Role
                                if($business_type == 'Vendor') {
                                    $role = 'seller'; 
                                }
                                else {
                                    $role = strtolower($business_type);
                                }
                                $user->set_role($role);

                                //User Meta
                                $location = locationDetails($pincode);
                                $user_meta = array(
                                    'first_name' => $reg_firstname,
                                    'billing_first_name' => $reg_firstname,
                                    'last_name' => $reg_lastname,
                                    'billing_last_name' => $reg_lastname,
                                    'phone' => $reg_phone,
                                    'shipping_phone' => $reg_phone,
                                    'business_name' => $business_name,
                                    'billing_company' => $business_name,
                                    'dokan_company_name' => $business_name,
                                    'dokan_store_url' => strtolower(str_replace(' ', '_', $business_name)),
                                    'dokan_store_name' => $business_name,
                                    'business_pincode' => $pincode,
                                    'business_type' => $business_type,
                                    'billing_phone' => $reg_phone,
                                    'dokan_store_phone' => $reg_phone,
                                    'billing_email' => $reg_email,
                                    'billing_first_name' => $reg_firstname,
                                    'billing_last_name' => $reg_lastname,
                                    'billing_company' => $business_name,
                                    'billing_postcode' => $pincode,
                                    'dokan_store_address[zip]' => $pincode,
                                    'billing_city' => $location['city'],
                                    'dokan_store_address[city]' => $location['city'],
                                    'billing_state' => $location['state_code'],
                                    'dokan_store_address[state]' => $location['state_code'],
                                    'billing_country' => 'IN',
                                    'dokan_store_address[country]' => 'IN'
                                );
                                foreach ($user_meta as $key => $value) {
                                    update_user_meta($user_id, $key, $value);
                                }

                                update_field('pincode', $pincode, 'user_' . $user_id); // update pincode field
            
                                //Log the User In
                                $user = get_user_by('id', $user_id);
                                if ($user) {
                                    clean_user_cache($user->ID);
                                    wp_clear_auth_cookie();
                                    wp_set_current_user($user->ID);
                                    wp_set_auth_cookie($user->ID, true, false);
                                    update_user_caches($user);
                                }

                                //Send Email
            
                                //Response
                                $response['state'] = 'Success';
                                $response['message'] = 'Vendor registered successfully';
                                $response['business_type'] = $business_type;
                                $response['user_id'] = $user_id;
                                $response['login'] = $phone;
            
                                if ($mail) {
                                    $response['email_state'] = 'Error';
                                    $response['email_message'] = 'Error in sending email';
                                }
                            }
                        }
                        else {
                            $response['state'] = 'Error';
                            $response['message'] = 'Passwords do not match';
                        }
                    }
                    else {
                        $response['state'] = 'Error';
                        $response['message'] = 'Email already exists';
                    }
                } 
                else {
                    $response['state'] = 'Error';
                    $response['message'] = 'User with this phone number exists';
                }
            }
            else {
                $response['state'] = 'Error';
                $response['message'] = 'Phone number is not valid';
            }
        } 
        else {
            $response['state'] = 'Error';
            $response['message'] = 'Enter a valid email address';
        }
    } 
    else {
        $response['state'] = 'Error';
        $response['message'] = 'Please fill all the fields';
    }
}

$response = json_encode($response, true);
print_r($response);

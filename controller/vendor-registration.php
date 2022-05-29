<?php
// define('WP_USE_THEMES', false);  
require_once('../../../../wp-load.php');
the_post();

$stage = sanitize_text_field($_POST['stage']);
$response = array();

if ($stage == 'GET OTP') {
    $phone = sanitize_text_field($_POST['phone']);
    if (!empty($phone)) {
        $user = get_user_by('login', $phone);
        if ($user) {
            $response['status'] = 'error';
            $response['message'] = 'Phone number already exists';
        } else {
            $response['phone'] = $phone;
            $response['status'] = 'success';
            $response['message'] = 'Phone number is valid';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Phone number is required';
    }
} else if ($stage == 'First') {
    $phone = sanitize_text_field($_POST['reg_phone']);
} else if ($stage == 'Second') {
    $reg_phone = sanitize_text_field($_POST['reg_phone']);
    $reg_username = esc_html($_POST['reg_username']);
    $reg_email = esc_html($_POST['reg_email']);
    $reg_password = esc_html($_POST['reg_password']);
    $business_name = esc_html($_POST['business_name']);
    $business_address = esc_html($_POST['business_address']);
    $business_type = esc_html($_POST['business_type']);

    if (!empty($reg_phone) && !empty($reg_username) && !empty($reg_email) && !empty($reg_password) && !empty($business_name)  && !empty($business_address) && !empty($business_type)) {
        if (is_email($reg_email)) {
            if (!username_exists($phone)) {
                $user_id = wp_create_user($phone, $reg_password, $reg_email);
                if (!is_wp_error($user_id)) {
                    $user = new WP_User($user_id);
                    $user->set_role('pending_vendor');
                    update_user_meta($user_id, 'phone', $phone);
                    update_user_meta($user_id, 'username', $reg_username);
                    update_user_meta($user_id, 'reg_email', $reg_email);
                    update_user_meta($user_id, 'reg_password', $reg_password);
                    update_user_meta($user_id, 'business_name', $business_name);
                    update_user_meta($user_id, 'business_address', $business_address);
                    update_user_meta($user_id, 'business_type', $business_type);
                    $user->save();

                    //Log the User In
                    $user = get_user_by('id', $user_id);
                    if ($user) {
                        clean_user_cache($user->ID);
                        wp_clear_auth_cookie();
                        wp_set_current_user($user->ID);
                        wp_set_auth_cookie($user->ID, true, false);
                        update_user_caches($user);
                    }

                    //Send an Email
                    $to = $email;
                    $subject = 'Welcome to Vitrak';
                    $message = '<div style="max-width: 560px; padding: 20px; background: #ffffff; border-radius: 5px; margin: 40px auto; font-family: Open Sans,Helvetica,Arial; font-size: 15px; color: #666;">
                            <div style="color: #444444; font-weight: normal;">
                            <div style="text-align: center; font-weight: 600; font-size: 26px; padding: 10px 0; border-bottom: solid 3px #eeeeee;"><a href="' . home_url() . '"><img src="https://lofaroshop.com/wp-content/uploads/2020/12/black-lofaro-1.png"></div>
                            <div style="clear: both;"> </div>
                            </div>
                            <div style="padding: 0 30px 30px 30px; border-bottom: 3px solid #eeeeee;">
                            <div style="padding: 30px 0; font-size: 24px; text-align: center; line-height: 40px;">Thank you for your interest in Vitrak online. We are currently reviewing your Store Information.<span style="display: block;"> Somebody from our team will contact you shortly.</span></div>
                            <div style="padding: 15px; background: #eee; border-radius: 3px; text-align: center;">Need help? <a style="color: #3ba1da; text-decoration: none;" href="mailto:support@vitrakonline.com">Contact Us</a> today.</div>
                            </div>
                            <div style="color: #999; padding: 20px 30px;">
                            <div>Thank You!</div>
                            <div>The <a style="color: #3ba1da; text-decoration: none;" href="' . home_url() . '">Vitrak Shop</a> Team</div>
                            </div>
                            </div>';
                    $headers['Content-Type'] = 'text/html; charset=UTF-8';
                    $headers['Bcc'] = 'info@vitrak.in, juzer@quickshiftdigital.com';
                    $mail = wp_mail($to, $subject, $message, $headers);

                    $response['state'] = 'Success';
                    $response['message'] = 'Vendor registered successfully';
                    $response['user_id'] = $user_id;
                    $response['login'] = $phone;

                    if ($mail) {
                        $response['email_state'] = 'Error';
                        $response['email_message'] = 'Error in sending email';
                    }
                }
            } else {
                $response['state'] = 'Error';
                $response['message'] = 'User with this phone number exists';
            }
        } else {
            $response['state'] = 'Error';
            $response['message'] = 'Enter a valid email address';
        }
    } else {
        $response['state'] = 'Error';
        $response['message'] = 'Please fill all the fields';
    }
}

$response = json_encode($response, true);
print_r($response);

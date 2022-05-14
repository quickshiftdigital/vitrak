<?php 
    // define('WP_USE_THEMES', false);  
	require_once('../../../../wp-load.php');
    the_post();

    $phone = esc_html($_POST['vn_phone']);
    $first_name = esc_html($_POST['vn_first_name']);
    $last_name = esc_html($_POST['vn_last_name']);
    $password = esc_html($_POST['vn_password']);
    $email = esc_html($_POST['vn_email']);
    $phone_verify = esc_html($_POST['vn_phone_verify']);

    if(!empty($phone_verify) && $phone_verify == 'true') {
        if(!empty($phone) && !empty($first_name) && !empty($last_name) && !empty($password) && !empty($email)) {
            if(is_email($email)) {
                if(!username_exists($phone)) {                    
                    $user_id = wp_create_user( $phone, $password, $email );
                    if ( ! is_wp_error( $user_id ) ) {
                        $user = new WP_User( $user_id );
                        $user->set_role( 'pending_vendor' );
                        update_user_meta( $user_id, 'first_name', $first_name );
                        update_user_meta( $user_id, 'last_name', $last_name );
                        update_user_meta( $user_id, '_wcv_store_phone', $phone );
                        $user->save();

                        //Log the User In
                        $user = get_user_by( 'id', $user_id ); 
                        if( $user ) {
                            clean_user_cache($user->ID);
                            wp_clear_auth_cookie();
                            wp_set_current_user($user->ID);
                            wp_set_auth_cookie($user->ID, true, false);
                            update_user_caches($user);
                        }

                        //Send an Email
                        $to = $email;
                        $subject = 'Welcome to Lo Faro Shop';
                        $message = '<div style="max-width: 560px; padding: 20px; background: #ffffff; border-radius: 5px; margin: 40px auto; font-family: Open Sans,Helvetica,Arial; font-size: 15px; color: #666;">
                        <div style="color: #444444; font-weight: normal;">
                        <div style="text-align: center; font-weight: 600; font-size: 26px; padding: 10px 0; border-bottom: solid 3px #eeeeee;"><a href="'. home_url() . '"><img src="https://lofaroshop.com/wp-content/uploads/2020/12/black-lofaro-1.png"></div>
                        <div style="clear: both;"> </div>
                        </div>
                        <div style="padding: 0 30px 30px 30px; border-bottom: 3px solid #eeeeee;">
                        <div style="padding: 30px 0; font-size: 24px; text-align: center; line-height: 40px;">Thank you for your interest in Lo Faro Shop. We are currently reviewing your application.<span style="display: block;"> Somebody from our team will contact you shortly.</span></div>
                        <div style="padding: 15px; background: #eee; border-radius: 3px; text-align: center;">Need help? <a style="color: #3ba1da; text-decoration: none;" href="mailto:support@lofaroshop.com">Contact Us</a> today.</div>
                        </div>
                        <div style="color: #999; padding: 20px 30px;">
                        <div>Thank You!</div>
                        <div>The <a style="color: #3ba1da; text-decoration: none;" href="' . home_url() . '">Lo Faro Shop</a> Team</div>
                        </div>
                        </div>';
                        $headers['Content-Type'] = 'text/html; charset=UTF-8';
                        $headers['Bcc'] = 'juzer@lofaroshop.com, info@lofaroshop.com';
                        $mail = wp_mail( $to, $subject, $message, $headers );
                        
                        $response['state'] = 'Success';
                        $response['message'] = 'Vendor registered successfully';
                        $response['user_id'] = $user_id;
                        $response['login'] = $phone;

                        if($mail) {
                           $response['email_state'] = 'Error';
                           $response['email_message'] = 'Error in sending email';
                        }
                    }
                }
                else {
                    $response['state'] = 'Error';
                    $response['message'] = 'User with this phone number exists';
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
    else {
        $response['state'] = 'Error';
        $response['message'] = 'Please verify your phone number';
    }
    
    $response = json_encode($response, true);
    print_r($response);
?>
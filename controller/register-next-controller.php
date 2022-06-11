<?php

    // define('WP_USE_THEMES', false);  
    require_once('../../../../wp-load.php');
    the_post();
    
    $user_role = sanitize_text_field($_POST['user_role']);
    $response = array();
    if($user_role == 'seller') {
        //Data Validation
        $gst = sanitize_text_field($_POST['reg_gst']);
        $billing_address_1 = sanitize_text_field($_POST['reg_address_1']);
        $billing_address_2 = sanitize_text_field($_POST['reg_address_2']);
        $billing_city = sanitize_text_field($_POST['reg_city']);
        $billing_state = sanitize_text_field($_POST['reg_state']);
        $billing_postcode = sanitize_text_field($_POST['reg_pincode']);
        $billing_country = sanitize_text_field($_POST['reg_country']);
        $company_type = sanitize_text_field($_POST['reg_company_type']);
        $annual_turnover = sanitize_text_field($_POST['reg_turnover']);
        $category = sanitize_text_field($_POST['reg_category']);
        $sub_category = sanitize_text_field($_POST['reg_sub_category']);
        $no_of_years_in_business = sanitize_text_field($_POST['reg_business_years']);
        $user_id = sanitize_text_field($_POST['user_id']);
        // $email = sanitize_text_field($_POST['email']);
        //$designation = sanitize_text_field($_POST['reg_designation']);

        if (!empty($gst) && !empty($billing_address_1) && !empty($billing_city) && !empty($billing_state) && !empty($billing_postcode)  && !empty($company_type)  && !empty($billing_country) && !empty($annual_turnover) && !empty($category) && !empty($sub_category)  && !empty($no_of_years_in_business)) {
            if (($user_id)) {
                $user = get_user_by('id', $user_id);
                //User Meta
                $the_user = get_userdata( $user_id );
                $email = $the_user->user_email;
                $user_meta = array(
                    'gst' => $gst,
                    'billing_address_1' => $billing_address_1,
                    'billing_address_2' => $billing_address_2,
                    'billing_city' => $billing_city,
                    'billing_state' => $billing_state,
                    'billing_postcode' => $billing_postcode,
                    'billing_country' => $billing_country,
                    'company_type' => $company_type,
                    'annual_turnover' => $annual_turnover,
                    'category' => $category,
                    'sub_category' => $sub_category,
                    'no_of_years_in_business' => $no_of_years_in_business
                    // 'name' => $name,
                    // 'email' => $email,
                    //'designation' => $designation,
                );
                foreach ($user_meta as $key => $value) {
                    update_user_meta($user_id, $key, $value);
                }

                //Send Email
                //@umesh1995 Please add the send email code. Basic Email that says account under verification.
                // $to = $email;
                // $subject = 'Welcome to Vitrak';
                // $message = '<div style="max-width: 560px; padding: 20px; background: #ffffff; border-radius: 5px; margin: 40px auto; font-family: Open Sans,Helvetica,Arial; font-size: 15px; color: #666;">
                //             <div style="color: #444444; font-weight: normal;">
                //             <div style="text-align: center; font-weight: 600; font-size: 26px; padding: 10px 0; border-bottom: solid 3px #eeeeee;"><a href="' . home_url() . '"></div>
                //             <div style="clear: both;"> </div>
                //             </div>
                //             <div style="padding: 0 30px 30px 30px; border-bottom: 3px solid #eeeeee;">
                //             <div style="padding: 30px 0; font-size: 24px; text-align: center; line-height: 40px;">Thank you for your interest in Vitrak online. We are currently reviewing your Store Information.<span style="display: block;"> Somebody from our team will contact you shortly.</span></div>
                //             <div style="padding: 15px; background: #eee; border-radius: 3px; text-align: center;">Need help? <a style="color: #3ba1da; text-decoration: none;" href="mailto:support@vitrakonline.com">Contact Us</a> today.</div>
                //             </div>
                //             <div style="color: #999; padding: 20px 30px;">
                //             <div>Thank You!</div>
                //             <div>The <a style="color: #3ba1da; text-decoration: none;" href="' . home_url() . '">Vitrak Shop</a> Team</div>
                //             </div>
                //             </div>';
                // $headers['Content-Type'] = 'text/html; charset=UTF-8';
                // $headers['Bcc'] = 'info@vitrak.in, juzer@quickshiftdigital.com';
                // $mail = wp_mail($to, $subject, $message, $headers);

                // if ($mail) {
                //     $response['email_state'] = 'Error';
                //     $response['email_message'] = 'Error in sending email';
                // }

                
                //Response
                $response['state'] = 'Success';
                $response['message'] = 'Vendor registered successfully';
                $response['business_type'] = $user_role;
                $response['user_id'] = $user_id;
                $response['login'] = $phone;

                
            }
        }
        else {
            $response['state'] = 'Error';
            $response['message'] = 'Please fill all the fields';
        }
    }
    else if($user_role == 'distributor') {
        $gst = sanitize_text_field($_POST['reg_gst']);
        $billing_address_1 = sanitize_text_field($_POST['reg_address_1']);
        $billing_address_2 = sanitize_text_field($_POST['reg_address_2']);
        $billing_city = sanitize_text_field($_POST['reg_city']);
        $billing_state = sanitize_text_field($_POST['reg_state']);
        $billing_postcode = sanitize_text_field($_POST['reg_pincode']);
        $billing_country = sanitize_text_field($_POST['reg_country']);
        $reg_shop_type = sanitize_text_field($_POST['reg_shop_type']);
        $reg_salesmen = sanitize_text_field($_POST['reg_salesmen']);
        $reg_deliver_boys = sanitize_text_field($_POST['reg_deliver_boys']);
        $reg_vehicle_no = sanitize_text_field($_POST['reg_vehicle_no']);
        $reg_turnover = sanitize_text_field($_POST['reg_turnover']);
        $reg_funding_posibility = sanitize_text_field($_POST['reg_funding_posibility']);
        $reg_shops = sanitize_text_field($_POST['reg_shops']);
        $user_id = sanitize_text_field($_POST['user_id']);

        if (!empty($gst) && !empty($billing_address_1) && !empty($billing_address_2) && !empty($billing_city) && !empty($billing_state) && !empty($billing_postcode)  && !empty($billing_country) && !empty($reg_shop_type) && !empty($reg_salesmen) && !empty($reg_deliver_boys)  && !empty($reg_vehicle_no)  && !empty($reg_turnover) && !empty($reg_funding_posibility) && !empty($reg_shops)) {
            if (($user_id)) {
                $user = get_user_by('id', $user_id);
                //User Meta
                $the_user = get_userdata( $user_id );
                $email = $the_user->user_email;
                $user_meta = array(
                    'gst' => $gst,
                    'billing_address_1' => $billing_address_1,
                    'billing_address_2' => $billing_address_2,
                    'distributor_city' => $billing_city,
                    'billing_city' => $billing_city,
                    'distributor_state' => $billing_state,
                    'billing_state' => $billing_state,
                    'distributor_pincode' => $billing_postcode,
                    'distributor_country' => $billing_country,
                    'shop_type' => $reg_shop_type,
                    'no_of_salesman' => $reg_salesmen,
                    'no_of_delivery_boys' => $reg_deliver_boys,
                    'no_of_vehicles' => $reg_vehicle_no,
                    'annual_turnover' => $reg_turnover,
                    'funding_possibilities' => $reg_funding_posibility,
                    'no_of_shopsoutlets_covered' => $reg_shops,
                );
                foreach ($user_meta as $key => $value) {
                    update_user_meta($user_id, $key, $value);
                }

                //Send Email
                //@umesh1995 Please add the send email code. Basic Email that says account under verification.
                // $to = $email;
                // $subject = 'Welcome to Vitrak';
                // $message = '<div style="max-width: 560px; padding: 20px; background: #ffffff; border-radius: 5px; margin: 40px auto; font-family: Open Sans,Helvetica,Arial; font-size: 15px; color: #666;">
                //             <div style="color: #444444; font-weight: normal;">
                //             <div style="text-align: center; font-weight: 600; font-size: 26px; padding: 10px 0; border-bottom: solid 3px #eeeeee;"><a href="' . home_url() . '"></div>
                //             <div style="clear: both;"> </div>
                //             </div>
                //             <div style="padding: 0 30px 30px 30px; border-bottom: 3px solid #eeeeee;">
                //             <div style="padding: 30px 0; font-size: 24px; text-align: center; line-height: 40px;">Thank you for your interest in Vitrak online. We are currently reviewing your Store Information.<span style="display: block;"> Somebody from our team will contact you shortly.</span></div>
                //             <div style="padding: 15px; background: #eee; border-radius: 3px; text-align: center;">Need help? <a style="color: #3ba1da; text-decoration: none;" href="mailto:support@vitrakonline.com">Contact Us</a> today.</div>
                //             </div>
                //             <div style="color: #999; padding: 20px 30px;">
                //             <div>Thank You!</div>
                //             <div>The <a style="color: #3ba1da; text-decoration: none;" href="' . home_url() . '">Vitrak Shop</a> Team</div>
                //             </div>
                //             </div>';
                // $headers['Content-Type'] = 'text/html; charset=UTF-8';
                // $headers['Bcc'] = 'info@vitrak.in, juzer@quickshiftdigital.com';
                // $mail = wp_mail($to, $subject, $message, $headers);

                // if ($mail) {
                //     $response['email_state'] = 'Error';
                //     $response['email_message'] = 'Error in sending email';
                // }

                
                //Response
                $response['state'] = 'Success';
                $response['message'] = 'Distributor registered successfully';
                $response['business_type'] = $user_role;
                $response['user_id'] = $user_id;
                $response['login'] = $phone;

                
            }
        }
        else {
            $response['state'] = 'Error';
            $response['message'] = 'Please fill all the fields';
        }       

    }
    else {
        $response['status'] = 'error';
        $response['message'] = 'User role is required';
    }

    $response = json_encode($response, true);
    print_r($response);


?>
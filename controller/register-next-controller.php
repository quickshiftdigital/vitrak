<?php

    // define('WP_USE_THEMES', false);  
    require_once('../../../../wp-load.php');
    
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
        $store_url = sanitize_text_field($_POST['reg_store_url']);
        // $email = sanitize_text_field($_POST['email']);
        //$designation = sanitize_text_field($_POST['reg_designation']);

        if (!empty($gst) && !empty($billing_address_1) && !empty($billing_city) && !empty($billing_state) && !empty($billing_postcode)  && !empty($company_type)  && !empty($billing_country) && !empty($annual_turnover) && !empty($category) && !empty($sub_category)  && !empty($no_of_years_in_business) && !empty($user_id) && !empty($store_url)) {
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
                    'store-name' => $store->name,
<<<<<<< HEAD
                    'no_of_years_in_business' => $no_of_years_in_business,
                    'limited_liability_partnership_llp' => $limited_liability_partnership_llp,
                    'user_nicename' => $store_url
=======
                    'no_of_years_in_business' => $no_of_years_in_business
>>>>>>> 63a504891237c2d0140b7368782ed14e3627e7df
                    // 'name' => $name,
                    // 'email' => $email,
                    //'designation' => $designation,
                );
                foreach ($user_meta as $key => $value) {
                    update_user_meta($user_id, $key, $value);
                }
<<<<<<< HEAD
                wp_update_user(
                    array(
                        'ID'            => $user_id,
                        'user_nicename' => sanitize_title( $store_url ),
                    )
                );

=======
>>>>>>> 63a504891237c2d0140b7368782ed14e3627e7df
                function wpdocs_set_html_mail_content_type() {
                    return 'text/html';
                }
                add_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );
                //Send Email
                //@umesh1995 Please add the send email code. Basic Email that says account under verification.
                $to = $email;
                $headers[] = 'Cc: info@vitrak.in';
                $subject = 'Welcome to Vitrak';
<<<<<<< HEAD
                $message = 'Dear .$user->user_firstname.<br><br>
							We noticed you haven’t completed your registration yet<br>
							To get instant and unlimited access to the database, click here: <a href="' . home_url() . '/register/">Register Now</a> today.<br>
							<br><br>
							Regards<br>
							Team Vitrak<br>
							Extend your Reach<br>';
=======
                $message = '<a href="' . home_url() . '">
                            We noticed you haven’t completed your registration yet. To get instant and unlimited access to the database<br>
                            Need help? <a style="color: #3ba1da; text-decoration: none;" href="mailto:info@vitrak.in">Contact Us</a> today.<br>
                            <br><br>
                            Regards
                            Team Vitrak
                            The <a style="color: #3ba1da; text-decoration: none;" href="' . home_url() . '">Vitrak Shop</a> Team';
>>>>>>> 63a504891237c2d0140b7368782ed14e3627e7df
                $headers['Content-Type'] = 'text/html; charset=UTF-8';
                $headers['MIME-Version'] = "1.0";
                $headers['Bcc'] = 'info@vitrak.in, juzer@quickshiftdigital.com';
                $mail = wp_mail($to, $subject, $message, $headers);
                if ($mail) {
                    $response['email_state'] = 'Error';
                    $response['email_message'] = 'Error in sending email';
                }
                remove_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );

                
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
        $funding_number = sanitize_text_field($_POST['funding_number']);
        $how_much_storage_space = sanitize_text_field($_POST[' how_much_storage_space']);
        $user_id = sanitize_text_field($_POST['user_id']);

        if (!empty($gst) && !empty($billing_address_1) && !empty($billing_city) && !empty($billing_state) && !empty($billing_postcode)  && !empty($billing_country) && !empty($reg_shop_type) && !empty($reg_salesmen) && !empty($reg_deliver_boys)  && !empty($reg_vehicle_no)  && !empty($reg_turnover) && !empty($reg_funding_posibility) && !empty($reg_shops)) {
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
                    'how_much_funding' => $funding_number,
                    'how_much_storage_space' =>$how_much_storage_space,
                );
                foreach ($user_meta as $key => $value) {
                    update_user_meta($user_id, $key, $value);
                }

                // Send Email
                // @umesh1995 Please add the send email code. Basic Email that says account under verification.
                function wpdocs_set_html_mail_content_type() {
                    return 'text/html';
                }
                add_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );
                $to = $email;
                $subject = 'Welcome to Vitrak';
                $headers[] = 'Cc: info@vitrak.in';
<<<<<<< HEAD
                $message = 'Dear <br><br>
							We noticed you haven’t completed your registration yet.<br>
							To get free and unlimited access to the database, click here: <a href="' . home_url() . '/register/">Register Now</a> today.<br>
							You are one click away from expanding your business! <a href="' . home_url() . '/register/">Register with Vitrak</a>
							<br><br>
							Regards<br>
							Team Vitrak<br>
							Extend your Reach<br>';
=======
                $message = '<a href="' . home_url() . '"><br><br>
                            <p>We noticed you haven’t completed your registration yet. To get free and unlimited access to the database, click here: .<span style="display: block;"> You are one click away from expanding your business!</span></div><br><br>
                            <p style="padding: 15px; background: #eee; border-radius: 3px; text-align: center;">Need help? <a style="color: #3ba1da; text-decoration: none;" href="mailto:info@vitrak.in">Contact Us</a> today.</p><br><br>
                            </p><br><br>
                            <p>Thank You!</p><br>
                            <p>The <a style="color: #3ba1da; text-decoration: none;" href="' . home_url() . '">Vitrak Shop</a> Team</p>
                            ';
>>>>>>> 63a504891237c2d0140b7368782ed14e3627e7df
                            $headers['Content-Type'] = 'text/html; charset=UTF-8';
                            $headers['MIME-Version'] = "1.0";
                            $headers['Bcc'] = 'info@vitrak.in, juzer@quickshiftdigital.com';
                            $mail = wp_mail($to, $subject, $message, $headers);
                    if ($mail) {
                        $response['email_state'] = 'Error';
                        $response['email_message'] = 'Error in sending email';
                    }
                    remove_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );
            
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
<?php

    // define('WP_USE_THEMES', false);  
    require_once('../../../../wp-load.php');
    the_post();

    $username = sanitize_text_field($_POST['username']);
    $password = sanitize_text_field($_POST['password']);

    if (!empty($username) && !empty($password)) {
        if (username_exists($username) || email_exists($username)) {
            if(!is_user_logged_in()) {

                //Log the User In
                $user = get_user_by('login', $username);                
                if (wp_check_password($password, $user->user_pass, $user->ID)) {
                    clean_user_cache($user->ID);
                    wp_clear_auth_cookie();
                    wp_set_current_user($user->ID);
                    wp_set_auth_cookie($user->ID, true, false);
                    update_user_caches($user);

                    $response = array(
                        'status' => 'Success',
                        'message' => 'Login Successful'
                    );
                }
                else {
                    $response['status'] = 'Error';
                    $response['message'] = 'Invalid Password';
                }
            }
            else {
                wp_logout();
                
                $response['status'] = 'Error';
                $response['message'] = 'You are not logged in.';    
            }
        }
        else {
            $response['status'] = 'Error';
            $response['message'] = 'User account does not exist.';
        }
    }
    else {
        $response['state'] = 'Error';
        $response['message'] = 'Please Enter Username and Password';
    } 

$response = json_encode($response, true);
print_r($response);

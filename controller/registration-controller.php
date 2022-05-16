<?php
// define('WP_USE_THEMES', false);  
require_once('../../../../wp-load.php');
the_post();

$data = json_encode($_POST, true);
$response = array();
$response['data'] = $data;
$response['status'] = 'success';

//Need registration.php for data validation
$firstname = sanitize_text_field( $form_data['firstname'] );
$lastname = sanitize_text_field( $form_data['lastname'] );
$phonenumber = sanitize_text_field( $form_data['phonenumber'] );
$email = sanitize_text_field( $form_data['email'] );
$password = sanitize_text_field( $form_data['password'] );

//Create the user
$user_pass = wp_generate_password();
$user = array(
    'user_login' => $username,
    'user_pass' => $user_pass,
    'first_name' => $firstname,
    'last_name' => $lastname,
    'user_email' => $email,
    'phone_number' =>$phonenumber,
    'password' => $password
    );
$user_id = wp_insert_user( $user );

json_encode($response, true);
print_r($response);

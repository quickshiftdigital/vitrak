<?php
    /**
     * Resend OTP Controller
     */

    require_once('../../../../wp-load.php');

    $response = array();
    $phone = sanitize_text_field($_POST['phone']);
    $sms = sendSMS($phone, 'OTP', '');

    $response['sms'] = $sms;
    $response['phone'] = $phone;
    $response['status'] = 'Success';
    $response['message'] = 'Phone number is valid';

    $response = json_encode($response, true);
    print_r($response);
?>

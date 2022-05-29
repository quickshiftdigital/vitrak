<?php

/**
 * @package vitrak
 * @subpackage textlocal
 * @description: This file contains the functions that are used to send the SMS and Email to the user.
 */


function sendSMS($to, $message, $otp = "", $user_id = "")
{
    if (empty($otp)) {
        $otp = OTP('Save', $user_id);
        $otp = $otp['otp'];
    }

    // Account details
    $apiKey = urlencode('NGI0ODQ4NzE1NDMyNDIzMjU0NDM2ZDUzNDkzNTZmNzU=');

    // Message details
    $numbers = array($to);
    $sender = urlencode('TXTLCL');
    $message = rawurlencode('Your OTP for Vitrak is - ');
    $numbers = implode(',', $numbers);

    // Prepare data for POST request
    $data = array(
        'apikey' => $apiKey,
        'numbers' => $numbers,
        "sender" => $sender,
        "message" => $message
    );

    // Send the POST request with cURL
    $ch = curl_init('https://api.textlocal.in/send/');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Process your response here
    return $response;
}

function OTP($status, $user, $otp = "")
{
    $response = array();

    if ($status == 'Save') {
        $otp = rand(100000, 999999);
        saveOTP($user, $otp);
    } else if ($status == 'Verify') {
        $response = verifyOTP($user, $otp);
    }

    function saveOTP($user, $otp)
    {
        update_field('otp', $otp, 'user_' . $user);
    }

    function verifyOTP($user, $otp)
    {
        $saved_otp = get_field('otp', 'user_' . $user);
        $response = array();

        if ($otp == $saved_otp) {
            $response['status'] = 'success';
            $response['message'] = 'OTP verified';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'OTP not verified';
        }
    }

    $response['otp'] = $otp;
    return $response;
}

<?php

/**
 * @package vitrak
 * @subpackage textlocal
 * @description: This file contains the functions that are used to send the SMS and Email to the user.
 */

// Account details
$apiKey = 'be6fe2a0e46c7f1b';
global $apiKey;

function sendSMS($to, $message= "", $otp = "", $user_id = "") {
    global $apiKey;
    if (empty($otp)) {
        $otp = OTP('Save', $to);
        $otp = $otp['otp'];
    }

    // Message details
    if(empty($message)) {
        $message = "4661";
    }
    else {
        $message = fetchMessage($message);
    }

    $request_url = 'https://api.authkey.io/request?authkey=' . $apiKey . '&mobile=' . $to . '&country_code=91&sid=' . $message . '&2fa=1234&company=Vitrak&time=10';
    $response = file_get_contents($request_url);
    $response = json_decode($response, true);
    
    return $response;
}

function checkOTP($logID, $otp) {
    global $apiKey;

    $request_url = 'https://authkey.io/api/2fa_verify.php?authkey=' . $apiKey .'&channel=sms&otp=' . $otp . '&logid=' . $logID;
    $response = file_get_contents($request_url);
    $response = json_decode($response, true);
    
    return $response;
}

function OTP($status, $otp = "") {
    $response = array();

    if ($status == 'Save') {
        $otp = rand(100000, 999999);
    }


    $response['otp'] = $otp;
    return $response;
}

function fetchMessage($message) {
    if($message == 'New User') {
        // $message = "" //@umesh1995 TODO: Add the message here
    }
    else if($message == 'OTP') {
        $message = "4661";
    }

    //@umesh1995 TODO: Add all the message templates here.
    
    
    return $message;
}

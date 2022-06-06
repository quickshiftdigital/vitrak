<?php

/**
 * @package vitrak
 * @subpackage textlocal
 * @description: This file contains the functions that are used to send the SMS and Email to the user.
 */


function sendSMS($to, $message = "", $otp = "", $user_id = "")
{
    if (empty($otp)) {
        $otp = OTP('Save', $to);
        $otp = $otp['otp'];
    }

    // Account details
    $apiKey = 'be6fe2a0e46c7f1b';

    $response = file_get_contents('https://api.authkey.io/request?authkey=' . $apiKey . '&mobile=' . $to . '&country_code=91&sender=AUTHKY&otp=' . $otp . '&company=Vitrak&sid=4614');

    //$response = file_get_contents('https://authkey.io/api/2fa_verify.php?authkey=' . $apiKey . '&channel=sms&otp=' . $otp . '&country_code=91&sender=AUTHKY&otp=' . $otp . '&logid=' .<Logid generated on request api>.);
    //print_r($response);die;
    return $response;
}

function OTP($status, $phone, $otp = "")
{
    function saveOTP($phone, $otp)
    {
        $otp_global = get_field('otp', 'options');
        $arr = array(
            'phone' => $phone,
            'otp' => $otp
        );
        $otp_global[] = $arr;

        update_field('otp', $otp_global, 'options');
    }

    function verifyOTP($phone, $otp)
    {
        $otp_global = get_field('otp', 'options');
        $res = false;

        foreach ($otp_global as $key => $value) {
            if ($value['phone'] == $phone) {
                if ($value['otp'] == $otp) {
                    $res = true;

                    unset($otp_global[$key]);
                    update_field('otp', $otp_global, 'options');
                }
            }
        }

        if ($res) {
            $response['status'] = 'Success';
            $response['message'] = 'OTP verified';
        } else {
            $response['status'] = 'Error';
            $response['message'] = 'OTP not verified';
        }
    }

    $response = array();

    if ($status == 'Save') {
        $otp = rand(100000, 999999);
        saveOTP($phone, $otp);
    } else if ($status == 'Verify') {
        $response = verifyOTP($phone, $otp);
    }


    $response['otp'] = $otp;
    return $response;
}

<?php
    /**
     * Verify GST with the appyflow API
     */

    require_once('../../../../wp-load.php');
    the_post();

    //Curl Function
    function verify_gst($data) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://appyflow.in/api/verifyGST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "gstNo=" . $data['gst'] . "&key_secret=rUlXRRRlelOApcRECdNh8SY4mbt1");
        
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

    $response = array();
    $gst = json_decode(verify_gst($_POST), true);

    if($gst['error'] == 1 && !empty($gst['error'])) {
        $response['status'] = 'Error';
        $response['message'] = $gst['message'];
    }
    else {
        $response['status'] = 'Success';
        $response['message'] = 'GST Successfully Verified';
        $response['data'] = $gst;
        $response['address'] = $gst['taxpayerInfo']['pradr']['addr'];
        $response['company_name'] = $gst['taxpayerInfo']['tradeNam'];
        $response['panNo'] = $gst['taxpayerInfo']['panNo'];
        $response['registration_date'] = $gst['taxpayerInfo']['rgdt'];
        $response['GSTIN'] = $gst['taxpayerInfo']['gstin'];
    }

    $response = json_encode($response, true);
    print_r($response);
?>

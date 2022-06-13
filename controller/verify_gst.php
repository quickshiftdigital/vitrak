<?php
    /**
     * Verify GST with the appyflow API
     */

    // define('WP_USE_THEMES', false);  
    require_once('../../../../wp-load.php');
    // the_post();

    //Curl Function
    function verify_gst($data) {

        $postdata = http_build_query(
            array(
                'gstNo' => $data['gst'],
                'key_secret' => 'ht1oLyTKZTgRnhAlnF3Hv4V0bAf1'
            )
        );
            
        $opts = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-Type: application/x-www-form-urlencoded',
            'content' => $postdata
            )
        );
        
        $context  = stream_context_create($opts);        
        $result = file_get_contents('https://appyflow.in/api/verifyGST', false, $context);
        return $result;
    }

    $response = array();
    $gst = json_decode(verify_gst($_POST), true);

    if($gst['taxpayerInfo']) {
        $response['status'] = 'Success';
        $response['message'] = 'GST Successfully Verified';
        $response['data'] = $gst;
        $response['address'] = $gst['taxpayerInfo']['pradr']['addr'];
        $response['company_name'] = $gst['taxpayerInfo']['tradeNam'];
        $response['panNo'] = $gst['taxpayerInfo']['panNo'];
        $response['registration_date'] = $gst['taxpayerInfo']['rgdt'];
        $response['GSTIN'] = $gst['taxpayerInfo']['gstin'];
    }
    else {
        $response['status'] = 'Error';
        $response['message'] = $gst['message'];
    }

    $response = json_encode($response, true);
    print_r($response);
?>

<?php

    // define('WP_USE_THEMES', false);

    require_once('../../../../wp-load.php');

    $vendor_id = $_POST['vendor_id'];
    $vendor_name = get_user_meta($vendor_id, 'dokan_company_name', true);
    $distributor_id = $_POST['distributor_id'];
    $date = date("jS F, Y h:i:s A");
    $status = 'Pending';
    
    $agreementArray = array(
        'vendor' => $vendor_id,
        'vendor_name' => $vendor_name,
        'request_date' => $date,
        'status' => $status
    );
    
    $agreements = get_field('agreements', 'user_' . $distributor_id);
    $agreement = false;
    $response = array();

    if(!empty($agreements)) {
        foreach ($agreements as $key => $value) {
            if($value['vendor'] == $vendor_id) {
                $agreement = $value;
                break;
            }
        }
    }
    else {
        $agreements = array();
    }
    
    if(!$agreement) {
        array_push($agreements, $agreementArray);
        update_field('agreements', $agreements, 'user_' . $distributor_id);

        // @umesh1995: Send email to two emails. One for the vendor and one for the distributor.

        //Distributor Update
        $distributor = get_userdata($distributor_id,);
        $distributor_email = $distributor->user_email;
        $distributor_name = get_user_meta($distributor_id, 'business_name', true);

        $headers = 'From: no-reply@vitrak.in' . "\r\n";
        $headers .= 'Reply-To: info@vitrak.in' . "\r\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $message = '<html><body>';
        $message .= '<p>Hi ' . $distributor_name . ',</p>';
        $message .= '<p>We have received your request for distributorship with ' . $vendor_name . '. <br>We will share your details with the company and negotiate a deal with them.<br> This process takes up to a week, we will contact you once the agreement is final.</p>';
        $message .= '<p>Our team will contact in case any further details are required.</p>';
        $message .= '<p>Regards,</p>';
        $message .= '<p>Team Vitrak</p>';
        $message .= '</body></html>';

        $mail = wp_mail($distributor_email, 'Vitrak: Agreement Request', $message, $headers);
        

        $response['status'] = 'Success';
        $response['message'] = 'Agreement request received successfully';
        $response['mail'] = $mail;
        $response['email'] = $distributor_email;
        $response['name'] = $distributor_name;
    }
    else {
        $response['status'] = 'Error';
        $response['message'] = 'You have already signed the agreement';
        $response['agreements'] = $agreements;
    }

    print_r(json_encode($response, true));
?>
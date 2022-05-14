<?php
// define('WP_USE_THEMES', false);  
require_once('../../../../wp-load.php');
the_post();

$data = json_encode($_POST, true);
$response = array();
$response['data'] = $data;
$response['status'] = 'success';


json_encode($response, true);
print_r($response);

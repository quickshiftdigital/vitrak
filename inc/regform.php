<?php

// //Umesh Added Code
// function vicode_registeration_form()
// {
//     //if user not loged  in
//     if (is_user_logged_in()) {
//         //Check regiteration is enabled
//         if (get_option('users_can_register')) {
//             $output = vicode_registeration_fields();
//         } else {
//             $output = _('User Registeration is not enabled!');
//         }
//         return $output;
//     }
// }
// add_shortcode('register_form', 'vicode_registeration_form');
// function vicode_registeration_fields()
// {
//     ob_start(); 
?>
<?php
//     // Show Reg error 
//     
?>

<?php
//     return ob_get_clean();
// }

// //Register New User
// function vicode_add_new_user()
// {
//     if (isset($_POST['vicode_user_login']) && wp_verify_nonce($_POST['vicode_csrf'], 'vicode_csrf')) {
//         $user_login = $_POST['vicode_user_login'];
//         $user_email = $_POST['vicode_user_email'];
//         $user_first = $_POST['vicode_user_firsts'];
//         $user_last = $_POST['vicode_user_last'];
//         $user_pass = $_POST['vicode_user_pass'];
//         $user_confirm = $_POST['vicode_user_confirm'];
//         $user_mobile = $_POST['vicode_user_mobile'];

//         //require once
//         //require_once(ABCPATH . WPINC . /register.php);

//         if (username_exists($user_login)) {
//             vicode_errors()->add('usernamae_unavailable', _('Username already taken'));
//         }
//         if (validate_username($user_login)) {
//             vicode_errors()->add('usernamae_empty', _('Invalid useername'));
//         }

//         //User reegisteration
//         if (empty($errors)) {
//             $new_user_id = wp_insert_user(array(
//                 'user_login' => $user_login,
//                 'user_pass' => $user_pass,
//                 'user_email' => $user_email,
//                 'user_name' => $user_name,
//                 'user_registered' => date('Y-M-D H:I:S'),
//                 'role' => 'Distributor',
//             ));
//             if ($new_user_id) {
//                 wp_new_user_notification($new_user_id);

//                 wp_setcookie($user_login, $user_pass, true);
//                 wp_set_current_user($new_user_id, $user_login);
//                 do_action('wp-login', $user_login);

//                 //send user to home page
//                 wp_redirect(home_url());
//                 exit;
//             }
//         }
//     }
// }

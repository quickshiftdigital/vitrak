<?php /* Template Name: Testing */ ?>
<?php 
    get_header();
?>
    <?php 
        function wpdocs_set_html_mail_content_type() {
            return 'text/html';
        }
        //Send Email
        //@umesh1995 Please add the send email code. Basic Email that says account under verification.
        add_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );
        $to = 'bhaleraoumesh1995@gmail.com';
        $headers[] = 'Cc: info@vitrak.in';
        $subject = 'Welcome to Vitrak';
        $message = 'We noticed you haven’t completed your registration yet<br>
                    To get instant and unlimited access to the database, click here: <a href="' . home_url() . '/register/">Register Now</a> today.<br>
                    <br><br>
                    Regards<br>
                    Team Vitrak';
        $headers['Content-Type'] = 'text/html; charset=UTF-8';
        $headers['MIME-Version'] = "1.0";
        $headers['Bcc'] = 'info@vitrak.in, juzer@quickshiftdigital.com';
        $mail = wp_mail($to, $subject, $message, $headers);
        if ($mail) {
            $response['email_state'] = 'Error';
            $response['email_message'] = 'Error in sending email';
        }
        remove_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );
    ?>
<?php 
    get_footer();
?>
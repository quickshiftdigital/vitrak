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
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 02d31d227c2fc0320448bc5fcb569f3f8ad6b716
        $message = 'We noticed you haven’t completed your registration yet<br>
                    To get instant and unlimited access to the database, click here: <a href="' . home_url() . '/register/">Register Now</a> today.<br>
                    <br><br>
                    Regards<br>
                    Team Vitrak';
<<<<<<< HEAD
=======
=======
        $message = '<a href="' . home_url() . '">
                    We noticed you haven’t completed your registration yet. To get instant and unlimited access to the database<br>
                    Need help? <a style="color: #3ba1da; text-decoration: none;" href="mailto:info@vitrak.in">Contact Us</a> today.<br>
                    <br><br>
                    Regards
                    Team Vitrak
                    The <a style="color: #3ba1da; text-decoration: none;" href="' . home_url() . '">Vitrak Shop</a> Team';
>>>>>>> 63a504891237c2d0140b7368782ed14e3627e7df
>>>>>>> 02d31d227c2fc0320448bc5fcb569f3f8ad6b716
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
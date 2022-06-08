function get_ajaxUrl() {
    currentUrl = window.location.href;
    if (currentUrl.includes('localhost')) {
        url = 'http://localhost/vitrak/';
    }
    else {
        url = 'https://vitrakonline.com';
    }

    return url;
}

const ajax_url = get_ajaxUrl();
var role_type = "";
function regForm() {
    //GET OTP
    jQuery('#get_otp').click(function (e) {
        e.preventDefault();
        jQuery('.vn_form-err').slideUp(); //Errors slideUp
        formData = jQuery('#phone_number-verification').serializeArray(); //Serialize data
        console.log(formData);

        jQuery.ajax({
            method: "POST",
            data: formData,
            url: get_ajaxUrl() + '/wp-content/themes/vitrak/controller/vendor-registration.php',
            dataType: "json",
            success: function (response) {
                console.log(response);
                if (response.status == "Success") {
                    jQuery('#reg_phone').attr('value', response.phone).val(response.phone);
                    jQuery('#reg_logID').attr('value', response.sms.LogID).val(response.sms.LogID);
                    jQuery('.otp_div').slideDown();
                    jQuery('#get_otp').hide();
                    jQuery('button#verify_otp').removeClass('hidden').show();
                    jQuery('.otp_stage').attr('value', 'VERIFY OTP');
                    jQuery(".otp_div").removeClass("hidden")
                }
                else if (response.state == 'Error') {
                    jQuery('.vn_form-err').html(response.message).slideDown();
                    alert('456');

                }
            },
            error: function (response) {
                console.log(response);
            }
        });
    });

    //VERIFY OTP
    jQuery('#verify_otp').click(function (e) {
        e.preventDefault();
        jQuery('.vn_form-err').slideUp(); //Errors slideUp

        formData = jQuery('#phone_number-verification').serializeArray(); //Serialize data
        console.log(formData);
        jQuery.ajax({
            method: "POST",
            data: formData,
            url: get_ajaxUrl() + '/wp-content/themes/vitrak/controller/vendor-registration.php',
            dataType: "json",
            success: function (response) {
                console.log(response);
                if (response.status == 'Success') {
                    jQuery('#sc_reg_phone').attr('value', response.phone).val(response.phone);
                    jQuery('.form-first_view').slideUp();
                    jQuery('.form-second_view').slideDown();
                }
                else if (response.state == 'Error' || response.state == 'error') {
                    jQuery('.vn_form-err').html(response.message).slideDown();
                }
            },
            error: function (response) {
                console.log(response);
            }
        });
    });

    jQuery('#register_form').click(function (e) {
        e.preventDefault();
        jQuery('.vn_form-err').slideUp(); //Errors slideUp btn id
        formData = jQuery('#vicode_registeration_form').serializeArray(); //Serialize data - frm id
        formData['stage'] = jQuery(this).attr('data-stage'); //Add stage to data
        console.log(formData);
        jQuery.ajax({
            method: "POST",
            data: formData,
            url: get_ajaxUrl() + '/wp-content/themes/vitrak/controller/vendor-registration.php',
            dataType: "json",
            success: function (response) {
                console.log(response);
                if (response.state == 'Success') {
                    window.location.href = get_ajaxUrl() + '/shop/';
                }
                else if (response.state == 'Error') {
                    jQuery('.vn_form-err').html(response.message).slideDown();
                    console.log("success failed");
                }
            },
            error: function (response) {
                console.log(response);
            }
        });
    });
    
    jQuery('#second_form_details').click(function (e) {
        e.preventDefault();
        formData = jQuery('#update_register_form').serializeArray(); 
        jQuery.ajax({
            method: "POST",
            data: formData,
            url: get_ajaxUrl() + '/wp-content/themes/vitrak/controller/register-next-controller.php',
            dataType: "json",
            success: function (response) {
                if (response.state == 'Success') {
                    console.log(response);
                    if (response.business_type == 'seller') {
                        window.location.href = get_ajaxUrl() + '/cart/';
                    }
                    else if (response.business_type == 'distributor') {
                        window.location.href = get_ajaxUrl() + '/account-verification/';
                    }
                }
                else if (response.state == 'Error') {
                    jQuery('.vn_form-err').html(response.message).slideDown();
                    console.log("success failed");
                }
            },
            error: function (response) {
                console.log(response);
            }
        });
    });


    jQuery('#verify_gst').click(function (e) {
        e.preventDefault();
        jQuery('.otp_message').removeClass('err').slideUp();
        gst = jQuery('#reg_gst').val();
        console.log(gst);
        if (gst.length !== 0) {
            jQuery.ajax({
                method: "POST",
                data: {
                    gst: gst
                },
                url: get_ajaxUrl() + '/wp-content/themes/vitrak/controller/verify_gst.php',
                success: function (response) {
                    response = JSON.parse(response);
                    console.log(response);

                    if (response.status == 'Success') {
                        jQuery('.reg_gst').addClass('verified');
                        jQuery('#reg_gst').attr('data-verified', 'true');
                        jQuery('#verify_gst').hide();
                    }
                    else if (response.status == 'Error') {
                        jQuery('.vn_gst-err').html(response.message).slideDown();
                    }
                },
                error: function (response) {
                    console.log(response);
                }
            });
        }
    });

    jQuery('#phone_number-verification, #distributor_form, #vicode_registeration_form').submit(function (e) {
        e.preventDefault();
        jQuery('.vn_form-err').slideUp(); //Errors slideUp
    });
}


function masterLogin() {
    //Login
    jQuery('#master_login-btn').click(function (e) {
        e.preventDefault();
        formData = jQuery('#master-login_form').serializeArray(); //Serialize data - frm id

        jQuery.ajax({
            method: "POST",
            data: formData,
            url: get_ajaxUrl() + '/wp-content/themes/vitrak/controller/login-controller.php',
            dataType: "json",
            success: function (response) {
                if (response.status == 'Success') {
                    window.location.href = get_ajaxUrl();
                }
                else {
                    jQuery('.master_login-err').html(response.message).slideDown();
                }
            },
            error: function (response) {
                console.log(response);
            }
        });
    });
}

jQuery(document).ready(function () {
    regForm();
    masterLogin();
});

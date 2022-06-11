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
                    jQuery(".otp_div").removeClass("hidden");
                    jQuery('.resend_otp').attr('data-pending', 30).attr('data-state', 'On');
                }
                else if (response.status == 'Error') {
                    jQuery('.vn_form-err').html(response.message).slideDown();
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
                else if (response.status == 'Error' || response.status == 'error') {
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
                        window.location.href = get_ajaxUrl() + '/checkout/';
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
        jQuery('.vn_form-err').slideUp(); //Errors slideUp btn id

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

    jQuery('.resend_otp-link').click(function (e) {
        e.preventDefault();
        jQuery('.vn_form-err').removeClass('err').slideUp();

        phone = jQuery('#reg_phone').val();
        jQuery.ajax({
            method: "POST",
            data: {
                phone: phone
            },
            url: get_ajaxUrl() + '/wp-content/themes/vitrak/controller/resend_otp-controller.php',
            success: function (response) {
                response = JSON.parse(response);
                console.log(response);

                if (response.status == 'Success') {
                    jQuery('.resend_otp-link').addClass('hiddenV')
                    jQuery('#reg_phone').attr('value', response.phone).val(response.phone);
                    jQuery('#reg_logID').attr('value', response.sms.LogID).val(response.sms.LogID);
                    jQuery('.resend_otp').attr('data-pending', 60).attr('data-state', 'On');
                }
                else if (response.status == 'Error') {
                    jQuery('.otp_message').addClass('err').html(response.message).slideDown();
                }
            },
            error: function (response) {
                console.log(response);
            }
        });
    });

    if (window.location.href.includes('register')) {
        jQuery(document).ajaxStart(function () {
            jQuery('#vitrak_loading').show();
        });
        jQuery(document).ajaxStop(function () {
            jQuery('#vitrak_loading').hide();
        });
    }

    jQuery('#phone_number-verification, #distributor_form, #vicode_registeration_form').submit(function (e) {
        e.preventDefault();
        jQuery('.vn_form-err').slideUp(); //Errors slideUp
    });
}

function billingfieldsfix() {
    if (window.location.href.includes('checkout')) {
        jQuery('#billing_first_name').val(jQuery('.billing_first_name').attr('value'));
        jQuery('#billing_last_name').val(jQuery('.billing_last_name').attr('value'));
        jQuery('#billing_address_1').val(jQuery('.billing_address_1').attr('value'));
        jQuery('#billing_city').val(jQuery('.billing_city').attr('value'));
        jQuery('#billing_state').val(jQuery('.billing_state').attr('value'));
        jQuery('#billing_postcode').val(jQuery('.billing_postcode').attr('value'));
        jQuery('#billing_phone').val(jQuery('.billing_phone').attr('value'));
    }
}

function unnecessaryTimers() {
    setInterval(() => {
        jQuery('.resend_otp').each(function () {
            state = jQuery(this).attr('data-state');
            if (state == 'On') {
                pending = Number(jQuery(this).attr('data-pending')) - 1;
                if (pending > 1) {
                    jQuery(this).children('.resend_otp-balance_time, .resend_otp-text').show()
                    jQuery(this).attr('data-pending', pending);
                    jQuery(this).children('.resend_otp-balance_time').html(pending + 's');
                }
                else {
                    jQuery(this).attr('data-state', 'Off');
                    jQuery(this).children('.resend_otp-balance_time, .resend_otp-text').hide();
                    jQuery(this).children('.resend_otp-link').removeClass('hiddenV');
                }
            }
        });
    }, 1000);
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
    unnecessaryTimers();
    billingfieldsfix();
});

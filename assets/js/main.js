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

function regForm() {
    //GET OTP
    jQuery('#get_otp').click(function (e) {
        e.preventDefault();
        //jQuery('.vn_form-err').slideUp(); //Errors slideUp
        formData = jQuery('#phone_number-verification').serializeArray(); //Serialize data
        console.log(formData);
        var reg_phone = jQuery("#reg_phone").val();
        console.log(reg_phone);
        jQuery.ajax({
            method: "POST",
            data: {"reg_phone" : reg_phone,"stage" : "GET OTP"},
            url: get_ajaxUrl() + '/wp-content/themes/vitrak/controller/vendor-registration.php',
            dataType: "json",
            success: function (response) {
                console.log(response);
                console.log(response.phone);
                console.log(response.LogID);
                console.log(response.status);
                if (response.status == "Success") {

                    jQuery('#reg_phone').attr('value', response.phone).val(response.phone);
                    jQuery('#LogID').attr('value', response.LogID).val(response.LogID);
                    jQuery('.otp_div').slideDown();
                    jQuery('#get_otp').hide();
                    jQuery('button#verify_otp').removeClass('hidden').show();
                    console.log('remove class');
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
        jQuery.ajax({
            method: "POST",
            data: formData,
            url: get_ajaxUrl() + '/wp-content/themes/vitrak/controller/vendor-registration.php',
            dataType: "json",
            success: function (response) {
                console.log(response);
                if (response.status == 'Success') {
                    jQuery('#reg_phone').attr('value', response.phone).val(response.phone);
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

    // jQuery('#phone_register').click(function (e) {
    //     e.preventDefault();
    //     jQuery('.vn_form-err').slideUp(); //Errors slideUp

    //     formData = jQuery('#phone_number-verification').serializeArray(); //Serialize data
    //     jQuery.ajax({
    //         method: "POST",
    //         data: formData,
    //         url: get_ajaxUrl() + '/wp-content/themes/vitrak/controller/vendor-registration.php',
    //         dataType: "json",
    //         success: function (response) {
    //             console.log(response)
    //             if (response.state == 'Success') {
    //                 jQuery('#reg_phone').attr('value', response.phone).val(response.phone);
    //                 jQuery('.form-first_view').slideUp();
    //                 jQuery('.form-second_view').slideDown();
    //             }
    //             else if (response.state == 'Error') {
    //                 jQuery('.vn_form-err').html(response.message).slideDown();
    //             }
    //         },
    //         error: function (response) {
    //             console.log(response);
    //         }
    //     });
    // });

    jQuery('#register_form').click(function (e) {
        e.preventDefault();
        //console.log('button')
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
                console.log(response)
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


    jQuery('#vendor_form').click(function (e) {
        e.preventDefault();
        formData = jQuery('#vendor_details').serializeArray(); //Serialize data - frm id
        console.log(formData);
        jQuery.ajax({
            method: "POST",
            data: formData,
            url: get_ajaxUrl() + '/wp-content/themes/vitrak/controller/vendorform-submit.php',
            dataType: "json",
            success: function (response) {
                console.log(response)
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

    jQuery('#distributor_form').click(function (e) {
        e.preventDefault();
        formData = jQuery('#distributor_details').serializeArray(); //Serialize data - frm id
        console.log(formData);
        jQuery.ajax({
            method: "POST",
            data: formData,
            url: get_ajaxUrl() + '/wp-content/themes/vitrak/controller/distributorsubmit-form.php',
            dataType: "json",
            success: function (response) {
                console.log(response)
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
}

    jQuery('.verify_gst').click(function () {
        jQuery('.otp_message').removeClass('err').slideUp();
        gst = jQuery('#distributor_gst').val();

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
                        jQuery('.otp_message').html(response.message).removeClass('err').addClass('done').slideDown();
                        jQuery('.verify_gst').html('<i class="fa fa-check-circle"></i>').addClass('done');
                        jQuery('#vn_gst').attr('disabled', 'disabled');
                        jQuery('#vn_gst_verify').attr('disabled', 'disabled');
                        jQuery('.vn-submit button').removeAttr('disabled');
                        jQuery('#vn_gst_verify').attr('value', 'true');
                    }
                    else if (response.status == 'Error') {
                        jQuery('.otp_message').addClass('err').html(response.message).slideDown();
                    }
                },
                error: function (response) {
                    console.log(response);
                }
            });
        }
    });

jQuery(document).ready(function () {
    regForm();
});
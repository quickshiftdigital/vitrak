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
    jQuery('#get_otp').click(function (e) {
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
                // if (response.state == 'Success') {
                //     jQuery('#reg_phone').attr('value', response.phone).val(response.phone);
                //     jQuery('.form-first_view').slideUp();
                //     jQuery('.form-second_view').slideDown();
                // }
                // else if (response.state == 'Error') {
                //     jQuery('.vn_form-err').html(response.message).slideDown();
                // }
            },
            error: function (response) {
                console.log(response);
            }
        });
    });

    jQuery('#phone_register').click(function (e) {
        e.preventDefault();
        jQuery('.vn_form-err').slideUp(); //Errors slideUp

        formData = jQuery('#phone_number-verification').serializeArray(); //Serialize data
        jQuery.ajax({
            method: "POST",
            data: formData,
            url: get_ajaxUrl() + '/wp-content/themes/vitrak/controller/vendor-registration.php',
            dataType: "json",
            success: function (response) {
                console.log(response)
                if (response.state == 'Success') {
                    jQuery('#reg_phone').attr('value', response.phone).val(response.phone);
                    jQuery('.form-first_view').slideUp();
                    jQuery('.form-second_view').slideDown();
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

    jQuery('#register_form').click(function (e) {
        e.preventDefault();
        jQuery('.vn_form-err').slideUp(); //Errors slideUp

        formData = jQuery('#vicode_registeration_form').serializeArray(); //Serialize data
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
                    window.location.href = get_ajaxUrl() + '/vendor/register/business-details/';
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
}


jQuery(document).ready(function () {
    regForm();
});
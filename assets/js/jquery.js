function vendorRegistration() {
    jQuery('form#register_form .vn-submit button').click(function(a_obj) {
        a_obj.preventDefault();
        jQuery('.vn_form-err').slideUp();
        jQuery('#vn_phone').removeAttr('disabled');
        formData = jQuery('#register_form').serializeArray();
        jQuery('#vn_phone').attr('disabled', 'disabled');

        jQuery.ajax({
            method: "POST",
            data: formData,
            url: get_ajaxUrl() + '/wp-content/themes/controller/vendor-registration.php',
            dataType: "json",
            success: function(response) {
                if(response.state == 'Success') {
                    window.location.href = get_ajaxUrl() + '/vendor/register/business-details/';
                }
                else if(response.state == 'Error') {
                    jQuery('.vn_form-err').html(response.message).slideDown();
                }
            },
            error: function(response) {
                console.log(response);
            }
        });
    });
}
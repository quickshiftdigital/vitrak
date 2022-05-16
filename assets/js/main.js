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
    jQuery('#register').click(function (e) {
        console.log("Test");
        e.preventDefault();
        jQuery('.vn_form-err').slideUp(); //Errors slideUp

        formData = jQuery('#vicode_registeration_form').serializeArray(); //Serialize data

        jQuery.ajax({
            method: "POST",
            data: formData,
            url: get_ajaxUrl() + '/wp-content/themes/vitrak/controller/registration-controller.php',
            dataType: "json",
            success: function (response) {
                console.log(response)
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
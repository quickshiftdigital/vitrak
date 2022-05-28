function vendorRegistration() {
    jQuery(document).on("click","#register_form",function(e){
        e.preventDefault();
        console.log('Umesh test');
          var reg_username = jQuery("#reg_username").val();
          var reg_email = jQuery("#reg_email").val();
          var reg_phone = jQuery("#reg_phone").val();
          var business_name = jQuery("#business_name").val();
          var business_address = jQuery("#business_address").val();
          var business_type = jQuery("#business_type").val();
          var reg_password = jQuery("#reg_password").val();

          if(reg_username != ""){
            if(reg_email != "" && validateEmail (reg_email)){
                if(reg_phone != "" && regexPhoneNumber(reg_phone)){
                    if(business_name != ""){
                        if(business_type != ""){
                            if(reg_password != "" && reg_password.length>6){
                                alert("valid pss");
                            }else{
                                $(".reg_password_err").text("Please Enter Valid Password(Max length 7)").show().delay(3000).fadeOut();
                            }
                        }else{
                            $(".business_type_err").text("Please Enter Valid Business Type").show().delay(3000).fadeOut();
                        }
                    }else{
                        $(".business_name_err").text("Please Enter Valid Business Name").show().delay(3000).fadeOut();
                    }
                }else{
                    $(".reg_phone_err").text("Please Enter Valid Mobile Number").show().delay(3000).fadeOut();
                }
            }else{
                $(".reg_email_err").text("Please Enter Valid Email Address").show().delay(3000).fadeOut();
            }
        }else{
            $(".reg_username_err").text("Please Enter Valid Username").show().delay(3000).fadeOut();
  
        }
        function validateEmail (emailAdress)
            {
            let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (emailAdress.match(regexEmail)) {
                return true; 
            } else {
                return false; 
            }
            }

            function regexPhoneNumber(str) {
            const regexPhoneNumber = /^[6-9]\d{9}$/gi;

            if (str.match(regexPhoneNumber)) {
                return true;
            } else {
                return false;
            }
            }

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
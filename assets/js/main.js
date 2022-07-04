function get_ajaxUrl() {
    currentUrl = window.location.href;
    if (currentUrl.includes('localhost')) {
        url = 'http://localhost/vitrak/';
    }
    else {
        url = 'https://vitrak.online';
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
                console.log(response);
                if (response.state == 'Success') {
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

    jQuery('#phone_number-verification').keypress(function (e) {
        if (e.which == 13) {
            e.preventDefault();
            otp_stage = jQuery('.otp_stage').val();

            if (otp_stage == 'GET OTP') {
                jQuery('#get_otp').click();
            }
            else if (otp_stage == 'VERIFY OTP') {
                jQuery('#verify_otp').click();
            }
        }
    });

    var Dokan_Vendor_Registration = {

        init: function () {
            var form = jQuery('form#update_register_form');

            // bind events

            jQuery('#seller-url', form).on('keydown', this.constrainSlug);
            jQuery('#seller-url', form).on('keyup', this.renderUrl);
            jQuery('#seller-url', form).on('focusout', this.checkSlugAvailability);

            // this.validationLocalized();
            // this.validate(this);
        },

        generateSlugFromCompany: function () {
            var value = getSlug(jQuery(this).val());

            jQuery('#seller-url').val(value);
            jQuery('#url-alart').text(value);
            jQuery('#seller-url').focus();
        },

        constrainSlug: function (e) {
            var text = jQuery(this).val();

            // Allow: backspace, delete, tab, escape, enter and .
            if (jQuery.inArray(e.keyCode, [46, 8, 9, 27, 13, 91, 109, 110, 173, 189, 190]) !== -1 ||
                // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }

            if ((e.shiftKey || (e.keyCode < 65 || e.keyCode > 90) && (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        },

        checkSlugAvailability: function () {
            var self = jQuery(this),
                data = {
                    action: 'shop_url',
                    url_slug: self.val(),
                    _nonce: dokan.nonce,
                };

            if (self.val() === '') {
                return;
            }

            var row = self.closest('.form-row');
            row.block({ message: null, overlayCSS: { background: '#fff url(' + dokan.ajax_loader + ') no-repeat center', opacity: 0.6 } });

            jQuery.post(dokan.ajaxurl, data, function (resp) {

                if (resp.success === true) {
                    jQuery('#url-alart').removeClass('text-danger').addClass('text-success');
                    jQuery('#url-alart-mgs').removeClass('text-danger').addClass('text-success').text(dokan.seller.available);
                } else {
                    jQuery('#url-alart').removeClass('text-success').addClass('text-danger');
                    jQuery('#url-alart-mgs').removeClass('text-success').addClass('text-danger').text(dokan.seller.notAvailable);
                }

                row.unblock();

            });
        },

        generateSlugFromCompany: function () {
            var value = getSlug(jQuery(this).val());

            jQuery('#seller-url').val(value);
            jQuery('#url-alart').text(value);
            jQuery('#seller-url').focus();
        }

    };

    Dokan_Vendor_Registration.init();

    jQuery('#seller-url').change(function () {
        val = jQuery(this).val();
        jQuery('form#update_register_form .form-row .form-column small strong').html(val);
    });

    jQuery('#vicode_registeration_form').submit(function (e) {
        e.preventDefault();
        jQuery('#register_form').click();
    });

    jQuery('#phone_number-verification, #distributor_form, #vicode_registeration_form').submit(function (e) {
        e.preventDefault();
        jQuery('.vn_form-err').slideUp(); //Errors slideUp
    });

    jQuery('#reg_funding_posibility').change(function () {
        if (jQuery(this).val() !== '' && jQuery(this).val() !== 'NA') {
            jQuery('.funding_amount').slideDown();
        }
        else {
            jQuery('.funding_amount').slideUp();
        }
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


function mapSearchInput() {
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: -33.8688, lng: 151.2195 },
            zoom: 13
        });
        var input = document.getElementById('reg_location');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
            map: map,
            anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function () {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();

            // Location details
            for (var i = 0; i < place.address_components.length; i++) {
                if (place.address_components[i].types[0] == 'postal_code') {
                    jQuery('#business_pincode').val(place.address_components[i].long_name).attr('value', place.address_components[i].long_name);
                }
            }

            if (window.location.href.includes('vendor/register')) {
                jQuery('#reg_lat').val(place.geometry.location.lat()).attr('value', place.geometry.location.lat());
                jQuery('#reg_lng').val(place.geometry.location.lng()).attr('value', place.geometry.location.lng());
            }
            else {
                jQuery('.location_search-lat').val(place.geometry.location.lat()).attr('value', place.geometry.location.lat());
                jQuery('.location_search-lng').val(place.geometry.location.lng()).attr('value', place.geometry.location.lng());
                jQuery('.location_search-loc').val('' + place.formatted_address).attr('value', place.formatted_address);
            }
        });
    }

    if (window.location.href.includes('vendor/register') || jQuery('body').hasClass('home')) {
        initMap();
    }
}


function homeSearchMaster() {
    jQuery('.location_search-input-wrap input').keypress(function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            event.preventDefault();
            setTimeout(() => {
                jQuery('.hm_banner-search_box button').click();
            }, 150);
        }
    });

    jQuery('.hm_banner-search_box button').click(function (e) {
        e.preventDefault();
        createRed();
    });

    jQuery('form#hm_search').submit(function (e) {
        e.preventDefault();
        createRed();
    });

    function createRed() {
        loc = jQuery('.location_search-loc').val();
        lat = jQuery('.location_search-lat').val();
        lng = jQuery('.location_search-lng').val();

        loc = loc.replaceAll(',', '%2C25');
        loc = loc.replaceAll(' ', '%2520');
        url = get_ajaxUrl() + 'companies/?fwp_location=' + lat + '%2C' + lng + '%2C25%2C' + loc;

        window.location.href = url;
    }
}


function distributorAgreement() {
    jQuery('.sign_agreement a, .rgdis-request a').click(function (e) {
        jQuery('.iframe-contract').addClass('show');
    });

    jQuery('.contract-submit button').click(function (e) {
        e.preventDefault();
        if (jQuery('#contract_agree').is(':checked')) {
            distributor_id = jQuery(this).attr('data-distributor-id');
            vendor_id = jQuery(this).attr('data-company-id');

            jQuery.ajax({
                method: "POST",
                data: {
                    distributor_id: distributor_id,
                    vendor_id: vendor_id
                },
                url: get_ajaxUrl() + '/wp-content/themes/vitrak/controller/sign-agreement-controller.php',
                success: function (response) {
                    response = JSON.parse(response);
                    if (response.status == 'Success') {
                        window.location.reload();
                    }
                    else {
                        console.log(response);
                    }
                },
                error: function (response) {
                    console.log(response);
                }
            });
        }
    });

    jQuery('#contract_agree').change(function () {
        if (jQuery(this).is(':checked')) {
            jQuery('.contract-submit button').removeAttr('disabled');
        }
        else {
            jQuery('.contract-submit button').attr('disabled', 'disabled');
        }
    })

    jQuery('.iContract-mask').click(function () {
        jQuery('.iframe-contract').removeClass('show');
    });
}


function stickWithParent() {
    (function () {
        var b, f; b = this.jQuery || window.jQuery; f = b(window); b.fn.stick_in_parent = function (d) {
            var A, w, J, n, B, K, p, q, k, E, t; null == d && (d = {}); t = d.sticky_class; B = d.inner_scrolling; E = d.recalc_every; k = d.parent; q = d.offset_top; p = d.spacer; w = d.bottoming; null == q && (q = 0); null == k && (k = void 0); null == B && (B = !0); null == t && (t = "is_stuck"); A = b(document); null == w && (w = !0); J = function (a, d, n, C, F, u, r, G) {
                var v, H, m, D, I, c, g, x, y, z, h, l; if (!a.data("sticky_kit")) {
                    a.data("sticky_kit", !0); I = A.height(); g = a.parent(); null != k && (g = g.closest(k));
                    if (!g.length) throw "failed to find stick parent"; v = m = !1; (h = null != p ? p && a.closest(p) : b("<div />")) && h.css("position", a.css("position")); x = function () {
                        var c, f, e; if (!G && (I = A.height(), c = parseInt(g.css("border-top-width"), 10), f = parseInt(g.css("padding-top"), 10), d = parseInt(g.css("padding-bottom"), 10), n = g.offset().top + c + f, C = g.height(), m && (v = m = !1, null == p && (a.insertAfter(h), h.detach()), a.css({ position: "", top: "", width: "", bottom: "" }).removeClass(t), e = !0), F = a.offset().top - (parseInt(a.css("margin-top"), 10) || 0) - q,
                            u = a.outerHeight(!0), r = a.css("float"), h && h.css({ width: a.outerWidth(!0), height: u, display: a.css("display"), "vertical-align": a.css("vertical-align"), "float": r }), e)) return l()
                    }; x(); if (u !== C) return D = void 0, c = q, z = E, l = function () {
                        var b, l, e, k; if (!G && (e = !1, null != z && (--z, 0 >= z && (z = E, x(), e = !0)), e || A.height() === I || x(), e = f.scrollTop(), null != D && (l = e - D), D = e, m ? (w && (k = e + u + c > C + n, v && !k && (v = !1, a.css({ position: "fixed", bottom: "", top: c }).trigger("sticky_kit:unbottom"))), e < F && (m = !1, c = q, null == p && ("left" !== r && "right" !== r || a.insertAfter(h),
                            h.detach()), b = { position: "", width: "", top: "" }, a.css(b).removeClass(t).trigger("sticky_kit:unstick")), B && (b = f.height(), u + q > b && !v && (c -= l, c = Math.max(b - u, c), c = Math.min(q, c), m && a.css({ top: c + "px" })))) : e > F && (m = !0, b = { position: "fixed", top: c }, b.width = "border-box" === a.css("box-sizing") ? a.outerWidth() + "px" : a.width() + "px", a.css(b).addClass(t), null == p && (a.after(h), "left" !== r && "right" !== r || h.append(a)), a.trigger("sticky_kit:stick")), m && w && (null == k && (k = e + u + c > C + n), !v && k))) return v = !0, "static" === g.css("position") && g.css({ position: "relative" }),
                                a.css({ position: "absolute", bottom: d, top: "auto" }).trigger("sticky_kit:bottom")
                    }, y = function () { x(); return l() }, H = function () { G = !0; f.off("touchmove", l); f.off("scroll", l); f.off("resize", y); b(document.body).off("sticky_kit:recalc", y); a.off("sticky_kit:detach", H); a.removeData("sticky_kit"); a.css({ position: "", bottom: "", top: "", width: "" }); g.position("position", ""); if (m) return null == p && ("left" !== r && "right" !== r || a.insertAfter(h), h.remove()), a.removeClass(t) }, f.on("touchmove", l), f.on("scroll", l), f.on("resize",
                        y), b(document.body).on("sticky_kit:recalc", y), a.on("sticky_kit:detach", H), setTimeout(l, 0)
                }
            }; n = 0; for (K = this.length; n < K; n++)d = this[n], J(b(d)); return this
        }
    }).call(this);


    jQuery(".fs-map-container").stick_in_parent();
}

jQuery(document).ready(function () {
    regForm();
    masterLogin();
    unnecessaryTimers();
    billingfieldsfix();
    mapSearchInput();
    homeSearchMaster();
    distributorAgreement();
    stickWithParent();
});

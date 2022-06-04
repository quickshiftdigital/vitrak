<?php //Template Name: Register Stage 2 
?>
<?php get_header(); ?>
<?php /* Template Name: Registration Form */ ?>
<?php get_header(); ?>
<?php
if (is_user_logged_in()) : ?>
    <div id="content" class="container site-content sidebar-full">
        <div class="head-banner" style="background-image: url(http://localhost/vitrak/wp-content/uploads/2020/10/Head-banner.jpg);">
            <div class="container">
                <div class="inner">
                    <h1 class="page-title entry-title">
                        <span>Register</span>
                    </h1>
                    <h3 class="italic">
                        <span>Business Details</span>
                    </h3>
                </div>
            </div>
        </div>
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <article id="post-13" class="post-13 page type-page status-publish hentry">
                    <div class="entry-content">
                        <div class="woocommerce">
                            <div class="woocommerce-notices-wrapper"></div>
                            <div class="u-columns col1-set" id="customer_login">
                                <div class="u-column2 col-2 mid-size-column">
                                    <div class="form_view">
                                        <form method="post" class="woocommerce-form woocommerce-form-register register_form">
                                            <div class="form-row">
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="reg_firstname">GST Number<span class="required">*</span></label>
                                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="reg_firstname" id="reg_firstname" autocomplete="reg_firstname" value="">
                                                    </p>
                                                    <div class="side_btn text-right" id="verify_gst"><button>Verify</button></div>
                                                    <span class="vn_form-err reg_firstname_err"></span>
                                                </div>
                                            </div>
                                            <h4>Business Details</h4>
                                            <div class="form-row">
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="reg_firstname">Address Line 1<span class="required">*</span></label>
                                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="reg_firstname" id="reg_firstname" autocomplete="reg_firstname" value="">
                                                        <span class="vn_form-err reg_firstname_err"></span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="reg_lastname">Address Line 2</label>
                                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="reg_lastname" id="reg_lastname" autocomplete="lastname" value="">
                                                        <span class="vn_form-err reg_lastname_err"></span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="reg_lastname">City<span class="required">*</span></label>
                                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="reg_lastname" id="reg_lastname" autocomplete="lastname" value="">
                                                        <span class="vn_form-err reg_lastname_err"></span>
                                                    </p>
                                                </div>
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="reg_lastname">State<span class="required">*</span></label>
                                                        <select name="" id="">
                                                            <option value="">Choose State</option>
                                                            <option value="Maharashtra">Maharashtra</option>
                                                        </select>
                                                        <span class="vn_form-err reg_lastname_err"></span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="reg_lastname">PIN CODE<span class="required">*</span></label>
                                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="reg_lastname" id="reg_lastname" autocomplete="lastname" value="">
                                                        <span class="vn_form-err reg_lastname_err"></span>
                                                    </p>
                                                </div>
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="reg_lastname">Country<span class="required">*</span></label>
                                                        <select name="" id="">
                                                            <option value="">Choose Country</option>
                                                            <option value="IN">India</option>
                                                        </select>
                                                        <span class="vn_form-err reg_lastname_err"></span>
                                                    </p>
                                                </div>
                                            </div>
                                            <h4>Bank Details</h4>
                                            <div class="form-row">
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="reg_lastname">Account Number<span class="required">*</span></label>
                                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="reg_lastname" id="reg_lastname" autocomplete="lastname" value="">
                                                        <span class="vn_form-err reg_lastname_err"></span>
                                                    </p>
                                                </div>
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="reg_lastname">Confirm Account Number<span class="required">*</span></label>
                                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="reg_lastname" id="reg_lastname" autocomplete="lastname" value="">
                                                        <span class="vn_form-err reg_lastname_err"></span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="reg_lastname">IFSC Code<span class="required">*</span></label>
                                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="reg_lastname" id="reg_lastname" autocomplete="lastname" value="">
                                                        <span class="vn_form-err reg_lastname_err"></span>
                                                    </p>
                                                </div>
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="reg_lastname">Bank Name<span class="required">*</span></label>
                                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="reg_lastname" id="reg_lastname" autocomplete="lastname" value="">
                                                        <span class="vn_form-err reg_lastname_err"></span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="woocommerce-privacy-policy-text">
                                                <br>
                                                <p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="http://localhost/vitrak/privacy-policy/" class="woocommerce-privacy-policy-link" target="_blank">privacy policy</a>.</p>
                                            </div>
                                            <p class="woocommerce-form-row form-row">
                                                <input type="hidden" name="stage" value="second">
                                                <input type="hidden" name="reg_phone" id="reg_phone">
                                                <input type="hidden" id="woocommerce-register-nonce" name="woocommerce-register-nonce" value="c0f477cf55">
                                                <input type="hidden" name="_wp_http_referer" value="/vitrak/my-account/">
                                                <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" id="register_form" name="register_form" value="Register_form">Register</button>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .entry-content -->
                </article>
                <!-- #post-## -->
            </main>
            <!-- #main -->
        </div>
        <!-- #primary -->
    </div>
<?php else : ?>
    <?php header('location: ' . get_home_url()); ?>
<?php endif; ?>
<?php get_footer(); ?>
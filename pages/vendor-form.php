<?php //Template Name: Vendor Details 
?>
<?php get_header(); ?>
<?php
if (is_user_logged_in()) : ?>
    <div id="content" class="container site-content sidebar-full">
        <div class="head-banner" style="background-image: url(http://localhost/vitrak/wp-content/uploads/2020/10/Head-banner.jpg);">
            <div class="container">
                <div class="inner">
                    <h1 class="page-title entry-title">
                        <span>Vendor Details</span>
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
                                        <form method="post" class="woocommerce-form woocommerce-form-register vendor_details" name="vendor_details" id="vendor_details">
                                            <div class="form-row">
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="vendor_gst">GST Number<span class="required">*</span></label>
                                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="vendor_gst" id="vendor_gst">
                                                    </p>
                                                    <div class="side_btn text-right" id="verify_gst"><button>Verify</button></div>
                                                    <span class="vn_form-err reg_firstname_err"></span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-row">
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="business_address">Business Address<span class="required">*</span></label>
                                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="business_address" id="business_address" autocomplete="reg_firstname" value="">
                                                        <span class="vn_form-err reg_firstname_err"></span>
                                                    </p>
                                                </div>
                                            </div>
                                            <h4>Company Details</h4>
                                            <div class="form-row">
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="vendor_ctype">Company Type<span class="required">*</span></label>
                                                        <select name="vendor_ctype" id="vendor_ctype">
                                                            <option value="">Choose Type</option>
                                                            <option value="option1">Option 1</option>
                                                            <option value="option2">Option 2</option>
                                                        </select>
                                                        <span class="vn_form-err reg_lastname_err"></span>
                                                    </p>
                                                </div>
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="vendor_turnover">Annual Turnover<span class="required">*</span></label>
                                                        <select name="vendor_turnover" id="vendor_turnover">
                                                            <option value="">Choose Annual Turnover</option>
                                                            <option value="less10">Less than 10Lakh </option>
                                                            <option value="10-20lakh">10 Lakh - 20 Lakh </option>
                                                            <option value="20-40lakh">20 Lakh - 40 Lakh</option>
                                                            <option value="40-60lakh">40 Lakh - 60 Lakh</option>
                                                            <option value="60-80Lakh">60 Lakh - 80 Lakh</option>
                                                            <option value="80Lakh+">80 Lakh +</option>
                                                            <option value="NA">Not Applicable</option>
                                                        </select>
                                                        <span class="vn_form-err reg_lastname_err"></span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                    <label for="vendor_category">Category<span class="required">*</span></label>
                                                        <select name="vendor_category" id="vendor_category">
                                                            <option value="">Choose Category</option>
                                                            <option value="Category1">Category 1</option>
                                                            <option value="Category2">Category 2</option>
                                                            <option value="Category3">Category 3</option>
                                                            <option value="Category4">Category 4</option>
                                                            <option value="NA">Not Applicable </option>
                                                        </select>
                                                        <span class="vn_form-err reg_lastname_err"></span>
                                                    </p>
                                                </div>
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="vendor_subcategory">Sub Category<span class="required">*</span></label>
                                                        <select name="vendor_subcategory" id="vendor_subcategory">
                                                            <option value="">Choose Sub Category</option>
                                                            <option value="SubCategory-1">Sub Category 1</option>
                                                            <option value="SubCategory-2">Sub Category 2</option>
                                                            <option value="SubCategory-3">Sub Category 3</option>
                                                            <option value="NA">Not Applicable </option>
                                                        </select>
                                                        <span class="vn_form-err reg_lastname_err"></span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="vendor_yearbusiness">No. of Years in Business<span class="required">*</span></label>
                                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="vendor_yearbusiness" id="vendor_yearbusiness" value="">
                                                        <span class="vn_form-err reg_lastname_err"></span>
                                                    </p>
                                                </div>
                                            </div>
                                            <h4>Point of Contact</h4>
                                            <div class="form-row">
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="vendor_name">Name<span class="required">*</span></label>
                                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="vendor_name" id="vendor_name" value="">
                                                        <span class="vn_form-err reg_lastname_err"></span>
                                                    </p>
                                                </div>
                                                <div class="form-column">
                                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="vendor_mobile">Mobile<span class="required">*</span></label>
                                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="vendor_mobile" id="vendor_mobile" value="">
                                                        <span class="vn_form-err reg_lastname_err"></span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="vendor_email">Email<span class="required">*</span></label>
                                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="vendor_email" id="vendor_email" autocomplete="lastname" value="">
                                                        <span class="vn_form-err reg_lastname_err"></span>
                                                    </p>
                                                </div>
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="vendor_designation">Designation<span class="required">*</span></label>
                                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="vendor_designation" id="vendor_designation" autocomplete="lastname" value="">
                                                        <span class="vn_form-err reg_lastname_err"></span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="woocommerce-privacy-policy-text">
                                            </div>
                                            <p class="woocommerce-form-row form-row">
                                                <input type="hidden" name="stage" value="second">
                                                <input type="hidden" name="reg_phone" id="reg_phone">
                                                <input type="hidden" id="woocommerce-register-nonce" name="woocommerce-register-nonce" value="c0f477cf55">
                                                <input type="hidden" name="_wp_http_referer" value="/vitrak/my-account/">
                                                <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" id="vendor_form" name="vendor_form" value="vendor_form">Submit</button>
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
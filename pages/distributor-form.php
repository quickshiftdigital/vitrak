<?php //Template Name: Distributor Details 
?>
<?php get_header(); ?>
<?php
if (is_user_logged_in()) : ?>
    <div id="content" class="container site-content sidebar-full">
        <div class="head-banner" style="background-image: url(http://localhost/vitrak/wp-content/uploads/2020/10/Head-banner.jpg);">
            <div class="container">
                <div class="inner">
                    <h1 class="page-title entry-title">
                        <span>Distributor Details</span>
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
                                        <form method="post" class="woocommerce-form woocommerce-form-register distributor_details" name="distributor_details">
                                            <div class="form-row">
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="distributor_gst">GST Number<span class="required">*</span></label>
                                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="distributor_gst" id="distributor_gst" value="">
                                                    </p>
                                                    <div class="side_btn text-right" id="verify_gst"><button>Verify</button></div>
                                                    <span class="vn_form-err reg_firstname_err"></span>
                                                </div>
                                            </div>
                                            <h4>Business Details</h4>
                                            <div class="form-row">
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="business_address">Business Address<span class="required">*</span></label>
                                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="business_address" id="business_address" autocomplete="reg_firstname" value="">
                                                        <span class="vn_form-err reg_firstname_err"></span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="distributor_city">City<span class="required">*</span></label>
                                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="distributor_city" id="distributor_city" autocomplete="lastname" value="">
                                                        <span class="vn_form-err reg_lastname_err"></span>
                                                    </p>
                                                </div>
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="distributor_state">State<span class="required">*</span></label>
                                                        <select name="distributor_state" id="distributor_state">
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
                                                        <label for="distributor_pcode">PIN CODE<span class="required">*</span></label>
                                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="distributor_pcode" id="distributor_pcode" autocomplete="lastname" value="">
                                                        <span class="vn_form-err reg_lastname_err"></span>
                                                    </p>
                                                </div>
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="distributor_country">Country<span class="required">*</span></label>
                                                        <select name="distributor_country" id="distributor_country">
                                                            <option value="">Choose Country</option>
                                                            <option value="IN">India</option>
                                                        </select>
                                                        <span class="vn_form-err reg_lastname_err"></span>
                                                    </p>
                                                </div>
                                            </div>
                                            <h4>Infrastructure Details</h4>
                                            <div class="form-row">
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="distributor_shop">Shop Type<span class="required">*</span></label>
                                                        <select name="distributor_shop" id="distributor_shop">
                                                            <option value="">Choose Type</option>
                                                            <option value="Shop">Shop</option>
                                                            <option value="Shop">Warehouse</option>
                                                        </select>
                                                        <span class="vn_form-err reg_lastname_err"></span>
                                                    </p>
                                                </div>
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                    <label for="distributor_salesman">No. of Salesmen<span class="required">*</span></label>
                                                        <select name="distributor_salesman" id="distributor_salesman">
                                                            <option value="">Choose No. of Salesmen</option>
                                                            <option value="less10">Less than 10 </option>
                                                            <option value="10-20sales">10 - 20 Salesman</option>
                                                            <option value="20-40sales">20 - 40 Salesman</option>
                                                            <option value="40-60sales">40 - 60 Salesman</option>
                                                            <option value="60+">60 + Salesman</option>
                                                            <option value="NA">Not Applicable </option>
                                                        </select>
                                                        <span class="vn_form-err reg_lastname_err"></span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="distributor_delivery">No. of Delivery Boys<span class="required">*</span></label>
                                                        <select name="distributor_delivery" id="distributor_delivery">
                                                            <option value="">Choose No. of Delivery Boys</option>
                                                            <option value="less10">Less than 10 </option>
                                                            <option value="10-20boys">10 - 20 Boys</option>
                                                            <option value="20-40boys">20 - 40 Boys</option>
                                                            <option value="40-60boys">40 - 60 Boys</option>
                                                            <option value="60+">60 + Boys</option>
                                                            <option value="NA">Not Applicable </option>
                                                        </select>
                                                        <span class="vn_form-err reg_lastname_err"></span>
                                                    </p>
                                                </div>
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="distributor_vehicle">No. of Vehicles<span class="required">*</span></label>
                                                        <select name="distributor_vehicle" id="distributor_vehicle">
                                                            <option value="">Choose No. of Vehicles </option>
                                                            <option value="less10">Less than 10 </option>
                                                            <option value="10-20vehicle">10 - 20 Vehicles</option>
                                                            <option value="20-40vehicle">20 - 40 Vehicles</option>
                                                            <option value="40-60vehicle">40 - 60 Vehicles</option>
                                                            <option value="60+">60 + Vehicles</option>
                                                            <option value="NA">Not Applicable </option>
                                                        </select>
                                                        <span class="vn_form-err reg_lastname_err"></span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="distributor_turnover">Annual Turnover<span class="required">*</span></label>
                                                        <select name="distributor_turnover" id="distributor_turnover">
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
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="distributor_funding">Funding Possibilities<span class="required">*</span></label>
                                                        <select name="distributor_funding" id="distributor_funding">
                                                            <option value="">Choose Type</option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
                                                        <span class="vn_form-err reg_lastname_err"></span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="distributor_shops">No. of Shops/Outlets Covered<span class="required">*</span></label>
                                                        <select name="distributor_shops" id="distributor_shops">
                                                            <option value="">Choose Shops</option>
                                                            <option value="less10">Less than 10 Shops </option>
                                                            <option value="10-20Shops">10 Shops - 20 Shops </option>
                                                            <option value="20-40Shops">20 Shops - 40 Shops</option>
                                                            <option value="40-60Shops">40 Shops - 60 Shops</option>
                                                            <option value="60-80Shops">60 Shops - 80 Shops</option>
                                                            <option value="80Shops+">80 Shops +</option>
                                                            <option value="NA">Not Applicable</option>
                                                        </select>
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
                                                <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" id="distributor_form" name="distributor_form" value="distributor_form">Submit</button>
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
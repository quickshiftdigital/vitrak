<?php //Template Name: Register Stage 2 ?>
<?php get_header(); ?>
<?php if(is_user_logged_in()) : ?>
    <div id="content" class="container site-content sidebar-full">
        <div class="head-banner" style="background-image: url(<?php echo home_url(); ?>/wp-content/uploads/2020/10/Head-banner.jpg);">
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
                                        <form method="post" class="woocommerce-form woocommerce-form-register" id="update_register_form">
                                            <div class="form-row">
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="reg_firstname">GST Number<span class="required">*</span></label>
                                                        <div class="reg_gst">
                                                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="reg_gst" id="reg_gst" autocomplete="gst-number" value="">
                                                        </div>
                                                    </p>
                                                    <div class="side_btn text-right" id="verify_gst">
                                                        <button>Verify</button>
                                                    </div>
                                                    <span class="vn_form-err vn_gst-err"></span>                                        
                                                </div>
                                            </div>
                                            <h4>Business Details</h4>
                                            <div class="form-row">
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="reg_address_1">Address Line 1<span class="required">*</span></label>
                                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="reg_address_1" id="reg_address_1" autocomplete="address-1" value="">
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="reg_address_2">Address Line 2</label>
                                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="reg_address_2" id="reg_address_2" autocomplete="address-2" value="">
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="reg_lastname">City<span class="required">*</span></label>
                                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="reg_city" id="reg_city" autocomplete="address-city" value="<?php echo get_user_meta(get_current_user_id(), 'billing_city', true); ?>">
                                                    </p>
                                                </div>
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="reg_state">State<span class="required">*</span></label>
                                                        <?php 
                                                            $states = file_get_contents('https://gist.githubusercontent.com/shubhamjain/35ed77154f577295707a/raw/7bc2a915cff003fb1f8ff49c6890576eee4f2f10/IndianStates.json');
                                                            $states = json_decode($states, true);
                                                        ?>
                                                        <select name="reg_state" id="reg_state" autocomplete="address-state">
                                                            <option value="">Choose State</option>
                                                            <?php foreach ($states as $key => $value): ?>
                                                                <option value="<?php echo $key; ?>" <?php if(get_user_meta(get_current_user_id(), 'billing_state', true) == $key){echo 'selected';} ?>><?php echo $value; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="reg_lastname">Pincode<span class="required">*</span></label>
                                                        <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="reg_pincode" id="reg_pincode" autocomplete="address-pincode" value="<?php the_field('pincode', 'user_' . get_current_user_id()); ?>">
                                                    </p>
                                                </div>
                                                <div class="form-column">
                                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                        <label for="reg_country">Country<span class="required">*</span></label>
                                                        <select name="reg_country" id="reg_country">
                                                            <option value="IN">India</option>
                                                        </select>
                                                    </p>
                                                </div>                                                
                                            </div>
                                            <?php if(checkRole('seller')): ?>
                                                <div class="form-row">
                                                    <div class="form-column">
                                                        <p class="form-row form-group form-row-wide">
                                                            <label for="seller-url" class="pull-left"><?php esc_html_e( 'Store URL', 'dokan-lite' ); ?> <span class="required">*</span></label>
                                                            <strong id="url-alart-mgs" class="pull-right"></strong>
                                                            <input type="text" class="input-text form-control" name="reg_store_url" id="seller-url" value="<?php if ( ! empty( $postdata['shopurl'] ) ) { echo esc_attr( $postdata['shopurl'] ); } ?>" required="required" />
                                                            <small><?php echo esc_url( home_url() . '/' . dokan_get_option( 'custom_store_url', 'dokan_general', 'store' ) ); ?>/<strong id="url-alart"></strong></small>
                                                        </p>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <?php if(checkRole('distributor')): ?>
                                                <h4>Infrastructure Details</h4>
                                                <div class="form-row">
                                                    <div class="form-column">
                                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                            <label for="reg_shop_type">Shop Type<span class="required">*</span></label>
                                                            <select name="reg_shop_type" id="reg_shop_type">
                                                                <option value="">Choose Shop Type</option>
                                                                <option value="Shop">Shop</option>
                                                                <option value="Warehouse">Warehouse/GoDown</option>
                                                            </select>
                                                        </p>
                                                    </div>
                                                    <div class="form-column">
                                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                            <label for="reg_salesmen">No. of Salesmen<span class="required">*</span></label>
                                                            <select name="reg_salesmen" id="reg_salesmen">
                                                                <option value="">Choose No. of Salesmen</option>
                                                                <option value="Under 5">Under 5</option>
                                                                <option value="5-10">5-10</option>
                                                                <option value="10-35">10-35</option>
                                                                <option value="35-100">35-100</option>
                                                                <option value="Above 100">Above 100</option>
                                                                <option value="NA">NA</option>
                                                            </select>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-column">
                                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                            <label for="reg_deliver_boys">No. of Delivery Boys<span class="required">*</span></label>
                                                            <select name="reg_deliver_boys" id="reg_deliver_boys">
                                                                <option value="">Choose No. of Delivery Boys</option>
                                                                <option value="Under 5">Under 5</option>
                                                                <option value="5-10">5-10</option>
                                                                <option value="10-35">10-35</option>
                                                                <option value="35-100">35-100</option>
                                                                <option value="Above 100">Above 100</option>
                                                                <option value="NA">NA</option>
                                                            </select>
                                                        </p>
                                                    </div>
                                                    <div class="form-column">
                                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                            <label for="reg_vehicle_no">No. of Vehicles<span class="required">*</span></label>
                                                            <select name="reg_vehicle_no" id="reg_vehicle_no">
                                                                <option value="">Choose No. of Vehicles</option>
                                                                <option value="Under 5">Under 5</option>
                                                                <option value="5-10">5-10</option>
                                                                <option value="10-35">10-35</option>
                                                                <option value="35-100">35-100</option>
                                                                <option value="Above 100">Above 100</option>
                                                                <option value="NA">NA</option>
                                                            </select>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-column">
                                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                            <label for="reg_turnover">Annual Turnover<span class="required">*</span></label>
                                                            <select name="reg_turnover" id="reg_turnover">
                                                                <option value="">Choose Turnover</option>
                                                                <option value="10-25Lac">10-25Lac</option>
                                                                <option value="25-1Cr">25-1Cr</option>
                                                                <option value="1-5Cr">1-5Cr</option>
                                                                <option value="5-30Cr">5-30Cr</option>
                                                                <option value="30Cr+">30Cr+</option>
                                                                <option value="NA">NA</option>
                                                            </select>
                                                        </p>
                                                    </div>
                                                    <div class="form-column">
                                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                            <label for="reg_business_years">Business Funding</label>
                                                            <select name="reg_funding_posibility" id="reg_funding_posibility">
                                                                <option value="">Choose Business Funding</option>
                                                                <option value="Self Funded">Self Funded</option>
                                                                <option value="Debt Funded">Debt Funded</option>
                                                                <option value="NA">NA</option>
                                                            </select>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-row funding_amount">
                                                    <div class="form-column">
                                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                            <label for="reg_business_years">How Much Funding<span class="required">*</span></label>
                                                            <input type="number" class="woocommerce-Input woocommerce-Input--text input-text" name="funding_number" id="funding_number" autocomplete="funding_number">
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-column">
                                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                            <label for="storage_space">How Much Storage Space &nbsp;<span>(in Sqft)</span></label>
                                                            <input type="number" class="woocommerce-Input woocommerce-Input--text input-text" name="how_much_storage_space" id="how_much_storage_space" autocomplete="how_much_storage_space">
                                                        </p>
                                                    </div>
                                                    <div class="form-column">
                                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                            <label for="reg_deliver_boys">No. of Shops/Outlets Covered.<span class="required">*</span></label>
                                                            <select name="reg_shops" id="reg_shops">
                                                                <option value="">Choose No. of Vehicles</option>
                                                                <option value="Under 5">Under 5</option>
                                                                <option value="5-10">5-10</option>
                                                                <option value="10-35">10-35</option>
                                                                <option value="35-100">35-100</option>
                                                                <option value="Above 100">Above 100</option>
                                                                <option value="NA">NA</option>
                                                            </select>
                                                        </p>
                                                    </div>
                                                </div>
                                            <?php elseif(checkRole('seller')): ?>                                                
                                                <h4>Company Details</h4>
                                                <div class="form-row">
                                                    <div class="form-column">
                                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                            <label for="reg_company_type">Company Type<span class="required">*</span></label>
                                                            <select name="reg_company_type" id="reg_company_type">
                                                                <option value="">Choose Company Type</option>
                                                                <option value="Sole proprietorship">Sole proprietorship</option>
                                                                <option value="Partnershhip">Partnership</option>
                                                                <option value="OPC">One Person Company</option>
                                                                <option value="Limited Liability Partnership">Limited Liability Partnership</option>
                                                                <option value="Private Limited">Private Limited</option>
                                                                <option value="Public Limited">Public Limited</option>
                                                            </select>
                                                        </p>
                                                    </div>
                                                    <div class="form-column">
                                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                            <label for="reg_turnover">Annual Turnover<span class="required">*</span></label>
                                                            <select name="reg_turnover" id="reg_turnover">
                                                                <option value="">Choose Turnover</option>
                                                                <option value="10-25Lac">10-25Lac</option>
                                                                <option value="25-1Cr">25-1Cr</option>
                                                                <option value="1-5Cr">1-5Cr</option>
                                                                <option value="5-30Cr">5-30Cr</option>
                                                                <option value="30Cr+">30Cr+</option>
                                                                <option value="NA">NA</option>
                                                            </select>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-column"> 
                                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                            <label for="reg_category">Category<span class="required">*</span></label>
                                                            <select name="reg_category" id="reg_category">
                                                                <option value="">Choose Business Category</option>
<<<<<<< HEAD
                                                                <option value="Food">Food</option>
                                                                <option value="Non Food">Non Food</option>
																<option value="Other">Other</option>
=======
<<<<<<< HEAD
                                                                <option value="Food">Food</option>
                                                                <option value="Non Food">Non Food</option>
=======
                                                                <option value="FMCG">FMCG</option>
                                                                <option value="Food & Beverage">Food & Beverage</option>
>>>>>>> 63a504891237c2d0140b7368782ed14e3627e7df
>>>>>>> 02d31d227c2fc0320448bc5fcb569f3f8ad6b716
                                                            </select>
                                                        </p>
                                                    </div>
                                                    <div class="form-column">
                                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                            <label for="reg_sub_category">Sub Category<span class="required">*</span></label>
                                                            <select name="reg_sub_category" id="reg_sub_category">
<<<<<<< HEAD
                                                                <option value="">Choose Business Sub Category</option>
                                                                <option value="Paper Products">Paper Products</option>
                                                                <option value="Foods snacks">Foods snacks</option>
																<option value="Natural Products">Natural Products</option>
																<option value="Dairy Products">Dairy Products</option>
																<option value="Bakery Products">Bakery Products</option>
																<option value="Beverages">Beverages</option>
																<option value="Confectionery">Confectionery</option>
																<option value="Cosmetics">Cosmetics</option>
																<option value="Hair Care">Hair Care</option>
																<option value="Household products">Household products</option>
																<option value="Oral Care">Oral Care</option>
																<option value="Skin Care">Skin Care</option>																
																<option value="OTC">OTC</option>
																</select>
=======
                                                                <option value="">Choose Business Category</option>
                                                                <option value="FMCG">FMCG</option>
                                                                <option value="Food & Beverage">Food & Beverage</option>
                                                            </select>
>>>>>>> 02d31d227c2fc0320448bc5fcb569f3f8ad6b716
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-column">
                                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                            <label for="reg_business_years">No. of Years in Business<span class="required">*</span></label>
                                                            <select name="reg_business_years" id="reg_business_years">
                                                                <option value="">Choose No. of Years in Business</option>
                                                                <option value="0-1">0-1</option>
                                                                <option value="1-5">1-5</option>
                                                                <option value="5-10">5-10</option>
                                                                <option value="10-15">10-15</option>
                                                                <option value="15+">15+</option>
                                                                <option value="NA">NA</option>
                                                            </select>
                                                        </p>
                                                    </div>
                                                    <div class="form-column">
                                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                            <label for="reg_lastname">Designation<span class="required">*</span></label>
                                                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="reg_designation" id="reg_designation" autocomplete="pincode" value="">
                                                        </p>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                            <span class="vn_form-err"></span>
                                            <div class="woocommerce-privacy-policy-text">
                                                <br>
                                                <p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="<?php echo home_url(); ?>/privacy-policy/" class="woocommerce-privacy-policy-link" target="_blank">privacy policy</a>.</p>
                                            </div>
                                            <p class="woocommerce-form-row form-row">
                                                <input type="hidden" name="stage" value="second">
                                                <input type="hidden" name="user_id" value="<?php echo get_current_user_id(); ?>">
                                                <input type="hidden" name="user_role" value="<?php echo getUserRole(); ?>">
                                                <input type="hidden" id="woocommerce-register-nonce" name="woocommerce-register-nonce" value="c0f477cf55">
                                                <input type="hidden" name="_wp_http_referer" value="/vitrak/my-account/">
                                                <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" id="second_form_details" name="second_form_details" value="Register_form">Register</button>
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
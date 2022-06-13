<?php /* Template Name: Registration Form */ ?>
<?php get_header(); ?>
<?php
if (is_user_logged_in()) : ?>
	<p>You're already logged in and have no need to create a user profile.</p>
<?php else : ?>
	<div id="content" class="container site-content sidebar-full">
		<div class="head-banner" style="background-image: url(http://localhost/vitrak/wp-content/uploads/2020/10/Head-banner.jpg);">
			<div class="container">
				<div class="inner">
					<h1 class="page-title entry-title">
						<span>Registration</span>
					</h1>

				</div>
			</div>
		</div>
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<article id="post-13" class="post-13 page type-page status-publish hentry">
					<div class="entry-content">
						<div class="woocommerce">
							<div class="woocommerce-notices-wrapper"></div>
							<div class="u-columns col2-set" id="customer_login">
								<div class="u-column1 col-1">
									<h2>Login</h2>
									<form class="woocommerce-form woocommerce-form-login login_form" id="master-login_form" method="post">
										<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
											<label for="username">Phone Number or Email Address&nbsp;<span class="required">*</span></label>
											<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="phone-number" value="">
										</p>
										<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
											<label for="password">Password&nbsp;<span class="required">*</span></label>
											<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password">
										</p>
										<div class="master_login-err"></div>
										<p class="form-row">
											<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
												<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever"> <span>Remember me</span>
											</label>
											<input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="7f082568b4">
											<input type="hidden" name="_wp_http_referer" value="/vitrak/my-account/"> 
											<button type="submit" class="woocommerce-button button woocommerce-form-login__submit" id="master_login-btn" name="login" value="Log in">Log in</button>
										</p>
										<p class="woocommerce-LostPassword lost_password">
											<a href="http://localhost/vitrak/my-account/lost-password/">Lost your password?</a>
										</p>
									</form>
								</div>
								<div class="u-column2 col-2">
									<h2>Register</h2>
									<div class="form-first_view form_view" data-status="Active" data-stage="first">
										<form id="phone_number-verification" class="woocommerce-form woocommerce-form-register" method="post">
											<div class="form-row">
												<div class="form-column">
													<label for="shop-phone">Phone Number<span class="required">*</span></label>
													<span class="form-tip">Enter an Indian Mobile Number without country code*</span>
													<div class="relative send_otp">
														<span class="country_code">+91</span>
														<input type="text" class="input-text form-control" name="reg_phone" id="reg_phone" value="" required="required" autocomplete="phone-number">
													</div>
													<div class="otp_div hidden">
														<label for="shop-phone">OTP</label>
														<input type="text" class="input-text form-control" name="reg_otp" id="reg_otp" value="">
														<div class="resend_otp text-right" data-pending="30" data-state="Off">
															<span class="resend_otp-text">Haven't received the OTP? You can resend an OTP in </span>
															<span class="resend_otp-balance_time">30s</span>
															<span class="resend_otp-link hiddenV">Resend OTP</span>
														</div>
													</div>
												</div>
											</div>
											<div class="vn_form-err reg_phone_err"></div>
											<div class="woocommerce-privacy-policy-text">
												<br>
												<p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="<?php echo home_url(); ?>/privacy-policy/" class="woocommerce-privacy-policy-link" target="_blank">privacy policy</a>.</p>
											</div>
											<p class="woocommerce-form-row form-row">
												<input type="hidden" name="stage" class="otp_stage" value="GET OTP">
												<input type="hidden" id="woocommerce-register-nonce" name="woocommerce-register-nonce" value="c0f477cf55">
												<input type="hidden" name="_wp_http_referer" value="/vitrak/my-account/">
												<input type="hidden" id="reg_logID" name="reg_logID">
												<button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" id="get_otp">Get OTP</button>
												<button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit hidden" id="verify_otp">Verify OTP</button>
											</p>
										</form>
									</div>
									<div class="form-second_view form_view hiddenV" data-stage="second">
										<form method="post" class="woocommerce-form woocommerce-form-register register_form" id="vicode_registeration_form" >
											<div class="form-row">
												<div class="form-column">
													<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
														<label for="reg_first_name">First Name<span class="required">*</span></label>
														<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="reg_first_name" id="reg_firstname" autocomplete="first-name" value="">
													</p>
												</div>
												<div class="form-column">
													<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
														<label for="reg_last_name">Last Name&nbsp;<span class="required">*</span></label>
														<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="reg_last_name" id="reg_lastname" autocomplete="last-name" value="">
													</p>
												</div>
											</div>
											<div class="form-row">
												<div class="form-column">
													<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
														<label for="reg_email">Email address&nbsp;<span class="required">*</span></label>
														<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="reg_email" id="reg_email" autocomplete="email" value="">
													</p>
												</div>
												<div class="form-column">
													<p class="form-row form-group">
														<label for="business-name">Phone<span class="required">*</span></label>
														<input type="text" class="input-text form-control verified" name="sc_reg_phone" id="sc_reg_phone" value="" autocomplete="phone-number">
													</p>
												</div>
											</div>
											<div class="form-row">
												<div class="form-column">
													<p class="form-row form-group">
														<label for="business-name">Business Name <span class="required">*</span></label>
														<input type="text" class="input-text form-control" name="business_name" id="business_name" value="" required="required" autocomplete="business-name">
													</p>
												</div>
												<div class="form-column">
													<p class="form-row form-group">
														<label for="business-name">Business Pincode<span class="required">*</span></label>
														<input type="text" class="input-text form-control" name="business_pincode" id="business_pincode" value="" required="required" autocomplete="pincode-pincode">
													</p>
												</div>
											</div>
											<div class="form-row">
												<div class="form-column form-radio">
													<p class="form-row form-group business-list">
														<label for="business-type">Business Type</label>
														<ul class="business-list">
															<li>
																<label for="Vendor" class="radio-inline">
																	<input type="radio" name="reg_businesstype" id="Vendor" value="Vendor">Company 
																</label>
															</li>
															<li>
																<label for="Distributor" class="radio-inline">
																	<input type="radio" name="reg_businesstype" id="Distributor" value="Distributor">Distributor
																</label>
															</li>
														</ul>
													</p>
												</div>
											</div>
											<div class="form-row">
												<div class="form-column">
													<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
														<label for="reg_password">Password&nbsp;<span class="required">*</span></label>
														<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="reg_password" id="reg_password" autocomplete="new-password">
													</p>
												</div>
												<div class="form-column">
													<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
														<label for="reg_cpassword">Confirm Password&nbsp;<span class="required">*</span></label>
														<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="reg_cpassword" id="reg_cpassword" autocomplete="confirm-password">
													</p>
												</div>
												<div style="margin-top: 7px;" id="CheckPasswordMatch"></div>
											</div>
											<span class="vn_form-err reg_firstname_err"></span>
											<div class="woocommerce-privacy-policy-text">
												<br>
												<p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="http://localhost/vitrak/privacy-policy/" class="woocommerce-privacy-policy-link" target="_blank">privacy policy</a>.</p>
											</div>
											<p class="woocommerce-form-row form-row">
												<input type="hidden" name="stage" value="Second">
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
<?php endif; ?>
<?php get_footer(); ?>
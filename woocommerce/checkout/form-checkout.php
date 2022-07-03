<?php if(!is_user_logged_in()): ?>
	<?php header("location: /"); exit; ?>
<?php endif; ?>
<?php
	if ( WC()->cart->get_cart_contents_count() == 0 ) {
	    header("location: /checkout/");
	}
?>
<?php if(checkRole('seller')): ?>
	<div class="checkout_page join_page">
		<div class="big_container">
			<div class="container-90">
				<div class="checkout-container">
					<div class="join_title">
						<h1 class="font_2 color_primary">Almost Done</h1>
					</div>
					<div class="ck_box clearfix">
						<div class="ck-profile left outbox outbox-thinner">
							<div class="ck-profile-box">
								<div class="ck_box-title">
									<h3 class="font_2 bold center color_primary">Account Info</h3>
								</div>
								<?php
									$current_user = wp_get_current_user();
								?>
								<div class="hidden">
									<input type="hidden" class="billing_first_name" value="<?php echo get_user_meta(get_current_user_id(), 'first_name', true); ?>">
									<input type="hidden" class="billing_last_name" value="<?php echo get_user_meta(get_current_user_id(), 'last_name', true); ?>">
									<input type="hidden" class="billing_address_1" value="India">
									<input type="hidden" class="billing_city" value="<?php echo get_user_meta(get_current_user_id(), 'billing_city', true); ?>">
									<input type="hidden" class="billing_state" value="<?php echo get_user_meta(get_current_user_id(), 'billing_state', true); ?>">
									<input type="hidden" class="billing_postcode" value="<?php echo get_user_meta(get_current_user_id(), 'billing_postcode', true); ?>">
									<input type="hidden" class="billing_phone" value="<?php echo get_user_meta(get_current_user_id(), 'billing_phone', true); ?>">
								</div>
								<div class="ck_profile_row">
									<div class="ck_profile-item center">
										<?php if(get_field('profile_pic', 'user_' . get_current_user_id())): ?>
											<span><img src="<?php echo wp_get_attachment_image_src( get_field('profile_pic', 'user_' . get_current_user_id()), 'profile' )[0]; ?>" width="95px" height="95x"></span>
										<?php else: ?>
											<span><img src="<?php echo home_url(); ?>/wp-content/uploads/2022/06/camera-upload.png" width="95px" height="95px"></span>
										<?php endif; ?>
									</div>
								</div>
								<div class="ck_profile_row clearfix">
									<div class="ck_profile-item sp-50 left">
										<label>FIRST NAME</label>
										<span class="block capitalize" id="first_name" data-value="<?php echo $current_user->user_firstname; ?>"><?php echo $current_user->user_firstname; ?></span>
									</div>
									<div class="ck_profile-item sp-50 left">
										<label>LAST NAME</label>
										<span class="block capitalize" id="last_name" data-value="<?php echo $current_user->user_lastname; ?>"><?php echo $current_user->user_lastname; ?></span>
									</div>
								</div>
								<div class="ck_profile_row">
									<div class="ck_profile-item">
										<label>EMAIL</label>
										<span class="block"><?php echo $current_user->user_email; ?></span>
									</div>
								</div>
								<div class="ck_profile_row clearfix">
									<div class="ck_profile-item">
										<label>Business Name</label>
										<span class="block"><?php echo get_user_meta(get_current_user_id(), 'billing_company', true); ?></span>
									</div>
								</div>
								<div class="ck_profile_row clearfix">									
									<div class="ck_profile-item sp-50 left">
										<label>CITY</label>
										<span class="block"><?php echo get_user_meta(get_current_user_id(), 'billing_city', true); ?></span>
									</div>
									<div class="ck_profile-item sp-50 left">
										<label>Area</label>
										<span class="block"><?php echo get_user_meta(get_current_user_id(), 'billing_state', true); ?></span>
									</div>
								</div>
								<div class="ck_profile_row">
									<div class="ck_profile-item">
										<label>Phone</label>
										<span class="block"><?php echo get_field('countrycode', 'user_' . get_current_user_id()); ?>+91 <?php echo get_field('phone', 'user_' . get_current_user_id()); ?></span>
									</div>
								</div>								
							</div>
						</div>
						<div class="ck-center left">
							<div class="ck-payment-gateway outbox outbox-thinner">
								<div class="ck-profile-box">
									<div class="ck_box-title">
										<h3 class="font_2 bold center color_primary">Payment Method</h3>
									</div>
									<div class="ck-pg-first">
										<li class="font_2 color_lighter">Credit Card/Debit Card/Net Banking (Visa, Mastercard)</li>
										<img src="<?php echo home_url('/wp-content/uploads/2022/06/Group-4@2x.png.webp'); ?>">
									</div>
									<div class="ck-pg-second">
										<span class="font_2 color_lighter">Powered By:</span><img class="inline" src="https://cdn.razorpay.com/static/assets/logo/payment.svg">
									</div>
								</div>
							</div>
							<div class="promo_box outbox outbox-thinner">
								<div class="promo_cont">
									<div class="ck_box-title">
										<h3 class="font_2 bold center color_primary">Promo Code</h3>
									</div>
									<?php 
										//Coupon Code;
										do_action( 'woocommerce_before_checkout_form', $checkout ); 
									?>
								</div>
							</div>
						</div>	
						<div class="ck-profile ck-bill left outbox outbox-thinner">
							<div class="ck-profile-box">
								<div class="ck_box-title">
									<h3 class="font_2 bold center color_primary">Order Confirmation</h3>
								</div>
								<div class="ck-bill-box">
									<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
										<?php if ( $checkout->get_checkout_fields() ) : ?>

											<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

											<div class="col2-set" id="customer_details">
												<div class="col-1">
													<?php do_action( 'woocommerce_checkout_billing' ); ?>
												</div>

												<div class="col-2">
													<?php //do_action( 'woocommerce_checkout_shipping' ); ?>
												</div>
											</div>

											<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

										<?php endif; ?>									

										<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

										<div id="order_review" class="woocommerce-checkout-review-order">
											<?php do_action( 'woocommerce_checkout_order_review' ); ?>
										</div>

										<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
										<input type="hidden" name="id" value="<?php echo get_current_user_id(); ?>">
									</form>
								</div>
							</div>
						</div>
					</div>				
					<?php

					if ( ! defined( 'ABSPATH' ) ) {
						exit;
					}
					// If checkout registration is disabled and not logged in, the user cannot checkout.
					if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
						echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
						return;
					}

					?>				

					<?php //do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
				</div>
			</div>
		</div>
		<!-- <div class="log_image"> 
			<img src="<?php //echo home_url('/wp-content/uploads/2022/05/Main-image-Landing-Page@3x-compressor.jpg'); ?>" alt="Coworking Space Community">
		</div> -->
	</div>
	<?php if(isset($_SESSION['wit_coupon']) && !empty($_SESSION['wit_coupon'])): ?>
		<input type="hidden" class="none" id="wit_auto-coupon" data-coupon="<?php echo $_SESSION['wit_coupon']; ?>">
	<?php unset($_SESSION['wit_coupon']); endif; ?>
<?php else: ?>
	<?php
	/**
	 * Checkout Form
	 *
	 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
	 *
	 * HOWEVER, on occasion WooCommerce will need to update template files and you
	 * (the theme developer) will need to copy the new files to your theme to
	 * maintain compatibility. We try to do this as little as possible, but it does
	 * happen. When this occurs the version of the template file will be bumped and
	 * the readme will list any important changes.
	 *
	 * @see https://docs.woocommerce.com/document/template-structure/
	 * @package WooCommerce\Templates
	 * @version 3.5.0
	 */

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	do_action( 'woocommerce_before_checkout_form', $checkout );

	// If checkout registration is disabled and not logged in, the user cannot checkout.
	if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
		echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
		return;
	}

	?>

	<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

		<?php if ( $checkout->get_checkout_fields() ) : ?>

			<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

			<div class="col2-set" id="customer_details">
				<div class="col-1">
					<?php do_action( 'woocommerce_checkout_billing' ); ?>
					<?php if(!checkRole('seller')): ?>
						<?php do_action( 'woocommerce_checkout_shipping' ); ?>
					<?php endif; ?>
				</div>

				<div class="col-2">
				<div class="checkout-box">
					<div class="ck_box clearfix">
						<div class="left outbox">
							<div class="ck-profile-box">
								<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
								
								<h3 id="order_review_heading" class="center"><?php esc_html_e( 'Your order Details', 'woocommerce' ); ?></h3>
								
								<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
							
								<div id="order_review" class="woocommerce-checkout-review-order">
									<?php do_action( 'woocommerce_checkout_order_review' ); ?>
								</div>
							
								<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
								
							</div>
						</div>
					</div>
				</div>

			<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

		<?php endif; ?>
		

	</form>

	<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
<?php endif; ?>
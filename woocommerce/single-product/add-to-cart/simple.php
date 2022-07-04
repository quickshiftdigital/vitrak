<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product ); // WPCS: XSS ok.

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<?php
		$store = get_post_field( 'post_author', $product->get_id());
		$store_user = dokan()->vendor->get($store);
		$store_address = dokan_get_store_url($store_user->get_id());
	?>
	<?php if(checkDistributorship($store)): ?>
		<?php $agreements = checkDistributorship($store_user->get_id()); ?>
    	<?php if($agreements['status'] == 'Approved'): ?>
			<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
				<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

				<?php
					do_action( 'woocommerce_before_add_to_cart_quantity' );

					woocommerce_quantity_input(
						array(
							'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
							'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
							'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
						)
					);

					do_action( 'woocommerce_after_add_to_cart_quantity' );
				?>

				<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

				<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
			</form>
		<?php elseif($agreements['status'] == 'Pending'): ?>
			<div class="sign_agreement">
				<p>
					Your request for distributorship with <?php echo $agreements['vendor_name']; ?> is currently under review. Someone from the vitrak team will get in touch with you soon.
				</p>
			</div>
		<?php elseif($agreements['status'] == 'Rejected'): ?>
			<div class="sign_agreement">
				<p>
					Your request for distributorship with <?php echo $agreements['vendor_name']; ?> has been rejected. Please contact our team for more information.
				</p>
			</div>
		<?php endif; ?>
	<?php else: ?>
		<div class="sign_agreement">
			<a href="<?php echo $store_address . '?agreement=1'; ?>">Request Distributorship</a>
		</div>
	<?php endif; ?>
	
	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>

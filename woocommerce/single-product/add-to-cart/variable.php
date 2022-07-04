<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 6.1.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

$attribute_keys  = array_keys( $attributes );
$variations_json = wp_json_encode( $available_variations );
$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<?php
	$store = get_post_field( 'post_author', $product->get_id());
	$store_user = dokan()->vendor->get($store);
	$store_address = dokan_get_store_url($store_user->get_id());
?>
<?php if(checkDistributorship($store)): ?>
	<?php $agreements = checkDistributorship($store_user->get_id()); ?>
    <?php if($agreements['status'] == 'Approved'): ?>
		<form class="variations_form cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo $variations_attr; // WPCS: XSS ok. ?>">
			<?php do_action( 'woocommerce_before_variations_form' ); ?>

			<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
				<p class="stock out-of-stock"><?php echo esc_html( apply_filters( 'woocommerce_out_of_stock_message', __( 'This product is currently out of stock and unavailable.', 'woocommerce' ) ) ); ?></p>
			<?php else : ?>
				<table class="variations" cellspacing="0">
					<tbody>
						<?php foreach ( $attributes as $attribute_name => $options ) : ?>
							<tr>
								<th class="label"><label for="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>"><?php echo wc_attribute_label( $attribute_name ); // WPCS: XSS ok. ?></label></th>
								<td class="value">
									<?php
										wc_dropdown_variation_attribute_options(
											array(
												'options'   => $options,
												'attribute' => $attribute_name,
												'product'   => $product,
											)
										);
										echo end( $attribute_keys ) === $attribute_name ? wp_kses_post( apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__( 'Clear', 'woocommerce' ) . '</a>' ) ) : '';
									?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<?php do_action( 'woocommerce_after_variations_table' ); ?>

				<div class="single_variation_wrap">
					<?php
						/**
						 * Hook: woocommerce_before_single_variation.
						 */
						do_action( 'woocommerce_before_single_variation' );

						/**
						 * Hook: woocommerce_single_variation. Used to output the cart button and placeholder for variation data.
						 *
						 * @since 2.4.0
						 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
						 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
						 */
						do_action( 'woocommerce_single_variation' );

						/**
						 * Hook: woocommerce_after_single_variation.
						 */
						do_action( 'woocommerce_after_single_variation' );
					?>
				</div>
			<?php endif; ?>

			<?php do_action( 'woocommerce_after_variations_form' ); ?>
		</form>
	<?php elseif($agreements['status'] == 'Pending'): ?>
<<<<<<< HEAD
		<div class="sign_agreement">
			Your request for distributorship with <?php echo $agreements['vendor_name']; ?> is currently under review. Someone from the vitrak team will get in touch with you soon.
		</div>
	<?php elseif($agreements['status'] == 'Rejected'): ?>
		<div class="sign_agreement">
			Your request for distributorship with <?php echo $agreements['vendor_name']; ?> has been rejected. Please contact our team for more information.
=======
		<div class="sign_agreement status-pending">
			<p>
				Your request for distributorship with <?php echo $agreements['vendor_name']; ?> is currently under review. Someone from the vitrak team will get in touch with you soon.
			</p>
		</div>
	<?php elseif($agreements['status'] == 'Rejected'): ?>
		<div class="sign_agreement status-rejected">
			<p>
				Your request for distributorship with <?php echo $agreements['vendor_name']; ?> has been rejected. Please contact our team for more information.
			</p>
>>>>>>> 02d31d227c2fc0320448bc5fcb569f3f8ad6b716
		</div>
	<?php endif; ?>
<?php else: ?>
	<div class="sign_agreement">
		<a href="<?php echo $store_address . '?agreement=1'; ?>" class="black-magic">Request Distributorship</a>
	</div>
<?php endif; ?>
<?php
do_action( 'woocommerce_after_add_to_cart_form' );

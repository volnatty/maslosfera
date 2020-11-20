<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="checkout__review shop_table woocommerce-checkout-review-order-table">

	<h3 class="checkout__title mb-4"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>

	<?php do_action( 'woocommerce_review_order_before_cart_contents' );

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				?>

				<div class="checkout-row py-4">
					<div class="row align-items-center">

						<div class="col-12 col-md d-flex align-items-center">

							<h4>
								<?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;'; ?>
							</h4>
							<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '&times; %s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key ); ?>
							<?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>
						</div>

						<div class="col-6 col-md-auto">
							<p>Цена:</p>
						</div>

						<div class="col-6 col-md-3">
							<div class="real-price h3 text-right">
								<b><?php echo $cart_item['line_subtotal']; ?></b> <small>грн</small>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
		}

		do_action( 'woocommerce_review_order_after_cart_contents' );
	?>

	<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>
		<div class="checkout-row py-4">
			<div class="row align-items-center">
				<div class="col-6 col-md text-right">

					<span class="text-muted">Итого:</span>

				</div>

				<div class="col-6 col-md-3">
					<div class="real-price h3 text-right">
						<?php global $woocommerce; ?>
						<b><?= $woocommerce->cart->total; ?></b> <small>грн</small>
					</div>
				</div>
			</div>
		</div>
	<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>
</div>






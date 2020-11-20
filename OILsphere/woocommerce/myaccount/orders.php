<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_orders', $has_orders ); ?>

<?php if ( $has_orders ) : ?>

	<div class="acount-order-row">
		<div class="row mb-4">
			<?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
		
				<?php if ( $column_name != 'Действия') { ?>
					<div class="col"><h3><?php echo esc_html( $column_name ); ?></h3></div>
				<?php } ?>

			<?php endforeach; ?>
		</div>
	</div>

	<?php foreach ( $customer_orders->orders as $customer_order ) :
		$order      = wc_get_order( $customer_order );
		$item_count = $order->get_item_count();
		?>

		<div class="acount-order-row">
			<div class="row">
				<?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
					
						<?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>

							<div class="col">
								<?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>
							</div>

						<?php elseif ( 'order-number' === $column_id ) : ?>
							<div class="col">
								<p><?php echo _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number(); ?></p>
							</div>

						<?php elseif ( 'order-date' === $column_id ) : ?>
							<div class="col">
								<time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></time>
							</div>

						<?php elseif ( 'order-status' === $column_id ) : ?>
							<div class="col">
								<?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>
							</div>

						<?php elseif ( 'order-total' === $column_id ) : ?>
							<div class="col">
								<?php
								/* translators: 1: formatted order total 2: total order items */
								printf( _n( '%1$s for %2$s item', '%1$s for %2$s items', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count );
								?>
								
							</div>
							

						<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	<?php endforeach; ?>

	<?php do_action( 'woocommerce_before_account_orders_pagination' ); ?>

	<?php if ( 1 < $customer_orders->max_num_pages ) : ?>
		<div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">
			<?php if ( 1 !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page - 1 ) ); ?>"><?php _e( 'Previous', 'woocommerce' ); ?></a>
			<?php endif; ?>

			<?php if ( intval( $customer_orders->max_num_pages ) !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page + 1 ) ); ?>"><?php _e( 'Next', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>

<?php else : ?>
	<div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">
		<a class="woocommerce-Button button" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
			<?php _e( 'Go shop', 'woocommerce' ); ?>
		</a>
		<?php _e( 'No order has been made yet.', 'woocommerce' ); ?>
	</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>

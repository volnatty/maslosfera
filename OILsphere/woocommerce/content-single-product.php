<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

$id = $product->id;



if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-6 offset-lg-0 col-xl-6 offset-xl-1 order-lg-2">
			<div class="row no-gutters">
				<?php
				/**
				 * Hook: woocommerce_before_single_product_summary.
				 *
				 * @hooked woocommerce_show_product_sale_flash - 10
				 * @hooked woocommerce_show_product_images - 20
				 */
				do_action('woocommerce_before_single_product_summary');
				?>
			</div>
		</div>


		<div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-0 col-xl-5 order-lg-1">
			<div class="single-product">
				<?php
				/**
				 * Hook: woocommerce_before_single_product.
				 *
				 * @hooked wc_print_notices - 10
				 */
				do_action('woocommerce_before_single_product');
				?>


				<div class="specification">

					<?php
					if (!defined('ABSPATH')) {
						exit; // Exit if accessed directly
					}
					global $product;
					$heading = esc_html(apply_filters('woocommerce_product_additional_information_heading', __('Additional information', 'woocommerce')));
					?>
					<?php do_action('woocommerce_product_additional_information', $product); ?>

					<div class="specification__item d-flex align-items-center justify-content-between">
						<p class="specification__item__title">Количество</p>
						<div class="amount">
							<input type="text" value="1">
							<div class="amount__btn">
								<button class="amount__btn__max" type="button">+</button>
								<button class="amount__btn__min" type="button">-</button>
							</div>
						</div>
					</div>


					<?php
					/**
					 * Hook: woocommerce_single_product_summary.
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked woocommerce_template_single_rating - 10
					 * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_excerpt - 20
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_meta - 40
					 * @hooked woocommerce_template_single_sharing - 50
					 * @hooked WC_Structured_Data::generate_product_data() - 60
					 */
					do_action('woocommerce_single_product_summary');
					?>
				</div>



				<div class="single-product__price">
					<div class="row mb-4 align-items-center">
						<div class="col-12 col-xl-auto text-center text-xl-right single-product-btn-media">

							<form class="cart form-add-to-cart" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype='multipart/form-data'>

								<div class="input-hidden">
									<?php woocommerce_quantity_input([
										'min_value'   => apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product),
										'max_value'   => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
										'input_value' => isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
                                    ]);
									?>
								</div>


								<button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="in-cart in-cart-form-btn d-inline-flex align-items-center justify-content-end">
									<h5 class="h-100">Добавить в корзину</h5>
								</button>

							</form>

						</div>

					</div>
					<div class="row align-items-center">
						<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-xl offset-xl-0 d-flex justify-content-between align-items-center single-product-btn-media">
							<div class="single-product__price__title">
								Цена
							</div>

                            <?php $oldprice = $product->get_sale_price(); ?>

                            <?php if ($oldprice) : ?>
                                <div class="old-price h5 font-weight-normal ml-auto mr-3">
                                    <b><?php echo $product->get_regular_price(); ?></b> <small>грн</small>
                                </div>

								<div class="real-price h3">
									<b><?php echo $product->get_sale_price(); ?></b> <small>грн</small>
								</div>

							<?php else : ?>

								<div class="real-price h3">
									<b><?php echo $product->get_regular_price(); ?></b> <small>грн</small>
								</div>

							<?php endif; ?>
						</div>

						<div class="col-12 col-xl-auto mt-4 mt-xl-0 text-center text-xl-right">

							<input id="site-url" type="hidden" value="<?= get_site_url(); ?>">

							<a data-id="<?php echo $id; ?>" href="#" data-quantity="<?php echo esc_attr(isset($args['quantity']) ? $args['quantity'] : 1); ?>" class="one-click-button btn btn-secondary"><span>КУПИТЬ В ОДИН КЛИК</span></a>

						</div>
					</div>
				</div>


				<?php
				/**
				 * Hook: woocommerce_after_single_product_summary.
				 *
				 * @hooked woocommerce_output_product_data_tabs - 10
				 * @hooked woocommerce_upsell_display - 15
				 * @hooked woocommerce_output_related_products - 20
				 */


				// do_action('woocommerce_after_single_product_summary');

				?>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<?php
	$description = $post->post_excerpt; ?>

	<?php if ($description) : ?>

		<h3 class="single-title-descript">Описание</h3>

		<div class="descrip-text">
			<?= $description; ?>
		</div>

	<?php endif; ?>
</div>




<?php do_action('woocommerce_after_single_product'); ?>

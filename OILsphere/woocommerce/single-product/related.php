<?php

/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if (!defined('ABSPATH')) {
	exit;
}



if ($related_products) : ?>

	<section class="popular-section--other">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col col-xxl-8">
					<h2>Похожие товары</h2>
					<div class="row">
						<div class="popular-slider slider2">

							<?php foreach ($related_products as $related_product) : ?>
								<div class="col-sm-6 col-md-4 col-xl-3">
									<div class="popular-slider__item">
										<?php
										$post_object = get_post($related_product->get_id());

										setup_postdata($GLOBALS['post'] = &$post_object);

										global $product;

										// Ensure visibility.
										if (empty($product) || !$product->is_visible()) {
											return;
										} ?>
										<div class="oil-card">

											<a href="<?php the_permalink(); ?>" class="oil-card__img d-block w-100" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></a>

											<?php
											do_action('woocommerce_before_shop_loop_item');
											do_action('woocommerce_before_shop_loop_item_title');
											do_action('woocommerce_shop_loop_item_title');
											?>

											<a href="<?php the_permalink(); ?>" class="oil-card__title h4 d-block"><?php the_title(); ?></a>

											<?php
											do_action('woocommerce_after_shop_loop_item_title');
											do_action('woocommerce_after_shop_loop_item');
											?>
										</div>

									</div>
								</div>
							</div>

						<?php endforeach; ?>

					</div>
				</div>

				<div class="slider-nav slider-nav--popul d-flex align-items-center justify-content-between mt-lg-5">

					<h5 class="slider-nav__item popul-slider-prev">Предыдущий</h5>

					<h5 class="slider-nav__item popul-slider-next">Следующий</h5>

				</div>
			</div>
		</div>
		</div>
	</section>

<?php endif;

wp_reset_postdata();

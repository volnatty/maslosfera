<?php

/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters('woocommerce_product_tabs', array());

$count_tab = 0;

if (!empty($tabs)) : ?>

	<div class="product-tubs mt-5">
		<ul class="nav nav-tabs">


			<?php foreach ($tabs as $key => $tab) : $count_tab++ ?>

				<?php if ($count_tab == 1) : ?>
					<li class="nav-item <?php echo esc_attr($key); ?>_tab" id="tab-title-<?php echo esc_attr($key); ?>" role="tab" aria-controls="tab-<?php echo esc_attr($key); ?>">

						<a class="nav-link h3 active" data-toggle="tab" href="#tab-<?php echo esc_attr($key); ?>"><?php echo apply_filters('woocommerce_product_' . $key . '_tab_title', esc_html($tab['title']), $key); ?></a>

					</li>

				<?php else : ?>

					<li class="nav-item <?php echo esc_attr($key); ?>_tab" id="tab-title-<?php echo esc_attr($key); ?>" role="tab" aria-controls="tab-<?php echo esc_attr($key); ?>">

						<a class="nav-link h3" data-toggle="tab" href="#tab-<?php echo esc_attr($key); ?>"><?php echo apply_filters('woocommerce_product_' . $key . '_tab_title', esc_html($tab['title']), $key); ?></a>

					</li>
				<?php endif; ?>

			<?php endforeach; ?>
		</ul>

		<div class="tab-content" id="myTabContent">
			<?php $count_tab_content = 0;
				foreach ($tabs as $key => $tab) : $count_tab_content++ ?>



				<?php if ($count_tab_content == 1) : ?>
					<div class="tab-pane fade show active" id="tab-<?php echo esc_attr($key); ?>" role="tabpanel">
						<?php if (isset($tab['callback'])) {
										call_user_func($tab['callback'], $key, $tab);
									} ?>
					</div>

				<?php else : ?>

					<div class="tab-pane fade" id="tab-<?php echo esc_attr($key); ?>" role="tabpanel">
						<?php if (isset($tab['callback'])) {
										call_user_func($tab['callback'], $key, $tab);
									} ?>
					</div>
				<?php endif; ?>

			<?php endforeach; ?>
		</div>
	</div>

<?php endif; ?>
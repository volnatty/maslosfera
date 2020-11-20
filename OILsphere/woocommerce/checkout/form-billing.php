<?php

/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
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
 * @global WC_Checkout $checkout
 */

defined('ABSPATH') || exit;
?>

<div class="checkout__form">

    <?php do_action('woocommerce_before_checkout_billing_form', $checkout); ?>

    <h2>Оформление заказа</h2>

    <h3 class="my-4 checkout__title"><?php esc_html_e('Billing details', 'woocommerce'); ?></h3>

    <?php
    $fields = $checkout->get_checkout_fields('billing');

    foreach ($fields as $key => $field) {
        woocommerce_form_field($key, $field, $checkout->get_value($key));
    }
    ?>

    <?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

    <?php wc_cart_totals_shipping_html(); ?>

    <?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

    <?php do_action('woocommerce_after_checkout_billing_form', $checkout); ?>

</div>

<?php if (!is_user_logged_in() && $checkout->is_registration_enabled()) : ?>
    <div class="woocommerce-account-fields">
        <?php /*
        <?php if (!$checkout->is_registration_required()) : ?>

            <div class="checkout__form">
                <label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
                    <input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox"
                           id="createaccount" <?php checked((true === $checkout->get_value('createaccount') || (true === apply_filters('woocommerce_create_account_default_checked', false))), true); ?>
                           type="checkbox" name="createaccount" value="1"/>
                    <span><?php esc_html_e('Create an account?', 'woocommerce'); ?></span>
                </label>
            </div>

        <?php endif; ?>
        */ ?>

        <?php do_action('woocommerce_before_checkout_registration_form', $checkout); ?>

        <?php /*
		<?php if ($checkout->get_checkout_fields('account')) : ?>

			<div class="create-account">
				<?php foreach ($checkout->get_checkout_fields('account') as $key => $field) : ?>
					<?php woocommerce_form_field($key, $field, $checkout->get_value($key)); ?>
				<?php endforeach; ?>
				<div class="clear"></div>
			</div>

		<?php endif; ?>
         */ ?>

        <?php do_action('woocommerce_after_checkout_registration_form', $checkout); ?>

        <div class="text-center mb-3">
            или
        </div>

        <div class="text-center">
            <?php echo do_shortcode('[miniorange_social_login shape="square" theme="default" space="4" size="35"]'); ?>
        </div>
    </div>
<?php endif; ?>

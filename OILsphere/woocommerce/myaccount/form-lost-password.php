<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.2
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_lost_password_form' );
?>

<div class="row justify-content-center justify-content-lg-start">

	<div class="col-sm-8 col-md-7 col-lg-6">

<form method="post" class="login__form woocommerce-ResetPassword lost_reset_password">

	<h2 class="mb-4">Восстановление пароля</h2>

	<p><?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></p><?php // @codingStandardsIgnoreLine ?>


	<div class="field">

		<label for="user_login"><?php esc_html_e( 'Username or email', 'woocommerce' ); ?></label>
		<input class="field__item woocommerce-Input woocommerce-Input--text input-text" type="text" name="user_login" id="user_login" autocomplete="username" />
	</div>

	<div class="clear"></div>

	<?php do_action( 'woocommerce_lostpassword_form' ); ?>

	<p class="woocommerce-form-row form-row">
		<input type="hidden" name="wc_reset_password" value="true" />
		
	</p>

	<div class="field">

		<button type="submit" class="in-cart d-flex align-items-center" value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>"><h5 class="h-100"><?php esc_html_e( 'Reset password', 'woocommerce' ); ?></h5></button>
	</div>

	<?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>

</form>

</div>

</div>
<?php
do_action( 'woocommerce_after_lost_password_form' );

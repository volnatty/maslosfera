<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_edit_account_form' ); ?>

<form class="woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >

	<div class="row">

		<div class="col-xl-6">

			<?php do_action( 'woocommerce_edit_account_form_start' ); ?>

			<h3 class="mb-4">Личная информация</h3>

			<div class="field">
				<input type="text" class="field__item woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" />
				<label for="account_first_name"><?php esc_html_e( 'First name', 'woocommerce' ); ?></label>
			</div>

			<div class="field">
				<label for="account_last_name"><?php esc_html_e( 'Last name', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="text" class="field__item woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" />
			</div>

			<div class="field">
				<label for="account_display_name"><?php esc_html_e( 'Display name', 'woocommerce' ); ?></label>
				<input type="text" class="field__item woocommerce-Input woocommerce-Input--text input-text" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" />
			</div>

			<div class="field">
				<label for="account_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?></label>
				<input type="email" class="field__item woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
			</div>

		</div>

		<div class="col-xl-6">

			<h3 class="mb-4">Смена пароля</h3>


			<div class="field">
				<label for="password_1">Новый пароль</label>
				<input type="password" class="field__item woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off" />
			</div>
			<div class="field">
				<label for="password_2"><?php esc_html_e( 'Confirm new password', 'woocommerce' ); ?></label>
				<input type="password" class="field__item woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off" />
			</div>

			<?php do_action( 'woocommerce_edit_account_form' ); ?>

			<div class="field">
				<?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
				<button type="submit" class="in-cart d-flex align-items-center" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><h5 class="h-100"><?php esc_html_e( 'Save changes', 'woocommerce' ); ?></h5></button>

				<input type="hidden" name="action" value="save_account_details" />
			</div>

			<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
		</div>

	</div>
</form>

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>

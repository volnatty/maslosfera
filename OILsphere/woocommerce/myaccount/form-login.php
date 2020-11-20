<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
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

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>



<?php endif; ?>

<div class="row justify-content-center justify-content-lg-start">

	<div class="col-sm-8 col-md-7 col-lg-6">

		<form class="login__form" method="post">

			<h2 class="mb-4"><?php esc_html_e( 'Login', 'woocommerce' ); ?></h2>

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<div class="field">
				<input type="text" class="field__item" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				<label for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
			</div>

			<div class="field">
				<label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input class="field__item" type="password" name="password" id="password" autocomplete="current-password" />
			</div>

			<?php do_action( 'woocommerce_login_form' ); ?>

			<p class="form-row">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
				</label>
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
			</p>

			<div class="field d-flex align-items-center">
				<button type="submit" class="in-cart d-flex align-items-center" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>">
					<h5 class="h-100"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></h5>
				</button>

                <div class="ml-3 mr-2">или</div>

                <div>
                    <?php echo do_shortcode('[miniorange_social_login shape="square" theme="default" space="4" size="35"]'); ?>
                </div>
			</div>

			<p class="woocommerce-LostPassword lost_password">
				<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
			</p>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>

	</div>
</div>



<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

<div class="row justify-content-center justify-content-lg-start mt-5">

	<div class="col-sm-8 col-md-7 col-lg-6">

		

		<form method="post" class="login__form" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

			<h2><?php esc_html_e( 'Register', 'woocommerce' ); ?></h2>

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>


				<div class="field">
					<label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="text" class="field__item woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
				</div>

			<?php endif; ?>


			<div class="field">
				<label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
				<input type="email" class="field__item woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</div>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>


				<div class="field">
					<label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
					<input type="password" class="field__item woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
				</div>

			<?php else : ?>

				<p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>

			<?php endif; ?>

			<?php do_action( 'woocommerce_register_form' ); ?>

			<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>

			<div class="field mt-4">
				<button type="submit" class="in-cart d-flex align-items-center" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><h5 class="h-100"><?php esc_html_e( 'Register', 'woocommerce' ); ?></h5></button>
			</div>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>

	</div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>

<?php

//Clear header
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_resource_hints', 2);
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

show_admin_bar(false);


//Theme setup

function theme_setup()
{
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('custom-logo');
}

add_action('after_setup_theme', 'theme_setup');

function woocommerce_support()
{
	add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'woocommerce_support');
add_theme_support('html5', array('search-form'));


function wp_enqueue_scripts_footer()
{
	wp_deregister_script('wp-embed');

	wp_deregister_script('jquery-core');
	wp_register_script('jquery-core', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false, NULL, true);
	wp_scripts()->add_data('jquery', 'group', 1);
	wp_scripts()->add_data('jquery-core', 'group', 1);
	wp_scripts()->add_data('jquery-migrate', 'group', 1);

	wp_enqueue_script('app', get_theme_file_uri('dist/app.js'), array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'wp_enqueue_scripts_footer');



//Enqueue scripts

// function theme_scripts()
// {
// 	wp_deregister_script('wp-embed');
// 	// wp_deregister_script( 'jquery-core' );
//     // wp_register_script( 'jquery-core', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', false, NULL, true );
//     // wp_enqueue_script( 'jquery' );
// 	wp_enqueue_script('app', get_theme_file_uri('dist/app.js'), array('jquery'), '', true);
// }

// add_action('wp_enqueue_scripts', 'theme_scripts');


// Enqueue styles
function theme_styles()
{
	wp_enqueue_style('theme-fonts', get_theme_file_uri('fonts/font.css'), null, null);
	wp_enqueue_style('theme-app', get_theme_file_uri('dist/app.css'), null, null);
	wp_enqueue_style('style-app', get_theme_file_uri('style.css'), null, null);
}

add_action('wp_enqueue_scripts', 'theme_styles');




if (!function_exists('phone_filter')) {
	function phone_filter($phone)
	{
		return str_replace([' ', '(', ')', '-'], '', trim($phone));
	}
}
function theme_customize_register($wp_customize)
{
	$wp_customize->add_section('contacts', [
		'title' => 'Контактная информация',
		'priority' => 30,
	]);
	$wp_customize->add_setting('phones');
	$wp_customize->add_control('phones', [
		'section' => 'contacts',
		'label' => 'Телефоны',
		'type' => 'textarea',
	]);

	$wp_customize->add_setting('mails');
	$wp_customize->add_control('mails', [
		'section' => 'contacts',
		'label' => 'Email',
		'type' => 'textarea',
	]);

	$wp_customize->add_setting('adres');
	$wp_customize->add_control('adres', [
		'section' => 'contacts',
		'label' => 'Adres',
		'type' => 'textarea',
	]);

	$wp_customize->add_setting('facebook');
	$wp_customize->add_control('facebook', [
		'section' => 'contacts',
		'label' => 'Facebook',
		'type' => 'text',
	]);
	$wp_customize->add_setting('Instagram');
	$wp_customize->add_control('Instagram', [
		'section' => 'contacts',
		'label' => 'Instagram',
		'type' => 'text',
	]);

	$wp_customize->add_setting('Youtube');
	$wp_customize->add_control('Youtube', [
		'section' => 'contacts',
		'label' => 'Youtube',
		'type' => 'text',
	]);
}
add_action('customize_register', 'theme_customize_register');



function dd($args)
{
	echo '<pre>';
	var_dump($args);
	echo '</pre>';

	die();
}





register_nav_menus(
	array(
		'head_menu' => 'Шапка сайта',
		'side_menu' => 'Левый сайдбар'
	)
);




// Single product


remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start()
{

	if (is_archive()) {

		echo '
            <section class="catalog-page-section">
                <div class="container-fluid">
                    <div class="row">
        ';
	} else {
		echo '
        <section class="single-product-section container-section">
    ';
	}
}

function my_theme_wrapper_end()
{
	if (is_archive()) {

		echo '
				</div>
			</div>
		</section>
        ';
	} else {
		echo '
		</section>
    ';
	}
}




remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
add_action('woocommerce_before_single_product', 'woocommerce_breadcrumb', 1);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
add_action('woocommerce_before_single_product', 'woocommerce_template_single_title', 5);


remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);

remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);





add_filter('woocommerce_product_tabs', 'sb_woo_remove_reviews_tab', 98);
function sb_woo_remove_reviews_tab($tabs)
{
	unset($tabs['reviews']);

	return $tabs;
}


/**
 * Change several of the breadcrumb defaults
 */
add_filter('woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs');
function jk_woocommerce_breadcrumbs()
{
	return array(
		'delimiter'   => '',
		'wrap_before' => '<nav aria-label="breadcrumb"> <ol class="breadcrumb">',
		'wrap_after'  => '</ol> </nav>',
		'before'      => '<li class="breadcrumb-item">',
		'after'       => '</li>',
	);
}

add_filter('woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs', 20);



// Bye by one click
function oneclick()
{
	$product_id = $_POST['product_id'];
	$variation_id = $_POST['variation_id'];
	$quantity = $_POST['quantity'];

	if ($variation_id) {
		WC()->cart->add_to_cart($product_id, $quantity, $variation_id);
	} else {
		WC()->cart->add_to_cart($product_id, $quantity);
	}

	$items = WC()->cart->get_cart();
	global $woocommerce;
	$item_count = $woocommerce->cart->cart_contents_count; ?>

	<?php die();
}

add_action('wp_ajax_oneclick', 'oneclick');
add_action('wp_ajax_nopriv_oneclick', 'oneclick');



add_action('woocommerce_after_main_content', 'woocommerce_output_related_products', 20);





// Catalog product



remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
add_action('woocommerce_archive_description', 'woocommerce_catalog_ordering', 20);


remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
// remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

function true_register_wp_sidebars()
{

	/* сайдбар */
	register_sidebar(
		array(
			'id' => 'true_side', // уникальный id
			'name' => 'Боковая колонка', // название сайдбара
			'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
			'before_widget' => '<div id="%1$s" class="side widget %2$s">', // по умолчанию виджеты выводятся <li>-списком
			'after_widget' => '</div>',
			'before_title' => '<p class="filter__title filter__title--item">', // по умолчанию заголовки виджетов в <h2>
			'after_title' => '</p>'
		)
	);
}

add_action('widgets_init', 'true_register_wp_sidebars');




//========== Checkout



/** Forms */
if (!function_exists('woocommerce_form_field')) {
	/**
	 * Outputs a checkout/address form field.
	 *
	 * @param string $key Key.
	 * @param mixed  $args Arguments.
	 * @param string $value (default: null).
	 * @return string
	 */
	function woocommerce_form_field($key, $args, $value = null)
	{
		$defaults = array(
			'type'              => 'text',
			'label'             => '',
			'description'       => '',
			'placeholder'       => '',
			'maxlength'         => false,
			'required'          => false,
			'autocomplete'      => false,
			'id'                => $key,
			'class'             => array(),
			'label_class'       => array(),
			'input_class'       => array(),
			'return'            => false,
			'options'           => array(),
			'custom_attributes' => array(),
			'validate'          => array(),
			'default'           => '',
			'autofocus'         => '',
			'priority'          => '',
		);
		$args = wp_parse_args($args, $defaults);
		$args = apply_filters('woocommerce_form_field_args', $args, $key, $value);
		if ($args['required']) {
			$args['class'][] = 'validate-required';
			$required        = '&nbsp;<abbr class="required" title="' . esc_attr__('required', 'woocommerce') . '">*</abbr>';
		} else {
			$required = '&nbsp;<span class="optional">(' . esc_html__('optional', 'woocommerce') . ')</span>';
		}
		if (is_string($args['label_class'])) {
			$args['label_class'] = array($args['label_class']);
		}
		if (is_null($value)) {
			$value = $args['default'];
		}
		// Custom attribute handling.
		$custom_attributes         = array();
		$args['custom_attributes'] = array_filter((array) $args['custom_attributes'], 'strlen');
		if ($args['maxlength']) {
			$args['custom_attributes']['maxlength'] = absint($args['maxlength']);
		}
		if (!empty($args['autocomplete'])) {
			$args['custom_attributes']['autocomplete'] = $args['autocomplete'];
		}
		if (true === $args['autofocus']) {
			$args['custom_attributes']['autofocus'] = 'autofocus';
		}
		if ($args['description']) {
			$args['custom_attributes']['aria-describedby'] = $args['id'] . '-description';
		}
		if (!empty($args['custom_attributes']) && is_array($args['custom_attributes'])) {
			foreach ($args['custom_attributes'] as $attribute => $attribute_value) {
				$custom_attributes[] = esc_attr($attribute) . '="' . esc_attr($attribute_value) . '"';
			}
		}
		if (!empty($args['validate'])) {
			foreach ($args['validate'] as $validate) {
				$args['class'][] = 'validate-' . $validate;
			}
		}
		$field           = '';
		$label_id        = $args['id'];
		$sort            = $args['priority'] ? $args['priority'] : '';
		$field_container = '<div class="field" id="%2$s" data-priority="' . esc_attr($sort) . '">%3$s</div>';

		switch ($args['type']) {
			case 'country':
				$countries = 'shipping_country' === $key ? WC()->countries->get_shipping_countries() : WC()->countries->get_allowed_countries();
				if (1 === count($countries)) {
					$field .= '<strong>' . current(array_values($countries)) . '</strong>';
					$field .= '<input type="hidden" name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" value="' . current(array_keys($countries)) . '" ' . implode(' ', $custom_attributes) . ' class="country_to_state" readonly="readonly" />';
				} else {
					$field = '<select name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" class="country_to_state country_select ' . esc_attr(implode(' ', $args['input_class'])) . '" ' . implode(' ', $custom_attributes) . '><option value="">' . esc_html__('Select a country&hellip;', 'woocommerce') . '</option>';
					foreach ($countries as $ckey => $cvalue) {
						$field .= '<option value="' . esc_attr($ckey) . '" ' . selected($value, $ckey, false) . '>' . $cvalue . '</option>';
					}
					$field .= '</select>';
					$field .= '<noscript><button type="submit" name="woocommerce_checkout_update_totals" value="' . esc_attr__('Update country', 'woocommerce') . '">' . esc_html__('Update country', 'woocommerce') . '</button></noscript>';
				}
				break;
			case 'state':
				/* Get country this state field is representing */
				$for_country = isset($args['country']) ? $args['country'] : WC()->checkout->get_value('billing_state' === $key ? 'billing_country' : 'shipping_country');
				$states      = WC()->countries->get_states($for_country);
				if (is_array($states) && empty($states)) {
					$field_container = '<p class="form-row %1$s" id="%2$s" style="display: none">%3$s</p>';
					$field .= '<input type="hidden" class="hidden" name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" value="" ' . implode(' ', $custom_attributes) . ' placeholder="' . esc_attr($args['placeholder']) . '" readonly="readonly" />';
				} elseif (!is_null($for_country) && is_array($states)) {
					$field .= '<select name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" class="state_select ' . esc_attr(implode(' ', $args['input_class'])) . '" ' . implode(' ', $custom_attributes) . ' data-placeholder="' . esc_attr($args['placeholder'] ? $args['placeholder'] : esc_html__('Select an option&hellip;', 'woocommerce')) . '">
						<option value="">' . esc_html__('Select an option&hellip;', 'woocommerce') . '</option>';
					foreach ($states as $ckey => $cvalue) {
						$field .= '<option value="' . esc_attr($ckey) . '" ' . selected($value, $ckey, false) . '>' . $cvalue . '</option>';
					}
					$field .= '</select>';
				} else {
					$field .= '<input type="text" class="field__item ' . esc_attr(implode(' ', $args['input_class'])) . '" value="' . esc_attr($value) . '"  placeholder="' . esc_attr($args['placeholder']) . '" name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" ' . implode(' ', $custom_attributes) . ' />';
				}
				break;
			case 'textarea':
				$field .= '<textarea name="' . esc_attr($key) . '" class="input-text ' . esc_attr(implode(' ', $args['input_class'])) . '" id="' . esc_attr($args['id']) . '" placeholder="' . esc_attr($args['placeholder']) . '" ' . (empty($args['custom_attributes']['rows']) ? ' rows="2"' : '') . (empty($args['custom_attributes']['cols']) ? ' cols="5"' : '') . implode(' ', $custom_attributes) . '>' . esc_textarea($value) . '</textarea>';
				break;
			case 'checkbox':
				$field = '<label class="checkbox ' . implode(' ', $args['label_class']) . '" ' . implode(' ', $custom_attributes) . '>
						<input type="' . esc_attr($args['type']) . '" class="input-checkbox ' . esc_attr(implode(' ', $args['input_class'])) . '" name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" value="1" ' . checked($value, 1, false) . ' /> ' . $args['label'] . $required . '</label>';
				break;
			case 'text':
			case 'password':
			case 'datetime':
			case 'datetime-local':
			case 'date':
			case 'month':
			case 'time':
			case 'week':
			case 'number':
			case 'email':
			case 'url':
			case 'tel':
				$field .= '<input type="' . esc_attr($args['type']) . '" class="field__item ' . esc_attr(implode(' ', $args['input_class'])) . '" name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" placeholder="' . esc_attr($args['placeholder']) . '"  value="' . esc_attr($value) . '" ' . implode(' ', $custom_attributes) . ' />';
				break;
			case 'select':
				$field   = '';
				$options = '';
				if (!empty($args['options'])) {
					foreach ($args['options'] as $option_key => $option_text) {
						if ('' === $option_key) {
							// If we have a blank option, select2 needs a placeholder.
							if (empty($args['placeholder'])) {
								$args['placeholder'] = $option_text ? $option_text : __('Choose an option', 'woocommerce');
							}
							$custom_attributes[] = 'data-allow_clear="true"';
						}
						$options .= '<option value="' . esc_attr($option_key) . '" ' . selected($value, $option_key, false) . '>' . esc_attr($option_text) . '</option>';
					}
					$field .= '<select name="' . esc_attr($key) . '" id="' . esc_attr($args['id']) . '" class="select ' . esc_attr(implode(' ', $args['input_class'])) . '" ' . implode(' ', $custom_attributes) . ' data-placeholder="' . esc_attr($args['placeholder']) . '">
							' . $options . '
						</select>';
				}
				break;
			case 'radio':
				$label_id .= '_' . current(array_keys($args['options']));
				if (!empty($args['options'])) {
					foreach ($args['options'] as $option_key => $option_text) {
						$field .= '<input type="radio" class="input-radio ' . esc_attr(implode(' ', $args['input_class'])) . '" value="' . esc_attr($option_key) . '" name="' . esc_attr($key) . '" ' . implode(' ', $custom_attributes) . ' id="' . esc_attr($args['id']) . '_' . esc_attr($option_key) . '"' . checked($value, $option_key, false) . ' />';
						$field .= '<label for="' . esc_attr($args['id']) . '_' . esc_attr($option_key) . '" class="radio ' . implode(' ', $args['label_class']) . '">' . $option_text . '</label>';
					}
				}
				break;
		}
		if (!empty($field)) {
			$field_html = '';
			if ($args['label'] && 'checkbox' !== $args['type']) {
				$field_html .= '<label for="' . esc_attr($label_id) . '" class="' . esc_attr(implode(' ', $args['label_class'])) . '">' . $args['label'] . $required . '</label>';
			}
			$field_html .= '<span class="woocommerce-input-wrapper">' . $field;
			if ($args['description']) {
				$field_html .= '<span class="description" id="' . esc_attr($args['id']) . '-description" aria-hidden="true">' . wp_kses_post($args['description']) . '</span>';
			}
			$field_html .= '</span>';
			$container_class = esc_attr(implode(' ', $args['class']));
			$container_id    = esc_attr($args['id']) . '_field';
			$field           = sprintf($field_container, $container_class, $container_id, $field_html);
		}
		/**
		 * Filter by type.
		 */
		$field = apply_filters('woocommerce_form_field_' . $args['type'], $field, $key, $args, $value);
		/**
		 * General filter on form fields.
		 *
		 * @since 3.4.0
		 */
		$field = apply_filters('woocommerce_form_field', $field, $key, $args, $value);
		if ($args['return']) {
			return $field;
		} else {
			echo $field; // WPCS: XSS ok.
		}
	}
}


add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');

function custom_override_checkout_fields($fields)
{

	unset($fields['billing']['billing_address_2']);
	unset($fields['billing']['billing_postcode']);

	return $fields;
}




add_action('woocommerce_default_address_fields', 'custom_checkout_filds');


function custom_checkout_filds($fields)
{
	$fields['city']['priority'] = 46;
	$fields['state']['priority'] = 45;
	$fields['address_1']['priority'] = 47;
	$fields['address_1']['placeholder'] = false;

	return $fields;
}

//remove_action('woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20);
//add_action('woocommerce_checkout_billing', 'woocommerce_checkout_payment', 100);

remove_action('woocommerce_checkout_terms_and_conditions', 'wc_checkout_privacy_policy_text', 20);
remove_action('woocommerce_checkout_terms_and_conditions', 'wc_terms_and_conditions_page_content', 30);





add_action('template_redirect', 'woo_custom_redirect_after_purchase');
function woo_custom_redirect_after_purchase()
{
	global $wp;
	if (is_checkout() && !empty($wp->query_vars['order-received'])) {
		wp_redirect(get_site_url() . '/thank-you/');
		exit;
	}
}




/**
 * Edit my account menu order
 */

function my_account_menu_order()
{
	$menuOrder = array(
		'orders'             => __('Мои заказы', 'woocommerce'),
		'edit-address'       => __('Мои адреса', 'woocommerce'),
		'edit-account'    	=> __('Профиль', 'woocommerce'),
		'customer-logout'    => __('Logout', 'woocommerce'),
	);
	return $menuOrder;
}
add_filter('woocommerce_account_menu_items', 'my_account_menu_order');





add_filter('woocommerce_currencies', 'add_my_currency');

function add_my_currency($currencies)
{

	$currencies['UAH'] = __('Українська гривня', 'woocommerce');

	return $currencies;
}

add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);

function add_my_currency_symbol($currency_symbol, $currency)
{

	switch ($currency) {

		case 'UAH':
			$currency_symbol = 'грн';
			break;
	}

	return $currency_symbol;
}





// Related

add_filter('woocommerce_output_related_products_args', 'jk_related_products_args');
function jk_related_products_args($args)
{

	$args['posts_per_page'] = 12; // количество "Похожих товаров"
	return $args;
}






/**
 * Remove product data tabs
 */
add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 98);

function woo_remove_product_tabs($tabs)
{
	unset($tabs['description']);      	// Remove the description tab

	return $tabs;
}

/**
 * Add a custom product data tab
 */
add_filter('woocommerce_product_tabs', 'woo_new_product_tab');
function woo_new_product_tab($tabs)
{

	// Adds the new tab

	$tabs['test_tab'] = array(
		'title' 	=> __('Описание', 'woocommerce'),
		'priority' 	=> 50,
		'callback' 	=> 'woo_new_product_tab_content'
	);

	return $tabs;
}
function woo_new_product_tab_content()
{

	// The new tab content
	echo '<p>' . wp_strip_all_tags(get_the_excerpt()) . '</p>';
}



add_filter('gettext', 'translate_text');
add_filter('ngettext', 'translate_text');


function translate_text($translated)
{
	if (is_woocommerce()) {
		$translated = str_ireplace('Любой', '', $translated);
	}

	return $translated;
}

add_filter('wp_dropdown_cats', function ($html, $args) {
	if ($args['taxonomy'] === 'product_cat') {
		$html = str_replace('<select', '<select data-placeholder="Масла и жидкости"', $html);
	}
	return $html;
}, 10, 2);


add_filter('gettext', 'change_woocommerce_return_to_shop_text', 20, 3);
function change_woocommerce_return_to_shop_text($translated_text, $text, $domain)
{
	switch ($translated_text) {
		case 'Go shop':
			$translated_text = __('Подобрать заказ', 'woocommerce');
			break;
	}
	return $translated_text;
}





add_filter( 'woocommerce_checkout_fields' , 'new_woocommerce_checkout_fields', 10, 1 );
 
function new_woocommerce_checkout_fields($fields){
    
    //$fields['billing']['billing_address_1']['label']="Адрес доставки";
    $fields['billing']['billing_city']['label']="Город, отделение Новой почты";
	//$fields['billing']['billing_nova_poshta_city']['required']=false;
	//$fields['billing']['billing_nova_poshta_warehouse']['required']=false;
	//$fields['billing']['billing_nova_poshta_city']['label']="Новая почта - город";
	//$fields['billing']['billing_nova_poshta_warehouse']['label']="Новая почта - отделение";
	$fields['billing']['billing_address_1']['required']=false;
	$fields['billing']['billing_address_1']['label']="Адрес (для адресной доставки)";
    $fields['billing']['billing_address_2']['required']=false;
	$fields['billing']['billing_postcode']['required']=false;
	$fields['billing']['billing_country']['required']=false;
	//$fields['billing']['billing_state']['required']=false;
	$fields['billing']['billing_email']['required']=false;
	$fields['billing']['billing_postcode']['required']=false;
	$fields['billing']['billing_city']['required']=false;
	$fields['billing']['billing_state']['label']="Город";
	
	
    return $fields;
}

add_filter('woocommerce_checkout_fields','remove_checkout_fields');
function remove_checkout_fields($fields){
    //unset($fields['billing']['billing_first_name']);
    //unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    //unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);
    //unset($fields['billing']['billing_phone']);
    //unset($fields['order']['order_comments']);
    unset($fields['billing']['billing_email']);
    //unset($fields['account']['account_username']);
    //unset($fields['account']['account_password']);
    //unset($fields['account']['account_password-2']);
    return $fields;
}

/* Мета-поля для категорий товаров */
add_action("product_cat_edit_form_fields", 'mayak_meta_product_cat');
function mayak_meta_product_cat($term){
    ?>
        <tr class="form-field">
            <th scope="row" valign="top"><label>Заголовок (title)</label></th>
            <td>
                <input type="text" name="mayak[title]" value="<?php echo esc_attr( get_term_meta( $term->term_id, 'title', 1 ) ) ?>"><br />
                <p class="description">Не более 70 знаков, включая пробелы</p>
            </td>
        </tr>
        
<tr class="form-field">
            <th scope="row" valign="top"><label>Краткое описание (description) </label></th>
            <td>
                <input type="text" name="mayak[description]" value="<?php echo esc_attr( get_term_meta( $term->term_id, 'description', 1 ) ) ?>"><br />
                <p class="description">Краткое описание (description) 150-300 symbols</p>
            </td>
        </tr>

      <tr class="form-field">
            <th scope="row" valign="top"><label>Заголовок h1</label></th>
            <td>
                <input type="text" name="mayak[h1]" value="<?php echo esc_attr( get_term_meta( $term->term_id, 'h1', 1 ) ) ?>"><br />
                <p class="description">Заголовок страницы</p>
            </td>
        </tr>

<tr class="form-field">
            <th scope="row" valign="top"><label>Ключевые слова</label></th>
            <td>
                <input type="text" name="mayak[keywords]" value="<?php echo esc_attr( get_term_meta( $term->term_id, 'keywords', 1 ) ) ?>"><br />
                <p class="description">Ключевые слова (keywords)</p>
            </td>
        </tr>
    <?php
}


add_action('edited_product_cat', 'mayak_save_meta_product_cat'); 
add_action('create_product_cat', 'mayak_save_meta_product_cat'); 
function mayak_save_meta_product_cat($term_id){
	if (!isset($_POST['mayak'])) return; $mayak = array_map('trim', $_POST['mayak']); foreach($mayak as $key => $value){ if(empty($value)){ delete_term_meta($term_id, $key); continue; } update_term_meta($term_id, $key, $value); } 
	
	return $term_id; 
	}



add_filter('single_term_title', 'mayak_filter_single_cat_title', 10, 1);
add_filter( 'single_term_title', 'mayak_poduct_cat_title', 10, 1);
add_filter( 'single_term_title', 'poduct_descr', 10, 1);
function mayak_filter_single_cat_title() {
    $pci =  get_queried_object()->term_id;
    return get_term_meta ($pci, 'title', true);
}
function mayak_poduct_cat_title($pct){
    if(empty($pct)){
        $pct = get_queried_object()->name;
    }
    return $pct;
}


/* Вывод description для категорий товаров */
add_action('wp_head', 'mayak_description_product_cat', 1, 1);
function mayak_description_product_cat(){
    if(is_product_category()){
    $pcd = get_term_meta (get_queried_object()->term_id, 'description', true);
    if(!empty($pcd)){
    $meta = '<meta name="description"  content="'.$pcd.'"/>'."\n";
    }
    else {        
       $pcd = wp_filter_nohtml_kses(substr(category_description(), 0, 280));
       $meta = '<meta name="description"  content="'.$pcd.'"/>'."\n";   
    }
    echo $meta;
    }
}
/* Вывод keywords для категорий товаров */
add_action('wp_head', 'mayak_keywords_product_cat', 1, 1);
function mayak_keywords_product_cat(){
    if(is_product_category()){
    $pck = get_term_meta (get_queried_object()->term_id, 'keywords', true );
    $aut = '<meta name="keywords" content="'.$pck.'">'."\n";
    }
    echo $aut;
}

/* Вывод h1 для категорий товаров */
if(strpos($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'], '/product-category/'))
add_filter ( 'woocommerce_show_page_title' , 'mayak_woocommerce_product_cat_h1' , 10 , 2 );
function mayak_product_cat_h1(){
    $pch = get_term_meta (get_queried_object()->term_id, 'h1', true);
    echo '<h1 class="woocommerce-products-header__title page-title">'.$pch.'</h1>';
    if(empty($pch)){
       echo '<h1 class="woocommerce-products-header__title page-title">'.get_queried_object()->name.'</h1>';
    }
}
function mayak_woocommerce_product_cat_h1(){
    return  mayak_product_cat_h1($pch);    
}


/**
 * Remove the generated product schema markup from Product Category and Shop pages.
 */
function wc_remove_product_schema_product_archive() {
	remove_action( 'woocommerce_shop_loop', array( WC()->structured_data, 'generate_product_data' ), 10, 0 );
}
add_action( 'woocommerce_init', 'wc_remove_product_schema_product_archive' );


remove_action( "woocommerce_archive_description", "woocommerce_taxonomy_archive_description", 10 );
add_action( "woocommerce_before_shop_loop", "woocommerce_taxonomy_archive_description", 99 );

/**
 * counter goods in basket
 */
 

add_filter('woocommerce_add_to_cart_fragments', 'header_add_to_cart_fragment');

function header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    ob_start();
    ?>
    <span class="basket-btn__counter">(<?php echo sprintf($woocommerce->cart->cart_contents_count); ?>)</span>
    <?php
    $fragments['.basket-btn__counter'] = ob_get_clean();
    return $fragments;
}

add_filter( 'woocommerce_shipping_package_name', 'custom_shipping_package_name' );
function custom_shipping_package_name( $name ) {
  return false;
}


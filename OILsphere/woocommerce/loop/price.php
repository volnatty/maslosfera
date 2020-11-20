<?php
/**
 * Loop Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @package    WooCommerce/Templates
 * @version     1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product; ?>


<?php if ($product->get_sale_price()) : ?>

<div class="oil-card__price">
    <div class="title-price">Цена</div>

    <div class="ml-auto text-right">
        <div class="old-price">
            <b><?php echo $product->get_regular_price(); ?></b> <small>грн</small>
        </div>

        <div class="real-price">
            <b><?php echo $product->get_sale_price(); ?></b> <small>грн</small>
        </div>
    </div>

<?php else : ?>

    <div class="oil-card__price">

        <div class="title-price">Цена</div>

        <div class="real-price"><b><?php echo $product->get_regular_price(); ?></b> <small>грн</small></div>

<?php endif; ?>


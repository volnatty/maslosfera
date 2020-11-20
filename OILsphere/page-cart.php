<?php get_header('secondary'); ?>



<section class="cart-section container-section">
    

    <?php do_action( 'woocommerce_before_cart' ); ?>

    <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
        <?php do_action( 'woocommerce_before_cart_table' ); ?>

        <div class="container-fluid shop_table shop_table_responsive cart woocommerce-cart-form__contents">

            

            <div class="row no-gutters align-items-end cart-row-title py-4 d-none d-lg-flex">
                <div class="col-lg-2">
                    <h1 class="cart-title h2">Корзина</h1>
                </div>
                <div class="col-lg-3">
                    <p class="cart-title pb-2 text-muted">Наименование товара</p>
                </div>
                <div class="col-lg-2">
                    <p class="cart-title pb-2 text-muted">Цена</p>
                </div>
                <div class="col-lg-1">
                    <p class="cart-title pb-2 text-muted">Количество</p>
                </div>
                <div class="col-lg-2"></div>
                <div class="col-lg-2">
                    <p class="cart-title pb-2 text-muted text-right">Итого</p>
                </div>
            </div>

            <?php do_action( 'woocommerce_before_cart_contents' ); ?>

            <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                    $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                    ?>

                <div class="row no-gutters align-items-center cart-row py-2   woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?> ">
                    <div class="col-8 offset-2 col-sm-6 offset-sm-3 col-lg-2 offset-lg-0 pr-lg-5">
                        <a href="<?= $product_permalink ?>" class="d-block cart-img" style="background-image: url('<?php echo get_the_post_thumbnail_url( $product_id ); ?>')"></a>
                    </div>
                    <div class="col-lg-3 pr-lg-5 mt-4 mt-lg-0">
                        <h3 class="cart-product-title text-center text-lg-left"><?php echo $_product->get_name() ?></h3>
                    </div>
                    <div class="col-6 col-lg-2 pr-lg-5 text-center text-lg-left">
                        <div class="real-price h3">
                            <b><?php echo $_product->get_price(); ?></b> <small>грн</small>
                        </div>
                    </div>
                    <div class="col-6 col-lg-1 pr-lg-5 text-center text-lg-left" >
                        <div class="amount d-inline-flex">
                            <input type="text" value="<?php echo $cart_item['quantity']; ?>">
                            <div class="amount__btn">
                                <button class="amount__btn__max" type="button">+</button>
                                <button class="amount__btn__min" type="button">-</button>
                            </div>
                        </div>

                        <div class="input-hidden product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
                            <?php
                                if ( $_product->is_sold_individually() ) {
                                    $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                } else {
                                    $product_quantity = woocommerce_quantity_input( array(
                                        'input_name'   => "cart[{$cart_item_key}][qty]",
                                        'input_value'  => $cart_item['quantity'],
                                        'max_value'    => $_product->get_max_purchase_quantity(),
                                        'min_value'    => '0',
                                        'product_name' => $_product->get_name(),
                                    ), $_product, false );
                                }

                                echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-2 pr-xl-5 my-4 my-lg-0 text-center text-lg-left">

                        <?php
                            // @codingStandardsIgnoreLine
                            echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                '<a href="%s" class="cart-delete" aria-label="%s" data-product_id="%s" data-product_sku="%s">
                                    <svg width="25" height="25">
                                        <use xlink:href="#delete-icon"></use>
                                    </svg>
                                    <span>Удалить товар</span>
                                </a>',
                                esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                __( 'Remove this item', 'woocommerce' ),
                                esc_attr( $product_id ),
                                esc_attr( $_product->get_sku() )
                            ), $cart_item_key );
                        ?>
                    </div>
                    <div class="col-lg-2 text-right d-none d-lg-block">
                        <div class="real-price h3">
                            <b><?php echo $cart_item['line_subtotal']; ?></b> <small>грн</small>
                        </div>
                    </div>
                </div>

                <?php do_action( 'woocommerce_after_cart_contents' ); ?>

            <?php } } ?>

            <div class="row py-5 justify-content-end">
                <div class="col-lg-auto d-flex align-items-center justify-content-center justify-content-lg-start ">
                    <span class="mr-5 text-muted">Итого:</span>
                    <div class="real-price h3">
                    <?php global $woocommerce; ?>
                        <b><?= $woocommerce->cart->total; ?></b> <small>грн</small>
                    </div>
                </div>
                <div class="col-lg-auto d-flex align-items-center cart-column">

                    <button type="submit" class="btn btn-update-cart mr-lg-4" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>">Обновить корзину</button>

                    <a href="<?= get_site_url(); ?>/checkout" class="in-cart in-cart--order d-flex align-items-center justify-content-center justify-content-lg-end mt-4 mt-lg-0">
                        <h5 class="h-100">ПЕРЕЙТИ К ОФОРМЛЕНИЮ ЗАКАЗА</h5>
                    </a>

                    <?php do_action( 'woocommerce_cart_actions' ); ?>

                    <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
                </div>
            </div>


        </div>

    </form>

</section>

<?php get_footer(); ?>

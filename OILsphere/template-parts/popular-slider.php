<?php $products = new WP_Query([
    'post_type' => 'product',
    'orderby' => 'total_sales',
    'order' => 'desc',
    'posts_per_page' => 12
]); ?>



<!-- =========== popular section -->

<section class="popular-section--other">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2>Популярные товары</h2>
                <div class="row">
                    <div class="popular-slider slider2">

                        <?php
                        while ($products->have_posts()) : $products->the_post();
                            $product = wc_get_product($post->ID); ?>

                            <div class="col-sm-6 col-md-4 col-xl-3">

                                <div class="popular-slider__item">
                                    <div class="oil-card">
                                        <a href="<?php echo get_permalink(); ?>" class="oil-card__img d-block w-100" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></a>
                                        <a href="<?php echo get_permalink($product->get_id()); ?>" class="oil-card__title h4 d-block">
                                            <?php echo get_the_title(); ?>
                                        </a>

                                        <?php $oldprice = $product->get_sale_price(); ?>

                                        <?php
                                        if ($oldprice) : ?>

                                            <div class="old-price text-center">
                                                <?php echo $product->get_regular_price(); ?> грн
                                            </div>

                                            <div class="oil-card__price">

                                                <div class="title-price">Цена</div>

                                                <div class="real-price"><b><?php echo $product->get_sale_price(); ?></b> грн</div>
                                                <a data-id="<?php echo $id; ?>" href="#" data-quantity="<?php echo esc_attr(isset($args['quantity']) ? $args['quantity'] : 1); ?>" class="one-click-button buy w-100 d-flex align-items-center justify-content-center">
                                                    <div class="buy__line h4 h-100 text-center">
                                                        Купить
                                                    </div>
                                                    <div class="buy__btn"></div>
                                                </a>

                                            </div>

                                        <?php else : ?>



                                            <div class="oil-card__price">

                                                <div class="title-price">Цена</div>

                                                <div class="real-price"><b><?php echo $product->get_regular_price(); ?></b> грн</div>
                                                <a data-id="<?php echo $id; ?>" href="#" data-quantity="<?php echo esc_attr(isset($args['quantity']) ? $args['quantity'] : 1); ?>" class="one-click-button buy w-100 d-flex align-items-center justify-content-center">
                                                    <div class="buy__line h4 h-100 text-center">
                                                        Купить
                                                    </div>
                                                    <div class="buy__btn"></div>
                                                </a>

                                            </div>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>


                        <?php endwhile; ?>

                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>

                <div class="slider-nav slider-nav--popul d-flex align-items-center justify-content-between mt-5">

                    <h5 class="slider-nav__item popul-slider-prev">Предыдущий</h5>

                    <h5 class="slider-nav__item popul-slider-next">Следующий</h5>

                </div>
            </div>
        </div>
    </div>
</section>
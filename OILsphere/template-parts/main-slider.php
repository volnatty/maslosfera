<?php $books = new WP_Query([
    'post_type' => 'book',
    'orderby' => 'id',
    'order' => 'desc'
]);
$count = 0;
if ($books->have_posts()): ?>
    <section class="main_slider_section">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col">
                    <div class="title_h4">
                        <h4>My Books</h4>
                        <span class="line"></span>
                        <div class="slider_counter">
                            <p><span id="sliderCounterActive" class="slider_counter_active">2</span> / <span
                                        class="main_slider_counter_all">4</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="main_slider">

            <?php while ($books->have_posts()) : $books->the_post(); ?>

                <div class="main_slider_item">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="sub_title">
                                    <h2><?php echo get_the_title(); ?></h2>
                                    <p><?php echo wp_trim_words(get_the_content(), 40, '...'); ?></p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="slider_item_img">
                                    <img src="<?php echo get_the_post_thumbnail_url($post->id, 'full'); ?>" alt="">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="slider_btn_price d-flex align-items-center justify-content-end">
                                    <a href="<?php echo get_permalink(); ?>" class="btn btn-primary">
                                        <svg width="16" height="16">
                                            <use xlink:href="#samurai_icon"></use>
                                        </svg>
                                        More info
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="container">
            <div class="row">

                <?php while ($books->have_posts()) : $books->the_post();
                    $count++; ?>

                    <div class="col">
                        <?php if ($count == 1): ?>
                            <div class="main-slider-arrow main-slider-arrow-prev js_prev">
                                <svg width="16" height="16">
                                    <use xlink:href="#prev_icon"></use>
                                </svg>
                                <span>Previous</span></div>
                            <div class="book_mini prev_img js_prev">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                            </div>
                        <?php elseif($count == $books->post_count): ?>
                            <div class="main-slider-arrow main-slider-arrow-next js_next justify-content-end">
                                <span>Next</span>
                                <svg width="16" height="16">
                                    <use xlink:href="#next_icon"></use>
                                </svg>
                            </div>
                            <div class="book_mini next_img js_next">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                            </div>
                        <?php endif; ?>
                    </div>

                <?php endwhile; ?>

            </div>
        </div>


    </section>
<?php endif;
wp_reset_postdata(); ?>
<section class="main-desk-section d-flex flex-wrap">

    <div class="front-main-slider-for slider1-for order-xl-2 from_right">
        <?php 
            $front_slider_images = get_field('front_slider' , 15);
        ?>
        <?php foreach($front_slider_images as $front_slider_image): ?>

            <div class="front-main-slider__item">
                <a href="<?php echo ($front_slider_image['slide_link']) ?>" style="background-image: url('<?php echo ($front_slider_image['slide_img']) ?>')">
                </a>
                <h3 class="slide-title slide-title--img"><?php echo ($front_slider_image['slide_title']) ?></h3>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="front-slider-wrap from_left order-xl-1">

        <svg class="slide-decor" width="150" height="150">
            <use xlink:href="#dots-icon"></use>
        </svg>

        <div class="front-main-slider slider1">

            <?php 
                $front_sliders = get_field('front_slider' , 15);
            ?>

            <?php foreach($front_sliders as $front_slider): ?>

                <div class="front-main-slider__item d-flex align-items-start justify-content-center flex-column">
                    <h2 class="slide-title"><?php echo ($front_slider['slide_title']) ?></h2>
                    <p class="slide-text"><?php echo ($front_slider['slide_text']) ?></p>
                    <a href="<?php echo ($front_slider['slide_link']) ?>" class="btn btn-primary"><span>Подробнее</span></a>
                </div>


            <?php endforeach; ?>

        </div>
        

        <div class="slider-nav d-flex align-items-center justify-content-between">

            <h5 class="slider-nav__item front-slider-prev">Предыдущий</h5>

            <h5 class="slider-nav__item front-slider-next">Следующий</h5>

        </div>
    </div>

    <div class="main-desk-social d-flex flex-column from_top">
        <div class="main-desk-social__item d-flex align-items-center justify-content-center justify-content-xl-end flex-xl-column">
            <a href="<?php echo get_theme_mod('facebook'); ?>" target="blanck">
                <svg width="20" height="20">
                    <use xlink:href="#fb-icon"></use>
                </svg>
            </a>

            <a href="<?php echo get_theme_mod('Instagram'); ?>" target="blanck">
                <svg width="20" height="20">
                    <use xlink:href="#insta-icon"></use>
                </svg>
            </a>

            <a href="<?php echo get_theme_mod('Youtube'); ?>" target="blanck">
                <svg width="20" height="20">
                    <use xlink:href="#yt-icon"></use>
                </svg>
            </a>
        </div>
        <div class="main-desk-social__item main-desk-social__item--scroll d-none d-xl-flex align-items-center justify-content-end flex-column">
            <a href="#front-popul" class="d-flex align-items-center justify-content-center flex-column">
                <span>скролл вниз</span>
                <svg width="15" height="25">
                    <use xlink:href="#scroll-icon"></use>
                </svg>
            </a>
        </div>
    </div>

</section>
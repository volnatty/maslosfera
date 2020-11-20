<!-- =========== footer section -->
<footer class="container-section">
    <div class="container-fluid">
        <div class="footer-bg">
            <div class="row">
                <div class="col-md-2 col-lg-2 text-center text-xl-left">
                    <a class="navbar-brand logo square square--header d-inline-flex d-md-flex align-items-center justify-content-center" href="<?php echo site_url(); ?>">">
                        <div class="logo__layer logo__layer--1">
                            <img src="<?php echo get_theme_file_uri('images/logo1layer.jpg'); ?>" alt="">
                        </div>
                        <div class="logo__layer logo__layer--2">
                            <img src="<?php echo get_theme_file_uri('images/logo2layer.png'); ?>" alt="">
                        </div>
                    </a>
                </div>

                <div class="col-md-3 col-lg-2 text-center">
                    <!-- <a href="<?php get_site_url(); ?>/shop" class="footer-title h4">КАТАЛОГ</a>
                    <ul class="footer-list"> -->

                    <?php
                    // $prod_cat_args = array(
                    //     'taxonomy'    => 'product_cat',
                    //     'orderby'     => 'id', // здесь по какому полю сортировать
                    //     'hide_empty'  => false, // скрывать категории без товаров или нет
                    //     'parent'      => 0, // id родительской категории,
                    //     'exclude' => 15
                    // );


                    // $woo_categories = get_categories( $prod_cat_args );
                    // foreach ( $woo_categories as $woo_cat ) {
                    //     $woo_cat_id = $woo_cat->term_id; //category ID
                    //     $woo_cat_name = $woo_cat->name; //category name
                    //     $woo_cat_slug = $woo_cat->slug; //category slug

                    //     echo '<li>';

                    //     echo ' <a href=" ' . get_term_link( $woo_cat_id, 'product_cat' ) . ' "> ' . $woo_cat_name . '</a>' . 

                    //     "</li>\n";

                    // }
                    ?>

                    <!-- </ul> -->

                    <div class="footer-social">
                        <a href="<?php echo get_theme_mod('facebook'); ?>" class="footer-social__item" target="_blank">
                            <svg width="40" height="40">
                                <use xlink:href="#fb-icon"></use>
                            </svg>
                        </a>

                        <a href="<?php echo get_theme_mod('Instagram'); ?>" class="footer-social__item" target="_blank">
                            <svg width="40" height="40">
                                <use xlink:href="#insta-icon"></use>
                            </svg>
                        </a>

                        <a href="<?php echo get_theme_mod('Youtube'); ?>" class="footer-social__item" target="_blank">
                            <svg width="40" height="40">
                                <use xlink:href="#yt-icon"></use>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-lg-2 d-none d-md-block">
                    <a href="<?php get_site_url(); ?>/about-us" class="footer-title h4">О НАС</a>
                    <ul class="footer-list">
                        <li><a href="<?php get_site_url(); ?>/payment">ОПЛАТА</a></li>
                        <li><a href="<?php get_site_url(); ?>/warranty">ГАРАНТИЯ И ВОЗВРАТ</a></li>
                    </ul>
                </div>
                <div class="col-md-4 col-lg-3">
                    <h4 class="footer-title">КОНТАКТНАЯ ИНФОРМАЦИЯ</h4>
                    <ul class="footer-list">

                        <?php
                        $phones = get_theme_mod('phones');
                        $phones__arrays = explode("\n", $phones);
                        ?>
                        <?php foreach ($phones__arrays as $phones__array) : ?>
                            <li>
                                <a onclick="gtag('event', 'click', {'event_category': 'call'});" href="tel:<?php echo phone_filter($phones__array); ?>">
                                    <svg width="15" height="15">
                                        <use xlink:href="#phone-icon"></use>
                                    </svg>
                                    <?php echo $phones__array ?>
                                </a>
                            </li>
                        <?php endforeach; ?>

                        <?php
                        $mails = get_theme_mod('mails');
                        $mails__arrays = explode("\n", $mails);
                        ?>
                        <?php foreach ($mails__arrays as $mails__array) : ?>
                            <li>
                                <a href="mailto:<?php echo phone_filter($mails__array); ?>">
                                    <svg width="15" height="15">
                                        <use xlink:href="#mail-icon"></use>
                                    </svg>
                                    <?php echo $mails__array ?>
                                </a>
                            </li>
                        <?php endforeach; ?>

                        <?php
                        $adres = get_theme_mod('adres');
                        $adres__arrays = explode("\n", $adres);
                        ?>
                        <?php foreach ($adres__arrays as $adres__array) : ?>
                            <li>
                                <p>
                                    <svg width="15" height="15">
                                        <use xlink:href="#hous-icon"></use>
                                    </svg>
                                    <?php echo $adres__array ?>
                                </p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-md-6 offset-md-3 col-lg-3 offset-lg-0 pr-5 mb-4">
                    <h4 class="footer-title">вы Мастер или Владелец СТО?</h4>
                    <p class="footer-title">- позвоните, и мы договоримся:</p>
					<a href="tel:+380676133038"><h5 class="footer-title">067-613-30-38</h5></a>
                    <!-- <div class="field field--footer mt-5">
                        <span>
                            <input class="field__item" id="inp1" type="text">
                        </span>
                        <label for="inp1">ВАШ Email</label>
                        <button type="submit"></button>
                    </div> 
                    <?= do_shortcode('[contact-form-7 id="262" title="email подписка"]'); ?>-->
                    <div class="footer-social">
                        <a href="<?php echo get_theme_mod('facebook'); ?>" target="_blank">
                            <svg width="20" height="20">
                                <use xlink:href="#fb-icon"></use>
                            </svg>
                        </a>

                        <a href="<?php echo get_theme_mod('Instagram'); ?>" target="_blank">
                            <svg width="20" height="20">
                                <use xlink:href="#insta-icon"></use>
                            </svg>
                        </a>

                        <a href="<?php echo get_theme_mod('Youtube'); ?>" target="_blank">
                            <svg width="20" height="20">
                                <use xlink:href="#yt-icon"></use>
                            </svg>
                        </a>
						
						<p><img src="https://maslosfera.com/wp-content/themes/OILsphere/images/mc.png" alt="masterCard"></p>
						<p><img src="https://maslosfera.com/wp-content/themes/OILsphere/images/visa.png" alt="visa"></p>
						<p><img src="https://maslosfera.com/wp-content/themes/OILsphere/images/lq.png" alt="liqPay"></p>
						
                    </div>
                </div>
            </div>
        </div>

        <div class="dev-line d-flex justify-content-between">
            <p class="dev-line__item">© <?= date('Y') ?> Все права защищены.</p>
		    <p class="dev-line__item text-right">Дизайн и разработка <a href="https://impressionbureau.pro" target="blank">ImpressionBureau</a> 2019</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

<script type="text/javascript">
    document.addEventListener('wpcf7mailsent', function sendMail(event) {
        if ('262' == event.detail.contactFormId) {
            gtag('event', 'click', {
                'event_category': 'new'
            });
        }
    }, false);
</script>
</body>
</html>

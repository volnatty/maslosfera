<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php wp_head(); ?>

    <?php wp_reset_postdata(); ?>
	<!-- Global site tag (gtag.js) - Google Ads: 649996942 -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-649996942"></script>
			<script>
			  window.dataLayer = window.dataLayer || [];
			  function gtag(){dataLayer.push(arguments);}
			  gtag('js', new Date());

			  gtag('config', 'AW-649996942');
			</script>
	<script>
		  gtag('event', 'page_view', {
			'send_to': 'AW-649996942',
			'value': 'replace with value',
			'items': [{
			  'id': 'replace with value',
			  'location_id': 'replace with value',
			  'google_business_vertical': 'education'
			}, {
			  'origin': 'replace with value',
			  'destination': 'replace with value',
			  'start_date': 'replace with value',
			  'end_date': 'replace with value',
			  'google_business_vertical': 'flights'
			}, {
			  'id': 'replace with value',
			  'location_id': 'replace with value',
			  'google_business_vertical': 'jobs'
			}, {
			  'id': 'replace with value',
			  'location_id': 'replace with value',
			  'google_business_vertical': 'local'
			}, {
			  'id': 'replace with value',
			  'google_business_vertical': 'retail'
			}, {
			  'origin': 'replace with value',
			  'destination': 'replace with value',
			  'start_date': 'replace with value',
			  'end_date': 'replace with value',
			  'google_business_vertical': 'travel'
			}, {
			  'id': 'replace with value',
			  'location_id': 'replace with value',
			  'google_business_vertical': 'custom'
			}]
		  });
	</script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-127966202-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-127966202-2');
    </script>

</head>


<body <?php body_class(); ?>>





    <?php get_template_part('template-parts/symbols'); ?>







    <!--================ header -->



    <header class="header_section">
				 

   				
			
        <nav class="navbar navbar-expand-xl navigation_wrap align-items-center">
			
            <a class="navbar-brand logo square square--header d-flex align-items-center justify-content-center" href="<?php echo site_url(); ?>">">
                <div class="logo__layer logo__layer--1">
                    <img src="<?php echo get_theme_file_uri('images/logo1layer.jpg'); ?>" alt="">
                </div>
                <div class="logo__layer logo__layer--2">
                    <img src="<?php echo get_theme_file_uri('images/logo2layer.png'); ?>" alt="">
                </div>
            </a>

            <form class="search-form-media d-flex d-xl-none" role="search" method="get" id="searchform" action="<?php get_site_url(); ?>/">

                <div class="search-btn search-btn--media square d-xl-none">

                    <div id="search-open--media" class="search-btn__triger search-btn--media__triger square">
                        <svg width="27" height="27">
                            <use xlink:href="#search-icon"></use>
                        </svg>
                    </div>

                    <button id="searchsubmit" type="submit" class="search-btn__submit search-btn--media__submit  square">
                        <svg width="27" height="27">
                            <use xlink:href="#search-icon"></use>
                        </svg>
                    </button>

                </div>

                <div class="search-line d-flex d-xl-none">
                    <input type="text" value="" name="s" id="s" placeholder="Найти" />
                    <div id="search-close--media" class="search-btn__triger  square">
                        <svg width="25" height="25">
                            <use xlink:href="#close-icon"></use>
                        </svg>
                    </div>
                </div>


                <input type="hidden" value="1" name="sentence" />
                <input type="hidden" value="product" name="post_type" />

            </form>

            <button class="navbar-toggler menu_main_btn square" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <h6>Menu</h6>
                <span class="menu_btn menu_btn_top"></span>
                <span class="menu_btn menu_btn_end"></span>
            </button>


            <a href="<?php get_site_url(); ?>/cart/" class="cart-header square square--header order-xl-2">
                <span></span>
                <svg width="27" height="27">
                    <use xlink:href="#cart-icon"></use>
                </svg>
				<div class="basket-btn__counter"><?php echo sprintf($woocommerce->cart->cart_contents_count); ?></div>
            </a>


            <div class="collapse navbar-collapse order-xl-1" id="navbarSupportedContent">
                <ul class="navbar-nav nav-list">
                    <?php
                    if ($menu_items = wp_get_nav_menu_items('Top menu')) { // "Меню для шапки" - это название моего меню. Вы можете также использовать ID или ярлык
                        $menu_list = '';
                        foreach ((array) $menu_items as $key => $menu_item) {
                            $title = $menu_item->title; // заголовок элемента меню (анкор ссылки)
                            $url = $menu_item->url; // URL ссылки
                            $menu_list .=
                                '<li class="nav-item"> 
                            <a href="' . $url . '" class="nav-link">' . $title . '</a>
                        </li>';
                        }
                        echo $menu_list;
                    }
                    ?>
                </ul>

                <ul class="navbar-nav nav-list nav-list--tel">
                    <?php
                    $phones = get_theme_mod('phones');
                    $phones__arrays = explode("\n", $phones);
                    ?>
                    <?php foreach ($phones__arrays as $phones__array) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="tel:<?php echo phone_filter($phones__array); ?>">
                                <svg width="22" height="22">
                                    <use xlink:href="#phone-icon"></use>
                                </svg>
                                <span><?php echo $phones__array ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= get_site_url(); ?>/my-account/edit-account/">
                            <svg width="22" height="22">
                                <use xlink:href="#user_k"></use>
                            </svg>
                            <span>Аккаунт</span>
                        </a>
                    </li>
                </ul>
            </div>


        </nav>
	   			
    </header>


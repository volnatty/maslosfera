<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="google-site-verification" content="jvNZvgeZXBSNPbLxXs8ekZp845nKB1A79L53NnizwF4" />
	<meta name="description" content="При подборе масла для твоего автомобиля я всегда соблюдаю ⚙️допуск, 🩸спецификацию производителя автомобиля и даю 👌цену, доступную тебе, купи в МАСЛОСФЕРЕ масло, ведь парфюм ты купил себе сам!"/>
	
    
    <meta name="keywords" content="Антифриз Масло Смазки 5л 4л 1л Производитель Вязкость Спецификация Допуск Гарантия и Возврат Доставка Канистра"/>

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


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-127966202-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-127966202-2');
		
    </script>
</head>


<body <?php body_class(); ?>>
    <?php get_template_part('template-parts/symbols'); ?>


    <!--================ header -->
    <header class="header_section">
        <nav class="navbar navbar-expand-xl navigation_wrap align-items-center">
            <a class="navbar-brand logo square square--header d-flex align-items-center justify-content-center" href="<?php echo site_url(); ?>">
                <div class="logo__layer logo__layer--1">
                    <img src="<?php echo get_theme_file_uri('images/logo1layer.jpg'); ?>" alt="logo">
                </div>
                <div class="logo__layer logo__layer--2">
                    <img src="<?php echo get_theme_file_uri('images/logo2layer.png'); ?>" alt="logo">
                </div>
            </a>

            

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
                    if ($menu_items = wp_get_nav_menu_items('Top menu')) {
                        $menu_list = '';
                        foreach ((array) $menu_items as $key => $menu_item) {
                            $title = $menu_item->title; // заголовок элемента меню (анкор ссылки)
                            $url = $menu_item->url; // URL ссылки
                            $menu_list .=
                                '<li class="nav-item"> 
                            <a href="' . $url . '" class="nav-link"><span>' . $title . '</span></a>
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
                            <a class="nav-link" onclick="gtag('event', 'click', {'event_category': 'call'});" href="tel:<?php echo phone_filter($phones__array); ?>">
                                <svg width="22" height="22">
                                    <use xlink:href="#phone-icon"></use>
                                </svg>
                                <span><?php echo $phones__array ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
					
					
					<li class="nav-item">
                        <a class="nav-link" href="https://autoopora.com/">
							<svg width="22" height="22">
                                    <use xlink:href="#hous-icon"></use>
                                </svg>
                            <span>АвтоОпора</span>
                            
                        </a>
                    </li>
					
                    <li class="nav-item">
                        <a class="nav-link" href="<?= get_site_url(); ?>/my-account/edit-account/">
						    <svg width="40" height="39">
                                <use xlink:href="#user_k"></use>
							</svg>	
												
                            <span>Аккаунт</span>
                        </a>
                    </li>
                </ul>
            </div>
					

        </nav>
					<style>
					   .colortext
					   {
						color:red;
						display:inline-block;
						font-size:25px;
					   }
					  </style>
						<center>
							 <h3>
								<div class="colortext">спецпредложение -10% </div> 
							 </h3>
						</center>  
					 
        <?php get_template_part('template-parts/side-menu'); ?>

  		


		
<!-- Разметка JSON-LD, созданная Мастером разметки структурированных данных Google. -->
<script type="application/ld+json">
{
  "@context" : "http://schema.org",
  "@type" : "store",
  "name" : "МаслоСфера",
  "priceRange": "50 - 5 000 UAH",
  "image" : "https://maslosfera.com/wp-content/themes/OILsphere/images/logo2layer.png",
  "telephone" : [
	"(095) 232-36-13",
	"(067) 613-30-38",
	"(061) 701-10-03"
	],
  "email" : "s.volkov@maslosfera.com",
  "address" : {
    "@type" : "PostalAddress",
    "streetAddress" : "ул. Воронина 2",
    "addressLocality" : "Запорожье",
    "addressCountry" : "Украина",
    "postalCode" : "69120"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 47.849331,
    "longitude": 35.140704
  },
  "openingHoursSpecification" : {
    "@type" : "OpeningHoursSpecification",
    "dayOfWeek" : [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
	  "Saturday",
      "Sunday"
    ],
	"opens": "8:00",
    "closes": "19:00"
  },
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://maslosfera.com/?s={search_term_string}&post_type=product",
    "query-input": "required name=search_term_string"
  },
  
  "url" : "https://maslosfera.com/",
  "paymentAccepted" : "Наличные кредитные карты Visa Master Card",
  "description" : "При подборе масла для твоего автомобиля я всегда соблюдаю ⚙️допуск, 🩸спецификацию производителя автомобиля и даю 👌цену, доступную тебе, купи в МАСЛОСФЕРЕ масло, ведь парфюм ты купил себе сам!",
  "aggregateRating" : {
    "@type" : "AggregateRating",
    "ratingValue" : "4.5",
    "ratingCount" : "118"
  }
  
}
</script>

    </header>


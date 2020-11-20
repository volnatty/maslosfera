



$(document).ready(function () {



    // $('.side-menu__btn').on('click' , function(){

    //     $(this).toggleClass('side-menu__btn--open');
    //     $('.side-menu').toggleClass('side-menu--open');

    // });

    // $(window).scroll(function () {

    //     $('.side-menu__btn').removeClass('side-menu__btn--open');
    //     $('.side-menu').removeClass('side-menu--open');

    // });

    // $('#side-close').on('click' , function(){

    //     $('.side-menu__btn').removeClass('side-menu__btn--open');
    //     $('.side-menu').removeClass('side-menu--open');

    // });


    $('#search-open').on('click', function () {
        $('.search-btn').addClass('search-btn--open');
        $('.search-line').addClass('search-line--open');
    });

    $('#search-close').on('click', function () {
        $('.search-btn').removeClass('search-btn--open');
        $('.search-line').removeClass('search-line--open');
    });



    $('#search-open--media').on('click', function () {
        $('.search-btn').addClass('search-btn--open');
        $('.search-line').addClass('search-line--open');
    });

    $('#search-close--media').on('click', function () {
        $('.search-btn').removeClass('search-btn--open');
        $('.search-line').removeClass('search-line--open');
    });



    // function sideMenu() {
    //     var footer = $('footer');
    //     var footerPos = footer.offset().top;
    //     var winHeight = $(window).height();
    //     var scrollToElem = footerPos - winHeight;
    //     var sideMenu = $('.side-menu') ;
    //     var sideMenuHeight = winHeight - 100 ;
    //     var scroll ;

    //     $('.side-menu').height(winHeight - 100);

    //     $('.side-menu__drop').height(sideMenuHeight - 100);

    //     var winScrollTop = $(this).scrollTop();
    //     if(winScrollTop > scrollToElem){

    //         scroll = winScrollTop - scrollToElem;
    //         sideMenu.height(sideMenuHeight - scroll) ; 
    //     } else {
    //         sideMenu.height(winHeight - 100);
    //     }

    // }

    // sideMenu();

    // $(window).scroll(function(){
    //     sideMenu();
    // });



    var site_url = $('#site-url').val();
    jQuery('.one-click-button').click(function (e) {
        e.preventDefault();
        jQuery(this).addClass('adding-cart');
        var product_id = jQuery(this).data('id');



        var ajax_url = "/wp-admin/admin-ajax.php"

        jQuery.ajax({
            url: ajax_url,
            type: 'POST',
            data: 'action=oneclick&product_id=' + product_id + '&quantity=1',

            success: function (results) {
                // Показываем окно успешного добавления
                location.href = site_url + '/checkout/'; //Переход на оформление заказа
            }
        });
    });



    var $page = $('html, body');
    $('.main-desk-social__item--scroll a[href*="#"]').click(function () {
        $page.animate({
            scrollTop: $($.attr(this, 'href')).offset().top - 80
        }, 500);
        return false;
    });


    $('.close-notice').on('click', function () {
        $(this).parent().fadeOut();
    })

    function closeNotise() {
        $('.close-notice').parent().fadeOut();
    }

    setTimeout(closeNotise, 5000);




    // looking fo OS

    
    // let isMobile = {
    //     Android: function () {
    //         return navigator.userAgent.match(/Android/i);
    //     },
    //     BlackBerry: function () {
    //         return navigator.userAgent.match(/BlackBerry/i);
    //     },
    //     iOS: function () {
    //         return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    //     },
    //     Opera: function () {
    //         return navigator.userAgent.match(/Opera Mini/i);
    //     },
    //     Windows: function () {
    //         return navigator.userAgent.match(/IEMobile/i);
    //     },
    //     any: function () {
    //         return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    //     }
    // };
    // if (isMobile.iOS()) {
    //     document.getElementById("viber-link").href = "Viber://chat?number=+380952323613";
    // }
    // if (navigator.userAgent.indexOf('Mac') != -1) {
    //     document.getElementById("viber-link").href = "Viber://chat?number=+380952323613";
    // }


    $('#viber-link').on('click', function (e) {
        e.preventDefault();
        let location = window.navigator.userAgent;
        if (location.match(/iPhone|iPad|iPod/i)) {
            window.open('Viber://chat?number=+380952323613')
        } else {
            window.open('Viber://chat?number=380952323613')
        }
    })




    // open/close social chat

    $('.social-chat__btn').on('click', function () {
        $(this).toggleClass('social-chat__btn--opened')
        $('.social-icons-wrap').slideToggle();
    })

});






import Flickity from 'flickity-as-nav-for';

import 'flickity/dist/flickity.css';


if (document.querySelector('.slider1')) {

    var flktyA = new Flickity('.slider1', {
        wrapAround: true,
        prevNextButtons: false,
        pageDots: true,
        cellAlign: 'left',
        draggable: false,
        contain: true,
        initialIndex: 0
    });

    var prevArrowReviews = document.querySelector('.front-slider-prev');

        prevArrowReviews.addEventListener('click', function () {
        flktyA.previous(true, false);
    });

    var nextArrowReviews = document.querySelector('.front-slider-next');

        nextArrowReviews.addEventListener('click', function () {
        flktyA.next(true, false);
    });

}


if (document.querySelector('.slider1-for')) {
    
    var flktyB = new Flickity( '.slider1-for', {
        asNavFor: '.slider1',
        wrapAround: true,
        prevNextButtons: false,
        pageDots: true,
        cellAlign: 'left',
        draggable: false,
        pageDots: false,
        contain: true,
        initialIndex: 0
    });

}

if (document.querySelector('.slider2')) {

    if ($(window).width() < 992) {

        var flktyC = new Flickity('.slider2', {
            wrapAround: true,
            prevNextButtons: false,
            pageDots: false,
            cellAlign: 'left',
            draggable: true,
            contain: true,
            initialIndex: 0
        });

        var prevArrowReviews = document.querySelector('.popul-slider-prev');

            prevArrowReviews.addEventListener('click', function () {
            flktyC.previous(true, false);
        });

        var nextArrowReviews = document.querySelector('.popul-slider-next');

            nextArrowReviews.addEventListener('click', function () {
            flktyC.next(true, false);
        });

    } else {
        var flktyC = new Flickity('.slider2', {
            wrapAround: true,
            prevNextButtons: false,
            pageDots: true,
            cellAlign: 'left',
            groupCells: 4,
            draggable: false,
            contain: true,
            initialIndex: 0
        });

        var prevArrowReviews = document.querySelector('.popul-slider-prev');

            prevArrowReviews.addEventListener('click', function () {
            flktyC.previous(true, false);
        });

        var nextArrowReviews = document.querySelector('.popul-slider-next');

            nextArrowReviews.addEventListener('click', function () {
            flktyC.next(true, false);
        });
    }

}




if (document.querySelector('.slider3')) {

    if ($(window).width() < 992) {

    var flktyD = new Flickity('.slider3', {
        wrapAround: true,
        prevNextButtons: false,
        cellAlign: 'left',
        contain: true,
        pageDots: false,
        draggable: true ,
        initialIndex: 0
    });


    
    $('.change-slider__img').on('click', function () {
        $('.change-slider__img').removeClass('change-slider__img--active')
        $(this).addClass('change-slider__img--active')
        var changeImgIndex = $(this).data('index');



        flktyD.select(changeImgIndex);
    });

    } else {
        var flktyD = new Flickity('.slider3', {
            wrapAround: true,
            prevNextButtons: false,
            cellAlign: 'left',
            contain: true,
            pageDots: false,
            initialIndex: 0
        });
    
    
        
        $('.change-slider__img').on('click', function () {
            $('.change-slider__img').removeClass('change-slider__img--active')
            $(this).addClass('change-slider__img--active')
            var changeImgIndex = $(this).data('index');
    
    
    
            flktyD.select(changeImgIndex);
        });
    }

}

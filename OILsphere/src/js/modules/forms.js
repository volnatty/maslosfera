
$(document).ready(function () {

    function inputLoad() {
        if ($('.field__item').val() != "") {
            console.log('111111111adsd')
            $('.field__item').parents('.field').addClass('field--focus');
        } else {
            console.log('3')
        }
    }

    inputLoad();


    $( ".field__item" ).focus(function() {
        $(this).parents('.field').addClass('field--focus');
    });

    $('.field__item').blur(function(){

        let value = $(this).val();

        if (value === "") {
            $(this).parents('.field').removeClass('field--focus');
        } else {
            $(this).parents('.field').addClass('field--focus');
        }
    });


    $('body').on('click' , '.amount__btn__max' , function() {
        
        var inputAmount = $(this).parent().siblings('input');

        var inputAmountVal = $(inputAmount).val();

        inputAmountVal++;

        $(inputAmount).val(inputAmountVal);

        $(this).parents('.amount').siblings('.input-hidden').children('.quantity').children('input').val(inputAmountVal);


    });


    $('body').on('click', '.amount__btn__min' , function() {
        var inputAmount = $(this).parent().siblings('input');

        var inputAmountVal = $(inputAmount).val();

        inputAmountVal--;

        if (inputAmountVal <= 1) {
            inputAmountVal = 1;
        }

        $(inputAmount).val(inputAmountVal);

        $(this).parents('.amount').siblings('.input-hidden').children('.quantity').children('input').val(inputAmountVal);

    });
    

    $('.cart-section').on('blur' , '.amount input' , function(){
        var inputAmountVal = $(this).val();
        $(this).parents('.amount').siblings('.input-hidden').children('.quantity').children('input').val(inputAmountVal);
    });






    $('button[name="update_cart"]').removeAttr("disabled");

    function Ondisabled() {
        $('button[name="update_cart"]').removeAttr("disabled");
    };

    $('.cart-section').on("click", "button[name='update_cart']" , function () {
        setTimeout(Ondisabled, 3000);
    });
    





    $('.in-cart-form-btn').on('click', function(){
        var quenty = $('.amount input').val();
        $('.form-add-to-cart input[name="quantity"').val(quenty);
    });

    



    





});

    





$(document).ready(function(){
    $('.slider').slick({
        dots: false,
        arrows: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
    });

    $('.slider-prev').click(function(){
        $('.slider').slick('slickPrev');
    });

    $('.slider-next').click(function(){
        $('.slider').slick('slickNext');
    });

    $('.dot').click(function(){
        var index = $(this).index();
        $('.slider').slick('slickGoTo', index);
    });

    $('.slider').on('afterChange', function(event, slick, currentSlide){
        $('.dot').removeClass('active');
        $('.dot').eq(currentSlide).addClass('active');
    });
});
$(document).ready(function () {


    $("#home-slider").owlCarousel({
        loop: true,
        items: 1,
        dots: false,
        nav: false,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        autoplay: true,
        navText: ['<i class="fa fa-angle-right"></i>', '<i class="fa fa-angle-left"></i>'],
    });
    $(window).on('load', function () {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
    });


});

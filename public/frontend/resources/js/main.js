$(document).ready(function(){
    new WOW().init();
    //about slider
    $('.about_slider').owlCarousel({
        loop:true,
        nav:false,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        responsiveClass:true,
        animateOut: 'fadeOut',
        smartSpeed:450,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:1,
            },
            1000:{
                items:1,
            }
        }
    });
//home portfolio popup
    $('.popup').magnificPopup({
        type: 'image',
        removalDelay: 300,
        mainClass: 'mfp-fade',
        gallery: {
            enabled: true
        }
    });
    //home portfolio popup
    $('.popup1').magnificPopup({
        type: 'image',
        removalDelay: 300,
        mainClass: 'mfp-fade',
        gallery: {
            enabled: true
        }
    });

    //counter
    $(".count").counterUp({delay:10,time:1000});



});
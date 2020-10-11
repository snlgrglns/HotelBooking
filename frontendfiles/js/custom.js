// JavaScript Document
jQuery(document).ready(function($) {
    $('.bxslider').bxSlider({
        mode: 'horizontal',
        auto: true,
        easing: 'easeOutElastic',
        speed: 1500
    });
});

jQuery(window).ready(function($) {
    $('#slider').flexslider({
        animation: "slide",
        controlNav: true,
        directionNav: true,
        prevText: "", //String: Set the text for the "previous" directionNav item
        nextText: "", //String: Set the text for the "next" directionNav item
        animationLoop: false,
        slideshow: true,
        sync: "#carousel",
        start: function(slider) {
            $('body').removeClass('loading');
        }
    });
});
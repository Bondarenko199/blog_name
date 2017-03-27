jQuery(function ($) {
    $(document).ready(function () {
        $('#owl').owlCarousel({
            items: 1,
            startPosition: 1,
            loop: true,
            dots: true,
            dotsEach: true,
            navText: [],
            smartSpeed: 1000,
            animateOut: 'slideOutDown',
            animateIn: 'flipInX'
        });
        $('.owl-dot').each(function (index, value) {
            $(this).html('<span>' + (index + 1) + '</span>')
        });
    });
});
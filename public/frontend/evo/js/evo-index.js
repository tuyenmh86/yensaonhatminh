$(document).ready(function ($) {
    $('.home-slider').slick({
        lazyLoad: 'ondemand',
        autoplay: true,
        autoplaySpeed: 6000,
        fade: true,
        cssEase:'linear',
        dots: true,
        arrows: false,
        infinite: true
    });
    $('.evo-brands').slick({
        autoplay: true,
        autoplaySpeed: 6000,
        dots: false,
        arrows: false,
        infinite: true,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 5,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 5
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            }
        ]
    });
});

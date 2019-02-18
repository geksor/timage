$('.header-fixed').stickMe({
    animate: true,
    transitionStyle: 'fade',
    triggerAtCenter: false,
    nonStick: true,
    nonStickWidth: '737'
});

$('.slider').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 1500,
    responsive: [{
            breakpoint: 991,
            settings: {
                arrows: false,
                centerMode: false,
                slidesToShow: 4
            }
        }, {
            breakpoint: 767,
            settings: {
                arrows: false,
                centerMode: false,
                slidesToShow: 2
            }
        },
        {
            breakpoint: 575,
            settings: {
                arrows: false,
                centerMode: false,
                slidesToShow: 1
            }
        }
    ]
});
$('.slider-partners').slick({
    infinite: true,
    slidesToShow: 10,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 500,
    responsive: [{
            breakpoint: 991,
            settings: {
                arrows: false,
                centerMode: false,
                slidesToShow: 6
            }
        }, {
            breakpoint: 767,
            settings: {
                arrows: false,
                centerMode: false,
                slidesToShow: 3
            }
        },
        {
            breakpoint: 575,
            settings: {
                arrows: false,
                centerMode: false,
                slidesToShow: 1
            }
        }
    ]
});
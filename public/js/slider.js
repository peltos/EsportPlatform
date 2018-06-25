
// Homepage slider configurations.
// Documentation on http://kenwheeler.github.io/slick/

$(document).ready(function(){
    $('.slider-front').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        centerMode: true,
        dots: true,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    centerMode: false
                }
            }
        ]
    });

    $('#tournament').slick({
        slidesToShow: 3,
        autoplay: false,
        autoplaySpeed: 3000,
        arrows: false,
        centerMode: true,
        dots: false,
        infinite: false,
        centerPadding: '60px',
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    centerMode: false,
                    arrows: true,
                }
            }
        ]
    });
});
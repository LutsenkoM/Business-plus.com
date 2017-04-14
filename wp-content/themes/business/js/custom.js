$( document ).ready(function() {
    $('.slider-main').slick({
        dots: true,
        arrows: false,
        autoplay: true
    });

    $('.slider-clients').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        dots: true,
        autoplay: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]

    });

    $('.slider-partners').slick({
        infinite: true,
        slidesToShow: 6,
        slidesToScroll: 6,
        dots: true,
        autoplay: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 6,
                    slidesToScroll: 6,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

//      NAV-MENU
    var flag = true;
    $('#button-menu').on('click', function (e) {
        if (flag) {
            flag = false;

            $('.nav-wrapp').slideToggle(function () {
                flag = true;
            });
        }
    });
//    NAV-MENU END
});
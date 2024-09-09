const swiper = new Swiper('.top-slider', {
    // Optional parameters
    direction: 'horizontal',
    loop: false,
    slidesPerView: 3,
    centerInsufficientSlides: true,

    breakpoints: {

        1: {
            slidesPerView: 1,

        },
        // when window width is >= 320px
        576: {
            slidesPerView: 1,

        },
        // when window width is >= 480px
        768: {
            slidesPerView: 2,

        },
        // when window width is >= 640px
        1300: {
            slidesPerView: 3,

        }
    },


    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',

    },


});

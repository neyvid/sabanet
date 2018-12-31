var swiper = new Swiper('.swiper-container', {
    loop: false,
    autoplay: {
        delay: 3500,
        disableOnInteraction: false,
    },
    pagination: {
        el: '.swiper-pagination',
        type: 'progressbar',
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});

$('.ourServiceContentSign').click(function () {
    $(this).find('.fa').toggleClass('fa-minus-square');
    $(this).siblings('.childLi').slideToggle();

});


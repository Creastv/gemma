var swiper = new Swiper(".s-carousel", {

  spaceBetween: 20,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
  },
  breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        998: {
          slidesPerView: 4,
          spaceBetween: 20,
        },
  },
});

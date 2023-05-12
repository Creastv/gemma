var swiper = new Swiper(".galeria", {
  slidesPerView: 2,
  //   centeredSlides: true,
  loop: true,
  //   effect: "coverflow",
  //   grabCursor: true,
  //   centeredSlides: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
  },

  breakpoints: {
    640: {
      slidesPerView: 2
    },
    768: {
      slidesPerView: 2
    },
    998: {
      slidesPerView: 4
    }
  }
});

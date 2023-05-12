var i, tabcontent, tablinks;
tablinks = document.getElementsByClassName("tab-links");
tabcontent = document.getElementsByClassName("tab-content");
let removeActiveClass = function () {
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].classList.remove("active");
    tablinks[i].classList.remove("active");
  }
};
for (i = 0; i < tablinks.length; i++) {
  tablinks[i].addEventListener("click", function (e) {
    e.preventDefault();
    removeActiveClass();
    let tabId = e.target.getAttribute("data-id");
    document.querySelector(`#${tabId}`).classList.add("active");
    document.querySelector(`[data-id="${tabId}"]`).classList.add("active");
    console.log(e.target.getAttribute("data-id"), document.querySelector(`#${tabId}`));
  });
}

for (i = 0; i < tablinks.length; i++) {
  let id = `.galeria-${tablinks[i].getAttribute("data-id")}`;

  let idSwiper = "swiper" + i;
  console.log(id, idSwiper);
  idSwiper = new Swiper(id, {
    slidesPerView: 2,
    //   centeredSlides: true,
    // loop: true,
    //   effect: "coverflow",
    //   grabCursor: true,
    //   centeredSlides: true,
    // autoplay: {
    //   delay: 2500,
    //   disableOnInteraction: false
    // },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true
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
}

// var swiper = new Swiper(".galeria", {
//   slidesPerView: 4,
//   //   centeredSlides: true,
//   loop: true,
//   //   effect: "coverflow",
//   //   grabCursor: true,
//   //   centeredSlides: true,
//   autoplay: {
//     delay: 2500,
//     disableOnInteraction: false
//   },
//   navigation: {
//     nextEl: ".swiper-button-next",
//     prevEl: ".swiper-button-prev"
//   },
//   pagination: {
//     el: ".swiper-pagination",
//     clickable: true
//   }
// });

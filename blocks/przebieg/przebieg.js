document.addEventListener("DOMContentLoaded", function () {
  tabs();
});

window.addEventListener("resize", function () {
  tabs();
});

const tabs = function () {
  const navTab = document.querySelectorAll(".tab");
  const contentTab = document.querySelectorAll(".tab-content");
  const goFlow = document.querySelector(".go-flow");

  document.querySelector(`[data-tabcontent="tab1"]`).style.left = navTab[0].offsetLeft + 20 + "px";
  document.querySelector(`[data-tabcontent="tab1"]`).style.maxWidth = navTab[0].offsetWidth + "px";
  navTab[0].classList.add("active");
  document.querySelector(`[data-tabcontent="tab1"]`).classList.add("active");

  for (i = 0; i < navTab.length; i++) {
    let el = navTab[i];
    let tab = el.getAttribute("data-tabnav");
    let tabActive = document.querySelector(`[data-tabcontent="${tab}"]`);

    el.addEventListener("click", function (e) {
      tabActive.style.left = el.offsetLeft + 20 + "px";
      tabActive.style.maxWidth = el.offsetWidth + "px";
      //   }
      for (i = 0; i < navTab.length; i++) {
        navTab[i].classList.remove("active");
        contentTab[i].classList.remove("active");
      }
      tabActive.classList.add("active");
      el.classList.add("active");
      console.log(goFlow.offsetWidth / 2, el.offsetLeft);
    });
  }
};

function main() {
  // 'use strict';
  const openers = document.querySelectorAll(".opener-form");
  const openersPdf = document.querySelectorAll(".opener-pdf");
  const closers = document.querySelectorAll(".closer");
  const lokal = document.querySelector('[name="lokal-number"]');
  const loaderImg = "http://localhost/gemma/wp-content/themes/gemma/";
  const ajaxy = "http://localhost/gemma/wp-admin/admin-ajax.php";
  // const loaderImg = "https://uat.gemma.waw.pl/wp/wp-content/themes/gemma/";
  // const ajaxy = "https://uat.gemma.waw.pl/wp/wp-admin/admin-ajax.php";

  for (let i = 0; i < openersPdf.length; i++) {
    openersPdf[i].addEventListener("click", function (e) {
      e.preventDefault();
      const pdf = e.target.getAttribute("data-pdf");
      modalPDF(pdf);
      document.querySelector(".go-modal-pdf").classList.add("active");
      document.body.classList.add("active");
    });
  }

  for (let i = 0; i < openers.length; i++) {
    openers[i].addEventListener("click", function (e) {
      e.preventDefault();
      document.querySelector(".go-modal-form").classList.add("active");
      document.body.classList.add("active");
      const lokalId = e.target.getAttribute("data-id");
      lokal.value = e.target.getAttribute("data-titlelocal");
      // console.log(e.target.parentElement.parentElement);
      localPage(lokalId);
    });
  }

  for (let i = 0; i < closers.length; i++) {
    closers[i].addEventListener("click", function (e) {
      console.log(e);
      e.preventDefault();
      e.target.parentElement.parentElement.parentElement.parentElement.parentElement.classList.remove("active");
      document.body.classList.remove("active");
    });
  }

  function localPage(id) {
    const postID = id;
    jQuery.ajax({
      type: "POST",
      url: ajaxy,
      data: {
        action: "load_post",
        post_id: postID
      },
      success: function (data) {
        jQuery(".lokal-ms__info").html(data);
      },
      error: function () {
        alert("Wystąpił błąd podczas pobierania postu.");
      }
    });
  }

  // PDF

  function modalPDF(pdf) {
    jQuery.ajax({
      type: "POST",
      url: ajaxy,
      data: {
        action: "load_pdf",
        post_pdf: pdf
      },
      success: function (data) {
        jQuery(".pdf-display").html(data);
      },
      error: function () {
        alert("Wystąpił błąd podczas pobierania postu.");
      }
    });
  }
}
main();
jQuery(document).ajaxComplete(function () {
  main();
});

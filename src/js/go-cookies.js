switchDisplay();
jQuery(document).ajaxComplete(function () {
  switchDisplay();
});
function switchDisplay() {
  if (document.querySelector(".results-display-table") !== null) {
    document.querySelector(".results-display-table").addEventListener("click", function () {
      document.cookie = "resultsDisplay=table; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/";
      location.reload();
    });
  }
  if (document.querySelector(".results-display-grid") !== null) {
    document.querySelector(".results-display-grid").addEventListener("click", function () {
      document.cookie = "resultsDisplay=; expires=Fri, 31 Dec 1970 23:59:59 GMT; path=/";
      location.reload();
    });
  }
}

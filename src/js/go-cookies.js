document.querySelector(".results-display-table").addEventListener("click", function () {
  document.cookie = "resultsDisplay=table; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/";
  location.reload();
});
document.querySelector(".results-display-grid").addEventListener("click", function () {
  document.cookie = "resultsDisplay=; expires=Fri, 31 Dec 1970 23:59:59 GMT; path=/";
  location.reload();
});

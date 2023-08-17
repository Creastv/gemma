jQuery(document).ready(function () {
  setTimeout(function () {
    jQuery("#InvestmentMap").maphilight({
      alwaysOn: true
    });
  }, 100);
  jQuery("img[usemap]").rwdImageMaps();
  // Data inwestycja
  var data = jQuery(".go-makieta");

  var invData = data.attr("data-inw");
  data.data("value", invData);

  var filterData = data.attr("data-filter");
  data.data("value", filterData);

  var idFormData = data.attr("data-idform");
  data.data("value", idFormData);

  jQuery('[name="_sft_inwestycje[]"]').val(invData);

  // Tooltip only Text

  jQuery(".hasTooltip")
    .hover(
      function () {
        // Hover over code
        var title = jQuery(this).attr("title");
        var powierzchnia = jQuery(this).attr("date-powierzchnia");
        var pokoje = jQuery(this).attr("date-pokoje");
        var status = jQuery(this).attr("data-status");
        jQuery(this).data("tipText", title).removeAttr("title");
        const content = `
              <div class="${status}" >
                <span><b>Budynek ${title}</b></span>
                <span>Powierzchnia: <b>${powierzchnia} m<sup>2</sup></b></span>
                <span>Pokoje: <b>${pokoje}</b></span>
                <span><b>${status}</b></span>
              </div>
              `;
        jQuery('<div class="tooltip-makieta"></div>').html(content).appendTo("body").fadeIn("fast");
      },
      function () {
        // Hover out code
        jQuery(this).attr("title", jQuery(this).data("tipText"));
        jQuery(".tooltip-makieta").remove();
      }
    )
    .mousemove(function (e) {
      var mousex = e.pageX + 20; //Get X coordinates
      var mousey = e.pageY - 5; //Get Y coordinates
      jQuery(".tooltip-makieta").css({
        top: mousey,
        left: mousex
      });
    });
  // var formElement = jQuery(`#search-filter-form-496`);
  // formElement.submit();
  // jQuery(".hasTooltip").on("click", function () {
  //   // var value = jQuery(this).attr("data-valu");
  //   // jQuery(this).data("value", value);
  //   // jQuery('[name="' + filterData + '[]"]').val(value);
  //   // var formElement = jQuery(`#search-filter-form-${idFormData}`);
  //   // formElement.submit();
  // });
});

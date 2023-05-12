jQuery(document).ready(function () {
  jQuery("#InvestmentMap").maphilight();
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
        var subtitle = jQuery(this).attr("date-na");
        jQuery(this).data("tipText", title).removeAttr("title");
        const content = `
                <p>${title}</p>
                <span>${subtitle}</span>
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
  jQuery(".hasTooltip").on("click", function () {
    var value = jQuery(this).attr("data-valu");
    jQuery(this).data("value", value);
    jQuery('[name="' + filterData + '[]"]').val(value);

    var formElement = jQuery(`#search-filter-form-${idFormData}`);
    formElement.submit();
  });
});

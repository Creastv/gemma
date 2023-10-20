function test() {
  jQuery(document).ready(function () {
    setTimeout(function () {
      jQuery("#InvestmentMap").maphilight({
        alwaysOn: true,
        fillOpacity: "0.5",
        stroke: false
      });
    }, 100);

    jQuery("area").each(function () {
      jQuery(this).mouseover(function () {
        jQuery(this)
          .data("maphilight", {
            fillOpacity: "0.8",
            fillColor: jQuery(this).attr("data-fill")
          })
          .trigger("alwaysOn.maphilight");
      });
      jQuery(this).mouseout(function () {
        jQuery(this)
          .data("maphilight", {
            fillOpacity: "0.5",
            fillColor: jQuery(this).attr("data-fill")
          })
          .trigger("alwaysOn.maphilight");
      });
    });

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
        var mousex = e.pageX + -100; //Get X coordinates
        var mousey = e.pageY - 100; //Get Y coordinates
        jQuery(".tooltip-makieta").css({
          top: mousey,
          left: mousex
        });
      });
    // jQuery(".hasTooltip").on("click", function () {
    //   // var value = jQuery(this).attr("data-valu");
    //   // jQuery(this).data("value", value);
    //   // jQuery('[name="' + filterData + '[]"]').val(value);
    //   // var formElement = jQuery(`#search-filter-form-${idFormData}`);
    //   // formElement.submit();
    // });
  });
}
test();
window.addEventListener(
  "resize",
  function (event) {
    test();
  },
  true
);

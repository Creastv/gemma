jQuery(document).ready(function () {
  tableOn();
});
// jQuery(document).ajaxComplete(function () {
// jQuery(document).on("sf:ajaxfinish", ".searchandfilter", () => {
//   tableOn();
// });
function tableOn() {
  var oldStart = 0;
  jQuery("#mieszkania-inw").DataTable({
    columnDefs: [
      {
        className: "dtr-control",
        orderable: false,
        targets: 0
      }
    ],
    pageLength: 10,
    columns: [{ orderable: false }, null, null, null, null, null, { orderable: false }],
    bLengthChange: false,
    // "scrollY": scrollY + "px",
    // "scrollCollapse": true,
    paging: true,
    ordering: true,
    info: false,

    searching: false,

    fnDrawCallback: function (o) {
      if (o._iDisplayStart != oldStart) {
        var targetOffset = jQuery("#mieszkania-inw").offset().top;
        jQuery("html,body").animate({ scrollTop: targetOffset - 100 }, 500);
        oldStart = o._iDisplayStart;
      }
    },

    language: {
      paginate: {
        previous: "« Poprzednie",
        next: "Następne »",
        lengthMenu: " _MENU_ "
      }
    }
  });
}

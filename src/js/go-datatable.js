jQuery(document).ready(function () {
  tableOn();
});
jQuery(document).ajaxComplete(function () {
  tableOn();
});

function tableOn() {
  var oldStart = 0;
  jQuery("#mieszkania-inw").DataTable({
    // responsive: {
    //   details: {
    //     type: "column"
    //   }
    // },
    columnDefs: [
      {
        className: "dtr-control",
        orderable: false,
        targets: 0
      }
    ],
    pageLength: 10,
    columns: [null, { orderable: false }, null, null, null, null, null, { orderable: false }],
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

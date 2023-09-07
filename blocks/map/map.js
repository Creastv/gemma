// var jsonStringify = JSON.stringify(json);
// var jsonParse = JSON.parse(jsonStringify);

// var markers = [];
// var markerCluster;
// var filterSelect = jQuery(".filter");

// var filters;

// function setMarkers(marker, map) {
//   var markerMap = marker.geometry.coordinates;
//   var kategoria = marker.kategoria;
//   var nazwa = marker.nazwa;
//   var adres = marker.adres;
//   var flag = marker.flag;

//   var pos = new google.maps.LatLng(markerMap[1], markerMap[0]);
//   var content = marker;
//   var icon = marker.icon;

//   markerMap = new google.maps.Marker({
//     position: pos,
//     kategoria: kategoria,
//     nazwa: nazwa,
//     adres: adres,
//     flag: flag,
//     map: map,
//     icon: icon
//   });

//   markers.push(markerMap);

//   var infowindow = new google.maps.InfoWindow({
//     content: `
//     <div class="map-tooltip">

//      <p><b>${nazwa}</b></p>
//      <p>${adres}</p>
//     </div>
//     `
//   });

//   google.maps.event.addListener(markerMap, "click", function () {
//     infowindow.close();
//     infowindow.setContent(content);
//     infowindow.open(map, markerMap);
//   });
//   // google.maps.event.addListener(markerMap, "mouseover", function () {
//   //   infowindow.open(map, markerMap);
//   // });

//   // // google.maps.event.addListener(markerMap, "mouseout", function () {
//   // //   infowindow.close(map, markerMap);
//   // // });
// }

// function clusterManager(array) {
//   markerCluster.clearMarkers();

//   for (i = 0; i < array.length; i++) {
//     markerCluster.addMarker(array[i]);
//   }
// }
// function newFilter() {
//   var filteredMarkers = [];

//   jQuery.each(markers, function (index, marker) {
//     jQuery.each(filters, function (i, categoryFilter) {
//       if (marker.flag == categoryFilter) {
//         filteredMarkers.push(marker);
//       }
//     });
//   });
//   clusterManager(filteredMarkers);
// }

// jQuery(document).ready(function () {
//   filters = ["Inwestycja"];
//   newFilter(filters);
//   jQuery(".check-filters input").on("change", function () {
//     filters = ["Inwestycja"];
//     jQuery(".check-filters input:checked").each(function (index, elem) {
//       filters.push(jQuery(elem).val());
//     });
//     newFilter(filters);
//   });
//   jQuery(".check-filters input").on("click", function (el) {
//     if (jQuery(this).is(":checked")) {
//       jQuery(this).parent().addClass("active");
//     } else {
//       jQuery(this).parent().removeClass("active");
//     }
//   });
// });

// jQuery(window).on("load", function () {
//   initMap();
// });

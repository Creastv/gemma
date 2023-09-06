var jsonStringify = JSON.stringify(json);
var jsonParse = JSON.parse(jsonStringify);

var markers = [];
var markerCluster;
var filterSelect = jQuery(".filter");

var filters;

//creation de la map
// function initMap() {
//   var map = new google.maps.Map(document.getElementById("map"), {
//     zoom: 6,
//     center: new google.maps.LatLng(45.882360730184025, 2.57080078125)
//   });

//   for (var i = 0; i < json.length; i++) {
//     setMarkers(json[i], map);
//   }
//   markerCluster = new MarkerClusterer(map, markers, { ignoreHiddenMarkers: true, imagePath: "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m" });
// }

function setMarkers(marker, map) {
  var markerMap = marker.geometry.coordinates;
  var title = marker.title;
  var animal = marker.animal;
  var drink = marker.drink;
  var name = marker.name;
  var pos = new google.maps.LatLng(markerMap[1], markerMap[0]);
  var content = marker;
  var icon = marker.icon;

  markerMap = new google.maps.Marker({
    position: pos,
    title: title,
    animal: animal,
    drink: drink,
    name: name,
    map: map,
    icon: icon
  });

  markers.push(markerMap);

  var infowindow = new google.maps.InfoWindow({
    content: title + "<br/>" + animal + "<br/>" + drink + "<br/>" + name
  });

  // Marker click listener
  google.maps.event.addListener(
    markerMap,
    "click",
    (function (marker1, content) {
      return function () {
        infowindow.setContent(content);
        infowindow.open(map, markerMap);
        map.panTo(this.getPosition());
        // map.setZoom(15);
      };
    })(markerMap, content)
  );
}

function clusterManager(array) {
  markerCluster.clearMarkers();

  for (i = 0; i < array.length; i++) {
    markerCluster.addMarker(array[i]);
  }
}

//@todo add inputsearch
function newFilter() {
  var filteredMarkers = [];

  jQuery.each(markers, function (index, marker) {
    // on parcourt les markers
    //console.log('maker ', index);

    jQuery.each(filters, function (i, categoryFilter) {
      // on parcourt les différentes catégories présentes dans les filtres
      if (marker.animal == categoryFilter) {
        //si le marker est l'une des categories, on l'ajoute au filteredMarkers
        filteredMarkers.push(marker);
      }
    });
  });
  //console.log('filteredMarkers : ',filteredMarkers);

  clusterManager(filteredMarkers);
}

jQuery(document).ready(function () {
  jQuery(".check-filters input").on("change", function () {
    filters = [];
    jQuery(".check-filters input:checked").each(function (index, elem) {
      filters.push(jQuery(elem).val());
    });
    newFilter(filters);
    //console.log('filters selected : ', filters);

    //si tous les filtres sont cochés
    if (jQuery(".check-filters input").length == jQuery(".check-filters input:checked").length) {
      //console.log('tous les filtres sont cochés', );
      jQuery(".js-check-all").addClass("active");
    } else {
      //console.log('Pas tous cochés');
      jQuery(".js-check-all").removeClass("active");
    }
  });

  jQuery(".js-check-all").on("click", function (e) {
    var jQueryobj = jQuery(e.currentTarget);
    jQueryobj.addClass("active");
    jQuery(".check-filters input").prop("checked", "true").first().change();
  });
});

jQuery(window).on("load", function () {
  initMap();
});

<?php
$markers = get_field( 'punkty_na_mapie' );
$map = get_field( 'mapa' );
$inwe = get_field( 'nazwa_inwestycji' );
$inwePin = get_field( 'ikona_inwestycji_srodek_mapy' );
$desc = get_field( 'opis' );
$bgColor = get_field( 'kolor_tla' );
if($bgColor):
$bgColor = $bgColor ? 'style="background-color:' . $bgColor . '"' : false ;
endif;

$colClass = $desc ? 'col-map' : 'col-full'; 

if($markers){
$originalArray = $markers;
$newArray = array();
  foreach ($originalArray as $element) {
    $newElement = $element['kategoria'];
     $newArray[] = $newElement;
  }
$punkty = array_values(array_unique($newArray));

}
echo '<div class="go-map" >';
    echo '<div class="go-map__wraper">';

    ?>
    <div class="filter-wrapper">
      <div class="check-filters"> 
        <?php if($markers) { ?>
          <ul>
          <?php  foreach($punkty as $el){ ?>
            <li >
            <label class="active"><input type="checkbox" value="<?php echo $el; ?>" checked> <span><?php echo $el; ?></span></label>
            </li>
          <?php } ?>
          </ul>
        <?php } ?>
      </div>
    </div>
    <?php 
        echo '<div class="row" ' . $bgColor . '>';
           if($desc) {
            echo '<div class="col col-des">';
               echo '<div class="go-map__opis">' . $desc . '</div>';
            echo '</div>';
           }
            echo '<div class="col ' . $colClass . '">';
             echo '<div class="wrapper">';
                  echo '<div id="map"></div>';
              echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
echo '</div>';

?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8pMQYqHehRWSDeAVKOrv8JD9s1dR6Y2Q"></script>    
<script>

const json = [
  {
    kategoria: 'Inwestycja',
    flag: 'Inwestycja',
    nazwa:'<?php echo $inwe; ?>',
    adres:'<?php echo $map['address']; ?>',
    icon: '<?php echo $inwePin; ?>',
    geometry: {
      type: 'Point',
      coordinates: [<?php echo $map['lng']; ?>, <?php echo $map['lat']; ?>]
    }
  },
  <?php 
  if($markers) :
  foreach($markers as $marker) : 
    $test = explode(', ', $marker["lat_and_lag"]);
  ?>
    {
      kategoria: '<?php echo $marker['kategoria']; ?>',
      nazwa: '<?php echo $marker['nazwa_punktu']; ?>',
      adres: '<?php echo $marker['adres']; ?>',
      flag: '<?php echo $marker['kategoria']; ?>',
      icon: '<?php  echo $marker['ikona']; ?>',
      geometry: {
        type: 'Point',
        // coordinates: [<?php // echo $marker['lang']; ?>, <?php // echo $marker['lat']; ?>]
        coordinates: [<?php echo $test[1]; ?>, <?php echo $test[0]; ?>]
      }
    },
  <?php endforeach; 
  endif;
  ?>
];



function initMap() {
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: <?php echo $map['zoom']; ?>,
    center: new google.maps.LatLng(<?php echo $map['lat']; ?>, <?php echo $map['lng']; ?>),
  });

  for (var i = 0; i < json.length; i++) {
    setMarkers(json[i], map);
  }
  var mcOptions = {
    gridSize: 30,
    minimumClusterSize: 30,
    ignoreHiddenMarkers: true,
    imagePath: "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m"
};
  markerCluster = new MarkerClusterer(map, markers, mcOptions );
}

var jsonStringify = JSON.stringify(json);
var jsonParse = JSON.parse(jsonStringify);

var markers = [];
var markerCluster;
var filterSelect = jQuery(".filter");

var filters;

function setMarkers(marker, map) {
  var markerMap = marker.geometry.coordinates;
  var kategoria = marker.kategoria;
  var nazwa = marker.nazwa;
  var adres = marker.adres;
  var flag = marker.flag;

  var pos = new google.maps.LatLng(markerMap[1], markerMap[0]);
  var content = marker;
  var icon = marker.icon;

  markerMap = new google.maps.Marker({
    position: pos,
    kategoria: kategoria,
    nazwa: nazwa,
    adres: adres,
    flag: flag,
    map: map,
    icon: icon
  });

  markers.push(markerMap);

  var infowindow = new google.maps.InfoWindow({
    content: '<div class="map-tooltip"><p><b> ' + nazwa + '</b></p><p>' + adres + '</p></div>'
  });

  google.maps.event.addListener(markerMap, "click", function () {
    infowindow.close();
    infowindow.setContent(content);
    infowindow.open(map, markerMap);
  });
  // google.maps.event.addListener(markerMap, "mouseover", function () {
  //   infowindow.open(map, markerMap);
  // });

  // // google.maps.event.addListener(markerMap, "mouseout", function () {
  // //   infowindow.close(map, markerMap);
  // // });
}

function clusterManager(array) {
  // markerCluster.clearMarkers();
  for (var i = 0; i < markers.length; i++) {
    markerCluster.removeMarker(markers[i]);
  }
  for (i = 0; i < array.length; i++) {
    markerCluster.addMarker(array[i]);
  }
}

function newFilter() {
  var filteredMarkers = [];

  jQuery.each(markers, function (index, marker) {
    jQuery.each(filters, function (i, categoryFilter) {
      if (marker.flag == categoryFilter) {
        filteredMarkers.push(marker);
      }
    });
  });
  // markerCluster.clearMarkers(markers);
  clusterManager(filteredMarkers);
}

for (var i = 0; i < markers.length; i++) {
    markerCluster.removeMarker(markers[i]);
 }
 

jQuery(document).ready(function () {
  // filters = markers;
  // newFilter(filters);
  jQuery(".check-filters input").on("change", function () {
    filters = ["Inwestycja"];
    jQuery(".check-filters input:checked").each(function (index, elem) {
      filters.push(jQuery(elem).val());
    });
    newFilter(filters);
  });
  jQuery(".check-filters input").on("click", function (el) {
    if (jQuery(this).is(":checked")) {
      jQuery(this).parent().addClass("active");
    } else {
      jQuery(this).parent().removeClass("active");
    }
  });
});

// jQuery(window).on("load", function () {
setTimeout(function () {
  initMap();
  }, 1500);
// });

</script>
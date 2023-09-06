<?php
$markers = get_field( 'punkty_na_mapie' );
$map = get_field( 'mapa' );
$desc = get_field( 'opis' );
$bgColor = get_field( 'kolor_tla' );
if($bgColor):
$bgColor = $bgColor ? 'style="background-color:' . $bgColor . '"' : false ;
endif;

$colClass = $desc ? 'col-map' : 'col-full'; 

echo '<div class="go-map" ' . $bgColor . '>';
    echo '<div class="go-map__wraper">';
        echo '<div class="row">';
           if($desc) {
            echo '<div class="col col-des">';
               echo '<div class="go-map__opis">' . $desc . '</div>';
            echo '</div>';
           }
            echo '<div class="col ' . $colClass . '">';
                ?>
                
                <div class="wrapper">
                    <div class="filter-wrapper">
                    <h3>Filter those markers: </h3>
                        <p><button type="button" class="js-check-all active"> All</button></p>
                        <div class="check-filters">
                            <?php foreach($markers as $marker) : ?>
                                <label><input type="checkbox" value="<?php echo $marker['nazwa_punktu']; ?>" checked> <?php echo $marker['nazwa_punktu']; ?></label>
                            <?php endforeach; ?>
                        <!-- <label><input type="checkbox" value="dog" checked> Dog</label>
                        <label><input type="checkbox" value="ping" checked> Ping</label> -->
                        </div>
                    
                    </div>

                    <div id="map"></div>
                </div>


                <?php
            echo '</div>';
        echo '</div>';
    echo '</div>';
echo '</div>';


var_dump($map);
?>

<script src="https://maps.googleapis.com/maps/api/js"></script>    
<script>
var json = [
<?php foreach($markers as $marker) : ?>
  {
    title: "<?php echo $marker['nazwa_punktu']; ?>",
    animal: "<?php echo $marker['nazwa_punktu']; ?>",
    icon: "<?php echo $marker['ikona']; ?>",
    geometry: {
    //   type: "Point",
      coordinates: [<?php echo $marker['lat']; ?>, <?php echo $marker['lang']; ?>]
    }
  },
<?php endforeach; ?>
];

function initMap() {
  var map = new google.maps.Map(document.getElementById("map"), {
    zoom: <?php echo $map['zoom']; ?>,
    center: new google.maps.LatLng(<?php echo $map['lat']; ?>, <?php echo $map['lng']; ?>)
  });

  for (var i = 0; i < json.length; i++) {
    setMarkers(json[i], map);
  }
  markerCluster = new MarkerClusterer(map, markers, { ignoreHiddenMarkers: true, imagePath: "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m" });
}
</script>
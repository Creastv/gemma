<?php
$markers = get_field( 'punkty_na_mapie' );
$map = get_field( 'mapa' );
$inwe = get_field( 'nazwa_inwestycji' );
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
            <li>
            
            <label><input type="checkbox" value="<?php echo $el; ?>" > <?php echo $el; ?></label>
            
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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8pMQYqHehRWSDeAVKOrv8JD9s1dR6Y2Q&callback=initMap&v=weekly"></script>    
<script>
const json = [
  {
    kategoria: "Inwestycja",
    flag: "Inwestycja",
    nazwa:"<?php echo $inwe; ?>",
    adres:"<?php echo $map['address']; ?>",
    icon: "<?php bloginfo('template_url'); ?>/blocks/map/icon/home.png",
    geometry: {
      type: "Point",
      coordinates: [<?php echo $map['lng']; ?>, <?php echo $map['lat']; ?>]
    }
  },
  <?php 
  if($markers) :
  foreach($markers as $marker) : ?>
    {
      kategoria: "<?php echo $marker['kategoria']; ?>",
      nazwa: "<?php echo $marker['nazwa_punktu']; ?>",
      adres: "<?php echo $marker['adres']; ?>",
      flag: "<?php echo $marker['kategoria']; ?>",
      icon: "<?php echo $marker['ikona']; ?>",
      geometry: {
        type: "Point",
        coordinates: [<?php echo $marker['lang']; ?>, <?php echo $marker['lat']; ?>]
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
</script>
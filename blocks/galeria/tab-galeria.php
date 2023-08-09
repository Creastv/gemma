<?php 
$id = $block['id'];
$taby = get_field( 'taby' );
$rows = count($taby);

$disabled = ' disabled';
if(count($taby) > 1){
  $disabled = "active";
  echo $rows;
}
?>

<?php echo '<div id="go-tabs-'.$id.'" class="go-tabs">'; ?>
<?php  if($taby):
echo '<div class="tab ' . $disabled . '">';
$count = 0;
foreach($taby as $tab):
  // $idTabName = $tab['nazwa_zakladki'];
  $idTab = $tab['nazwa_zakladki'];
  $active = $count == 0 ? 'active' : '';
  echo '<a href="#" class="tab-links '. $active .'" data-id="'.$idTab.'">'.$tab['nazwa_zakladki'].'</a >';

$count++;
endforeach;
echo '</div>';

endif; ?>

<?php  if($taby):
echo '<div class="tab-wraper">';
$count = 0;
foreach($taby as $tab):
  // $idTabName = $tab['nazwa_zakladki'];
  $idTab = $tab['nazwa_zakladki'];
  $active = $count == 0 ? 'active' : '';
  echo '<div id="'.$idTab.'" class="tab-content '. $active .'">';
    if($tab['galeria']):
      echo '<div class="swiper-container galeria-wraper galeria-'.$idTab.'" >';
      echo '<div class="swiper-wrapper">';
      foreach ( $tab['galeria'] as $galeria ): 
        echo ' <div class="swiper-slide">';
          echo '<a data-fancybox="gallery" href="' . wp_get_attachment_image_url( $galeria['zdjecie'], 'full' ) . '">';
            echo wp_get_attachment_image( $galeria['zdjecie'], 'galeria');
            echo esc_html($galeria['naglowek']) ? '<h4> ' .esc_html($galeria['naglowek']) . '</h4>' : false;
            echo esc_html($galeria['opis']) ? '<p> ' .esc_html($galeria['opis']) . '</p>' : false;
          echo '</a>';
        echo '</div>';
			 endforeach;
       echo '</div>';
        echo '<div class="arrows">';
          echo '<div class="swiper-button-next"></div>';
          echo ' <div class="swiper-button-prev"></div>';
        echo '</div>';
       echo '</div>';
    endif;

    echo $tab['dodatkowe_pole_np:_wideo_'] ? $tab['dodatkowe_pole_np:_wideo_'] : false;

  echo '</div>';
  $count++;
endforeach;
echo '</div>';
endif; ?>

<?php echo '</div>'; ?>


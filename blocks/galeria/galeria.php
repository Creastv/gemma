<?php 
$id = $block['id'];
$galerias = get_field( 'galeria' );
?>
<?php
 echo '<div id="'.$id.'" class="galeria-slider">';
    if($galerias):
      echo '<div class="swiper-container galeria-wraper galeria" >';
      echo '<div class="swiper-wrapper">';
      foreach ( $galerias as $galeria ): 
        echo ' <div class="swiper-slide">';
          echo '<a data-fancybox="gallery" href="' . wp_get_attachment_image_url( $galeria, 'full' ) . '">';
            echo wp_get_attachment_image( $galeria, 'galeria');
             echo '<p> ' .esc_html($galeria['caption']) . '</p>';
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
  echo '</div>';
?>
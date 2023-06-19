 <?php


    $prawo = get_field( 'prawo', 'options' );
    $logo = $prawo['logo'];
    $size = 'full';
 ?>
 <?php
echo '<div class="row top">';
echo ' <div class="col">';
get_template_part('templates-parts/footer/footer', 'socialmedia');
echo '</div>';
echo ' <div class="col">';
 if($logo) :
         echo '<a href="' . esc_url( home_url( '/' ) ) . '">';
         echo wp_get_attachment_image( $logo, $size );
         echo '</a>';
      endif; 

echo '</div>';
echo '</div>';
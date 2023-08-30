 <?php
    $prawo = get_field( 'prawo', 'options' );
    $desc = $prawo['opis'];
   
    $lewo  = get_field( 'lewo', 'options' );
    $descLewo = $lewo['opis'];

    $logo = $prawo['logo'];
    $size = 'full';
 ?>
 <?php
echo '<div class="row row_two_column">';
echo ' <div class="col">';
get_template_part('templates-parts/footer/footer', 'socialmedia');
if($descLewo) :
    echo '<div class="footer__desc">';
    echo '<p>' . $descLewo . '</p>';
    echo '</div>';
   endif;
echo '</div>';
echo ' <div class="col">';
 if($logo) :
         echo '<a class="logo" href="' . esc_url( home_url( '/' ) ) . '">';
         echo wp_get_attachment_image( $logo, $size );
         echo '</a>';
      endif; 
if($desc) :
      echo '<div class="footer__desc">';
      echo '<p>' . $desc . '</p>';
      echo '</div>';
   endif;
echo '</div>';
echo '</div>';
?>
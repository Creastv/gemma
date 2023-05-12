 <?php
    $prawo = get_field( 'prawo', 'options' );
    $desc = $prawo['opis'];
    $logo = $prawo['logo'];
    $size = 'full';
 ?>
 <?php
 echo '<div class="footer__adrress">';
 if($logo) :
    echo '<a href="' . esc_url( home_url( '/' ) ) . '">';
    echo wp_get_attachment_image( $logo, $size );
    echo '</a>';
 endif; 
 if($desc) :
    echo '<div class="footer__desc">';
    echo '<p>' . $desc . '</p>';
    echo '</div>';
 endif;
 echo '</div>';
?>

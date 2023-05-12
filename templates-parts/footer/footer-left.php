 <?php
    $lewo  = get_field( 'lewo', 'options' );
    $desc = $lewo['opis'];
 ?>
 <?php
 get_template_part('templates-parts/footer/footer', 'socialmedia');
 if($desc) :
    echo '<div class="footer__desc">';
    echo '<p>' . $desc . '</p>';
    echo '</div>';
 endif;
?>

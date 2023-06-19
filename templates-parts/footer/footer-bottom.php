 <?php
    $prawo = get_field( 'prawo', 'options' );
    $desc = $prawo['opis'];
   
    $lewo  = get_field( 'lewo', 'options' );
    $descLewo = $lewo['opis'];
 ?>
 <?php
 echo '<div class="row bottom">';
   echo ' <div class="col">';
   if($descLewo) :
    echo '<div class="footer__desc">';
    echo '<p>' . $descLewo . '</p>';
    echo '</div>';
   endif;
   echo '</div>';

   echo ' <div class="col">';
   if($desc) :
      echo '<div class="footer__desc">';
      echo '<p>' . $desc . '</p>';
      echo '</div>';
   endif;
   echo '</div>';

 echo '</div>';
?>

<?php 
$badgeStyle = get_field( 'bage_style' );
?>

<?php

if($badgeStyle == 1):
    echo '<div class="badge-one">';
        echo '<div class="badge-one__wraper">';
            echo '<div class="item">';
            echo '<span>Od</span>';
            echo '<p>1993r.</p>';
            echo '<span>działamy na polskim rynku</span>';
            echo '</div>';
            echo '<hr>';
            echo '<div class="item">';
            echo '<span>wybudowaliśmy już ponad</span>';
            echo '<p>1.500</p>';
            echo '<span>lokali mieszkalnych</span>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
endif;

if($badgeStyle == 2):
endif;
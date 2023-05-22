<?php
$etapy = get_field( 'etapy' );
?>
<?php
if($etapy):
    echo '<div class="etapy etapy--desktop">';
    echo '<ul class="etapy__wraper">';
    $i = 0;
    // $ii = 1;
    foreach($etapy as $etap):
        // if($i%2==0) :
            $stat =  $etap['aktywny'] == true ? 'active' : false;
        echo ' <li class="' . $stat . '">';
            echo '<div class="etap">';
                echo '<div class="etap__content">';
                    echo '<p> ' . $etap['opis'] . ' </p>';
                echo '</div>';
                echo '<span class="etap__pointer"></span>';
                echo '<span class="etap__spacer"></span>';
            echo '</div>';
        echo '</li>';

    endforeach;
    echo '</ul>';
    echo '</div>';
endif;
?>
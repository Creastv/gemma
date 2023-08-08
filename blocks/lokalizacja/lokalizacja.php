<?php
$mapa = get_field( 'mapa' );
$desc = get_field( 'opis' );
$bgColor = get_field( 'kolor_tla' );
if($bgColor):
$bgColor = $bgColor ? 'style="background-color:' . $bgColor . '"' : false ;
endif;

echo '<div class="go-lokalizacja" ' . $bgColor . '>';
    echo '<div class="go-lokalizacja__wraper">';
        echo '<div class="row">';
            echo '<div class="col">';
               echo '<div class="go-lokalizacja__opis">' . $desc . '</div>';
            echo '</div>';
            echo '<div class="col">';
                // echo  $mapa ? '<div classs="sticky"> ' . $mapa . ' </div>' :  '';
                echo $mapa;
            echo '</div>';
        echo '</div>';
    echo '</div>';
echo '</div>';

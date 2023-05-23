<?php 
$flow = get_field( 'przebieg' );
?>

<?php 
if($flow):
echo '<div class="go-flow">';
echo '<div class="go-flow__wraper">';
echo '<ul class="go-flow__nav">';
    foreach($flow as $item):
    echo ' <li class="tab" data-tabnav="tab1" >';
        echo '<div class="go-flow__item-nav">';
            echo '<span class="tab-number"> ' . $item['nr'] . ' </span>';
            echo '<p class="tab-name"> ' . $item['tytul']. ' </p>';
            echo '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="14.1px"
                            height="26.7px" viewBox="0 0 14.1 26.7" style="enable-background:new 0 0 14.1 26.7;" xml:space="preserve">
                            <polygon fill="#7D7D7D" points="0.7,26.7 0,26 12.6,13.4 0,0.7 0.7,0 14.1,13.4 "/>
                        </svg>';
        echo '</div>';
    echo '</li>';
    endforeach;
echo '</ul>';
echo '<ul class="go-flow__content">';
    foreach($flow as $item):
    echo '<li class="tab-content" data-tabcontent="tab1">';
        echo '<div class="go-flow__item-content">';
            echo '<p class="tab-desc"> ' . $item['opis']. ' </p>';
        echo '</div>';
    echo '</li>';
    endforeach;
echo '</ul>';
echo '</div>';
echo '</div>';

endif;
?>

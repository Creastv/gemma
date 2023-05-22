<?php
$steps = get_field( 'kroki' );
$col = 'steps--' . count($steps);

?>
<?php
if($steps) :
    $i=0;
    echo '<div class="steps ' . $col . '">';
    echo '<div class="steps__content">';
    echo '<ul>';
    foreach($steps as $step):
        echo '<li>';
        echo '<span class="steps__number">'.$i.'</span>';
        echo '<p class="steps__title">'.$step['naglowek'].'</p>';
        echo $step['opis'] ? $step['opis'] : false;
        echo '</li>';
        $i++;
    endforeach;
    echo '</ul>';
    echo '</div>';
    echo '</div>';
endif;
$rows = 'flex-' . count($steps);
?>
<?php 
$bullets = get_field( 'bullets' );
$id = $block['id'];

$className = '';
if( !empty($block['align']) ) {
    $className .= ' align-' . $block['align'];
}

$rows = 'flex-' . count($bullets);
 if(count($bullets) > 6 ):
  $rows = 'auto';
endif;

$ukladIkony = get_field( 'uklad' );
$polIkony = "";
if($ukladIkony == 'Środek'){
  $polIkony = 'middle';
}

$ukladNaglowka = get_field( 'uklad_naglowka' );
$polNagl = "";
if($ukladNaglowka == 'Środek'){
  $polNagl = 'text-center';
} elseif($ukladNaglowka == 'Lewo') {
   $polNagl = 'text-left';
}  elseif($ukladNaglowka == 'Prawo') {
   $polNagl = 'text-right';
}

$justify= get_field( 'justify-content' );


?>
<?php 
   echo '<div id="bullets-' . $id . '">';
if($bullets) :
    echo '<ul class="bullets '. esc_attr($className) . ' ' . $rows .' ' .  $polIkony . ' ' . $justify . '">';
    foreach($bullets as $bullet) :
      
        echo '<li>';
        if($bullet['ikona'] || $bullet['naglowek']) :
        echo '<div class="top">';
          if($bullet['ikona']) :
          echo'<div class="top__img">' . wp_get_attachment_image( $bullet['ikona'] ) . '</div>';
          endif;
          if($bullet['naglowek']) :
          echo'<div class="top__title ' . $polNagl . '"><p>' . $bullet['naglowek'] . '</p></div>';
          endif;
        echo '</div>';
        endif;
          if($bullet['opis']) :
          echo'<div class="top__excerpt">' . $bullet['opis'] . '</div>';
          endif;
        echo '</li>';

    endforeach;
    echo '</ul>';
endif;
    echo '</div>';

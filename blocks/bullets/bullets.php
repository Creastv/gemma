<?php 
$bullets = get_field( 'bullets' );
$id = $block['id'];

if( !empty($block['align']) ) {
    $className .= ' align-' . $block['align'];
}

$type = get_field( 'typ' );

if($type == "Grid"):
    $rows = 'rows-' . count($bullets);
  if($rows >= 4 ):
    $rows = 4;
  endif;
 else :
    $rows = 'flex-' . count($bullets);
    if($rows >= 4 ):
        $rows = 4;
    endif;
 endif; 
?>
<?php 
   echo '<div id="bullets-' . $id . '">';
if($bullets) :
    echo '<ul class="bullets '. esc_attr($className) . ' ' . $rows .'">';
    foreach($bullets as $bullet) :
      
        echo '<li>';
        if($bullet['ikona'] || $bullet['naglowek']) :
        echo '<div class="top">';
          if($bullet['ikona']) :
          echo'<div class="top__img">' . wp_get_attachment_image( $bullet['ikona'] ) . '</div>';
          endif;
          if($bullet['naglowek']) :
          echo'<div class="top__title"><p>' . $bullet['naglowek'] . '</p></div>';
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

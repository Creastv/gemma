<?php
$icons  = get_field( 'ikony', 'options' );
?>
<?php if($icons) :
    echo '<ul class="navbar__icons">';
    foreach($icons as $s):
       $target = $s['target'] == '_blank' ? 'target="_blank"' : false; 
        echo '<li>';
           echo $s['link'] ? '<a href="' . $s['link'] . '" ' . $target . '  >' : false;
        //    echo $s['ikona'] ;
           echo '<img src="' .get_stylesheet_directory_uri() . '/src/img/icons/' . $s['ikona'] . '.svg"   height="21px" >';
           echo $s['link'] ? '</a>' : false;
        echo '</li>';
    endforeach;
    echo '</ul>';
endif; ?>

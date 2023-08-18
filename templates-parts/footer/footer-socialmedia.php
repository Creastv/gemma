<?php
$lewo  = get_field( 'lewo', 'options' );
$sm = $lewo['social_media'];
?>

<?php if($sm) :
    echo '<ul class="footer__socialmedia">';
    foreach($sm as $s):
        echo '<li>';
           echo $s['link'] ? '<a href="' . $s['link'] . '" target="_blank" >' : false;
        //    echo $s['ikona'] ;
           echo '<img src="' .get_stylesheet_directory_uri() . '/src/img/icons/' . $s['ikona'] . '.svg"   height="28px" />';
           echo $s['link'] ? '</a>' : false;
        echo '</li>';
    endforeach;
    echo '</ul>';
endif; ?>

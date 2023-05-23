<?php 
$img = get_field( 'avatar' );
$contact = get_field( 'kontakt' );
$title = get_field( 'naglowek' );
?>

<div class="go-contact">
    <div class="go-contact__wraper">
        <div class="col">
            <?php 
            if($img ):
                echo wp_get_attachment_image( $img, 'full' );
            endif;
            ?>
        </div>
        <div class="col">
             <?php 
            if($title ):
               echo '<h2> ' . $title. ' </h2>';
            endif;
            ?>
            <?php
            if($contact ):
            echo '<ul>';
            foreach($contact as $item):
                echo '<li>';
                echo $item['link'] ? '<a href="' . $item['link'] . '">' : false ;
                echo $item['tytul'] ? '<p>' . $item['tytul'] . '</p>' : '';
                echo $item['kontakt'] ? '<span>' . $item['kontakt'] . '</span>' : '' ;
                echo $item['link'] ? ' </a>' : false;
                echo ' </li>';
            endforeach;
            echo '</ul>';
            endif;
            ?>
        </div>
    </div>
</div>


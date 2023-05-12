<?php 
function add_to_head() { 

?>
<style type="text/css" class="yes">
<?php if(get_field( 'zdjecie_tla', 'options', get_the_ID() )) : ?>
#footer{
    background-image: url(<?php the_field( 'zdjecie_tla', 'options', get_the_ID() ); ?>)!important;
}
<?php endif; ?>
<?php if(get_field( 'kolor_wszystkich_czcionek', 'options', get_the_ID() )) : ?> 
#footer * {
    color: <?php the_field( 'kolor_wszystkich_czcionek', 'options', get_the_ID() ); ?>!important;
}
<?php endif; ?>
<?php if(get_field( 'kolor_tla_nad_zdjeciem', 'options', get_the_ID() )) : ?> 
.footer_bg {
    background-color: <?php the_field( 'kolor_tla_nad_zdjeciem',  'options', get_the_ID()) ?>!important;
}
<?php endif; ?>

</style>
<?php }

add_action( 'wp_head', 'add_to_head' );
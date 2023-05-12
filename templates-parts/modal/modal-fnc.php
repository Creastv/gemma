<?php 

function load_post_callback() {
$post_id = $_POST['post_id'];
$post = get_post($post_id);

$title = get_the_title($post_id);
$inw = get_the_terms( $post_id, 'inwestycje' );
$inw_string = join(', ', wp_list_pluck($inw, 'name'));

$img = get_the_post_thumbnail($post_id);

$typeInv = get_the_terms( $post_id, 'typ-lokalu' );
$typeInv_string = join(', ', wp_list_pluck($typeInv, 'name'));
$rooms = get_post_meta($post_id, "liczba_pokoi", true);
$floor = get_post_meta($post_id, "pietro", true);
$status = get_post_meta($post_id, "status", true);
$size = get_post_meta($post_id, "powierzchnia", true);
$price = get_post_meta($post_id, "cena", true);

switch ($floor) {
case '0':
$floor = "Parter";
break;
default:
$floor = $floor;
break;
};

switch ($status) {
case '1':
$classStatus = 'available';
$textStatus = 'Wolne';
break;
case '2':
$classStatus = 'booked';
$textStatus = 'Zarezerwowane';
break;
case '3':
$classStatus = 'sold';
$textStatus = 'Sprzedane';
break;
};

?>

<?php if($title) : ?>
<h4><?php echo $title; ?></h4>
<?php endif; ?>
<?php if( $inw ) : ?>
<p><?php echo  $inw_string; ?></p>
<?php endif; ?>
<?php if($img) : ?>
<?php echo $img; ?>
<?php endif; ?>
<ul class="bullets">
    <?php if($status) : ?>
    <li><span class="status <?php echo $classStatus; ?>"><?php echo $textStatus; ?></span></li>
    <?php endif; ?>
    <?php if($typeInv) : ?>
    <li>
        <span>Typ lokalu:</span>
        <span><?php echo $typeInv_string; ?></span>
    </li>
    <?php endif; ?>
    <?php if($floor) : ?>
    <li>
        <span>Pietro:</span>
        <span><?php echo $floor; ?></span>
    </li>
    <?php endif; ?>
    <?php if($rooms) : ?>
    <li>
        <span>Ilość pokoi:</span>
        <span><?php echo $rooms; ?> </span>
    </li>
    <?php endif; ?>
    <?php if($size) : ?>
    <li>
        <span>Powierzchnia: </span>
        <span><?php echo $size; ?> m<sup>2</sup></span>
    </li>
    <?php endif; ?>
    <?php if($price) : ?>
    <li>
        <span>Cena: </span>
        <span><?php echo $price; ?> zł</span>
    </li>
    <?php endif; ?>
</ul>
<?php
  wp_die();
}
add_action( 'wp_ajax_load_post', 'load_post_callback' );
add_action( 'wp_ajax_nopriv_load_post', 'load_post_callback' );

// PDF

function load_pdf_callback() {
$pdf = $_POST['post_pdf'];
// $post = get_post($post_id);

// $pdf = get_post_meta($post_id, "rzut_pdf", true);
?>
<object data="<?php echo $pdf; ?>" type="application/pdf" width="100%" height="500px">
    <p>Unable to display PDF file. <a href="<?php echo $pdf?>">Download</a> instead.</p>
</object>
<?php
  wp_die();
}
add_action( 'wp_ajax_load_pdf', 'load_pdf_callback' );
add_action( 'wp_ajax_nopriv_load_pdf', 'load_pdf_callback' );

<?php
$status = get_field( 'status', get_the_ID() );
switch ($status) {
    case "1":
        $label = '<span class="label-status available">Wolne</span>';
    break;
    case "2":
        $label = '<span class="label-status booked">Zarezerwowane</span>';
    break;
    case "3":
        $label = '<span class="label-status sold">Sprzedane</span>';
    break;
    
    default:
         $label = '<span class="label-status">Bez statusu</span>';
    break;
}
$rooms = get_field( 'liczba_pokoi', get_the_ID() );
switch ($rooms) {
    case "1":
        $rooms = $rooms . ' pokój';
    break;
    case "2":
        $rooms = $rooms . ' pokoje';
    break;
    case "3":
        $rooms = $rooms . ' pokoje';
    break;
    case "4":
        $rooms = $rooms . ' pokoje';
    break;
    case "5":
        $rooms = $rooms . ' pokoi';
    break;
    default:
        $rooms = $rooms ? $rooms . ' pokoi' : false;
    break;
}
$roomsDisplay = $rooms ? '<span class="rooms">' . $rooms . '</span>' : false;

$floor = get_field( 'pietro',  get_the_ID() );
switch ($floor) {
    case "0":
        $floor = 'Parter';
    break;
    default:
        $floor = $floor ? $floor . ' piętro ' : false;
    break;
}
$floorDisplay = $floor ? '<span>' . $floor . '</span>' : false;
$size = get_field( 'powierzchnia', get_the_ID() );
$sizeDisplay = $size ? '<span>' . $size . ' m<sup>2</sup></span>' : false;

$excerpt = $roomsDisplay . ' ' . $floorDisplay . ' ' . $sizeDisplay; ;

$price = get_field( 'cena', get_the_ID() );
$priceDisplay = $price ? $price . ' zł' : false ;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('local-item'); ?>>
    <div class="post-item__wraper">
        <header>
            <?php if ( has_post_thumbnail() )  : ?>
            <?php the_post_thumbnail('post-item'); ?>
            <?php else: ?>
            <img src="<?php echo get_template_directory_uri()."/src/img/thumbnail.png"; ?>" width="350" height="490" alt="<?php the_title(); ?>">
            <?php endif; ?>
            <?php echo $label; ?>
        </header>
        <div class="content">
            <h2 class="entry-title">
                <?php the_title(); ?>
            </h2>
            <div class="entry-content">
                <p><?php echo $excerpt; ?></p>
                <p><?php echo $priceDisplay; ?></p>
            </div>
            <a href="#" class="opener-form" data-id="<?php the_ID(); ?>">Zapytaj o mieszkanie ></a>
        </div>
    </div>
</article>

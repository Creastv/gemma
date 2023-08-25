<?php
$status = get_field( 'status', get_the_ID() );
switch ($status) {
    case "1":
        $label = '<span class="label-status available">Dostępny</span>';
    break;
    case "2":
        $label = '<span class="label-status booked">Zarezerwowany</span>';
    break;
    case "3":
        $label = '<span class="label-status sold">Sprzedany</span>';
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

$typ_lokalu = get_the_terms($post->ID, 'typ-lokalu');
$typ = $typ_lokalu[0];

$tekstButton = "";
if( $typ->name == "Mieszkanie" ||  $typ->name == "Dom") {
    $textButton = "Zapytaj o mieszkanie >";
} else if($typ->name == "Lokal usługowy" ) {
    $textButton = "Zapytaj o lokal >";
} else {
    $textButton = "Zapytaj o " . strtolower($typ->name) . " >";
}

$img = get_field( 'zdjecie', get_the_ID() );
$pdfRzut = get_field( 'rzut_pdf', get_the_ID() );

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('local-item'); ?>>
    <div class="post-item__wraper">
        <header>
            <?php if($pdfRzut) { ?>
            <a href="<?php echo $pdfRzut; ?>"  target="_blank">
            <?php } ?>   
                <?php if($img) { ?>
                    <?php echo wp_get_attachment_image( $img, 'post-item'); ?>
                <?php } else { ?>
                    <?php if ( has_post_thumbnail() )  : ?>
                    <?php the_post_thumbnail('post-item'); ?>
                    <?php else: ?>
                    <img src="<?php echo get_template_directory_uri()."/src/img/thumbnail.png"; ?>" width="350" height="490" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                <?php } ?>
                <?php echo $label; ?>
            <?php if($pdfRzut) { ?>
                </a>
            <?php } ?>
        </header>
        <div class="content">
            <h2 class="entry-title title-local">
                <?php the_title(); ?>
            </h2>
            <div class="entry-content">
                <p><?php echo $excerpt; ?></p>
                <p><?php echo $priceDisplay; ?></p>
            </div>
            <a href="#" class="opener-form"  data-titlelocal="<?php the_title(); ?>" data-id="<?php the_ID(); ?>"><?php echo $textButton; ?></a>
        </div>
    </div>
</article>

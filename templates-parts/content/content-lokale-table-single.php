<?php 
$status = get_field( 'status', get_the_ID() );
switch ($status) {
    case "1":
        $label = '<p class="stat available"><span style="display:none;">1</span> Wolne</p>';
    break;
    case "2":
        $label = '<p class="stat booked"><span style="display:none;">2</span> Zarezerwowane</p>';
    break;
    case "3":
        $label = '<p class="stat sold"><span style="display:none;">3</span> Sprzedane</p>';
    break;
    
    default:
         $label = '<p class="stat">Bez statusu</p>';
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
$floor = get_field( 'pietro', get_the_ID() );
switch ($floor) {
    case "0":
        $floor = '<span style="display:none">'. $floor . '</span>' . 'Parter';
    break;
    default:
        $floor = $floor ? $floor . ' piętro ' : false;
    break;
}
$price = get_field( 'cena', get_the_ID() );
$priceDisplay = $price ? $price . ' zł' : false ;

$size = get_field( 'powierzchnia', get_the_ID() );
$sizeDisplay = $size ?  $size  : false;

$pdfRzut = get_field( 'rzut_pdf', get_the_ID() );
$pdf3D = get_field( 'rzut_3d', get_the_ID() );

$extras = get_field( 'udogodnienia_lokalu', get_the_ID() );
$sizeInfo = get_field( 'dodatkowe_info_o_powierzchni', get_the_ID() );
?>

<tr>
    <td></td>
    <td>
        <?php if ( has_post_thumbnail() )  : ?>
        <?php the_post_thumbnail('local-table'); ?>
        <?php else: ?>
        <img src="<?php echo get_template_directory_uri()."/src/img/thumbnail.png"; ?>" width="120" height="120" alt="<?php the_title(); ?>">
        <?php endif; ?>
    </td>
    <td>
        <p><?php the_title(); ?></p>
        <span><?php echo $rooms; ?></span>
        <?php if($pdf3D) { ?>
        <a href="#" class="opener-pdf" data-pdf="<?php echo $pdf3D; ?>">Pobierz rzuty 3D ></a>
        <?php } ?>
    </td>
    <td>
        <p class="size"><?php echo $sizeDisplay ? $sizeDisplay : "---"; ?></p>
        <?php if($sizeInfo) :
        echo '<ul class="size-info">';
        foreach($sizeInfo as $info) :
            echo '<li>';
            echo '<span>'.$info['nazwa'].'</span >';
            echo '<span> '.$info['rozmiar_w_m2'].' m<sup>2</sup></span >';
            echo '</li>';
        endforeach;
         echo '</ul>';
        endif;?>
    </td>
    <td>
        <p class="floor"><?php echo $floor ? $floor : "---"; ?></p>
    </td>
    <td>
        <p class="price"> <?php echo $priceDisplay ? $priceDisplay : "---"; ?></p>
    </td>
    <td>
        <?php if($extras) :
        echo '<ul class="extras">';
        foreach($extras as $extra) :
            echo '<li>';
            echo '<span class="tooltip" >';
            echo wp_get_attachment_image( $extra['zdjecie'] );
            echo '<span class="tooltiptext">'.$extra['tresc_tooltip'].'</span >';
            echo '</span >';
            echo '</li>';
        endforeach;
         echo '</ul>';
        endif;?>
    </td>
    <td>
        <?php echo $label; ?>
    </td>
    <td>
        <a href="#" class="opener-form" data-id="<?php the_ID(); ?>">Zapytaj o mieszkanie ></a>
        <?php if($pdfRzut) { ?>
        <a href="#" class="opener-pdf" data-pdf="<?php echo $pdfRzut; ?>">Pobierz PDF ></a>
        <?php } ?>
    </td>
</tr>

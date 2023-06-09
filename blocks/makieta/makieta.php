<?php
$makieta = get_field( 'makieta' );
$maping = get_field( 'maping' );
$term = get_field( 'inwestycja' );
$filter = get_field( 'clasa_filtra' );
$form = get_field( 'formularz_filtrujacy' );

$stroke_color = "00000";
$fill_color = "00000";
$fill_opacity = "0.4";
$stroke_opacity = "0.0";

?>

<div class="go-makieta" data-inw="<?php echo esc_html( $term->slug); ?>" data-filter="<?php echo $filter; ?>" data-idform="<?php echo $form; ?>">
    <?php if($makieta): ?>
    <img id="InvestmentMap" src="<?php echo $makieta; ?>" usemap="#image-map">
    <?php endif; ?>
    <?php if($maping) : ?>
    <map name="image-map">
        <?php foreach($maping as $cord) : 
           $cordsNumber = $cord['cords'] ? $cord['cords'] : '';
           $cordsLink = "";
           if(isset($cord['link'])) {
            $cordsLink = $cord['link'] ;
           }
        ?>
        <area
        title="<?php echo $cord['naglowek']; ?>"
        date-na="<?php echo $cord['opis']; ?>"
        data-valu="<?php echo $cord['value']; ?>"
        class=" hasTooltip "
        coords="<?php echo $cordsNumber; ?>"
        <?php echo $cordsLink ? $cordsLink : ''; ?>
        data-maphilight='{"strokeOpacity ": "<?php echo $stroke_opacity; ?>", "strokeColor":"<?php echo $stroke_color; ?>","strokeWidth":1,"fillColor":"<?php echo $fill_color; ?>","fillOpacity":<?php echo $fill_opacity; ?>}'
        shape="poly">
        <?php endforeach; ?>
    </map>
    <?php endif; ?>
</div>
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

           $idPost = $cord['mieszkaniedomlokal'];

           $idStatus = get_field( 'status', $idPost);
           $status = '';
           $disabled = '';
           switch ($idStatus) {
                case '1':
                    $status = 'Dostępny';
                    $stroke_color = "008000";
                    $fill_color = "008000";
                    $fill_opacity = "0.5";
                    $stroke_opacity = "0.5";
                    break;
                case '2':
                    $status = 'Zarezerwowany';
                    $stroke_color = "1788c9";
                    $fill_color = "1788c9";
                    $fill_opacity = "0.5";
                    $stroke_opacity = "0.5";
                    break;
                case '3':
                    $status = 'Sprzedany';
                    $stroke_color = "ff0000";
                    $fill_color = "ff0000";
                    $fill_opacity = "0.5";
                    $stroke_opacity = "0.5";
                    $disabled = "disabled";
                    break;
               default:
                    $status = 'Sprzedany';
                    $stroke_color = "ff0000";
                    $fill_color = "ff0000";
                    $fill_opacity = "0.5";
                    $stroke_opacity = "0.5";
                    $disabled = "disabled";
                     break;
            }  

            $tileLocal = get_the_title($idPost);
            $liczbaPoki = get_field( 'liczba_pokoi', $idPost);
            
            $powierzchnia = get_field( 'powierzchnia', $idPost);


        ?>
        <area
        data-id="<?php echo  $idPost; ?>"
        data-status="<?php echo $status ?>"
        title="<?php echo $tileLocal; ?>"
        date-powierzchnia="<?php echo $powierzchnia; ?>"
        date-pokoje="<?php echo $liczbaPoki; ?>"
        data-titlelocal="<?php echo $tileLocal; ?>"
        class=" hasTooltip  <?php echo $disabled !== 'disabled' ? 'opener-form' : false; ?> "
        coords="<?php echo $cordsNumber; ?>"

        data-maphilight='{"strokeOpacity ": "<?php echo $stroke_opacity; ?>", "strokeColor":"<?php echo $stroke_color; ?>","strokeWidth":1,"fillColor":"<?php echo $fill_color; ?>","fillOpacity":<?php echo $fill_opacity; ?>}'
        shape="poly">
        <?php endforeach; ?>
    </map>
    <?php endif; ?>
</div>

<script>
    // jQuery("#InvestmentMap").maphilight({
  //   alwaysOn: true
  // });
</script>
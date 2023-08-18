<?php
$carousel = get_field( 'karuzela' );
$colorApla = get_field( 'kolor_apla' );
$colorBg = get_field( 'kolor_tla_nad_zdjeciem' );

$className = '';
if( !empty($block['className']) ) {
    $className =  $block['className'];
}

?>

<section id="slider" class="container-full <?php echo $className; ?>">
    <div class="swiper s-slider">
        <div class="swiper-wrapper">
            <?php foreach($carousel as $ca) :
                switch ($ca['ustawienie_tresci_']) {
                case "1":
                   $item = "flex-start";
                   $content = "flex-start";
                   $class = 'left';
                    break;
                case "2":
                   $item = "flex-start";
                   $content = "center";
                   $class = 'left';
                    break;
                case "3":
                   $item = "flex-start";
                   $content = "flex-end";
                   $class = 'left';
                    break;
                case "4":
                   $item = "center";
                   $content = "flex-start";
                   $class = 'center';
                    break;
                case "5":
                   $item = "center";
                   $content = "center";
                    $class = 'center';
                    break;
                case "6":
                   $item = "center";
                   $content = "flex-end";
                    $class = 'center';
                    break;
                 case "7":
                   $item = "flex-end";
                   $content = "flex-start";
                    $class = 'right';
                    break;
                 case "8":
                   $item = "flex-end";
                   $content = "center";
                   $class = 'right';
                    break;
                case "9":
                   $item = "flex-end";
                   $content = "flex-end";
                   $class = 'right';
                    break;
                default:
                    $item = "flex-start";
                   $content = "flex-start";
                   $class = 'left';
                    break;
                }
            ?>

             <div class="swiper-slide">
                <div class="slider__wraper <?php echo $class; ?>" style="justify-content:<?php echo $content ; ?>; align-items:<?php echo $item ; ?> ">
                <?php if( $ca['zdjecie'] ) {
                        echo wp_get_attachment_image( $ca['zdjecie'], 'full');
                    } ?>
                <div class="slider__content" style="background-color:<?php echo $colorApla; ?>">
                    <div class="slider__content__wraper">
                    <<?php echo $ca['tag'];  ?> class="title">
                      <?php echo $ca['tytul']; ?>
                      <?php echo $ca['podtytul'] ? '<span>' . $ca['podtytul'] . '</span>' : false ; ?>
                    </<?php echo $ca['tag']; ?>>
                    <?php echo $ca['cena'] ? '<p class="price">' .$ca['cena'] . '</p>' : false; ?>
                    <?php if($ca['link']): ?>
                    <a class="btn-revers" href="<?php echo $ca['link']['url']; ?>">
                    <?php echo $ca['link']['title'] ? '<span>' . $ca['link']['title'] .'</span>' : false ;?>
                    <!-- <span>test</span> -->
                    </a>
                    <?php endif; ?>
                    </div>
                </div>
                </div>
             </div>
             <?php  endforeach; ?>
        </div>
        <div class="swiper-pagination "></div>
    </div>
</section>
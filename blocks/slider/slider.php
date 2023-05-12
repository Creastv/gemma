<?php
$carousel = get_field( 'karuzela' );
$colorApla = get_field( 'kolor_apla' );
$colorBg = get_field( 'kolor_tla_nad_zdjeciem' );

?>

<section id="slider" class="container-full">
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="21.65" height="13.548" viewBox="0 0 21.65 13.548">
                    <g id="Group_724" data-name="Group 724" transform="translate(-215.942 -746.82)">
                        <path id="Path_1583" data-name="Path 1583" d="M33.465,747.174l6.42,6.42-6.42,6.42" transform="translate(197)" fill="none" stroke="#fff" stroke-width="1"/>
                        <path id="Path_1584" data-name="Path 1584" d="M18.942,753.594H40.2" transform="translate(197)" fill="none" stroke="#fff" stroke-width="1"/>
                    </g>
                    </svg>
                    </a>
                    <?php endif; ?>
                    </div>
                </div>
                </div>
             </div>
             <?php  endforeach; ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>
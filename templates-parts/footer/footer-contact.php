<?php
$form = get_field( 'form', 'options' );
$info = get_field( 'info', 'options' );
$display = get_field( 'wylacz_formularz_u_dolu_srony' );
?>
<?php if($display == false) : ?>
<section class="footer-contact">
    <div class="container">
        <div class="row">
            <div class="col">
                <?php 
                if($info) :
                    echo '<div class="footer-contact__info">';
                    foreach($info as $item) :
                        $bottom = "";
                        if(isset($item['bottom'])) {
                         $bottom = $item['bottom'];
                        }
                    echo '<div class="info__item">';
                        echo $item['tytul'] ? '<p class="info__item__title">'  . $item['tytul'] . '</p>' : false ;
                        echo $item['opis_top'] ? '<span class="info__item__desc">' . $item['opis_top'] . '</span>' : false;
                        if($item['kontakty']) :
                        echo '<ul>';
                        foreach($item['kontakty'] as $con) :
                            echo '<li>';
                            echo $con['link'] ? '<a href="' . $con['link'] . '">' : false ;
                              echo $con['ikona'] ? '<img src="' .get_stylesheet_directory_uri() . '/src/img/icons/' . $con['ikona'] . '.svg"   width="13px" /> ' : false ;
                              echo $con['tekst'] ? '<span>' . $con['tekst'] . '</span>' : false;
                            echo $con['link'] ? '</a>' : false ;
                            echo '</li>';
                        endforeach;
                        echo '</ul>';
                        endif;
                        if($bottom){ 
                         echo '<span class="info__item__desc">' . $bottom . '</span>';
                        }
                    echo '</div>';
                    endforeach;
                    echo '</div>';
                endif;
                ?>

            </div>
            <div class="col">
                <?php  echo do_shortcode('[contact-form-7 id="32" title="Formularz 1"]'); ?>
            </div>
        </div>
    </div>
</section>
<?php else : ?>
<div style="height:20px; display:block;"></div>
<?php endif; ?>

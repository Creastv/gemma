<?php
$type = get_field( 'typ_tresci' );
$perSlider = get_field( 'ilosc_wyswietlanych_postow' );
$posts = new WP_Query( array(
        'post_type' => $type,
        'posts_per_page' => $perSlider,
        'order' => 'DESC',
));
?>
<section class="articles">
    <?php if($posts) { ?>
        <div class="row">
            <div class="swiper s-carousel">
                <div class="swiper-wrapper">
                <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
                 <div class="swiper-slide">
                <?php   get_template_part( 'templates-parts/content/content', 'index' );  ?>
                 </div>
                <?php endwhile; wp_reset_query(); ?>
                </div>
             </div>
            <div class="arrows">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    <?php } ?>
</section>

<?php
$id = $block['id'];

$postPerPage = get_field( 'posts_per_page' );
$postType = get_field( 'typ_postow' );
$posts = new WP_Query( array(
        'post_type' => $postType,
        'posts_per_page' => $postPerPage,
        'order' => 'DESC',
));
?>
<section id="<?php echo $id; ?>" class="articles">
    <?php if($posts) { ?>
        <div class="row">
            <div class="posts-wraper">
                <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
                <?php   get_template_part( 'templates-parts/content/content', 'index' );  ?>
                <?php endwhile; wp_reset_query(); ?>
            </div>
        </div>
    <?php } ?>
</section>

<?php
$id = $block['id'];

$way = get_field( 'sposob_dodawania_postow' );
$pos = get_field( 'posty' );

$postPerPage = get_field( 'posts_per_page' );
$postType = get_field( 'typ_postow' );
$posts = new WP_Query( array(
        'post_type' => $postType,
        'posts_per_page' => $postPerPage,
        'order' => 'DESC',
));

?>

<section id="<?php echo $id; ?>" class="articles">
<?php if($way == 1) : ?>
    <?php if($posts) { ?>
        <div class="row">
            <div class="posts-wraper">
                <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
                <?php   get_template_part( 'templates-parts/content/content', 'index' );  ?>
                <?php endwhile; wp_reset_query(); ?>
            </div>
        </div>
    <?php } ?>
<?php else : ?>
<?php if( $pos ): ?>
    <div class="row">
        <div class="posts-wraper">
        <?php foreach( $pos as $post ): 
            $zf = get_field( 'zdjecie', $post->ID );
        ?>
           <article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
                <div class="post-item__wraper">
                    <header>
             
                        <a href="<?php the_permalink($post->ID); ?>">
                            <?php if (  $zf || $zf !== NULL  )  : ?>
                                 <?php echo wp_get_attachment_image( $zf, 'post-item' );?>
                            <?php else : ?>
                               
                                <?php if ( has_post_thumbnail($post->ID)  )  : ?>
                                    <?php echo get_the_post_thumbnail($post->ID,  'post-item');?>
                                <?php else: ?>
                                <img src="<?php echo get_template_directory_uri()."/src/img/thumbnail.png"; ?>" width="350" height="490" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                            <?php endif; ?>    
                        </a>
                    </header>
                    <div class="content">
                        <h2 class="entry-title">
                            <a href="<?php echo get_the_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a>
                        </h2>
                        <p><?php echo get_the_excerpt($post->ID); ?></p>
                        <div class="btn-wraper">
                            <a href="<?php echo get_the_permalink($post->ID); ?>" class="btn"> </a>
                        </div>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
        </div>
    </div>
    <?php 
    wp_reset_postdata(); ?>
<?php endif; ?>
<?php endif; ?>
</section>
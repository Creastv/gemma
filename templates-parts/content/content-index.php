<?php
$zf = get_field( 'zdjecie' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
    <div class="post-item__wraper">
        <header>
            <a href="<?php the_permalink(); ?>">
                <?php if (  $zf  )  : ?>
                    <?php echo wp_get_attachment_image( $zf, 'post-item' );?>
                <?php elseif ( has_post_thumbnail()  )  : ?>
                    <?php echo the_post_thumbnail('post-item');?>
                <?php else: ?>
                <img src="<?php echo get_template_directory_uri()."/src/img/thumbnail.png"; ?>" width="350" height="490" alt="<?php the_title(); ?>">
                <?php endif; ?>
            </a>
        </header>
        <div class="content">
            <h2 class="entry-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            <?php the_excerpt(); ?>
            <div class="btn-wraper">
                <a href="<?php the_permalink(); ?>" class="btn"> </a>
            </div>
        </div>
    </div>
</article>

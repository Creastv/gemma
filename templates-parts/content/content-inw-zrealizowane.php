
<div class="inw-zre">
<article id="post-<?php the_ID(); ?>" class="single-post hentry">
    <div class="entry-content">
        <header>
        <h1><?php the_title(); ?></h1>
        <?php the_excerpt();  ?>
        </header>
        <?php the_content(); ?>
    </div>
</article>
<aside>
    <?php
        $curentId=get_the_ID();
        $test = new WP_Query( array(
            'post_type' => 'inw-zrealizowane',
            'posts_per_page' => -1,
            'order' => 'DESC',
        ));
    ?>
    <div class="sidebar">
     <?php if($test) : ?>
        <div class="nav-inw">
        <ul>
        <?php while ( $test->have_posts() ) : $test->the_post(); ?>
        <li <?php echo $curentId == get_the_ID() ? 'class="active"' : false; ?> >
            <a href="<?php the_permalink(); ?>">
            
                <h2><?php the_title(); ?></h2>
                <?php the_excerpt();  ?>
            </a>
        </li>
        <?php endwhile; wp_reset_query(); ?>
        </ul>
        </div>
    <?php endif; ?>
    </div>
</aside>
</div>
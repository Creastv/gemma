<?php
get_header();

while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" class="hentry">
    <?php get_template_part( 'templates-parts/header/header', 'title' );  ?>
    <div class="entry-content">
        <?php  the_content(); ?>
    </div>
</article>

<?php endwhile;
get_footer();

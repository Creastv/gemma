<?php
get_header(); ?>
<?php if ( have_posts() ) : ?>
<?php get_template_part( 'templates-parts/header/header', 'title' );  ?>
<div class="posts-wraper">
    <?php while ( have_posts() ) : the_post(); 
    get_template_part( 'templates-parts/content/content', 'index' ); 
    endwhile; ?>
</div>
<?php if(paginate_links()) { ?>
<div class="go-pagination">
    <?php pagination_bars(); ?>
</div>
<?php } ?>
<?php else :
    echo "<h1 class='text-center'>Nic nie znaleziono</h1> ";
endif;
get_footer();

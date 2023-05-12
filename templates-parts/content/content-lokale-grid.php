<?php
echo '<div class="posts-wraper">';
while ( have_posts() ) : the_post();
get_template_part( 'templates-parts/content/content-lokale-grid', 'single' ); 
endwhile;
echo '</div>';
?>

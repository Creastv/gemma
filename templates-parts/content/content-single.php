<?php
$sm = get_field( 'social_media_post', 'options' );
$comments_number = get_comments_number();
$com = '0';
if ($comments_number == 0) {
   $com = '0';
} elseif ($comments_number == 1) {
   $com = '1';
} else {
   $com = $comments_number;
}

$categories = get_the_category();
$numCat = count($categories);
$post_link = get_permalink();

$arr = new WP_Query( array(
        'post_type' => 'Post',
        'posts_per_page' => 3,
        'order' => 'DESC',
        'post__not_in' => array( get_the_ID() )
));



?>
<article id="post-<?php the_ID(); ?>" class="single-post hentry">
    <header class="entry-header">
        <?php if($numCat > 1) : ?>
       <div class="meta">
        <ul class="meta-cat">
         <?php 
            foreach( $categories as $category) {
                $name = $category->name;
                $category_link = get_category_link( $category->term_id );
                echo "<li> <a href='$category_link'>
                        <span class=" . esc_attr( $name) . ">" . esc_attr( $name) . "</span>
                   </a></li>";
            } ?>
        </ul>
       </div>
       <?php endif; ?>
        <h1 class="entry-title ">
            <?php the_title(); ?>
        </h1>
         <div class="meta-pub">
            <time class="meta meta-data-pub published" datetime="<?php the_time() ?>"> <span><?php the_time('d.m.Y');?></span></time>
              <span>@ <?php echo get_the_author(); ?></span>
        </div>
        </div>
        <div class="img-wraper">
            <div class="img">
                <?php the_post_thumbnail(); ?>
            </div>
        </div>
    </header>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
    <footer class="entryfooter ">
        <?php if($com !== '0') : ?>
        <div class="meta-com">
            <a href="<?php echo $post_link; ?>#comments">
            <span>Komentarzy <?php echo $com; ?></span>
            </a>
        </div>
        <?php endif; ?>
        <?php if($sm) :
                echo '<div class="entry-socialmedia-post"> <ul>';
                foreach($sm as $s):
                    echo '<li>';
                    echo $s['link'] ? '<a href="' . $s['link'] . '" target="_blank" >' : false;
                    //    echo $s['ikona'] ;
                    echo '<img src="' .get_stylesheet_directory_uri() . '/src/img/icons/' . $s['ikona'] . '.svg"   height="28px" />';
                    echo $s['link'] ? '</a>' : false;
                    echo '</li>';
                endforeach;
                echo '</ul></div>';
                    endif; ?>
                      <?php if($numCat > 1) : ?>
                    <div class="meta-c text-center">
                    <span> Kategorie:</span>
                  
                    <div class="meta">
                        <ul class="meta-cat">
                        <?php 
                            foreach( $categories as $category) {
                                $name = $category->name;
                                $category_link = get_category_link( $category->term_id );
                                echo "<li> <a href='$category_link'>
                                        <span class=" . esc_attr( $name) . ">" . esc_attr( $name) . "</span>
                                </a></li>";
                            } ?>
                        </ul>
                    </div>
                   
       </div>
        <?php endif; ?>
        <div class="entry-recomended">
             <h3 class="text-center">ZOBACZ PODOBNE</h3>
            <?php if($arr) { ?>
                <div class="row">
                        <?php while ( $arr->have_posts() ) : $arr->the_post(); ?>
                        <?php   get_template_part( 'templates-parts/content/content', 'index' );  ?>
                        <?php endwhile; wp_reset_query(); ?>
                </div>
            <?php } ?>
        </div>
        
    </footer>

    <?php if (comments_open() || get_comments_number()) { ?>
    <div id="comments" class="comments-template">     
    <?php comments_template(); ?>
    </div>
    <?php } ?>
</article>

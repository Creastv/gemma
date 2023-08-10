<article id="post-<?php the_ID(); ?>" class="single-post hentry">
    <header class="entry-header">
        <div class="meta"><time class="meta meta-data-pub published" datetime="<?php the_time() ?>"> <span><?php the_time('d.m.Y');?></span></time></div>
        <h1 class="entry-title ">
            <?php the_title(); ?>
        </h1>
        <!-- <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?> -->
        </div>
        <div class="img-wraper">
            <div class="img">
                <?php the_post_thumbnail(); ?>
            </div>
        </div>
    </header>
    <div class="entry-content">
        <?php the_content(); ?>

        <?php if(is_singular('post')) { 
            $av_id = get_the_author_meta('ID');
            $im = get_field( 'avatar', 'user_'. $av_id );
        ?>
        <div id="author-bio">
            <?php if($im) { ?>
            <div id="author-avatar"><img style="max-width:60px; height:auto;" src="<?php echo esc_url($im['url']); ?>" alt="<?php echo esc_attr($im['alt']); ?>" /></div>
            <?php } else { ?>
            <div id="author-avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?></div>
            <?php } ?>

            <div id="author-details">
                <div class="author-head">
                    <div class="title">
                        <p class="h3"><?php the_author_posts_link(); ?></p>
                        <i><?php $author_id = get_the_author_meta('ID'); the_field('pozycja', 'user_'. $author_id); ?></i>
                    </div>
                    <div class="links">
                        <?php  if (get_the_author_meta('user_url') ) { ?>
                        <a href="<?php the_author_meta('user_url'); ?>" class="author-website" target="_blank">
                            <i class="fas fa-link"></i>
                        </a>
                        <?php } ?>
                        <?php  if (get_the_author_meta('linkedin') ) { ?>
                        <a href="<?php the_author_meta('linkedin'); ?>" class="author-linkedin" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <?php } ?>
                        <?php  if (get_the_author_meta('facebook') ) { ?>
                        <a href="<?php the_author_meta('facebook'); ?>" class="author-facebook" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <?php } ?>
                        <?php  if (get_the_author_meta('twitter') ) { ?>
                        <a href="<?php the_author_meta('twitter'); ?>" class="author-twitter" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <?php }?>
                        <?php  if (get_the_author_meta('instagram') ) { ?>
                        <a href="<?php the_author_meta('instagram'); ?>" class="author-instagram" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <?php } ?>
                    </div>
                </div>
                <div class="author-footer">
                    <p> <?php the_author_meta('description'); ?></p>
                </div>
            </div><!-- #author-details -->
        </div><!-- #author-bio -->
        <?php } ?>
        <div class="kk-ata">
            <div class="kk-ata__wraper">
                <span>Twoja ocena:</span>
                <?php echo kk_star_ratings(); ?>
            </div>
            <div class="kk-ata__wraper">
                <span>Udostępnij:</span>
                <?php echo do_shortcode("[addtoany]"); ?>
            </div>
        </div>
    </div>

</article>

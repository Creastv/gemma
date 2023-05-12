<?php get_header(); ?>
 <header class="title-page-wraper">
        <div class="container">
            <div class="row">
                <h1 class="entry-title title-page">
                    404
                </h1>
                <div id="error" class="text-center">
                    <h2><?php _e( 'Upss. Chyba się zgubiłeś?', 'go' ); ?></h2>
                    <a class="btn" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <?php _e( 'Wróć do strony głównej ', 'go' ); ?></a>
                </div>
            </div>
        </div>
</header>

<?php get_footer();
</div>
</div>

<?php get_template_part('templates-parts/footer/footer', 'contact'); ?>
</main>
<footer id="footer" itemscope itemtype="http://schema.org/WPFooter">
    <span class="footer_bg"></span>
    <div class="container">
        <div class="row">
            <div class="col">
                <?php get_template_part('templates-parts/footer/footer', 'left'); ?>
            </div>
            <div class="col">
                <?php get_template_part('templates-parts/footer/footer', 'right'); ?>
            </div>

        </div>
        <div class="row">
            <div class="col">
                <?php get_template_part('templates-parts/footer/footer', 'nav'); ?>
            </div>
        </div>
    </div>
</footer>
<span id="go-to-top"></span>

<?php
get_template_part( 'templates-parts/modal/modal' ); 
get_template_part( 'templates-parts/modal/modal-pdf' ); 
?>
<?php wp_footer(); ?>
</body>
</html>
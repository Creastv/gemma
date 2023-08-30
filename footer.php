</div>
</div>
<?php get_template_part('templates-parts/footer/footer', 'contact'); ?>
<?php get_template_part('templates-parts/footer/footer', 'cta-call'); ?>
</main>
<footer id="footer" itemscope itemtype="http://schema.org/WPFooter">
    <span class="footer_bg"></span>
    <div class="container">
        <?php // get_template_part('templates-parts/footer/footer', 'top'); ?>
        <?php // get_template_part('templates-parts/footer/footer', 'bottom'); ?>
        <?php get_template_part('templates-parts/footer/footer', 'two-column'); ?>
        <div class="row">
            <div class="col">
                <?php get_template_part('templates-parts/footer/footer', 'nav'); ?>
            </div>
        </div>
    </div>
</footer>
<!-- <span id="go-to-top"></span> -->

<?php
get_template_part( 'templates-parts/modal/modal' ); 
get_template_part( 'templates-parts/modal/modal-pdf' ); 
?>
<script>
    const page = document.querySelector('[name="page-url"]');
    page.value = '<?php the_title(); ?>'
</script>


<?php wp_footer(); ?>

</body>
</html>
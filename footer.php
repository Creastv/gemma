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
<span id="go-to-top">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
        <path fill="#606161" d="M6,18l2.115,2.115,8.385-8.37V30h3V11.745l8.37,8.385L30,18,18,6Z" transform="translate(-6 -6)" />
    </svg>
</span>

<?php
get_template_part( 'templates-parts/modal/modal' ); 
get_template_part( 'templates-parts/modal/modal-pdf' ); 
?>
<?php wp_footer(); ?>
</body>
</html>
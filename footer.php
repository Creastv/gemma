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
   <svg xmlns="http://www.w3.org/2000/svg" width="19.022" height="12.496" viewBox="0 0 19.022 12.496">
        <path d="M1775.331,1321.291l5.778,5.551-5.778,6.245" transform="translate(-1762.787 -1320.931)" fill="none" stroke="#606060" stroke-width="1"></path>
        <line x1="18" transform="translate(0 5.849)" fill="none" stroke="#606060" stroke-width="1"></line>
    </svg>
</span>

<?php
get_template_part( 'templates-parts/modal/modal' ); 
get_template_part( 'templates-parts/modal/modal-pdf' ); 
?>
<?php wp_footer(); ?>
</body>
</html>
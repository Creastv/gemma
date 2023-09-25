<?php
/**
 * Search & Filter Pro 
 *
 * Sample Results Template
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      https://searchandfilter.com
 * @copyright 2018 Search & Filter
 * 
 * Note: these templates are not full page templates, rather 
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think 
 * of it as a template part
 * 
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs 
 * and using template tags - 
 * 
 * http://codex.wordpress.org/Template_Tags
 *
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>



<?php if ( $query->have_posts() ) { ?>

    <?php if(isset($_COOKIE['resultsDisplay'])) { ?>
    <div class="posts-wraper">
        <?php while ($query->have_posts()) { $query->the_post(); ?>
            <?php get_template_part( 'templates-parts/content/content-lokale-grid', 'single' );  ?>
        <?php } ?>
    </div>
    <?php } else { ?>
    <table id="mieszkania-inw" cellspacing="0" class=" table table-hover" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th data-priority="10" ></th>
                <th data-priority="1" class="name" >Nazwa i liczba pokoi</th>
                <th data-priority="2" >Powierzchnia</th>
                <th class="cena" data-priority="3" >Cena</th>
                <th >Udogodnienia</th>
                <th >Status</th>
                <th ></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($query->have_posts()) { $query->the_post(); ?>
                <?php get_template_part( 'templates-parts/content/content-lokale-table', 'single' ); ?>
            <?php } ?>
        </tbody>
    </table>
    <?php } ?>
    <?php
}
else
{
	echo "No Results Found";
}
?>
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
<div class="search-resoults-info">
    <div class="search-results-count">
        <span> Znaleziono <?php echo  $query->found_posts; ?>  <?php if( $query->found_posts == '1')  { echo 'wynik'; } else if( $query->found_posts >= '1' &&  $query->found_posts <= '4' ) { echo 'wyniki'; } else { echo 'wyników'; } ;?> wyszukiwania. </span>
    </div>
    <div class="swicher-results-display">
        <span> Widok prezentacji: </span>
        
        <div class="swicher results-display-table <?php echo isset($_COOKIE['resultsDisplay']) ? 'active' : false; ?>">
              <svg xmlns="http://www.w3.org/2000/svg" width="65.617" height="19" viewBox="0 0 65.617 19">
                <rect  width="6.8" height="6.8" transform="translate(9.35 0.422)" />
                <rect  width="6.8" height="6.8" transform="translate(0 0.422)" />
                <path  d="M0,0H6.8V6.8H0Z" transform="translate(9.35 9.772)" />
                <rect  width="6.8" height="6.8" transform="translate(0 9.772)" />
                <text id="Kafelki" transform="translate(24.617 15)" font-size="14" font-family="OpenSans-Light, Open Sans" font-weight="300">
                    <tspan x="0" y="0">Kafelki</tspan>
                </text>
            </svg>
        </div>
        <div class="swicher results-display-grid <?php echo !isset($_COOKIE['resultsDisplay']) ? 'active' : false; ?>">
         <svg xmlns="http://www.w3.org/2000/svg" width="53.617" height="19" viewBox="0 0 53.617 19">
                <rect  width="11.02" height="4" transform="translate(4.99 0.752)" />
                <rect  width="2.99" height="4" transform="translate(0 0.752)" />
                <rect  width="11.02" height="4" transform="translate(4.99 6.762)" />
                <rect  width="2.99" height="4" transform="translate(0 6.762)" />
                <rect  width="11.02" height="4" transform="translate(4.99 12.762)" />
                <rect  width="2.99" height="4" transform="translate(0 12.762)" />
                <text id="Lista" transform="translate(24.617 15)" font-size="14" font-family="OpenSans-Light, Open Sans" font-weight="300">
                    <tspan x="0" y="0">Lista</tspan>
                </text>
            </svg>
          
        </div>
    </div>
</div>
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
                <th  class="name" >Nazwa i liczba pokoi</th>
                <th >Powierzchnia</th>
                <th class="cena" >Cena</th>
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
	echo "<h1 class='text-center' style='margin-top:20px'>Nic nie znaleziono</h1> ";
}
?>
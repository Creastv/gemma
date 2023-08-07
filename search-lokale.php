<?php
global $searchandfilter;
$sf_current_query = $searchandfilter->get(477)->current_query();
// $link = 'http://localhost/gemma/lokale';
$link = 'https://gemma.regalestate.pl/lokale/';

$title = get_field( 'title', 'options' );
$subtitle = get_field( 'subtitle', 'opinions' );

get_header(); ?>
<header class="entry-header">
    <h1 class="entry-title">
        <?php echo $title ? $title : ' ZNAJDŹ SWOJE WMARZONE MIESZKANIE'; ?>
    </h1>
    <p>
        <?php echo $subtitle ? $subtitle : ' Wybierz interesujące Cię piętro na fotografii obok lub skorzystaj z filtrów poniżej.'; ?>
       
    </p>
</header>

<div class="search-filters">
    <?php  echo do_shortcode('[searchandfilter id="477"]') ;?>
</div>
<div class="search-resoults-info">
    <div class="search-results-count">
        <span> Znaleziono <?php echo $wp_query->found_posts; ?>  <?php if($wp_query->found_posts == '1')  { echo 'wynik'; } else if($wp_query->found_posts >= '1' && $wp_query->found_posts <= '4' ) { echo 'wyniki'; } else { echo 'wyników'; } ;?> wyszukiwania. </span>
        <?php if($sf_current_query->is_filtered()) : ?>
        <a class="btn" href="<?php echo $link; ?>" class="btn-revers"><span>Resetuj wyniki</span></a>
        <?php endif; ?>
    </div>
    <div class="swicher-results-display">
        <span> Widok prezentacji: </span>
        <div class="swicher results-display-table <?php echo isset($_COOKIE['resultsDisplay']) ? 'active' : false; ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="65.617" height="19" viewBox="0 0 65.617 19">
                <rect id="Prostokąt_508_kopia" data-name="Prostokąt 508 kopia" width="6.8" height="6.8" transform="translate(9.35 0.422)" />
                <rect id="Prostokąt_508_kopia_2" data-name="Prostokąt 508 kopia 2" width="6.8" height="6.8" transform="translate(0 0.422)" />
                <path id="Prostokąt_508_kopia_3" data-name="Prostokąt 508 kopia 3" d="M0,0H6.8V6.8H0Z" transform="translate(9.35 9.772)" />
                <rect id="Prostokąt_508_kopia_3-2" data-name="Prostokąt 508 kopia 3" width="6.8" height="6.8" transform="translate(0 9.772)" />
                <text id="Kafelki" transform="translate(24.617 15)" font-size="14" font-family="OpenSans-Light, Open Sans" font-weight="300">
                    <tspan x="0" y="0">Kafelki</tspan>
                </text>
            </svg>
        </div>
        <div class="swicher results-display-grid <?php echo !isset($_COOKIE['resultsDisplay']) ? 'active' : false; ?>">
             <svg xmlns="http://www.w3.org/2000/svg" width="53.617" height="19" viewBox="0 0 53.617 19">
                <rect id="Prostokąt_508_kopia" data-name="Prostokąt 508 kopia" width="11.02" height="4" transform="translate(4.99 0.752)" />
                <rect id="Prostokąt_508_kopia_2" data-name="Prostokąt 508 kopia 2" width="2.99" height="4" transform="translate(0 0.752)" />
                <rect id="Prostokąt_508_kopia_4" data-name="Prostokąt 508 kopia 4" width="11.02" height="4" transform="translate(4.99 6.762)" />
                <rect id="Prostokąt_508_kopia_4-2" data-name="Prostokąt 508 kopia 4" width="2.99" height="4" transform="translate(0 6.762)" />
                <rect id="Prostokąt_508_kopia_5" data-name="Prostokąt 508 kopia 5" width="11.02" height="4" transform="translate(4.99 12.762)" />
                <rect id="Prostokąt_508_kopia_5-2" data-name="Prostokąt 508 kopia 5" width="2.99" height="4" transform="translate(0 12.762)" />
                <text id="Lista" transform="translate(24.617 15)" font-size="14" font-family="OpenSans-Light, Open Sans" font-weight="300">
                    <tspan x="0" y="0">Lista</tspan>
                </text>
            </svg>
        </div>
        
    </div>
</div>

<?php 
if ( have_posts() ) : ?>
<?php if(!isset($_COOKIE['resultsDisplay'])) :
        get_template_part( 'templates-parts/content/content-lokale', 'table' ); 
    else :
        get_template_part( 'templates-parts/content/content-lokale', 'grid' ); 
    endif;
?>
<div class="go-pagination">
    <?php
        global $wp_query;
        $big = 999999999; // Wartość większa niż liczba postów, aby wyświetlić wszystkie strony.
        echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'prev_next' => true,
            'prev_text' => __('« Poprzednia', 'textdomain'),
            'next_text' => __('Następna »', 'textdomain'),
        ));
    ?>
</div>

<?php else :
    echo "<h1 class='text-center'>Nic nie znaleziono</h1> ";
endif;

get_footer(); ?>

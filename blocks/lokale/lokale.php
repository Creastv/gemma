<?php 
$inw = get_field( 'lokale' );

    $grid = array(
        'post_type' => 'lokale',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        // 'orderby' => 'meta_value_num',
        // 'order' => 'DSC',  
        'meta_key'       => 'status', // Klucz pola ACF
        'orderby'        => 'meta_value_num', 
        'order'          => 'ASC', 
        'tax_query' =>  array (
            array(
                'taxonomy' => 'inwestycje',
                'terms' => $inw->slug, 
                'field' => 'slug',
                'operator' => 'IN',
            ),
        ), 
        // 'meta_query'	=> array(
        //     array(
        //         'key'	  	=> 'powierzchnia',
        //         'compare' 	=> '<=',
        //     ),
                       
        // ),
    );
    $postsPerPage = 4;
     $table = array(
        'post_type' => 'lokale',
        'post_status' => 'publish',
        'posts_per_page' => $postsPerPage,
        'meta_key'       => 'status', // Klucz pola ACF
        'orderby'        => 'meta_value_num', 
        'order'          => 'ASC', 
        'tax_query' =>  array (
            array(
                'taxonomy' => 'inwestycje',
                'terms' => $inw->slug, 
                'field' => 'slug',
                'operator' => 'IN',
            ),
        ), 
        // 'meta_query'	=> array(
        //     array(
        //         'key'	  	=> 'powierzchnia',
        //         'compare' 	=> '>=',
        //     ),
                       
        // ),
    );

  if (isset($_COOKIE['resultsDisplay'])) {
    $loop = new WP_Query($table);  
  } else {
    $loop = new WP_Query($grid);  
  }
?>

<div class="search-resoults-info">
    <div class="search-results-count">
        <span> Znaleziono <?php echo $loop->found_posts; ?>  <?php if($loop->found_posts == '1')  { echo 'wynik'; } else if($loop->found_posts >= '1' && $loop->found_posts <= '4' ) { echo 'wyniki'; } else { echo 'wyników'; } ;?> wyszukiwania. </span>
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
<?php if (!isset($_COOKIE['resultsDisplay'])) : ?>

<?php  if($loop->have_posts() ) : ?>
<table id="mieszkania-inw" cellspacing="0" class=" table table-hover" style="width:100%">
    <thead>
         <tr>
            <th></th>
             <th data-priority="2"></th>
            <th data-priority="1">Nazwa i liczba pokoi</th>
            <th data-priority="6">Powierzchnia</th>
            <th data-priority="7">Cena</th>
            <th data-priority="8">Udogodienia</th>
            <th data-priority="5">Status</th>
            <th data-priority="4"></th>
        </tr>
    </thead>
    <tbody>

    <?php while ($loop->have_posts()) : $loop->the_post(); 
            get_template_part( '/templates-parts/content/content-lokale-table-single' );
    endwhile;
    else :
         echo '<h1 class="text-center">Nic nie znaleziono</h1>';
        endif; wp_reset_query();
    ?>
    </tbody>
</table>

<?php else : ?>


<?php if($loop->have_posts() ) : 

    echo '<div id="ajax-posts" class="posts-wraper">';
        while ($loop->have_posts()) : $loop->the_post(); 
            get_template_part( '/templates-parts/content/content-lokale-grid-single' );
        endwhile; 
    echo '</div>';
    
    else :
         echo '<h1 class="text-center">Nic nie znaleziono</h1>';
    endif; wp_reset_query();
?>

<?php if( $loop->found_posts >= 4) { ?>
<?php if ( !is_single('407') ) { ?>        
    <div class="wr-btn">
        <div class="btn" id="more_posts"><span>Wczytaj więcej</span></div>
    </div>
<?php } ?>
 <?php } ?>
<?php endif; ?>


<script>

(function ($) {
    var ppp = 4; // Post per page
    var pageNumber = 1;
    var idd = <?php echo json_encode($inw->slug); ?>;
    var ajaxpagination = "https://gemma.regalestate.pl/wp-admin/admin-ajax.php";
    // var ajaxpagination = "http://localhost/gemma/wp-admin/admin-ajax.php";
    
    function load_posts(){
        pageNumber++;
        var str = '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&idd=' + idd + '&action=more_post_ajax';
        $.ajax({
            type: "POST",
            dataType: "html",
            url: ajaxpagination,
            data: str,
            beforeSend : function () {
                $("#more_posts").hide();
            },
            success: function(data){
                var $data = $(data);
                if($data.length){
                    $("#ajax-posts").append($data);
                    $("#more_posts").attr("disabled",false);
                    $("#more_posts").show();
                } else{
                    $("#more_posts").remove();
                }
            },
            error : function(jqXHR, textStatus, errorThrown) {
                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
        return false;
    }
    jQuery("#more_posts").on("click",function(){ // When btn is pressed.
        jQuery("#more_posts").attr("disabled",true); // Disable the button, temp.
        load_posts();
       
});
})(jQuery);
</script>
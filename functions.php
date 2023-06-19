<?php
add_theme_support('post-thumbnails');
add_image_size( 'licytacja', 220, 220, array( 'center', 'center' ) );
add_image_size( 'post-item', 350, 490, array( 'center', 'center' ) );
add_image_size( 'post', 350, 490,  true );
add_image_size( 'local-table', 120, 120 );
add_image_size( 'galeria', 400, 300, array( 'center', 'center' ) );

if ( ! function_exists( 'go_register_nav_menu' ) ) {
    function go_register_nav_menu(){
        register_nav_menus( array(
            'primary_menu' => __( 'Primary Menu', 'go' ),
        ) );
    }
    add_action( 'after_setup_theme', 'go_register_nav_menu', 0 );
}

require_once get_template_directory() . '/func/enqueue-styles.php';
require_once get_template_directory() . '/func/enqueue-scripts.php';
require get_template_directory() . '/func/clean-up.php';
require get_template_directory() . '/func/cpt.php';
require get_template_directory() . '/func/footer-style.php';
require get_template_directory() . '/blocks/blocks.php';
require get_template_directory() . '/templates-parts/modal/modal-fnc.php';

// gutenberg editor
function add_block_editor_assets(){
  wp_enqueue_style('block_editor_css', get_template_directory_uri().'/src/css/go-admin.min.css');
}
add_action('enqueue_block_editor_assets','add_block_editor_assets',10,0);


// Paginacja
function pagination_bars() {
    global $wp_query;
 
    $total_pages = $wp_query->max_num_pages;
	$big = 999999999; // need an unlikely integer
    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));
		echo paginate_links(array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}

function filter_plugin_updates( $value ) {
	$plugins = array(
	  'advanced-custom-fields-pro/acf.php'
	);
	foreach( $plugins as $plugin ) {
	  if ( isset( $value->response[$plugin] ) ) {
		unset( $value->response[$plugin] );
	  }
	}
	return $value;
}

// Excerpt changing 3 dots
Function new_excerpt_more( $more ) {
	return ' ... ';
}
add_filter('excerpt_more', 'new_excerpt_more');


if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
    'page_title' => 'Gemma settings',
    'menu_title' => 'Gemma settings',
    'parent_slug' => 'themes.php',
  ));
  
}

/// modify the path to the icons directory
add_filter('acf_icon_path_suffix',
  function ( $path_suffix ) {
    return '/src/img/icons/'; // After assets folder you can define folder structure
  }
);

// Zmaina logo wp-login.php
function custom_login_logo() {
    echo '<style type="text/css">
        h1 a {
          background-image: url('.get_stylesheet_directory_uri().'/src/img/logo.png) !important;
          background-size:100%!important;
          width: 165px!important;
         }
    </style>';
}
add_action('login_head', 'custom_login_logo');

// Dodanie zdecia wyrózniającego dla postów w tabeli
add_filter('manage_posts_columns', 'add_img_column');
add_filter('manage_posts_custom_column', 'manage_img_column', 10, 2);
add_filter('manage_pages_custom_column', 'manage_img_column', 10, 2);
  
function add_img_column($columns) {
$columns = array_slice($columns, 0, 1, true) + array("links" => "Image") + array_slice($columns, 1, count($columns) - 1, true);
return $columns;
}
  
function manage_img_column($column_name, $post_id) {
if( $column_name == 'links' ) {
echo get_the_post_thumbnail($post_id, 'thumbnail');
}
return $column_name;
}



function filter_function_name( $query_args, $sfid ) {
  if($sfid==451) {
    if(isset($_COOKIE['resultsDisplay'])) :
    $query_args['posts_per_page'] = -1;
    endif;
    
  }
  return $query_args;
}
add_filter( 'sf_edit_query_args', 'filter_function_name', 20, 2 );



//vbhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh Load more
//wp_localize_script( 'core-js', 'ajax_posts', array(
//	'ajaxurl' => admin_url( 'admin-ajax.php' ),
//));	



function more_post_ajax(){
	$ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 4;
	$page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
	$idd =  (isset($_POST["idd"])) ? $_POST["idd"] : 0;
	$test =  (isset($_POST["test"])) ? $_POST["test"] : 0;
 

	header("Content-Type: text/html");
	$args = array(
		'post_type' => 'lokale',
		'post_status' => 'publish',
		'posts_per_page' => $ppp,
		'paged'    => $page,
		'orderby' => 'meta_value_num',
		'order' => 'ASC',
		// 'tax_query' =>  array (
		//     array(
		//         'taxonomy' => 'inwestycje',
		//         'terms' => $test,
		//         'field' => 'slug',
		//         'operator' => 'IN', 
		//     ),
		// ), 
		// 'meta_query'	=> array(
		// 	array(
		// 		'key'	  	=> 'powierzchnia',
		// 		'compare' 	=> '<=',
		// 	),
		   
		// ),
	);
	$loop = new WP_Query($args);
	$out = '';
	if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();
	  //   $ex = get_field('inwestycja');
		// $out .= 'test';
		// $out .= $ex->slug;
    get_template_part( 'templates-parts/content/content-lokale-grid', 'single' ); 

	endwhile; endif;
	wp_reset_postdata();
	// die($out);
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');


// Dodatkowe ploe selector
function status_metaboks() {
    add_meta_box(
        'stat_metabox',
        'Status mieszkania',
        'status_metabox',
        'page', // Tutaj określ, do jakiego typu zawartości chcesz dodać pole (np. 'page' dla stron)
        'side',
        'high'
    );
}
add_action('add_meta_boxes', 'status_metaboks');

function status_metabox($post) {
    $wartosc = get_post_meta($post->ID, 'status_metabox', true);

    $opcje = array(
        '0' => 'Wolne',
        '1' => 'Wolne',
        '2' => 'Sprzedane',
        '3' => 'Zajęte'
    );
  
    echo '<label for="status_metabox">Dodatkowe pole:</label>';
    echo '<select name="status_metabox" id="status_metabox">';
    foreach ($opcje as $wartosc_opcji => $etykieta_opcji) {
        $selected = ($wartosc == $wartosc_opcji) ? 'selected' : '';
        echo '<option value="' . $wartosc_opcji . '" ' . $selected . '>' . $etykieta_opcji . '</option>';
    }
    echo '</select>';
}

function zapisz_status_metabox_metabox($post_id) {
    if (array_key_exists('status_metabox', $_POST)) {
        update_post_meta($post_id, 'status_metabox', $_POST['status_metabox']);
    }
}
add_action('save_post', 'zapisz_status_metabox_metabox');

// Shortcode
function form_by_status($atts) {
    $atts = shortcode_atts(array(
        'title' => 'Zapytaj o mieskanie',
    ), $atts);
    
    $title = $atts['title'];
    $form_shortcode = '[contact-form-7 id="4346" title="Zapytaj o mieszkanie"]';
    $form_output = do_shortcode($form_shortcode);

    $wartosc = get_post_meta(get_the_ID(), 'status_metabox', true);
    if ($wartosc == '1' ) {
       $output = '<h2>' . esc_html($title) . '</h2>';
       $output .= $form_output;
       return $output;
    }
}
add_shortcode('form_by_status', 'form_by_status');


function status() {
  $wartosc = get_post_meta(get_the_ID(), 'status_metabox', true);
    $class = " ";
    $text = " ";

    if ($wartosc == '0' ) {
      $class = 'stat-none';
    } else if($wartosc == '1') {
      $class = "avaliable";
      $text = "Wolne";
    } else if( $wartosc == '2' ){
       $class = "sold";
       $text = "Sprzedane";
    } else if( $wartosc == '3' ){
       $class = "booked";
       $text = "Zarezerwowane";
    }
    return'<div class="status-label ' . $class . ' "> ' . $text . '</div>';

}
add_shortcode('status', 'status');



function dodaj_dodatkowy_metaboks() {
    add_meta_box(
        'dodatkowy_metaboks',
        'Dodatkowy Metaboks',
        'renderuj_dodatkowy_metaboks',
        'page', // Tutaj określ, do jakiego typu zawartości chcesz dodać metaboks (np. 'page' dla stron)
        'side', // Ustawienie kontekstu na 'side' spowoduje wyświetlenie metaboksu po prawej stronie
        'default'
    );
}
add_action('add_meta_boxes', 'dodaj_dodatkowy_metaboks');

function renderuj_dodatkowy_metaboks($post) {
    $wartosc = get_post_meta($post->ID, 'dodatkowe_pole', true);

    $opcje = array(
        'opcja1' => 'Opcja 1',
        'opcja2' => 'Opcja 2',
        'opcja3' => 'Opcja 3'
    );
   
    echo '<label for="dodatkowe_pole">Dodatkowe pole:</label>';
    echo '<select name="dodatkowe_pole" id="dodatkowe_pole">';
    foreach ($opcje as $wartosc_opcji => $etykieta_opcji) {
        $selected = ($wartosc === $wartosc_opcji) ? 'selected' : '';
        echo '<option value="' . $wartosc_opcji . '" ' . $selected . '>' . $etykieta_opcji . '</option>';
    }
    echo '</select>';
}

function zapisz_dodatkowe_pole($post_id) {
    if (array_key_exists('dodatkowe_pole', $_POST)) {
        update_post_meta($post_id, 'dodatkowe_pole', $_POST['dodatkowe_pole']);
    }
}
add_action('save_post', 'zapisz_dodatkowe_pole');
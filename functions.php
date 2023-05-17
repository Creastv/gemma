<?php
add_theme_support('post-thumbnails');
add_image_size( 'licytacja', 220, 220, array( 'center', 'center' ) );
add_image_size( 'post-item', 350, 490, array( 'center', 'center' ) );
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


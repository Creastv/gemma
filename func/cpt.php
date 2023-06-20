<?php 
//////////////////////////////////////////////////////////////Inwestycje
function go_post_types_inwestycje() {

	$labels = array(
		'name'               => 'Inwestycje',
		'singular_name'      => 'Inwestycje',
		'menu_name'          => 'Inwestycje',
		'name_admin_bar'     => 'Inwestycje',
		'all_items'          => 'Inwestycje',
	);

	$args = array( 
	    'public' => true,
		'has_archive' => false,
		'show_in_rest' => true,
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => false,
		'publicly_queryable' => true,
		'show_in_rest' => true,
		"rewrite"             => array( "slug" => "inwestycje", "with_front" => true ),
		'supports'      => array( 'title', 'page-attributes', 'thumbnail', 'editor', 'excerpt' ),
		// , 'editor' 
	);
    register_post_type( 'inwestycje', $args );

}
add_action( 'init', 'go_post_types_inwestycje' );


//////////////////////////////////////////////////////////////Inwestycje zrealizowane

function go_post_types_inwe() {

	$labels = array(
		'name'               => 'Inwestycje zrealizowane',
		'singular_name'      => 'Inwestycje zrealizowane',
		'menu_name'          => 'Inwestycje zrealizowane',
		'name_admin_bar'     => 'Inwestycje zrealizowane',
		'all_items'          => 'Inwestycje zrealizowane',
	);

	$args = array( 
	    'public' => true,
		'has_archive' => false,
		'show_in_rest' => true,
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => false,
		'publicly_queryable' => true,
		'show_in_rest' => true,
		"rewrite"             => array( "slug" => "inw-zrealizowane", "with_front" => true ),
		'supports'      => array( 'title', 'page-attributes', 'thumbnail', 'editor', 'excerpt' ),
		// , 'editor' 
	);
    register_post_type( 'inw-zrealizowane', $args );

}
add_action( 'init', 'go_post_types_inwe' );





//////////////////////////////////////////////////////////////Inwestycje zrealizowane
function go_post_types_lokale() {

	$labels = array(
		'name'               => 'Lokale',
		'singular_name'      => 'Lokale',
		'menu_name'          => 'Lokale',
		'name_admin_bar'     => 'Lokale',
		'all_items'          => 'Lokale',
	);

	$args = array( 
	    'public' => false,
		'has_archive' => false,
		'show_in_rest' => true,
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'publicly_queryable' => false,
		'show_in_rest' => true,
		"rewrite"             => array( "slug" => "lokale", "with_front" => true ),
		'supports'      => array( 'title', 'thumbnail' ),
		// , 'editor' 
	);
    register_post_type( 'lokale', $args );

}
add_action( 'init', 'go_post_types_lokale' );


add_action( 'init', 'go_taxonomy_typ', 0 );  
function go_taxonomy_typ() {
  $labels = array(
    'name' => _x( 'Typ lokalu', 'go' ),
    'singular_name' => _x( 'Typ lokalu', 'go' ),
    'search_items' =>  __( 'Szukaj Typ' ),
    'all_items' => __( 'Wszystkie Typy' ),
    'menu_name' => __( 'Typ lokalu' ),
  );    
  register_taxonomy('typ-lokalu',array('lokale'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'typ-lokalu' ),
  ));
}


add_action( 'init', 'go_taxonomy_inwestycja', 0 );  
function go_taxonomy_inwestycja() {
  $labels = array(
    'name' => _x( 'Inwestycje', 'go' ),
    'singular_name' => _x( 'Inwestycje', 'go' ),
    'search_items' =>  __( 'Szukaj Typ' ),
    'all_items' => __( 'Wszystkie Typy' ),
    'menu_name' => __( 'Inwestycje' ),
  );    
  register_taxonomy('inwestycje',array('lokale'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'inwestycje' ),
  ));
}

// //////////////////////////////////////////////////////////////Projects
// function go_post_types_projects() {

// 	$labels = array(
// 		'name'               => 'Projects',
// 		'singular_name'      => 'Project',
// 		'menu_name'          => 'Projects',
// 		'name_admin_bar'     => 'Projects',
// 		'all_items'          => 'Projects',
// 	);

// 	$args = array( 
// 	    'public' => true,
// 		'has_archive' => false,
// 		'show_in_rest' => true,
// 		'hierarchical'      => true,
// 		'labels'            => $labels,
// 		'show_ui'           => true,
// 		'show_admin_column' => true,
// 		'query_var'         => true,
// 		'publicly_queryable' => true,
// 		'show_in_rest' => true,
// 		"rewrite"             => array( "slug" => "Projects", "with_front" => true ),
// 		'supports'      => array( 'title', 'page-attributes', 'thumbnail', 'editor' ),
// 		// , 'editor' 
// 	);
//     register_post_type( 'projects', $args );

// }
// add_action( 'init', 'go_post_types_projects' );

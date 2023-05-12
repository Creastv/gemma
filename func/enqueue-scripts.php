<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function enqueue_scripts() {
	
	wp_enqueue_script('cr-datatable', 'https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js',  array(), '201304510', true );
	wp_enqueue_script('cr-datatableresponsive', 'https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js',  array(), '201304510', true );
	wp_enqueue_script( 'go-lokale-table', get_template_directory_uri() . '/src/js/go-datatable.js', array(), '20130459', true );


     wp_enqueue_script( 'go-cookies', get_template_directory_uri() . '/src/js/go-cookies.js', array(), '20130478', true );
	wp_enqueue_script('go-main', get_template_directory_uri().'/src/js/go-main.js', array( 'jquery' ),'3', true );
	wp_enqueue_script('go-modal', get_template_directory_uri().'/templates-parts/modal/modal.js', array( 'jquery' ),'2', true );
}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

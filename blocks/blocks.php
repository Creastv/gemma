<?php
function register_acf_block_types() {

    acf_register_block_type(array(
        'name'              => 'posts',
        'title'             => __('Typy postów'),
        'render_template'   => 'blocks/posts/posts.php',
        'category'          => 'formatting',
        'icon' => array(
          'background' => '#122b4f',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview', 
      'keywords'          => array( 'Posts' ),
      'supports' => array( 'align' =>false ),
      'enqueue_assets'    => function(){
          wp_enqueue_style( 'go-posts',  get_template_directory_uri() . '/blocks/posts/posts.min.css' );
      },
    ));

    acf_register_block_type(array(
        'name'              => 'slider',
        'title'             => __('Slider'),
        'render_template'   => 'blocks/slider/slider.php',
        'category'          => 'formatting',
        'icon' => array(
          'background' => '#122b4f',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview', 
      'keywords'          => array( 'slider' ),
      'supports' => array( 'align' =>false ),
      'enqueue_assets'    => function(){
          wp_enqueue_style( 'go-slider',  get_template_directory_uri() . '/blocks/slider/slider.min.css' );
          wp_enqueue_style( 'ra_svipeer_css', 'https://unpkg.com/swiper/swiper-bundle.min.css' );
          wp_enqueue_script('ra-swiper_js', 'https://unpkg.com/swiper/swiper-bundle.min.js',  array(), '20130456', true );
          wp_enqueue_script('go-slider-init', get_template_directory_uri() . '/blocks/slider/slider.js', array( 'jquery' ),'4', true );
      },
    ));
    acf_register_block_type(array(
        'name'              => 'slider-post',
        'title'             => __('Slider post'),
        'render_template'   => 'blocks/slider-post/slider-post.php',
        'category'          => 'formatting',
        'icon' => array(
          'background' => '#122b4f',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
      'mode'            => 'preview', 
      'keywords'          => array( 'slider-post' ),
      'supports' => array( 'align' =>false ),
      'enqueue_assets'    => function(){
          wp_enqueue_style( 'go-slider-post',  get_template_directory_uri() . '/blocks/slider-post/slider-post.min.css' );
          wp_enqueue_style( 'ra_svipeer_css', 'https://unpkg.com/swiper/swiper-bundle.min.css' );
          wp_enqueue_script('ra-swiper_js', 'https://unpkg.com/swiper/swiper-bundle.min.js',  array(), '20130456', true );
          wp_enqueue_script('go-carousel-init', get_template_directory_uri() . '/blocks/slider-post/slider-post.js', array( 'jquery' ),'4', true );
      },
    ));
    acf_register_block_type(array(
        'name'              => 'container',
        'title'             => __('Kontener'),
        'render_template'   => 'blocks/container/container.php',
        'category'          => 'formatting',
        'icon' => array(
          'background' => '#122b4f',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
        'mode'            => 'preview', 
        'keywords'          => array( 'container' ),
        'supports'		=> [
            'align'			=> false,
            'anchor'		=> false,
            'customClassName'	=> true,
            'jsx' 			=> true,
          ],
        'enqueue_assets'    => function(){
            wp_enqueue_style( 'go-container',  get_template_directory_uri() . '/blocks/container/container.min.css' );
        },
    ));
    acf_register_block_type(array(
        'name'              => 'header',
        'title'             => __('Header'),
        'render_template'   => 'blocks/header/header.php',
        'category'          => 'formatting',
        'icon' => array(
          'background' => '#122b4f',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
        'mode'            => 'preview', 
        'keywords'          => array( 'header' ),
        'supports'		=> [
            'align'			=> false,
            'anchor'		=> false,
            'customClassName'	=> true,
            'jsx' 			=> true,
          ],
        'enqueue_assets'    => function(){
            wp_enqueue_style( 'go-header',  get_template_directory_uri() . '/blocks/header/header.min.css' );
        },
    ));
     acf_register_block_type(array(
        'name'              => 'btn',
        'title'             => __('Button'),
        'render_template'   => 'blocks/btn/btn.php',
        'category'          => 'formatting',
        'icon' => array(
          'background' => '#122b4f',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
        'mode'            => 'preview', 
        'keywords'          => array( 'Button' ),
        'supports'		=> [
            'align'			=> true,
            'anchor'		=> false,
            'customClassName'	=> false,
            'jsx' 			=> false,
          ],
        'enqueue_assets'    => function(){
            wp_enqueue_style( 'go-btn',  get_template_directory_uri() . '/blocks/btn/btn.min.css' );
        },
    ));

    acf_register_block_type(array(
        'name'              => 'makieta',
        'title'             => __('Makieta'),
        'render_template'   => 'blocks/makieta/makieta.php',
        'category'          => 'formatting',
        'icon' => array(
          'background' => '#122b4f',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
        'mode'            => 'preview', 
        'keywords'          => array( 'makieta' ),
        'supports'		=> [
            'align'			=> false,
            'anchor'		=> false,
            'customClassName'	=> false,
            'jsx' 			=> true,
          ],
        'enqueue_assets'    => function(){
           wp_enqueue_style( 'go-makieta',  get_template_directory_uri() . '/blocks/makieta/makieta.min.css' );
          wp_enqueue_script( 'go-maplight', get_template_directory_uri() . '/src/js/jquery.maphilight.js', array(), '20130478', true );
	        wp_enqueue_script( 'go-responsive', get_template_directory_uri() . '/src/js/jquery.rwdImageMaps.js', array(), '20130478', true );
          wp_enqueue_script('go-makieta-init', get_template_directory_uri().'/blocks/makieta/makieta.js', array( 'jquery' ),'4', true );
         
        },
    ));
    acf_register_block_type(array(
        'name'              => 'badge',
        'title'             => __('Badge'),
        'render_template'   => 'blocks/badge/badge.php',
        'category'          => 'formatting',
        'icon' => array(
          'background' => '#122b4f',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
        'mode'            => 'preview', 
        'keywords'          => array( 'badge' ),
        'supports'		=> [
            'align'			=> false,
            'anchor'		=> false,
            'customClassName'	=> false,
            'jsx' 			=> true,
          ],
        'enqueue_assets'    => function(){
            wp_enqueue_style( 'go-badge',  get_template_directory_uri() . '/blocks/badge/badge.min.css' );
        },
    ));

    acf_register_block_type(array(
        'name'              => 'lokalizacja',
        'title'             => __('Lokalizacja'),
        'render_template'   => 'blocks/lokalizacja/lokalizacja.php',
        'category'          => 'formatting',
        'icon' => array(
          'background' => '#122b4f',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
        'mode'            => 'preview', 
        'keywords'          => array( 'lokalizacja' ),
        'supports'		=> [
            'align'			=> false,
            'anchor'		=> false,
            'customClassName'	=> false,
            'jsx' 			=> true,
          ],
        'enqueue_assets'    => function(){
            wp_enqueue_style( 'go-lokalizacja',  get_template_directory_uri() . '/blocks/lokalizacja/lokalizacja.min.css' );
        },
    ));

    acf_register_block_type(array(
        'name'              => 'map',
        'title'             => __('Mapa'),
        'render_template'   => 'blocks/map/map.php',
        'category'          => 'formatting',
        'icon' => array(
          'background' => '#122b4f',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
        'mode'            => 'preview', 
        'keywords'          => array( 'map' ),
        'supports'		=> [
            'align'			=> false,
            'anchor'		=> false,
            'customClassName'	=> false,
            'jsx' 			=> true,
          ],
        'enqueue_assets'    => function(){
          if ( ! is_admin() ) {
             wp_enqueue_script( 'go-map-markerclusterer', 'https://cdnjs.cloudflare.com/ajax/libs/js-marker-clusterer/1.0.0/markerclusterer.js', array(), '20130459', true );
          wp_enqueue_script( 'go-map', get_template_directory_uri() . '/blocks/map/map.js', array(), '20130459', true );
          
          
          }
            wp_enqueue_style( 'go-map',  get_template_directory_uri() . '/blocks/map/map.min.css' );
        },
    ));

    acf_register_block_type(array(
        'name'              => 'kontakt',
        'title'             => __('Kontakt kredyt'),
        'render_template'   => 'blocks/kontakt/kontakt.php',
        'category'          => 'formatting',
        'icon' => array(
          'background' => '#122b4f',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
        'mode'            => 'preview', 
        'keywords'          => array( 'kontakt' ),
        'supports'		=> [
            'align'			=> false,
            'anchor'		=> false,
            'customClassName'	=> false,
            'jsx' 			=> true,
          ],
        'enqueue_assets'    => function(){
            wp_enqueue_style( 'go-kontakt',  get_template_directory_uri() . '/blocks/kontakt/kontakt.min.css' );
        },
    ));
    acf_register_block_type(array(
        'name'              => 'przebieg',
        'title'             => __('Przebieg'),
        'render_template'   => 'blocks/przebieg/przebieg.php',
        'category'          => 'formatting',
        'icon' => array(
          'background' => '#122b4f',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
        'mode'            => 'preview', 
        'keywords'          => array( 'przebieg' ),
        'supports'		=> [
            'align'			=> false,
            'anchor'		=> false,
            'customClassName'	=> false,
            'jsx' 			=> true,
          ],
        'enqueue_assets'    => function(){
          if ( ! is_admin() ) {
          wp_enqueue_script( 'go-przebieg', get_template_directory_uri() . '/blocks/przebieg/przebieg.js', array(), '20130459', true );
          }
          wp_enqueue_style( 'go-przebieg',  get_template_directory_uri() . '/blocks/przebieg/przebieg.min.css' );
        },
    ));

    acf_register_block_type(array(
        'name'              => 'lokale',
        'title'             => __('Lokale'),
        'render_template'   => 'blocks/lokale/lokale.php',
        'category'          => 'formatting',
        'icon' => array(
          'background' => '#122b4f',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
        'mode'            => 'preview', 
        'keywords'          => array( 'lokale' ),
        'supports'		=> [
            'align'			=> false,
            'anchor'		=> false,
            'customClassName'	=> false,
            'jsx' 			=> true,
          ],
        'enqueue_assets'    => function(){
          wp_enqueue_script('cr-datatable', 'https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js',  array(), '201304510', true );
          wp_enqueue_script('cr-datatableresponsive', 'https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js',  array(), '201304510', true );
          wp_enqueue_script( 'go-lokale-table', get_template_directory_uri() . '/src/js/go-datatable.js', array(), '20130459', true );
          wp_enqueue_script('go-lokale-init', get_template_directory_uri().'/blocks/lokale/lokale.js', array( 'jquery' ),'4', true );
          wp_enqueue_style( 'go-lokale',  get_template_directory_uri() . '/blocks/lokale/lokale.min.css' );
        },
    ));
    acf_register_block_type(array(
        'name'              => 'galeria',
        'title'             => __('Galeria slider'),
        'render_template'   => 'blocks/galeria/galeria.php',
        'category'          => 'formatting',
        'icon' => array(
          'background' => '#122b4f',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
        'mode'            => 'preview', 
        'keywords'          => array( 'galeria' ),
        'supports'		=> [
            'align'			=> false,
            'anchor'		=> false,
            'customClassName'	=> false,
            'jsx' 			=> true,
          ],
        'enqueue_assets'    => function(){
             wp_enqueue_script('go-galeria-fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js', array( 'jquery' ),'4', true );
          wp_enqueue_style( 'ra_svipeer_css', 'https://unpkg.com/swiper/swiper-bundle.min.css' );
          wp_enqueue_script('ra-swiper_js', 'https://unpkg.com/swiper/swiper-bundle.min.js',  array(), '20130456', true );
           wp_enqueue_script('go-galeria-init', get_template_directory_uri().'/blocks/galeria/galeria-slider.js', array( 'jquery' ),'4', true );
          wp_enqueue_style( 'go-fancybox',  'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css' );
          wp_enqueue_style( 'go-tab-galeria',  get_template_directory_uri() . '/blocks/galeria/galeria.min.css' );

        },
    ));
       acf_register_block_type(array(
      'name'              => 'anchor',
      'title'             => __('Anchor'),
      'render_template'   => 'blocks/anchor/anchor.php',
      'category'          => 'formatting',
      'icon' => array(
        'background' => '#122b4f',
        'foreground' => '#fff',
        'src' => 'ellipsis',
      ),
      'mode'            => 'preview', 
      'keywords'          => array( 'anchor' ),
    ));
    acf_register_block_type(array(
        'name'              => 'tab_galeria',
        'title'             => __('Tab galeria'),
        'render_template'   => 'blocks/galeria/tab-galeria.php',
        'category'          => 'formatting',
        'icon' => array(
          'background' => '#122b4f',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
        'mode'            => 'preview', 
        'keywords'          => array( 'tab-galeria' ),
        'supports'		=> [
            'align'			=> false,
            'anchor'		=> false,
            'customClassName'	=> false,
            'jsx' 			=> true,
          ],
        'enqueue_assets'    => function(){
            if ( ! is_admin() ) {
          wp_enqueue_script('go-galeria-fancybox', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js', array( 'jquery' ),'4', true );
          wp_enqueue_style( 'ra_svipeer_css', 'https://unpkg.com/swiper/swiper-bundle.min.css' );
          wp_enqueue_script('ra-swiper_js', 'https://unpkg.com/swiper/swiper-bundle.min.js',  array(), '20130456', true );
           wp_enqueue_script('go-galeria-init', get_template_directory_uri().'/blocks/galeria/tab-galeria.js', array( 'jquery' ),'4', true );
            }
           wp_enqueue_style( 'go-fancybox',  'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css' );
          wp_enqueue_style( 'go-tab-galeria',  get_template_directory_uri() . '/blocks/galeria/galeria.min.css' );
        },
    ));
    acf_register_block_type(array(
        'name'              => 'etapy',
        'title'             => __('Etapy budowy'),
        'render_template'   => 'blocks/etapy/etapy.php',
        'category'          => 'formatting',
        'icon' => array(
          'background' => '#122b4f',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
        'mode'            => 'preview', 
        'keywords'          => array( 'etapy' ),
        'supports'		=> [
            'align'			=> false,
            'anchor'		=> false,
            'customClassName'	=> false,
            'jsx' 			=> true,
          ],
        'enqueue_assets'    => function(){
            wp_enqueue_style( 'go-etapy',  get_template_directory_uri() . '/blocks/etapy/etapy.min.css' );
        },
    ));
    acf_register_block_type(array(
        'name'              => 'kroki',
        'title'             => __('Kroki'),
        'render_template'   => 'blocks/kroki/kroki.php',
        'category'          => 'formatting',
        'icon' => array(
          'background' => '#122b4f',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
        'mode'            => 'preview', 
        'keywords'          => array( 'kroki' ),
        'supports'		=> [
            'align'			=> false,
            'anchor'		=> false,
            'customClassName'	=> false,
            'jsx' 			=> true,
          ],
        'enqueue_assets'    => function(){
           wp_enqueue_script( 'go-kroki', get_template_directory_uri() . '/blocks/kroki/kroki.js', array(), '20130459', true );
            wp_enqueue_style( 'go-kroki',  get_template_directory_uri() . '/blocks/kroki/kroki.min.css' );
        },
    ));

    acf_register_block_type(array(
        'name'              => 'bullets',
        'title'             => __('Bullets'),
        'render_template'   => 'blocks/bullets/bullets.php',
        'category'          => 'formatting',
        'icon' => array(
          'background' => '#122b4f',
          'foreground' => '#fff',
          'src' => 'ellipsis',
        ),
        'mode'            => 'preview', 
        'keywords'          => array( 'bullets' ),
        'supports'		=> [
            'align'			=> true,
            'anchor'		=> false,
            'customClassName'	=> true,
            'jsx' 			=> true,
          ],
        'enqueue_assets'    => function(){
            wp_enqueue_style( 'go-bullets',  get_template_directory_uri() . '/blocks/bullets/bullets.min.css' );
        },
    ));
    //  acf_register_block_type(array(
    //     'name'              => 'list',
    //     'title'             => __('List'),
    //     'render_template'   => 'blocks/list/block-list.php',
    //     'category'          => 'formatting',
    //     'icon' => array(
    //       'background' => '#122b4f',
    //       'foreground' => '#fff',
    //       'src' => 'ellipsis',
    //     ),
    //   'mode'            => 'preview', 
    //   'keywords'          => array( 'list' ),
    //   'supports' => array( 'align' =>false ),
    //   'enqueue_assets'    => function(){
    //       wp_enqueue_style( 'go-list',  get_template_directory_uri() . '/blocks/list/list.min.css' );
    //       wp_enqueue_script('go-list-cdn', '//cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js', array( 'jquery' ),'4', true );
    //        wp_enqueue_script('go-list', get_template_directory_uri().'/blocks/list/list.js', array( 'jquery' ),'4', true );
    //   },
    // ));
}
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}

add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {
    // Update path
    $path = get_template_directory() . '/blocks/acf-json';
    // Return path
    return $path;
}


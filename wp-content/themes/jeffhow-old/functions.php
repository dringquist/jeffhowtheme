<?php

/**
 * Register and enqueue CSS
 */
function jeffhow_styles_setup(){
    // Register all styles
    wp_register_style(
        'jeffhow',  // $handle
        get_stylesheet_uri(),  // $src
        array(),  // $deps
        '1.0.0',  // $vers
        'all'  // $media
    );
    
    wp_register_style(
        'jeffhow-stylesheet',  // $handle
        get_template_directory_uri() . '/css/jeffhow.css',  // $src
        array(),  // $deps
        '1.0.0',  // $vers
        'all'  // $media
    );
    
    wp_register_style(
        'bootstrap',  // $handle
        get_template_directory_uri() . '/css/bootstrap.min.css',  // $src
        array(),  // $deps
        '3.3.7',  // $vers
        'all'  // $media
    );
    
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('jeffhow');
    wp_enqueue_style('jeffhow-stylesheet');
    
    // enqueue Google Web Fonts
    wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,700|Oswald:300|Poppins:700');
}

add_action('wp_enqueue_scripts', 'jeffhow_styles_setup');

/**
 * Register and enqueue JS
 */
function jeffhow_scripts_setup(){    
    // Register JS
    wp_register_script(
        'jeffhow-js',  // $handle
        get_template_directory_uri() . '/js/jeffhow.js',  // $src
        array('jquery'),  // $deps
        '1.0.0',  // $vers
        true  // $in_footer
    );

    wp_register_script(
        'bootstrap-js',  // $handle
        get_template_directory_uri() . '/js/bootstrap.min.js',  // $src
        array('jquery'),  // $deps
        '3.3.7',  // $vers
        true  // $in_footer
    );
    
    wp_register_script(
        'jQuery-ui-js',  // $handle
        get_template_directory_uri() . '/js/jquery-ui.min.js',  // $src
        array('jquery'),  // $deps
        '1.12.1',  // $vers
        true  // $in_footer
    );
    
    wp_enqueue_script('jeffhow-js');
    wp_enqueue_script('bootstrap-js');
    wp_enqueue_script('jQuery-ui-js');
}

add_action( 'wp_enqueue_scripts', 'jeffhow_scripts_setup' );

/**
 * Add theme support
 */
function jeffhow_theme_support(){
    // Add menu support
    // add_theme_support( 'menus' ); // Not necessary with register_nav_support
    register_nav_menu( 'primary','Primary Navigation Menu' );
    register_nav_menu( 'secondary','Secondary Navigation Menu' );
    
    // Add title-tag support
    add_theme_support( 'title-tag' );
    
    /**
     * Add custom header support
     * Note: args define recomended width/height for images
     * Hooks found in 'header.php'
     */
    add_theme_support( 'custom-header', array( 'width' => 1460, 'height' => 220 ) );
    
    /**
     * Add post-format support
     * Note: Array defines post-templates found in 'post-template' dir
     */
    add_theme_support( 'post-formats' , array( 'aside', 'image', 'video', 'gallery' ) );
    
    // Other theme support
    add_theme_support( 'custom-background' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
}

add_action( 'after_setup_theme', 'jeffhow_theme_support' );

/**
 * Register sidebar and other widgets
 */
function jeffhow_widget_setup(){
    register_sidebar(
        array(
            'name' => 'sidebar',
            'id' => 'sidebar-1',
            'class' => 'custom',
            'description' => 'Standard Sidebar. Drag widgets into this sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        	'after_widget'  => '</aside>',
        	'before_title'  => '<h2 class="widget-title">',
        	'after_title'   => '</h2>' 
        )
    );
}

add_action( 'widgets_init' , 'jeffhow_widget_setup' );

/**
 * Custom pagination for blog, category archives, and search page
 * for more info see: https://codex.wordpress.org/Pagination
 */
function jeffhow_post_queries( $query ) {
  // do not alter the query on wp-admin pages and only alter it if it's the main query
  if (!is_admin() && $query->is_main_query()){

    // alter the query for the home and category pages 

    if(is_home()){
      $query->set('posts_per_page', 5);
    }

    if(is_category()){
      $query->set('posts_per_page', 5);
    }
    
    if(is_search()){
      $query->set('posts_per_page', 5);
    }

  }
}
add_action( 'pre_get_posts', 'jeffhow_post_queries' );

/**
 * Exclude posts categorized as "Courses" from the blog page
 */
function excludeCat($query) {
    if ( $query->is_home ) {
        $query->set('cat', '-7'); // Courses = ID 7
    }
    return $query;
}
add_filter('pre_get_posts', 'excludeCat');

// Register Custom Navigation Walker
require_once( get_template_directory().'/inc/wp_bootstrap_navwalker.php' );

// Adds search box to end of navbar
add_filter( 'wp_nav_menu_items','add_search_box', 10, 2 );
function add_search_box( $items, $args ) {
    $items .= '<li>' . get_search_form( false ) . '</li>';
    return $items;
}

add_filter( 'the_content', 'my_aside_to_infinity_and_beyond', 9 ); // run before wpautop

// Adds infinity symbol and permalink to end of aside content.
function my_aside_to_infinity_and_beyond( $content ) {

	if ( has_post_format( 'aside' ) && !is_singular() )
		$content .= ' <a href="' . get_permalink() . '">&#8734;</a>';

	return $content;
}

?>
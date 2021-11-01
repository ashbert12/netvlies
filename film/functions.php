<?php
function add_menu(){
	$nav = array(
    	'menu-1' => 'Primary Menu');
    register_nav_menus($nav);
}
add_action('init', 'add_menu'); 

function theme_support(){
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
}
add_action('after_setup_theme', 'theme_support');

function my_custom_theme_sidebar() {
    register_sidebar( array(
        'name' => __( 'Primary Sidebar'),
        'id'   => 'sidebar-1',
    ) );
}
add_action( 'widgets_init', 'my_custom_theme_sidebar' );

function register_styles() {
    wp_enqueue_style( 'bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" );
    wp_enqueue_style( 'mystyle', get_template_directory_uri(). "/style.css" );
    
}
add_action( 'wp_enqueue_scripts', 'register_styles' );

function register_scripts() {
    wp_enqueue_script( 'bootstrap-popper', "https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js", array(), null, true );
    wp_enqueue_script( 'bootstrap-js', "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js", array(), null, true );
    
}
add_action( 'wp_enqueue_scripts', 'register_scripts' );

// Our custom post type function
function create_posttype() {
 
    // CPT Options
        $labels = array(
        'name'                => _x( 'Movies', 'Post Type General Name'),
        'singular_name'       => _x( 'Movie', 'Post Type Singular Name'),
        'menu_name'           => __( 'Movies'),
        'parent_item_colon'   => __( 'Parent Movie'),
        'all_items'           => __( 'All Movies'),
        'view_item'           => __( 'View Movie'),
        'add_new_item'        => __( 'Add New Movie'),
        'add_new'             => __( 'Add New'),
        'edit_item'           => __( 'Edit Movie'),
        'update_item'         => __( 'Update Movie'),
        'search_items'        => __( 'Search Movie'),
        'not_found'           => __( 'Not Found'),
        'not_found_in_trash'  => __( 'Not found in Trash'),
    );
         $args = array(
        'label'               => __( 'movies'),
        'description'         => __( 'Movie news and reviews'),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genre' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
 
    );
    //register_taxonomy('genre', 'movies', $args);
    // Registering your Custom Post Type
    register_post_type( 'movies', $args );
    
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype', 0);

function create_genre_taxonomy() {
 
// Labels part for the GUI
  $labels = array(
    'name' => _x( 'Genres', 'taxonomy general name' ),
    'singular_name' => _x( 'Genre', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Genre' ),
    'popular_items' => __( 'Popular Genre' ),
    'all_items' => __( 'All Genre' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Genre' ), 
    'update_item' => __( 'Update Genre' ),
    'add_new_item' => __( 'Add New Genre' ),
    'new_item_name' => __( 'New Genre Name' ),
    'separate_items_with_commas' => __( 'Separate genres with commas' ),
    'add_or_remove_items' => __( 'Add or remove genres' ),
    'choose_from_most_used' => __( 'Choose from the most used genres' ),
    'menu_name' => __( 'Genres' ),
  ); 
 
// Now register the non-hierarchical taxonomy like tag
 
  register_taxonomy('genres','movies',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'genre' ),
  ));
}
add_action( 'init', 'create_genre_taxonomy', 0);

add_filter('show_admin_bar', '__return_false');
?>
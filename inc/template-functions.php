<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package lafabriquedeblogs
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function lafabriquedeblogs_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'lafabriquedeblogs_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function lafabriquedeblogs_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'lafabriquedeblogs_pingback_header' );

// Register Custom Post Type
function register_realisation_cpt() {

	$labels = array(
		'name'                  => _x( 'Réalisations', 'Post Type General Name', 'lafabriquedeblogs' ),
		'singular_name'         => _x( 'Réalisation', 'Post Type Singular Name', 'lafabriquedeblogs' ),
		'menu_name'             => __( 'Réalisations', 'lafabriquedeblogs' ),
		'name_admin_bar'        => __( 'Réalisations', 'lafabriquedeblogs' ),
		'archives'              => __( 'Item Archives', 'lafabriquedeblogs' ),
		'attributes'            => __( 'Item Attributes', 'lafabriquedeblogs' ),
		'parent_item_colon'     => __( 'Parent Item:', 'lafabriquedeblogs' ),
		'all_items'             => __( 'All Items', 'lafabriquedeblogs' ),
		'add_new_item'          => __( 'Add New Item', 'lafabriquedeblogs' ),
		'add_new'               => __( 'Add New', 'lafabriquedeblogs' ),
		'new_item'              => __( 'New Item', 'lafabriquedeblogs' ),
		'edit_item'             => __( 'Edit Item', 'lafabriquedeblogs' ),
		'update_item'           => __( 'Update Item', 'lafabriquedeblogs' ),
		'view_item'             => __( 'View Item', 'lafabriquedeblogs' ),
		'view_items'            => __( 'View Items', 'lafabriquedeblogs' ),
		'search_items'          => __( 'Search Item', 'lafabriquedeblogs' ),
		'not_found'             => __( 'Not found', 'lafabriquedeblogs' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'lafabriquedeblogs' ),
		'featured_image'        => __( 'Featured Image', 'lafabriquedeblogs' ),
		'set_featured_image'    => __( 'Set featured image', 'lafabriquedeblogs' ),
		'remove_featured_image' => __( 'Remove featured image', 'lafabriquedeblogs' ),
		'use_featured_image'    => __( 'Use as featured image', 'lafabriquedeblogs' ),
		'insert_into_item'      => __( 'Insert into item', 'lafabriquedeblogs' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'lafabriquedeblogs' ),
		'items_list'            => __( 'Items list', 'lafabriquedeblogs' ),
		'items_list_navigation' => __( 'Items list navigation', 'lafabriquedeblogs' ),
		'filter_items_list'     => __( 'Filter items list', 'lafabriquedeblogs' ),
	);
	$args = array(
		'label'                 => __( 'Réalisation', 'lafabriquedeblogs' ),
		'description'           => __( 'Réalisations de la Fabrique de blogs', 'lafabriquedeblogs' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'cat_realisation', 'type_de_service' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-media-document',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'realisations', $args );

}
add_action( 'init', 'register_realisation_cpt', 0 );

// Register Custom Taxonomy
function cat_realisation_tax() {

	$labels = array(
		'name'                       => _x( 'Types de sites', 'Taxonomy General Name', 'lafabriquedeblogs' ),
		'singular_name'              => _x( 'Type de site', 'Taxonomy Singular Name', 'lafabriquedeblogs' ),
		'menu_name'                  => __( 'Types de sites', 'lafabriquedeblogs' ),
		'all_items'                  => __( 'All Items', 'lafabriquedeblogs' ),
		'parent_item'                => __( 'Parent Item', 'lafabriquedeblogs' ),
		'parent_item_colon'          => __( 'Parent Item:', 'lafabriquedeblogs' ),
		'new_item_name'              => __( 'New Item Name', 'lafabriquedeblogs' ),
		'add_new_item'               => __( 'Add New Item', 'lafabriquedeblogs' ),
		'edit_item'                  => __( 'Edit Item', 'lafabriquedeblogs' ),
		'update_item'                => __( 'Update Item', 'lafabriquedeblogs' ),
		'view_item'                  => __( 'View Item', 'lafabriquedeblogs' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'lafabriquedeblogs' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'lafabriquedeblogs' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'lafabriquedeblogs' ),
		'popular_items'              => __( 'Popular Items', 'lafabriquedeblogs' ),
		'search_items'               => __( 'Search Items', 'lafabriquedeblogs' ),
		'not_found'                  => __( 'Not Found', 'lafabriquedeblogs' ),
		'no_terms'                   => __( 'No items', 'lafabriquedeblogs' ),
		'items_list'                 => __( 'Items list', 'lafabriquedeblogs' ),
		'items_list_navigation'      => __( 'Items list navigation', 'lafabriquedeblogs' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'cat_realisation', array( 'realisations' ), $args );

}
add_action( 'init', 'cat_realisation_tax', 0 );

// Register Custom Taxonomy
function service_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Types de services', 'Taxonomy General Name', 'lafabriquedeblogs' ),
		'singular_name'              => _x( 'Type de service', 'Taxonomy Singular Name', 'lafabriquedeblogs' ),
		'menu_name'                  => __( 'Types de services', 'lafabriquedeblogs' ),
		'all_items'                  => __( 'All Items', 'lafabriquedeblogs' ),
		'parent_item'                => __( 'Parent Item', 'lafabriquedeblogs' ),
		'parent_item_colon'          => __( 'Parent Item:', 'lafabriquedeblogs' ),
		'new_item_name'              => __( 'New Item Name', 'lafabriquedeblogs' ),
		'add_new_item'               => __( 'Add New Item', 'lafabriquedeblogs' ),
		'edit_item'                  => __( 'Edit Item', 'lafabriquedeblogs' ),
		'update_item'                => __( 'Update Item', 'lafabriquedeblogs' ),
		'view_item'                  => __( 'View Item', 'lafabriquedeblogs' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'lafabriquedeblogs' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'lafabriquedeblogs' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'lafabriquedeblogs' ),
		'popular_items'              => __( 'Popular Items', 'lafabriquedeblogs' ),
		'search_items'               => __( 'Search Items', 'lafabriquedeblogs' ),
		'not_found'                  => __( 'Not Found', 'lafabriquedeblogs' ),
		'no_terms'                   => __( 'No items', 'lafabriquedeblogs' ),
		'items_list'                 => __( 'Items list', 'lafabriquedeblogs' ),
		'items_list_navigation'      => __( 'Items list navigation', 'lafabriquedeblogs' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'type_de_service', array( 'realisations' ), $args );

}
add_action( 'init', 'service_taxonomy', 0 );

if( function_exists('acf_add_options_page') ) {
	//options-general.php  
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Realisations page d\'accueil',
		'menu_title'	=> 'Realisations accueil',
		'parent_slug'	=> 'options-general.php',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Services page d\'accueil',
		'menu_title'	=> 'Services accueil',
		'parent_slug'	=> 'options-general.php',
	));
	
}

add_action( 'template_redirect', 'subscription_redirect_post' );

function subscription_redirect_post() {
  $queried_post_type = get_query_var('post_type');
  if ( is_single() && 'realisations' ==  $queried_post_type ) {
    wp_redirect( 'https://lafabriquedeblogs.com/realisations/', 301 );
    exit;
  }
}
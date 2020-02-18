<?php

/**
 * Register the block once ACF has initialized
 */
add_action( 'acf/init', 'acf_init_lfdb_last_block' );

function acf_init_lfdb_last_block() {
 	// check function exists
	if ( function_exists( 'acf_register_block' ) ) {
 		
 		acf_register_block( [
			'name'            => 'lfdb-last-block',
			'title'           => __( 'Block plein largeur service', MYDOMAIN ),
			'description'     => __( 'Block pleine largeur', MYDOMAIN ),
			'render_callback' => 'acf_lfdb_last_block_callback',
			'category'        => 'common',
			'icon'            => 'admin-comments',
			'keywords'        => [ 'bouton', 'lfdb'],
		] );
				
	}
 }
 /**
 * Render Callback for the block. This is what is output in the Theme AND
 * in the preview within Gutenberg
 *
 * @param $block
 */
function acf_lfdb_last_block_callback( $block ) {
	$slug = str_replace('acf/', '', $block['name']);
	// include a template part from within the "template-parts/block" folder
	$file = STYLESHEETPATH . "/lfdb-blocks/content-{$slug}.php";
	
	if( file_exists( $file ) ) {
		include( $file );
	}

} 

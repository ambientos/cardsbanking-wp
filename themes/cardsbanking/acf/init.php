<?php

/**
 * Add Options page
 */

function cb_register_acf_options_pages(){
	if ( ! function_exists('acf_add_options_page') ) {
		return;
	}

	acf_add_options_page( array(
		'page_title'  => __( 'Additional Options', 'cardsbanking' ),
		'menu_title'  => __( 'Additional Options', 'cardsbanking' ),
		'menu_slug'   => 'addict-options',
		'parent_slug' => 'themes.php',
	));
}

add_action('acf/init', 'cb_register_acf_options_pages');
<?php

/**
 * Theme Setup
 */

function cb_setup() {
	load_theme_textdomain( 'cardsbanking', get_stylesheet_directory() . '/languages' );

	register_nav_menus( array(
		'cb_header_menu' => __( 'Header Menu', 'cardsbanking' ),
	) );
}

add_action( 'after_setup_theme', 'cb_setup' );


/**
 * Init hook
 */

function cb_init() {
	/**
	 * Remove actions
	 */
	
	$remove_actions = array(
		// admin
		array('wp_before_admin_bar_render', 'wps_admin_bar'),
		array('wp_before_admin_bar_render', 'wp_admin_bar_support'),
		array('admin_footer_text', 'change_admin_footer'),
		array('wp_dashboard_setup', 'example_add_dashboard_widgets'),

		// styles
		array('wp_head', 'root_customizer_css'),
	);

	foreach ($remove_actions as $remove_action) {
		remove_action( $remove_action[0], $remove_action[1] );
	}

	/**
	 * Remove filters
	 */
	
	$remove_filters = array(
		array('wp_nav_menu', 'remove_current_links_from_menu', PHP_INT_MAX, 2),
	);

	foreach ($remove_filters as $remove_filter) {
		remove_filter( $remove_filter[0], $remove_filter[1], $remove_filter[2], $remove_filter[3] );
	}
}

add_action( 'init', 'cb_init' );


/**
 * Remove styles from parent theme and plugins
 */
	
function cb_remove_styles_scripts() {
	/**
	 * Styles
	 */

	$dequeue_styles = array(
		'root-style',
		'google-fonts',
		'tablepress-default',
		'plugin-currencyconverter-widgets',
		'plugin-currencyconverter-fonts',
	);

	foreach ($dequeue_styles as $dequeue_style) {
		wp_dequeue_style( $dequeue_style );
	}


	/**
	 * Scripts
	 */
	
	$dequeue_scripts = array(
		'root-swiper',
	);

	foreach ($dequeue_scripts as $dequeue_script) {
		wp_dequeue_script( $dequeue_script );
	}
}

add_action( 'wp_enqueue_scripts', 'cb_remove_styles_scripts', 100 );


/**
 * Add styles and scripts
 */

function cb_scripts_styles() {

	/**
	 * Styles
	 */

	wp_enqueue_style( 'cardsbanking-bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.css', array(), '20190930' );
	wp_enqueue_style( 'cardsbanking-owl-carousel', get_stylesheet_directory_uri() . '/css/owl-carousel.css', array(), '20190930' );
	wp_enqueue_style( 'cardsbanking-site', get_stylesheet_directory_uri() . '/css/site.css', array(), '20190930' );


	/**
	 * Scripts
	 */

	wp_enqueue_script( 'cardsbanking-bs-util-js', get_stylesheet_directory_uri() . '/js/bootstrap/util.js', array('jquery'), '4.3.1', true );
	wp_enqueue_script( 'cardsbanking-bs-collapse-js', get_stylesheet_directory_uri() . '/js/bootstrap/collapse.js', array('jquery'), '4.3.1', true );

	wp_enqueue_script( 'cardsbanking-owl-carousel-js', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '2.3.4', true );
	wp_enqueue_script( 'cardsbanking-superembed-js', get_stylesheet_directory_uri() . '/js/superembed.min.js', array('jquery'), '1', true );
	wp_enqueue_script( 'cardsbanking-site-js', get_stylesheet_directory_uri() .'/js/site.js', array('jquery'), '20190930', true );
}

add_action( 'wp_enqueue_scripts', 'cb_scripts_styles' );


/**
 * Add menu item to header menu
 */

function cb_change_nav_menu_items( $items, $args ) {
	if ( 'cb_header_menu' == $args->theme_location ) {
		ob_start();

		?>

		<li class="nav-item"><a class="header-menu-item-rate nav-link" href="<?php echo esc_url( site_url('/') ) ?>"><?php _e( 'Card Ratings', 'cardsbanking' ) ?></a></li>

		<?php

		$items .= ob_get_clean();
	}

	return $items;
}

add_filter( 'wp_nav_menu_items', 'cb_change_nav_menu_items', 10, 2 );


/**
 * Remove current item for singular
 */

function cb_bcnext_remove_current_item($trail) {
	if ( is_singular() ) {
		//Check to ensure the breadcrumb we're going to play with exists in the trail
		if(isset($trail->breadcrumbs[0]) && $trail->breadcrumbs[0] instanceof bcn_breadcrumb) {
			$types = $trail->breadcrumbs[0]->get_types();
			//Make sure we have a type and it is a current-item
			if(is_array($types) && in_array('current-item', $types)) {
				//Shift the current item off the front
				array_shift($trail->breadcrumbs);
			}
		}
	}
}

add_action('bcn_after_fill', 'cb_bcnext_remove_current_item');


/**
 * Additional Classes
 */

require 'classes/bs4navwalker.php';

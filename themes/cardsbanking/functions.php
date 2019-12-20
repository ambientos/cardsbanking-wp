<?php

/**
 * Theme Setup
 */

function cb_setup() {

	/**
	 * Load translations
	 */

	load_theme_textdomain( 'cardsbanking', get_stylesheet_directory() . '/languages' );


	/**
	 * Add menu slots for output
	 */

	register_nav_menus( array(
		'cb_header_menu' => __( 'Header Menu', 'cardsbanking' ),
		'cb_pages_menu'  => __( 'Pages Menu', 'cardsbanking' ),
		'cb_footer_menu' => __( 'Footer Menu', 'cardsbanking' ),
	) );


	/**
	 * Bank thumb
	 */

	add_image_size( 'bank-thumb', 190, 50, false );


	/**
	 * Card thumb
	 */

	add_image_size( 'card-thumb', 315, 199, false );
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
		array('mce_external_plugins', 'wpshop_enqueue_plugin_scripts', 10, 1),
		array('mce_buttons_3', 'wpshop_register_buttons_editor', 10, 1),
	);

	foreach ($remove_filters as $remove_filter) {
		remove_filter( $remove_filter[0], $remove_filter[1], $remove_filter[2], $remove_filter[3] );
	}
}

add_action( 'init', 'cb_init' );


/**
 * Replace tinymce.js
 */

function cb_enqueue_plugin_scripts( $plugin_array ) {
	$plugin_array['blockquote_button_plugin'] = get_stylesheet_directory_uri() . '/js/tinymce/tinymce-plugin.js';

	return $plugin_array;
}

add_filter( 'mce_external_plugins', 'cb_enqueue_plugin_scripts' );


function cb_register_buttons_editor( $buttons ) {
	//register buttons with their id.
	array_push(
		$buttons,
		//'col_6',
		//'col_4',
		'blockquote_warning',
		'blockquote_info',
		'blockquote_danger',
		'blockquote_check',
		'blockquote_quote',
		'blockquote_important',
		//'content_btn',
		'spoiler_btn',
		'mark_btn',
		'mask_link'
	);
	return $buttons;
}
add_filter( 'mce_buttons', 'cb_register_buttons_editor' );


/**
 * Register sidebars
 */

function cb_register_sidebars(){
	register_sidebar(
		array(
			'name'          => __( 'Footer Menu List', 'cardsbanking' ),
			'id'            => 'footer-menu-list',
			'description'   => '',
			'before_widget' => ' <div class="col-sm"><div class="footer-menu-container">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<div class="footer-menu-title">',
			'after_title'   => '</div>',
		)
	);
}

add_action( 'widgets_init', 'cb_register_sidebars' );


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
	wp_enqueue_style( 'cardsbanking-site', get_stylesheet_directory_uri() . '/css/site.css', array(), '20190930' );


	/**
	 * Scripts
	 */

	wp_enqueue_script( 'cardsbanking-bs-util-js', get_stylesheet_directory_uri() . '/js/bootstrap/util.js', array('jquery'), '4.3.1', true );
	wp_enqueue_script( 'cardsbanking-bs-collapse-js', get_stylesheet_directory_uri() . '/js/bootstrap/collapse.js', array('jquery'), '4.3.1', true );

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

		<li class="nav-item menu-item-has-children dropdown _dropdown-wide">
			<a class="header-menu-item-rate nav-link" href="<?php echo esc_url( site_url('/') ) ?>"><?php _e( 'Card Ratings', 'cardsbanking' ) ?></a>

			<?php if ( function_exists('have_rows') && have_rows('mr', 'option') ) : ?>
				<div class="dropdown-menu _wide">
					<div class="category-menu d-flex flex-wrap">
						<?php while( have_rows('mr', 'option') ): the_row(); ?>
							<div class="category-menu-item d-flex col-xl-2 col-lg-3 col-md-4 col-12">
								<a class="category-menu-item-link _sm d-flex align-items-center" href="<?php the_sub_field('mr-l', 'option') ?>">
									<span class="category-menu-item-i _side" style="background-image:url(<?php the_sub_field('mr-i') ?>)"></span>
									<span class="category-menu-item-title"><?php the_sub_field('mr-t') ?></span>
								</a>
							</div>
						<?php endwhile; ?>
					</div>
				</div>
			<?php endif; ?>
		</li>

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
 * Add support upload extra file types
 */

function cb_add_file_types_to_uploads($file_types){
	$new_filetypes = array();

	$new_filetypes['svg'] = 'image/svg+xml';

	$file_types = array_merge($file_types, $new_filetypes );

	return $file_types;
}

function cb_allow_upload_svg( $type_and_ext, $file, $filename, $mimes ){
	if( '.svg' === strtolower( substr($filename, -4) ) ){
		$filesize = filesize( $file ) / 1024;

		if( $filesize < 50 && current_user_can('manage_options') ){
			$type_and_ext['ext']  = 'svg';
			$type_and_ext['type'] = 'image/svg+xml';
		}
		else {
			$type_and_ext['ext'] = $type_and_ext['type'] = false;
		}
	}

	return $type_and_ext;
}

add_action('upload_mimes', 'cb_add_file_types_to_uploads');
add_filter('wp_check_filetype_and_ext', 'cb_allow_upload_svg', 10, 4);


/**
 * PNG
 */

function cb_rating_image_extension() {
    return 'png';
}
add_filter( 'wp_postratings_image_extension', 'cb_rating_image_extension' );


/**
 * Pages Menu
 */

function cb_pages_menu_func(){
	$content = '';

	ob_start();

	wp_nav_menu( array(
        'theme_location' => 'cb_pages_menu',
        'menu_class'     => 'entry-pages-menu',
        'item_spacing'   => 'discard',
        'container'      => false,
    ) );

	$content = ob_get_clean();

	return $content;
}

add_shortcode( 'pages_menu', 'cb_pages_menu_func' );


/**
 * Includes
 */

require 'inc/card_functions.php';


/**
 * Additional Classes
 */

require 'classes/bs4navwalker.php';
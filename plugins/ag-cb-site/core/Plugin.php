<?php

namespace AG_Cb_Site;

class Plugin {
	/**
	 * Card Post Type
	 */
	const CARD_POST_TYPE = 'cb_card';

	/**
	 * Init
	 */
	public function __construct() {

		/**
		 * Register CPT and CT
		 */
		add_action( 'init', array( __CLASS__, 'register_cpt_ct' ) );

		/**
		 * 'plugins_loaded' action
		 */
		add_action( 'plugins_loaded', array( __CLASS__, 'plugins_loaded' ) );

		/**
		 * Include field type for ACF5
		 */
		add_action( 'acf/include_field_types', array( __CLASS__, 'include_field_types' ) );
	}

	/**
	 * Register Post Types and Custom Taxonomies
	 */
	public static function register_cpt_ct() {

		/**
		 * Card Post Type
		 */
		register_post_type( self::CARD_POST_TYPE, array(
			'labels' => array(
				'name'               => __( 'Cards', TEXT_DOMAIN ),
				'singular_name'      => __( 'Card', TEXT_DOMAIN ),
				'add_new'            => __( 'Add New Card', TEXT_DOMAIN ),
				'add_new_item'       => __( 'Add New Card item', TEXT_DOMAIN ),
				'edit_item'          => __( 'Edit Card Item', TEXT_DOMAIN ),
				'new_item'           => __( 'New Card Item', TEXT_DOMAIN ),
				'view_item'          => __( 'View Card Item', TEXT_DOMAIN ),
				'search_items'       => __( 'Search Cards', TEXT_DOMAIN ),
				'not_found'          => __( 'Nothing found Cards', TEXT_DOMAIN ),
				'not_found_in_trash' => __( 'Nothing found Cards in Trash', TEXT_DOMAIN ),
				'menu_name'          => __( 'Cards', TEXT_DOMAIN ),
			),
			'public'              => true,
			'show_in_menu'        => 'edit.php',
			'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes', ),
			'has_archive'         => false,
			'rewrite'             => array(
				'slug'            => 'cards',
				'with_front'      => false,
				'feeds'           => false,
			),
			'taxonomies'          => array( 'category' ),
		) );
	}

	/**
	 * Main load
	 */
	public static function plugins_loaded() {

		/**
		 * Load translations for this plugin
		 */
		load_textdomain( TEXT_DOMAIN, PLUGIN_FOLDER . '/languages/' . TEXT_DOMAIN . '-' . get_locale() . '.mo' );

		/**
		 * Add styles to admin panel
		 */
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'admin_enqueue_scripts' ) );
	}

	/**
	 * Add styles to admin panel
	 */
	public static function admin_enqueue_scripts() {
		wp_enqueue_style( 'ag-cb-styles', PLUGIN_URI .'/assets/admin/css/styles.css', false, '1' );
	}

	/**
	 * Include field type
	 */
	public static function include_field_types() {
		new Card_Shortcode_ACF_Field();
	}
}
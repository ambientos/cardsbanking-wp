<?php

namespace AG_Cb_Site;

class Plugin {

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
		 * Add ACF Options page
		 */
		add_action('acf/init', array( __CLASS__, 'register_acf_options_pages' ) );

		/**
		 * Change local JSON path settings for load/save
		 */
		add_filter( 'acf/settings/load_json', array( __CLASS__, 'set_dir_json_for_load' ) );
		add_filter( 'acf/settings/save_json', array( __CLASS__, 'set_dir_json_for_save' ) );

		/**
		 * Include field type for ACF5
		 */
		add_action( 'acf/include_field_types', array( __CLASS__, 'include_field_types' ) );

		/**
		 * Add shortcode A to show Card Item
		 */
		add_shortcode( 'card_a', array( __CLASS__, 'card_a_shortcode_func' ) );

		/**
		 * Add shortcode B to show Card Item
		 */
		add_shortcode( 'card_b', array( __CLASS__, 'card_b_shortcode_func' ) );

		/**
		 * Add shortcode C to show Card Item
		 */
		add_shortcode( 'card_c', array( __CLASS__, 'card_c_shortcode_func' ) );

		/**
		 * Add shortcode D to show Card Item
		 */
		add_shortcode( 'card_d', array( __CLASS__, 'card_d_shortcode_func' ) );
	}

	/**
	 * Register Post Types and Custom Taxonomies
	 */
	public static function register_cpt_ct() {

		/**
		 * Card Post Type
		 */
		register_post_type( CARD_POST_TYPE, array(
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
	 * Register ACF Option page
	 */
	public static function register_acf_options_pages() {
		if ( ! function_exists('acf_add_options_page') ) {
			return;
		}

		acf_add_options_page( array(
			'page_title'  => __( 'Additional Options', TEXT_DOMAIN ),
			'menu_title'  => __( 'Additional Options', TEXT_DOMAIN ),
			'menu_slug'   => 'addict-options',
			'parent_slug' => 'themes.php',
		));
	}

	/**
	 * Change local JSON settings path for load
	 */
	public static function set_dir_json_for_load() {
		return (array) ACF_LOCAL_JSON_DIR;
	}

	/**
	 * Create and change local JSON path settings for save
	 */
	public static function set_dir_json_for_save() {
		wp_mkdir_p( ACF_LOCAL_JSON_DIR );

		return ACF_LOCAL_JSON_DIR;
	}

	/**
	 * Include field type
	 */
	public static function include_field_types() {
		new Card_Shortcode_ACF_Field();
	}

	/**
	 * Add shortcode A to show Card Item
	 */
	public static function card_a_shortcode_func( $atts ) {
		$atts = shortcode_atts( array(
			'ids'  => '',
			'size' => 'sm',
		), $atts );

		/**
		 * Size
		 */
		set_query_var( 'card-size', $atts['size'] );

		/**
		 * Add custom type additional class
		 */
		set_query_var( 'card-type', 'short' );

		/**
		 * Options limit to show
		 */
		set_query_var( 'card-options-limit', 4 );

		/**
		 * Options with icons
		 */
		set_query_var( 'card-icon', 'yes' );

		/**
		 * Card Post IDs list
		 *
		 * @var integer
		 */
		$post_ids_string = $atts['ids'];

		/**
		 * Get array of Post IDs
		 */
		$post_ids_array = explode(',', $post_ids_string);

		/**
		 * Get Card Post data
		 */
		$card_object_array = array();

		foreach ($post_ids_array as $post_id) {
			$post_id = (int) $post_id;

			if ( $post_id ) {
				$card_object_array[] = Card::get_card_by_post_id( $post_id );
			}
		}

		/**
		 * If empty cards array, exiting
		 */
		if ( empty($card_object_array) ) {
			return;
		}

		/**
		 * Echo content
		 */
		ob_start();

		?>

		<div class="card-grid-list _short row">
			<?php foreach ($card_object_array as $card_object) : $card_object->the_post(); ?>
				<div class="col-lg-4 col-md-6 d-sm-flex">
					<div class="card-grid-item box-item d-flex">
						<?php get_template_part( 'template-parts/card/loop/item', 'short' ); ?>
					</div>
				</div>

			<?php endforeach; ?>
		</div>

		<?php

		wp_reset_postdata();

		return ob_get_clean();
	}

	/**
	 * Add shortcode B to show Card Item
	 */
	public static function card_b_shortcode_func( $atts ) {
		$atts = shortcode_atts( array(
			'id'   => 0,
			'size' => 'sm',
		), $atts );

		/**
		 * Size
		 */
		set_query_var( 'card-size', $atts['size'] );

		/**
		 * Add custom type additional class
		 */
		set_query_var( 'card-type', 'column' );

		/**
		 * Options with icons
		 */
		set_query_var( 'card-icon', 'yes' );

		/**
		 * Card Post ID
		 *
		 * @var integer
		 */
		$post_id = (int) $atts['id'];

		/**
		 * Return nothing if Post ID is zero
		 */
		if ( $post_id === 0 ) {
			return;
		}

		/**
		 * Get Card Post data
		 *
		 * @var object WP_Query
		 */
		$card_object = Card::get_card_by_post_id( $post_id );

		/**
		 * Echo content
		 */
		ob_start();

		$card_object->the_post();

		get_template_part( 'template-parts/card/loop/item', 'wide' );

		wp_reset_postdata();

		return ob_get_clean();
	}

	/**
	 * Add shortcode C to show Card Item
	 */
	public static function card_c_shortcode_func( $atts ) {
		$atts = shortcode_atts( array(
			'id'   => 0,
		), $atts );

		/**
		 * Card Post ID
		 *
		 * @var integer
		 */
		$post_id = (int) $atts['id'];

		/**
		 * Return nothing if Post ID is zero
		 */
		if ( $post_id === 0 ) {
			return;
		}

		/**
		 * Get Order link
		 *
		 * @var string
		 */
		$order_link = get_post_meta( $post_id, 'c-order', true );

		/**
		 * Return nothing if Order link is empty
		 */
		if ( empty($order_link) ) {
			return;
		}

		/**
		 * Echo content
		 */
		ob_start();

		?><p class="d-flex justify-content-center"><a href="<?php echo esc_url( $order_link ) ?>" class="btn-primary btn" target="_blank"><?php _e( 'Card Order', TEXT_DOMAIN ) ?></a></p><?php

		return ob_get_clean();
	}

	/**
	 * Add shortcode C to show Card Item
	 */
	public static function card_d_shortcode_func( $atts ) {
		$atts = shortcode_atts( array(
			'id'   => 0,
			'size' => 'md',
		), $atts );

		/**
		 * Size
		 */
		set_query_var( 'card-size', $atts['size'] );

		/**
		 * Add custom type additional class
		 */
		set_query_var( 'card-type', 'column' );

		/**
		 * Options with icons
		 */
		set_query_var( 'card-icon', 'yes' );

		/**
		 * Card Post ID
		 *
		 * @var integer
		 */
		$post_id = (int) $atts['id'];

		/**
		 * Return nothing if Post ID is zero
		 */
		if ( $post_id === 0 ) {
			return;
		}

		/**
		 * Get Card Post data
		 *
		 * @var object WP_Query
		 */
		$card_object = Card::get_card_by_post_id( $post_id );

		/**
		 * Echo content
		 */
		ob_start();

		$card_object->the_post();

		get_template_part( 'template-parts/card/loop/item', 'wide' );

		wp_reset_postdata();

		return ob_get_clean();
	}
}
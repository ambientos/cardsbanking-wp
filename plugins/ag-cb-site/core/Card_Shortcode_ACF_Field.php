<?php

namespace AG_Cb_Site;

class Card_Shortcode_ACF_Field extends \acf_field {
	/*
	*  __construct
	*
	*  This function will setup the field type data
	*/

	function __construct() {
		/*
		*  name (string) Single word, no spaces. Underscores allowed
		*/

		$this->name = 'card_shortcodes';

		/*
		*  label (string) Multiple words, can include spaces, visible when selecting a field type
		*/

		$this->label = __( 'Card Shortcodes', TEXT_DOMAIN );

		/*
		*  category (string) basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME
		*/

		$this->category = 'layout';

		// do not delete!
		parent::__construct();
	}

	/*
	*  render_field()
	*
	*  Create the HTML interface for your field
	*/

	function render_field( $field ) {

		$card_id = get_the_ID();

		$shortcodes = array(
			'sc-1' => array(
				'label' => __( 'Vertical, with multiple ids', TEXT_DOMAIN ),
				'value' => '[card_a ids="'. $card_id .'"]',
			),
			'sc-2' => array(
				'label' => __( 'Horizontal, within sidebar', TEXT_DOMAIN ),
				'value' => '[card_b id="'. $card_id .'"]',
			),
			'sc-3' => array(
				'label' => __( 'Horizontal, without sidebar', TEXT_DOMAIN ),
				'value' => '[card_c id="'. $card_id .'"]',
			),
		);

		?>

		<div class="acf-fields">
			<?php foreach ($shortcodes as $shortcode_id => $shortcode_item) : ?>
				<div class="acf-field" style="width: 33.3334%;" data-width="33.3334">
					<div class="acf-label">
						<label><?php echo esc_attr( $shortcode_item['label'] ) ?></label>
					</div>
					<div class="acf-input">
						<div class="acf-input-wrap">
							<input type="text" id="<?php echo esc_attr( $shortcode_id ) ?>" value="<?php echo esc_attr( $shortcode_item['value'] ) ?>" readonly>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<?php
	}
}
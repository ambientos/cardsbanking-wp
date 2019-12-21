<?php

/**
 * Type
 */
$type = get_query_var( 'card-type', 'single' );

/**
 * Size
 */
$size_class = '_'. get_query_var( 'card-size', 'md' );

/**
 * Show icons
 */
$is_icon = get_query_var( 'card-icon', 'none' );

/**
 * Limit number options
 */
$card_options_limit = get_query_var( 'card-options-limit', 6 );

/**
 * Meta field prefix
 */
$meta_prefix = 'single' === $type ? 'c-l-' : 'c-s-';

/**
 * Custom type additional class
 */
$type_class = ' _'. $type;

/**
 * Parent class
 */
$parent_class = 'column' === $type ? ' row'. $type_class : $type_class;
$item_class   = 'column' === $type ? ' col-4'. $type_class : $type_class;

/**
 * Label type
 */
$label_type = 'single' === $type ? 'label_long' : 'label_short';

/**
 * Get defined card options
 *
 * @var array
 */
$card_options = get_card_options();

/**
 * Index for foreach
 */
$index = 0;

?>

<div class="card-option-list<?php echo esc_attr( $parent_class .' '. $size_class ) ?>">
	<?php foreach ($card_options['common'] as $card_option_id => $card_option_data) : ?>
		<?php

		$card_option_value = get_post_meta( get_the_ID(), $meta_prefix . $card_option_id, true );

		$addict_condition = 'single' !== $type ? $index < $card_options_limit : 1;

		if ( $addict_condition && ! empty($card_option_value) ) :
			$index++;

			$classes_arr = array( 'card-option-item', $item_class, $size_class );

			$classes_arr[] = 'single' === $type ? 'align-items-center' : 'align-items-start';

			if ( 'none' !== $is_icon ) {
				$classes_arr[] = 'd-flex card-option-item-icon ' .' _'. $card_option_data['icon'];
			}

			$classes = implode( ' ', $classes_arr );

		?>
			<div class="<?php echo esc_attr( $classes ) ?>">
				<div class="card-option-item-inner">
					<?php echo esc_html( $card_option_data[ $label_type ] ) ?> <b><?php echo esc_html( $card_option_value ) ?></b>
				</div>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
</div>
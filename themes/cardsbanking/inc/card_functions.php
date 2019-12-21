<?php

/**
 * Predefined Card General Options
 */
function get_card_options() {
	return array(
		'common' => array(
			'po' => array(
				'label_short' => __( 'Service cost', 'cardsbanking' ),
				'label_long'  => __( 'Service cost', 'cardsbanking' ),
				'icon'        => 'pservice',
			),
			'tr' => array(
				'label_short' => __( 'Requirements', 'cardsbanking' ),
				'label_long'  => __( 'Requirements', 'cardsbanking' ),
				'icon'        => 'require',
			),
			'cb' => array(
				'label_short' => __( 'Cashback', 'cardsbanking' ),
				'label_long'  => __( 'Cashback', 'cardsbanking' ),
				'icon'        => 'cashback',
			),
			'm' => array(
				'label_short' => __( 'Miles', 'cardsbanking' ),
				'label_long'  => __( 'Earning miles', 'cardsbanking' ),
				'icon'        => 'miles',
			),
			'b' => array(
				'label_short' => __( 'Bonuses for purchases', 'cardsbanking' ),
				'label_long'  => __( 'Bonuses', 'cardsbanking' ),
				'icon'        => 'bonus',
			),
			'p' => array(
				'label_short' => __( 'Percent on balance', 'cardsbanking' ),
				'label_long'  => __( 'Percent on balance', 'cardsbanking' ),
				'icon'        => 'pbalance',
			),
			'od' => array(
				'label_short' => __( 'Overdraft', 'cardsbanking' ),
				'label_long'  => __( 'Overdraft', 'cardsbanking' ),
				'icon'        => 'odraft',
			),
			'ca' => array(
				'label_short' => __( 'Cash withdrawal', 'cardsbanking' ),
				'label_long'  => __( 'Cash withdrawal', 'cardsbanking' ),
				'icon'        => 'cashw',
			),
			'ps' => array(
				'label_short' => __( 'Percent rate', 'cardsbanking' ),
				'label_long'  => __( 'Percent rate', 'cardsbanking' ),
				'icon'        => 'prate',
			),
			'l' => array(
				'label_short' => __( 'Limit', 'cardsbanking' ),
				'label_long'  => __( 'Credit limit', 'cardsbanking' ),
				'icon'        => 'limit',
			),
			'lp' => array(
				'label_short' => __( 'Grace period', 'cardsbanking' ),
				'label_long'  => __( 'Grace period', 'cardsbanking' ),
				'icon'        => 'grace',
			),
		),
	);
}

/**
 * Check for is Bank term
 */
function is_bank_term( $term_id = 0 ) {

	/**
	 * If isn't integer, return
	 */
	if ( ! (int) $term_id ) {
		return false;
	}

	/**
	 * Get term meta for check
	 *
	 * @var string
	 */
	$is_bank_term = get_term_meta( $term_id, 'c-b', true );

	/**
	 * Return checking result
	 *
	 * @var bool
	 */
	return (bool) $is_bank_term ? true : false;
}

/**
 * Check for is Bank sub-term
 */
function is_sub_bank_term() {

	/**
	 * Get Queried Object
	 *
	 * @var object WP_Term
	 */
	$queried_object = get_queried_object();

	/**
	 * Check for is sub-term, this is cannot be zero
	 */
	if ( ! isset($queried_object->parent) || 0 === $queried_object->parent ) {
		return false;
	}

	/**
	 * Return result of checking
	 */
	return is_bank_term( $queried_object->parent );
}
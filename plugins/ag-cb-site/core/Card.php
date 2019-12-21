<?php

namespace AG_Cb_Site;

class Card {

	public function __construct() {
		echo 'noo ok.';
	}

	/**
	 * Get Cards query by term
	 *
	 * @return object WP_Query
	 */
	public static function get_cards_by_term( $bank_term, $query_args = array() ) {

		/**
		 * Return false if term not exists
		 */
		if ( ! is_object($bank_term) && empty($bank_term) ) {
			return false;
		}

		/**
		 * Default arguments
		 *
		 * @var array
		 */
		$_query_args = array(
			'post_type'      => CARD_POST_TYPE,
			'cat'            => $bank_term->term_id,
			'posts_per_page' => '6',
		);

		return new \WP_Query( array_merge( $_query_args, $query_args ) );
	}

	/**
	 * Get special sub-terms Cards by Bank term
	 *
	 * @return array
	 */
	public static function get_cards_for_bank( $bank_term, $sub_term_types = array( 'debit', 'credit' ) ) {

		/**
		 * Return FALSE if bank term not exists
		 */
		if ( ! is_object($bank_term) || empty($bank_term) ) {
			return false;
		}

		/**
		 * Option checks this is Page Bank
		 * Return FALSE if option not set
		 *
		 * @var string
		 */
		$is_term_bank = get_term_meta( $bank_term->term_id, 'c-b', true );

		if ( ! (bool) $is_term_bank ) {
			return false;
		}

		/**
		 * Empty formatted array for return
		 */
		$output_data_array = array();

		/**
		 * Add empty sub-term types
		 */
		foreach ( $sub_term_types as $sub_term_type ) {
			$output_data_array[ $sub_term_type ] = array();
		}

		/**
		 * Get sub-terms
		 */
		$bank_sub_terms = get_terms( array(
			'taxonomy' => CARD_TAXONOMY,
			'parent'   => $bank_term->term_id,
		) );

		/**
		 * Get Cards for sub-term types
		 */
		foreach ( $bank_sub_terms as $bank_sub_term ) {

			foreach ( $output_data_array as $term_type => $term_type_arr ) {
				/**
				 * Search first position for searching string
				 *
				 * @var string|bool
				 */
				$sub_term_exist = strpos($bank_sub_term->slug, $term_type);

				/**
				 * If position find, set data for current sub-term type
				 */
				if ( ! is_bool($sub_term_exist) ) {
					$output_data_array[$term_type] = array(
						'term'  => $bank_sub_term,
						'query' => self::get_cards_by_term( $bank_sub_term ),
					);
				}
			}
		}

		return $output_data_array;
	}
}
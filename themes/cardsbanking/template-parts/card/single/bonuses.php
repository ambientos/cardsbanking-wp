<?php

if ( function_exists('get_field_object') ) :

	global $_item_title, $_item_content;

	$bonus_out_list = array();

	/**
	 * Cashback
	 */
	$cashback         = get_field( 'c-b-ct' );
	$cashback_o_is    = get_field_object( 'c-b-c' );
	$cashback_is      = $cashback_o_is['value'] && ! empty($cashback);

	if ( $cashback_is ) {
		$bonus_out_list[] = array(
			'icon'    => 'bcashback',
			'title'   => $cashback_o_is['label'],
			'content' => $cashback,
		);
	}
	
	/**
	 * Discounts
	 */
	$discounts      = get_field( 'c-b-st' );
	$discounts_o_is = get_field_object( 'c-b-s' );
	$discounts_is   = $discounts_o_is['value'] && ! empty($discounts);

	if ( $discounts_is ) {
		$bonus_out_list[] = array(
			'icon'    => 'bdiscounts',
			'title'   => $discounts_o_is['label'],
			'content' => $discounts,
		);
	}
	
	/**
	 * Other
	 */
	$other      = get_field( 'c-b-pt' );
	$other_o_is = get_field_object( 'c-b-p' );
	$other_is   = $other_o_is['value'] && ! empty($other);

	if ( $other_is ) {
		$bonus_out_list[] = array(
			'icon'    => 'bother',
			'title'   => $other_o_is['label'],
			'content' => $other,
		);
	}


	if ( $cashback_is || $discounts_is || $other_is ) :

		?>

		<h2 class="card-single-subtitle"><?php _e( 'Bonus Programs', 'cardsbanking' ) ?></h2>

		<?php

		$_item_title = '';

		ob_start(); ?>

		<div class="card-single-chars-item">
			<?php foreach ($bonus_out_list as $bonus_out_list_item) : ?>
				<h3 class="card-single-box-title card-single-slist-item-title _<?php echo esc_attr( $bonus_out_list_item['icon'] ) ?>"><?php echo esc_html( $bonus_out_list_item['title'] ) ?></h3>

				<?php echo wpautop( $bonus_out_list_item['content'] ) ?>
			<?php endforeach; ?>
		</div>

		<?php $_item_content = ob_get_clean();

		get_template_part( 'template-parts/card/single/box', 'item' );

	endif;

endif;
<h2 class="card-single-subtitle"><?php _e( 'Cash withdrawals and deposits', 'cardsbanking' ) ?></h2>

<?php

if ( function_exists('get_field_object') ) :

	/**
	 * Withdraw cash from the card
	 */
	$withd_cash             = get_field_object( 'c-ca' );
	$withd_cash_gen_arr     = $withd_cash['value']['c-ca-t'];
	$withd_cash_limit_is    = $withd_cash['value']['c-ca-l'];
	$withd_cash_limit_day   = $withd_cash['value']['c-ca-ld'];
	$withd_cash_limit_month = $withd_cash['value']['c-ca-lm'];

	$withd_cash_box_gray_is = ! empty($withd_cash_gen_arr) || ! empty($withd_cash_limit_is);

	$withd_cash_info        = $withd_cash['value']['c-ca-obt'];
	$withd_cash_box_info_is = $withd_cash['value']['c-ca-ob'] && ! empty($withd_cash_info);

	?>

	<?php if ( $withd_cash_box_gray_is || $withd_cash_box_info_is ) : ?>

		<h3 class="card-single-box-title"><?php echo '&mdash; '. esc_html( $withd_cash['label'] ) ?></h3>

		<?php if ( $withd_cash_box_gray_is ) : ?>
			<div class="card-single-box-bg _gray">
				<?php foreach ($withd_cash_gen_arr as $withd_cash_gen_item) : ?>
					<div class="card-single-box-row row">
						<div class="col-md-6">
							<?php echo esc_html( $withd_cash['sub_fields'][0]['sub_fields'][0]['choices'][$withd_cash_gen_item['c-ca-tt']] ) ?>:
						</div>

						<div class="col-md-3">
							<?php

							if ( ! empty($withd_cash_gen_item['c-ca-tp']) ) :
								echo esc_html( $withd_cash_gen_item['c-ca-tp'] . $withd_cash['sub_fields'][0]['sub_fields'][1]['append'] .' ' ) ;

							endif;


							if ( ! empty($withd_cash_gen_item['c-ca-tp']) && ! empty($withd_cash_gen_item['c-ca-tf']) ) :
								echo '+ ';

							endif;

							if ( ! empty($withd_cash_gen_item['c-ca-tf']) ) :
								echo esc_html( $withd_cash_gen_item['c-ca-tf'] .' '. $withd_cash['sub_fields'][0]['sub_fields'][2]['append'] );

							endif;


							if ( empty($withd_cash_gen_item['c-ca-tp']) && empty($withd_cash_gen_item['c-ca-tf']) ) :
								echo '&mdash;';

							endif;

							?></div>
					</div>
				<?php endforeach; ?>

				<?php if ( $withd_cash_limit_is ) : ?>
					<?php if ( $withd_cash_limit_day ) : ?>
						<div class="card-single-box-row row">
							<div class="col-md-6">
								<?php echo esc_html( $withd_cash['sub_fields'][2]['label'] ) ?>:
							</div>

							<div class="col-md-3">
								<?php echo esc_html( $withd_cash_limit_day .' '. $withd_cash['sub_fields'][2]['append'] ) ?>
							</div>
						</div>
					<?php endif; ?>

					<?php if ( $withd_cash_limit_month ) : ?>
						<div class="card-single-box-row row">
							<div class="col-md-6">
								<?php echo esc_html( $withd_cash['sub_fields'][3]['label'] ) ?>:
							</div>

							<div class="col-md-3">
								<?php echo esc_html( $withd_cash_limit_month .' '. $withd_cash['sub_fields'][3]['append'] ) ?>
							</div>
						</div>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( $withd_cash_box_info_is ) : ?>
			<div class="card-single-box-bg _teal">
				<?php echo wpautop( $withd_cash_info ); ?>
			</div>
		<?php endif; ?>

	<?php endif; ?>


	<?php

	/**
	 * Card replenishment
	 */
	
	$card_repl    = get_field_object( 'c-cr' );
	$card_repl_t  = $card_repl['value']['c-crt'];
	$card_repl_is = $card_repl['value']['c-crc'] && ! empty($card_repl_t);

	if ( $card_repl_is ) : ?>

		<h3 class="card-single-box-title"><?php echo '&mdash; '. esc_html( $card_repl['label'] ) ?></h3>

		<?php echo wpautop( $card_repl_t ) ?>

	<?php endif;

endif;
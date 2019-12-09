<h2 class="card-single-subtitle"><?php _e( 'Characteristics', 'cardsbanking' ) ?></h2>

<div class="card-single-chars row">
	<?php

	/**
	 * Payment system
	 */

	if ( function_exists('get_field_object') ) :

		$pay_sys = get_field_object( 'c-h-ps' );

		if ( ! empty($pay_sys['value']) ) :
	?>
			<div class="card-single-chars-item-wrap col-md-6">
				<div class="card-single-chars-item d-flex">
					<div class="card-single-chars-item-inner">
						<h3 class="card-single-chars-item-title _pay-sys"><?php echo esc_html( $pay_sys['label'] ) ?></h3>
						<ul class="card-single-chars-item-list">
							<?php foreach ($pay_sys['value'] as $pay_sys_id) : ?>
								<li><?php echo esc_html( $pay_sys['choices'][$pay_sys_id] ) ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		<?php endif; ?>
	<?php endif; ?>


	<?php

	/**
	 * Currency
	 */

	if ( function_exists('get_field_object') ) :

		$currency = get_field_object( 'c-h-cy' );

		if ( ! empty($currency['value']) ) :
	?>
			<div class="card-single-chars-item-wrap col-md-6">
				<div class="card-single-chars-item d-flex">
					<div class="card-single-chars-item-inner">
						<h3 class="card-single-chars-item-title _currency"><?php echo esc_html( $currency['label'] ) ?></h3>
						<?php foreach ($currency['value'] as $currency_id) : ?>
							<div class="card-single-chars-item-curr _<?php echo esc_attr( $currency_id ) ?>">
								<?php echo esc_html( $currency['choices'][$currency_id] ) ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	<?php endif; ?>


	<?php

	/**
	 * Validity
	 */

	if ( function_exists('get_field_object') ) :

		$validity_period = get_field_object( 'c-h-pdn' );
		$validity_type   = get_field_object( 'c-h-pdt' );

		if ( ! empty($validity_period['value']) && ! empty($validity_type['value']) ) :
			$validity_num = (int) $validity_period['value'];

			$validity_val_variants = array(
				'y' => sprintf( _n( '%s year', '%s years', $validity_num, 'cardsbanking' ), $validity_num ),
				'm' => sprintf( _n( '%s month', '%s months', $validity_num, 'cardsbanking' ), $validity_num ),
			);

			$validity_val = $validity_val_variants[ $validity_type['value'] ];
	?>
			<div class="card-single-chars-item-wrap col-md-6">
				<div class="card-single-chars-item d-flex">
					<div class="card-single-chars-item-inner">
						<h3 class="card-single-chars-item-title _validity"><?php _e( 'Validity', 'cardsbanking' ) ?></h3>
						<div class="card-single-chars-item-val">
							<?php echo esc_html( $validity_val ) ?>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	<?php endif; ?>


	<?php

	/**
	 * Coverage area
	 */

	if ( function_exists('get_field_object') ) :

		$cover_area = get_field_object( 'c-h-z' );

		if ( ! empty($cover_area['value']) ) :
			foreach ($cover_area['value'] as $cover_area_value) {
				$cover_area_vals_arr[] = $cover_area['choices'][$cover_area_value];
			}

			$cover_area_vals = implode(', ', $cover_area_vals_arr);
	?>
			<div class="card-single-chars-item-wrap col-md-6">
				<div class="card-single-chars-item d-flex">
					<div class="card-single-chars-item-inner">
						<h3 class="card-single-chars-item-title _cover-area"><?php echo esc_html( $cover_area['label'] ) ?></h3>
						<div class="card-single-chars-item-val">
							<?php echo esc_html( $cover_area_vals ) ?>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	<?php endif; ?>


	<?php

	/**
	 * Functions
	 */

	if ( function_exists('get_field_object') ) :

		$funcs = get_field_object( 'c-h-f' );

		if ( ! empty($funcs['value']) ) :
	?>
			<div class="card-single-chars-item-wrap col-md-12">
				<div class="card-single-chars-item d-flex">
					<div class="card-single-chars-item-inner">
						<h3 class="card-single-chars-item-title _funcs"><?php echo esc_html( $funcs['label'] ) ?></h3>
						<ul class="card-single-chars-item-list _wide">
							<?php foreach ($funcs['value'] as $funcs_id) : ?>
								<li><?php echo esc_html( $funcs['choices'][$funcs_id] ) ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		<?php endif; ?>
	<?php endif; ?>


	<?php

	/**
	 * Issue cost
	 */

	if ( function_exists('get_field_object') ) :

		$icost = get_field_object( 'c-h-pr' );

		if ( ! empty($icost['value']['c-h-pr-f']) || ! empty($icost['value']['c-h-pr-p']) ) :
			$icost_free = $icost['sub_fields'][0]['label'];
			$icost_pay  = $icost['value']['c-h-pr-p'] .' '. $icost['sub_fields'][1]['append'];

			$icost_val = (int) $icost['value']['c-h-pr-f'] ? $icost_free : $icost_pay;
	?>
			<div class="card-single-chars-item-wrap col-md-6">
				<div class="card-single-chars-item d-flex">
					<div class="card-single-chars-item-inner">
						<h3 class="card-single-chars-item-title _icost"><?php echo esc_html( $icost['label'] ) ?></h3>
						<div class="card-single-chars-item-single"><?php echo esc_html( $icost_val ) ?></div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	<?php endif; ?>


	<?php

	/**
	 * Service cost
	 */

	if ( function_exists('get_field_object') ) :

		$scost = get_field_object( 'c-h-pc' );

		if ( ! empty($scost['value']['c-h-pc-f']) || ! empty($scost['value']['c-h-pc-r']) ) :
			$scost_free = $scost['sub_fields'][0]['label'];
			$scost_free = ! empty($scost['value']['c-h-pc-ft']) ? $scost_free .', '. $scost['value']['c-h-pc-ft'] : $scost_free;

			$scost_pay = '';

			if ( ! empty($scost['value']['c-h-pc-r']) ) {
				$scost_pay_arr = array();

				foreach ($scost['value']['c-h-pc-r'] as $scost_pay_item) {
					$scost_pay_arr[] = esc_html( $scost_pay_item['c-h-pc-rp'] .' '. $scost['sub_fields'][2]['sub_fields'][0]['append'] .' '. $scost['sub_fields'][2]['sub_fields'][1]['choices'][$scost_pay_item['c-h-pc-rs']] );
				}

				$scost_pay = implode('<br>', $scost_pay_arr);
			}

			$scost_val = (int) $scost_pay ? $scost_pay : esc_html( $scost_free );
	?>
			<div class="card-single-chars-item-wrap col-md-6">
				<div class="card-single-chars-item d-flex">
					<div class="card-single-chars-item-inner">
						<h3 class="card-single-chars-item-title _scost"><?php echo esc_html( $scost['label'] ) ?></h3>
						<div class="card-single-chars-item-single"><?php echo $scost_val ?></div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	<?php endif; ?>


	<?php

	/**
	 * SMS
	 */

	if ( function_exists('get_field_object') ) :

		$sms = get_field_object( 'c-h-sms' );

		if ( ! empty($sms['value']['c-h-sms-f']) || ! empty($sms['value']['c-h-sms-p']) ) :
			$sms_free = $sms['sub_fields'][0]['label'];

			$sms_pay  = $sms['value']['c-h-sms-p'] .' '. $sms['sub_fields'][1]['append'] .' '. $sms['sub_fields'][2]['choices'][$sms['value']['c-h-sms-s']];

			$sms_val = (int) $sms['value']['c-h-sms-f'] ? $sms_free : $sms_pay;
	?>
			<div class="card-single-chars-item-wrap col-md-6">
				<div class="card-single-chars-item d-flex">
					<div class="card-single-chars-item-inner">
						<h3 class="card-single-chars-item-title _sms"><?php echo esc_html( $sms['label'] ) ?></h3>
						<div class="card-single-chars-item-single"><?php echo esc_html( $sms_val ) ?></div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	<?php endif; ?>


	<?php

	/**
	 * Online banking
	 */

	if ( function_exists('get_field_object') ) :

		$banking = get_field_object( 'c-h-ob' );

		if ( ! empty($banking['value']['c-h-ob-f']) || ! empty($banking['value']['c-h-ob-p']) ) :
			$banking_free = $banking['sub_fields'][0]['label'];

			$banking_pay  = $banking['value']['c-h-ob-p'] .' '. $banking['sub_fields'][1]['append'] .' '. $banking['sub_fields'][2]['choices'][$banking['value']['c-h-ob-s']];

			$banking_val = (int) $banking['value']['c-h-ob-f'] ? $banking_free : $banking_pay;
	?>
			<div class="card-single-chars-item-wrap col-md-6">
				<div class="card-single-chars-item d-flex">
					<div class="card-single-chars-item-inner">
						<h3 class="card-single-chars-item-title _banking"><?php echo esc_html( $banking['label'] ) ?></h3>
						<div class="card-single-chars-item-single"><?php echo esc_html( $banking_val ) ?></div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	<?php endif; ?>
</div>
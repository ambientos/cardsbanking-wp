<h2 class="card-single-subtitle"><?php _e( 'Characteristics', 'cardsbanking' ) ?></h2>

<div class="card-single-chars row">
	<?php

	global $_item_icon, $_item_cols, $_item_title, $_item_content;

	/**
	 * Payment system
	 */

	if ( function_exists('get_field_object') ) :

		$pay_sys = get_field_object( 'c-h-ps' );

		if ( ! empty($pay_sys['value']) ) :

			$_item_cols  = '6';
			$_item_icon  = 'pay-sys';
			$_item_title = $pay_sys['label'];

			ob_start(); ?>

			<ul class="card-single-chars-item-list">
				<?php foreach ($pay_sys['value'] as $pay_sys_id) : ?>
					<li><?php echo esc_html( $pay_sys['choices'][$pay_sys_id] ) ?></li>
				<?php endforeach; ?>
			</ul>

			<?php

			$_item_content = ob_get_clean();

			get_template_part( 'template-parts/card/single/chars', 'item' );

		endif;

	endif;


	/**
	 * Currency
	 */

	if ( function_exists('get_field_object') ) :

		$currency = get_field_object( 'c-h-cy' );

		if ( ! empty($currency['value']) ) :
			$_item_cols  = '6';
			$_item_icon  = 'currency';
			$_item_title = $currency['label'];

			ob_start();

			foreach ($currency['value'] as $currency_id) : ?>
				<div class="card-single-chars-item-curr _<?php echo esc_attr( $currency_id ) ?>">
					<?php echo esc_html( $currency['choices'][$currency_id] ) ?>
				</div>
			<?php endforeach;

			$_item_content = ob_get_clean();

			get_template_part( 'template-parts/card/single/chars', 'item' );

		endif;

	endif;


	/**
	 * Validity
	 */

	if ( function_exists('get_field_object') ) :

		$validity_period = get_field_object( 'c-h-pdn' );
		$validity_type   = get_field_object( 'c-h-pdt' );

		if ( ! empty($validity_period['value']) && ! empty($validity_type['value']) ) :
			$_item_cols  = '6';
			$_item_icon  = 'validity';
			$_item_title = __( 'Validity', 'cardsbanking' );

			$validity_num = (int) $validity_period['value'];

			$validity_val_variants = array(
				'y' => sprintf( _n( '%s year', '%s years', $validity_num, 'cardsbanking' ), $validity_num ),
				'm' => sprintf( _n( '%s month', '%s months', $validity_num, 'cardsbanking' ), $validity_num ),
			);

			$validity_val = $validity_val_variants[ $validity_type['value'] ];

			ob_start(); ?>

			<div class="card-single-chars-item-val">
				<?php echo esc_html( $validity_val ) ?>
			</div>

			<?php

			$_item_content = ob_get_clean();

			get_template_part( 'template-parts/card/single/chars', 'item' );

		endif;

	endif;


	/**
	 * Coverage area
	 */

	if ( function_exists('get_field_object') ) :

		$cover_area = get_field_object( 'c-h-z' );

		if ( ! empty($cover_area['value']) ) :
			$_item_cols  = '6';
			$_item_icon  = 'cover-area';
			$_item_title = $cover_area['label'];

			foreach ($cover_area['value'] as $cover_area_value) {
				$cover_area_vals_arr[] = $cover_area['choices'][$cover_area_value];
			}

			$cover_area_vals = implode(', ', $cover_area_vals_arr);

			ob_start(); ?>

			<div class="card-single-chars-item-val">
				<?php echo esc_html( $cover_area_vals ) ?>
			</div>

			<?php

			$_item_content = ob_get_clean();

			get_template_part( 'template-parts/card/single/chars', 'item' );

		endif;

	endif;


	/**
	 * Functions
	 */

	if ( function_exists('get_field_object') ) :

		$funcs = get_field_object( 'c-h-f' );

		if ( ! empty($funcs['value']) ) :
			$_item_cols  = '12';
			$_item_icon  = 'funcs';
			$_item_title = $funcs['label'];

			ob_start(); ?>

			<ul class="card-single-chars-item-list _wide row">
				<?php foreach ($funcs['value'] as $funcs_id) : ?>
					<li class="col-xl-3 col-lg-4 col-md-6"><?php echo esc_html( $funcs['choices'][$funcs_id] ) ?></li>
				<?php endforeach; ?>
			</ul>

			<?php

			$_item_content = ob_get_clean();

			get_template_part( 'template-parts/card/single/chars', 'item' );

		endif;

	endif;


	/**
	 * Issue cost
	 */

	if ( function_exists('get_field_object') ) :

		$icost = get_field_object( 'c-h-pr' );

		if ( ! empty($icost['value']['c-h-pr-f']) || ! empty($icost['value']['c-h-pr-p']) ) :
			$_item_cols  = '6';
			$_item_icon  = 'icost';
			$_item_title = $icost['label'];

			$icost_free = $icost['sub_fields'][0]['label'];
			$icost_pay  = $icost['value']['c-h-pr-p'] .' '. $icost['sub_fields'][1]['append'];

			$icost_val = (int) $icost['value']['c-h-pr-f'] ? $icost_free : $icost_pay;

			ob_start(); ?>

			<div class="card-single-chars-item-single"><?php echo esc_html( $icost_val ) ?></div>

			<?php

			$_item_content = ob_get_clean();

			get_template_part( 'template-parts/card/single/chars', 'item' );

		endif;

	endif;


	/**
	 * Service cost
	 */

	if ( function_exists('get_field_object') ) :

		$scost = get_field_object( 'c-h-pc' );

		if ( $scost['value']['c-h-pc-f'] || ! empty($scost['value']['c-h-pc-r']) ) :
			$_item_cols  = '6';
			$_item_icon  = 'scost';
			$_item_title = $scost['label'];

			$scost_free = $scost['sub_fields'][0]['label'];
			$scost_free = isset( $scost['value']['c-h-pc-ft'] ) && $scost['value']['c-h-pc-ft'] ? $scost_free .', '. $scost['value']['c-h-pc-ft'] : $scost_free;

			$scost_pay = '';

			if ( ! empty($scost['value']['c-h-pc-r']) ) {
				$scost_pay_arr = array();

				foreach ($scost['value']['c-h-pc-r'] as $scost_pay_item) {
					$scost_pay_arr[] = esc_html( $scost_pay_item['c-h-pc-rp'] .' '. $scost['sub_fields'][1]['sub_fields'][0]['append'] .' '. $scost['sub_fields'][1]['sub_fields'][1]['choices'][$scost_pay_item['c-h-pc-rs']] );
				}

				$scost_pay = implode('<br>', $scost_pay_arr);
			}

			$scost_val = $scost['value']['c-h-pc-f'] ? esc_html( $scost_free ) : $scost_pay;

			ob_start(); ?>

			<div class="card-single-chars-item-single"><?php echo $scost_val ?></div>

			<?php

			$_item_content = ob_get_clean();

			get_template_part( 'template-parts/card/single/chars', 'item' );

		endif;

	endif;


	/**
	 * SMS
	 */

	if ( function_exists('get_field_object') ) :

		$sms = get_field_object( 'c-h-sms' );

		if ( ! empty($sms['value']['c-h-sms-f']) || ! empty($sms['value']['c-h-sms-p']) ) :
			$_item_cols  = '6';
			$_item_icon  = 'sms';
			$_item_title = $sms['label'];

			$sms_free = $sms['sub_fields'][0]['label'];

			$sms_pay  = $sms['value']['c-h-sms-p'] .' '. $sms['sub_fields'][1]['append'] .' '. $sms['sub_fields'][2]['choices'][$sms['value']['c-h-sms-s']];

			$sms_val = (int) $sms['value']['c-h-sms-f'] ? $sms_free : $sms_pay;

			ob_start(); ?>

			<div class="card-single-chars-item-single"><?php echo esc_html( $sms_val ) ?></div>

			<?php

			$_item_content = ob_get_clean();

			get_template_part( 'template-parts/card/single/chars', 'item' );

		endif;

	endif;


	/**
	 * Online banking
	 */

	if ( function_exists('get_field_object') ) :

		$banking = get_field_object( 'c-h-ob' );

		if ( ! empty($banking['value']['c-h-ob-f']) || ! empty($banking['value']['c-h-ob-p']) ) :
			$_item_cols  = '6';
			$_item_icon  = 'banking';
			$_item_title = $banking['label'];

			$banking_free = $banking['sub_fields'][0]['label'];

			$banking_pay  = $banking['value']['c-h-ob-p'] .' '. $banking['sub_fields'][1]['append'] .' '. $banking['sub_fields'][2]['choices'][$banking['value']['c-h-ob-s']];

			$banking_val = (int) $banking['value']['c-h-ob-f'] ? $banking_free : $banking_pay;

			ob_start(); ?>

			<div class="card-single-chars-item-single"><?php echo esc_html( $banking_val ) ?></div>

			<?php

			$_item_content = ob_get_clean();

			get_template_part( 'template-parts/card/single/chars', 'item' );

		endif;

	endif; ?>

</div>
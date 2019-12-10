<h2 class="card-single-subtitle"><?php _e( 'Conditions', 'cardsbanking' ) ?></h2>

<?php

if ( function_exists('get_field_object') ) :

	global $_item_title, $_item_content;


	/**
	 * Card loan terms
	 */
	
	$card_loan            = get_field_object( 'c-co-c' );
	$card_loan_percent_is = $card_loan['value']['c-co-c-p'];
	$card_loan_pref_is    = $card_loan['value']['c-co-c-gp'];
	$card_loan_limit_is   = $card_loan['value']['c-co-c-l'];
	$_item_title          = $card_loan['label'];


	if ( ! empty($card_loan) ) :
		ob_start(); ?>

		<ul class="card-single-chars-item-list row">
			<?php if ( $card_loan_percent_is ) : ?>
				<li class="col-md-4">
					<?php echo esc_html( $card_loan['sub_fields'][0]['label'] ) ?><br>
					<?php if ( ! empty($card_loan['value']['c-co-c-pf']) ) : ?>
						<b><?php echo sprintf( __( 'from %s', 'cardsbanking' ), $card_loan['value']['c-co-c-pf'] ) . esc_html( $card_loan['sub_fields'][1]['append'] ) ?></b> 
					<?php endif; ?>

					<?php if ( ! empty($card_loan['value']['c-co-c-pt']) ) : ?>
						<b><?php echo sprintf( __( 'to %s', 'cardsbanking' ), $card_loan['value']['c-co-c-pt'] ) . esc_html( $card_loan['sub_fields'][2]['append'] ) ?></b>
					<?php endif; ?>
				</li>
			<?php endif; ?>

			<?php if ( $card_loan_pref_is ) : ?>
				<li class="col-md-4">
					<?php echo esc_html( $card_loan['sub_fields'][3]['label'] ) ?><br>
					<?php if ( ! empty($card_loan['value']['c-co-c-gpn']) ) : ?>
						<b><?php echo $card_loan['value']['c-co-c-gpn'] .' '. esc_html( $card_loan['sub_fields'][4]['append'] ) ?></b> 
					<?php endif; ?>
				</li>
			<?php endif; ?>

			<?php if ( $card_loan_limit_is ) : ?>
				<li class="col-md-4">
					<?php echo esc_html( $card_loan['sub_fields'][5]['label'] ) ?><br>
					<b>
						<?php if ( ! empty($card_loan['value']['c-co-c-lf']) ) : ?>
							<?php printf( __( 'from %s', 'cardsbanking' ), $card_loan['value']['c-co-c-lf'] ) ?> 
						<?php endif; ?>

						<?php if ( ! empty($card_loan['value']['c-co-c-lt']) ) : ?>
							<?php printf( __( 'to %s', 'cardsbanking' ), $card_loan['value']['c-co-c-lt'] ) ?> 
						<?php endif; ?>

						<?php if ( ! empty($card_loan['value']['c-co-c-lf']) || ! empty($card_loan['value']['c-co-c-lt']) ) : ?>
							<?php echo esc_html( $card_loan['sub_fields'][6]['append'] ) ?>
						<?php endif; ?>
					</b>
				</li>
			<?php endif; ?>
		</ul>


		<?php $_item_content = ob_get_clean();

		get_template_part( 'template-parts/card/single/box', 'item' );

	endif;


	/**
	 * Terms of receipt
	 */

	$terms_rec          = get_field_object( 'c-co-g' );
	$terms_rec_out_list = array();
	$_item_title        = $terms_rec['label'];


	/**
	 * Age
	 */
	$terms_rec_age_from = $terms_rec['value']['c-co-g-af'] ? sprintf( __( 'from %s', 'cardsbanking' ), $terms_rec['value']['c-co-g-af'] ) : '';

	$terms_rec_age_to   = $terms_rec['value']['c-co-g-at'] ? sprintf( _n( 'to %s year', 'to %s years', $terms_rec['value']['c-co-g-at'], 'cardsbanking' ), $terms_rec['value']['c-co-g-at'] ) : '';

	if ( $terms_rec_age_from || $terms_rec_age_to ) {
		$terms_rec_out_list[] = __( 'Age', 'cardsbanking' ) .' <b>'. esc_html( $terms_rec_age_from ) .' '. esc_html( $terms_rec_age_to ) .'</b>';
	}


	/**
	 * Citizenship
	 */
	$citship = $terms_rec['sub_fields'][2]['choices'][$terms_rec['value']['c-co-g-gr']];

	$terms_rec_out_list[] = '<b>'. esc_html( $citship ) .'</b>';


	/**
	 * Registration issuance
	 */
	$reg_iss = $terms_rec['sub_fields'][3]['choices'][$terms_rec['value']['c-co-g-ci']];

	$terms_rec_out_list[] = $terms_rec['sub_fields'][3]['label'] .': <b>'. esc_html( $reg_iss ) .'</b>';


	/**
	 * Required documents
	 */
	$req_docs_arr      = $terms_rec['value']['c-co-g-dt'];
	$req_docs_data_arr = array();

	foreach ($req_docs_arr as $req_doc) {
		$req_docs_data_arr[] = esc_html( $terms_rec['sub_fields'][4]['choices'][$req_doc] );
	}


	/**
	 * Delivery and receipt
	 */
	$delivery_rec_arr      = $terms_rec['value']['c-co-g-dp'];
	$delivery_rec_data_arr = array();

	foreach ($delivery_rec_arr as $delivery_rec) {
		$delivery_rec_data_arr[] = $terms_rec['sub_fields'][5]['choices'][$delivery_rec];
	}

	$terms_rec_out_list[] =  $terms_rec['sub_fields'][5]['label'] .': <b>'. esc_html( implode(', ', $delivery_rec_data_arr) ) .'</b>';


	ob_start(); ?>

	<ul class="card-single-chars-item-list row">
		<?php foreach ($terms_rec_out_list as $terms_rec_out_item) : ?>
			<li class="col-md-6"><?php echo $terms_rec_out_item ?></li>
		<?php endforeach; ?>
	</ul>

	<?php if ( ! empty($req_docs_data_arr) ) : ?>
		<h3 class="card-single-box-title"><?php _e( 'Required documents', 'cardsbanking' ) ?></h3>

		<ul class="card-single-chars-item-list row _check">
			<?php foreach ($req_docs_data_arr as $req_docs_data_item) : ?>
				<li class="col-md-4"><?php echo $req_docs_data_item ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

	<?php $_item_content = ob_get_clean();

	get_template_part( 'template-parts/card/single/box', 'item' );


	/**
	 * Credit Additional requirements
	 */
	
	$credit_addit    = get_field_object( 'c-co-ad' );
	$credit_addit_is = $credit_addit['value']['c-co-ad-c'];
	$credit_addit_c  = $credit_addit['value']['c-co-ad-ct'];

	if ( $credit_addit_is ) :

		$_item_title = $credit_addit['label'];
		$_item_content = wpautop( $credit_addit_c );

		get_template_part( 'template-parts/card/single/box', 'item' );

	endif;


	/**
	 * Credit Card Terms
	 */
	
	$card_c_terms            = get_field_object( 'c-co-u' );
	$card_c_terms_loadrep_is = $card_c_terms['value']['c-co-u-c'];
	$card_c_terms_penalty_is = $card_c_terms['value']['c-co-u-p'];
	$card_c_terms_other_is   = $card_c_terms['value']['c-co-u-o'];

	if ( $card_c_terms_loadrep_is || $card_c_terms_penalty_is || $card_c_terms_other_is ) :

		$card_c_terms_out_list = array();

		if ( $card_c_terms_loadrep_is ) {
			$card_c_terms_out_list[] = array(
				'icon'    => 'cloan',
				'title'   => $card_c_terms['sub_fields'][0]['label'],
				'content' => $card_c_terms['value']['c-co-u-ct'],
			);
		}

		if ( $card_c_terms_penalty_is ) {
			$card_c_terms_out_list[] = array(
				'icon'    => 'cpenalty',
				'title'   => $card_c_terms['sub_fields'][2]['label'],
				'content' => $card_c_terms['value']['c-co-u-pt'],
			);
		}

		if ( $card_c_terms_other_is ) {
			$card_c_terms_out_list[] = array(
				'icon'    => 'cother',
				'title'   => $card_c_terms['sub_fields'][4]['label'],
				'content' => $card_c_terms['value']['c-co-u-ot'],
			);
		}


		$_item_title = $card_c_terms['label'];

		ob_start(); ?>

		<div class="card-single-chars-item">
			<?php foreach ($card_c_terms_out_list as $card_c_terms_out_list_item) : ?>
				<h3 class="card-single-box-title card-single-slist-item-title _<?php echo esc_attr( $card_c_terms_out_list_item['icon'] ) ?>"><?php echo esc_html( $card_c_terms_out_list_item['title'] ) ?></h3>

				<?php echo wpautop( $card_c_terms_out_list_item['content'] ) ?>
			<?php endforeach; ?>
		</div>

		<?php $_item_content = ob_get_clean();

		get_template_part( 'template-parts/card/single/box', 'item' );

	endif;


	/**
	 * Percent on the balance
	 */
	$percent_bal = get_field_object( 'c-co-po' );
	$_item_title = $percent_bal['label'];

	/**
	 * Accrual conditions
	 */
	$percent_bal_accc_arr = $percent_bal['value']['c-co-po-u'];

	/**
	 * Accrual Features
	 */
	$percent_bal_accf_is = $percent_bal['value']['c-co-po-o'];
	$percent_bal_accf    = $percent_bal['value']['c-co-po-ot'];


	if ( ! empty($percent_bal_accc_arr) || ! empty($percent_bal_accf_is) ) :
		ob_start(); ?>

		<?php if ( ! empty($percent_bal_accc_arr) ) : ?>
			<div class="table-responsive-sm">
				<table class="table">
					<thead class="thead-light">
						<tr>
							<th scope="col"><?php echo esc_html( $percent_bal['sub_fields'][0]['sub_fields'][0]['label'] ) ?></th>
							<th scope="col" class="text-center"><?php echo esc_html( $percent_bal['sub_fields'][0]['sub_fields'][1]['label'] ) ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($percent_bal_accc_arr as $percent_bal_accc_item) : ?>
							<tr>
								<td><?php echo esc_html( $percent_bal_accc_item['c-co-po-usu'] ) ?></td>
								<td class="text-center"><?php echo esc_html( $percent_bal_accc_item['c-co-po-usp'] ) ?><?php echo esc_html( $percent_bal['sub_fields'][0]['sub_fields'][1]['append'] ) ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		<?php endif; ?>

		<?php if ( $percent_bal_accf_is ) : ?>
			<h3 class="card-single-box-title"><?php echo esc_html( $percent_bal['sub_fields'][1]['label'] ) ?></h3>

			<?php echo wpautop( $percent_bal_accf ); ?>
		<?php endif; ?>

		<?php $_item_content = ob_get_clean();

		get_template_part( 'template-parts/card/single/box', 'item' );

	endif;


	/**
	 * Overdraft
	 */
	$overdraft   = get_field_object( 'c-co-od' );
	$_item_title = $overdraft['label'];

	/**
	 * Terms of Service
	 */
	$overdraft_ts_arr = $overdraft['value']['c-co-od-u'];

	/**
	 * Features of use
	 */
	$overdraft_fu_is = $overdraft['value']['c-co-od-o'];
	$overdraft_fu    = $overdraft['value']['c-co-od-ot'];


	if ( ! empty($overdraft_ts_arr) || ! empty($overdraft_fu_is) ) :
		ob_start(); ?>

		<?php if ( ! empty($overdraft_ts_arr) ) : ?>
			<div class="table-responsive-sm">
				<table class="table">
					<thead class="thead-light">
						<tr>
							<th scope="col"><?php echo esc_html( $overdraft['sub_fields'][0]['sub_fields'][0]['label'] ) ?></th>
							<th scope="col"><?php echo esc_html( $overdraft['sub_fields'][0]['sub_fields'][1]['label'] ) ?></th>
							<th scope="col"><?php echo esc_html( $overdraft['sub_fields'][0]['sub_fields'][2]['label'] ) ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($overdraft_ts_arr as $overdraft_ts_arr_item) : ?>
							<tr>
								<td><?php echo esc_html( $overdraft_ts_arr_item['c-co-od-usu'] ) ?></td>
								<td><?php echo esc_html( $overdraft_ts_arr_item['c-co-od-usr'] ) ?></td>
								<td><?php echo esc_html( $overdraft_ts_arr_item['c-co-od-uc'] ) ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		<?php endif; ?>

		<?php if ( $overdraft_fu_is ) : ?>
			<h3 class="card-single-box-title"><?php echo esc_html( $overdraft['sub_fields'][1]['label'] ) ?></h3>

			<?php echo wpautop( $overdraft_fu ); ?>
		<?php endif; ?>

		<?php $_item_content = ob_get_clean();

		get_template_part( 'template-parts/card/single/box', 'item' );

	endif;


	/**
	 * Card Features
	 */
	$card_feat_is = get_field_object( 'c-co-o' );

	if ( $card_feat_is['value'] ) :
		ob_start();

		$card_feat = get_field( 'c-co-ot' );

		echo wpautop( $card_feat );

		$_item_title   = $card_feat_is['label'];
		$_item_content = ob_get_clean();

		get_template_part( 'template-parts/card/single/box', 'item' );

	endif;

endif;

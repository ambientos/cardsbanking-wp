<?php

if ( function_exists('get_field_object') ) :

	global $_item_icon, $_item_content;

	$advdis_out_list = array();

	/**
	 * Advantages
	 */
	$adv       = get_field_object( 'c-pl' );
	$adv_title = '+ '. $adv['label'];
	$adv_is    = ! empty($adv['value']);

	
	/**
	 * Disadvantages
	 */
	$dis       = get_field_object( 'c-ml' );
	$dis_title = '&minus; '. $dis['label'];
	$dis_is    = ! empty($dis['value']);


	if ( $adv_is || $dis_is ) : ?>

		<h2 class="card-single-subtitle"><?php _e( 'Advantages and disadvantages', 'cardsbanking' ) ?></h2>

		<?php if ( $adv_is ) : ?>
			<h3 class="card-single-box-title"><?php echo esc_html( $adv_title ) ?></h3>

			<div class="row">
				<?php foreach ($adv['value'] as $adv_item) : ?>
					<?php

					$_item_icon    = 'adv';
					$_item_content = $adv_item['c-pl-i'];

					get_template_part( 'template-parts/card/single/advdis', 'item' );

					?>
				<?php endforeach; ?>
			</div>

		<?php endif; ?>

		<?php if ( $dis_is ) : ?>
			<h3 class="card-single-box-title"><?php echo esc_html( $dis_title ) ?></h3>

			<div class="row">
				<?php foreach ($dis['value'] as $dis_item) : ?>
					<?php

					$_item_icon    = 'dis';
					$_item_content = $dis_item['c-ml-i'];

					get_template_part( 'template-parts/card/single/advdis', 'item' );

					?>
				<?php endforeach; ?>
			</div>

		<?php endif; ?>

	<?php endif;

endif;
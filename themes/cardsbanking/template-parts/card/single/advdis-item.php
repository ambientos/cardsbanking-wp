<?php global $_item_icon, $_item_content; ?>

<div class="card-single-box-wrap col-md-4">
	<div class="card-single-box card-single-box-bg d-flex _<?php echo esc_attr( $_item_icon ) ?>">
		<div class="card-single-box-bg-inner">
			<?php echo esc_html( $_item_content ) ?>
		</div>
	</div>
</div>
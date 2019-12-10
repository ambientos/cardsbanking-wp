<?php global $_item_icon, $_item_cols, $_item_title, $_item_content; ?>

<div class="card-single-box-wrap col-md-<?php echo esc_attr( $_item_cols ) ?>">
	<div class="card-single-box d-flex">
		<div class="card-single-box-inner">
			<div class="card-single-chars-item">
				<h3 class="card-single-box-title card-single-chars-item-title _<?php echo esc_attr( $_item_icon ) ?>"><?php echo esc_html( $_item_title ) ?></h3>

				<?php echo $_item_content; ?>
			</div>
		</div>
	</div>
</div>
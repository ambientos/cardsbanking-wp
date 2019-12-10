<?php global $_item_title, $_item_content; ?>

<div class="card-single-box-wrap">
	<div class="card-single-box">
		<div class="card-single-box-inner">
			<?php if ( isset($_item_title) && ! empty($_item_title) ) : ?>
				<h3 class="card-single-box-title"><?php echo esc_html( $_item_title ) ?></h3>
			<?php endif; ?>

			<?php

			if ( isset($_item_content) ) :
				echo $_item_content;

			endif;

			?>
		</div>
	</div>
</div>
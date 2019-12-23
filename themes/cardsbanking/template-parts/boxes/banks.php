<?php

/**
 * Banks list
 */
$banks_list = get_field('bs-l', 'option');

?>

<?php if ( ! empty($banks_list) ) : ?>
	<aside class="widget _carousel">
		<div
			class="carousel-container"
			data-margin="30"
			data-autoplay="1"
			data-loop="1"
			data-items="4"
			data-nav="1"
			data-nav-container="#nav-banks">
			<div class="container">
				<div class="d-sm-flex justify-content-sm-end">
					<div id="nav-banks" class="carousel-nav"></div>
				</div>

				<div class="carousel owl-carousel _wide">
					<?php foreach ($banks_list as $bank_term) : ?>
							<?php

							set_query_var( 'bank-term', $bank_term );

							get_template_part( 'template-parts/archive/banks', 'item' );

							?>

					<?php endforeach; ?>
				</div>
			</div>			
		</div>

		<div class="entry-more d-flex justify-content-center">
			<a href="<?php echo site_url( '/banks' ) ?>"><?php _e( 'All Banks', 'cardsbanking' ) ?></a>
		</div>
	</aside>
<?php endif; ?>
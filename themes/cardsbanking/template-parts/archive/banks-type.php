<?php

/**
 * Current object term
 */
$bank_term = get_queried_object();

/**
 * Get Output data
 */
$output_data = AG_Cb_Site\Card::get_cards_for_bank( $bank_term );

/**
 * Predefined output texts
 *
 * @var array
 */
$cards = array(
	'debit' => array(
		'title'      => __( 'Debit category', 'cardsbanking' ),
		'more_title' => __( 'Show all Debit Cards', 'cardsbanking' ),
	),
	'credit' => array(
		'title'      => __( 'Credit category', 'cardsbanking' ),
		'more_title' => __( 'Show all Credit Cards', 'cardsbanking' ),
	),
);

?>

<?php foreach ($cards as $cards_type => $cards_item) : ?>
	<?php if ( ! empty( $output_data[ $cards_type ] ) ) : ?>
		<div class="card-grid-list-container _<?php echo $cards_type ?>">
			<div class="container">
				<h2 class="card-grid-list-title"><?php echo $cards_item['title'] ?></h2>

				<div class="card-grid-list _short row">
					<?php

					while ( $output_data[ $cards_type ]['query']->have_posts() ) :
						$output_data[ $cards_type ]['query']->the_post();
					?>
						<div class="col-lg-4 col-md-6 d-sm-flex">
							<div class="card-grid-item box-item">
								<?php

								set_query_var( 'card-options-limit', 4 );
								set_query_var( 'card-type', 'short' );
								set_query_var( 'card-icon', 'yes' );
								set_query_var( 'card-size', 'sm' );

								get_template_part( 'template-parts/card/loop/item', 'short' );

								?>
							</div>
						</div>

					<?php endwhile; wp_reset_postdata(); ?>
				</div>

				<div class="card-grid-more">
					<a href="<?php echo esc_url( get_term_link( $output_data[ $cards_type ]['term'], 'category' ) ) ?>"><?php echo $cards_item['more_title'] ?></a>
				</div>
			</div>
		</div>

	<?php endif; ?>

<?php endforeach; ?>
<?php

if ( ! is_sub_bank_term() ) {
	return;
}

$cards_query = AG_Cb_Site\Card::get_cards_by_term(
	get_queried_object(),
	array(
		'posts_per_page' => -1,
	)
);

?>

<?php if ( $cards_query->have_posts() ) : ?>
	<div class="card-wide-list">
		<?php while ( $cards_query->have_posts() ) : ?>
			<?php $cards_query->the_post(); ?>

			<?php

			set_query_var( 'card-type', 'column' );
			set_query_var( 'card-icon', 'yes' );
			set_query_var( 'card-size', 'md' );

			get_template_part( 'template-parts/card/loop/item-wide' );

			?>
		<?php endwhile; ?>
	</div>
<?php endif; ?>
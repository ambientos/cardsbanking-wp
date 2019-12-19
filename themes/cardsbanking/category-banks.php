<?php get_header(); ?>

<main class="main">
	<div class="container">
		<div class="widget">
			<?php get_template_part( 'template-parts/archive/title', 'banks' ); ?>

			<?php

			$term_parent    = get_term_by( 'slug', 'banks', 'category' );
			$term_parent_id = is_object($term_parent) && isset($term_parent->term_id) ? $term_parent->term_id : 0;

			if ( $term_parent_id ) :

			?>
				<?php

				$bank_list = get_terms( array(
					'taxonomy' => 'category',
					'parent'   => $term_parent->term_id,
				) );

				if ( ! empty($bank_list) ) :

				?>
					<div class="posts-container row">
						<?php foreach ($bank_list as $bank_item) : set_query_var( 'bank-term', $bank_item ); ?>

							<div class="col-lg-3 col-md-4 col-sm-6 d-sm-flex">
								<?php get_template_part( 'template-parts/archive/banks', 'item' ); ?>
							</div>

						<?php endforeach; ?>
					</div>

				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>
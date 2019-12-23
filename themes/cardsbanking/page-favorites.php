<?php

/**
 * Template Name: Favorites List
 */

get_header();

?>

<main class="main">
	<div class="widget">
		<div class="container">
			<header>
				<?php the_title( '<h1 class="widget-title">', '</h1>' ); ?>
			</header>
		</div>

		<div class="container">
			<?php

			$favorites_list = get_user_favorites();

			if ( ! empty($favorites_list) ) :

			?>
				<div class="card-grid-list-container">
					<div class="card-grid-list row">
						<?php foreach ($favorites_list as $favorites_post_id) : ?>
							<?php

							$post = get_post( (int) $favorites_post_id );
							setup_postdata($post);

							?>

							<div class="col-lg-4 col-md-6 d-sm-flex">
								<div class="card-grid-item box-item d-flex">
									<?php

									set_query_var( 'card-options-limit', 4 );
									set_query_var( 'card-type', 'short' );
									set_query_var( 'card-size', 'sm' );

									get_template_part( 'template-parts/card/loop/item', 'short' );

									?>
								</div>
							</div>
						<?php endforeach; wp_reset_postdata(); ?>
					</div>
				</div>
			<?php else : ?>
				<?php get_template_part( 'template-parts/archive/favorites', 'none' ); ?>
			<?php endif; ?>
		</div>
	</div>
</main>

<?php get_footer(); ?>
<?php

/**
 * Custom type additional class
 */
$type_class  = ! empty( get_query_var( 'card-type' ) ) ? '_'. get_query_var( 'card-type' ) : '';
$size_class  = ! empty( get_query_var( 'card-size' ) ) ? '_'. get_query_var( 'card-size' ) : '';

$classes_arr = array( $type_class, $size_class );
$classes     = ' '. implode(' ', $classes_arr);

/**
 * Order link
 */
$order_link = get_post_meta( get_the_ID(), 'c-order', true );

/**
 * More link
 */
$more_link_meta = get_post_meta( get_the_ID(), 'c-overview', true );
$more_link      = ! empty($more_link_meta) ? $more_link_meta : get_permalink();

?>

<article class="card-item-container<?php echo esc_attr( $classes ) ?>">
	<div class="row align-items-center">
		<figure class="card-item-thumb<?php echo esc_attr( $classes ) ?> col-md-4">
			<?php the_post_thumbnail( 'card-thumb' ) ?>
		</figure>

		<div class="card-item-content<?php echo esc_attr( $classes ) ?> col-md-8">
			<header class="card-item-header row justify-content-between">
				<h1 class="card-item-title<?php echo esc_attr( $classes ) ?> col-md-9">
					<?php the_title() ?>
				</h1>
				<div class="card-item-nav<?php echo esc_attr( $classes ) ?> col-md-3">
					<?php get_template_part( 'template-parts/card/loop/nav' ) ?>
				</div>
			</header>

			<?php get_template_part( 'template-parts/card/loop/options' ); ?>

			<footer class="card-item-footer<?php echo esc_attr( $classes ) ?> d-flex align-items-center">
				<div class="card-item-order<?php echo esc_attr( $classes ) ?>">
					<a href="<?php echo esc_url( $order_link ) ?>" class="btn-primary btn"><?php _e( 'Order', 'cardsbanking' ) ?></a>
				</div>

				<div class="card-item-more<?php echo esc_attr( $classes ) ?>">
					<a href="<?php echo esc_url( $more_link ) ?>" class="btn-link btn"><?php _e( 'More', 'cardsbanking' ) ?></a>
				</div>
			</footer>
		</div>
	</div>
</article>
<?php

/**
 * Custom type additional class
 */
$type_class  = '_short';

$classes_arr = array( $type_class );
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

<article class="card-item-container d-flex flex-column<?php echo esc_attr( $classes ) ?>">
	<figure class="card-item-thumb<?php echo esc_attr( $classes ) ?>">
		<?php the_post_thumbnail( 'card-thumb', array( 'class' => 'img-fluid img-block' ) ) ?>
	</figure>

	<div class="card-item-content d-flex flex-column<?php echo esc_attr( $classes ) ?>">
		<header class="card-item-header">
			<h1 class="card-item-title<?php echo esc_attr( $classes ) ?>">
				<?php the_title() ?>
			</h1>
		</header>

		<?php get_template_part( 'template-parts/card/loop/options' ); ?>

		<footer class="card-item-footer<?php echo esc_attr( $classes ) ?> d-flex align-items-center">
			<?php if ( ! empty($order_link) ) : ?>
				<div class="card-item-order<?php echo esc_attr( $classes ) ?>">
					<a href="<?php echo esc_url( $order_link ) ?>" class="btn-primary btn"><?php _e( 'Order', 'cardsbanking' ) ?></a>
				</div>
			<?php endif; ?>

			<?php if ( ! empty($more_link) ) : ?>
				<div class="card-item-more<?php echo esc_attr( $classes ) ?>">
					<a href="<?php echo esc_url( $more_link ) ?>" class="btn-link btn"><?php _e( 'More', 'cardsbanking' ) ?></a>
				</div>
			<?php endif; ?>
		</footer>
	</div>
</article>
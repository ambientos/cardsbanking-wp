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

?>

<article class="card-item-container d-flex flex-column<?php echo esc_attr( $classes ) ?>">
	<figure class="card-item-thumb<?php echo esc_attr( $classes ) ?>">
		<?php the_post_thumbnail( 'card-thumb', array( 'class' => 'img-fluid img-block' ) ) ?>

		<div class="card-item-nav <?php echo $type_class ?>">
			<?php get_template_part( 'template-parts/card/loop/nav' ) ?>
		</div>
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
					<a href="<?php echo esc_url( $order_link ) ?>" class="btn-primary btn" target="_blank"><?php _e( 'Order', 'cardsbanking' ) ?></a>
				</div>
			<?php endif; ?>

			<div class="card-item-more<?php echo esc_attr( $classes ) ?>">
				<a href="<?php echo esc_url( get_permalink() ) ?>" class="btn-link btn"><?php _e( 'More', 'cardsbanking' ) ?></a>
			</div>
		</footer>
	</div>
</article>
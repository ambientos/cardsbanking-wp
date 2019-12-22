<?php

/**
 * Postfix field option name
 */
$cards_type = get_query_var( 'cards-home-type', 'c' );

/**
 * Set navigate id selector for carousel
 */
$navigate_id = get_query_var( 'navigate-id', 'nav-1' );

/**
 * Cards list
 */
$cards_list = get_field('c'. $cards_type .'-l', 'option');

/**
 * Add gray background for debit card container
 */
$classes = 'd' === $cards_type ? ' _gray _carousel' : ' _carousel';

?>

<?php if ( ! empty($cards_list) ) : ?>
	<aside class="widget<?php echo $classes ?>">
		<div
			class="carousel-container"
			data-margin="30"
			data-autoplay="1"
			data-loop="1"
			data-items="3"
			data-nav="1"
			data-nav-container="<?php echo esc_attr( '#'. $navigate_id ) ?>">
			<div class="container">
				<div class="d-md-flex justify-content-md-between">
					<div class="widget-title-container">
						<h2 class="widget-title"><?php the_field('c'. $cards_type .'-t', 'option') ?></h2>
						<div class="widget-subtitle"><?php the_field('c'. $cards_type .'-st', 'option') ?></div>
					</div>
					<div id="<?php echo esc_attr( $navigate_id ) ?>" class="carousel-nav"></div>
				</div>

				<div class="carousel owl-carousel _wide">
					<?php foreach ($cards_list as $post) : setup_postdata( $post ); ?>
						<div class="box-item d-flex">
							<?php

							set_query_var( 'card-options-limit', 4 );
							set_query_var( 'card-type', 'short' );
							set_query_var( 'card-size', 'sm' );

							get_template_part( 'template-parts/card/loop/item', 'short' );

							?>
						</div>

					<?php endforeach; wp_reset_postdata(); ?>
				</div>
			</div>			
		</div>
	</aside>
<?php endif; ?>
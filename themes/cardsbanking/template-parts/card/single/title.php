<?php

$h1_hide       = 'checked' == get_post_meta( $post->ID, 'h1_hide', true );

$is_show_thumb = ( 'yes' == root_get_option( 'structure_single_thumb' ) ? true : false );

$thumb_hide    = 'checked' == get_post_meta( $post->ID, 'thumb_hide', true );

/**
 * Order link
 */
$order_link = get_post_meta( get_the_ID(), 'c-order', true );

?>

<header class="entry-header">
	<?php if ( ! $h1_hide ) : ?>
		<?php do_action( 'root_single_before_title' ); ?>
		<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
		<?php do_action( 'root_single_after_title' ); ?>
	<?php endif; ?>
</header>

<div class="row justify-content-md-center">
	<?php if ( ! $thumb_hide ) : ?>
		<div class="col-xl-4 col-lg-5 col-md-6">
			<div class="card-single-thumb">
				<?php $thumb = get_the_post_thumbnail( $post->ID, 'card-thumb', array('class' => 'img-fluid img-block', 'itemprop'=>'image') ); if ( ! empty($thumb) && $is_show_thumb ): ?>
					<?php echo $thumb ?>
				<?php endif; ?>
				<div class="card-single-buttons d-flex justify-content-between">
					<?php if ( ! empty($order_link) ) : ?>
						<a href="<?php echo esc_url( $order_link ) ?>" class="btn-primary btn" target="_blank"><?php _e( 'Order Card', 'cardsbanking' ) ?></a> 
					<?php endif; ?>
					<a href="#" class="btn-contrast btn"><?php _e( 'Compare', 'cardsbanking' ) ?></a>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<div class="col-xl-6 col-lg-6 col-md-6">
		<?php

		set_query_var( 'card-type', 'single' );
		set_query_var( 'card-icon', 'yes' );

		get_template_part( 'template-parts/card/loop/options' );

		?>
	</div>
</div>
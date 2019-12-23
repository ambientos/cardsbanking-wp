<?php

/**
 * Intro content
 */
$is_intro = get_post_meta( get_the_ID(), 'c-v-c', true );

/**
 * Detailed review link
 */
$more_link_meta = get_post_meta( get_the_ID(), 'c-overview', true );

if ( $is_intro ) :
	$intro = get_post_meta( get_the_ID(), 'c-t1', true );

?>

<h2 class="card-single-subtitle"><?php _e( 'Introduction', 'cardsbanking' ) ?></h2>

<?php

echo wpautop( $intro );

endif; ?>

<?php if ( ! empty($more_link_meta) ) : ?>
	<div class="entry-more">
		<a href="<?php echo esc_url( $more_link_meta ) ?>" target="_blank"><?php _e( 'Detailed review', 'cardsbanking' ) ?></a>
	</div>

<?php endif; ?>
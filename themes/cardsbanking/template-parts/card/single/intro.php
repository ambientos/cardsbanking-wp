<?php

$is_intro = get_post_meta( get_the_ID(), 'c-v-c', true );

if ( $is_intro ) :
	$intro = get_post_meta( get_the_ID(), 'c-t1', true );

?>

<h2 class="card-single-subtitle"><?php _e( 'Introduction', 'cardsbanking' ) ?></h2>

<?php echo wpautop( $intro ) ?>

<?php

endif;
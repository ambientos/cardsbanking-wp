<?php

/**
 * Custom type additional class
 */
$type_class  = ! empty( get_query_var( 'card-type' ) ) ? '_'. get_query_var( 'card-type' ) : '';
$size_class  = ! empty( get_query_var( 'card-size' ) ) ? '_'. get_query_var( 'card-size' ) : '';

$classes_arr = array( $type_class, $size_class );
$classes     = ' '. implode(' ', $classes_arr);

?>

<a href="" class="card-item-nav-item<?php echo $classes ?>" title="<?php echo esc_attr( __( 'Add to Comparison', 'cardsbanking' ) ) ?>">
	<button>
		<?php echo file_get_contents( get_stylesheet_directory_uri() .'/i/comparison.svg' ); ?>
		<span class="screen-reader-text"><?php _e( 'Comparison', 'cardsbanking' ) ?></span>
	</button>
</a>

<span class="card-item-nav-item<?php echo $classes ?>" title="<?php echo esc_attr( __( 'Add Card to Favorite List', 'cardsbanking' ) ) ?>">
	<?php the_favorites_button() ?>
</span>
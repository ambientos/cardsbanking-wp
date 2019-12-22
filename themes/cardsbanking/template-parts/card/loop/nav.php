<?php

/**
 * Custom type additional class
 */
$type_class  = ! empty( get_query_var( 'card-type' ) ) ? '_'. get_query_var( 'card-type' ) : '';
$size_class  = ! empty( get_query_var( 'card-size' ) ) ? '_'. get_query_var( 'card-size' ) : '';

$classes_arr = array( $type_class, $size_class );
$classes     = ' '. implode(' ', $classes_arr);

?>

<a href="" class="card-item-nav-item<?php echo $classes ?>">
	<?php echo file_get_contents( get_stylesheet_directory_uri() .'/i/comparison.svg' ); ?>
	<span class="screen-reader-text"><?php _e( 'Comparison', 'cardsbanking' ) ?></span>
</a>
<a href="" class="card-item-nav-item<?php echo $classes ?>">
	<?php echo file_get_contents( get_stylesheet_directory_uri() .'/i/favorites.svg' ); ?>
	<span class="screen-reader-text"><?php _e( 'Favorites', 'cardsbanking' ) ?></span>
</a>
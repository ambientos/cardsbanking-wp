<?php

$bank_term = get_query_var( 'bank-term' );

if ( empty($bank_term) ) {
	return;
}

/**
 * Category link
 */
$bank_permalink = get_term_link( $bank_term, 'category' );

/**
 * Category Thumbnail
 */
$bank_thumb_id = get_term_meta( $bank_term->term_id, 'c-i', true );
$bank_thumb    = wp_get_attachment_image( $bank_thumb_id, 'bank-thumb', false, array('class' => 'img-fluid') );

?>

<a href="<?php echo esc_url( $bank_permalink ) ?>" class="posts-item box-item">
	<?php if ( (int) $bank_thumb_id ) : ?>
		<figure class="posts-item-thumbnail _short d-flex justify-content-center align-items-center">
			<?php echo $bank_thumb; ?>
		</figure>
	<?php endif; ?>

	<div class="posts-item-title _short">
		<?php echo $bank_term->name ?>
	</div>
</a>
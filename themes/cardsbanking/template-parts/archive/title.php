<header>
	<?php do_action( 'root_archive_before_title' ); ?>
	<?php the_archive_title( '<h1 class="widget-title">', '</h1>' ); ?>
	<?php do_action( 'root_archive_after_title' ); ?>

	<?php $taxonomy_description = get_the_archive_description(); if ( ! empty( $taxonomy_description ) ) : ?>
		<div class="important">
			<div class="important-inner">
				<?php echo $taxonomy_description; ?>
			</div>
		</div>
	<?php endif; ?>
		
	<?php if ( 'top' == root_get_option( 'structure_archive_description' ) && ! is_paged() ) the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
</header>
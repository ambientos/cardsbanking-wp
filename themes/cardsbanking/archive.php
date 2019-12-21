<?php get_header(); ?>

<?php if ( root_get_option( 'structure_archive_breadcrumbs' ) == 'yes' ) : ?>
	<div class="container">
		<?php get_template_part( 'template-parts/boxes/breadcrumbs' ); ?>
	</div>
<?php endif; ?>

<main class="main">
	<div class="widget">
		<div class="container">
			<?php get_template_part( 'template-parts/archive/title' ); ?>
		</div>

		<?php get_template_part( 'template-parts/archive/banks', 'type' ); ?>

		<div class="container">
			<?php

			$is_term_bank = get_term_meta( get_queried_object_id(), 'c-b', true );

			if ( (bool) $is_term_bank ) :

			?>
				<h2 class="widget-title"><?php _e( 'Latest Bank Articles', 'cardsbanking' ) ?></h2>
			<?php endif; ?>

			<?php get_template_part( 'template-parts/archive/posts' ); ?>
		</div>
	</div>

	<?php get_template_part( 'template-parts/archive/bottom' ); ?>
</main>

<?php get_footer(); ?>
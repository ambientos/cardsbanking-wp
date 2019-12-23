<?php get_header(); ?>

<?php if ( root_get_option( 'structure_archive_breadcrumbs' ) == 'yes' ) : ?>
	<div class="container">
		<?php get_template_part( 'template-parts/boxes/breadcrumbs' ); ?>
	</div>
<?php endif; ?>

<main class="main">
	<div class="widget">
		<div class="container">
			<header>
				<?php get_template_part( 'template-parts/archive/title' ); ?>
			</header>
		</div>

		<?php get_template_part( 'template-parts/archive/banks', 'type' ); ?>

		<div class="container">
			<?php if ( is_bank_term( get_queried_object_id() ) ) : ?>
				<h2 class="widget-title"><?php _e( 'Latest Bank Articles', 'cardsbanking' ) ?></h2>
			<?php endif; ?>

			<?php get_template_part( 'template-parts/archive/cards' ); ?>

			<?php get_template_part( 'template-parts/archive/posts' ); ?>
		</div>
	</div>

	<?php get_template_part( 'template-parts/archive/bottom' ); ?>
</main>

<?php get_footer(); ?>
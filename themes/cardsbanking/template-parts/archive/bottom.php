<?php if ( 'bottom' == root_get_option( 'structure_archive_description' ) && ! is_paged() && function_exists('get_field') ) : ?>
	<?php $addict_description = get_field('c-d', get_queried_object()); if ( ! empty($addict_description) ) : ?>
		<div class="widget _gray">
			<div class="container">
				<?php echo $addict_description ?>
			</div>
		</div>
	<?php endif; ?>
<?php endif; ?>
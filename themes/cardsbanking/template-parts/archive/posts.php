<?php if ( have_posts() ) : ?>
	<?php do_action( 'root_archive_before_posts' ); ?>
	<?php get_template_part('template-parts/layout/archive'); ?>
	<?php do_action( 'root_archive_after_posts' ); ?>

	<?php the_posts_pagination(); ?>
<?php elseif ( is_sub_bank_term() ) : // just show nothing ?>
<?php else : ?>
	<?php get_template_part( 'template-parts/content', 'none' ); ?>
<?php endif; ?>
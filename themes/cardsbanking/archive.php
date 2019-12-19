<?php get_header(); ?>

<?php if ( root_get_option( 'structure_archive_breadcrumbs' ) == 'yes' ) : ?>
    <div class="container">
        <?php get_template_part( 'template-parts/boxes/breadcrumbs' ); ?>
    </div>
<?php endif; ?>

<main class="main">
    <div class="container">
        <div class="widget">
            <?php get_template_part( 'template-parts/archive/title' ); ?>

            <?php get_template_part( 'template-parts/archive/posts' ); ?>
        </div>
    </div>

    <?php get_template_part( 'template-parts/archive/bottom' ); ?>
</main>

<?php get_footer(); ?>
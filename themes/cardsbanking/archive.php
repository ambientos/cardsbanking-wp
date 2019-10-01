<?php get_header(); ?>

<?php if ( root_get_option( 'structure_archive_breadcrumbs' ) == 'yes' ) : ?>
    <div class="container">
        <?php get_template_part( 'template-parts/boxes/breadcrumbs' ); ?>
    </div>
<?php endif; ?>

<main class="main">
    <div class="container">
        <div class="widget">
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

            <?php if ( have_posts() ) : ?>
                <?php do_action( 'root_archive_before_posts' ); ?>
                <?php get_template_part('template-parts/layout/archive'); ?>
                <?php do_action( 'root_archive_after_posts' ); ?>

                <?php the_posts_pagination(); ?>
            <?php else : ?>
                <?php get_template_part( 'template-parts/content', 'none' ); ?>
            <?php endif; ?>
        </div>
    </div>

    <?php if ( 'bottom' == root_get_option( 'structure_archive_description' ) && ! is_paged() && function_exists('get_field') ) : ?>
        <?php $addict_description = get_field('c-d', get_queried_object()); if ( ! empty($addict_description) ) : ?>
            <div class="widget _gray">
                <div class="container">
                    <?php echo $addict_description ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
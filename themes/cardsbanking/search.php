<?php

get_header(); ?>

<?php if ( root_get_option( 'structure_archive_breadcrumbs' ) == 'yes' ) : ?>
    <div class="container">
        <?php get_template_part( 'template-parts/boxes/breadcrumbs' ); ?>
    </div>
<?php endif; ?>

<div class="container">
    <div class="row">
        <main class="main col-lg-8">
            <div class="widget">
                <header>
                    <h1 class="widget-title"><?php printf( esc_html__( 'Search Results for: %s', 'root' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                </header>

                <?php if ( have_posts() ) : ?>
                    <?php
                    get_template_part('template-parts/layout/archive', 'aside');

                    the_posts_pagination();

                else :

                    get_template_part( 'template-parts/content', 'none' );

                endif; ?>
            </div>
        </main>

        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>
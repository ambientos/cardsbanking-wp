<?php get_header(); ?>

<aside class="widget">
    <div class="container">
        <?php if ( have_posts() ) : ?>
            <h2 class="widget-title"><?php _e( 'New Posts', 'cardsbanking' ) ?></h2>
            <div class="widget-subtitle"><?php _e( 'Current reviews of banking products', 'cardsbanking' ) ?></div>

            <?php get_template_part( 'template-parts/layout/archive' ); ?>

            <?php //the_posts_pagination(); ?>

        <?php else : ?>

            <?php get_template_part( 'template-parts/content', 'none' ); ?>

        <?php endif; ?>
    </div>
</aside>

<main class="main">
    <article class="widget">
        <?php

        if ( function_exists('the_field') ) {
            the_field('fp-c', 'option');
        }

        ?>
    </article>
</main>

<?php get_footer(); ?>
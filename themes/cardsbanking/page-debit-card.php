<?php

/**
 * Template Name: Debit Card
 * Template Post Type: cb_card
 */

set_query_var( 'card_type', 'debit' );

get_header();

$breadcrumbs_hide = 'checked' == get_post_meta( $post->ID, 'breadcrumbs_hide', true );
?>

<?php if ( ! $breadcrumbs_hide ) : ?>
    <div class="container">
        <?php get_template_part( 'template-parts/boxes/breadcrumbs' ); ?>
    </div>
<?php endif; ?>

<div class="container">
    <main>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">
            <?php get_template_part( 'template-parts/card/title', 'single' ); ?>

            <div class="row">
                <div class="main entry col-lg-8">
                    <?php
                        the_post();

                        get_template_part( 'template-parts/card/content', 'single' );
                    ?>
                </div>

                <?php get_sidebar(); ?>
            </div>
        </article>
    </main>
</div>

<?php get_footer(); ?>

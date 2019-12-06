<?php

/**
 * Template Name: Debit Card
 * Template Post Type: cb_card
 */

get_header();

$is_show_thumb = ( 'yes' == root_get_option( 'structure_single_thumb' ) ? true : false );

$thumb_hide       = 'checked' == get_post_meta( $post->ID, 'thumb_hide', true );
$breadcrumbs_hide = 'checked' == get_post_meta( $post->ID, 'breadcrumbs_hide', true );
$h1_hide          = 'checked' == get_post_meta( $post->ID, 'h1_hide', true );
$comments_hide    = 'checked' == get_post_meta( $post->ID, 'comments_hide', true );
?>

<?php if ( ! $breadcrumbs_hide ) : ?>
    <div class="container">
        <?php get_template_part( 'template-parts/boxes/breadcrumbs' ); ?>
    </div>
<?php endif; ?>

<div class="container">
    <div class="row">
        <main class="main col-lg-8">
            <?php
                the_post();

                get_template_part( 'template-parts/card/content', 'single' );
            ?>
        </main>

        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>

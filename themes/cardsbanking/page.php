<?php get_header();

$is_show_thumb = ( 'yes' == root_get_option( 'structure_page_thumb' ) ? true : false );
$is_show_social = 'yes' == root_get_option( 'structure_page_social' );

$thumb_hide       = 'checked' == get_post_meta( $post->ID, 'thumb_hide', true );
$breadcrumbs_hide = 'checked' == get_post_meta( $post->ID, 'breadcrumbs_hide', true );
$h1_hide          = 'checked' == get_post_meta( $post->ID, 'h1_hide', true );
$share_top_hide   = 'checked' == get_post_meta( $post->ID, 'share_top_hide', true );
$comments_hide    = 'checked' == get_post_meta( $post->ID, 'comments_hide', true );
?>

<?php //if ( ! $breadcrumbs_hide ) : ?>
    <div class="container">
        <?php get_template_part( 'template-parts/boxes/breadcrumbs' ); ?>
    </div>
<?php //endif; ?>

<div class="container">
    <?php if ( root_get_option( 'structure_page_sidebar' ) != 'none' && 'checked' != get_post_meta( $post->ID, 'sidebar_hide', true ) ) : ?>
        <div class="row"><main class="main col-lg-8">
    <?php else : ?>
        <main class="main">
    <?php endif; ?>
        <div class="widget">
            <?php

                the_post();

                get_template_part( 'template-parts/content', 'page' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( root_get_option( 'structure_page_comments' ) == 'yes' ) {
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                }
            ?>
        </div>
    </main>

    <?php if ( root_get_option( 'structure_page_sidebar' ) != 'none' && 'checked' != get_post_meta( $post->ID, 'sidebar_hide', true ) ) : ?>
            <?php get_sidebar(); ?>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
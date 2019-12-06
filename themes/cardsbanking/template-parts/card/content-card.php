<?php

global $big_thumbnail_image;

$is_show_thumb          = 'yes' == root_get_option( 'structure_single_thumb' );
$is_show_date           = 'yes' == root_get_option( 'structure_single_date' );
$is_show_author         = 'yes' == root_get_option( 'structure_single_author' );

$h1_hide                = 'checked' == get_post_meta( $post->ID, 'h1_hide', true );
$thumb_hide             = 'checked' == get_post_meta( $post->ID, 'thumb_hide', true );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?> itemscope itemtype="http://schema.org/Article">
    <header class="entry-header">
        <?php if ( ! $h1_hide ) { ?>
            <?php do_action( 'root_single_before_title' ); ?>
            <?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
            <?php do_action( 'root_single_after_title' ); ?>
        <?php } ?>

        <?php if ( 'post' === get_post_type() ) : ?>
            <div class="entry-meta">
                <?php get_template_part( 'template-parts/post', 'meta' ) ?>
            </div>
        <?php endif; ?>
    </header>

    <?php if ( ! $thumb_hide ) { ?>
        <?php $thumb = get_the_post_thumbnail( $post->ID, 'full', array('class'=>'img-block img-fluid', 'itemprop'=>'image') ); if ( ! empty($thumb) && $is_show_thumb ): ?>
            <div class="entry-image">
                <?php echo $thumb ?>
            </div>
        <?php endif; ?>
    <?php } ?>

	<div class="entry-content" itemprop="articleBody">
		<?php

            do_action( 'root_single_before_the_content' );
			the_content();
            do_action( 'root_single_after_the_content' );

			wp_link_pages( array(
				'before'        => '<div class="page-links">' . esc_html__( 'Pages:', 'root' ),
				'after'         => '</div>',
                'link_before'   => '<span class="page-links__item">',
                'link_after'    => '</span>',
			) );
		?>
	</div>
</article>


<?php echo root_get_option( 'code_after_content' ) ?>

<div class="entry-footer"></div>

<?php if ( ! $is_show_author ) { ?>
    <meta itemprop="author" content="<?php the_author() ?>">
<?php } ?>
<?php if ( ! $is_show_date ) { ?>
    <meta itemprop="datePublished" content="<?php the_time('c') ?>"/>
<?php } ?>
<meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?php the_permalink() ?>" content="<?php the_title(); ?>">
<meta itemprop="dateModified" content="<?php the_modified_time('Y-m-d')?>">
<meta itemprop="datePublished" content="<?php the_time('c') ?>">
<?php echo get_microdata_publisher() ?>
<?php do_action( 'root_content_card_meta' ); ?>
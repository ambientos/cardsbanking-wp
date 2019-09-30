<?php

$is_show_date       = 'yes' == root_get_option( 'structure_posts_date' );
$is_show_author     = 'yes' == root_get_option( 'structure_posts_author' );
$is_show_excerpt    = 'yes' == root_get_option( 'structure_posts_excerpt' );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('posts-item box-item'); ?> itemscope itemtype="http://schema.org/BlogPosting">
    <?php $thumb = get_the_post_thumbnail($post->ID, 'thumb-big', array('class' => 'img-block img-fluid', 'itemprop'=>'image')); if (!empty($thumb)): ?>
        <figure class="posts-item-thumbnail">
            <a href="<?php the_permalink() ?>"><?php echo $thumb ?></a>
            <figcaption class="posts-item-category"><span itemprop="articleSection"><?php echo root_category( $post->ID, '', false, false ); ?></span></figcaption>
        </figure>
    <?php endif; ?>

    <header class="posts-item-title">
        <?php the_title( '<div class="entry-title" itemprop="name"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" itemprop="url"><span itemprop="headline">', '</span></a></div>' ) ?>
    </header>

    <?php if ( $is_show_excerpt ) : ?>
        <div class="posts-item-excerpt" itemprop="articleBody">
            <?php //the_excerpt(); ?>
            <?php

            add_filter('get_the_excerpt', 'remove_the_content_add_ad_filter', 9);
            echo do_excerpt( get_the_excerpt(), 14 );
            add_filter('get_the_excerpt', 'add_the_content_add_ad_filter', 11);

            ?>
        </div>
    <?php endif; ?>

    <?php if ( ! $is_show_excerpt ) { ?>
        <meta itemprop="articleBody" content="<?php echo get_the_excerpt() ?>">
    <?php } ?>
    <?php if ( ! $is_show_author ) { ?>
        <meta itemprop="author" content="<?php the_author() ?>">
    <?php } ?>
    <?php if ( ! $is_show_date ) { ?>
        <meta itemprop="datePublished" content="<?php the_time('c') ?>">
    <?php } ?>
    <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?php the_permalink() ?>" content="<?php the_title(); ?>">
    <meta itemprop="dateModified" content="<?php the_modified_time('Y-m-d')?>">
    <?php echo get_microdata_publisher() ?>

    <?php do_action( 'root_content_card_meta' ); ?>
</article>
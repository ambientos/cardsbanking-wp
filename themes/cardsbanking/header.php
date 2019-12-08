<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta name="HandheldFriendly" content="True" />
<meta name="format-detection" content="telephone=no" />
<meta name="format-detection" content="address=no" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<?php wp_head(); ?>
<?php echo root_get_option( 'code_head' ) ?>
</head>

<body <?php body_class(); ?>>

<header class="header">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-9 col-md-5 col-lg-4" itemscope itemtype="http://schema.org/WPHeader">
                <a class="header-logo logo d-flex align-items-center" href="<?php echo esc_url( home_url( '/' ) ) ?>">
                    <picture class="logo-thumb _aside"><img src="<?php echo get_stylesheet_directory_uri() ?>/i/logo.png" srcset="<?php echo get_stylesheet_directory_uri() ?>/i/logo.png, <?php echo get_stylesheet_directory_uri() ?>/i/logo@2x.png 2x" width="56" alt="<?php echo get_bloginfo('name') ?>"></picture>
                    <div class="logo-title">
                        <b>CardsBanking.ru</b> 
                        <span><?php _e( 'Credit Card Navigator', 'cardsbanking' ); ?></span>
                    </div>
                </a>
            </div>
            <div class="d-none d-md-block col-md-5 col-lg-4">
                <div class="header-search">
                    <form action="<?php echo esc_url( home_url( '/' ) ) ?>" method="get" role="search">
                        <input class="header-search-control form-control" type="text" name="s" placeholder="Поиск по сайту" value="">
                    </form>
                </div>
            </div>
            <div class="d-none d-lg-block col-lg-4">
                <?php get_template_part( 'template-parts/header/nav' ); ?>
            </div>
            <div class="d-flex d-lg-none justify-content-end col-3 col-md navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Раскрыть меню"><span class="navbar-toggler-icon"></span></button>
            </div>
        </div>
    </div>
</header>

<?php if ( is_front_page() ) : ?>
    <nav class="header-menu-container navbar navbar-light">
        <div class="container">
            <div id="main-navbar" class="collapse navbar-collapse">
                <?php get_template_part( 'template-parts/header/nav' ); ?>
            </div>
        </div>
    </nav>

    <?php if ( function_exists('the_field') ) : ?>

        <?php get_template_part( 'template-parts/boxes/menu-rating', 'home' ); ?>

        <?php get_template_part( 'template-parts/boxes/menu-info' ); ?>

    <?php endif; ?>

<?php else : ?>

    <nav class="header-menu-container navbar navbar-expand-lg navbar-light">
        <div class="container">
            <div id="main-navbar" class="collapse navbar-collapse">
                <?php wp_nav_menu( array(
                    'theme_location'  => 'cb_header_menu',
                    'menu_class'      => 'header-menu navbar-nav justify-content-between',
                    'item_spacing'    => 'discard',
                    'container'       => false,
                    'walker'          => new bs4navwalker(),
                ) ); ?>

                <div class="d-lg-none">
                    <?php get_template_part( 'template-parts/header/nav' ); ?>
                </div>
            </div>
        </div>
    </nav>

<?php endif; ?>

<?php
    $ad_options = get_option('root_ad_options');
    $ad_visible = ( ! empty( $ad_options['r_before_site_content_visible'] ) ) ? $ad_options['r_before_site_content_visible'] : array();

    $show_ad = false;
    if ( is_front_page()    && in_array('home', $ad_visible) )      $show_ad = true;
    if ( is_single()        && in_array('post', $ad_visible) )      $show_ad = true;
    if ( is_page()          && in_array('page', $ad_visible) )      $show_ad = true;
    if ( is_archive()       && in_array('archive', $ad_visible) )   $show_ad = true;
    if ( is_search()        && in_array('search', $ad_visible) )    $show_ad = true;

    if ( is_single() && in_array('post', $ad_visible) ) {
        $show_ad = do_show_ad(
            $post->ID,
            isset( $ad_options['r_before_site_content_exclude'] ) ? $ad_options['r_before_site_content_exclude'] : array(),
            isset( $ad_options['r_before_site_content_include'] ) ? $ad_options['r_before_site_content_include'] : array()
        );
    }

    if ( is_page() && in_array('page', $ad_visible) ) {
        $show_ad = do_show_ad(
            $post->ID,
            isset( $ad_options['r_before_site_content_exclude'] ) ? $ad_options['r_before_site_content_exclude'] : array(),
            isset( $ad_options['r_before_site_content_include'] ) ? $ad_options['r_before_site_content_include'] : array()
        );
    }

    if ( ! wp_is_mobile() && ! empty( $ad_options['r_before_site_content'] ) && $show_ad ) {
        echo '<div class="container"><div class="b-r b-r--before-site-content">' . do_shortcode( $ad_options['r_before_site_content'] ) . '</div></div>';
    }

    if ( wp_is_mobile() && ! empty( $ad_options['r_before_site_content_mob'] ) && $show_ad ) {
        echo '<div class="container"><div class="b-r b-r--before-site-content">' . do_shortcode( $ad_options['r_before_site_content_mob'] ) . '</div></div>';
    }
?>
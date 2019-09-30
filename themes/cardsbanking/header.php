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
                        <span>Навигатор по банковским картам</span>
                    </div>
                </a>
            </div>
            <div class="d-none d-md-block col-md-5">
                <div class="header-search">
                    <form action="<?php echo esc_url( home_url( '/' ) ) ?>" method="get" role="search">
                        <input class="header-search-control form-control" type="text" name="s" placeholder="Поиск по сайту" value="">
                    </form>
                </div>
            </div>
            <?php if ( ! is_front_page() ) : ?>
                <div class="d-flex d-lg-none justify-content-end col-3 col-md navbar-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Раскрыть меню"><span class="navbar-toggler-icon"></span></button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>

<?php if ( is_front_page() ) : ?>
    <aside class="widget" style="background-image:url(<?php echo get_stylesheet_directory_uri() ?>/t/1.jpg)">
        <div class="container">
            <div class="widget-title _main"><b>Путеводитель</b> в мире банковских карт</div>
            <div class="category-menu-container">
                <ul class="category-menu d-flex flex-wrap list-unstyled">
                    <li class="category-menu-item d-flex"><a class="category-menu-item-link" href="/"><span class="category-menu-item-i" style="background-image:url(<?php echo get_stylesheet_directory_uri() ?>/t/icons/credit.svg)"></span><span class="category-menu-item-title">Кредитные карты</span></a></li>
                    <li class="category-menu-item d-flex"><a class="category-menu-item-link" href="/"><span class="category-menu-item-i" style="background-image:url(<?php echo get_stylesheet_directory_uri() ?>/t/icons/debit.svg)"></span><span class="category-menu-item-title">Дебетовые карты</span></a></li>
                    <li class="category-menu-item d-flex"><a class="category-menu-item-link" href="/"><span class="category-menu-item-i" style="background-image:url(<?php echo get_stylesheet_directory_uri() ?>/t/icons/cashback.svg)"></span><span class="category-menu-item-title">С кэшбэком</span></a></li>
                    <li class="category-menu-item d-flex"><a class="category-menu-item-link" href="/"><span class="category-menu-item-i" style="background-image:url(<?php echo get_stylesheet_directory_uri() ?>/t/icons/free.svg)"></span><span class="category-menu-item-title">С бесплатным обслуживанием</span></a></li>
                    <li class="category-menu-item d-flex"><a class="category-menu-item-link" href="/"><span class="category-menu-item-i" style="background-image:url(<?php echo get_stylesheet_directory_uri() ?>/t/icons/grace.svg)"></span><span class="category-menu-item-title">С льготным периодом</span></a></li>
                    <li class="category-menu-item d-flex"><a class="category-menu-item-link" href="/"><span class="category-menu-item-i" style="background-image:url(<?php echo get_stylesheet_directory_uri() ?>/t/icons/salary.svg)"></span><span class="category-menu-item-title">Зарплатные</span></a></li>
                    <li class="category-menu-item d-flex"><a class="category-menu-item-link" href="/"><span class="category-menu-item-i" style="background-image:url(<?php echo get_stylesheet_directory_uri() ?>/t/icons/fund.svg)"></span><span class="category-menu-item-title">Накопительные</span></a></li>
                    <li class="category-menu-item d-flex"><a class="category-menu-item-link" href="/"><span class="category-menu-item-i" style="background-image:url(<?php echo get_stylesheet_directory_uri() ?>/t/icons/virtual.svg)"></span><span class="category-menu-item-title">Виртуальные</span></a></li>
                    <li class="category-menu-item d-flex"><a class="category-menu-item-link" href="/"><span class="category-menu-item-i" style="background-image:url(<?php echo get_stylesheet_directory_uri() ?>/t/icons/senior.svg)"></span><span class="category-menu-item-title">Для пенсионеров</span></a></li>
                    <li class="category-menu-item d-flex"><a class="category-menu-item-link" href="/"><span class="category-menu-item-i" style="background-image:url(<?php echo get_stylesheet_directory_uri() ?>/t/icons/currency.svg)"></span><span class="category-menu-item-title">Валютные</span></a></li>
                    <li class="category-menu-item d-flex"><a class="category-menu-item-link" href="/"><span class="category-menu-item-i" style="background-image:url(<?php echo get_stylesheet_directory_uri() ?>/t/icons/delivery.svg)"></span><span class="category-menu-item-title">С доставкой на дом</span></a></li>
                    <li class="category-menu-item d-flex"><a class="category-menu-item-link" href="/"><span class="category-menu-item-i" style="background-image:url(<?php echo get_stylesheet_directory_uri() ?>/t/icons/post.svg)"></span><span class="category-menu-item-title">С доставкой по почте</span></a></li>
                </ul>
            </div>
        </div>
    </aside>
    <aside class="widget" style="background-image:url(<?php echo get_stylesheet_directory_uri() ?>t/9.jpg)">
        <div class="container">
            <h2 class="widget-title">Информационнные разделы</h2>
            <div class="info-list">
                <div class="row">
                    <div class="col-lg-4 col-md-6 d-flex"><a class="info-item box-item" href="/"><span class="info-item-i" style="--icon: url(../t/icons/all.svg)"></span><span class="info-item-title">Обзоры карт всех банков</span></a></div>
                    <div class="col-lg-4 col-md-6 d-flex"><a class="info-item box-item" href="/"><span class="info-item-i" style="--icon: url(../t/icons/cdebit.svg)"></span><span class="info-item-title">Дебетовые карты</span></a></div>
                    <div class="col-lg-4 col-md-6 d-flex"><a class="info-item box-item" href="/"><span class="info-item-i" style="--icon: url(../t/icons/ccredit.svg)"></span><span class="info-item-title">Кредитные карты</span></a></div>
                    <div class="col-lg-4 col-md-6 d-flex"><a class="info-item box-item" href="/"><span class="info-item-i" style="--icon: url(../t/icons/instruct.svg)"></span><span class="info-item-title">Инструкции</span></a></div>
                    <div class="col-lg-4 col-md-6 d-flex"><a class="info-item box-item" href="/"><span class="info-item-i" style="--icon: url(../t/icons/transfer.svg)"></span><span class="info-item-title">Переводы и оплата</span></a></div>
                    <div class="col-lg-4 col-md-6 d-flex"><a class="info-item box-item" href="/"><span class="info-item-i" style="--icon: url(../t/icons/qa.svg)"></span><span class="info-item-title">Вопросы и ответы</span></a></div>
                </div>
            </div>
        </div>
    </aside>
<?php else : ?>
    <nav class="header-menu-container navbar navbar-expand-lg navbar-light">
        <div class="container">
            <?php wp_nav_menu( array(
                'theme_location'  => 'cb_header_menu',
                'menu_class'      => 'header-menu navbar-nav justify-content-between',
                'item_spacing'    => 'discard',
                'container_id'    => 'main-navbar',
                'container_class' => 'collapse navbar-collapse',
                'walker'          => new bs4navwalker(),
            ) ); ?>
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
        echo '<div class="b-r b-r--before-site-content">' . do_shortcode( $ad_options['r_before_site_content'] ) . '</div>';
    }

    if ( wp_is_mobile() && ! empty( $ad_options['r_before_site_content_mob'] ) && $show_ad ) {
        echo '<div class="b-r b-r--before-site-content">' . do_shortcode( $ad_options['r_before_site_content_mob'] ) . '</div>';
    }
?>
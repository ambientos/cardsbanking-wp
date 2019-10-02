<?php do_action( 'root_after_site_content' ); ?>

<?php
    $ad_options = get_option('root_ad_options');
    $ad_visible = ( ! empty( $ad_options['r_after_site_content_visible'] ) ) ? $ad_options['r_after_site_content_visible'] : array();

    $show_ad = false;
    if ( is_front_page()    && in_array('home', $ad_visible) )      $show_ad = true;
    if ( is_single()        && in_array('post', $ad_visible) )      $show_ad = true;
    if ( is_page()          && in_array('page', $ad_visible) )      $show_ad = true;
    if ( is_archive()       && in_array('archive', $ad_visible) )   $show_ad = true;
    if ( is_search()        && in_array('search', $ad_visible) )    $show_ad = true;

    if ( is_single() && in_array('post', $ad_visible) ) {
        $show_ad = do_show_ad(
            $post->ID,
            isset( $ad_options['r_after_site_content_exclude'] ) ? $ad_options['r_after_site_content_exclude'] : array(),
            isset( $ad_options['r_after_site_content_include'] ) ? $ad_options['r_after_site_content_include'] : array()
        );
    }

    if ( is_page() && in_array('page', $ad_visible) ) {
        $show_ad = do_show_ad(
            $post->ID,
            isset( $ad_options['r_after_site_content_exclude'] ) ? $ad_options['r_after_site_content_exclude'] : array(),
            isset( $ad_options['r_after_site_content_include'] ) ? $ad_options['r_after_site_content_include'] : array()
        );
    }

    if ( ! wp_is_mobile() && ! empty( $ad_options['r_after_site_content'] ) && $show_ad ) {
        echo '<div class="container"><div class="b-r--after-site-content container">' . do_shortcode( $ad_options['r_after_site_content'] ) . '</div></div>';
    }

    if ( wp_is_mobile() && ! empty( $ad_options['r_after_site_content_mob'] ) && $show_ad ) {
        echo '<div class="container"><div class="b-r--after-site-content container">' . do_shortcode( $ad_options['r_after_site_content_mob'] ) . '</div></div>';
    }

    $is_show_arrow = 'yes' == root_get_option( 'structure_arrow' );
?>

<footer class="footer">
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="footer-main-info col-lg-5 col-sm-12">
                    <a class="logo" href="<?php echo esc_url( home_url( '/' ) ) ?>">
                        <picture class="logo-thumb _top"><img src="<?php echo get_stylesheet_directory_uri() ?>/i/logo-white.png" srcset="<?php echo get_stylesheet_directory_uri() ?>/i/logo-white.png, <?php echo get_stylesheet_directory_uri() ?>/i/logo-white@2x.png 2x" width="56" alt="<?php echo get_bloginfo('name') ?>"></picture>
                        <div class="logo-title">
                            <b>CardsBanking.ru</b> 
                            <span><?php _e( 'Credit Card Navigator', 'cardsbanking' ); ?></span>
                        </div>
                    </a>
                    <?php if ( function_exists('the_field') ) : ?>
                        <div class="footer-info"><?php the_field('f-i', 'option') ?></div>
                    <?php endif; ?>
                </div>
                <?php if ( is_active_sidebar( 'footer-menu-list' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-menu-list' ); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="footer-sub">
        <div class="container">
            <div class="row">
                <?php if ( function_exists('the_field') ) : ?>
                    <div class="col-lg-3">
                        <div class="footer-copy"><?php

                        $copyrights = str_replace('%%year%%', date('Y'), get_field('f-c', 'option'));

                        echo $copyrights;

                        ?></div>
                    </div>
                <?php endif; ?>
                <div class="col-lg">
                     <?php wp_nav_menu( array(
                        'theme_location' => 'cb_footer_menu',
                        'menu_class'     => 'footer-menu-sub list-unstyled d-flex flex-wrap justify-content-md-end justify-content-center',
                        'item_spacing'   => 'discard',
                        'container'      => false,
                    ) ); ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php if ( $is_show_arrow ) { ?>
    <button type="button" class="scrolltop js-scrolltop">
        <span class="scrolltop-text"><?php _e( 'To Top', 'cardsbanking' ); ?> →</span>
    </button>
<?php } ?>

<div class="overlay"></div>

<?php wp_footer(); ?>
<?php echo root_get_option( 'footer_counters' ) ?>
<?php echo root_get_option( 'code_body' ) ?>

</body>
</html>
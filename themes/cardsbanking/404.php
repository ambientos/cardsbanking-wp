<?php get_header(); ?>

<div class="container">
    <div class="row">
        <main class="main col-lg-8">
            <div class="widget error-404 not-found">
                <h1 class="widget-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'root' ); ?></h1>

                <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'root' ); ?></p>
                <h3><?php esc_html_e( 'What can be done?', 'root' ); ?></h3>
                <ul>
                    <li><?php esc_html_e( 'Try to use search', 'root' ) ?></li>
                    <li><?php printf( __( 'Go to <a href="%1$s">Homepage</a>.', 'root' ), esc_url( home_url( '/' ) ) ) ?></li>
                </ul>

                <?php get_template_part( 'template-parts/related', 'posts' ) ?>

            </div>
        </main>

        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>

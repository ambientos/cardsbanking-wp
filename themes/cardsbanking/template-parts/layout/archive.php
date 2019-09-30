<div class="posts-container row">

    <?php while ( have_posts() ) : the_post(); ?>

        <div class="col-lg-4 col-sm-6 d-sm-flex">
            <?php get_template_part( 'template-parts/posts/content' ); ?>
        </div>

    <?php endwhile; ?>

</div>
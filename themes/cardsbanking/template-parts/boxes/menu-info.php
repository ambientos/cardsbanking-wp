<?php if ( have_rows('ir', 'option') ) : ?>
    <aside class="widget" style="background-image:url(<?php the_field('ir-bg', 'option') ?>)">
        <div class="container">
            <h2 class="widget-title"><?php the_field('ir-h', 'option') ?></h2>
            <div class="info-list">
                <div class="row">
                    <?php while( have_rows('ir', 'option') ): the_row(); ?>
                        <div class="col-lg-4 col-md-6 d-flex">
                            <a class="info-item box-item" href="<?php the_sub_field('ir-l', 'option') ?>">
                                <span class="info-item-i" style="--icon: url(<?php the_sub_field('ir-i', 'option') ?>)"></span>
                                <span class="info-item-title"><?php the_sub_field('ir-t', 'option') ?></span>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </aside>
<?php endif; ?>
<?php if ( have_rows('mr', 'option') ) : ?>
    <aside class="widget" style="background-image:url(<?php the_field('mr-bg', 'option') ?>)">
        <div class="container">
            <div class="widget-title _main"><?php the_field('mr-h', 'option') ?></div>
            <div class="category-menu-container">
                <ul class="category-menu d-flex flex-wrap list-unstyled">

                    <?php while( have_rows('mr', 'option') ): the_row(); ?>
                        <li class="category-menu-item d-flex">
                            <a class="category-menu-item-link" href="<?php the_sub_field('mr-l', 'option') ?>">
                                <span class="category-menu-item-i" style="background-image:url(<?php the_sub_field('mr-i') ?>)"></span>
                                <span class="category-menu-item-title"><?php the_sub_field('mr-t') ?></span>
                            </a>
                        </li>
                    <?php endwhile; ?>

                </ul>
            </div>
        </div>
    </aside>
<?php endif; ?>
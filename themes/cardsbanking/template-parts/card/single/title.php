<?php

$h1_hide       = 'checked' == get_post_meta( $post->ID, 'h1_hide', true );

$is_show_thumb = ( 'yes' == root_get_option( 'structure_single_thumb' ) ? true : false );

$thumb_hide    = 'checked' == get_post_meta( $post->ID, 'thumb_hide', true );

?>

<header class="entry-header">
    <?php if ( ! $h1_hide ) : ?>
        <?php do_action( 'root_single_before_title' ); ?>
        <?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
        <?php do_action( 'root_single_after_title' ); ?>
    <?php endif; ?>
</header>

<div class="row justify-content-md-center">
    <?php if ( ! $thumb_hide ) : ?>
        <div class="col-md-4">
            <div class="card-single-thumb">
                <?php $thumb = get_the_post_thumbnail( $post->ID, 'card-thumb', array('class' => 'img-fluid img-block', 'itemprop'=>'image') ); if ( ! empty($thumb) && $is_show_thumb ): ?>
                    <?php echo $thumb ?>
                <?php endif; ?>
                <div class="card-single-buttons d-flex justify-content-between">
                    <a href="" class="btn-primary btn"><?php _e( 'Order Card', 'cardsbanking' ) ?></a> 
                    <a href="" class="btn-contrast btn"><?php _e( 'Compare', 'cardsbanking' ) ?></a>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="col-md-6">
        <?php

        $card_options = get_card_options();

        ?>
        <ul class="card-option-list list-unstyled">
            <?php foreach ($card_options['common'] as $card_option_id => $card_option_data) : ?>
                <?php

                $card_option_value = get_post_meta( get_the_ID(), 'c-l-'. $card_option_id, true );

                if ( ! empty($card_option_value) ) :

                ?>
                    <li class="card-option-item d-flex align-items-center _single _<?php echo esc_attr( $card_option_data['icon'] ) ?>"><?php echo esc_html( $card_option_data['label_long'] ) ?> <b><?php echo esc_html( $card_option_value ) ?></b></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
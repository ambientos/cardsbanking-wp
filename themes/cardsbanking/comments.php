<?php

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<div class="comments-title"><?php _e( 'Comments', 'cardsbanking' ) ?>:</div>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'root' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'root' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'root' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'type'		=> 'comment',
					'style'     => 'ol',
					'callback'	=> 'vetteo_comment',
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'root' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'root' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'root' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'root' ); ?></p>
	<?php
	endif;



    $commenter = wp_get_current_commenter();
    $req      = get_option( 'require_name_email' );
    $html_req = ( $req ? " required='required'" : '' );
    $html5 = true;
    $consent  = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

    $comment_form_args = array(
        'comment_notes_before'      => '',
        'title_reply_before'		=> '<div id="reply-title" class="comment-reply-title">',
        'title_reply_after'			=> '</div>',

        'comment_field'             => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label> <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea></p>',
        'fields'                    => array(
            'author' => '<div class="form-group comment-form-author">' .
                        '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" maxlength="245" ' . $html_req . ' placeholder="'. esc_attr( __( 'Name' ) ) . ( $req ? ' *' : '' ) .'" /></div>',
            'email'  => '<div class="form-group comment-form-email">' .
                        '<input id="email" class="form-control" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" maxlength="100" ' . $html_req  . ' placeholder="'. __( 'Email' ) . ( $req ? ' *' : '' ) .'" /></div>',
            'url'    => '<div class="form-group comment-form-url">' .
                        '<input id="url" class="form-control" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" maxlength="200" placeholder="' . __( 'Website' ) . '" /></div>',
        ),
		'comment_field'	=> '<div class="form-group comment-form-comment"><textarea id="comment" class="form-control" name="comment" placeholder="'. __( 'Comment', 'cardsbanking' ) .'" cols="45" rows="6" aria-required="true"></textarea></div>',
		'class_submit'  => 'btn-primary btn submit',

    );

    $comment_form_args['fields']['cookies'] = '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' .
                                              '<label for="wp-comment-cookies-consent">' . __( 'Save my name, email, and website in this browser for the next time I comment.' ) . '</label></p>';

    // текст перед кнопкой Отправить
    $comments_text_before_submit = root_get_option( 'comments_text_before_submit' );
    if ( ! empty( $comments_text_before_submit ) ) {
        $comment_form_args['comment_notes_after'] = '<div class="comment-notes-after">'. $comments_text_before_submit .'</div>';
    }

    $comment_form_args = apply_filters( 'root_comment_form_args', $comment_form_args );
	comment_form( $comment_form_args );
	?>

</div><!-- #comments -->

<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lafabriquedeblogs
 */

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
		<h2 class="comments-title">
			<?php
			$comment_count = get_comments_number();
			if ( 1 === $comment_count ) {
				echo '1 commentaire';
			} else {
				echo $comment_count.' commentaires';
			}
			?>
		</h2><!-- .comments-title -->


		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'type' => 'comment',
					'callback' => 'mytheme_comment',
					'avatar_size' => 68,
				));
				
			?>
		</ol><!-- .comment-list -->

		<?php

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'lafabriquedeblogs' ); ?></p>
		<?php
		endif;

	endif; // Check for have_comments().


	$fields =  array(
	
	  'author' =>
	    '<div id="comment-fields-row"> <p class="comment-form-author"><label for="author">' . __( 'Name', MYDOMAIN ) .
	    ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
	    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
	    '" placeholder="Nom + prénom" size="30"' . $aria_req . ' /></p>',
	
	  'email' =>
	    '<p class="comment-form-email"><label for="email">' . __( 'Email', MYDOMAIN ) .
	    ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
	    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
	    '" placeholder="Courriel" size="30"' . $aria_req . ' /></p>',
	
	  'url' =>
	    '<p class="comment-form-url"><label for="url">' . __( 'Website', MYDOMAIN ) . '</label>' .
	    '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
	    '" placeholder="Site web" size="30" /></p></div><!--comment-fields-row-->',
	);

	$args = array(
	  'id_form'           => 'commentform',
	  'class_form'      => 'comment-form',
	  'id_submit'         => 'submit',
	  'class_submit'      => 'submit',
	  'name_submit'       => 'submit',
	  'title_reply'       => __( 'Leave a Reply' ),
	  'title_reply_to'    => __( 'Leave a Reply to %s' ),
	  'cancel_reply_link' => __( 'Cancel Reply' ),
	  'label_submit'      => __( 'Envoyer' ),
	  'format'            => 'xhtml',
	  
	 
	  
	  'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) .
	    '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
	    '</textarea></p>',
	
	  'must_log_in' => '<p class="must-log-in">' .
	    sprintf(
	      __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
	      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
	    ) . '</p>',
	
	  'logged_in_as' => '<p class="logged-in-as">' .
	    sprintf(
	    __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
	      admin_url( 'profile.php' ),
	      $user_identity,
	      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
	    ) . '</p>',
	
	  'comment_notes_before' => '<p class="comment-notes">' .
	    __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) .
	    '</p>',
	
	  'comment_notes_after' => '<p class="form-allowed-tags"></p>',
	  
	   'fields' => apply_filters( 'comment_form_default_fields', $fields ),
	  
	);
	comment_form( $args );
	?>

</div><!-- #comments -->

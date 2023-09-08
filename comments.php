<?php
/**
 * @package WordPress
 * @subpackage Theme_Compat
 * @deprecated 3.0.0
 *
 * This file is here for backward compatibility with old themes and will be removed in a future version
 */
// _deprecated_file(
// 	/* translators: %s: Template name. */
// 	sprintf( __( 'Theme without %s' ), basename( __FILE__ ) ),
// 	'3.0.0',
// 	null,
// 	/* translators: %s: Template name. */
// 	sprintf( __( 'Please include a %s template in your theme.' ), basename( __FILE__ ) )
// );
$comments_number = get_comments_number();
$com = '0';
if ($comments_number == 0) {
   $com = '0';
} else {
   $com = $comments_number;
}

// Do not delete these lines.
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' === basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die( 'Please do not load this page directly. Thanks!' );
}

if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view comments.' ); ?></p>
	<?php
	return;
}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<div class="meta-com">
        <h3>KOMENTARZY <?php echo $com; ?></h3>
    </div>
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link(); ?></div>
		<div class="alignright"><?php next_comments_link(); ?></div>
	</div>

	<ul class="commentlist">
		<?php wp_list_comments(); ?>
	</ul>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link(); ?></div>
		<div class="alignright"><?php next_comments_link(); ?></div>
	</div>
<?php else : // This is displayed if there are no comments so far. ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	<?php else : // Comments are closed. ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e( 'Comments are closed.' ); ?></p>

	<?php endif; ?>
<?php endif; ?>

<div class="entry-commerts">
        <?php
            $comment_form_args = array(
                'title_reply' => 'Komentarze', // Tytuł pola komentarza
                'comment_notes_after' => '', // Usunięcie standardowego tekstu pod formularzem
                'comment_field' => '<textarea id="comment" name="comment" cols="45" rows="8" placeholder="Twój komentarz" required></textarea>',
                 'label_submit' => 'Wyślij',
                'fields' => array(
                    'author' => '<input id="author" name="author" type="text" placeholder="Twoje imię" required>',
                    'email' => '<input id="email" name="email" type="email" placeholder="Twój adres e-mail" required>',
                    'url' => '<input id="url" name="url" type="url" placeholder="Twoja witryna internetowa">',
                ),
            );

            comment_form($comment_form_args);
            ?>
    </div>

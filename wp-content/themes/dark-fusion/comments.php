<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @package Dark Fusion Theme
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

if (have_comments()) : ?>
    <article class="comment-section">
        <div class="comment-title">
            <h3>
                <?php
                $dark_fusion_comment_box_count = get_comments_number();
                if ('1' === $dark_fusion_comment_box_count) {
                    printf(
                            /* translators: 1: title. */
                            esc_html__('1 comment', 'dark-fusion' ),
                            '<span>' . esc_html(get_the_title()) . '</span>'
                    );
                } else {
                    printf(
                            /* translators: 1: comment count number, 2: title. */
                            esc_html(_nx('%1$s comment', '%1$s comments', $dark_fusion_comment_box_count, 'comments title', 'dark-fusion' )),
                            esc_html(number_format_i18n($dark_fusion_comment_box_count)),
                            '<span>' . esc_html(get_the_title()) . '</span>'
                    );
                }
                ?>
            </h3>
        </div>
        <?php
        the_comments_navigation();
        wp_list_comments('type=comment&callback=dark_fusion_comment_box');
        the_comments_navigation();

        // If comments are closed and there are comments, let's leave a little note, shall we?
        if (!comments_open()) :
            ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'dark-fusion' ); ?></p>
        <?php endif; ?>
    </article>
<?php endif;
echo '<article class="comment-form">';
  
    $fields     =   array(
        'author'    =>  '<p class="comment-form-author">
                            <label for="author">Name
                                <span class="required">
                                    <input type="text" name="author" value="" size="30" class="blog-form-control" aria-required="true" arai-invalid="false">
                                </span>
                            </label>
                        </p>',
        'email'     =>  '<p class="comment-form-email">
                            <label for="email">Email 
                                <span class="required">
                                    <input type="email" name="email" value="" size="30" class="blog-form-control" aria-describedby="email-notes" aria-required="true" arai-invalid="false">
                                </span>
                            </label>
                        </p>',
       'url'        =>  '<p class="comment-form-url">
                            <label for="url">Website
                                <input type="text" name="url" value="" size="30" class="blog-form-control" aria-required="true" arai-invalid="false">
                            </label>
                        </p>'
    );
    function dark_fusion_fields($fields) { 
        return $fields;
    }
    add_filter('comment_form_default_fields','dark_fusion_fields');
    $defaults = array(
            'fields'                =>  apply_filters( 'comment_form_default_fields', $fields ),
            'comment_field'         =>  '<p class="comment-form-comment">
                                            <label for="comment">Comment
                                                <textarea id="comment" type="text" name="comment" value="" cols="45" rows="8" aria-required="true" arai-invalid="false"></textarea>
                                            </label>
                                        </p>',
            'logged_in_as'          =>  '<p class="comment-notes">' . esc_html__("Logged in as",'dark-fusion'  ).' '.'<a href="'. esc_url(admin_url( 'profile.php' )).'">'.$user_identity.'</a>'. '<a href="'. esc_url(wp_logout_url( get_permalink() )).'" title="'.esc_html__('Log out from this Account','dark-fusion' ).'">'.' '.esc_html__("Log out",'dark-fusion' ).'?</a>' . '</p>',
            'id_submit'             =>  'submit',
            'label_submit'          =>  esc_html__('Post Comment','dark-fusion' ),
            'comment_notes_after'   =>  '',
            'comment_notes_before'  =>  '',
            'title_reply'           =>  esc_html__('Leave a Reply', 'dark-fusion' ),
            'id_form'               =>  'commentform'
        );
    ob_start();
    comment_form($defaults);
echo '</article>';?>
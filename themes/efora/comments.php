<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 */
/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
if ( have_comments() || comments_open() ) : ?>
    <?php if ( have_comments()){ ?>
        <div class="tg-comments">
            <div class="tg-heading tg-headingvtwo">
                <h2><?php echo get_comments_number().' '.esc_attr__('Responses','efora'); ?></h2>
            </div>
            <ul id="tg-comments" class="tg-comments">
                <?php  wp_list_comments(array(
                    'type' => 'all',
                    'short_ping' => true,
                    'callback' => 'efora_comment'
                )); ?>
            </ul>
            <div class="clear clearfix"></div>
            <?php
            // Are there comments to navigate through?
            if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
                <nav class="navigation comment-navigation" role="navigation">
                    <h5 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'efora' ); ?></h5>
                    <div class="nav-previous col-sm-6"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'efora' ) ); ?></div>
                    <div class="nav-next col-sm-6 text-right"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'efora' ) ); ?></div>
                </nav>
            <?php endif; ?>
        </div>
    <?php } ?>
    <!-- Comment Form -->
    <?php
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $fields =  array(
        'author' =>
            '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-6"><div class="form-group">
                <input id="author" placeholder="'.esc_html__('Full Name','efora').'" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .'"/>
    </div></div>',
        'email' =>
            '<div class="col-xs-12 col-sm-12 col-md-5 col-lg-6"><div class="form-group">
                <input id="email" placeholder="'.esc_html__('Email Address','efora').'" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"/>
    </div></div>',
    );
    $args = array(
        'id_form'           => 'commentform',
        'class_form'      => 'tg-formtheme tg-formleavecomment',
        'id_submit'         => 'submit',
        'class_submit'      => 'tg-btn',
        'name_submit'       => 'submit',
        'title_reply'       => '',
        'title_reply_to'    => '',
        'cancel_reply_link' => esc_html__( 'Cancel Reply','efora' ),
        'comment_notes_after' => '',
        'comment_notes_before' => '',
        'label_submit'      => esc_html__( 'SUBMIT','efora' ),
        'format'            => 'xhtml',
        'comment_field' =>  '<div class="col-xs-12 col-sm-12 col-md-10 col-lg-12">
                <div class="form-group">
                <textarea placeholder="'.esc_html__('Comments','efora').'" id="comment" class="form-control" name="comment" aria-required="true">' .
            '</textarea>
                </div></div><div class="clear clearfix"></div>',
        'fields' => apply_filters( 'comment_form_default_fields', $fields ),
    );
    if ( comments_open() ) : ?>
        <?php if(have_comments()){
            $class = '';
        } else {
            $class = 'pt-0';
        } ?>
        <div class="tg-leaveyourcomment <?php echo esc_attr($class); ?>">
            <div class="tg-heading tg-headingvtwo">
                <h2><?php esc_attr_e('Leave a Reply','efora'); ?></h2>
            </div>
            <div class="row">
                <?php comment_form($args); ?>
            </div>
        </div>
    <?php endif;
endif; ?>
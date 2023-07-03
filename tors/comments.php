<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>
<?php if ( have_comments() ) : ?>
    <h3 class="commnets-title"><?php comments_number( esc_html__('0 Comments', 'moroko'), esc_html__('1 Comment', 'moroko'), esc_html__('% Comments', 'moroko') ); ?></h3>
    <!--  Nav Tabs  -->
    <!-- Tab panes -->
    <ul class="users-list">
            <?php wp_list_comments('callback=moroko_theme_comment'); ?> 
    </ul>
    <?php
    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    ?>
        <div class="pagination_area">
            <nav>
                <ul class="pagination">
                    <li> <?php paginate_comments_links( 
                          array(
                          'prev_text' => wp_specialchars_decode( '<i class="fa fa-angle-left"></i>',ENT_QUOTES),
                          'next_text' => wp_specialchars_decode( '<i class="fa fa-angle-right"></i>',ENT_QUOTES),
                          ));  ?>
                    </li>
                </ul>
            </nav>
        </div>
    <?php endif; ?>
    <!-- END PAGINATION -->
<?php endif; ?>        
<?php
    if ( is_singular() ) wp_enqueue_script( "comment-reply" );
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $comment_args = array(
            'id_form' => '',        
            'class_form' => '',                         
            'title_reply'=> esc_html__( 'Leave A Comment', 'moroko' ),
            'title_reply_before' => '<h3 class="commnets-title">',
            'title_reply_after'  => '</h3>',
            'fields' => apply_filters( 'comment_form_default_fields', array(
                'author'=> '<div class="row">
                                <div class="col-md-4">
                                    <input class="text-field-box-grey medium-height" name="author" id="name" type="text" placeholder="'.esc_attr__('Full Name', 'moroko').'" required="'.esc_attr__('required', 'moroko').'" data-error="'.esc_attr__('Name is required.', 'moroko').'">
                                </div>',
                'email' => '    <div class="col-md-4">
                                    <input type="email" name="email" id="mail" class="text-field-box-grey medium-height"   placeholder="'.esc_attr__('Email Address', 'moroko').'" required="'.esc_attr__('required', 'moroko').'" data-error="'.esc_attr__('Valid email is required.', 'moroko').'">
                                </div>', 
                'phone' => '    
                                <div class="col-md-4">
                                    <input type="text" name="phone" id="phone" class="text-field-box-grey medium-height"   placeholder="'.esc_attr__('Phone', 'moroko').'">
                                </div>
                            </div>', 
            ) ),   
            'comment_field' => '<div class="row">
                                    <div class="col-md-12">
                                        <textarea class="text-field-box-grey medium-height" name="comment" id="comments" rows="6" placeholder="'.esc_attr__('Write a comment...', 'moroko').'" required="'.esc_attr__('required', 'moroko').'" data-error="'.esc_attr__('Please,leave us a message.', 'moroko').'"></textarea>
                                    </div>
                                </div>',
            'label_submit' => esc_html__( 'Post A Comment', 'moroko' ),
            'submit_button' =>  '<button name="submit" type="submit" id="contact-submit %2$s"
                                    class="button-medium medium-height">'.esc_attr__('%4$s', 'bidzen').'</button>',
            'submit_field' =>   '<div class="row">
                                    <div class="col-md-12">
                                        '.esc_attr__('%1$s', 'moroko').' '.esc_attr__('%2$s', 'moroko').'
                                    </div>
                                </div>',
            'comment_notes_before' => '',
            'comment_notes_after' => '',             
        )
    ?>
    <?php if ( comments_open() ) : ?>
        <div class="Reply-sec">
            <?php comment_form($comment_args); ?>
        </div>
    <?php endif; ?>    

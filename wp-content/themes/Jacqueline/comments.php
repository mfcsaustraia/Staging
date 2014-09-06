<section class="comment-box">

<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
  die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) { ?>
  <p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments','ace'); ?>.</p>
<?php return; } ?>

<!-- You can start editing here. -->
  <?php if ( have_comments() ) : ?>
  <section class="navigation">
    <section class="alignleft"><?php previous_comments_link() ?></section>
    <section class="alignright"><?php next_comments_link() ?></section>
  </section>

  <?php if (!empty($comments_by_type['comment'])) { ?>
    <h4 id="comments"><?php comments_number(__('0 comment','ace'), __('1 Comment','ace'), __('% Comments','ace')); ?> <?php _e('on','ace'); ?> <?php the_title(); ?></h4>
    <ol class="commentlist">
      <?php wp_list_comments('type=comment&callback=comment_style'); ?>
    </ol>
  <?php } if (!empty($comments_by_type['pings'])) { ?>
    <h4 id="comments"><?php echo count($wp_query->comments_by_type['pings']); ?><?php _e('Pingbacks &amp; Trackbacks on','ace'); ?> <?php the_title(); ?></h4>
    <ol class="commentlist">
      <?php wp_list_comments('type=pingback&callback=comment_style'); ?>
    </ol>
  <?php } ?>

  <?php else : // this is displayed if there are no comments so far ?>

    <?php if ('open' == $post->comment_status) : ?>

    <?php else : // comments are closed ?>

      <?php if ( is_page() ) : else : ?>
        <p class="nocomments"><?php _e('Comments are closed','ace'); ?>.</p>
      <?php endif; ?>

    <?php endif; ?>

  <?php endif; ?>

  <?php if ('open' == $post->comment_status) : ?>

  <section id="respond">

    <?php
    $comments_args = array(
      'label_submit'          => __('Comment','ace'),
      'title_reply'           => __('Leave a Reply','ace'),
      'title_reply_to'        => __('Leave a reply to %s','ace'),
      'cancel_reply_link'     => __('Cancel reply','ace'),
      'comment_notes_before'  => '<p>' . __('Your email address will not be published. Required fields are marked *','ace') . '</p>',
      'comment_notes_after'   => '',
      'comment_field'         => '<p class="comment-inputs">' . __('Comment','ace') . ' <span class="required-input">*</span><br /><textarea name="comment" class="comment-textarea" tabindex="1"></textarea></p>',
      'fields'                => apply_filters( 'comment_form_default_fields', array(
        'author'  => '<p class="comment-inputs"><label>'.__('Name','ace').'<span class="required-input">*</span></label><br /><input type="text" name="author" class="comment-text" value="'.$comment_author.'" size="22" tabindex="2" /><br />',
        'email'   => '<label>'.__('Email','ace').' <span class="required-input">*</span></label><br /><input type="text" name="email" class="comment-text" value="'.$comment_author_email.'" size="22" tabindex="3" /><br />',
        'url'     => '<label>'.__('Website','ace').'</label><br /><input type="text" name="url" class="comment-text" value="'.$comment_author_url.'" size="22" tabindex="4" /></p>',
      ) ),
    );
    comment_form($comments_args);
<!--  -->
    ?>

  </section>
  <?php endif; // if you delete this the sky will fall on your head ?>
</section>
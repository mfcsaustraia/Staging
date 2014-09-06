    <article <?php post_class("article"); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="http://schema.org/Article">

      <?php if(get_post_meta($post->ID, 'ace_title', true)) {} else { ?>
      <header class="post-header">
        <h2 class="post-title" itemprop="name"><a href="<?php the_permalink() ?>" rel="<?php _e('bookmark','ace'); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
        <section class="post-header-meta">
          <time datetime="<?php the_time( get_option('date_format') ); ?>" itemprop="datePublished" pubdate><?php the_time( get_option('date_format') ); ?></time> <?php if ( function_exists( 'ace_post_author' ) ) { echo _e('By','ace'); echo ace_post_author(); } ?>
        </section>
      </header>
      <?php } ?>

      <?php the_content(); ?>

      <?php echo ace_get_link_pages() ?>

      <?php if ( function_exists( 'ace_post_author_bio' ) ) { echo ace_post_author_bio(); } ?>

      <footer class="post-meta">
        <?php _e('Posted in','ace'); ?> <?php the_category(', ') ?> | <?php comments_popup_link( __('0 comment','ace'), __('1 Comment','ace'), __('% Comments','ace') ); ?>
      </footer><!-- .post-meta -->

      <footer class="post-footer">

        <p><?php the_tags('Tags: ', ', ', '<br />'); ?></p>

        <ul class="footer-navi">
          <?php previous_post_link( '<li class="previous" rel="prev">&laquo; %link</li>' ); ?>
          <?php next_post_link('<li class="next" rel="next">%link &raquo;</li>' ); ?>
        </ul>

        <?php if( get_option("ace_enable_related") ) { get_template_part('layouts/related'); } ?>

      </footer><!-- .post-footer -->

      <?php comments_template('/comments.php',true); ?>

    </article><!-- .article -->
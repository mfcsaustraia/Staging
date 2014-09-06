    <article <?php post_class("article"); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="http://schema.org/Article">

      <?php if(get_post_meta($post->ID, 'ace_title', true)) {} else { ?>
      <header class="post-header">
        <h2 class="post-title" itemprop="name"><a href="<?php the_permalink() ?>" rel="<?php _e('bookmark','ace'); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
        <section class="post-header-meta">
          <time datetime="<?php the_time( get_option('date_format') ); ?>" itemprop="datePublished" pubdate><?php the_time( get_option('date_format') ); ?></time> <?php if ( function_exists( 'ace_post_author' ) ) { echo _e('By','ace'); echo ace_post_author(); } ?>
        </section>
      </header>
      <?php } ?>

      <?php if (get_option("ace_enable_post_thumbnail")) { ?>

        <?php if ( has_post_thumbnail() ) { ?>
        <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
          <?php the_post_thumbnail( 'post_thumb', array('class'=>'alignleft') ); // Crop using WordPress thumbnail cropping ?>
        <?php } ?>

      <?php } ?>

        <?php if (get_option("ace_enable_excerpt")) { echo the_excerpt(); } else { echo the_content(); } ?>

      <footer class="post-meta">
        <?php _e('Posted in','ace'); ?> <?php the_category(', ') ?> | <?php comments_popup_link( __('0 comment','ace'), __('1 Comment','ace'), __('% Comments','ace') ); ?>
      </footer><!-- .post-meta -->

    </article><!-- .article -->
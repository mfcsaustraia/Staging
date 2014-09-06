<?php get_header(); ?>

  <?php if(get_post_meta($post->ID, 'ace_wide', true)) { echo '<section class="section-wide" role="main">'; } else { echo '<section class="section" role="main">'; } ?>

    <?php echo ace_breadcrumb(); ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <article <?php post_class("article article-pages"); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="http://schema.org/Article">

      <?php if(get_post_meta($post->ID, 'ace_title', true)) {} else { ?>
      <header class="post-header">
        <h2 class="post-title" itemprop="name"><?php the_title(); ?></h2>
      </header>
      <?php } ?>
 
      <?php the_content(); ?>

      <?php echo ace_get_link_pages() ?>

      <?php comments_template('/comments.php',true); ?>

    </article><!-- .article -->

    <?php endwhile; endif; ?>

  </section><!-- .section -->

  <?php if(get_post_meta($post->ID, 'ace_wide', true)) {} else { echo get_sidebar(); } ?>

<?php get_footer(); ?>
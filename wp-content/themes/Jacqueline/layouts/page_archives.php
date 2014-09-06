<?php
/*
Template Name: Archives
*/
get_header(); ?>

  <section class="section" role="main">

    <?php echo ace_breadcrumb(); ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <article <?php post_class("article article-pages"); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="http://schema.org/Article">
  
      <header class="post-header">
        <h2 class="post-title"><?php the_title(); ?></h2>
      </header>

      <?php the_content(); ?>

      <ul>
        <?php wp_tag_cloud('taxonomy=Artist&format=list&smallest=11px&largest11px'); ?>
      </ul>

      <?php get_search_form();?>
    
      <hr />

      <section class="left">
        <h3><?php _e('Archives by month:','ace'); ?></h3>
        <ul>
          <?php wp_get_archives('type=monthly'); ?>
        </ul>
      </section>
      <section class="right">
        <h3><?php _e('Archives by category:','ace'); ?></h3>
        <ul>
          <?php wp_list_categories('sort_column=name'); ?>
        </ul>
      </section>
      <div class="clearfix">&nbsp;</div>
    
    </article><!-- .article -->

    <?php endwhile; endif; ?>

  </section><!-- .section -->

  <?php get_sidebar(); ?>

<?php get_footer(); ?>
<?php
/*
Template Name: Sitemap
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

      <section class="left">
        <h3><?php _e('Pages','ace'); ?></h3>
        <ul>
          <?php wp_list_pages('depth=1&sort_column=menu_order&title_li=' ); ?> 	
        </ul>
      </section>
      <section class="right">
        <h3><?php _e('Categories','ace'); ?></h3>
        <ul>
          <?php wp_list_categories('title_li=&hierarchical=0&show_count=1') ?>	
        </ul>
      </section>
      <div class="clearfix">&nbsp;</div>
    
      <?php
      $cats = get_categories();
      foreach ($cats as $cat) {
      query_posts('cat='.$cat->cat_ID);
      ?>
        <h2><?php echo $cat->cat_name; ?></h2>
        <ul>	
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> <span class="alignright"><small><?php _e('Comment','ace'); ?> (<?php echo $post->comment_count ?>)</small></span></li>
          <?php endwhile; endif; wp_reset_query(); ?>
        </ul>
      <?php } ?>

    </article><!-- .article -->

    <?php endwhile; endif; ?>

  </section><!-- .section -->

  <?php get_sidebar(); ?>

<?php get_footer(); ?>
<?php get_header(); ?>

  <section class="section" role="main">

    <?php echo ace_breadcrumb(); ?>

    <article class="article" <?php post_class(); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="http://schema.org/Article">

      <header class="post-header">
        <h1 class="post-title"><?php _e('Error 404 - Not Found','ace'); ?></h1>
      </header>

      <p><?php if (get_option("ace_404_page") == true) { echo esc_html( get_option("ace_404_page") ); } else { echo _e('404 Not Found','ace'); } ?></p>

      <?php get_search_form();?>

      <section class="left">
        <h3><?php _e('Archives by month','ace'); ?></h3>
        <ul>
          <?php wp_get_archives('type=monthly'); ?>
        </ul>
      </section>
      <section class="right">
        <h3><?php _e('Archives by category','ace'); ?></h3>
        <ul>
          <?php wp_list_categories('sort_column=name'); ?>
        </ul>
      </section>
      <div class="clearfix">&nbsp;</div>

    </article><!-- .article -->

  </section><!-- .section -->

  <?php get_sidebar(); ?>

<?php get_footer(); ?>
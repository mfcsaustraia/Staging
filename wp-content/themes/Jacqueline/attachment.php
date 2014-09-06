<?php get_header(); ?>

  <section class="section" role="main">

    <?php echo ace_breadcrumb(); ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <article class="article" <?php post_class(); ?> id="post-<?php the_ID(); ?>" itemscope itemtype="http://schema.org/Article">

      <header class="post-header">
        <h1 class="post-title"><?php the_title(); ?></h1>
      </header>

      <img src="<?php echo wp_get_attachment_url($post->ID); ?>" alt="<?php the_title(); ?>" class="centered" />

      <strong><?php if ( !empty($post->post_excerpt) ) the_excerpt(); // this is the "caption" ?></strong>

      <?php if ( !empty($post->post_content) ) the_content(); // this is the "description" ?>

    </article><!-- .article -->

    <?php endwhile; endif; ?>

  </section><!-- .section -->

  <?php get_sidebar(); ?>

<?php get_footer(); ?>
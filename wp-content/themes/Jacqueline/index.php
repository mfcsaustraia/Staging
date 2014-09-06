<?php get_header() ?>

  <?php if (get_option("ace_full_blog") ) { echo '<section class="section-wide" role="main">'; } else { echo '<section class="section" role="main">'; } ?>

    <?php echo ace_breadcrumb(); ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <?php get_template_part( 'content', 'list' ); ?>

    <?php endwhile; ?>

      <section class="pagination">
        <p><?php echo ace_get_pagination_links(); ?></p>
      </section>

    <?php else : get_template_part( 'content', 'none' ); endif; ?>

  </section><!-- .section -->

  <?php if (get_option("ace_full_blog") ) { } else { echo get_sidebar(); } ?>

<?php get_footer(); ?>
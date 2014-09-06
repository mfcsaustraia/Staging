    <article class="article" itemscope itemtype="http://schema.org/Article">

      <header class="post-header">
        <h1 class="post-title" itemprop="name"><?php _e('Not Found','ace'); ?></h1>
      </header>

      <p><?php _e('You have come to a page that is either not existing or already been removed','ace'); ?>.</p>

      <?php get_search_form();?>

      <div class="left">
        <h3><?php _e('Archives by month','ace'); ?></h3>
        <ul>
          <?php wp_get_archives('type=monthly'); ?>
        </ul>
      </div>
      <div class="right">
        <h3><?php _e('Archives by category','ace'); ?></h3>
        <ul>
          <?php wp_list_categories('sort_column=name'); ?>
        </ul>
      </div>
      <div class="clearfix">&nbsp;</div>

    </article><!-- .article -->
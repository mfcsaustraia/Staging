<footer class="footer">

  <?php if (get_option("ace_footer_icons") == true) { ?>
  <footer class="footer-icons">
    <ul class="footer-icons-list">
      <?php if( get_option("ace_twitter") ) { ?><li><a href="<?php echo get_option("ace_twitter"); ?>" class="footer-twitter radius-20">Twitter</a></li><?php } ?>
      <?php if( get_option("ace_facebook") ) { ?><li><a href="<?php echo get_option("ace_facebook"); ?>" class="footer-facebook radius-20">Facebook</a></li><?php } ?>
      <?php if( get_option("ace_pinterest") ) { ?><li><a href="<?php echo get_option("ace_pinterest"); ?>" class="footer-pinterest radius-20">Pinterest</a></li><?php } ?>
      <?php if( get_option("ace_instagram") ) { ?><li><a href="<?php echo get_option("ace_instagram"); ?>" class="footer-instagram radius-20">Instagram</a></li><?php } ?>
      <?php if( get_option("ace_google_plus") ) { ?><li><a href="<?php echo get_option("ace_google_plus"); ?>" class="footer-google radius-20">Google Plus</a></li><?php } ?>
      <?php if( get_option("ace_flickr") ) { ?><li><a href="<?php echo get_option("ace_flickr"); ?>" class="footer-flickr radius-20">Flickr</a></li><?php } ?>
      <?php if( get_option("ace_linkedin") ) { ?><li><a href="<?php echo get_option("ace_linkedin"); ?>" class="footer-linkedin radius-20">Linkedin</a></li><?php } ?>
      <?php if( get_option("ace_youtube") ) { ?><li><a href="<?php echo get_option("ace_youtube"); ?>" class="footer-youtube radius-20">YouTube</a></li><?php } ?>
      <?php if( get_option("ace_vimeo") ) { ?><li><a href="<?php echo get_option("ace_vimeo"); ?>" class="footer-vimeo radius-20">Vimeo</a></li><?php } ?>
      <?php if( get_option("ace_bloglovin") ) { ?><li><a href="<?php echo get_option("ace_bloglovin"); ?>" class="footer-bloglovin radius-20">Bloglovin</a></li><?php } ?>
      <?php if( get_option("ace_rss") ) { ?><li><a href="<?php echo get_option("ace_rss"); ?>" class="footer-rss radius-20">RSS Feed</a></li><?php } ?>
      <?php if( get_option("ace_email") ) { ?><li><a href="mailto:<?php echo get_option("ace_email"); ?>" class="footer-email radius-20">Email</a></li><?php } ?>
    </ul>
  </footer>
  <?php } ?>

  <?php if ( is_active_sidebar( 'footer-widget' ) ) : ?>
  <section class="footer-inner" role="complementary">

    <?php dynamic_sidebar( 'footer-widget' ); ?>

  </section><!-- .footer-inner -->
  <?php endif; ?>

</footer><!-- .footer -->

<p class="footer-copy" role="contentinfo">
  <?php if( get_option('ace_footer_credit') == true ) { echo stripslashes( get_option('ace_footer_credit') ); } else { ?>&copy; <?php _e('Copyright','ace'); ?> <a href="<?php echo esc_url( home_url('/') ); ?>" itemtype="copyrightHolder"><?php bloginfo('name'); ?></a> <span itemtype="copyrightYear" content="<?php echo date('Y'); ?>"><?php echo date('Y'); ?></span>. <?php _e('Powered by','ace'); ?> <a href="<?php echo esc_url('http://www.wordpress.org'); ?>">WordPress</a>. <a href="<?php echo esc_url('http://www.bluchic.com'); ?>" title="Beverly theme designed by BluChic" class="footer-credit"><?php _e('Designed by','ace'); ?> BluChic</a><?php } ?>
</p>


</section><!-- .container -->

<?php wp_footer(); ?>

<?php echo ace_footer_scripts(); ?>

</section><!-- .wrap -->

</body>
</html>
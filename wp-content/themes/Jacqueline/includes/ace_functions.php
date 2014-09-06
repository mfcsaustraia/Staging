<?php

// ==================================================================
// Post author
// ==================================================================
function ace_post_author() {

  if( get_option("ace_blog_author") ) {
    echo '<span itemprop="author">&nbsp;'; echo the_author_link(); echo '</span>';
  }

}

// ==================================================================
// Post author biography
// ==================================================================
function ace_post_author_bio() {

  if( get_option("ace_blog_author_bio") ) { ?>
      <section class="post-author-bio">
        <?php echo get_avatar( get_the_author_meta('email') , 64 ); ?>
        <?php echo get_the_author_meta('description'); ?>
      </section>
  <?php }

}

// ==================================================================
// Theme slider
// ==================================================================
function ace_theme_slider() {

  if( get_option( 'ace_feature_enable' ) ) {

    if( get_option( 'ace_feature_enable_home' ) ) {
      if( is_front_page() ) { echo get_template_part( 'layouts/slide' ); }
    } else {
      echo get_template_part( 'layouts/slide' );
    }
 
  }

}

// ==================================================================
// Theme custom css
// ==================================================================
function ace_css() {

  if( get_option( 'ace_css' ) ) { ?>

    <style type="text/css">
      <?php echo stripslashes( get_option( 'ace_css' ) ); ?>
    </style>

  <?php }

}

// ==================================================================
// Theme options colors
// ==================================================================
function ace_theme_css() { ?>

  <style type="text/css">

    .social-twitter {background-color: <?php if( get_option( 'ace_widget_twitter_bg' ) ) { echo get_option( 'ace_widget_twitter_bg' ); } else { echo '#cccccc'; } ?>;}
    .social-facebook {background-color: <?php if( get_option( 'ace_widget_fb_bg' ) ) { echo get_option( 'ace_widget_fb_bg' ); } else { echo '#cccccc'; } ?>;}
    .social-email {background-color: <?php if( get_option( 'ace_widget_email_bg' ) ) { echo get_option( 'ace_widget_email_bg' ); } else { echo '#cccccc'; } ?>;}
    .social-rss {background-color: <?php if( get_option( 'ace_widget_rss_bg' ) ) { echo get_option( 'ace_widget_rss_bg' ); } else { echo '#cccccc'; } ?>;}
    .social-google {background-color: <?php if( get_option( 'ace_widget_google_bg' ) ) { echo get_option( 'ace_widget_google_bg' ); } else { echo '#cccccc'; } ?>;}
    .social-flickr {background-color: <?php if( get_option( 'ace_widget_flickr_bg' ) ) { echo get_option( 'ace_widget_flickr_bg' ); } else { echo '#cccccc'; } ?>;}
    .social-linkedin {background-color: <?php if( get_option( 'ace_widget_linkedin_bg' ) ) { echo get_option( 'ace_widget_linkedin_bg' ); } else { echo '#cccccc'; } ?>;}
    .social-youtube {background-color: <?php if( get_option( 'ace_widget_youtube_bg' ) ) { echo get_option( 'ace_widget_youtube_bg' ); } else { echo '#cccccc'; } ?>;}
    .social-vimeo {background-color: <?php if( get_option( 'ace_widget_vimeo_bg' ) ) { echo get_option( 'ace_widget_vimeo_bg' ); } else { echo '#cccccc'; } ?>;}
    .social-instagram {background-color: <?php if( get_option( 'ace_widget_instagram_bg' ) ) { echo get_option( 'ace_widget_instagram_bg' ); } else { echo '#cccccc'; } ?>;}
    .social-bloglovin {background-color: <?php if( get_option( 'ace_widget_bloglovin_bg' ) ) { echo get_option( 'ace_widget_bloglovin_bg' ); } else { echo '#cccccc'; } ?>;}
    .social-pinterest {background-color: <?php if( get_option( 'ace_widget_pinterest_bg' ) ) { echo get_option( 'ace_widget_pinterest_bg' ); } else { echo '#cccccc'; } ?>;}

    .social-twitter:hover {background-color: <?php if( get_option( 'ace_widget_twitter_bg_hover' ) ) { echo get_option( 'ace_widget_twitter_bg_hover' ); } else { echo '#269dd5'; } ?>;}
    .social-facebook:hover {background-color: <?php if( get_option( 'ace_widget_fb_bg_hover' ) ) { echo get_option( 'ace_widget_fb_bg_hover' ); } else { echo '#0c42b2'; } ?>;}
    .social-email:hover {background-color: <?php if( get_option( 'ace_widget_email_bg_hover' ) ) { echo get_option( 'ace_widget_email_bg_hover' ); } else { echo '#aaaaaa'; } ?>;}
    .social-rss:hover {background-color: <?php if( get_option( 'ace_widget_rss_bg_hover' ) ) { echo get_option( 'ace_widget_rss_bg_hover' ); } else { echo '#f49000'; } ?>;}
    .social-google:hover {background-color: <?php if( get_option( 'ace_widget_google_bg_hover' ) ) { echo get_option( 'ace_widget_google_bg_hover' ); } else { echo '#fd3000'; } ?>;}
    .social-flickr:hover {background-color: <?php if( get_option( 'ace_widget_flickr_bg_hover' ) ) { echo get_option( 'ace_widget_flickr_bg_hover' ); } else { echo '#fc0077'; } ?>;}
    .social-linkedin:hover {background-color: <?php if( get_option( 'ace_widget_linkedin_bg_hover' ) ) { echo get_option( 'ace_widget_linkedin_bg_hover' ); } else { echo '#0d5a7b'; } ?>;}
    .social-youtube:hover {background-color: <?php if( get_option( 'ace_widget_youtube_bg_hover' ) ) { echo get_option( 'ace_widget_youtube_bg_hover' ); } else { echo '#ff0000'; } ?>;}
    .social-vimeo:hover {background-color: <?php if( get_option( 'ace_widget_vimeo_bg_hover' ) ) { echo get_option( 'ace_widget_vimeo_bg_hover' ); } else { echo '#00c1f8'; } ?>;}
    .social-instagram:hover {background-color: <?php if( get_option( 'ace_widget_instagram_bg_hover' ) ) { echo get_option( 'ace_widget_instagram_bg_hover' ); } else { echo '#194f7a'; } ?>;}
    .social-bloglovin:hover {background-color: <?php if( get_option( 'ace_widget_bloglovin_bg_hover' ) ) { echo get_option( 'ace_widget_bloglovin_bg_hover' ); } else { echo '#00c4fd'; } ?>;}
    .social-pinterest:hover {background-color: <?php if( get_option( 'ace_widget_pinterest_bg_hover' ) ) { echo get_option( 'ace_widget_pinterest_bg_hover' ); } else { echo '#c70505'; } ?>;}

    <?php if (get_option("ace_rss_bg")) { ?>ul.footer-icons-list li .footer-rss {background-color: <?php echo get_option("ace_rss_bg"); ?>;}<?php } ?>
    <?php if (get_option("ace_twitter_bg")) { ?>ul.footer-icons-list li .footer-twitter {background-color: <?php echo get_option("ace_twitter_bg"); ?>;}<?php } ?>
    <?php if (get_option("ace_facebook_bg")) { ?>ul.footer-icons-list li .footer-facebook {background-color: <?php echo get_option("ace_facebook_bg"); ?>;}<?php } ?>
    <?php if (get_option("ace_pinterest_bg")) { ?>ul.footer-icons-list li .footer-pinterest {background-color: <?php echo get_option("ace_pinterest_bg"); ?>;}<?php } ?>
    <?php if (get_option("ace_email_bg")) { ?>ul.footer-icons-list li .footer-email {background-color: <?php echo get_option("ace_email_bg"); ?>;}<?php } ?>
    <?php if (get_option("ace_flickr_bg")) { ?>ul.footer-icons-list li .footer-flickr {background-color: <?php echo get_option("ace_flickr_bg"); ?>;}<?php } ?>
    <?php if (get_option("ace_linkedin_bg")) { ?>ul.footer-icons-list li .footer-linkedin {background-color: <?php echo get_option("ace_linkedin_bg"); ?>;}<?php } ?>
    <?php if (get_option("ace_youtube_bg")) { ?>ul.footer-icons-list li .footer-youtube {background-color: <?php echo get_option("ace_youtube_bg"); ?>;}<?php } ?>
    <?php if (get_option("ace_vimeo_bg")) { ?>ul.footer-icons-list li .footer-vimeo {background-color: <?php echo get_option("ace_vimeo_bg"); ?>;}<?php } ?>
    <?php if (get_option("ace_google_plus_bg")) { ?>ul.footer-icons-list li .footer-google {background-color: <?php echo get_option("ace_google_plus_bg"); ?>;}<?php } ?>
    <?php if (get_option("ace_instagram_bg")) { ?>ul.footer-icons-list li .footer-instagram {background-color: <?php echo get_option("ace_instagram_bg"); ?>;}<?php } ?>
    <?php if (get_option("ace_bloglovin_bg")) { ?>ul.footer-icons-list li .footer-bloglovin {background-color: <?php echo get_option("ace_bloglovin_bg"); ?>;}<?php } ?>
    <?php if (get_option("ace_email_bg")) { ?>ul.footer-icons-list li .footer-email {background-color: <?php echo get_option("ace_email_bg"); ?>;}<?php } ?>

    <?php if (get_option("ace_rss_bg_hover")) { ?>ul.footer-icons-list li .footer-rss:hover {background-color: <?php echo get_option("ace_rss_bg_hover"); ?>;}<?php } ?>
    <?php if (get_option("ace_twitter_bg_hover")) { ?>ul.footer-icons-list li .footer-twitter:hover {background-color: <?php echo get_option("ace_twitter_bg_hover"); ?>;}<?php } ?>
    <?php if (get_option("ace_facebook_bg_hover")) { ?>ul.footer-icons-list li .footer-facebook:hover {background-color: <?php echo get_option("ace_facebook_bg_hover"); ?>;}<?php } ?>
    <?php if (get_option("ace_pinterest_bg_hover")) { ?>ul.footer-icons-list li .footer-pinterest:hover {background-color: <?php echo get_option("ace_pinterest_bg_hover"); ?>;}<?php } ?>
    <?php if (get_option("ace_email_bg_hover")) { ?>ul.footer-icons-list li .footer-email:hover {background-color: <?php echo get_option("ace_email_bg_hover"); ?>;}<?php } ?>
    <?php if (get_option("ace_flickr_bg_hover")) { ?>ul.footer-icons-list li .footer-flickr:hover {background-color: <?php echo get_option("ace_flickr_bg_hover"); ?>;}<?php } ?>
    <?php if (get_option("ace_linkedin_bg_hover")) { ?>ul.footer-icons-list li .footer-linkedin:hover {background-color: <?php echo get_option("ace_linkedin_bg_hover"); ?>;}<?php } ?>
    <?php if (get_option("ace_youtube_bg_hover")) { ?>ul.footer-icons-list li .footer-youtube:hover {background-color: <?php echo get_option("ace_youtube_bg_hover"); ?>;}<?php } ?>
    <?php if (get_option("ace_vimeo_bg_hover")) { ?>ul.footer-icons-list li .footer-vimeo:hover {background-color: <?php echo get_option("ace_vimeo_bg_hover"); ?>;}<?php } ?>
    <?php if (get_option("ace_google_plus_bg_hover")) { ?>ul.footer-icons-list li .footer-google:hover {background-color: <?php echo get_option("ace_google_plus_bg_hover"); ?>;}<?php } ?>
    <?php if (get_option("ace_instagram_bg_hover")) { ?>ul.footer-icons-list li .footer-instagram:hover {background-color: <?php echo get_option("ace_instagram_bg_hover"); ?>;}<?php } ?>
    <?php if (get_option("ace_bloglovin_bg_hover")) { ?>ul.footer-icons-list li .footer-bloglovin:hover {background-color: <?php echo get_option("ace_bloglovin_bg_hover"); ?>;}<?php } ?>
    <?php if (get_option("ace_email_bg_hover")) { ?>ul.footer-icons-list li .footer-email:hover {background-color: <?php echo get_option("ace_email_bg_hover"); ?>;}<?php } ?>

    <?php if( get_option( 'ace_border' ) ) { ?>
    .article,
    .aside,
    .side-widget,
    .footer,
    .footer-icons {border-color: <?php echo get_option( 'ace_border' ); ?>;}
    <?php } ?>

    <?php if( get_option( 'ace_h1' ) ) { ?>h1 {color: <?php echo get_option( 'ace_h1' ); ?>;}<?php } ?>
    <?php if( get_option( 'ace_h2' ) ) { ?>h2 {color: <?php echo get_option( 'ace_h2' ); ?>;}<?php } ?>
    <?php if( get_option( 'ace_h3' ) ) { ?>h3 {color: <?php echo get_option( 'ace_h3' ); ?>;}<?php } ?>
    <?php if( get_option( 'ace_h4' ) ) { ?>h4 {color: <?php echo get_option( 'ace_h4' ); ?>;}<?php } ?>
    <?php if( get_option( 'ace_h5' ) ) { ?>h5 {color: <?php echo get_option( 'ace_h5' ); ?>;}<?php } ?>
    <?php if( get_option( 'ace_h6' ) ) { ?>h6 {color: <?php echo get_option( 'ace_h6' ); ?>;}<?php } ?>

    <?php if( get_option( 'ace_link' ) ) { ?>a {color: <?php echo get_option( 'ace_link' ); ?>;} <?php } ?>
    <?php if( get_option( 'ace_link_hover' ) ) { ?>a:hover {color: <?php echo get_option( 'ace_link_hover' ); ?>;}<?php } ?>

    <?php if( get_option( 'ace_nav_bar' ) ) { ?>.nav, .nav ul ul {background: <?php echo get_option( 'ace_nav_bar' ); ?>;} <?php } ?>
    <?php if( get_option( 'ace_nav_link' ) ) { ?>.nav a {color: <?php echo get_option( 'ace_nav_link' ); ?>;} <?php } ?>
    <?php if( get_option( 'ace_nav_link_hover' ) ) { ?>
    a:hover,
    .nav .current-menu-item > a,
    .nav .current-menu-ancestor > a,
    .nav .current_page_item > a,
    .nav .current_page_ancestor > a {
      color: <?php echo get_option( 'ace_nav_link_hover' ); ?>;
    }
    <?php } ?>

    <?php if( get_option( 'ace_link' ) ) { ?>
    .sc-slide .rslides_tabs li.rslides_here a, 
    .flex-control-nav li a:hover,
    .flex-control-nav li a.flex-active,
    .pagination a:hover,
    .pagination .current,
    a.comment-reply-link,
    a#cancel-comment-reply-link {
      background: <?php echo get_option( 'ace_link' ); ?>;
    }
    <?php } ?>

    <?php if( get_option( 'ace_button_bg' ) ) { ?>
    .post-button,
    .input-button,
    .input-button,
    input[type=submit] {
      background: <?php echo get_option( 'ace_button_bg' ); ?>;
      <?php if ( get_option( 'ace_button_border' ) ) { ?>border: 1px solid <?php echo get_option( 'ace_button_border' ); ?>;<?php } ?>
      <?php if ( get_option( 'ace_button_text' ) ) { ?>color: <?php echo get_option( 'ace_button_text' ); ?>;<?php } ?>
    }
    <?php } ?>

    <?php if( get_option( 'ace_button_bg_hover' ) ) { ?>
    .post-button:hover,
    .input-button:hover,
    .input-button:hover,
    input[type=submit]:hover {
      background: <?php echo get_option( 'ace_button_bg_hover' ); ?>;
      <?php if ( get_option( 'ace_button_border_hover' ) ) { ?>border: 1px solid <?php echo get_option( 'ace_button_border_hover' ); ?>;<?php } ?>
      <?php if ( get_option( 'ace_button_text_hover' ) ) { ?>color: <?php echo get_option( 'ace_button_text_hover' ); ?>;<?php } ?>
    }
    <?php } ?>

    .accordion-title {background-color: <?php echo get_option( 'ace_accordion_bg' ); ?>; color: <?php echo get_option( 'ace_accordion_text' ); ?>;}
    .accordion-open {background-color: <?php echo get_option( 'ace_accordion_bg_hover' ); ?>; color: <?php echo get_option( 'ace_accordion_text_hover' ); ?>;}

    <?php if (get_option("ace_fixed_menu") ) { ?>
    .nav {position: relative;}
    .container {padding: 17px 0 0 0;}
    <?php } ?>

  </style>

<?php }

// ==================================================================
// Breadcrumb
// ==================================================================
function ace_breadcrumb() {
  if( get_option( 'ace_enable_breadcrumb' ) ) { echo get_breadcrumb(); }
}

// ==================================================================
// Heading
// ==================================================================
function ace_heading() {

  if( get_header_image() == true ) { ?>
    <a href="<?php echo esc_url( home_url('/') ); ?>">
      <img src="<?php header_image(); ?>" class="aligncenter" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" />
    </a>
  <?php } elseif( is_home() || is_front_page() ) { ?>
      <h1><a href="<?php echo esc_url( home_url('/') ); ?>" class="header-title"><?php bloginfo('name'); ?></a></h1>
  <?php } else { ?>
      <h5><a href="<?php echo esc_url( home_url('/') ); ?>" class="header-title"><?php bloginfo('name'); ?></a></h5>
  <?php }

}

// ==================================================================
// Header scripts
// ==================================================================
function ace_header_scripts() {
  if( get_option( 'ace_header_scripts' ) ) { echo stripslashes( get_option( 'ace_header_scripts' ) ); }
}

// ==================================================================
// Footer scripts
// ==================================================================
function ace_footer_scripts() {
  if( get_option( 'ace_footer_scripts' ) ) { echo stripslashes( get_option( 'ace_footer_scripts' ) ); }
}
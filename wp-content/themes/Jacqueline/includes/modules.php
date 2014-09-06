<?php


// ==================================================================
// Theme scripts
// ==================================================================
function ace_theme_scripts(){

  wp_enqueue_script('jquery');
  wp_enqueue_script('jquery-ui-widget');
  wp_enqueue_style( 'style', get_stylesheet_uri(), date('l jS \of F Y h:i:s A'), array(), 'all' );
  wp_enqueue_style( 'stylesheet', get_template_directory_uri() . '/stylesheet.css', date('l jS \of F Y h:i:s A'), array(), 'all' );
  wp_enqueue_style( 'google-webfont', 'http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic|Open+Sans:400italic,700italic,400,700|', '', 'all' );
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' );

  wp_enqueue_script( 'respond', get_template_directory_uri() . '/js/respond.min.js', array( 'jquery' ), '1.3.0', true );
  wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider.min.js', array( 'jquery' ), '2.2', true );
  wp_enqueue_script( 'jquery-form', get_template_directory_uri() . '/js/jquery.form.min.js', array( 'jquery' ), '3.33', true );
  wp_enqueue_script( 'responsiveslides', get_template_directory_uri() . '/js/responsiveslides.min.js', array( 'jquery' ), '1.54', true );
  wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/js/fitvids.min.js', array( 'jquery' ), '1.0', true );
  wp_enqueue_script( 'doubletaptogo', get_template_directory_uri() . '/js/doubletaptogo.min.js', array( 'jquery' ), null, true );
  wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), null, true );

}
add_action('wp_enqueue_scripts', 'ace_theme_scripts');

// ==================================================================
// Conditional scripts
// ==================================================================
function conditional_scripts() {
  ?>

  <!--[if lt IE 7]><script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js" type="text/javascript"></script><![endif]-->
  <!--[if lt IE 8]><script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js" type="text/javascript"></script><![endif]-->
  <!--[if lt IE 9]><script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js" type="text/javascript"></script><![endif]-->
  <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script><![endif]-->

  <?php
}
add_action('wp_head', 'conditional_scripts');

// ==================================================================
// Add "Theme Options" on admin bar
// ==================================================================
function ace_admin_bar_menu() {

  global $wp_admin_bar;

  $home_url = get_home_url();
	if ( !is_super_admin() || !is_admin_bar_showing() )
  return;

	$wp_admin_bar->add_menu( array(
    'parent'  => 'appearance',
    'title'   => __( 'Theme Options','ace'),
    'href'    => ''.$home_url.'/wp-admin/themes.php?page=ace_options.php',
    'id'      => 'theme_options'
    ) );

}
add_action('admin_bar_menu', 'ace_admin_bar_menu', 100);

// ==================================================================
// Content width
// ==================================================================
if ( ! isset( $content_width ) )
	$content_width = 600;

function set_full_width() {
	global $full_width;
	if ( is_page_template( 'page_full.php' ) || is_page_template( 'page_full_title.php' ) || get_option("ace_full_blog") )
		$full_width = 980;
}
add_action( 'template_redirect', 'set_full_width' );

// Theme Setup
// ====================================================================================================================================
function ace_theme_setup() {
// ====================================================================================================================================

  // ==================================================================
  // Custom header
  // ==================================================================
  add_theme_support( 'custom-header', array(
	'default-image'          => get_template_directory_uri() . '/images/header_title.gif',
	'random-default'         => false,
	'width'                  => 980,
	'height'                 => 150,
	'flex-height'            => true,
	'flex-width'             => true,
	'default-text-color'     => '',
	'header-text'            => false,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
  ));

  // ==================================================================
  // Language
  // ==================================================================
  load_theme_textdomain('ace', get_template_directory() . '/languages');

  // ==================================================================
  // Post thumbnail
  // ==================================================================
  add_theme_support('post-thumbnails');
    // Set size via Theme Options
    $width = esc_attr( get_option("ace_thumb_width") );
    $height = esc_attr( get_option("ace_thumb_height") );
    add_image_size( 'post_thumb', $width, $height, true );

    add_image_size( 'related_thumb', 120, 120, true );
    add_image_size( 'slide_image', 980, 450, true );

  // ==================================================================
  // Add default posts and comments RSS feed links to head
  // ==================================================================
  add_theme_support( 'automatic-feed-links' );

  // ==================================================================
  // Menu location
  // ==================================================================
  register_nav_menu( 'top_menu', __('Top Menu','ace') );

  // ==================================================================
  // Custom background
  // ==================================================================
  add_theme_support( 'custom-background', array('default-color' => 'ffffff',) );

  // ==================================================================
  // Visual editor stylesheet
  // ==================================================================
  add_editor_style('editor.css');

  // ==================================================================
  // Shortcode in excerpt
  // ==================================================================
  add_filter('the_excerpt', 'do_shortcode');

  // ==================================================================
  // Shortcode in widget
  // ==================================================================
  add_filter('widget_text', 'do_shortcode');

  // ==================================================================
  // Clickable link in content
  // ==================================================================
  add_filter('the_content', 'make_clickable');

  // ==================================================================
  // Remove version generator
  // ==================================================================
  remove_action('wp_head', 'wp_generator');

  // ==================================================================
  // Add "Home" in menu
  // ==================================================================
  function ace_home_page_menu( $args ) {
    $args['show_home'] = true;
    return $args;
  }
  add_filter( 'wp_page_menu_args', 'ace_home_page_menu' );

// Theme Setup
// ====================================================================================================================================
}
add_action( 'after_setup_theme', 'ace_theme_setup' );
// ====================================================================================================================================

// ==================================================================
// Remove auto format
// ==================================================================

function ace_formatter($content) {

	$new_content = '';
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

	foreach ($pieces as $piece) {
		if (preg_match($pattern_contents, $piece, $matches)) {
			$new_content .= $matches[1];
		} else {
			$new_content .= wptexturize(wpautop($piece));
		}
	}

	return $new_content;

}
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');
add_filter('the_content', 'ace_formatter', 99);

// ==================================================================
// Add thumbnail column on post listing
// ==================================================================
function thumbnail_column($columns) {

  $columns['thumbnail'] = 'Thumbnail';
  return $columns;

}
function show_thumbnail_column($name) {

    global $post;
    switch ($name) {
        case 'thumbnail':
            $thumbnail = get_the_post_thumbnail($post->ID, array(64,64));
            echo $thumbnail;
    }

}
add_filter('manage_posts_columns', 'thumbnail_column');
add_action('manage_posts_custom_column',  'show_thumbnail_column');

// ==================================================================
// Login error message
// ==================================================================
function ace_failed_login() {

  return 'The login information you have entered is incorrect.';

}
add_filter('login_errors', 'ace_failed_login');

// ==================================================================
// Recent posts
// ==================================================================
function ace_recent_posts($no_posts = 10, $excerpts = true) {

  global $wpdb;
  $request = "SELECT ID, post_title, post_excerpt FROM $wpdb->posts WHERE post_status = 'publish' AND post_type='post' ORDER BY post_date DESC LIMIT $no_posts";
  $posts = $wpdb->get_results($request);
    if( $posts ) {
      foreach ($posts as $posts) {
        $post_title = stripslashes($posts->post_title);
        $permalink = get_permalink($posts->ID);
        $output .= '<li><a href="' . $permalink . '" rel="bookmark" title="Permanent Link: ' . htmlspecialchars($post_title, ENT_COMPAT) . '">' . htmlspecialchars($post_title) . '</a></li>';
      }
    } else {
      $output .= '<li>No posts found</li>';
    }
  echo $output;

}

// ==================================================================
// Get first image from post
// ==================================================================
function ace_get_thumb() {

  global $post, $posts;

  $first_img = '';
  ob_start(); ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];
  return $first_img;

}

// ==================================================================
// Custom excerpt length
// ==================================================================
function ace_excerpt($num) {

  $limit = $num+1;
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  array_pop($excerpt);
  $excerpt = implode(" ",$excerpt)."...";
  echo $excerpt;

}

// ==================================================================
// Comment spam, prevention
// ==================================================================
function ace_check_referrer() {

  if( !isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] == "" ) {
    wp_die( __('Please enable referrers in your browser.','ace') );
  }

}
add_action('check_comment_flood', 'ace_check_referrer');

// ==================================================================
// Comment time
// ==================================================================
function ace_time_ago( $type = 'comment' ) {

  $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
  return human_time_diff($d('U'), current_time('timestamp')) . " " . __('ago','ace');

}

// ==================================================================
// Custom comment style
// ==================================================================
function comment_style($comment, $args, $depth) {

  $GLOBALS['comment'] = $comment; ?>
  <li <?php comment_class(); ?>>
    <article class="comment-content" id="comment-<?php comment_ID(); ?>">
      <div class="comment-meta">
        <?php echo get_avatar($comment, $size = '32'); ?>
        <?php printf( __('<h6>%s</h6>','ace'), get_comment_author_link()) ?>
        <small><?php printf( __('%1$s at %2$s','ace'), get_comment_date(), get_comment_time()) ?> (<?php printf( __('%s','ace'), ace_time_ago() ) ?>)</small>
      </div>
    <?php if ($comment->comment_approved == '0') : ?><em><?php _e('Your comment is awaiting moderation','ace') ?>.</em><br /><?php endif; ?>
    <?php comment_text() ?>
    <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>

<?php }

// ==================================================================
// Header title
// ==================================================================
function ace_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() )
		return $title;
	// Add the site name.
	$title .= get_bloginfo( 'name' );
	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";
	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'ace' ), max( $paged, $page ) );
	return $title;
}
add_filter( 'wp_title', 'ace_wp_title', 10, 2 );

// ==================================================================
// Add internal lightbox
// ==================================================================
function ace_add_themescript(){
  if( !is_admin() ){
    wp_enqueue_script('jquery');
    wp_enqueue_script('thickbox',null,array('jquery'));
  }
}
add_action('init','ace_add_themescript');

function ace_wp_thickbox_script() {
  ?>
  <script type="text/javascript">
  if ( typeof tb_pathToImage != 'string' )
    {
      var tb_pathToImage = "<?php echo home_url().'/wp-includes/js/thickbox'; ?>/loadingAnimation.gif";
    }
  if ( typeof tb_closeImage != 'string' )
    {
      var tb_closeImage = "<?php echo home_url().'/wp-includes/js/thickbox'; ?>/tb-close.png";
    }
  </script>
  <?php
  wp_enqueue_style('thickbox.css', '/'.WPINC.'/js/thickbox/thickbox.css', null, '1.0');
}
add_action('wp_head', 'ace_wp_thickbox_script');

// ==================================================================
// Add colorbox
// ==================================================================
define( "IMAGE_FILETYPE", "(bmp|gif|jpeg|jpg|png)", true );

function ace_colorbox_replace($string) {
  $pattern = '/(<a(.*?)href="([^"]*.)'.IMAGE_FILETYPE.'"(.*?)><img)/ie';
  $replacement = 'stripslashes(strstr("\2\5","rel=\class=") ? "\1" : "<a\2href=\"\3\4\"\5 rel=\"colorbox\" class=\"colorbox\"><img")';
  return preg_replace($pattern, $replacement, $string);
}
add_filter('the_content', 'ace_colorbox_replace');

function ace_add_colorbox_rel( $attachment_link ) {
  $attachment_link = str_replace( 'a href' , 'a rel="colorbox-cats" class="colorbox-cats" href' , $attachment_link );
  return $attachment_link;
}
add_filter('wp_get_attachment_link' , 'ace_add_colorbox_rel');

function ace_colorbox_script(){
  wp_register_script('colorbox', get_template_directory_uri() . '/js/colorbox/jquery.colorbox-min.js');
  wp_enqueue_script('colorbox');
}
add_action('wp_footer', 'ace_colorbox_script');

function ace_colorbox_css(){
  wp_register_style('colorbox', get_template_directory_uri() . '/js/colorbox/colorbox.css');
  wp_enqueue_style('colorbox');
}
add_action('wp_head', 'ace_colorbox_css');

function ace_colorbox_javascript() {
  ?>
  <script type="text/javascript">
  /* <![CDATA[ */
  jQuery(document).ready(function($){ // START
    $(".colorbox-cats").colorbox({rel:"colorbox-cats", maxWidth:"100%", maxHeight:"100%"});
    $(".colorbox").colorbox({rel:"colorbox", maxWidth:"100%", maxHeight:"100%"});
    $(".colorbox-video").colorbox({iframe:true, innerWidth:"80%", innerHeight:"80%"});
    $(".colorbox-iframe").colorbox({iframe:true, width:"80%", height:"80%"});
  }); // END
  /* ]]> */
  </script>
  <?php
}
add_action('wp_head', 'ace_colorbox_javascript');

// ==================================================================
// Breadcrumb
// ==================================================================
function get_breadcrumb() {
  $space = '&raquo;';
  $name = __('Home','ace'); //text for the 'Home' link
  $before = '<span class="current">';
  $after = '</span>';

  if ( !is_home() && !is_front_page() || is_paged() ) {
    echo '<div class="breadcrumb">'; 
      global $post;
      $home = esc_url( home_url('/') );
    echo '<a href="' . $home . '">' . $name . '</a> ' . $space . ' ';

    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
        if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $space . ' '));
          echo $before . __( 'Archive by category &#39;','ace');
            single_cat_title();
          echo '&#39;' . $after;

    } elseif ( is_day() ) {

      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $space . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $space . ' ';
      echo $before . get_the_time('d') . $after;

    } elseif ( is_month() ) {

      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $space . ' ';
      echo $before . get_the_time('F') . $after;

    } elseif ( is_year() ) {

      echo $before . get_the_time('Y') . $after;

    } elseif ( is_single() && !is_attachment() ) {

      if(get_post_type() != 'post') {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
          echo $post_type->labels->singular_name;
          echo '&nbsp;';
          echo $space;
          echo '&nbsp;';
          echo $before;
            the_title();
          echo $after;
      } else {
        $cat = get_the_category();
        $cat = $cat[0];
          echo get_category_parents($cat, TRUE, ' ' . $space . ' ');
          echo $before;
            the_title();
          echo $after;
      }

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post') {

      $post_type = get_post_type_object(get_post_type());
        echo $before;
        echo $post_type->labels->singular_name;
        echo $after;
        echo '&nbsp;';
        echo $space;
        echo '&nbsp;';
        echo $before;
          the_title();
        echo $after;

    } elseif ( is_page() && !$post->post_parent ) {

      echo $before;
        the_title();
      echo $after;

    } elseif ( is_page() && $post->post_parent ) {

      $parent_id= $post->post_parent;
      $breadcrumbs = array();
        while ($parent_id) {
          $page = get_page($parent_id);
          $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
          $parent_id= $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
          foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $space . ' ';
            echo $before;
              the_title();
            echo $after;

    } elseif ( is_search() ) {

      echo $before . __( 'Search results for &#39;','ace') . get_search_query() . '&#39;' . $after;

    } elseif ( is_tag() ) {

      echo $before . __( 'Posts tagged &#39;','ace');
        single_tag_title();
      echo '&#39;' . $after;

    } elseif ( is_author() ) {

      global $author;
      $userdata = get_userdata($author);
        echo $before . __( 'Articles posted by ','ace') . $userdata->display_name . $after;

    } elseif ( is_404() ) {

      echo $before . 'Error 404' . $after;

    }

    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
        echo __('Page','ace') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
    echo '</div>';
  }

}

// ==================================================================
// Post/page pagination
// ==================================================================
function ace_get_link_pages() {
  wp_link_pages(
    array(
    'before'           => '<p class="page-pagination"><span class="page-pagination-title">' . __('Pages:','ace') . '</span>',
    'after'            => '</p>',
    'link_before'      => '<span class="page-pagination-number">',
    'link_after'       => '</span>',
    'next_or_number'   => 'number',
    'nextpagelink'     => __('Next page','ace'),
    'previouspagelink' => __('Previous page','ace'),
    'pagelink'         => '%',
    'echo'             => 1
    )
  );
}

// ==================================================================
// Pagination (WordPress)
// ==================================================================
function ace_get_pagination_links() {
  global $wp_query;
  $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
  $big = 999999999;
  return paginate_links( array(
    'base' => @add_query_arg('paged','%#%'),
    'format' => '?paged=%#%',
    'current' => $current,
    'total' => $wp_query->max_num_pages,
    'prev_next'    => true,
    'prev_text'    => __('Previous','ace'),
    'next_text'    => __('Next','ace'),
  ) );
}

// ==================================================================
// Pagination
// ==================================================================
function ace_get_pagination($args = null) {

$defaults = array(
  'page' => null,
  'pages' => null, 
  'range' => 2,
  'gap' => 2,
  'anchor' => 1,
  'before' => '<ul class="pagination"><li class="pages radius-4">Pages</li>',
  'after' => '</ul>',
  'nextpage' => __('Next','ace'),
  'previouspage' => __('Back','ace'),
  'echo' => 1
);

$r = wp_parse_args($args, $defaults); extract($r, EXTR_SKIP);
if (!$page && !$pages) {
  global $wp_query;
  $page = get_query_var('paged');
  $page = !empty($page) ? intval($page) : 1;
  $posts_per_page = intval(get_query_var('posts_per_page'));
  $pages = intval(ceil($wp_query->found_posts / $posts_per_page));
}
$output = "";

if ($pages > 1) {	
  $output .= $before;
  $ellipsis = '<li><span class="current-page radius-4">...</span></li>';
    if ($page > 1 && !empty($previouspage)) {
      $output .= '<li><a href="' . get_pagenum_link($page - 1) . '" class="radius-4" rel="prev">' . $previouspage . '</a></li>';
    }
  $min_links = $range * 2 + 1;
  $block_min = min($page - $range, $pages - $min_links);
  $block_high = max($page + $range, $min_links);
  $left_gap = (($block_min - $anchor - $gap) > 0) ? true : false;
  $right_gap = (($block_high + $anchor + $gap) < $pages) ? true : false;

    if ($left_gap && !$right_gap) {
      $output .= sprintf('%s%s%s', 
      pagination(1, $anchor), 
      $ellipsis, 
      pagination($block_min, $pages, $page)
      );
    } else if ($left_gap && $right_gap) {
      $output .= sprintf('%s%s%s%s%s', 
      pagination(1, $anchor), 
      $ellipsis, 
      pagination($block_min, $block_high, $page), 
      $ellipsis, 
      pagination(($pages - $anchor + 1), $pages)
      );
    } else if ($right_gap && !$left_gap) {
      $output .= sprintf('%s%s%s', 
      pagination(1, $block_high, $page),
      $ellipsis,
      pagination(($pages - $anchor + 1), $pages)
      );
    } else {
      $output .= pagination(1, $pages, $page);
    }

    if ($page < $pages && !empty($nextpage)) {
      $output .= '<li><a href="' . get_pagenum_link($page + 1) . '" class="radius-4" rel="next">' . $nextpage . '</a></li>';
    }

  $output .= $after;

}

if ($echo) {
  echo $output;
}
return $output;
}

function pagination($start, $max, $page = 0) {
  $output = "";
    for ($i = $start; $i <= $max; $i++) {
      $output .= ($page === intval($i)) 
      ? '<li><span class="current-page radius-4">' . $i . '</span></li>' 
      : '<li><a href="' . get_pagenum_link($i) . '" class="radius-4">' . $i . '</a></li>';
    }
return $output;

}

// ==================================================================
// Jetpack and Colorbox conflict
// ==================================================================
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if (is_plugin_active('jetpack/jetpack.php')) {
  remove_action('init','ace_add_themescript');
  remove_action('wp_head', 'ace_wp_thickbox_script');
  remove_filter('wp_get_attachment_link' , 'ace_add_colorbox_rel');
  remove_action('wp_head', 'ace_colorbox_javascript');
  remove_action('wp_footer', 'ace_colorbox_script');
}
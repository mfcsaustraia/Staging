<!DOCTYPE html>
<!--[if IE 7]><html id="ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html id="ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
<title><?php wp_title('|', true, 'right'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" href="<?php if( get_option("ace_favicon") ) { echo esc_url( get_option("ace_favicon") ); } else { echo get_stylesheet_directory_uri(); echo "/images/favicon.gif"; } ?>?<?php echo date('l jS \of F Y h:i:s A'); ?>" type="image/x-icon" />

<?php wp_head(); ?>

<?php echo ace_header_scripts() || ace_css() || ace_theme_css(); ?>

</head>
<body <?php body_class(); ?>>

<section class="wrap">

<nav class="nav" role="navigation">
  <?php wp_nav_menu( 'theme_location=top_menu&container_class=menu&fallback_cb=wp_page_menu&show_home=1' ); ?>
</nav><!-- .nav -->


<section class="container">

  <header class="header" role="banner">

    <?php echo ace_heading(); ?>

  </header><!-- .header -->


  <?php if (get_option("ace_enable_newsletter") == true) { ?>
  <section class="header-meta">
    <section class="header-meta-inner">
    <?php echo stripslashes( get_option("ace_newsletter") ); ?>
    </section>
  </section>
  <?php } ?>

  <?php echo ace_theme_slider(); ?>
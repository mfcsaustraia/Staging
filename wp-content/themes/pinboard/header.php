<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<?php
/** Themify Default Variables
 @var object */
	global $themify; ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">

<title><?php if (is_home() || is_front_page()) { echo bloginfo('name'); } else { echo wp_title(''); } ?></title>

<?php
/**
 *  Stylesheets and Javascript files are enqueued in theme-functions.php
 */
?>

<!-- wp_header -->
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php themify_body_start(); //hook ?>
<div id="pagewrap">

	<div id="headerwrap">

		<?php themify_header_before(); //hook ?>
		<header id="header" class="pagewidth">
        	<?php themify_header_start(); //hook ?>
            
			<hgroup>
				<?php if(themify_get('setting-site_logo') == 'image' && themify_check('setting-site_logo_image_value')){ ?>
					 <?php echo $themify->logo_image(); ?>
				<?php } else { ?>
					 <h1 id="site-logo"><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></h1>
				<?php } ?>
			</hgroup>
	
			<nav id="main-nav-wrap">
				<div id="menu-icon" class="mobile-button"></div>
				<?php if (function_exists('wp_nav_menu')) {
					wp_nav_menu(array('theme_location' => 'main-nav' , 'fallback_cb' => 'themify_default_main_nav' , 'container'  => '' , 'menu_id' => 'main-nav' , 'menu_class' => 'main-nav'));
				} else {
					themify_default_main_nav();
				} ?>
			</nav>
			<!-- /#main-nav -->
			
			<div id="social-wrap">
				<?php if(!themify_check('setting-exclude_search_form')): ?>
					<div id="searchform-wrap">
						<div id="search-icon" class="mobile-button"></div>
						<?php get_search_form(); ?>
					</div>
					<!-- /searchform-wrap -->
				<?php endif ?>
		
				<div class="social-widget">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('social-widget') ) ?>
		
					<?php if(!themify_check('setting-exclude_rss')): ?>
						<div class="rss"><a href="<?php if(themify_get('setting-custom_feed_url') != ""){ echo themify_get('setting-custom_feed_url'); } else { echo bloginfo('rss2_url'); } ?>">RSS</a></div>
					<?php endif ?>
				</div>
				<!-- /.social-widget -->
			</div>
            
            <?php themify_header_end(); //hook ?>
		</header>
		<!-- /#header -->
        <?php themify_header_after(); //hook ?>
				
	</div>
<div class="logoo-main"style="width:100%;background-color;red:"><img src="http://staging.adwoadadzie.com/wp-content/uploads/2014/07/full-980x150.png"></div>
<div class="mail_form">
<p>Subscribe to the newsletter and get the regular small business tips delivered straight to your inbox! </p>
<div class="mail_pic"><img src="<?php bloginfo('url') ?>/wp-content/uploads/2014/07/newsletter_bg1.png" /></div>
<div id="mc_embed_signup">
<form action="//adwoadadzie.us3.list-manage.com/subscribe/post?u=d9bcead2c3dca67e8a42102c2&amp;id=1d63792da0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
	<h2>Subscribe to our mailing list</h2>
<div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
<div class="mc-field-group">
	<label for="mce-EMAIL">Email Address  <span class="asterisk">*</span>
</label>
	<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Your Email">
</div>
<div class="mc-field-group">
	<label for="mce-FNAME">First Name  <span class="asterisk">*</span>
</label>
	<input type="text" value="" name="FNAME" class="required" id="mce-FNAME" placeholder="Your Name">
</div>

	<div id="mce-responses" >
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;"><input type="text" name="b_d9bcead2c3dca67e8a42102c2_1d63792da0" tabindex="-1" value=""></div>
    <div class="mail_button"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
</form>
</div>

</div>
<section class="header_12">
    <section class="header-123">

   

        </section><!--header_123-->
  </section><!--header_12-->
	<!-- /#headerwrap -->
	
	<div id="body" class="clearfix">
    <?php themify_layout_before(); //hook ?>
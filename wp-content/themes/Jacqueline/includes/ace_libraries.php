<?php
//// ==================================================================
// Theme options settings
//// ==================================================================
$themename  = 'Theme';
$shortname  = 'ace_';
$options    = array (

array(
  'name'  =>  'Theme',
  'type'  =>  'header'
),

//// ==================================================================
// General
//// ==================================================================
array('type'=>'class','class'=>'<div id="general">'),
array(
  'name'  =>  'Custom favicon',
  'id'    =>  $shortname.'favicon',
  'type'  =>  'upload',
  "size"  =>  '16x16',
  'note'  =>  '',
  'std'   =>  '',
),
array(
  'name'  => 'Menu bar',
  'id'    => $shortname.'fixed_menu',
  'type'  => 'checkbox',
  'note'  => 'Check to  <strong>disable</strong> fixed menu bar.',
),
array(
  'name'  => 'Full width blog page',
  'id'    => $shortname.'full_blog',
  'type'  => 'checkbox',
  'note'  => 'Check to use full width blog page.',
),
array(
  'name'  =>  'Footer credit',
  'id'    =>  $shortname.'footer_credit',
  'type'  =>  'editor',
  'note'  =>  '',
),
array('type'=>'class','class'=>'</div>'),

//// ==================================================================
// Colors
//// ==================================================================
array('type'=>'class','class'=>'<div id="colors">'),
// ========== Links
array(
  'type'  => 'title',
  'note'  => 'General',
),
array(
  'name'  => 'Border',
  'id'    => $shortname.'border',
  'type'  => 'color',
  'note'  => 'border',
  'std'   => '#111',
),
// ========== Links
array(
  'type'  => 'title',
  'note'  => 'Links',
),
array(
  'name'  => 'Color',
  'id'    => $shortname.'link',
  'type'  => 'color',
  'note'  => 'link',
  'std'   => '#ff4669',
),
array(
  'name'  => 'Hover color',
  'id'    => $shortname.'link_hover',
  'type'  => 'color',
  'note'  => 'link_hover',
  'std'   => '#222222',
),
// ========== Menu
array(
  'type'  => 'title',
  'note'  => 'Menu',
),
array(
  'name'  => 'Navigation bar color',
  'id'    => $shortname.'nav_bar',
  'type'  => 'color',
  'note'  => 'nav_bar',
  'std'   => '#ffffff',
),
array(
  'name'  => 'Color',
  'id'    => $shortname.'nav_link',
  'type'  => 'color',
  'note'  => 'nav_link',
  'std'   => '#ff4669',
),
array(
  'name'  => 'Hover color',
  'id'    => $shortname.'nav_link_hover',
  'type'  => 'color',
  'note'  => 'nav_link_hover',
  'std'   => '#222222',
),
// ========== Button
array(
  'type'  => 'title',
  'note'  => 'Button',
),
array(
  'name'  => 'Background color',
  'id'    => $shortname.'button_bg',
  'type'  => 'color',
  'note'  => 'ff4669',
  'std'   => '#ff4669',
),
array(
  'name'  => 'Border color',
  'id'    => $shortname.'button_border',
  'type'  => 'color',
  'note'  => 'button_border',
  'std'   => '#ff4669',
),
array(
  'name'  => 'Text color',
  'id'    => $shortname.'button_text',
  'type'  => 'color',
  'note'  => 'button_text',
  'std'   => '#ffffff',
),
array(
  'name'  => 'Hover background color',
  'id'    => $shortname.'button_bg_hover',
  'type'  => 'color',
  'note'  => 'button_bg_hover',
  'std'   => '#222222',
),
array(
  'name'  => 'Hover border color',
  'id'    => $shortname.'button_border_hover',
  'type'  => 'color',
  'note'  => 'button_border_hover',
  'std'   => '#222222',
),
array(
  'name'  => 'Hover text color',
  'id'    => $shortname.'button_text_hover',
  'type'  => 'color',
  'note'  => 'button_text_hover',
  'std'   => '#ffffff',
),
// ========== Accordion
array(
  'type'  => 'title',
  'note'  => 'Accordion',
),
array(
  'name'  => 'Background color',
  'id'    => $shortname.'accordion_bg',
  'type'  => 'color',
  'note'  => 'accordion_bg',
  'std'   => '#ff4669',
),
array(
  'name'  => 'Text color',
  'id'    => $shortname.'accordion_text',
  'type'  => 'color',
  'note'  => 'accordion_text',
  'std'   => '#ffffff',
),
array(
  'name'  => 'Hover background color',
  'id'    => $shortname.'accordion_bg_hover',
  'type'  => 'color',
  'note'  => 'accordion_bg_hover',
  'std'   => '#222222',
),
array(
  'name'  => 'Hover text color',
  'id'    => $shortname.'accordion_text_hover',
  'type'  => 'color',
  'note'  => 'accordion_text_hover',
  'std'   => '#ffffff',
),
// ========== Heading
array(
  'type'  => 'title',
  'note'  => 'Heading',
),
array(
  'name'  => 'H1 Color',
  'id'    => $shortname.'h1',
  'type'  => 'color',
  'note'  => 'h1',
  'std'   => '#ff4669',
),
array(
  'name'  => 'H2 Color',
  'id'    => $shortname.'h2',
  'type'  => 'color',
  'note'  => 'h2',
  'std'   => '#ff4669',
),
array(
  'name'  => 'H3 Color',
  'id'    => $shortname.'h3',
  'type'  => 'color',
  'note'  => 'h3',
  'std'   => '#555555',
),
array(
  'name'  => 'H4 Color',
  'id'    => $shortname.'h4',
  'type'  => 'color',
  'note'  => 'h4',
  'std'   => '#555555',
),
array(
  'name'  => 'H5 Color',
  'id'    => $shortname.'h5',
  'type'  => 'color',
  'note'  => 'h5',
  'std'   => '#222222',
),
array(
  'name'  => 'H6 Color',
  'id'    => $shortname.'h6',
  'type'  => 'color',
  'note'  => 'h6',
  'std'   => '#222222',
),
// ========== Social Media
array(
  'type'  => 'title',
  'note'  => 'Social Media Icons',
),
array(
  'name'  => 'Twitter',
  'id'    => $shortname.'widget_twitter_bg',
  'type'  => 'color',
  'note'  => 'widget_twitter_bg',
  'std'   => '#cccccc',
),
array(
  'name'  => 'Twitter hover',
  'id'    => $shortname.'widget_twitter_bg_hover',
  'type'  => 'color',
  'note'  => 'widget_twitter_bg_hover',
  'std'   => '#269dd5',
),
array(
  'name'  => 'Facebook',
  'id'    => $shortname.'widget_fb_bg',
  'type'  => 'color',
  'note'  => 'widget_fb_bg',
  'std'   => '#cccccc',
),
array(
  'name'  => 'Facebook hover',
  'id'    => $shortname.'widget_fb_bg_hover',
  'type'  => 'color',
  'note'  => 'widget_fb_bg_hover',
  'std'   => '#0c42b2',
),
array(
  'name'  => 'Email',
  'id'    => $shortname.'widget_email_bg',
  'type'  => 'color',
  'note'  => 'widget_email_bg',
  'std'   => '#cccccc',
),
array(
  'name'  => 'Email hover',
  'id'    => $shortname.'widget_email_bg_hover',
  'type'  => 'color',
  'note'  => 'widget_email_bg_hover',
  'std'   => '#aaaaaa',
),
array(
  'name'  => 'RSS Feed',
  'id'    => $shortname.'widget_rss_bg',
  'type'  => 'color',
  'note'  => 'widget_rss_bg',
  'std'   => '#cccccc',
),
array(
  'name'  => 'RSS Feed hover',
  'id'    => $shortname.'widget_rss_bg_hover',
  'type'  => 'color',
  'note'  => 'widget_rss_bg_hover',
  'std'   => '#f49000',
),
array(
  'name'  => 'Google Plus',
  'id'    => $shortname.'widget_google_bg',
  'type'  => 'color',
  'note'  => 'widget_twitter_bg',
  'std'   => '#cccccc',
),
array(
  'name'  => 'Google Plus hover',
  'id'    => $shortname.'widget_google_bg_hover',
  'type'  => 'color',
  'note'  => 'widget_twitter_bg_hover',
  'std'   => '#fd3000',
),
array(
  'name'  => 'Flickr',
  'id'    => $shortname.'widget_flickr_bg',
  'type'  => 'color',
  'note'  => 'widget_flickr_bg',
  'std'   => '#cccccc',
),
array(
  'name'  => 'Flickr hover',
  'id'    => $shortname.'widget_flickr_bg_hover',
  'type'  => 'color',
  'note'  => 'widget_flickr_bg_hover',
  'std'   => '#fc0077',
),
array(
  'name'  => 'Linkedin',
  'id'    => $shortname.'widget_linkedin_bg',
  'type'  => 'color',
  'note'  => 'widget_linkedin_bg',
  'std'   => '#cccccc',
),
array(
  'name'  => 'Linkedin hover',
  'id'    => $shortname.'widget_linkedin_bg_hover',
  'type'  => 'color',
  'note'  => 'widget_linkedin_bg_hover',
  'std'   => '#0d5a7b',
),
array(
  'name'  => 'YouTube',
  'id'    => $shortname.'widget_youtube_bg',
  'type'  => 'color',
  'note'  => 'widget_youtube_bg',
  'std'   => '#cccccc',
),
array(
  'name'  => 'YouTube hover',
  'id'    => $shortname.'widget_youtube_bg_hover',
  'type'  => 'color',
  'note'  => 'widget_youtube_bg_hover',
  'std'   => '#ff0000',
),
array(
  'name'  => 'Vimeo',
  'id'    => $shortname.'widget_vimeo_bg',
  'type'  => 'color',
  'note'  => 'widget_vimeo_bg',
  'std'   => '#cccccc',
),
array(
  'name'  => 'Vimeo hover',
  'id'    => $shortname.'widget_vimeo_bg_hover',
  'type'  => 'color',
  'note'  => 'widget_vimeo_bg_hover',
  'std'   => '#00c1f8',
),
array(
  'name'  => 'Instagram',
  'id'    => $shortname.'widget_instagram_bg',
  'type'  => 'color',
  'note'  => 'widget_instagram_bg',
  'std'   => '#cccccc',
),
array(
  'name'  => 'Instagram hover',
  'id'    => $shortname.'widget_instagram_bg_hover',
  'type'  => 'color',
  'note'  => 'widget_instagram_bg_hover',
  'std'   => '#194f7a',
),
array(
  'name'  => 'BlogLovin',
  'id'    => $shortname.'widget_bloglovin_bg',
  'type'  => 'color',
  'note'  => 'widget_bloglovin_bg',
  'std'   => '#cccccc',
),
array(
  'name'  => 'BlogLovin hover',
  'id'    => $shortname.'widget_bloglovin_bg_hover',
  'type'  => 'color',
  'note'  => 'widget_bloglovin_bg_hover',
  'std'   => '#00c4fd',
),
array(
  'name'  => 'Pinterest',
  'id'    => $shortname.'widget_pinterest_bg',
  'type'  => 'color',
  'note'  => 'widget_twitter_bg',
  'std'   => '#cccccc',
),
array(
  'name'  => 'Pinterest hover',
  'id'    => $shortname.'widget_pinterest_bg_hover',
  'type'  => 'color',
  'note'  => 'widget_twitter_bg_hover',
  'std'   => '#c70505',
),
array('type'=>'class','class'=>'</div>'),

//// ==================================================================
// Social media
//// ==================================================================
array('type'=>'class','class'=>'<div id="social-media">'),
array(
  'name'  => 'Enable social media icons',
  'id'    => $shortname.'footer_icons',
  'type'  => 'checkbox',
  'note'  => 'Show social media icons on footer',
),
array(
  'name' => 'Twitter',
  'id' => $shortname.'twitter',
  'type' => 'text',
  'note' => '',
),
array(
  'name' => 'Twitter icon',
  'id' => $shortname.'twitter_bg',
  'type' => 'color',
  'note' => 'twitter_bg',
  'std' => '#ff4669',
),
array(
  'name' => 'Twitter icon hover',
  'id' => $shortname.'twitter_bg_hover',
  'type' => 'color',
  'note' => 'twitter_bg',
  'std' => '#222222',
),
array(
  'name' => 'Facebook',
  'id' => $shortname.'facebook',
  'type' => 'text',
  'note' => '',
),
array(
  'name' => 'Facebook icon',
  'id' => $shortname.'facebook_bg',
  'type' => 'color',
  'note' => 'facebook_bg',
  'std' => '#ff4669',
),
array(
  'name' => 'Facebook icon hover',
  'id' => $shortname.'facebook_bg_hover',
  'type' => 'color',
  'note' => 'facebook_bg_hover',
  'std' => '#222222',
),
array(
  'name' => 'Pinterest',
  'id' => $shortname.'pinterest',
  'type' => 'text',
  'note' => '',
),
array(
  'name' => 'Pinterest icon',
  'id' => $shortname.'pinterest_bg',
  'type' => 'color',
  'note' => 'pinterest_bg',
  'std' => '#ff4669',
),
array(
  'name' => 'Pinterest icon hover',
  'id' => $shortname.'pinterest_bg_hover',
  'type' => 'color',
  'note' => 'pinterest_bg_hover',
  'std' => '#222222',
),
array(
  'name' => 'Instagram',
  'id' => $shortname.'instagram',
  'type' => 'text',
  'note' => '',
),
array(
  'name' => 'Instagram icon',
  'id' => $shortname.'instagram_bg',
  'type' => 'color',
  'note' => 'instagram_bg',
  'std' => '#ff4669',
),
array(
  'name' => 'Instagram icon hover',
  'id' => $shortname.'instagram_bg_hover',
  'type' => 'color',
  'note' => 'instagram_bg_hover',
  'std' => '#222222',
),
array(
  'name' => 'Google Plus',
  'id' => $shortname.'google_plus',
  'type' => 'text',
  'note' => '',
),
array(
  'name' => 'Google Plus icon',
  'id' => $shortname.'google_plus_bg',
  'type' => 'color',
  'note' => 'google_plus_bg',
  'std' => '#ff4669',
),
array(
  'name' => 'Google Plus icon hover',
  'id' => $shortname.'google_plus_bg_hover',
  'type' => 'color',
  'note' => 'google_plus_bg_hover',
  'std' => '#222222',
),
array(
  'name' => 'Flickr',
  'id' => $shortname.'flickr',
  'type' => 'text',
  'note' => '',
),
array(
  'name' => 'Flickr icon',
  'id' => $shortname.'flickr_bg',
  'type' => 'color',
  'note' => 'flickr_bg',
  'std' => '#ff4669',
),
array(
  'name' => 'Flickr icon hover',
  'id' => $shortname.'flickr_bg_hover',
  'type' => 'color',
  'note' => 'flickr_bg_hover',
  'std' => '#222222',
),
array(
  'name' => 'Linkedin',
  'id' => $shortname.'linkedin',
  'type' => 'text',
  'note' => '',
),
array(
  'name' => 'Linkedin icon',
  'id' => $shortname.'linkedin_bg',
  'type' => 'color',
  'note' => 'linkedin_bg',
  'std' => '#ff4669',
),
array(
  'name' => 'Linkedin icon hover',
  'id' => $shortname.'linkedin_bg_hover',
  'type' => 'color',
  'note' => 'linkedin_bg_hover',
  'std' => '#222222',
),
array(
  'name' => 'YouTube',
  'id' => $shortname.'youtube',
  'type' => 'text',
  'note' => '',
),
array(
  'name' => 'YouTube icon',
  'id' => $shortname.'youtube_bg',
  'type' => 'color',
  'note' => 'youtube_bg',
  'std' => '#ff4669',
),
array(
  'name' => 'YouTube icon hover',
  'id' => $shortname.'youtube_bg_hover',
  'type' => 'color',
  'note' => 'youtube_bg_hover',
  'std' => '#222222',
),
array(
  'name' => 'Vimeo',
  'id' => $shortname.'vimeo',
  'type' => 'text',
  'note' => '',
),
array(
  'name' => 'Vimeo icon',
  'id' => $shortname.'vimeo_bg',
  'type' => 'color',
  'note' => 'vimeo_bg',
  'std' => '#ff4669',
),
array(
  'name' => 'Vimeo icon hover',
  'id' => $shortname.'vimeo_bg_hover',
  'type' => 'color',
  'note' => 'vimeo_bg_hover',
  'std' => '#222222',
),

array(
  'name' => 'Bloglovin',
  'id' => $shortname.'bloglovin',
  'type' => 'text',
  'note' => '',
),
array(
  'name' => 'Bloglovin icon',
  'id' => $shortname.'bloglovin_bg',
  'type' => 'color',
  'note' => 'bloglovin_bg',
  'std' => '#ff4669',
),
array(
  'name' => 'Bloglovin icon hover',
  'id' => $shortname.'bloglovin_bg_hover',
  'type' => 'color',
  'note' => 'bloglovin_bg_hover',
  'std' => '#222222',
),
array(
  'name' => 'RSS Feed',
  'id' => $shortname.'rss',
  'type' => 'text',
  'note' => '',
),
array(
  'name' => 'RSS Feed icon',
  'id' => $shortname.'rss_bg',
  'type' => 'color',
  'note' => 'rss_bg',
  'std' => '#ff4669',
),
array(
  'name' => 'RSS Feed icon hover',
  'id' => $shortname.'rss_bg_hover',
  'type' => 'color',
  'note' => 'rss_bg_hover',
  'std' => '#222222',
),
array(
  'name' => 'Email',
  'id' => $shortname.'email',
  'type' => 'text',
  'note' => '',
),
array(
  'name' => 'Email icon',
  'id' => $shortname.'email_bg',
  'type' => 'color',
  'note' => 'email_bg',
  'std' => '#ff4669',
),
array(
  'name' => 'Email icon hover',
  'id' => $shortname.'email_bg_hover',
  'type' => 'color',
  'note' => 'email_bg_hover',
  'std' => '#222222',
),
array('type'=>'class','class'=>'</div>'),

//// ==================================================================
// Extra inputs
//// ==================================================================
array('type'=>'class','class'=>'<div id="extra">'),
array(
  'name'  => 'Header script(s)',
  'id'    => $shortname.'header_scripts',
  'type'  => 'textarea',
  'note'  => 'Place your necessary code here, anything that needs to be placed before <strong>&#60;/head&#62;</strong>.',
),
array(
  'name'  => 'Footer script(s)',
  'id'    => $shortname.'footer_scripts',
  'type'  => 'textarea',
  'note'  => 'Place your necessary code here, anything that needs to be placed before <strong>&#60;/body&#62;</strong>.',
),
array(
  'name'  => 'Custom CSS',
  'id'    => $shortname.'css',
  'type'  => 'textarea',
  'note'  => 'Add some custom CSS to your theme.',
),
array('type'=>'class','class'=>'</div>'),

//// ==================================================================
// Slider
//// ==================================================================
array('type'=>'class','class'=>'<div id="slider">'),
array(
  'name'  => 'Enable slider',
  'id'    => $shortname.'feature_enable',
  'type'  => 'checkbox',
  'note'  => 'Enable <strong>feature posts slider</strong> on front page.',
),
array(
  'name'  => 'Show slider on homepage only',
  'id'    => $shortname.'feature_enable_home',
  'type'  => 'checkbox',
  'note'  => 'Show slider on homepage <strong>ONLY</strong>',
),
array(
  'name'  => 'Show Title',
  'id'    => $shortname.'feature_title_enable',
  'type'  => 'checkbox',
  'note'  => 'Show <strong>posts title</strong> on slider',
),
array(
  'name'    => 'Pause',
  'id'      => $shortname.'featured_slide_pause',
  'type'    => 'select',
  'std'     => '3000',
  'options' => array( '1000', '2000', '3000', '4000', '5000' ),
  'note'    => 'Time pause on each slide. 1000 = 1 second.',
),
array(
  'name'    => 'Speed',
  'id'      => $shortname.'featured_slide_speed',
  'type'    => 'select',
  'std'     => '300',
  'options' => array( '100', '200', '300', '400', '500', '1000', ),
  'note'    => 'Speed of transition. 1000 = 1 second.',
),
array(
  'name'  => 'Auto slider',
  'id'    => $shortname.'featured_slide_sliding',
  'type'  => 'checkbox',
  'note'  => 'Check to have an <strong>auto</strong> slider.',
),
array(
  'name'  => 'Pager navigation',
  'id'    => $shortname.'featured_slide_pager_nav',
  'type'  => 'checkbox',
  'note'  => 'Check to show <strong>pager navigation (<em>dots</em>)</strong> on slider.',
),
array(
  'name'  => 'Slider navigation',
  'id'    => $shortname.'featured_slide_nav',
  'type'  => 'checkbox',
  'note'  => 'Show <strong>left and right navigation</strong> on slider.',
),
array('type'=>'class','class'=>'</div>'),

//// ==================================================================
// Entry
//// ==================================================================
array('type'=>'class','class'=>'<div id="entry">'),
array(
  'name'  => 'Enable Breadcrumb navigation',
  'id'    => $shortname.'enable_breadcrumb',
  'type'  => 'checkbox',
  'note'  => 'Enable <strong>breadcrumb navigation</strong>',
),
array(
  'name'  => 'Blog author',
  'id'    => $shortname.'blog_author',
  'type'  => 'checkbox',
  'note'  => 'Check to show <strong>author</strong> on blog post.',
),
array(
  'name'  => 'Blog author biography',
  'id'    => $shortname.'blog_author_bio',
  'type'  => 'checkbox',
  'note'  => 'Check to show <strong>author biography</strong> on blog post.',
),
array(
  'name'  => 'Use excerpt summary',
  'id'    => $shortname.'enable_excerpt',
  'type'  => 'checkbox',
  'note'  => 'Enable <strong>excerpt entry</strong>',
),
array(
  'name'  => 'Enable related post',
  'id'    => $shortname.'enable_related',
  'type'  => 'checkbox',
  'note'  => 'Enable <strong>related 5 posts</strong>. <em>Works by relevant "Post Tag"</em>',
),
array(
  'name'  => 'Enable feature thumbnail',
  'id'    => $shortname.'enable_post_thumbnail',
  'type'  => 'checkbox',
  'note'  => 'Enable <strong>Post Thumbnail</strong>',
),
array(
  'id'    => $shortname.'thumb_width',
  'type'  => 'thumb',
  'std'   => '100',
  'note'  => 'Width',
),
array(
  'id'    => $shortname.'thumb_height',
  'type'  => 'thumb',
  'std'   => '100',
  'note'  => 'Height',
),
array('type'=>'class','class'=>'<div style=\"height: 10px; clear: both;\">&nbsp;</div>'),
array('type'=>'class','class'=>'<hr />'),
array('type'=>'class','class'=>'</div>'),

//// ==================================================================
// Newsletter
//// ==================================================================
array('type'=>'class','class'=>'<div id="newsletter">'),
array(
  'name'  => 'Enable newsletter form',
  'id'    => $shortname.'enable_newsletter',
  'type'  => 'checkbox',
  'note'  => 'Enable newsletter form area on header.',
),
array(
  'name'  => 'Newsletter',
  'id'    => $shortname.'newsletter',
  'type'  => 'editor',
  'note'  => 'Kindly use appropriate class for your newsletter form, such as:<br />
  <strong>.header-newsletter</strong> for &lt;form&gt;<br />
  <strong>.header-newsletter-input</strong> for &lt;input&gt;<br />
  <strong>.header-newsletter-button</strong> for submit button<br />
  A quick example of form:<br />
  &lt;form action="post" method="" class="header-newsletter"&gt;<br />
  &lt;input type="text" class="header-newsletter-input" title="Name" /&gt;<br />
  &lt;input type="email" class="header-newsletter-input" title="Email" /&gt;<br />
  &lt;input type="submit" class="header-newsletter-button" value="Subscribe" /&gt;<br />
  &lt;/form&gt;',
),
array('type'=>'class','class'=>'</div>'),

//// ==================================================================
// 404 Error
//// ==================================================================
array('type'=>'class','class'=>'<div id="404">'),
array(
  'name'  => '404 Page Content',
  'id'    => $shortname.'404_page',
  'type'  => 'editor',
  'note'  => '',
),
array('type'=>'class','class'=>'</div>'),


);
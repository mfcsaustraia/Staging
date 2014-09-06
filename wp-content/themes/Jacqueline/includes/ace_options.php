<?php
// ==================================================================
// Add Colorpicker
// ==================================================================
function ilc_farbtastic_script() {

  wp_enqueue_style( 'farbtastic' );
  wp_enqueue_script( 'farbtastic' );

}
add_action('init', 'ilc_farbtastic_script');

function mw_enqueue_color_picker() {

  wp_enqueue_style( 'wp-color-picker' );
  wp_enqueue_script( 'wp-color-picker' );

}
add_action( 'admin_enqueue_scripts', 'mw_enqueue_color_picker' );

// ==================================================================
// Add Thickbox
// ==================================================================
function add_thickbox_script(){

  wp_enqueue_script('thickbox',null,array('jquery'));
  wp_enqueue_style('thickbox.css', '/'.WPINC.'/js/thickbox/thickbox.css', null, '1.0');

}
add_action('init','add_thickbox_script');

// ==================================================================
// Category listing
// ==================================================================
$categories = get_categories('hide_empty=0&orderby=name');  

  $wp_cats = array();  
  foreach ($categories as $category_list ) {  
    $wp_cats[$category_list->cat_ID] = $category_list->cat_name;  
  }  

array_unshift($wp_cats, 'Choose a category'); 

// ==================================================================
// Page listing
// ==================================================================
$pages = get_pages('hide_empty=0&orderby=name');  

  $wp_pages = array();  
  foreach ($pages as $page_list ) {  
    $wp_pages[$page_list->ID] = $page_list->post_title;  
  }  

array_unshift($wp_pages, 'Choose a page'); 

// ==================================================================
// Include the libraries
// ==================================================================
include('ace_libraries.php');

function mytheme_add_admin() {

  global $themename, $shortname, $options;

  if ( isset ( $_GET['page'] ) && ( $_GET['page'] == basename(__FILE__) ) ) {
    if ( isset ($_REQUEST['action']) && ( 'save' == $_REQUEST['action'] ) ){
      foreach ( $options as $value ) {
        if ( array_key_exists('id', $value) ) {
          if ( isset( $_REQUEST[ $value['id'] ] ) ) {
            update_option( $value['id'], $_REQUEST[ $value['id'] ]  );
          } else {
            delete_option( $value['id'] );
          }
        }
      }
      header("Location: themes.php?page=".basename(__FILE__)."&saved=true");
      die;
    } else if ( isset ($_REQUEST['action']) && ( 'reset' == $_REQUEST['action'] ) ) {
      foreach ($options as $value) {
        if ( array_key_exists('id', $value) ) {
          delete_option( $value['id'] );
        }
      }
      header("Location: admin.php?page=".basename(__FILE__)."&reset=true");
      die;
    }

  }

add_theme_page( __('Theme Options','ace'), __('Theme Options','ace'), 'edit_themes', basename(__FILE__), 'mytheme_admin', 10);

}

function mytheme_admin() {

  global $themename, $shortname, $options;
  if( isset($_REQUEST['saved']) ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
  if( isset($_REQUEST['reset']) ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/includes/style.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/includes/js/zebra_datepicker.js"></script>

<div class="wrap">

<div id="icon-themes" class="icon32"><br /></div>
<h2><?php _e('Theme Options','ace'); ?></h2>

<div id="options-form">

  <div id="options-header">
    <h1>Ace<span>Panel</span></h1>
    <div class="meta"><a href="<?php echo esc_url( __( 'http://bluchic.com/support/knowledgebase.php', 'ace' ) ); ?>">Documentation<a/> | <a href="<?php echo esc_url( __( 'http://www.bluchic.com/support', 'ace' ) ); ?>">Support Ticket</a> | <a href="<?php echo esc_url( __( 'https://twitter.com/hibluchic', 'ace' ) ); ?>">Twitter</a> | <a href="<?php echo esc_url( __( 'http://www.facebook.com/hibluchic', 'ace' ) ); ?>">Facebook</a></div>
  </div>

<form method="post">

  <ul class="toplist">
    <li><a class="current" href="#general"><?php _e('General settings','ace'); ?></a></li>
    <li><a href="#colors"><?php _e('Colors settings','ace'); ?></a></li>
    <li><a href="#extra"><?php _e('Extra inputs settings','ace'); ?></a></li>
    <li><a href="#slider"><?php _e('Slider settings','ace'); ?></a></li>
    <li><a href="#social-media"><?php _e('Social media settings','ace'); ?></a></li>
    <li><a href="#entry"><?php _e('Entry settings','ace'); ?></a></li>
    <li><a href="#newsletter"><?php _e('Newsletter area settings','ace'); ?></a></li>
    <li><a href="#404"><?php _e('404 page settings','ace'); ?></a></li>
    <li class="span">
      <input type="submit" name="action" value="<?php _e('Save settings','ace'); ?>" class="button-primary" />
      <input type="hidden" name="action" value="save" />
    </li>
  </ul>

<div id="slide">

<?php
//// ==================================================================
// Text input
//// ==================================================================
?>
<?php foreach ($options as $value) { if ($value['type'] == 'text') { ?>

  <div class="wrap">

    <label for="<?php echo $value['id']; ?>"><h3><?php echo $value['name']; ?></h3></label>
    <input onfocus="this.select();" type="text" id="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>" value="<?php echo get_option( $value['id'] ); ?>" /><br />
    <div class="note"><?php echo $value['note']; ?></div>

  </div>

<?php
//// ==================================================================
// Textarea input
//// ==================================================================
?>
<?php } elseif ($value['type'] == 'textarea') { ?>

  <div class="wrap">

    <label for="<?php echo $value['id']; ?>"><h3><?php echo $value['name']; ?></h3></label>
    <textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php echo stripslashes(get_option( $value['id'] )); ?></textarea><br />
    <div class="note"><?php echo $value['note']; ?></div>

  </div>

<?php
//// ==================================================================
// Visual editor
//// ==================================================================
?>
<?php } elseif ($value['type'] == 'editor') { ?>

  <div class="wrap">

    <label for="<?php echo $value['id']; ?>"><h3><?php echo $value['name']; ?></h3></label>
    <?php
    $settings = array(
      'wpautop' => true,
      'media_buttons' => false,
    );
    if (function_exists('wp_editor')) { wp_editor( stripslashes( get_option( $value['id'] ) ), $value['id'], $settings ); } else { ?>
    <textarea class="tinyMCE-editor" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php echo stripslashes(get_option( $value['id'] )); ?></textarea><br />
    <?php } ?>
    <div class="note"><?php echo $value['note']; ?></div>

  </div>

<?php
//// ==================================================================
// Dropdown select
//// ==================================================================
?>
<?php } elseif ($value['type'] == 'select') { ?>

  <div class="wrap">

    <label for="<?php echo $value['id']; ?>"><h3><?php echo $value['name']; ?></h3></label>
    <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
      <?php foreach ($value['options'] as $option) { ?>
      <option <?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
      <?php } ?>
    </select><br />
    <div class="note"><?php echo $value['note']; ?></div>

  </div>

<?php
//// ==================================================================
// Checkbox
//// ==================================================================
?>
<?php } elseif ($value['type'] == 'checkbox') { ?>

  <div class="wrap">

    <label for="<?php echo $value['id']; ?>"><h3><?php echo $value['name']; ?></h3></label>
    <?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; } else { $checked = "";}?>
    <label><input type="checkbox" name="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> /> &ndash; <?php echo $value['note']; ?></label>

  </div>

<?php
//// ==================================================================
// Radio
//// ==================================================================
?>
<?php } elseif ($value['type'] == 'radio') { ?>

  <div class="wrap">

    <h3><?php echo $value['name']; ?></h3>
    <?php foreach ($value['options'] as $option) { ?>
      <label for="<?php echo $option; ?>">
      <input type="radio" name="<?php echo $value['id']; ?>" id="<?php echo $option; ?>" value="<?php echo $option; ?>" <?php if ( get_option( $value['id'] ) == $option) { echo ' checked="checked"'; } elseif ($option == $value['std']) { echo ' checked="checked"'; } ?> /> <?php echo $option; ?>
      </label>
    <?php } ?>

  </div>

<?php
//// ==================================================================
// Image checkbox
//// ==================================================================
?>
<?php } elseif ($value['type'] == 'image') { ?>

  <div class="wrap">

    <h3><?php echo $value['name']; ?></h3>
    <?php foreach ($value['options'] as $option) { ?>
      <label for="<?php echo $option['name']; ?>" class="image-label">
      <img src="<?php echo get_template_directory_uri(); ?>/includes/images/<?php echo $option['value']; ?>" class="select-img" alt="<?php echo $option['name']; ?>" <?php if ( get_option( $value['id'] ) == $option['name']) { echo ' class="current"'; } elseif ($option == $value['std']) { echo ' class="current"'; } ?> /><br />
      <input type="radio" name="<?php echo $value['id']; ?>" id="<?php echo $option['name']; ?>" value="<?php echo $option['name']; ?>" <?php if ( get_option( $value['id'] ) == $option['name']) { echo ' checked="checked"'; } elseif ($option['name'] == $value['std']) { echo ' checked="checked"'; } ?> />
      <?php echo $option['desc']; ?>
      </label>
    <?php } ?>

  </div>

<?php
//// ==================================================================
// Thumbnail input (side-by-side input)
//// ==================================================================
?>
<?php } elseif ($value['type'] == 'thumb') { ?>

  <div class="thumbnail">

    <label><input class="thumb-input" onfocus="this.select();" type="text" name="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" /> <?php echo $value['note']; ?></label>

  </div>

<?php
//// ==================================================================
// Media upload
//// ==================================================================
?>
<?php } elseif ($value['type'] == 'upload') { ?>

  <div class="wrap">

    <label for="<?php echo $value['id']; ?>"><h3><?php echo $value['name']; ?></h3></label>
    <?php if ( get_option( $value['id'] ) != '') { ?>
    <p>
      <img src="<?php echo get_option( $value['id'] ); ?>" class="img-remove" />
    </p>
    <input onfocus="this.select();" class="uploaded_image" type="text" id="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>" value="<?php echo get_option( $value['id'] ); ?>" /> <a href="media-upload.php?keepThis=true&amp;TB_iframe=true&amp;width=640&amp;height=auto" class="thickbox button"><?php _e('Upload','ace'); ?></a><br />
    <?php } else { ?>
    <input onfocus="this.select();" class="uploaded_image" type="text" id="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" /> <a href="media-upload.php?keepThis=true&amp;TB_iframe=true&amp;width=640&amp;height=auto" class="thickbox button"><?php _e('Upload','ace'); ?></a><br />
    <?php } ?>
    <div class="note"><a href="media-upload.php?keepThis=true&amp;TB_iframe=true&amp;width=640&amp;height=auto" class="thickbox"><?php _e('Upload an image','ace'); ?></a> <?php _e('and copy-paste the file URL or enter an image URL','ace'); ?> <em><?php _e('(including http://)','ace'); ?></em>.<br /><?php _e('Preferable size at','ace'); ?> <?php echo $value['size']; ?> <?php _e('pixel','ace'); ?>.</div>

  </div>

<?php
//// ==================================================================
// Date picker
//// ==================================================================
?>
<?php } elseif ($value['type'] == 'date') { ?>

  <div class="wrap">

    <label for="<?php echo $value['id']; ?>"><h3><?php echo $value['name']; ?></h3></label>
    <input onfocus="this.select();" type="text" id="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>" value="<?php echo get_option( $value['id'] ); ?>" /><br />
    <div class="note"><?php echo $value['note']; ?></div>

  </div>

  <script type="text/javascript">
  jQuery(document).ready(function($) { // START
    $("#<?php echo $value['id']; ?>").Zebra_DatePicker();
  }); // END
  </script>

<?php
//// ==================================================================
// Colour picker
//// ==================================================================
?>
<?php } elseif ($value['type'] == 'color') { ?>

  <div class="wrap">

    <label for="<?php echo $value['id']; ?>"><h3><?php echo $value['name']; ?></h3></label>
    <label for="<?php echo $value['id']; ?>"><input type="text" class="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" /> <!--<span class="<?php echo $value['id']; ?> button" style="padding:4px 10px; border: 1px solid #dfdfdf;"><?php _e('Select','ace'); ?></span>--></label>
    <div class="<?php echo $value['note']; ?>"></div>

  </div>

  <script type="text/javascript">
  jQuery(document).ready(function($) { // START
    //jQuery('.<?php echo $value['note']; ?>').hide();
    //jQuery('.<?php echo $value['note']; ?>').farbtastic(".<?php echo $value['id']; ?>");
    //jQuery(".<?php echo $value['id']; ?>").click(function(){jQuery('.<?php echo $value['note']; ?>').fadeToggle()});
    
    jQuery('.<?php echo $value['id']; ?>').wpColorPicker();
    
  }); // END
  </script>

<?php
//// ==================================================================
// Class
//// ==================================================================
?>
<?php } elseif ($value['type'] == 'class') { echo $value['class']; ?>

<?php
//// ==================================================================
// Title
//// ==================================================================
?>
<?php } elseif ($value['type'] == 'title') { ?><h4><?php echo $value['note']; ?></h4>

<?php
//// ==================================================================
// Info
//// ==================================================================
?>
<?php } elseif ($value['type'] == 'info') { ?><p><?php echo $value['note']; ?></p>

<?php
//// ==================================================================
// Screenshot
//// ==================================================================
?>
<?php } elseif ($value['type'] == 'screenshot') { ?><img src="<?php echo get_template_directory_uri(); ?>/includes/images/<?php echo $value['note']; ?>" class="screenshot" alt="" title="" />

<?php } elseif ($value['type'] == 'header') { } }?>

</div><!-- #slide -->

<script type="text/javascript">
jQuery(document).ready(function($) { // START


  var divWrapper = $('#slide > div');
  divWrapper.hide().filter(':first').show();
    $('ul.toplist li a').click(function () {
      if (this.className.indexOf('current') == -1){
        divWrapper.hide(); divWrapper.filter(this.hash).fadeIn('slow');
          $('ul.toplist li a').removeClass('current');
          $(this).addClass('current');
      }
    return false;
  });


	jQuery('.thickbox').click(function() {
		 targetfield = jQuery(this).prev('.uploaded_image');
		 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		 return false;
	});
	window.send_to_editor = function(html) {
		 imgurl = jQuery('img',html).attr('src');
		 jQuery(targetfield).val(imgurl);
		 tb_remove();
	}


}); // END
</script>

<div class="options-buttons">
  <input type="submit" name="action" value="<?php _e('Save settings','ace'); ?>" class="button-primary alignright" />
  <input type="hidden" name="action" value="save" />
  </form>
    <form method="post">
      <input type="submit" name="action" value="<?php _e('Reset all settings','ace'); ?>" class="button alignleft" />
      <input type="hidden" name="action" value="reset" />
    </form>
</div>

</div><!-- #options-form -->


<?php }

add_action('admin_menu', 'mytheme_add_admin');

global $options;
foreach ($options as $value) {
  if (isset($value['id']) && get_option( $value['id'] ) === FALSE && isset($value['std'])) {
    $$value['id'] = $value['std'];
  }
  elseif (isset($value['id'])) { $$value['id'] = get_option( $value['id'] ); }
}
function dp_settings($key) {
  global $settings;
  return $settings[$key];
}
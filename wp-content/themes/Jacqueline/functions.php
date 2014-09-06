<?php
// ==================================================================
// Included libraries
// ==================================================================
require_once( get_template_directory() . '/includes/ace_functions.php' );
require_once( get_template_directory() . '/includes/ace_import_export.php' );
require_once( get_template_directory() . '/includes/ace_options.php' );
require_once( get_template_directory() . '/includes/ace_updates.php' );
require_once( get_template_directory() . '/includes/custom_post.php' );
require_once( get_template_directory() . '/includes/custom_widgets.php' );
require_once( get_template_directory() . '/includes/meta_boxes.php' );
require_once( get_template_directory() . '/includes/modules.php' );
require_once( get_template_directory() . '/includes/quicktags.php' );
require_once( get_template_directory() . '/includes/shortcodes.php' );
require_once( get_template_directory() . '/includes/widgets.php' );

// ==================================================================
// Jigoshop
// ==================================================================
function mytheme_open_jigoshop_content_wrappers() { echo get_sidebar(); echo '<section class="section">'; }

function mytheme_close_jigoshop_content_wrappers() { echo '</section>';}

function mytheme_prepare_jigoshop_wrappers()
{
  remove_action( 'jigoshop_before_main_content', 'jigoshop_output_content_wrapper', 10 );
  remove_action( 'jigoshop_after_main_content', 'jigoshop_output_content_wrapper_end', 10);
  add_action( 'jigoshop_before_main_content', 'mytheme_open_jigoshop_content_wrappers', 10 );
  add_action( 'jigoshop_after_main_content', 'mytheme_close_jigoshop_content_wrappers', 10 );
}
add_action( 'wp_head', 'mytheme_prepare_jigoshop_wrappers' );

remove_action( 'jigoshop_sidebar', 'jigoshop_get_sidebar', 10);

?>
<?php
// ==================================================================
// Regsiter buttons
// ==================================================================
function register_button1( $buttons ) {
  array_push( $buttons, '|','hr','2columns','3columns','3halfcolumns','|','boxw','boxd','boxq');
  return $buttons;
}

// ==================================================================
// Regsiter buttons
// ==================================================================
function register_button2( $buttons ) {
  array_push( $buttons, 'slider','pullquote','lightbox','tooltip','button','accordion','email');
  return $buttons;
}

// ==================================================================
// Add plugin
// ==================================================================
function add_plugin( $plugin_array ) {
  $plugin_array['ace'] = get_template_directory_uri() .'/includes/js/editor_plugin.js';
  return $plugin_array;
}

// ==================================================================
// Add TinyMCE
// ==================================================================
function ace_button() {
  if( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) { return; }
  if( get_user_option('rich_editing') == 'true' ) {
    add_filter( 'mce_external_plugins', 'add_plugin' );
    add_filter( 'mce_buttons', 'register_button1' );
    add_filter( 'mce_buttons_2', 'register_button2' );
  }
}
add_action('init', 'ace_button');

function quicktags()
{ ?>
<script type="text/javascript" charset="utf-8">

// <![CDATA[
//edButton(id, display, tagStart, tagEnd, access, open)
edbuttonlength = edButtons.length;
edbuttonlength_t = edbuttonlength;
//alert(edButtons);
edButtons[edbuttonlength++] = new edButton('ed_left','Left','[left]','[/left]'); // 0
edButtons[edbuttonlength++] = new edButton('ed_right','Right','[right]','[/right]'); // 1
edButtons[edbuttonlength++] = new edButton('ed_col1','Column 1','[col1]','[/col1]'); // 2
edButtons[edbuttonlength++] = new edButton('ed_col2','Column 2','[col2]','[/col2]'); // 3
edButtons[edbuttonlength++] = new edButton('ed_col3','Column 3','[col3]','[/col3]'); // 4
edButtons[edbuttonlength++] = new edButton('ed_tooltips','Tooltips','[tooltip text="TooltipText"]','[/tooltip]'); // 5
edButtons[edbuttonlength++] = new edButton('ed_lightbox','Lightbox','[lightbox title="LightboxTitle" url="PageURL"]','[/lightbox]'); // 6
edButtons[edbuttonlength++] = new edButton('ed_button','Button','[button url="URL"]','[/button]'); // 7
edButtons[edbuttonlength++] = new edButton('ed_warning','Warning','[warning]','[/warning]'); // 8
edButtons[edbuttonlength++] = new edButton('ed_disclaim','Disclaim','[disclaim]','[/disclaim]'); // 9
edButtons[edbuttonlength++] = new edButton('ed_question','Question','[question]','[/question]'); // 10
edButtons[edbuttonlength++] = new edButton('ed_accordion','Accordion','[accordion title="Title"]','[/accordion]'); // 11
edButtons[edbuttonlength++] = new edButton('ed_line','Line','[line]',''); // 12
edButtons[edbuttonlength++] = new edButton('ed_email','Email','[contact email="Your_Email" subject="Email_Subject" message="Thankyou_Message"]',''); // 13
edButtons[edbuttonlength++] = new edButton('ed_pullquote','Pull Quote','[pullquote width="300" float="left"]','[/pullquote]'); // 14
edButtons[edbuttonlength++] = new edButton('ed_col3half2','Column 3 Half 2','[col3_2]','[/col3_2]'); // 15
edButtons[edbuttonlength++] = new edButton('ed_col3half1','Column 3 Half 1','[col3_1]','[/col3_1]'); // 16
edButtons[edbuttonlength++] = new edButton('ed_slider','Slider','[slide id="Slider_id"]','[/slide]'); // 17
edButtons[edbuttonlength++] = new edButton('ed_slider_img','Slider Image','[images src="http://image.jpg" title="image title" caption="image caption" url="url"]'); // 18
//]]>


//alert(edButtons[edButtons.length]);
(function(){
if (typeof jQuery === 'undefined') { return; }
  jQuery(document).ready(function(){
  jQuery("#ed_toolbar").append('<input type="button" value="Left Column" id="ed_left" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t);" title="Left" />');
  jQuery("#ed_toolbar").append('<input type="button" value="Right Column" id="ed_right" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+1);" title="Right"/>');
  jQuery("#ed_toolbar").append('<input type="button" value="Column 1" id="ed_col1" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+2);" title="Column 1" />');
  jQuery("#ed_toolbar").append('<input type="button" value="Column 2" id="ed_col2" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+3);" title="Column 2" />');
  jQuery("#ed_toolbar").append('<input type="button" value="Column 3" id="ed_col3" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+4);" title="Column 3" />');
  jQuery("#ed_toolbar").append('<input type="button" value="Column 3 Half 2" id="ed_col3half2" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+15);" title="Column 3 half 2" />');
  jQuery("#ed_toolbar").append('<input type="button" value="Column 3 Half 1" id="ed_col3half1" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+16);" title="Column 3 half 1" />');
  jQuery("#ed_toolbar").append('<input type="button" value="Tooltips" id="ed_tooltips" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+5);" title="Tooltips" />');
  jQuery("#ed_toolbar").append('<input type="button" value="Lightbox Content" id="ed_lightbox" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+6);" title="Lightbox Content" />');
  jQuery("#ed_toolbar").append('<input type="button" value="Button" id="ed_button" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+7);" title="Button" />');
  jQuery("#ed_toolbar").append('<input type="button" value="Warning Box" id="ed_warning" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+8);" title="Warning" />');
  jQuery("#ed_toolbar").append('<input type="button" value="Disclaim Box" id="ed_disclaim" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+9);" title="Disclaim" />');
  jQuery("#ed_toolbar").append('<input type="button" value="Question Box" id="ed_question" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+10);" title="Question" />');
  jQuery("#ed_toolbar").append('<input type="button" value="Slider" id="ed_slider" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+17);" title="Slider" />');
  jQuery("#ed_toolbar").append('<input type="button" value="Slider Image" id="ed_slider_img" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+18);" title="Slider Image" />');
  jQuery("#ed_toolbar").append('<input type="button" value="Pull Quote" id="ed_pullquote" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+14);" title="Pull Quote" />');
  jQuery("#ed_toolbar").append('<input type="button" value="Accordion" id="ed_accordion" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+11);" title="Accordion" />');
  jQuery("#ed_toolbar").append('<input type="button" value="Line" id="ed_line" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+12);" title="Line" />');
  jQuery("#ed_toolbar").append('<input type="button" value="Email" id="ed_email" class="ed_button" onclick="edInsertTag(edCanvas, edbuttonlength_t+13);" title="Email" />');
  });
}());
// ]]>

</script>
<?php }

function add_quicktag() {
  wp_enqueue_script( 'ace', get_template_directory_uri().'/includes/js/editor_plugin.js', array( 'quicktags' ) );
}
add_action('init', 'add_quicktag');
add_action('edit_form_advanced', 'quicktags');
add_action('edit_page_form', 'quicktags');

// ==================================================================
// Codestyling Localization Conflict
// ==================================================================
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if (is_plugin_active('codestyling-localization/codestyling-localization.php')) {

  remove_action('init', 'add_quicktag');

}
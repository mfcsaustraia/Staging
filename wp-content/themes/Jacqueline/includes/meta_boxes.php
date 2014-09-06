<?php
$prefix = 'ace_';
$meta_boxes = array();

// ==================================================================
// Metabox (custom field)
// ==================================================================
$meta_boxes[] = array(
'id'        =>  'layout',
'title'     =>  'AceFramework Setting',
'pages'     =>  array('post','page'),
'context'   =>  'normal',
'priority'  =>  'high',
'fields'    =>  array(
// ==================================================================
// Disable/Enable title for post
// ==================================================================
array(
  'name'  =>  'Disable page title',
  'id'    =>  $prefix . 'title',
  'type'  =>  'checkbox',
  'desc'  =>  '',
),
// ==================================================================
// Post layout
// ==================================================================
array(
  'name'  =>  'No Sidebar',
  'id'    =>  $prefix . 'wide',
  'type'  =>  'checkbox',
  'desc'  =>  'Full width layout',
),


)
);


// ==================================================================
// Another metabox (custom field)
// ==================================================================
$meta_boxes[] = array(
'id'        =>  'setting',
'title'     =>  'More Setting',
'pages'     =>  array('sliders'),
'context'   =>  'normal',
'priority'  =>  'high',
'fields'    => array(
// ==================================================================
// Text input
// ==================================================================
array(
  'name'  =>  'URL',
  'id'    =>  $prefix . 'slider_url',
  'type'  =>  'text',
  'std'   =>  '',
  'desc'  =>  '',
),

)
);

foreach ($meta_boxes as $meta_box) {
	$my_box = new RW_Meta_Box($meta_box);
}

/* CREATE META BOXES */
class RW_Meta_Box {
protected $_meta_box;

function __construct($meta_box) {
  if (!is_admin()) return;
  $this->_meta_box = $meta_box;

  add_action('admin_menu', array(&$this, 'add'));
  add_action('save_post', array(&$this, 'save'));
}

function add() {
  $this->_meta_box['context'] = empty($this->_meta_box['context']) ? 'normal' : $this->_meta_box['context'];
  $this->_meta_box['priority'] = empty($this->_meta_box['priority']) ? 'high' : $this->_meta_box['priority'];
  foreach ($this->_meta_box['pages'] as $page) {
    add_meta_box($this->_meta_box['id'], $this->_meta_box['title'], array(&$this, 'show'), $page, $this->_meta_box['context'], $this->_meta_box['priority']);
  }
}

function show() {
global $post;
  echo '<input type="hidden" name="wp_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
  echo '<table class="form-table">';
foreach ($this->_meta_box['fields'] as $field) {
  $meta = get_post_meta($post->ID, $field['id'], true);
  echo '<tr>',
  '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
  '<td>';

switch ($field['type']) { case 'text':

  echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />',
  '<br />', $field['desc'];

break; case 'date':

  echo '<input type="text" name="', $field['id'], '" id="datepicker" value="', $meta ? $meta : $field['std'], '" size="30" style="width:60%" />',
  '<br />', $field['desc'];

break; case 'textarea':

  echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="15" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>',
  '<br />', $field['desc'];

break; case 'select':

  echo '<select name="', $field['id'], '" id="', $field['id'], '">';
  foreach ($field['options'] as $option) {
    echo '<option value="', $option['value'], '"', $meta == $option['value'] ? ' selected="selected"' : '', '>', $option['name'], '</option>';
  }
  echo '</select>';

break; case 'radio':

  foreach ($field['options'] as $option) {
  echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
  }

break; case 'checkbox':

  echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' /> ', $field['desc'];

break; case 'editor':

  echo '<textarea name="', $field['id'], '" id="', $field['id'], '" class="theEditor" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>',
  '<br />', $field['desc'];

break;
}
  echo 	'<td>',
  '</tr>';
  }
  echo '</table>';
}



function save($post_id) {

if ( ! isset( $_POST['wp_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['wp_meta_box_nonce'], basename( __FILE__ ) ) ) {
  return $post_id;
}

if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
  return $post_id;
}

if ('page' == $_POST['post_type']) {

  if (!current_user_can('edit_page', $post_id)) {
    return $post_id;
  }

} elseif (!current_user_can('edit_post', $post_id)) {
  return $post_id;
}

foreach ($this->_meta_box['fields'] as $field) {
  $name = $field['id'];
  $old = get_post_meta($post_id, $name, true);
  $new = $_POST[$field['id']];

  if ($field['type'] == 'wysiwyg') {
    $new = wpautop($new);
  }

  if ($field['type'] == 'textarea') {
    $new = stripslashes($new);
  }

  if ($new && $new != $old) {
    update_post_meta($post_id, $name, $new);
      } elseif ('' == $new && $old && $field['type'] != 'file' && $field['type'] != 'image') {
    delete_post_meta($post_id, $name, $old);
      }
    }
  }

}
?>
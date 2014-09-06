<?php
// ==================================================================
// Post type - Slider
// ==================================================================
function post_type_slider() {
register_post_type('sliders', 
  array(
  'label'               => 'Slider',
  'singular'            => 'Slider',
  'description'         => 'Slider content',
  'public'              => true,
  'capability_type'     => 'page',
  'exclude_from_search' => true,
  'hierarchical'        => true,
  'query_var'           => true,
  'menu_position'       => 5,
  'supports'            => array(
    'title',
    'thumbnail',
    'page-attributes',
  ),
  'rewrite'             => true,
  ));
  flush_rewrite_rules();
}

add_action('init', 'post_type_slider');
<?php
function wordpressify_resources()
{
  wp_enqueue_style('style', get_stylesheet_uri());
  wp_enqueue_script('header_js', get_template_directory_uri().'/js/header-bundle.js', null, 1.0, false);
  wp_enqueue_script('footer_js', get_template_directory_uri().'/js/footer-bundle.js', null, 1.0, true);
}

add_action('wp_enqueue_scripts', 'wordpressify_resources');

get_template_part('theme-options');

// Customize excerpt word count length
function custom_excerpt_length()
{
  return 22;
}

add_filter('excerpt_length', 'custom_excerpt_length');

// Theme setup
function wordpressify_setup()
{
  // Handle Titles
  add_theme_support('title-tag');

  // Add featured image support
  add_theme_support('post-thumbnails');
  add_image_size('small-thumbnail', 720, 720, true);
  add_image_size('square-thumbnail', 80, 80, true);
  add_image_size('banner-image', 1024, 1024, true);
}

add_action('after_setup_theme', 'wordpressify_setup');

show_admin_bar(false);

// Checks if there are any posts in the results
function is_search_has_results()
{
  return 0 != $GLOBALS['wp_query']->found_posts;
}

// Add Widget Areas
function wordpressify_widgets()
{
  register_sidebar(
    array(
      'name'          => 'Sidebar',
      'id'            => 'sidebar1',
      'before_widget' => '<div class="widget-item">',
      'after_widget'  => '</div>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );
}

add_action('widgets_init', 'wordpressify_widgets');

// Our custom post type function
function create_posttype()
{

  register_post_type('operation_service',
    array(
      'labels'          => array(
        'name'          => __('Операции услуги'),
        'singular_name' => __('Операция услуга'),
      ),
      'public'          => true,
      'has_archive'     => true,
      'capability_type' => 'post',
      'hierarchical'    => true,
      'supports'        => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields'),
    )
  );

  register_post_type('service',
    array(
      'labels'          => array(
        'name'          => __('Услуги'),
        'singular_name' => __('Услуга'),
      ),
      'public'          => true,
      'capability_type' => 'page',
      'hierarchical'    => true,
      'supports'        => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields'),
      'taxonomies'          => array( 'category' ),
    )
  );

  register_post_type('news',
    array(
      'labels'          => array(
        'name'          => __('Новости'),
        'singular_name' => __('Новость'),
      ),
      'public'          => true,
      'capability_type' => 'post',
      'hierarchical'    => true,
      'supports'        => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields'),
    )
  );
}

// Hooking up our function to theme setup
add_action('init', 'create_posttype');

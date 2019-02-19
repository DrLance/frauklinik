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
      'has_archive'     => false,
      'capability_type' => 'post',
      'rewrite' => array('slug' => 'operation-service', 'with_front' => true),
      'hierarchical'    => true,
      'supports'        => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'page-attributes'),
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

  register_post_type('team',
    array(
      'labels'          => array(
        'name'          => __('Команда'),
        'singular_name' => __('Команда'),
      ),
      'public'          => true,
      'has_archive'     => false,
      'capability_type' => 'post',
      'rewrite' => array('slug' => 'team', 'with_front' => true),
      'hierarchical'    => true,
      'supports'        => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'page-attributes'),
    )
  );
}

// Hooking up our function to theme setup
add_action('init', 'create_posttype');

// хук для регистрации
add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){
  // список параметров: http://wp-kama.ru/function/get_taxonomy_labels
  register_taxonomy('taxonomy', array('operation_service'), array(
    'label'                 => '', // определяется параметром $labels->name
    'labels'                => array(
      'name'              => 'Категории Оп Услуги',
      'singular_name'     => 'Категории',
      'search_items'      => 'Поиск категорий',
      'all_items'         => 'Все категории',
      'view_item '        => 'Просмотр Категории',
      'parent_item'       => 'Родительская категория',
      'parent_item_colon' => 'Родительская категория:',
      'edit_item'         => 'Редактирование категории',
      'update_item'       => 'Обновить категорию',
      'add_new_item'      => 'Добавить новую категорию',
      'new_item_name'     => 'Новая категория',
      'menu_name'         => 'Категории Оп Услуги',
    ),
    'description'           => '', // описание таксономии
    'public'                => true,
    'publicly_queryable'    => null, // равен аргументу public
    'show_in_nav_menus'     => true, // равен аргументу public
    'show_ui'               => true, // равен аргументу public
    'show_in_menu'          => true, // равен аргументу show_ui
    'show_tagcloud'         => true, // равен аргументу show_ui
    'show_in_rest'          => null, // добавить в REST API
    'rest_base'             => null, // $taxonomy
    'hierarchical'          => false,
    //'update_count_callback' => '_update_post_term_count',
    'rewrite'               => true,
    //'query_var'             => $taxonomy, // название параметра запроса
    'capabilities'          => array(),
    'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
    'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
    '_builtin'              => false,
    'show_in_quick_edit'    => null, // по умолчанию значение show_ui
  ) );

  // список параметров: http://wp-kama.ru/function/get_taxonomy_labels
  register_taxonomy('tax_prof', array('team'), array(
    'label'                 => '', // определяется параметром $labels->name
    'labels'                => array(
      'name'              => 'Категории Команда ',
      'singular_name'     => 'Категории',
      'search_items'      => 'Поиск категорий',
      'all_items'         => 'Все категории',
      'view_item '        => 'Просмотр Категории',
      'parent_item'       => 'Родительская категория',
      'parent_item_colon' => 'Родительская категория:',
      'edit_item'         => 'Редактирование категории',
      'update_item'       => 'Обновить категорию',
      'add_new_item'      => 'Добавить новую категорию',
      'new_item_name'     => 'Новая категория',
      'menu_name'         => 'Категории Оп Услуги',
    ),
    'description'           => '', // описание таксономии
    'public'                => true,
    'publicly_queryable'    => null, // равен аргументу public
    'show_in_nav_menus'     => true, // равен аргументу public
    'show_ui'               => true, // равен аргументу public
    'show_in_menu'          => true, // равен аргументу show_ui
    'show_tagcloud'         => true, // равен аргументу show_ui
    'show_in_rest'          => null, // добавить в REST API
    'rest_base'             => null, // $taxonomy
    'hierarchical'          => false,
    //'update_count_callback' => '_update_post_term_count',
    'rewrite'               => true,
    //'query_var'             => $taxonomy, // название параметра запроса
    'capabilities'          => array(),
    'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
    'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
    '_builtin'              => false,
    'show_in_quick_edit'    => null, // по умолчанию значение show_ui
  ) );
}

function add_file_types_to_uploads($file_types){
  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg+xml';
  $file_types = array_merge($file_types, $new_filetypes );
  return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');


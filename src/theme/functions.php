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

  register_taxonomy('category_news', array('news'), array(
    'label'                 => '', // определяется параметром $labels->name
    'labels'                => array(
      'name'              => 'Категории Новостей ',
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
      'menu_name'         => 'Категории Новостей',
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



function kama_breadcrumbs( $sep = ' » ', $l10n = array(), $args = array() ){
  $kb = new Kama_Breadcrumbs;
  echo $kb->get_crumbs( $sep, $l10n, $args );
}

class Kama_Breadcrumbs {

  public $arg;

  // Локализация
  static $l10n = array(
    'home'       => 'Главная',
    'paged'      => 'Страница %d',
    '_404'       => 'Ошибка 404',
    'search'     => 'Результаты поиска по запросу - <b>%s</b>',
    'author'     => 'Архив автора: <b>%s</b>',
    'year'       => 'Архив за <b>%d</b> год',
    'month'      => 'Архив за: <b>%s</b>',
    'day'        => '',
    'attachment' => 'Медиа: %s',
    'tag'        => 'Записи по метке: <b>%s</b>',
    'tax_tag'    => '%1$s из "%2$s" по тегу: <b>%3$s</b>',
    // tax_tag выведет: 'тип_записи из "название_таксы" по тегу: имя_термина'.
    // Если нужны отдельные холдеры, например только имя термина, пишем так: 'записи по тегу: %3$s'
  );

  // Параметры по умолчанию
  static $args = array(
    'on_front_page'   => true,  // выводить крошки на главной странице
    'show_post_title' => true,  // показывать ли название записи в конце (последний элемент). Для записей, страниц, вложений
    'show_term_title' => true,  // показывать ли название элемента таксономии в конце (последний элемент). Для меток, рубрик и других такс
    'title_patt'      => '<a class="back">%s</a>', // шаблон для последнего заголовка. Если включено: show_post_title или show_term_title
    'last_sep'        => true,  // показывать последний разделитель, когда заголовок в конце не отображается
    'markup'          => 'schema.org', // 'markup' - микроразметка. Может быть: 'rdf.data-vocabulary.org', 'schema.org', '' - без микроразметки
    // или можно указать свой массив разметки:
    // array( 'wrappatt'=>'<div class="kama_breadcrumbs">%s</div>', 'linkpatt'=>'<a href="%s">%s</a>', 'sep_after'=>'', )
    'priority_tax'    => array('taxonomy'), // приоритетные таксономии, нужно когда запись в нескольких таксах
    'priority_terms'  => array(), // 'priority_terms' - приоритетные элементы таксономий,
    // когда запись находится в нескольких элементах одной таксы одновременно.
    // Например: array( 'category'=>array(45,'term_name'), 'tax_name'=>array(1,2,'name') )
    // 'category' - такса для которой указываются приор. элементы: 45 - ID термина и 'term_name' - ярлык.
    // порядок 45 и 'term_name' имеет значение: чем раньше тем важнее. Все указанные термины важнее неуказанных...
    'nofollow' => false, // добавлять rel=nofollow к ссылкам?

    // служебные
    'sep'             => '',
    'linkpatt'        => '',
    'pg_end'          => '',
  );

  function get_crumbs( $sep, $l10n, $args ){
    global $post, $wp_query, $wp_post_types;

    self::$args['sep'] = $sep;

    // Фильтрует дефолты и сливает
    $loc = (object) array_merge( apply_filters('kama_breadcrumbs_default_loc', self::$l10n ), $l10n );
    $arg = (object) array_merge( apply_filters('kama_breadcrumbs_default_args', self::$args ), $args );

    $arg->sep = ''; // дополним

    // упростим
    $sep = & $arg->sep;
    $this->arg = & $arg;

    // микроразметка ---
    if(1){
      $mark = & $arg->markup;

      // Разметка по умолчанию
      if( ! $mark ) $mark = array(
        'wrappatt'  => '',
        'linkpatt'  => '<a href="%s">%s</a>',
        'sep_after' => '',
      );
      // rdf
      elseif( $mark === 'rdf.data-vocabulary.org' ) $mark = array(
        'wrappatt'   => '',
        'linkpatt'   => '',
        'sep_after'  => '', // закрываем span после разделителя!
      );
      // schema.org
      elseif( $mark === 'schema.org' ) $mark = array(
        'wrappatt'   => '<div>%s</div>',
        'linkpatt'   => '<a href="%s" itemprop="item" class="back">%s</a>',
        'sep_after'  => '',
      );

      elseif( ! is_array($mark) )
        die( __CLASS__ .': "markup" parameter must be array...');

      $wrappatt  = $mark['wrappatt'];
      $arg->linkpatt  = $arg->nofollow ? str_replace('<a ','<a rel="nofollow"', $mark['linkpatt']) : $mark['linkpatt'];
      $arg->sep      .= $mark['sep_after']."\n";
    }

    $linkpatt = $arg->linkpatt; // упростим

    $q_obj = get_queried_object();

    // может это архив пустой таксы?
    $ptype = null;
    if( empty($post) ){
      if( isset($q_obj->taxonomy) )
        $ptype = & $wp_post_types[ get_taxonomy($q_obj->taxonomy)->object_type[0] ];
    }
    else $ptype = & $wp_post_types[ $post->post_type ];

    // paged
    $arg->pg_end = '';
    if( ($paged_num = get_query_var('paged')) || ($paged_num = get_query_var('page')) )
      $arg->pg_end = $sep . sprintf( $loc->paged, (int) $paged_num );

    $pg_end = $arg->pg_end; // упростим

    $out = '';

    if( is_front_page() ){
      return $arg->on_front_page ? sprintf( $wrappatt, ( $paged_num ? sprintf($linkpatt, get_home_url(), $loc->home) . $pg_end : $loc->home ) ) : '';
    }
    // страница записей, когда для главной установлена отдельная страница.
    elseif( is_home() ) {
      $out = $paged_num ? ( sprintf( $linkpatt, get_permalink($q_obj), esc_html($q_obj->post_title) ) . $pg_end ) : esc_html($q_obj->post_title);
    }
    elseif( is_404() ){
      $out = $loc->_404;
    }
    elseif( is_search() ){
      $out = sprintf( $loc->search, esc_html( $GLOBALS['s'] ) );
    }
    elseif( is_author() ){
      $tit = sprintf( $loc->author, esc_html($q_obj->display_name) );
      $out = ( $paged_num ? sprintf( $linkpatt, get_author_posts_url( $q_obj->ID, $q_obj->user_nicename ) . $pg_end, $tit ) : $tit );
    }
    elseif( is_year() || is_month() || is_day() ){
      $y_url  = get_year_link( $year = get_the_time('Y') );

      if( is_year() ){
        $tit = sprintf( $loc->year, $year );
        $out = ( $paged_num ? sprintf($linkpatt, $y_url, $tit) . $pg_end : $tit );
      }
      // month day
      else {
        $y_link = sprintf( $linkpatt, $y_url, $year);
        $m_url  = get_month_link( $year, get_the_time('m') );

        if( is_month() ){
          $tit = sprintf( $loc->month, get_the_time('F') );
          $out = $y_link . $sep . ( $paged_num ? sprintf( $linkpatt, $m_url, $tit ) . $pg_end : $tit );
        }
        elseif( is_day() ){
          $m_link = sprintf( $linkpatt, $m_url, get_the_time('F'));
          $out = $y_link . $sep . $m_link . $sep . get_the_time('l');
        }
      }
    }
    // Древовидные записи
    elseif( is_singular() && $ptype->hierarchical ){
      $out = $this->_add_title( $this->_page_crumbs($post), $post );
    }
    // Таксы, плоские записи и вложения
    else {
      $term = $q_obj; // таксономии

      // определяем термин для записей (включая вложения attachments)
      if( is_singular() ){
        // изменим $post, чтобы определить термин родителя вложения
        if( is_attachment() && $post->post_parent ){
          $save_post = $post; // сохраним
          $post = get_post($post->post_parent);
        }

        // учитывает если вложения прикрепляются к таксам древовидным - все бывает :)
        $taxonomies = get_object_taxonomies( $post->post_type );
        // оставим только древовидные и публичные, мало ли...
        $taxonomies = array_intersect( $taxonomies, get_taxonomies( array('hierarchical' => true, 'public' => true) ) );

        if( $taxonomies ){
          // сортируем по приоритету
          if( ! empty($arg->priority_tax) ){
            usort( $taxonomies, function($a,$b)use($arg){
              $a_index = array_search($a, $arg->priority_tax);
              if( $a_index === false ) $a_index = 9999999;

              $b_index = array_search($b, $arg->priority_tax);
              if( $b_index === false ) $b_index = 9999999;

              return ( $b_index === $a_index ) ? 0 : ( $b_index < $a_index ? 1 : -1 ); // меньше индекс - выше
            } );
          }

          // пробуем получить термины, в порядке приоритета такс
          foreach( $taxonomies as $taxname ){
            if( $terms = get_the_terms( $post->ID, $taxname ) ){
              // проверим приоритетные термины для таксы
              $prior_terms = & $arg->priority_terms[ $taxname ];
              if( $prior_terms && count($terms) > 2 ){
                foreach( (array) $prior_terms as $term_id ){
                  $filter_field = is_numeric($term_id) ? 'term_id' : 'slug';
                  $_terms = wp_list_filter( $terms, array($filter_field=>$term_id) );

                  if( $_terms ){
                    $term = array_shift( $_terms );
                    break;
                  }
                }
              }
              else
                $term = array_shift( $terms );

              break;
            }
          }
        }

        if( isset($save_post) ) $post = $save_post; // вернем обратно (для вложений)
      }

      // вывод

      // все виды записей с терминами или термины
      if( $term && isset($term->term_id) ){
        $term = apply_filters('kama_breadcrumbs_term', $term );

        // attachment
        if( is_attachment() ){
          if( ! $post->post_parent )
            $out = sprintf( $loc->attachment, esc_html($post->post_title) );
          else {
            if( ! $out = apply_filters('attachment_tax_crumbs', '', $term, $this ) ){
              $_crumbs    = $this->_tax_crumbs( $term, 'self' );
              $parent_tit = sprintf( $linkpatt, get_permalink($post->post_parent), get_the_title($post->post_parent) );
              $_out = implode( $sep, array($_crumbs, $parent_tit) );
              $out = $this->_add_title( $_out, $post );
            }
          }
        }
        // single
        elseif( is_single() ){
          if( ! $out = apply_filters('post_tax_crumbs', '', $term, $this ) ){
            $_crumbs = $this->_tax_crumbs( $term, 'self' );
            $out = $this->_add_title( $_crumbs, $post );
          }
        }
        // не древовидная такса (метки)
        elseif( ! is_taxonomy_hierarchical($term->taxonomy) ){
          // метка
          if( is_tag() )
            $out = $this->_add_title('', $term, sprintf( $loc->tag, esc_html($term->name) ) );
          // такса
          elseif( is_tax() ){
            $post_label = $ptype->labels->name;
            $tax_label = $GLOBALS['wp_taxonomies'][ $term->taxonomy ]->labels->name;
            $out = $this->_add_title('', $term, sprintf( $loc->tax_tag, $post_label, $tax_label, esc_html($term->name) ) );
          }
        }
        // древовидная такса (рибрики)
        else {
          if( ! $out = apply_filters('term_tax_crumbs', '', $term, $this ) ){
            $_crumbs = $this->_tax_crumbs( $term, 'parent' );
            $out = $this->_add_title( $_crumbs, $term, esc_html($term->name) );
          }
        }
      }
      // влоежния от записи без терминов
      elseif( is_attachment() ){
        $parent = get_post($post->post_parent);
        $parent_link = sprintf( $linkpatt, get_permalink($parent), esc_html($parent->post_title) );
        $_out = $parent_link;

        // вложение от записи древовидного типа записи
        if( is_post_type_hierarchical($parent->post_type) ){
          $parent_crumbs = $this->_page_crumbs($parent);
          $_out = implode( $sep, array( $parent_crumbs, $parent_link ) );
        }

        $out = $this->_add_title( $_out, $post );
      }
      // записи без терминов
      elseif( is_singular() ){
        $out = $this->_add_title( '', $post );
      }
    }

    // замена ссылки на архивную страницу для типа записи
    $home_after = apply_filters('kama_breadcrumbs_home_after', '', $linkpatt, $sep, $ptype );

    if( '' === $home_after ){
      // Ссылка на архивную страницу типа записи для: отдельных страниц этого типа; архивов этого типа; таксономий связанных с этим типом.
      if( $ptype && $ptype->has_archive && ! in_array( $ptype->name, array('post','page','attachment') )
          && ( is_post_type_archive() || is_singular() || (is_tax() && in_array($term->taxonomy, $ptype->taxonomies)) )
      ){
        $pt_title = $ptype->labels->name;

        // первая страница архива типа записи
        if( is_post_type_archive() && ! $paged_num )
          $home_after = sprintf( $this->arg->title_patt, $pt_title );
        // singular, paged post_type_archive, tax
        else{
          $home_after = sprintf( $linkpatt, get_post_type_archive_link($ptype->name), $pt_title );

          $home_after .= ( ($paged_num && ! is_tax()) ? $pg_end : $sep ); // пагинация
        }
      }
    }

    $before_out = sprintf( $linkpatt, home_url(), $loc->home ) . ( $home_after ? $sep.$home_after : ($out ? $sep : '') );

    $out = apply_filters('kama_breadcrumbs_pre_out', $out, $sep, $loc, $arg );

    $out = sprintf( $wrappatt, $before_out . $out );

    return apply_filters('kama_breadcrumbs', $out, $sep, $loc, $arg );
  }

  function _page_crumbs( $post ){
    $parent = $post->post_parent;

    $crumbs = array();
    while( $parent ){
      $page = get_post( $parent );
      $crumbs[] = sprintf( $this->arg->linkpatt, get_permalink($page), esc_html($page->post_title) );
      $parent = $page->post_parent;
    }

    return implode( $this->arg->sep, array_reverse($crumbs) );
  }

  function _tax_crumbs( $term, $start_from = 'self' ){
    $termlinks = array();
    $term_id = ($start_from === 'parent') ? $term->parent : $term->term_id;
    while( $term_id ){
      $term       = get_term( $term_id, $term->taxonomy );
      $termlinks[] = sprintf( $this->arg->linkpatt, get_term_link($term), esc_html($term->name) );
      $term_id    = $term->parent;
    }

    if( $termlinks )
      return implode( $this->arg->sep, array_reverse($termlinks) ) /*. $this->arg->sep*/;
    return '';
  }

  // добалвяет заголовок к переданному тексту, с учетом всех опций. Добавляет разделитель в начало, если надо.
  function _add_title( $add_to, $obj, $term_title = '' ){
    $arg = & $this->arg; // упростим...
    $title = $term_title ? $term_title : esc_html($obj->post_title); // $term_title чиститься отдельно, теги моугт быть...
    $show_title = $term_title ? $arg->show_term_title : $arg->show_post_title;

    // пагинация
    if( $arg->pg_end ){
      $link = $term_title ? get_term_link($obj) : get_permalink($obj);
      $add_to .= ($add_to ? $arg->sep : '') . sprintf( $arg->linkpatt, $link, $title ) . $arg->pg_end;
    }
    // дополняем - ставим sep
    elseif( $add_to ){
      if( $show_title )
        $add_to .= $arg->sep . sprintf( $arg->title_patt, $title );
      elseif( $arg->last_sep )
        $add_to .= $arg->sep;
    }
    // sep будет потом...
    elseif( $show_title )
      $add_to = sprintf( $arg->title_patt, $title );

    return $add_to;
  }
}
/*
 * "Хлебные крошки" для WordPress
 * автор: Dimox
 * версия: 2018.10.05
 * лицензия: MIT
*/
function dimox_breadcrumbs() {

  /* === ОПЦИИ === */
  $text['home'] = 'Главная'; // текст ссылки "Главная"
  $text['category'] = '%s'; // текст для страницы рубрики
  $text['search'] = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
  $text['tag'] = 'Записи с тегом "%s"'; // текст для страницы тега
  $text['author'] = 'Статьи автора %s'; // текст для страницы автора
  $text['404'] = 'Ошибка 404'; // текст для страницы 404
  $text['page'] = 'Страница %s'; // текст 'Страница N'
  $text['cpage'] = 'Страница комментариев %s'; // текст 'Страница комментариев N'

  $wrap_before = ''; // открывающий тег обертки
  $wrap_after = '<!-- .breadcrumbs -->'; // закрывающий тег обертки
  $sep = ''; // разделитель между "крошками"
  $before = ''; // тег перед текущей "крошкой"
  $after = ''; // тег после текущей "крошки"

  $show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
  $show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
  $show_current = 1; // 1 - показывать название текущей страницы, 0 - не показывать
  $show_last_sep = 1; // 1 - показывать последний разделитель, когда название текущей страницы не отображается, 0 - не показывать
  /* === КОНЕЦ ОПЦИЙ === */

  global $post;
  $home_url = home_url('/');
  $link = '';
  $link .= '<a class="back" href="%1$s" itemprop="item">%2$s</a>';
  $link .= '';
  $link .= '';
  $parent_id = ( $post ) ? $post->post_parent : '';
  $home_link = sprintf( $link, $home_url, $text['home'], 1 );

  if ( is_home() || is_front_page() ) {

    if ( $show_on_home ) echo $wrap_before . $home_link . $wrap_after;

  } else {

    $position = 0;

    echo $wrap_before;

    if ( $show_home_link ) {
      $position += 1;
      echo $home_link;
    }

    if ( is_category() ) {

      $parents = get_ancestors( get_query_var('cat'), 'category' );
      foreach ( array_reverse( $parents ) as $cat ) {
        $position += 1;
        if ( $position > 1 ) echo $sep;
        echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
      }
      if ( get_query_var( 'paged' ) ) {
        $position += 1;
        $cat = get_query_var('cat');
        echo $sep . sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
        echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
      } else {
        if ( $show_current ) {
          if ( $position >= 1 ) echo $sep;
          echo $before . sprintf( $text['category'], single_cat_title( '', false ) ) . $after;
        } elseif ( $show_last_sep ) echo $sep;
      }

    } elseif ( is_search() ) {

      if ( $show_home_link && $show_current || ! $show_current && $show_last_sep ) echo $sep;
      if ( $show_current ) echo $before . sprintf( $text['search'], get_search_query() ) . $after;

    } elseif ( is_year() ) {
      if ( $show_home_link && $show_current ) echo $sep;
      if ( $show_current ) echo $before . get_the_time('Y') . $after;
      elseif ( $show_home_link && $show_last_sep ) echo $sep;

    } elseif ( is_month() ) {
      if ( $show_home_link ) echo $sep;
      $position += 1;
      echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position );
      if ( $show_current ) echo $sep . $before . get_the_time('F') . $after;
      elseif ( $show_last_sep ) echo $sep;

    } elseif ( is_day() ) {
      if ( $show_home_link ) echo $sep;
      $position += 1;
      echo sprintf( $link, get_year_link( get_the_time('Y') ), get_the_time('Y'), $position ) . $sep;
      $position += 1;
      echo sprintf( $link, get_month_link( get_the_time('Y'), get_the_time('m') ), get_the_time('F'), $position );
      if ( $show_current ) echo $sep . $before . get_the_time('d') . $after;
      elseif ( $show_last_sep ) echo $sep;

    } elseif ( is_single() && ! is_attachment() ) {

      if ( get_post_type() != 'post' ) {
        $position += 1;
        $post_type = get_post_type_object( get_post_type() );
        if ( $position > 1 ) echo $sep;

        echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->labels->name, $position );
        /*
        if ( $show_current ) echo $sep . $before . get_the_title() . $after;
        elseif ( $show_last_sep ) echo $sep;
        */
      } else {

        $cat = get_the_category(); $catID = $cat[0]->cat_ID;
        $parents = get_ancestors( $catID, 'category' );
        $parents = array_reverse( $parents );
        $parents[] = $catID;
        foreach ( $parents as $cat ) {
          $position += 1;
          if ( $position > 1 ) echo $sep;
          echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
        }
        if ( get_query_var( 'cpage' ) ) {

          $position += 1;
          echo $sep . sprintf( $link, get_permalink(), get_the_title(), $position );
          echo $sep . $before . sprintf( $text['cpage'], get_query_var( 'cpage' ) ) . $after;
        } else {
          if ( $show_current ) echo $sep . $before . get_the_title() . $after;
          elseif ( $show_last_sep ) echo $sep;
        }
      }

    } elseif ( is_post_type_archive() ) {
      $post_type = get_post_type_object( get_post_type() );
      if ( get_query_var( 'paged' ) ) {
        $position += 1;
        if ( $position > 1 ) echo $sep;
        echo sprintf( $link, get_post_type_archive_link( $post_type->name ), $post_type->label, $position );
        echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
      } else {
        if ( $show_home_link && $show_current ) echo $sep;
        if ( $show_current ) echo $before . $post_type->label . $after;
        elseif ( $show_home_link && $show_last_sep ) echo $sep;
      }

    } elseif ( is_attachment() ) {

      $parent = get_post( $parent_id );
      $cat = get_the_category( $parent->ID ); $catID = $cat[0]->cat_ID;
      $parents = get_ancestors( $catID, 'category' );
      $parents = array_reverse( $parents );
      $parents[] = $catID;
      foreach ( $parents as $cat ) {
        $position += 1;
        if ( $position > 1 ) echo $sep;
        echo sprintf( $link, get_category_link( $cat ), get_cat_name( $cat ), $position );
      }
      $position += 1;
      echo $sep . sprintf( $link, get_permalink( $parent ), $parent->post_title, $position );
      if ( $show_current ) echo $sep . $before . get_the_title() . $after;
      elseif ( $show_last_sep ) echo $sep;

    } elseif ( is_page() && ! $parent_id ) {

      if ( $show_home_link && $show_current ) echo $sep;
      /*
      if ( $show_current ) echo $before . get_the_title() . $after;
      elseif ( $show_home_link && $show_last_sep ) echo $sep;
      */

    } elseif ( is_page() && $parent_id ) {

      $parents = get_post_ancestors( get_the_ID() );
      foreach ( array_reverse( $parents ) as $pageID ) {
        $position += 1;
        if ( $position > 1 ) echo $sep;
        echo sprintf( $link, get_page_link( $pageID ), get_the_title( $pageID ), $position );
      }
      if ( $show_current ) echo $sep . $before . get_the_title() . $after;
      elseif ( $show_last_sep ) echo $sep;

    } elseif ( is_tag() ) {

      if ( get_query_var( 'paged' ) ) {
        $position += 1;
        $tagID = get_query_var( 'tag_id' );
        echo $sep . sprintf( $link, get_tag_link( $tagID ), single_tag_title( '', false ), $position );
        echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
      } else {
        if ( $show_home_link && $show_current ) echo $sep;
        if ( $show_current ) echo $before . sprintf( $text['tag'], single_tag_title( '', false ) ) . $after;
        elseif ( $show_home_link && $show_last_sep ) echo $sep;
      }

    } elseif ( is_author() ) {
      $author = get_userdata( get_query_var( 'author' ) );
      if ( get_query_var( 'paged' ) ) {
        $position += 1;
        echo $sep . sprintf( $link, get_author_posts_url( $author->ID ), sprintf( $text['author'], $author->display_name ), $position );
        echo $sep . $before . sprintf( $text['page'], get_query_var( 'paged' ) ) . $after;
      } else {
        if ( $show_home_link && $show_current ) echo $sep;
        if ( $show_current ) echo $before . sprintf( $text['author'], $author->display_name ) . $after;
        elseif ( $show_home_link && $show_last_sep ) echo $sep;
      }

    } elseif ( is_404() ) {
      if ( $show_home_link && $show_current ) echo $sep;
      if ( $show_current ) echo $before . $text['404'] . $after;
      elseif ( $show_last_sep ) echo $sep;

    } elseif ( has_post_format() && ! is_singular() ) {
      if ( $show_home_link && $show_current ) echo $sep;
      echo get_post_format_string( get_post_format() );
    }

    echo $wrap_after;

  }
} // end of dimox_breadcrumbs()


function slider_operation_service($atts)
{
  $result = '';
  if (have_rows('slider_result_work')) {
    $result .= '<div class="landing-for-services-3">
        <div class="top">
          <h6 class="title">Результаты работы</h6>
          <a href="/works/">Все работы</a>
        </div>
        <div class="swiper-container">
          <div class="swiper-wrapper">';

    // loop through the rows of data
    while (have_rows('slider_result_work')) {
      the_row();
      $beforeImg = get_sub_field('before_img');
      $afterImg = get_sub_field('after_img');

      $result .=
        '<div class="swiper-slide">
                  <div class="before">
                    <img src="' .
        $beforeImg .
        '" alt="">
                  </div>
                  <div class="after">
                    <img src="' .
        $afterImg .
        '" alt="">
                  </div>
                </div>';
    }

    $result .= '</div>
          <div class="swiper-pagination"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>';
  }
  return $result;
}
add_shortcode('slider_operation_service', 'slider_operation_service');


function getPostIDFroCat($category)
{
  $parents = get_posts(array(
    'post_type' => 'operation_service',
    'tax_query' => array(
      array(
        'taxonomy' => 'taxonomy',
        'field'    => 'slug',
        'terms'    => $category->slug,
      ),
    ),
  ));

  $parentsID = [];
  $_childs   = [];
  $childs    = [];

  foreach ($parents as $parent) {
    $_childs     = get_children(array(
      'post_parent' => $parent->ID,
      'post_type'   => 'operation_service',
    ));
    $childs      = array_merge($childs, $_childs);
    $parentsID[] = $parent->ID;
  }

  foreach ($childs as $child) {
    $parentsID[] = $child->ID;
  }



  return $parentsID;
}
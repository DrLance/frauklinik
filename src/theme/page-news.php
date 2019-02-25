<?php get_header(); ?>

<?php
$categories = get_categories(array(
  'taxonomy'     => 'category_news',
  'type'         => 'news',
  'child_of'     => 0,
  'parent'       => '',
  'orderby'      => 'name',
  'order'        => 'ASC',
  'hide_empty'   => 1,
  'hierarchical' => 1,
));
$index      = 1;
?>
  <div class="inner">
    <div class="content-with-aside list-of-news">
      <div class="content">
        <div class="tabs">
          <ul>
            <li>
              <a href="#tab-0">Все</a>
            </li>
            <?php foreach ($categories as $category) : ?>
              <li>
                <a href="#tab-<?= $index; ?>"><?= $category->name; ?></a>
              </li>
              <?php $index++; endforeach;
            $index = 1; ?>
          </ul>
        </div>
        <?php
        $news = get_posts(array(
          'post_type'   => 'news',
          'numberposts' => -1,
        ));
        ?>
        <div class="list-of-news-1">
          <div id="tab-0">
            <?php foreach ($news as $item) : ?>
              <?php
              $postTerms = wp_get_post_terms($item->ID, 'category_news');
              if (isset($postTerms[0]) && $postTerms[0]->slug !== 'video') :
                ?>

                <a href="<?= get_permalink($item); ?>" class="item">
                  <img src="<?= wp_get_attachment_image_src(get_post_thumbnail_id($item), 'large')[0]; ?>" alt="">
                  <img src="<?= get_template_directory_uri() ?>/images/arrow-for-news.svg" alt="" class="arrow">
                  <div class="text">
                    <div class="date"><?= get_the_date(__('d F'), $item); ?></div>
                    <h6 class="title"><?= $item->post_title; ?></h6>
                  </div>
                </a>
              <?php else : ?>
                <a href="<?= the_field('video', $item); ?>" class="video-popup item" data-rel="media">
                  <img src="<?= wp_get_attachment_image_src(get_post_thumbnail_id($item), 'large')[0]; ?>" alt="">
                  <div class="text">
                    <div class="date"><?= $postTerms[0]->name; ?></div>
                    <h6 class="title"><?= $item->post_title; ?></h6>
                  </div>
                </a>
              <?php endif; ?>

            <?php endforeach; $index = 1; ?>
          </div>
          <?php foreach ($categories as $category) : ?>
            <div id="tab-<?= $index; ?>">
              <?php $news = get_posts(array(
                'post_type'   => 'news',
                'numberposts' => -1,
                'tax_query'   => array(
                  array(
                    'taxonomy' => 'category_news',
                    'field'    => 'term_id',
                    'terms'    => $category->term_id,
                  ),
                ),
              )); ?>
              <?php foreach ($news as $item) : ?>
                <?php
                $postTerms = wp_get_post_terms($item->ID, 'category_news');
                if (isset($postTerms[0]) && $postTerms[0]->slug !== 'video') :
                  ?>

                  <a href="<?= get_permalink($item); ?>" class="item">
                    <img src="<?= wp_get_attachment_image_src(get_post_thumbnail_id($item), 'large')[0]; ?>" alt="">
                    <img src="<?= get_template_directory_uri() ?>/images/arrow-for-news.svg" alt="" class="arrow">
                    <div class="text">
                      <div class="date"><?= get_the_date(__('d F'), $item); ?></div>
                      <h6 class="title"><?= $item->post_title; ?></h6>
                    </div>
                  </a>
                <?php else : ?>
                  <a href="<?= the_field('video', $item); ?>" class="video-popup item" data-rel="media">
                    <img src="<?= wp_get_attachment_image_src(get_post_thumbnail_id($item), 'large')[0]; ?>" alt="">
                    <div class="text">
                      <div class="date"><?= $postTerms[0]->name; ?></div>
                      <h6 class="title"><?= $item->post_title; ?></h6>
                    </div>
                  </a>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
            <?php $index++; endforeach; ?>
        </div>
      </div>
      <?php get_template_part('partials/sidebar', 'service-alone'); ?>
    </div>
  </div>

<?php get_footer(); ?>
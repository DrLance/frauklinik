<?php get_header(); ?>
<!-- container -->
<!--#include file="header-index.html" -->
<div class="page-404">
  <div class="inner">
    <div class="page-404-1">
      <div class="text">
        <h5 class="title">К сожалению, страница не найдена...</h5>
        <p>Однако вы можете найти не менее интересную иполезную информацию ниже:</p>
        <ul>
          <?php
          $categories = get_categories(array(
            'taxonomy'     => 'taxonomy',
            'type'         => 'operation_service',
            'child_of'     => 0,
            'parent'       => '',
            'orderby'      => 'name',
            'order'        => 'ASC',
            'hide_empty'   => 1,
            'hierarchical' => 1,
          ));
          $index      = 1;
          ?>
          <?php foreach ($categories as $category) : ?>
            <li>
              <a href="<?= get_category_link($category); ?>"><?= $category->name; ?>
                <img src="<?= get_template_directory_uri() ?>/images/arrow-tab.svg" alt="">
              </a>
            </li>
            <?php $index++; endforeach;
          $index = 1; ?>
        </ul>
      </div>
      <div class="img">
        <img src="<?= get_template_directory_uri() ?>/images/blokhin-sergey.png" alt="">
        <img src="<?= get_template_directory_uri() ?>/images/blokhin-sergey-3.png" alt="" class="mobile">
        <span>404</span>
      </div>
    </div>
  </div>
</div>
<div class="page-of-news-2 on-404">
  <div class="inner">
    <div>
      <div class="left">
        <h6 class="title">Интересные статьи по теме</h6>
        <?php $news = get_posts(array('post_type' => 'news', 'numberposts' => 2)); ?>
        <?php foreach ($news as $new) : ?>
        <div class="item">
          <div class="date"><?= get_the_date(__('d F'),$new); ?></div>
          <a href="<?= get_permalink($new); ?>"><?= $new->post_title; ?></a>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="right">
        <?php foreach ($news as $new) : ?>
        <div class="item">
          <a href="<?= get_permalink($new); ?>" class="img">
            <img src="<?= wp_get_attachment_image_src( get_post_thumbnail_id($new), 'large')[0]; ?>" alt="">
          </a>
          <div class="date"><?= get_the_date(__('d F'),$new); ?></div>
          <div class="text">
            <a href="<?= get_permalink($new); ?>"><?= $new->post_title; ?></a>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
<!--#include file="footer.html" -->
<!-- /container -->
<?php get_footer(); ?>

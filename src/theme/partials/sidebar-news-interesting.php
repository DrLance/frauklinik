<div class="page-of-news-2">
  <?php $news = get_posts(array(
    'post_type'   => 'news',
    'numberposts' => 6,
  )); ?>
  <div class="inner">
    <div>
      <div class="left">
        <h6 class="title">Интересные статьи по теме</h6>
        <?php foreach ($news as $item) : ?>
        <div class="item">
            <div class="date"><?= get_the_date(__('d F'), $item); ?></div>
          <a href="<?= get_permalink($item->ID); ?>"><?= $item->post_title; ?></a>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="right">
        <?php foreach ($news as $item) : ?>
        <div class="item">
          <a href="" class="img">
            <img src="<?= the_field('news_img_preview', $item) ?>" alt="">
          </a>
          <div class="date"><?= get_the_date(__('d F'), $item); ?></div>
          <div class="text">
            <a href="<?= get_permalink($item->ID); ?>"><?= $item->post_title; ?></a>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
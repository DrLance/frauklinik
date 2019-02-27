<?php get_header(); ?>
<div class="main">
  <div class="main-1">

    <div class="inner">

      <div class="text">
        <h3 class="title">Инвестируйте в себя, вместе с пластическим хирургом Сергеем Блохиным</h3>
        <p>Признанный специалист в области пластической хирургии, доктор медицины, профессор и автор множества научных
          работ</p>
        <a href="javascript:void(0)" class="btn btn-arrow ajax-mfp" >оставить заявку <img
              src="<?= get_template_directory_uri() ?>/images/arrow-btn.svg" alt=""></a>
      </div>
      <div class="img">
        <img src="<?= get_template_directory_uri() ?>/images/blokhin-sergey.png" alt="">
        <img src="<?= get_template_directory_uri() ?>/images/blokhin-sergey-3.png" alt="" class="mobile">
      </div>
    </div>
  </div>
  <div class="inner">

    <?php $bio = get_field('short_bio'); ?>
    <div class="main-2">
      <div class="img">
        <a href="<?= $bio['youtube']; ?>" class="video-popup" data-rel="media">
          <img src="<?= $bio['img']; ?>" alt="">
          <img src="<?= get_template_directory_uri() ?>/images/doctor-1-mobile.jpg" alt="" class="mobile">
          <img src="<?= get_template_directory_uri() ?>/images/arrow-tab.svg" alt="" class="arrow">
          <p>смотреть видео о хируге</p>
        </a>
        <p>клиника Сергея николаевича сотрудничает с крупнейшими федеральными телеканалами</p>
        <div class="list-of-images">
          <img src="<?= get_template_directory_uri() ?>/images/previy-kanal.png" alt="">
          <img src="<?= get_template_directory_uri() ?>/images/tnt.png" alt="">
        </div>
      </div>

      <div class="text">
        <div class="top">
          <h2 class="title">Краткая биография </h2>
          <a href="<?= get_permalink(get_page_by_path('biography')) ?>">Подробнее</a>
        </div>
        <?= $bio['description']; ?>
      </div>

    </div>
  </div>
  <div class="main-3">
    <div class="inner">
      <div>
        <div class="top">
          <h2 class="title">Результаты работы</h2>
          <a href="<?= get_permalink(get_page_by_path('works')) ?>" class="btn">Все работы</a>
        </div>
        <p>В клинике Сергея Блохина используется самое современное оборудование, а новейшие методики пластической
          хирургии</p>
        <div class="work-results">
          <div class="swiper-wrapper">
            <?php
            // check if the repeater field has rows of data
            if (have_rows('slider_result_work')):

              // loop through the rows of data
              while (have_rows('slider_result_work')) : the_row();
                $beforeImg = get_sub_field('before_img');
                $afterImg  = get_sub_field('after_img');
                $title     = get_sub_field('title');
                ?>
                <div class="swiper-slide">
                  <div class="text"><?= $title; ?></div>
                  <div class="before"><img src="<?php echo $beforeImg; ?>" alt=""></div>
                  <div class="after"><img src="<?= $afterImg; ?>" alt=""></div>
                </div>

              <?php endwhile;
            endif;
            ?>

          </div>
          <div class="swiper-pagination"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="inner">
    <div class="main-4">
      <div class="top">
        <h2 class="title">Новости и события</h2>
        <p>
          В клинике Сергея Блохина используется самое современное оборудование,
          а новейшие методики пластической хирургиии косметологии.
        </p>
        <a href="<?= get_permalink(get_page_by_path('news')) ?>" class="btn">Все новости</a>
      </div>
      <div class="news-slider">
        <div class="swiper-wrapper">
          <?php $news = get_posts(array(
            'post_type'   => 'news',
            'numberposts' => 6,
          )); ?>

          <?php foreach ($news as $item) : ?>

            <div class="swiper-slide">
              <a href="<?= get_permalink($item->ID); ?>">
                <img src="<?= get_template_directory_uri() ?>/images/arrow-tab.svg" alt="" class="arrow">
                <img src="<?= the_field('news_img_preview', $item) ?>" alt="">
                <div class="text">
                  <div class="data"><?= get_the_date(__('d F'), $item); ?></div>
                  <h6 class="title"><?= $item->post_title; ?></h6>
                </div>
              </a>
            </div>

          <?php endforeach; ?>

        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>
  </div>
  <div class="main-5">
    <div class="inner">
      <img src="<?= get_template_directory_uri() ?>/images/news-bg-treug.svg" alt="" class="treug-1">
      <h3 class="title">Команда и ученики работающие по методике С. Н.Блохина</h3>
      <p>Признанный специалист в области пластической хирургии, доктор медицины, профессор и автор множества научных
        работ</p>
      <a href="<?= get_permalink(get_page_by_path('students')) ?>" class="btn">Посмотреть учеников</a>
      <img src="<?= get_template_directory_uri() ?>/images/collective.png" alt="" class="collective">
      <img src="<?= get_template_directory_uri() ?>/images/news-bg-treug.svg" alt="" class="treug-2">
    </div>
  </div>
  <div class="inner">
    <div class="main-6">
      <h2 class="title">Контакты</h2>
      <div class="contacts">
        <div class="city">
          <img src="<?= get_template_directory_uri() ?>/images/star.svg" alt="">
          <span>Москва</span>
        </div>
        <?= the_field('adress', 'option'); ?>
        <div class="tel"><span><?= the_field('tel', 'option'); ?></div>
        <div class="tel"><span><?= the_field('tel', 'option'); ?></div>
      </div>
      <div class="callback">
        <a href="javascript:void(0)" class="btn ajax-mfp" data-href="<?= get_template_directory_uri() ?>/popup-callback.php">Оставить заявку</a>
        <div class="social-networks">
          <a href="<?= the_field('whatsapp', 'option'); ?>">
            <img src="<?= get_template_directory_uri() ?>/images/whatsapp.svg" alt="">
          </a>
          <a href="<?= the_field('viber', 'option'); ?>">
            <img src="<?= get_template_directory_uri() ?>/images/viber.svg" alt="">
          </a>
          <a href="<?= the_field('telegram', 'option'); ?>">
            <img src="<?= get_template_directory_uri() ?>/images/telegram.svg" alt="">
          </a>
          <a href="<?= the_field('vk', 'option'); ?>">
            <img src="<?= get_template_directory_uri() ?>/images/vk.svg" alt="">
          </a>
        </div>
      </div>
    </div>
  </div>
  <iframe src="https://snazzymaps.com/embed/124986" width="100%" height="420px" style="border:none;"></iframe>
</div>
<?php get_footer(); ?>
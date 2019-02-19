<?php get_header(); ?>
<div class="inner">
  <div class="content-with-aside services">
    <div class="content">
      <?php
      if (have_posts()) :
        while (have_posts()) :
          the_post();
          the_content();
        endwhile;

      endif;
      ?>

      <div class="landing-for-services-3">
        <div class="top">
          <h6 class="title">Результаты работы</h6>
          <a href="/works/">Все работы</a>
        </div>
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <?php
            // check if the repeater field has rows of data
            if (have_rows('slider_result_work', get_option('page_on_front'))):

              // loop through the rows of data
              while (have_rows('slider_result_work', get_option('page_on_front'))) : the_row();
                $beforeImg = get_sub_field('before_img');
                $afterImg  = get_sub_field('after_img');
                ?>
                <div class="swiper-slide">
                  <div class="before">
                    <img src="<?php echo $beforeImg; ?>" alt="">
                  </div>
                  <div class="after">
                    <img src="<?= $afterImg; ?>" alt="">
                  </div>
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
      <div class="services-6">
        <h6 class="title">Особенности операции <img src="<?= get_template_directory_uri() ?>/images/arrow-tab.svg" alt=""></h6>
        <?php the_field('special'); ?>
        <a href="https://www.youtube.com/watch?v=y06p3sbhITg" class="video-popup" data-rel="media">
          <img src="<?= get_template_directory_uri() ?>/images/services-3.jpg" alt="">
          <div class="text">
            <p>смотреть видео об операции</p>
            <img src="<?= get_template_directory_uri() ?>/images/arrow-tab.svg" alt="">
          </div>
        </a>
      </div>
      <div class="services-2">
        <?php the_field('special2'); ?>
      </div>
      <div class="services-2">
        <?php the_field('special3'); ?>
      </div>
      <?php if (have_rows('prices')): ?>
      <div class="services-4">
        <h6 class="title">Стоимость операции</h6>
        <img src="<?= get_template_directory_uri() ?>/images/arrow-tab.svg" alt="">
        <div class="list-of-services">
          <?php
          // check if the repeater field has rows of data
          if (have_rows('prices')):

            // loop through the rows of data
            while (have_rows('prices')) : the_row();
              $name = get_sub_field('name');
              $description  = get_sub_field('description');
              $price     = get_sub_field('price');
              ?>
              <div class="item">
                <div class="name">
                  <p><?= $name; ?></p>
                  <?php if($description) : ?>
                  <span>(осмотр, консультация) врача дерматолога/косметолога первичный</span>
                  <?php endif; ?>
                </div>
                <div class="price"><?= $price ?></div>
              </div>

            <?php endwhile;
          endif;
          ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
    <?php get_template_part('partials/sidebar', 'service'); ?>
  </div>
</div>
<div class="page-of-news-2">
  <div class="inner">
    <div>
      <div class="left">
        <h6 class="title">Другие операции на груди:</h6>
        <div class="item">
          <a href="">Удаление имплантов</a>
        </div>
        <div class="item">
          <a href="">Замена имплантов</a>
        </div>
        <div class="item">
          <a href="">Коррекция местоположения импланта</a>
        </div>
      </div>
      <div class="right">
        <div class="item">
          <a href="" class="img"><img src="images/news-10.jpg" alt=""></a>
          <div class="text"><a href="">Уменьшение ареол</a></div>
        </div>
        <div class="item">
          <a href="" class="img"><img src="images/news-11.jpg" alt=""></a>
          <div class="text"><a href="">Первый месяц после  увеличения груди</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php get_footer(); ?>

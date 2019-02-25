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
     <?php  if (have_rows('slider_result_work')) : ?>
      <div class="landing-for-services-3">
        <div class="top">
          <h6 class="title">Результаты работы</h6>
          <a href="/works/">Все работы</a>
        </div>
        <div class="swiper-container">
          <div class="swiper-wrapper">
            <?php

              // loop through the rows of data
              while (have_rows('slider_result_work')) : the_row();
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

            ?>

          </div>
          <div class="swiper-pagination"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </div>
      <?php endif; ?>
      <?php if(get_field('special_operation')) : ?>
      <div class="services-6">
        <?php the_field('special_operation'); ?>
      </div>
      <?php endif; ?>
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
                  <span><?= $description; ?></span>
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

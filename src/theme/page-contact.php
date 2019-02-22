<?php get_header(); ?>
  <div class="inner">
    <div class="contacts-1">
      <div class="text">
        <div class="item">
          <div class="city">
            <img src="<?= get_template_directory_uri() ?>/images/star.svg" alt="">
            <span>Москва</span>
          </div>
          <p>Какой-то адрес этой клиники
            Ежедневно с 9:00 до 21:00</p>
          <div class="tel"><span>+ 7 495</span> 123 45 67</div>
          <div class="tel"><span>+ 7 495</span> 123 45 67</div>
        </div>
        <div class="item">
          <div class="city">
            <img src="images/star.svg" alt="">
            <span>Москва</span>
          </div>
          <p>Какой-то адрес этой клиники
            <span>Ежедневно с 9:00 до 21:00</span>
          </p>
          <div class="tel"><span>+ 7 495</span> 123 45 67</div>
        </div>
      </div>
      <div class="img">
        <img src="<?= get_template_directory_uri() ?>/images/contacts-1.png" alt="">
        <div class="text-absolute">
          <h6 class="title">Остались вопросы?</h6>
          <p>Оставьте заявку и мои коллеги свяжутся с вами</p>
          <a href="" class="btn">Оставить заявку</a>
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
  </div>
  <div class="contacts-2">
    <div class="inner">
      <div class="tabs">
        <ul>
          <li><a href="#tab-1">Карта</a></li>
          <li><a href="#tab-2">Схема парковок</a></li>
        </ul>
      </div>
    </div>
  </div>
  <iframe src="https://snazzymaps.com/embed/124986" width="100%" height="420px" style="border:none;" id="tab-1"></iframe>
  <iframe src="https://snazzymaps.com/embed/124986" width="100%" height="420px" style="border:none;" id="tab-2"></iframe>

<?php
if (have_posts()) :
  while (have_posts()) :
    the_post();
  endwhile;

endif;
?>

<?php get_footer(); ?>

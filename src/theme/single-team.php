<?php get_header(); ?>
<!--#include file="header.html" -->
<div class="inner">
  <div class="page-of-doctor">
    <div class="about-doctor">
      <img src="<?= wp_get_attachment_image_src( get_post_thumbnail_id(), 'large')[0]; ?>" alt="">
      <img src="images/team-doctor-4-mobile.png" alt="" class="mobile">
      <div class="name"><?= the_title(); ?></div>
      <p><?= the_excerpt(); ?></p>
    </div>
    <div class="education">
      <?php 
      the_post();
      the_content();
      ?>
    </div>
    <div class="callback">
      <img src="<?= get_template_directory_uri() ?>/images/arrow-callback.svg" alt="">
      <h6 class="title">Остались вопросы?</h6>
      <p>Оставьте заявку и мои коллеги свяжутся с вами</p>
      <a href="" class="btn">оставить заявку</a>
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
<!--#include file="footer.html" -->
<?php get_footer(); ?>

<?php get_header(); ?>
  <div class="inner">
    <div class="content-with-aside faq-page">
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
      <div class="tabs">
        <ul>
          <?php foreach ($categories as $category) : ?>
            <li>
              <a href="#tab-<?= $index; ?>"><?= $category->name; ?></a>
            </li>
            <?php $index++; endforeach;
          $index = 1; ?>
        </ul>
      </div>
      <div class="content">

        <?php foreach ($categories  as $category) : ?>
        <?php if (have_rows('block_faq', $category)) : ?>
          <div id="tab-<?= $index; ?>">
            <h4 class="title"><?= $categories[$index - 1]->name; ?>
              <img src="<?= get_template_directory_uri() ?>/images/arrow-tab.svg" alt="">
            </h4>
            <div class="list-of-faq">

              <?php while (have_rows('block_faq', $category)) : the_row(); ?>
                <div class="item">
                  <div class="question"><?= get_sub_field('header'); ?> <img
                        src="<?= get_template_directory_uri() ?>/images/arrow-for-question.svg" alt=""></div>
                  <div class="answer"><?= get_sub_field('description'); ?></div>
                </div>
              <?php endwhile; ?>
            </div>
          </div>
        <?php else : ?>
          <div class="list-of-faq">
        <?php endif; ?>

      <?php $index++;   endforeach;    $index = 1; ?>
          </div>
      <aside class="aside-callback">
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
      </aside>
    </div>
  </div>
<?php get_footer(); ?>
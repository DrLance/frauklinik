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
<?php get_template_part('partials/sidebar','service-interesting'); ?>
<?php get_footer(); ?>

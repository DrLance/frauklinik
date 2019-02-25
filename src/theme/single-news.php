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

      <?php if (get_field('important_info')) : ?>
        <div class="page-of-news-1">
          <img src="<?= get_template_directory_uri() ?>/images/arrow-for-news.svg" alt="">
          <h6 class="title">Важная информация</h6>
          <?= the_field('important_info'); ?>
        </div>
      <?php endif; ?>
      <?= the_excerpt(); ?>
    </div>

    <?php get_template_part('partials/sidebar', 'service'); ?>
  </div>
</div>
<?php get_template_part('partials/sidebar', 'news-interesting'); ?>
<?php get_footer(); ?>

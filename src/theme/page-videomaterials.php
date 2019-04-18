<?php get_header(); ?>
<div class="inner">
  <div class="work-results-page-3">
    <div class="text">
      <div>
        <?php the_post(); the_content(); ?>
      </div>
    </div>

    <?php $index = 1;
    if (have_rows('materials')) : ?>
      <div class="list">
        <?php
          $my_fields = get_field('materials');
          $count = (count($my_fields));
        ?>
        <?php while (have_rows('materials')) : the_row(); ?>
          <?php
          $materialImg   = get_sub_field('img');
          $materialDesc  = get_sub_field('description');
          $materialVideo = get_sub_field('video_url');
          ?>
          <?php if ($index % 2 === 0 && $index !== $count ) : ?>
            <div class="row">
            <a href="<?= $materialVideo ?>" class="video-popup" data-rel="media">
              <img src="<?= $materialImg['url'] ?>" alt="">
              <span class="shadow"></span>
              <div class="text"><?= $materialDesc ?></div>
            </a>

          <?php elseif (($index - 1) % 2 === 0 && $index % 2 !== 0 && $index !== 1)  : ?>
            <a href="<?= $materialVideo ?>" class="video-popup" data-rel="media">
              <img src="<?= $materialImg['url'] ?>" alt="">
              <span class="shadow"></span>
              <div class="text"><?= $materialDesc ?></div>
            </a>
            </div>
          <?php elseif($count % 2 && $index === $count) : ?>
            <a href="<?= $materialVideo ?>" class="video-popup" data-rel="media">
              <img src="<?= $materialImg['url'] ?>" alt="">
              <span class="shadow"></span>
              <div class="text"><?= $materialDesc ?></div>
            </a>
          <?php else : ?>
            <a href="<?= $materialVideo ?>" class="video-popup" data-rel="media">
              <img src="<?= $materialImg['url'] ?>" alt="">
              <span class="shadow"></span>
              <div class="text"><?= $materialDesc ?></div>
            </a>

          <?php endif; ?>
          <?php $index++; endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
</div>
<?php
if (have_posts()) :
  while (have_posts()) :
    the_post();
  endwhile;

endif; ?>

<?php get_footer(); ?>

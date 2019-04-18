<?php get_header(); ?>
<?php
$postIDs = getPostIDFroCat(get_term(get_queried_object_id()));

$argsPosts = array(
  'post_type' => 'operation_service',
  'include'   => $postIDs,
);

$services = get_posts($argsPosts);


?>
<div class="main-3 work-results-page-2">
  <div class="inner">
    <div>
      <div class="top">
        <h6 class="title"><?= single_term_title(); ?></h6>
      </div>
      <p><?= term_description(); ?></p>
      <div class="work-results">
        <div class="swiper-wrapper">
          <?php foreach ($services as $service) : ?>

            <?php if (have_rows('slider_result_work', $service->ID)) : ?>

              <?php
              $rows = get_field('slider_result_work', $service->ID);
              foreach ($rows as $row) : ?>
                <?php
                $beforeImg = $row['before_img']['url'];
                $afterImg  = $row['after_img']['url'];
                $videoUrl  = $row['video_url'];
                ?>
                <div class="swiper-slide">
                  <div class="text"><?= $service->post_excerpt ?></div>
                  <div class="before"><img src="<?= $beforeImg ?>" alt=""></div>
                  <?php if ($videoUrl) : ?>
                    <a href="<?= $videoUrl ?>" class="after video-popup" data-rel="media">
                      <img src="<?= $afterImg ?>" alt="">
                      <span class="shadow"></span>
                      <span class="word">Видео-отзыв</span>
                    </a>
                  <?php else : ?>
                    <a href="<?= $videoUrl ?>" class="after" data-rel="media">
                      <img src="<?= $afterImg ?>" alt="">
                      <span class="shadow"></span>
                    </a>
                  <?php endif; ?>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>
  </div>
</div>
<?php
if (have_posts()) :
  while (have_posts()) :
    the_post();
  endwhile;

endif; ?>

<?php get_footer(); ?>

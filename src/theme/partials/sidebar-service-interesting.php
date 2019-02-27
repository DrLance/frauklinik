<?php
wp_reset_postdata();
global $post;

$terms = wp_get_post_terms($post->ID, 'taxonomy');

$termName = isset($terms[0]) ? $terms[0]->name : '';
$termID   = isset($terms[0]) ? $terms[0]->term_id : 1;

$operations = get_posts(array(
  'post_type'   => 'operation_service',
  'numberposts' => 3,
  'exclude'     => $post->ID,
  'tax_query'   => array(
    array(
        'taxonomy' => 'taxonomy',
        'field' => 'term_id',
        'terms' => $termID
    ),
  ),
));
?>
<div class="page-of-news-2">
  <div class="inner">
    <div>
      <div class="left">
        <h6 class="title">Другие операции на <?= mb_strtolower($termName); ?> :</h6>
        <?php foreach ($operations as $operation) : ?>
          <div class="item">
            <a href="<?= get_permalink($operation); ?>"><?= $operation->post_title; ?></a>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="right">
        <?php foreach ($operations as $operation) : ?>
          <div class="item">
            <a href="<?= get_permalink($operation); ?>" class="img">
              <img src="<?= the_field('sidebar_img_preview', $operation) ?>" alt="">
            </a>
            <div class="text">
              <a href="<?= get_permalink($operation); ?>"><?= $operation->post_title; ?></a>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
    </div>
  </div>
</div>
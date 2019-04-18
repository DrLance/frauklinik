<?php get_header(); ?>
<div class="inner">
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

  function getCountForCat($category)
  {
    $parents = get_posts(array(
      'post_type' => 'operation_service',
      'tax_query' => array(
        array(
          'taxonomy' => 'taxonomy',
          'field'    => 'slug',
          'terms'    => $category->slug,
        ),
      ),
    ));

    $parentsID = [];
    $_childs   = [];
    $childs    = [];

    foreach ($parents as $parent) {
      $_childs     = get_children(array(
        'post_parent' => $parent->ID,
        'post_type'   => 'operation_service',
      ));
      $childs      = array_merge($childs, $_childs);
      $parentsID[] = $parent->ID;
    }

    foreach ($childs as $child) {
      $parentsID[] = $child->ID;
    }

    //$newargs['post__in'] = implode(',',$parentsID);


    $argsPosts = array(
      'post_type' => 'operation_service',
      'include'   => $parentsID,
    );

    $services = get_posts($argsPosts);
    $countImg = 0;
    foreach ($services as $service) {
      if (have_rows('slider_result_work', $service)) {

        // loop through the rows of data
        while (have_rows('slider_result_work')) {
          the_row();
          $beforeImg = get_sub_field('before_img');
          $afterImg  = get_sub_field('after_img');
          if ($beforeImg) {
            ++$countImg;
          }
          if ($afterImg) {
            ++$countImg;
          }
        }

      }
    }

    return $countImg;
  }

  ?>
  <div class="work-results-page-1">
    <a href="" class="big-link">
      <img src="<?= get_template_directory_uri() ?>/images/banner-work-results-1.jpg" alt="">
      <span class="text">
				<h4>Телепроект  “На 10 лет моложе”</h4>
				<p>14 фото</p>
			</span>
    </a>
    <div class="list">
      <?php foreach ($categories as $category) : ?>
        <?php $titleTab = get_field('short_header', $category)
          ? get_field('short_header', $category)
          : $category->name; ?>
        <a href="<?= get_category_link($category); ?>" class="item">
          <img src="<?= the_field('img', $category); ?>" alt="">
          <div class="title">
            <span><?= $titleTab ?></span>
          </div>
          <p><?= getCountForCat($category); ?> фото</p>
        </a>
      <?php endforeach; ?>
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

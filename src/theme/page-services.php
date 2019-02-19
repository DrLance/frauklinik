<?php get_header(); ?>
<div class="inner">
  <div class="catalog-tabs">
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
    <?php foreach ($categories as $category) : ?>
      <div class="links" id="tab-<?= $index; ?>">
        <div class="img">
          <img src="<?= the_field('img', $category); ?>" alt="">
          <p><?= $category->description; ?></p>
        </div>
        <ul>
          <?php
          $posts = get_posts(array(
            'post_type'   => 'operation_service',
            'numberposts' => -1,
            'tax_query'   => array(
              array(
                'taxonomy' => 'taxonomy',
                'field'    => 'term_id',
                'terms'    => $category->term_id,
              ),
            ),
          ));
          ?>
          <?php foreach ($posts

          as $post) : ?>
          <li>
            <a href="<?= the_permalink($post); ?>"><?= $post->post_title ?>
              <img src="<?= get_template_directory_uri() ?>/images/arrow-tab.svg" alt="">
            </a>
            <?php
            $children = get_children(array(
              'post_parent' => $post->ID,
              'numberposts' => -1,
            )); ?>

            <?php if (count($children) > 0) : ?>
              <ul>
                <?php foreach ($children as $child) : ?>
                  <li>
                    <a href="<?= the_permalink($child); ?>"><?= $child->post_title; ?></a>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </li>
          <li>
            <?php endforeach; ?>
        </ul>
      </div>
      <?php $index++; endforeach;
    $index = 1; ?>
  </div>
</div>
<?php
if (have_posts()) :
  while (have_posts()) :
    the_post();
  endwhile;

endif; ?>

<?php get_footer(); ?>

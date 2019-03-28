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
          <?php $titleTab = get_field('short_header', $category)
            ? get_field('short_header', $category)
            : $category->name; ?>
          <li>
            <a href="#tab-<?= $index; ?>"><?= $titleTab; ?></a>
          </li>
          <?php $index++; endforeach;
        $index = 1; ?>
      </ul>
    </div>
    <?php foreach ($categories as $category) : ?>
      <?php $titleTab = get_field('short_header', $category)
        ? get_field('short_header', $category)
        : $category->name;

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
        'include'  => $parentsID,
      );

      $pposts = get_posts($argsPosts);
      ?>

      <div class="links" id="tab-<?= $index; ?>">


        <div>
          <div>
            <div class="top">
              <h2 class="title" style="font-size: 26px"><?= $titleTab ?></h2>
            </div>
            <p style="font-size: 14px;line-height: 24px;color: #353A42;opacity: 0.7; width: 50%"><?= $category->description; ?></p>


              <?php if (count($pposts) > 0) : ?>
              <div style="display: flex; flex-direction: column">

                  <?php foreach ($pposts as $ppost) :   ?>
                  <a href="<?= get_permalink($ppost->ID); ?>"><?= $ppost->post_title;  ?></a>
                  <?php  endforeach;  ?>
              </div>
              <?php endif; ?>


          </div>
        </div>
      </div>
      <?php $index++; endforeach;  $index = 1; ?>
  </div>
</div>
<?php
if (have_posts()) :
  while (have_posts()) :
    the_post();
  endwhile;

endif; ?>

<?php get_footer(); ?>

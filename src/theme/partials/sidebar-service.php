<aside>
  <div class="title-mobile">
    <span>Другие услуги</span>
    <div>
      <div class="mt-1"></div>
      <div class="mt-2"></div>
      <div class="mt-3"></div>
    </div>
  </div>
  <div>
    <h6 class="title">Другие услуги <img src="<?= get_template_directory_uri() ?>/images/arrow-tab.svg" alt=""></h6>
    <div class="faq">
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
    $index      = 1; ?>
      <?php foreach ($categories as $category) : ?>
      <div class="item">
        <div class="question">
          <?= $category->name; ?>
          <img src="<?= get_template_directory_uri() ?>/images/arrow-for-question.svg" alt="">
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
          <?php foreach ($posts  as $post) : ?>

            <?php $children = get_children(array(
            'post_parent' => $post->ID,
            'numberposts' => -1,
            )); ?>
          <?php if(count($children) === 0) : ?>
          <li>
            <a href="<?= get_permalink($post); ?>"><?= $post->post_title; ?></a>
          </li>
            <?php else : ?>
          <li>
            <a href="<?= get_permalink($post); ?>"><?= $post->post_title; ?></a>
            <ul>
              <?php foreach ($children as $child) :   ?>
              <li>
                <a href="<?= get_permalink($child); ?>"><?= $child->post_title; ?></a>
              </li>
              <?php endforeach; ?>
            </ul>
          </li>
          <?php endif; ?>
          <?php endforeach; ?>
        </ul>
      </div>
        <?php $index++; endforeach;  $index = 1; ?>
    </div>
    <h6 class="title">Интересные статьи по теме<img src="images/arrow-tab.svg" alt=""></h6>
    <div class="news">
      <div class="item">
        <div class="title">здоровье</div>
        <a href="">Кастинг моделей на бодилифтинг у профессора Блохина!</a>
      </div>
      <div class="item">
        <div class="title">график</div>
        <a href="">График работы Frau Klinik в дни Новогодних праздников</a>
      </div>
      <div class="item">
        <div class="title">мода</div>
        <a href="">Кастинг моделей на бодилифтинг у профессора Блохина!</a>
      </div>
    </div>
  </div>
</aside>
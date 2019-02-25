<?php get_header(); ?>
  <div class="team-1">
    <div class="inner">
      <div class="text">
        <a href="javascript:history.back()" class="back">
          <img src="<?= get_template_directory_uri() ?>/images/arrow-left-navigation-2.svg" alt="">
          <span>назад</span>
        </a>
        <h4 class="title">Команда и ученики работающие по методике С.Н.Блохина</h4>
        <p>Признанный специалист в области пластической хирургии, доктор медицины, профессор и автор множества научных работ</p>
      </div>
      <div class="img"><img src="<?= get_template_directory_uri() ?>/images/collective.png" alt=""></div>
    </div>
  </div>
  <div class="inner">
    <div class="content-with-aside team">
      <div class="content">
        <div class="team-2">
          <h6 class="title">Наша гордость</h6>
          <div class="list-of-items">
            <?php
            $students = get_posts(
              array(
                'post_type'   => 'team',
                'numberposts' => -1,
              )
            );
            ?>
            <?php foreach ($students as $student) : ?>
              <div class="item">

                <a href="" class="img">
                  <img src="<?= the_field('image_preview', $student->ID) ?>" alt="">
                  <img src="<?= get_template_directory_uri() ?>/images/ellipse-team.svg" alt="" class="bottom">
                </a>


                <div class="text">
                  <a href="<?= get_permalink($student); ?>" class="name"><?= $student->post_title; ?></a>
                  <div><?= $student->post_excerpt; ?></div>
                  <p><?= the_field('losung', $student->ID); ?></p>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <?php get_template_part('partials/sidebar', 'service'); ?>

    </div>
  </div>
<?php get_footer(); ?>
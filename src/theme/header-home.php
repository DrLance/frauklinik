<div id="wrapper">
  <header id="header" class="header-index">
    <div class="inner">
      <div class="logo">
        <a href="<?= site_url(); ?>">
        <span><?= bloginfo('description'); ?></span>
        </a>
      </div>
      <div class="contacts">
        <div class="phone tel"><?= the_field('tel', 'option'); ?></div>
        <div class="callback">
          <a href="javascript:void(0)" class="ajax-mfp" data-href="<?= get_template_directory_uri() ?>/popup-callback.php">оставить заявку</a>
        </div>
      </div>
      <nav>
        <ul>
          <?php $menuHeader = wp_get_nav_menu_items('Header-contact'); ?>
          <?php foreach ($menuHeader as $item) : ?>
            <li>
              <a href="<?= $item->url; ?>"><?= $item->title; ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
      </nav>
      <div class="hamburger">
        <div>
          <div class="mt-1"></div>
          <div class="mt-2"></div>
          <div class="mt-3"></div>
        </div>
      </div>
      <div class="dropdown-menu">
        <div class="left tabs-2">
          <div class="active-block">
            <ul>
              <li class="title">О хирурге</li>
              <ul>
                <?php $menuHeader = wp_get_nav_menu_items('Swipe-menu-about'); ?>
                <?php foreach ($menuHeader as $item) : ?>
                  <li>
                    <a href="<?= $item->url; ?>"><?= $item->title; ?></a>
                  </li>
                <?php endforeach; ?>
              </ul>
              <?php $menuHeader = wp_get_nav_menu_items('Swipe-news'); ?>
              <?php foreach ($menuHeader as $item) : ?>
                <li class="title-a">
                  <a href="<?= $item->url; ?>"><?= $item->title; ?></a>
                </li>
              <?php endforeach; ?>
            </ul>
            <ul>
              <li class="title">Операциии услуги</li>
              <ul class="tabs-2-list">
                <?php
                $operationService = wp_get_nav_menu_items('Swipe-operation-service');
                $index            = 1;
                ?>
                <?php foreach ($operationService as $item) : ?>
                  <li>
                    <a href="#tab-1-<?= $index; ?>"><?= $item->title; ?></a>
                  </li>
                  <?php $index++; endforeach;
                $index = 1; ?>
              </ul>
            </ul>
            <ul class="list-mobile">
              <?php $menuHeader = wp_get_nav_menu_items('Swipe-news'); ?>
              <?php foreach ($menuHeader as $item) : ?>
                <li class="title-a">
                  <a href="<?= $item->url; ?>"><?= $item->title; ?></a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>

          <div class="opacity-block">
            <?php foreach ($operationService as $service) : ?>
              <div id="tab-1-<?= $index; ?>">
                <?php
                $operationCat = get_posts(array(
                  'post_type'   => 'operation_service',
                  'numberposts' => -1,
                  'tax_query'   => array(
                    array(
                      'taxonomy' => 'taxonomy',
                      'field'    => 'term_id',
                      'terms'    => $service->object_id,
                    ),
                  ),
                )); ?>
                <ul>
                  <?php foreach ($operationCat as $operation) : ?>

                    <?php
                    $children = get_children(array(
                      'post_parent' => $operation->ID,
                      'numberposts' => -1,
                      'post_type' => 'operation_service'
                    ));

                    if (count($children) === 0) : ?>

                      <li class="title">
                        <a href="<?= get_permalink($operation); ?>"><?= $operation->post_title; ?></a>
                      </li>
                    <?php else : ?>
                      <li class="title" style="padding-top: 15px;">
                        <a href="<?= get_permalink($operation); ?>"><?= $operation->post_title; ?></a>
                      </li>
                    <?php endif; ?>
                    <?php

                    if (count($children) > 0) : ?>
                      <ul>
                        <?php foreach ($children as $child) : ?>
                          <?php if ($operation->ID) : ?>
                          <?php endif; ?>
                          <li>
                            <a href="<?= get_permalink($child); ?>"><?= $child->post_title; ?></a>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </ul>
              </div>
              <?php $index++; endforeach;
            $index = 1; ?>
          </div>
        </div>
        <div class="mobile-block">
          <ul>
            <li class="title">О хирурге</li>
            <ul>
              <?php $menuHeader = wp_get_nav_menu_items('Swipe-menu-about'); ?>
              <?php foreach ($menuHeader as $item) : ?>
                <li>
                  <a href="<?= $item->url; ?>"><?= $item->title; ?></a>
                </li>
              <?php endforeach; ?>
            </ul>
            <?php $menuHeader = wp_get_nav_menu_items('Swipe-news'); ?>
            <?php foreach ($menuHeader as $item) : ?>
              <li class="title-a">
                <a href="<?= $item->url; ?>"><?= $item->title; ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
          <ul>
            <li class="title">Операциии услуги</li>
            <ul>
              <?php
              $operationService = wp_get_nav_menu_items('Swipe-operation-service');
              $index            = 1;
              ?>
              <?php foreach ($operationService as $item) : ?>
                <li class="title-2">
                  <?= $item->title; ?>
                </li>
                <?php $index++; endforeach; $index = 1; ?>

              <?php foreach ($operationService as $service) : ?>

                <?php
                $operationCat = get_posts(array(
                  'post_type'   => 'operation_service',
                  'numberposts' => -1,
                  'tax_query'   => array(
                    array(
                      'taxonomy' => 'taxonomy',
                      'field'    => 'term_id',
                      'terms'    => $service->object_id,
                    ),
                  ),
                )); ?>
                <ul>
                  <?php foreach ($operationCat as $operation) : ?>

                    <?php
                    $children = get_children(array(
                      'post_parent' => $operation->ID,
                      'numberposts' => -1,
                      'post_type' => 'operation_service'
                    ));

                    if (count($children) === 0) : ?>

                      <li class="title">
                        <a href="<?= get_permalink($operation); ?>"><?= $operation->post_title; ?></a>
                      </li>
                    <?php else : ?>
                      <li class="title" style="padding-top: 15px;">
                        <a href="<?= get_permalink($operation); ?>"><?= $operation->post_title; ?></a>
                      </li>
                    <?php endif; ?>
                    <?php

                    if (count($children) > 0) : ?>
                      <ul>
                        <?php foreach ($children as $child) : ?>
                          <?php if ($operation->ID) : ?>
                          <?php endif; ?>
                          <li class="mg-left">
                            <a href="<?= get_permalink($child); ?>"><?= $child->post_title; ?></a>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </ul>

                <?php $index++; endforeach;
              $index = 1; ?>
            </ul>
          </ul>
        </div>
        <div class="right">
          <div class="tel"><?= the_field('tel', 'option'); ?></div>
          <a href="javascript:void(0)" class="btn mobile ajax-mfp" data-href="<?= get_template_directory_uri() ?>/popup-callback.php">Оставить заявку</a>
          <?= the_field('adress', 'option'); ?>
          <div class="email">
            <p><?= the_field('email_all', 'option'); ?></p>
            <span>по всем вопросам</span>
          </div>
          <div class="email">
            <p><?= the_field('email_adv', 'option'); ?></p>
            <span>реклама и сотрудничество</span>
          </div>
          <a href="javascript:void(0)" class="btn ajax-mfp" data-href="<?= get_template_directory_uri() ?>/popup-callback.php">оставить заявку</a>
          <div  class="social-networks">
            <a href="<?= the_field('whatsapp', 'option'); ?>">
              <img src="<?= get_template_directory_uri() ?>/images/whatsapp.svg" alt="">
            </a>
            <a href="<?= the_field('viber', 'option'); ?>">
              <img src="<?= get_template_directory_uri() ?>/images/viber.svg" alt="">
            </a>
            <a href="<?= the_field('telegram', 'option'); ?>">
              <img src="<?= get_template_directory_uri() ?>/images/telegram.svg" alt="">
            </a>
            <a href="<?= the_field('vk', 'option'); ?>">
              <img src="<?= get_template_directory_uri() ?>/images/vk.svg" alt="">
            </a>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div id="middle">



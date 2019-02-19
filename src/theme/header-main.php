<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">
  <header id="header">
    <div class="inner">
      <div class="logo">
        <span><?= bloginfo('description'); ?></span>
      </div>
      <div class="contacts">
        <div class="phone tel"><?= the_field('tel', 'option'); ?></div>
        <div class="callback">
          <a href="#">оставить заявку</a>
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
                    <a <a href="#tab-1-<?= $index; ?>"><?= $item->title; ?></a>
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
                  'post_type' => 'operation_service',
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'taxonomy',
                      'field'    => 'term_id',
                      'terms' =>  $service->object_id
                    ),
                  ),
                )); ?>
                <ul>
                  <?php foreach ($operationCat as $operation) : ?>

                    <?php
                    $children = get_children(array(
                      'post_parent' => $operation->ID,
                      'numberposts' => -1,
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
              <li class="title-2">Пластика лица</li>
              <ul>
                <li><a href="">Круговая подтяжка лица</a></li>
                <li><a href="">Эндоскопический лифтинг лица</a></li>
                <li class="mg-left"><a href="">Эндоскопический лифтинг лба</a></li>
                <li class="mg-left last"><a href="">Эндоскопический лифтинг средней зоны лица</a></li>
                <li><a href="">SMAS лифтинг</a></li>
                <li><a href="">Пластика подбородка (ментопластика)</a></li>
                <li><a href="">Пластика шеи (платизмопластика)</a></li>
                <li><a href="">Пластика щек (удаление комков Биша)</a></li>
                <li><a href="">Пластика губ (операция Булхорн)</a></li>
                <li><a href="">Макс-лифтинг лица</a></li>
                <li><a href="">Пластика подбородка (ментопластика)</a></li>
                <li><a href="">Пластика шеи (платизмопластика)</a></li>
                <li><a href="">Пластика щек (удаление комков Биша)</a></li>
                <li><a href="">Пластика губ (операция Булхорн)</a></li>
                <li><a href="">Макс-лифтинг лица</a></li>
                <li><a href="">Пластика подбородка (ментопластика)</a></li>
                <li><a href="">Пластика шеи (платизмопластика)</a></li>
                <li><a href="">Пластика щек (удаление комков Биша)</a></li>
                <li><a href="">Пластика губ (операция Булхорн)</a></li>
                <li><a href="">Макс-лифтинг лица</a></li>
              </ul>
              <li class="title-2">Интимная пластика</li>
              <ul>
                <li><a href="">Вагинопластика</a></li>
                <li class="mg-left"><a href="">Задняя кольпорафия</a></li>
                <li class="mg-left"><a href="">Полная кольпорафия</a></li>
                <li class="mg-left"><a href="">Леваторопластика</a></li>
                <li class="mg-left"><a href="">Пластика промежности</a></li>
                <li class="mg-left"><a href="">Лазерное омоложение влагалища</a></li>
                <li class="mg-left"><a href="">Контурная пластика влагалища</a></li>
                <li class="mg-left last"><a href="">Пластика влагалища</a></li>
                <li><a href="">Лабиопластика</a></li>
                <li class="mg-left"><a href="">Пластика малых половых губ</a></li>
                <li class="mg-left"><a href="">Пластика больших половых губ</a></li>
                <li class="mg-left"><a href="">Пластика области клитора</a></li>
                <li class="mg-left last"><a href="">Пластика области лобка</a></li>
                <li><a href="">Стрессовое недержание мочи у женщин</a></li>
                <li><a href="">Гименопластика</a></li>
                <li><a href="">Хирургическая дефлорация</a></li>
              </ul>
              <li class="title-2">Пластика груди</li>
              <ul>
                <li><a href="">Увеличение груди</a></li>
                <li class="mg-left"><a href="">Увеличение имплантами</a></li>
                <li class="mg-left last"><a href="">Липофилинг груди</a></li>
                <li><a href="">Уменьшение груди</a></li>
                <li class="mg-left"><a href="">Подтяжка груди с увеличением</a></li>
                <li class="mg-left last"><a href="">Подтяжка груди нитями</a></li>
                <li><a href="">Реконструкция груди</a></li>
                <li><a href="">Повторная маммопластика</a></li>
                <li><a href="">Пластика ареолы и сосков</a></li>
                <li><a href="">Коррекция тубулярной груди</a></li>
                <li><a href="">Гинекомастия</a></li>
              </ul>
              <li class="title-2">Абдоминопластика</li>
              <ul>
                <li><a href="">Миниабдоминопластика</a></li>
                <li><a href="">Эндоскопическая абдоминопластика</a></li>
                <li><a href="">Абдоминопластика после родов</a></li>
              </ul>
              <li class="title-2">Ринопластика</li>
              <ul>
                <li><a href="">Открытая ринопластика</a></li>
                <li><a href="">Закрытая ринопластика</a></li>
                <li><a href="">Септопластика</a></li>
                <li><a href="">Риносептопластика</a></li>
                <li><a href="">Повторная ринопластика</a></li>
                <li><a href="">Безоперационная ринопластика</a></li>
              </ul>
              <li class="title-2">Брефаропластика</li>
              <ul>
                <li><a href="">Пластика верхних век</a></li>
                <li><a href="">Пластика нижних век</a></li>
                <li><a href="">Пластика азиатских век</a></li>
                <li><a href="">Трансконъюктивальная пластика нижних век</a></li>
              </ul>
              <li class="title-2">Липосакция</li>
              <ul>
                <li><a href="">Липосакция лица</a></li>
                <li><a href="">Липосакция бедер</a></li>
                <li><a href="">Липосакция коленей</a></li>
                <li><a href="">Липосакция рук</a></li>
                <li><a href="">Липосакция живота</a></li>
                <li><a href="">Липосакция у мужчин</a></li>
              </ul>
              <li class="title-2">Отопластика</li>
              <ul>
                <li><a href="">Отопластика (Пластика ушей)</a></li>
              </ul>
            </ul>
          </ul>
        </div>
        <div class="right">
          <div class="tel"><?= the_field('tel', 'option'); ?></div>
          <a href="" class="btn mobile">Оставить заявку</a>
          <?= the_field('adress', 'option'); ?>
          <div class="email">
            <p><?= the_field('email_all', 'option'); ?></p>
            <span>по всем вопросам</span>
          </div>
          <div class="email">
            <p><?= the_field('email_adv', 'option'); ?></p>
            <span>реклама и сотрудничество</span>
          </div>
          <a href="" class="btn">оставить заявку</a>
          <div class="social-networks">
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
    <div class="navigation list">
      <div class="inner">
        <div>
          <?php $menuHeader = wp_get_nav_menu_items('Header'); ?>
          <?php foreach ($menuHeader as $item) : ?>
            <a href="<?= $item->url; ?>"><?= $item->title; ?></a>
          <?php endforeach; ?>
          <h3 class="title"><?php the_title(); ?></h3>
        </div>
        <div class="button">
          <a href="" class="btn btn-arrow">Оставить заявку
            <img src="<?= get_template_directory_uri() ?>/images/arrow-btn.svg" alt="">
          </a>
        </div>
      </div>
    </div>



<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">
  <header id="header" class="header-index">
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
          <?php $menuHeader =  wp_get_nav_menu_items('Header-contact'); ?>
          <?php foreach ($menuHeader as $item) :  ?>
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
                <li><a href="">Биография</a></li>
                <li><a href="">Команда</a></li>
              </ul>
              <li class="title-a"><a href="">Новости и статьи</a></li>
              <li class="title-a"><a href="">Новости</a></li>
            </ul>
            <ul>
              <li class="title">Операциии услуги</li>
              <ul class="tabs-2-list">
                <li><a href="#tab-1-1">Пластика лица</a></li>
                <li><a href="#tab-1-2">Интимная пластика</a></li>
                <li><a href="#tab-1-3">Пластика груди</a></li>
                <li><a href="#tab-1-4">Абдоминопластика</a></li>
                <li><a href="#tab-1-5">Ринопластика</a></li>
                <li><a href="#tab-1-6">Брефаропластика</a></li>
                <li><a href="#tab-1-7">Липосакция</a></li>
                <li><a href="#tab-1-8">Отопластика</a></li>
              </ul>
            </ul>
            <ul class="list-mobile">
              <li class="title-a"><a href="">Статьи</a></li>
              <li class="title-a"><a href="">Новости</a></li>
              <li class="title-a"><a href="">Новости</a></li>
            </ul>
          </div>
          <div class="opacity-block">
            <div id="tab-1-1">
              <ul>
                <li class="title"><a href="">Круговая подтяжка лица</a></li>
              </ul>
              <ul>
                <li class="title"><a href="">Эндоскопический лифтинг лица</a></li>
                <li><a href="">Эндоскопический лифтинг лба</a></li>
                <li><a href="">Эндоскопический лифтинг средней зоны лица</a></li>
              </ul>
              <ul>
                <li class="title"><a href="">SMAS лифтинг</a></li>
                <li class="title"><a href="">Пластика подбородка (ментопластика)</a></li>
                <li class="title"><a href="">Пластика шеи (платизмопластика)</a></li>
                <li class="title"><a href="">Пластика щек (удаление комков Биша)</a></li>
                <li class="title"><a href="">Пластика губ (операция Булхорн)</a></li>
                <li class="title"><a href="">Макс-лифтинг лица</a></li>
                <li class="title"><a href="">Пластика подбородка (ментопластика)</a></li>
                <li class="title"><a href="">Пластика шеи (платизмопластика)</a></li>
                <li class="title"><a href="">Пластика щек (удаление комков Биша)</a></li>
                <li class="title"><a href="">Пластика губ (операция Булхорн)</a></li>
                <li class="title"><a href="">Макс-лифтинг лица</a></li>
                <li class="title"><a href="">Пластика подбородка (ментопластика)</a></li>
                <li class="title"><a href="">Пластика шеи (платизмопластика)</a></li>
                <li class="title"><a href="">Пластика щек (удаление комков Биша)</a></li>
                <li class="title"><a href="">Пластика губ (операция Булхорн)</a></li>
                <li class="title"><a href="">Макс-лифтинг лица</a></li>
              </ul>
            </div>
            <div id="tab-1-2">
              <ul>
                <li class="title"><a href="">Вагинопластика</a></li>
                <li><a href="">Задняя кольпорафия</a></li>
                <li><a href="">Полная кольпорафия</a></li>
                <li><a href="">Леваторопластика</a></li>
                <li><a href="">Пластика промежности</a></li>
                <li><a href="">Лазерное омоложение влагалища</a></li>
                <li><a href="">Контурная пластика влагалища</a></li>
                <li><a href="">Пластика влагалища</a></li>
              </ul>
              <ul>
                <li class="title"><a href="">Лабиопластика</a></li>
                <li><a href="">Пластика малых половых губ</a></li>
                <li><a href="">Пластика больших половых губ</a></li>
                <li><a href="">Пластика области клитора</a></li>
                <li><a href="">Пластика области лобка</a></li>
              </ul>
              <ul>
                <li class="title"><a href="">Стрессовое недержание мочи у женщин</a></li>
                <li class="title"><a href="">Гименопластика</a></li>
                <li class="title"><a href="">Хирургическая дефлорация</a></li>
              </ul>
            </div>
            <div id="tab-1-3">
              <ul>
                <li class="title"><a href="">Увеличение груди</a></li>
                <li><a href="">Увеличение имплантами</a></li>
                <li><a href="">Липофилинг груди</a></li>
              </ul>
              <ul>
                <li class="title"><a href="">Уменьшение груди</a></li>
                <li><a href="">Подтяжка груди с увеличением</a></li>
                <li><a href="">Подтяжка груди нитями</a></li>
              </ul>
              <ul>
                <li class="title"><a href="">Реконструкция груди</a></li>
                <li class="title"><a href="">Повторная маммопластика</a></li>
                <li class="title"><a href="">Пластика ареолы и сосков</a></li>
                <li class="title"><a href="">Коррекция тубулярной груди</a></li>
                <li class="title"><a href="">Гинекомастия</a></li>
              </ul>
            </div>
            <div id="tab-1-4">
              <ul>
                <li class="title"><a href="">Миниабдоминопластика</a></li>
                <li class="title"><a href="">Эндоскопическая абдоминопластика</a></li>
                <li class="title"><a href="">Абдоминопластика после родов</a></li>
              </ul>
            </div>
            <div id="tab-1-5">
              <ul>
                <li class="title"><a href="">Открытая ринопластика</a></li>
                <li class="title"><a href="">Закрытая ринопластика</a></li>
                <li class="title"><a href="">Септопластика</a></li>
                <li class="title"><a href="">Риносептопластика</a></li>
                <li class="title"><a href="">Повторная ринопластика</a></li>
                <li class="title"><a href="">Безоперационная ринопластика</a></li>
              </ul>
            </div>
            <div id="tab-1-6">
              <ul>
                <li class="title"><a href="">Пластика верхних век</a></li>
                <li class="title"><a href="">Пластика нижних век</a></li>
                <li class="title"><a href="">Пластика азиатских век</a></li>
                <li class="title"><a href="">Трансконъюктивальная пластика нижних век</a></li>
              </ul>
            </div>
            <div id="tab-1-7">
              <ul>
                <li class="title"><a href="">Липосакция лица</a></li>
                <li class="title"><a href="">Липосакция бедер</a></li>
                <li class="title"><a href="">Липосакция коленей</a></li>
                <li class="title"><a href="">Липосакция рук</a></li>
                <li class="title"><a href="">Липосакция живота</a></li>
                <li class="title"><a href="">Липосакция у мужчин</a></li>
              </ul>
            </div>
            <div id="tab-1-8">
              <ul>
                <li class="title"><a href="">Отопластика (Пластика ушей)</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="mobile-block">
          <ul>
            <li class="title">О хирурге</li>
            <ul>
              <li><a href="">Биография</a></li>
              <li><a href="">Команда</a></li>
            </ul>
            <li class="title-a"><a href="">Новости и статьи</a></li>
            <li class="title-a"><a href="">Новости</a></li>
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
          <div class="tel">+ 7 495 123 45 67</div>
          <a href="" class="btn mobile">Оставить заявку</a>
          <p>какой-то адрес клиники</p>
          <p class="mg">с 9:00 до 21:00</p>
          <div class="email">
            <p>mail@yandex.ru</p>
            <span>по всем вопросам</span>
          </div>
          <div class="email">
            <p>pr.mail@gmail.ru</p>
            <span>реклама и сотрудничество</span>
          </div>
          <a href="" class="btn">оставить заявку</a>
          <div class="social-networks">
            <a href=""><img src="images/whatsapp.svg" alt=""></a>
            <a href=""><img src="images/viber.svg" alt=""></a>
            <a href=""><img src="images/telegram.svg" alt=""></a>
            <a href=""><img src="images/vk.svg" alt=""></a>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div id="middle">



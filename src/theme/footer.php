</div>
<footer id="footer" class="footer">
  <div class="inner">
    <div class="footer-top">
      <nav>
        <ul>
          <?php $services = get_posts(array(
              'post_type' => 'service',
            'numberposts' => 5
          ));
          $menuHeader =  wp_get_nav_menu_items('Footer-service'); ?>

          <li class="title">Услуги</li>
          <?php foreach ($menuHeader as $service) : ?>

          <li>
            <a href="<?= $service->url; ?>"><?= $service->title; ?></a>
          </li>
          <?php endforeach; ?>
        </ul>
        <ul>
          <li class="title"></li>
          <?php $menuHeader =  wp_get_nav_menu_items('Footer-middle'); ?>
          <?php foreach ($menuHeader as $item) :  ?>
            <li>
              <a href="<?= $item->url; ?>"><?= $item->title; ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
        <ul>
          <li class="title">Полезное</li>
          <?php $menuHeader =  wp_get_nav_menu_items('Footer-must'); ?>
          <?php foreach ($menuHeader as $item) :  ?>
            <li>
              <a href="<?= $item->url; ?>"><?= $item->title; ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
      </nav>
      <div class="contacts">
        <div>
          <p class="tel"><?= the_field('tel', 'option'); ?></p>
          <p class="tel"><?= the_field('tel_2', 'option'); ?></p>
          <a href="#" class="callback">оставить заявку</a>
          <?= the_field('adress', 'option'); ?>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="logo">
        <span><?= bloginfo('description'); ?></span>
      </div>
      <?= the_field('description_footer', 'option'); ?>
    </div>
  </div>
</footer>

</div>
<?php wp_footer(); ?>
</body>
</html>

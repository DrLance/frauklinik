<?php get_header(); ?>
<div class="main">

</div>
<?php
if (have_posts()) :
  while (have_posts()) :
    the_post();
  endwhile;

endif;
?>
</div>
<?php get_footer(); ?>

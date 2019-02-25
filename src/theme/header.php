<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
$slug = get_post_field( 'post_name', get_post() );

if(is_front_page() || $slug === 'students' || is_404()) {
  include 'header-home.php';
} elseif ($slug === 'biography') {
  include 'header-scroll.php';
}
else {
  include 'header-main.php';
}

?>
<!DOCTYPE html>
<html <?php //language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
  	<header class="container">
      <nav>
        <?php 
          wp_nav_menu(
            array(
              'menu' => 'Main Menu',
              'container' => '',
              'theme_location' => 'Primary Menu',
              'menu_class' => 'test',
              'items_wrap' => '<ul class="%2$s">%3$s</ul>')
          );
        ?>
      </nav>
	</header>
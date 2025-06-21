<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header id="headerTop" class="site-header container-fluid d-flex justify-content-between align-items-center py-3 px-4">
  <div id="unfolded" class="logo d-flex align-items-center">
    <span class="logo-text">ESGI</span>
    <span class="logo-dot">.</span>
  </div>

  <button class="burger d-flex flex-column gap-1 border-0 bg-transparent" id="burger" aria-label="Menu">
    <span class="bg-dark"></span>
    <span class="bg-dark"></span>
    <span class="bg-dark"></span>
  </button>
</header>

<nav class="mobile-menu container-fluid text-white text-end px-4 py-3 d-none" id="mobileMenu">
  <div class="menu-header text-start">
    <div class="logo d-flex align-items-center">
      <span class="logo-text text-white">ESGI</span><span class="logo-dot">.</span>
      <button id="menuClose" class="btn-close btn-close-white ms-auto" aria-label="Fermer le menu"></button>
    </div>
    <p class="subtitle">or try search</p>
  </div>
  <?php
  wp_nav_menu([
      'theme_location' => 'main-menu',
      'container' => false,
      'menu_class' => 'list-unstyled d-flex flex-column align-items-end gap-2',
      'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
      'walker' => new ESGI_Walker_Nav_Menu()
  ]);
  ?>
</nav>
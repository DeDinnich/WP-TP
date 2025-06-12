<?php
/*
Template Name: Page d’accueil ESGI
*/
?>

<?php esgi_get_partial('partials/header'); ?>

<main>
  <?php esgi_get_partial('components/home/banner'); ?>
  <?php esgi_get_partial('components/home/about'); ?>
  <?php esgi_get_partial('components/home/services'); ?>
  <?php esgi_get_partial('components/home/partners'); ?>
</main>

<?php esgi_get_partial('partials/footer'); ?>
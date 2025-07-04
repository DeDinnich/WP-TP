<?php
/**
 * Template Name: Blog Page
 */
?>

<?php esgi_get_partial('partials/header'); ?>

<main class="blog-page container my-5">
  <h1 class="mb-5">Blog.</h1>
  <div class="row">
    <div class="col-lg-4">
      <?php esgi_get_partial('components/blog/sidebar'); ?>
    </div>
    <div class="col-lg-8">
      <?php esgi_get_partial('components/blog/posts'); ?>
    </div>
  </div>
</main>

<?php esgi_get_partial('partials/footer'); ?>
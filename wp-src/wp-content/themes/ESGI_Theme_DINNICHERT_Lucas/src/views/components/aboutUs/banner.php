<section class="banner py-5">
  <div class="row">
    <div class="col-12">
      <h1 class="banner-title mb-5 ms-4">About Us</h1>
    </div>
    <div class="col-12 d-flex justify-content-end">
      <?php if ($image = get_theme_mod('esgi_about_banner_image')): ?>
        <img src="<?= esc_url($image) ?>" alt="About Banner" class="img-fluid w-75">
      <?php endif; ?>
    </div>
  </div>
</section>
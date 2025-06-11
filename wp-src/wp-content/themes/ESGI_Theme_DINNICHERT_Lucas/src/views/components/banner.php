<section class="banner py-5">
  <div class="row">
    <div class="col-12">
      <h1 class="banner-title mb-5 ms-4">A really professional structure<br>for all your events!</h1>
    </div>
    <div class="col-12 d-flex justify-content-end">
      <?php
      $banner_img = get_theme_mod('esgi_banner_image');
      if ($banner_img): ?>
        <img src="<?= esc_url($banner_img); ?>" class="img-fluid w-75 banner-img mt-5" alt="Banner">
      <?php endif; ?>
    </div>
  </div>
</section>
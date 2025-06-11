<section class="services py-5">
  <h2 class="services-title ms-4 mb-5">Our Services</h2>
  <div class="row align-items-center g-4">
    <div class="col-md-6 mt-0">
      <?php if ($img1 = get_theme_mod('esgi_service_image_left')): ?>
        <img src="<?= esc_url($img1); ?>" class="img-fluid w-100" alt="Service Left">
      <?php endif; ?>
    </div>
    <div class="col-md-3 text-center">
      <p class="service-label">Private Parties</p>
    </div>
    <div class="col-md-3 mt-0">
      <?php if ($img2 = get_theme_mod('esgi_service_image_right')): ?>
        <img src="<?= esc_url($img2); ?>" class="img-fluid w-100" alt="Service Right">
      <?php endif; ?>
    </div>
  </div>
</section>
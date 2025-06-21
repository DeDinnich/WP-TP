<section class="partners py-5">
  <h2 class="partners-title ms-4 mb-5">Our Partners</h2>
  <div class="mx-auto ms-3 row row-cols-2 row-cols-md-6 g-3 text-center">
    <?php for ($i = 1; $i <= 6; $i++): ?>
      <?php if ($logo = get_theme_mod("esgi_partner_logo_$i")): ?>
        <div class="col d-flex align-items-center justify-content-center">
          <img src="<?= esc_url($logo); ?>" class="img-fluid partner-logo" alt="Partner <?= $i ?>" style="max-height: 80px; object-fit: contain; margin: 0 10px;">
        </div>
      <?php endif; ?>
    <?php endfor; ?>
  </div>
</section>
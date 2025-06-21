<section class="partners py-5">
  <h2 class="partners-title text-start ms-4 mb-5">Our Partners</h2>
  <div class="row row-cols-2 row-cols-md-6 g-3 text-center">
    <?php for ($i = 1; $i <= 6; $i++): ?>
      <?php if ($logo = get_theme_mod("esgi_partner_logo_$i")): ?>
        <div class="col">
          <img src="<?= esc_url($logo); ?>" class="img-fluid partner-logo" alt="Partner <?= $i ?>">
        </div>
      <?php endif; ?>
    <?php endfor; ?>
  </div>
</section>
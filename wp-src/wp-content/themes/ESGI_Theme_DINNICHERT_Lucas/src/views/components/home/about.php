<section class="about py-5">
  <div class="row mb-5">
    <div class="col-12">
      <h2 class="about-title text-start">About Us</h2>
      <p class="about-subtitle text-start">
        <?= esc_html(get_theme_mod('esgi_about_subtitle', '')); ?>
      </p>
    </div>
  </div>

  <div class="row align-items-center">
    <div class="col-md-5 mb-4 mb-md-0">
      <?php if ($img = get_theme_mod('esgi_about_image')): ?>
        <img src="<?= esc_url($img); ?>" alt="About" class="img-fluid w-100" />
      <?php endif; ?>
    </div>

    <div class="col-md-7 ps-5">
      <?php for ($i = 1; $i <= 3; $i++): ?>
        <div class="about-block mb-4">
          <h3 class="about-block-title"><?= esc_html(get_theme_mod("esgi_about_title_$i", '')); ?></h3>
          <p class="about-block-text"><?= esc_html(get_theme_mod("esgi_about_text_$i", '')); ?></p>
        </div>
      <?php endfor; ?>
    </div>
  </div>
</section>
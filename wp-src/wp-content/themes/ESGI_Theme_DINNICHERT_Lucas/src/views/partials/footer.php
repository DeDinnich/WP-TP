<footer class="footer bg-dark-blue text-white pt-5">
  <div class="container">

    <!-- Ligne 1 : Logo + Manager + CEO -->
    <div class="row align-items-start mb-4">
      <div class="col-md-8 mb-4 mb-md-0">
        <h2 class="footer-logo">ESGI<span class="logo-dot">.</span></h2>
      </div>

      <div class="col-md-2">
        <h6 class="fw-bold">Manager</h6>
        <p class="mb-1"><?= esc_html(get_theme_mod('esgi_footer_manager_phone', '')) ?></p>
        <p class="mb-0"><?= esc_html(get_theme_mod('esgi_footer_manager_email', '')) ?></p>
      </div>

      <div class="col-md-2">
        <h6 class="fw-bold">CEO</h6>
        <p class="mb-1"><?= esc_html(get_theme_mod('esgi_footer_ceo_phone', '')) ?></p>
        <p class="mb-0"><?= esc_html(get_theme_mod('esgi_footer_ceo_email', '')) ?></p>
      </div>
    </div>

    <!-- Ligne 2 : Copyright + Réseaux -->
    <div class="row align-items-center border-top border-light pt-3">
      <div class="col-md-6 text-start">
        <small>2022 Figma Template by ESGI</small>
      </div>
      <div class="col-md-6 text-end">
        <?php if ($linkedin = get_theme_mod('esgi_footer_linkedin')): ?>
          <a href="<?= esc_url($linkedin); ?>" class="text-white me-3" target="_blank" aria-label="LinkedIn">
            <i class="bi bi-linkedin fs-5"></i>
          </a>
        <?php endif; ?>
        <?php if ($facebook = get_theme_mod('esgi_footer_facebook')): ?>
          <a href="<?= esc_url($facebook); ?>" class="text-white" target="_blank" aria-label="Facebook">
            <i class="bi bi-facebook fs-5"></i>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
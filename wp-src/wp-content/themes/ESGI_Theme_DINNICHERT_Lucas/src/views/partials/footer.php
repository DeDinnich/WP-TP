<footer class="footer bg-dark-blue text-white pt-5">
  <div class="container">

    <!-- Ligne 1 : Logo + Manager + CEO -->
    <div class="row align-items-start mb-4">
      <div class="col-md-8 mb-4 mb-md-0">
        <h2 class="footer-logo">ESGI<span class="logo-dot">.</span></h2>
      </div>

      <div class="col-md-2 text-end">
        <h6 class="fw-bold text-white">Manager</h6>
        <p class="mb-1"><?= esc_html(get_theme_mod('esgi_footer_manager_phone', '')) ?></p>
        <p class="mb-0"><?= esc_html(get_theme_mod('esgi_footer_manager_email', '')) ?></p>
      </div>

      <div class="col-md-2 text-end">
        <h6 class="fw-bold text-white">CEO</h6>
        <p class="mb-1"><?= esc_html(get_theme_mod('esgi_footer_ceo_phone', '')) ?></p>
        <p class="mb-0"><?= esc_html(get_theme_mod('esgi_footer_ceo_email', '')) ?></p>
      </div>
    </div>

    <!-- Ligne 2 : Copyright + Réseaux -->
    <div class="row align-items-center pt-3">
      <div class="col-md-6 text-start mb-3">
        <small>2022 Figma Template by ESGI</small>
      </div>
      <div class="col-md-6 text-end mb-3">
        <?php if ($linkedin = get_theme_mod('esgi_footer_linkedin')): ?>
          <a href="<?= esc_url($linkedin); ?>" class="text-white me-3" target="_blank" aria-label="LinkedIn">
            <?php if ($icon = get_theme_mod('esgi_footer_linkedin_icon')): ?>
              <img src="<?= esc_url($icon); ?>" alt="LinkedIn" style="height: 24px;">
            <?php else: ?>
              <i class="bi bi-linkedin fs-5"></i>
            <?php endif; ?>
          </a>
        <?php endif; ?>

        <?php if ($facebook = get_theme_mod('esgi_footer_facebook')): ?>
          <a href="<?= esc_url($facebook); ?>" class="text-white" target="_blank" aria-label="Facebook">
            <?php if ($icon = get_theme_mod('esgi_footer_facebook_icon')): ?>
              <img src="<?= esc_url($icon); ?>" alt="Facebook" style="height: 24px;">
            <?php else: ?>
              <i class="bi bi-facebook fs-5"></i>
            <?php endif; ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
<section class="our-team container my-5">
    <h2 class="text-start mb-5">Our Team</h2>
    <div class="row g-4">
        <?php for ($i = 1; $i <= 4; $i++) : 
            $name = get_theme_mod("esgi_team_member_{$i}_name");
            $email = get_theme_mod("esgi_team_member_{$i}_email");
            $phone = get_theme_mod("esgi_team_member_{$i}_phone");
            $image = get_theme_mod("esgi_team_member_{$i}_image");
        ?>
            <?php if ($name || $email || $phone || $image) : ?>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="team-card text-start">
                        <?php if ($image) : ?>
                            <div class="team-img-wrapper mb-3">
                                <img src="<?= esc_url($image); ?>"
                                     alt="<?= esc_attr($name ?: 'Team member'); ?>"
                                     class="img-fluid rounded"
                                     style="width: 100%; aspect-ratio: 3/4; object-fit: cover;">
                            </div>
                        <?php endif; ?>

                        <?php if ($name) : ?>
                            <h5 class="mb-1"><?= esc_html($name) ?></h5>
                        <?php endif; ?>

                        <?php if ($email) : ?>
                            <p class="mb-0">
                                <a href="mailto:<?= esc_attr($email) ?>" class="text-decoration-none text-dark">
                                    <?= esc_html($email) ?>
                                </a>
                            </p>
                        <?php endif; ?>

                        <?php if ($phone) : ?>
                            <p class="mb-0"><?= esc_html($phone) ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endfor; ?>
    </div>
</section>
<section class="services-parties mt-5 mx-0 px-0">
    <?php
    $title = get_theme_mod('esgi_services_parties_title');
    $text = get_theme_mod('esgi_services_parties_text');
    $image = get_theme_mod('esgi_services_parties_image');
    ?>

    <?php if ($title) : ?>
        <h2 class="text-start mb-3 ms-4"><?= esc_html($title) ?></h2>
    <?php endif; ?>

    <?php if ($text) : ?>
        <p class="text-start mb-0 ms-4"><?= nl2br(esc_html($text)) ?></p>
    <?php endif; ?>

    <?php if ($image) : ?>
        <div class="text-center">
            <img src="<?= esc_url($image) ?>"
                 alt="<?= esc_attr($title ?: 'Illustration') ?>"
                 class="img-fluid" style="max-width: 100%; height: auto;">
        </div>
    <?php endif; ?>
</section>
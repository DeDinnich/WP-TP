<section class="contact-banner py-5">
<div class="row">
            <!-- Colonne gauche : titre + sous-titre -->
            <div class="col-md-12 text-start mb-5">
                <h1 class="fw-bold ms-4">Contacts.</h1>
                <p class="text-muted ms-4">
                    <?php echo get_theme_mod('contact_subtitle', 'A desire for a big big party or a very select congress? Contact us.'); ?>
                </p>
            </div>

            <!-- Colonne droite : 3 blocs info -->
            <div class="col-md-12 text-end mt-5 pe-5">
                <div class="row">
                    <div class="col">
                        <h6 class="fw-bold">Location</h6>
                        <p>
                            <?php echo nl2br(get_theme_mod('contact_location', "242 Rue du Faubourg Saint-Antoine\n75020 Paris FRANCE")); ?>
                        </p>
                    </div>
                    <div class="col">
                        <h6 class="fw-bold">Manager</h6>
                        <p>
                            <?php echo get_theme_mod('contact_manager_phone', '+33 1 53 31 25 23'); ?><br>
                            <?php echo get_theme_mod('contact_manager_email', 'info@company.com'); ?>
                        </p>
                    </div>
                    <div class="col">
                        <h6 class="fw-bold">CEO</h6>
                        <p>
                            <?php echo get_theme_mod('contact_ceo_phone', '+33 1 53 31 25 25'); ?><br>
                            <?php echo get_theme_mod('contact_ceo_email', 'ceo@company.com'); ?>
                        </p>
                    </div>
                </div>
            </div>
            <!-- Image en dessous -->

            <div class="col-12 d-flex justify-content-end">
                <?php if ($image = get_theme_mod('contact_image')): ?>
                    <img src="<?php echo esc_url($image); ?>" alt="Contact Image" class="img-fluid w-75 banner-img mt-5">
                <?php endif; ?>
            </div>
        </div>
</section>
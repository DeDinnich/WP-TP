<?php

// 1. Support de fonctionnalités natives
function esgi_theme_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'esgi_theme_setup');

// 2. Enqueue CSS & JS
function esgi_enqueue_assets() {
    $theme_uri = get_template_directory_uri();

    wp_enqueue_style('main-style', $theme_uri . '/style.css', [], '1.0');

    // Bootstrap & composants
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', [], null);
    wp_enqueue_style('header-style', $theme_uri . '/src/css/partials/header.css', [], '1.0');
    wp_enqueue_style('footer-style', $theme_uri . '/src/css/partials/footer.css', [], '1.0');
    wp_enqueue_style('about-style', $theme_uri . '/src/css/components/about.css', [], '1.0');
    wp_enqueue_style('banner-style', $theme_uri . '/src/css/components/banner.css', [], '1.0');
    wp_enqueue_style('service-style', $theme_uri . '/src/css/components/service.css', [], '1.0');

    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', [], null, true);
    wp_enqueue_script('header-script', $theme_uri . '/src/js/partials/header.js', [], '1.0', true);
}
add_action('wp_enqueue_scripts', 'esgi_enqueue_assets');

// 3. Fonction helper pour inclure les partials
function esgi_get_partial($partial) {
    $base_path = get_template_directory() . '/src/views/';
    $full_path = $base_path . ltrim($partial, '/') . '.php';

    if (file_exists($full_path)) {
        include $full_path;
    } else {
        echo "<!-- Fichier $partial introuvable -->";
    }
}

// 4. Menu administrable
function esgi_register_menus() {
    register_nav_menu('main-menu', __('Menu principal', 'esgi'));
}
add_action('after_setup_theme', 'esgi_register_menus');

// 5. Walker personnalisé pour gérer la classe .active
class ESGI_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {
        $classes = is_array($item->classes) ? $item->classes : [];
        $active = in_array('current-menu-item', $classes) ? ' class="active"' : '';
        $output .= '<li' . $active . '><a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a></li>';
    }
}

// 6. Customizer : bannière + about
function esgi_customize_register($wp_customize) {

    // === SECTION BANNIÈRE ===
    $wp_customize->add_section('esgi_banner_section', [
        'title' => __('Bannière d’accueil', 'esgi'),
        'priority' => 10,
    ]);

    // Image bannière
    $wp_customize->add_setting('esgi_banner_image', [
        'default' => '',
        'transport' => 'refresh',
    ]);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'esgi_banner_image_control', [
        'label' => __('Image de la bannière', 'esgi'),
        'section' => 'esgi_banner_section',
        'settings' => 'esgi_banner_image',
    ]));

    // === SECTION ABOUT US ===
    $wp_customize->add_section('esgi_about_section', [
        'title' => __('Section "About Us"', 'esgi'),
        'priority' => 20,
    ]);

    // Sous-titre
    $wp_customize->add_setting('esgi_about_subtitle', [
        'default' => '',
        'transport' => 'refresh',
    ]);
    $wp_customize->add_control('esgi_about_subtitle_control', [
        'label' => __('Sous-titre', 'esgi'),
        'section' => 'esgi_about_section',
        'settings' => 'esgi_about_subtitle',
        'type' => 'textarea',
    ]);

    // Image à gauche
    $wp_customize->add_setting('esgi_about_image', [
        'default' => '',
        'transport' => 'refresh',
    ]);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'esgi_about_image_control', [
        'label' => __('Image de gauche', 'esgi'),
        'section' => 'esgi_about_section',
        'settings' => 'esgi_about_image',
    ]));

    // 3 blocs texte
    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("esgi_about_title_$i", [
            'default' => '',
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control("esgi_about_title_{$i}_control", [
            'label' => __("Bloc $i – Titre", 'esgi'),
            'section' => 'esgi_about_section',
            'settings' => "esgi_about_title_$i",
            'type' => 'text',
        ]);

        $wp_customize->add_setting("esgi_about_text_$i", [
            'default' => '',
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control("esgi_about_text_{$i}_control", [
            'label' => __("Bloc $i – Texte", 'esgi'),
            'section' => 'esgi_about_section',
            'settings' => "esgi_about_text_$i",
            'type' => 'textarea',
        ]);
    }

    // SECTION SERVICES
    $wp_customize->add_section('esgi_services_section', [
        'title' => __('Section "Our Services"', 'esgi'),
        'priority' => 30,
    ]);

    $wp_customize->add_setting('esgi_service_image_left', ['default' => '', 'transport' => 'refresh']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'esgi_service_image_left_control', [
        'label' => __('Image de gauche', 'esgi'),
        'section' => 'esgi_services_section',
        'settings' => 'esgi_service_image_left',
    ]));

    $wp_customize->add_setting('esgi_service_image_right', ['default' => '', 'transport' => 'refresh']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'esgi_service_image_right_control', [
        'label' => __('Image de droite', 'esgi'),
        'section' => 'esgi_services_section',
        'settings' => 'esgi_service_image_right',
    ]));

    // SECTION PARTNERS
    $wp_customize->add_section('esgi_partners_section', [
        'title' => __('Section "Our Partners"', 'esgi'),
        'priority' => 40,
    ]);

    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting("esgi_partner_logo_$i", ['default' => '', 'transport' => 'refresh']);
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "esgi_partner_logo_{$i}_control", [
            'label' => __("Logo partenaire $i", 'esgi'),
            'section' => 'esgi_partners_section',
            'settings' => "esgi_partner_logo_$i",
        ]));
    }

    // === SECTION FOOTER ===
    $wp_customize->add_section('esgi_footer_section', [
        'title' => __('Pied de page', 'esgi'),
        'priority' => 50,
    ]);

    // Tel + mail Manager
    $wp_customize->add_setting('esgi_footer_manager_phone', ['default' => '', 'transport' => 'refresh']);
    $wp_customize->add_control('esgi_footer_manager_phone_control', [
        'label' => __('Téléphone Manager', 'esgi'),
        'section' => 'esgi_footer_section',
        'settings' => 'esgi_footer_manager_phone',
        'type' => 'text',
        'priority' => 10,
    ]);

    $wp_customize->add_setting('esgi_footer_manager_email', ['default' => '', 'transport' => 'refresh']);
    $wp_customize->add_control('esgi_footer_manager_email_control', [
        'label' => __('Email Manager', 'esgi'),
        'section' => 'esgi_footer_section',
        'settings' => 'esgi_footer_manager_email',
        'type' => 'text',
        'priority' => 11,
    ]);

    // Tel + mail CEO
    $wp_customize->add_setting('esgi_footer_ceo_phone', ['default' => '', 'transport' => 'refresh']);
    $wp_customize->add_control('esgi_footer_ceo_phone_control', [
        'label' => __('Téléphone CEO', 'esgi'),
        'section' => 'esgi_footer_section',
        'settings' => 'esgi_footer_ceo_phone',
        'type' => 'text',
        'priority' => 20,
    ]);

    $wp_customize->add_setting('esgi_footer_ceo_email', ['default' => '', 'transport' => 'refresh']);
    $wp_customize->add_control('esgi_footer_ceo_email_control', [
        'label' => __('Email CEO', 'esgi'),
        'section' => 'esgi_footer_section',
        'settings' => 'esgi_footer_ceo_email',
        'type' => 'text',
        'priority' => 21,
    ]);

    // Réseaux sociaux
    $wp_customize->add_setting('esgi_footer_linkedin', ['default' => '', 'transport' => 'refresh']);
    $wp_customize->add_control('esgi_footer_linkedin_control', [
        'label' => __('Lien LinkedIn', 'esgi'),
        'section' => 'esgi_footer_section',
        'settings' => 'esgi_footer_linkedin',
        'type' => 'url',
        'priority' => 30,
    ]);

    $wp_customize->add_setting('esgi_footer_facebook', ['default' => '', 'transport' => 'refresh']);
    $wp_customize->add_control('esgi_footer_facebook_control', [
        'label' => __('Lien Facebook', 'esgi'),
        'section' => 'esgi_footer_section',
        'settings' => 'esgi_footer_facebook',
        'type' => 'url',
        'priority' => 31,
    ]);

    // Image de la bannière "About Us"
    $wp_customize->add_setting('esgi_about_banner_image', [
        'default' => '',
        'transport' => 'refresh',
    ]);

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'esgi_about_banner_image_control', [
        'label' => __('Image bannière "About Us"', 'esgi'),
        'section' => 'esgi_about_section',
        'settings' => 'esgi_about_banner_image',
    ]));

    // === SECTION OUR TEAM ===
    $wp_customize->add_section('esgi_team_section', [
        'title' => __('Section "Our Team"', 'esgi'),
        'priority' => 60,
    ]);

    for ($i = 1; $i <= 4; $i++) {
        // Nom
        $wp_customize->add_setting("esgi_team_member_{$i}_name", [
            'default' => '',
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control("esgi_team_member_{$i}_name_control", [
            'label' => __("Membre $i – Nom", 'esgi'),
            'section' => 'esgi_team_section',
            'settings' => "esgi_team_member_{$i}_name",
            'type' => 'text',
            'priority' => $i * 10 + 1,
        ]);

        // Email
        $wp_customize->add_setting("esgi_team_member_{$i}_email", [
            'default' => '',
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control("esgi_team_member_{$i}_email_control", [
            'label' => __("Membre $i – Email", 'esgi'),
            'section' => 'esgi_team_section',
            'settings' => "esgi_team_member_{$i}_email",
            'type' => 'text',
            'priority' => $i * 10 + 2,
        ]);

        // Téléphone
        $wp_customize->add_setting("esgi_team_member_{$i}_phone", [
            'default' => '',
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control("esgi_team_member_{$i}_phone_control", [
            'label' => __("Membre $i – Téléphone", 'esgi'),
            'section' => 'esgi_team_section',
            'settings' => "esgi_team_member_{$i}_phone",
            'type' => 'text',
            'priority' => $i * 10 + 3,
        ]);

        // Image
        $wp_customize->add_setting("esgi_team_member_{$i}_image", [
            'default' => '',
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "esgi_team_member_{$i}_image_control", [
            'label' => __("Membre $i – Image", 'esgi'),
            'section' => 'esgi_team_section',
            'settings' => "esgi_team_member_{$i}_image",
            'priority' => $i * 10 + 4,
        ]));
    }

    // === SECTION SERVICES – PARTIES ===
    $wp_customize->add_section('esgi_services_parties_section', [
        'title' => __('Section Services – Parties', 'esgi'),
        'priority' => 70,
    ]);

    $wp_customize->add_setting('esgi_services_parties_title', ['default' => '', 'transport' => 'refresh']);
    $wp_customize->add_control('esgi_services_parties_title_control', [
        'label' => __('Titre', 'esgi'),
        'section' => 'esgi_services_parties_section',
        'settings' => 'esgi_services_parties_title',
        'type' => 'text',
        'priority' => 10,
    ]);

    $wp_customize->add_setting('esgi_services_parties_text', ['default' => '', 'transport' => 'refresh']);
    $wp_customize->add_control('esgi_services_parties_text_control', [
        'label' => __('Paragraphe', 'esgi'),
        'section' => 'esgi_services_parties_section',
        'settings' => 'esgi_services_parties_text',
        'type' => 'textarea',
        'priority' => 20,
    ]);

    $wp_customize->add_setting('esgi_services_parties_image', ['default' => '', 'transport' => 'refresh']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'esgi_services_parties_image_control', [
        'label' => __('Image illustrant la section', 'esgi'),
        'section' => 'esgi_services_parties_section',
        'settings' => 'esgi_services_parties_image',
        'priority' => 30,
    ]));

    // === SECTION CONTACT PAGE ===
    $wp_customize->add_section('esgi_contact_section', [
        'title' => __('Page Contact', 'esgi'),
        'priority' => 80,
    ]);

    $wp_customize->add_setting('contact_subtitle', ['default' => '', 'transport' => 'refresh']);
    $wp_customize->add_control('contact_subtitle_control', [
        'label' => __('Sous-titre', 'esgi'),
        'section' => 'esgi_contact_section',
        'settings' => 'contact_subtitle',
        'type' => 'textarea',
        'priority' => 10,
    ]);

    $wp_customize->add_setting('contact_location', ['default' => '', 'transport' => 'refresh']);
    $wp_customize->add_control('contact_location_control', [
        'label' => __('Adresse', 'esgi'),
        'section' => 'esgi_contact_section',
        'settings' => 'contact_location',
        'type' => 'textarea',
        'priority' => 20,
    ]);

    $wp_customize->add_setting('contact_manager_phone', ['default' => '', 'transport' => 'refresh']);
    $wp_customize->add_control('contact_manager_phone_control', [
        'label' => __('Téléphone Manager', 'esgi'),
        'section' => 'esgi_contact_section',
        'settings' => 'contact_manager_phone',
        'type' => 'text',
        'priority' => 30,
    ]);

    $wp_customize->add_setting('contact_manager_email', ['default' => '', 'transport' => 'refresh']);
    $wp_customize->add_control('contact_manager_email_control', [
        'label' => __('Email Manager', 'esgi'),
        'section' => 'esgi_contact_section',
        'settings' => 'contact_manager_email',
        'type' => 'text',
        'priority' => 31,
    ]);

    $wp_customize->add_setting('contact_ceo_phone', ['default' => '', 'transport' => 'refresh']);
    $wp_customize->add_control('contact_ceo_phone_control', [
        'label' => __('Téléphone CEO', 'esgi'),
        'section' => 'esgi_contact_section',
        'settings' => 'contact_ceo_phone',
        'type' => 'text',
        'priority' => 40,
    ]);

    $wp_customize->add_setting('contact_ceo_email', ['default' => '', 'transport' => 'refresh']);
    $wp_customize->add_control('contact_ceo_email_control', [
        'label' => __('Email CEO', 'esgi'),
        'section' => 'esgi_contact_section',
        'settings' => 'contact_ceo_email',
        'type' => 'text',
        'priority' => 41,
    ]);

    $wp_customize->add_setting('contact_image', ['default' => '', 'transport' => 'refresh']);
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'contact_image_control', [
        'label' => __('Image illustrant la section', 'esgi'),
        'section' => 'esgi_contact_section',
        'settings' => 'contact_image',
        'priority' => 50,
    ]));
}
add_action('customize_register', 'esgi_customize_register');
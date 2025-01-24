<?php

function codelibry_customize_register($wp_customize) {
    // Define sections, settings, and controls for colors
    $colors = [
        'neutral-000' => 'Neutral 000',
        'neutral-100' => 'Neutral 100',
        'neutral-200' => 'Neutral 200',
        'neutral-300' => 'Neutral 300',
        'neutral-400' => 'Neutral 400',
        'neutral-500' => 'Neutral 500',
        'neutral-600' => 'Neutral 600',
        'neutral-700' => 'Neutral 700',
        'neutral-800' => 'Neutral 800',
        'neutral-900' => 'Neutral 900',
        'neutral-1000' => 'Neutral 1000',
        'accent-100' => 'Accent 100',
        'accent-200' => 'Accent 200',
        'accent-300' => 'Accent 300',
        'accent-400' => 'Accent 400',
        'accent-500' => 'Accent 500',
        'accent-600' => 'Accent 600',
        'accent-700' => 'Accent 700',
        'accent-800' => 'Accent 800',
        'accent-900' => 'Accent 900',
        'primary-100' => 'Primary 100',
        'primary-200' => 'Primary 200',
        'primary-300' => 'Primary 300',
        'primary-400' => 'Primary 400',
        'primary-500' => 'Primary 500',
        'primary-600' => 'Primary 600',
        'primary-700' => 'Primary 700',
        'primary-800' => 'Primary 800',
        'primary-900' => 'Primary 900',
    ];

    // Font Sizes
    $font_sizes = [
        'fs-900' => 'Font Size 900',
        'fs-800' => 'Font Size 800',
        'fs-700' => 'Font Size 700',
        'fs-600' => 'Font Size 600',
        'fs-500' => 'Font Size 500',
        'fs-400' => 'Font Size 400',
        'fs-300' => 'Font Size 300',
        'fs-200' => 'Font Size 200',
    ];

    // Add a section for colors
    $wp_customize->add_section('theme_colors', array(
        'title'    => __('Theme Colors', 'codelibry'),
        'priority' => 30,
    ));

    // Add settings and controls for each color
    foreach ($colors as $color_id => $color_label) {
        $wp_customize->add_setting($color_id, array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $color_id, array(
            'label'    => __($color_label, 'codelibry'),
            'section'  => 'theme_colors',
            'settings' => $color_id,
        )));
    }

    // Add a section for font sizes
    $wp_customize->add_section('theme_font_sizes', array(
        'title'    => __('Theme Font Sizes', 'codelibry'),
        'priority' => 31,
    ));

    // Add settings and controls for each font size
    foreach ($font_sizes as $size_id => $size_label) {
        $wp_customize->add_setting($size_id, array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control($size_id, array(
            'label'    => __($size_label, 'codelibry'),
            'section'  => 'theme_font_sizes',
            'settings' => $size_id,
            'type'     => 'text',
        ));
    }
}
add_action('customize_register', 'codelibry_customize_register');


function codelibry_customizer_css() {
    ?>
    <style type="text/css">
        :root {
            --neutral-000: <?php echo get_theme_mod('neutral-000', 'white'); ?>;
            --neutral-100: <?php echo get_theme_mod('neutral-100', '#f2f2f2'); ?>;
            --neutral-200: <?php echo get_theme_mod('neutral-200', '#d2d2d2'); ?>;
            --neutral-300: <?php echo get_theme_mod('neutral-300', '#b3b3b3'); ?>;
            --neutral-400: <?php echo get_theme_mod('neutral-400', '#999'); ?>;
            --neutral-500: <?php echo get_theme_mod('neutral-500', 'gray'); ?>;
            --neutral-600: <?php echo get_theme_mod('neutral-600', '#666'); ?>;
            --neutral-700: <?php echo get_theme_mod('neutral-700', '#4d4d4d'); ?>;
            --neutral-800: <?php echo get_theme_mod('neutral-800', '#2d2d2d'); ?>;
            --neutral-900: <?php echo get_theme_mod('neutral-900', '#131313'); ?>;
            --neutral-1000: <?php echo get_theme_mod('neutral-1000', 'black'); ?>;
            --accent-100: <?php echo get_theme_mod('accent-100', '#ffe6ef'); ?>;
            --accent-200: <?php echo get_theme_mod('accent-200', '#ffb3d3'); ?>;
            --accent-300: <?php echo get_theme_mod('accent-300', '#ff80b3'); ?>;
            --accent-400: <?php echo get_theme_mod('accent-400', '#f69'); ?>;
            --accent-500: <?php echo get_theme_mod('accent-500', '#ff4d80'); ?>;
            --accent-600: <?php echo get_theme_mod('accent-600', '#cc3d66'); ?>;
            --accent-700: <?php echo get_theme_mod('accent-700', '#992e4d'); ?>;
            --accent-800: <?php echo get_theme_mod('accent-800', '#661c2d'); ?>;
            --accent-900: <?php echo get_theme_mod('accent-900', '#330c17'); ?>;
            --primary-100: <?php echo get_theme_mod('primary-100', '#e6efff'); ?>;
            --primary-200: <?php echo get_theme_mod('primary-200', '#b3d3ff'); ?>;
            --primary-300: <?php echo get_theme_mod('primary-300', '#80b3ff'); ?>;
            --primary-400: <?php echo get_theme_mod('primary-400', '#69f'); ?>;
            --primary-500: <?php echo get_theme_mod('primary-500', '#4d80ff'); ?>;
            --primary-600: <?php echo get_theme_mod('primary-600', '#3d66cc'); ?>;
            --primary-700: <?php echo get_theme_mod('primary-700', '#2e4d99'); ?>;
            --primary-800: <?php echo get_theme_mod('primary-800', '#1c2d66'); ?>;
            --primary-900: <?php echo get_theme_mod('primary-900', '#0c1333'); ?>;
            --fs-900: <?php echo get_theme_mod('fs-900', '3.75rem'); ?>;
            --fs-800: <?php echo get_theme_mod('fs-800', '2.25rem'); ?>;
            --fs-700: <?php echo get_theme_mod('fs-700', '1.75rem'); ?>;
            --fs-600: <?php echo get_theme_mod('fs-600', '1.125rem'); ?>;
            --fs-500: <?php echo get_theme_mod('fs-500', '1.125rem'); ?>;
            --fs-400: <?php echo get_theme_mod('fs-400', '1rem'); ?>;
            --fs-300: <?php echo get_theme_mod('fs-300', '.875rem'); ?>;
            --fs-200: <?php echo get_theme_mod('fs-200', '.75rem'); ?>;
        }
    </style>
    <?php
}

add_action('wp_head', 'codelibry_customizer_css');

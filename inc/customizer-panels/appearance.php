<?php
$wp_customize->add_panel( 'sterling_appearance_panel', array (
    'title'                 => __( 'Appearance', 'sterling' ),
    'description'           => __( 'Customize your site colors, fonts and other appearance settings', 'sterling' ),
    'priority'              => 2
) );
        // ---------------------------------------------
    // Fonts
    // ---------------------------------------------
    $wp_customize->add_section( 'sterling_fonts_section', array(
        'title'                 => __( 'Fonts', 'sterling'),
        'description'           => __( 'Customize the fonts in use on your header', 'sterling' ),
        'panel'                 => 'sterling_appearance_panel'
    ) );
        // Primary Font Family
        $wp_customize->add_setting( 'sterling_font_primary', array (
            'default'               => 'Trirong, serif',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sterling_sanitize_font'
        ) );
        $wp_customize->add_control( 'sterling_font_primary', array(
            'type'                  => 'select',
            'section'               => 'sterling_fonts_section',
            'label'                 => __( 'Header Font', 'sterling' ),
            'description'           => __( 'Select the header font of the theme', 'sterling' ),
            'choices'               => sterling_fonts(),
        ) );
        // Body Font Family
        $wp_customize->add_setting( 'sterling_font_body', array (
            'default'               => 'Trirong, serif',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sterling_sanitize_font'
        ) );
        $wp_customize->add_control( 'sterling_font_body', array(
            'type'                  => 'select',
            'section'               => 'sterling_fonts_section',
            'label'                 => __( 'Body Font', 'sterling' ),
            'description'           => __( 'Select the body font of the theme', 'sterling' ),
            'choices'               => sterling_fonts(),
        ) );
       // ---------------------------------------------
    // Skins
    // ---------------------------------------------
    $wp_customize->add_section( 'sterling_skins_section', array(
        'title'                 => __( 'Skins', 'sterling'),
        'description'           => __( 'Customize the colors in use on your site', 'sterling' ),
        'panel'                 => 'sterling_appearance_panel'
    ) );
        // Color Choice Family
        $wp_customize->add_setting( 'sterling_skins_color', array (
            'default'               => '#ccc',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field'
        ) );
        $wp_customize->add_control( 'sterling_skins_color', array(
            'type'                  => 'select',
            'section'               => 'sterling_skins_section',
            'label'                 => __( 'Site Skin Color', 'sterling' ),
            'description'           => __( 'Select the color of the theme', 'sterling' ),
            'choices'               => array(
                '#e5bc6e' => 'Gold',
                '#e8280b' => 'Red',
            ),
        ) );
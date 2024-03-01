<?php

function custom_customize_register($wp_customize)
{


    $wp_customize->add_section('custom_footer_options', array(
        'title' => 'Footer Options',
        'description' => 'You can change footer here'
    ));

    $wp_customize->add_setting('custom_footer_bg', array(
        'default' => 'dark',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('custom_footer_bg', array(
        'type' => 'select',
        'label' => 'Background Color',
        'choices' => array(
            'light' => 'Light',
            'dark' => 'Dark'
        ),
        'section' => 'custom_footer_options'
    ));

    $wp_customize->add_setting('custom_theme_footer_bg', array(
        'default' => '#ffc107',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize, 'custom_theme_footer_bg', array(
            'label' => 'Choose Color Footer Header',
            'section' => 'custom_footer_options',
            'settings' => 'custom_theme_footer_bg'
        ))
    );

    $wp_customize->add_setting('custom_theme_footer_text', array(
        'default' => '#ffffff',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize, 'custom_theme_footer_text', array(
            'label' => 'Choose Color Footer Text',
            'section' => 'custom_footer_options',
            'settings' => 'custom_theme_footer_text'
        ))
    );

    $wp_customize->add_setting('custom_footer_widget_count', array(
        'default' => '3',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('custom_footer_widget_count', array(
        'type' => 'select',
        'label' => 'Footer Widget Count',
        'choices' => array(
            '1' => '1 Widget',
            '2' => '2 Widget',
            '3' => '3 Widget',
        ),

        'section' => 'custom_footer_options'
    ));

    $wp_customize->add_section('custom_gen_options', array(
        'title' => 'General Settings',
        'description' => 'You can change the navigation options here'

    ));

    

    $wp_customize->add_setting('custom_logo_placement', array(
        'default' => 'top',
        'sanitize_callback' => 'sanitize_text_field'
    ));


    $wp_customize->add_control('custom_logo_placement', array(
        'type' => 'select',
        'label' => 'Logo Placement',
        'choices' => array(
            'top' => 'Top',
            'left' => 'Left'
        ),
        'section' => 'custom_gen_options'
    ));

    
    $wp_customize->add_setting('custom_gen_col_count', array(
        'default' => '3',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('custom_gen_col_count', array(
        'type' => 'select',
        'label' => 'Column Count',
        'choices' => array(
            '2' => '2 Columns',
            '4' => '4 Columns',
        ),

        'section' => 'custom_gen_options'
    ));


    $wp_customize->add_setting('custom_gen_sidebar', array(
        'default' => '1',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('custom_gen_sidebar', array(
        'type' => 'select',
        'label' => 'Select if a sidebar is required for the website.',
        'choices' => array(
            '1' => 'The sidebar is required',
            '2' => 'The sidebar is not needed',
        ),

        'section' => 'custom_gen_options'
    ));

    
   
    $wp_customize->add_section('custom_card_options', array(
        'title' => 'Blog Card Settings',
        'description' => 'You can change the card options here'

    ));

    $wp_customize->add_setting('custom_card_bg', array(
        'default' => '#1e73be',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize, 'custom_card_bg', array(
            'label' => 'Choose the Background colour of the Card',
            'section' => 'custom_card_options',
            'settings' => 'custom_card_bg'
        ))
    );


    $wp_customize->add_setting('custom_card_text', array(
        'default' => '#ffffff',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize, 'custom_card_text', array(
            'label' => 'Choose the colour of the Card Text',
            'section' => 'custom_card_options',
            'settings' => 'custom_card_text'
        ))
    );


    $wp_customize->add_setting('custom_button_bg', array(
        'default' => '#ffffff',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize, 'custom_button_bg', array(
            'label' => 'Choose the colour of the Buttons',
            'section' => 'custom_card_options',
            'settings' => 'custom_button_bg'
        ))
    );


    $wp_customize->add_setting('custom_button_text', array(
        'default' => '#0a0a0a',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize, 'custom_button_text', array(
            'label' => 'Choose the colour of the Buttons Text',
            'section' => 'custom_card_options',
            'settings' => 'custom_button_text'
        ))
    );

    $wp_customize->add_setting('custom_button_hover', array(
        'default' => '#0a0a0a',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize, 'custom_button_hover', array(
            'label' => 'Choose the colour of the Buttons whilst on hover',
            'section' => 'custom_card_options',
            'settings' => 'custom_button_hover'
        ))
    );

    $wp_customize->add_setting('custom_buttonText_hover', array(
        'default' => '#0a0a0a',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize, 'custom_buttonText_hover', array(
            'label' => 'Choose the colour of the Button Text whilst on hover',
            'section' => 'custom_card_options',
            'settings' => 'custom_buttonText_hover'
        ))
    );

}

add_action("customize_register", "custom_customize_register");

?>
<?php

function custom_customize_register($wp_customize)
{


    $wp_customize->add_section('custom_footer_options', array(
        'title' => 'Footer Options',
        'description' => 'You can change footer here'
    )
    );


    $wp_customize->add_setting('custom_footer_widget_count', array(
        'default' => '3',
        'sanitize_callback' => 'sanitize_text_field'
    )
    );

    $wp_customize->add_control('custom_footer_widget_count', array(
        'type' => 'select',
        'label' => 'Footer Widget Count',
        'choices' => array(
            '1' => '1 Widget',
            '2' => '2 Widget',
            '3' => '3 Widget',
        ),

        'section' => 'custom_footer_options'
    )
    );



    $wp_customize->add_section('custom_gen_options', array(
        'title' => 'General Settings',
        'description' => 'You can change the navigation options here'
    )
    );



    $wp_customize->add_setting('custom_logo_placement', array(
        'default' => 'top',
        'sanitize_callback' => 'sanitize_text_field'
    )
    );


    $wp_customize->add_control('custom_logo_placement', array(
        'type' => 'select',
        'label' => 'Logo Placement',
        'choices' => array(
            'top' => 'Top',
            'left' => 'Left'
        ),
        'section' => 'custom_gen_options'
    )
    );


    $wp_customize->add_setting('custom_gen_col_count', array(
        'default' => '3',
        'sanitize_callback' => 'sanitize_text_field'
    )
    );

    $wp_customize->add_control('custom_gen_col_count', array(
        'type' => 'select',
        'label' => 'Column Count',
        'choices' => array(
            '2' => '2 Columns',
            '4' => '4 Columns',
        ),

        'section' => 'custom_gen_options'
    )
    );


    $wp_customize->add_setting('custom_gen_sidebar', array(
        'default' => '1',
        'sanitize_callback' => 'sanitize_text_field'
    )
    );

    $wp_customize->add_control('custom_gen_sidebar', array(
        'type' => 'select',
        'label' => 'Select if a sidebar is required for the website.',
        'choices' => array(
            '1' => 'The sidebar is required',
            '2' => 'The sidebar is not needed',
        ),

        'section' => 'custom_gen_options'
    )
    );

}

add_action("customize_register", "custom_customize_register");

?>
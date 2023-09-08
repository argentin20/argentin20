<?php
/**
 * Logo Width Customizer
 *
 * @package Dark Fusion Theme
*/

function dark_fusion_logo_width( $wp_customize )  {

    $wp_customize->add_setting( 'dark_fusion_logo_length',
        array(
            'default'           => 235,
            'transport'         => 'postMessage',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Dark_Fusion_Slider_Custom_Control( $wp_customize, 'dark_fusion_logo_length',
        array(
            'label'         => esc_html__( 'Logo Width', 'dark-fusion'  ),
            'priority'      => 10,
            'section'       => 'title_tagline',
            'input_attrs'   => array(
                'min'   => 0,
                'max'   => 500,
                'step'  => 1,
            ),
        )
    ));
}

add_action('customize_register', 'dark_fusion_logo_width');
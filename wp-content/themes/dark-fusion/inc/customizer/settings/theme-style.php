<?php
/**
 * Theme Style Customizer
 *
 * @package Dark Fusion Theme
*/

function dark_fusion_theme_style ( $wp_customize ) {

    /* ====================
    * Theme Layout 
    ==================== */
    /* Theme Style settings */
    $wp_customize->add_section( 'theme_style' , 
        array(
            'title'      => esc_html__('Theme Style Settings', 'dark-fusion' ),
            'priority'   => 110,
        )
    );

    /* ====================
    * Enable/disable custom color settings  
    ==================== */
    $wp_customize->add_setting('custom_color_enable', 
        array(
            'capability'        => 'edit_theme_options',
            'default'           => false,
            'sanitize_callback' => 'dark_fusion_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(new Dark_Fusion_Toggle_Control( $wp_customize,'custom_color_enable',
        array(
            'type'      =>  'toggle',
            'label'     =>  esc_html__('Enable custom color skin','dark-fusion' ),
            'section'   =>  'theme_style',
            'priority'  =>  2
        )
    ));

    
    /* ====================
    * Link color settings
    ==================== */
    $wp_customize->add_setting('link_color', 
        array(
            'capability'        => 'edit_theme_options',
            'default'           => '#3395a0',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'link_color', 
        array(
            'label'             => esc_html__( 'Skin Color', 'dark-fusion' ),
            'active_callback'   => 'dark_fusion_custom_color_callback',
            'section'           => 'theme_style',
            'setting'           => 'link_color',
            'priority'          =>  3,
        ) 
    ));  


    /* ====================
    * Theme Layout 
    ==================== */
    $wp_customize->add_setting( 'dark_fusion_layout_style', 
        array(
            'default'           => 'wide',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'dark_fusion_sanitize_select'
        )
    );
    $wp_customize->add_control(new dark_fusion_Style_Layout_Control($wp_customize, 'dark_fusion_layout_style',
        array(
            'label'     => esc_html__('Layout style', 'dark-fusion'),
            'section'   => 'theme_style',
            'type'      => 'radio',
            'priority'  =>  5,
            'choices'   => array(
                'wide'  => 'wide.png',
                'boxed' => 'boxed.png'
            )
        )
    ));

}

add_action( 'customize_register', 'dark_fusion_theme_style' );
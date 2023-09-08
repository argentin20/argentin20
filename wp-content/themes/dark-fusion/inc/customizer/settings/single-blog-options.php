<?php
/**
 * Single Blog Options Customizer Customizer
 *
 * @package Dark Fusion Theme
*/

function dark_fusion_single_blog_customizer($wp_customize) {

    $wp_customize->add_section('dark_fusion_single_blog_section',
        array(
            'title'     => esc_html__('Single Post', 'dark-fusion' ),
            'panel'     => 'dark_fusion_theme_panel',
            'priority'  => 2
        )
    );


    $wp_customize->add_setting('dark_fusion_enable_single_post_tag',
        array(
            'default'           => true,
            'sanitize_callback' => 'dark_fusion_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Dark_Fusion_Toggle_Control($wp_customize, 'dark_fusion_enable_single_post_tag',
        array(
            'label'     => esc_html__('Hide/Show Tag', 'dark-fusion' ),
            'type'      => 'toggle',
            'section'   => 'dark_fusion_single_blog_section',
            'priority'  => 4
        )
    ));

    $wp_customize->add_setting('dark_fusion_enable_single_post_admin_details',
        array(
            'default'           => true,
            'sanitize_callback' => 'dark_fusion_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Dark_Fusion_Toggle_Control($wp_customize, 'dark_fusion_enable_single_post_admin_details',
        array(
            'label'     => esc_html__('Hide/Show Author Details', 'dark-fusion' ),
            'type'      => 'toggle',
            'section'   => 'dark_fusion_single_blog_section',
            'priority'  => 5
        )
    ));

    $wp_customize->add_setting('dark_fusion_enable_separator',
        array(
            'default'           => true,
            'sanitize_callback' => 'dark_fusion_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Dark_Fusion_Toggle_Control($wp_customize, 'dark_fusion_enable_separator',
        array(
            'label'     => esc_html__('Hide/Show Separator', 'dark-fusion' ),
            'type'      => 'toggle',
            'section'   => 'dark_fusion_single_blog_section',
            'priority'  => 6
        )
    ));


    /* ====================
    * Single Post Order 
    ==================== */
    $default = array('post_meta', 'post_title','post_content');
    $choices = array(
        'post_meta'   => esc_html__( 'Meta', 'dark-fusion'  ),
        'post_title'  => esc_html__( 'Title', 'dark-fusion'  ),
        'post_content'=> esc_html__( 'Content', 'dark-fusion'  ),
    );

    $wp_customize->add_setting( 'dark_fusion_single_post_order', 
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'dark_fusion_sanitize_array',
            'default'           => $default
        ) 
    );

    $wp_customize->add_control( new Dark_Fusion_Control_Sortable( $wp_customize, 'dark_fusion_single_post_order', 
        array(
            'label'     => esc_html__( 'Single Post Order', 'dark-fusion'  ),
            'description' => esc_html__( 'Drag And Drop To Rearrange', 'dark-fusion'  ),
            'section'   => 'dark_fusion_single_blog_section',
            'setting'   => 'dark_fusion_single_post_order',
            'priority'  => 7,
            'type'      => 'sortable',
            'choices'   => $choices
        ) 
    ));

    
   /*====================
    * Meta Hide Show 
    ==================== */
    $default = array( 'single_post_date','single_post_author', 'single_post_category');
    $choices = array(
        'single_post_date'         => esc_html__( 'Date', 'dark-fusion'  ),
        'single_post_author'       => esc_html__( 'Author', 'dark-fusion'  ),
        'single_post_category'     => esc_html__( 'Category', 'dark-fusion'  )
        
    );

    $wp_customize->add_setting( 'dark_fusion_single_post_meta_sort', 
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'dark_fusion_sanitize_array',
            'default'           => $default
        ) 
    );

    $wp_customize->add_control( new Dark_Fusion_Control_Sortable( $wp_customize, 'dark_fusion_single_post_meta_sort', 
        array(
            'label'     => esc_html__( 'Meta Item Order', 'dark-fusion'  ),
            'description' => esc_html__( 'Drag And Drop To Rearrange', 'dark-fusion'  ),
            'section'   => 'dark_fusion_single_blog_section',
            'setting'   => 'dark_fusion_single_post_meta_sort',
            'priority'  => 8,
            'type'      => 'sortable',
            'choices'   => $choices
        ) 
    ));
}

add_action('customize_register', 'dark_fusion_single_blog_customizer');
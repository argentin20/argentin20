<?php
/**
 * Color & Background Customizer
 *
 * @package Dark Fusion Theme
*/

function dark_fusion_color_back_customizer($wp_customize) {

    $selective_refresh = isset($wp_customize->selective_refresh) ? 'postMessage' : 'refresh';

    /* ====================
    * Colors & Background Panel 
    ==================== */
    $wp_customize->add_panel('colors_back_settings', 
        array(
            'priority'      => 111,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__('Colors & Background', 'dark-fusion' ),
        )
    );



    /* ====================
    * Background Image Section 
    ==================== */
    class Dark_Fusion_Image_Background_Control extends WP_Customize_Control {

        public function render_content() {
            ?>
            <p><?php esc_html_e('Note: This setting will only work with the boxed layout', 'dark-fusion' ); ?></p>
            <?php
        }

    }
    $wp_customize->add_section('background_image', 
        array(
            'title' => esc_html__('Background Image', 'dark-fusion' ),
            'panel' => 'colors_back_settings',
            'priority'  => 1
        )
    );
    $wp_customize->add_setting('image_back_note',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'dark_fusion_sanitize_text'
        )
    );
    $wp_customize->add_control(new Dark_Fusion_Image_Background_Control($wp_customize, 'image_back_note', 
        array(
            'section' => 'background_image'
        )
    ));



    /* ====================
    * Background Color Section 
    ==================== */
    class Dark_Fusion_Color_Background_Control extends WP_Customize_Control {

        public function render_content() {
            ?>
            <p><?php esc_html_e('Note: This setting will only work with the Boxed layout', 'dark-fusion' ); ?></p>
            <?php
        }

    }
    $wp_customize->add_section('colors', 
        array(
            'title' => esc_html__('Background Color', 'dark-fusion' ),
            'panel' => 'colors_back_settings',
            'priority'  => 2
        )
    );
    $wp_customize->add_setting('color_back_note',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'dark_fusion_sanitize_text'
        )
    );
    $wp_customize->add_control(new Dark_Fusion_Color_Background_Control($wp_customize, 'color_back_note', 
        array(
            'section' => 'colors'
        )
    ));



    /* ====================
    * Site title & Tagline 
    ==================== */
    $wp_customize->add_section('dark_fusion_header_color', 
        array(
            'title'     => esc_html__('Header', 'dark-fusion' ),
            'panel'     => 'colors_back_settings',
            'priority'  => 3
        )
    );
    /* == Enable/Disable the Header setting === */
    $wp_customize->add_setting('enable_header_color',
        array(
            'default'           => false,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'dark_fusion_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Dark_Fusion_Toggle_Control( $wp_customize, 'enable_header_color',
        array(
            'label'     =>  esc_html__( 'Enable to apply the settings', 'dark-fusion'  ),
            'section'   =>  'dark_fusion_header_color',
            'setting'   =>  'enable_header_color',
            'priority'  =>  3,
            'type'      =>  'toggle'
        )
    ));
    /* == Heading for the site title == */
    class Dark_Fusion_SiteColor_Customize_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <h3><?php esc_html_e('Site Title', 'dark-fusion' ); ?></h3>
        <?php }
    }
    $wp_customize->add_setting('site_title_color',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'dark_fusion_sanitize_text'
        )
    );
    $wp_customize->add_control(new Dark_Fusion_SiteColor_Customize_Control($wp_customize, 'site_title_color', 
        array(
            'section'           =>  'dark_fusion_header_color',
            'active_callback'   =>  'dark_fusion_header_color_callback',
            'setting'           =>  'site_title_color'
        )
    ));
    /* == setting for the site title color == */
    $wp_customize->add_setting('site_title_link_color', 
        array(
            'default'           => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'site_title_link_color', 
        array(
            'label'             =>  esc_html__('Link Color', 'dark-fusion' ),
            'active_callback'   =>  'dark_fusion_header_color_callback',
            'section'           =>  'dark_fusion_header_color',
            'setting'           =>  'site_title_link_color'
        )
    ));
    /* == setting for the site title hover color == */
    $wp_customize->add_setting('site_title_link_hover_color', 
        array(
            'default'           => '#fff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'site_title_link_hover_color', 
        array(
            'label'             =>  esc_html__('Link Hover Color', 'dark-fusion' ),
            'active_callback'   =>  'dark_fusion_header_color_callback',
            'section'           =>  'dark_fusion_header_color',
            'setting'           =>  'site_title_link_hover_color'
        )
    ));

    /* == Heading for the Tagline == */
    class Dark_Fusion_TaglineColor_Customize_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <h3><?php esc_html_e('Site Tagline', 'dark-fusion' ); ?></h3>
        <?php }
    }
    $wp_customize->add_setting('tagline_color',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'dark_fusion_sanitize_text'
        )
    );
    $wp_customize->add_control(new Dark_Fusion_TaglineColor_Customize_Control($wp_customize, 'tagline_color', 
        array(
            'section'           =>  'dark_fusion_header_color',
            'active_callback'   =>  'dark_fusion_header_color_callback',
            'setting'           =>  'tagline_color'
        )
    ));
    /* == setting for the tagline color == */
    $wp_customize->add_setting('tagline_text_color', 
        array(
            'default'           => '#c5c5c5',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'tagline_text_color', 
        array(
            'label'             =>  esc_html__('Text Color', 'dark-fusion' ),
            'active_callback'   =>  'dark_fusion_header_color_callback',
            'section'           =>  'dark_fusion_header_color',
            'setting'           =>  'tagline_text_color'
        )
    ));



    /* ====================
    * Primary menu 
    ==================== */
    $wp_customize->add_section('dark_fusion_menu_color', 
        array(
            'title'     => esc_html__('Primary Menu', 'dark-fusion' ),
            'panel'     => 'colors_back_settings',
            'priority'  => 5
        )
    );
    /* == Enable/Disable the primary menus setting === */
    $wp_customize->add_setting('enable_menu_color',
        array(
            'default'           => false,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'dark_fusion_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Dark_Fusion_Toggle_Control( $wp_customize, 'enable_menu_color',
        array(
            'label'     => esc_html__( 'Enable to apply the settings', 'dark-fusion'  ),
            'section'   => 'dark_fusion_menu_color',
            'type'      => 'toggle'
        )
    ));
    /* == Heading for the Menu == */
    class Dark_Fusion_MenuColor_Customize_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <h3><?php esc_html_e('Menus', 'dark-fusion' ); ?></h3>
        <?php }
    }
    $wp_customize->add_setting('menu_color',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'dark_fusion_sanitize_text'
        )
    );
    $wp_customize->add_control(new Dark_Fusion_MenuColor_Customize_Control($wp_customize, 'menu_color', 
        array(
            'section'           =>  'dark_fusion_menu_color',
            'active_callback'   =>  'dark_fusion_menu_color_callback',
            'setting'           =>  'menu_color'
        )
    ));
    /* == setting for the menu link color == */
    $wp_customize->add_setting('menu_link_color', 
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menu_link_color', 
        array(
            'label'             =>  esc_html__('Text/Link Color', 'dark-fusion' ),
            'active_callback'   =>  'dark_fusion_menu_color_callback',
            'section'           =>  'dark_fusion_menu_color',
            'setting'           =>  'menu_link_color'
        )
    ));
    /* == setting for the menu hover color == */
    $wp_customize->add_setting('menu_link_hover_color', 
        array(
            'default'           => '#3395a0',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menu_link_hover_color', 
        array(
            'label'             =>  esc_html__('Link Hover Color', 'dark-fusion' ),
            'active_callback'   =>  'dark_fusion_menu_color_callback',
            'section'           =>  'dark_fusion_menu_color',
            'setting'           =>  'menu_link_hover_color'
        )
    ));
    /* == setting for the menu active color == */
    $wp_customize->add_setting('menu_active_link_color', 
        array(
            'default'           => '#3395a0',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menu_active_link_color', 
        array(
            'label'             =>  esc_html__('Active Link Color', 'dark-fusion' ),
            'active_callback'   =>  'dark_fusion_menu_color_callback',
            'section'           =>  'dark_fusion_menu_color',
            'setting'           =>  'menu_active_link_color'
        )
    ));

    /* == Heading for the Submenu == */
    class Dark_Fusion_SubmenuColor_Customize_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <h3><?php esc_html_e('Submenus', 'dark-fusion' ); ?></h3>
        <?php }
    }
    $wp_customize->add_setting('submenu_color',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'dark_fusion_sanitize_text'
        )
    );
    $wp_customize->add_control(new Dark_Fusion_SubmenuColor_Customize_Control($wp_customize, 'submenu_color', 
        array(
            'section'           =>  'dark_fusion_menu_color',
            'active_callback'   =>  'dark_fusion_menu_color_callback',
            'setting'           =>  'submenu_color'
        )
    ));
    /* == setting for the submenu background color == */
    $wp_customize->add_setting('submenu_bg_color', 
        array(
            'default'           => '#21202e',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'submenu_bg_color', 
        array(
            'label'             =>  esc_html__('Background Color', 'dark-fusion' ),
            'active_callback'   =>  'dark_fusion_menu_color_callback',
            'section'           =>  'dark_fusion_menu_color',
            'setting'           =>  'submenu_bg_color'
        )
    ));
    /* == setting for the submenu link color == */
    $wp_customize->add_setting('submenu_link_color', 
        array(
            'default'           => '#d5d5d5',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'submenu_link_color', 
        array(
            'label'             =>  esc_html__('Text/Link Color', 'dark-fusion' ),
            'active_callback'   =>  'dark_fusion_menu_color_callback',
            'section'           =>  'dark_fusion_menu_color',
            'setting'           =>  'submenu_link_color'
        )
    ));
    /* == setting for the submenu hover color == */
    $wp_customize->add_setting('submenu_link_hover_color', 
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'submenu_link_hover_color', 
        array(
            'label'             =>  esc_html__('Link Hover Color', 'dark-fusion' ),
            'active_callback'   =>  'dark_fusion_menu_color_callback',
            'section'           =>  'dark_fusion_menu_color',
            'setting'           =>  'submenu_link_hover_color'
        )
    ));



    /* ====================
    * Content (H1---H6, paragraph) 
    ==================== */
    $wp_customize->add_section('dark_fusion_content_color', 
        array(
            'title'     => esc_html__('Content', 'dark-fusion' ),
            'panel'     => 'colors_back_settings',
            'priority'  => 8
        )
    );
    /* == Enable/Disable the content setting === */
    $wp_customize->add_setting('enable_content_color',
        array(
            'default'           => false,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'dark_fusion_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Dark_Fusion_Toggle_Control( $wp_customize, 'enable_content_color',
        array(
            'label'     => esc_html__( 'Enable to apply the settings', 'dark-fusion'  ),
            'section'   => 'dark_fusion_content_color',
            'type'      => 'toggle'
        )
    ));
    /* == setting for the H1 heading color == */
    $wp_customize->add_setting('h1_color', 
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'h1_color', 
        array(
            'label'             =>  esc_html__('H1 Color', 'dark-fusion' ),
            'active_callback'   =>  'dark_fusion_content_color_callback',
            'section'           =>  'dark_fusion_content_color',
            'setting'           =>  'h1_color'
        )
    ));
    /* == setting for the H2 heading color == */
    $wp_customize->add_setting('h2_color', 
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'h2_color', 
        array(
            'label'             =>  esc_html__('H2 Color', 'dark-fusion' ),
            'active_callback'   =>  'dark_fusion_content_color_callback',
            'section'           =>  'dark_fusion_content_color',
            'setting'           =>  'h2_color'
        )
    ));
    /* == setting for the H3 heading color == */
    $wp_customize->add_setting('h3_color', 
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'h3_color', 
        array(
            'label'             =>  esc_html__('H3 Color', 'dark-fusion' ),
            'active_callback'   =>  'dark_fusion_content_color_callback',
            'section'           =>  'dark_fusion_content_color',
            'setting'           =>  'h3_color'
        )
    ));
    /* == setting for the H4 heading color == */
    $wp_customize->add_setting('h4_color', 
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'h4_color', 
        array(
            'label'             =>  esc_html__('H4 Color', 'dark-fusion' ),
            'active_callback'   =>  'dark_fusion_content_color_callback',
            'section'           =>  'dark_fusion_content_color',
            'setting'           =>  'h4_color'
        )
    ));
    /* == setting for the H5 heading color == */
    $wp_customize->add_setting('h5_color', 
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'h5_color', 
        array(
            'label'             =>  esc_html__('H5 Color', 'dark-fusion' ),
            'active_callback'   =>  'dark_fusion_content_color_callback',
            'section'           =>  'dark_fusion_content_color',
            'setting'           =>  'h5_color'
        )
    ));
    /* == setting for the H6 heading color == */
    $wp_customize->add_setting('h6_color', 
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'h6_color', 
        array(
            'label'             =>  esc_html__('H6 Color', 'dark-fusion' ),
            'active_callback'   =>  'dark_fusion_content_color_callback',
            'section'           =>  'dark_fusion_content_color',
            'setting'           =>  'h6_color'
        )
    ));
    /* == setting for the paragraph color == */
    $wp_customize->add_setting('p_color', 
        array(
            'default'           => '#888888',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'p_color', 
        array(
            'label'             =>  esc_html__('Paragraph Text Color', 'dark-fusion' ),
            'active_callback'   =>  'dark_fusion_content_color_callback',
            'section'           =>  'dark_fusion_content_color',
            'setting'           =>  'p_color'
        )
    ));
    /* == setting for the button color == */
    $wp_customize->add_setting('button_color', 
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'button_color', 
        array(
            'label'             =>  esc_html__('Button Text Color', 'dark-fusion' ),
            'active_callback'   =>  'dark_fusion_content_color_callback',
            'section'           =>  'dark_fusion_content_color',
            'setting'           =>  'button_color'
        )
    ));
    /* == setting for the button background color == */
    $wp_customize->add_setting('button_back_color', 
        array(
            'default'           => '#3395a0',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'button_back_color', 
        array(
            'label'             =>  esc_html__('Button Background Color', 'dark-fusion' ),
            'active_callback'   =>  'dark_fusion_content_color_callback',
            'section'           =>  'dark_fusion_content_color',
            'setting'           =>  'button_back_color'
        )
    ));
    /* == setting for the button hover color == */
    $wp_customize->add_setting('button_hover_color', 
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'button_hover_color', 
        array(
            'label'             =>  esc_html__('Button Text Hover Color', 'dark-fusion' ),
            'active_callback'   =>  'dark_fusion_content_color_callback',
            'section'           =>  'dark_fusion_content_color',
            'setting'           =>  'button_hover_color'
        )
    ));
    /* == setting for the button background hover color == */
    $wp_customize->add_setting('button_back_hover_color', 
        array(
            'default'           => '#3395a0',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'button_back_hover_color', 
        array(
            'label'             =>  esc_html__('Button Background Hover Color', 'dark-fusion' ),
            'active_callback'   =>  'dark_fusion_content_color_callback',
            'section'           =>  'dark_fusion_content_color',
            'setting'           =>  'button_back_hover_color'
        )
    ));



    /* ====================
    * Sidebar 
    ==================== */
    $wp_customize->add_section('dark_fusion_sidebar_color', 
        array(
            'title'     => esc_html__('Sidebar', 'dark-fusion' ),
            'panel'     => 'colors_back_settings',
            'priority'  => 11
        )
    );
    /* == Enable/Disable sidebar setting === */
    $wp_customize->add_setting('enable_sidebar_color',
        array(
            'default'           => false,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'dark_fusion_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Dark_Fusion_Toggle_Control( $wp_customize, 'enable_sidebar_color',
        array(
            'label'     => esc_html__( 'Enable to apply the settings', 'dark-fusion'  ),
            'section'   => 'dark_fusion_sidebar_color',
            'type'      => 'toggle'
        )
    ));
    /* == setting for the sidebar title color == */
    $wp_customize->add_setting('sidebar_title_color', 
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sidebar_title_color', 
        array(
            'label'             =>  esc_html__('Title Color', 'dark-fusion' ),
            'active_callback'   =>  'dark_fusion_sidebar_color_callback',
            'section'           =>  'dark_fusion_sidebar_color',
            'setting'           =>  'sidebar_title_color'
        )
    ));
    /* == setting for the sidebar text color == */
    $wp_customize->add_setting('sidebar_text_color', 
        array(
            'default'           => '#888888',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sidebar_text_color', 
        array(
            'label'             =>  esc_html__('Text Color', 'dark-fusion' ),
            'active_callback'   =>  'dark_fusion_sidebar_color_callback',
            'section'           =>  'dark_fusion_sidebar_color',
            'setting'           =>  'sidebar_text_color'
        )
    ));
    /* == setting for the sidebar link color == */
    $wp_customize->add_setting('sidebar_link_color', 
        array(
            'default'           => '#888888',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sidebar_link_color', 
        array(
            'label'             =>  esc_html__('Link Color', 'dark-fusion' ),
            'active_callback'   =>  'dark_fusion_sidebar_color_callback',
            'section'           =>  'dark_fusion_sidebar_color',
            'setting'           =>  'sidebar_link_color'
        )
    ));
    /* == setting for the sidebar link hover color == */
    $wp_customize->add_setting('sidebar_link_hover_color', 
        array(
            'default'           => '#3395a0',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sidebar_link_hover_color', 
        array(
            'label'             =>  esc_html__('Link Hover Color', 'dark-fusion' ),
            'active_callback'   =>  'dark_fusion_sidebar_color_callback',
            'section'           =>  'dark_fusion_sidebar_color',
            'setting'           =>  'sidebar_link_hover_color'
        )
    ));


    /* ====================
    * Footer Widgets
    ==================== */
    
    $wp_customize->add_section('dark_fusion_footer_color', 
        array(
            'title'     => esc_html__('Footer Widgets', 'dark-fusion' ),
            'panel'     => 'colors_back_settings',
            'priority'  => 12
        )
    );
    
    
    /* == Enable/Disable footer setting === */
    $wp_customize->add_setting('enable_footer_color',
        array(
            'default'           => false,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'dark_fusion_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Dark_Fusion_Toggle_Control( $wp_customize, 'enable_footer_color',
        array(
            'label'     => esc_html__( 'Enable to apply the settings', 'dark-fusion'  ),
            'section'   => 'dark_fusion_footer_color',
            'type'      => 'toggle'
        )
    ));
    /* == setting for the footer background color == */
    $wp_customize->add_setting('footer_bg_color', 
        array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_bg_color', 
        array(
            'label'             =>  esc_html__('Background Color', 'dark-fusion' ),
            'active_callback'   =>  'dark_fusion_footer_color_callback',
            'section'           =>  'dark_fusion_footer_color',
            'setting'           =>  'footer_bg_color'
        )
    ));
    /* == setting for the footer title color == */
    $wp_customize->add_setting('footer_title_color', 
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_title_color', 
        array(
            'label'             =>  esc_html__('Title Color', 'dark-fusion' ),
            'active_callback'   =>  'dark_fusion_footer_color_callback',
            'section'           =>  'dark_fusion_footer_color',
            'setting'           =>  'footer_title_color'
        )
    ));
    /* == setting for the footer text color == */
    $wp_customize->add_setting('footer_text_color', 
        array(
            'default'           => '#888888',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_text_color', 
        array(
            'label'             =>  esc_html__('Text Color', 'dark-fusion' ),
            'active_callback'   =>  'dark_fusion_footer_color_callback',
            'section'           =>  'dark_fusion_footer_color',
            'setting'           =>  'footer_text_color'
        )
    ));
    /* == setting for the footer link color == */
    $wp_customize->add_setting('footer_link_color', 
        array(
            'default'           => '#888888',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_link_color', 
        array(
            'label'             =>  esc_html__('Link Color', 'dark-fusion' ),
            'active_callback'   =>  'dark_fusion_footer_color_callback',
            'section'           =>  'dark_fusion_footer_color',
            'setting'           =>  'footer_link_color'
        )
    ));
    /* == setting for the footer link hover color == */
    $wp_customize->add_setting('footer_link_hover_color', 
        array(
            'default'           => '#3395a0',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_link_hover_color', 
        array(
            'label'             =>  esc_html__('Link Hover Color', 'dark-fusion' ),
            'active_callback'   =>  'dark_fusion_footer_color_callback',
            'section'           =>  'dark_fusion_footer_color',
            'setting'           =>  'footer_link_hover_color'
        )
    ));

    /* ====================
    * Footer Bar
    ==================== */
    $wp_customize->add_section('dark_fusion_footer_bar', 
        array(
            'title'     =>  esc_html__('Footer Bar', 'dark-fusion' ),
            'panel'     =>  'colors_back_settings',
            'priority'  =>  13
        )
    );
    // Enable/Disable the footer bar setting
    $wp_customize->add_setting('enable_footer_bar',
        array(
            'default'           =>  false,
            'capability'        =>  'edit_theme_options',
            'sanitize_callback' =>  'dark_fusion_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Dark_Fusion_Toggle_Control( $wp_customize, 'enable_footer_bar',
        array(
            'label'     =>  esc_html__( 'Enable to apply the settings', 'dark-fusion'  ),
            'section'   =>  'dark_fusion_footer_bar',
            'setting'   =>  'enable_footer_bar',
            'type'      =>  'toggle'
        )
    ));
    // setting for the footer bar background color
    $wp_customize->add_setting('footer_bar_back_color', 
        array(
            'default'           => '#171717',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_bar_back_color', 
        array(
            'label'             =>  esc_html__('Background Color', 'dark-fusion' ),
            'section'           =>  'dark_fusion_footer_bar',
            'setting'           =>  'footer_bar_back_color',
            'active_callback'   =>  'dark_fusion_footer_bar_color_callback'
        )
    ));
    // setting for the footer bar text color
    $wp_customize->add_setting('footer_bar_text_color', 
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_bar_text_color', 
        array(
            'label'             =>  esc_html__('Text Color', 'dark-fusion' ),
            'section'           =>  'dark_fusion_footer_bar',
            'setting'           =>  'footer_bar_text_color',
            'active_callback'   =>  'dark_fusion_footer_bar_color_callback'
        )
    ));
    // setting for the footer bar link color
    $wp_customize->add_setting('footer_bar_link_color', 
        array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_bar_link_color', 
        array(
            'label'             =>  esc_html__('Link Color', 'dark-fusion' ),
            'section'           =>  'dark_fusion_footer_bar',
            'setting'           =>  'footer_bar_link_color',
            'active_callback'   =>  'dark_fusion_footer_bar_color_callback'
        )
    ));
    // setting for the footer bar link hover color
    $wp_customize->add_setting('footer_bar_link_hover_color', 
        array(
            'default'           => '#3395a0',
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_bar_link_hover_color', 
        array(
            'label'             =>  esc_html__('Link Hover Color', 'dark-fusion' ),
            'section'           =>  'dark_fusion_footer_bar',
            'setting'           =>  'footer_bar_link_hover_color',
            'active_callback'   =>  'dark_fusion_footer_bar_color_callback'
        )
    ));

}

add_action('customize_register', 'dark_fusion_color_back_customizer');
<?php
/**
 * General Settings Customizer
 *
 * @package Dark Fusion Theme
*/

function dark_fusion_general_settings_customizer ( $wp_customize )
{
            
    $wp_customize->add_panel('dark_fusion_general_settings',
        array(
            'priority'      => 112,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__('General Settings','dark-fusion')
        )
    );
    
    /* ====================
    * Preloader 
    ==================== */
    $wp_customize->add_section('preloader_section',
        array(
            'title'     =>esc_html__('Preloader','dark-fusion' ),
            'panel'     => 'dark_fusion_general_settings',
            'priority'  => 1
        )
    );
    $wp_customize->add_setting('preloader_enable',
        array(
            'default'           => false,
            'sanitize_callback' => 'dark_fusion_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Dark_Fusion_Toggle_Control( $wp_customize, 'preloader_enable',
        array(
            'label'    => esc_html__( 'Enable/Disable Preloader', 'dark-fusion'),
            'section'  => 'preloader_section',
            'type'     => 'toggle',
            'priority' => 1
        )
    ));


    
    /* ====================
    * After Menu
    ==================== */
    $wp_customize->add_section('after_menu_setting_section',
        array(
            'title'     =>  esc_html__('After Menu','dark-fusion' ),
            'panel'     =>  'dark_fusion_general_settings',
            'priority'  =>  4
        )
    );
    /* ====================
    * Dropdown Button or HTML Option
    ==================== */
        $wp_customize->add_setting('after_menu_multiple_option',
            array(
                'default'           =>  'none',
                'capability'        =>  'edit_theme_options',
                'sanitize_callback' =>  'dark_fusion_sanitize_select'
            )
        );
        $wp_customize->add_control('after_menu_multiple_option', 
            array(
                'label'     => esc_html__('After Menu','dark-fusion' ),
                'section'   => 'after_menu_setting_section',
                'setting'   => 'after_menu_multiple_option',
                'type'      => 'select',
                'choices'   =>  
                array(
                    'none'      =>  esc_html__('None', 'dark-fusion' ),
                    'menu_btn'  =>  esc_html__('Button', 'dark-fusion' ),
                    'html'      =>  esc_html__('HTML', 'dark-fusion' )
                )
            )
        );
    
    /* ====================
    * After Menu Button Text
    ==================== */
    $wp_customize->add_setting('after_menu_btn_txt',
        array(
            'default'           =>  '',
            'capability'        =>  'edit_theme_options',
            'sanitize_callback' =>  'dark_fusion_sanitize_text'
        )
    );
    $wp_customize->add_control('after_menu_btn_txt', 
        array(
            'label'     => esc_html__('Button Text','dark-fusion' ),
            'section'   => 'after_menu_setting_section',
            'setting'   => 'after_menu_btn_txt',
            'type'      => 'text'  
        )
    );
    /* ====================
    * After Menu Button Link
    ==================== */
    $wp_customize->add_setting('after_menu_btn_link',
        array(
            'default'           =>  '',
            'capability'        =>  'edit_theme_options',
            'sanitize_callback' =>  'esc_url_raw'
        )
    );
    $wp_customize->add_control('after_menu_btn_link', 
        array(
            'label'     => esc_html__('Button Link','dark-fusion' ),
            'section'   => 'after_menu_setting_section',
            'setting'   => 'after_menu_btn_link',
            'type'      => 'text'
        )
    );
    /* ====================
    * Open in New Tab
    ==================== */
    $wp_customize->add_setting('after_menu_btn_new_tabl',
        array(
            'default'           =>  false,
            'capability'        =>  'edit_theme_options',
            'sanitize_callback' =>  'dark_fusion_sanitize_checkbox'
        ) 
    );
    $wp_customize->add_control('after_menu_btn_new_tabl', 
        array(
            'label'     => esc_html__('Open link in a new tab','dark-fusion'),
            'section'   => 'after_menu_setting_section',
            'setting'   => 'after_menu_btn_new_tabl',
            'type'      =>  'checkbox'
        )
    ); 

    /* ====================
    * Border Radius
    ==================== */

    $wp_customize->add_setting( 'after_menu_btn_border',
        array(
            'default'           => 0,
            'transport'         => 'postMessage',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Dark_Fusion_Slider_Custom_Control( $wp_customize, 'after_menu_btn_border',
        array(
            'label'         => esc_html__('Button Border Radius', 'dark-fusion'),
            'section'       => 'after_menu_setting_section',
            'input_attrs'   => 
            array(
                'min'   => 0,
                'max'   => 30,
                'step'  => 1
            )
        )
    ));
    /* ====================
    * After Menu HTML section
    ==================== */
    $wp_customize->add_setting('after_menu_html', 
        array(
            'default'           => '',
            'capability'        =>  'edit_theme_options',
            'sanitize_callback' => 'dark_fusion_sanitize_text'
        )
    );
    $wp_customize->add_control('after_menu_html', 
        array(
            'label'     => esc_html__('HTML','dark-fusion' ),
            'section'   => 'after_menu_setting_section',
            'type'      => 'textarea'
        )
    );
    /* ====================
    * Enable/Disable Search Icon
    ==================== */

        $wp_customize->add_setting('search_btn_enable',
            array(
                'default'           => false,
                'sanitize_callback' => 'dark_fusion_sanitize_checkbox'
            )
        );
        $wp_customize->add_control(new Dark_Fusion_Toggle_Control( $wp_customize, 'search_btn_enable',
            array(
                'label'    => esc_html__( 'Enable/Disable Search Icon', 'dark-fusion'  ),
                'section'  => 'after_menu_setting_section',
                'type'     => 'toggle'
            )
        ));
    
    /* ====================
    * Enable/Disable Cart Icon
    ==================== */
    $wp_customize->add_setting('cart_btn_enable',
        array(
            'default'           => false,
            'sanitize_callback' => 'dark_fusion_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Dark_Fusion_Toggle_Control( $wp_customize, 'cart_btn_enable',
        array(
            'label'    => esc_html__( 'Enable/Disable Cart Icon', 'dark-fusion'  ),
            'section'  => 'after_menu_setting_section',
            'type'     => 'toggle'
        )
    ));



    /* ====================
    * Breadcrumb setting  
    ==================== */   

        $wp_customize->add_section('bredcrumb_section',
            array(
                'title'     =>  esc_html__('Breadcrumb','dark-fusion'),
                'panel'     =>  'dark_fusion_general_settings',
                'priority'  =>  3   
            )
        );
        // Enable/Disable breadcrumbs section
        $wp_customize->add_setting('breadcrumb_banner_enable',
            array(
                'default'           => true,
                'sanitize_callback' => 'dark_fusion_sanitize_checkbox'
            )
        );
        $wp_customize->add_control(new Dark_Fusion_Toggle_Control( $wp_customize, 'breadcrumb_banner_enable',
            array(
                'label'             =>  esc_html__( 'Enable/Disable Banner', 'dark-fusion'),
                'section'           =>  'bredcrumb_section',
                'type'              =>  'toggle',
                'priority'          =>  1
            )
        ));
   
   
    $bredcrumb_section='bredcrumb_section';
   
    /* == Heading for the page title == */
    class Dark_Fusion_pagetitle_Customize_Control extends WP_Customize_Control {
        public function render_content() { ?>
            <h3><?php esc_html_e('Page Title', 'dark-fusion' ); ?></h3>
        <?php }
    }
    $wp_customize->add_setting('bredcrumb_page_title',
        array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'dark_fusion_sanitize_text'
        )
    );
    $wp_customize->add_control(new Dark_Fusion_pagetitle_Customize_Control($wp_customize, 'bredcrumb_page_title', 
        array(
                'section'           =>  $bredcrumb_section,
                'setting'           =>  'bredcrumb_page_title',
                'active_callback'   => 'dark_fusion_breadcrumb_section_callback',
                'priority'  => 1,
            )
    ));

    // Enable/Disable page title
    $wp_customize->add_setting('enable_page_title',
        array(
            'default'           => true,
            'sanitize_callback' => 'dark_fusion_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Dark_Fusion_Toggle_Control( $wp_customize, 'enable_page_title',
        array(
            'label'             =>  esc_html__( 'Enable/Disable Page Title', 'dark-fusion'),
            'section'           =>  $bredcrumb_section,
            'type'              =>  'toggle',
            'active_callback'   => 'dark_fusion_breadcrumb_section_callback',
            'priority'          =>  1
        )
    ));

    /* Position */

    $wp_customize->add_setting('bredcrumb_position', 
        array(
            'default'           => esc_html__('page_header','dark-fusion' ),
            'sanitize_callback' => 'dark_fusion_sanitize_select'
        )
    );

    $wp_customize->add_control('bredcrumb_position', 
        array(      
            'label'     => esc_html__('Position', 'dark-fusion' ),        
            'section'   => $bredcrumb_section,
            'type'      => 'radio',
            'active_callback'   => function($control) {
                                        return (
                                            dark_fusion_breadcrumb_section_callback($control) &&
                                            dark_fusion_page_title_callback($control)
                                        );
                                    },
            'priority'  => 1,
            'choices'   =>  
            array(
                'page_header'   => esc_html__('Page Header', 'dark-fusion' ),
                'content_area'   => esc_html__('Content Area', 'dark-fusion' )
            )
        )
    );

    /* Markup */

    $wp_customize->add_setting('bredcrumb_markup',
        array(
            'default'           =>  'h1',
            'capability'        =>  'edit_theme_options',
            'sanitize_callback' =>  'dark_fusion_sanitize_select'
        )
    );

    $wp_customize->add_control('bredcrumb_markup', 
        array(
            'label'     => esc_html__('Markup','dark-fusion' ),
            'section'   => $bredcrumb_section,
            'setting'   => 'bredcrumb_markup',
            'active_callback'   => function($control) {
                                        return (
                                            dark_fusion_breadcrumb_section_callback($control) &&
                                            dark_fusion_page_title_callback($control)
                                        );
                                    },
            'priority'  => 1,
            'type'      => 'select',
            'choices'   =>  
            array(
                'h1'      =>  esc_html__('Heading 1', 'dark-fusion' ),
                'h2'      =>  esc_html__('Heading 2', 'dark-fusion' ),
                'h3'      =>  esc_html__('Heading 3', 'dark-fusion' ),
                'h4'      =>  esc_html__('Heading 4', 'dark-fusion' ),
                'h5'      =>  esc_html__('Heading 5', 'dark-fusion' ),
                'h6'      =>  esc_html__('Heading 6', 'dark-fusion' ),
                'span'    =>  esc_html__('Span', 'dark-fusion' ),
                'p'       =>  esc_html__('Paragraph', 'dark-fusion' ),
                'div'     =>  esc_html__('Div', 'dark-fusion' ),
            )
        )
    );

    /* Breadcrumb Alignment */

    $wp_customize->add_setting( 'bredcrumb_alignment',
        array(
            'default'           => 'centered',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'dark_fusion_sanitize_select'
        )
    );
    $wp_customize->add_control( new Dark_Fusion_Image_Radio_Button_Custom_Control( $wp_customize, 'bredcrumb_alignment',
        array(
            'label'     => esc_html__( 'Alignment', 'dark-fusion'  ),
            'section'   => $bredcrumb_section,
            'active_callback'   => 'dark_fusion_breadcrumb_section_callback',
            'priority'  => 1,
            'choices'   => 
            array(
                'parallel' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/breadcrumb-right.png'),
                'parallelr' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/breadcrumb-left.png'),
                'centered' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/breadcrumb-center.png'),
                'left' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/both-on-left.png'),
                'right' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/both-on-right.png')   
            )
        )
    ));




    /* ====================
    * Header Preset
    ==================== */
    $wp_customize->add_section('header_preset_section',
        array(
            'title'     =>  esc_html__('Header Presets','dark-fusion' ),
            'panel'     =>  'dark_fusion_general_settings',
            'priority'  =>  1
        )
    );
   
    $wp_customize->add_setting('header_preset_layout', array(
            'default'   =>  'left',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'dark_fusion_sanitize_select'
        )
    );

    $wp_customize->add_control(new Dark_Fusion_Image_Radio_Button_Custom_Control($wp_customize, 'header_preset_layout', 
        array(
            'label'             => esc_html__('Header layout with logo placing', 'dark-fusion' ),
            'section'           => 'header_preset_section',
            'choices'           => array(
                'left'  => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/header-default.png'),
                'right' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/header-right-logo.png'),
                'center' =>array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/header-center.png'),
                'full' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/header-full.png')
            )
        )
    ));
    


    /* ====================
    * Sticky Header  
    ==================== */
   
    $wp_customize->add_section('sticky_header_section',
        array(
            'title'     =>  esc_html__('Sticky Header','dark-fusion'),
            'panel'     =>  'dark_fusion_general_settings',
            'priority'  =>  2   
        )
    );
    $wp_customize->add_setting('sticky_header_enable',
        array(
            'default'           => false,
            'sanitize_callback' => 'dark_fusion_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Dark_Fusion_Toggle_Control( $wp_customize, 'sticky_header_enable',
        array(
            'label'    =>   esc_html__( 'Enable/Disable Sticky Header', 'dark-fusion'),
            'section'  =>   'sticky_header_section',
            'type'     =>   'toggle',
            'priority' =>   1
        )
    ));
    


    /* ====================
    * Container Width
    ==================== */
    $wp_customize->add_section('container_width_section',
        array(
            'title'     =>  esc_html__('Container Width','dark-fusion' ),
            'panel'     =>  'dark_fusion_general_settings',
            'priority'  =>  7
        )
    );
    $wp_customize->add_setting( 'container_width',
        array(
            'default'           => 1170,
            'transport'         => 'postMessage',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Dark_Fusion_Slider_Custom_Control( $wp_customize, 'container_width',
        array(
            'label'         =>  esc_html__( 'Container Width (In px)', 'dark-fusion'  ),
            'description'   =>  esc_html__( 'Note: Container Width will not work with stretched sidebar layout.', 'dark-fusion'  ),
            'section'       =>  'container_width_section',
            'priority'      =>  1,
            'input_attrs'   => 
            array(
                'min'   => 600,
                'max'   => 1920,
                'step'  => 1
            )
        )
    ));

    $wp_customize->add_setting( 'content_width',
        array(
            'default'           => 66.6,
            'transport'         => 'postMessage',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Dark_Fusion_Slider_Custom_Control( $wp_customize, 'content_width',
        array(
            'label'         =>  esc_html__( 'Content Width (In %)', 'dark-fusion'  ),
            'description'   =>  esc_html__( 'Note: Content Width will work only with sidebar layout.', 'dark-fusion'  ),
            'section'       =>  'container_width_section',
            'priority'      =>  2,
            'input_attrs'   => 
            array(
                'min'   => 0,
                'max'   => 100,
                'step'  => 1
            )
        )
    ));

     $wp_customize->add_setting( 'sidebar_width',
        array(
            'default'           => 33.3,
            'transport'         => 'postMessage',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Dark_Fusion_Slider_Custom_Control( $wp_customize, 'sidebar_width',
        array(
            'label'         =>  esc_html__( 'Sidebar Width (In %)', 'dark-fusion'  ),
            'description'   =>  esc_html__( 'Note: Sidebar Width will work only with sidebar layout.', 'dark-fusion'  ),
            'section'       =>  'container_width_section',
            'priority'      =>  3,
            'input_attrs'   => 
            array(
                'min'   => 0,
                'max'   => 100,
                'step'  => 1
            )
        )
    ));



    /* ====================
    * Scroll to top  
    ==================== */
    $wp_customize->add_section('scrolltotop_setting_section',
        array(
            'title'     =>  esc_html__('Scroll to Top','dark-fusion' ),
            'panel'     =>  'dark_fusion_general_settings',
            'priority'  =>  9  
        )
    );
    $wp_customize->add_setting('scrolltotop_setting_enable',
        array(
            'default'           => true,
            'sanitize_callback' => 'dark_fusion_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Dark_Fusion_Toggle_Control( $wp_customize, 'scrolltotop_setting_enable',
        array(
            'label'    =>   esc_html__( 'Enable/Disable Scroll to Top', 'dark-fusion'  ),
            'section'  =>   'scrolltotop_setting_section',
            'type'     =>   'toggle',
            'priority' =>   1
        )
    )); 


    $wp_customize->add_setting('scroll_to_top_position',
        array(
            'default'           =>  'right',
            'capability'        =>  'edit_theme_options',
            'sanitize_callback' =>  'dark_fusion_sanitize_select'
        )
    );
    $wp_customize->add_control('scroll_to_top_position', 
        array(
            'label'             =>  esc_html__('Choose Position','dark-fusion' ),
            'section'           =>  'scrolltotop_setting_section',
            'setting'           =>  'scroll_to_top_position',
            'active_callback'   =>  'dark_fusion_scroll_to_top_callback',
            'priority'          =>  2,
            'type'              =>  'radio',
            'choices'           =>  array(
                'left'      =>  esc_html__('Left', 'dark-fusion' ),
                'right'     =>  esc_html__('Right', 'dark-fusion' )
            )
        )
    );

    // scroll to top icon font
    $wp_customize->add_setting('scroll_to_top_icon_class',
        array(
            'default'           => esc_html__('fa fa-arrow-up', 'dark-fusion'),
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'dark_fusion_sanitize_text'
        )
    );
    $wp_customize->add_control('scroll_to_top_icon_class',
        array(
            'label'             => esc_html__('Icon Class Name', 'dark-fusion'),
            'section'           => 'scrolltotop_setting_section',
            'setting'           => 'scroll_to_top_icon_class',
            'active_callback'   => 'dark_fusion_scroll_to_top_callback',
            'priority'          => 3,
            'type'              => 'text'
        )
    );

    // scroll to top button radious
    $wp_customize->add_setting( 'scroll_to_top_button_radious',
        array(
            'default'           => 3,
            'transport'         => 'postMessage',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control( new Dark_Fusion_Slider_Custom_Control( $wp_customize, 'scroll_to_top_button_radious',
        array(
            'label'             =>  esc_html__('Border Radius', 'dark-fusion'),
            'section'           =>  'scrolltotop_setting_section',
            'setting'           =>  'scroll_to_top_button_radious',
            'active_callback'   =>  'dark_fusion_scroll_to_top_callback',
            'priority'          =>  4,
            'input_attrs'   => 
                array(
                    'min'   =>  0,
                    'max'   =>  30,
                    'step'  =>  1
                )
        )
    ));

    // Color setting apply on scroll to top
    $wp_customize->add_setting( 'scroll_to_top_color_enable',
        array(
            'default'           => false,
            'sanitize_callback' => 'dark_fusion_sanitize_checkbox'
        )
    );
    $wp_customize->add_control(new Dark_Fusion_Toggle_Control( $wp_customize, 'scroll_to_top_color_enable',
        array(
            'label'             =>  esc_html__( 'Enable to apply the color settings', 'dark-fusion'  ),
            'section'           =>  'scrolltotop_setting_section',
            'setting'           =>  'scroll_to_top_color_enable',
            'active_callback'   =>  'dark_fusion_scroll_to_top_callback',
            'type'              =>  'toggle',
            'priority'          =>  5
        )
    ));

    // Background color for the scroll to top
    $wp_customize->add_setting('scroll_to_top_back_color', 
        array(
            'default'           => '#3395a0',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'scroll_to_top_back_color', 
        array(
            'label'             =>  esc_html__('Background Color', 'dark-fusion' ),
            'active_callback'   =>  function($control) {
                                        return (
                                            dark_fusion_scroll_to_top_callback($control) &&
                                            dark_fusion_scroll_to_top_color_callback($control)
                                        );
            },
            'section'           =>  'scrolltotop_setting_section',
            'setting'           =>  'scroll_to_top_back_color',
            'priority'          =>  6
        )
    ));

    // Icon color for the scroll to top
    $wp_customize->add_setting('scroll_to_top_icon_color', 
        array(
            'default'           => '#fff',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'scroll_to_top_icon_color', 
        array(
            'label'             =>  esc_html__('Icon Color', 'dark-fusion' ),
            'active_callback'   =>  function($control) {
                                        return (
                                            dark_fusion_scroll_to_top_callback($control) &&
                                            dark_fusion_scroll_to_top_color_callback($control)
                                        );
            },
            'section'           =>  'scrolltotop_setting_section',
            'setting'          =>  'scroll_to_top_icon_color',
            'priority'          =>  7
        )
    ));

    // Background hover color for the scroll to top
    $wp_customize->add_setting('scroll_to_top_back_hover_color', 
        array(
            'default'           => '#3395a0',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'scroll_to_top_back_hover_color', 
        array(
            'label'             =>  esc_html__('Background Hover Color', 'dark-fusion' ),
            'active_callback'   =>  function($control) {
                                        return (
                                            dark_fusion_scroll_to_top_callback($control) &&
                                            dark_fusion_scroll_to_top_color_callback($control)
                                        );
            },
            'section'           =>  'scrolltotop_setting_section',
            'setting'          =>  'scroll_to_top_back_hover_color',
            'priority'          =>  8
        )
    ));

    // Icon hover color for the scroll to top
    $wp_customize->add_setting('scroll_to_top_icon_hover_color', 
        array(
            'default'           => '#fff',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'scroll_to_top_icon_hover_color', 
        array(
            'label'             =>  esc_html__('Icon Hover Color', 'dark-fusion' ),
            'active_callback'   =>  function($control) {
                                        return (
                                            dark_fusion_scroll_to_top_callback($control) &&
                                            dark_fusion_scroll_to_top_color_callback($control)
                                        );
            },
            'section'           =>  'scrolltotop_setting_section',
            'setting'           =>  'scroll_to_top_icon_hover_color',
            'priority'          =>  9
        )
    ));

    /* =============================================================
    *                       Side Bar Layout Sections
    ================================================================ */

        $wp_customize->add_section('sidebar_layout_setting_section',
            array(
                'title'     => esc_html__('Sidebar Layout','dark-fusion' ),
                'panel'     => 'dark_fusion_general_settings'
            )
        );

        /* ====== Sidebar Layout ====== */
        
        /* Blog/Archives */
        $wp_customize->add_setting( 'blog_sidebar_layout',
            array(
                'default'           => 'right',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'dark_fusion_sanitize_select'
            )
        );
        $wp_customize->add_control( new Dark_Fusion_Image_Radio_Button_Custom_Control( $wp_customize, 'blog_sidebar_layout',
            array(
                'label'     => esc_html__( 'Blog/Archives', 'dark-fusion' ),
                'section'   => 'sidebar_layout_setting_section',
                'priority'  => 1,
                'choices'   => 
                array(
                    'right' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/right.jpg'),
                    'left' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/left.jpg'),
                    'full' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/full.jpg'),
                    'stretched' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/stretched.jpg')   
                )
            )
        ));

        /* Single Post */
        $wp_customize->add_setting( 'single_blog_sidebar_layout',
            array(
                'default'           => 'right',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'dark_fusion_sanitize_select'
            )
        );
        $wp_customize->add_control( new Dark_Fusion_Image_Radio_Button_Custom_Control( $wp_customize, 'single_blog_sidebar_layout',
            array(
                'label'     => esc_html__( 'Single Post', 'dark-fusion'  ),
                'section'   => 'sidebar_layout_setting_section',
                'priority'  => 2,
                'choices'   => 
                array(
                    'right' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/right.jpg'),
                    'left' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/left.jpg'),
                    'full' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/full.jpg')  ,
                    'stretched' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/stretched.jpg')   
                )
            )
        ));

        /* Page Layout */
        $wp_customize->add_setting( 'page_sidebar_layout',
            array(
                'default'           => 'right',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'dark_fusion_sanitize_select'
            )
        );
        $wp_customize->add_control( new Dark_Fusion_Image_Radio_Button_Custom_Control( $wp_customize, 'page_sidebar_layout',
            array(
                'label'     => esc_html__( 'Page', 'dark-fusion'  ),
                'section'   => 'sidebar_layout_setting_section',
                'priority'  => 3,
                'choices'   => 
                array(
                    'right' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/right.jpg'),
                    'left' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/left.jpg'),
                    'full' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/full.jpg')  ,
                    'stretched' => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/stretched.jpg')   
                )
            )
        ));


    /* ====== Footer Widgets ====== */

        $wp_customize->add_section('fwidgets_setting_section',
            array(
                'title'     => esc_html__('Footer Widgets','dark-fusion' ),
                'panel'     => 'dark_fusion_general_settings'
            )
        );   

        /*Enable Disable Footer Widgets */
        $wp_customize->add_setting( 'footer_widget_enable',
            array(
                'default'           => true,
                'sanitize_callback' => 'dark_fusion_sanitize_checkbox'
            )
        );
        $wp_customize->add_control(new Dark_Fusion_Toggle_Control( $wp_customize, 'footer_widget_enable',
            array(
                'label'     => esc_html__( 'Enable/Disable Widgets', 'dark-fusion'  ),
                'section'   => 'fwidgets_setting_section',
                'type'      => 'toggle',
                'priority'  => 3
            )
        ));
        /* Footer Widgets Layout */
        $wp_customize->add_setting( 'footer_widget_layout',
            array(
                'default'           => 3,
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'dark_fusion_sanitize_select'
            )
        );
        $wp_customize->add_control( new Dark_Fusion_Image_Radio_Button_Custom_Control( $wp_customize, 'footer_widget_layout',
            array(
                'label'     => esc_html__( 'Widgets Layout', 'dark-fusion'  ),
                'section'   => 'fwidgets_setting_section',
                'active_callback'   => 'dark_fusion_footer_widgets_callback',
                'priority'  => 4,
                'choices'   => 
                array(
                    2 => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/2-col.png'),
                    3 => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/3-col.png'),
                    4 => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/4-col.png')   
                )
            )
        ));


        // Footer widget background image
        $wp_customize->add_setting( 'footer_widget_back_image', 
            array(
                'default'           => trailingslashit(get_template_directory_uri()).'/assets/images/footer-bg.jpg',
                'sanitize_callback' => 'esc_url_raw'
            ) 
        );      
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_widget_back_image', 
            array(
                'label'             =>  esc_html__( 'Widgets Background Image', 'dark-fusion' ),
                'section'           =>  'fwidgets_setting_section',
                'setting'           =>  'footer_widget_back_image',
                'active_callback'   =>  'dark_fusion_footer_widget_callback',
                'priority'          =>  4
            ) 
        ));


          // Enable / Disable footer widget image overlay color
        $wp_customize->add_setting( 'footer_widget_image_overlay_enable',
            array(
                'default'           => true,
                'sanitize_callback' => 'dark_fusion_sanitize_checkbox'
            )
        );
        $wp_customize->add_control(new Dark_Fusion_Toggle_Control( $wp_customize, 'footer_widget_image_overlay_enable',
            array(
                'label'             =>  esc_html__( 'Enable/Disable Widgets Image Overlay', 'dark-fusion'  ),
                'setting'           =>  'footer_widget_image_overlay_enable',
                'section'           =>  'fwidgets_setting_section',
                'active_callback'   =>  'dark_fusion_footer_widget_callback',
                'type'              =>  'toggle',
                'priority'          =>  8
            )
        ));

        // Footer widget image overlay color
        $wp_customize->add_setting( 'footer_widget_image_overlay_color', 
            array(
                'sanitize_callback' => 'sanitize_text_field',
                'default'           => 'rgba(0, 0, 0, 0.8)'
            ) 
        );      
        $wp_customize->add_control(new Dark_Fusion_Customize_Alpha_Color_Control( $wp_customize,'footer_widget_image_overlay_color', 
            array(
                'label'             =>  esc_html__('Widgets Image Overlay Color','dark-fusion' ),
                'active_callback'   =>  function($control) {
                                            return (
                                                dark_fusion_footer_widget_callback($control) &&
                                                dark_fusion_footer_widget_overlay_color_callback($control)
                                            );
                                        },
                'palette'           =>  true,
                'setting'           =>  'footer_widget_image_overlay_color',
                'section'           =>  'fwidgets_setting_section',
                'priority'          =>  9
            )
        ));


        /* ====================
                * Footer Bar
        ==================== */

        $wp_customize->add_section('footer_bar_section',
            array(
                'title'     =>  esc_html__('Footer Bar','dark-fusion' ),
                'panel'     =>  'dark_fusion_general_settings',
            )
        );

        // Enable / Disable footer bar
        $wp_customize->add_setting( 'footer_bar_enable',
            array(
                'default'           => true,
                'sanitize_callback' => 'dark_fusion_sanitize_checkbox'
            )
        );
        $wp_customize->add_control(new Dark_Fusion_Toggle_Control( $wp_customize, 'footer_bar_enable',
            array(
                'label'     =>  esc_html__( 'Enable/Disable Footer Bar', 'dark-fusion'  ),
                'setting'   =>  'footer_bar_enable',
                'section'   =>  'footer_bar_section',
                'type'      =>  'toggle',
                'priority'  =>  1
            )
        ));

        // Footer bar layouts
        $wp_customize->add_setting('footer_bar_layout', array(
                'default'   =>  1,
                'sanitize_callback' =>  'dark_fusion_sanitize_text'
            )
        );

        $wp_customize->add_control(new Dark_Fusion_Image_Radio_Button_Custom_Control($wp_customize, 'footer_bar_layout', 
            array(
                'label'             =>  esc_html__('Footer Bar layout', 'dark-fusion' ),
                'active_callback'   =>  'dark_fusion_footer_bar_callback',
                'setting'           =>  'footer_bar_layout',
                'section'           =>  'footer_bar_section',
                'priority'          =>  2,
            'choices'   => 
                array(
                    1 => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/footer-layout-1.png'),
                    2 => array('image' => trailingslashit( get_template_directory_uri() ) . '/inc/customizer/assets/img/footer-layout-2.png')
                )
            )
        ));
    

        // Footer bar section 1
        $wp_customize->add_setting('footer_bar_section1',
            array(
                'default'           =>  'custom_text',
                'capability'        =>  'edit_theme_options',
                'sanitize_callback' =>  'dark_fusion_sanitize_text'
            )
        );
        $wp_customize->add_control('footer_bar_section1', 
            array(
                'label'             =>  esc_html__('Section 1','dark-fusion' ),
                'section'           =>  'footer_bar_section',
                'setting'           =>  'footer_bar_section1',
                'active_callback'   =>  'dark_fusion_footer_bar_callback',
                'priority'          =>  3,
                'type'              =>  'select',
                'choices'           =>  array(
                    'none'          =>  esc_html__('None', 'dark-fusion' ),
                    'footer_menu'   =>  esc_html__('Footer Menu', 'dark-fusion' ),
                    'custom_text'   =>  esc_html__('Copyright Text', 'dark-fusion' )  
                )
            )
        );

        // Footer bar section 1 copyright textbox
        $wp_customize->add_setting('footer_copyright', 
            array(
                'default'           => '<p>'.__('Proudly powered by <a href="https://wordpress.org">WordPress</a> | Theme: Dark Fusion by <a href="https://spicethemes.com" rel="nofollow">Spicethemes</a>', 'dark-fusion' ).'</p>',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'dark_fusion_sanitize_text'
            )
        );
        $wp_customize->add_control('footer_copyright', 
            array(
                'label'             =>  esc_html__('Copyright Section 1','dark-fusion' ),
                'section'           =>  'footer_bar_section',
                'setting'           =>  'footer_bar_section1_copyright',
                'type'              =>  'textarea',
                'active_callback'   =>  'dark_fusion_footer_bar_callback',
                'priority'          =>  4
            )
        );

        // Footer bar section 2
        $wp_customize->add_setting('footer_bar_section2',
            array(
                'default'           =>  'custom_text',
                'capability'        =>  'edit_theme_options',
                'sanitize_callback' =>  'dark_fusion_sanitize_text'
            )
        );
        $wp_customize->add_control('footer_bar_section2', 
            array(
                'label'             =>  esc_html__('Section 2','dark-fusion' ),
                'section'           =>  'footer_bar_section',
                'setting'           =>  'footer_bar_section2',
                'active_callback'   =>  function($control) {
                                            return (
                                                    dark_fusion_footer_bar_callback($control) &&
                                                    dark_fusion_footer_bar_section_callback($control)
                                                    );
                },
                'priority'          =>  5,
                'type'              =>  'select',
                'choices'           =>  array(
                    'none'          =>  esc_html__('None', 'dark-fusion' ),
                    'footer_menu'   =>  esc_html__('Footer Menu', 'dark-fusion' ),
                    'custom_text'   =>  esc_html__('Copyright Text', 'dark-fusion' )         
                )
            )
        );

        // Footer bar section 2 copyright textbox
        $wp_customize->add_setting('footer_bar_section2_copyright', 
            array(
                'default'           => '<p>'.__('Proudly powered by <a href="https://wordpress.org">WordPress</a> | Theme: Dark Fusion by <a href="https://spicethemes.com" rel="nofollow">Spicethemes</a>', 'dark-fusion' ).'</p>',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'dark_fusion_sanitize_text'
            )
        );
        $wp_customize->add_control('footer_bar_section2_copyright', 
            array(
                'label'             =>  esc_html__('Copyright Section 2','dark-fusion' ),
                'section'           =>  'footer_bar_section',
                'setting'           =>  'footer_bar_section2_copyright',
                'type'              =>  'textarea',
                'active_callback'   =>  function($control) {
                                            return (
                                                    dark_fusion_footer_bar_callback($control) &&
                                                    dark_fusion_footer_bar_section_callback($control)
                                                    );
                },
                'priority'          =>  6
            )
        );


        // Enable Disable Footer bar border color */
        $wp_customize->add_setting( 'footer_bar_border_enable',
            array(
                'default'           => false,
                'sanitize_callback' => 'dark_fusion_sanitize_checkbox'
            )
        );
        $wp_customize->add_control(new Dark_Fusion_Toggle_Control( $wp_customize, 'footer_bar_border_enable',
            array(
                'label'             => esc_html__( 'Enable to apply the border settings', 'dark-fusion'  ),
                'section'           => 'footer_bar_section',
                'active_callback'   => 'dark_fusion_footer_bar_callback',
                'type'              => 'toggle',
                'priority'          => 7
            )
        ));
        // Footer bar border color
        $wp_customize->add_setting('footer_bar_border_color', 
            array(
                'default'           => '#3395a0',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_bar_border_color', 
            array(
                'label'             =>  esc_html__('Border Color', 'dark-fusion' ),
                'section'           =>  'footer_bar_section',
                'setting'          =>  'footer_bar_border_color',
                'priority'          =>  8,
                'active_callback'   =>  function($control) {
                                            return (
                                                    dark_fusion_footer_bar_callback($control) &&
                                                    dark_fusion_footer_bar_border_callback($control)
                                                    );
                }
            )
        ));

        // Footer Bar Border
        $wp_customize->add_setting('footer_bar_border',
            array(
                'default'       =>  2,
                'capability'    =>  'edit_theme_options',
                'sanitize_callback' =>  'dark_fusion_sanitize_text'
            )
        );

        $wp_customize->add_control( new Dark_Fusion_Slider_Custom_Control( $wp_customize, 'footer_bar_border',
            array(
                'label'             =>  esc_html__( 'Border Width', 'dark-fusion' ),
                'active_callback'   =>  function($control) {
                                            return (
                                                    dark_fusion_footer_bar_callback($control) &&
                                                    dark_fusion_footer_bar_border_callback($control)
                                                    );
                },
                'section'           =>  'footer_bar_section',
                'setting'           =>  'footer_bar_border',
                'priority'          =>  9,
                'input_attrs'   => array(
                    'min'   => 1,
                    'max'   => 50,
                    'step'  => 1,
                ),
            )
        ));


        // Footer bar border style
        $wp_customize->add_setting('footer_bar_border_style',
            array(
                'default'           =>  'solid',
                'capability'        =>  'edit_theme_options',
                'sanitize_callback' =>  'dark_fusion_sanitize_text'
            )
        );
        $wp_customize->add_control('footer_bar_border_style', 
            array(
                'label'             =>  esc_html__('Border Style','dark-fusion' ),
                'active_callback'   =>  function($control) {
                                            return (
                                                    dark_fusion_footer_bar_callback($control) &&
                                                    dark_fusion_footer_bar_border_callback($control)
                                                    );
                },
                'section'           =>  'footer_bar_section',
                'setting'           =>  'footer_bar_border_style',
                'type'              =>  'select',
                'priority'          =>  10,
                'choices'           =>  array(
                    'solid'         =>  esc_html__('Solid', 'dark-fusion'),
                    'dotted'        =>  esc_html__('Dotted', 'dark-fusion'),
                    'dashed'        =>  esc_html__('Dashed', 'dark-fusion'),
                    'double'        =>  esc_html__('Double', 'dark-fusion'),
                    'groove'        =>  esc_html__('Groove', 'dark-fusion'),
                    'ridge'         =>  esc_html__('Ridge', 'dark-fusion'),
                    'inset'         =>  esc_html__('Inset', 'dark-fusion'),
                    'outset'        =>  esc_html__('Outset', 'dark-fusion')
                )
            )
        );
}

add_action( 'customize_register', 'dark_fusion_general_settings_customizer' );
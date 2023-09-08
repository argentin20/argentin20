<?php
/**
 * Register widget area.
 *
*/
function dark_fusion_widgets_init() {

    /**
    * Sidebar widget area
    */
    register_sidebar(
        array(
            'name'          => esc_html__( 'Primary', 'dark-fusion' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets in right sidebar widget area', 'dark-fusion' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    /**
    * Footer1 widget area
    */
    register_sidebar(
        array(
            'name'          => esc_html__('Footer 1', 'dark-fusion' ),
            'id'            => 'footer-sidebar-1',
            'description'   => esc_html__('Add widgets in footer widget area 1', 'dark-fusion' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    /**
    * Footer2 widget area
    */
    register_sidebar(
        array(
            'name'          => esc_html__('Footer 2', 'dark-fusion' ),
            'id'            => 'footer-sidebar-2',
            'description'   => esc_html__('Add widgets in footer widget area 2', 'dark-fusion' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    /**
    * Footer3 widget area
    */
    register_sidebar(
        array(
            'name'          => esc_html__('Footer 3', 'dark-fusion' ),
            'id'            => 'footer-sidebar-3',
            'description'   => esc_html__('Add widgets in footer widget area 3', 'dark-fusion' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    /**
    * Footer4 widget area
    */
    register_sidebar(
        array(
            'name'          => esc_html__('Footer 4', 'dark-fusion' ),
            'id'            => 'footer-sidebar-4',
            'description'   => esc_html__('Add widgets in footer widget area 4', 'dark-fusion' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    /**
    * WooCommerce widget area
    */
    register_sidebar(
        array(
            'name'          => esc_html__('WooCommerce sidebar widget area', 'dark-fusion' ),
            'id'            => 'woocommerce',
            'description'   => esc_html__('Add widgets in WooCommerce sidebar widget area', 'dark-fusion' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}

add_action('widgets_init', 'dark_fusion_widgets_init');
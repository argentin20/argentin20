<?php

/**
 * Enqueue scripts and styles.
 */
function dark_fusion_scripts() {

    /* Enqueue the CSS scripts */
    $suffix = ( defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ) ? '' : '.min';

    wp_enqueue_style('animate', DARK_FUSION_TEMPLATE_DIR_URI. '/assets/css/animate.css');
    
    wp_enqueue_style('dark-fusion-menu-css', DARK_FUSION_TEMPLATE_DIR_URI. '/assets/css/theme-menu.css');
    wp_style_add_data('dark-fusion-menu-css', 'rtl', 'replace');

    wp_enqueue_style( 'dark-fusion-style', get_stylesheet_uri() );
    wp_style_add_data('dark-fusion-style', 'rtl', 'replace');

    if (get_theme_mod('custom_color_enable') == true) {
        add_action('wp_footer','dark_fusion_custom_color_css');
    }
    else {
    wp_enqueue_style('dark-fusion-default', DARK_FUSION_TEMPLATE_DIR_URI . '/assets/css/default.css');
    }
       
    wp_enqueue_style('font-awesome', DARK_FUSION_TEMPLATE_DIR_URI . '/assets/css/font-awesome/css/all' . $suffix . '.css', array(), '');

    /* Enqueue the JS scripts */

    wp_enqueue_script('dark-fusion-custom-js', DARK_FUSION_TEMPLATE_DIR_URI . '/assets/js/custom.js', array('jquery'), '', true);
    
    wp_enqueue_script('dark-fusion-menu-js', DARK_FUSION_TEMPLATE_DIR_URI . '/assets/js/menu/menu.js', array('jquery'), '', true);

    wp_enqueue_script('dark-fusion-main-js', DARK_FUSION_TEMPLATE_DIR_URI . '/assets/js/main.js', array('jquery'), '', true);

    wp_enqueue_script('jquery', DARK_FUSION_TEMPLATE_DIR_URI . '/assets/js/jquery' . $suffix . '.js', array('jquery'), '', true);

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'dark_fusion_scripts' );
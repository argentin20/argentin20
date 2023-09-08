<?php
/**
 * Active Callback for customizer settings
 *
 * @package Dark Fusion Theme
*/

// callback function for the footer copyright 
function dark_fusion_footer_copyright_callback($control) {
    if (true == $control->manager->get_setting('footer_copyright_enable')->value()) {
        return true;
    } else {
        return false;
    }
}

// callback function for the footer widgets 
function dark_fusion_footer_widgets_callback($control) {
    if (true == $control->manager->get_setting('footer_widget_enable')->value()) {
        return true;
    } else {
        return false;
    }
}

// callback function for the custom color
function dark_fusion_custom_color_callback($control) {
    if (true == $control->manager->get_setting('custom_color_enable')->value()) {
        return true;
    } else {
        return false;
    }
}

// callback function for the header typogyaphy
function dark_fusion_header_typography_callback($control) {
    if (false == $control->manager->get_setting('enable_header_typography')->value()) {
        return false;
    } else {
        return true;
    }
}

// callback function for the header typogyaphy
function dark_fusion_content_typography_callback($control) {
    if (false == $control->manager->get_setting('enable_content_typography')->value()) {
        return false;
    } else {
        return true;
    }
}

// callback function for the post typogyaphy
function dark_fusion_post_typography_callback($control) {
    if (false == $control->manager->get_setting('enable_post_typography')->value()) {
        return false;
    } else {
        return true;
    }
}

// callback function for the shop page typogyaphy
function dark_fusion_shop_typography_callback($control) {
    if (false == $control->manager->get_setting('enable_shop_typography')->value()) {
        return false;
    } else {
        return true;
    }
}

// callback function for the sidebar widget typogyaphy
function dark_fusion_sidebar_widget_typography_callback($control) {
    if (false == $control->manager->get_setting('enable_sidebar_typography')->value()) {
        return false;
    } else {
        return true;
    }
}

// callback function for the footer widget typogyaphy
function dark_fusion_footer_widget_typography_callback($control) {
    if (false == $control->manager->get_setting('enable_footer_typography')->value()) {
        return false;
    } else {
        return true;
    }
}

// callback function for the header color
function dark_fusion_header_color_callback($control) {
    if (false == $control->manager->get_setting('enable_header_color')->value()) {
        return false;
    } else {
        return true;
    }
}

// callback function for the menu color
function dark_fusion_menu_color_callback($control) {
    if (false == $control->manager->get_setting('enable_menu_color')->value()) {
        return false;
    } else {
        return true;
    }
}

// callback function for the content color
function dark_fusion_content_color_callback($control) {
    if (false == $control->manager->get_setting('enable_content_color')->value()) {
        return false;
    } else {
        return true;
    }
}

// callback function for the sidebar color
function dark_fusion_sidebar_color_callback($control) {
    if (false == $control->manager->get_setting('enable_sidebar_color')->value()) {
        return false;
    } else {
        return true;
    }
}

// callback function for the footer color
function dark_fusion_footer_color_callback($control) {
    if (false == $control->manager->get_setting('enable_footer_color')->value()) {
        return false;
    } else {
        return true;
    }
}
// callback function for the page title
function dark_fusion_page_title_callback($control) {
    if (false == $control->manager->get_setting('enable_page_title')->value()) {
        return false;
    } else {
        return true;
    }
}

//callback function for the breadcrumbs section
function dark_fusion_breadcrumb_section_callback($control) {
    if (false == $control->manager->get_setting('breadcrumb_banner_enable')->value()) {
        return false;
    } else {
        return true;
    }
}

//ReadMore Callback function
function dark_fusion_blog_readmore_callback ( $control ) 
{
    if( true == $control->manager->get_setting ('dark_fusion_enable_post_read_more')->value()){
        return true;
    }
    else {
        return false;
    }       
}

// callback function for the footer widget
function dark_fusion_footer_widget_callback($control) {
    if (true == $control->manager->get_setting('footer_widget_enable')->value()) {
        return true;
    } else {
        return false;
    }
}

    // callback function for the footer widget overlay color
function dark_fusion_footer_widget_overlay_color_callback($control) {
    if (true == $control->manager->get_setting('footer_widget_image_overlay_enable')->value()) {
        return true;
    } else {
        return false;
    }
}

function dark_fusion_scroll_to_top_callback($control) {
    if (true == $control->manager->get_setting('scrolltotop_setting_enable')->value()) {
        return true;
    } else {
        return false;
    }
}
// callback function for the scroll to top color
function dark_fusion_scroll_to_top_color_callback($control) {
    if (true == $control->manager->get_setting('scroll_to_top_color_enable')->value()) {
        return true;
    } else {
        return false;
    }
}

// callback function for the footer bar
function dark_fusion_footer_bar_callback($control) {
    if (true == $control->manager->get_setting('footer_bar_enable')->value()) {
        return true;
    } else {
        return false;
    }
}

// callback function for the footer bar sections
function dark_fusion_footer_bar_section_callback($control) {
    if ($control->manager->get_setting('footer_bar_layout')->value() == '1') {
        return false;
    }
    return true;
}

// callback function for the footer bar enable
function dark_fusion_footer_bar_border_callback($control) {
    if (false == $control->manager->get_setting('footer_bar_border_enable')->value()) {
        return false;
    } else {
        return true;
    }
}
// callback function for footer bar color
function dark_fusion_footer_bar_color_callback($control) {
    if (false == $control->manager->get_setting('enable_footer_bar')->value()) {
        return false;
    } else {
        return true;
    }
}

// callback function for footer bar callback
function dark_fusion_footer_bar_typography_callback($control) {
    if (false == $control->manager->get_setting('enable_footer_bar_typography')->value()) {
        return false;
    } else {
        return true;
    }
}
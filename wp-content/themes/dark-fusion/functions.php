<?php
/**
 * Dark Fusion functions and definitions
 *
 * @package Dark Fusion Theme
 */

// Global variables define
define('DARK_FUSION_TEMPLATE_DIR_URI', get_template_directory_uri());
define('DARK_FUSION_TEMPLATE_DIR', get_template_directory());


// wp_body_open function definition
if ( ! function_exists( 'wp_body_open' ) ) {

    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action( 'wp_body_open' );
    }
}

/**
 * Load all core theme function files
*/
require DARK_FUSION_TEMPLATE_DIR . '/inc/scripts/script.php';
require DARK_FUSION_TEMPLATE_DIR . '/inc/helpers.php';
require DARK_FUSION_TEMPLATE_DIR . '/inc/breadcrumbs/breadcrumbs.php';
require DARK_FUSION_TEMPLATE_DIR . '/inc/customizer/customizer.php';
require DARK_FUSION_TEMPLATE_DIR . '/inc/menu/default_menu_walker.php';
require DARK_FUSION_TEMPLATE_DIR . '/inc/menu/dark_fusion_nav_walker.php';
require DARK_FUSION_TEMPLATE_DIR . '/inc/theme-color/custom-color.php';
require DARK_FUSION_TEMPLATE_DIR . '/partials/widgets/register-sidebars.php';
// Meta boxes.
require DARK_FUSION_TEMPLATE_DIR . '/inc/meta-boxes/dark-fusion-meta-box.php'; 


require DARK_FUSION_TEMPLATE_DIR . '/inc/class-tgm-plugin-activation.php';	
require DARK_FUSION_TEMPLATE_DIR . '/inc/breadcrumbs/breadcrumbs.php';
require DARK_FUSION_TEMPLATE_DIR . '/inc/theme-color/color-background.php';
require DARK_FUSION_TEMPLATE_DIR . '/inc/typography/custom-typography.php';
require DARK_FUSION_TEMPLATE_DIR . '/inc/typography/webfonts.php';


if ( ! function_exists( 'dark_fusion_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
		function dark_fusion_setup() {
			/*
			 * Make theme available for translation.
			 * Translations can be filed in the /languages/ directory.
			 * If you're building a theme based on dark-fusion, use a find and replace
			 * to change 'dark-fusion' to the name of your theme in all the template files.
			 */
			load_theme_textdomain( 'dark-fusion', DARK_FUSION_TEMPLATE_DIR . '/languages' );

			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );

			/*
			 * Let WordPress manage the document title.
			*/
			add_theme_support( 'title-tag' );

			/*
			 * Enable support for Post Thumbnails on posts and pages.
			*/
			add_theme_support( 'post-thumbnails' );

			// This theme uses wp_nav_menu() in one location.
			register_nav_menus(
				array(
					'primary' => esc_html__( 'Primary Menu', 'dark-fusion' ),
                    'footer_menu' => esc_html__( 'Footer Menu', 'dark-fusion' ),
				)
			);          
			// Set up the WordPress core custom background feature.
			add_theme_support('custom-background');

			// woocommerce support
        	add_theme_support('woocommerce');

        	// Woocommerce Gallery Support
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );

			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );

			/*
			 * Add support for core custom logo.
			*/
			add_theme_support('custom-logo',
				array(
					'height'      => 45,
					'width'       => 235,
					'flex-width'  => true,
					'flex-height' => true,
					'header-text' => array('site-title', 'site-description')
				)
			);
			//About Theme	         
            $dark_fusion_theme = wp_get_theme(); // gets the current theme
            if ('Dark Fusion' == $dark_fusion_theme->name || 'Dark Fusion Child' == $dark_fusion_theme->name || 'Dark Fusion child' == $dark_fusion_theme->name ) {
                if (is_admin()) {                       
                    require DARK_FUSION_TEMPLATE_DIR . '/admin/admin-init.php';
                }
            }	     

		}
endif;
add_action( 'after_setup_theme', 'dark_fusion_setup' );


/**
 * Register the required plugins for this theme.
*/
    function dark_fusion_register_required_plugins() {
        /*
         * Array of plugin arrays. Required keys are name and slug.
         * If the source is NOT from the .org repo, then source is also required.
         */
        $plugins = array(
             // This is an example of how to include a plugin from the WordPress Plugin Repository.
            array(
                'name'      => 'Spice Blocks',
                'slug'      => 'spice-blocks',
                'required'  => false,
            ),
            
        );

        /*
         * Array of configuration settings. Amend each line as needed.
         *
         * TGMPA will start providing localized text strings soon. If you already have translations of our standard
         * strings available, please help us make TGMPA even better by giving us access to these translations or by
         * sending in a pull-request with .po file(s) with the translations.
         *
         * Only uncomment the strings in the config array if you want to customize the strings.
         */
        $config = array(
            'id'           =>	'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => 	'',                      // Default absolute path to bundled plugins.
            'menu'         => 	'tgmpa-install-plugins', // Menu slug.
            'has_notices'  => 	true,                    // Show admin notices or not.
            'dismissable'  => 	true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg'  => 	'',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => 	false,                   // Automatically activate plugins after installation or not.
            'message'      => 	''                      // Message to output right before the plugins table.
        );

        tgmpa( $plugins, $config );
    }
    add_action( 'tgmpa_register', 'dark_fusion_register_required_plugins' );



// Theme title
if (!function_exists('dark_fusion_head_title')) {

    function dark_fusion_head_title($title, $sep) {
        global $paged, $page;

        if (is_feed())
            return $title;

        // Add the site name
        $title .= get_bloginfo('name');

        // Add the site description for the home / front page
        $site_description = get_bloginfo('description');
        if ($site_description && ( is_home() || is_front_page() ))
            $title = "$title $sep $site_description";

        // Add a page number if necessary.
        if (( $paged >= 2 || $page >= 2 ) && !is_404())
            $title = "$title $sep " . sprintf(esc_html__('Page', 'dark-fusion' ), max($paged, $page));

        return $title;
    }

}
add_filter('wp_title', 'dark_fusion_head_title', 10, 2);


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dark_fusion_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dark_fusion_content_width', 640 );
}
add_action( 'after_setup_theme', 'dark_fusion_content_width', 0 );

function dark_fusion_check_breadcrumb_enable(){
    if ( function_exists('yoast_breadcrumb') ) {
        $seo_bread_title = get_option('wpseo_titles');
        if($seo_bread_title['breadcrumbs-enable'] == true) {?>
            <style type="text/css">
                .page-title-section .spice-col-3,.page-title-section h1,.page-title-section h2,.page-title-section h3,.page-title-section h4,.page-title-section h5,.page-title-section h1,.page-title-section h6,.page-title-section span,.page-title-section p{
                    margin:auto;
                }
            </style>
            <?php
        }
    }
}
add_action('wp_head','dark_fusion_check_breadcrumb_enable');

function dark_fusion_disable_banner_style(){
    if (get_theme_mod('breadcrumb_banner_enable', true) == false): ?>
        <style type="text/css">
            .header-sidebar {background-color: rgba(0,0,0,0.6);} 
         </style>              
    <?php endif;
}
add_action('wp_head','dark_fusion_disable_banner_style');

function dark_fusion_blog_readmore_style(){
    if(get_theme_mod('dark_fusion_read_more_align','right')=='left'):?>
        <style type="text/css">
            body .post .entry-content .more-link{
                float: left;
            }
            body .footer-meta.entry-meta{
                float: right;
            }
        </style>
    <?php 
    endif;
}
add_action('wp_head','dark_fusion_blog_readmore_style');


// Notice to add required plugin
function dark_fusion_admin_plugin_notice_warn() {
    $theme_name=wp_get_theme();
    if ( get_option( 'dismissed-dark_fusion_comanion_plugin', false ) ) {
       return;
    }
    if ( class_exists('Spice_Blocks')) {
        return;
    }?>

    <div class="updated notice is-dismissible dark-fusion-theme-notice">

        <div class="owc-header">
            <div class="spice-blocks-logo-theme">
                <img src="<?php echo DARK_FUSION_TEMPLATE_DIR_URI.'/assets/images/spice-blocks-logo.png'?>">
            </div>
        </div>

        <div class="dark-fusion-theme-content">
            <h3><?php printf( esc_html__('Thank you for installing the %1$s theme.', 'dark-fusion'), esc_html($theme_name)); ?></h3>

            <p><?php printf(esc_html_e( 'We highly recommend you to install and activate the', 'dark-fusion' )); ?>
                <b><?php printf(esc_html_e( 'Spice Blocks', 'dark-fusion' )); ?></b><?php printf(esc_html_e(' plugin.', 'dark-fusion' )); ?>
                <br>
                <?php printf(esc_html_e( 'This plugin will unlock enhanced features to build a beautiful website. You can get access:', 'dark-fusion' )); ?>
                <ul style="padding: revert; list-style-type:disc;">
                    <li><b><?php printf(esc_html_e( 'Custom Blocks', 'dark-fusion' )); ?></b></li>
                    <li><b><?php printf(esc_html_e( 'Free Block Templates, and much more.', 'dark-fusion' )); ?></b></li>
                </ul>
            </p>
            <?php
           
            $dark_fusion_companion_about_page=dark_fusion_about_page();            
            
            $dark_fusion_actions = $dark_fusion_companion_about_page->recommended_actions;
            $dark_fusion_actions_todo = get_option( 'recommended_actions', false );
            if($dark_fusion_actions): 
                foreach ($dark_fusion_actions as $key => $dark_fusion_val):
                    if($dark_fusion_val['id']=='install_spice-blocks'):
                        /* translators: %s: theme name */
                        echo '<p>'.wp_kses_post($dark_fusion_val['link']).'</p>';
                    endif;
                endforeach;
            endif;?>
        </div>

    </div>
    
    <script type="text/javascript">
        jQuery(function($) {
        $( document ).on( 'click', '.dark-fusion-theme-notice .notice-dismiss', function () {
            var type = $( this ).closest( '.dark-fusion-theme-notice' ).data( 'notice' );
            $.ajax( ajaxurl,
              {
                type: 'POST',
                data: {
                  action: 'dismissed_notice_handler',
                  type: type,
                }
              } );
          } );
      });
    </script>
<?php

}
add_action( 'admin_notices', 'dark_fusion_admin_plugin_notice_warn' );
add_action( 'wp_ajax_dismissed_notice_handler', 'dark_fusion_ajax_notice_handler');

function dark_fusion_ajax_notice_handler() {
    update_option( 'dismissed-dark_fusion_comanion_plugin', TRUE );
}

function dark_fusion_notice_style(){?>
    <style type="text/css">
        #dark-fusion-header-page-metabox-options .tg-label.breadcrumbs input[type=radio] {
            display: none;
        }
        .dark-fusion-theme-notice .spice-blocks-logo-theme{
          padding-top: 15px;
        }
        .dark-fusion-theme-notice p{
            font-size: 14px;
        }
        .updated.notice.dark-fusion-theme-notice h3{
            margin: 0;
        }
        div.dark-fusion-theme-notice.updated {
            border-left-color: #3395a0;
        }
        .dark-fusion-theme-content{
            padding: 0 0 1.2rem 3.57rem;
        }
    </style>
<?php
}
add_action('admin_enqueue_scripts','dark_fusion_notice_style');
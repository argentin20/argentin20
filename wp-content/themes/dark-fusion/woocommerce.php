<?php
/**
* The template for displaying woocommerce products
* 
* @package Dark Fusion Theme
*/
get_header();
do_action( 'dark_fusion_breadcrumbs_hook' );
global $woocommerce; 

if((get_post_meta(wc_get_page_id('shop'),'dark_fusion_site_layout', true )=='dark_fusion_site_layout_stretched') || (get_theme_mod('page_sidebar_layout','right')=='stretched')) 
    {
        $dark_fusion_page_class='stretched';   
    }
else 
    {
        $dark_fusion_page_class='';
    }

    if(get_post_meta(wc_get_page_id('shop'),'dark_fusion_site_layout', true ) =='')
    {
        if((get_theme_mod('page_sidebar_layout','right')=='right') || get_theme_mod('page_sidebar_layout','right')=='left')
        {
            $page_column='<div class="spice-col-2">';
        }
        else
        {
            $page_column='<div class="spice-col-1">'; 
        }
    } 
    else if(get_post_meta(wc_get_page_id('shop'),'dark_fusion_site_layout', true ) == 'dark_fusion_site_layout_left')
    {  
        $page_column='<div class="spice-col-2">';
    }
    else if(get_post_meta(wc_get_page_id('shop'),'dark_fusion_site_layout', true ) == 'dark_fusion_site_layout_right')
    {
        $page_column='<div class="spice-col-2">';
    }
    else if(get_post_meta(wc_get_page_id('shop'),'dark_fusion_site_layout', true ) == 'dark_fusion_site_layout_without_sidebar')
    {
        $page_column='<div class="spice-col-1">';
    }
    else
    {
        $page_column='<div class="spice-col-1">';
    }   
?>
<section class="page-section-space blog bg-default <?php echo esc_attr($dark_fusion_page_class);?>" id="content">
    <div class="spice-container<?php echo esc_html(dark_fusion_container_width_page_layout());?>">
        <div class="spice-row">	
            <?php
            if(get_theme_mod('bredcrumb_position','page_header')=='content_area'):
                echo '<div class="spice-col-1">';
                do_action('dark_fusion_breadcrumbs_page_title_hook');
                echo '</div>';
            endif;
            if(((get_theme_mod('page_sidebar_layout','right')=='left') && get_post_meta(wc_get_page_id('shop'),'dark_fusion_site_layout', true )== '') || get_post_meta(wc_get_page_id('shop'),'dark_fusion_site_layout', true )=='dark_fusion_site_layout_left')    
            {
                if (is_active_sidebar('woocommerce')) {
                    get_sidebar('woocommerce');
                }
            }
             echo  $page_column; ?>
                <?php woocommerce_content(); ?>
            </div>	
            <?php
             if(((get_theme_mod('page_sidebar_layout','right')=='right') && get_post_meta(wc_get_page_id('shop'),'dark_fusion_site_layout', true )=='') || get_post_meta(wc_get_page_id('shop'),'dark_fusion_site_layout', true )=='dark_fusion_site_layout_right')   
            {
                if (is_active_sidebar('woocommerce')) {
                    get_sidebar('woocommerce');
                }
            }
            ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
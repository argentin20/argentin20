<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package Dark Fusion Theme
 */

get_header();
do_action( 'dark_fusion_breadcrumbs_hook' );
if((get_post_meta(get_the_ID(),'dark_fusion_site_layout', true )=='dark_fusion_site_layout_stretched') || (get_theme_mod('page_sidebar_layout','right')=='stretched')) 
    {
        $dark_fusion_page_class='stretched';   
    }
else 
    {
        $dark_fusion_page_class='';
    }

$dark_fusion_page_sidebar = get_post_meta(get_the_ID(),'dark_fusion_page_sidebar', true );
if($dark_fusion_page_sidebar =='') { $dark_fusion_page_sidebar = 'sidebar-1';}
if(get_post_meta(get_the_ID(),'dark_fusion_site_layout', true ) =='')
{
    if(get_theme_mod('page_sidebar_layout','right')=='right' || get_theme_mod('page_sidebar_layout','right')=='left'):        
       $page_column='<div class="spice-col-2">';
    else:
        $page_column='<div class="spice-col-1">';   
    endif;
}
else if(get_post_meta(get_the_ID(),'dark_fusion_site_layout', true ) == 'dark_fusion_site_layout_left')
{  
    $page_column='<div class="spice-col-2">';
}
else if(get_post_meta(get_the_ID(),'dark_fusion_site_layout', true ) == 'dark_fusion_site_layout_right')
{
    $page_column='<div class="spice-col-2">';
}
else if(get_post_meta(get_the_ID(),'dark_fusion_site_layout', true ) == 'dark_fusion_site_layout_without_sidebar')
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
                    
            if(((get_theme_mod('page_sidebar_layout','right')=='left') && get_post_meta(get_the_ID(),'dark_fusion_site_layout', true )== '') || get_post_meta(get_the_ID(),'dark_fusion_site_layout', true )=='dark_fusion_site_layout_left'):
                echo '<div class="spice-col-4 1"><div class="sidebar"><div class="left-sidebar">';
                    dynamic_sidebar($dark_fusion_page_sidebar); 
                echo '</div></div></div>';
            endif;
            if (class_exists('WooCommerce')) {

                if (is_account_page() || is_cart() || is_checkout()) {
                    echo  $page_column;
                } 
                else {
                    echo  $page_column;
                }
            } 
            else {
                echo  $page_column;
            }
            if (class_exists('WooCommerce')) {
                if (is_account_page() || is_cart() || is_checkout()) {
                    while (have_posts()) : the_post();
                        get_template_part('template-parts/content', 'page');
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                    endwhile;
                } 
                else {
                    while (have_posts()) : the_post();
                        get_template_part('template-parts/content', 'page');
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                    endwhile;
                }
            } 
            else {
                while (have_posts()) : the_post();
                    get_template_part('template-parts/content', 'page');
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                endwhile;
            }
            ?>
        </div>  
        <?php 
        if (class_exists('WooCommerce')) {
            if (is_account_page() || is_cart() || is_checkout()) {
                if(((get_theme_mod('page_sidebar_layout','right')=='right') && get_post_meta(get_the_ID(),'dark_fusion_site_layout', true )=='') || get_post_meta(get_the_ID(),'dark_fusion_site_layout', true )=='dark_fusion_site_layout_right')
                    {
                        echo '<div class="spice-col-4 2"><div class="sidebar"><div class="right-sidebar">';
                            dynamic_sidebar($dark_fusion_page_sidebar); 
                        echo '</div></div></div>';
                    }  
            } 
            else {
                if(((get_theme_mod('page_sidebar_layout','right')=='right') && get_post_meta(get_the_ID(),'dark_fusion_site_layout', true )=='') || get_post_meta(get_the_ID(),'dark_fusion_site_layout', true )=='dark_fusion_site_layout_right'):
                    echo '<div class="spice-col-4 4"><div class="sidebar"><div class="right-sidebar">';
                    dynamic_sidebar($dark_fusion_page_sidebar);
                    echo '</div></div></div>';
            endif;
            }
        } 
        else {
            if(((get_theme_mod('page_sidebar_layout','right')=='right') && get_post_meta(get_the_ID(),'dark_fusion_site_layout', true )=='') || get_post_meta(get_the_ID(),'dark_fusion_site_layout', true )=='dark_fusion_site_layout_right'):
                echo '<div class="spice-col-4 5"><div class="sidebar"><div class="right-sidebar">';
                    dynamic_sidebar($dark_fusion_page_sidebar); 
                echo '</div></div></div>';
        endif;
        } ?>
    </div>
</section>
<?php
get_footer();
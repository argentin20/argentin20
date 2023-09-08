<?php
/**
 * The template for displaying all single posts
 *
 * @package Dark Fusion Theme
 */

get_header();
do_action( 'dark_fusion_breadcrumbs_hook' );
if((get_post_meta(get_the_ID(),'dark_fusion_site_layout', true )=='dark_fusion_site_layout_stretched') || (get_theme_mod('single_blog_sidebar_layout','right')=='stretched')) 
    {
        $dark_fusion_page_class='stretched';   
    }
else 
    {
        $dark_fusion_page_class='';
    }

$dark_fusion_page_sidebar = get_post_meta(get_the_ID(),'dark_fusion_page_sidebar', true );
if($dark_fusion_page_sidebar =='') { $dark_fusion_page_sidebar ='sidebar-1';} ?>
<section class="page-section-space blog bg-default <?php echo esc_attr($dark_fusion_page_class);?>" id="content">
    <div class="spice-container<?php echo esc_html(dark_fusion_container_width_single_post_layout());?>">
        <div class="spice-row"> 
        <?php 
        if(get_theme_mod('bredcrumb_position','page_header')=='content_area'):
            echo '<div class="spice-col-1">';
            do_action('dark_fusion_breadcrumbs_page_title_hook');
            echo '</div>';
        endif;
        if(get_post_meta(get_the_ID(),'dark_fusion_site_layout', true ) == '' )
        {
         if(get_theme_mod('single_blog_sidebar_layout','right')=='left'):
            echo '<div class="spice-col-4"><div class="sidebar"><div class="left-sidebar">';
                  dynamic_sidebar($dark_fusion_page_sidebar); 
            echo '</div></div></div>';
         endif;  
         if(get_theme_mod('single_blog_sidebar_layout','right')=='right'|| get_theme_mod('single_blog_sidebar_layout','right')=='left'):        
             echo '<div class="spice-col-2">';
         else:
             echo '<div class="spice-col-1">';   
         endif;
        }
        else if(get_post_meta(get_the_ID(),'dark_fusion_site_layout', true ) == 'dark_fusion_site_layout_left')
        {   
            echo '<div class="spice-col-4"><div class="sidebar"><div class="left-sidebar">';
                    dynamic_sidebar($dark_fusion_page_sidebar); 
            echo '</div></div></div>';
            echo '<div class="spice-col-2">';
        } 
        else if(get_post_meta(get_the_ID(),'dark_fusion_site_layout', true ) == 'dark_fusion_site_layout_right')
        {
            echo '<div class="spice-col-2">';
        } 
        else if(get_post_meta(get_the_ID(),'dark_fusion_site_layout', true ) == 'dark_fusion_site_layout_without_sidebar')
        {
            echo '<div class="spice-col-1">'; 
        }
        else
        {
            echo '<div class="spice-col-1">'; 
        }
            
        while (have_posts()): the_post();            
            get_template_part('template-parts/content', 'single');
        endwhile; 

        // Author Details
        if (get_theme_mod('dark_fusion_enable_single_post_admin_details', true) === true):
            do_action( 'dark_fusion_single_post_auth_detail' );
        endif;

        if (comments_open() || get_comments_number()) : comments_template();
        endif;
        ?>
        </div>
        <!-- Sidebar --> 
        <?php if(((get_theme_mod('single_blog_sidebar_layout','right')=='right') && get_post_meta(get_the_ID(),'dark_fusion_site_layout', true )=='') ||  get_post_meta(get_the_ID(),'dark_fusion_site_layout', true )=='dark_fusion_site_layout_right'):
                echo '<div class="spice-col-4"><div class="sidebar"><div class="right-sidebar">';
                    dynamic_sidebar($dark_fusion_page_sidebar); 
                echo '</div></div></div>';
        endif;?>
        </div>
    </div>
</section>
<?php
get_footer();
<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package Dark Fusion Theme
 */

get_header();
do_action( 'dark_fusion_breadcrumbs_hook' );
if((get_post_meta(get_option('page_for_posts', true),'dark_fusion_site_layout', true )=='dark_fusion_site_layout_stretched') || (get_theme_mod('blog_sidebar_layout','right')=='stretched')) 
    {
        $dark_fusion_page_class='stretched';   
    }
else 
    {
        $dark_fusion_page_class='';
    }
$dark_fusion_page_sidebar = get_post_meta(get_option('page_for_posts', true),'dark_fusion_page_sidebar', true );
if($dark_fusion_page_sidebar =='') { $dark_fusion_page_sidebar = 'sidebar-1';} ?>
 
<section class="page-section-space blog bg-default <?php echo esc_attr($dark_fusion_page_class);?>" id="content">
    <div class="spice-container<?php echo esc_html(dark_fusion_container_width_post_layout());?>">
        <div class="spice-row">
            <?php
            if(get_theme_mod('bredcrumb_position','page_header')=='content_area'):
                echo '<div class="spice-col-1">';
                do_action('dark_fusion_breadcrumbs_page_title_hook');
                echo '</div>';
            endif;
                    
            if(get_post_meta(get_option('page_for_posts', true),'dark_fusion_site_layout', true )=='')
            {
                if(get_theme_mod('blog_sidebar_layout','right')=='left'):
                    echo '<div class="spice-col-4"><div class="sidebar"><div class="left-sidebar">';
                        dynamic_sidebar($dark_fusion_page_sidebar); 
                    echo '</div></div></div>';
                    endif;
                if(get_theme_mod('blog_sidebar_layout','right')=='right'|| get_theme_mod('blog_sidebar_layout','right')=='left'):        
                    echo '<div class="spice-col-2">';
                else:
                    echo '<div class="spice-col-1">';   
                endif;
            }
            else if(get_post_meta(get_option('page_for_posts', true),'dark_fusion_site_layout', true ) == 'dark_fusion_site_layout_left')
            {
                echo '<div class="spice-col-4"><div class="sidebar"><div class="left-sidebar">';
                    dynamic_sidebar($dark_fusion_page_sidebar); 
                echo '</div></div></div>';
                echo '<div class="spice-col-2">';
            }
            else if(get_post_meta(get_option('page_for_posts', true),'dark_fusion_site_layout', true ) == 'dark_fusion_site_layout_right')
            {
                echo '<div class="spice-col-2">';
            }
            else if(get_post_meta(get_option('page_for_posts', true),'dark_fusion_site_layout', true ) =='dark_fusion_site_layout_without_sidebar')
            {
                echo '<div class="spice-col-1">'; 
            }
            else
            {
                echo '<div class="spice-col-1">';
            }
            if (have_posts()):
               
                while (have_posts()): the_post();

                    get_template_part( 'template-parts/content');
                   
                endwhile;
               
                else:
                    get_template_part('template-parts/content', 'none');
                endif;

            echo '<div class="clrfix"></div>';
            // pagination
                do_action('dark_fusion_page_navigation');
            ?>
        </div>
        <!-- Sidebar -->   
        <?php if(((get_theme_mod('blog_sidebar_layout','right')=='right') && get_post_meta(get_option('page_for_posts', true),'dark_fusion_site_layout', true )=='') || get_post_meta(get_option('page_for_posts', true),'dark_fusion_site_layout', true )=='dark_fusion_site_layout_right'):
            echo '<div class="spice-col-4"><div class="sidebar"><div class="right-sidebar">';
                dynamic_sidebar($dark_fusion_page_sidebar); 
            echo '</div></div></div>';
        endif;?>
    </div>
</section>  
<?php
get_footer();
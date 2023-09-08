<?php
/**
 * The template for displaying archive pages
 *
 * @package Dark Fusion Theme
 */

get_header();

do_action( 'dark_fusion_breadcrumbs_hook' );

$dark_fusion_page_sidebar=get_post_meta(get_option('page_for_posts', true),'dark_fusion_page_sidebar', true );
if($dark_fusion_page_sidebar =='') { $dark_fusion_page_sidebar = 'sidebar-1'; } ?>
 
<section class="page-section-space blog bg-default" id="content">

    <div class="spice-container<?php echo esc_html(dark_fusion_container_width_post_layout());?>">
        <div class="spice-row">
            <?php
            if(get_theme_mod('bredcrumb_position','page_header')=='content_area'):
                echo '<div class="spice-col-1">';
                do_action('dark_fusion_breadcrumbs_page_title_hook');
                echo '</div>';
            endif;

            if(get_theme_mod('blog_sidebar_layout','right')=='left'): 
                echo '<div class="spice-col-4"><div class="sidebar"><div class="left-sidebar">';
                    dynamic_sidebar($dark_fusion_page_sidebar); 
                    echo '</div></div></div>';
                 endif;
            if(get_theme_mod('blog_sidebar_layout','right')=='right' || get_theme_mod('blog_sidebar_layout','right')=='left'):        
                echo '<div class="spice-col-2">';
            else:
                echo '<div class="spice-col-1">';   
            endif;

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
            <?php if(get_theme_mod('blog_sidebar_layout','right')=='right'):
                echo '<div class="spice-col-4"><div class="sidebar"><div class="right-sidebar">';
                    dynamic_sidebar($dark_fusion_page_sidebar);
                echo '</div></div></div>';
            endif;?>
        </div>
    </div>
</section> 
<?php
get_footer();
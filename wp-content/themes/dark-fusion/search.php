<?php
/**
 * The template for displaying search results pages
 *
 * @package Dark Fusion Theme
 */

get_header();
do_action( 'dark_fusion_breadcrumbs_hook' );
?>
<section class="page-section-space blog bg-default" id="content">
    <div class="spice-container<?php echo esc_html(dark_fusion_container_width_page_layout());?>">
        <div class="spice-row">
            <?php
            if(get_theme_mod('bredcrumb_position','page_header')=='content_area'):
                echo '<div class="spice-col-1">';
                do_action('dark_fusion_breadcrumbs_page_title_hook');
                echo '</div>';
            endif;
            
            if ( is_active_sidebar( 'sidebar-1' ) ):        
                echo '<div class="spice-col-2">';
            else:
                echo '<div class="spice-col-1">';   
            endif; 

            if (have_posts()): 
                while (have_posts()): the_post();
                    
                    get_template_part( 'template-parts/content','search');
                  
                endwhile;
            else:
                get_template_part('template-parts/content', 'none');
            endif;

            // pagination
            do_action('dark_fusion_page_navigation');
            ?>		
            </div>	
            <?php get_sidebar();?>
        </div>
    </div>
</section>  
<?php
get_footer();
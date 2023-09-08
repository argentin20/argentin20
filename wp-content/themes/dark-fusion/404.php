<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Dark Fusion Theme
 */

get_header();
?>
<section class="section-space error-page bg-default" id="content">
	<div class="spice-container<?php echo esc_html(dark_fusion_container_width_page_layout());?> justify-content-center">
		<div class="spice-row">
			<?php
            if(get_theme_mod('bredcrumb_position','page_header')=='content_area'):
                echo '<div class="spice-col-1">';
                do_action('dark_fusion_breadcrumbs_page_title_hook');
                echo '</div>';
            endif;?>
		   	<div class="spice-col-1">
			    <div class="text-center justify-content-center error_404">
			    	<h2 class="title"><?php esc_html_e('4','dark-fusion');?><span><?php esc_html_e('0','dark-fusion');?></span><?php esc_html_e('4','dark-fusion');?></h2>

			    	<div class="content-404">
						<h2 class="contact-title"><?php esc_html_e('Page Not Found','dark-fusion'); ?> </h2>
						<p><?php esc_html_e('The page you are looking for is not found','dark-fusion'); ?></p>
						<a href="<?php echo esc_url(home_url('/')); ?>" >
							<button class="btn" type="button">
							<?php esc_html_e('BACK TO Home','dark-fusion'); ?></button>
						</a>
				 	</div> 	
			    </div>		 
			</div>
		</div>
    </div>
</section>
<?php
get_footer();
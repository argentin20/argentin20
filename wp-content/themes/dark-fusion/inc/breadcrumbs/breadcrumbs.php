<?php
/**
 * theme breadcurmbs section
 *
 * @package Dark Fusion Theme
*/
if (!function_exists('dark_fusion_breadcrumbs')):

	function dark_fusion_breadcrumbs() { 
		$enable_disable_banner = get_theme_mod('breadcrumb_banner_enable', true); 
		$breadcrumb='';
		if ($enable_disable_banner == true) { ?>
			<section class="page-title-section" <?php if( get_header_image() ){ ?> style="background:#17212c url('<?php header_image(); ?>'); background-size: cover;" <?php } ?> >
				<div class="breadcrumb-overlay"></div>
				<div class="spice-container">
					<div class="spice-row">
					<?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
					if ( function_exists('yoast_breadcrumb') ) {
						$seo_bread_title = get_option('wpseo_titles');
				        if($seo_bread_title['breadcrumbs-enable'] == true) {
				         	$breadcrumbs = yoast_breadcrumb("","",false);
				           	$breadcrumb='<ul class="page-breadcrumb">
				           					<li>'.wp_kses_post($breadcrumbs).'</li>
				           				</ul>';
				        }   
					}
					if(get_theme_mod('bredcrumb_position','page_header')=='page_header'  && get_theme_mod('breadcrumb_enable',true)==true):
					    $breadcrumb_col='3';
				    else:
				    	$breadcrumb_col='1';
				    endif;
				    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
						$breadcrumb_enable_disable	= get_theme_mod('breadcrumb_enable',true);
						$dark_fusion_breadcrumbs_choice=get_post_meta(get_the_ID(),'dark_fusion_show_breadcrumb', true );
						if($dark_fusion_breadcrumbs_choice == ''){
		                    if($breadcrumb_enable_disable == true ){
								if ( function_exists('yoast_breadcrumb') ){
									$seo_bread_title = get_option('wpseo_titles');
								    if($seo_bread_title['breadcrumbs-enable'] == true ) {
								        $breadcrumbs = yoast_breadcrumb("","",false);
								        $breadcrumb='<ul class="page-breadcrumb">
								           				<li>'.wp_kses_post($breadcrumbs).'</li>
								           			</ul>';
								    }							       
								}
							}
						}
						elseif($dark_fusion_breadcrumbs_choice == 'dark_fusion_breadcrumbs_enable'){
							if ( function_exists('yoast_breadcrumb') ){
								$seo_bread_title = get_option('wpseo_titles');
							    if($seo_bread_title['breadcrumbs-enable'] == true ) {
							        $breadcrumbs = yoast_breadcrumb("","",false);
							        $breadcrumb='<ul class="page-breadcrumb">
							           				<li>'.wp_kses_post($breadcrumbs).'</li>
							           			</ul>';
							    }							       
							}
						}
					    if(get_theme_mod('bredcrumb_alignment','centered')=='parallel'){ 
					    	if(get_theme_mod('bredcrumb_position','page_header')=='page_header'):
					    		echo '<div class="spice-col-3 parallel">';
					    		do_action('dark_fusion_breadcrumbs_page_title_hook');
					    		echo '</div>';
					    	endif;
					    	if($breadcrumb){echo '<div class="spice-col-'.$breadcrumb_col.' parallel">'.$breadcrumb.'</div>';} 
					    }
					    elseif(get_theme_mod('bredcrumb_alignment','centered')=='parallelr'){
					    	if($breadcrumb){echo '<div class="spice-col-'.$breadcrumb_col.' text-left parallel">'.$breadcrumb.'</div>';}
					    	if(get_theme_mod('bredcrumb_position','page_header')=='page_header'):
					    		if($breadcrumb){ $col='3';}else{ $col='1';}	    		 
						    	echo '<div class="spice-col-'.$col.' text-right parallel">';
						    	do_action('dark_fusion_breadcrumbs_page_title_hook');
						    	echo '</div>';
					    	endif;
					    }
					    elseif(get_theme_mod('bredcrumb_alignment','centered')=='centered'){ 
					    	echo '<div class="spice-col-1 text-center">';
					    	
					    	if($breadcrumb){echo $breadcrumb;}
					    	if(get_theme_mod('bredcrumb_position','page_header')=='page_header'):
					    		do_action('dark_fusion_breadcrumbs_page_title_hook');
					    	endif;
					    	echo'</div>';
					    }
					    elseif(get_theme_mod('bredcrumb_alignment','centered')=='left'){ 
					    	echo '<div class="spice-col-1 text-left">';
					    	if($breadcrumb){echo $breadcrumb;}
					    	if(get_theme_mod('bredcrumb_position','page_header')=='page_header'):do_action('dark_fusion_breadcrumbs_page_title_hook');
					    	endif;
					    	echo'</div>';
					    }
					    elseif(get_theme_mod('bredcrumb_alignment','centered')=='right'){ 
					    	echo '<div class="spice-col-1 text-right">';
					    	if($breadcrumb){echo $breadcrumb;}
					    	if(get_theme_mod('bredcrumb_position','page_header')=='page_header'):
					    		do_action('dark_fusion_breadcrumbs_page_title_hook');
					    	endif;
					    	
					    	echo'</div>';
					    }?>
				    </div>
				</div>
			</section>
		<?php
		}
	}
	add_action('dark_fusion_breadcrumbs_hook','dark_fusion_breadcrumbs');
endif;?>
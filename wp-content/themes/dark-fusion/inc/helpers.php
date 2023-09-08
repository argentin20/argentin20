<?php
/**
 * This file includes helper functions used throughout the theme.
 *
 * @package Dark Fusion Theme
 */

/*
-------------------------------------------------------------------------------
 Table of contents 
-------------------------------------------------------------------------------*/

	# Header
	# Preloader
	# Scroll to Top
	# Enqueue file for customizer preview
	# Blog Content
	# Blog Excerpt
	# Single Post Author Details
	# Wide and Boxed Layout
	# Container Width, Logo Width & After menu Button
	# Footer Section
	# Comment Reply Box
	# Page Navigation
	# Added skip link focus
	# Container Width for Page Layout
	# Container Width for Post Layout
	# Container Width for Single Post Layout

/*
-------------------------------------------------------------------------------
 Header
-------------------------------------------------------------------------------*/

if ( ! function_exists( 'dark_fusion_header_template' ) ) {

	function dark_fusion_header_template() {

		if (get_theme_mod('header_preset_layout', 'left') == 'right'){
			get_template_part( 'partials/header/header-right' );
		}
		elseif(get_theme_mod('header_preset_layout', 'left') =='center'){
			get_template_part( 'partials/header/header-center' );
		}
		elseif(get_theme_mod('header_preset_layout', 'left') =='full'){
			get_template_part( 'partials/header/header-full' );
		}else{
			get_template_part( 'partials/header/header-default' );
		}
	}
	add_action( 'dark_fusion_header', 'dark_fusion_header_template' );
}

/*
-------------------------------------------------------------------------------
 Preloader
-------------------------------------------------------------------------------*/
if ( ! function_exists( 'dark_fusion_preloader_feature' ) ) {

	function dark_fusion_preloader_feature() {
		if(get_theme_mod('preloader_enable',false)==true):?>
			<div id="preloader1" class="dark-fusion-loader">
		        <div class="dark-fusion-preloader-cube">
			        <div class="dark-fusion-cube1 dark-fusion-cube"></div>
			        <div class="dark-fusion-cube2 dark-fusion-cube"></div>
			        <div class="dark-fusion-cube4 dark-fusion-cube"></div>
			        <div class="dark-fusion-cube3 dark-fusion-cube"></div>
		    	</div> 
		    </div>
		  <?php endif;
	}
	add_action('dark_fusion_preloader','dark_fusion_preloader_feature');

}

/*
-------------------------------------------------------------------------------
 Scroll to Top
-------------------------------------------------------------------------------*/

if ( ! function_exists( 'dark_fusion_scroll_to_top' ) ) {

	function dark_fusion_scroll_to_top() {
		$scrolltotop_icon_enable = get_theme_mod('scrolltotop_setting_enable', true);
    	if ($scrolltotop_icon_enable == true) { ?>
        	<div class="scroll-up custom <?php echo esc_attr(get_theme_mod('scroll_to_top_position','right') ); ?>"><a href="#totop"><i class="<?php echo esc_attr( get_theme_mod('scroll_to_top_icon_class', 'fa fa-arrow-up')); ?>"></i></a></div>
    	<?php } ?>
    	<style type="text/css">
    		.scroll-up {
    			<?php echo esc_attr( get_theme_mod('scroll_to_top_position','right') ); ?>: 3.75rem;
    		}
    		.scroll-up.left { right: auto; }
    		.scroll-up.custom a {
		        border-radius: <?php echo intval( get_theme_mod('scroll_to_top_button_radious', 3) ); ?>px;
		    }
    	</style>
    	<?php if(get_theme_mod('scroll_to_top_color_enable',false)==true) { ?>
    		<style type="text/css">
    			.scroll-up.custom a {
				    background: <?php echo esc_attr( get_theme_mod('scroll_to_top_back_color','#3395a0'));?>;
				    color: <?php echo esc_attr( get_theme_mod('scroll_to_top_icon_color','#fff'));?>;
    			}
    			.scroll-up.custom a:hover {
				    background: <?php echo esc_attr( get_theme_mod('scroll_to_top_back_hover_color','#3395a0') );?>;
				    color: <?php echo esc_attr( get_theme_mod('scroll_to_top_icon_hover_color','#fff'));?>;
    			}
    		</style>
    	<?php }
	}
	add_action('dark_fusion_scrolltotop','dark_fusion_scroll_to_top');

}

/*
-------------------------------------------------------------------------------
 Enqueue file for customizer preview
-------------------------------------------------------------------------------*/
if ( ! function_exists( 'dark_fusion_customizer_preview' ) ) {

	function dark_fusion_customizer_preview() {
		wp_enqueue_script( 'dark-fusion-customizer-preview-js', DARK_FUSION_TEMPLATE_DIR_URI .'/inc/customizer/controls/customizer-slider/js/customizer-preview.js', array( 'customize-preview', 'jquery' ) );
	}
	add_action('customize_preview_init','dark_fusion_customizer_preview');

}

/*
-------------------------------------------------------------------------------
 Blog Content
-------------------------------------------------------------------------------*/
if (!function_exists('dark_fusion_post_content')) :

	function dark_fusion_post_content() {
        $blog_content 	= get_theme_mod('dark_fusion_blog_content', 'excerpt');
        $excerpt_length = get_theme_mod('dark_fusion_blog_content_length', 30);

        if ('excerpt' == $blog_content) {
        	$excerpt = dark_fusion_post_excerpt(absint($excerpt_length));
            if (!empty($excerpt)) :
                echo wp_kses_post(wpautop($excerpt));
			 endif;
        } 
        else {
            the_content();  
        }
    }
    add_action('dark_fusion_post_content_data','dark_fusion_post_content');

endif;


/*
-------------------------------------------------------------------------------
 Blog Excerpt
-------------------------------------------------------------------------------*/
if (!function_exists('dark_fusion_post_excerpt')) :

	function dark_fusion_post_excerpt($length = 0, $post_obj = null) {
        global $post;
        if (is_null($post_obj)) {
            $post_obj = $post;
        }

        $length = absint($length);
        if (0 === $length) {
            return;
        }
        $source_content = $post_obj->post_content;
        if (!empty($post_obj->post_excerpt)) {
            $source_content = $post_obj->post_excerpt;
        }
        $source_content = preg_replace('`\[[^\]]*\]`', '', $source_content);
        $trimmed_content = wp_trim_words($source_content, $length, '&hellip;');
        return $trimmed_content;
    }
    add_action('dark_fusion_post_excerpt_data','dark_fusion_post_excerpt');

endif;


/*
-------------------------------------------------------------------------------
 Blog Excerpt
-------------------------------------------------------------------------------*/
function dark_fusion_get_author_name($post) {

    $user_id = $post->post_author;
    if (empty($user_id)) {
        return;
    }
    $user_info = get_userdata($user_id);
    echo esc_html($user_info->display_name);
}


/*
-------------------------------------------------------------------------------
 Single Post Author Details
-------------------------------------------------------------------------------*/
if (!function_exists('dark_fusion_single_post_auth')) :

	function dark_fusion_single_post_auth() {
		global $post;
        if( !is_attachment() ): ?>
		   <article class="blog-author">
				<figure class="avatar">
			         <?php echo get_avatar( $post->post_author ); ?>
			   	</figure>
			   	<div class="blog-author-info">
					<h5 class="post-by"><?php esc_html_e( 'Written by:' , 'dark-fusion'  );?></h5>
			      	<h4 class="name"><?php dark_fusion_get_author_name( $post );?></h4>
			      	<?php
			      	$dark_fusion_user_data = get_user_meta( $post->post_author );
					$dark_fusion_user_description = $dark_fusion_user_data['description'][0]; 
			      	if($dark_fusion_user_description != '') : ?>
				      	<p class="mb-2">
				            <?php echo wp_kses_post($dark_fusion_user_description); ?>
			         	</p>
		         	<?php endif; ?>
			      	<p>
		      			<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="text-default ml-1"><?php esc_html_e('View All Posts','dark-fusion' );?> <i class="fa fa-long-arrow-right pl-2"></i></a>
		      		</p>
			   	</div>
		   </article>
		<?php endif;
    }
    add_action('dark_fusion_single_post_auth_detail','dark_fusion_single_post_auth');

endif;


/*
-------------------------------------------------------------------------------
 Wide and Boxed Layout
-------------------------------------------------------------------------------*/
if (!function_exists('dark_fusion_theme_layout')) :

	function dark_fusion_theme_layout() {
		$dark_fusion_theme_layout = get_theme_mod('dark_fusion_layout_style', 'wide');
	    if ($dark_fusion_theme_layout == "boxed") {
	        $dark_fusion_layout_type = "boxed";
	    } 
	    else {
	        $dark_fusion_layout_type = "wide";
	    }?>
	    <body <?php body_class($dark_fusion_layout_type); ?>>
	<?php }
	add_action('dark_fusion_wide_boxed_layout','dark_fusion_theme_layout');

endif;


/*
-------------------------------------------------------------------------------
 Container Width, Logo Width & After menu Button
-------------------------------------------------------------------------------*/
if (!function_exists('dark_fusion_logo_container_width_menu_btn')) :

	function dark_fusion_logo_container_width_menu_btn() { ?>
			<style>
				.page-section-space .spice-container, .section-space .spice-container:not(.page-section-space.stretched .spice-container, .section-space.stretched .spice-container) {
					width: <?php echo intval( get_theme_mod('container_width','1170') );?>px;
					max-width: 100%;
				}
				body .page-section-space .spice-row .spice-col-2{
					    width: <?php echo intval( get_theme_mod('content_width','66.6') );?>%;
				}
				body .page-section-space .spice-row .spice-col-4{
						width: <?php echo intval( get_theme_mod('sidebar_width','33.3') );?>%;
				}
				@media(max-width: 691px){
					body .page-section-space .spice-row .spice-col-2{
					    width: 100%;
					}
					body .page-section-space .spice-row .spice-col-4{
							width: 100%;
					}
				}
			</style>
		
		<?php
		if(((get_theme_mod('blog_sidebar_layout','right')=='stretched')  && get_post_meta(get_option('page_for_posts', true),'dark_fusion_site_layout', true ) == '') || (get_post_meta(get_option('page_for_posts', true),'dark_fusion_site_layout', true ) == 'dark_fusion_site_layout_stretched'))
			{
			?>
			<style>
				@media (min-width: 1100px){
				body.blog .page-section-space.blog .spice-container{
					width: 100%;
					padding: 0;
					margin: 0;
				}}
			</style>
		<?php } ?>
		<?php
		if(get_theme_mod('blog_sidebar_layout','right')=='stretched' )
		{?>
			<style>
				body.archive .page-section-space.blog .spice-container:not(body.archive.woocommerce .page-section-space.blog .spice-container){
					width: 100%;
					padding: 0;
					margin: 0;
				}
			</style>
		<?php } ?>
		<?php if(((get_theme_mod('single_blog_sidebar_layout','right')=='stretched')  && get_post_meta(get_the_ID(),'dark_fusion_site_layout', true ) == '') || ( get_post_meta(get_the_ID(),'dark_fusion_site_layout', true ) =='dark_fusion_site_layout_stretched'))	
		{?>
			<style>
				body.single-post .page-section-space.blog .spice-container{
					width: 100%;
					padding: 0;
					margin: 0;
				}
			</style>
		<?php } ?>
		<?php if(((get_theme_mod('page_sidebar_layout','right')=='stretched')  && get_post_meta(get_the_ID(),'dark_fusion_site_layout', true )=='') || ( get_post_meta(get_the_ID(),'dark_fusion_site_layout', true ) == 'dark_fusion_site_layout_stretched')){?>
			<style>
				body .page-section-space.stretched .spice-container {
					width: 100%;
					padding: 0;
					margin: 0;
				}
			</style>
		<?php } ?>
		<?php if (class_exists('WooCommerce')) {
			if(((get_theme_mod('page_sidebar_layout','right')=='stretched')  && get_post_meta(wc_get_page_id('shop'),'dark_fusion_site_layout', true )=='') || ( get_post_meta(wc_get_page_id('shop'),'dark_fusion_site_layout', true ) == 'dark_fusion_site_layout_stretched')){?>
			<style>
				body .page-section-space.stretched .spice-container {
					width: 100%;
					padding: 0;
					margin: 0;
				}
			</style>
		<?php } 
	}?>
	<?php 
	$dark_fusion_single_post_order = get_theme_mod( 'dark_fusion_single_post_order', array( 'post_image','post_meta', 'post_title','post_content'));
	if(( sizeof($dark_fusion_single_post_order)==1)  && ($dark_fusion_single_post_order[0] =='post_image')):?>
		<style>
			.post{
				padding: 0;
			}
		</style>
	<?php endif;?>

	<style>
		.custom-logo {
			width: <?php echo intval( get_theme_mod('dark_fusion_logo_length',235) );?>px; 
			height: auto;
		}
		body .spice.spice-custom .header-button a { 
			-webkit-border-radius: <?php echo intval(get_theme_mod('after_menu_btn_border',0));?>px;
			border-radius: <?php echo intval(get_theme_mod('after_menu_btn_border',0));?>px;
		}
	</style>

	<?php 
	}
	add_action('wp_head','dark_fusion_logo_container_width_menu_btn');

endif;

/*
-------------------------------------------------------------------------------
 Footer Section
-------------------------------------------------------------------------------*/
if (!function_exists('dark_fusion_footer_widget_section')) :

	function dark_fusion_footer_widget_section() {
	    ?>
 <footer class="site-footer bg-default bg-footer-lite" style="background-image: url(<?php echo esc_url(get_theme_mod('footer_widget_back_image', get_template_directory_uri().'/assets/images/footer-bg.jpg')); ?>);" >
    	<div class="wrapper">
    		<?php $footer_widget_overlay_color = get_theme_mod('footer_widget_image_overlay_color', 'rgba(0, 0, 0, 0.8)'); ?>	
			<div class="footer-overlay" <?php if (!empty(get_theme_mod('footer_widget_back_image', get_template_directory_uri().'/assets/images/footer-bg.jpg'))) { if (get_theme_mod('footer_widget_image_overlay_enable', true) == true) { ?> style="background-color:<?php echo $footer_widget_overlay_color; ?>" <?php } }?> >
				
			</div>
	    	<?php

	    	if(get_theme_mod('footer_widget_enable',true)==true): ?>
			<div class="spice-container">	
				<?php if(is_active_sidebar('footer-sidebar-1') || is_active_sidebar('footer-sidebar-2') || is_active_sidebar('footer-sidebar-3') || is_active_sidebar('footer-sidebar-4')): 
                 	get_template_part('partials/footer/footer-sidebar');
	            endif;?>  	
			</div>
			<?php endif; 

			if (get_theme_mod('footer_bar_enable', true) == true): ?>
				<div class="site-info">
					<div class="spice-container">
						<?php 
						$dark_fusion_footer_bar_layout = get_theme_mod('footer_bar_layout', 1);
        				switch ($dark_fusion_footer_bar_layout) { 
        					case 1: ?>
								<div class="spice-row">
									<div class="spice-col-1 text-center">
										<?php do_action('dark_fusion_footer_layout_design1'); ?>
									</div>
								</div>
								<?php break;
							case 2:
								do_action('dark_fusion_footer_layout_design2');
								break;
						}?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</footer>
	<?php }
	add_action('dark_fusion_footer_widgets', 'dark_fusion_footer_widget_section');

endif;

/*
-------------------------------------------------------------------------------
 Footer Bar Layout 1
-------------------------------------------------------------------------------*/
if (!function_exists('dark_fusion_footer_bar_layout1')) :

	function dark_fusion_footer_bar_layout1() { 
		$foot_section_1 = get_theme_mod('footer_bar_section1','custom_text');
      	switch ( $foot_section_1 )
    	{
            case 'none':
            break;

            case 'footer_menu':
            echo dark_fusion_footer_bar_menu();
            break;

            case 'custom_text':
            echo wp_kses_post(get_theme_mod('footer_copyright','<p>'.__( 'Proudly powered by <a href="https://wordpress.org">WordPress</a> | Theme: Dark Fusion by <a href="https://spicethemes.com" rel="nofollow">Spicethemes</a>', 'dark-fusion' ).'</p>'));
            break;
        }   
   	}	
	add_action('dark_fusion_footer_layout_design1', 'dark_fusion_footer_bar_layout1');

endif;



/*
-------------------------------------------------------------------------------
 Footer Bar Layout 2
-------------------------------------------------------------------------------*/
if (!function_exists('dark_fusion_footer_bar_layout2')) :

	function dark_fusion_footer_bar_layout2() { ?> 
		<div class="spice-row">
			<div class="spice-col-3 spice-left">
				<?php do_action('dark_fusion_footer_layout_design1'); ?>
			</div> 
			<div class="spice-col-3 spice-right">
				<?php
				$foot_section_2 = get_theme_mod('footer_bar_section2','custom_text');
				switch ( $foot_section_2 )
				{
					case 'none':
					break;

					case 'footer_menu':
					echo dark_fusion_footer_bar_menu();
					break;

					case 'custom_text':
					echo wp_kses_post(get_theme_mod('footer_bar_section2_copyright','<p>'.__( 'Proudly powered by <a href="https://wordpress.org">WordPress</a> | Theme: Dark Fusion by <a href="https://spicethemes.com" rel="nofollow">Spicethemes</a>', 'dark-fusion' ).'</p>'));
					break;
				}?>
			</div>  
		</div>
	<?php }	
	add_action('dark_fusion_footer_layout_design2', 'dark_fusion_footer_bar_layout2');

endif;

/*
-------------------------------------------------------------------------------
 Footer Bar Menu
-------------------------------------------------------------------------------*/
if (!function_exists('dark_fusion_footer_bar_menu')) {

    function dark_fusion_footer_bar_menu() {
        ob_start();
        if (has_nav_menu('footer_menu')) {
            wp_nav_menu(
                array(
                    'theme_location' 	=> 'footer_menu',
                    'menu_class'		=> 'footer-nav',
                    'items_wrap' 		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth' 			=> 1
                )
            );
        } 
        else {
            if (is_user_logged_in() && current_user_can('edit_theme_options')) { ?>
                <a href="<?php echo esc_url(admin_url('/nav-menus.php?action=locations')); ?>"><?php esc_html_e('Assign Footer Menu', 'dark-fusion'); ?></a>
            <?php }
        }
        return ob_get_clean();
    }
}


/*
-------------------------------------------------------------------------------
 Footer Background Image CSS
-------------------------------------------------------------------------------*/
if (!function_exists('dark_fusion_footer_custom_css')) :

	function dark_fusion_footer_custom_css() {  ?>
			<style type="text/css">
	        	<?php if (get_theme_mod('footer_bar_border_enable', false) === true) {  ?>
		        	body .site-footer {
	        			border-top: <?php echo intval(get_theme_mod('footer_bar_border',2));?>px <?php echo esc_attr(get_theme_mod('footer_bar_border_style','solid'));?> <?php echo esc_attr(get_theme_mod('footer_bar_border_color','#3395a0')); ?>
	        		}
	        	<?php } ?>
			</style>
		<?php 
	}
	add_action('wp_head','dark_fusion_footer_custom_css');

endif;

/*
-------------------------------------------------------------------------------
 Footer Widget Layout
-------------------------------------------------------------------------------*/
if (!function_exists('dark_fusion_footer_layout')) :

	function dark_fusion_footer_layout($layout) {

		if( $layout == 2 ) {
			$class = 'spice-col-3';
		}
		elseif( $layout == 3 ) {
			$class = 'spice-col-4';
		}
		else {
			$class = 'spice-col-5';
		}
		for($i=1; $i<=$layout; $i++)
		{
			echo '<div class="' . $class . '">';
			dynamic_sidebar('footer-sidebar-'.$i);
			echo '</div>';
		}

	}

endif;


/*
-------------------------------------------------------------------------------
 Comment Reply Box
-------------------------------------------------------------------------------*/
if (!function_exists('dark_fusion_comment_box')) :

	function dark_fusion_comment_box($comment, $args, $depth) { ?>

		<div class="comment-box">
			<span class="pull-left-comment">
			   <?php echo get_avatar($comment, 100, null, 'comments user', array('class' => array('img-fluid comment-img'))); ?>
			</span>
			<div class="comment-body">
				<div class="comment-detail">
				 	<h5 class="comment-detail-title"><?php esc_html(comment_author()); ?>
				 		<time class="comment-date"><?php 
				 			/* translators: %1$s: comment date and %2$s: comment time */
				 			printf(esc_html__('%1$s  %2$s', 'dark-fusion' ), esc_html(get_comment_date()), esc_html(get_comment_time())); ?></time>
				 	</h5>
				 	<?php comment_text(); ?>
					<div class="reply">
						<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?> 
				    </div>
				</div>       
			</div>      
		</div>

	<?php }

endif;


/*
-------------------------------------------------------------------------------
 Page Navigation
-------------------------------------------------------------------------------*/
if (!function_exists('dark_fusion_custom_navigation')) :

    function dark_fusion_custom_navigation() {
    	
    	if (!is_rtl()) {
            the_posts_pagination(array(
                'prev_text' => __('<i class="fas fa-chevron-left"></i>', 'dark-fusion' ),
                'next_text' => __('<i class="fas fa-chevron-right"></i>', 'dark-fusion' ),
            ));
        } else {
            the_posts_pagination(array(
                'prev_text' => __('<i class="fas fa-chevron-right"></i>', 'dark-fusion' ),
                'next_text' => __('<i class="fas fa-chevron-left"></i>', 'dark-fusion' ),
            ));
        }
    }
    add_action('dark_fusion_page_navigation', 'dark_fusion_custom_navigation');

endif;



/*
-------------------------------------------------------------------------------
 Added skip link focus
-------------------------------------------------------------------------------*/
if (!function_exists('dark_fusion_skip_link_fn')) :

	function dark_fusion_skip_link_fn() { ?>
		<script>
		/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
		</script>
	<?php
	}
	add_action( 'wp_print_footer_scripts', 'dark_fusion_skip_link_fn' );

endif;



/*
-------------------------------------------------------------------------------
 Container Width for Page Layout
-------------------------------------------------------------------------------*/
if (!function_exists('dark_fusion_container_width_page_layout')) :

	function dark_fusion_container_width_page_layout() {  
		$container_width= "";
		return $container_width;
	}

endif;


/*
-------------------------------------------------------------------------------
 Container Width for Post Layout
-------------------------------------------------------------------------------*/
if (!function_exists('dark_fusion_container_width_post_layout')) :

	function dark_fusion_container_width_post_layout() {  
		$container_width= "";
		return $container_width;
	}

endif;


/*
-------------------------------------------------------------------------------
 Container Width for Single Post Layout
-------------------------------------------------------------------------------*/
if (!function_exists('dark_fusion_container_width_single_post_layout')) :

	function dark_fusion_container_width_single_post_layout() {  
		$container_width= "";
		return $container_width;
	}

endif;

/*
-------------------------------------------------------------------------------
 Breadcrumbs Page title hook
-------------------------------------------------------------------------------*/

if ( ! function_exists( 'dark_fusion_breadcrumbs_page_title_fn' ) ) {
	function dark_fusion_breadcrumbs_page_title_fn(){
		if(get_theme_mod('enable_page_title',true) == true ){		
			if(get_theme_mod('bredcrumb_position','page_header')=='content_area'):
				$content_class='content-area-title';
			else:
				$content_class='';
			endif;
			$breadcrumbs_markup=get_theme_mod('bredcrumb_markup','h1');
		  	$page_title_markup_before='<' . $breadcrumbs_markup . '>';
		  	$page_title_markup_after='</' . $breadcrumbs_markup . '>';
		  	if (is_home() || is_front_page()) { 
		    	if( get_option('show_on_front') =='page') {
		        	if(is_front_page()) { ?>
		        		<div class="page-title php8 <?php echo $content_class;?>">
							<?php echo $page_title_markup_before . esc_html(get_the_title( get_option('page_on_front', true) )) . $page_title_markup_after; ?>
						</div>
		        	<?php }
		        	elseif(is_home()) { ?>
		                <div class="page-title  <?php echo $content_class;?>">
		                    <?php echo $page_title_markup_before . esc_html(get_the_title( get_option('page_for_posts', true) )) . $page_title_markup_after; ?>
		                </div>          
		            <?php
		            }
		        }
		        else if(get_option('show_on_front')=='posts') { ?>
		            <div class="page-title  <?php echo $content_class;?>">
		                <?php echo $page_title_markup_before . wp_kses_post(get_theme_mod('blog_page_title_option', __('Home', 'dark-fusion' ))) . $page_title_markup_after; ?>
		            </div>
		    	<?php
		    	} 
		    }
		    else { ?>
		    	<div class="page-title  <?php echo $content_class;?>">
		    		<?php if (is_search()){
		    			 echo $page_title_markup_before . get_search_query() . $page_title_markup_after;
		            }
		            else if(is_404()) {
		                echo $page_title_markup_before . esc_html__('Error 404','dark-fusion' ) . $page_title_markup_after;  
		            }
		            else if(is_category()) {
		                echo $page_title_markup_before . ( esc_html__('Category:&nbsp;','dark-fusion' ) . single_cat_title( '', false ) ) . $page_title_markup_after;   
		            }
		            else if ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) { 
		                if ( class_exists( 'WooCommerce' ) ) {
		                    if(is_shop()) { ?>
		                    	<?php echo $page_title_markup_before; 
		                    			woocommerce_page_title();
		                    		 echo $page_title_markup_after; ?>
		                    <?php }
		                    if(is_product_category()) { 
		                    	echo $page_title_markup_before . ( esc_html__('Category:&nbsp;','dark-fusion' ) . single_cat_title( '', false ) ) . $page_title_markup_after;
		                    }
		                    if(is_product_tag()) { 
		                    	echo $page_title_markup_before . ( esc_html__('Tag:&nbsp;','dark-fusion' ) . single_cat_title( '', false ) ) . $page_title_markup_after;
		                    }
		                    
						}
						// For spice portfolio plugin
						if(class_exists('Spice_Portfolio')) {
							if ( class_exists( 'WooCommerce' ) ) {
								if(!is_shop() && !is_product_category() && !is_product_tag() ) {
										echo $page_title_markup_before . ( esc_html__('Category:&nbsp;','dark-fusion' ) . single_cat_title( '', false ) ) . $page_title_markup_after;
								}
							}
							else{
								echo $page_title_markup_before . ( esc_html__('Category:&nbsp;','dark-fusion' ) . single_cat_title( '', false ) ) . $page_title_markup_after;
							}										
		            	} 
		            }  
		            else if( is_tag() ) {
		                echo $page_title_markup_before . ( esc_html__('Tag:&nbsp;','dark-fusion' ) . single_tag_title( '', false ) ) . $page_title_markup_after;
		            }
		            else if(is_archive()) {   
		            	the_archive_title( $page_title_markup_before, $page_title_markup_after );
		            }
		            else { ?>
		        		<?php echo $page_title_markup_before . esc_html(get_the_title('')) . $page_title_markup_after; ?>
		    		<?php }
		        ?>
		        </div>
		    <?php }
		}
	}
	add_action('dark_fusion_breadcrumbs_page_title_hook','dark_fusion_breadcrumbs_page_title_fn');
}?>
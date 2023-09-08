<?php 

	$dark_fusion_shop_button = '<ul class="nav spice-nav spice-right">%3$s';
    if(get_theme_mod('after_menu_btn_new_tabl',false)==true) { 
    	$dark_fusion_target="_blank";
    }
 	else { 
 		$dark_fusion_target="_self"; 
 	}
 	if((get_theme_mod('after_menu_btn_txt')!='') && (get_theme_mod('after_menu_multiple_option')=='menu_btn')):
			$dark_fusion_shop_button .= '<li class="menu-item header-button"><a target='.$dark_fusion_target.' class="theme-btn btn-style-one" href='.get_theme_mod('after_menu_btn_link','').'><span class="txt">'.get_theme_mod('after_menu_btn_txt').'</span></a></li>';
	endif;
	if((get_theme_mod('after_menu_html')!='') && (get_theme_mod('after_menu_multiple_option')=='html')):
		$dark_fusion_shop_button .= '<li class="nav-item html menu-item lite-html">'.get_theme_mod('after_menu_html').'</li>';

	endif;
	if(get_theme_mod('search_btn_enable',false)==true) { 
		$dark_fusion_shop_button .= '<li class="menu-item dropdown search_exists">'; 
	}
   
   //Hence This condition only work when woocommerce plugin will be activate
	if(get_theme_mod('search_btn_enable',false)==true)
	{
    	$dark_fusion_shop_button .= 
    							'<a href="#" title="'.esc_attr__('Search','dark-fusion').'" class="search-icon dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fas fa-search"></i></a>
									<ul class="dropdown-menu pull-right search-panel"  role="menu">
         							<li>
         								<div class="form-spice-container">
           									<form id="searchform" autocomplete="off" role="'.esc_attr('Search','dark-fusion').'" method="get" class="search-form" action="'.esc_url( home_url( '/' )).'">
  												<input type="search" class="search-field" placeholder="'.esc_attr__('Search','dark-fusion').'" value="" name="s">
             									<input type="submit" class="search-submit" value="'.esc_attr__('Search','dark-fusion').'">
        								 	</form>           
           								</div>
         							</li>
       							</ul>
       						</li>';
		}
	if ( class_exists( 'WooCommerce' ) ) {
		if(get_theme_mod('cart_btn_enable',false)==true ){	
			if(get_theme_mod('search_btn_enable',false)==true) { 
				$dark_fusion_shop_button .='<li class="cart-item"><div class="cart-header ">';
			}
			else {
				$dark_fusion_shop_button .='<li class="cart-item shop_exists"><div class="cart-header ">';
			}	   	  
	      	global $woocommerce; 
	      	$dark_fusion_link = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();
	      	$dark_fusion_shop_button .= '<a class="cart-icon" href="'.esc_url($dark_fusion_link).'" >';
		      
	      	if ($woocommerce->cart->cart_contents_count == 0){
          		$dark_fusion_shop_button .= '<i class="fas fa-shopping-cart" aria-hidden="true"></i>';
	        }
	        else
	        {
	          	$dark_fusion_shop_button .= '<i class="fas fa-cart-plus" aria-hidden="true"></i>';
	        }
		           
	        $dark_fusion_shop_button .= '</a>';
		    
		    /* translators: %d: count for number of products in cart */
	        $dark_fusion_shop_button .= '<a class="total" href="'.esc_url($dark_fusion_link).'" ><span class="cart-total">'.sprintf(_n('%d <span>item</span>', '%d <span>items</span>', $woocommerce->cart->cart_contents_count, 'dark-fusion' ), $woocommerce->cart->cart_contents_count).'</span></a>';
	       $dark_fusion_shop_button .='</div></li>';
	    }
	}
	$dark_fusion_shop_button .= '</li>';
   	$dark_fusion_shop_button .= '</ul>'; 
   	$dark_fusion_menu_class='';
    wp_nav_menu( array (
		'theme_location'	=>	'primary', 
		'menu_class'    	=>	'nav spice-nav spice-right '.$dark_fusion_menu_class.'',
		'items_wrap'    	=>	$dark_fusion_shop_button,
		'fallback_cb'   	=>	'dark_fusion_fallback_page_menu',
		'walker'        	=>	new Dark_Fusion_Nav_Walker()
	)); 

?>	
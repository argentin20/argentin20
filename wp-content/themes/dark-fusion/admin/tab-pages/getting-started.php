<?php
/**
 * Getting started template
 */
$dark_fusion_name = wp_get_theme();
?>
<div id="getting_started" class="dark-fusion-tab-pane active">
	<div class="spice-container">
		<div class="spice-row">
			<div class="spice-col-1">
				<h1 class="dark-fusion-info-title text-center"><?php 
				/* translators: %s: theme name */
				printf( esc_html__('%s Theme Configuration','dark-fusion'), esc_html($dark_fusion_name) ); ?><?php if( !empty($dark_fusion_name['Version']) ): ?> <sup id="dark-fusion-theme-version"><?php echo esc_html( $dark_fusion_name['Version'] ); ?> </sup><?php endif; ?></h1>
			</div>
		</div>
		<div class="spice-row" style="margin-top: 20px;">
			<div class="spice-col-1">
			    <div class="dark-fusion-page" style="border: none;box-shadow: none;">
					<div class="mockup">
			    		<img src="<?php echo DARK_FUSION_TEMPLATE_DIR_URI.'/admin/assets/img/mockup-lite.png';?>"  width="100%">
			    	</div>
				</div>	
			</div>	
		</div>
		<div class="spice-row" style="margin-top: 20px;">
			<div class="spice-col-3"> 
				<div class="dark-fusion-page">
					<div class="dark-fusion-page-top"><?php 
					/* translators: %s: theme name */
					printf( esc_html__( 'Additional features in %s', 'dark-fusion' ), esc_html($dark_fusion_name) ); ?></div>
					<div class="dark-fusion-page-content">
						<ul class="dark-fusion-page-list-flex">
							<li>
								<?php echo esc_html__('Header Presets','dark-fusion'); ?>
							</li>
							<li>
								<?php echo esc_html__('Blog layouts','dark-fusion'); ?>
							</li>					
							<li>
								<?php echo esc_html__('Custom Color Schemes','dark-fusion'); ?>
							</li>
							<li>
								<?php echo esc_html__('Preloader','dark-fusion'); ?>
							</li>
							<li>
								<?php echo esc_html__('Breadcrumb Settings','dark-fusion'); ?>
							</li>						
							<li>
								<?php echo esc_html__('Footer Widgets Settings','dark-fusion'); ?>
							</li>
							<li>
								<?php echo esc_html__('Typography Features','dark-fusion'); ?>
							</li>
							<li>
								<?php echo esc_html__('Colors & Background Features','dark-fusion'); ?>
							</li>
							<li>
								<?php echo esc_html__('Container Width Settings','dark-fusion'); ?>
							</li>						
						</ul>
					</div>
				</div>
			</div>
			<div class="spice-col-3"> 
				<div class="dark-fusion-page">
					<div class="dark-fusion-page-top"><?php esc_html_e('Links to Customizer Settings', 'dark-fusion' ); ?></div>
					<div class="dark-fusion-page-content">
						<ul class="dark-fusion-page-list-flex">
							<li>
								<a class="dark-fusion-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=title_tagline' ) ); ?>" target="_blank"><?php esc_html_e('Site Logo','dark-fusion'); ?></a>
							</li>
							<li>
								<a class="dark-fusion-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=dark_fusion_theme_panel' ) ); ?>" target="_blank"><?php esc_html_e('Blog Options','dark-fusion'); ?></a>
							</li>
							 <li>
								<a class="dark-fusion-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=widgets' ) ); ?>" target="_blank"><?php esc_html_e('Footer Widgets','dark-fusion'); ?></a>
							</li>
							<li>
								<a class="dark-fusion-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=dark_fusion_general_settings' ) ); ?>" target="_blank"><?php esc_html_e('General Settings','dark-fusion'); ?></a>
							</li>
							<li>
								<a class="dark-fusion-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=colors_back_settings' ) ); ?>" target="_blank"><?php esc_html_e('Colors & Background','dark-fusion'); ?></a>
							</li>
							<li>
								<a class="dark-fusion-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=dark_fusion_typography_setting' ) ); ?>" target="_blank"><?php esc_html_e('Typography Settings','dark-fusion'); ?></a>
							</li>
							<li>
								<a class="dark-fusion-page-quick-setting-link" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=theme_style' ) ); ?>" target="_blank"><?php esc_html_e('Theme Style Settings','dark-fusion'); ?></a>
							</li>
						</ul>
					</div>
				</div>
				<div class="dark-fusion-page">
					<div class="dark-fusion-page-top"><?php esc_html_e( 'Useful Links', 'dark-fusion' ); ?></div>
					<div class="dark-fusion-page-content">
						<ul class="dark-fusion-page-list-flex">
							<li>
								<a class="dark-fusion-page-quick-setting-link" href="<?php echo esc_url('https://g1.spiceblocks.com/'); ?>" target="_blank"><?php 
									/* translators: %s: theme name */
									printf ( esc_html__('%s Demo','dark-fusion'), $dark_fusion_name ); ?></a>
							</li>
							<li>
								<a class="dark-fusion-page-quick-setting-link" href="<?php echo esc_url('https://wordpress.org/support/theme/dark-fusion/'); ?>" target="_blank"><?php 
									/* translators: %s: theme name */
									printf( esc_html__('%s Theme Support','dark-fusion'), esc_html($dark_fusion_name) ); ?></a>
							</li>							
						    <li> 
								<a class="dark-fusion-page-quick-setting-link" href="<?php echo esc_url('https://wordpress.org/support/theme/dark-fusion/reviews/#new-post'); ?>" target="_blank"><?php echo esc_html__('Your feedback is valuable to us','dark-fusion'); ?></a>
							</li>
						    <li> 
								<a class="dark-fusion-page-quick-setting-link" href="<?php echo esc_url('https://spicethemes.com/contact/'); ?>" target="_blank"><?php echo esc_html__('Pre-sales enquiry','dark-fusion'); ?></a>
							</li>
							<li> 
								<a class="dark-fusion-page-quick-setting-link" href="<?php echo esc_url('https://helpdoc.spicethemes.com/category/dark-fusion/'); ?>" target="_blank"><?php echo esc_html__('Documentation','dark-fusion'); ?></a>
							</li>  
							<li> 
								<a class="dark-fusion-page-quick-setting-link" href="<?php echo esc_url('https://spicethemes.com/dark-fusion-changelog/'); ?>" target="_blank"><?php echo esc_html__('Changelog','dark-fusion'); ?></a>
							</li> 						 
						</ul>
					</div>
				</div>
			</div>		
		</div>
	</div>
</div>
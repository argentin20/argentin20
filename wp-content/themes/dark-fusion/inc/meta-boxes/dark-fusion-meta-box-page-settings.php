<?php
$dark_fusion_site_layout = get_post_meta( get_the_ID(), 'dark_fusion_site_layout', true );
$dark_fusion_page_sidebar = get_post_meta( get_the_ID(), 'dark_fusion_page_sidebar', true );

	$dark_fusion_sidebar_layout_choices = apply_filters(
								'dark_fusion_layout_choices',
								array(
									'dark_fusion_site_layout_left' => array(
										'label' => '',
										'url'   => DARK_FUSION_TEMPLATE_DIR_URI . '/inc/customizer/assets/img/left.jpg',
									),
									'dark_fusion_site_layout_right' => array(
										'label' => '',
										'url'   => DARK_FUSION_TEMPLATE_DIR_URI . '/inc/customizer/assets/img/right.jpg',
									),
									'dark_fusion_site_layout_without_sidebar' => array(
										'label' => '',
										'url'   => DARK_FUSION_TEMPLATE_DIR_URI . '/inc/customizer/assets/img/full.jpg',
									),
									'dark_fusion_site_layout_stretched' => array(
										'label' => '',
										'url'   => DARK_FUSION_TEMPLATE_DIR_URI . '/inc/customizer/assets/img/stretched.jpg',
									),
								)
							);

	$dark_fusion_sidebar_layout_choices = array(
								'' => array(
									'label' => '',
									'url'   => DARK_FUSION_TEMPLATE_DIR_URI . '/inc/meta-boxes/customizer.png',
								),
							) + $dark_fusion_sidebar_layout_choices; ?>


<table class="form-table">
	<tbody>
		<tr>
			<th><label for="dark_fusion_site_layout"><?php echo esc_html__('Layout','dark-fusion'); ?></label></th>
			<td><?php foreach ( $dark_fusion_sidebar_layout_choices as $layout_id => $value ) : ?>
			<label class="tg-label">
				<input type="radio" class="dark_fusion_site_layout" name="dark_fusion_site_layout" value="<?php echo esc_attr( $layout_id ); ?>" <?php checked( $dark_fusion_site_layout, $layout_id ); ?> />
				<img src="<?php echo esc_url( $value['url'] ); ?>"/>
			</label>
			<?php endforeach; ?>
			</td>	
		</tr>
		<tr>
			<th><label for="seo_tobots"><?php echo esc_html__('Sidebar','dark-fusion'); ?></label></th>
			<td>
				<select id="dark_fusion_page_sidebar" name="dark_fusion_page_sidebar">
					<option value="sidebar-1" <?php selected( 'sidebar-1', $dark_fusion_page_sidebar ); ?>><?php echo esc_html__('Primary','dark-fusion'); ?></option>
					<option value="footer-sidebar-1" <?php selected( 'footer-sidebar-1', $dark_fusion_page_sidebar ); ?> ><?php echo esc_html__('Footer 1','dark-fusion'); ?></option>
					<option value="footer-sidebar-2" <?php selected( 'footer-sidebar-2', $dark_fusion_page_sidebar ); ?> ><?php echo esc_html__('Footer 2','dark-fusion'); ?></option>
					<option value="footer-sidebar-3" <?php selected( 'footer-sidebar-3', $dark_fusion_page_sidebar ); ?> ><?php echo esc_html__('Footer 3','dark-fusion'); ?></option>
					<option value="footer-sidebar-4" <?php selected( 'footer-sidebar-4', $dark_fusion_page_sidebar ); ?> ><?php echo esc_html__('Footer 4','dark-fusion'); ?></option>
					<option value="woocommerce" <?php selected( 'woocommerce', $dark_fusion_page_sidebar ); ?> ><?php echo esc_html__('WooCommerce sidebar','dark-fusion'); ?></option>
					</select>
				</td>
			</tr>
		</tbody>
	</table>
<?php
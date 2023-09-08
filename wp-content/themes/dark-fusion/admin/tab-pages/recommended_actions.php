<?php 
	$dark_fusion_actions = $this->recommended_actions;
	$dark_fusion_actions_todo = get_option( 'recommended_actions', false );
?>
<div id="recommended_actions" class="dark-fusion-tab-pane panel-close">
	<div class="action-list">
		<?php 
		if($dark_fusion_actions): 
			foreach ($dark_fusion_actions as $key => $dark_fusion_val): 
				if($dark_fusion_val['id']!='install_one-click-demo-import' && $dark_fusion_val['id']!='install_elementor'):?>
					<div class="action spice-col-3" id="<?php echo esc_attr($dark_fusion_val['id']); ?>">
						<div class="action-box">
							<div class="action-watch">
							<?php if(!$dark_fusion_val['is_done']): ?>
								<?php if(!isset($dark_fusion_actions_todo[$dark_fusion_val['id']]) || !$dark_fusion_actions_todo[$dark_fusion_val['id']]): ?>
									<span class="dashicons dashicons-visibility"></span>
								<?php else: ?>
									<span class="dashicons dashicons-hidden"></span>
								<?php endif; ?>
							<?php else: ?>
								<span class="dashicons dashicons-yes"></span>
							<?php endif; ?>
							</div>
							<div class="action-inner">
								<h3 class="action-title"><?php echo esc_html($dark_fusion_val['title']); ?></h3>
								<div class="action-desc"><?php echo esc_html($dark_fusion_val['desc']); ?></div>
								<?php echo wp_kses_post($dark_fusion_val['link']); ?>
							</div>
						</div>
					</div>
					<?php 
				endif;
			endforeach; 
		endif; ?>
	</div>
</div>
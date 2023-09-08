<?php
/**
 * Main Header Layout
 *
 * @package Dark Fusion Theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<header class="header-sidebar">
	<nav class="spice spice-custom <?php if(get_theme_mod('sticky_header_enable',false)===true):?>header-sticky<?php endif;?> trsprnt-menu" role="navigation">
		<div class="spice-container">
			<div class="header-rgt">
				<div class="spice-header">
				    <?php the_custom_logo(); ?>
				    <div class="custom-logo-link-url">  
						<h2 class="site-title">
							<a class="site-title-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" style="outline: none;"><?php bloginfo( 'name' ); ?></a>
						</h2>
						<?php
						$dark_fusion_description = get_bloginfo( 'description', 'display' );
						if ( $dark_fusion_description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $dark_fusion_description; ?></p>
						<?php endif;?>
					</div>
				    <button id="spice-toggle" class="spice-toggle" data-toggle="collapse" type="button" aria-controls="menu" aria-expanded="false">
				    	<i class="fas fa-bars"></i>
				    </button>
				</div>
				<div class="collapse spice-collapse" id="custom-collapse">
					<div class="mr-auto">
					<?php require_once get_template_directory() . '/partials/header/header-nav.php'; ?>
					</div>
				</div>
			</div>
		</div>
	</nav>
</header>
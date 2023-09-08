<?php
/**
 * The header for our theme
 *
 * @package Dark Fusion Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
<?php do_action('dark_fusion_wide_boxed_layout');
 	  wp_body_open(); ?>
<div id="page" class="site sps-port">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'dark-fusion' ); ?></a>
<?php
	
	do_action( 'dark_fusion_preloader' );
	do_action( 'dark_fusion_header' );
										
?>
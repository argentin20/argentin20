<?php
/**
 * Footer Widget Area
 *
 * @package Dark Fusion Theme
 */
?>
<div class="spice-row footer-sidebar">
	<?php
        $dark_fusion_layout = get_theme_mod('footer_widget_layout',3);
        switch ( $dark_fusion_layout )
        {   
            case 2:
                dark_fusion_footer_layout('2');
                break;

            case 3:
                dark_fusion_footer_layout('3');
                break;

            case 4:
                dark_fusion_footer_layout('4');
                break;
        }
    ?>
</div>
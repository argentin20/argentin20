<?php
/**
 * Template Name: Full Width Page
 *
*/
get_header();
do_action( 'dark_fusion_breadcrumbs_hook' );
?>
<section class="page-section-full bg-default" id="content">
    <?php 
    if(get_theme_mod('bredcrumb_position','page_header')=='content_area'):
        echo '<div class="spice-col-1">';
        do_action('dark_fusion_breadcrumbs_page_title_hook');
        echo '</div>';
    endif; 
    the_post();
    if(has_post_thumbnail()) {
        if ( is_single() ) { ?>
            <figure class="post-thumbnail">
                <?php the_post_thumbnail('full', array('class'=>'img-fluid', 'loading' => false )); ?>                  
            </figure>
        <?php }
        else { ?>
            <figure class="post-thumbnail">
                <a href="<?php the_permalink(); ?>" >
                    <?php the_post_thumbnail('full', array('class'=>'img-fluid', 'loading' => false )); ?>
                </a>                
            </figure>
        <?php }
    }
    ?>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
</section>
<?php
get_footer();
<?php
/**
 * Template Name: Home Page
 *
*/

get_header();
?>
<section class="page-section-full bg-default" id="content">
    <?php  
    the_post();
    if(has_post_thumbnail()) { ?>
        <figure class="post-thumbnail">
            <a href="<?php the_permalink(); ?>" >
                <?php the_post_thumbnail('full', array('class'=>'img-fluid', 'loading' => false )); ?>
            </a>                
        </figure>
    <?php }
    the_content(); ?>
</section>
<?php
get_footer();
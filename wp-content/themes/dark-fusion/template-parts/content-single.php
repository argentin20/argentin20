<?php
/**
 * Template part for displaying single post content
 *
 * @package Dark Fusion Theme
 */
$dark_fusion_single_post_order = get_theme_mod( 'dark_fusion_single_post_order', array('post_meta', 'post_title','post_content'));
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post blog-single')?> >	
	
	<!-- Post Featured Image -->
	<?php 
	if(has_post_thumbnail()): ?>
		<figure class="post-thumbnail">
			<?php the_post_thumbnail('full', array('class'=>'img-fluid', 'loading' => false )); ?>
		</figure>
	<?php endif; 

	if ( ! empty( $dark_fusion_single_post_order ) && is_array( $dark_fusion_single_post_order ) ) :
		echo '<div class="post-content">';
		foreach ( $dark_fusion_single_post_order as $dark_fusion_single_post_order_key => $dark_fusion_single_post_order_val ) :
			
	        $dark_fusion_single_post_meta_sort = get_theme_mod( 'dark_fusion_single_post_meta_sort', array( 'single_post_date','single_post_author', 'single_post_category'));
	        if ( ! empty( $dark_fusion_single_post_meta_sort )): 
				if ( 'post_meta' === $dark_fusion_single_post_order_val ) :?>
					<div class="entry-meta">
						<!-- Post Date -->
						<?php 
						if ( ! empty( $dark_fusion_single_post_meta_sort ) && is_array( $dark_fusion_single_post_meta_sort ) ) :
							foreach ( $dark_fusion_single_post_meta_sort as $dark_fusion_single_post_meta_sort_key => $dark_fusion_single_post_meta_sort_val ) :
								if ( 'single_post_date' === $dark_fusion_single_post_meta_sort_val ) : ?>	
									<span class="date">	
										<a href="<?php echo esc_url(home_url()); ?>/<?php echo esc_html(date('Y/m', strtotime(get_the_date()))); ?>" alt="<?php esc_attr_e('date-time','dark-fusion'); ?>">
										   <time class="entry-date"><?php echo esc_html(get_the_date()); ?></time>
										</a>
									</span>
								<?php endif; ?>

									<!-- Post Author -->
			 					<?php if ( 'single_post_author' === $dark_fusion_single_post_meta_sort_val ) :?>
										<span class="author">
										<i class="fa fa-user"></i>
											<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
							                <?php echo esc_html(get_the_author()); ?></a>
							            </span>				            
									<?php endif; ?>

								<!-- Post Category -->
								<?php if ( 'single_post_category' === $dark_fusion_single_post_meta_sort_val ) :
									if ( has_category() ) :
										echo '<span class="cat-links">';
										echo '<i class="far fa-folder-open"></i>';
										the_category( ', ' );
										echo '</span>';
									endif; 
								endif; ?>

								<?php
							endforeach;
						endif;?>
					</div>
				
				<?php
				endif;
			endif;
			if ( 'post_title' === $dark_fusion_single_post_order_val ) :?>
				<!-- Post Title -->
				<header class="entry-header">
					<h3 class="entry-title">
						<?php the_title();?>
					</h3>                                                  
				</header>
			<?php endif;
			if ( 'post_content' === $dark_fusion_single_post_order_val ) :?>
				<!-- Post Content -->
				<div class="entry-content">
					<?php the_content();
					wp_link_pages( ); ?> 
				</div>
			<?php endif;
		endforeach;
	  if(get_theme_mod('dark_fusion_enable_separator',true)==true):
		echo '<div class="spice-seprator"></div>';
		endif;
	endif;
	if(get_theme_mod('dark_fusion_enable_single_post_tag',true)==true):
		if(has_tag()): ?>
			<div class="footer-meta entry-meta left-align">
				<span class="tag-links"><?php the_tags('',' ');?></span>
			</div>
		<?php endif; 				
		echo '</div>';
	endif; ?>
</article>
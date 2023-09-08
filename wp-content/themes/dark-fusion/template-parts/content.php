<?php
/**
 * Template part for displaying posts
 *
 * @package Dark Fusion Theme
 */

$dark_fusion_blog_post_order = get_theme_mod('dark_fusion_blog_post_order',array('blog_meta', 'blog_title','blog_content'));
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?> >
		
	    <?php
		if(has_post_thumbnail()): ?>
			<!-- Post Featured Image -->
			<figure class="post-thumbnail">
				<a href="<?php the_permalink(); ?>" >
					<?php the_post_thumbnail('full', array('class'=>'img-fluid', 'loading' => false )); ?>
				</a>				
			</figure>
		<?php endif;
		if ( ! empty( $dark_fusion_blog_post_order ) && is_array( $dark_fusion_blog_post_order ) ) :
		echo '<div class="post-content">';
		foreach ( $dark_fusion_blog_post_order as $dark_fusion_blog_post_order_key => $dark_fusion_blog_post_order_val ) : 
			if ( 'blog_meta' === $dark_fusion_blog_post_order_val ) :?>
			        <!-- Entry Meta --> 
					<div class="entry-meta">
						<?php 
			 			$dark_fusion_meta_sort = get_theme_mod( 'dark_fusion_blog_meta_sort', 
												array('blog_date','blog_author','blog_category'));
			 			if ( ! empty( $dark_fusion_meta_sort ) && is_array( $dark_fusion_meta_sort ) ) :
			 				foreach ( $dark_fusion_meta_sort as $dark_fusion_meta_sort_key => $dark_fusion_meta_sort_val ) : ?>

			 					<!-- Post date -->
			 					<?php if ( 'blog_date' === $dark_fusion_meta_sort_val ) : ?>	
									<span class="date">	
										<a href="<?php echo esc_url(home_url()); ?>/<?php echo esc_html(date('Y/m', strtotime(get_the_date()))); ?>" alt="<?php esc_attr_e('date-time','dark-fusion'); ?>">
										   <time class="entry-date"><?php echo esc_html(get_the_date()); ?></time>
										</a>
									</span>
								<?php endif; ?>
			 					
			 					<!-- Post Author -->
			 					<?php if ( 'blog_author' === $dark_fusion_meta_sort_val ) :?>
										<span class="author">
										<i class="fa fa-user"></i>
										
											<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
							                <?php echo esc_html(get_the_author()); ?></a>
							            </span>				            
									<?php endif; ?>
			 					
								<!-- Post Category -->
								<?php if ( 'blog_category' === $dark_fusion_meta_sort_val ) :
									if ( has_category() ) :
										echo '<span class="cat-links">';
										
										echo '<i class="far fa-folder-open"></i>';
										
										the_category( ', ' );
										echo '</span>';
									endif; 
								endif;

							endforeach;
						endif; ?>
					</div>
				<?php endif;

				if ( 'blog_title' === $dark_fusion_blog_post_order_val ) :?>
					<!-- Post Title -->
					<header class="entry-header">
						<h3 class="entry-title">
							<a href="<?php the_permalink();?>"><?php the_title();?></a>
						</h3>                                                  
					</header>
				<?php endif;

				if ( 'blog_content' === $dark_fusion_blog_post_order_val ) :?>

					<!-- Post Content -->
					<div class="entry-content">
						<?php do_action( 'dark_fusion_post_content_data' ); ?>
						<?php $dark_fusion_button_show_hide=get_theme_mod('dark_fusion_blog_content','excerpt');
						if($dark_fusion_button_show_hide=="excerpt")
						{	
							if(get_theme_mod('dark_fusion_enable_post_read_more',true)==true):?>
								<a href="<?php echo esc_url(get_the_permalink());?>" class="more-link" alt="<?php esc_attr_e('more-details','dark-fusion'); ?>"><?php esc_html_e('Read More','dark-fusion');?></a>
							<?php 
							endif;
						} ?>
						<div class="footer-meta entry-meta">
							<?php if(get_theme_mod('dark_fusion_enable_post_comment',true)==true):?>
							<span>						  
								<i class="fas fa-comment-alt"></i>
								<a href="<?php the_permalink(); ?>#respond" alt="<?php esc_attr_e('Comments','dark-fusion'); ?>">
								     			<?php echo esc_html(get_comments_number()); ?>&nbsp;<?php echo esc_html__('Comments','dark-fusion'); ?>
						     	</a>
					     	</span>
					     	<?php endif;?>
						</div> 
						
					</div>
				<?php 
				endif;
		endforeach;
		echo '</div>';
	endif;?>
</article>
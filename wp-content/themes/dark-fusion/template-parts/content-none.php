<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @package Dark Fusion Theme
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post content-none'); ?>>
	<div class="post-content">
		<header class="entry-header">
			<h3 class="entry-title"><?php esc_html_e('Nothing found', 'dark-fusion' ); ?></h3>
			<p><?php esc_html_e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.','dark-fusion' ); ?></p>
		</header>
	</div>
</article>
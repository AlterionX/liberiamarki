<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
			// Start the loop.
			while ( have_posts() ) {

			the_post();

				/*
				 * Include the post format-specific template for the content. If you want to
				 * use this in a child theme, then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

				// Previous/next post navigation.
				/*the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'marki' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'marki' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'marki' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'marki' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );*/

			// End the loop.
			}
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>

<script>
jQuery('#entry-fancy-footer').ready(new function(){
	//alert(jQuery('body').height()+"||||||"+jQuery(window).height());
	if (jQuery('body').height() < jQuery(window).height()) {
		jQuery('html').height(jQuery(window).height());
		jQuery('body').height(jQuery(window).height());
		
		var contentHeight = jQuery('#content').height();
		var headerHeight = jQuery('#main-wrap>header').outerHeight(true);
		var content2Height = jQuery('#main-wrap>div').outerHeight(true);
		var footerHeight = jQuery('#entry-fancy-footer').outerHeight(true);
		var botmargin = 19.188;
		jQuery('#entry-fancy-footer').css('height', (contentHeight-headerHeight-content2Height-botmargin)+'px');
		
		//alert(JSON.stringify(jQuery('#entry-fancy-footer')));
		//alert(contentHeight+"|"+headerHeight+"|"+content2Height+"|"+footerHeight);
		
		jQuery('#primary').height(contentHeight+'px');
		jQuery('#content-footer-fancy').height('100%');
	}
});
</script>
<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
		
	<div id="primary" class="content-front-area">
		<main id="main" class="site-front-main" role="main">
			<div id="main-front-wrap" class="center-wrapped">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'marki' ), get_search_query() ); ?></h1>
					</header><!-- .page-header -->

					<?php
					// Start the loop.
					while ( have_posts() ) : the_post(); ?>

						<?php
						/*
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'content', 'search' );

					// End the loop.
					endwhile;

					// Previous/next page navigation.
					the_posts_pagination( array(
						'prev_text'          => __( 'Previous page', 'marki' ),
						'next_text'          => __( 'Next page', 'marki' ),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'marki' ) . ' </span>',
					) );

				// If no content, include the "No posts found" template.
				else :
					get_template_part( 'content', 'none' );

				endif;
				?>
				
			</div>

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
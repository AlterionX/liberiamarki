<?php

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main center-wrapper" role="main">
			<?php while ( have_posts() ) { the_post(	);
				// Include the page content template.
				get_template_part( 'content', 'page' );
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			} ?>
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
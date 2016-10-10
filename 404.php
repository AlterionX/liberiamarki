<?php
	/**
	 * The template for displaying 404 pages (not found)
	 *
	 * @package Liberia
	 * @subpackage Mark_One
	 * @since Mark_One
	 */
	get_header();
?>		
<div id="primary" class="content-front-area">
	<main id="main" class="site-front-main" role="main">
		<div id="main-front-wrap" class="center-wrapped">
			<section class ="error-404 not-found">
				<?php get_header("search"); ?>
				<div class="page-content">
					<p><?php
						_e( 'It looks like nothing was found at this location. Maybe try a search?' )
					?></p>
					<?php
						get_search_form();
					?>
				</div>
				<?php get_footer("search"); ?>
			</section>
		</div>
	</main>
</div>

<?php
	get_footer();
?>

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
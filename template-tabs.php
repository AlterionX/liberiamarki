<?php /* Template Name: Three Tabbed Page */ ?>

<?php get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main center-wrapper" role="main">
		<div id="main-wrap" class="center-wrapped">
			<?php get_header('entry'); ?>
			<div id="content-nav">
				<button id="tab-one-button" class="tab-button"><?php echo the_field('tab_one_label'); ?></button>
				<button id="tab-two-button" class="tab-button"><?php echo the_field('tab_two_label'); ?></button>
				<button id="tab-three-button" class="tab-button"><?php echo the_field('tab_three_label'); ?></button>
			</div>
			<div id="content-one-pane" class="content-pane">
				<h1 id="pane-one-title"><?php echo the_field('tab_one_title'); ?></h1>
				<?php echo the_field('tab_one_content'); ?>
			</div>
			<div id="content-two-pane" class="content-pane">
				<h1 id="pane-two-title"><?php echo the_field('tab_two_title'); ?></h1>
				<?php echo the_field('tab_two_content'); ?>
			</div>
			<div id="content-three-pane" class="content-pane">
				<h1 id="pane-three-title"><?php echo the_field('tab_three_title'); ?></h1>
				<?php echo the_field('tab_three_content'); ?>
			</div>
			<?php get_footer('entry'); ?>
		</div>
	</main>
</div>
<?php get_footer(); ?>

<script>
function heightMaximize() {
	//alert(jQuery('body').height()+"||||||"+jQuery(window).height());
	if (jQuery('body').height() < jQuery(window).height()) {
		jQuery('html').height(jQuery(window).height());
		jQuery('body').css('overflow', "hidden");
		jQuery('body').height(jQuery(window).height());
		
		var contentHeight = jQuery('#content').height();
		var botmargin = 19.188;
		jQuery('#entry-fancy-footer').css('height', (contentHeight-botmargin)+'px');
		
		//alert(JSON.stringify(jQuery('#entry-fancy-footer')));
		//alert(contentHeight+"|"+headerHeight+"|"+content2Height+"|"+footerHeight);
		
		jQuery('#primary').height(contentHeight+'px');
		jQuery('#content-footer-fancy').height('100%');
	}
};
function tabSel(select) {
	jQuery('.tab-button').blur();
	jQuery('.content-pane').css('visibility', "hidden");
	jQuery('.tab-button').removeClass('selected-tab');
	
	jQuery('#content-'+select+'-pane').css('visibility', "visible");
	jQuery('#tab-'+select+'-button').addClass('selected-tab');
	
	heightMaximize();
	
	//alert(jQuery('#content-'+select+'-pane').height());
	//alert(jQuery('#content').height()-110);
	
	if ((jQuery('#content').height()-110) < jQuery('#content-'+select+'-pane').height()) {
		//alert("Resetting body height");
		jQuery('html').height((jQuery('#content-'+select+'-pane').height()+335));
		//alert("html set to height " + (jQuery('#content-'+select+'-pane').height()+335));
		jQuery('body').height((jQuery('#content-'+select+'-pane').height()+335));
		jQuery('#content').height((jQuery('content-'+select+'-pane').height()+110));
	} else {
		jQuery('html').height(jQuery(window).height());
		jQuery('body').height(jQuery(window).height());
	}
}

jQuery('#entry-fancy-footer').ready(function(){heightMaximize(); tabSel("one");});

jQuery('#tab-one-button').click(function(){tabSel("one");});
jQuery('#tab-two-button').click(function(){tabSel("two");});
jQuery('#tab-three-button').click(function(){tabSel("three");});

</script>
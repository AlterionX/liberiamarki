<?php
	get_header('front')
?>

<!--<div id="vert-center-wrapper" class="vert-center-wrapped">-->
	<div id="primary" class="content-front-area">
		<main id="main" class="site-front-main" role="main">
			<div id="main-front-wrap" class="center-wrapped">
				<?php get_template_part('slideshow', 'front') ?>
			</div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->
<!--</div>-->

<?php
	get_footer( 'front' )
?>

<script>
jQuery().ready(function() {
	//alert();
	jQuery('html').css('height', "100%");
	jQuery('body').css('height', "100%");
});
</script>
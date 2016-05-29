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

jQuery('body').ready(function() {
	
});

</script>
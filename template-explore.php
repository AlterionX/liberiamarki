<?php /* Template Name: Explore Home */ ?>

<?php get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main center-wrapper" role="main">
		<div id="main-wrap" class="center-wrapped">
			<?php get_header('entry'); ?>
			<?php the_content(); ?>
			<?php get_template_part('mosaic', 'buttons') ?>
			<?php get_footer('entry'); ?>
		</div>
	</main>
</div>
<?php get_footer(); ?>
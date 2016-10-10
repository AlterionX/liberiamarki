<?php /* Template Name: Explore Home */ ?>

<?php get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main center-wrapper" role="main">
		<div id="main-wrap" class="center-wrapped">
			<?php get_header('entry'); ?>
			<div class="entry-content">
				<?php /*var_dump(*/echo get_object_vars($GLOBALS["post"])["post_content"]/*)*/?>
				<?php
					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'marki' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'marki' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					) );
				?>
			</div><!-- .entry-content -->
			<?php get_template_part('mosaic', 'buttons') ?>
			<?php get_footer('entry'); ?>
		</div>
	</main>
</div>
<?php get_footer(); ?>
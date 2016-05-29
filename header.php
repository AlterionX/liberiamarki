<?php
/**
 * The template for displaying the header, including the menubar.
 *
 * @package Liberia
 * @subpackage Mark_One
 * @since Mark One 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page"><!--class="hfeed site"-->
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content' ); ?></a>
	<header id="masthead" class="site-front-header" role="banner">
		<?php get_template_part('branding') ?>
		<?php if ( has_nav_menu( 'main-menu' ) ) { get_template_part('main', 'menu'); } ?>
		
	</header><!-- .site-header -->
	<div id="content" class="site-content center-wrapper">
	
	
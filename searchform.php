<?php
/**
 * The template part for the search form.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package Liberia
 * @subpackage Mark One
 * @since Mark One 1.0
 */
?>

<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
	<div><input type="text" size="18" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" />
	<input type="submit" id="searchsubmit" value="Search" class="btn" />
	</div>
</form>
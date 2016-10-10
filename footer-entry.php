<?php

?>

<style>
#left-entry-footer {
	background-color:<?php echo get_field('left_button_background'); ?>; color:<?php echo get_field('left_button_color'); ?>;
}
#left-entry-footer > a > p {
	background-color:<?php echo get_field('left_button_background'); ?>; color:<?php echo get_field('left_button_color'); ?>;
}
#right-entry-footer {
	background-color:<?php echo get_field('right_button_background'); ?>; color:<?php echo get_field('right_button_color'); ?>;
}
#right-entry-footer > a > p {
	background-color:<?php echo get_field('right_button_background'); ?>; color:<?php echo get_field('right_button_color'); ?>;
}
#left-entry-footer:hover {
	background-color:<?php echo get_field('left_button_hover_background'); ?>; color:<?php echo get_field('left_button_hover_color'); ?>;
}
#left-entry-footer:hover > a > p {
	background-color:<?php echo get_field('left_button_hover_background'); ?>; color:<?php echo get_field('left_button_hover_color'); ?>;
}
#right-entry-footer:hover {
	background-color:<?php echo get_field('right_button_hover_background'); ?>; color:<?php echo get_field('right_button_hover_color'); ?>;
}
#right-entry-footer:hover > a > p {
	background-color:<?php echo get_field('right_button_hover_background'); ?>; color:<?php echo get_field('right_button_hover_color'); ?>;
}
</style>

<?php if (get_field('fancy_footer_present')) { ?>
<footer id="entry-fancy-footer" class="entry-footer">
	<div id="content-footer-fancy">
		<a id="left-footer-button" class="left-footer-button" href="<?php echo get_field('left_button_link'); ?>">
			<div id="left-entry-footer">
				<p class="button-text-abs-center-left"><?php echo get_field('left_button_name'); ?></p>
			</div>
		</a>
		<a id="right-footer-button" class="right-footer-button" href="<?php echo get_field('right_button_link'); ?>">
			<div id="right-entry-footer">
				<p class="button-text-abs-center-right"><?php echo get_field('right_button_name'); ?></p>
			</div>
		</a>
	</div>
</footer>
<?php } else { ?>
	<!--Nothing happening here. Go away. I'm a ghost.-->
<?php } ?>
<?php

?>

<?php if (get_field('fancy_footer_present')) { ?>
<footer id="entry-fancy-footer" class="entry-footer">
	<div id="content-footer-fancy">
		<div id="left-entry-footer">
			<a id="history-button" class="left-footer-button" href="<?php echo get_field('left_button_link'); ?>">
				<p class="button-text-abs-center-left"><?php echo get_field('left_button_name'); ?></p>
			</a>
		</div>
		<div id="right-entry-footer">
			<a id="meet-the-team-button" class="right-footer-button" href="<?php echo get_field('left_button_link'); ?>">
				<p class="button-text-abs-center-right"><?php echo get_field('right_button_name'); ?></p>
			</a>
		</div>
	</div>
</footer>
<?php } else { ?>

<?php } ?>
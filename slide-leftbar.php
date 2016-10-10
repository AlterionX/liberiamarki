<?php
/**
 * The template for displaying the header, including the menubar.
 *
 * @package Liberia
 * @subpackage Mark_One
 * @since Mark One 1.0
 */

?>

<?php global $curr_slide; ?>
<div id="slide-<?php echo $curr_slide['number']; ?>" class="slide slide-leftbar">
	<div id="slide-<?php echo $curr_slide['number']; ?>-image-wrapper" class="slide-leftbar-image-wrapper">
		<image id="slide-<?php echo $curr_slide['number']; ?>-image" class="slide-image slide-leftbar-image" src="<?php echo $curr_slide['image_link']; ?>">
		</image>
	</div>
	<div id="slide-<?php echo $curr_slide['number']; ?>-text-wrapper" class="slide-text-wrapper slide-leftbar-text-wrapper">
		<div id="slide-<?php echo $curr_slide['number']; ?>-text" class="slide-text slide-leftbar-text">
			<h1 id="slide-<?php echo $curr_slide['number']; ?>-title" class="slide-text-title slide-leftbar-title">
				<?php echo $curr_slide['title']; ?>
			</h1>
			<p id="slide-<?php echo $curr_slide['number']; ?>-desc" class="slide-text-desc slide-leftbar-text-desc">
				<?php echo $curr_slide['text']; ?>
			</p>
			<a id="slide-<?php echo $curr_slide['number']; ?>-link-button" class="slide-leftbar-button" href="<?php echo $curr_slide['button_link']; ?>">
				<?php echo $curr_slide['button_text']; ?>
			</a>
		</div>
	</div>
</div>
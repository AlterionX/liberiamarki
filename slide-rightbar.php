<?php global $curr_slide; ?>

<div id="slide-<?php echo $curr_slide['number']; ?>" class="slide slide-rightbar">
	<div id="slide-<?php echo $curr_slide['number']; ?>-image-wrapper" class="slide-rightbar-image-wrapper">
		<image id="slide-<?php echo $curr_slide['number']; ?>-image" class="slide-image slide-rightbar-image" src="<?php echo $curr_slide['image_link']; ?>">
		</image>
	</div>
	<div id="slide-<?php echo $curr_slide['number']; ?>-text-wrapper" class="slide-text-wrapper slide-rightbar-text-wrapper">
		<div id="slide-<?php echo $curr_slide['number']; ?>-text" class="slide-text slide-rightbar-text">
			<h1 id="slide-<?php echo $curr_slide['number']; ?>-title" class="slide-text-title slide-rightbar-title">
				<?php echo $curr_slide['title']; ?>
			</h1>
			<p id="slide-<?php echo $curr_slide['number']; ?>-desc" class="slide-text-desc slide-rightbar-text-desc">
				<?php echo $curr_slide['text']; ?>
			</p>
			<a id="slide-<?php echo $curr_slide['number']; ?>-link-button" class="slide-rightbar-button" href="<?php echo $curr_slide['button_link']; ?>">
				<?php echo $curr_slide['button_text']; ?>
			</a>
		</div>
	</div>
</div>
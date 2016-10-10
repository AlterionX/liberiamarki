<?php global $curr_slide; ?>

<div id="slide-<?php echo $curr_slide['number']; ?>" class="slide slide-righttwobar">
	<div id="slide-<?php echo $curr_slide['number']; ?>-image-wrapper" class="slide-righttwobar-image-wrapper">
		<image id="slide-<?php echo $curr_slide['number']; ?>-image" class="slide-image slide-righttwobar-image" src="<?php echo $curr_slide['image_link']; ?>">
		</image>
	</div>
	<div id="slide-<?php echo $curr_slide['number']; ?>-text-wrapper" class="slide-righttwobar-text-wrapper">
		<div id="slide-<?php echo $curr_slide['number']; ?>-text-top" class="slide-text slide-righttwobar-text-top">
			<h1 id="slide-<?php echo $curr_slide['number']; ?>-title" class="slide-title slide-righttwobar-title">
				<?php echo $curr_slide['title']; ?>
			</h1>
		</div>
		<div id="slide-<?php echo $curr_slide['number']; ?>-text-spacer" class="slide-righttwobar-text-spacer"></div>
		<div id="slide-<?php echo $curr_slide['number']; ?>-text-bot" class="slide-text slide-righttwobar-text-bot">
			<p id="slide-<?php echo $curr_slide['number']; ?>-desc" class="slide-text-desc slide-righttwobar-text-desc">
				<?php echo $curr_slide['text']; ?>
			</p>
			<a id="slide-<?php echo $curr_slide['number']; ?>-link-button" class="slide-righttwobar-link-button" href="<?php echo $curr_slide['button_link']; ?>">
				<?php echo $curr_slide['button_text']; ?>
			</a>
		</div>
	</div>
</div>
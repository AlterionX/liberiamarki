<div id="slideshow" class="slideshow">
	<button id="slideshow-backward-button" class="slideshow-front-backward">
		<image src="<?php echo get_template_directory_uri().'/pic/backwardbutton.png' ?>"></image>
	</button>
	<button id="slideshow-forward-button" class="slideshow-front-forward" >
		<image src="<?php echo get_template_directory_uri().'/pic/forwardbutton.png' ?>"></image>
	</button>
	<?php
	global $curr_slide;
	$slide_num = 0;
	if (have_rows('slides')) {
		while (have_rows('slides')) {
			the_row();
			$slide_num++;
			$curr_slide = array(
				'number' => $slide_num,
				'type' => get_sub_field('slide_type'),
				'image_link' => get_sub_field('slide_image'),
				'title' => get_sub_field('slide_title'),
				'text' => sanitize_text_field(get_sub_field('slide_text')),
				'button_text' => get_sub_field('button_text'),
				'button_link' => get_sub_field('button_link')
			);
			get_template_part('slide', $curr_slide['type']);
		}
	}
	?>
	
</div>
<div id="bubble-pane">
	<?php
		for ($i = 1; $i <= $slide_num; $i++) {
			//Every row, add bubbles
			echo '<div id="'.$i.'-bubble" class="bubble selected-bubble"></div>';
		}
	?>
</div>
<script>
	var current = 0;
	var quant = JSON.parse(<?php echo json_encode($slide_num); ?>);
	
	var sel_bubble = function () {
		jQuery('.bubble').removeClass('selected-bubble');
		jQuery('#'+(current+1)+'-bubble').addClass('selected-bubble');
	}
	var rand_img = function(curr){
		jQuery('.slide').css('visibility', "hidden");
		jQuery('#slide-'+(curr+1)).css('visibility', "visible");
		
		sel_bubble();
	}
	
	jQuery().ready(function(){
		rand_img(0);
	});
	
	jQuery(".bubble").click(function() {
		var past_sel = current;
		current = Number((jQuery(this).attr('id')).substr(0,1))-1;
		rand_img(current);
	});
	
	jQuery("#slideshow-forward-button").click(function () {
		/*alert(imgSlide);
		alert(setSlide);*/
		
		var past_sel = current;
		
		/*alert(current);*/
		current++;
		/*alert(current);*/
		current = current%quant;
		/*alert(current);*/
		
		rand_img(current);
		this.blur();
	});
	
	jQuery("#slideshow-backward-button").click( function(){
		var past_sel = current;
		
		current--;
		current = (current+quant)%quant;
		/*alert(imgSlide);
		alert(setSlide);*/
		
		rand_img(current);
		this.blur();
	});
</script>
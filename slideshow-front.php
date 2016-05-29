<?php 
	while(have_posts()) { the_post();
	$settings = get_theme_mod('marki-slideshow');
	$set_json = json_encode($settings);
	//echo var_dump($settings);
	$query_images = new WP_Query(array(
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'post_status'    => 'inherit',
		'posts_per_page' => - 1
	));
	$images = array();
	foreach ( $query_images->posts as $image ) {
		$images[] = wp_get_attachment_url( $image->ID );
	}
	$img_json = json_encode($images);
	/*echo var_dump(get_field('image_one'));*/
 ?>

<div id="slideshow" class="slideshow">
	<button id="slideshow-backward-button" class="slideshow-front-backward">
		<image src="<?php echo get_template_directory_uri().'/pic/backwardbutton.png' ?>"></image>
	</button>
	<button id="slideshow-forward-button" class="slideshow-front-forward" >
		<image src="<?php echo get_template_directory_uri().'/pic/forwardbutton.png' ?>"></image>
	</button>
	<div id="slide-1" class="slide">
		<div id="slide-1-image-wrapper">
			<image id="slide-1-image" class="slideshow-image" src="<?php
				if (get_field('image_one')) {
					echo get_field('image_one');
				} else {
					echo get_template_directory_uri().'/pic/tempplaceholder.png';
				}
			?>">
			</image>
		</div>
		<div id="slide-1-text-wrapper" class="slideshow-text-wrapper">
			<div id="slide-1-text" class="slideshow-text">
				<h1 id="slide-1-title" class="slideshow-text-title">
					<?php if (get_field('slide_one_title') !== '') { echo get_field('slide_one_title'); }
					else { echo 'What? There\'s no title...'; echo var_dump(get_field('slide_one_title')); } ?>
				</h1>
				<p id="slide-1-desc" class="slideshow-text-desc">
					<?php if (get_field('slide_one_text') !== '') { echo get_field('slide_one_text'); }
					else { echo 'No description? HOW LAAAAAMMMMEEEEE'; echo var_dump(get_field('slide_one_text')); } ?>
				</p>
				<a id="slide-1-link-button" href="<?php echo get_field('slide_one_button_link'); ?>">
					<?php if (get_field('slide_one_button') !== '') { echo get_field('slide_one_button'); }
					else { echo 'WAAAAAHHHHH. Crying'; echo var_dump(get_field('slide_one_button')); } ?>
				</a>
			</div>
		</div>
	</div>
	<div id="slide-2" class="slide">
		<div id="slide-2-image-wrapper">
			<image id="slide-2-image" class="slideshow-image" src="<?php
				if (get_field('image_two') !== '') {
					echo get_field('image_two');
				} else { 
					echo get_template_directory_uri().'/pic/tempplaceholder.png';
				}
			?>">
			</image>
		</div>
		<div id="slide-2-text-wrapper">
			<div id="slide-2-text" class="slideshow-text">
				<h1 id="slide-2-title" class="slideshow-text-title">
					<?php if (get_field('slide_two_title') !== '') { echo get_field('slide_two_title'); }
					else { echo 'What? There\'s no title...'; echo var_dump(get_field('slide_two_title')); } ?>
				</h1>
				<p id="slide-2-desc" class="slideshow-text-desc">
					<?php if (get_field('slide_two_text') !== '') { echo get_field('slide_two_text'); }
					else { echo 'No description? HOW LAAAAAMMMMEEEEE'; echo var_dump(get_field('slide_two_text')); } ?>
				</p>
				<a id="slide-2-link-button" href="<?php echo get_field('slide_one_button_link'); ?>">
					<?php if (get_field('slide_two_button') !== '') { echo get_field('slide_two_button'); }
					else { echo 'WAAAAAHHHHH. Crying'; echo var_dump(get_field('slide_two_button')); } ?>
				</a>
			</div>
		</div>
	</div>
	
	<div id="slide-3" class="slide">
		<div id="slide-3-image-wrapper">
			<image id="slide-3-image" class="slideshow-image" src="<?php
				if (get_field('image_three') !== '') {
					echo get_field('image_three');
				} else { 
					echo get_template_directory_uri().'/pic/tempplaceholder.png';
				}
			?>">
			</image>
		</div>
		<div id="slide-3-text-wrapper">
			<div id="slide-3-text" class="slideshow-text">
				<h1 id="slide-3-title" class="slideshow-text-title">
					<?php if (get_field('slide_three_title') !== '') { echo get_field('slide_three_title'); }
					else { echo 'What? There\'s no title...'; echo var_dump(get_field('slide_three_title')); } ?>
				</h1>
				<p id="slide-3-desc" class="slideshow-text-desc">
					<?php if (get_field('slide_three_text') !== '') { echo get_field('slide_three_text'); }
					else { echo 'No description? HOW LAAAAAMMMMEEEEE'; echo var_dump(get_field('slide_three_text')); } ?>
				</p>
				<a id="slide-3-link-button" href="<?php echo get_field('slide_one_button_link'); ?>">
					<?php if (get_field('slide_three_button') !== '') { echo get_field('slide_three_button'); }
					else { echo 'WAAAAAHHHHH. Crying'; echo var_dump(get_field('slide_three_button')); } ?>
				</a>
			</div>
		</div>
	</div>
	<div id="slide-4" class="slide">
		<div id="slide-4-image-wrapper">
			<image id="slide-4-image" class="slideshow-image" src="<?php
				if (get_field('image_four') !== '') {
					echo get_field('image_four');
				} else { 
					echo get_template_directory_uri().'/pic/tempplaceholder.png';
				}
			?>">
			</image>
		</div>
		<div id="slide-4-text-wrapper">
			<div id="slide-4-text-top" class="slideshow-text">
				<h1 id="slide-4-title" class="slideshow-text-title">
					<?php if (get_field('slide_four_title') !== '') { echo get_field('slide_four_title'); }
					else { echo 'What? There\'s no title...'; echo var_dump(get_field('slide_four_title')); } ?>
				</h1>
			</div>
			<div id="slide-4-text-spacer"></div>
			<div id="slide-4-text-bot" class="slideshow-text">
				<p id="slide-4-desc" class="slideshow-text-desc">
					<?php if (get_field('slide_four_text') !== '') { echo get_field('slide_four_text'); }
					else { echo 'No description? HOW LAAAAAMMMMEEEEE'; echo var_dump(get_field('slide_four_text')); } ?>
				</p>
				<a id="slide-4-link-button" href="<?php echo get_field('slide_one_button_link'); ?>">
					<?php if (get_field('slide_four_button') !== '') { echo get_field('slide_four_button'); }
					else { echo 'WAAAAAHHHHH. Crying'; echo var_dump(get_field('slide_four_button')); } ?>
				</a>
			</div>
		</div>
	</div>
</div>
<div id="bubble-pane">
	<?php
		if (!is_null($settings['1-img'])) {
			echo '<div id="1-bubble" class="bubble selected-bubble"></div>';
		}
		if (!is_null($settings['2-img'])) {
			echo '<div id="2-bubble" class="bubble"></div>';
		}
		if (!is_null($settings['3-img'])) {
			echo '<div id="3-bubble" class="bubble"></div>';
		}
		if (!is_null($settings['4-img'])) {
			echo '<div id="4-bubble" class="bubble"></div>';
		}
		if (!is_null($settings['5-img'])) {
			echo '<div id="5-bubble" class="bubble"></div>';
		}
	?>
</div>
	<?php } ?>
<script>
	var current = 0;
	
	var sel_bubble = function () {
		jQuery('.bubble').removeClass('selected-bubble');
		jQuery('#'+(current+1)+'-bubble').addClass('selected-bubble');
	}
	var rand_img = function(past, curr){
		jQuery('.slide').css('visibility', "hidden");
		jQuery('#slide-'+(curr+1)).css('visibility', "visible");
		
		sel_bubble();
	}
	
	jQuery().ready(function(){
		rand_img(0, 0);
	});
	
	jQuery(".bubble").click(function() {
		var past_sel = current;
		current = Number((jQuery(this).attr('id')).substr(0,1))-1;
		rand_img(past_sel, current);
	});
	
	jQuery("#slideshow-forward-button").click(function () {
		/*alert(imgSlide);
		alert(setSlide);*/
		
		var past_sel = current;
		
		/*alert(current);*/
		current++;
		/*alert(current);*/
		current = current%4;
		/*alert(current);*/
		
		rand_img(past_sel, current);
		this.blur();
	});
	
	jQuery("#slideshow-backward-button").click( function(){
		var past_sel = current;
		
		current--;
		current = (current+4)%4;
		/*alert(imgSlide);
		alert(setSlide);*/
		
		rand_img(past_sel, current);
		this.blur();
	});
	
	jQuery('#slide--link-button').click(function(){
		
	});
</script>
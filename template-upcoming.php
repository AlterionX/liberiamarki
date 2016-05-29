<?php /* Template Name: Event List */ ?>

<?php get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main center-wrapper" role="main">
		<div id="main-wrap" class="center-wrapped">
			<?php get_header('entry'); ?>
			<?php
				global $isEvent;
				$isEvent = true;
				$pages = array();
				$queryboard = new WP_Query(array(
					'post_type'=>"post", 'category_name'=>"upcoming-post",
					'meta_query'=>array('key'=>"event_date"),
					'orderby' => "meta_value",
					'meta_key' => "event_date",
					'order' => "DESC"
				));
				$counter = 0;
				$queue = array();
				if ($queryboard->have_posts()) {
					while ($queryboard->have_posts()) {
						$queryboard->the_post();
						$queue[$counter] = $post->ID;
						//echo "Post number: ".$post->ID."<br></br>";
						//echo get_field('written_date');
						//echo var_dump($queue[$counter])."<br></br>";
						//echo $counter."<br></br>";
						$counter++;
					}
				}
				wp_reset_postdata();
				
				//echo "Printing array:<br></br>";
				foreach ($queue as $data) {
					//echo var_dump($data)."<br></br>";
				}
				
				//echo "PHASE ONE COMPLETE"."<br></br>";
				
				$pages_num = max( ceil(((count($queue)-intval(get_field('first_page_post_num')))/(intval(get_field('posts_per_page'))))+1),  1);
				//echo $pages_num."<br></br>";
				for($d = 0; $d < $pages_num; $d++) {
					$temp = array();
					if ($d == 0) {
						for ($i = 0; $i < min(intval(get_field('first_page_post_num')), $counter); $i++) {
							$curr_ind = ($i+($d*intval(get_field('first_page_post_num'))));
							//echo $curr_ind."<br></br>";
							$temp[$i] = $queue[$curr_ind];
						}
					} else {
						for ($i = 0; $i < intval(get_field('posts_per_page')); $i++) {
							$curr_ind = ($i+(($d-1)*intval(get_field('posts_per_page')))+intval(get_field('first_page_post_num')));
							if ($curr_ind < count($queue)) {
								$temp[$i] = $queue[$curr_ind];
							}
						}
					}
					$pages[$d] = $temp;
				}
				//echo "Print each page array:"."<br></br>";
				//echo var_dump($pages)."<br></br>";
				foreach ($pages as $postlist) {
					//echo var_dump($postlist)."<br></br>";
					//echo "Print one page array:"."<br></br>";
					foreach($postlist as $data) {
						//echo var_dump($data).",";
					}
					//echo "<br></br>";
				}
				//echo "PHASE TWO COMPLETE"."<br></br>";
				
				//WOOT LAST STEP
				//also both of the previous loops can be done in one loop.
				for ($i = 0; $i < count($pages); $i++) {
					global $postlist;
					$postlist = $pages[$i];
					?>
					
					<div id="post-page-<?php echo $i; ?>" class="post-page">
					
					<?php get_template_part('shortpost', 'news'); ?>
					
					</div>
					
					<?php
				}
				//echo "PHASE THREE COMPLETE"."<br></br>";
			?>
			<div id="post-list-nav" class="post-list-nav">
			
			</div>
			<?php get_footer('entry'); ?>
		</div>
	</main>
</div>
<?php get_footer(); ?>

<script>

var head = 0;
var tail = jQuery.parseJSON(<?php echo json_encode(count($pages)); ?>);
var paginated_pages = new Array(tail-head);
var head_button = '<button id="head-button" class="post-list-button"><<</button>';
var tail_button = '<button id="tail-button" class="post-list-button">>></button>';
var pagination_buttons = [
				'<button id="page-1-button" class="post-list-button">1</button>',
				'<button id="page-2-button" class="post-list-button">2</button>',
				'<button id="page-3-button" class="post-list-button">3</button>',
				'<button id="page-4-button" class="post-list-button">4</button>',
				'<button id="page-5-button" class="post-list-button">5</button>'];
var curr_page = 0;

function heightMaximize() {
	jQuery('body').css('overflow', "hidden");
	jQuery('body').height(jQuery(window).height());
	paginationSel(0);
}

function paginationSel(select) {
	jQuery('.post-page').css('visibility', "hidden");
	jQuery('#post-page-'+select).css('visibility', "visible");
	jQuery(this).blur();
	
	//alert("Paginated page " + select + " height: " + jQuery('#post-page-'+select).height() + "px");
	//alert("Content div's height: " + jQuery('#content').height() + "px");
	//alert("Header's height: " + jQuery('.entry-fancy-header').height() + "px, with margin of 10px on top");
	//alert("Button row's height is 50px, and is separated with a gap of 25px");
	//alert("Available room: " + (jQuery('#content').height() - jQuery('.entry-fancy-header').height() - 10 - 50 - 25) + "px");
	
	if ((jQuery(window).height()-225-jQuery('.entry-fancy-header').height() - 50 - 10 - 25) <= jQuery('#post-page-'+select).height()) {
		//alert("Resetting body height");
		jQuery('html').height((jQuery('#post-page-'+select).height()+jQuery('.entry-fancy-header').height()+225+50+10+25));
		//alert("html set to height " + (jQuery('#content-'+select+'-pane').height()+jQuery('.entry-fancy-header').height()+225+50+10+25));
		jQuery('body').height((jQuery('#post-page-'+select).height()+jQuery('.entry-fancy-header').height()+225+50+10+25));
		jQuery('#content').height((jQuery('#post-page-'+select).height()+jQuery('.entry-fancy-header').height()+50+10+25));
	} else {
		//alert("Set height to the screen height, instead.");
		jQuery('html').height(jQuery(window).height());
		jQuery('body').height(jQuery(window).height());
		jQuery('#content').height(jQuery(window).height()-225);
	}
}

function redressButtons(select) {
	//alert(select);
	jQuery('.post-list-button').removeClass('selected-post-list-button');
	if (tail <= 5) {
		//Nothing to do for length <= 5;
		//alert("No change");
		jQuery('#page-'+(select+1)+'-button').addClass('selected-post-list-button');
	} else if (select < 3) {
		//Special shifting for beginning (i.e. no shift)
		//alert("Early buttons");
		for (var i = 1; i < 6; i++) {
			jQuery('#page-'+i+'-button').text(i);
		}
		jQuery('#page-'+(select+1)+'-button').addClass('selected-post-list-button');
	} else if (select+1 > tail-3) {
		//Special shifiting for end (i.e. no shift)
		//alert("Late Buttons");
		for (var i = -5; i < 0; i++) {
			jQuery('#page-'+(i+6)+'-button').text((tail+1+i));
			//alert((i+6)+", "+(tail+i));
		}
		jQuery('#page-'+(6-(tail-select))+'-button').addClass('selected-post-list-button');
	} else {
		//Normal shifting
		//alert("Norms");
		for (var i = 1; i < 6; i++) {
			jQuery('#page-'+i+'-button').text((select-2+i));
		}
		jQuery('#page-3-button').addClass('selected-post-list-button');
	}
	//alert("Maximizing height for page " + select);
	paginationSel(select);
}

jQuery().ready(function(){
	if (tail <= 5) {
		for (var i = 0; i < tail; i++) {
			jQuery('#post-list-nav').append(pagination_buttons[i]);
		}
	} else {
		jQuery('#post-list-nav').append(head_button);
		for (var i = 0; i < 5; i++) {
			jQuery('#post-list-nav').append(pagination_buttons[i]);
		}
		jQuery('#post-list-nav').append(tail_button);
	}
	//alert();
	heightMaximize();
	jQuery('#page-1-button').addClass('selected-post-list-button');
});

jQuery('body').on('click', '#head-button', function(){
	/* This is for previous button
	jQuery(this).blur();
	//alert("HEAD");
	if (jQuery('#page-1-button').hasClass('selected-post-list-button')) {
		//do nothing
		//alert("do nothing");
	} else {
		//alert(jQuery('.selected-post-list-button').attr('id'));
		//alert((jQuery('.selected-post-list-button').text()));
		redressButtons((jQuery('.selected-post-list-button').text()-2));
	}
	*/
	jQuery(this).blur();
	//alert("HEAD");
	if (jQuery('#page-1-button').hasClass('selected-post-list-button')) {
		//do nothing
		//alert("do nothing");
	} else {
		//alert(jQuery('.selected-post-list-button').attr('id'));
		//alert((jQuery('.selected-post-list-button').text()));
		redressButtons(0);
	}
});
jQuery('body').on('click', '#tail-button', function(){
	/* This is for next button
	jQuery(this).blur();
	//alert("TAIL");
	if (jQuery('#page-5-button').hasClass('selected-post-list-button')) {
		//do nothing
		//alert("do nothing");
	} else {
		//alert(jQuery('.selected-post-list-button').attr('id'));
		//alert(parseInt(jQuery('.selected-post-list-button').text()+1));
		redressButtons(parseInt(jQuery('.selected-post-list-button').text()));
	}
	*/
	jQuery(this).blur();
	//alert("TAIL");
	if (jQuery('#page-5-button').hasClass('selected-post-list-button')) {
		//do nothing
		//alert("do nothing");
	} else {
		//alert(jQuery('.selected-post-list-button').attr('id'));
		//alert(parseInt(jQuery('.selected-post-list-button').text()+1));
		redressButtons(tail-1);
	}
});
jQuery('body').on( 'click', '.post-list-button:not(#head-button, #tail-button)', function(){
	//alert(jQuery(this).text());
	jQuery(this).blur();
	var select = (jQuery(this).text()-1);
	curr_page = select;
	redressButtons(select);
});

</script>
<?php
global $postlist;
global $isEvent;
for ($p = 0; $p < count($postlist); $p++) {
	global $idedpost, $fetched;
	$idedpost = $postlist[$p];
	$fetched = get_post($idedpost);
	$hasLoc = get_field('location_present', $idedpost);
	$hasButton = get_field('button_present', $idedpost);
		//Add content, namely parent div, image/media div, location div, content div, title div, author/pub date div, button link div
		?>
		<div id="post-<?php echo $idedpost; ?>" class="<?php
															if (!$isEvent) {
																echo 'news-';
															} else {
																echo 'event-';
															}
															if($hasLoc){
																echo "location-";
															}
															if($hasButton){
																echo "button-";
															}
															?>post">
			<?php if (!$isEvent) { ?>
				<div id="post-<?php echo $idedpost; ?>-image" class="news-post-image">
					<image src="<?php
									if (get_field('post-image')) {
										echo get_field('post_image');
									} else {
										echo get_template_directory_uri()."/pic/Liberia Logo.jpg";
									} ?>"></image>
				</div>
			<?php } else { ?>
				<div id="post-<?php echo $idedpost; ?>-date" class="event-post-date">
					<span><?php
							echo date("F d, Y", strtotime(get_field("written_date",$idedpost)))."—";
							?></span>
				</div>
			<?php } ?>
			<div id="post-<?php echo $idedpost ?>-text-wrap" class="<?php
																	if (!$isEvent) {
																		echo 'news-';
																	} else {
																		echo 'event-';
																	}?>post-<?php
																					if($hasLoc){
																						echo "location-";
																					}
																					if($hasButton){
																						echo "button-";
																					}
																					?>inner">
				<h1><?php echo $fetched->post_title; ?></h1>
				<?php if ($hasLoc) { ?>
					<a href="https://www.google.com/maps/?q=<?php
																if (get_field('location', $idedpost) != "") {
																	echo get_field('location', $idedpost)["address"];
																}
															?>"><?php
																if (get_field('location', $idedpost) != "") {
																	echo get_field('location', $idedpost)["address"];
																} else {
																	echo "No address";
																}
															?></a>
				<?php } ?>
				<p><?php echo $fetched->post_content; ?></p>
				<?php if ($hasButton) { ?>
					<div><a href="<?php echo get_field('button_link', $idedpost); ?>"><span><?php echo get_field('button_name', $idedpost); ?></span></a></div>
				<?php }
				if (!$isEvent) { ?>
				<h2><?php
				if(get_field("written_date",$idedpost)) {
					echo date("F d, Y", strtotime(get_field("written_date",$idedpost)));
					if (get_field("authors",$idedpost)) {
						echo " | By ".get_field("authors",$idedpost);
					}
				} else {
					
				} ?></h2>
			<?php } ?>
			</div>
		</div>
	<?php 
	//echo var_dump($fetched)."<br></br>";
}
?>
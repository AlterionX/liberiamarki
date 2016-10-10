<?php /* Template Name: Members List */ ?>
<?php get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main center-wrapper" role="main">
		<div id="main-wrap" class="center-wrapped">
			<?php get_header('entry'); ?>
			<div id="board-posts">
				<h1 id="board-post-title"> The Board </h1>
				<?php
				$boardPostNum = 0;
				$queryboard = new WP_Query(array('post_type'=>"post", 'category_name'=>"board-member-post", 'order'=>"ASC", 'orderby'=>"title"));
				if($queryboard->have_posts()) {
					while($queryboard->have_posts()) {
						$queryboard->the_post();?>
							<div class="<?php echo $boardPostNum%2==1 ? "right" : "left"; ?>-float">
								<div id="board-post-<?php echo $boardPostNum; ?>" class="<?php echo $boardPostNum%2==1 ? "right" : "left"; ?>-member-box member-box">
									<div class="member-box-image-wrap"><image class="member-box-image" src="<?php
										if(get_field('profile_img')){
											echo get_field('profile_img');
										} else{
											echo get_template_directory_uri()."/pic/Liberia Logo.jpg";
										}
									?>"></image></div>
									<h1 id="board-post-<?php echo $boardPostNum; ?>-title" class="member-box-title"><?php echo $post->post_title; ?></h1>
									<p id="board-post-<?php echo $boardPostNum; ?>-text" class="member-box-text"><?php echo $post->post_content; ?></p>
								</div>
							</div>
						<?php $boardPostNum++;
					}
				} ?>
				<div style="clear:both;display: block;height: 0;line-height: 0;visibility: hidden;">.</div>
			</div>

			<div id="staff-posts">
			<h1 id="staff-panel-title"> Our Staff</h1>
				<?php
				$querystaff = new WP_Query(array('post_type'=>"post", 'category_name'=>"staff-member-post", 'order'=>"ASC", 'orderby'=>"title"));
				if($querystaff->have_posts()) {
					$staffPostNum = 0;
					while($querystaff->have_posts()) {
						$querystaff->the_post();?>
							<div class="<?php echo $staffPostNum%2==1 ? "right" : "left"; ?>-float">
								<div id="staff-post-<?php echo $staffPostNum; ?>" class="<?php echo $staffPostNum%2==1 ? "right" : "left"; ?>-member-box member-box">
									<div class="member-box-image-wrap"><image class="member-box-image" src="<?php
										if(get_field('profile_img')){
											echo get_field('profile_img');
										} else{
											echo get_template_directory_uri()."/pic/Liberia Logo.jpg";
										}
									?>"></image></div>
									<h1 id="staff-post-<?php echo $staffPostNum; ?>-title" class="member-box-title"><?php echo $post->post_title; ?></h1>
									<p id="staff-post-<?php echo $staffPostNum; ?>-text" class="member-box-text"><?php echo $post->post_content; ?></p>
								</div>
							</div>
						<?php $staffPostNum++;
					}
				} ?>
				<div style="clear:both;display: block;height: 0;line-height: 0;visibility: hidden;">.</div>
			</div>
			
			<div id="volunteer-posts">
			<h1 id="volunteer-panel-title"> Volunteers</h1>
				<?php
				$queryvolunteer = new WP_Query(array('post_type'=>"post", 'category_name'=>"volunteer-member-post", 'order'=>"ASC", 'orderby'=>"title"));
				if($queryvolunteer->have_posts()) {
					$volunteerPostNum = 0;
					while($queryvolunteer->have_posts()) {
						$queryvolunteer->the_post();?>
							<div class="<?php echo $volunteerPostNum%2==1 ? "right" : "left"; ?>-float">
								<div id="volunteer-post-<?php echo $volunteerPostNum; ?>" class="<?php echo $volunteerPostNum%2==1 ? "right" : "left"; ?>-member-box member-box">
									<div class="member-box-image-wrap"><image class="member-box-image" src="<?php
										if(get_field('profile_img')){
											echo get_field('profile_img');
										} else{
											echo get_template_directory_uri()."/pic/Liberia Logo.jpg";
										}
									?>"></image></div>
									<h1 id="volunteer-post-<?php echo $volunteerPostNum; ?>-title" class="member-box-title"><?php echo $post->post_title; ?></h1>
									<p id="volunteer-post-<?php echo $volunteerPostNum; ?>-text" class="member-box-text"><?php echo $post->post_content; ?></p>
								</div>
							</div>
						<?php $volunteerPostNum++;
					}
				} ?>
				<div style="clear:both;display: block;height: 0;line-height: 0;visibility: hidden;">.</div>
			</div>
			
			<?php get_footer('entry'); ?>
		</div>
	</main>
</div>
<?php get_footer(); ?>


<script>
jQuery('#entry-fancy-footer').ready(function(){
	//alert(jQuery('body').height()+"||||||"+jQuery(window).height());
	if (jQuery('body').height() < jQuery(window).height()) {
		jQuery('html').height(jQuery(window).height());
		jQuery('body').height(jQuery(window).height());
		
		var contentHeight = jQuery('#content').height();
		var botmargin = 19.188;
		jQuery('#entry-fancy-footer').css('height', (contentHeight-botmargin)+'px');
		
		//alert(JSON.stringify(jQuery('#entry-fancy-footer')));
		//alert(contentHeight+"|"+headerHeight+"|"+content2Height+"|"+footerHeight);
		
		jQuery('#primary').height(contentHeight+'px');
		jQuery('#content-footer-fancy').height('100%');
	}
});
</script>
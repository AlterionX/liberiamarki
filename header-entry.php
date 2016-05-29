<?php



?>

<?php if (get_field('header_present')) { ?>
	<header class="entry-fancy-header">
		<div id="content-header-fancy">
			<div id="left-entry-header">
				<image id="left-entry-header-image" src="<?php if (get_field('left_picture')) { echo get_field('left_picture'); }
				else { echo get_template_directory_uri().'/pic/tempplaceholder.png'; } ?>">
			</div>
			<div id="right-entry-header">
				<image id="right-entry-header-image" src="<?php if (get_field('right_picture')) { echo get_field('right_picture'); }
				else { echo get_template_directory_uri().'/pic/tempplaceholder.png'; } ?>">
			</div>
			<div id="content-header-title-wrapper">
				<div id="content-header-title">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</div>
			</div>
		</div>
	</header><!-- .entry-header -->
<?php } else { ?>
	<header class="entry-norm-header">
		<div id="content-header">
			<h1 id="content-norm-header-title"><?php echo get_the_title(); ?></h1>
		</div>
	</header>
<?php } ?>

<script>
jQuery(document).ready(function() {
	/*Discover optimal font size*/
	var fontSize = 25/*(parseInt(jQuery('#content-header-title').height())-10)*/+"px";
	jQuery('#content-header-title-wrapper').css('height', "53px");
	/*alert(fontSize);*/
	/*alert(jQuery('#content-header-title-wrapper').css('height'));*/
	jQuery('#content-header-title>h1').css('font-size', fontSize);
	var spanMes = jQuery('#content-header-title>h1');
	/*alert(spanMes.text());*/
	var org = jQuery('#content-header-fancy').html();
	
	/*Inject span for easy measuring*/
	jQuery('#content-header-fancy').html('<span>'+spanMes.text()+'</span>');
	jQuery('#content-header-fancy>span').css('font-size', fontSize);
	jQuery('#content-header-fancy>span').css('font-weight', 700);
	
	/*Discover and adjust originals to fit*/
	var width = jQuery('#content-header-fancy>span').width();
	/*alert(JSON.stringify(jQuery('#content-header-title-wrapper>span')));*/
	/*alert(width);*/
	jQuery('#content-header-fancy').html(org);
	jQuery('#content-header-title-wrapper').css('width', (width+35)+'px');
});
</script>
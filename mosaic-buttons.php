<?php
	if (have_posts()) {
		while (have_posts()) {
			the_post();
			if (have_rows('mosaic_button_pane')) {
				$paneNum = 0;
				while (have_rows('mosaic_button_pane')) {
					the_row();
					$paneText = get_sub_field('pane_description'); ?>
					<div id="mosaic-pane-<?php echo $paneNum; ?>" class="mosaic-pane">
						<div id="mosaic-pane-<?php echo $paneNum; ?>-title" class="mosaic-pane-title">
							<h1><span><?php echo get_sub_field('pane_title'); ?></span></h1>
						</div>
						<div id="mosaic-pane-<?php echo $paneNum; ?>-outer" class="mosaic-pane-outer">
							<div id="mosaic-pane-<?php echo $paneNum; ?>-inner" class="mosaic-pane-inner" style="background-color:<?php echo get_sub_field('pane_background'); ?>;">
								<?php if (have_rows('mosaic_button_row')) {
									$buttonRow = 0;
									while (have_rows('mosaic_button_row')) {
										the_row(); ?>
										<div id="mosaic-pane-<?php echo $paneNum; ?>-row-<?php echo $buttonRow; ?>" class="mosaic-pane-row">
											<?php if (have_rows('row_component')) {
												$sectCount = 0;
												while (have_rows('row_component')) {
													the_row();
													if (get_sub_field('element') == "Button") {
														
														?><a id="mosaic-pane-<?php
																				echo $paneNum;
																				?>-row-<?php
																							echo $buttonRow;
																							?>-component-<?php
																												echo $sectCount;
																												?>" class="mosaic-pane-row-component-button" href="<?php
																																										echo get_sub_field('button_link');
																																										?>" style="width:calc(<?php
																																																	echo get_sub_field('width');
																																																	?>% - 10px);background-color:<?php
																																																									echo get_sub_field('background_color');
																																																									?>;border:<?php
																																																													if (get_sub_field('border_present')) {
																																																														echo "solid";
																																																													} else {
																																																														echo "none";
																																																													}?>;border-color:<?php 
																																																																			if (get_sub_field('border_color')) {
																																																																				echo get_sub_field('border_color');
																																																																			} else {
																																																																				echo "#000000";
																																																																			}
																																																																			?>"><?php
															echo get_sub_field('button_name');
														?></a><?php
														
													 } else if (get_sub_field('element') == "Spacer") {
														
														?><div id="mosaic-pane-<?php
																				echo $paneNum;
																				?>-row-<?php
																							echo $buttonRow;
																							?>-component-<?php
																												echo $sectCount;
																												?>" class="mosaic-pane-row-component-spacer" style="width:calc(<?php
																																												echo get_sub_field('width');
																																												?>% - 10px);background-color:<?php
																																																				echo get_sub_field('background_color');
																																																				?>;border:<?php
																																																								if (get_sub_field('border_present')) {
																																																									echo "solid";
																																																								} else {
																																																									echo "none";
																																																								}?>;border-color:<?php 
																																																														if (get_sub_field('border_color')) {
																																																															echo get_sub_field('border_color');
																																																														} else {
																																																															echo "#000000";
																																																														}
																																																														?>"></div><?php
													}
													++$sectCount;
												}
											} ?>
										</div>
									<?php 
									++$buttonRow;
									}
								} ?>
							</div>
						</div>
					</div>
					<div id="mosaic-pane-<?php echo $paneNum; ?>-text" class="mosaic-pane-text">
						<?php echo $paneText; ?>
					</div>
					<?php ++$paneNum;
				}
			}
		}
	}
?>
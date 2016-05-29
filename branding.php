<div class="site-front-branding center-wrapper">	
	<div class="center-wrapped">
		<div class="site-front-branding-logo">
			<a href="<?php echo esc_url(home_url('/')) ?>">
				<image src="<?php echo get_template_directory_uri().'/pic/Liberia%20Logo.png' ?>"></image>
			</a>
		</div>

		<div class="site-front-branding-text">
			<div class="site-front-title">
				<a href="<?php echo esc_url( home_url( '/' ) );?>" rel="home"><?php echo bloginfo('name');?></a>
			</div>
			<!--<?php
				$description=get_bloginfo('description','display');
			?>
			<?php
				echo '<div class="site-front-description">';
				if ($description) { echo $description; }
				else { echo 'Welcome to a Wordpress site.'; }
				echo '</div>';
			?>-->
		</div>
		<div id="login-pane" class="site-front-login"></div>
	</div>
</div><!-- .site-branding -->
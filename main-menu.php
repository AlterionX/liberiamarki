<div id="nav-wrapper" class="center-wrapper">
	<nav id="nav-menu" class="center-wrapped front-nav-menu" role="navigation">
		<?php /*Primary navigation menu.*/ wp_nav_menu(array(
			'container' =>false,
			'menu_class' => 'nav',
			'echo' => true,
			'before' => '',
			'after' => '',
			'link_before' => '',
			'link_after' => '',
			'depth' => 0,
			'walker' => new front_nav_walker()
		));?>
	</nav> <!--.main-navigation -->
</div>
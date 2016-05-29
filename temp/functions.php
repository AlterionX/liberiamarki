<?php
/**
 * Liberia Mark I functions and definitions.
 *
 * Sets up the theme and provides some helper functions for custom template tags.
 * Adds filters and hooks in WordPress to pseudo-hack change core.
 *
 * When using a child theme wrapped functions can be overridden
 * Define them first in the child theme's functions.php file.
 *
 * Functions that are not wrapped can be attached to a filter or action hook.
 *
 * @package Liberia
 * @subpackage Mark_One
 * @since Mark I 1.0
 */

/**
 * 
 * 
 */
class front_nav_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth, $args)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $prepend = '<strong>';
           $append = '</strong>';
           $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

           if($depth != 0)
           {
                     $description = $append = $prepend = "";
           }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $description.$args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}

/**
 * Set the content width based on the theme.
 * @since Mark I 1.0
 */
if (!isset($content_width)) {
	$content_width=660;
}
 
/**
 * Twenty Fifteen only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

/**
 * Setup the theme's default settings.
 */
if (!function_exists('marki_setup')) {
	function marki_setup() {
		
		//Make translation available.
		load_theme_textdomain('marki', get_template_directory().'\language');
		
		//Add default feed links to head.
		add_theme_support('automatic-feed-links');
		
		//Make the user write a document title.
		add_theme_support('title-tag');
		
		//Allow for post thumbnails.
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(830, 500, true);
		
		//Register the menus.
		register_nav_menu(array('main-menu'=>__('Primary Navigation Menu')));
		
		//Switch back to default core for forms.
		add_theme_support('html5',array('search-form','comment-form','comment-list','gallery','caption'));
		
		//Enable different forms for the post formats.
		add_theme_support('post-formats',array('aside','image','video','quote','link','gallery','status','audio','chat'));
		$color_scheme=marki_get_color_scheme();
		$default_color = trim($color_scheme[0],'#');
		
		// Setup the WordPress core custom background feature.
		add_theme_support('custom-background',apply_filter('mark_one_custom_background_args',array('default-color'=>$default_color,'default-attachment'=>'fixed')));
		
		//Let's affect the editor, too
		add_editor_style(array('css/editor-styles.css','genericons/genericons.css',marki_fonts_link()));
	}
}
add_action('after_setup_theme','marki_setup');

/**
 * Register the Widgets!
 * @since Mark I 1.0
 */
function marki_widgets_init() {
	register_sidebar('name'=>__( 'Widget Space'),'id'=>'sidebar-1','description'=>__( 'Add widgets here!'),'before_widget'=>'<aside id="%1$s" class="widget %2$s">','after_widget'=>'</aside>','before_title'=>'<h2 class="widget-title">','after_title'=>'</h2>',);
}
add_action'widgets_init','marki_widgets_init');

/**
 * Register fonts. Code from Twenty Fifteen theme.
 * @since Mark I 1.0
 * @return string Fonts relative link for the theme.
 */
if (!function_exists('marki_fonts_link')) {
	function marki_fonts_link(){
		$fonts_url='';
		$fonts=array();
		$subsets='latin,latin-ext';
		/*
		 * Translators: If there are characters in your language that are not supported
		 * by Noto Sans, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'marki' ) ) {
			$fonts[] = 'Noto Sans:400italic,700italic,400,700';
		}

		/*
		 * Translators: If there are characters in your language that are not supported
		 * by Noto Serif, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'marki' ) ) {
			$fonts[] = 'Noto Serif:400italic,700italic,400,700';
		}

		/*
		 * Translators: If there are characters in your language that are not supported
		 * by Inconsolata, translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'marki' ) ) {
			$fonts[] = 'Inconsolata:400,700';
		}

		/*
		 * Translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
		 */
		$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'marki' );

		if ( 'cyrillic' == $subset ) {
			$subsets .= ',cyrillic,cyrillic-ext';
		} elseif ( 'greek' == $subset ) {
			$subsets .= ',greek,greek-ext';
		} elseif ( 'devanagari' == $subset ) {
			$subsets .= ',devanagari';
		} elseif ( 'vietnamese' == $subset ) {
			$subsets .= ',vietnamese';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg(array('family'=>urlencode(implode('|',$fonts)),'subset'=>urlencode($subsets),),'https://fonts.googleapis.com/css');
		}

		return $fonts_url;
	}
}

/**
 * Autotags the root <html> element with js if there is javascript.
 * 
 * @since Mark I 1.0
 */
function marki_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action('wp_head','marki_javascript_detection',0);

/**
 * Enqueue scripts and styles.
 * 
 * @since Mark I 1.0
 */
function marki_scripts() {
	//Stylesheets (CSS)
	//Custom fonts, style.css
	wp_enqueue_style('marki-fonts',marki_fonts_link());
	//Genericon, /genericons/genericons.css
	wp_enqueue_style('genericons',get_template_directory_uri().'/genericons/genericons.css');
	//Main css, /style.css
	wp_enqueue_style('marki-style',get_stylesheet_uri());
	//IE <9 style, only accessed if IE is used, /css/ie.css
	wp_enqueue_style('marki-ie',get_template_directory_uri().'/css/ie.css',array('marki-style'));
	wp_style_add_data('marki-ie','conditional','lt IE 9');
	//IE <8 style, same as above, /css/ie7.css
	wp_enqueue_style('marki-ie7',get_template_directory_uri().'/css/ie7.css',array('marki-style'));
	wp_style_add_data('marki-ie7','conditional','lt IE 8');
	
	//Script (javascript)
	wp_enqueue_script('marki-script', get_template_directory_uri().'/js/functions.js',array('jquery'),null,true);
	wp_localize_script('marki-script','screenReaderText',array(
		'expand'=>
			'<span class="screen-reader-text">'.__('expand child menu','marki').'</span>',
		'collapse'=>
			'<span class="screen-reader-text">'.__('collapse child menu','marki').'</span>'));
}
add_action('wp_enqueue_scripts','marki_scripts');

/**
 * Add image as background to post navigation elements.
 * 
 * @since Mark I 1.0
 */
function marki_post_nav_background() {
	if (!is_single()) {
		return;
	}
	
	$previous=(is_attachment())?get_post(get_post()->post_parent):get_adjacent_post(false,'',true);
	$next=get_adjacent_post(false,'',false);
	$css='';

	if (is_attachment()&&'attachment'==$previous->post_type ) {
		return;
	}

	if ($previous&&has_post_thumbnail($previous->ID)) {
		$prevthumb=wp_get_attachment_image_src(get_post_thumbnail_id($previous->ID),'post-thumbnail');
		$css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	if ( $next && has_post_thumbnail( $next->ID ) ) {
		$nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); border-top: 0; }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	wp_add_inline_style( 'twentyfifteen-style', $css );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_post_nav_background' );

/**
 * Display descriptions in main navigation.
 *
 * @since Mark I 1.0
 *
 * @param string  $item_output The menu item output.
 * @param WP_Post $item        Menu item object.
 * @param int     $depth       Depth of the menu.
 * @param array   $args        wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */
function twentyfifteen_nav_description( $item_output, $item, $depth, $args ) {
	if ('primary'==$args->theme_location&&$item->description) {
		$item_output=str_replace($args->link_after.'</a>','<div class="menu-item-description">'.$item->description.'</div>'.$args->link_after.'</a>',$item_output);
	}
	return $item_output;
}
add_filter('walker_nav_menu_start_el','twentyfifteen_nav_description',10,4);

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Mark I 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function twentyfifteen_search_form_modify( $html ) {
	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'twentyfifteen_search_form_modify' );

/**
 * Implement the Custom Header feature.
 *
 * @since Mark I 1.0
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 *
 * @since Mark I 1.0
 */
require get_template_directory().'/inc/template-tags.php';

/**
 * Customizer additions.
 *
 * @since Mark I 1.0
 */
require get_template_directory().'/inc/customizer.php';







?>
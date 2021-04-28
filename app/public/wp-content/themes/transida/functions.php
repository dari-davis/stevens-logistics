<?php

require_once get_template_directory() . '/includes/loader.php';

add_action( 'after_setup_theme', 'transida_setup_theme' );
add_action( 'after_setup_theme', 'transida_load_default_hooks' );


function transida_setup_theme() {

	load_theme_textdomain( 'transida', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );


	// Set the default content width.
	$GLOBALS['content_width'] = 525;
	
	//Register image sizes
	add_image_size( 'transida_170x170', 170, 170, true ); //'transida_170x170 Testimonials V1'
	add_image_size( 'transida_370x270', 370, 270, true ); //'transida_370x270 Latest News'
	add_image_size( 'transida_370x533', 370, 533, true ); //'transida_370x533 Latest News'
	add_image_size( 'transida_370x300', 370, 300, true ); //'transida_370x300 Our Services'
	add_image_size( 'transida_442x410', 442, 410, true ); //'transida_442x410 Recent Projects'
	add_image_size( 'transida_100x100', 100, 100, true ); //'transida_100x100 Testimonials V2'
	add_image_size( 'transida_570x270', 570, 270, true ); //'transida_570x270 Latest News V2'
	add_image_size( 'transida_270x270', 270, 270, true ); //'transida_270x270 Latest News V2'
	add_image_size( 'transida_315x319', 315, 319, true ); //'transida_315x319 Our Services V3'
	add_image_size( 'transida_110x110', 110, 110, true ); //'transida_110x110 Testimonials V3'
	add_image_size( 'transida_370x400', 370, 400, true ); //'transida_370x400 Recent Projects V2'
	add_image_size( 'transida_570x430', 570, 430, true ); //'transida_570x430 Portfolio 2 Column'
	add_image_size( 'transida_370x400', 370, 400, true ); //'transida_370x400 Portfolio 3 Column'
	add_image_size( 'transida_442x410', 442, 410, true ); //'transida_442x410 Portfolio 4 Column'
	add_image_size( 'transida_1170x460', 1170, 460, true ); //'transida_1170x460 Our Blog'

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'main_menu' => esc_html__( 'Main Menu', 'transida' ),
		'onepage_menu' => esc_html__( 'OnePage Menu', 'transida' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'      => 250,
		'height'     => 250,
		'flex-width' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style();
	add_action( 'admin_init', 'transida_admin_init', 2000000 );
}

function transida_gutenberg_editor_palette_styles() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => esc_html__( 'strong yellow', 'transida' ),
            'slug' => 'strong-yellow',
            'color' => '#f7bd00',
        ),
        array(
            'name' => esc_html__( 'strong white', 'transida' ),
            'slug' => 'strong-white',
            'color' => '#fff',
        ),
		array(
            'name' => esc_html__( 'light black', 'transida' ),
            'slug' => 'light-black',
            'color' => '#242424',
        ),
        array(
            'name' => esc_html__( 'very light gray', 'transida' ),
            'slug' => 'very-light-gray',
            'color' => '#797979',
        ),
        array(
            'name' => esc_html__( 'very dark black', 'transida' ),
            'slug' => 'very-dark-black',
            'color' => '#000000',
        ),
    ) );
	
	add_theme_support( 'editor-font-sizes', array(
		array(
			'name' => esc_html__( 'Small', 'transida' ),
			'size' => 10,
			'slug' => 'small'
		),
		array(
			'name' => esc_html__( 'Normal', 'transida' ),
			'size' => 15,
			'slug' => 'normal'
		),
		array(
			'name' => esc_html__( 'Large', 'transida' ),
			'size' => 24,
			'slug' => 'large'
		),
		array(
			'name' => esc_html__( 'Huge', 'transida' ),
			'size' => 36,
			'slug' => 'huge'
		)
	) );
	
}
add_action( 'after_setup_theme', 'transida_gutenberg_editor_palette_styles' );

/**
 * [transida_widgets_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
function transida_widgets_init() {

	global $wp_registered_sidebars;

	$theme_options = get_theme_mod( TRANSIDA_NAME . '_options-mods' );

	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'transida' ),
		'id'            => 'default-sidebar',
		'description'   => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'transida' ),
		'before_widget' => '<div id="%1$s" class="widget sidebar-widget single-sidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget_title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar(array(
		'name' => esc_html__('Footer Widget', 'transida'),
		'id' => 'footer-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'transida'),
		'before_widget'=>'<div class="col-lg-4 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<h4 class="widget_title">',
		'after_title' => '</h4>'
	));
	if ( class_exists( '\Elementor\Plugin' )){
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Two', 'transida'),
		'id' => 'footer-sidebar-2',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'transida'),
		'before_widget'=>'<div class="col-lg-4 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<h4 class="widget_title">',
		'after_title' => '</h4>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Three', 'transida'),
		'id' => 'footer-sidebar-3',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'transida'),
		'before_widget'=>'<div class="col-lg-4 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<h4 class="widget_title">',
		'after_title' => '</h4>'
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Widget Four', 'transida'),
		'id' => 'footer-sidebar-4',
		'description' => esc_html__('Widgets in this area will be shown in Footer Area.', 'transida'),
		'before_widget'=>'<div class="col-lg-6 col-md-6 col-sm-12 footer-column"><div id="%1$s" class="footer-widget %2$s">',
		'after_widget'=>'</div></div>',
		'before_title' => '<h4 class="widget_title">',
		'after_title' => '</h4>'
	));
	register_sidebar(array(
		'name' => esc_html__('Services Widget', 'transida'),
		'id' => 'service-sidebar',
		'description' => esc_html__('Widgets in this area will be shown in Services Area.', 'transida'),
		'before_widget'=>'<div id="%1$s" class="service-widget %2$s">',
		'after_widget'=>'</div>',
		'before_title' => '<h4 class="widget_title">',
		'after_title' => '</h4>'
	));
	}
	register_sidebar(array(
	  'name' => esc_html__( 'Blog Listing', 'transida' ),
	  'id' => 'blog-sidebar',
	  'description' => esc_html__( 'Widgets in this area will be shown on the right-hand side.', 'transida' ),
	  'before_widget'=>'<div id="%1$s" class="widget sidebar-widget %2$s">',
	  'after_widget'=>'</div>',
	  'before_title' => '<h4 class="widget_title">',
	  'after_title' => '</h4>'
	));
	if ( ! is_object( transida_WSH() ) ) {
		return;
	}

	$sidebars = transida_set( $theme_options, 'custom_sidebar_name' );

	foreach ( array_filter( (array) $sidebars ) as $sidebar ) {

		if ( transida_set( $sidebar, 'topcopy' ) ) {
			continue;
		}

		$name = $sidebar;
		if ( ! $name ) {
			continue;
		}
		$slug = str_replace( ' ', '_', $name );

		register_sidebar( array(
			'name'          => $name,
			'id'            => sanitize_title( $slug ),
			'before_widget' => '<div id="%1$s" class="%2$s widget ">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
	}

	update_option( 'wp_registered_sidebars', $wp_registered_sidebars );
}

add_action( 'widgets_init', 'transida_widgets_init' );

/**
 * [transida_admin_init]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */


function transida_admin_init() {
	remove_action( 'admin_notices', array( 'ReduxFramework', '_admin_notices' ), 99 );
}

/**
 * [transida_set description]
 *
 * @param  array $data [description]
 *
 * @return [type]       [description]
 */
if ( ! function_exists( 'transida_set' ) ) {
	function transida_set( $var, $key, $def = '' ) {
		//if( ! $var ) return false;

		if ( is_object( $var ) && isset( $var->$key ) ) {
			return $var->$key;
		} elseif ( is_array( $var ) && isset( $var[ $key ] ) ) {
			return $var[ $key ];
		} elseif ( $def ) {
			return $def;
		} else {
			return false;
		}
	}
}
function transida_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'transida_add_editor_styles' );

// Add specific CSS class by filter.
$options = transida_WSH()->option(); 
if( transida_set($options, 'boxed_wrapper') ){

add_filter( 'body_class', function( $classes ) {
    $classes[] = 'boxed_wrapper';
    return $classes;
} );
}
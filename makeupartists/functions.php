<?php
/**
 * Makeup Artists functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Makeup_Artists
 */

if ( ! function_exists( 'makeupartists_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function makeupartists_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Makeup Artists, use a find and replace
		 * to change 'makeupartists' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'makeupartists', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'makeupartists' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'makeupartists_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 200,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'makeupartists_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function makeupartists_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'makeupartists_content_width', 640 );
}
add_action( 'after_setup_theme', 'makeupartists_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function makeupartists_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'makeupartists' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'makeupartists' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'makeupartists' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'makeupartists' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );
}
add_action( 'widgets_init', 'makeupartists_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function makeupartists_scripts() {
	wp_enqueue_style( 'artists-style', get_stylesheet_uri() );


// <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
// <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
// <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	wp_enqueue_style( 'bootstrap-4.3.1','https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' );

	wp_enqueue_style( 'fontawesome-4.7','https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );

	//<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />

	wp_enqueue_style( 'baguetteBox','https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css' );

	// ekko-lightbox css
	wp_enqueue_style( 'ekko-lightbox','https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css' );

	// google-fonts
	wp_enqueue_style( 'font1','https://fonts.googleapis.com/css?family=Marck+Script&display=swap' );

	wp_enqueue_style( 'font2','https://fonts.googleapis.com/css?family=Economica&display=swap' );

	wp_enqueue_style( 'font3','https://fonts.googleapis.com/css?family=Lexend+Exa&display=swap' );

wp_enqueue_style( 'font4','https://fonts.googleapis.com/css?family=Roboto:400,700|Open+Sans' );


	wp_enqueue_script( 'artists-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'artists-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	//jquery install
	wp_enqueue_script( 'googleapis-jquery-min','https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', array(), '3.4.1', true );
	 //lightbox install

	//<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>

	wp_enqueue_script( 'baguetteBox-min-js','https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js', array(), '1.10.0', true );

	wp_enqueue_script( 'ekko-lightbox','https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js', array(), '5.3.0', true );
	//js-scripts
	wp_enqueue_script('lightbox', get_template_directory_uri(). '/js/lightbox.js', array(),'1.0',true);
	wp_enqueue_script('navshrink', get_template_directory_uri(). '/js/navshrink.js', array(),'1.0',true);
	wp_enqueue_script('Script', get_template_directory_uri(). '/js/script.js', array(),'1.0',true);
	wp_enqueue_script('parallax-min', get_template_directory_uri(). '/js/parallax.min.js', array(),'1.0',true);

	//bootstrap-js
	wp_enqueue_script('popper-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array(), '1.14.7', true);
	wp_enqueue_script('bootstrap-min-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array(), '4.3.1', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'makeupartists_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );


// This theme uses wp_nav_menu() in one location.

function register_navbar_menus(){

	register_nav_menus( array(
	'menu-1' => __( 'Primary', 'makeupartist' ),
	'menu-2' => __( 'Secondary', 'makeupartist' ),
) );

}
add_action('init', 'register_navbar_menus');

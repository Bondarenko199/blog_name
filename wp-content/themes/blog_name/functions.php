<?php
/**
 * blog_name functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package blog_name
 */

if ( ! function_exists( 'blog_name_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function blog_name_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on blog_name, use a find and replace
		 * to change 'blog_name' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'blog_name', get_template_directory() . '/languages' );

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
			'menu-header' => esc_html__( 'Primary', 'blog_name' ),
			'menu-footer' => esc_html__( 'Footer', 'blog_name' )
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
		add_theme_support( 'custom-background', apply_filters( 'blog_name_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'blog_name_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blog_name_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'blog_name_content_width', 640 );
}

add_action( 'after_setup_theme', 'blog_name_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blog_name_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'blog_name' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'blog_name' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'blog_name_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function blog_name_scripts() {
	wp_enqueue_style( 'blog_name-style', get_stylesheet_uri() );

	wp_enqueue_style( 'animate', get_template_directory_uri() . '/style/animate.min.css' );

	wp_enqueue_script( 'blog_name-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'tether', get_template_directory_uri() . '/js/tether.min.js', array(), false, true );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), false, true );

	wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), false, true );

	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), false, true );

	wp_enqueue_script( 'blog_name-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'blog_name_scripts' );

//custom logo

add_theme_support( 'custom-logo' );

/**
 * Custom Post-Type
 **/

function register_custom_posts() {
	$labels = array(
		'name'               => _x( 'Slides', 'post type general name', 'deliver' ),
		'singular_name'      => _x( 'Slide', 'post type singular name', 'deliver' ),
		'menu_name'          => _x( 'Slides', 'admin menu', 'deliver' ),
		'name_admin_bar'     => _x( 'Slide', 'add new on admin bar', 'deliver' ),
		'add_new'            => _x( 'Add New', 'slide', 'deliver' ),
		'add_new_item'       => __( 'Add New Slide', 'deliver' ),
		'new_item'           => __( 'New Slide', 'deliver' ),
		'edit_item'          => __( 'Edit Slide', 'deliver' ),
		'view_item'          => __( 'View Slide', 'deliver' ),
		'all_items'          => __( 'All Slides', 'deliver' ),
		'search_items'       => __( 'Search Slides', 'deliver' ),
		'parent_item_colon'  => __( 'Parent Slides:', 'deliver' ),
		'not_found'          => __( 'No slides found.', 'deliver' ),
		'not_found_in_trash' => __( 'No slides found in Trash.', 'deliver' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'deliver' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'slide' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'slide', $args );
}

add_action( 'init', 'register_custom_posts' );

/**
 * Show empty cat
 **/

function force_empty_cats( $cat_args ) {
	$cat_args['hide_empty'] = 0;

	return $cat_args;
}

add_filter( 'widget_categories_args', 'force_empty_cats' );

/**
 * Wrap cat count
 **/

function cat_count_span( $links ) {
	$links = str_replace( '(', '<span>(', $links );
	$links = str_replace( ')', ')</span>', $links );

	return $links;
}

add_filter( 'wp_list_categories', 'cat_count_span' );

/**
 * Implement the Custom Header feature.
 */

require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';



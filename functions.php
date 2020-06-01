<?php
/**
 * cok functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cok
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'cok_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cok_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on cok, use a find and replace
		 * to change 'cok' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'cok', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'cok' ),
				'menu-2' => esc_html__( 'Footer Left', 'cok' ),
				'menu-3' => esc_html__( 'Footer Right', 'cok' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		// add_theme_support(
		// 	'custom-background',
		// 	apply_filters(
		// 		'cok_custom_background_args',
		// 		array(
		// 			'default-color' => 'ffffff',
		// 			'default-image' => '',
		// 		)
		// 	)
		// );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		// add_theme_support(
		// 	'custom-logo',
		// 	array(
		// 		'height'      => 250,
		// 		'width'       => 250,
		// 		'flex-width'  => true,
		// 		'flex-height' => true,
		// 	)
		// );
	}
endif;
add_action( 'after_setup_theme', 'cok_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cok_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'cok_content_width', 640 );
}
add_action( 'after_setup_theme', 'cok_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cok_widgets_init() {
	if ( function_exists('register_sidebar') ) {
		$sidebar1 = array(
			'name'          => esc_html__( 'Sidebar', 'cok' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'cok' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		);

		$sidebar2 = array(
			'name'          => esc_html__( 'Work Footer', 'cok' ),
			'id'            => 'sidebar-2',
			'description'   => esc_html__( 'Add widgets here.', 'cok' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		);
		register_sidebar($sidebar1);
		register_sidebar($sidebar2);

	}
}
add_action( 'widgets_init', 'cok_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cok_scripts() {
	wp_enqueue_style( 'cok-fonts', '//fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500;700&family=Montserrat:wght@700;800;900&family=Playfair+Display:wght@400;700&display=swap' );
	wp_enqueue_style( 'cok-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'cok-style', 'rtl', 'replace' );

	wp_enqueue_script( 'cok-js', get_template_directory_uri() . '/js/app.min.js', array('jquery'), '20200601', true );



	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action( 'wp_enqueue_scripts', 'cok_scripts' );

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


// Register a lead ACF Block
if( function_exists('acf_register_block') ) {
	
	$result = acf_register_block(array(
		'name'				=> 'lead',
		'title'				=> __('Lead'),
		'description'		=> __('A custom lead block.'),
		'render_callback'	=> 'my_lead_block_html'
		//'category'		=> '',
		//'icon'			=> '',
		//'keywords'		=> array(),
	));
}

// Callback to render the lead ACF Block
function my_lead_block_html() {
	
	// vars
	$lead = get_field('lead');
	
	?>

	<p class="lead"><?php echo $lead; ?></p>

	<?php
}



// Disable Gutenberg on specific pages
// add_action('admin_init', function () {
//     if (array_key_exists('post', $_GET) || array_key_exists('post_ID', $_GET)) {
//         $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
//         if (!isset($post_id)) {
//             return;
//         }
//         $title = get_the_title($post_id);
//         //$contact = get_the_title($post_id);
//         if ($title == 'Home') {
//             remove_post_type_support('page', 'editor');
//         }
//     }
// }, 10);

// Customized options page
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        // Register options page.
        $option_page = acf_add_options_page(array(
            'page_title'    => __('Theme General Settings'),
            'menu_title'    => __('Theme Settings'),
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }
}


// Theme Widgets
require get_template_directory() . '/inc/theme-widgets.php';

// Theme Extras
require get_template_directory() . '/inc/extras.php';

// Add body class based on existance of post thumbnail.
function add_featured_image_body_class( $classes ) {    
global $post;
	if ( isset ( $post->ID ) && get_the_post_thumbnail($post->ID)) {
			$classes[] = 'has-featured-image';
	}
			return $classes;
}
add_filter( 'body_class', 'add_featured_image_body_class' );
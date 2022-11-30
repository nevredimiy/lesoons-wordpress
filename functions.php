<?php

function my_var_dump( $data ) {
	echo '<pre>' . print_r( $data, 1 ) . '</pre>';
}

/**
 * E-shoper functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package E-shoper
 */

 

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function shoper_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on E-shoper, use a find and replace
		* to change 'shoper' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'shoper', get_template_directory() . '/languages' );

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
			'contact_menu' => esc_html__( 'Contact', 'shoper' ),
			'social_menu' => esc_html__( 'Social', 'shoper' ),
			'main_menu' => esc_html__( 'Main', 'shoper' ),
			'header_menu' => esc_html__( 'Header', 'shoper' ),
			'footer_menu' => esc_html__( 'Footer', 'shoper' ),
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
	add_theme_support(
		'custom-background',
		apply_filters(
			'shoper_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 39,
			'width'       => 139,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'shoper_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function shoper_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'shoper_content_width', 640 );
}
add_action( 'after_setup_theme', 'shoper_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function shoper_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Social links', 'shoper' ),
			'id'            => 'social_link',
			'description'   => esc_html__( 'Add widgets for social icons.', 'shoper' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'shoper' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'shoper' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'shoper_widgets_init' );



/**
 * Enqueue scripts and styles.
 */
function shoper_scripts() {
	wp_enqueue_style( 'shoper-bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
	wp_enqueue_style( 'shoper-fonts-css', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );
	wp_enqueue_style( 'shoper-prettyPhoto-css', get_template_directory_uri() . '/assets/css/prettyPhoto.css' );
	wp_enqueue_style( 'shoper-price-range-css', get_template_directory_uri() . '/assets/css/price-range.css' );
	wp_enqueue_style( 'shoper-main-css', get_template_directory_uri() . '/assets/css/main.css' );
	wp_enqueue_style( 'shoper-responsive-css', get_template_directory_uri() . '/assets/css/responsive.css' );
	//wp_enqueue_style( 'shoper-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'shoper-bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), false, true );
	wp_enqueue_script( 'shoper-scrollUp-js', get_template_directory_uri() . '/assets/js/jquery.scrollUp.min.js', array(), false, true );
	wp_enqueue_script( 'shoper-scrprice-rangeollUp-js', get_template_directory_uri() . '/assets/js/price-range.js', array(), false, true );
	wp_enqueue_script( 'shoper-prettyPhoto-js', get_template_directory_uri() . '/assets/js/jquery.prettyPhoto.js', array(), false, true );
	wp_enqueue_script( 'shoper-main-js', get_template_directory_uri() . '/assets/js/main.js', array(), false, true );

	
}
add_action( 'wp_enqueue_scripts', 'shoper_scripts' );






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
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}



/*
*	Menu Walker
*/
require get_template_directory() . '/inc/Shoper_Menu.php';

/*
*	Menu Admin function
*/
require get_template_directory() . '/inc/admin-function.php';

// Social Media
if ( ! function_exists( 'shoper_social_media' ) ) {

	function shoper_social_media( $social_class='' ) {

	?>

		<div class="<?php echo esc_attr( $social_class ); ?>">
			<ul class="nav navbar-nav">
				<?php if ( get_theme_mod( 'shoper_social_media_url_1' ) ) : ?>
				<li id="shoper_social_media_1">
					<a href="<?php echo esc_url( get_theme_mod( 'shoper_social_media_url_1' ) ); ?>">
						<i class="<?php echo esc_attr( get_theme_mod( 'shoper_social_media_icon_1' ) ); ?>"></i>
					</a>
				</li>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'shoper_social_media_url_2' ) ) : ?>
				<li id="shoper_social_media_2">
					<a href="<?php echo esc_url( get_theme_mod( 'shoper_social_media_url_2' ) ); ?>">
						<i class="<?php echo esc_attr( get_theme_mod( 'shoper_social_media_icon_2' ) ); ?>"></i>
					</a>
				</li>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'shoper_social_media_url_3' ) ) : ?>
				<li id="shoper_social_media_3">
					<a href="<?php echo esc_url( get_theme_mod( 'shoper_social_media_url_3' ) ); ?>">
						<i class="<?php echo esc_attr( get_theme_mod( 'shoper_social_media_icon_3' ) ); ?>"></i>
					</a>
				</li>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'shoper_social_media_url_4' ) ) : ?>
				<li id="shoper_social_media_4">
					<a href="<?php echo esc_url( get_theme_mod( 'shoper_social_media_url_4' ) ); ?>">
						<i class="<?php echo esc_attr( get_theme_mod( 'shoper_social_media_icon_4' ) ); ?>"></i>
					</a>
				</li>
				<?php endif; ?>
			</ul>	
		</div>

	<?php

	} // ashe_social_media()

} // function_exists( 'ashe_social_media' )

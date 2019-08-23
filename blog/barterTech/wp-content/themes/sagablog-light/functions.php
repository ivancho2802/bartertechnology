<?php
/**
 * sagablog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sagablog
 */

if ( ! function_exists( 'sagablog_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sagablog_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on sagablog, use a find and replace
	 * to change 'sagablog-light' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'sagablog-light', get_template_directory() . '/languages' );
        // This theme styles the visual editor to resemble the theme style.            
        add_editor_style( array( 'inc/editor-style.css', sagablog_fonts_url() ) );
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
	add_image_size( 'sagablog-mainslider-thumb', 600, 800, true ); 
        add_image_size( 'sagablog-mainslider-full-thumb', 1300, 700, true ); 
        add_image_size('sagablog-thumb', 370, 370, true);
        
        // Add other useful image sizes for use through Add Media modal
        add_image_size( 'sagablog-customlarge-thumb', 1040, 600,true );

        // Register the three useful image sizes for use in Add Media modal
        add_filter( 'image_size_names_choose', 'sagablog_custom_sizes' );
        function sagablog_custom_sizes( $sizes ) {
            return array_merge( $sizes, array(
                'sagablog-customlarge-thumb' => esc_html__( 'Custom Large 1040x600' , 'sagablog-light'),
            ) );
        }

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'sagablog-light' ),
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
	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'gallery',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 150,
		'height'      => 150,
		'flex-width'  => true,
	) );        
        
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'sagablog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sagablog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sagablog_content_width', 640 );
}
add_action( 'after_setup_theme', 'sagablog_content_width', 0 );

/**
*sagablog default options
*/
function sagablog_default_options() {
    $default_options=sagablog_default_theme_options();
     
    foreach($default_options as $key => $value) 
    {  
        if (!esc_html(get_theme_mod($key))){           
            set_theme_mod($key, $value);
        }
    } 

}
add_action( 'after_setup_theme', 'sagablog_default_options' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sagablog_widgets_init() {
        //Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'sagablog-light' ),
		'id'            => 'sidebar-widgets',
		'description'   => esc_html__( 'Add widgets here.', 'sagablog-light' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );
        //Sidedar for place widget on pages with posts
        register_sidebar( array(
		'name'          => esc_html__( 'Post widgets', 'sagablog-light' ),
		'id'            => 'post-widgets',
		'description'   => esc_html__( 'Add widgets here.', 'sagablog-light' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>'
	) );
        //Sidedar for place widgets on contact page
        register_sidebar( array(
		'name'          => esc_html__( 'Contact Page Widget', 'sagablog-light' ),
		'id'            => 'contact-widgets',
		'description'   => esc_html__( 'Contact Page Widget area appears in the contact page.', 'sagablog-light' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );  
        //Footer Full Width Widgets
        register_sidebar( array(
		'name'          => esc_html__( 'Footer Full Width Widget', 'sagablog-light' ),
		'id'            => 'footer-top-widgets',
		'description'   => esc_html__( 'Footer widgets area for widgets that will have full width.', 'sagablog-light' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) ); 

        //Footer sidebar
        register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'sagablog-light' ),
		'id'            => 'footer-widgets',
		'description'   => esc_html__( 'Footer widgets area appears in the footer of the site.', 'sagablog-light' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'sagablog_widgets_init' );

if ( ! function_exists( 'sagablog_fonts_url' ) ) :
/**
 * Create the required Google Fonts for Saga.
 */
function sagablog_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Muli, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Oswald font: on or off', 'sagablog-light' ) ) {
		$fonts[] = 'Muli:400,400i,700,700i';
	}
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Roboto, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'sagablog-light' ) ) {
		$fonts[] = 'Roboto:400,400i,700,700i';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}
	return esc_url_raw( $fonts_url );
}
endif; 
/**
 * Enqueue scripts and styles.
 */
function sagablog_scripts() {
	wp_enqueue_style( 'sagablog-style', get_stylesheet_uri() );
        
        //Add style for magnific-popup
        wp_enqueue_style( 'magnific-popup-style' , get_template_directory_uri() . '/css/magnific-popup.css', array(), '1.0.0', 'all');	
        //Add style for OwlCarousel2
        wp_enqueue_style( 'owl-carousel-style' , get_template_directory_uri() . '/css/owl/owl.carousel.min.css', array(), '2.2.0', 'all');	
        wp_enqueue_style( 'owl-carousel-style-default' , get_template_directory_uri() . '/css/owl/owl.theme.default.min.css', array(), '2.2.0', 'all');	
        // Add Google fonts  
        wp_enqueue_style( 'sagablog-google-fonts', sagablog_fonts_url(), array(), '1.0.0', 'all' );    
        // Add FontAwesome
        wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/fonts/fontawesome/css/font-awesome.min.css', array(), '4.7.0', 'all' );
	
        wp_enqueue_script( 'sagablog-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20160206', true );
	wp_localize_script( 'sagablog-navigation', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'sagablog-light' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'sagablog-light' ) . '</span>',
	) );
	
        wp_enqueue_script( 'enquire', get_template_directory_uri() . '/js/enquire.min.js', array(), '2.1.2', true );
        //Masonry
        wp_enqueue_script('masonry');
        wp_enqueue_script( 'masonry-settings', get_template_directory_uri() . '/js/masonry-settings.js', array('masonry', 'enquire'), '20170428', true );
        
	wp_enqueue_script( 'sagablog-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );       
        //Add magnific-popup
        wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array(), '1.0.0', true );
        //Add js for OwlCarousel2
        wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), '2.2.0', true );
        //Retina
        wp_enqueue_script( 'retina_js', get_template_directory_uri() . '/js/retina.min.js', array(), '1.2.0', true );
        wp_enqueue_script( 'sagablog-javascript', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ),'20160217', true);           

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sagablog_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
/**
 * Implement the custom functions for this theme.
 */
require get_template_directory() . '/inc/inc-functions.php';

/**
 * Customize theme.
 */
require get_template_directory() . '/inc/customize.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 *  Widget tag cloud - make all letters one size.
 */	
add_filter('widget_tag_cloud_args','sagablog_set_tag_cloud_args');
function sagablog_set_tag_cloud_args( $args ) {
	$args['number'] = 30;
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}

/**
 *  Widget categories - delete brackets.
 */
function sagablog_categories_postcount_filter ($variable) {
   $variable = str_replace('(', '<span class="post_count"> ', $variable);
   $variable = str_replace(')', ' </span>', $variable);
   return $variable;
}
add_filter('wp_list_categories','sagablog_categories_postcount_filter');

/**
 *  Widget archive - delete brackets.
 */
function sagablog_archive_postcount_filter ($variable) {
   $variable = str_replace('(', ' ', $variable);
   $variable = str_replace(')', ' ', $variable);
   return $variable;
}
add_filter('get_archives_link', 'sagablog_archive_postcount_filter');
  
/**
 * Include the TGM_Plugin_Activation.
 */
require_once get_template_directory() . '/plugins/tgm/tgm.php';

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Filter the excerpt length to 30 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function sagablog_excerpt_length( $length ) {
    return 22;
}
if (!is_admin()){
    add_filter( 'excerpt_length', 'sagablog_excerpt_length');
}
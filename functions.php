<?php
/**
 * burnsWilcox functions and definitions
 *
 * @package burnsWilcox
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */
/**
 * Initialize Options Panel
 */
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}
if ( ! function_exists( 'burnsWilcox_setup' ) ) :
function burnsWilcox_setup() {
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on burnsWilcox, use a find and replace
	 * to change 'burnsWilcox' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'burnsWilcox', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_image_size('homepage-thumb',220,200,true);
	register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'burnsWilcox' ),
        'secondary' => __( 'Second Top Menu', 'burnsWilcox' ),
        'mobile-top' => __( 'Mobile top menu', 'burnsWilcox' ),
        'footer' => __( 'Footer Menu', 'burnsWilcox' ),
        'companies' => __( 'Companies Menu', 'burnsWilcox' ),
        'kaufman' => __( 'Kaufman slider Menu', 'burnsWilcox' ),
	) );
	// add_theme_support( 'post-formats', array( 'image', 'video', 'quote' ) );
	add_theme_support( 'custom-background', apply_filters( 'burnsWilcox_custom_background_args', array(
		'default-color' => 'eeeeee',
		'default-image' => '',
	) ) );
}
endif; // burnsWilcox_setup
add_action( 'after_setup_theme', 'burnsWilcox_setup' );
function burnsWilcox_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'burnsWilcox' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
      register_sidebar( array(
          'name'          => __( 'Blog Sidebar', 'burnsWilcox' ),
          'id'            => 'sidebar-blog',
          'before_widget' => '<aside id="%1$s" class="widget %2$s">',
          'after_widget'  => '</aside>',
      ) );
}
add_action( 'widgets_init', 'burnsWilcox_widgets_init' );
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}
add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');
function optionsframework_custom_scripts() { ?>
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});
	
	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}
	
});
</script>
 
<?php
}
function burnsWilcox_scripts() {
	wp_enqueue_style( 'burnsWilcox-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700');
	wp_enqueue_style( 'burnsWilcox-basic-style', get_stylesheet_uri() );
	if ( (function_exists( 'of_get_option' )) && (of_get_option('sidebar-layout', true) != 1) ) {
		if (of_get_option('sidebar-layout', true) ==  'right') {
			wp_enqueue_style( 'burnsWilcox-layout', get_stylesheet_directory_uri()."/css/layouts/content-sidebar.css" );
		}
		else {
			wp_enqueue_style( 'burnsWilcox-layout', get_stylesheet_directory_uri()."/css/layouts/sidebar-content.css" );
		}	
	}
	else {
		wp_enqueue_style( 'burnsWilcox-layout', get_stylesheet_directory_uri()."/css/layouts/content-sidebar.css" );
	}	
	wp_enqueue_style( 'burnsWilcox-bootstrap-style', get_stylesheet_directory_uri()."/css/bootstrap.min.css", array('burnsWilcox-fonts','burnsWilcox-layout') );
	wp_enqueue_style( 'burnsWilcox-main-style', get_stylesheet_directory_uri()."/css/main.css", array('burnsWilcox-fonts','burnsWilcox-layout') );
	
	wp_enqueue_script( 'burnsWilcox-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'burnsWilcox-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	
	wp_enqueue_style( 'burnsWilcox-nivo-slider-default-theme', get_stylesheet_directory_uri()."/css/nivo/themes/default/default.css" );
	
	wp_enqueue_style( 'burnsWilcox-nivo-slider-style', get_stylesheet_directory_uri()."/css/nivo/nivo.css" );
	
	wp_enqueue_script('burnsWilcox-timeago', get_template_directory_uri() . '/js/jquery.timeago.js', array('jquery') );
	
	wp_enqueue_script('burnsWilcox-collapse', get_template_directory_uri() . '/js/collapse.js', array('jquery') );
	
	wp_enqueue_script( 'burnsWilcox-nivo-slider', get_template_directory_uri() . '/js/nivo.slider.js', array('jquery') );
	
	wp_enqueue_script( 'burnsWilcox-superfish', get_template_directory_uri() . '/js/superfish.js', array('jquery') );
	
	wp_enqueue_script( 'jquery-masonry', false, array('jquery') );
	
	wp_enqueue_script( 'burnsWilcox-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery') );
	
	wp_enqueue_script( 'burnsWilcox-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery','burnsWilcox-nivo-slider','burnsWilcox-timeago','burnsWilcox-superfish', 'jquery-masonry') );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'burnsWilcox-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'burnsWilcox_scripts' );
function burnsWilcox_custom_head_codes() {
 if ( (function_exists( 'of_get_option' )) && (of_get_option('headcode1', true) != 1) ) {
	echo of_get_option('headcode1', true);
 }
 if ( (function_exists( 'of_get_option' )) && (of_get_option('style2', true) != 1) ) {
	echo "<style>".of_get_option('style2', true)."</style>";
 }
}	
add_action('wp_head', 'burnsWilcox_custom_head_codes');
function burnsWilcox_nav_menu_args( $args = '' )
{
    $args['container'] = false;
    return $args;
} // function
add_filter( 'wp_page_menu_args', 'burnsWilcox_nav_menu_args' );
function burnsWilcox_pagination() {
	global $wp_query;
	$big = 12345678;
	$page_format = paginate_links( array(
	    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	    'format' => '?paged=%#%',
	    'current' => max( 1, get_query_var('paged') ),
	    'total' => $wp_query->max_num_pages,
	    'type'  => 'array'
	) );
	if( is_array($page_format) ) {
	            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
	            echo '<div class="pagination"><div><ul>';
	            echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
	            foreach ( $page_format as $page ) {
	                    echo "<li>$page</li>";
	            }
	           echo '</ul></div></div>';
	 }
}
/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Custom Menu For Bootstrap
 */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
/**
 * Custom functions that act independently of the theme templates. Import Widgets
 */
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/widgets.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/*###########################
#######Custom Post Types########
###########################
*/
// News
add_action( 'init', 'register_cpt_news' );
function register_cpt_news() {
    $labels = array( 
        'name' => _x( 'News', 'news' ),
        'singular_name' => _x( 'News', 'news' ),
        'add_new' => _x( 'Add News', 'news' ),
        'add_new_item' => _x( 'Add News', 'news' ),
        'edit_item' => _x( 'Edit News', 'news' ),
        'new_item' => _x( 'New News', 'news' ),
        'view_item' => _x( 'View News', 'news' ),
        'search_items' => _x( 'Search News', 'news' ),
        'not_found' => _x( 'No news found', 'news' ),
        'not_found_in_trash' => _x( 'No news found in Trash', 'news' ),
        'parent_item_colon' => _x( 'Parent News:', 'news' ),
        'menu_name' => _x( 'News', 'news' ),
    );
    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
        'taxonomies' => array( 'category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    register_post_type( 'news', $args );
}
// resources
add_action( 'init', 'register_cpt_resources' );
function register_cpt_resources() {
    $labels = array( 
        'name' => _x( 'Resources', 'resources' ),
        'singular_name' => _x( 'Resource', 'resources' ),
        'add_new' => _x( 'Add New Resource', 'resources' ),
        'add_new_item' => _x( 'Add New Resource', 'resources' ),
        'edit_item' => _x( 'Edit Resource', 'resources' ),
        'new_item' => _x( 'New Resource', 'resources' ),
        'view_item' => _x( 'View Resource', 'resources' ),
        'search_items' => _x( 'Search Resources', 'resources' ),
        'not_found' => _x( 'No Resources found', 'resources' ),
        'not_found_in_trash' => _x( 'No Resources found in Trash', 'resources' ),
        'parent_item_colon' => _x( 'Parent resources:', 'resources' ),
        'menu_name' => _x( 'Resources', 'resources' ),
    );
    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'supports' => array( 'title', 'thumbnail', 'trackbacks', 'custom-fields', 'revisions'),
        'taxonomies' => array( 'category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    register_post_type( 'resources', $args );
}
// Offices
add_action( 'init', 'register_cpt_Offices' );
function register_cpt_Offices() {
    $labels = array( 
        'name' => _x( 'Offices', 'Offices' ),
        'singular_name' => _x( 'Office', 'Office' ),
        'add_new' => _x( 'Add New Office', 'Offices' ),
        'add_new_item' => _x( 'Add New Office', 'Offices' ),
        'edit_item' => _x( 'Edit Office', 'Offices' ),
        'new_item' => _x( 'New Office', 'Offices' ),
        'view_item' => _x( 'View Office', 'Offices' ),
        'search_items' => _x( 'Search Offices', 'Offices' ),
        'not_found' => _x( 'No Offices found', 'Offices' ),
        'not_found_in_trash' => _x( 'No Offices found in Trash', 'Offices' ),
        'parent_item_colon' => _x( 'Parent Offices:', 'Offices' ),
        'menu_name' => _x( 'Offices', 'Offices' ),
    );
    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'supports' => array( 'title', 'excerpt', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
        'taxonomies' => array( 'category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    register_post_type( 'Offices', $args );
}
// Staff
add_action( 'init', 'register_cpt_Staff' );
function register_cpt_Staff() {
    $labels = array( 
        'name' => _x( 'Staff', 'Staff' ),
        'singular_name' => _x( 'Staff', 'Staff' ),
        'add_new' => _x( 'Add New Staff', 'Staff' ),
        'add_new_item' => _x( 'Add New Staff', 'Staff' ),
        'edit_item' => _x( 'Edit Staff', 'Staff' ),
        'new_item' => _x( 'New Staff', 'Staff' ),
        'view_item' => _x( 'View Staff', 'Staff' ),
        'search_items' => _x( 'Search Staff', 'Staff' ),
        'not_found' => _x( 'No Staff found', 'Staff' ),
        'not_found_in_trash' => _x( 'No Staff found in Trash', 'Staff' ),
        'parent_item_colon' => _x( 'Parent Staff:', 'Staff' ),
        'menu_name' => _x( 'Staff', 'Staff' ),
    );
    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'supports' => array( 'title', 'excerpt', 'author', 'thumbnail', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
        'taxonomies' => array( 'category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    register_post_type( 'Staff', $args );
}
// Products
add_action( 'init', 'register_cpt_Products' );
function register_cpt_Products() {
    $labels = array( 
        'name' => _x( 'Products', 'Products' ),
        'singular_name' => _x( 'Product', 'Products' ),
        'add_new' => _x( 'Add New Product', 'Products' ),
        'add_new_item' => _x( 'Add New Product', 'Products' ),
        'edit_item' => _x( 'Edit Product', 'Products' ),
        'new_item' => _x( 'New Product', 'Products' ),
        'view_item' => _x( 'View Products', 'Products' ),
        'search_items' => _x( 'Search Products', 'Products' ),
        'not_found' => _x( 'No Products found', 'Products' ),
        'not_found_in_trash' => _x( 'No Products found in Trash', 'Products' ),
        'parent_item_colon' => _x( 'Parent Products:', 'Products' ),
        'menu_name' => _x( 'Products', 'Products' ),
    );
    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
        'taxonomies' => array( 'category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    register_post_type( 'Products', $args );
}
function new_excerpt_more( $more ) {
    return "...";
}
add_filter('excerpt_more', 'new_excerpt_more');


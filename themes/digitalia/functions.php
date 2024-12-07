<?php
/**
 * digitalia functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package digitalia
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
function digitalia_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on digitalia, use a find and replace
		* to change 'digitalia' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'digitalia', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'digitalia' ),
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
			'digitalia_custom_background_args',
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
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'digitalia_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function digitalia_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'digitalia_content_width', 640 );
}
add_action( 'after_setup_theme', 'digitalia_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function digitalia_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'digitalia' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'digitalia' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'digitalia_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function digitalia_scripts() {
	wp_enqueue_style( 'digitalia-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'digitalia-style', 'rtl', 'replace' );
	wp_enqueue_style( 'digitalia-tailwind-menu', get_template_directory_uri() . '/css/tailwind-menu.css', array(), _S_VERSION );

	wp_enqueue_script( 'digitalia-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'digitalia-menu', get_template_directory_uri() . '/js/menu.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'digitalia-smooth-scroll', get_template_directory_uri() . '/assets/js/smooth-scroll.js', array(), _S_VERSION, true );

	wp_enqueue_script('alpine-js', 'https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js', array(), null, true);
	wp_script_add_data('alpine-js', 'defer', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'digitalia_scripts' );

/**
 * Enqueue Swiper.js for modules carousel
 */
function digitalia_enqueue_swiper() {
    if (is_page_template('page-templates/modulos.php')) {
        // Enqueue Swiper CSS from CDN
        wp_enqueue_style(
            'swiper-css',
            'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
            array(),
            '11.0.5'
        );

        // Enqueue Swiper JS from CDN
        wp_enqueue_script(
            'swiper-js',
            'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
            array(),
            '11.0.5',
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'digitalia_enqueue_swiper');

/**
 * Register custom page templates from subdirectories
 */
function digitalia_register_page_templates($templates) {
    $theme_dir = get_template_directory();
    
    // Regular page templates
    $regular_templates_dir = $theme_dir . '/page-templates';
    if (is_dir($regular_templates_dir)) {
        $regular_files = glob($regular_templates_dir . '/*.php');
        foreach ($regular_files as $file) {
            $template_data = get_file_data($file, array('Template Name' => 'Template Name'));
            if (!empty($template_data['Template Name'])) {
                $templates[str_replace($theme_dir . '/', '', $file)] = $template_data['Template Name'];
            }
        }
    }
    
    // Subpage templates
    $subpage_templates_dir = $regular_templates_dir . '/subpage-templates';
    if (is_dir($subpage_templates_dir)) {
        $subpage_files = glob($subpage_templates_dir . '/*.php');
        foreach ($subpage_files as $file) {
            $template_data = get_file_data($file, array('Template Name' => 'Template Name'));
            if (!empty($template_data['Template Name'])) {
                $templates[str_replace($theme_dir . '/', '', $file)] = $template_data['Template Name'];
            }
        }
    }
    
    return $templates;
}
add_filter('theme_page_templates', 'digitalia_register_page_templates');

/**
 * Define color schemes for different modules
 *
 * @param string $type Optional. Type of color scheme to return ('full' or 'pill'). Default 'full'.
 * @return array Color schemes for different modules
 */
function digitalia_get_color_schemes($type = 'full') {
    $full_schemes = array(
        'academia' => array(
            'bg' => 'bg-yellow-200',
            'text' => 'text-yellow-950',
            'subtitle' => 'text-yellow-800',
            'highlight' => 'bg-yellow-300/30',
            'grid' => 'bg-yellow-300',
            'button' => 'bg-yellow-500 hover:bg-yellow-600 text-white',
        ),
        'en-linea' => array(
            'bg' => 'bg-red-200',
            'text' => 'text-red-950',
            'subtitle' => 'text-red-800',
            'highlight' => 'bg-red-300/30',
            'grid' => 'bg-red-300',
            'button' => 'bg-red-500 hover:bg-red-600 text-white',
        ),
        'colaboratorio' => array(
            'bg' => 'bg-teal-200',
            'text' => 'text-teal-950',
            'subtitle' => 'text-teal-800',
            'highlight' => 'bg-teal-300/30',
            'grid' => 'bg-teal-300',
            'button' => 'bg-teal-500 hover:bg-teal-600 text-white',
        ),
        'total-transmedia' => array(
            'bg' => 'bg-blue-200',
            'text' => 'text-blue-950',
            'subtitle' => 'text-blue-800',
            'highlight' => 'bg-blue-300/30',
            'grid' => 'bg-blue-300',
            'button' => 'bg-blue-500 hover:bg-blue-600 text-white',
        ),
        'ready' => array(
            'bg' => 'bg-purple-200',
            'text' => 'text-purple-950',
            'subtitle' => 'text-purple-800',
            'highlight' => 'bg-purple-300/30',
            'grid' => 'bg-purple-300',
            'button' => 'bg-purple-500 hover:bg-purple-600 text-white',
        ),
    );

    if ($type === 'pill') {
        $pill_schemes = array();
        foreach ($full_schemes as $key => $scheme) {
            $pill_schemes[$key] = $scheme['highlight'];
        }
        return $pill_schemes;
    }

    return $full_schemes;
}

/**
 * Register Custom Post Type Cursos and its taxonomies
 */
function digitalia_register_cursos_post_type() {
    // Register Cursos Post Type
    $labels = array(
        'name'                  => _x( 'Cursos', 'Post type general name', 'digitalia' ),
        'singular_name'         => _x( 'Curso', 'Post type singular name', 'digitalia' ),
        'menu_name'            => _x( 'Cursos', 'Admin Menu text', 'digitalia' ),
        'add_new'              => __( 'Añadir Nuevo', 'digitalia' ),
        'add_new_item'         => __( 'Añadir Nuevo Curso', 'digitalia' ),
        'edit_item'            => __( 'Editar Curso', 'digitalia' ),
        'new_item'             => __( 'Nuevo Curso', 'digitalia' ),
        'view_item'            => __( 'Ver Curso', 'digitalia' ),
        'view_items'           => __( 'Ver Cursos', 'digitalia' ),
        'search_items'         => __( 'Buscar Cursos', 'digitalia' ),
        'not_found'            => __( 'No se encontraron cursos', 'digitalia' ),
        'not_found_in_trash'   => __( 'No se encontraron cursos en la papelera', 'digitalia' ),
        'all_items'            => __( 'Todos los Cursos', 'digitalia' ),
        'archives'             => __( 'Archivo de Cursos', 'digitalia' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'cursos' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest'       => true,
        'taxonomies'         => array('post_tag') // Add support for post tags
    );

    register_post_type( 'curso', $args );

    // Register Categorias Taxonomy
    $taxonomy_labels = array(
        'name'              => _x( 'Categorías de Cursos', 'taxonomy general name', 'digitalia' ),
        'singular_name'     => _x( 'Categoría de Curso', 'taxonomy singular name', 'digitalia' ),
        'search_items'      => __( 'Buscar Categorías', 'digitalia' ),
        'all_items'         => __( 'Todas las Categorías', 'digitalia' ),
        'parent_item'       => __( 'Categoría Padre', 'digitalia' ),
        'parent_item_colon' => __( 'Categoría Padre:', 'digitalia' ),
        'edit_item'         => __( 'Editar Categoría', 'digitalia' ),
        'update_item'       => __( 'Actualizar Categoría', 'digitalia' ),
        'add_new_item'      => __( 'Añadir Nueva Categoría', 'digitalia' ),
        'new_item_name'     => __( 'Nuevo Nombre de Categoría', 'digitalia' ),
        'menu_name'         => __( 'Categorías', 'digitalia' ),
    );

    $taxonomy_args = array(
        'hierarchical'      => true,
        'labels'            => $taxonomy_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'categoria-curso' ),
        'show_in_rest'      => true,
    );

    register_taxonomy( 'categoria-curso', array( 'curso' ), $taxonomy_args );
}
add_action( 'init', 'digitalia_register_cursos_post_type' );

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
 * Custom Nav Walker for Tailwind CSS
 */
require get_template_directory() . '/inc/class-tailwind-nav-walker.php';

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

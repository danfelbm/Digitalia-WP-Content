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
	define( '_S_VERSION', '1.4.0' );
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
	//wp_enqueue_style( 'digitalia-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'digitalia-style', 'rtl', 'replace' );
    wp_enqueue_style( 'digitalia-blocks', get_template_directory_uri() . '/css/blocks.css', array(), _S_VERSION );
    wp_enqueue_style( 'digitalia-tailwind-menu', get_template_directory_uri() . '/css/tailwind-menu.css', array('digitalia-blocks'), _S_VERSION );
    wp_enqueue_style( 'digitalia-tailwind', get_template_directory_uri() . '/style.css', array('digitalia-blocks', 'digitalia-tailwind-menu'), _S_VERSION );
    
    // Add Google Fonts
    wp_enqueue_style( 'digitalia-google-fonts', 'https://fonts.googleapis.com/css2?family=Lexend:wght@700&family=Work+Sans:wght@400&family=JetBrains+Mono:wght@500&display=swap', array(), null );
    
    // Add Font Awesome
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css', array(), '6.7.2' );
    
    // Add Radix UI
    wp_enqueue_script( 'radix-ui-tabs', 'https://unpkg.com/@radix-ui/tabs@latest/dist/index.umd.js', array(), null, true );
    
	wp_enqueue_script( 'digitalia-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'digitalia-menu', get_template_directory_uri() . '/js/menu.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'digitalia-smooth-scroll', get_template_directory_uri() . '/assets/js/smooth-scroll.js', array(), _S_VERSION, true );

	wp_enqueue_script('alpine-js', 'https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js', array(), null, true);
	wp_script_add_data('alpine-js', 'defer', true);

	// Enqueue carousel script
	wp_enqueue_script('digitalia-carousel', get_template_directory_uri() . '/js/carousel.js', array(), _S_VERSION, true);

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
 * Helper function to recursively scan template directories
 */
function scan_template_dir($dir, $theme_dir, &$templates) {
    if (!is_dir($dir)) return;
    
    // Get all PHP files in current directory
    $files = glob($dir . '/*.php');
    foreach ($files as $file) {
        $template_data = get_file_data($file, array('Template Name' => 'Template Name'));
        if (!empty($template_data['Template Name'])) {
            $templates[str_replace($theme_dir . '/', '', $file)] = $template_data['Template Name'];
        }
    }
    
    // Scan subdirectories
    $subdirs = glob($dir . '/*', GLOB_ONLYDIR);
    foreach ($subdirs as $subdir) {
        scan_template_dir($subdir, $theme_dir, $templates);
    }
}

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
    
    // Start recursive scan from subpage-templates directory
    $subpage_templates_dir = $regular_templates_dir . '/subpage-templates';
    scan_template_dir($subpage_templates_dir, $theme_dir, $templates);
    
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
            'bg' => 'bg-blue-300',
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
        'menu_icon'          => 'dashicons-welcome-learn-more',
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
 * Register Custom Post Type Episodios and its taxonomies
 */
function digitalia_register_episodios_post_type() {
    // Register Episodios Post Type
    $labels = array(
        'name'                  => _x( 'Episodios', 'Post type general name', 'digitalia' ),
        'singular_name'         => _x( 'Episodio', 'Post type singular name', 'digitalia' ),
        'menu_name'            => _x( 'Episodios', 'Admin Menu text', 'digitalia' ),
        'add_new'              => __( 'Añadir Nuevo', 'digitalia' ),
        'add_new_item'         => __( 'Añadir Nuevo Episodio', 'digitalia' ),
        'edit_item'            => __( 'Editar Episodio', 'digitalia' ),
        'new_item'             => __( 'Nuevo Episodio', 'digitalia' ),
        'view_item'            => __( 'Ver Episodio', 'digitalia' ),
        'view_items'           => __( 'Ver Episodios', 'digitalia' ),
        'search_items'         => __( 'Buscar Episodios', 'digitalia' ),
        'not_found'            => __( 'No se encontraron episodios', 'digitalia' ),
        'not_found_in_trash'   => __( 'No se encontraron episodios en la papelera', 'digitalia' ),
        'all_items'            => __( 'Todos los Episodios', 'digitalia' ),
        'archives'             => __( 'Archivo de Episodios', 'digitalia' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'episodios' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-video-alt3',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest'       => true,
        'taxonomies'         => array('temporadas', 'post_tag') // Add support for Temporadas taxonomy and post tags
    );

    register_post_type( 'episodio', $args );

    // Register Temporadas Taxonomy
    $taxonomy_labels = array(
        'name'              => _x( 'Temporadas', 'taxonomy general name', 'digitalia' ),
        'singular_name'     => _x( 'Temporada', 'taxonomy singular name', 'digitalia' ),
        'search_items'      => __( 'Buscar Temporadas', 'digitalia' ),
        'all_items'         => __( 'Todas las Temporadas', 'digitalia' ),
        'parent_item'       => __( 'Temporada Padre', 'digitalia' ),
        'parent_item_colon' => __( 'Temporada Padre:', 'digitalia' ),
        'edit_item'         => __( 'Editar Temporada', 'digitalia' ),
        'update_item'       => __( 'Actualizar Temporada', 'digitalia' ),
        'add_new_item'      => __( 'Añadir Nueva Temporada', 'digitalia' ),
        'new_item_name'     => __( 'Nuevo Nombre de Temporada', 'digitalia' ),
        'menu_name'         => __( 'Temporadas', 'digitalia' ),
    );

    $taxonomy_args = array(
        'hierarchical'      => true,
        'labels'            => $taxonomy_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'temporada' ),
        'show_in_rest'      => true,
    );

    register_taxonomy( 'temporadas', array( 'episodio' ), $taxonomy_args );
}
add_action( 'init', 'digitalia_register_episodios_post_type' );

/**
 * Register Custom Post Type Actores
 */
function digitalia_register_actores_post_type() {
    $labels = array(
        'name'                  => _x( 'Actores', 'Post Type General Name', 'digitalia' ),
        'singular_name'         => _x( 'Actor', 'Post Type Singular Name', 'digitalia' ),
        'menu_name'            => __( 'Actores', 'digitalia' ),
        'name_admin_bar'       => __( 'Actor', 'digitalia' ),
        'archives'             => __( 'Archivo de Actores', 'digitalia' ),
        'attributes'           => __( 'Atributos del Actor', 'digitalia' ),
        'parent_item_colon'    => __( 'Actor Padre:', 'digitalia' ),
        'all_items'            => __( 'Todos los Actores', 'digitalia' ),
        'add_new_item'         => __( 'Añadir Nuevo Actor', 'digitalia' ),
        'add_new'              => __( 'Añadir Nuevo', 'digitalia' ),
        'new_item'             => __( 'Nuevo Actor', 'digitalia' ),
        'edit_item'            => __( 'Editar Actor', 'digitalia' ),
        'update_item'          => __( 'Actualizar Actor', 'digitalia' ),
        'view_item'            => __( 'Ver Actor', 'digitalia' ),
        'view_items'           => __( 'Ver Actores', 'digitalia' ),
        'search_items'         => __( 'Buscar Actor', 'digitalia' ),
    );
    
    $args = array(
        'label'                 => __( 'Actor', 'digitalia' ),
        'description'           => __( 'Actores', 'digitalia' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'taxonomies'            => array( 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-businessman',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    
    register_post_type( 'actores', $args );
}
add_action( 'init', 'digitalia_register_actores_post_type' );

/**
 * Register Custom Post Type Personajes
 */
function digitalia_register_personajes_post_type() {
    $labels = array(
        'name'                  => _x( 'Personajes', 'Post Type General Name', 'digitalia' ),
        'singular_name'         => _x( 'Personaje', 'Post Type Singular Name', 'digitalia' ),
        'menu_name'            => __( 'Personajes', 'digitalia' ),
        'name_admin_bar'       => __( 'Personaje', 'digitalia' ),
        'archives'             => __( 'Archivo de Personajes', 'digitalia' ),
        'attributes'           => __( 'Atributos del Personaje', 'digitalia' ),
        'parent_item_colon'    => __( 'Personaje Padre:', 'digitalia' ),
        'all_items'            => __( 'Todos los Personajes', 'digitalia' ),
        'add_new_item'         => __( 'Añadir Nuevo Personaje', 'digitalia' ),
        'add_new'              => __( 'Añadir Nuevo', 'digitalia' ),
        'new_item'             => __( 'Nuevo Personaje', 'digitalia' ),
        'edit_item'            => __( 'Editar Personaje', 'digitalia' ),
        'update_item'          => __( 'Actualizar Personaje', 'digitalia' ),
        'view_item'            => __( 'Ver Personaje', 'digitalia' ),
        'view_items'           => __( 'Ver Personajes', 'digitalia' ),
        'search_items'         => __( 'Buscar Personaje', 'digitalia' ),
    );
    
    $args = array(
        'label'                 => __( 'Personaje', 'digitalia' ),
        'description'           => __( 'Personajes', 'digitalia' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'taxonomies'            => array( 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-groups',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    
    register_post_type( 'personajes', $args );
}
add_action( 'init', 'digitalia_register_personajes_post_type' );

/**
 * Register Custom Post Type Series
 */
function digitalia_register_series_post_type() {
    $labels = array(
        'name'                  => _x( 'Series', 'Post Type General Name', 'digitalia' ),
        'singular_name'         => _x( 'Serie', 'Post Type Singular Name', 'digitalia' ),
        'menu_name'            => __( 'Series', 'digitalia' ),
        'name_admin_bar'       => __( 'Serie', 'digitalia' ),
        'archives'             => __( 'Serie Archives', 'digitalia' ),
        'attributes'           => __( 'Serie Attributes', 'digitalia' ),
        'parent_item_colon'    => __( 'Parent Serie:', 'digitalia' ),
        'all_items'            => __( 'All Series', 'digitalia' ),
        'add_new_item'         => __( 'Add New Serie', 'digitalia' ),
        'add_new'              => __( 'Add New', 'digitalia' ),
        'new_item'             => __( 'New Serie', 'digitalia' ),
        'edit_item'            => __( 'Edit Serie', 'digitalia' ),
        'update_item'          => __( 'Update Serie', 'digitalia' ),
        'view_item'            => __( 'View Serie', 'digitalia' ),
        'view_items'           => __( 'View Series', 'digitalia' ),
        'search_items'         => __( 'Search Serie', 'digitalia' ),
    );
    
    $args = array(
        'label'               => __( 'Serie', 'digitalia' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'taxonomies'          => array( 'category', 'post_tag' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-video-alt',
        'show_in_admin_bar'  => true,
        'show_in_nav_menus'  => true,
        'can_export'         => true,
        'has_archive'        => true,
        'exclude_from_search'=> false,
        'publicly_queryable' => true,
        'capability_type'    => 'post',
        'show_in_rest'       => true,
    );
    
    register_post_type( 'series', $args );
}
add_action( 'init', 'digitalia_register_series_post_type' );

/**
 * Register Hero Block
 */
function digitalia_register_hero_block() {
    if ( ! function_exists( 'register_block_type' ) ) {
        return;
    }

    // Register the block
    register_block_type( get_template_directory() . '/blocks/hero' );
}
add_action( 'init', 'digitalia_register_hero_block' );

/**
 * Load ACF Fields
 */
require get_template_directory() . '/inc/acf_fields/frontpage-acf-fields.php';
require get_template_directory() . '/inc/acf_fields/modulos-acf-fields.php';
require get_template_directory() . '/inc/acf_fields/academia-acf-fields.php';
require get_template_directory() . '/inc/acf_fields/enlinea-acf-fields.php';
require get_template_directory() . '/inc/acf_fields/queesdigitalia-acf-fields.php';
require get_template_directory() . '/inc/acf_fields/parametros-acf-fields.php';

/**
 * Load Admin Pages
 */
require_once get_template_directory() . '/inc/admin/parametros-page.php';

add_action('acf/init', 'digitalia_register_acf_fields');

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

add_action( 'rest_api_init', 'add_thumbnail_to_JSON' );
function add_thumbnail_to_JSON() {
    //Add featured image
    register_rest_field( 
        'post', // Where to add the field (Here, blog posts. Could be an array)
        'featured_image_src', // Name of new field (You can call this anything)
        array(
            'get_callback'    => 'get_image_src',
            'update_callback' => null,
            'schema'          => null,
        )
    );
}

function get_image_src( $object, $field_name, $request ) {
    $feat_img_array = wp_get_attachment_image_src(
        $object['featured_media'], // Image attachment ID
        'full',  // Size.  Ex. "thumbnail", "large", "full", etc..
        true // Whether the image should be treated as an icon.
    );
    return $feat_img_array[0];
}

/**
 * Calculate estimated reading time for posts
 *
 * @return int Estimated reading time in minutes
 */
function get_reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // Assuming average reading speed of 200 words per minute
    
    return max(1, $reading_time); // Return at least 1 minute
}

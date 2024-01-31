<?php
/**
 * zaimozon functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package zaimozon
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function zaimozon_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on zaimozon, use a find and replace
	 * to change 'zaimozon' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('zaimozon', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'zaimozon'),
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
			'zaimozon_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'zaimozon_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function zaimozon_content_width()
{
	$GLOBALS['content_width'] = apply_filters('zaimozon_content_width', 640);
}
add_action('after_setup_theme', 'zaimozon_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function zaimozon_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'zaimozon'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'zaimozon'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'zaimozon_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function zaimozon_scripts()
{
	wp_enqueue_style('zaimozon-fonts', get_template_directory_uri() . '/assets/style/stylesheet.css', array(), _S_VERSION);
	wp_enqueue_style('zaimozon-bs', get_template_directory_uri() . '/assets/style/bs.css', array(), _S_VERSION);
	wp_enqueue_style('zaimozon-custom', get_template_directory_uri() . '/assets/style/style.css', array(), _S_VERSION);

	wp_enqueue_script('zaimozon-bs', get_template_directory_uri() . '/assets/js/bs.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'zaimozon_scripts');

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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_filter('upload_mimes', 'svg_upload_allow');

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow($mimes)
{
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}

add_filter('wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5);

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type($data, $file, $filename, $mimes, $real_mime = '')
{

	// WP 5.1 +
	if (version_compare($GLOBALS['wp_version'], '5.1.0', '>=')) {
		$dosvg = in_array($real_mime, ['image/svg', 'image/svg+xml']);
	} else {
		$dosvg = ('.svg' === strtolower(substr($filename, -4)));
	}

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя
	if ($dosvg) {

		// разрешим
		if (current_user_can('manage_options')) {

			$data['ext'] = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext'] = false;
			$data['type'] = false;
		}

	}

	return $data;
}

add_filter('wp_prepare_attachment_for_js', 'show_svg_in_media_library');

# Формирует данные для отображения SVG как изображения в медиабиблиотеке.
function show_svg_in_media_library($response)
{

	if ($response['mime'] === 'image/svg+xml') {

		// Без вывода названия файла
		$response['sizes'] = [
			'medium' => [
				'url' => $response['url'],
			],
			// при редактирования картинки
			'full' => [
				'url' => $response['url'],
			],
		];
	}

	return $response;
}

function add_menu_link_class($atts, $item, $args)
{
	if (property_exists($args, 'link_class')) {
		$atts['class'] = $args->link_class;
	}
	return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);

function add_additional_class_on_li($classes, $item, $args)
{
	if (isset($args->add_li_class)) {
		$classes[] = $args->add_li_class;
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);




function mytheme_customize_register($wp_customize)
{
/*
Добавляем секцию в настройки темы
 */
    $wp_customize->add_section(
        // ID
        'data_site_section',
        // Arguments array
        array(
            'title' => 'Контакты',
            'capability' => 'edit_theme_options',
            'description' => "Тут можно указать данные сайта",
        )
    );
/*
Добавляем поле
 */
    $wp_customize->add_setting(
        // ID
        'theme_tg',
        // Arguments array
        array(
            'default' => '',
            'type' => 'option',
        )
    );
    $wp_customize->add_control(
        // ID
        'theme_tg_control',
        // Arguments array
        array(
            'type' => 'text',
            'label' => "Телеграм",
            'section' => 'data_site_section',
            // This last one must match setting ID from above
            'settings' => 'theme_tg',
        )
    );
/*
Добавляем поле
 */
    $wp_customize->add_setting(
        // ID
        'theme_dz',
        // Arguments array
        array(
            'default' => '',
            'type' => 'option',
        )
    );
    $wp_customize->add_control(
        // ID
        'theme_vk_control',
        // Arguments array
        array(
            'type' => 'text',
            'label' => "Я.Дзен",
            'section' => 'data_site_section',
            // This last one must match setting ID from above
            'settings' => 'theme_dz',
        )
    );
/*
Добавляем поле
 */
    $wp_customize->add_setting(
        // ID
        'theme_vk',
        // Arguments array
        array(
            'default' => '',
            'type' => 'option',
        )
    );
    $wp_customize->add_control(
        // ID
        'theme_yt_control',
        // Arguments array
        array(
            'type' => 'text',
            'label' => "Вконтакте",
            'section' => 'data_site_section',
            // This last one must match setting ID from above
            'settings' => 'theme_vk',
        )
    );

}
add_action('customize_register', 'mytheme_customize_register');



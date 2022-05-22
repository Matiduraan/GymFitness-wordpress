<?php
//Consultas reutilizables
require get_template_directory() . '/inc/queries.php';
require get_template_directory() . '/inc/shortcodes.php';

function gymfitness_setup()
{
    // Habilitar imagenes destacadas
    add_theme_support('post-thumbnails');

    //Habilitar custom logo
    add_theme_support('custom-logo');

    //Habilitar Titulos Seo
    add_theme_support('title-tag');

    //Agregar tamaños de imagenes
    add_image_size('square', 350, 350, true);
    add_image_size('portrait', 350, 724, true);
    add_image_size('cajas', 400, 375, true);
    add_image_size('mediano', 700, 400, true);
    add_image_size('blog', 966, 644, true);
}
add_action('after_setup_theme', 'gymfitness_setup');

function gymfitness_menus()
{
    register_nav_menus(array(
        'menu-principal' => __('Menu principal', 'gymfitness'),
        'menu-footer' => __('Menu footer', 'gymfitness')
    ));
}

add_action('init', 'gymfitness_menus');


//Custom logo
function themename_custom_logo_setup()
{
    $defaults = array(
        'height'               => 100,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array('site-title', 'site-description'),
        'unlink-homepage-logo' => true,
    );

    add_theme_support('custom-logo', $defaults);
}

//Habilitar SVG
function dmc_add_svg_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'dmc_add_svg_mime_types');

// Scripts y Styles

function gymfitness_scripts_styles()
{
    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');
    wp_enqueue_style('googleFonts', 'https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:wght@400;700;900&family=Staatliches&display=swap', array(), '1.0.0');
    wp_enqueue_style('slicknavCSS', get_template_directory_uri() . '/css/slicknav.min.css', array(), '1.0.10');
    if (is_page('galeria')) {
        wp_enqueue_style('lightbox', get_template_directory_uri() . '/css/lightbox.css', array(), '2.11.3');
        wp_enqueue_script('lightboxJS', get_template_directory_uri() . '/js/lightbox.js', array('jquery'), '2.11.3', true);
    }

    if (is_page('contacto')) {
        wp_enqueue_style('leafletCSS', 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.css', array(), '1.7.1');
        wp_enqueue_script('leafletJS', 'https://unpkg.com/leaflet@1.7.1/dist/leaflet.js', array(), '1.7.1', true);
    }

    if (is_page('home')) {
        wp_enqueue_style('bxSliderCSS', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css', array(), '4.2.12');
        wp_enqueue_script('bxSliderJS', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js', array('jquery'), '4.2.12', true);
    }

    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize', 'googleFonts'), '1.0.0');
    wp_enqueue_script('slicknavJS', get_template_directory_uri() . '/js/jquery.slicknav.js', array('jquery'), '1.0.10', true);

    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery', 'slicknavJS'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'gymfitness_scripts_styles');

//Definir zona de widgets

function gymfitness_widgets()
{
    register_sidebar(array(
        'name' => 'Sidebar 1',
        'id' => 'sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => 'Sidebar 2',
        'id' => 'sidebar_2',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-center texto-primario">',
        'after_title' => '</h3>'
    ));
}
add_action('widgets_init', 'gymfitness_widgets');

function gymfitness_hero_image()
{
    // Obtener ID de la pagina principal
    $frontPageId = get_option('page_on_front');

    //Obtener Id de la imagen
    $imagenId = get_field('imagen-hero', $frontPageId);

    //Obtener url de la imagen
    $imagenurl = wp_get_attachment_image_src($imagenId, 'full')[0];

    //Style CSS
    wp_register_style('custom', false);
    wp_enqueue_style('custom');

    $imagen_destacada_css = "
        .home .site-header{
            background-image:linear-gradient( rgba(0,0,0,0.75),rgba(0,0,0,0.75)), url($imagenurl);
        }
    ";

    wp_add_inline_style('custom', $imagen_destacada_css);
}
add_action('init', 'gymfitness_hero_image');

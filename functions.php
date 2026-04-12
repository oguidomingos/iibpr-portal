<?php
/**
 * IIBPR Theme — functions.php
 *
 * Bootstraps o tema: suporte a recursos do WordPress, enqueue de estilos/scripts,
 * registro de menus, widgets, CPTs e customizer.
 */

defined( 'ABSPATH' ) || exit;

/* --------------------------------------------------
   1. SETUP DO TEMA
   -------------------------------------------------- */
function iibpr_theme_setup() {
    load_theme_textdomain( 'iibpr-theme', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 240,
        'flex-width'  => true,
        'flex-height' => true,
    ) );
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style',
    ) );
    add_theme_support( 'align-wide' );
    add_theme_support( 'responsive-embeds' );

    register_nav_menus( array(
        'primary' => esc_html__( 'Menu Principal', 'iibpr-theme' ),
        'footer'  => esc_html__( 'Menu Rodapé', 'iibpr-theme' ),
    ) );
}
add_action( 'after_setup_theme', 'iibpr_theme_setup' );

/* --------------------------------------------------
   2. ENQUEUE DE ESTILOS E SCRIPTS
   -------------------------------------------------- */
function iibpr_scripts() {
    // Tailwind CSS compilado
    wp_enqueue_style( 'iibpr-tailwind', get_template_directory_uri() . '/theme/style.css', array(), '3.0.0' );

    // Fontes Google — Inter + Playfair Display
    wp_enqueue_style( 'iibpr-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700;800&display=swap',
        array(), null
    );

    // Estilo principal do tema
    wp_enqueue_style( 'iibpr-style', get_stylesheet_uri(), array( 'iibpr-tailwind' ), '3.0.0' );

    // Script principal
    wp_enqueue_script( 'iibpr-app', get_template_directory_uri() . '/theme/js/script.min.js', array(), '3.1.0', true );
}
add_action( 'wp_enqueue_scripts', 'iibpr_scripts' );

/* --------------------------------------------------
   3. WIDGETS / SIDEBAR
   -------------------------------------------------- */
function iibpr_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Barra Lateral', 'iibpr-theme' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<section id="%1$s" class="widget %2$s mb-8">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title text-lg font-bold mb-4 text-gray-800">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Rodapé — Coluna 1', 'iibpr-theme' ),
        'id'            => 'footer-1',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="text-sm font-semibold uppercase tracking-wider text-gray-400 mb-4">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'iibpr_widgets_init' );

/* --------------------------------------------------
   4. INCLUDES
   -------------------------------------------------- */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/cpt.php';
require get_template_directory() . '/inc/meta-boxes.php';

/* --------------------------------------------------
   5. FLUSH REWRITE RULES ON THEME SWITCH
   -------------------------------------------------- */
function iibpr_flush_rewrite_rules() {
    iibpr_register_post_types();
    iibpr_register_taxonomies();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'iibpr_flush_rewrite_rules' );

/* --------------------------------------------------
   6. HELPERS
   -------------------------------------------------- */
if ( ! function_exists( 'iibpr_get' ) ) {
    function iibpr_get( $key, $default = '' ) {
        $val = get_theme_mod( $key, $default );
        return $val !== '' ? $val : $default;
    }
}

/**
 * Format a date string in Portuguese (pt-BR).
 */
if ( ! function_exists( 'iibpr_date_pt' ) ) {
    function iibpr_date_pt( $format, $timestamp = null ) {
        $months = array(
            'January' => 'Janeiro', 'February' => 'Fevereiro', 'March' => 'Março',
            'April' => 'Abril', 'May' => 'Maio', 'June' => 'Junho',
            'July' => 'Julho', 'August' => 'Agosto', 'September' => 'Setembro',
            'October' => 'Outubro', 'November' => 'Novembro', 'December' => 'Dezembro',
            'Jan' => 'Jan', 'Feb' => 'Fev', 'Mar' => 'Mar', 'Apr' => 'Abr',
            'May' => 'Mai', 'Jun' => 'Jun', 'Jul' => 'Jul', 'Aug' => 'Ago',
            'Sep' => 'Set', 'Oct' => 'Out', 'Nov' => 'Nov', 'Dec' => 'Dez',
        );
        if ( $timestamp === null ) $timestamp = time();
        $date = date( $format, $timestamp );
        return str_replace( array_keys( $months ), array_values( $months ), $date );
    }
}

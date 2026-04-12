<?php
/**
 * IIBPR Custom Post Types & Taxonomies
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register Custom Post Types
 */
function iibpr_register_post_types() {

    // Cursos
    register_post_type( 'iibpr_curso', array(
        'labels' => array(
            'name'               => __( 'Cursos', 'iibpr-theme' ),
            'singular_name'      => __( 'Curso', 'iibpr-theme' ),
            'add_new'            => __( 'Adicionar Curso', 'iibpr-theme' ),
            'add_new_item'       => __( 'Adicionar Novo Curso', 'iibpr-theme' ),
            'edit_item'          => __( 'Editar Curso', 'iibpr-theme' ),
            'new_item'           => __( 'Novo Curso', 'iibpr-theme' ),
            'view_item'          => __( 'Ver Curso', 'iibpr-theme' ),
            'search_items'       => __( 'Buscar Cursos', 'iibpr-theme' ),
            'not_found'          => __( 'Nenhum curso encontrado', 'iibpr-theme' ),
            'not_found_in_trash' => __( 'Nenhum curso na lixeira', 'iibpr-theme' ),
            'all_items'          => __( 'Todos os Cursos', 'iibpr-theme' ),
        ),
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => array( 'slug' => 'cursos' ),
        'menu_icon'    => 'dashicons-welcome-learn-more',
        'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest' => true,
    ) );

    // Eventos
    register_post_type( 'iibpr_evento', array(
        'labels' => array(
            'name'               => __( 'Eventos', 'iibpr-theme' ),
            'singular_name'      => __( 'Evento', 'iibpr-theme' ),
            'add_new'            => __( 'Adicionar Evento', 'iibpr-theme' ),
            'add_new_item'       => __( 'Adicionar Novo Evento', 'iibpr-theme' ),
            'edit_item'          => __( 'Editar Evento', 'iibpr-theme' ),
            'new_item'           => __( 'Novo Evento', 'iibpr-theme' ),
            'view_item'          => __( 'Ver Evento', 'iibpr-theme' ),
            'search_items'       => __( 'Buscar Eventos', 'iibpr-theme' ),
            'not_found'          => __( 'Nenhum evento encontrado', 'iibpr-theme' ),
            'not_found_in_trash' => __( 'Nenhum evento na lixeira', 'iibpr-theme' ),
            'all_items'          => __( 'Todos os Eventos', 'iibpr-theme' ),
        ),
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => array( 'slug' => 'eventos' ),
        'menu_icon'    => 'dashicons-calendar-alt',
        'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest' => true,
    ) );

    // Depoimentos
    register_post_type( 'iibpr_depoimento', array(
        'labels' => array(
            'name'               => __( 'Depoimentos', 'iibpr-theme' ),
            'singular_name'      => __( 'Depoimento', 'iibpr-theme' ),
            'add_new'            => __( 'Adicionar Depoimento', 'iibpr-theme' ),
            'add_new_item'       => __( 'Adicionar Novo Depoimento', 'iibpr-theme' ),
            'edit_item'          => __( 'Editar Depoimento', 'iibpr-theme' ),
            'all_items'          => __( 'Todos os Depoimentos', 'iibpr-theme' ),
        ),
        'public'       => false,
        'show_ui'      => true,
        'has_archive'  => false,
        'menu_icon'    => 'dashicons-format-quote',
        'supports'     => array( 'title', 'editor', 'thumbnail' ),
        'show_in_rest' => true,
    ) );

    // Equipe
    register_post_type( 'iibpr_equipe', array(
        'labels' => array(
            'name'               => __( 'Equipe', 'iibpr-theme' ),
            'singular_name'      => __( 'Membro', 'iibpr-theme' ),
            'add_new'            => __( 'Adicionar Membro', 'iibpr-theme' ),
            'add_new_item'       => __( 'Adicionar Novo Membro', 'iibpr-theme' ),
            'edit_item'          => __( 'Editar Membro', 'iibpr-theme' ),
            'all_items'          => __( 'Toda a Equipe', 'iibpr-theme' ),
        ),
        'public'       => false,
        'show_ui'      => true,
        'has_archive'  => false,
        'menu_icon'    => 'dashicons-groups',
        'supports'     => array( 'title', 'editor', 'thumbnail' ),
        'show_in_rest' => true,
    ) );
}
add_action( 'init', 'iibpr_register_post_types' );

/**
 * Register Taxonomies
 */
function iibpr_register_taxonomies() {

    // Modalidade (Online / Presencial / Híbrido)
    register_taxonomy( 'modalidade', array( 'iibpr_curso' ), array(
        'labels' => array(
            'name'          => __( 'Modalidades', 'iibpr-theme' ),
            'singular_name' => __( 'Modalidade', 'iibpr-theme' ),
            'add_new_item'  => __( 'Adicionar Modalidade', 'iibpr-theme' ),
        ),
        'public'       => true,
        'hierarchical' => true,
        'rewrite'      => array( 'slug' => 'modalidade' ),
        'show_in_rest' => true,
    ) );

    // Nível (Pós-Graduação / Extensão / Formação / Livre)
    register_taxonomy( 'nivel', array( 'iibpr_curso' ), array(
        'labels' => array(
            'name'          => __( 'Níveis', 'iibpr-theme' ),
            'singular_name' => __( 'Nível', 'iibpr-theme' ),
            'add_new_item'  => __( 'Adicionar Nível', 'iibpr-theme' ),
        ),
        'public'       => true,
        'hierarchical' => true,
        'rewrite'      => array( 'slug' => 'nivel' ),
        'show_in_rest' => true,
    ) );

    // Área (Educação / Clínica / Saúde)
    register_taxonomy( 'area', array( 'iibpr_curso', 'iibpr_evento' ), array(
        'labels' => array(
            'name'          => __( 'Áreas', 'iibpr-theme' ),
            'singular_name' => __( 'Área', 'iibpr-theme' ),
            'add_new_item'  => __( 'Adicionar Área', 'iibpr-theme' ),
        ),
        'public'       => true,
        'hierarchical' => true,
        'rewrite'      => array( 'slug' => 'area' ),
        'show_in_rest' => true,
    ) );
}
add_action( 'init', 'iibpr_register_taxonomies' );

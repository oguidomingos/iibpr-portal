<?php
/**
 * IIBPR Meta Boxes — Custom fields for CPTs
 */

defined( 'ABSPATH' ) || exit;

/**
 * Register meta boxes
 */
function iibpr_register_meta_boxes() {
    // Curso meta box
    add_meta_box( 'iibpr_curso_details', __( 'Detalhes do Curso', 'iibpr-theme' ), 'iibpr_curso_meta_box_cb', 'iibpr_curso', 'normal', 'high' );

    // Evento meta box
    add_meta_box( 'iibpr_evento_details', __( 'Detalhes do Evento', 'iibpr-theme' ), 'iibpr_evento_meta_box_cb', 'iibpr_evento', 'normal', 'high' );

    // Depoimento meta box
    add_meta_box( 'iibpr_depoimento_details', __( 'Dados do Autor', 'iibpr-theme' ), 'iibpr_depoimento_meta_box_cb', 'iibpr_depoimento', 'normal', 'high' );

    // Equipe meta box
    add_meta_box( 'iibpr_equipe_details', __( 'Dados do Membro', 'iibpr-theme' ), 'iibpr_equipe_meta_box_cb', 'iibpr_equipe', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'iibpr_register_meta_boxes' );

/**
 * Curso meta box callback
 */
function iibpr_curso_meta_box_cb( $post ) {
    wp_nonce_field( 'iibpr_curso_nonce', 'iibpr_curso_nonce_field' );

    $fields = array(
        '_iibpr_course_hours'         => array( 'label' => 'Carga Horária', 'type' => 'text', 'placeholder' => 'Ex: 420h' ),
        '_iibpr_course_price'         => array( 'label' => 'Preço', 'type' => 'text', 'placeholder' => 'Ex: R$ 2.990,00' ),
        '_iibpr_course_cta_url'       => array( 'label' => 'URL de Inscrição', 'type' => 'url', 'placeholder' => 'https://...' ),
        '_iibpr_course_faculty'       => array( 'label' => 'Corpo Docente (um por linha)', 'type' => 'textarea' ),
        '_iibpr_course_learnings'     => array( 'label' => 'O que vai aprender (um item por linha)', 'type' => 'textarea' ),
        '_iibpr_course_audience'      => array( 'label' => 'Público-alvo (um item por linha)', 'type' => 'textarea' ),
        '_iibpr_course_differentials' => array( 'label' => 'Diferenciais (um item por linha)', 'type' => 'textarea' ),
        '_iibpr_course_modules'       => array( 'label' => 'Módulos (formato: Título|Descrição — um por linha)', 'type' => 'textarea' ),
        '_iibpr_course_faq'           => array( 'label' => 'FAQ (formato: Pergunta|Resposta — um por linha)', 'type' => 'textarea' ),
    );

    echo '<table class="form-table">';
    foreach ( $fields as $key => $field ) {
        $value = get_post_meta( $post->ID, $key, true );
        echo '<tr><th><label for="' . esc_attr( $key ) . '">' . esc_html( $field['label'] ) . '</label></th><td>';
        if ( $field['type'] === 'textarea' ) {
            echo '<textarea id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" rows="4" class="large-text">' . esc_textarea( $value ) . '</textarea>';
        } else {
            echo '<input type="' . esc_attr( $field['type'] ) . '" id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" value="' . esc_attr( $value ) . '" class="regular-text" placeholder="' . esc_attr( $field['placeholder'] ?? '' ) . '">';
        }
        echo '</td></tr>';
    }

    // Featured checkbox
    $featured = get_post_meta( $post->ID, '_iibpr_course_featured', true );
    echo '<tr><th><label for="_iibpr_course_featured">Curso em Destaque</label></th><td>';
    echo '<input type="checkbox" id="_iibpr_course_featured" name="_iibpr_course_featured" value="1" ' . checked( $featured, '1', false ) . '>';
    echo ' <span class="description">Exibir na homepage</span></td></tr>';

    echo '</table>';
}

/**
 * Evento meta box callback
 */
function iibpr_evento_meta_box_cb( $post ) {
    wp_nonce_field( 'iibpr_evento_nonce', 'iibpr_evento_nonce_field' );

    $fields = array(
        '_iibpr_event_date_start' => array( 'label' => 'Data de Início', 'type' => 'date' ),
        '_iibpr_event_date_end'   => array( 'label' => 'Data de Término', 'type' => 'date' ),
        '_iibpr_event_location'   => array( 'label' => 'Local', 'type' => 'text', 'placeholder' => 'Ex: Brasília, DF' ),
        '_iibpr_event_modality'   => array( 'label' => 'Modalidade', 'type' => 'text', 'placeholder' => 'Online / Presencial / Híbrido' ),
        '_iibpr_event_cta_url'    => array( 'label' => 'URL de Inscrição', 'type' => 'url', 'placeholder' => 'https://...' ),
        '_iibpr_event_type'       => array( 'label' => 'Tipo do Evento', 'type' => 'text', 'placeholder' => 'Seminário / Workshop / Congresso' ),
        '_iibpr_event_price'      => array( 'label' => 'Preço / Investimento', 'type' => 'text', 'placeholder' => 'A partir de R$148,00' ),
        '_iibpr_event_hours'      => array( 'label' => 'Carga Horária', 'type' => 'text', 'placeholder' => '20 horas' ),
    );

    // Textarea fields rendered separately
    $textarea_fields = array(
        '_iibpr_event_speakers' => array( 'label' => 'Palestrantes (Nome|Cargo — um por linha)' ),
        '_iibpr_event_schedule' => array( 'label' => 'Programação (Horário|Atividade — um por linha)' ),
    );

    echo '<table class="form-table">';
    foreach ( $fields as $key => $field ) {
        $value = get_post_meta( $post->ID, $key, true );
        echo '<tr><th><label for="' . esc_attr( $key ) . '">' . esc_html( $field['label'] ) . '</label></th><td>';
        echo '<input type="' . esc_attr( $field['type'] ) . '" id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" value="' . esc_attr( $value ) . '" class="regular-text" placeholder="' . esc_attr( $field['placeholder'] ?? '' ) . '">';
        echo '</td></tr>';
    }

    foreach ( $textarea_fields as $key => $field ) {
        $value = get_post_meta( $post->ID, $key, true );
        echo '<tr><th><label for="' . esc_attr( $key ) . '">' . esc_html( $field['label'] ) . '</label></th><td>';
        echo '<textarea id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" rows="4" class="large-text">' . esc_textarea( $value ) . '</textarea>';
        echo '</td></tr>';
    }

    $featured = get_post_meta( $post->ID, '_iibpr_event_featured', true );
    echo '<tr><th><label for="_iibpr_event_featured">Evento em Destaque</label></th><td>';
    echo '<input type="checkbox" id="_iibpr_event_featured" name="_iibpr_event_featured" value="1" ' . checked( $featured, '1', false ) . '>';
    echo ' <span class="description">Exibir na homepage</span></td></tr>';

    echo '</table>';
}

/**
 * Depoimento meta box callback
 */
function iibpr_depoimento_meta_box_cb( $post ) {
    wp_nonce_field( 'iibpr_depoimento_nonce', 'iibpr_depoimento_nonce_field' );

    $role     = get_post_meta( $post->ID, '_iibpr_testimonial_author_role', true );
    $location = get_post_meta( $post->ID, '_iibpr_testimonial_author_location', true );

    echo '<table class="form-table">';
    echo '<tr><th><label for="_iibpr_testimonial_author_role">Função / Profissão</label></th><td>';
    echo '<input type="text" id="_iibpr_testimonial_author_role" name="_iibpr_testimonial_author_role" value="' . esc_attr( $role ) . '" class="regular-text" placeholder="Ex: Pedagoga">';
    echo '</td></tr>';
    echo '<tr><th><label for="_iibpr_testimonial_author_location">Localidade</label></th><td>';
    echo '<input type="text" id="_iibpr_testimonial_author_location" name="_iibpr_testimonial_author_location" value="' . esc_attr( $location ) . '" class="regular-text" placeholder="Ex: Brasília, DF">';
    echo '</td></tr>';
    echo '</table>';
}

/**
 * Equipe meta box callback
 */
function iibpr_equipe_meta_box_cb( $post ) {
    wp_nonce_field( 'iibpr_equipe_nonce', 'iibpr_equipe_nonce_field' );

    $role      = get_post_meta( $post->ID, '_iibpr_team_role', true );
    $specialty = get_post_meta( $post->ID, '_iibpr_team_specialty', true );

    echo '<table class="form-table">';
    echo '<tr><th><label for="_iibpr_team_role">Cargo / Título</label></th><td>';
    echo '<input type="text" id="_iibpr_team_role" name="_iibpr_team_role" value="' . esc_attr( $role ) . '" class="regular-text" placeholder="Ex: Fundador e Diretor">';
    echo '</td></tr>';
    echo '<tr><th><label for="_iibpr_team_specialty">Especialidade</label></th><td>';
    echo '<input type="text" id="_iibpr_team_specialty" name="_iibpr_team_specialty" value="' . esc_attr( $specialty ) . '" class="regular-text" placeholder="Ex: Psicomotricidade Relacional">';
    echo '</td></tr>';
    echo '</table>';
}

/**
 * Save meta box data
 */
function iibpr_save_meta_boxes( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    $post_type = get_post_type( $post_id );

    // Curso fields
    if ( $post_type === 'iibpr_curso' && isset( $_POST['iibpr_curso_nonce_field'] ) && wp_verify_nonce( $_POST['iibpr_curso_nonce_field'], 'iibpr_curso_nonce' ) ) {
        $text_fields = array( '_iibpr_course_hours', '_iibpr_course_price', '_iibpr_course_faculty', '_iibpr_course_learnings', '_iibpr_course_audience', '_iibpr_course_differentials', '_iibpr_course_modules', '_iibpr_course_faq' );
        foreach ( $text_fields as $field ) {
            if ( isset( $_POST[ $field ] ) ) {
                update_post_meta( $post_id, $field, sanitize_textarea_field( $_POST[ $field ] ) );
            }
        }
        if ( isset( $_POST['_iibpr_course_cta_url'] ) ) {
            update_post_meta( $post_id, '_iibpr_course_cta_url', esc_url_raw( $_POST['_iibpr_course_cta_url'] ) );
        }
        update_post_meta( $post_id, '_iibpr_course_featured', isset( $_POST['_iibpr_course_featured'] ) ? '1' : '0' );
    }

    // Evento fields
    if ( $post_type === 'iibpr_evento' && isset( $_POST['iibpr_evento_nonce_field'] ) && wp_verify_nonce( $_POST['iibpr_evento_nonce_field'], 'iibpr_evento_nonce' ) ) {
        $text_fields = array( '_iibpr_event_date_start', '_iibpr_event_date_end', '_iibpr_event_location', '_iibpr_event_modality', '_iibpr_event_type', '_iibpr_event_price', '_iibpr_event_hours' );
        foreach ( $text_fields as $field ) {
            if ( isset( $_POST[ $field ] ) ) {
                update_post_meta( $post_id, $field, sanitize_text_field( $_POST[ $field ] ) );
            }
        }
        $textarea_event_fields = array( '_iibpr_event_speakers', '_iibpr_event_schedule' );
        foreach ( $textarea_event_fields as $field ) {
            if ( isset( $_POST[ $field ] ) ) {
                update_post_meta( $post_id, $field, sanitize_textarea_field( $_POST[ $field ] ) );
            }
        }
        if ( isset( $_POST['_iibpr_event_cta_url'] ) ) {
            update_post_meta( $post_id, '_iibpr_event_cta_url', esc_url_raw( $_POST['_iibpr_event_cta_url'] ) );
        }
        update_post_meta( $post_id, '_iibpr_event_featured', isset( $_POST['_iibpr_event_featured'] ) ? '1' : '0' );
    }

    // Depoimento fields
    if ( $post_type === 'iibpr_depoimento' && isset( $_POST['iibpr_depoimento_nonce_field'] ) && wp_verify_nonce( $_POST['iibpr_depoimento_nonce_field'], 'iibpr_depoimento_nonce' ) ) {
        if ( isset( $_POST['_iibpr_testimonial_author_role'] ) ) {
            update_post_meta( $post_id, '_iibpr_testimonial_author_role', sanitize_text_field( $_POST['_iibpr_testimonial_author_role'] ) );
        }
        if ( isset( $_POST['_iibpr_testimonial_author_location'] ) ) {
            update_post_meta( $post_id, '_iibpr_testimonial_author_location', sanitize_text_field( $_POST['_iibpr_testimonial_author_location'] ) );
        }
    }

    // Equipe fields
    if ( $post_type === 'iibpr_equipe' && isset( $_POST['iibpr_equipe_nonce_field'] ) && wp_verify_nonce( $_POST['iibpr_equipe_nonce_field'], 'iibpr_equipe_nonce' ) ) {
        if ( isset( $_POST['_iibpr_team_role'] ) ) {
            update_post_meta( $post_id, '_iibpr_team_role', sanitize_text_field( $_POST['_iibpr_team_role'] ) );
        }
        if ( isset( $_POST['_iibpr_team_specialty'] ) ) {
            update_post_meta( $post_id, '_iibpr_team_specialty', sanitize_text_field( $_POST['_iibpr_team_specialty'] ) );
        }
    }
}
add_action( 'save_post', 'iibpr_save_meta_boxes' );

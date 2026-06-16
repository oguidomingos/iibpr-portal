<?php
/**
 * IIBPR Theme Customizer
 *
 * Registra opções editáveis via Painel > Aparência > Personalizar.
 * Organizado por PÁGINA (não por feature) para UX visual.
 * Settings IDs permanecem inalterados para compatibilidade.
 */

function iibpr_customize_course_choices() {
    $choices = array(
        0 => __( 'Selecione um curso', 'iibpr-theme' ),
    );

    $courses = get_posts( array(
        'post_type'      => 'iibpr_curso',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
    ) );

    foreach ( $courses as $course ) {
        $choices[ $course->ID ] = $course->post_title;
    }

    return $choices;
}

function iibpr_customize_event_choices() {
    $choices = array(
        0 => __( 'Selecione um evento', 'iibpr-theme' ),
    );

    $events = get_posts( array(
        'post_type'      => 'iibpr_evento',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
    ) );

    foreach ( $events as $event ) {
        $choices[ $event->ID ] = $event->post_title;
    }

    return $choices;
}

function iibpr_customize_register( $wp_customize ) {

    /* =====================================================
       PAINEL: GLOBAL (Logo/Cores) — priority 20
       ===================================================== */
    $wp_customize->add_panel( 'iibpr_brand_panel', array(
        'title'    => __( 'Global (Logo/Cores)', 'iibpr-theme' ),
        'priority' => 20,
    ) );
    $wp_customize->add_section( 'iibpr_brand_section', array(
        'title' => 'Cores e Logo', 'panel' => 'iibpr_brand_panel',
    ) );
    $wp_customize->add_setting( 'iibpr_logo', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'iibpr_logo', array(
        'label' => 'Logo do Instituto', 'section' => 'iibpr_brand_section',
    ) ) );
    $wp_customize->add_setting( 'iibpr_color_primary', array( 'default' => '#6CB350', 'sanitize_callback' => 'sanitize_hex_color', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'iibpr_color_primary', array(
        'label' => 'Cor Primária (verde)', 'section' => 'iibpr_brand_section',
    ) ) );
    $wp_customize->add_setting( 'iibpr_color_secondary', array( 'default' => '#A6D16C', 'sanitize_callback' => 'sanitize_hex_color', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'iibpr_color_secondary', array(
        'label' => 'Cor Secundária (verde claro)', 'section' => 'iibpr_brand_section',
    ) ) );

    /* =====================================================
       PAINEL: PÁGINA INICIAL — priority 30
       ===================================================== */
    $wp_customize->add_panel( 'iibpr_home_panel', array(
        'title'    => __( 'Página Inicial', 'iibpr-theme' ),
        'priority' => 30,
    ) );

    // ── Hero Carousel (slides 1-5) ──
    $slide_defaults = array(
        1 => array(
            'image'     => '',
            'tagline'   => 'Onde há movimento, há vida em relação!',
            'title'     => 'Formação em Psicomotricidade Relacional',
            'subtitle'  => 'Especialização de 420h em parceria com o IESB.',
            'desc'      => '',
            'cta_label' => 'Quero Garantir Minha Vaga',
            'cta_url'   => '#inscricao',
            'sec_label' => 'Conheça os Cursos',
            'sec_url'   => '#cursos',
        ),
        2 => array(
            'image'     => '',
            'tagline'   => 'Pós-Graduação IESB',
            'title'     => 'Especialização em Psicomotricidade',
            'subtitle'  => '420h · Modalidade Híbrida · Corpo docente internacional',
            'desc'      => 'Parceria IIBPR + IESB (nota 5 MEC). Reconhecimento nacional e internacional.',
            'cta_label' => 'Fale Conosco',
            'cta_url'   => 'https://wa.me/5561991572149',
            'sec_label' => 'Ver Cursos',
            'sec_url'   => '/cursos',
        ),
        3 => array(
            'image'     => '',
            'tagline'   => 'Curso Básico',
            'title'     => 'Grafomotricidade',
            'subtitle'  => 'Com Dra. Ana Rita Matias · 20h · Análise da escrita e intervenção',
            'desc'      => 'Técnicas de análise grafomotora para profissionais da educação e saúde.',
            'cta_label' => 'Saiba Mais',
            'cta_url'   => 'https://wa.me/5561991572149',
            'sec_label' => 'Ver Cursos',
            'sec_url'   => '/cursos',
        ),
        4 => array(
            'image' => '', 'tagline' => '', 'title' => '', 'subtitle' => '',
            'desc' => '', 'cta_label' => '', 'cta_url' => '', 'sec_label' => '', 'sec_url' => '',
        ),
        5 => array(
            'image' => '', 'tagline' => '', 'title' => '', 'subtitle' => '',
            'desc' => '', 'cta_label' => '', 'cta_url' => '', 'sec_label' => '', 'sec_url' => '',
        ),
    );

    for ( $s = 1; $s <= 5; $s++ ) {
        $d = $slide_defaults[ $s ];
        $wp_customize->add_section( "iibpr_hero_slide_{$s}", array(
            'title' => sprintf( __( 'Hero — Slide %d', 'iibpr-theme' ), $s ),
            'panel' => 'iibpr_home_panel',
            'priority' => 10 + $s,
        ) );

        // Image
        $wp_customize->add_setting( "iibpr_hero_slide_{$s}_image", array( 'default' => $d['image'], 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "iibpr_hero_slide_{$s}_image", array(
            'label'   => __( 'Imagem de Fundo', 'iibpr-theme' ),
            'section' => "iibpr_hero_slide_{$s}",
        ) ) );

        // Text fields — with postMessage for visible text
        $fields = array(
            'tagline'   => 'Tagline / Selo',
            'title'     => 'Título',
            'subtitle'  => 'Subtítulo',
            'desc'      => 'Descrição (opcional)',
            'cta_label' => 'Botão Principal (texto)',
            'cta_url'   => 'Botão Principal (URL)',
            'sec_label' => 'Botão Secundário (texto)',
            'sec_url'   => 'Botão Secundário (URL)',
        );
        $postmsg_fields = array( 'tagline', 'title', 'subtitle', 'desc', 'cta_label', 'sec_label' );
        foreach ( $fields as $fkey => $flabel ) {
            $setting_id = "iibpr_hero_slide_{$s}_{$fkey}";
            $transport  = in_array( $fkey, $postmsg_fields ) ? 'postMessage' : 'refresh';
            $wp_customize->add_setting( $setting_id, array( 'default' => $d[ $fkey ], 'sanitize_callback' => 'wp_kses_post', 'transport' => $transport ) );
            $wp_customize->add_control( $setting_id, array(
                'label'   => $flabel,
                'section' => "iibpr_hero_slide_{$s}",
                'type'    => $fkey === 'desc' ? 'textarea' : 'text',
            ) );
        }
    }

    // Autoplay setting
    $wp_customize->add_section( 'iibpr_hero_settings', array(
        'title' => __( 'Hero — Configurações', 'iibpr-theme' ),
        'panel' => 'iibpr_home_panel',
        'priority' => 20,
    ) );
    $wp_customize->add_setting( 'iibpr_hero_autoplay', array( 'default' => '6000', 'sanitize_callback' => 'absint' ) );
    $wp_customize->add_control( 'iibpr_hero_autoplay', array(
        'label'       => __( 'Autoplay (ms, 0 = desligado)', 'iibpr-theme' ),
        'section'     => 'iibpr_hero_settings',
        'type'        => 'number',
        'input_attrs' => array( 'min' => 0, 'step' => 500 ),
    ) );

    // ── Para Quem (Home) ──
    $wp_customize->add_section( 'iibpr_interest_cards_section', array(
        'title' => __( 'Para Quem', 'iibpr-theme' ),
        'panel' => 'iibpr_home_panel',
        'priority' => 30,
    ) );

    $interest_intro_fields = array(
        'iibpr_interest_label'    => array( 'label' => 'Label da seção', 'default' => 'Para Quem', 'type' => 'text' ),
        'iibpr_interest_title'    => array( 'label' => 'Título da seção', 'default' => 'Para quem é o IIBPR?', 'type' => 'text' ),
        'iibpr_interest_subtitle' => array( 'label' => 'Subtítulo da seção', 'default' => 'Nossos cursos atendem profissionais e estudantes de diversas áreas.', 'type' => 'textarea' ),
    );
    foreach ( $interest_intro_fields as $id => $args ) {
        $wp_customize->add_setting( $id, array( 'default' => $args['default'], 'sanitize_callback' => 'wp_kses_post', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( $id, array( 'label' => $args['label'], 'section' => 'iibpr_interest_cards_section', 'type' => $args['type'] ) );
    }

    $interest_card_defaults = array(
        1 => array( 'title' => 'Educadores', 'desc' => 'Professores e pedagogos que desejam ampliar suas ferramentas de intervenção com o corpo e o movimento.', 'image' => '' ),
        2 => array( 'title' => 'Profissionais de Saúde', 'desc' => 'Psicólogos, fisioterapeutas e terapeutas ocupacionais em busca de abordagens corporais e relacionais.', 'image' => '' ),
        3 => array( 'title' => 'Estudantes', 'desc' => 'Graduandos em psicologia, educação e áreas da saúde que buscam formação complementar.', 'image' => '' ),
        4 => array( 'title' => 'Pesquisadores', 'desc' => 'Acadêmicos interessados em pesquisa científica sobre corpo, movimento e relação.', 'image' => '' ),
    );
    for ( $i = 1; $i <= 4; $i++ ) {
        $wp_customize->add_setting( "iibpr_interest_card_{$i}_title", array( 'default' => $interest_card_defaults[$i]['title'], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "iibpr_interest_card_{$i}_title", array( 'label' => "Card {$i} — Título", 'section' => 'iibpr_interest_cards_section', 'type' => 'text' ) );

        $wp_customize->add_setting( "iibpr_interest_card_{$i}_desc", array( 'default' => $interest_card_defaults[$i]['desc'], 'sanitize_callback' => 'wp_kses_post', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "iibpr_interest_card_{$i}_desc", array( 'label' => "Card {$i} — Descrição", 'section' => 'iibpr_interest_cards_section', 'type' => 'textarea' ) );

        $wp_customize->add_setting( "iibpr_interest_card_{$i}_image", array( 'default' => $interest_card_defaults[$i]['image'], 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "iibpr_interest_card_{$i}_image", array(
            'label'   => "Card {$i} — Imagem",
            'section' => 'iibpr_interest_cards_section',
        ) ) );
    }

    // ── Seção Sobre + Pilares (Home) ──
    $wp_customize->add_section( 'iibpr_about_section', array(
        'title' => __( 'Seção Sobre + Pilares', 'iibpr-theme' ),
        'panel' => 'iibpr_home_panel',
        'priority' => 40,
    ) );

    $about_fields = array(
        'iibpr_about_label' => array( 'label' => 'Label da seção',  'default' => 'Sobre o Instituto', 'type' => 'text' ),
        'iibpr_about_title' => array( 'label' => 'Título da seção', 'default' => 'Saúde Integral e Relacional', 'type' => 'text' ),
        'iibpr_about_text'  => array( 'label' => 'Parágrafo intro',  'default' => 'O Instituto IIBPR tem como missão promover a saúde física, mental e social por meio do desenvolvimento humano integral via psicomotricidade relacional.', 'type' => 'textarea' ),
    );
    foreach ( $about_fields as $id => $args ) {
        $wp_customize->add_setting( $id, array( 'default' => $args['default'], 'sanitize_callback' => 'wp_kses_post', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( $id, array( 'label' => $args['label'], 'section' => 'iibpr_about_section', 'type' => $args['type'] ) );
    }

    $wp_customize->add_setting( 'iibpr_about_image', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'iibpr_about_image', array(
        'label' => 'Imagem da seção Sobre', 'section' => 'iibpr_about_section',
    ) ) );
    for ( $i = 1; $i <= 3; $i++ ) {
        $wp_customize->add_setting( "iibpr_about_mosaic_image_{$i}", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "iibpr_about_mosaic_image_{$i}", array(
            'label'   => "Mosaico — Imagem {$i}",
            'section' => 'iibpr_about_section',
        ) ) );
    }

    // 3 Pilares
    for ( $i = 1; $i <= 3; $i++ ) {
        $defaults = array(
            1 => array( 'title' => 'Psicomotricidade', 'text' => 'Estudo do ser humano através do movimento corporal e das relações internas e externas.', 'icon' => '🧠' ),
            2 => array( 'title' => 'Relacional',        'text' => 'O ser humano como ser de relação que necessita de conexões humanas vitais.',           'icon' => '🤝' ),
            3 => array( 'title' => 'Psicodinâmica',     'text' => 'Conflitos internos enraizados na infância, trabalhados por intervenção psicocorporal.',  'icon' => '🌱' ),
        );
        $wp_customize->add_section( "iibpr_pillar_{$i}", array(
            'title' => "Pilar {$i}", 'panel' => 'iibpr_home_panel', 'priority' => 40 + $i,
        ) );
        $wp_customize->add_setting( "iibpr_pillar_{$i}_icon",  array( 'default' => $defaults[$i]['icon'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "iibpr_pillar_{$i}_icon",  array( 'label' => 'Emoji / ícone', 'section' => "iibpr_pillar_{$i}", 'type' => 'text' ) );
        $wp_customize->add_setting( "iibpr_pillar_{$i}_title", array( 'default' => $defaults[$i]['title'], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "iibpr_pillar_{$i}_title", array( 'label' => 'Título', 'section' => "iibpr_pillar_{$i}", 'type' => 'text' ) );
        $wp_customize->add_setting( "iibpr_pillar_{$i}_text",  array( 'default' => $defaults[$i]['text'], 'sanitize_callback' => 'wp_kses_post', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "iibpr_pillar_{$i}_text",  array( 'label' => 'Descrição', 'section' => "iibpr_pillar_{$i}", 'type' => 'textarea' ) );
        $wp_customize->add_setting( "iibpr_pillar_{$i}_image", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "iibpr_pillar_{$i}_image", array(
            'label'   => 'Imagem do pilar',
            'section' => "iibpr_pillar_{$i}",
        ) ) );
    }

    // ── Cursos em Destaque (Fallback) ──
    $wp_customize->add_section( 'iibpr_courses_intro_section', array(
        'title' => __( 'Cursos em Destaque — Introdução', 'iibpr-theme' ),
        'panel' => 'iibpr_home_panel',
        'priority' => 50,
    ) );
    $courses_intro_fields = array(
        'iibpr_home_courses_label'    => array( 'label' => 'Label da seção', 'default' => 'Formação', 'type' => 'text' ),
        'iibpr_home_courses_title'    => array( 'label' => 'Título da seção', 'default' => 'Cursos em Destaque', 'type' => 'text' ),
        'iibpr_home_courses_subtitle' => array( 'label' => 'Subtítulo da seção', 'default' => 'Formações reconhecidas para profissionais que querem fazer a diferença.', 'type' => 'textarea' ),
    );
    foreach ( $courses_intro_fields as $id => $args ) {
        $wp_customize->add_setting( $id, array( 'default' => $args['default'], 'sanitize_callback' => 'wp_kses_post', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( $id, array( 'label' => $args['label'], 'section' => 'iibpr_courses_intro_section', 'type' => $args['type'] ) );
    }

    $wp_customize->add_section( 'iibpr_courses_selection_section', array(
        'title' => __( 'Cursos em Destaque — Seleção', 'iibpr-theme' ),
        'panel' => 'iibpr_home_panel',
        'description' => __( 'Escolha aqui os cursos reais que devem aparecer na home. Se nada for selecionado, o tema usa a lógica atual automaticamente.', 'iibpr-theme' ),
        'priority' => 51,
    ) );
    $course_choices = iibpr_customize_course_choices();
    for ( $i = 1; $i <= 4; $i++ ) {
        $wp_customize->add_setting( "iibpr_home_featured_course_{$i}", array(
            'default' => 0,
            'sanitize_callback' => 'absint',
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( "iibpr_home_featured_course_{$i}", array(
            'label' => sprintf( __( 'Curso em Destaque %d', 'iibpr-theme' ), $i ),
            'section' => 'iibpr_courses_selection_section',
            'type' => 'select',
            'choices' => $course_choices,
        ) );
    }

    $course_defaults = array(
        1 => array( 'title' => 'Pós-Graduação em Psicomotricidade', 'badge' => 'Destaque', 'hours' => '420h', 'desc' => 'Formação completa teórica e prática em parceria com o IESB.', 'price' => '', 'cta' => 'Saiba Mais', 'url' => '#inscricao' ),
        2 => array( 'title' => 'Seminário Teórico e Didático I',    'badge' => 'Online',    'hours' => '20h',  'desc' => 'Certificado + e-book + textos científicos. Via Zoom.',     'price' => 'R$ 69,90', 'cta' => 'Inscreva-se', 'url' => '#inscricao' ),
        3 => array( 'title' => 'Curso Básico de Grafomotricidade',  'badge' => 'Especialista', 'hours' => '20h', 'desc' => 'Com a Dra. Ana Rita Matias. Análise da escrita.',       'price' => '', 'cta' => 'Saiba Mais', 'url' => '#inscricao' ),
    );

    for ( $i = 1; $i <= 3; $i++ ) {
        $d = $course_defaults[$i];
        $wp_customize->add_section( "iibpr_course_{$i}", array(
            'title' => "Cursos em Destaque — Fallback {$i}", 'panel' => 'iibpr_home_panel',
            'description' => 'Fallback — usado quando não há cursos cadastrados via CPT.',
            'priority' => 60 + $i,
        ) );
        foreach ( array(
            "iibpr_course_{$i}_title" => array( 'label' => 'Título',        'default' => $d['title'], 'type' => 'text' ),
            "iibpr_course_{$i}_badge" => array( 'label' => 'Badge/Etiqueta','default' => $d['badge'], 'type' => 'text' ),
            "iibpr_course_{$i}_hours" => array( 'label' => 'Carga horária', 'default' => $d['hours'], 'type' => 'text' ),
            "iibpr_course_{$i}_desc"  => array( 'label' => 'Descrição',     'default' => $d['desc'],  'type' => 'textarea' ),
            "iibpr_course_{$i}_price" => array( 'label' => 'Preço',         'default' => $d['price'], 'type' => 'text' ),
            "iibpr_course_{$i}_cta"   => array( 'label' => 'Texto do botão','default' => $d['cta'],   'type' => 'text' ),
            "iibpr_course_{$i}_url"   => array( 'label' => 'URL do botão',  'default' => $d['url'],   'type' => 'text' ),
        ) as $setting_id => $setting_args ) {
            $wp_customize->add_setting( $setting_id, array( 'default' => $setting_args['default'], 'sanitize_callback' => 'wp_kses_post' ) );
            $wp_customize->add_control( $setting_id, array( 'label' => $setting_args['label'], 'section' => "iibpr_course_{$i}", 'type' => $setting_args['type'] ) );
        }
        $wp_customize->add_setting( "iibpr_course_{$i}_image", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "iibpr_course_{$i}_image", array(
            'label' => 'Imagem do curso', 'section' => "iibpr_course_{$i}",
        ) ) );
    }

    // ── Eventos em Destaque — Introdução ──
    $wp_customize->add_section( 'iibpr_events_intro_section', array(
        'title' => __( 'Eventos em Destaque — Introdução', 'iibpr-theme' ),
        'panel' => 'iibpr_home_panel',
        'priority' => 70,
    ) );
    $events_intro_fields = array(
        'iibpr_home_events_label'    => array( 'label' => 'Label da seção', 'default' => 'Agenda', 'type' => 'text' ),
        'iibpr_home_events_title'    => array( 'label' => 'Título da seção', 'default' => 'Próximos Eventos', 'type' => 'text' ),
        'iibpr_home_events_subtitle' => array( 'label' => 'Subtítulo da seção', 'default' => 'Seminários, workshops e formações presenciais e online.', 'type' => 'textarea' ),
    );
    foreach ( $events_intro_fields as $id => $args ) {
        $wp_customize->add_setting( $id, array( 'default' => $args['default'], 'sanitize_callback' => 'wp_kses_post', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( $id, array( 'label' => $args['label'], 'section' => 'iibpr_events_intro_section', 'type' => $args['type'] ) );
    }

    // ── Eventos em Destaque — Seleção ──
    $wp_customize->add_section( 'iibpr_events_selection_section', array(
        'title' => __( 'Eventos em Destaque — Seleção', 'iibpr-theme' ),
        'panel' => 'iibpr_home_panel',
        'description' => __( 'Escolha aqui os eventos reais que devem aparecer na home. Se nada for selecionado, o tema usa a lógica atual automaticamente.', 'iibpr-theme' ),
        'priority' => 71,
    ) );
    $event_choices = iibpr_customize_event_choices();
    for ( $i = 1; $i <= 3; $i++ ) {
        $wp_customize->add_setting( "iibpr_home_featured_event_{$i}", array(
            'default' => 0,
            'sanitize_callback' => 'absint',
            'transport' => 'refresh',
        ) );
        $wp_customize->add_control( "iibpr_home_featured_event_{$i}", array(
            'label' => sprintf( __( 'Evento em Destaque %d', 'iibpr-theme' ), $i ),
            'section' => 'iibpr_events_selection_section',
            'type' => 'select',
            'choices' => $event_choices,
        ) );
    }

    // ── Eventos (Fallback) ──
    $event_defaults = array(
        1 => array( 'title' => 'Seminário Teórico e Didático I', 'date' => '22 de Março, 2026 — Online', 'type' => 'Seminário Online', 'desc' => 'Certificado 20h + e-book + textos científicos.', 'url' => '#inscricao' ),
        2 => array( 'title' => 'Formação em Psicomotricidade',   'date' => 'Abril–Dezembro 2026',        'type' => 'Pós-Graduação',     'desc' => 'Formação completa em parceria com o IESB.',     'url' => '#inscricao' ),
        3 => array( 'title' => 'Curso de Grafomotricidade',      'date' => 'Maio 2026 — Online',         'type' => 'Curso Especialista','desc' => 'Análise da escrita e intervenção grafomotora.',  'url' => '#inscricao' ),
    );

    for ( $i = 1; $i <= 3; $i++ ) {
        $d = $event_defaults[$i];
        $wp_customize->add_section( "iibpr_event_{$i}", array(
            'title' => "Eventos em Destaque — Fallback {$i}", 'panel' => 'iibpr_home_panel',
            'description' => 'Fallback — usado quando não há eventos cadastrados via CPT.',
            'priority' => 80 + $i,
        ) );
        foreach ( array(
            "iibpr_event_{$i}_title" => array( 'label' => 'Título',          'default' => $d['title'], 'type' => 'text' ),
            "iibpr_event_{$i}_date"  => array( 'label' => 'Data / Modalidade','default' => $d['date'],  'type' => 'text' ),
            "iibpr_event_{$i}_type"  => array( 'label' => 'Tipo (badge)',     'default' => $d['type'],  'type' => 'text' ),
            "iibpr_event_{$i}_desc"  => array( 'label' => 'Descrição',       'default' => $d['desc'],  'type' => 'textarea' ),
            "iibpr_event_{$i}_url"   => array( 'label' => 'URL',             'default' => $d['url'],   'type' => 'text' ),
        ) as $sid => $sargs ) {
            $wp_customize->add_setting( $sid, array( 'default' => $sargs['default'], 'sanitize_callback' => 'wp_kses_post' ) );
            $wp_customize->add_control( $sid, array( 'label' => $sargs['label'], 'section' => "iibpr_event_{$i}", 'type' => $sargs['type'] ) );
        }
    }

    // ── Depoimentos (Fallback) ──
    $testimonial_defaults = array(
        1 => array( 'quote' => 'Uma jornada de descoberta da essência e das origens.', 'author' => 'Leilah' ),
        2 => array( 'quote' => 'Amor e cuidado genuínos, compreensão profunda do corpo.', 'author' => 'Léo' ),
        3 => array( 'quote' => 'Silenciar a mente e perceber as emoções através do corpo.', 'author' => 'Luciana' ),
        4 => array( 'quote' => 'Uma reconstrução de si mesmo através do brincar.', 'author' => 'Juliana' ),
    );

    for ( $i = 1; $i <= 4; $i++ ) {
        $wp_customize->add_section( "iibpr_testimonial_{$i}", array(
            'title' => "Depoimento {$i}", 'panel' => 'iibpr_home_panel',
        ) );
        $wp_customize->add_setting( "iibpr_testimonial_{$i}_quote",  array( 'default' => $testimonial_defaults[$i]['quote'], 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "iibpr_testimonial_{$i}_quote",  array( 'label' => 'Depoimento', 'section' => "iibpr_testimonial_{$i}", 'type' => 'textarea' ) );
        $wp_customize->add_setting( "iibpr_testimonial_{$i}_author", array( 'default' => $testimonial_defaults[$i]['author'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "iibpr_testimonial_{$i}_author", array( 'label' => 'Autor', 'section' => "iibpr_testimonial_{$i}", 'type' => 'text' ) );
    }

    // ── Pesquisa — Números ──
    $wp_customize->add_section( 'iibpr_research_section', array(
        'title' => __( 'Pesquisa — Números', 'iibpr-theme' ),
        'panel' => 'iibpr_home_panel',
    ) );
    $stats = array(
        'iibpr_stats_articles'   => array( 'label' => 'Artigos publicados', 'default' => '120' ),
        'iibpr_stats_books'      => array( 'label' => 'Livros e capítulos', 'default' => '35' ),
        'iibpr_stats_congresses' => array( 'label' => 'Congressos e eventos', 'default' => '50' ),
    );
    foreach ( $stats as $id => $args ) {
        $wp_customize->add_setting( $id, array( 'default' => $args['default'], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( $id, array( 'label' => $args['label'], 'section' => 'iibpr_research_section', 'type' => 'number' ) );
    }

    // ── CTA / Inscrição ──
    $wp_customize->add_section( 'iibpr_cta_section', array(
        'title' => 'CTA / Inscrição', 'panel' => 'iibpr_home_panel',
    ) );
    $cta_fields = array(
        'iibpr_cta_title'     => array( 'label' => 'Título',        'default' => 'Eleve sua prática profissional', 'type' => 'text', 'transport' => 'postMessage' ),
        'iibpr_cta_subtitle'  => array( 'label' => 'Subtítulo',     'default' => 'Faça parte de uma comunidade internacional de profissionais que transformam vidas.', 'type' => 'textarea', 'transport' => 'postMessage' ),
        'iibpr_cta_btn_label' => array( 'label' => 'Texto Botão 1', 'default' => 'Inscreva-se Agora', 'type' => 'text', 'transport' => 'postMessage' ),
        'iibpr_cta_btn_url'   => array( 'label' => 'URL Botão 1',   'default' => 'https://wa.me/5561991572149', 'type' => 'text', 'transport' => 'refresh' ),
        'iibpr_cta_btn2_label'=> array( 'label' => 'Texto Botão 2', 'default' => 'Fale Conosco', 'type' => 'text', 'transport' => 'postMessage' ),
        'iibpr_cta_btn2_url'  => array( 'label' => 'URL Botão 2',   'default' => 'mailto:contato@institutoibpr.org.br', 'type' => 'text', 'transport' => 'refresh' ),
    );
    foreach ( $cta_fields as $id => $args ) {
        $wp_customize->add_setting( $id, array( 'default' => $args['default'], 'sanitize_callback' => 'wp_kses_post', 'transport' => $args['transport'] ) );
        $wp_customize->add_control( $id, array( 'label' => $args['label'], 'section' => 'iibpr_cta_section', 'type' => $args['type'] ) );
    }

    /* =====================================================
       PAINEL: PÁGINA SOBRE — priority 35
       ===================================================== */
    $wp_customize->add_panel( 'iibpr_sobre_panel', array(
        'title'    => __( 'Página — Sobre', 'iibpr-theme' ),
        'priority' => 35,
    ) );

    // Hero
    $wp_customize->add_section( 'iibpr_sobre_hero_section', array( 'title' => 'Hero', 'panel' => 'iibpr_sobre_panel' ) );
    $wp_customize->add_setting( 'iibpr_sobre_hero_title',    array( 'default' => 'Quem Somos', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_sobre_hero_title',    array( 'label' => 'Título', 'section' => 'iibpr_sobre_hero_section', 'type' => 'text' ) );
    $wp_customize->add_setting( 'iibpr_sobre_hero_subtitle', array( 'default' => 'Nossa história, missão e as pessoas por trás do IIBPR.', 'sanitize_callback' => 'wp_kses_post', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_sobre_hero_subtitle', array( 'label' => 'Subtítulo', 'section' => 'iibpr_sobre_hero_section', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'iibpr_sobre_hero_bg',       array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'iibpr_sobre_hero_bg', array( 'label' => 'Imagem de Fundo', 'section' => 'iibpr_sobre_hero_section' ) ) );

    // História
    $wp_customize->add_section( 'iibpr_sobre_hist_section', array( 'title' => 'Seção — História', 'panel' => 'iibpr_sobre_panel' ) );
    foreach ( array(
        'iibpr_sobre_hist_label'  => array( 'label' => 'Label',     'default' => 'Nossa História', 'type' => 'text' ),
        'iibpr_sobre_hist_title'  => array( 'label' => 'Título',    'default' => 'De Brasília para o Mundo', 'type' => 'text' ),
        'iibpr_sobre_hist_text_1' => array( 'label' => 'Parágrafo 1', 'default' => 'O IIBPR nasce da necessidade de atender à grande demanda na área da Psicomotricidade no Brasil, principalmente no Centro Oeste. Ele surge também da história inspiradora de grande valor que a formação pessoal teve na vida dos sócios por meio do Istituto Italiano di Psicologia della Relazione (IIPR — Itália) e do Instituto Viver de Psicomotricidade — MG.', 'type' => 'textarea' ),
        'iibpr_sobre_hist_text_2' => array( 'label' => 'Parágrafo 2', 'default' => 'O Instituto dá vida tanto à entrega de atendimentos diversificados nas áreas da Psicologia e da Psicomotricidade, quanto à formação nas áreas.', 'type' => 'textarea' ),
    ) as $sid => $sa ) {
        $wp_customize->add_setting( $sid, array( 'default' => $sa['default'], 'sanitize_callback' => 'wp_kses_post', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( $sid, array( 'label' => $sa['label'], 'section' => 'iibpr_sobre_hist_section', 'type' => $sa['type'] ) );
    }
    $wp_customize->add_setting( 'iibpr_sobre_hist_image', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'iibpr_sobre_hist_image', array( 'label' => 'Imagem', 'section' => 'iibpr_sobre_hist_section' ) ) );

    // O Que Fazemos
    $wp_customize->add_section( 'iibpr_sobre_wwd_section', array( 'title' => 'Seção — O Que Fazemos', 'panel' => 'iibpr_sobre_panel' ) );
    foreach ( array(
        'iibpr_sobre_wwd_label'  => array( 'label' => 'Label',       'default' => 'O Que Fazemos', 'type' => 'text' ),
        'iibpr_sobre_wwd_title'  => array( 'label' => 'Título',      'default' => 'Atendimento e Formação', 'type' => 'text' ),
        'iibpr_sobre_wwd_text_1' => array( 'label' => 'Parágrafo 1', 'default' => 'Somos uma instituição voltada tanto para atendimentos em psicoterapia e em psicomotricidade, quanto para a formação especializada de profissionais em Psicomotricidade Relacional Psicodinâmica.', 'type' => 'textarea' ),
        'iibpr_sobre_wwd_text_2' => array( 'label' => 'Parágrafo 2', 'default' => 'No atendimento psicoterapêutico, o ambiente de acolhimento e a crença que cada pessoa possui a capacidade para construir suas próprias alternativas para uma vida mais saudável, pautam nossa atuação.', 'type' => 'textarea' ),
        'iibpr_sobre_wwd_text_3' => array( 'label' => 'Parágrafo 3', 'default' => 'Nossa intervenção psicomotora tem impactado positivamente a vida das pessoas. Contempla todas as fases do desenvolvimento humano, do bebê, crianças, adolescência, adultos e idosos.', 'type' => 'textarea' ),
    ) as $sid => $sa ) {
        $wp_customize->add_setting( $sid, array( 'default' => $sa['default'], 'sanitize_callback' => 'wp_kses_post', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( $sid, array( 'label' => $sa['label'], 'section' => 'iibpr_sobre_wwd_section', 'type' => $sa['type'] ) );
    }
    for ( $i = 1; $i <= 4; $i++ ) {
        $wp_customize->add_setting( "iibpr_sobre_wwd_image_{$i}", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "iibpr_sobre_wwd_image_{$i}", array( 'label' => "Imagem {$i}", 'section' => 'iibpr_sobre_wwd_section' ) ) );
    }

    // Missão / Visão / Valores
    $wp_customize->add_section( 'iibpr_sobre_mvv_section', array( 'title' => 'Seção — MVV', 'panel' => 'iibpr_sobre_panel' ) );
    $wp_customize->add_setting( 'iibpr_sobre_mvv_label',   array( 'default' => 'Propósito', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_sobre_mvv_label',   array( 'label' => 'Label', 'section' => 'iibpr_sobre_mvv_section', 'type' => 'text' ) );
    $wp_customize->add_setting( 'iibpr_sobre_mvv_heading', array( 'default' => 'Missão, Visão e Valores', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_sobre_mvv_heading', array( 'label' => 'Título', 'section' => 'iibpr_sobre_mvv_section', 'type' => 'text' ) );
    $mvv_defaults = array(
        1 => array( 'title' => 'Missão', 'text' => 'Desenvolver pessoas autoconscientes capazes de promover o bem social através da saúde gerada pelo autoconhecimento, pela autorregulação e pela integração Psicocorporal.' ),
        2 => array( 'title' => 'Visão',  'text' => 'Ser referência em Psicomotricidade no Centro-Oeste do Brasil, integrando elementos da cultura brasileira com os saberes globais na perspectiva da intervenção Psicocorporal.' ),
        3 => array( 'title' => 'Valores','text' => 'Respeito · Movimento · Consciência · Amor · Ludicidade · Alegria · Visão Holística · Autoconhecimento · Autorregulação · Intercâmbio · Relação' ),
    );
    for ( $i = 1; $i <= 3; $i++ ) {
        $wp_customize->add_setting( "iibpr_sobre_mvv_{$i}_title", array( 'default' => $mvv_defaults[$i]['title'], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "iibpr_sobre_mvv_{$i}_title", array( 'label' => "Card {$i} — Título", 'section' => 'iibpr_sobre_mvv_section', 'type' => 'text' ) );
        $wp_customize->add_setting( "iibpr_sobre_mvv_{$i}_text",  array( 'default' => $mvv_defaults[$i]['text'], 'sanitize_callback' => 'wp_kses_post', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "iibpr_sobre_mvv_{$i}_text",  array( 'label' => "Card {$i} — Texto", 'section' => 'iibpr_sobre_mvv_section', 'type' => 'textarea' ) );
    }

    // Stats da página Sobre
    $wp_customize->add_section( 'iibpr_sobre_stats_section', array( 'title' => 'Seção — Estatísticas', 'panel' => 'iibpr_sobre_panel' ) );
    $wp_customize->add_setting( 'iibpr_sobre_stats_bg', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'iibpr_sobre_stats_bg', array( 'label' => 'Imagem de Fundo', 'section' => 'iibpr_sobre_stats_section' ) ) );
    $sobre_stats_defaults = array(
        1 => array( 'number' => '20+',   'label' => 'Anos de experiência' ),
        2 => array( 'number' => '1500+', 'label' => 'Alunos formados' ),
        3 => array( 'number' => '5',     'label' => 'Países' ),
        4 => array( 'number' => '420h',  'label' => 'Pós-graduação' ),
    );
    for ( $i = 1; $i <= 4; $i++ ) {
        $wp_customize->add_setting( "iibpr_sobre_stat_{$i}_number", array( 'default' => $sobre_stats_defaults[$i]['number'], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "iibpr_sobre_stat_{$i}_number", array( 'label' => "Stat {$i} — Número", 'section' => 'iibpr_sobre_stats_section', 'type' => 'text' ) );
        $wp_customize->add_setting( "iibpr_sobre_stat_{$i}_label",  array( 'default' => $sobre_stats_defaults[$i]['label'], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "iibpr_sobre_stat_{$i}_label",  array( 'label' => "Stat {$i} — Label", 'section' => 'iibpr_sobre_stats_section', 'type' => 'text' ) );
    }

    // CTA da página Sobre
    $wp_customize->add_section( 'iibpr_sobre_cta_section', array( 'title' => 'Seção — CTA', 'panel' => 'iibpr_sobre_panel' ) );
    foreach ( array(
        'iibpr_sobre_cta_title'  => array( 'label' => 'Título', 'default' => 'Faça Parte da Nossa História', 'type' => 'text' ),
        'iibpr_sobre_cta_text'   => array( 'label' => 'Texto',  'default' => 'Conheça nossos cursos e formações em Psicomotricidade Relacional Psicodinâmica.', 'type' => 'textarea' ),
        'iibpr_sobre_cta_wa_url' => array( 'label' => 'URL WhatsApp', 'default' => 'https://wa.me/5561991572149', 'type' => 'text' ),
    ) as $sid => $sa ) {
        $transport = ( $sid === 'iibpr_sobre_cta_wa_url' ) ? 'refresh' : 'postMessage';
        $wp_customize->add_setting( $sid, array( 'default' => $sa['default'], 'sanitize_callback' => 'wp_kses_post', 'transport' => $transport ) );
        $wp_customize->add_control( $sid, array( 'label' => $sa['label'], 'section' => 'iibpr_sobre_cta_section', 'type' => $sa['type'] ) );
    }

    /* =====================================================
       PAINEL: PÁGINA PSICOMOTRICIDADE — priority 40
       ===================================================== */
    $wp_customize->add_panel( 'iibpr_prp_panel', array(
        'title'    => __( 'Página — Psicomotricidade', 'iibpr-theme' ),
        'priority' => 40,
    ) );

    // Hero
    $wp_customize->add_section( 'iibpr_prp_hero_section', array( 'title' => 'Hero', 'panel' => 'iibpr_prp_panel' ) );
    $wp_customize->add_setting( 'iibpr_prp_hero_title',    array( 'default' => 'O que é Psicomotricidade Relacional Psicodinâmica?', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_prp_hero_title',    array( 'label' => 'Título', 'section' => 'iibpr_prp_hero_section', 'type' => 'text' ) );
    $wp_customize->add_setting( 'iibpr_prp_hero_subtitle', array( 'default' => 'O estudo do Ser Humano através do seu corpo em movimento e em relação ao seu mundo interno e externo.', 'sanitize_callback' => 'wp_kses_post', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_prp_hero_subtitle', array( 'label' => 'Subtítulo', 'section' => 'iibpr_prp_hero_section', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'iibpr_prp_hero_bg',       array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'iibpr_prp_hero_bg', array( 'label' => 'Imagem de Fundo', 'section' => 'iibpr_prp_hero_section' ) ) );

    // Conceito
    $wp_customize->add_section( 'iibpr_prp_conceito_section', array( 'title' => 'Seção — Conceito', 'panel' => 'iibpr_prp_panel' ) );
    foreach ( array(
        'iibpr_prp_conceito_label'  => array( 'label' => 'Label',       'default' => 'Conceito', 'type' => 'text' ),
        'iibpr_prp_conceito_title'  => array( 'label' => 'Título',      'default' => 'Entendendo a PRP', 'type' => 'text' ),
        'iibpr_prp_conceito_text_1' => array( 'label' => 'Parágrafo 1', 'default' => 'A Psicomotricidade Relacional Psicodinâmica é uma abordagem que proporciona uma visão global do ser humano, integrando corpo, mente, emoções e relações sociais.', 'type' => 'textarea' ),
        'iibpr_prp_conceito_text_2' => array( 'label' => 'Parágrafo 2', 'default' => 'Fundamentada na metodologia do Prof. Dr. Mauro Vecchiato e do Istituto Italiano di Psicologia della Relazione (IIPR), a abordagem utiliza o jogo espontâneo e a expressividade corporal como ferramentas de intervenção.', 'type' => 'textarea' ),
        'iibpr_prp_conceito_text_3' => array( 'label' => 'Parágrafo 3', 'default' => 'A PRP oferece bem-estar, expressão genuína, autodescoberta, desbloqueio emocional e desenvolvimento integrado.', 'type' => 'textarea' ),
    ) as $sid => $sa ) {
        $wp_customize->add_setting( $sid, array( 'default' => $sa['default'], 'sanitize_callback' => 'wp_kses_post', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( $sid, array( 'label' => $sa['label'], 'section' => 'iibpr_prp_conceito_section', 'type' => $sa['type'] ) );
    }
    $wp_customize->add_setting( 'iibpr_prp_conceito_image', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'iibpr_prp_conceito_image', array( 'label' => 'Imagem', 'section' => 'iibpr_prp_conceito_section' ) ) );

    // Três Pilares PRP
    $wp_customize->add_section( 'iibpr_prp_pillars_section', array( 'title' => 'Seção — Três Pilares', 'panel' => 'iibpr_prp_panel' ) );
    $wp_customize->add_setting( 'iibpr_prp_pillars_label', array( 'default' => 'Fundamentos', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_prp_pillars_label', array( 'label' => 'Label', 'section' => 'iibpr_prp_pillars_section', 'type' => 'text' ) );
    $wp_customize->add_setting( 'iibpr_prp_pillars_title', array( 'default' => 'Os Três Pilares', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_prp_pillars_title', array( 'label' => 'Título', 'section' => 'iibpr_prp_pillars_section', 'type' => 'text' ) );
    $prp_pillar_defaults = array(
        1 => array( 'title' => 'Psicomotricidade', 'text' => 'O estudo do Ser Humano através do seu corpo em movimento e em relação ao seu mundo interno e externo. — Associação Brasileira de Psicomotricidade (ABP)' ),
        2 => array( 'title' => 'Relacional',        'text' => 'Somos seres relacionais e as relações humanas são vitais para nosso ajustamento socioemocional e capacidade de autorregulação.' ),
        3 => array( 'title' => 'Psicodinâmica',     'text' => 'Nossos conflitos internos e inconscientes, geralmente estão ligados à nossa infância e podem ser elaborados, de maneira poderosa, por meio da intervenção psicocorporal.' ),
    );
    for ( $i = 1; $i <= 3; $i++ ) {
        $wp_customize->add_setting( "iibpr_prp_pillar_{$i}_title", array( 'default' => $prp_pillar_defaults[$i]['title'], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "iibpr_prp_pillar_{$i}_title", array( 'label' => "Pilar {$i} — Título", 'section' => 'iibpr_prp_pillars_section', 'type' => 'text' ) );
        $wp_customize->add_setting( "iibpr_prp_pillar_{$i}_text",  array( 'default' => $prp_pillar_defaults[$i]['text'], 'sanitize_callback' => 'wp_kses_post', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "iibpr_prp_pillar_{$i}_text",  array( 'label' => "Pilar {$i} — Texto", 'section' => 'iibpr_prp_pillars_section', 'type' => 'textarea' ) );
        $wp_customize->add_setting( "iibpr_prp_pillar_{$i}_image", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "iibpr_prp_pillar_{$i}_image", array( 'label' => "Pilar {$i} — Imagem", 'section' => 'iibpr_prp_pillars_section' ) ) );
    }

    // Mauro card
    $wp_customize->add_section( 'iibpr_prp_mauro_section', array( 'title' => 'Seção — Bases Científicas / Mauro', 'panel' => 'iibpr_prp_panel' ) );
    $wp_customize->add_setting( 'iibpr_prp_mauro_section_label', array( 'default' => 'Bases Científicas', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_prp_mauro_section_label', array( 'label' => 'Label', 'section' => 'iibpr_prp_mauro_section', 'type' => 'text' ) );
    $wp_customize->add_setting( 'iibpr_prp_mauro_section_title', array( 'default' => 'Metodologia Prof. Dr. Mauro Vecchiato', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_prp_mauro_section_title', array( 'label' => 'Título', 'section' => 'iibpr_prp_mauro_section', 'type' => 'text' ) );

    // Áreas de Atuação
    $wp_customize->add_section( 'iibpr_prp_areas_section', array( 'title' => 'Seção — Áreas de Atuação', 'panel' => 'iibpr_prp_panel' ) );
    $wp_customize->add_setting( 'iibpr_prp_areas_label', array( 'default' => 'Áreas de Atuação', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_prp_areas_label', array( 'label' => 'Label', 'section' => 'iibpr_prp_areas_section', 'type' => 'text' ) );
    $wp_customize->add_setting( 'iibpr_prp_areas_title', array( 'default' => 'Onde Atua a PRP', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_prp_areas_title', array( 'label' => 'Título', 'section' => 'iibpr_prp_areas_section', 'type' => 'text' ) );
    $prp_area_defaults = array(
        1 => array( 'title' => 'Educação',  'text' => 'Escolas, creches e projetos socioeducativos. Desenvolvimento de habilidades socioemocionais e psicomotoras.' ),
        2 => array( 'title' => 'Prevenção', 'text' => 'Estimulação precoce, acompanhamento do desenvolvimento infantil e intervenção preventiva.' ),
        3 => array( 'title' => 'Terapia',   'text' => 'Intervenção clínica com crianças com problemas do desenvolvimento e neurodesenvolvimento, questões comportamentais e emocionais.' ),
    );
    for ( $i = 1; $i <= 3; $i++ ) {
        $wp_customize->add_setting( "iibpr_prp_area_{$i}_title", array( 'default' => $prp_area_defaults[$i]['title'], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "iibpr_prp_area_{$i}_title", array( 'label' => "Área {$i} — Título", 'section' => 'iibpr_prp_areas_section', 'type' => 'text' ) );
        $wp_customize->add_setting( "iibpr_prp_area_{$i}_text",  array( 'default' => $prp_area_defaults[$i]['text'], 'sanitize_callback' => 'wp_kses_post', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "iibpr_prp_area_{$i}_text",  array( 'label' => "Área {$i} — Texto", 'section' => 'iibpr_prp_areas_section', 'type' => 'textarea' ) );
        $wp_customize->add_setting( "iibpr_prp_area_{$i}_image", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "iibpr_prp_area_{$i}_image", array( 'label' => "Área {$i} — Imagem", 'section' => 'iibpr_prp_areas_section' ) ) );
    }

    // Saúde e Bem-Estar
    $wp_customize->add_section( 'iibpr_prp_health_section', array( 'title' => 'Seção — Saúde e Bem-Estar', 'panel' => 'iibpr_prp_panel' ) );
    foreach ( array(
        'iibpr_prp_health_label' => array( 'label' => 'Label', 'default' => 'Saúde e Bem-Estar', 'type' => 'text' ),
        'iibpr_prp_health_title' => array( 'label' => 'Título', 'default' => 'Viva o bem-estar e potencialize-se', 'type' => 'text' ),
        'iibpr_prp_health_intro' => array( 'label' => 'Intro', 'default' => 'A abordagem Psicomotora Relacional Psicodinâmica proporciona uma visão global do ser humano. Bem-estar, expressão genuína, autodescoberta, desbloqueio emocional e desenvolvimento integrado.', 'type' => 'textarea' ),
    ) as $sid => $sa ) {
        $wp_customize->add_setting( $sid, array( 'default' => $sa['default'], 'sanitize_callback' => 'wp_kses_post', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( $sid, array( 'label' => $sa['label'], 'section' => 'iibpr_prp_health_section', 'type' => $sa['type'] ) );
    }
    $prp_benefit_defaults = array(
        1 => array( 'title' => 'Valorização das Potencialidades', 'text' => 'Foco nos aspectos positivos para construir/reconstruir uma autoimagem saudável e superar déficits.' ),
        2 => array( 'title' => 'Autoconhecimento',                 'text' => 'Expressão de sentimentos inconscientes por meio das imagens mentais inscritas no corpo.' ),
        3 => array( 'title' => 'Progresso Relacional e Comunicativo', 'text' => 'Superação de dificuldades de interação em ambiente acolhedor.' ),
        4 => array( 'title' => 'Vivência Corporal',                 'text' => 'Novas experiências que estimulam a espontaneidade e melhoram o desempenho psicomotor.' ),
    );
    for ( $i = 1; $i <= 4; $i++ ) {
        $wp_customize->add_setting( "iibpr_prp_benefit_{$i}_title", array( 'default' => $prp_benefit_defaults[$i]['title'], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "iibpr_prp_benefit_{$i}_title", array( 'label' => "Benefício {$i} — Título", 'section' => 'iibpr_prp_health_section', 'type' => 'text' ) );
        $wp_customize->add_setting( "iibpr_prp_benefit_{$i}_text",  array( 'default' => $prp_benefit_defaults[$i]['text'], 'sanitize_callback' => 'wp_kses_post', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( "iibpr_prp_benefit_{$i}_text",  array( 'label' => "Benefício {$i} — Texto", 'section' => 'iibpr_prp_health_section', 'type' => 'textarea' ) );
    }

    // Estrutura da Formação
    $wp_customize->add_section( 'iibpr_prp_struct_section', array( 'title' => 'Seção — Estrutura da Formação', 'panel' => 'iibpr_prp_panel' ) );
    $wp_customize->add_setting( 'iibpr_prp_struct_label', array( 'default' => 'Estrutura', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_prp_struct_label', array( 'label' => 'Label', 'section' => 'iibpr_prp_struct_section', 'type' => 'text' ) );
    $wp_customize->add_setting( 'iibpr_prp_struct_title', array( 'default' => 'Estrutura da Formação — Ano Propedêutico', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_prp_struct_title', array( 'label' => 'Título', 'section' => 'iibpr_prp_struct_section', 'type' => 'text' ) );
    $prp_module_defaults = array(
        'A' => array( 'title' => 'Curso Vivencial', 'items' => "Módulo I — 40 horas\nMódulo II — 40 horas\nMódulo III — 40 horas\nMódulo IV — 40 horas" ),
        'B' => array( 'title' => 'Seminário Semiótico', 'items' => "O Jogo espontâneo e a Relação Psicomotora Complexa 1\nA Relação Psicomotora Complexa 2\nO Jogo Psicomotor e suas tipologias" ),
        'C' => array( 'title' => 'Seminário Teórico', 'items' => "Psicomotricidade e relacionamento psicomotor, conceitos teóricos básicos e sua aplicação no campo educacional, preventivo e terapêutico\nPsicomotricidade e desenvolvimento psicomotor da criança: normalidade e patologia, abordagem diferente e aplicação prática" ),
    );
    foreach ( $prp_module_defaults as $mod_key => $mod_d ) {
        $wp_customize->add_setting( "iibpr_prp_module_{$mod_key}_title", array( 'default' => $mod_d['title'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "iibpr_prp_module_{$mod_key}_title", array( 'label' => "Módulo {$mod_key} — Título", 'section' => 'iibpr_prp_struct_section', 'type' => 'text' ) );
        $wp_customize->add_setting( "iibpr_prp_module_{$mod_key}_items", array( 'default' => $mod_d['items'], 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "iibpr_prp_module_{$mod_key}_items", array( 'label' => "Módulo {$mod_key} — Itens (um por linha)", 'section' => 'iibpr_prp_struct_section', 'type' => 'textarea' ) );
    }

    // Profissões
    $wp_customize->add_section( 'iibpr_prp_professions_section', array( 'title' => 'Seção — Profissões', 'panel' => 'iibpr_prp_panel' ) );
    $wp_customize->add_setting( 'iibpr_prp_prof_label', array( 'default' => 'Profissionais', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_prp_prof_label', array( 'label' => 'Label', 'section' => 'iibpr_prp_professions_section', 'type' => 'text' ) );
    $wp_customize->add_setting( 'iibpr_prp_prof_title', array( 'default' => 'Para Quais Profissões', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_prp_prof_title', array( 'label' => 'Título', 'section' => 'iibpr_prp_professions_section', 'type' => 'text' ) );
    $wp_customize->add_setting( 'iibpr_prp_professions', array(
        'default'           => "Pedagogos\nPsicólogos\nFisioterapeutas\nTerapeutas Ocupacionais\nFonoaudiólogos\nEducadores Físicos\nMédicos\nEnfermeiros\nAssistentes Sociais\nPsicopedagogos",
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'iibpr_prp_professions', array( 'label' => 'Profissões (uma por linha)', 'section' => 'iibpr_prp_professions_section', 'type' => 'textarea' ) );

    // CTA da PRP
    $wp_customize->add_section( 'iibpr_prp_cta_section', array( 'title' => 'Seção — CTA', 'panel' => 'iibpr_prp_panel' ) );
    foreach ( array(
        'iibpr_prp_cta_title'      => array( 'label' => 'Título',              'default' => 'Inicie sua Formação em PRP', 'type' => 'text', 'transport' => 'postMessage' ),
        'iibpr_prp_cta_text'       => array( 'label' => 'Texto',               'default' => 'Conheça nossos cursos e formações em Psicomotricidade Relacional Psicodinâmica.', 'type' => 'textarea', 'transport' => 'postMessage' ),
        'iibpr_prp_cta_btn1_label' => array( 'label' => 'Botão 1 — Texto',    'default' => 'Ver Cursos', 'type' => 'text', 'transport' => 'postMessage' ),
        'iibpr_prp_cta_btn2_url'   => array( 'label' => 'Botão 2 — URL (WA)', 'default' => 'https://wa.me/5561991572149', 'type' => 'text', 'transport' => 'refresh' ),
    ) as $sid => $sa ) {
        $wp_customize->add_setting( $sid, array( 'default' => $sa['default'], 'sanitize_callback' => 'wp_kses_post', 'transport' => $sa['transport'] ) );
        $wp_customize->add_control( $sid, array( 'label' => $sa['label'], 'section' => 'iibpr_prp_cta_section', 'type' => $sa['type'] ) );
    }

    /* =====================================================
       PAINEL: PÁGINA CURSOS — priority 45
       ===================================================== */
    $wp_customize->add_panel( 'iibpr_cursos_page_panel', array(
        'title'    => __( 'Página — Cursos', 'iibpr-theme' ),
        'priority' => 45,
    ) );
    $wp_customize->add_section( 'iibpr_cursos_hero_section', array( 'title' => 'Hero', 'panel' => 'iibpr_cursos_page_panel' ) );
    $wp_customize->add_setting( 'iibpr_cursos_hero_title', array( 'default' => 'Nossos Cursos', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_cursos_hero_title', array( 'label' => 'Título', 'section' => 'iibpr_cursos_hero_section', 'type' => 'text' ) );
    $wp_customize->add_setting( 'iibpr_cursos_hero_subtitle', array( 'default' => 'Formações reconhecidas em psicomotricidade relacional para profissionais de todas as áreas.', 'sanitize_callback' => 'wp_kses_post', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_cursos_hero_subtitle', array( 'label' => 'Subtítulo', 'section' => 'iibpr_cursos_hero_section', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'iibpr_cursos_hero_bg', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'iibpr_cursos_hero_bg', array( 'label' => 'Imagem de Fundo', 'section' => 'iibpr_cursos_hero_section' ) ) );
    // Archive hero
    $wp_customize->add_section( 'iibpr_archive_curso_hero_section', array( 'title' => 'Hero — Arquivo de Cursos', 'panel' => 'iibpr_cursos_page_panel' ) );
    $wp_customize->add_setting( 'iibpr_archive_curso_hero_title', array( 'default' => 'Nossos Cursos', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'iibpr_archive_curso_hero_title', array( 'label' => 'Título', 'section' => 'iibpr_archive_curso_hero_section', 'type' => 'text' ) );
    $wp_customize->add_setting( 'iibpr_archive_curso_hero_subtitle', array( 'default' => 'Todas as formações disponíveis em psicomotricidade relacional.', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'iibpr_archive_curso_hero_subtitle', array( 'label' => 'Subtítulo', 'section' => 'iibpr_archive_curso_hero_section', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'iibpr_archive_curso_hero_bg', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'iibpr_archive_curso_hero_bg', array( 'label' => 'Imagem de Fundo', 'section' => 'iibpr_archive_curso_hero_section' ) ) );

    /* =====================================================
       PAINEL: PÁGINA EVENTOS — priority 50
       ===================================================== */
    $wp_customize->add_panel( 'iibpr_eventos_page_panel', array(
        'title'    => __( 'Página — Eventos', 'iibpr-theme' ),
        'priority' => 50,
    ) );

    $wp_customize->add_section( 'iibpr_eventos_hero_section', array( 'title' => 'Hero', 'panel' => 'iibpr_eventos_page_panel' ) );
    $wp_customize->add_setting( 'iibpr_eventos_hero_title',    array( 'default' => 'Eventos', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_eventos_hero_title',    array( 'label' => 'Título', 'section' => 'iibpr_eventos_hero_section', 'type' => 'text' ) );
    $wp_customize->add_setting( 'iibpr_eventos_hero_subtitle', array( 'default' => 'Fique por dentro das novidades — venha fazer parte de experiências únicas.', 'sanitize_callback' => 'wp_kses_post', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_eventos_hero_subtitle', array( 'label' => 'Subtítulo', 'section' => 'iibpr_eventos_hero_section', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'iibpr_eventos_hero_bg',       array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'iibpr_eventos_hero_bg', array( 'label' => 'Imagem de Fundo', 'section' => 'iibpr_eventos_hero_section' ) ) );

    $wp_customize->add_section( 'iibpr_eventos_feat_section', array( 'title' => 'Card Destaque', 'panel' => 'iibpr_eventos_page_panel' ) );
    $wp_customize->add_setting( 'iibpr_eventos_feat_show', array( 'default' => '1', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'iibpr_eventos_feat_show', array( 'label' => 'Mostrar card destaque?', 'section' => 'iibpr_eventos_feat_section', 'type' => 'checkbox' ) );
    foreach ( array(
        'iibpr_eventos_feat_badge'     => array( 'label' => 'Badge',         'default' => 'Evento Destaque', 'type' => 'text' ),
        'iibpr_eventos_feat_title'     => array( 'label' => 'Título',        'default' => '2° Seminário Internacional de Psicomotricidade', 'type' => 'text' ),
        'iibpr_eventos_feat_date'      => array( 'label' => 'Data',          'default' => '31 de Outubro a 1° de Novembro, 2025', 'type' => 'text' ),
        'iibpr_eventos_feat_location'  => array( 'label' => 'Local',         'default' => 'IESB Campus Sul — Brasília, DF', 'type' => 'text' ),
        'iibpr_eventos_feat_theme'     => array( 'label' => 'Tema',          'default' => 'Inovação e a Tecnologia Para Promoção da Saúde', 'type' => 'text' ),
        'iibpr_eventos_feat_detail_1'  => array( 'label' => 'Detalhe 1',     'default' => '20 horas certificadas', 'type' => 'text' ),
        'iibpr_eventos_feat_detail_2'  => array( 'label' => 'Detalhe 2',     'default' => '20+ palestrantes', 'type' => 'text' ),
        'iibpr_eventos_feat_price'     => array( 'label' => 'Preço',         'default' => 'A partir de R$148,00', 'type' => 'text' ),
        'iibpr_eventos_feat_cta_label' => array( 'label' => 'Botão — Texto', 'default' => 'Garantir Minha Vaga', 'type' => 'text' ),
        'iibpr_eventos_feat_cta_url'   => array( 'label' => 'Botão — URL',   'default' => 'https://wa.me/5561991572149', 'type' => 'text' ),
    ) as $sid => $sa ) {
        $wp_customize->add_setting( $sid, array( 'default' => $sa['default'], 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( $sid, array( 'label' => $sa['label'], 'section' => 'iibpr_eventos_feat_section', 'type' => $sa['type'] ) );
    }

    $wp_customize->add_section( 'iibpr_eventos_headings_section', array( 'title' => 'Cabeçalhos', 'panel' => 'iibpr_eventos_page_panel' ) );
    foreach ( array(
        'iibpr_eventos_upcoming_label' => array( 'label' => 'Próximos — Label', 'default' => 'Agenda',    'type' => 'text' ),
        'iibpr_eventos_upcoming_title' => array( 'label' => 'Próximos — Título','default' => 'Próximos Eventos', 'type' => 'text' ),
        'iibpr_eventos_past_label'     => array( 'label' => 'Realizados — Label','default' => 'Histórico', 'type' => 'text' ),
        'iibpr_eventos_past_title'     => array( 'label' => 'Realizados — Título','default' => 'Eventos Realizados', 'type' => 'text' ),
    ) as $sid => $sa ) {
        $wp_customize->add_setting( $sid, array( 'default' => $sa['default'], 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
        $wp_customize->add_control( $sid, array( 'label' => $sa['label'], 'section' => 'iibpr_eventos_headings_section', 'type' => $sa['type'] ) );
    }

    // Archive hero eventos
    $wp_customize->add_section( 'iibpr_archive_evento_hero_section', array( 'title' => 'Hero — Arquivo de Eventos', 'panel' => 'iibpr_eventos_page_panel' ) );
    $wp_customize->add_setting( 'iibpr_archive_evento_hero_title', array( 'default' => 'Eventos', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'iibpr_archive_evento_hero_title', array( 'label' => 'Título', 'section' => 'iibpr_archive_evento_hero_section', 'type' => 'text' ) );
    $wp_customize->add_setting( 'iibpr_archive_evento_hero_subtitle', array( 'default' => 'Todos os eventos do IIBPR.', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'iibpr_archive_evento_hero_subtitle', array( 'label' => 'Subtítulo', 'section' => 'iibpr_archive_evento_hero_section', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'iibpr_archive_evento_hero_bg', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'iibpr_archive_evento_hero_bg', array( 'label' => 'Imagem de Fundo', 'section' => 'iibpr_archive_evento_hero_section' ) ) );

    /* =====================================================
       PAINEL: PÁGINA PESQUISA — priority 55
       ===================================================== */
    $wp_customize->add_panel( 'iibpr_pesquisa_page_panel', array(
        'title'    => __( 'Página — Pesquisa', 'iibpr-theme' ),
        'priority' => 55,
    ) );
    $wp_customize->add_section( 'iibpr_pesquisa_hero_section', array( 'title' => 'Hero', 'panel' => 'iibpr_pesquisa_page_panel' ) );
    $wp_customize->add_setting( 'iibpr_pesquisa_hero_title', array( 'default' => 'Pesquisa Científica', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_pesquisa_hero_title', array( 'label' => 'Título', 'section' => 'iibpr_pesquisa_hero_section', 'type' => 'text' ) );
    $wp_customize->add_setting( 'iibpr_pesquisa_hero_subtitle', array( 'default' => 'Contribuições para o avanço da psicomotricidade relacional no Brasil e no mundo.', 'sanitize_callback' => 'wp_kses_post', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_pesquisa_hero_subtitle', array( 'label' => 'Subtítulo', 'section' => 'iibpr_pesquisa_hero_section', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'iibpr_pesquisa_hero_bg', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'iibpr_pesquisa_hero_bg', array( 'label' => 'Imagem de Fundo', 'section' => 'iibpr_pesquisa_hero_section' ) ) );

    /* =====================================================
       PAINEL: PÁGINA BLOG — priority 60
       ===================================================== */
    $wp_customize->add_panel( 'iibpr_blog_page_panel', array(
        'title'    => __( 'Página — Blog', 'iibpr-theme' ),
        'priority' => 60,
    ) );
    $wp_customize->add_section( 'iibpr_blog_hero_section', array( 'title' => 'Hero', 'panel' => 'iibpr_blog_page_panel' ) );
    $wp_customize->add_setting( 'iibpr_blog_hero_title', array( 'default' => 'Blog', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_blog_hero_title', array( 'label' => 'Título', 'section' => 'iibpr_blog_hero_section', 'type' => 'text' ) );
    $wp_customize->add_setting( 'iibpr_blog_hero_subtitle', array( 'default' => 'Artigos, novidades e reflexões sobre psicomotricidade relacional.', 'sanitize_callback' => 'wp_kses_post', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_blog_hero_subtitle', array( 'label' => 'Subtítulo', 'section' => 'iibpr_blog_hero_section', 'type' => 'textarea' ) );

    /* =====================================================
       PAINEL: PÁGINA CONTATO — priority 65
       ===================================================== */
    $wp_customize->add_panel( 'iibpr_contato_panel', array(
        'title'    => __( 'Página — Contato', 'iibpr-theme' ),
        'priority' => 65,
    ) );
    $wp_customize->add_section( 'iibpr_contato_hero_section', array( 'title' => 'Hero', 'panel' => 'iibpr_contato_panel' ) );
    $wp_customize->add_setting( 'iibpr_contato_hero_title',    array( 'default' => 'Contato', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_contato_hero_title',    array( 'label' => 'Título', 'section' => 'iibpr_contato_hero_section', 'type' => 'text' ) );
    $wp_customize->add_setting( 'iibpr_contato_hero_subtitle', array( 'default' => 'Fale conosco. Estamos aqui para ajudar.', 'sanitize_callback' => 'wp_kses_post', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_contato_hero_subtitle', array( 'label' => 'Subtítulo', 'section' => 'iibpr_contato_hero_section', 'type' => 'textarea' ) );
    $wp_customize->add_setting( 'iibpr_contato_hero_bg',       array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'iibpr_contato_hero_bg', array( 'label' => 'Imagem de Fundo', 'section' => 'iibpr_contato_hero_section' ) ) );

    $wp_customize->add_section( 'iibpr_contato_text_section', array( 'title' => 'Textos da Página', 'panel' => 'iibpr_contato_panel' ) );
    $wp_customize->add_setting( 'iibpr_contato_form_heading', array( 'default' => 'Envie uma mensagem', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_contato_form_heading', array( 'label' => 'Título do Formulário', 'section' => 'iibpr_contato_text_section', 'type' => 'text' ) );
    $wp_customize->add_setting( 'iibpr_contato_info_heading', array( 'default' => 'Informações', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_contato_info_heading', array( 'label' => 'Título das Informações', 'section' => 'iibpr_contato_text_section', 'type' => 'text' ) );

    /* =====================================================
       PAINEL: PÁGINA ÁREA DO ALUNO — priority 70
       ===================================================== */
    $wp_customize->add_panel( 'iibpr_aluno_panel', array(
        'title'    => __( 'Página — Área do Aluno', 'iibpr-theme' ),
        'priority' => 70,
    ) );
    $wp_customize->add_section( 'iibpr_aluno_hero_section', array( 'title' => 'Hero', 'panel' => 'iibpr_aluno_panel' ) );
    $wp_customize->add_setting( 'iibpr_aluno_hero_title',    array( 'default' => 'Área do Aluno', 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_aluno_hero_title',    array( 'label' => 'Título', 'section' => 'iibpr_aluno_hero_section', 'type' => 'text' ) );
    $wp_customize->add_setting( 'iibpr_aluno_hero_subtitle', array( 'default' => 'Acesse seus cursos e materiais.', 'sanitize_callback' => 'wp_kses_post', 'transport' => 'postMessage' ) );
    $wp_customize->add_control( 'iibpr_aluno_hero_subtitle', array( 'label' => 'Subtítulo', 'section' => 'iibpr_aluno_hero_section', 'type' => 'textarea' ) );

    $wp_customize->add_section( 'iibpr_aluno_dashboard_section', array( 'title' => 'Dashboard Cards', 'panel' => 'iibpr_aluno_panel' ) );
    $aluno_card_defaults = array(
        1 => array( 'icon' => '📚', 'title' => 'Meus Cursos',   'status' => 'Em breve' ),
        2 => array( 'icon' => '🎓', 'title' => 'Certificados',  'status' => 'Em breve' ),
        3 => array( 'icon' => '📅', 'title' => 'Eventos',        'status' => 'Em breve' ),
    );
    for ( $i = 1; $i <= 3; $i++ ) {
        $wp_customize->add_setting( "iibpr_aluno_card_{$i}_icon",   array( 'default' => $aluno_card_defaults[$i]['icon'],   'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "iibpr_aluno_card_{$i}_icon",   array( 'label' => "Card {$i} — Ícone",  'section' => 'iibpr_aluno_dashboard_section', 'type' => 'text' ) );
        $wp_customize->add_setting( "iibpr_aluno_card_{$i}_title",  array( 'default' => $aluno_card_defaults[$i]['title'],  'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "iibpr_aluno_card_{$i}_title",  array( 'label' => "Card {$i} — Título", 'section' => 'iibpr_aluno_dashboard_section', 'type' => 'text' ) );
        $wp_customize->add_setting( "iibpr_aluno_card_{$i}_status", array( 'default' => $aluno_card_defaults[$i]['status'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "iibpr_aluno_card_{$i}_status", array( 'label' => "Card {$i} — Status", 'section' => 'iibpr_aluno_dashboard_section', 'type' => 'text' ) );
    }
    $wp_customize->add_setting( 'iibpr_aluno_lms_url',    array( 'default' => '#', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( 'iibpr_aluno_lms_url',    array( 'label' => 'URL do LMS (Meus Cursos)',       'section' => 'iibpr_aluno_dashboard_section', 'type' => 'text' ) );
    $wp_customize->add_setting( 'iibpr_aluno_lms_notice', array( 'default' => 'A integração com o ambiente de aprendizagem (LMS) está em desenvolvimento. Em breve você poderá acessar seus cursos e materiais por aqui.', 'sanitize_callback' => 'wp_kses_post' ) );
    $wp_customize->add_control( 'iibpr_aluno_lms_notice', array( 'label' => 'Aviso LMS', 'section' => 'iibpr_aluno_dashboard_section', 'type' => 'textarea' ) );

    /* =====================================================
       PAINEL: FUNDADORES (compartilhado) — priority 75
       ===================================================== */
    $wp_customize->add_panel( 'iibpr_founders_panel', array(
        'title'    => __( 'Fundadores', 'iibpr-theme' ),
        'priority' => 75,
    ) );

    $founders_defaults = array(
        1 => array(
            'name'         => 'Fabiane Alves Crispim',
            'role'         => 'Presidente do IIBPR · Vice-Presidente ABP Centro-Oeste',
            'role_detail'  => 'Presidente do IIBPR',
            'bio_short'    => 'Pedagoga, Psicóloga, Psicomotricista Relacional. Mestranda em Psicomotricidade pela Universidade de Évora, Portugal.',
            'bio_long'     => 'A minha história com a Psicomotricidade, já tem maior idade... 19 anos. Foi na graduação em Pedagogia, que senti amor na primeira aula! Ela auxilia crianças e pessoas de todas as idades a reconectarem corpo e mente, buscando o diálogo diário de saúde através da autoconsciência.',
            'credentials'  => 'Pedagoga, Psicóloga Clínica · Especialização em Psicomotricidade, Gestão Pública e Psicologia Humanista · Mestranda — UÉvora · Formação pelo Instituto Viver MG e IIPR Veneza.',
            'photo'        => '',
        ),
        2 => array(
            'name'         => 'Augusto Parras Albuquerque',
            'role'         => 'Vice-Presidente do IIBPR · Presidente ABP Centro-Oeste',
            'role_detail'  => 'Vice-Presidente do IIBPR',
            'bio_short'    => 'Presidente da ABP Centro-Oeste. Doutorando em Psicomotricidade pela Universidade de Évora, Portugal.',
            'bio_long'     => 'Desde meu estágio na graduação em Educação Física com pessoas com alguma deficiência ou desenvolvimento atípico, me aproximei da Psicomotricidade e, poucos anos depois, consegui iniciar essa formação que mudou a minha vida.',
            'credentials'  => 'Psicomotricista Titular ABP · Ed. Física e Psicologia · Mestrado em Educação (UnB) · Doutorando em Motricidade Humana — UÉvora · Formação pelo IIPR.',
            'photo'        => '',
        ),
        3 => array(
            'name'         => 'Prof. Dr. Mauro Vecchiato',
            'role'         => 'Diretor Científico — IIPR Itália',
            'role_detail'  => 'Diretor Científico — IIPR Itália',
            'bio_short'    => 'Referência mundial em Psicomotricidade Relacional Psicodinâmica. Autor de obras fundamentais sobre intervenção psicocorporal.',
            'bio_long'     => 'Mauro Vecchiato nasceu em Veneza. É formado em educação física e psicologia, com especialização em educação e terapia. Psicanalista e com formação em Psicomotricidade Relacional (André Lapierre), é uma das vozes mais originais na área da psicomotricidade na Itália. Diretor do Istituto Italiano di Psicologia della Relazione, ensina reabilitação e semiótica psicomotora na Universidade de Pádova.',
            'credentials'  => '',
            'photo'        => '',
        ),
    );

    for ( $f = 1; $f <= 3; $f++ ) {
        $fd = $founders_defaults[ $f ];
        $wp_customize->add_section( "iibpr_founder_{$f}_section", array(
            'title' => "Fundador {$f} — {$fd['name']}",
            'panel' => 'iibpr_founders_panel',
        ) );
        $founder_fields = array(
            'name'        => array( 'label' => 'Nome',             'type' => 'text',     'cb' => 'sanitize_text_field' ),
            'role'        => array( 'label' => 'Cargo (completo)', 'type' => 'text',     'cb' => 'sanitize_text_field' ),
            'role_detail' => array( 'label' => 'Cargo (curto)',    'type' => 'text',     'cb' => 'sanitize_text_field' ),
            'bio_short'   => array( 'label' => 'Bio Curta',        'type' => 'textarea', 'cb' => 'wp_kses_post' ),
            'bio_long'    => array( 'label' => 'Bio Longa',        'type' => 'textarea', 'cb' => 'wp_kses_post' ),
            'credentials' => array( 'label' => 'Credenciais',      'type' => 'textarea', 'cb' => 'wp_kses_post' ),
        );
        foreach ( $founder_fields as $fk => $fa ) {
            $wp_customize->add_setting( "iibpr_founder_{$f}_{$fk}", array( 'default' => $fd[ $fk ], 'sanitize_callback' => $fa['cb'] ) );
            $wp_customize->add_control( "iibpr_founder_{$f}_{$fk}", array( 'label' => $fa['label'], 'section' => "iibpr_founder_{$f}_section", 'type' => $fa['type'] ) );
        }
        $wp_customize->add_setting( "iibpr_founder_{$f}_photo", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "iibpr_founder_{$f}_photo", array(
            'label' => 'Foto', 'section' => "iibpr_founder_{$f}_section",
        ) ) );
    }
    $wp_customize->add_setting( 'iibpr_founder_3_book_image', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'iibpr_founder_3_book_image', array(
        'label' => 'Imagem do Livro', 'section' => 'iibpr_founder_3_section',
    ) ) );

    /* =====================================================
       PAINEL: RODAPÉ — priority 80
       ===================================================== */
    $wp_customize->add_panel( 'iibpr_footer_panel', array(
        'title'    => __( 'Rodapé', 'iibpr-theme' ),
        'priority' => 80,
    ) );
    $wp_customize->add_section( 'iibpr_footer_section', array(
        'title' => 'Informações do Rodapé', 'panel' => 'iibpr_footer_panel',
    ) );
    $footer_fields = array(
        'iibpr_footer_tagline'    => array( 'label' => 'Tagline do Rodapé',     'default' => 'Instituto Italo Brasileiro de Psicomotricidade Relacional. Onde há movimento, há vida em relação!', 'transport' => 'postMessage' ),
        'iibpr_footer_email'      => array( 'label' => 'Email',                 'default' => 'contato@institutoibpr.org.br', 'transport' => 'refresh' ),
        'iibpr_footer_whatsapp_br'=> array( 'label' => 'WhatsApp Brasil',       'default' => '+55 (61) 99157-2149', 'transport' => 'refresh' ),
        'iibpr_footer_whatsapp_pt'=> array( 'label' => 'WhatsApp Portugal',     'default' => '+351 913 126 662', 'transport' => 'refresh' ),
        'iibpr_footer_instagram'  => array( 'label' => 'URL Instagram',         'default' => 'https://instagram.com/iibpr_psicomotricidade', 'transport' => 'refresh' ),
        'iibpr_footer_facebook'   => array( 'label' => 'URL Facebook',          'default' => 'https://facebook.com/institutoibpr', 'transport' => 'refresh' ),
        'iibpr_footer_copyright'  => array( 'label' => 'Texto Copyright',       'default' => '© ' . date('Y') . ' Instituto IIBPR. Todos os direitos reservados.', 'transport' => 'postMessage' ),
        'iibpr_newsletter_action' => array( 'label' => 'URL formulário newsletter', 'default' => '#', 'transport' => 'refresh' ),
    );
    foreach ( $footer_fields as $id => $args ) {
        $wp_customize->add_setting( $id, array( 'default' => $args['default'], 'sanitize_callback' => 'wp_kses_post', 'transport' => $args['transport'] ) );
        $wp_customize->add_control( $id, array( 'label' => $args['label'], 'section' => 'iibpr_footer_section', 'type' => 'text' ) );
    }

    /* =====================================================
       SELECTIVE REFRESH PARTIALS — Lápis Clicável
       ===================================================== */
    if ( isset( $wp_customize->selective_refresh ) ) {

        // Home: Hero Carousel
        $wp_customize->selective_refresh->add_partial( 'home_hero', array(
            'selector'            => '#home',
            'settings'            => array( 'iibpr_hero_slide_1_image', 'iibpr_hero_slide_2_image', 'iibpr_hero_slide_3_image', 'iibpr_hero_slide_4_image', 'iibpr_hero_slide_5_image', 'iibpr_hero_autoplay' ),
            'container_inclusive' => true,
            'render_callback'     => function() { get_template_part( 'template-parts/sections/hero' ); },
        ) );

        // Home: About + Pillars
        $wp_customize->selective_refresh->add_partial( 'home_about_pillars', array(
            'selector'            => '#sobre',
            'settings'            => array( 'iibpr_about_image', 'iibpr_pillar_1_icon', 'iibpr_pillar_2_icon', 'iibpr_pillar_3_icon' ),
            'container_inclusive' => true,
            'render_callback'     => function() { get_template_part( 'template-parts/sections/about-pillars' ); },
        ) );

        // Home: Featured Courses
        $wp_customize->selective_refresh->add_partial( 'home_featured_courses', array(
            'selector'            => '#cursos-destaque',
            'settings'            => array( 'iibpr_course_1_image', 'iibpr_course_2_image', 'iibpr_course_3_image', 'iibpr_home_courses_label', 'iibpr_home_courses_title', 'iibpr_home_courses_subtitle', 'iibpr_home_featured_course_1', 'iibpr_home_featured_course_2', 'iibpr_home_featured_course_3', 'iibpr_home_featured_course_4' ),
            'container_inclusive' => true,
            'render_callback'     => function() { get_template_part( 'template-parts/sections/featured-courses' ); },
        ) );

        // Home: Founders
        $wp_customize->selective_refresh->add_partial( 'home_founders', array(
            'selector'            => '#fundadores',
            'settings'            => array( 'iibpr_founder_1_photo', 'iibpr_founder_2_photo', 'iibpr_founder_3_photo', 'iibpr_founder_1_name', 'iibpr_founder_2_name', 'iibpr_founder_3_name' ),
            'container_inclusive' => true,
            'render_callback'     => function() { get_template_part( 'template-parts/sections/founders' ); },
        ) );

        // Home: Events
        $wp_customize->selective_refresh->add_partial( 'home_events', array(
            'selector'            => '#eventos-home',
            'settings'            => array( 'iibpr_event_1_title', 'iibpr_event_2_title', 'iibpr_event_3_title', 'iibpr_home_events_label', 'iibpr_home_events_title', 'iibpr_home_events_subtitle', 'iibpr_home_featured_event_1', 'iibpr_home_featured_event_2', 'iibpr_home_featured_event_3' ),
            'container_inclusive' => true,
            'render_callback'     => function() { get_template_part( 'template-parts/sections/events' ); },
        ) );

        // Home: Testimonials
        $wp_customize->selective_refresh->add_partial( 'home_testimonials', array(
            'selector'            => '#depoimentos',
            'settings'            => array( 'iibpr_testimonial_1_quote', 'iibpr_testimonial_2_quote', 'iibpr_testimonial_3_quote', 'iibpr_testimonial_4_quote' ),
            'container_inclusive' => true,
            'render_callback'     => function() { get_template_part( 'template-parts/sections/testimonials' ); },
        ) );

        // Home: Research Stats
        $wp_customize->selective_refresh->add_partial( 'home_research_stats', array(
            'selector'            => '#pesquisa',
            'settings'            => array( 'iibpr_stats_articles', 'iibpr_stats_books', 'iibpr_stats_congresses' ),
            'container_inclusive' => true,
            'render_callback'     => function() { get_template_part( 'template-parts/sections/research-stats' ); },
        ) );

        // Home: CTA
        $wp_customize->selective_refresh->add_partial( 'home_cta', array(
            'selector'            => '#inscricao',
            'settings'            => array( 'iibpr_cta_btn_url', 'iibpr_cta_btn2_url' ),
            'container_inclusive' => true,
            'render_callback'     => function() { get_template_part( 'template-parts/sections/cta' ); },
        ) );

        // Home: Partners
        $wp_customize->selective_refresh->add_partial( 'home_partners', array(
            'selector'            => '#parceiros',
            'container_inclusive' => true,
            'render_callback'     => function() { get_template_part( 'template-parts/sections/partners' ); },
        ) );

        // Header Logo
        $wp_customize->selective_refresh->add_partial( 'header_logo', array(
            'selector'            => '#masthead .site-branding',
            'settings'            => array( 'iibpr_logo' ),
            'container_inclusive' => false,
            'render_callback'     => function() {
                $logo_url = iibpr_get( 'iibpr_logo' );
                ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <?php if ( $logo_url ) : ?>
                    <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="h-10 w-auto">
                    <?php else : ?>
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/iibpr-logo-main.svg' ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="h-10 w-auto">
                    <span class="sr-only">IIBPR</span>
                    <?php endif; ?>
                </a>
                <span class="hidden lg:block text-xs text-gray-500 max-w-xs leading-tight">
                    Onde há movimento, há vida em relação!
                </span>
                <?php
            },
        ) );

        // Footer
        $wp_customize->selective_refresh->add_partial( 'footer_social', array(
            'selector'            => '#colophon',
            'settings'            => array( 'iibpr_footer_email', 'iibpr_footer_whatsapp_br', 'iibpr_footer_whatsapp_pt', 'iibpr_footer_instagram', 'iibpr_footer_facebook' ),
            'container_inclusive' => true,
            'render_callback'     => '__return_false',
        ) );
    }
}
add_action( 'customize_register', 'iibpr_customize_register' );

/**
 * Inject dynamic colors from customizer.
 */
function iibpr_dynamic_styles() {
    $primary   = sanitize_hex_color( get_theme_mod( 'iibpr_color_primary',   '#6CB350' ) );
    $secondary = sanitize_hex_color( get_theme_mod( 'iibpr_color_secondary', '#A6D16C' ) );
    echo "<style>
        :root {
            --iibpr-green: {$primary};
            --iibpr-light: {$secondary};
        }
    </style>\n";
}
add_action( 'wp_head', 'iibpr_dynamic_styles' );

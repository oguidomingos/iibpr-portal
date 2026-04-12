<?php
/**
 * IIBPR Theme Customizer
 *
 * Registra opções editáveis via Painel > Aparência > Personalizar.
 * Courses, Events, Testimonials are now managed via CPTs — customizer serves as fallback.
 */

function iibpr_customize_register( $wp_customize ) {

    /* =====================================================
       PAINEL: IDENTIDADE VISUAL
       ===================================================== */
    $wp_customize->add_panel( 'iibpr_brand_panel', array(
        'title'    => __( 'Identidade Visual', 'iibpr-theme' ),
        'priority' => 20,
    ) );
    $wp_customize->add_section( 'iibpr_brand_section', array(
        'title' => 'Cores e Logo', 'panel' => 'iibpr_brand_panel',
    ) );
    $wp_customize->add_setting( 'iibpr_logo', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'iibpr_logo', array(
        'label' => 'Logo do Instituto', 'section' => 'iibpr_brand_section',
    ) ) );
    $wp_customize->add_setting( 'iibpr_color_primary', array( 'default' => '#6CB350', 'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'iibpr_color_primary', array(
        'label' => 'Cor Primária (verde)', 'section' => 'iibpr_brand_section',
    ) ) );
    $wp_customize->add_setting( 'iibpr_color_secondary', array( 'default' => '#A6D16C', 'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'iibpr_color_secondary', array(
        'label' => 'Cor Secundária (verde claro)', 'section' => 'iibpr_brand_section',
    ) ) );

    /* =====================================================
       PAINEL: HERO
       ===================================================== */
    $wp_customize->add_panel( 'iibpr_hero_panel', array(
        'title'    => __( 'Hero — Carrossel Principal', 'iibpr-theme' ),
        'priority' => 30,
    ) );

    // Hero carousel slides (up to 5)
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
            'tagline'   => '2° Seminário Internacional',
            'title'     => 'Inovação e Tecnologia Para Promoção da Saúde',
            'subtitle'  => '31 de Outubro a 1° de Novembro, 2025 — IESB Campus Sul, Brasília',
            'desc'      => '20 horas certificadas · 20+ palestrantes · A partir de R$148,00',
            'cta_label' => 'Garantir Minha Vaga',
            'cta_url'   => 'https://wa.me/5561991572149',
            'sec_label' => 'Saiba Mais',
            'sec_url'   => '/eventos',
        ),
        3 => array(
            'image'     => '',
            'tagline'   => 'Pós-Graduação IESB',
            'title'     => 'Especialização em Psicomotricidade',
            'subtitle'  => '420h · Modalidade Híbrida · Início previsto: Abril 2026',
            'desc'      => 'Parceria IIBPR + IESB (nota 5 MEC). Corpo docente internacional.',
            'cta_label' => 'Fale Conosco',
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
            'title' => sprintf( __( 'Slide %d', 'iibpr-theme' ), $s ),
            'panel' => 'iibpr_hero_panel',
        ) );

        // Image
        $wp_customize->add_setting( "iibpr_hero_slide_{$s}_image", array( 'default' => $d['image'], 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "iibpr_hero_slide_{$s}_image", array(
            'label'   => __( 'Imagem de Fundo', 'iibpr-theme' ),
            'section' => "iibpr_hero_slide_{$s}",
        ) ) );

        // Text fields
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
        foreach ( $fields as $fkey => $flabel ) {
            $setting_id = "iibpr_hero_slide_{$s}_{$fkey}";
            $wp_customize->add_setting( $setting_id, array( 'default' => $d[ $fkey ], 'sanitize_callback' => 'wp_kses_post' ) );
            $wp_customize->add_control( $setting_id, array(
                'label'   => $flabel,
                'section' => "iibpr_hero_slide_{$s}",
                'type'    => $fkey === 'desc' ? 'textarea' : 'text',
            ) );
        }
    }

    // Autoplay setting
    $wp_customize->add_section( 'iibpr_hero_settings', array(
        'title' => __( 'Configurações do Carrossel', 'iibpr-theme' ),
        'panel' => 'iibpr_hero_panel',
    ) );
    $wp_customize->add_setting( 'iibpr_hero_autoplay', array( 'default' => '6000', 'sanitize_callback' => 'absint' ) );
    $wp_customize->add_control( 'iibpr_hero_autoplay', array(
        'label'       => __( 'Autoplay (ms, 0 = desligado)', 'iibpr-theme' ),
        'section'     => 'iibpr_hero_settings',
        'type'        => 'number',
        'input_attrs' => array( 'min' => 0, 'step' => 500 ),
    ) );

    /* =====================================================
       PAINEL: SOBRE O INSTITUTO
       ===================================================== */
    $wp_customize->add_panel( 'iibpr_about_panel', array(
        'title'    => __( 'Sobre o Instituto', 'iibpr-theme' ),
        'priority' => 40,
    ) );

    $wp_customize->add_section( 'iibpr_about_section', array(
        'title' => __( 'Textos "Sobre"', 'iibpr-theme' ),
        'panel' => 'iibpr_about_panel',
    ) );

    $about_fields = array(
        'iibpr_about_label' => array( 'label' => 'Label da seção',  'default' => 'Sobre o Instituto', 'type' => 'text' ),
        'iibpr_about_title' => array( 'label' => 'Título da seção', 'default' => 'Saúde Integral e Relacional', 'type' => 'text' ),
        'iibpr_about_text'  => array( 'label' => 'Parágrafo intro',  'default' => 'O Instituto IIBPR tem como missão promover a saúde física, mental e social por meio do desenvolvimento humano integral via psicomotricidade relacional.', 'type' => 'textarea' ),
    );
    foreach ( $about_fields as $id => $args ) {
        $wp_customize->add_setting( $id, array( 'default' => $args['default'], 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( $id, array( 'label' => $args['label'], 'section' => 'iibpr_about_section', 'type' => $args['type'] ) );
    }

    // Sobre imagem
    $wp_customize->add_setting( 'iibpr_about_image', array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'iibpr_about_image', array(
        'label' => 'Imagem da seção Sobre', 'section' => 'iibpr_about_section',
    ) ) );

    // 3 Pilares
    for ( $i = 1; $i <= 3; $i++ ) {
        $defaults = array(
            1 => array( 'title' => 'Psicomotricidade', 'text' => 'Estudo do ser humano através do movimento corporal e das relações internas e externas.', 'icon' => '🧠' ),
            2 => array( 'title' => 'Relacional',        'text' => 'O ser humano como ser de relação que necessita de conexões humanas vitais.',           'icon' => '🤝' ),
            3 => array( 'title' => 'Psicodinâmica',     'text' => 'Conflitos internos enraizados na infância, trabalhados por intervenção psicocorporal.',  'icon' => '🌱' ),
        );
        $wp_customize->add_section( "iibpr_pillar_{$i}", array(
            'title' => "Pilar {$i}", 'panel' => 'iibpr_about_panel',
        ) );
        $wp_customize->add_setting( "iibpr_pillar_{$i}_icon",  array( 'default' => $defaults[$i]['icon'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "iibpr_pillar_{$i}_icon",  array( 'label' => 'Emoji / ícone', 'section' => "iibpr_pillar_{$i}", 'type' => 'text' ) );
        $wp_customize->add_setting( "iibpr_pillar_{$i}_title", array( 'default' => $defaults[$i]['title'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "iibpr_pillar_{$i}_title", array( 'label' => 'Título', 'section' => "iibpr_pillar_{$i}", 'type' => 'text' ) );
        $wp_customize->add_setting( "iibpr_pillar_{$i}_text",  array( 'default' => $defaults[$i]['text'], 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "iibpr_pillar_{$i}_text",  array( 'label' => 'Descrição', 'section' => "iibpr_pillar_{$i}", 'type' => 'textarea' ) );
    }

    /* =====================================================
       PAINEL: CURSOS (Fallback — CPTs preferred)
       ===================================================== */
    $wp_customize->add_panel( 'iibpr_courses_panel', array(
        'title'       => __( 'Cursos em Destaque (Fallback)', 'iibpr-theme' ),
        'priority'    => 50,
        'description' => 'Estes dados são usados quando não há cursos cadastrados via CPT.',
    ) );

    $course_defaults = array(
        1 => array( 'title' => 'Pós-Graduação em Psicomotricidade', 'badge' => 'Destaque', 'hours' => '420h', 'desc' => 'Formação completa teórica e prática em parceria com o IESB.', 'price' => '', 'cta' => 'Saiba Mais', 'url' => '#inscricao' ),
        2 => array( 'title' => 'Seminário Teórico e Didático I',    'badge' => 'Online',    'hours' => '20h',  'desc' => 'Certificado + e-book + textos científicos. Via Zoom.',     'price' => 'R$ 69,90', 'cta' => 'Inscreva-se', 'url' => '#inscricao' ),
        3 => array( 'title' => 'Curso Básico de Grafomotricidade',  'badge' => 'Especialista', 'hours' => '20h', 'desc' => 'Com a Dra. Ana Rita Matias. Análise da escrita.',       'price' => '', 'cta' => 'Saiba Mais', 'url' => '#inscricao' ),
    );

    for ( $i = 1; $i <= 3; $i++ ) {
        $d = $course_defaults[$i];
        $wp_customize->add_section( "iibpr_course_{$i}", array(
            'title' => "Curso {$i}", 'panel' => 'iibpr_courses_panel',
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

    /* =====================================================
       PAINEL: EVENTOS (Fallback — CPTs preferred)
       ===================================================== */
    $wp_customize->add_panel( 'iibpr_events_panel', array(
        'title'       => __( 'Eventos em Destaque (Fallback)', 'iibpr-theme' ),
        'priority'    => 55,
        'description' => 'Estes dados são usados quando não há eventos cadastrados via CPT.',
    ) );

    $event_defaults = array(
        1 => array( 'title' => 'Seminário Teórico e Didático I', 'date' => '22 de Março, 2026 — Online', 'type' => 'Seminário Online', 'desc' => 'Certificado 20h + e-book + textos científicos.', 'url' => '#inscricao' ),
        2 => array( 'title' => 'Formação em Psicomotricidade',   'date' => 'Abril–Dezembro 2026',        'type' => 'Pós-Graduação',     'desc' => 'Formação completa em parceria com o IESB.',     'url' => '#inscricao' ),
        3 => array( 'title' => 'Curso de Grafomotricidade',      'date' => 'Maio 2026 — Online',         'type' => 'Curso Especialista','desc' => 'Análise da escrita e intervenção grafomotora.',  'url' => '#inscricao' ),
    );

    for ( $i = 1; $i <= 3; $i++ ) {
        $d = $event_defaults[$i];
        $wp_customize->add_section( "iibpr_event_{$i}", array(
            'title' => "Evento {$i}", 'panel' => 'iibpr_events_panel',
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

    /* =====================================================
       PAINEL: DEPOIMENTOS (Fallback — CPTs preferred)
       ===================================================== */
    $wp_customize->add_panel( 'iibpr_testimonials_panel', array(
        'title'       => __( 'Depoimentos (Fallback)', 'iibpr-theme' ),
        'priority'    => 60,
        'description' => 'Estes dados são usados quando não há depoimentos cadastrados via CPT.',
    ) );

    $testimonial_defaults = array(
        1 => array( 'quote' => 'Uma jornada de descoberta da essência e das origens.', 'author' => 'Leilah' ),
        2 => array( 'quote' => 'Amor e cuidado genuínos, compreensão profunda do corpo.', 'author' => 'Léo' ),
        3 => array( 'quote' => 'Silenciar a mente e perceber as emoções através do corpo.', 'author' => 'Luciana' ),
        4 => array( 'quote' => 'Uma reconstrução de si mesmo através do brincar.', 'author' => 'Juliana' ),
    );

    for ( $i = 1; $i <= 4; $i++ ) {
        $wp_customize->add_section( "iibpr_testimonial_{$i}", array(
            'title' => "Depoimento {$i}", 'panel' => 'iibpr_testimonials_panel',
        ) );
        $wp_customize->add_setting( "iibpr_testimonial_{$i}_quote",  array( 'default' => $testimonial_defaults[$i]['quote'], 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( "iibpr_testimonial_{$i}_quote",  array( 'label' => 'Depoimento', 'section' => "iibpr_testimonial_{$i}", 'type' => 'textarea' ) );
        $wp_customize->add_setting( "iibpr_testimonial_{$i}_author", array( 'default' => $testimonial_defaults[$i]['author'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( "iibpr_testimonial_{$i}_author", array( 'label' => 'Autor', 'section' => "iibpr_testimonial_{$i}", 'type' => 'text' ) );
    }

    /* =====================================================
       PAINEL: CTA / INSCRIÇÃO
       ===================================================== */
    $wp_customize->add_panel( 'iibpr_cta_panel', array(
        'title'    => __( 'Seção CTA / Inscrição', 'iibpr-theme' ),
        'priority' => 70,
    ) );
    $wp_customize->add_section( 'iibpr_cta_section', array(
        'title' => 'CTA Final', 'panel' => 'iibpr_cta_panel',
    ) );
    $cta_fields = array(
        'iibpr_cta_title'     => array( 'label' => 'Título',        'default' => 'Eleve sua prática profissional', 'type' => 'text' ),
        'iibpr_cta_subtitle'  => array( 'label' => 'Subtítulo',     'default' => 'Faça parte de uma comunidade internacional de profissionais que transformam vidas.', 'type' => 'textarea' ),
        'iibpr_cta_btn_label' => array( 'label' => 'Texto Botão 1', 'default' => 'Inscreva-se Agora', 'type' => 'text' ),
        'iibpr_cta_btn_url'   => array( 'label' => 'URL Botão 1',   'default' => 'https://wa.me/5561991572149', 'type' => 'text' ),
        'iibpr_cta_btn2_label'=> array( 'label' => 'Texto Botão 2', 'default' => 'Fale Conosco', 'type' => 'text' ),
        'iibpr_cta_btn2_url'  => array( 'label' => 'URL Botão 2',   'default' => 'mailto:contato@institutoibpr.org.br', 'type' => 'text' ),
    );
    foreach ( $cta_fields as $id => $args ) {
        $wp_customize->add_setting( $id, array( 'default' => $args['default'], 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( $id, array( 'label' => $args['label'], 'section' => 'iibpr_cta_section', 'type' => $args['type'] ) );
    }

    /* =====================================================
       PAINEL: PESQUISA (Stats)
       ===================================================== */
    $wp_customize->add_section( 'iibpr_research_section', array(
        'title'    => __( 'Pesquisa — Números', 'iibpr-theme' ),
        'priority' => 65,
    ) );
    $stats = array(
        'iibpr_stats_articles'   => array( 'label' => 'Artigos publicados', 'default' => '120' ),
        'iibpr_stats_books'      => array( 'label' => 'Livros e capítulos', 'default' => '35' ),
        'iibpr_stats_congresses' => array( 'label' => 'Congressos e eventos', 'default' => '50' ),
    );
    foreach ( $stats as $id => $args ) {
        $wp_customize->add_setting( $id, array( 'default' => $args['default'], 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( $id, array( 'label' => $args['label'], 'section' => 'iibpr_research_section', 'type' => 'number' ) );
    }

    /* =====================================================
       PAINEL: RODAPÉ
       ===================================================== */
    $wp_customize->add_panel( 'iibpr_footer_panel', array(
        'title'    => __( 'Rodapé', 'iibpr-theme' ),
        'priority' => 80,
    ) );
    $wp_customize->add_section( 'iibpr_footer_section', array(
        'title' => 'Informações do Rodapé', 'panel' => 'iibpr_footer_panel',
    ) );
    $footer_fields = array(
        'iibpr_footer_tagline'    => array( 'label' => 'Tagline do Rodapé',     'default' => 'Instituto Italo Brasileiro de Psicomotricidade Relacional. Onde há movimento, há vida em relação!' ),
        'iibpr_footer_email'      => array( 'label' => 'Email',                 'default' => 'contato@institutoibpr.org.br' ),
        'iibpr_footer_whatsapp_br'=> array( 'label' => 'WhatsApp Brasil',       'default' => '+55 (61) 99157-2149' ),
        'iibpr_footer_whatsapp_pt'=> array( 'label' => 'WhatsApp Portugal',     'default' => '+351 913 126 662' ),
        'iibpr_footer_instagram'  => array( 'label' => 'URL Instagram',         'default' => 'https://instagram.com/iibpr_psicomotricidade' ),
        'iibpr_footer_facebook'   => array( 'label' => 'URL Facebook',          'default' => 'https://facebook.com/iibpr' ),
        'iibpr_footer_copyright'  => array( 'label' => 'Texto Copyright',       'default' => '© ' . date('Y') . ' Instituto IIBPR. Todos os direitos reservados.' ),
        'iibpr_newsletter_action' => array( 'label' => 'URL formulário newsletter', 'default' => '#' ),
    );
    foreach ( $footer_fields as $id => $args ) {
        $wp_customize->add_setting( $id, array( 'default' => $args['default'], 'sanitize_callback' => 'wp_kses_post' ) );
        $wp_customize->add_control( $id, array( 'label' => $args['label'], 'section' => 'iibpr_footer_section', 'type' => 'text' ) );
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

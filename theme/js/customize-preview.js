/**
 * IIBPR Theme — Customizer Live Preview
 *
 * Provides instant text updates (postMessage) and CSS variable changes
 * without full page reload in the Customizer preview.
 */
( function( $ ) {
	'use strict';

	// ── Helper: bind a text setting to a DOM selector ──
	function bindText( settingId, selector, mode ) {
		mode = mode || 'html';
		wp.customize( settingId, function( value ) {
			value.bind( function( newVal ) {
				if ( mode === 'html' ) {
					$( selector ).html( newVal );
				} else if ( mode === 'text' ) {
					$( selector ).text( newVal );
				}
			} );
		} );
	}

	// ── Helper: bind a CSS variable ──
	function bindCSSVar( settingId, varName ) {
		wp.customize( settingId, function( value ) {
			value.bind( function( newVal ) {
				document.documentElement.style.setProperty( varName, newVal );
			} );
		} );
	}

	/* =====================================================
	   GLOBAL — Colors via CSS Variables
	   ===================================================== */
	bindCSSVar( 'iibpr_color_primary',   '--iibpr-green' );
	bindCSSVar( 'iibpr_color_secondary', '--iibpr-light' );

	/* =====================================================
	   HOME — Hero Carousel (Slides 1-5)
	   ===================================================== */
	for ( var s = 1; s <= 5; s++ ) {
		( function( n ) {
			var prefix = 'iibpr_hero_slide_' + n + '_';
			var slide  = '[data-slide="' + n + '"]';
			bindText( prefix + 'tagline',   slide + ' .hero-slide-tagline',   'text' );
			bindText( prefix + 'title',     slide + ' .hero-slide-title' );
			bindText( prefix + 'subtitle',  slide + ' .hero-slide-subtitle' );
			bindText( prefix + 'desc',      slide + ' .hero-slide-desc' );
			bindText( prefix + 'cta_label', slide + ' .hero-cta-primary',     'text' );
			bindText( prefix + 'sec_label', slide + ' .hero-cta-secondary',   'text' );
		} )( s );
	}

	/* =====================================================
	   HOME — Para Quem
	   ===================================================== */
	bindText( 'iibpr_interest_label',    '#para-quem .interest-label', 'text' );
	bindText( 'iibpr_interest_title',    '#para-quem .interest-title' );
	bindText( 'iibpr_interest_subtitle', '#para-quem .interest-subtitle' );
	for ( var ic = 1; ic <= 4; ic++ ) {
		bindText( 'iibpr_interest_card_' + ic + '_title', '#para-quem .interest-card-' + ic + '-title', 'text' );
		bindText( 'iibpr_interest_card_' + ic + '_desc',  '#para-quem .interest-card-' + ic + '-desc' );
	}

	/* =====================================================
	   HOME — Cursos em Destaque
	   ===================================================== */
	bindText( 'iibpr_home_courses_label',    '#cursos-destaque .home-courses-label', 'text' );
	bindText( 'iibpr_home_courses_title',    '#cursos-destaque .home-courses-title' );
	bindText( 'iibpr_home_courses_subtitle', '#cursos-destaque .home-courses-subtitle' );

	/* =====================================================
	   HOME — Eventos em Destaque
	   ===================================================== */
	bindText( 'iibpr_home_events_label',    '#eventos-home .home-events-label', 'text' );
	bindText( 'iibpr_home_events_title',    '#eventos-home .home-events-title' );
	bindText( 'iibpr_home_events_subtitle', '#eventos-home .home-events-subtitle' );

	/* =====================================================
	   HOME — About + Pillars
	   ===================================================== */
	bindText( 'iibpr_about_label', '#sobre .about-label',   'text' );
	bindText( 'iibpr_about_title', '#sobre .about-title' );
	bindText( 'iibpr_about_text',  '#sobre .about-text' );

	for ( var p = 1; p <= 3; p++ ) {
		bindText( 'iibpr_pillar_' + p + '_title', '#sobre .pillar-' + p + '-title', 'text' );
		bindText( 'iibpr_pillar_' + p + '_text',  '#sobre .pillar-' + p + '-text' );
	}

	/* =====================================================
	   HOME — CTA / Inscrição
	   ===================================================== */
	bindText( 'iibpr_cta_title',      '#inscricao .cta-title' );
	bindText( 'iibpr_cta_subtitle',   '#inscricao .cta-subtitle' );
	bindText( 'iibpr_cta_btn_label',  '#inscricao .cta-btn-primary',   'text' );
	bindText( 'iibpr_cta_btn2_label', '#inscricao .cta-btn-secondary', 'text' );

	/* =====================================================
	   HOME — Research Stats
	   ===================================================== */
	bindText( 'iibpr_stats_articles',   '#pesquisa .stat-articles',   'text' );
	bindText( 'iibpr_stats_books',      '#pesquisa .stat-books',      'text' );
	bindText( 'iibpr_stats_congresses', '#pesquisa .stat-congresses', 'text' );

	/* =====================================================
	   FOOTER
	   ===================================================== */
	bindText( 'iibpr_footer_tagline',   '#colophon .footer-tagline' );
	bindText( 'iibpr_footer_copyright', '#colophon .footer-copyright' );

	/* =====================================================
	   PAGE: SOBRE
	   ===================================================== */
	bindText( 'iibpr_sobre_hero_title',    '#sobre-hero .page-hero-title',    'text' );
	bindText( 'iibpr_sobre_hero_subtitle', '#sobre-hero .page-hero-subtitle', 'text' );

	bindText( 'iibpr_sobre_hist_label',  '#sobre-historia .section-label-text', 'text' );
	bindText( 'iibpr_sobre_hist_title',  '#sobre-historia .section-heading',    'text' );
	bindText( 'iibpr_sobre_hist_text_1', '#sobre-historia .hist-text-1' );
	bindText( 'iibpr_sobre_hist_text_2', '#sobre-historia .hist-text-2' );

	bindText( 'iibpr_sobre_wwd_label',  '#sobre-wwd .section-label-text', 'text' );
	bindText( 'iibpr_sobre_wwd_title',  '#sobre-wwd .section-heading',    'text' );
	bindText( 'iibpr_sobre_wwd_text_1', '#sobre-wwd .wwd-text-1' );
	bindText( 'iibpr_sobre_wwd_text_2', '#sobre-wwd .wwd-text-2' );
	bindText( 'iibpr_sobre_wwd_text_3', '#sobre-wwd .wwd-text-3' );

	bindText( 'iibpr_sobre_mvv_label',   '#sobre-mvv .section-label-text', 'text' );
	bindText( 'iibpr_sobre_mvv_heading',  '#sobre-mvv .section-heading',   'text' );
	for ( var m = 1; m <= 3; m++ ) {
		bindText( 'iibpr_sobre_mvv_' + m + '_title', '#sobre-mvv .mvv-' + m + '-title', 'text' );
		bindText( 'iibpr_sobre_mvv_' + m + '_text',  '#sobre-mvv .mvv-' + m + '-text' );
	}

	for ( var si = 1; si <= 4; si++ ) {
		bindText( 'iibpr_sobre_stat_' + si + '_number', '#sobre-stats .stat-' + si + '-number', 'text' );
		bindText( 'iibpr_sobre_stat_' + si + '_label',  '#sobre-stats .stat-' + si + '-label',  'text' );
	}

	bindText( 'iibpr_sobre_cta_title', '#sobre-cta .cta-title', 'text' );
	bindText( 'iibpr_sobre_cta_text',  '#sobre-cta .cta-text' );

	/* =====================================================
	   PAGE: PSICOMOTRICIDADE
	   ===================================================== */
	bindText( 'iibpr_prp_hero_title',    '#prp-hero .page-hero-title',    'text' );
	bindText( 'iibpr_prp_hero_subtitle', '#prp-hero .page-hero-subtitle', 'text' );

	bindText( 'iibpr_prp_conceito_label',  '#prp-conceito .section-label-text', 'text' );
	bindText( 'iibpr_prp_conceito_title',  '#prp-conceito .section-heading',    'text' );
	bindText( 'iibpr_prp_conceito_text_1', '#prp-conceito .conceito-text-1' );
	bindText( 'iibpr_prp_conceito_text_2', '#prp-conceito .conceito-text-2' );
	bindText( 'iibpr_prp_conceito_text_3', '#prp-conceito .conceito-text-3' );

	bindText( 'iibpr_prp_pillars_label', '#prp-pilares .section-label-text', 'text' );
	bindText( 'iibpr_prp_pillars_title', '#prp-pilares .section-heading',    'text' );
	for ( var pp = 1; pp <= 3; pp++ ) {
		bindText( 'iibpr_prp_pillar_' + pp + '_title', '#prp-pilares .pillar-' + pp + '-title', 'text' );
		bindText( 'iibpr_prp_pillar_' + pp + '_text',  '#prp-pilares .pillar-' + pp + '-text' );
	}

	bindText( 'iibpr_prp_areas_label', '#prp-areas .section-label-text', 'text' );
	bindText( 'iibpr_prp_areas_title', '#prp-areas .section-heading',    'text' );
	for ( var ai = 1; ai <= 3; ai++ ) {
		bindText( 'iibpr_prp_area_' + ai + '_title', '#prp-areas .area-' + ai + '-title', 'text' );
		bindText( 'iibpr_prp_area_' + ai + '_text',  '#prp-areas .area-' + ai + '-text' );
	}

	bindText( 'iibpr_prp_health_label', '#prp-saude .section-label-text', 'text' );
	bindText( 'iibpr_prp_health_title', '#prp-saude .section-heading',    'text' );
	bindText( 'iibpr_prp_health_intro', '#prp-saude .health-intro' );
	for ( var bi = 1; bi <= 4; bi++ ) {
		bindText( 'iibpr_prp_benefit_' + bi + '_title', '#prp-saude .benefit-' + bi + '-title', 'text' );
		bindText( 'iibpr_prp_benefit_' + bi + '_text',  '#prp-saude .benefit-' + bi + '-text' );
	}

	bindText( 'iibpr_prp_struct_label', '#prp-estrutura .section-label-text', 'text' );
	bindText( 'iibpr_prp_struct_title', '#prp-estrutura .section-heading',    'text' );

	bindText( 'iibpr_prp_prof_label', '#prp-profissoes .section-label-text', 'text' );
	bindText( 'iibpr_prp_prof_title', '#prp-profissoes .section-heading',    'text' );

	bindText( 'iibpr_prp_cta_title', '#prp-cta .cta-title', 'text' );
	bindText( 'iibpr_prp_cta_text',  '#prp-cta .cta-text' );

	/* =====================================================
	   PAGE: EVENTOS
	   ===================================================== */
	bindText( 'iibpr_eventos_hero_title',    '#eventos-hero .page-hero-title',    'text' );
	bindText( 'iibpr_eventos_hero_subtitle', '#eventos-hero .page-hero-subtitle', 'text' );
	bindText( 'iibpr_eventos_feat_title',    '#eventos-feat .feat-title',         'text' );
	bindText( 'iibpr_eventos_upcoming_label','#eventos-upcoming .section-label-text', 'text' );
	bindText( 'iibpr_eventos_upcoming_title','#eventos-upcoming .section-heading', 'text' );
	bindText( 'iibpr_eventos_past_label',    '#eventos-past .section-label-text', 'text' );
	bindText( 'iibpr_eventos_past_title',    '#eventos-past .section-heading',    'text' );

	/* =====================================================
	   PAGE: CURSOS
	   ===================================================== */
	bindText( 'iibpr_cursos_hero_title',    '#cursos-hero .page-hero-title',    'text' );
	bindText( 'iibpr_cursos_hero_subtitle', '#cursos-hero .page-hero-subtitle', 'text' );

	/* =====================================================
	   PAGE: PESQUISA
	   ===================================================== */
	bindText( 'iibpr_pesquisa_hero_title',    '#pesquisa-hero .page-hero-title',    'text' );
	bindText( 'iibpr_pesquisa_hero_subtitle', '#pesquisa-hero .page-hero-subtitle', 'text' );

	/* =====================================================
	   PAGE: BLOG
	   ===================================================== */
	bindText( 'iibpr_blog_hero_title',    '#blog-hero .page-hero-title',    'text' );
	bindText( 'iibpr_blog_hero_subtitle', '#blog-hero .page-hero-subtitle', 'text' );

	/* =====================================================
	   PAGE: CONTATO
	   ===================================================== */
	bindText( 'iibpr_contato_hero_title',    '#contato-hero .page-hero-title',    'text' );
	bindText( 'iibpr_contato_hero_subtitle', '#contato-hero .page-hero-subtitle', 'text' );
	bindText( 'iibpr_contato_form_heading',  '#contato-form .section-heading',    'text' );
	bindText( 'iibpr_contato_info_heading',  '#contato-info .section-heading',    'text' );

	/* =====================================================
	   PAGE: ÁREA DO ALUNO
	   ===================================================== */
	bindText( 'iibpr_aluno_hero_title',    '#aluno-hero .page-hero-title',    'text' );
	bindText( 'iibpr_aluno_hero_subtitle', '#aluno-hero .page-hero-subtitle', 'text' );

} )( jQuery );

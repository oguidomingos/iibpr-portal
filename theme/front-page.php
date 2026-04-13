<?php
/**
 * Front Page — Homepage do IIBPR
 * Sections modulares via template parts com fotos reais.
 */
get_header(); ?>

<main id="main" class="site-main">

	<?php
	// 1. Hero — full-screen with real action photo background
	get_template_part( 'template-parts/sections/hero' );

	// 2. Interest Cards — "Para quem é o IIBPR?" (with real photos)
	get_template_part( 'template-parts/sections/interest-cards' );

	// 3. Featured Courses (with real course photos)
	get_template_part( 'template-parts/sections/featured-courses' );

	// 4. About / Pillars (with real photos + mosaic)
	get_template_part( 'template-parts/sections/about-pillars' );

	// 4b. Benefits — Valorização, Autoconhecimento, Progresso, Vivência (from original site)
	get_template_part( 'template-parts/sections/benefits' );

	// 5. Founders — Fabiane, Augusto, Mauro (with real photos)
	get_template_part( 'template-parts/sections/founders' );

	// 6. Events
	get_template_part( 'template-parts/sections/events' );

	// 7. Action Gallery — Real photos of the institute in action
	get_template_part( 'template-parts/sections/action-gallery' );

	// 8. Research Stats (with Mauro background photo + book)
	get_template_part( 'template-parts/sections/research-stats' );

	// 9. Testimonials (with real student photos)
	get_template_part( 'template-parts/sections/testimonials' );

	// 10. Partners (with real logos)
	get_template_part( 'template-parts/sections/partners' );

	// 11. CTA (with real action photo background)
	get_template_part( 'template-parts/sections/cta' );
	?>

</main><!-- #main -->

<?php get_footer(); ?>

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
	// Inlined because get_template_part silently fails if file doesn't exist on server
	if ( file_exists( get_template_directory() . '/template-parts/sections/benefits.php' ) ) {
		get_template_part( 'template-parts/sections/benefits' );
	} else {
		// Inline fallback
		$benefits = array(
			array( 'icon' => '<svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>', 'title' => 'Valorização das Potencialidades', 'desc' => 'Foco nos aspectos positivos, melhora do esquema corporal e valorização das capacidades de cada indivíduo.' ),
			array( 'icon' => '<svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>', 'title' => 'Autoconhecimento', 'desc' => 'Expressão de sentimentos inconscientes através de imagens mentais, promovendo compreensão profunda de si mesmo.' ),
			array( 'icon' => '<svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>', 'title' => 'Progresso Relacional e Comunicativo', 'desc' => 'Superação de dificuldades de interação, promovendo conexões interpessoais saudáveis e comunicação efetiva.' ),
			array( 'icon' => '<svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>', 'title' => 'Vivência Corporal', 'desc' => 'Descoberta de novas experiências e desenvolvimento psicomotor através do corpo em movimento e em relação.' ),
		);
		?>
		<section id="beneficios" class="section-padding bg-gradient-to-b from-white to-gray-50">
			<div class="container-narrow">
				<div class="text-center mb-14 fade-up">
					<p class="section-label">Benefícios</p>
					<h2 class="section-title">Psicomotricidade Relacional</h2>
					<p class="section-subtitle">A abordagem que promove o desenvolvimento humano integral através do corpo e do movimento.</p>
				</div>
				<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
					<?php foreach ( $benefits as $i => $b ) : ?>
					<div class="bg-white rounded-2xl p-6 text-center shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 fade-up">
						<div class="text-iibpr-green mb-4 flex justify-center"><?php echo $b['icon']; ?></div>
						<h3 class="text-lg font-bold text-gray-900 mb-3"><?php echo esc_html( $b['title'] ); ?></h3>
						<p class="text-gray-600 text-sm leading-relaxed"><?php echo esc_html( $b['desc'] ); ?></p>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
		<?php
	}

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

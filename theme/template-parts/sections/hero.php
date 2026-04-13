<?php
/**
 * Template Part: Hero Carousel — dynamic slides configurable via Customizer.
 *
 * Uses the same carousel JS infrastructure (.carousel-wrapper / .carousel-track / .carousel-slide).
 */
$img = get_template_directory_uri() . '/images/';

// Default images per slide
$default_images = array(
	1 => $img . 'acao-grupo-5.jpg',
	2 => $img . 'mauro-palestra2.png',
	3 => $img . 'banner3.png',
	4 => $img . 'acao-formacao-1.jpg',
	5 => $img . 'acao-movimento-1.jpg',
);

// Slide defaults (must match customizer defaults so front-end shows them before Customizer is saved)
$slide_defaults = array(
	1 => array(
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
		'tagline'   => 'Curso Básico',
		'title'     => 'Grafomotricidade',
		'subtitle'  => 'Com Dra. Ana Rita Matias · 20h · Análise da escrita e intervenção',
		'desc'      => 'Técnicas de análise grafomotora para profissionais da educação e saúde.',
		'cta_label' => 'Saiba Mais',
		'cta_url'   => 'https://wa.me/5561991572149',
		'sec_label' => 'Ver Cursos',
		'sec_url'   => '/cursos',
	),
);

// Collect active slides
$slides = array();
for ( $s = 1; $s <= 5; $s++ ) {
	$d     = isset( $slide_defaults[ $s ] ) ? $slide_defaults[ $s ] : array();
	$title = iibpr_get( "iibpr_hero_slide_{$s}_title", isset( $d['title'] ) ? $d['title'] : '' );
	if ( ! $title ) continue;
	$slides[] = array(
		'image'     => iibpr_get( "iibpr_hero_slide_{$s}_image", isset( $d['image'] ) ? $d['image'] : '' ) ?: ( isset( $default_images[ $s ] ) ? $default_images[ $s ] : $default_images[1] ),
		'tagline'   => iibpr_get( "iibpr_hero_slide_{$s}_tagline", isset( $d['tagline'] ) ? $d['tagline'] : '' ),
		'title'     => $title,
		'subtitle'  => iibpr_get( "iibpr_hero_slide_{$s}_subtitle", isset( $d['subtitle'] ) ? $d['subtitle'] : '' ),
		'desc'      => iibpr_get( "iibpr_hero_slide_{$s}_desc", isset( $d['desc'] ) ? $d['desc'] : '' ),
		'cta_label' => iibpr_get( "iibpr_hero_slide_{$s}_cta_label", isset( $d['cta_label'] ) ? $d['cta_label'] : '' ),
		'cta_url'   => iibpr_get( "iibpr_hero_slide_{$s}_cta_url", isset( $d['cta_url'] ) ? $d['cta_url'] : '' ),
		'sec_label' => iibpr_get( "iibpr_hero_slide_{$s}_sec_label", isset( $d['sec_label'] ) ? $d['sec_label'] : '' ),
		'sec_url'   => iibpr_get( "iibpr_hero_slide_{$s}_sec_url", isset( $d['sec_url'] ) ? $d['sec_url'] : '' ),
	);
}

$total    = count( $slides );
$autoplay = absint( iibpr_get( 'iibpr_hero_autoplay', 6000 ) );
?>

<section id="home" class="hero-carousel -mt-[72px] relative overflow-hidden">

	<div class="carousel-wrapper" data-autoplay="<?php echo esc_attr( $autoplay ); ?>">

		<!-- Track -->
		<div class="carousel-track" style="width: <?php echo $total * 100; ?>%;">
			<?php foreach ( $slides as $idx => $slide ) : ?>
			<div class="carousel-slide" style="flex-basis: <?php echo 100 / $total; ?>%; width: <?php echo 100 / $total; ?>%;">
				<div class="min-h-screen flex items-center py-20 px-4 md:px-8 pt-[120px] pb-16 relative"
				     style="background-image: linear-gradient(135deg, rgba(64,72,86,0.85) 0%, rgba(58,90,42,0.78) 60%, rgba(108,179,80,0.72) 100%), url('<?php echo esc_url( $slide['image'] ); ?>'); background-size: cover; background-position: center;">
					<div class="max-w-5xl mx-auto text-center text-white w-full relative z-10">

						<?php if ( $slide['tagline'] ) : ?>
						<div class="inline-block bg-white/20 backdrop-blur-sm px-5 py-1.5 rounded-full text-sm font-medium mb-6 tracking-wide">
							<?php echo esc_html( $slide['tagline'] ); ?>
						</div>
						<?php endif; ?>

						<h2 class="text-4xl md:text-6xl font-extrabold leading-tight mb-5">
							<?php echo wp_kses_post( $slide['title'] ); ?>
						</h2>

						<?php if ( $slide['subtitle'] ) : ?>
						<p class="text-xl md:text-2xl text-white/90 mb-4 max-w-3xl mx-auto">
							<?php echo wp_kses_post( $slide['subtitle'] ); ?>
						</p>
						<?php endif; ?>

						<?php if ( $slide['desc'] ) : ?>
						<p class="text-base md:text-lg text-white/75 mb-8 max-w-2xl mx-auto">
							<?php echo wp_kses_post( $slide['desc'] ); ?>
						</p>
						<?php endif; ?>

						<?php if ( $slide['cta_label'] || $slide['sec_label'] ) : ?>
						<div class="flex flex-col sm:flex-row gap-4 justify-center <?php echo $slide['desc'] ? '' : 'mt-8'; ?>">
							<?php if ( $slide['cta_label'] ) : ?>
							<a href="<?php echo esc_url( $slide['cta_url'] ); ?>"
							   class="bg-white text-iibpr-charcoal px-8 py-4 rounded-full text-lg font-bold hover:bg-gray-100 shadow-2xl transition-all hover:-translate-y-1 text-center no-underline">
								<?php echo esc_html( $slide['cta_label'] ); ?>
							</a>
							<?php endif; ?>
							<?php if ( $slide['sec_label'] ) : ?>
							<a href="<?php echo esc_url( $slide['sec_url'] ); ?>"
							   class="border-2 border-white/70 text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-white/10 transition-all text-center no-underline">
								<?php echo esc_html( $slide['sec_label'] ); ?>
							</a>
							<?php endif; ?>
						</div>
						<?php endif; ?>

					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>

		<?php if ( $total > 1 ) : ?>
		<!-- Navigation arrows -->
		<button class="carousel-btn-prev absolute left-4 md:left-8 top-1/2 -translate-y-1/2 z-20 w-12 h-12 rounded-full bg-white/20 backdrop-blur-sm hover:bg-white/40 flex items-center justify-center text-white transition-all" aria-label="Slide anterior">
			<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
		</button>
		<button class="carousel-btn-next absolute right-4 md:right-8 top-1/2 -translate-y-1/2 z-20 w-12 h-12 rounded-full bg-white/20 backdrop-blur-sm hover:bg-white/40 flex items-center justify-center text-white transition-all" aria-label="Próximo slide">
			<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
		</button>

		<!-- Dots -->
		<div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex gap-3">
			<?php for ( $d = 0; $d < $total; $d++ ) : ?>
			<button class="carousel-dot w-3 h-3 rounded-full transition-all <?php echo $d === 0 ? 'bg-white w-8' : 'bg-white/50'; ?>"
			        aria-label="Slide <?php echo $d + 1; ?>" aria-selected="<?php echo $d === 0 ? 'true' : 'false'; ?>"></button>
			<?php endfor; ?>
		</div>
		<?php endif; ?>

	</div>

</section>

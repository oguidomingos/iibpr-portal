<?php
/**
 * Template Part: Hero Carousel — full-bleed background with overlay gradient.
 *
 * Uses the same carousel JS infrastructure (.carousel-wrapper / .carousel-track / .carousel-slide).
 */
$img = get_template_directory_uri() . '/images/';

// Default images per slide
$default_images = array(
	1 => $img . 'hero-slide-1.jpg',
	2 => $img . 'hero-slide-2.jpg',
	3 => $img . 'hero-slide-3.jpg',
	4 => $img . 'hero-slide-4.jpg',
	5 => $img . 'hero-slide-5.jpg',
);

// Slide defaults
$slide_defaults = array(
	1 => array(
		'tagline'   => 'Formação · Pesquisa · Extensão',
		'title'     => 'Instituto Internacional de Psicomotricidade Relacional',
		'subtitle'  => 'Formação reconhecida em psicomotricidade relacional para profissionais de todas as áreas.',
		'desc'      => '',
		'cta_label' => 'Conheça o IIBPR',
		'cta_url'   => '/sobre',
		'sec_label' => 'Ver Cursos',
		'sec_url'   => '/cursos',
	),
	2 => array(
		'tagline'   => 'Pós-Graduação IESB',
		'title'     => 'Pós-Graduação em Psicomotricidade Relacional',
		'subtitle'  => 'IESB — Brasília, DF · Especialização de 420h com professores Psicomotricistas',
		'desc'      => '',
		'cta_label' => 'Quero Garantir Minha Vaga',
		'cta_url'   => '#inscricao',
		'sec_label' => 'Conheça os Cursos',
		'sec_url'   => '/cursos',
	),
	3 => array(
		'tagline'   => 'Coordenadora Acadêmica',
		'title'     => 'Dra. Fabiane Lagranha',
		'subtitle'  => '"O corpo é o primeiro instrumento de aprendizagem da criança."',
		'desc'      => '',
		'cta_label' => 'Conheça a Equipe',
		'cta_url'   => '/sobre',
		'sec_label' => 'Ver Cursos',
		'sec_url'   => '/cursos',
	),
	4 => array(
		'tagline'   => 'Diretor do IIBPR',
		'title'     => 'Prof. Augusto Lagranha',
		'subtitle'  => '"A psicomotricidade relacional transforma vidas através do corpo."',
		'desc'      => '',
		'cta_label' => 'Conheça a Equipe',
		'cta_url'   => '/sobre',
		'sec_label' => 'Ver Cursos',
		'sec_url'   => '/cursos',
	),
	5 => array(
		'tagline'   => 'Mais de 25 anos dedicados à PR',
		'title'     => 'Conheça Nossos Fundadores',
		'subtitle'  => 'Referência na formação de psicomotricistas relacionais no Brasil e no mundo.',
		'desc'      => '',
		'cta_label' => 'Sobre o IIBPR',
		'cta_url'   => '/sobre',
		'sec_label' => 'Ver Programação',
		'sec_url'   => '/eventos',
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
			<div class="carousel-slide" data-slide="<?php echo $idx + 1; ?>" style="flex-basis: <?php echo 100 / $total; ?>%; width: <?php echo 100 / $total; ?>%;">
				<div class="relative min-h-screen overflow-hidden flex items-center">

					<!-- Full-bleed background image -->
					<img src="<?php echo esc_url( $slide['image'] ); ?>" alt="" class="absolute inset-0 w-full h-full object-cover" aria-hidden="true">

					<!-- Gradient overlay: charcoal → dark green -->
					<div class="absolute inset-0" style="background: linear-gradient(135deg, rgba(64,72,86,0.75) 0%, rgba(58,90,42,0.65) 100%);"></div>

					<!-- Content -->
					<div class="relative z-10 w-full px-6 md:px-16 lg:px-24 py-24 pt-[140px] max-w-4xl">

						<?php if ( $slide['tagline'] ) : ?>
						<div class="inline-block bg-white/20 backdrop-blur-sm px-5 py-1.5 rounded-full text-sm font-medium mb-6 tracking-wide">
							<span class="text-white hero-slide-tagline"><?php echo esc_html( $slide['tagline'] ); ?></span>
						</div>
						<?php endif; ?>

						<h2 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight mb-5 text-white font-serif hero-slide-title">
							<?php echo wp_kses_post( $slide['title'] ); ?>
						</h2>

						<?php if ( $slide['subtitle'] ) : ?>
						<p class="text-xl md:text-2xl text-white/90 mb-4 max-w-2xl hero-slide-subtitle">
							<?php echo wp_kses_post( $slide['subtitle'] ); ?>
						</p>
						<?php endif; ?>

						<?php if ( $slide['desc'] ) : ?>
						<p class="text-base md:text-lg text-white/75 mb-8 max-w-2xl hero-slide-desc">
							<?php echo wp_kses_post( $slide['desc'] ); ?>
						</p>
						<?php endif; ?>

						<?php if ( $slide['cta_label'] || $slide['sec_label'] ) : ?>
						<div class="flex flex-col sm:flex-row gap-4 <?php echo $slide['desc'] ? '' : 'mt-8'; ?>">
							<?php if ( $slide['cta_label'] ) : ?>
							<a href="<?php echo esc_url( $slide['cta_url'] ); ?>"
							   class="hero-cta-primary bg-white text-iibpr-green px-8 py-4 rounded-full text-lg font-bold hover:bg-gray-100 shadow-2xl transition-all hover:-translate-y-1 text-center no-underline inline-block">
								<?php echo esc_html( $slide['cta_label'] ); ?>
							</a>
							<?php endif; ?>
							<?php if ( $slide['sec_label'] ) : ?>
							<a href="<?php echo esc_url( $slide['sec_url'] ); ?>"
							   class="hero-cta-secondary border-2 border-white/70 text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-white/10 transition-all text-center no-underline inline-block">
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

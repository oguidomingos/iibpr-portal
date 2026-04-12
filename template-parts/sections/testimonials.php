<?php
/**
 * Template Part: Testimonials Section — with real photos and pattern background
 */
$testimonials_cpt = new WP_Query( array(
    'post_type'      => 'iibpr_depoimento',
    'posts_per_page' => 6,
    'orderby'        => 'date',
    'order'          => 'DESC',
) );

$has_cpt = $testimonials_cpt->have_posts();
$img_base = get_template_directory_uri() . '/images/';
$pattern  = $img_base . 'testimonial-section-home3-pattern-1.png';

// Real testimonials with real photos
$fallback_testimonials = array(
    array(
        'quote'  => iibpr_get( 'iibpr_testimonial_1_quote', 'Quando recebi o convite para participar do curso de Psicomotricidade Relacional mergulhei numa jornada na minha essência e pude resgatar em mim a criança interior que ansiava por ser acolhida.' ),
        'author' => iibpr_get( 'iibpr_testimonial_1_author', 'Leilah' ),
        'photo'  => $img_base . 'leilah-machado.jpg',
        'role'   => 'Aluna de Formação PRP',
    ),
    array(
        'quote'  => iibpr_get( 'iibpr_testimonial_2_quote', 'Antes de começar a formação, eu pensava que a psicomotricidade era só para crianças. Então percebi que não só as crianças, como todas as pessoas precisavam desta abordagem.' ),
        'author' => iibpr_get( 'iibpr_testimonial_2_author', 'Léo' ),
        'photo'  => $img_base . 'alexandre.jpg',
        'role'   => 'Aluno de Formação PRP',
    ),
    array(
        'quote'  => iibpr_get( 'iibpr_testimonial_3_quote', 'Na psicomotricidade relacional aprendi a silenciar a mente para perceber e acolher minhas emoções. Hoje me sinto mais conectada comigo mesma e com as pessoas ao meu redor.' ),
        'author' => iibpr_get( 'iibpr_testimonial_3_author', 'Luciana' ),
        'photo'  => $img_base . 'luciana-dias.jpg',
        'role'   => 'Aluna de Formação PRP',
    ),
    array(
        'quote'  => iibpr_get( 'iibpr_testimonial_4_quote', '"Conhece-te a ti mesmo" — Sócrates. Na psicomotricidade relacional, esta frase ganha vida. É uma experiência transformadora que vai muito além da teoria.' ),
        'author' => iibpr_get( 'iibpr_testimonial_4_author', 'Juliana' ),
        'photo'  => $img_base . 'haryadna.jpg',
        'role'   => 'Aluna de Formação PRP',
    ),
);
?>
<section id="depoimentos" class="section-padding bg-warm-white relative overflow-hidden">
	<!-- Subtle pattern overlay -->
	<div class="absolute inset-0 opacity-5" style="background-image: url('<?php echo esc_url( $pattern ); ?>'); background-repeat: repeat;"></div>

	<div class="container-narrow relative z-10">

		<div class="text-center mb-14 fade-up">
			<p class="section-label">Histórias Reais</p>
			<h2 class="section-title">O que dizem nossos alunos</h2>
			<p class="section-subtitle">Depoimentos de quem viveu a transformação da Psicomotricidade Relacional.</p>
		</div>

		<?php if ( $has_cpt ) : ?>
		<div class="grid md:grid-cols-2 gap-8">
			<?php $idx = 0; while ( $testimonials_cpt->have_posts() ) : $testimonials_cpt->the_post(); ?>
			<div class="fade-up fade-up-delay-<?php echo ( $idx % 3 ) + 1; ?>">
				<?php get_template_part( 'template-parts/cards/testimonial-card' ); ?>
			</div>
			<?php $idx++; endwhile; wp_reset_postdata(); ?>
		</div>
		<?php else : ?>
		<!-- Fallback: Real testimonials with photos -->
		<div class="grid md:grid-cols-2 gap-8">
			<?php foreach ( $fallback_testimonials as $i => $t ) : ?>
			<blockquote class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-md transition-shadow border border-gray-100 fade-up fade-up-delay-<?php echo min( $i + 1, 3 ); ?>">
				<!-- Quote icon -->
				<svg class="w-10 h-10 text-iibpr-green/30 mb-4" fill="currentColor" viewBox="0 0 24 24">
					<path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
				</svg>
				<p class="text-gray-700 leading-relaxed mb-6 text-[15px]"><?php echo wp_kses_post( $t['quote'] ); ?></p>
				<!-- Author with photo -->
				<footer class="flex items-center gap-4">
					<img src="<?php echo esc_url( $t['photo'] ); ?>" alt="<?php echo esc_attr( $t['author'] ); ?>"
					     class="w-14 h-14 rounded-full object-cover border-2 border-iibpr-green/20" loading="lazy">
					<div>
						<div class="font-bold text-gray-900"><?php echo esc_html( $t['author'] ); ?></div>
						<div class="text-sm text-iibpr-green"><?php echo esc_html( $t['role'] ); ?></div>
					</div>
				</footer>
			</blockquote>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

	</div>
</section>

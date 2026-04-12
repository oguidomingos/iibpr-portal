<?php
/**
 * Template Name: Eventos
 * Template Post Type: page
 */
get_header();

$upcoming = new WP_Query( array(
    'post_type'      => 'iibpr_evento',
    'posts_per_page' => -1,
    'meta_key'       => '_iibpr_event_date_start',
    'orderby'        => 'meta_value',
    'order'          => 'ASC',
    'meta_query'     => array(
        array(
            'key'     => '_iibpr_event_date_start',
            'value'   => date( 'Y-m-d' ),
            'compare' => '>=',
            'type'    => 'DATE',
        ),
    ),
) );

$past = new WP_Query( array(
    'post_type'      => 'iibpr_evento',
    'posts_per_page' => 6,
    'meta_key'       => '_iibpr_event_date_start',
    'orderby'        => 'meta_value',
    'order'          => 'DESC',
    'meta_query'     => array(
        array(
            'key'     => '_iibpr_event_date_start',
            'value'   => date( 'Y-m-d' ),
            'compare' => '<',
            'type'    => 'DATE',
        ),
    ),
) );
?>

<main id="main" class="site-main">

	<!-- Hero with real photo -->
	<?php $img = get_template_directory_uri() . '/images/'; ?>
	<section class="py-20 px-4 md:px-8 text-white text-center -mt-[72px] pt-[92px] relative overflow-hidden"
	         style="background-image: linear-gradient(135deg, rgba(64,72,86,0.88) 0%, rgba(58,90,42,0.82) 100%), url('<?php echo esc_url( $img . 'mauro-palestra2.png' ); ?>'); background-size: cover; background-position: center;">
		<div class="max-w-4xl mx-auto relative z-10">
			<h1 class="text-4xl md:text-5xl font-extrabold mb-4">Eventos</h1>
			<p class="text-xl opacity-90">Fique por dentro das novidades — venha fazer parte de experiências únicas.</p>
		</div>
	</section>

	<!-- Featured: 2° Seminário Internacional -->
	<section class="py-16 px-4 md:px-8 bg-white">
		<div class="max-w-4xl mx-auto">
			<div class="bg-green-50 rounded-2xl overflow-hidden border border-green-200">
				<div class="h-2 bg-gradient-to-r from-green-600 to-green-400"></div>
				<div class="p-8 md:p-12">
					<span class="inline-block bg-green-100 text-green-700 text-xs font-bold px-3 py-1 rounded-full mb-4">Evento Destaque</span>
					<h2 class="text-3xl font-extrabold text-gray-900 mb-4">2° Seminário Internacional de Psicomotricidade</h2>
					<div class="flex flex-wrap gap-4 mb-6 text-sm">
						<span class="flex items-center gap-1 text-green-600 font-medium">
							<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
							31 de Outubro a 1° de Novembro, 2025
						</span>
						<span class="flex items-center gap-1 text-gray-600">
							<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
							IESB Campus Sul — Brasília, DF
						</span>
					</div>
					<p class="text-gray-700 text-lg mb-4"><strong>Tema:</strong> Inovação e a Tecnologia Para Promoção da Saúde</p>
					<div class="flex flex-wrap gap-6 mb-8 text-sm text-gray-600">
						<span class="flex items-center gap-2">
							<svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
							20 horas certificadas
						</span>
						<span class="flex items-center gap-2">
							<svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
							20+ palestrantes
						</span>
					</div>
					<div class="flex flex-wrap items-center gap-4">
						<span class="text-2xl font-extrabold text-gray-900">A partir de R$148,00</span>
						<a href="https://wa.me/5561991572149" target="_blank" rel="noopener" class="btn-primary text-sm py-3 px-8">Garantir Minha Vaga</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Upcoming Events -->
	<section class="py-20 px-4 md:px-8 bg-gray-50">
		<div class="max-w-4xl mx-auto">
			<div class="text-center mb-14">
				<p class="section-label">Agenda</p>
				<h2 class="text-3xl font-extrabold text-gray-900 mt-2">Próximos Eventos</h2>
			</div>

			<?php if ( $upcoming->have_posts() ) : ?>
			<div class="grid md:grid-cols-3 gap-8">
				<?php while ( $upcoming->have_posts() ) : $upcoming->the_post(); ?>
					<?php get_template_part( 'template-parts/cards/event-card' ); ?>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
			<?php else : ?>
			<!-- Fallback: Customizer events -->
			<div class="grid md:grid-cols-3 gap-8">
				<?php for ( $i = 1; $i <= 3; $i++ ) :
					$ev_title = iibpr_get( "iibpr_event_{$i}_title" );
					if ( ! $ev_title ) continue;
				?>
				<article class="bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow overflow-hidden border border-gray-200">
					<div class="h-2 bg-gradient-to-r from-green-600 to-green-400"></div>
					<div class="p-6">
						<?php $ev_type = iibpr_get( "iibpr_event_{$i}_type" ); if ( $ev_type ) : ?>
						<span class="inline-block bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full mb-3"><?php echo esc_html( $ev_type ); ?></span>
						<?php endif; ?>
						<h3 class="text-lg font-bold text-gray-900 mb-2"><?php echo esc_html( $ev_title ); ?></h3>
						<?php $ev_date = iibpr_get( "iibpr_event_{$i}_date" ); if ( $ev_date ) : ?>
						<p class="text-sm text-green-600 font-medium mb-3"><?php echo esc_html( $ev_date ); ?></p>
						<?php endif; ?>
						<p class="text-gray-600 text-sm leading-relaxed"><?php echo wp_kses_post( iibpr_get( "iibpr_event_{$i}_desc" ) ); ?></p>
					</div>
				</article>
				<?php endfor; ?>
			</div>
			<?php endif; ?>
		</div>
	</section>

	<!-- Past Events -->
	<section class="py-20 px-4 md:px-8 bg-white">
		<div class="max-w-4xl mx-auto">
			<div class="text-center mb-14">
				<p class="section-label">Histórico</p>
				<h2 class="text-3xl font-extrabold text-gray-900 mt-2">Eventos Realizados</h2>
			</div>

			<?php if ( $past->have_posts() ) : ?>
			<div class="grid md:grid-cols-3 gap-8">
				<?php while ( $past->have_posts() ) : $past->the_post(); ?>
					<?php get_template_part( 'template-parts/cards/event-card' ); ?>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
			<?php else : ?>
			<!-- Fallback: past events from real history -->
			<div class="grid md:grid-cols-3 gap-8">
				<?php
				$past_events = array(
					array(
						'title' => '1° Seminário Internacional de Psicomotricidade',
						'date'  => '15 de Julho, 2022 — IESB Asa Norte',
						'type'  => 'Seminário Internacional',
						'desc'  => 'Uma experiência em movimento. Palestrantes nacionais e internacionais promovendo a compreensão da Psicomotricidade.',
					),
					array(
						'title' => 'Palestra: O Jogo Psicomotor',
						'date'  => '22 de Julho, 2022 — São Paulo',
						'type'  => 'Palestra',
						'desc'  => 'Palestra com Prof. Dr. Mauro Vecchiato sobre O Jogo Psicomotor Psicodinâmico.',
					),
					array(
						'title' => 'Psicomotricidade Psicodinâmica: O Jogo',
						'date'  => '24 de Setembro, 2022',
						'type'  => 'Workshop',
						'desc'  => 'Relações do desenvolvimento infantil com o movimento e o jogo. Tipologia do jogo espontâneo.',
					),
				);
				foreach ( $past_events as $ev ) : ?>
				<article class="bg-white rounded-2xl shadow-sm overflow-hidden border border-gray-200">
					<div class="h-2 bg-gradient-to-r from-gray-400 to-gray-300"></div>
					<div class="p-6">
						<span class="inline-block bg-gray-100 text-gray-600 text-xs font-semibold px-3 py-1 rounded-full mb-3"><?php echo esc_html( $ev['type'] ); ?></span>
						<h3 class="text-lg font-bold text-gray-900 mb-2"><?php echo esc_html( $ev['title'] ); ?></h3>
						<p class="text-sm text-gray-500 font-medium mb-3"><?php echo esc_html( $ev['date'] ); ?></p>
						<p class="text-gray-600 text-sm leading-relaxed"><?php echo esc_html( $ev['desc'] ); ?></p>
					</div>
				</article>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>
	</section>

</main>

<?php get_footer(); ?>

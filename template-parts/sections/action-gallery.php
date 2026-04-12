<?php
/**
 * Template Part: Action Gallery — Real photos of the institute in action
 */
$img_base = get_template_directory_uri() . '/images/';
$gallery = array(
	array( 'src' => 'formacaoprp5.jpg',        'alt' => 'Formação PRP Módulo 5' ),
	array( 'src' => 'formacaoprp8.jpg',        'alt' => 'Formação PRP Módulo 8' ),
	array( 'src' => 'acao-movimento-3.jpg',    'alt' => 'Vivência corporal' ),
	array( 'src' => 'palestra-sp.jpeg',        'alt' => 'Palestra em São Paulo' ),
	array( 'src' => 'workshop1.jpeg',          'alt' => 'Workshop gratuito' ),
	array( 'src' => 'acao-formacao-3.jpg',     'alt' => 'Formação presencial' ),
	array( 'src' => 'mod1-2022.png',           'alt' => 'Módulo 1 — Turma 2022' ),
	array( 'src' => 'acao-grupo-3.jpg',        'alt' => 'Atividade em grupo' ),
	array( 'src' => 'evento-24-09-22.png',     'alt' => 'Evento Setembro 2022' ),
	array( 'src' => 'mauro-palestra2.png',     'alt' => 'Palestra Prof. Mauro Vecchiato' ),
	array( 'src' => 'acao-movimento-5.jpg',    'alt' => 'Psicomotricidade em ação' ),
	array( 'src' => 'seminariodidatico2.jpg',  'alt' => 'Seminário Didático' ),
);
?>
<section class="py-20 px-4 md:px-8 bg-gray-50">
	<div class="max-w-6xl mx-auto">

		<div class="text-center mb-14 fade-up">
			<p class="section-label">Em Ação</p>
			<h2 class="section-title">O IIBPR em Movimento</h2>
			<p class="section-subtitle">Formações, seminários, workshops e vivências — momentos reais da nossa comunidade.</p>
		</div>

		<!-- Photo grid — magazine style -->
		<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 fade-up">
			<?php foreach ( $gallery as $i => $photo ) :
				$extra_class = '';
				// Make first and 5th items span 2 cols on desktop for visual variety
				if ( $i === 0 || $i === 4 ) {
					$extra_class = 'md:col-span-2 md:row-span-2';
				}
			?>
			<div class="<?php echo $extra_class; ?> group relative overflow-hidden rounded-xl aspect-square">
				<img src="<?php echo esc_url( $img_base . $photo['src'] ); ?>" alt="<?php echo esc_attr( $photo['alt'] ); ?>"
				     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" loading="lazy">
				<div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
					<span class="text-white text-sm font-medium"><?php echo esc_html( $photo['alt'] ); ?></span>
				</div>
			</div>
			<?php endforeach; ?>
		</div>

	</div>
</section>

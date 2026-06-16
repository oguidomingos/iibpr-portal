<?php
/**
 * Template Part: Research Stats — with background photo
 */
$img_base = get_template_directory_uri() . '/images/';
$stats = array(
    array(
        'target' => iibpr_get( 'iibpr_stats_articles', '120' ),
        'suffix' => '+',
        'label'  => 'Artigos Publicados',
        'icon'   => '<svg class="w-8 h-8 text-iibpr-green mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>',
    ),
    array(
        'target' => iibpr_get( 'iibpr_stats_books', '35' ),
        'suffix' => '+',
        'label'  => 'Livros e Capítulos',
        'icon'   => '<svg class="w-8 h-8 text-iibpr-green mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>',
    ),
    array(
        'target' => iibpr_get( 'iibpr_stats_congresses', '50' ),
        'suffix' => '+',
        'label'  => 'Congressos e Eventos',
        'icon'   => '<svg class="w-8 h-8 text-iibpr-green mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>',
    ),
);
?>
<section id="pesquisa" class="section-padding relative overflow-hidden text-white"
         style="background-image: linear-gradient(135deg, rgba(64,72,86,0.92) 0%, rgba(58,90,42,0.88) 100%), url('<?php echo esc_url( $img_base . 'mauro-palestra.png' ); ?>'); background-size: cover; background-position: center;">
	<div class="container-narrow relative z-10">

		<div class="text-center mb-14 fade-up">
			<p class="section-label text-green-300">Pesquisa</p>
			<h2 class="section-title text-white">Produção Científica</h2>
			<p class="section-subtitle text-gray-300">Contribuições para o avanço da psicomotricidade relacional.</p>
		</div>

		<div class="grid md:grid-cols-3 gap-8 text-center">
			<?php foreach ( $stats as $i => $stat ) : ?>
			<div class="fade-up fade-up-delay-<?php echo $i + 1; ?>">
				<?php echo $stat['icon']; ?>
				<div class="stat-number counter-animate text-white" data-target="<?php echo esc_attr( $stat['target'] ); ?>" data-suffix="<?php echo esc_attr( $stat['suffix'] ); ?>">
					0<?php echo esc_html( $stat['suffix'] ); ?>
				</div>
				<div class="stat-label text-gray-300"><?php echo esc_html( $stat['label'] ); ?></div>
			</div>
			<?php endforeach; ?>
		</div>

		<!-- Mauro Vecchiato book highlight -->
		<div class="mt-16 flex flex-col md:flex-row items-center gap-8 bg-white/10 backdrop-blur rounded-2xl p-8 fade-up">
			<img src="<?php echo esc_url( $img_base . 'livro-mauro.png' ); ?>" alt="Livro Prof. Dr. Mauro Vecchiato"
			     class="w-32 h-auto rounded-lg shadow-xl flex-shrink-0" loading="lazy">
			<div>
				<h3 class="text-xl font-bold mb-2">Prof. Dr. Mauro Vecchiato</h3>
				<p class="text-gray-300 leading-relaxed">Diretor Científico do IIPR (Itália) e referência mundial em Psicomotricidade Relacional Psicodinâmica. Autor de obras fundamentais sobre a intervenção psicocorporal.</p>
			</div>
			<img src="<?php echo esc_url( $img_base . 'mauro-quadrado.jpg' ); ?>" alt="Prof. Dr. Mauro Vecchiato"
			     class="w-24 h-24 rounded-full object-cover border-3 border-white/30 flex-shrink-0 hidden md:block" loading="lazy">
		</div>

		<div class="text-center mt-12 fade-up">
			<a href="<?php echo esc_url( site_url( '/pesquisa' ) ); ?>" class="btn-secondary border-white text-white hover:bg-white hover:text-gray-900">
				Ver Publicações
			</a>
		</div>

	</div>
</section>

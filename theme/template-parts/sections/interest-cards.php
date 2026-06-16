<?php
/**
 * Template Part: Interest Cards — "Para quem é o IIBPR?"
 * Now with real action photos instead of SVG icons
 */
$img_base = get_template_directory_uri() . '/images/';
$cards = array(
    array(
        'image' => iibpr_get( 'iibpr_interest_card_1_image', $img_base . 'para-quem-educadores.jpg' ),
        'title' => iibpr_get( 'iibpr_interest_card_1_title', 'Educadores' ),
        'desc'  => iibpr_get( 'iibpr_interest_card_1_desc', 'Professores e pedagogos que desejam ampliar suas ferramentas de intervenção com o corpo e o movimento.' ),
    ),
    array(
        'image' => iibpr_get( 'iibpr_interest_card_2_image', $img_base . 'para-quem-saude.jpg' ),
        'title' => iibpr_get( 'iibpr_interest_card_2_title', 'Profissionais de Saúde' ),
        'desc'  => iibpr_get( 'iibpr_interest_card_2_desc', 'Psicólogos, fisioterapeutas e terapeutas ocupacionais em busca de abordagens corporais e relacionais.' ),
    ),
    array(
        'image' => iibpr_get( 'iibpr_interest_card_3_image', $img_base . 'para-quem-estudantes.jpg' ),
        'title' => iibpr_get( 'iibpr_interest_card_3_title', 'Estudantes' ),
        'desc'  => iibpr_get( 'iibpr_interest_card_3_desc', 'Graduandos em psicologia, educação e áreas da saúde que buscam formação complementar.' ),
    ),
    array(
        'image' => iibpr_get( 'iibpr_interest_card_4_image', $img_base . 'para-quem-pesquisadores.jpg' ),
        'title' => iibpr_get( 'iibpr_interest_card_4_title', 'Pesquisadores' ),
        'desc'  => iibpr_get( 'iibpr_interest_card_4_desc', 'Acadêmicos interessados em pesquisa científica sobre corpo, movimento e relação.' ),
    ),
);
?>
<section id="para-quem" class="section-padding bg-warm-white">
	<div class="container-narrow">
		<div class="text-center mb-14">
			<p class="section-label interest-label"><?php echo esc_html( iibpr_get( 'iibpr_interest_label', 'Para Quem' ) ); ?></p>
			<h2 class="section-title interest-title"><?php echo wp_kses_post( iibpr_get( 'iibpr_interest_title', 'Para quem é o IIBPR?' ) ); ?></h2>
			<p class="section-subtitle interest-subtitle"><?php echo wp_kses_post( iibpr_get( 'iibpr_interest_subtitle', 'Nossos cursos atendem profissionais e estudantes de diversas áreas.' ) ); ?></p>
		</div>

		<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
			<?php foreach ( $cards as $i => $card ) : ?>
			<div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 fade-up fade-up-delay-<?php echo $i + 1; ?> flex flex-col h-full">
				<!-- Photo zone with gradient overlay -->
				<div class="relative h-44 overflow-hidden flex-shrink-0">
					<img src="<?php echo esc_url( $card['image'] ); ?>" alt="<?php echo esc_attr( $card['title'] ); ?>"
					     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
					<!-- Gradient overlay: bottom fade to green -->
					<div class="absolute inset-0 pointer-events-none" style="background: linear-gradient(to bottom, transparent, rgba(108,179,80,0.2) 50%, rgba(108,179,80,0.7));"></div>
					<!-- Title overlay on gradient -->
					<div class="absolute bottom-0 left-0 right-0 p-4">
						<h3 class="text-lg font-bold text-white interest-card-<?php echo $i + 1; ?>-title"><?php echo esc_html( $card['title'] ); ?></h3>
					</div>
				</div>
				<!-- Description below photo -->
				<div class="p-5 flex-1 flex flex-col">
					<p class="text-gray-600 text-sm leading-relaxed flex-1 interest-card-<?php echo $i + 1; ?>-desc"><?php echo esc_html( $card['desc'] ); ?></p>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

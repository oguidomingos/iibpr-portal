<?php
/**
 * Template Part: Interest Cards — "Para quem é o IIBPR?"
 * Now with real action photos instead of SVG icons
 */
$img_base = get_template_directory_uri() . '/images/';
$cards = array(
    array(
        'image' => $img_base . 'content-01.jpg',
        'title' => 'Educadores',
        'desc'  => 'Professores e pedagogos que desejam ampliar suas ferramentas de intervenção com o corpo e o movimento.',
    ),
    array(
        'image' => $img_base . 'content-02.jpg',
        'title' => 'Profissionais de Saúde',
        'desc'  => 'Psicólogos, fisioterapeutas e terapeutas ocupacionais em busca de abordagens corporais e relacionais.',
    ),
    array(
        'image' => $img_base . 'bg-criancas.jpg',
        'title' => 'Estudantes',
        'desc'  => 'Graduandos em psicologia, educação e áreas da saúde que buscam formação complementar.',
    ),
    array(
        'image' => $img_base . 'content-05.jpg',
        'title' => 'Pesquisadores',
        'desc'  => 'Acadêmicos interessados em pesquisa científica sobre corpo, movimento e relação.',
    ),
);
?>
<section id="para-quem" class="section-padding bg-warm-white">
	<div class="container-narrow">
		<div class="text-center mb-14">
			<p class="section-label">Para Quem</p>
			<h2 class="section-title">Para quem é o IIBPR?</h2>
			<p class="section-subtitle">Nossos cursos atendem profissionais e estudantes de diversas áreas.</p>
		</div>

		<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
			<?php foreach ( $cards as $i => $card ) : ?>
			<div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 fade-up fade-up-delay-<?php echo $i + 1; ?>">
				<div class="h-44 overflow-hidden">
					<img src="<?php echo esc_url( $card['image'] ); ?>" alt="<?php echo esc_attr( $card['title'] ); ?>"
					     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
				</div>
				<div class="p-5">
					<h3 class="text-lg font-bold text-gray-900 mb-2"><?php echo esc_html( $card['title'] ); ?></h3>
					<p class="text-gray-600 text-sm leading-relaxed"><?php echo esc_html( $card['desc'] ); ?></p>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

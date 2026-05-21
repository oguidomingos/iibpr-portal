<?php
/**
 * Template Name: Pesquisa
 * Template Post Type: page
 */
get_header(); ?>

<main id="main" class="site-main">

	<!-- Hero -->
	<?php
	$img     = get_template_directory_uri() . '/images/';
	$hero_bg = iibpr_get( 'iibpr_pesquisa_hero_bg' );
	?>
	<section id="pesquisa-hero" class="py-20 px-4 md:px-8 text-white text-center -mt-[72px] pt-[92px] relative overflow-hidden"
	         style="background-image: linear-gradient(135deg, rgba(64,72,86,0.88) 0%, rgba(58,90,42,0.82) 100%), url('<?php echo $hero_bg ? esc_url( $hero_bg ) : esc_url( $img . 'acao-grupo-6.jpg' ); ?>'); background-size: cover; background-position: center;">
		<div class="max-w-4xl mx-auto relative z-10">
			<h1 class="text-4xl md:text-5xl font-extrabold mb-4 page-hero-title"><?php echo esc_html( iibpr_get( 'iibpr_pesquisa_hero_title', 'Pesquisa Científica' ) ); ?></h1>
			<p class="text-xl opacity-90 page-hero-subtitle"><?php echo esc_html( iibpr_get( 'iibpr_pesquisa_hero_subtitle', 'Contribuições para o avanço da psicomotricidade relacional no Brasil e no mundo.' ) ); ?></p>
		</div>
	</section>

	<!-- Researchers Profiles -->
	<section class="section-padding bg-white">
		<div class="container-narrow">
			<div class="text-center mb-14">
				<p class="section-label">Pesquisadores</p>
				<h2 class="section-title">As Pessoas por Trás da Pesquisa</h2>
				<p class="section-subtitle">Conheça os pesquisadores que desenvolvem a metodologia IIBPR com rigor científico.</p>
			</div>

			<?php
			$img = get_template_directory_uri() . '/images/';
			$researchers = array(
				array(
					'name'        => 'Dra. Fabiane Alves Crispim',
					'role'        => 'Fundadora e Pesquisadora-Chefe',
					'photo'       => iibpr_get( 'iibpr_founder_1_photo' ) ?: $img . 'fabiane2.png',
					'education'   => 'Pedagogia • Psicopedagogia • Mestrado em Psicomotricidade (Universidade de Évora, Portugal)',
					'research'    => 'Psicomotricidade Relacional Psicodinâmica • Desenvolvimento Integral Infantil • Educação Somática',
					'bio'         => 'Com mais de 19 anos dedicados ao estudo e desenvolvimento da Psicomotricidade Relacional, Fabiane é referência na região Centro-Oeste. Sua pesquisa integra saberes da educação, psicologia e neurociência para propor intervenções baseadas em evidências científicas.',
					'lattes'      => 'https://lattes.cnpq.br/',
				),
				array(
					'name'        => 'Dr. Augusto Parras Albuquerque',
					'role'        => 'Pesquisador-Colaborador',
					'photo'       => iibpr_get( 'iibpr_founder_2_photo' ) ?: $img . 'augusto2.jpg',
					'education'   => 'Educação Física • Mestrado em Educação (UnB) • Doutoramento em Psicomotricidade (Europa)',
					'research'    => 'Psicomotricidade em Populações Atípicas • Neuroplasticidade Corporal • Intervenção Motora Adaptada',
					'bio'         => 'Especialista em trabalhos com populações em situação de vulnerabilidade, deficiência e transtornos do desenvolvimento. Suas pesquisas focam na aplicabilidade prática da Psicomotricidade Relacional em contextos educacionais e clínicos desafiadores.',
					'lattes'      => 'https://lattes.cnpq.br/',
				),
			);
			?>

			<div class="grid md:grid-cols-2 gap-10">
				<?php foreach ( $researchers as $researcher ) : ?>
				<div class="bg-gray-50 rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow flex flex-col">
					<!-- Photo -->
					<div class="h-72 overflow-hidden bg-gray-200">
						<img src="<?php echo esc_url( $researcher['photo'] ); ?>" alt="<?php echo esc_attr( $researcher['name'] ); ?>"
						     class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" loading="lazy">
					</div>

					<!-- Content -->
					<div class="p-8 flex flex-col flex-1">
						<!-- Name and Role -->
						<h3 class="text-xl font-bold text-gray-900"><?php echo esc_html( $researcher['name'] ); ?></h3>
						<p class="text-iibpr-green font-semibold mb-4"><?php echo esc_html( $researcher['role'] ); ?></p>

						<!-- Bio -->
						<p class="text-gray-600 leading-relaxed text-sm mb-5 flex-1">
							<?php echo esc_html( $researcher['bio'] ); ?>
						</p>

						<!-- Education -->
						<div class="mb-5 border-t border-gray-200 pt-4">
							<p class="text-xs text-gray-400 font-semibold mb-2">FORMAÇÃO</p>
							<p class="text-sm text-gray-600"><?php echo esc_html( $researcher['education'] ); ?></p>
						</div>

						<!-- Research Areas -->
						<div class="mb-5">
							<p class="text-xs text-gray-400 font-semibold mb-2">LINHAS DE PESQUISA</p>
							<p class="text-sm text-gray-600"><?php echo esc_html( $researcher['research'] ); ?></p>
						</div>

						<!-- Lattes Link -->
						<a href="<?php echo esc_url( $researcher['lattes'] ); ?>" target="_blank" rel="noopener" class="text-iibpr-green font-semibold text-sm no-underline hover:underline inline-block">
							Currículo Lattes →
						</a>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- Stats -->
	<section class="section-padding bg-iibpr-charcoal text-white">
		<div class="container-narrow">
			<div class="grid md:grid-cols-3 gap-8 text-center">
				<div class="fade-up">
					<div class="text-5xl font-extrabold text-iibpr-green mb-2"><?php echo esc_html( iibpr_get( 'iibpr_stats_articles', '120' ) ); ?>+</div>
					<div class="text-white/80 font-medium">Artigos Publicados</div>
				</div>
				<div class="fade-up fade-up-delay-1">
					<div class="text-5xl font-extrabold text-iibpr-green mb-2"><?php echo esc_html( iibpr_get( 'iibpr_stats_books', '35' ) ); ?>+</div>
					<div class="text-white/80 font-medium">Livros e Capítulos</div>
				</div>
				<div class="fade-up fade-up-delay-2">
					<div class="text-5xl font-extrabold text-iibpr-green mb-2"><?php echo esc_html( iibpr_get( 'iibpr_stats_congresses', '50' ) ); ?>+</div>
					<div class="text-white/80 font-medium">Congressos e Eventos</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Publicações -->
	<section class="section-padding bg-gray-50">
		<div class="container-narrow">
			<div class="text-center mb-14">
				<p class="section-label">Publicações</p>
				<h2 class="section-title">Do Corpo à Ciência</h2>
				<p class="section-subtitle">Artigos, livros e produções científicas do IIBPR sobre psicomotricidade relacional.</p>
			</div>
			<?php
			$all_posts = new WP_Query( array(
			    'post_type'      => 'post',
			    'posts_per_page' => 6,
			) );
			if ( $all_posts->have_posts() ) : ?>
			<div class="grid md:grid-cols-3 gap-8">
				<?php while ( $all_posts->have_posts() ) : $all_posts->the_post(); ?>
				<article class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-shadow card-hover">
					<?php if ( has_post_thumbnail() ) : ?>
					<div class="h-40 overflow-hidden">
						<?php the_post_thumbnail( 'medium', array( 'class' => 'w-full h-full object-cover', 'loading' => 'lazy' ) ); ?>
					</div>
					<?php endif; ?>
					<div class="p-6">
						<h3 class="text-base font-bold text-gray-900 mb-2 line-clamp-2">
							<a href="<?php the_permalink(); ?>" class="no-underline text-gray-900 hover:text-iibpr-green transition-colors"><?php the_title(); ?></a>
						</h3>
						<p class="text-sm text-gray-500 mb-2"><?php echo get_the_date( 'd/m/Y' ); ?></p>
						<p class="text-gray-600 text-sm leading-relaxed line-clamp-3"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?></p>
					</div>
				</article>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
			<?php endif; ?>
		</div>
	</section>

	<!-- CTA -->
	<?php get_template_part( 'template-parts/sections/cta' ); ?>

</main>

<?php get_footer(); ?>

<?php
/**
 * Template Name: Psicomotricidade
 * Template Post Type: page
 */
get_header(); ?>

<main id="main" class="site-main">

	<!-- Hero with real photo -->
	<?php $img = get_template_directory_uri() . '/images/'; ?>
	<section class="py-20 px-4 md:px-8 text-white text-center -mt-[72px] pt-[92px] relative overflow-hidden"
	         style="background-image: linear-gradient(135deg, rgba(64,72,86,0.88) 0%, rgba(58,90,42,0.82) 100%), url('<?php echo esc_url( $img . 'services-banner.jpg' ); ?>'); background-size: cover; background-position: center;">
		<div class="max-w-4xl mx-auto relative z-10">
			<h1 class="text-4xl md:text-5xl font-extrabold mb-4">O que é Psicomotricidade Relacional Psicodinâmica?</h1>
			<p class="text-xl opacity-90">O estudo do Ser Humano através do seu corpo em movimento e em relação ao seu mundo interno e externo.</p>
		</div>
	</section>

	<!-- What is PRP -->
	<section class="py-20 px-4 md:px-8 bg-white">
		<div class="max-w-4xl mx-auto">
			<div class="grid md:grid-cols-2 gap-12 items-center">
				<div>
					<p class="section-label">Conceito</p>
					<h2 class="text-3xl font-extrabold text-gray-900 mt-2">Entendendo a PRP</h2>
					<div class="text-gray-600 text-lg leading-relaxed mt-4 space-y-4">
						<p>A Psicomotricidade Relacional Psicodinâmica é uma abordagem que proporciona uma visão global do ser humano, integrando corpo, mente, emoções e relações sociais.</p>
						<p>Fundamentada na metodologia do Prof. Dr. Mauro Vecchiato e do Istituto Italiano di Psicologia della Relazione (IIPR), a abordagem utiliza o jogo espontâneo e a expressividade corporal como ferramentas de intervenção.</p>
						<p>A PRP oferece bem-estar, expressão genuína, autodescoberta, desbloqueio emocional e desenvolvimento integrado.</p>
					</div>
				</div>
				<div>
					<img src="<?php echo esc_url( $img . 'acao-movimento-6.jpg' ); ?>" alt="Psicomotricidade em ação"
					     class="rounded-2xl shadow-lg w-full h-80 object-cover" loading="lazy">
				</div>
			</div>
		</div>
	</section>

	<!-- Three Pillars -->
	<section class="py-20 px-4 md:px-8 bg-gray-50">
		<div class="max-w-4xl mx-auto">
			<div class="text-center mb-14">
				<p class="section-label">Fundamentos</p>
				<h2 class="text-3xl font-extrabold text-gray-900 mt-2">Os Três Pilares</h2>
			</div>
			<div class="grid md:grid-cols-3 gap-8">
				<div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all border border-gray-100">
					<div class="h-44 overflow-hidden">
						<img src="<?php echo esc_url( $img . 'acao-movimento-1.jpg' ); ?>" alt="Psicomotricidade" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
					</div>
					<div class="p-6 border-t-4 border-iibpr-green">
						<h3 class="text-xl font-bold text-gray-900 mb-3">Psicomotricidade</h3>
						<p class="text-gray-600 leading-relaxed text-sm">O estudo do Ser Humano através do seu corpo em movimento e em relação ao seu mundo interno e externo. — Associação Brasileira de Psicomotricidade (ABP)</p>
					</div>
				</div>
				<div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all border border-gray-100">
					<div class="h-44 overflow-hidden">
						<img src="<?php echo esc_url( $img . 'acao-grupo-2.jpg' ); ?>" alt="Relacional" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
					</div>
					<div class="p-6 border-t-4 border-iibpr-green">
						<h3 class="text-xl font-bold text-gray-900 mb-3">Relacional</h3>
						<p class="text-gray-600 leading-relaxed text-sm">Somos seres relacionais e as relações humanas são vitais para nosso ajustamento socioemocional e capacidade de autorregulação.</p>
					</div>
				</div>
				<div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all border border-gray-100">
					<div class="h-44 overflow-hidden">
						<img src="<?php echo esc_url( $img . 'acao-formacao-1.jpg' ); ?>" alt="Psicodinâmica" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
					</div>
					<div class="p-6 border-t-4 border-iibpr-green">
						<h3 class="text-xl font-bold text-gray-900 mb-3">Psicodinâmica</h3>
						<p class="text-gray-600 leading-relaxed text-sm">Nossos conflitos internos e inconscientes, geralmente estão ligados à nossa infância e podem ser elaborados, de maneira poderosa, por meio da intervenção psicocorporal.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Scientific Bases / Mauro Vecchiato -->
	<section class="py-20 px-4 md:px-8 bg-white">
		<div class="max-w-4xl mx-auto">
			<div class="text-center mb-14">
				<p class="section-label">Bases Científicas</p>
				<h2 class="text-3xl font-extrabold text-gray-900 mt-2">Metodologia Prof. Dr. Mauro Vecchiato</h2>
			</div>

			<!-- Mauro Card -->
			<div class="bg-gray-50 rounded-2xl p-8 md:flex md:items-center md:gap-8 mb-12">
				<div class="w-40 h-40 rounded-full overflow-hidden flex-shrink-0 mx-auto md:mx-0 mb-6 md:mb-0">
					<img src="<?php echo esc_url( $img . 'mauro-quadrado.jpg' ); ?>" alt="Prof. Dr. Mauro Vecchiato"
					     class="w-full h-full object-cover" loading="lazy">
				</div>
				<div>
					<h3 class="text-xl font-bold text-gray-900">Prof. Dr. Mauro Vecchiato</h3>
					<p class="text-green-600 font-medium mb-3">Diretor Científico — IIPR Itália</p>
					<p class="text-gray-600 leading-relaxed text-sm">Nascido em Veneza, formado em educação física e psicologia, com especialização em educação e terapia. Psicanalista e com formação em Psicomotricidade Relacional (André Lapierre), é uma das vozes mais originais na área da psicomotricidade na Itália. Diretor do Istituto Italiano di Psicologia della Relazione, ensina reabilitação e semiótica psicomotora na Universidade de Pádova. Coordena cursos de formação na Itália, na Espanha e em países da América do Sul. Autor de vários livros sobre psicomotricidade e desenvolvimento saudável da criança.</p>
				</div>
			</div>
		</div>
	</section>

	<!-- Where it applies — 3 areas -->
	<section class="py-20 px-4 md:px-8 bg-gray-50">
		<div class="max-w-4xl mx-auto">
			<div class="text-center mb-14">
				<p class="section-label">Áreas de Atuação</p>
				<h2 class="text-3xl font-extrabold text-gray-900 mt-2">Onde Atua a PRP</h2>
			</div>
			<div class="grid md:grid-cols-3 gap-8">
				<div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all border border-gray-100">
					<div class="h-40 overflow-hidden">
						<img src="<?php echo esc_url( $img . 'bg-criancas.jpg' ); ?>" alt="Educação" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
					</div>
					<div class="p-6">
						<h3 class="text-xl font-bold text-gray-900 mb-3">Educação</h3>
						<p class="text-gray-600 leading-relaxed text-sm">Escolas, creches e projetos socioeducativos. Desenvolvimento de habilidades socioemocionais e psicomotoras.</p>
					</div>
				</div>
				<div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all border border-gray-100">
					<div class="h-40 overflow-hidden">
						<img src="<?php echo esc_url( $img . 'criancas-brincando.jpg' ); ?>" alt="Prevenção" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
					</div>
					<div class="p-6">
						<h3 class="text-xl font-bold text-gray-900 mb-3">Prevenção</h3>
						<p class="text-gray-600 leading-relaxed text-sm">Estimulação precoce, acompanhamento do desenvolvimento infantil e intervenção preventiva.</p>
					</div>
				</div>
				<div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all border border-gray-100">
					<div class="h-40 overflow-hidden">
						<img src="<?php echo esc_url( $img . 'content-03.jpg' ); ?>" alt="Terapia" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
					</div>
					<div class="p-6">
						<h3 class="text-xl font-bold text-gray-900 mb-3">Terapia</h3>
						<p class="text-gray-600 leading-relaxed text-sm">Intervenção clínica com crianças com problemas do desenvolvimento e neurodesenvolvimento, questões comportamentais e emocionais.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Health & Well-being -->
	<section class="py-20 px-4 md:px-8 bg-white">
		<div class="max-w-4xl mx-auto text-center">
			<p class="section-label">Saúde e Bem-Estar</p>
			<h2 class="text-3xl font-extrabold text-gray-900 mt-2 mb-6">Viva o bem-estar e potencialize-se</h2>
			<p class="text-gray-600 text-lg leading-relaxed max-w-2xl mx-auto mb-10">A abordagem Psicomotora Relacional Psicodinâmica proporciona uma visão global do ser humano. Bem-estar, expressão genuína, autodescoberta, desbloqueio emocional e desenvolvimento integrado.</p>

			<div class="grid md:grid-cols-2 gap-8 text-left">
				<div class="benefit-card">
					<h3 class="text-lg font-bold text-gray-900 mb-2">Valorização das Potencialidades</h3>
					<p class="text-gray-600 text-sm">Foco nos aspectos positivos para construir/reconstruir uma autoimagem saudável e superar déficits.</p>
				</div>
				<div class="benefit-card">
					<h3 class="text-lg font-bold text-gray-900 mb-2">Autoconhecimento</h3>
					<p class="text-gray-600 text-sm">Expressão de sentimentos inconscientes por meio das imagens mentais inscritas no corpo.</p>
				</div>
				<div class="benefit-card">
					<h3 class="text-lg font-bold text-gray-900 mb-2">Progresso Relacional e Comunicativo</h3>
					<p class="text-gray-600 text-sm">Superação de dificuldades de interação em ambiente acolhedor.</p>
				</div>
				<div class="benefit-card">
					<h3 class="text-lg font-bold text-gray-900 mb-2">Vivência Corporal</h3>
					<p class="text-gray-600 text-sm">Novas experiências que estimulam a espontaneidade e melhoram o desempenho psicomotor.</p>
				</div>
			</div>
		</div>
	</section>

	<!-- Training Structure -->
	<section class="py-20 px-4 md:px-8 bg-gray-50">
		<div class="max-w-4xl mx-auto">
			<div class="text-center mb-14">
				<p class="section-label">Estrutura</p>
				<h2 class="text-3xl font-extrabold text-gray-900 mt-2">Estrutura da Formação — Ano Propedêutico</h2>
			</div>

			<div class="space-y-8">
				<!-- Curso Vivencial -->
				<div class="bg-white rounded-xl p-8 shadow-sm border border-gray-100">
					<h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-3">
						<span class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center text-green-600 font-bold">A</span>
						Curso Vivencial
					</h3>
					<div class="grid sm:grid-cols-2 md:grid-cols-4 gap-4">
						<div class="bg-green-50 rounded-lg p-4 text-center">
							<div class="font-bold text-gray-900">Módulo I</div>
							<div class="text-sm text-gray-500">40 horas</div>
						</div>
						<div class="bg-green-50 rounded-lg p-4 text-center">
							<div class="font-bold text-gray-900">Módulo II</div>
							<div class="text-sm text-gray-500">40 horas</div>
						</div>
						<div class="bg-green-50 rounded-lg p-4 text-center">
							<div class="font-bold text-gray-900">Módulo III</div>
							<div class="text-sm text-gray-500">40 horas</div>
						</div>
						<div class="bg-green-50 rounded-lg p-4 text-center">
							<div class="font-bold text-gray-900">Módulo IV</div>
							<div class="text-sm text-gray-500">40 horas</div>
						</div>
					</div>
				</div>

				<!-- Seminário Semiótico -->
				<div class="bg-white rounded-xl p-8 shadow-sm border border-gray-100">
					<h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-3">
						<span class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center text-green-600 font-bold">B</span>
						Seminário Semiótico
					</h3>
					<ul class="space-y-3 text-gray-600">
						<li class="flex items-start gap-2">
							<svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
							O Jogo espontâneo e a Relação Psicomotora Complexa 1
						</li>
						<li class="flex items-start gap-2">
							<svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
							A Relação Psicomotora Complexa 2
						</li>
						<li class="flex items-start gap-2">
							<svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
							O Jogo Psicomotor e suas tipologias
						</li>
					</ul>
				</div>

				<!-- Seminário Teórico -->
				<div class="bg-white rounded-xl p-8 shadow-sm border border-gray-100">
					<h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-3">
						<span class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center text-green-600 font-bold">C</span>
						Seminário Teórico
					</h3>
					<ul class="space-y-3 text-gray-600">
						<li class="flex items-start gap-2">
							<svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
							Psicomotricidade e relacionamento psicomotor, conceitos teóricos básicos e sua aplicação no campo educacional, preventivo e terapêutico
						</li>
						<li class="flex items-start gap-2">
							<svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
							Psicomotricidade e desenvolvimento psicomotor da criança: normalidade e patologia, abordagem diferente e aplicação prática
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<!-- Professions -->
	<section class="py-20 px-4 md:px-8 bg-white">
		<div class="max-w-4xl mx-auto">
			<div class="text-center mb-10">
				<p class="section-label">Profissionais</p>
				<h2 class="text-3xl font-extrabold text-gray-900 mt-2">Para Quais Profissões</h2>
			</div>
			<div class="flex flex-wrap justify-center gap-3">
				<?php
				$professions = array( 'Pedagogos', 'Psicólogos', 'Fisioterapeutas', 'Terapeutas Ocupacionais', 'Fonoaudiólogos', 'Educadores Físicos', 'Médicos', 'Enfermeiros', 'Assistentes Sociais', 'Psicopedagogos' );
				foreach ( $professions as $prof ) : ?>
				<span class="bg-green-50 text-green-700 px-5 py-2 rounded-full text-sm font-medium"><?php echo esc_html( $prof ); ?></span>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- CTA -->
	<section class="py-24 px-4 md:px-8 bg-gradient-to-br from-green-700 via-green-600 to-green-500 text-white text-center">
		<div class="max-w-3xl mx-auto">
			<h2 class="text-3xl md:text-4xl font-extrabold mb-6">Inicie sua Formação em PRP</h2>
			<p class="text-xl opacity-90 mb-8">Conheça nossos cursos e formações em Psicomotricidade Relacional Psicodinâmica.</p>
			<div class="flex flex-col sm:flex-row gap-4 justify-center">
				<a href="<?php echo esc_url( site_url( '/cursos' ) ); ?>"
				   class="bg-white text-green-700 px-10 py-4 rounded-full text-lg font-bold hover:bg-gray-100 shadow-2xl transition-all hover:-translate-y-1">
					Ver Cursos
				</a>
				<a href="https://wa.me/5561991572149" target="_blank" rel="noopener"
				   class="border-2 border-white/70 text-white px-10 py-4 rounded-full text-lg font-semibold hover:bg-white/10 transition-all inline-flex items-center justify-center gap-2">
					<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
					Fale Conosco
				</a>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>

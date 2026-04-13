<?php
/**
 * Template Name: Sobre o Instituto
 * Template Post Type: page
 */
get_header();
$img = get_template_directory_uri() . '/images/';
?>

<main id="main" class="site-main">

	<!-- Hero with real photo background -->
	<section class="py-20 px-4 md:px-8 text-white text-center -mt-[72px] pt-[92px] relative overflow-hidden"
	         style="background-image: linear-gradient(135deg, rgba(64,72,86,0.88) 0%, rgba(58,90,42,0.82) 100%), url('<?php echo esc_url( $img . 'aboutus-banner.jpg' ); ?>'); background-size: cover; background-position: center;">
		<div class="max-w-4xl mx-auto relative z-10">
			<h1 class="text-4xl md:text-5xl font-extrabold mb-4">Quem Somos</h1>
			<p class="text-xl opacity-90">Nossa história, missão e as pessoas por trás do IIBPR.</p>
		</div>
	</section>

	<!-- History with real photo -->
	<section class="py-20 px-4 md:px-8 bg-white">
		<div class="max-w-5xl mx-auto">
			<div class="grid md:grid-cols-2 gap-12 items-center">
				<div>
					<p class="section-label">Nossa História</p>
					<h2 class="text-3xl font-extrabold text-gray-900 mt-2">De Brasília para o Mundo</h2>
					<div class="text-gray-600 text-lg leading-relaxed mt-4 space-y-4">
						<p>O IIBPR nasce da necessidade de atender à grande demanda na área da Psicomotricidade no Brasil, principalmente no Centro Oeste. Ele surge também da história inspiradora de grande valor que a formação pessoal teve na vida dos sócios por meio do Istituto Italiano di Psicologia della Relazione (IIPR — Itália) e do Instituto Viver de Psicomotricidade — MG.</p>
						<p>O Instituto dá vida tanto à entrega de atendimentos diversificados nas áreas da Psicologia e da Psicomotricidade, quanto à formação nas áreas.</p>
					</div>
				</div>
				<div>
					<img src="<?php echo esc_url( $img . 'quem-somos.png' ); ?>" alt="Equipe IIBPR"
					     class="rounded-2xl shadow-lg w-full" loading="lazy">
				</div>
			</div>
		</div>
	</section>

	<!-- What We Do with action photo strip -->
	<section class="py-20 px-4 md:px-8 bg-gray-50">
		<div class="max-w-5xl mx-auto">
			<div class="grid md:grid-cols-5 gap-8">
				<div class="md:col-span-3">
					<p class="section-label">O Que Fazemos</p>
					<h2 class="text-3xl font-extrabold text-gray-900 mt-2 mb-6">Atendimento e Formação</h2>
					<div class="text-gray-600 text-lg leading-relaxed space-y-4">
						<p>Somos uma instituição voltada tanto para atendimentos em psicoterapia e em psicomotricidade, quanto para a formação especializada de profissionais em Psicomotricidade Relacional Psicodinâmica.</p>
						<p>No atendimento psicoterapêutico, o ambiente de acolhimento e a crença que cada pessoa possui a capacidade para construir suas próprias alternativas para uma vida mais saudável, pautam nossa atuação.</p>
						<p>Nossa intervenção psicomotora tem impactado positivamente a vida das pessoas. Contempla todas as fases do desenvolvimento humano, do bebê, crianças, adolescência, adultos e idosos.</p>
					</div>
				</div>
				<div class="md:col-span-2 grid grid-cols-2 gap-3">
					<div class="rounded-xl overflow-hidden aspect-square">
						<img src="<?php echo esc_url( $img . 'acao-movimento-1.jpg' ); ?>" alt="Vivência corporal" class="w-full h-full object-cover" loading="lazy">
					</div>
					<div class="rounded-xl overflow-hidden aspect-square">
						<img src="<?php echo esc_url( $img . 'acao-grupo-2.jpg' ); ?>" alt="Atividade em grupo" class="w-full h-full object-cover" loading="lazy">
					</div>
					<div class="rounded-xl overflow-hidden aspect-square">
						<img src="<?php echo esc_url( $img . 'acao-formacao-2.jpg' ); ?>" alt="Formação" class="w-full h-full object-cover" loading="lazy">
					</div>
					<div class="rounded-xl overflow-hidden aspect-square">
						<img src="<?php echo esc_url( $img . 'bg-criancas.jpg' ); ?>" alt="Crianças" class="w-full h-full object-cover" loading="lazy">
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Mission / Vision / Values -->
	<section class="py-20 px-4 md:px-8 bg-white">
		<div class="max-w-4xl mx-auto">
			<div class="text-center mb-14">
				<p class="section-label">Propósito</p>
				<h2 class="text-3xl font-extrabold text-gray-900 mt-2">Missão, Visão e Valores</h2>
			</div>
			<div class="grid md:grid-cols-3 gap-8">
				<div class="bg-green-50 rounded-2xl p-8 border border-green-100">
					<div class="w-14 h-14 bg-iibpr-green rounded-xl flex items-center justify-center mb-4">
						<svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
					</div>
					<h3 class="text-xl font-bold text-gray-900 mb-3">Missão</h3>
					<p class="text-gray-600 leading-relaxed">Desenvolver pessoas autoconscientes capazes de promover o bem social através da saúde gerada pelo autoconhecimento, pela autorregulação e pela integração Psicocorporal.</p>
				</div>
				<div class="bg-green-50 rounded-2xl p-8 border border-green-100">
					<div class="w-14 h-14 bg-iibpr-green rounded-xl flex items-center justify-center mb-4">
						<svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
					</div>
					<h3 class="text-xl font-bold text-gray-900 mb-3">Visão</h3>
					<p class="text-gray-600 leading-relaxed">Ser referência em Psicomotricidade no Centro-Oeste do Brasil, integrando elementos da cultura brasileira com os saberes globais na perspectiva da intervenção Psicocorporal.</p>
				</div>
				<div class="bg-green-50 rounded-2xl p-8 border border-green-100">
					<div class="w-14 h-14 bg-iibpr-green rounded-xl flex items-center justify-center mb-4">
						<svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
					</div>
					<h3 class="text-xl font-bold text-gray-900 mb-3">Valores</h3>
					<p class="text-gray-600 leading-relaxed">Respeito · Movimento · Consciência · Amor · Ludicidade · Alegria · Visão Holística · Autoconhecimento · Autorregulação · Intercâmbio · Relação</p>
				</div>
			</div>
		</div>
	</section>

	<!-- Founders with real photos -->
	<section class="py-20 px-4 md:px-8 bg-gray-50">
		<div class="max-w-5xl mx-auto">
			<div class="text-center mb-14">
				<p class="section-label">Fundadores</p>
				<h2 class="text-3xl font-extrabold text-gray-900 mt-2">As Pessoas por Trás do IIBPR</h2>
			</div>

			<div class="grid md:grid-cols-2 gap-10 mb-16">
				<!-- Fabiane -->
				<div class="bg-white rounded-2xl shadow-sm overflow-hidden hover:shadow-lg transition-shadow">
					<div class="h-72 overflow-hidden">
						<img src="<?php echo esc_url( $img . 'fabiane2.png' ); ?>" alt="Fabiane Alves Crispim"
						     class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" loading="lazy">
					</div>
					<div class="p-8">
						<h3 class="text-xl font-bold text-gray-900">Fabiane Alves Crispim</h3>
						<p class="text-iibpr-green font-medium mb-4">Presidente do IIBPR · Vice-Presidente ABP Centro-Oeste</p>
						<p class="text-gray-600 leading-relaxed text-sm">A minha história com a Psicomotricidade, já tem maior idade... 19 anos. Foi na graduação em Pedagogia, que senti amor na primeira aula! Ela auxilia crianças e pessoas de todas as idades a reconectarem corpo e mente, buscando o diálogo diário de saúde através da autoconsciência.</p>
						<p class="text-gray-400 text-xs mt-4">Pedagoga, Psicóloga Clínica · Especialização em Psicomotricidade, Gestão Pública e Psicologia Humanista · Mestranda — UÉvora · Formação pelo Instituto Viver MG e IIPR Veneza.</p>
					</div>
				</div>
				<!-- Augusto -->
				<div class="bg-white rounded-2xl shadow-sm overflow-hidden hover:shadow-lg transition-shadow">
					<div class="h-72 overflow-hidden">
						<img src="<?php echo esc_url( $img . 'augusto2.jpg' ); ?>" alt="Augusto Parras Albuquerque"
						     class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" loading="lazy">
					</div>
					<div class="p-8">
						<h3 class="text-xl font-bold text-gray-900">Augusto Parras Albuquerque</h3>
						<p class="text-iibpr-green font-medium mb-4">Vice-Presidente do IIBPR · Presidente ABP Centro-Oeste</p>
						<p class="text-gray-600 leading-relaxed text-sm">Desde meu estágio na graduação em Educação Física com pessoas com alguma deficiência ou desenvolvimento atípico, me aproximei da Psicomotricidade e, poucos anos depois, consegui iniciar essa formação que mudou a minha vida.</p>
						<p class="text-gray-400 text-xs mt-4">Psicomotricista Titular ABP · Ed. Física e Psicologia · Mestrado em Educação (UnB) · Doutorando em Motricidade Humana — UÉvora · Formação pelo IIPR.</p>
					</div>
				</div>
			</div>

			<!-- Prof. Dr. Mauro Vecchiato -->
			<div class="bg-white rounded-2xl shadow-sm p-8 md:flex md:items-center md:gap-10">
				<div class="w-44 h-44 rounded-2xl overflow-hidden flex-shrink-0 mx-auto md:mx-0 mb-6 md:mb-0">
					<img src="<?php echo esc_url( $img . 'mauro-quadrado.jpg' ); ?>" alt="Prof. Dr. Mauro Vecchiato"
					     class="w-full h-full object-cover" loading="lazy">
				</div>
				<div>
					<h3 class="text-xl font-bold text-gray-900">Prof. Dr. Mauro Vecchiato</h3>
					<p class="text-iibpr-green font-medium mb-3">Diretor Científico — IIPR Itália</p>
					<p class="text-gray-600 leading-relaxed text-sm">Mauro Vecchiato nasceu em Veneza. É formado em educação física e psicologia, com especialização em educação e terapia. Psicanalista e com formação em Psicomotricidade Relacional (André Lapierre), é uma das vozes mais originais na área da psicomotricidade na Itália. Diretor do Istituto Italiano di Psicologia della Relazione, ensina reabilitação e semiótica psicomotora na Universidade de Pádova.</p>
				</div>
				<div class="flex-shrink-0 hidden md:block">
					<img src="<?php echo esc_url( $img . 'livro-mauro.png' ); ?>" alt="Livro Prof. Mauro Vecchiato"
					     class="w-28 h-auto rounded-lg shadow-md" loading="lazy">
				</div>
			</div>
		</div>
	</section>

	<!-- Stats with background -->
	<section class="py-16 px-4 md:px-8 text-white relative overflow-hidden"
	         style="background-image: linear-gradient(135deg, rgba(64,72,86,0.92) 0%, rgba(58,90,42,0.88) 100%), url('<?php echo esc_url( $img . 'acao-grupo-4.jpg' ); ?>'); background-size: cover; background-position: center;">
		<div class="max-w-4xl mx-auto relative z-10">
			<div class="grid sm:grid-cols-2 md:grid-cols-4 gap-8 text-center">
				<div>
					<div class="text-4xl font-extrabold">20+</div>
					<div class="text-gray-300 mt-2">Anos de experiência</div>
				</div>
				<div>
					<div class="text-4xl font-extrabold">1500+</div>
					<div class="text-gray-300 mt-2">Alunos formados</div>
				</div>
				<div>
					<div class="text-4xl font-extrabold">5</div>
					<div class="text-gray-300 mt-2">Países</div>
				</div>
				<div>
					<div class="text-4xl font-extrabold">420h</div>
					<div class="text-gray-300 mt-2">Pós-graduação</div>
				</div>
			</div>
		</div>
	</section>

	<!-- CTA -->
	<section class="py-24 px-4 md:px-8 bg-gradient-to-br from-green-700 via-green-600 to-green-500 text-white text-center">
		<div class="max-w-3xl mx-auto">
			<h2 class="text-3xl md:text-4xl font-extrabold mb-6">Faça Parte da Nossa História</h2>
			<p class="text-xl opacity-90 mb-8">Conheça nossos cursos e formações em Psicomotricidade Relacional Psicodinâmica.</p>
			<a href="https://wa.me/5561991572149" target="_blank" rel="noopener"
			   class="bg-white text-green-700 px-10 py-4 rounded-full text-lg font-bold hover:bg-gray-100 shadow-2xl transition-all hover:-translate-y-1 inline-flex items-center gap-2 no-underline">
				<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
				Fale Conosco via WhatsApp
			</a>
		</div>
	</section>

</main>

<?php get_footer(); ?>

<?php
/**
 * Template Part: Founders Section — Real photos and bios
 */
$img_base = get_template_directory_uri() . '/images/';
?>
<section class="section-padding bg-white">
	<div class="container-narrow">

		<div class="text-center mb-14 fade-up">
			<p class="section-label">Quem Somos</p>
			<h2 class="section-title">Nossos Fundadores</h2>
			<p class="section-subtitle">Profissionais dedicados à psicomotricidade relacional há mais de duas décadas.</p>
		</div>

		<div class="grid md:grid-cols-3 gap-8">

			<!-- Fabiane -->
			<div class="text-center group fade-up fade-up-delay-1">
				<div class="w-40 h-40 mx-auto mb-5 rounded-full overflow-hidden border-4 border-iibpr-green/20 group-hover:border-iibpr-green transition-colors duration-300">
					<img src="<?php echo esc_url( $img_base . 'fabiane2.png' ); ?>" alt="Fabiane Alves Crispim"
					     class="w-full h-full object-cover" loading="lazy">
				</div>
				<h3 class="text-xl font-bold text-gray-900">Fabiane Alves Crispim</h3>
				<p class="text-iibpr-green font-medium text-sm mb-3">Presidente do IIBPR</p>
				<p class="text-gray-600 text-sm leading-relaxed">Pedagoga, Psicóloga, Psicomotricista Relacional. Mestranda em Psicomotricidade pela Universidade de Évora, Portugal.</p>
			</div>

			<!-- Augusto -->
			<div class="text-center group fade-up fade-up-delay-2">
				<div class="w-40 h-40 mx-auto mb-5 rounded-full overflow-hidden border-4 border-iibpr-green/20 group-hover:border-iibpr-green transition-colors duration-300">
					<img src="<?php echo esc_url( $img_base . 'augusto2.jpg' ); ?>" alt="Augusto Parras Albuquerque"
					     class="w-full h-full object-cover" loading="lazy">
				</div>
				<h3 class="text-xl font-bold text-gray-900">Augusto Parras Albuquerque</h3>
				<p class="text-iibpr-green font-medium text-sm mb-3">Vice-Presidente do IIBPR</p>
				<p class="text-gray-600 text-sm leading-relaxed">Presidente da ABP Centro-Oeste. Doutorando em Psicomotricidade pela Universidade de Évora, Portugal.</p>
			</div>

			<!-- Mauro Vecchiato -->
			<div class="text-center group fade-up fade-up-delay-3">
				<div class="w-40 h-40 mx-auto mb-5 rounded-full overflow-hidden border-4 border-iibpr-green/20 group-hover:border-iibpr-green transition-colors duration-300">
					<img src="<?php echo esc_url( $img_base . 'mauro-quadrado.jpg' ); ?>" alt="Prof. Dr. Mauro Vecchiato"
					     class="w-full h-full object-cover" loading="lazy">
				</div>
				<h3 class="text-xl font-bold text-gray-900">Prof. Dr. Mauro Vecchiato</h3>
				<p class="text-iibpr-green font-medium text-sm mb-3">Diretor Científico — IIPR Itália</p>
				<p class="text-gray-600 text-sm leading-relaxed">Referência mundial em Psicomotricidade Relacional Psicodinâmica. Autor de obras fundamentais sobre intervenção psicocorporal.</p>
			</div>

		</div>

		<!-- Team photo strip -->
		<div class="mt-16 fade-up">
			<div class="flex items-center gap-3 overflow-hidden rounded-2xl">
				<div class="flex-1 h-48 overflow-hidden">
					<img src="<?php echo esc_url( $img_base . 'quem-somos-2.png' ); ?>" alt="Equipe IIBPR"
					     class="w-full h-full object-cover" loading="lazy">
				</div>
				<div class="flex-1 h-48 overflow-hidden hidden md:block">
					<img src="<?php echo esc_url( $img_base . 'acao-grupo-6.jpg' ); ?>" alt="Atividade em grupo"
					     class="w-full h-full object-cover" loading="lazy">
				</div>
				<div class="flex-1 h-48 overflow-hidden hidden lg:block">
					<img src="<?php echo esc_url( $img_base . 'acao-formacao-5.jpg' ); ?>" alt="Formação presencial"
					     class="w-full h-full object-cover" loading="lazy">
				</div>
			</div>
		</div>

	</div>
</section>

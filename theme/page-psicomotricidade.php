<?php
/**
 * Template Name: Psicomotricidade
 * Template Post Type: page
 */
get_header();
$img     = get_template_directory_uri() . '/images/';
$hero_bg = iibpr_get( 'iibpr_prp_hero_bg' );
?>

<main id="main" class="site-main">

	<!-- Hero -->
	<section id="prp-hero" class="py-20 px-4 md:px-8 text-white text-center -mt-[72px] pt-[92px] relative overflow-hidden"
	         style="background-image: linear-gradient(135deg, rgba(64,72,86,0.88) 0%, rgba(58,90,42,0.82) 100%), url('<?php echo $hero_bg ? esc_url( $hero_bg ) : esc_url( $img . 'services-banner.jpg' ); ?>'); background-size: cover; background-position: center;">
		<div class="max-w-4xl mx-auto relative z-10">
			<h1 class="text-4xl md:text-5xl font-extrabold mb-4 page-hero-title"><?php echo esc_html( iibpr_get( 'iibpr_prp_hero_title', 'O que é Psicomotricidade Relacional Psicodinâmica?' ) ); ?></h1>
			<p class="text-xl opacity-90 page-hero-subtitle"><?php echo esc_html( iibpr_get( 'iibpr_prp_hero_subtitle', 'O estudo do Ser Humano através do seu corpo em movimento e em relação ao seu mundo interno e externo.' ) ); ?></p>
		</div>
	</section>

	<!-- Conceito / O que é PRP -->
	<section id="prp-conceito" class="py-20 px-4 md:px-8 bg-white">
		<div class="max-w-4xl mx-auto">
			<div class="grid md:grid-cols-2 gap-12 items-center">
				<div>
					<p class="section-label section-label-text"><?php echo esc_html( iibpr_get( 'iibpr_prp_conceito_label', 'Conceito' ) ); ?></p>
					<h2 class="text-3xl font-extrabold text-gray-900 mt-2 section-heading"><?php echo esc_html( iibpr_get( 'iibpr_prp_conceito_title', 'Entendendo a PRP' ) ); ?></h2>
					<div class="text-gray-600 text-lg leading-relaxed mt-4 space-y-4">
						<?php
						$conceito_defaults = array(
							1 => 'A Psicomotricidade Relacional Psicodinâmica (PRP) estuda o ser humano de forma integral — corpo, emoção e relação. Parte do princípio de que o movimento é a primeira linguagem, a via pela qual nos expressamos e nos vinculamos ao mundo.',
							2 => 'Por meio do jogo espontâneo e da expressividade corporal, a PRP favorece o desenvolvimento, a autorregulação emocional e a construção de vínculos saudáveis, em qualquer fase da vida.',
							3 => 'Fundamentada na metodologia do Prof. Dr. Mauro Vecchiato e do Istituto Italiano di Psicologia della Relazione (IIPR), nossa abordagem une rigor teórico e vivência prática.',
						);
						for ( $ti = 1; $ti <= 3; $ti++ ) :
							$tx = iibpr_get( "iibpr_prp_conceito_text_{$ti}", $conceito_defaults[ $ti ] );
							if ( $tx ) : ?><p><?php echo wp_kses_post( $tx ); ?></p><?php endif;
						endfor; ?>
					</div>
				</div>
				<div>
					<?php $conceito_img = iibpr_get( 'iibpr_prp_conceito_image' ); ?>
					<img src="<?php echo $conceito_img ? esc_url( $conceito_img ) : esc_url( $img . 'acao-movimento-6.jpg' ); ?>"
					     alt="Psicomotricidade em ação" class="rounded-2xl shadow-lg w-full h-80 object-cover" loading="lazy">
				</div>
			</div>
		</div>
	</section>

	<!-- Três Pilares -->
	<section id="prp-pilares" class="py-20 px-4 md:px-8 bg-gray-50">
		<div class="max-w-4xl mx-auto">
			<div class="text-center mb-14">
				<p class="section-label section-label-text"><?php echo esc_html( iibpr_get( 'iibpr_prp_pillars_label', 'Fundamentos' ) ); ?></p>
				<h2 class="text-3xl font-extrabold text-gray-900 mt-2 section-heading"><?php echo esc_html( iibpr_get( 'iibpr_prp_pillars_title', 'Os Três Pilares' ) ); ?></h2>
			</div>
			<?php
			$pillar_img_defaults = array( 1 => 'acao-movimento-1.jpg', 2 => 'acao-grupo-2.jpg', 3 => 'acao-formacao-1.jpg' );
			$pillar_alt_defaults = array( 1 => 'Psicomotricidade', 2 => 'Relacional', 3 => 'Psicodinâmica' );
			$pillar_text_defaults = array(
				1 => 'O estudo do ser humano através do corpo em movimento, integrando aspectos motores, cognitivos e afetivos do desenvolvimento.',
				2 => 'Somos seres de relação. O vínculo e a interação são vitais para o ajustamento socioemocional e a capacidade de autorregulação.',
				3 => 'Conteúdos inconscientes, muitas vezes ligados à infância, podem ser elaborados de forma potente por meio da intervenção psicocorporal.',
			);
			?>
			<div class="grid md:grid-cols-3 gap-8">
				<?php for ( $pi = 1; $pi <= 3; $pi++ ) :
					$p_img = iibpr_get( "iibpr_prp_pillar_{$pi}_image" );
				?>
				<div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all border border-gray-100">
					<div class="h-44 overflow-hidden">
						<img src="<?php echo $p_img ? esc_url( $p_img ) : esc_url( $img . $pillar_img_defaults[ $pi ] ); ?>"
						     alt="<?php echo esc_attr( iibpr_get( "iibpr_prp_pillar_{$pi}_title", $pillar_alt_defaults[ $pi ] ) ); ?>"
						     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
					</div>
					<div class="p-6 border-t-4 border-iibpr-green">
						<h3 class="text-xl font-bold text-gray-900 mb-3"><?php echo esc_html( iibpr_get( "iibpr_prp_pillar_{$pi}_title", $pillar_alt_defaults[ $pi ] ) ); ?></h3>
						<p class="text-gray-600 leading-relaxed text-sm pillar-<?php echo $pi; ?>-text"><?php echo wp_kses_post( iibpr_get( "iibpr_prp_pillar_{$pi}_text", $pillar_text_defaults[ $pi ] ) ); ?></p>
					</div>
				</div>
				<?php endfor; ?>
			</div>
		</div>
	</section>


	<!-- Áreas de Atuação -->
	<section id="prp-areas" class="py-20 px-4 md:px-8 bg-gray-50">
		<div class="max-w-4xl mx-auto">
			<div class="text-center mb-14">
				<p class="section-label section-label-text"><?php echo esc_html( iibpr_get( 'iibpr_prp_areas_label', 'Áreas de Atuação' ) ); ?></p>
				<h2 class="text-3xl font-extrabold text-gray-900 mt-2 section-heading"><?php echo esc_html( iibpr_get( 'iibpr_prp_areas_title', 'Onde Atua a PRP' ) ); ?></h2>
			</div>
			<?php
			$area_img_defaults = array( 1 => 'bg-criancas.jpg', 2 => 'criancas-brincando.jpg', 3 => 'acao-formacao-4.jpg' );
			$area_alt_defaults = array( 1 => 'Educação', 2 => 'Prevenção', 3 => 'Clínica' );
			$area_text_defaults = array(
				1 => 'Ampliação do repertório psicomotor e do desenvolvimento integral em contextos escolares e de aprendizagem.',
				2 => 'Promoção de saúde, vínculo e bem-estar, prevenindo dificuldades socioemocionais e de aprendizagem.',
				3 => 'Intervenção psicocorporal em contextos clínicos e terapêuticos, com crianças, adultos e grupos.',
			);
			?>
			<div class="grid md:grid-cols-3 gap-8">
				<?php for ( $ai = 1; $ai <= 3; $ai++ ) :
					$a_img = iibpr_get( "iibpr_prp_area_{$ai}_image" );
				?>
				<div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all border border-gray-100">
					<div class="h-40 overflow-hidden">
						<img src="<?php echo $a_img ? esc_url( $a_img ) : esc_url( $img . $area_img_defaults[ $ai ] ); ?>"
						     alt="<?php echo esc_attr( iibpr_get( "iibpr_prp_area_{$ai}_title", $area_alt_defaults[ $ai ] ) ); ?>"
						     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
					</div>
					<div class="p-6">
						<h3 class="text-xl font-bold text-gray-900 mb-3 area-<?php echo $ai; ?>-title"><?php echo esc_html( iibpr_get( "iibpr_prp_area_{$ai}_title", $area_alt_defaults[ $ai ] ) ); ?></h3>
						<p class="text-gray-600 leading-relaxed text-sm area-<?php echo $ai; ?>-text"><?php echo wp_kses_post( iibpr_get( "iibpr_prp_area_{$ai}_text", $area_text_defaults[ $ai ] ) ); ?></p>
					</div>
				</div>
				<?php endfor; ?>
			</div>
		</div>
	</section>

	<!-- Saúde e Bem-Estar -->
	<section id="prp-saude" class="py-20 px-4 md:px-8 bg-white">
		<div class="max-w-4xl mx-auto text-center">
			<p class="section-label section-label-text"><?php echo esc_html( iibpr_get( 'iibpr_prp_health_label', 'Saúde e Bem-Estar' ) ); ?></p>
			<h2 class="text-3xl font-extrabold text-gray-900 mt-2 mb-6 section-heading"><?php echo esc_html( iibpr_get( 'iibpr_prp_health_title', 'Viva o bem-estar e potencialize-se' ) ); ?></h2>
			<p class="text-gray-600 text-lg leading-relaxed max-w-2xl mx-auto mb-10 health-intro"><?php echo wp_kses_post( iibpr_get( 'iibpr_prp_health_intro', 'A Psicomotricidade Relacional é também um caminho de autoconhecimento e cuidado. Pelas vivências corporais, ampliamos a consciência de nós mesmos e a qualidade das nossas relações.' ) ); ?></p>

			<?php
			$benefit_defaults = array(
				1 => array( 'Valorização das Potencialidades', 'Foco nos aspectos positivos e na construção de uma autoimagem saudável e congruente.' ),
				2 => array( 'Autoconhecimento', 'Expressão de sentimentos inconscientes por meio da imagem mental inscrita no corpo.' ),
				3 => array( 'Progresso Relacional e Comunicativo', 'Superação de dificuldades de interação em um ambiente que acolhe a comunicação corporal.' ),
				4 => array( 'Vivência Corporal', 'Descoberta de novas experiências, estimulando espontaneidade, criatividade e bem-estar.' ),
			);
			?>
			<div class="grid md:grid-cols-2 gap-8 text-left">
				<?php for ( $bi = 1; $bi <= 4; $bi++ ) : ?>
				<div class="benefit-card bg-green-50 rounded-2xl p-6 border border-green-100">
					<h3 class="text-lg font-bold text-gray-900 mb-2 benefit-<?php echo $bi; ?>-title"><?php echo esc_html( iibpr_get( "iibpr_prp_benefit_{$bi}_title", $benefit_defaults[ $bi ][0] ) ); ?></h3>
					<p class="text-gray-600 text-sm benefit-<?php echo $bi; ?>-text"><?php echo wp_kses_post( iibpr_get( "iibpr_prp_benefit_{$bi}_text", $benefit_defaults[ $bi ][1] ) ); ?></p>
				</div>
				<?php endfor; ?>
			</div>
		</div>
	</section>

	<!-- Estrutura da Formação -->
	<section id="prp-estrutura" class="py-20 px-4 md:px-8 bg-gray-50">
		<div class="max-w-4xl mx-auto">
			<div class="text-center mb-14">
				<p class="section-label section-label-text"><?php echo esc_html( iibpr_get( 'iibpr_prp_struct_label', 'Estrutura' ) ); ?></p>
				<h2 class="text-3xl font-extrabold text-gray-900 mt-2 section-heading"><?php echo esc_html( iibpr_get( 'iibpr_prp_struct_title', 'Estrutura da Formação — Ano Propedêutico' ) ); ?></h2>
			</div>

		<?php
		$mod_icons = array(
			'A' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>',
			'B' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>',
			'C' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>',
		);
		$mod_numbers = array( 'A' => '01', 'B' => '02', 'C' => '03' );
		?>
			<div class="space-y-8">
				<?php
				$mod_defaults = array(
					'A' => array(
						'title' => 'Módulos Vivenciais',
						'items' => "Módulo 1 — Sensibilização\nMódulo 2 — Intermediário\nMódulo 3 — Avançado\nMódulo 4 — Supervisão",
					),
					'B' => array(
						'title' => 'Seminários Teóricos',
						'items' => "Bases teóricas da Psicomotricidade Relacional\nDesenvolvimento psicomotor e o jogo\nFundamentos psicodinâmicos da intervenção\nEstudos de caso e leituras dirigidas",
					),
					'C' => array(
						'title' => 'Prática Supervisionada',
						'items' => "Observação e escuta do corpo em movimento\nIntervenção psicocorporal acompanhada\nSupervisão clínica em grupo\nElaboração de relatórios e devolutivas",
					),
				);
				foreach ( array( 'A', 'B', 'C' ) as $mod_key ) :
					$mod_title = iibpr_get( "iibpr_prp_module_{$mod_key}_title", $mod_defaults[ $mod_key ]['title'] );
					$mod_items_raw = iibpr_get( "iibpr_prp_module_{$mod_key}_items", $mod_defaults[ $mod_key ]['items'] );
					$mod_items = array_filter( array_map( 'trim', explode( "\n", $mod_items_raw ) ) );
				?>
				<div class="bg-white rounded-xl p-8 shadow-sm border border-gray-100">
					<h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-3">
						<span class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center text-green-600"><?php echo $mod_icons[ $mod_key ]; ?></span>
						<span class="text-sm text-green-500 font-bold"><?php echo esc_html( $mod_numbers[ $mod_key ] ); ?></span>
						<?php echo esc_html( $mod_title ); ?>
					</h3>
					<?php if ( $mod_key === 'A' ) : ?>
					<div class="grid sm:grid-cols-2 md:grid-cols-4 gap-4">
						<?php foreach ( $mod_items as $item ) :
							$parts = explode( '—', $item );
						?>
						<div class="bg-green-50 rounded-lg p-4 text-center">
							<div class="font-bold text-gray-900"><?php echo esc_html( trim( $parts[0] ) ); ?></div>
							<?php if ( ! empty( $parts[1] ) ) : ?>
							<div class="text-sm text-gray-500"><?php echo esc_html( trim( $parts[1] ) ); ?></div>
							<?php endif; ?>
						</div>
						<?php endforeach; ?>
					</div>
					<?php else : ?>
					<ul class="space-y-3 text-gray-600">
						<?php foreach ( $mod_items as $item ) : ?>
						<li class="flex items-start gap-2">
							<svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
							<?php echo esc_html( $item ); ?>
						</li>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- Profissões -->
	<section id="prp-profissoes" class="py-20 px-4 md:px-8 bg-white">
		<div class="max-w-4xl mx-auto">
			<div class="text-center mb-10">
				<p class="section-label section-label-text"><?php echo esc_html( iibpr_get( 'iibpr_prp_prof_label', 'Profissionais' ) ); ?></p>
				<h2 class="text-3xl font-extrabold text-gray-900 mt-2 section-heading"><?php echo esc_html( iibpr_get( 'iibpr_prp_prof_title', 'Para Quais Profissões' ) ); ?></h2>
			</div>
			<div class="flex flex-wrap justify-center gap-3">
				<?php
				$professions_raw = iibpr_get( 'iibpr_prp_professions', "Pedagogos\nPsicólogos\nFisioterapeutas\nTerapeutas Ocupacionais\nFonoaudiólogos\nEducadores Físicos\nMédicos\nEnfermeiros\nAssistentes Sociais\nPsicopedagogos" );
				$professions = array_filter( array_map( 'trim', explode( "\n", $professions_raw ) ) );
				foreach ( $professions as $prof ) : ?>
				<span class="bg-green-50 text-green-700 px-5 py-2 rounded-full text-sm font-medium"><?php echo esc_html( $prof ); ?></span>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- CTA -->
	<?php $prp_wa = iibpr_get( 'iibpr_prp_cta_btn2_url', 'https://wa.me/5561991572149' ); ?>
	<section id="prp-cta" class="py-24 px-4 md:px-8 bg-gradient-to-br from-green-700 via-green-600 to-green-500 text-white text-center">
		<div class="max-w-3xl mx-auto">
			<h2 class="text-3xl md:text-4xl font-extrabold mb-6 cta-title"><?php echo esc_html( iibpr_get( 'iibpr_prp_cta_title', 'Inicie sua Formação em PRP' ) ); ?></h2>
			<p class="text-xl opacity-90 mb-8 cta-text"><?php echo wp_kses_post( iibpr_get( 'iibpr_prp_cta_text', 'Conheça nossos cursos e formações em Psicomotricidade Relacional Psicodinâmica.' ) ); ?></p>
			<div class="flex flex-col sm:flex-row gap-4 justify-center">
				<a href="<?php echo esc_url( site_url( '/cursos' ) ); ?>"
				   class="bg-white text-green-700 px-10 py-4 rounded-full text-lg font-bold hover:bg-gray-100 shadow-2xl transition-all hover:-translate-y-1">
					<?php echo esc_html( iibpr_get( 'iibpr_prp_cta_btn1_label', 'Ver Cursos' ) ); ?>
				</a>
				<a href="<?php echo esc_url( $prp_wa ); ?>" target="_blank" rel="noopener"
				   class="border-2 border-white/70 text-white px-10 py-4 rounded-full text-lg font-semibold hover:bg-white/10 transition-all inline-flex items-center justify-center gap-2">
					<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
					Fale Conosco
				</a>
			</div>
		</div>
	</section>

</main>

<?php get_footer(); ?>

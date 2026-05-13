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
	<section class="py-20 px-4 md:px-8 text-white text-center -mt-[72px] pt-[92px] relative overflow-hidden"
	         style="background-image: linear-gradient(135deg, rgba(64,72,86,0.88) 0%, rgba(58,90,42,0.82) 100%), url('<?php echo $hero_bg ? esc_url( $hero_bg ) : esc_url( $img . 'services-banner.jpg' ); ?>'); background-size: cover; background-position: center;">
		<div class="max-w-4xl mx-auto relative z-10">
			<h1 class="text-4xl md:text-5xl font-extrabold mb-4"><?php echo esc_html( iibpr_get( 'iibpr_prp_hero_title', 'O que é Psicomotricidade Relacional Psicodinâmica?' ) ); ?></h1>
			<p class="text-xl opacity-90"><?php echo esc_html( iibpr_get( 'iibpr_prp_hero_subtitle', 'O estudo do Ser Humano através do seu corpo em movimento e em relação ao seu mundo interno e externo.' ) ); ?></p>
		</div>
	</section>

	<!-- Conceito / O que é PRP -->
	<section class="py-20 px-4 md:px-8 bg-white">
		<div class="max-w-4xl mx-auto">
			<div class="grid md:grid-cols-2 gap-12 items-center">
				<div>
					<p class="section-label"><?php echo esc_html( iibpr_get( 'iibpr_prp_conceito_label', 'Conceito' ) ); ?></p>
					<h2 class="text-3xl font-extrabold text-gray-900 mt-2"><?php echo esc_html( iibpr_get( 'iibpr_prp_conceito_title', 'Entendendo a PRP' ) ); ?></h2>
					<div class="text-gray-600 text-lg leading-relaxed mt-4 space-y-4">
						<?php for ( $ti = 1; $ti <= 3; $ti++ ) :
							$tx = iibpr_get( "iibpr_prp_conceito_text_{$ti}" );
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
	<section class="py-20 px-4 md:px-8 bg-gray-50">
		<div class="max-w-4xl mx-auto">
			<div class="text-center mb-14">
				<p class="section-label"><?php echo esc_html( iibpr_get( 'iibpr_prp_pillars_label', 'Fundamentos' ) ); ?></p>
				<h2 class="text-3xl font-extrabold text-gray-900 mt-2"><?php echo esc_html( iibpr_get( 'iibpr_prp_pillars_title', 'Os Três Pilares' ) ); ?></h2>
			</div>
			<?php
			$pillar_img_defaults = array( 1 => 'acao-movimento-1.jpg', 2 => 'acao-grupo-2.jpg', 3 => 'acao-formacao-1.jpg' );
			$pillar_alt_defaults = array( 1 => 'Psicomotricidade', 2 => 'Relacional', 3 => 'Psicodinâmica' );
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
						<h3 class="text-xl font-bold text-gray-900 mb-3"><?php echo esc_html( iibpr_get( "iibpr_prp_pillar_{$pi}_title", '' ) ); ?></h3>
						<p class="text-gray-600 leading-relaxed text-sm"><?php echo wp_kses_post( iibpr_get( "iibpr_prp_pillar_{$pi}_text", '' ) ); ?></p>
					</div>
				</div>
				<?php endfor; ?>
			</div>
		</div>
	</section>


	<!-- Áreas de Atuação -->
	<section class="py-20 px-4 md:px-8 bg-gray-50">
		<div class="max-w-4xl mx-auto">
			<div class="text-center mb-14">
				<p class="section-label"><?php echo esc_html( iibpr_get( 'iibpr_prp_areas_label', 'Áreas de Atuação' ) ); ?></p>
				<h2 class="text-3xl font-extrabold text-gray-900 mt-2"><?php echo esc_html( iibpr_get( 'iibpr_prp_areas_title', 'Onde Atua a PRP' ) ); ?></h2>
			</div>
			<?php
			$area_img_defaults = array( 1 => 'bg-criancas.jpg', 2 => 'criancas-brincando.jpg', 3 => 'content-03.jpg' );
			$area_alt_defaults = array( 1 => 'Educação', 2 => 'Prevenção', 3 => 'Terapia' );
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
						<h3 class="text-xl font-bold text-gray-900 mb-3"><?php echo esc_html( iibpr_get( "iibpr_prp_area_{$ai}_title", '' ) ); ?></h3>
						<p class="text-gray-600 leading-relaxed text-sm"><?php echo wp_kses_post( iibpr_get( "iibpr_prp_area_{$ai}_text", '' ) ); ?></p>
					</div>
				</div>
				<?php endfor; ?>
			</div>
		</div>
	</section>

	<!-- Saúde e Bem-Estar -->
	<section class="py-20 px-4 md:px-8 bg-white">
		<div class="max-w-4xl mx-auto text-center">
			<p class="section-label"><?php echo esc_html( iibpr_get( 'iibpr_prp_health_label', 'Saúde e Bem-Estar' ) ); ?></p>
			<h2 class="text-3xl font-extrabold text-gray-900 mt-2 mb-6"><?php echo esc_html( iibpr_get( 'iibpr_prp_health_title', 'Viva o bem-estar e potencialize-se' ) ); ?></h2>
			<p class="text-gray-600 text-lg leading-relaxed max-w-2xl mx-auto mb-10"><?php echo wp_kses_post( iibpr_get( 'iibpr_prp_health_intro', '' ) ); ?></p>

			<div class="grid md:grid-cols-2 gap-8 text-left">
				<?php for ( $bi = 1; $bi <= 4; $bi++ ) : ?>
				<div class="benefit-card">
					<h3 class="text-lg font-bold text-gray-900 mb-2"><?php echo esc_html( iibpr_get( "iibpr_prp_benefit_{$bi}_title", '' ) ); ?></h3>
					<p class="text-gray-600 text-sm"><?php echo wp_kses_post( iibpr_get( "iibpr_prp_benefit_{$bi}_text", '' ) ); ?></p>
				</div>
				<?php endfor; ?>
			</div>
		</div>
	</section>

	<!-- Estrutura da Formação -->
	<section class="py-20 px-4 md:px-8 bg-gray-50">
		<div class="max-w-4xl mx-auto">
			<div class="text-center mb-14">
				<p class="section-label"><?php echo esc_html( iibpr_get( 'iibpr_prp_struct_label', 'Estrutura' ) ); ?></p>
				<h2 class="text-3xl font-extrabold text-gray-900 mt-2"><?php echo esc_html( iibpr_get( 'iibpr_prp_struct_title', 'Estrutura da Formação — Ano Propedêutico' ) ); ?></h2>
			</div>

			<div class="space-y-8">
				<?php foreach ( array( 'A', 'B', 'C' ) as $mod_key ) :
					$mod_title = iibpr_get( "iibpr_prp_module_{$mod_key}_title", '' );
					$mod_items_raw = iibpr_get( "iibpr_prp_module_{$mod_key}_items", '' );
					$mod_items = array_filter( array_map( 'trim', explode( "\n", $mod_items_raw ) ) );
				?>
				<div class="bg-white rounded-xl p-8 shadow-sm border border-gray-100">
					<h3 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-3">
						<span class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center text-green-600 font-bold"><?php echo esc_html( $mod_key ); ?></span>
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
	<section class="py-20 px-4 md:px-8 bg-white">
		<div class="max-w-4xl mx-auto">
			<div class="text-center mb-10">
				<p class="section-label"><?php echo esc_html( iibpr_get( 'iibpr_prp_prof_label', 'Profissionais' ) ); ?></p>
				<h2 class="text-3xl font-extrabold text-gray-900 mt-2"><?php echo esc_html( iibpr_get( 'iibpr_prp_prof_title', 'Para Quais Profissões' ) ); ?></h2>
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
	<section class="py-24 px-4 md:px-8 bg-gradient-to-br from-green-700 via-green-600 to-green-500 text-white text-center">
		<div class="max-w-3xl mx-auto">
			<h2 class="text-3xl md:text-4xl font-extrabold mb-6"><?php echo esc_html( iibpr_get( 'iibpr_prp_cta_title', 'Inicie sua Formação em PRP' ) ); ?></h2>
			<p class="text-xl opacity-90 mb-8"><?php echo wp_kses_post( iibpr_get( 'iibpr_prp_cta_text', 'Conheça nossos cursos e formações em Psicomotricidade Relacional Psicodinâmica.' ) ); ?></p>
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

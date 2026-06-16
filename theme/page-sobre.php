<?php
/**
 * Template Name: Sobre o Instituto
 * Template Post Type: page
 */
get_header();
$img     = get_template_directory_uri() . '/images/';
$hero_bg = iibpr_get( 'iibpr_sobre_hero_bg' );
?>

<main id="main" class="site-main">

	<!-- Hero -->
	<section id="sobre-hero" class="py-20 px-4 md:px-8 text-white text-center -mt-[72px] pt-[92px] relative overflow-hidden"
	         style="background-image: linear-gradient(135deg, rgba(64,72,86,0.88) 0%, rgba(58,90,42,0.82) 100%), url('<?php echo $hero_bg ? esc_url( $hero_bg ) : esc_url( $img . 'aboutus-banner.jpg' ); ?>'); background-size: cover; background-position: center;">
		<div class="max-w-4xl mx-auto relative z-10">
			<h1 class="text-4xl md:text-5xl font-extrabold mb-4 page-hero-title"><?php echo esc_html( iibpr_get( 'iibpr_sobre_hero_title', 'Quem Somos' ) ); ?></h1>
			<p class="text-xl opacity-90 page-hero-subtitle"><?php echo esc_html( iibpr_get( 'iibpr_sobre_hero_subtitle', 'Nossa história, missão e as pessoas por trás do IIBPR.' ) ); ?></p>
		</div>
	</section>

	<!-- História -->
	<section id="sobre-historia" class="py-20 px-4 md:px-8 bg-white">
		<div class="max-w-5xl mx-auto">
			<div class="grid md:grid-cols-2 gap-12 items-center">
				<div>
					<p class="section-label section-label-text"><?php echo esc_html( iibpr_get( 'iibpr_sobre_hist_label', 'Nossa História' ) ); ?></p>
					<h2 class="text-3xl font-extrabold text-gray-900 mt-2 section-heading"><?php echo esc_html( iibpr_get( 'iibpr_sobre_hist_title', 'De Brasília para o Mundo' ) ); ?></h2>
					<div class="text-gray-600 text-lg leading-relaxed mt-4 space-y-4">
						<?php $t1 = iibpr_get( 'iibpr_sobre_hist_text_1' ); if ( $t1 ) : ?><p class="hist-text-1"><?php echo wp_kses_post( $t1 ); ?></p><?php endif; ?>
						<?php $t2 = iibpr_get( 'iibpr_sobre_hist_text_2' ); if ( $t2 ) : ?><p class="hist-text-2"><?php echo wp_kses_post( $t2 ); ?></p><?php endif; ?>
					</div>
				</div>
				<div>
					<?php $hist_img = iibpr_get( 'iibpr_sobre_hist_image' ); ?>
					<img src="<?php echo $hist_img ? esc_url( $hist_img ) : esc_url( $img . 'quem-somos.png' ); ?>" alt="Equipe IIBPR"
					     class="rounded-2xl shadow-lg w-full" loading="lazy">
				</div>
			</div>
		</div>
	</section>

	<!-- O Que Fazemos -->
	<section id="sobre-wwd" class="py-20 px-4 md:px-8 bg-gray-50">
		<div class="max-w-5xl mx-auto">
			<div class="grid md:grid-cols-5 gap-8">
				<div class="md:col-span-3">
					<p class="section-label section-label-text"><?php echo esc_html( iibpr_get( 'iibpr_sobre_wwd_label', 'O Que Fazemos' ) ); ?></p>
					<h2 class="text-3xl font-extrabold text-gray-900 mt-2 mb-6 section-heading"><?php echo esc_html( iibpr_get( 'iibpr_sobre_wwd_title', 'Atendimento e Formação' ) ); ?></h2>
					<div class="text-gray-600 text-lg leading-relaxed space-y-4">
						<?php for ( $ti = 1; $ti <= 3; $ti++ ) :
							$tx = iibpr_get( "iibpr_sobre_wwd_text_{$ti}" );
							if ( $tx ) : ?><p><?php echo wp_kses_post( $tx ); ?></p><?php endif;
						endfor; ?>
					</div>
				</div>
				<div class="md:col-span-2 grid grid-cols-2 gap-3">
					<?php
					$wwd_img_defaults = array( 'acao-movimento-1.jpg', 'acao-grupo-2.jpg', 'acao-formacao-2.jpg', 'bg-criancas.jpg' );
					$wwd_img_alts     = array( 'Vivência corporal', 'Atividade em grupo', 'Formação', 'Crianças' );
					for ( $wi = 1; $wi <= 4; $wi++ ) :
						$wi_src = iibpr_get( "iibpr_sobre_wwd_image_{$wi}" );
					?>
					<div class="rounded-xl overflow-hidden aspect-square">
						<img src="<?php echo $wi_src ? esc_url( $wi_src ) : esc_url( $img . $wwd_img_defaults[ $wi - 1 ] ); ?>"
						     alt="<?php echo esc_attr( $wwd_img_alts[ $wi - 1 ] ); ?>" class="w-full h-full object-cover" loading="lazy">
					</div>
					<?php endfor; ?>
				</div>
			</div>
		</div>
	</section>

	<!-- Missão / Visão / Valores -->
	<section id="sobre-mvv" class="py-20 px-4 md:px-8 bg-white">
		<div class="max-w-4xl mx-auto">
			<div class="text-center mb-14">
				<p class="section-label section-label-text"><?php echo esc_html( iibpr_get( 'iibpr_sobre_mvv_label', 'Propósito' ) ); ?></p>
				<h2 class="text-3xl font-extrabold text-gray-900 mt-2 section-heading"><?php echo esc_html( iibpr_get( 'iibpr_sobre_mvv_heading', 'Missão, Visão e Valores' ) ); ?></h2>
			</div>
			<?php
			$mvv_icons = array(
				1 => '<svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>',
				2 => '<svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>',
				3 => '<svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>',
			);
			?>
			<div class="grid md:grid-cols-3 gap-8">
				<?php for ( $mi = 1; $mi <= 3; $mi++ ) : ?>
				<div class="bg-green-50 rounded-2xl p-8 border border-green-100">
					<div class="w-14 h-14 bg-iibpr-green rounded-xl flex items-center justify-center mb-4">
						<?php echo $mvv_icons[ $mi ]; ?>
					</div>
					<h3 class="text-xl font-bold text-gray-900 mb-3 mvv-<?php echo $mi; ?>-title"><?php echo esc_html( iibpr_get( "iibpr_sobre_mvv_{$mi}_title", '' ) ); ?></h3>
					<p class="text-gray-600 leading-relaxed mvv-<?php echo $mi; ?>-text"><?php echo wp_kses_post( iibpr_get( "iibpr_sobre_mvv_{$mi}_text", '' ) ); ?></p>
				</div>
				<?php endfor; ?>
			</div>
		</div>
	</section>

	<!-- Fundadores -->
	<section id="sobre-fundadores" class="py-20 px-4 md:px-8 bg-gray-50">
		<div class="max-w-5xl mx-auto">
			<div class="text-center mb-14">
				<p class="section-label">Fundadores</p>
				<h2 class="text-3xl font-extrabold text-gray-900 mt-2">As Pessoas por Trás do IIBPR</h2>
			</div>

			<div class="grid md:grid-cols-2 gap-10 mb-16">
				<?php for ( $fi = 1; $fi <= 2; $fi++ ) :
					$f_photo = iibpr_get( "iibpr_founder_{$fi}_photo" );
					$f_photo_defaults = array( 1 => 'fabiane2.png', 2 => 'augusto2.jpg' );
					$f_photo_alts     = array( 1 => iibpr_get( "iibpr_founder_{$fi}_name", 'Fabiane Alves Crispim' ), 2 => iibpr_get( "iibpr_founder_{$fi}_name", 'Augusto Parras Albuquerque' ) );
				?>
				<div class="bg-white rounded-2xl shadow-sm overflow-hidden hover:shadow-lg transition-shadow">
					<div class="h-72 overflow-hidden">
						<img src="<?php echo $f_photo ? esc_url( $f_photo ) : esc_url( $img . $f_photo_defaults[ $fi ] ); ?>"
						     alt="<?php echo esc_attr( iibpr_get( "iibpr_founder_{$fi}_name", '' ) ); ?>"
						     class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" loading="lazy">
					</div>
					<div class="p-8">
						<h3 class="text-xl font-bold text-gray-900"><?php echo esc_html( iibpr_get( "iibpr_founder_{$fi}_name", '' ) ); ?></h3>
						<p class="text-iibpr-green font-medium mb-4"><?php echo esc_html( iibpr_get( "iibpr_founder_{$fi}_role", '' ) ); ?></p>
						<?php $bio = iibpr_get( "iibpr_founder_{$fi}_bio_long" ); if ( $bio ) : ?>
						<p class="text-gray-600 leading-relaxed text-sm"><?php echo wp_kses_post( $bio ); ?></p>
						<?php endif; ?>
						<?php $creds = iibpr_get( "iibpr_founder_{$fi}_credentials" ); if ( $creds ) : ?>
						<p class="text-gray-400 text-xs mt-4"><?php echo wp_kses_post( $creds ); ?></p>
						<?php endif; ?>
					</div>
				</div>
				<?php endfor; ?>
			</div>
		</div>
	</section>

	<!-- Stats -->
	<?php $stats_bg = iibpr_get( 'iibpr_sobre_stats_bg' ); ?>
	<section id="sobre-stats" class="py-16 px-4 md:px-8 text-white relative overflow-hidden"
	         style="background-image: linear-gradient(135deg, rgba(64,72,86,0.92) 0%, rgba(58,90,42,0.88) 100%), url('<?php echo $stats_bg ? esc_url( $stats_bg ) : esc_url( $img . 'acao-grupo-4.jpg' ); ?>'); background-size: cover; background-position: center;">
		<div class="max-w-4xl mx-auto relative z-10">
			<div class="grid sm:grid-cols-2 md:grid-cols-4 gap-8 text-center">
				<?php for ( $si = 1; $si <= 4; $si++ ) : ?>
				<div>
					<div class="text-4xl font-extrabold stat-<?php echo $si; ?>-number"><?php echo esc_html( iibpr_get( "iibpr_sobre_stat_{$si}_number", '' ) ); ?></div>
					<div class="text-gray-300 mt-2 stat-<?php echo $si; ?>-label"><?php echo esc_html( iibpr_get( "iibpr_sobre_stat_{$si}_label", '' ) ); ?></div>
				</div>
				<?php endfor; ?>
			</div>
		</div>
	</section>

	<!-- CTA -->
	<?php $cta_wa = iibpr_get( 'iibpr_sobre_cta_wa_url', 'https://wa.me/5561991572149' ); ?>
	<section id="sobre-cta" class="py-24 px-4 md:px-8 bg-gradient-to-br from-green-700 via-green-600 to-green-500 text-white text-center">
		<div class="max-w-3xl mx-auto">
			<h2 class="text-3xl md:text-4xl font-extrabold mb-6 cta-title"><?php echo esc_html( iibpr_get( 'iibpr_sobre_cta_title', 'Faça Parte da Nossa História' ) ); ?></h2>
			<p class="text-xl opacity-90 mb-8 cta-text"><?php echo wp_kses_post( iibpr_get( 'iibpr_sobre_cta_text', 'Conheça nossos cursos e formações em Psicomotricidade Relacional Psicodinâmica.' ) ); ?></p>
			<a href="<?php echo esc_url( $cta_wa ); ?>" target="_blank" rel="noopener"
			   class="bg-white text-green-700 px-10 py-4 rounded-full text-lg font-bold hover:bg-gray-100 shadow-2xl transition-all hover:-translate-y-1 inline-flex items-center gap-2 no-underline">
				<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
				Fale Conosco via WhatsApp
			</a>
		</div>
	</section>

</main>

<?php get_footer(); ?>

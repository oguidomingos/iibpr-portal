<?php
/**
 * Template Part: About / Pillars Section — with real photos
 */
$about_image = iibpr_get( 'iibpr_about_image' );
$default_img = get_template_directory_uri() . '/images/quem-somos.png';
$img_base    = get_template_directory_uri() . '/images/';

// Real action photos for each pillar
$pillar_images = array(
	1 => iibpr_get( 'iibpr_pillar_1_image', $img_base . 'acao-movimento-1.jpg' ),
	2 => iibpr_get( 'iibpr_pillar_2_image', $img_base . 'acao-grupo-2.jpg' ),
	3 => iibpr_get( 'iibpr_pillar_3_image', $img_base . 'acao-formacao-1.jpg' ),
);
$mosaic_images = array(
	1 => iibpr_get( 'iibpr_about_mosaic_image_1', $img_base . 'acao-movimento-2.jpg' ),
	2 => iibpr_get( 'iibpr_about_mosaic_image_2', $img_base . 'acao-grupo-1.jpg' ),
	3 => iibpr_get( 'iibpr_about_mosaic_image_3', $img_base . 'acao-movimento-4.jpg' ),
);
?>
<section id="sobre" class="section-padding bg-white">
	<div class="container-narrow">

		<!-- 2-col: text + image -->
		<div class="grid md:grid-cols-2 gap-12 items-center mb-16">
			<div class="fade-up">
				<p class="section-label about-label"><?php echo esc_html( iibpr_get( 'iibpr_about_label', 'Sobre o Instituto' ) ); ?></p>
				<h2 class="section-title mt-2 about-title">
					<?php echo wp_kses_post( iibpr_get( 'iibpr_about_title', 'Saúde Integral e Relacional' ) ); ?>
				</h2>
				<p class="text-gray-600 text-lg leading-relaxed mt-4 about-text">
					<?php echo wp_kses_post( iibpr_get( 'iibpr_about_text', 'O Instituto IIBPR tem como missão promover a saúde física, mental e social por meio do desenvolvimento humano integral via psicomotricidade relacional. Fundado por profissionais com mais de 20 anos de experiência, oferece formações reconhecidas internacionalmente.' ) ); ?>
				</p>
				<a href="<?php echo esc_url( site_url( '/sobre' ) ); ?>" class="btn-secondary mt-6 text-sm py-2 px-6 inline-block">
					Saiba Mais
				</a>
			</div>
			<div class="fade-up fade-up-delay-2">
				<img src="<?php echo esc_url( $about_image ? $about_image : $default_img ); ?>" alt="Sobre o IIBPR"
				     class="rounded-2xl shadow-lg w-full h-auto object-cover" loading="lazy">
			</div>
		</div>

		<!-- Photo mosaic — real action shots -->
		<div class="grid grid-cols-3 gap-3 mb-16 rounded-2xl overflow-hidden fade-up">
			<div class="aspect-[4/3] overflow-hidden">
				<img src="<?php echo esc_url( $mosaic_images[1] ); ?>" alt="Psicomotricidade em ação" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" loading="lazy">
			</div>
			<div class="aspect-[4/3] overflow-hidden">
				<img src="<?php echo esc_url( $mosaic_images[2] ); ?>" alt="Formação em grupo" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" loading="lazy">
			</div>
			<div class="aspect-[4/3] overflow-hidden">
				<img src="<?php echo esc_url( $mosaic_images[3] ); ?>" alt="Vivência corporal" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" loading="lazy">
			</div>
		</div>

		<!-- 3 Pillars with photos -->
		<div class="grid md:grid-cols-3 gap-8">
			<?php for ( $i = 1; $i <= 3; $i++ ) :
				$icon  = iibpr_get( "iibpr_pillar_{$i}_icon" );
				$title = iibpr_get( "iibpr_pillar_{$i}_title" );
				$text  = iibpr_get( "iibpr_pillar_{$i}_text" );
			?>
			<div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 fade-up fade-up-delay-<?php echo $i; ?>">
				<div class="h-48 overflow-hidden">
					<img src="<?php echo esc_url( $pillar_images[ $i ] ); ?>" alt="<?php echo esc_attr( $title ); ?>"
					     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
				</div>
				<div class="p-6 border-t-4 border-iibpr-green">
					<h3 class="text-xl font-bold text-gray-900 mb-3 pillar-<?php echo $i; ?>-title"><?php echo esc_html( $title ); ?></h3>
					<p class="text-gray-600 leading-relaxed text-sm pillar-<?php echo $i; ?>-text"><?php echo wp_kses_post( $text ); ?></p>
				</div>
			</div>
			<?php endfor; ?>
		</div>

	</div>
</section>

<?php
/**
 * Template Part: Founders Section — Real photos and bios
 */
$img_base = get_template_directory_uri() . '/images/';
$f_photo_defaults = array( 1 => 'fabiane2.png', 2 => 'augusto2.jpg' );
?>
<section id="fundadores" class="section-padding bg-white">
	<div class="container-narrow">

		<div class="text-center mb-14 fade-up">
			<p class="section-label">Quem Somos</p>
			<h2 class="section-title">Nossos Fundadores</h2>
			<p class="section-subtitle">Profissionais dedicados à psicomotricidade relacional há mais de duas décadas.</p>
		</div>

		<div class="grid gap-8 md:grid-cols-2">
			<?php for ( $fi = 1; $fi <= 2; $fi++ ) :
				$f_photo = iibpr_get( "iibpr_founder_{$fi}_photo" );
			?>
			<div class="text-center group fade-up fade-up-delay-<?php echo $fi; ?>">
				<div class="w-40 h-40 mx-auto mb-5 rounded-full overflow-hidden border-4 border-iibpr-green/20 group-hover:border-iibpr-green transition-colors duration-300">
					<img src="<?php echo $f_photo ? esc_url( $f_photo ) : esc_url( $img_base . $f_photo_defaults[ $fi ] ); ?>"
					     alt="<?php echo esc_attr( iibpr_get( "iibpr_founder_{$fi}_name", '' ) ); ?>"
					     class="w-full h-full object-cover" loading="lazy">
				</div>
				<h3 class="text-xl font-bold text-gray-900"><?php echo esc_html( iibpr_get( "iibpr_founder_{$fi}_name", '' ) ); ?></h3>
				<p class="text-iibpr-green font-medium text-sm mb-3"><?php echo esc_html( iibpr_get( "iibpr_founder_{$fi}_role_detail", '' ) ); ?></p>
				<p class="text-gray-600 text-sm leading-relaxed"><?php echo wp_kses_post( iibpr_get( "iibpr_founder_{$fi}_bio_short", '' ) ); ?></p>
			</div>
			<?php endfor; ?>
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

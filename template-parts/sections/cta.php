<?php
/**
 * Template Part: CTA Section — with real background photo
 */
$img_base = get_template_directory_uri() . '/images/';
?>
<section id="inscricao" class="py-24 px-4 md:px-8 text-white text-center relative overflow-hidden"
         style="background-image: linear-gradient(135deg, rgba(90,154,66,0.92) 0%, rgba(64,72,86,0.90) 100%), url('<?php echo esc_url( $img_base . 'acao-grupo-4.jpg' ); ?>'); background-size: cover; background-position: center;">

	<div class="max-w-3xl mx-auto relative z-10">

		<p class="section-label text-green-200 mb-4 fade-up">Inscrições Abertas</p>
		<h2 class="text-3xl md:text-5xl font-extrabold mb-6 fade-up fade-up-delay-1">
			<?php echo wp_kses_post( iibpr_get( 'iibpr_cta_title', 'Eleve sua prática profissional' ) ); ?>
		</h2>
		<p class="text-xl opacity-90 mb-10 max-w-xl mx-auto fade-up fade-up-delay-2">
			<?php echo wp_kses_post( iibpr_get( 'iibpr_cta_subtitle', 'Faça parte de uma comunidade internacional de profissionais que transformam vidas através da psicomotricidade relacional.' ) ); ?>
		</p>

		<div class="flex flex-col sm:flex-row gap-4 justify-center fade-up fade-up-delay-3">
			<?php
			$btn_label = iibpr_get( 'iibpr_cta_btn_label', 'Inscreva-se Agora' );
			$btn_url   = iibpr_get( 'iibpr_cta_btn_url', '#' );
			?>
			<a href="<?php echo esc_url( $btn_url ); ?>" target="_blank" rel="noopener"
			   class="bg-white text-gray-900 px-10 py-4 rounded-full text-lg font-bold hover:bg-gray-100 shadow-2xl transition-all hover:-translate-y-1 no-underline">
				<?php echo esc_html( $btn_label ); ?>
			</a>
			<?php
			$btn2_label = iibpr_get( 'iibpr_cta_btn2_label', 'Fale Conosco' );
			$btn2_url   = iibpr_get( 'iibpr_cta_btn2_url', '#' );
			if ( $btn2_label ) : ?>
			<a href="<?php echo esc_url( $btn2_url ); ?>"
			   class="border-2 border-white/70 text-white px-10 py-4 rounded-full text-lg font-semibold hover:bg-white/10 transition-all text-center no-underline">
				<?php echo esc_html( $btn2_label ); ?>
			</a>
			<?php endif; ?>
		</div>

	</div>
</section>

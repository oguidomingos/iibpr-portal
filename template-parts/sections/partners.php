<?php
/**
 * Template Part: Partners Logo Strip — with real logos
 */
$img_base = get_template_directory_uri() . '/images/';
$partners = array(
    array( 'name' => 'IIPR',  'desc' => 'Instituto Internacional de Psicomotricidade Relacional (Itália)', 'logo' => $img_base . 'iipr.png' ),
    array( 'name' => 'ABP',   'desc' => 'Associação Brasileira de Psicomotricidade', 'logo' => '' ),
    array( 'name' => 'IESB',  'desc' => 'Instituto de Educação Superior de Brasília', 'logo' => '' ),
    array( 'name' => 'Centro de Psicomotricidade', 'desc' => 'Centro de Psicomotricidade — Portugal', 'logo' => $img_base . 'centro-psicomotricidade.jpeg' ),
    array( 'name' => 'EAM Psicomotricidade', 'desc' => 'Escola Ana Rita Matias — Portugal', 'logo' => $img_base . 'logo-psicoEAM.png' ),
);
?>
<section class="py-16 px-4 md:px-8 bg-white border-t border-gray-100">
	<div class="container-narrow">
		<div class="text-center mb-10 fade-up">
			<p class="section-label">Rede</p>
			<h3 class="text-xl font-bold text-gray-900 mt-2">Parceiros e Afiliações</h3>
		</div>
		<div class="flex flex-wrap justify-center items-center gap-10 md:gap-16">
			<?php foreach ( $partners as $partner ) : ?>
			<div class="text-center fade-up group" title="<?php echo esc_attr( $partner['desc'] ); ?>">
				<?php if ( $partner['logo'] ) : ?>
				<img src="<?php echo esc_url( $partner['logo'] ); ?>" alt="<?php echo esc_attr( $partner['name'] ); ?>"
				     class="h-16 w-auto mx-auto opacity-60 group-hover:opacity-100 transition-opacity duration-300 grayscale group-hover:grayscale-0" loading="lazy">
				<?php else : ?>
				<span class="text-2xl font-bold text-gray-300 group-hover:text-iibpr-green transition-colors cursor-default"><?php echo esc_html( $partner['name'] ); ?></span>
				<?php endif; ?>
				<p class="text-xs text-gray-400 mt-2 max-w-[140px] mx-auto leading-tight"><?php echo esc_html( $partner['desc'] ); ?></p>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

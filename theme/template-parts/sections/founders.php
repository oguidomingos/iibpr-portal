<?php
/**
 * Template Part: Founders Section — brand band with couple cutout.
 *
 * @package iibpr_main
 */
$img_base = get_template_directory_uri() . '/images/';
$brand    = $img_base . 'brand/';
$cutout   = iibpr_get( 'iibpr_founders_cutout', $brand . 'cutout-couple.png' );
$kicker   = iibpr_get( 'iibpr_founders_kicker', 'Quem Somos' );
$title    = iibpr_get( 'iibpr_founders_title', 'Mais de 25 anos dedicados à psicomotricidade' );
$text     = iibpr_get( 'iibpr_founders_text', 'Fabiane Alves Crispim e Augusto Parras Albuquerque conduzem formações que unem teoria e prática — o corpo em movimento e em relação como caminho de transformação.' );
?>
<style>
	.iibpr-founders{position:relative;overflow:hidden;background:#404856;color:#fff;}
	.iibpr-founders__tex{position:absolute;inset:0;z-index:0;opacity:.08;background-repeat:repeat;background-size:260px auto;}
	.iibpr-founders__wrap{position:relative;z-index:2;display:flex;align-items:center;gap:40px;
		max-width:1200px;margin:0 auto;padding:0 32px;min-height:520px;}
	.iibpr-founders__cut{align-self:flex-end;height:480px;width:auto;object-fit:contain;object-position:bottom;
		filter:drop-shadow(0 18px 40px rgba(0,0,0,.4));flex:0 0 auto;}
	.iibpr-founders__body{max-width:540px;}
	.iibpr-founders__kicker{color:#A6D16C;font-weight:700;letter-spacing:.16em;text-transform:uppercase;font-size:13px;}
	.iibpr-founders__title{font-family:"Playfair Display",ui-serif,Georgia,serif;font-weight:800;font-size:clamp(28px,3.4vw,42px);line-height:1.1;margin:12px 0 16px;}
	.iibpr-founders__text{font-size:17px;line-height:1.7;color:rgba(255,255,255,.85);}
	@media (max-width:860px){
		.iibpr-founders__wrap{flex-direction:column;text-align:center;padding:48px 24px;gap:8px;}
		.iibpr-founders__cut{height:360px;}
		.iibpr-founders__body{max-width:100%;}
	}
</style>
<section id="fundadores" class="iibpr-founders">
	<div class="iibpr-founders__tex" aria-hidden="true" style="background-image:url('<?php echo esc_url( $brand . 'texture-1.png' ); ?>');"></div>
	<div class="iibpr-founders__wrap">
		<img class="iibpr-founders__cut" src="<?php echo esc_url( $cutout ); ?>" alt="Fundadores do IIBPR" loading="lazy">
		<div class="iibpr-founders__body fade-up">
			<div class="iibpr-founders__kicker"><?php echo esc_html( $kicker ); ?></div>
			<h2 class="iibpr-founders__title"><?php echo esc_html( $title ); ?></h2>
			<p class="iibpr-founders__text"><?php echo wp_kses_post( $text ); ?></p>
		</div>
	</div>
</section>

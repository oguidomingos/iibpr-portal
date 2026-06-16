<?php
/**
 * Template Part: Course Cover — Branded cover for courses/events.
 *
 * Cohesive IIBPR cover model: organic green gradient + texture + concentric-ring
 * "movement" motif (Playfair Display title). Works as a graphic cover (no photo)
 * or as a photo cover (pass 'photo' => URL) with the brand gradient overlay.
 *
 * Usage:
 * get_template_part( 'template-parts/course-cover', null, array(
 *     'title' => get_the_title(),
 *     'level' => 'Básico',   // optional
 *     'type'  => 'Online',    // optional
 *     'photo' => $url,        // optional — switches to photo mode
 *     'kicker'=> 'Formação',  // optional eyebrow
 * ) );
 *
 * @package iibpr_main
 */

$args = wp_parse_args( $args, array(
	'title'  => '',
	'level'  => '',
	'type'   => '',
	'photo'  => '',
	'kicker' => '',
) );

$title  = (string) $args['title'];
$level  = (string) $args['level'];
$type   = (string) $args['type'];
$photo  = (string) $args['photo'];
$kicker = (string) $args['kicker'];

if ( ! $title ) {
	return;
}

$img_base = get_template_directory_uri() . '/images/';
$texture  = $img_base . 'brand/texture-1.png';   // IIBPR monogram pattern
$wave     = $img_base . 'brand/line-white.png';  // brand movement wave

// Print the cover CSS only once per request.
static $iibpr_cover_css_done = false;
if ( ! $iibpr_cover_css_done ) :
	$iibpr_cover_css_done = true;
	?>
	<style id="iibpr-cover-styles">
		.iibpr-cover{position:relative;width:100%;height:100%;min-height:400px;aspect-ratio:3/2;
			overflow:hidden;display:flex;flex-direction:column;justify-content:flex-end;
			color:#fff;isolation:isolate;border-radius:inherit;
			font-family:"Inter",ui-sans-serif,system-ui,sans-serif;}
		/* base: diagonal organic gradient charcoal -> greens */
		.iibpr-cover__bg{position:absolute;inset:0;z-index:0;
			background:linear-gradient(135deg,#404856 0%,#3f5a35 42%,#5A9A42 74%,#6CB350 100%);}
		/* soft radial glow upper-left for depth */
		.iibpr-cover__glow{position:absolute;inset:0;z-index:1;
			background:radial-gradient(120% 90% at 12% 8%,rgba(166,209,108,.38),transparent 55%);}
		/* paper/organic texture */
		.iibpr-cover__texture{position:absolute;inset:0;z-index:2;mix-blend-mode:soft-light;
			opacity:.14;background-size:380px auto;background-position:center;background-repeat:repeat;}
		/* brand wave — "movimento em relação" */
		.iibpr-cover__wave{position:absolute;z-index:2;left:-30px;right:-30px;bottom:74px;height:96px;
			opacity:.5;background-repeat:no-repeat;background-size:contain;background-position:center;
			pointer-events:none;}
		/* photo mode */
		.iibpr-cover__photo{position:absolute;inset:0;z-index:1;background-size:cover;background-position:center;}
		.iibpr-cover__photo-overlay{position:absolute;inset:0;z-index:2;
			background:linear-gradient(135deg,rgba(64,72,86,.88) 0%,rgba(58,90,42,.82) 100%);}
		/* legibility scrim at bottom */
		.iibpr-cover__scrim{position:absolute;inset:0;z-index:3;
			background:linear-gradient(to top,rgba(34,40,32,.55) 0%,transparent 55%);}
		/* top row */
		.iibpr-cover__top{position:absolute;top:22px;left:24px;right:24px;z-index:5;
			display:flex;align-items:center;justify-content:space-between;gap:12px;}
		.iibpr-cover__brand{font-weight:800;letter-spacing:.34em;font-size:13px;color:rgba(255,255,255,.95);}
		.iibpr-cover__badge{background:#A6D16C;color:#2b3320;font-weight:700;font-size:11px;
			letter-spacing:.04em;padding:6px 14px;border-radius:999px;white-space:nowrap;
			box-shadow:0 2px 10px rgba(0,0,0,.18);}
		/* content */
		.iibpr-cover__content{position:relative;z-index:5;padding:26px 28px 30px;}
		.iibpr-cover__rule{width:46px;height:3px;border-radius:2px;background:#A6D16C;margin-bottom:14px;}
		.iibpr-cover__kicker{font-size:12px;font-weight:600;letter-spacing:.18em;text-transform:uppercase;
			color:rgba(255,255,255,.82);margin-bottom:8px;}
		.iibpr-cover__title{font-family:"Playfair Display",ui-serif,Georgia,serif;font-weight:800;
			font-size:clamp(24px,3.4vw,34px);line-height:1.1;color:#fff;margin:0;
			text-shadow:0 2px 14px rgba(0,0,0,.32);
			display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden;}
		.iibpr-cover__barline{position:absolute;left:0;right:0;bottom:0;height:6px;z-index:5;
			background:linear-gradient(90deg,#6CB350 0%,#A6D16C 50%,#6CB350 100%);}
	</style>
	<?php
endif;
?>

<div class="iibpr-cover" role="img" aria-label="<?php echo esc_attr( $title ); ?>">

	<?php if ( $photo ) : ?>
		<div class="iibpr-cover__photo" style="background-image:url('<?php echo esc_url( $photo ); ?>');"></div>
		<div class="iibpr-cover__photo-overlay"></div>
	<?php else : ?>
		<div class="iibpr-cover__bg"></div>
		<div class="iibpr-cover__glow"></div>
		<div class="iibpr-cover__texture" style="background-image:url('<?php echo esc_url( $texture ); ?>');"></div>
		<div class="iibpr-cover__wave" style="background-image:url('<?php echo esc_url( $wave ); ?>');" aria-hidden="true"></div>
	<?php endif; ?>

	<div class="iibpr-cover__scrim"></div>

	<div class="iibpr-cover__top">
		<span class="iibpr-cover__brand">IIBPR</span>
		<?php if ( $level || $type ) : ?>
			<span class="iibpr-cover__badge"><?php echo esc_html( trim( $level . ( ( $level && $type ) ? ' • ' : '' ) . $type ) ); ?></span>
		<?php endif; ?>
	</div>

	<div class="iibpr-cover__content">
		<div class="iibpr-cover__rule"></div>
		<?php if ( $kicker ) : ?>
			<div class="iibpr-cover__kicker"><?php echo esc_html( $kicker ); ?></div>
		<?php endif; ?>
		<h3 class="iibpr-cover__title"><?php echo esc_html( $title ); ?></h3>
	</div>

	<div class="iibpr-cover__barline" aria-hidden="true"></div>
</div>

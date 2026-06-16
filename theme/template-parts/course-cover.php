<?php
/**
 * Template Part: Course Cover — Branded fallback when course has no featured image
 *
 * Usage:
 * get_template_part( 'template-parts/course-cover', null, array(
 *     'title' => get_the_title(),
 *     'level' => 'Básico',  // optional
 *     'type'  => 'Online',   // optional
 * ) );
 *
 * @package iibpr_main
 */

$args = wp_parse_args( $args, array(
	'title' => '',
	'level' => '',
	'type'  => '',
) );

$title = isset( $args['title'] ) ? $args['title'] : '';
$level = isset( $args['level'] ) ? $args['level'] : '';
$type  = isset( $args['type'] ) ? $args['type'] : '';

if ( ! $title ) {
	return;
}

$img_base = get_template_directory_uri() . '/images/';
?>

<div class="w-full h-full bg-iibpr-green relative overflow-hidden flex flex-col items-center justify-center p-8 text-white min-h-[400px]">

	<!-- Texture overlay (22% opacity) -->
	<div class="absolute inset-0 bg-[url('<?php echo esc_url( $img_base . 'textura-fundo.jpg' ); ?>')] bg-cover bg-center opacity-[0.22] pointer-events-none z-0"></div>

	<!-- Logo (top-left) -->
	<div class="absolute top-6 left-6 z-10 text-white/95 font-bold text-xs tracking-widest">IIBPR</div>

	<!-- Level/Type badge (top-right) -->
	<?php if ( $level || $type ) : ?>
	<div class="absolute top-6 right-6 z-10 bg-iibpr-light text-iibpr-charcoal text-xs px-4 py-2 rounded-full font-bold flex items-center gap-2">
		<?php if ( $level ) echo esc_html( $level ); ?>
		<?php if ( $level && $type ) echo '•'; ?>
		<?php if ( $type ) echo esc_html( $type ); ?>
	</div>
	<?php endif; ?>

	<!-- Content wrapper (center) -->
	<div class="relative z-10 text-center flex flex-col items-center justify-center flex-1">
		<!-- Title -->
		<h3 class="text-2xl md:text-3xl font-extrabold font-serif leading-tight text-white px-4 line-clamp-4">
			<?php echo esc_html( $title ); ?>
		</h3>
	</div>

	<!-- Decorative bottom bar -->
	<div class="absolute bottom-0 left-0 right-0 h-2 bg-white/30"></div>

	<!-- Accent bars (optional design element) -->
	<div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex gap-3 z-10">
		<div class="w-12 h-1 bg-white/40 rounded-full"></div>
		<div class="w-12 h-1 bg-white/60 rounded-full"></div>
		<div class="w-12 h-1 bg-white/40 rounded-full"></div>
	</div>

</div>

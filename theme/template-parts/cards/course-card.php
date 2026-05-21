<?php
/**
 * Template Part: Course Card
 * Used in course catalog and homepage featured courses.
 */
$hours     = get_post_meta( get_the_ID(), '_iibpr_course_hours', true );
$price     = get_post_meta( get_the_ID(), '_iibpr_course_price', true );
$cta_url   = get_post_meta( get_the_ID(), '_iibpr_course_cta_url', true );
$levels    = get_the_terms( get_the_ID(), 'nivel' );
$modalities = get_the_terms( get_the_ID(), 'modalidade' );
$areas     = get_the_terms( get_the_ID(), 'area' );
$level_name    = ( $levels && ! is_wp_error( $levels ) ) ? $levels[0]->name : '';
$modality_name = ( $modalities && ! is_wp_error( $modalities ) ) ? $modalities[0]->name : '';
$area_name     = ( $areas && ! is_wp_error( $areas ) ) ? $areas[0]->name : '';
?>
<article class="course-card bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 h-full flex flex-col"
         data-modality="<?php echo esc_attr( $modality_name ); ?>"
         data-level="<?php echo esc_attr( $level_name ); ?>"
         data-area="<?php echo esc_attr( $area_name ); ?>">

	<!-- Photo zone -->
	<div class="relative h-48 overflow-hidden flex-shrink-0 course-card-media">

		<?php if ( has_post_thumbnail() ) : ?>
		<!-- Real thumbnail -->
		<?php the_post_thumbnail( 'medium_large', array( 'class' => 'course-card-image', 'loading' => 'lazy' ) ); ?>
		<?php else : ?>
		<!-- Fallback: branded course cover template -->
		<?php
		get_template_part(
			'template-parts/course-cover',
			null,
			array(
				'title'  => get_the_title(),
				'level'  => $level_name,
				'type'   => $modality_name,
			)
		);
		?>
		<?php endif; ?>

		<!-- Gradient overlay (minimal — thumbnails already have brand overlays) -->
		<div class="absolute inset-0 pointer-events-none" style="background: linear-gradient(to bottom, transparent 70%, rgba(0,0,0,0.3));"></div>

		<!-- Logo pill top-left (over photo) -->
		<div class="absolute top-3 left-3 bg-white/95 px-3 py-1.5 rounded-full text-xs font-bold text-iibpr-green backdrop-blur-sm shadow-sm">
			IIBPR
		</div>

		<!-- Level badge top-right -->
		<?php if ( $level_name ) : ?>
		<div class="absolute top-3 right-3 bg-iibpr-light px-3 py-1.5 rounded-full text-xs font-bold text-white">
			<?php echo esc_html( $level_name ); ?>
		</div>
		<?php endif; ?>

		<!-- Hours bottom-right (over gradient) -->
		<?php if ( $hours ) : ?>
		<div class="absolute bottom-3 right-3 text-white text-sm font-bold opacity-90">
			<?php echo esc_html( $hours ); ?>
		</div>
		<?php endif; ?>

	</div>

	<!-- Content section -->
	<div class="p-5 flex flex-col flex-1">

		<!-- Title -->
		<h3 class="text-lg font-bold text-iibpr-charcoal mb-2 font-serif line-clamp-2">
			<a href="<?php the_permalink(); ?>" class="no-underline text-iibpr-charcoal hover:text-iibpr-green transition-colors">
				<?php the_title(); ?>
			</a>
		</h3>

		<!-- Excerpt -->
		<?php if ( has_excerpt() ) : ?>
		<p class="text-gray-500 text-sm leading-relaxed flex-1 line-clamp-3"><?php echo esc_html( get_the_excerpt() ); ?></p>
		<?php endif; ?>

		<!-- Area tag (small, gray) -->
		<?php if ( $area_name ) : ?>
		<p class="text-xs text-gray-400 mt-2"><?php echo esc_html( $area_name ); ?></p>
		<?php endif; ?>

		<!-- CTA bar: price + button -->
		<div class="mt-4 flex items-center justify-between gap-2">
			<?php if ( $price ) : ?>
			<span class="text-lg font-extrabold text-iibpr-charcoal"><?php echo esc_html( $price ); ?></span>
			<?php else : ?>
			<span></span>
			<?php endif; ?>
			<a href="<?php echo esc_url( $cta_url ?: get_the_permalink() ); ?>" class="bg-iibpr-green text-white px-5 py-2 rounded-full text-sm font-bold hover:bg-iibpr-green-dark transition-colors no-underline">
				Saiba Mais
			</a>
		</div>

	</div>

</article>

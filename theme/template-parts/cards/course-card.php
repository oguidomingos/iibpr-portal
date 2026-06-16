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

	<!-- Branded cover (uniform 3:2 across all cards) -->
	<div class="relative aspect-[3/2] overflow-hidden flex-shrink-0 course-card-media iibpr-cover-fill">
		<?php
		get_template_part(
			'template-parts/course-cover',
			null,
			array(
				'title'      => get_the_title(),
				'level'      => $level_name,
				'type'       => $modality_name,
				'show_title' => false,
			)
		);
		?>
	</div>

	<!-- Content section -->
	<div class="p-5 flex flex-col flex-1">

		<!-- Title -->
		<h3 class="text-lg font-bold text-iibpr-charcoal mb-2 font-serif">
			<a href="<?php the_permalink(); ?>" class="no-underline text-iibpr-charcoal hover:text-iibpr-green transition-colors">
				<?php the_title(); ?>
			</a>
		</h3>

		<!-- Excerpt -->
		<?php if ( has_excerpt() ) : ?>
		<p class="text-gray-500 text-sm leading-relaxed flex-1"><?php echo esc_html( get_the_excerpt() ); ?></p>
		<?php endif; ?>

		<!-- Area + carga horária (small, gray) -->
		<?php if ( $area_name || $hours ) : ?>
		<p class="text-xs text-gray-400 mt-2"><?php echo esc_html( trim( $area_name . ( ( $area_name && $hours ) ? ' • ' : '' ) . $hours ) ); ?></p>
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

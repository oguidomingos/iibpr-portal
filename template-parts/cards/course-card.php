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
<article class="course-card h-full flex flex-col"
         data-modality="<?php echo esc_attr( $modality_name ); ?>"
         data-level="<?php echo esc_attr( $level_name ); ?>"
         data-area="<?php echo esc_attr( $area_name ); ?>">
	<?php if ( has_post_thumbnail() ) : ?>
	<div class="h-48 overflow-hidden">
		<?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-full object-cover hover:scale-105 transition-transform duration-300', 'loading' => 'lazy' ) ); ?>
	</div>
	<?php else : ?>
	<div class="h-48 bg-primary-gradient flex items-center justify-center">
		<svg class="w-16 h-16 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
	</div>
	<?php endif; ?>

	<div class="p-6 flex flex-col flex-1">
		<div class="flex flex-wrap items-center gap-2 mb-3">
			<?php if ( $level_name ) : ?>
			<span class="course-card-badge bg-green-100 text-green-700"><?php echo esc_html( $level_name ); ?></span>
			<?php endif; ?>
			<?php if ( $area_name ) : ?>
			<span class="course-card-badge bg-green-100 text-green-700"><?php echo esc_html( $area_name ); ?></span>
			<?php endif; ?>
			<?php if ( $hours ) : ?>
			<span class="text-sm font-semibold text-iibpr-green ml-auto"><?php echo esc_html( $hours ); ?></span>
			<?php endif; ?>
		</div>

		<h3 class="text-lg font-bold text-gray-900 mb-2">
			<a href="<?php the_permalink(); ?>" class="no-underline text-gray-900 hover:text-iibpr-green transition-colors">
				<?php the_title(); ?>
			</a>
		</h3>

		<?php if ( has_excerpt() ) : ?>
		<p class="text-gray-600 text-sm leading-relaxed flex-1"><?php echo esc_html( get_the_excerpt() ); ?></p>
		<?php endif; ?>

		<?php if ( $modality_name ) : ?>
		<p class="text-xs text-gray-400 mt-2"><?php echo esc_html( $modality_name ); ?></p>
		<?php endif; ?>

		<div class="mt-4 flex items-center justify-between">
			<?php if ( $price ) : ?>
			<span class="text-lg font-extrabold text-gray-900"><?php echo esc_html( $price ); ?></span>
			<?php else : ?>
			<span></span>
			<?php endif; ?>
			<a href="<?php echo esc_url( $cta_url ?: get_the_permalink() ); ?>" class="btn-primary text-sm py-2 px-5">Saiba Mais</a>
		</div>
	</div>
</article>

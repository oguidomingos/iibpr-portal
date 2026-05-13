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

	<!-- Photo zone (h-52 ~208px) -->
	<div class="relative h-52 overflow-hidden flex-shrink-0">

		<?php if ( has_post_thumbnail() ) : ?>
		<!-- Real thumbnail -->
		<?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-full object-cover', 'loading' => 'lazy' ) ); ?>
		<?php else : ?>
		<!-- Fallback: branded cover -->
		<div class="w-full h-full bg-gradient-to-br from-[#6CB350] to-[#A6D16C] flex items-center justify-center">
			<svg class="w-16 h-16 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
		</div>
		<?php endif; ?>

		<!-- Gradient overlay (bottom fade to green) -->
		<div class="absolute inset-0 bg-gradient-to-b from-transparent via-[#6CB350]/30 to-[#6CB350]/80 pointer-events-none"></div>

		<!-- Logo pill top-left (over photo) -->
		<div class="absolute top-3 left-3 bg-white/95 px-3 py-1.5 rounded-full text-xs font-bold text-[#6CB350] backdrop-blur-sm shadow-sm">
			IIBPR
		</div>

		<!-- Level badge top-right -->
		<?php if ( $level_name ) : ?>
		<div class="absolute top-3 right-3 bg-[#A6D16C] px-3 py-1.5 rounded-full text-xs font-bold text-white">
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
		<h3 class="text-lg font-bold text-[#404856] mb-2 font-serif line-clamp-2">
			<a href="<?php the_permalink(); ?>" class="no-underline text-[#404856] hover:text-[#6CB350] transition-colors">
				<?php the_title(); ?>
			</a>
		</h3>

		<!-- Excerpt -->
		<?php if ( has_excerpt() ) : ?>
		<p class="text-[#6B7280] text-sm leading-relaxed flex-1 line-clamp-3"><?php echo esc_html( get_the_excerpt() ); ?></p>
		<?php endif; ?>

		<!-- Area tag (small, gray) -->
		<?php if ( $area_name ) : ?>
		<p class="text-xs text-gray-400 mt-2"><?php echo esc_html( $area_name ); ?></p>
		<?php endif; ?>

		<!-- CTA bar: price + button -->
		<div class="mt-4 flex items-center justify-between gap-2">
			<?php if ( $price ) : ?>
			<span class="text-lg font-extrabold text-[#404856]"><?php echo esc_html( $price ); ?></span>
			<?php else : ?>
			<span></span>
			<?php endif; ?>
			<a href="<?php echo esc_url( $cta_url ?: get_the_permalink() ); ?>" class="bg-[#6CB350] text-white px-5 py-2 rounded-full text-sm font-bold hover:bg-[#5a9e43] transition-colors no-underline">
				Saiba Mais
			</a>
		</div>

	</div>

</article>

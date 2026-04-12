<?php
/**
 * Template Part: Event Card
 */
$date_start = get_post_meta( get_the_ID(), '_iibpr_event_date_start', true );
$date_end   = get_post_meta( get_the_ID(), '_iibpr_event_date_end', true );
$location   = get_post_meta( get_the_ID(), '_iibpr_event_location', true );
$modality   = get_post_meta( get_the_ID(), '_iibpr_event_modality', true );
$event_type = get_post_meta( get_the_ID(), '_iibpr_event_type', true );
$cta_url    = get_post_meta( get_the_ID(), '_iibpr_event_cta_url', true );

$date_display = '';
if ( $date_start ) {
    $date_display = iibpr_date_pt( 'd M Y', strtotime( $date_start ) );
    if ( $date_end && $date_end !== $date_start ) {
        $date_display .= ' — ' . iibpr_date_pt( 'd M Y', strtotime( $date_end ) );
    }
}
?>
<article class="card-hover overflow-hidden">
	<div class="h-2 bg-primary-gradient"></div>
	<?php if ( has_post_thumbnail() ) : ?>
	<div class="h-40 overflow-hidden">
		<?php the_post_thumbnail( 'medium', array( 'class' => 'w-full h-full object-cover', 'loading' => 'lazy' ) ); ?>
	</div>
	<?php endif; ?>
	<div class="p-6">
		<?php if ( $event_type ) : ?>
		<span class="course-card-badge bg-green-100 text-green-700 mb-3"><?php echo esc_html( $event_type ); ?></span>
		<?php endif; ?>

		<h3 class="text-lg font-bold text-gray-900 mb-2">
			<a href="<?php the_permalink(); ?>" class="no-underline text-gray-900 hover:text-iibpr-green transition-colors">
				<?php the_title(); ?>
			</a>
		</h3>

		<?php if ( $date_display ) : ?>
		<p class="text-sm text-iibpr-green font-medium mb-2 flex items-center gap-1">
			<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
			<?php echo esc_html( $date_display ); ?>
		</p>
		<?php endif; ?>

		<?php if ( $location ) : ?>
		<p class="text-sm text-gray-500 mb-2 flex items-center gap-1">
			<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
			<?php echo esc_html( $location ); ?><?php if ( $modality ) echo ' · ' . esc_html( $modality ); ?>
		</p>
		<?php endif; ?>

		<?php if ( has_excerpt() ) : ?>
		<p class="text-gray-600 text-sm leading-relaxed mb-4"><?php echo esc_html( get_the_excerpt() ); ?></p>
		<?php endif; ?>

		<a href="<?php echo esc_url( $cta_url ?: get_the_permalink() ); ?>"
		   class="text-iibpr-green font-semibold text-sm hover:text-iibpr-green-dark transition-colors inline-flex items-center gap-1 no-underline">
			Saiba mais
			<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
		</a>
	</div>
</article>

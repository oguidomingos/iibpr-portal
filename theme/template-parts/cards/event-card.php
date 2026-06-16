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
<article class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 h-full flex flex-col">

	<!-- Branded cover (uniform 3:2 across all cards) -->
	<div class="relative aspect-[3/2] overflow-hidden flex-shrink-0 iibpr-cover-fill">
		<?php
		get_template_part(
			'template-parts/course-cover',
			null,
			array(
				'title' => get_the_title(),
				'type'  => $event_type,
			)
		);
		?>
	</div>

	<!-- Content section -->
	<div class="p-5 flex flex-col flex-1">

		<h3 class="text-lg font-bold text-iibpr-charcoal mb-2 font-serif line-clamp-2">
			<a href="<?php the_permalink(); ?>" class="no-underline text-iibpr-charcoal hover:text-iibpr-green transition-colors">
				<?php the_title(); ?>
			</a>
		</h3>

		<?php if ( $date_display ) : ?>
		<p class="text-sm font-semibold text-iibpr-green mb-2 flex items-center gap-1">
			<svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
			<?php echo esc_html( $date_display ); ?>
		</p>
		<?php endif; ?>

		<?php if ( $location ) : ?>
		<p class="text-sm text-gray-500 mb-2 flex items-center gap-1">
			<svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
			<?php echo esc_html( $location ); ?><?php if ( $modality ) echo ' · ' . esc_html( $modality ); ?>
		</p>
		<?php endif; ?>

		<?php if ( has_excerpt() ) : ?>
		<p class="text-gray-500 text-sm leading-relaxed flex-1 line-clamp-3"><?php echo esc_html( get_the_excerpt() ); ?></p>
		<?php endif; ?>

		<!-- CTA -->
		<div class="mt-4">
			<a href="<?php echo esc_url( $cta_url ?: get_the_permalink() ); ?>"
			   class="bg-iibpr-green text-white px-5 py-2 rounded-full text-sm font-bold hover:bg-iibpr-green-dark transition-colors no-underline inline-block">
				Saiba Mais
			</a>
		</div>

	</div>

</article>

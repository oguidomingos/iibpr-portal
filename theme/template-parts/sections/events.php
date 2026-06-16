<?php
/**
 * Template Part: Events Section
 */
$selected_event_ids = array_values( array_filter( array_map(
	'absint',
	array(
		iibpr_get( 'iibpr_home_featured_event_1', 0 ),
		iibpr_get( 'iibpr_home_featured_event_2', 0 ),
		iibpr_get( 'iibpr_home_featured_event_3', 0 ),
	)
) ) );

$query_args = array(
	'post_type'      => 'iibpr_evento',
	'posts_per_page' => 3,
);

if ( ! empty( $selected_event_ids ) ) {
	$query_args['post__in'] = $selected_event_ids;
	$query_args['orderby']  = 'post__in';
} else {
	$query_args['meta_key']   = '_iibpr_event_date_start';
	$query_args['orderby']    = 'meta_value';
	$query_args['order']      = 'ASC';
	$query_args['meta_query'] = array(
		'relation' => 'OR',
		array(
			'key'     => '_iibpr_event_date_start',
			'value'   => date( 'Y-m-d' ),
			'compare' => '>=',
			'type'    => 'DATE',
		),
		array(
			'key'     => '_iibpr_event_date_start',
			'compare' => 'NOT EXISTS',
		),
	);
}

$events = new WP_Query( $query_args );

// Fallback: if no future events found, show the 3 most recent
if ( ! $events->have_posts() ) {
	$events = new WP_Query( array(
		'post_type'      => 'iibpr_evento',
		'posts_per_page' => 3,
		'orderby'        => 'date',
		'order'          => 'DESC',
	) );
}

$has_cpt_events = $events->have_posts();
?>
<section id="eventos-home" class="section-padding bg-gray-50">
	<div class="container-narrow">

		<div class="text-center mb-14 fade-up">
			<p class="section-label home-events-label"><?php echo esc_html( iibpr_get( 'iibpr_home_events_label', 'Agenda' ) ); ?></p>
			<h2 class="section-title home-events-title"><?php echo wp_kses_post( iibpr_get( 'iibpr_home_events_title', 'Próximos Eventos' ) ); ?></h2>
			<p class="section-subtitle home-events-subtitle"><?php echo wp_kses_post( iibpr_get( 'iibpr_home_events_subtitle', 'Seminários, workshops e formações presenciais e online.' ) ); ?></p>
		</div>

		<?php if ( $has_cpt_events ) : ?>
		<div class="grid md:grid-cols-3 gap-8">
			<?php while ( $events->have_posts() ) : $events->the_post(); ?>
				<?php get_template_part( 'template-parts/cards/event-card' ); ?>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
		<?php else : ?>
		<!-- Fallback: Customizer events -->
		<div class="grid md:grid-cols-3 gap-8">
			<?php for ( $i = 1; $i <= 3; $i++ ) :
				$ev_title = iibpr_get( "iibpr_event_{$i}_title" );
				$ev_date  = iibpr_get( "iibpr_event_{$i}_date" );
				$ev_type  = iibpr_get( "iibpr_event_{$i}_type" );
				$ev_desc  = iibpr_get( "iibpr_event_{$i}_desc" );
				$ev_url   = iibpr_get( "iibpr_event_{$i}_url" );
				if ( ! $ev_title ) continue;
			?>
			<article class="card-hover overflow-hidden fade-up fade-up-delay-<?php echo $i; ?>">
				<div class="h-2 bg-primary-gradient"></div>
				<div class="p-6">
					<?php if ( $ev_type ) : ?>
					<span class="course-card-badge bg-green-100 text-green-700 mb-3"><?php echo esc_html( $ev_type ); ?></span>
					<?php endif; ?>
					<h3 class="text-lg font-bold text-gray-900 mb-2"><?php echo esc_html( $ev_title ); ?></h3>
					<?php if ( $ev_date ) : ?>
					<p class="text-sm text-iibpr-green font-medium mb-3 flex items-center gap-1">
						<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
						<?php echo esc_html( $ev_date ); ?>
					</p>
					<?php endif; ?>
					<?php if ( $ev_desc ) : ?>
					<p class="text-gray-600 text-sm leading-relaxed mb-4"><?php echo wp_kses_post( $ev_desc ); ?></p>
					<?php endif; ?>
					<?php if ( $ev_url ) : ?>
					<a href="<?php echo esc_url( $ev_url ); ?>" class="text-iibpr-green font-semibold text-sm hover:text-iibpr-green-dark transition-colors inline-flex items-center gap-1 no-underline">
						Saiba mais
						<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
					</a>
					<?php endif; ?>
				</div>
			</article>
			<?php endfor; ?>
		</div>
		<?php endif; ?>

		<div class="text-center mt-12 fade-up">
			<a href="<?php echo esc_url( site_url( '/eventos' ) ); ?>" class="btn-secondary">Ver Todos os Eventos</a>
		</div>

	</div>
</section>

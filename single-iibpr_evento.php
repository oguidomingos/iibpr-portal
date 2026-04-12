<?php
/**
 * Single Event Template
 */
get_header();

$pid        = get_the_ID();
$date_start = get_post_meta( $pid, '_iibpr_event_date_start', true );
$date_end   = get_post_meta( $pid, '_iibpr_event_date_end', true );
$location   = get_post_meta( $pid, '_iibpr_event_location', true );
$modality   = get_post_meta( $pid, '_iibpr_event_modality', true );
$event_type = get_post_meta( $pid, '_iibpr_event_type', true );
$cta_url    = get_post_meta( $pid, '_iibpr_event_cta_url', true );
$price      = get_post_meta( $pid, '_iibpr_event_price', true );
$hours      = get_post_meta( $pid, '_iibpr_event_hours', true );
$speakers   = get_post_meta( $pid, '_iibpr_event_speakers', true );
$schedule   = get_post_meta( $pid, '_iibpr_event_schedule', true );
$img        = get_template_directory_uri() . '/images/';

// Date formatting in Portuguese
$date_display = '';
if ( $date_start ) {
	$date_display = iibpr_date_pt( 'd \d\e F \d\e Y', strtotime( $date_start ) );
	if ( $date_end && $date_end !== $date_start ) {
		$date_display = iibpr_date_pt( 'd', strtotime( $date_start ) ) . ' a ' . iibpr_date_pt( 'd \d\e F \d\e Y', strtotime( $date_end ) );
	}
}

// Is this a future event?
$is_upcoming = $date_start && strtotime( $date_start ) >= strtotime( 'today' );

// Parse speakers (Name|Role per line)
$speaker_list = array();
if ( $speakers ) {
	$lines = strpos( $speakers, "\n" ) !== false
		? array_filter( array_map( 'trim', explode( "\n", $speakers ) ) )
		: array( $speakers );
	foreach ( $lines as $line ) {
		$parts = explode( '|', $line, 2 );
		$speaker_list[] = array(
			'name' => trim( $parts[0] ),
			'role' => isset( $parts[1] ) ? trim( $parts[1] ) : '',
		);
	}
}

// Parse schedule (Time|Activity per line)
$schedule_list = array();
if ( $schedule ) {
	$lines = strpos( $schedule, "\n" ) !== false
		? array_filter( array_map( 'trim', explode( "\n", $schedule ) ) )
		: array( $schedule );
	foreach ( $lines as $line ) {
		$parts = explode( '|', $line, 2 );
		$schedule_list[] = array(
			'time'     => trim( $parts[0] ),
			'activity' => isset( $parts[1] ) ? trim( $parts[1] ) : '',
		);
	}
}
?>

<main id="main" class="site-main">

	<!-- Hero -->
	<?php
	$hero_bg = $img . 'mauro-palestra2.png';
	if ( has_post_thumbnail() ) {
		$hero_bg = get_the_post_thumbnail_url( $pid, 'large' );
	}
	?>
	<section class="py-24 px-4 md:px-8 text-white -mt-[72px] pt-[120px] pb-16 relative overflow-hidden"
	         style="background-image: linear-gradient(135deg, rgba(64,72,86,0.88) 0%, rgba(58,90,42,0.82) 100%), url('<?php echo esc_url( $hero_bg ); ?>'); background-size: cover; background-position: center;">
		<div class="max-w-5xl mx-auto relative z-10">

			<!-- Breadcrumb -->
			<nav class="text-sm text-white/70 mb-6">
				<a href="<?php echo home_url(); ?>" class="hover:text-white no-underline text-white/70">Início</a>
				<span class="mx-2">/</span>
				<a href="<?php echo home_url( '/eventos' ); ?>" class="hover:text-white no-underline text-white/70">Eventos</a>
				<span class="mx-2">/</span>
				<span class="text-white"><?php the_title(); ?></span>
			</nav>

			<div class="flex flex-wrap gap-2 mb-4">
				<?php if ( $event_type ) : ?>
				<span class="bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-sm font-semibold"><?php echo esc_html( $event_type ); ?></span>
				<?php endif; ?>
				<?php if ( $is_upcoming ) : ?>
				<span class="bg-green-500/30 backdrop-blur-sm px-3 py-1 rounded-full text-sm font-semibold">Inscrições Abertas</span>
				<?php else : ?>
				<span class="bg-white/10 backdrop-blur-sm px-3 py-1 rounded-full text-sm font-semibold">Evento Realizado</span>
				<?php endif; ?>
			</div>

			<h1 class="text-3xl md:text-5xl font-extrabold mb-6 leading-tight"><?php the_title(); ?></h1>

			<?php if ( has_excerpt() ) : ?>
			<p class="text-xl text-white/90 max-w-3xl mb-6"><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php endif; ?>

			<!-- Key details bar -->
			<div class="flex flex-wrap gap-6 text-white/90">
				<?php if ( $date_display ) : ?>
				<span class="flex items-center gap-2">
					<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
					<?php echo esc_html( $date_display ); ?>
				</span>
				<?php endif; ?>
				<?php if ( $location ) : ?>
				<span class="flex items-center gap-2">
					<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
					<?php echo esc_html( $location ); ?>
				</span>
				<?php endif; ?>
				<?php if ( $hours ) : ?>
				<span class="flex items-center gap-2">
					<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
					<?php echo esc_html( $hours ); ?>
				</span>
				<?php endif; ?>
			</div>

		</div>
	</section>

	<!-- Main content with sidebar -->
	<section class="py-12 px-4 md:px-8 bg-warm-white">
		<div class="max-w-5xl mx-auto">
			<div class="grid lg:grid-cols-3 gap-10">

				<!-- Main column -->
				<div class="lg:col-span-2 space-y-12">

					<!-- Featured image -->
					<?php if ( has_post_thumbnail() ) : ?>
					<div class="rounded-2xl overflow-hidden shadow-lg">
						<?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-auto' ) ); ?>
					</div>
					<?php endif; ?>

					<!-- Content -->
					<?php if ( get_the_content() ) : ?>
					<div class="prose prose-lg max-w-none prose-headings:text-gray-900 prose-a:text-iibpr-green">
						<?php the_content(); ?>
					</div>
					<?php endif; ?>

					<!-- Speakers -->
					<?php if ( $speaker_list ) : ?>
					<div>
						<h2 class="text-2xl font-bold text-gray-900 mb-6">Palestrantes</h2>
						<div class="grid sm:grid-cols-2 gap-4">
							<?php foreach ( $speaker_list as $speaker ) :
								// Try to find team member photo
								$team_photo = '';
								$team_query = new WP_Query( array(
									'post_type'      => 'iibpr_equipe',
									'posts_per_page' => 1,
									's'              => $speaker['name'],
								) );
								if ( $team_query->have_posts() ) {
									$team_query->the_post();
									if ( has_post_thumbnail() ) {
										$team_photo = get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' );
									}
									wp_reset_postdata();
								}
							?>
							<div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm flex items-center gap-4">
								<?php if ( $team_photo ) : ?>
								<img src="<?php echo esc_url( $team_photo ); ?>" alt="<?php echo esc_attr( $speaker['name'] ); ?>" class="w-14 h-14 rounded-full object-cover flex-shrink-0">
								<?php else : ?>
								<div class="w-14 h-14 bg-iibpr-green/10 rounded-full flex items-center justify-center flex-shrink-0">
									<svg class="w-7 h-7 text-iibpr-green" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
								</div>
								<?php endif; ?>
								<div>
									<p class="font-bold text-gray-900"><?php echo esc_html( $speaker['name'] ); ?></p>
									<?php if ( $speaker['role'] ) : ?>
									<p class="text-sm text-gray-500"><?php echo esc_html( $speaker['role'] ); ?></p>
									<?php endif; ?>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
					<?php endif; ?>

					<!-- Schedule -->
					<?php if ( $schedule_list ) : ?>
					<div>
						<h2 class="text-2xl font-bold text-gray-900 mb-6">Programação</h2>
						<div class="space-y-4">
							<?php foreach ( $schedule_list as $idx => $item ) : ?>
							<div class="flex gap-4 items-start">
								<div class="flex-shrink-0 w-10 h-10 bg-iibpr-green rounded-full flex items-center justify-center text-white font-bold text-sm">
									<?php echo $idx + 1; ?>
								</div>
								<div class="flex-1 bg-white rounded-xl p-5 border border-gray-100 shadow-sm">
									<p class="font-bold text-gray-900 mb-1"><?php echo esc_html( $item['time'] ); ?></p>
									<?php if ( $item['activity'] ) : ?>
									<p class="text-gray-600 text-sm"><?php echo esc_html( $item['activity'] ); ?></p>
									<?php endif; ?>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
					<?php endif; ?>

				</div>

				<!-- Sidebar -->
				<div class="lg:col-span-1">
					<div class="sticky top-24 space-y-6">

						<!-- CTA Card -->
						<div class="bg-white rounded-2xl border border-gray-200 shadow-lg overflow-hidden">
							<div class="h-2 bg-gradient-to-r from-iibpr-green to-iibpr-green-light"></div>
							<div class="p-6 space-y-5">

								<?php if ( $is_upcoming ) : ?>
									<?php if ( $price ) : ?>
									<div>
										<p class="text-sm text-gray-500 mb-1">Investimento</p>
										<p class="text-2xl font-extrabold text-gray-900"><?php echo esc_html( $price ); ?></p>
									</div>
									<?php endif; ?>

									<?php if ( $cta_url ) : ?>
									<a href="<?php echo esc_url( $cta_url ); ?>" target="_blank" rel="noopener"
									   class="btn-primary w-full text-center text-lg py-4 block">
										Garantir Minha Vaga
									</a>
									<?php endif; ?>
								<?php else : ?>
									<div class="text-center py-4">
										<div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
											<svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
										</div>
										<p class="font-bold text-gray-700">Evento Realizado</p>
										<p class="text-sm text-gray-500 mt-1">Confira os próximos eventos</p>
									</div>
									<a href="<?php echo home_url( '/eventos' ); ?>"
									   class="btn-primary w-full text-center py-3 block">
										Ver Próximos Eventos
									</a>
								<?php endif; ?>

								<!-- Details -->
								<div class="space-y-3 pt-2 border-t border-gray-100">
									<?php if ( $date_display ) : ?>
									<div class="flex items-center gap-3 text-sm">
										<svg class="w-5 h-5 text-iibpr-green flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
										<span class="text-gray-700"><?php echo esc_html( $date_display ); ?></span>
									</div>
									<?php endif; ?>

									<?php if ( $location ) : ?>
									<div class="flex items-center gap-3 text-sm">
										<svg class="w-5 h-5 text-iibpr-green flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
										<span class="text-gray-700"><?php echo esc_html( $location ); ?></span>
									</div>
									<?php endif; ?>

									<?php if ( $modality ) : ?>
									<div class="flex items-center gap-3 text-sm">
										<svg class="w-5 h-5 text-iibpr-green flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
										<span class="text-gray-700"><?php echo esc_html( $modality ); ?></span>
									</div>
									<?php endif; ?>

									<?php if ( $hours ) : ?>
									<div class="flex items-center gap-3 text-sm">
										<svg class="w-5 h-5 text-iibpr-green flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
										<span class="text-gray-700"><?php echo esc_html( $hours ); ?></span>
									</div>
									<?php endif; ?>

									<?php if ( $event_type ) : ?>
									<div class="flex items-center gap-3 text-sm">
										<svg class="w-5 h-5 text-iibpr-green flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
										<span class="text-gray-700"><?php echo esc_html( $event_type ); ?></span>
									</div>
									<?php endif; ?>
								</div>
							</div>
						</div>

						<!-- WhatsApp quick contact -->
						<a href="https://wa.me/5561991572149" target="_blank" rel="noopener"
						   class="flex items-center gap-3 bg-green-50 hover:bg-green-100 border border-green-200 rounded-xl p-4 no-underline transition-colors">
							<svg class="w-8 h-8 text-green-600 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
							<div>
								<p class="font-bold text-green-800 text-sm">Dúvidas sobre o evento?</p>
								<p class="text-green-700 text-xs">Fale conosco pelo WhatsApp</p>
							</div>
						</a>

						<!-- Share -->
						<div class="bg-white rounded-xl border border-gray-200 p-5">
							<p class="font-bold text-gray-900 text-sm mb-3">Compartilhe este evento</p>
							<div class="flex gap-3">
								<a href="https://wa.me/?text=<?php echo urlencode( get_the_title() . ' - ' . get_the_permalink() ); ?>" target="_blank" rel="noopener"
								   class="w-10 h-10 bg-green-100 hover:bg-green-200 rounded-full flex items-center justify-center transition-colors no-underline">
									<svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
								</a>
								<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_the_permalink() ); ?>" target="_blank" rel="noopener"
								   class="w-10 h-10 bg-blue-100 hover:bg-blue-200 rounded-full flex items-center justify-center transition-colors no-underline">
									<svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
								</a>
								<a href="https://www.instagram.com/iibpr_psicomotricidade/" target="_blank" rel="noopener"
								   class="w-10 h-10 bg-pink-100 hover:bg-pink-200 rounded-full flex items-center justify-center transition-colors no-underline">
									<svg class="w-5 h-5 text-pink-600" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
								</a>
							</div>
						</div>

					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- Related Events -->
	<?php
	$related = new WP_Query( array(
		'post_type'      => 'iibpr_evento',
		'posts_per_page' => 3,
		'post__not_in'   => array( $pid ),
		'meta_key'       => '_iibpr_event_date_start',
		'orderby'        => 'meta_value',
		'order'          => 'DESC',
	) );
	if ( $related->have_posts() ) : ?>
	<section class="py-16 px-4 md:px-8 bg-gray-50">
		<div class="max-w-5xl mx-auto">
			<h2 class="text-2xl font-bold text-gray-900 mb-8 text-center">Outros Eventos</h2>
			<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
				<?php while ( $related->have_posts() ) : $related->the_post();
					get_template_part( 'template-parts/cards/event-card' );
				endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

</main>

<?php get_footer(); ?>

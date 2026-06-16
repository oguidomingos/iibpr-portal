<?php
/**
 * Single Course Template
 */
get_header();

$pid           = get_the_ID();
$hours         = get_post_meta( $pid, '_iibpr_course_hours', true );
$price         = get_post_meta( $pid, '_iibpr_course_price', true );
$cta_url       = get_post_meta( $pid, '_iibpr_course_cta_url', true );
$learnings     = get_post_meta( $pid, '_iibpr_course_learnings', true );
$audience      = get_post_meta( $pid, '_iibpr_course_audience', true );
$differentials = get_post_meta( $pid, '_iibpr_course_differentials', true );
$modules       = get_post_meta( $pid, '_iibpr_course_modules', true );
$faculty       = get_post_meta( $pid, '_iibpr_course_faculty', true );
$faq           = get_post_meta( $pid, '_iibpr_course_faq', true );
$format        = get_post_meta( $pid, '_iibpr_course_format', true );
$start_date    = get_post_meta( $pid, '_iibpr_course_start_date', true );
$lessons       = get_post_meta( $pid, '_iibpr_course_lessons', true );
$guarantee     = get_post_meta( $pid, '_iibpr_course_guarantee', true );
$modalities    = get_the_terms( $pid, 'modalidade' );
$levels        = get_the_terms( $pid, 'nivel' );
$areas         = get_the_terms( $pid, 'area' );
$modality_name = ( $modalities && ! is_wp_error( $modalities ) ) ? $modalities[0]->name : '';
$level_name    = ( $levels && ! is_wp_error( $levels ) ) ? $levels[0]->name : '';
$area_name     = ( $areas && ! is_wp_error( $areas ) ) ? $areas[0]->name : '';

// Parse pipe-delimited fields
function iibpr_parse_pipe( $str ) {
	if ( ! $str ) return array();
	if ( strpos( $str, "\n" ) !== false ) {
		return array_filter( array_map( 'trim', explode( "\n", $str ) ) );
	}
	return array_filter( array_map( 'trim', explode( '|', $str ) ) );
}

function iibpr_parse_pipe_pairs( $str ) {
	if ( ! $str ) return array();
	$pairs = array();
	if ( strpos( $str, "\n" ) !== false ) {
		$lines = array_filter( array_map( 'trim', explode( "\n", $str ) ) );
		foreach ( $lines as $line ) {
			$parts   = explode( '|', $line, 2 );
			$pairs[] = array( trim( $parts[0] ), isset( $parts[1] ) ? trim( $parts[1] ) : '' );
		}
	} else {
		$items = array_map( 'trim', explode( '|', $str ) );
		for ( $i = 0; $i < count( $items ) - 1; $i += 2 ) {
			$pairs[] = array( $items[ $i ], $items[ $i + 1 ] );
		}
	}
	return $pairs;
}

$learning_items = iibpr_parse_pipe( $learnings );
$audience_items = iibpr_parse_pipe( $audience );
$diff_items     = iibpr_parse_pipe( $differentials );
$module_pairs   = iibpr_parse_pipe_pairs( $modules );
$faq_pairs      = iibpr_parse_pipe_pairs( $faq );
$faculty_items  = $faculty ? array_filter( array_map( 'trim', strpos( $faculty, "\n" ) !== false ? explode( "\n", $faculty ) : explode( '|', $faculty ) ) ) : array();

// Format start date for display
$start_date_display = '';
if ( $start_date ) {
	$ts = strtotime( $start_date );
	if ( $ts ) {
		$start_date_display = date_i18n( 'd/m/Y', $ts );
	} else {
		$start_date_display = $start_date;
	}
}
?>

<main id="main" class="site-main">

	<!-- ═══════════════════════════════════════
	     HERO BANNER
	     ═══════════════════════════════════════ -->
	<?php if ( has_post_thumbnail() ) : ?>
	<section class="relative -mt-[72px] pt-[72px] overflow-hidden"
	         style="background-image: linear-gradient(135deg, rgba(64,72,86,0.90) 0%, rgba(45,59,45,0.85) 100%), url('<?php echo esc_url( get_the_post_thumbnail_url( $pid, 'large' ) ); ?>'); background-size: cover; background-position: center; min-height: 420px;">
		<div class="max-w-5xl mx-auto px-4 md:px-8 py-16 relative z-10">

			<!-- Breadcrumb -->
			<nav class="text-sm text-white/70 mb-6">
				<a href="<?php echo home_url(); ?>" class="hover:text-white no-underline text-white/70">Início</a>
				<span class="mx-2">/</span>
				<a href="<?php echo home_url( '/cursos' ); ?>" class="hover:text-white no-underline text-white/70">Cursos</a>
				<span class="mx-2">/</span>
				<span class="text-white"><?php the_title(); ?></span>
			</nav>

			<div class="flex flex-wrap gap-2 mb-5">
				<?php if ( $level_name ) : ?>
				<span class="bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-sm font-semibold text-white"><?php echo esc_html( $level_name ); ?></span>
				<?php endif; ?>
				<?php if ( $modality_name ) : ?>
				<span class="bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-sm font-semibold text-white"><?php echo esc_html( $modality_name ); ?></span>
				<?php endif; ?>
				<?php if ( $area_name ) : ?>
				<span class="backdrop-blur-sm px-3 py-1 rounded-full text-sm font-semibold" style="background:rgba(108,179,80,0.3);color:#A6D16C;"><?php echo esc_html( $area_name ); ?></span>
				<?php endif; ?>
			</div>

			<h1 class="text-3xl md:text-5xl font-extrabold text-white leading-tight mb-4"><?php the_title(); ?></h1>
			<?php if ( has_excerpt() ) : ?>
			<p class="text-lg text-white/85 max-w-3xl"><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<?php else : ?>

	<!-- No featured image → branded course-cover hero -->
	<div class="-mt-[72px]">
		<?php
		get_template_part( 'template-parts/course-cover', null, array(
			'title'  => get_the_title(),
			'level'  => $level_name,
			'area'   => $area_name,
			'aspect' => 'hero',
		) );
		?>
		<!-- Breadcrumb below cover -->
		<div class="bg-gray-900/90 px-4 md:px-8 py-3">
			<nav class="text-sm text-white/60 max-w-5xl mx-auto">
				<a href="<?php echo home_url(); ?>" class="hover:text-white no-underline text-white/60">Início</a>
				<span class="mx-2">/</span>
				<a href="<?php echo home_url( '/cursos' ); ?>" class="hover:text-white no-underline text-white/60">Cursos</a>
				<span class="mx-2">/</span>
				<span class="text-white/80"><?php the_title(); ?></span>
			</nav>
		</div>
	</div>

	<?php endif; ?>


	<!-- ═══════════════════════════════════════
	     SPECS BAR
	     ═══════════════════════════════════════ -->
	<?php
	$specs = array();
	if ( $hours ) {
		$specs[] = array(
			'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>',
			'label' => 'Carga Horária',
			'value' => $hours,
		);
	}
	if ( $lessons ) {
		$specs[] = array(
			'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.07A1 1 0 0121 8.882V15.118a1 1 0 01-1.447.95L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>',
			'label' => 'Aulas',
			'value' => $lessons,
		);
	}
	if ( $format ) {
		$specs[] = array(
			'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>',
			'label' => 'Formato',
			'value' => $format,
		);
	}
	if ( $start_date_display ) {
		$specs[] = array(
			'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>',
			'label' => 'Início',
			'value' => $start_date_display,
		);
	}
	if ( $specs ) :
	?>
	<div class="bg-white border-b border-gray-100 shadow-sm">
		<div class="max-w-5xl mx-auto px-4 md:px-8">
			<div class="grid grid-cols-2 lg:grid-cols-4 divide-x divide-y lg:divide-y-0 divide-gray-100">
				<?php foreach ( $specs as $spec ) : ?>
				<div class="flex items-center gap-3 py-5 px-4 md:px-6 first:pl-0 last:pr-0">
					<div class="flex-shrink-0 w-10 h-10 rounded-xl flex items-center justify-center" style="background: rgba(108,179,80,0.12);">
						<svg class="w-5 h-5" style="color:#6CB350;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<?php echo $spec['icon']; // pre-escaped SVG paths ?>
						</svg>
					</div>
					<div class="min-w-0">
						<p class="text-xs font-semibold text-gray-400 uppercase tracking-wide leading-none mb-1"><?php echo esc_html( $spec['label'] ); ?></p>
						<p class="text-sm font-bold text-gray-900 truncate"><?php echo esc_html( $spec['value'] ); ?></p>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>


	<!-- ═══════════════════════════════════════
	     MAIN CONTENT + SIDEBAR
	     ═══════════════════════════════════════ -->
	<section class="py-12 px-4 md:px-8 bg-warm-white">
		<div class="max-w-5xl mx-auto">
			<div class="grid lg:grid-cols-3 gap-10">

				<!-- ────── MAIN COLUMN ────── -->
				<div class="lg:col-span-2 space-y-12">

					<!-- Para quem é -->
					<?php if ( $audience_items ) : ?>
					<div>
						<h2 class="text-2xl font-bold text-gray-900 mb-4">Para quem é este curso</h2>
						<div class="flex flex-wrap gap-2">
							<?php foreach ( $audience_items as $item ) : ?>
							<span class="bg-green-50 text-green-700 px-4 py-2 rounded-full text-sm font-medium border border-green-200"><?php echo esc_html( $item ); ?></span>
							<?php endforeach; ?>
						</div>
					</div>
					<?php endif; ?>

					<!-- Content from editor -->
					<?php if ( get_the_content() ) : ?>
					<div class="prose prose-lg max-w-none prose-headings:text-gray-900 prose-a:text-iibpr-green">
						<?php the_content(); ?>
					</div>
					<?php endif; ?>

					<!-- O que você vai aprender -->
					<?php if ( $learning_items ) : ?>
					<div>
						<h2 class="text-2xl font-bold text-gray-900 mb-6">O que você vai aprender</h2>
						<div class="grid sm:grid-cols-2 gap-3">
							<?php foreach ( $learning_items as $item ) : ?>
							<div class="flex items-start gap-3 p-4 rounded-xl bg-white border border-gray-100 shadow-sm">
								<svg class="w-5 h-5 flex-shrink-0 mt-0.5" style="color:#6CB350;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
								</svg>
								<span class="text-gray-700 text-sm"><?php echo esc_html( $item ); ?></span>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
					<?php endif; ?>

					<!-- Diferenciais -->
					<?php if ( $diff_items ) : ?>
					<div>
						<h2 class="text-2xl font-bold text-gray-900 mb-6">Diferenciais</h2>
						<div class="grid sm:grid-cols-2 gap-3">
							<?php foreach ( $diff_items as $item ) : ?>
							<div class="flex items-start gap-3 p-4 rounded-xl bg-green-50 border border-green-100">
								<svg class="w-5 h-5 flex-shrink-0 mt-0.5" style="color:#6CB350;" fill="currentColor" viewBox="0 0 24 24">
									<path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
								</svg>
								<span class="text-gray-700 text-sm"><?php echo esc_html( $item ); ?></span>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
					<?php endif; ?>

					<!-- Programa do Curso -->
					<?php if ( $module_pairs ) : ?>
					<div>
						<h2 class="text-2xl font-bold text-gray-900 mb-6">Programa do Curso</h2>
						<div class="space-y-0 border border-gray-200 rounded-xl overflow-hidden" id="modules-accordion">
							<?php foreach ( $module_pairs as $idx => $pair ) : ?>
							<div class="accordion-item">
								<button class="accordion-trigger" aria-expanded="false" data-accordion="modules-<?php echo $idx; ?>">
									<span class="font-semibold"><?php echo esc_html( $pair[0] ); ?></span>
									<svg class="accordion-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
									</svg>
								</button>
								<?php if ( $pair[1] ) : ?>
								<div class="accordion-content" id="modules-<?php echo $idx; ?>">
									<div class="accordion-content-inner"><?php echo wp_kses_post( $pair[1] ); ?></div>
								</div>
								<?php endif; ?>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
					<?php endif; ?>

					<!-- Corpo Docente (expanded with bio) -->
					<?php if ( $faculty_items ) : ?>
					<div>
						<h2 class="text-2xl font-bold text-gray-900 mb-6">Corpo Docente</h2>
						<div class="space-y-4">
							<?php foreach ( $faculty_items as $member ) :
								$team_query = new WP_Query( array(
									'post_type'      => 'iibpr_equipe',
									'posts_per_page' => 1,
									's'              => $member,
								) );
								$team_photo   = '';
								$team_role    = '';
								$team_bio     = '';
								$team_post_id = 0;
								if ( $team_query->have_posts() ) {
									$team_query->the_post();
									$team_post_id = get_the_ID();
									if ( has_post_thumbnail() ) {
										$team_photo = get_the_post_thumbnail_url( $team_post_id, 'thumbnail' );
									}
									$team_role = get_post_meta( $team_post_id, '_iibpr_team_role', true );
									$team_bio  = get_the_content();
									wp_reset_postdata();
								}
							?>
							<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
								<div class="flex items-center gap-5 p-6">
									<?php if ( $team_photo ) : ?>
									<img src="<?php echo esc_url( $team_photo ); ?>"
									     alt="<?php echo esc_attr( $member ); ?>"
									     class="w-20 h-20 rounded-full object-cover flex-shrink-0 ring-2 ring-iibpr-green/20">
									<?php else : ?>
									<div class="w-20 h-20 rounded-full flex items-center justify-center flex-shrink-0"
									     style="background:rgba(108,179,80,0.12);">
										<svg class="w-9 h-9" style="color:#6CB350;" fill="currentColor" viewBox="0 0 24 24">
											<path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
										</svg>
									</div>
									<?php endif; ?>
									<div>
										<p class="text-lg font-bold text-gray-900"><?php echo esc_html( $member ); ?></p>
										<?php if ( $team_role ) : ?>
										<p class="text-sm font-medium mt-0.5" style="color:#6CB350;"><?php echo esc_html( $team_role ); ?></p>
										<?php endif; ?>
									</div>
								</div>
								<?php if ( $team_bio ) : ?>
								<div class="px-6 pb-6 border-t border-gray-50">
									<div class="prose prose-sm max-w-none text-gray-600 mt-4">
										<?php echo wp_kses_post( wpautop( $team_bio ) ); ?>
									</div>
								</div>
								<?php endif; ?>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
					<?php endif; ?>

					<!-- Garantia -->
					<?php if ( $guarantee ) : ?>
					<div class="rounded-2xl overflow-hidden border-2 p-6 flex gap-5 items-start"
					     style="border-color:rgba(108,179,80,0.35); background: linear-gradient(135deg, rgba(108,179,80,0.06) 0%, rgba(64,72,86,0.04) 100%);">
						<div class="w-14 h-14 rounded-full flex items-center justify-center flex-shrink-0"
						     style="background:rgba(108,179,80,0.15);">
							<svg class="w-7 h-7" style="color:#6CB350;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
							</svg>
						</div>
						<div>
							<h3 class="text-lg font-bold text-gray-900 mb-2">Garantia</h3>
							<p class="text-gray-700 text-sm leading-relaxed"><?php echo wp_kses_post( nl2br( esc_html( $guarantee ) ) ); ?></p>
						</div>
					</div>
					<?php endif; ?>

					<!-- FAQ -->
					<?php if ( $faq_pairs ) : ?>
					<div>
						<h2 class="text-2xl font-bold text-gray-900 mb-6">Perguntas Frequentes</h2>
						<div class="space-y-0 border border-gray-200 rounded-xl overflow-hidden" id="faq-accordion">
							<?php foreach ( $faq_pairs as $idx => $pair ) : ?>
							<div class="accordion-item">
								<button class="accordion-trigger" aria-expanded="false" data-accordion="faq-<?php echo $idx; ?>">
									<span class="font-semibold"><?php echo esc_html( $pair[0] ); ?></span>
									<svg class="accordion-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
									</svg>
								</button>
								<?php if ( $pair[1] ) : ?>
								<div class="accordion-content" id="faq-<?php echo $idx; ?>">
									<div class="accordion-content-inner text-gray-600"><?php echo wp_kses_post( $pair[1] ); ?></div>
								</div>
								<?php endif; ?>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
					<?php endif; ?>

				</div>

				<!-- ────── SIDEBAR ────── -->
				<div class="lg:col-span-1">
					<div class="sticky top-24 space-y-6">

						<!-- CTA card -->
						<div class="bg-white rounded-2xl border border-gray-200 shadow-lg overflow-hidden">
							<div class="h-1.5" style="background: linear-gradient(90deg, #6CB350, #A6D16C);"></div>
							<div class="p-6 space-y-5">

								<?php if ( $price ) : ?>
								<div>
									<p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">Investimento</p>
									<p class="text-3xl font-extrabold text-gray-900"><?php echo esc_html( $price ); ?></p>
								</div>
								<?php endif; ?>

								<?php if ( $cta_url ) : ?>
								<a href="<?php echo esc_url( $cta_url ); ?>" target="_blank" rel="noopener"
								   class="btn-primary w-full text-center text-base py-4 block">
									Inscreva-se Agora
								</a>
								<?php endif; ?>

								<!-- Sidebar specs -->
								<div class="space-y-3 pt-2 border-t border-gray-100">
									<?php if ( $hours ) : ?>
									<div class="flex items-center gap-3 text-sm">
										<svg class="w-4 h-4 flex-shrink-0" style="color:#6CB350;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
										</svg>
										<span class="text-gray-700"><strong>Carga horária:</strong> <?php echo esc_html( $hours ); ?></span>
									</div>
									<?php endif; ?>

									<?php if ( $lessons ) : ?>
									<div class="flex items-center gap-3 text-sm">
										<svg class="w-4 h-4 flex-shrink-0" style="color:#6CB350;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.07A1 1 0 0121 8.882V15.118a1 1 0 01-1.447.95L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
										</svg>
										<span class="text-gray-700"><strong>Aulas:</strong> <?php echo esc_html( $lessons ); ?></span>
									</div>
									<?php endif; ?>

									<?php if ( $format ) : ?>
									<div class="flex items-center gap-3 text-sm">
										<svg class="w-4 h-4 flex-shrink-0" style="color:#6CB350;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
										</svg>
										<span class="text-gray-700"><strong>Formato:</strong> <?php echo esc_html( $format ); ?></span>
									</div>
									<?php endif; ?>

									<?php if ( $start_date_display ) : ?>
									<div class="flex items-center gap-3 text-sm">
										<svg class="w-4 h-4 flex-shrink-0" style="color:#6CB350;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
										</svg>
										<span class="text-gray-700"><strong>Início:</strong> <?php echo esc_html( $start_date_display ); ?></span>
									</div>
									<?php endif; ?>

									<?php if ( $modality_name ) : ?>
									<div class="flex items-center gap-3 text-sm">
										<svg class="w-4 h-4 flex-shrink-0" style="color:#6CB350;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
										</svg>
										<span class="text-gray-700"><strong>Modalidade:</strong> <?php echo esc_html( $modality_name ); ?></span>
									</div>
									<?php endif; ?>

									<?php if ( $level_name ) : ?>
									<div class="flex items-center gap-3 text-sm">
										<svg class="w-4 h-4 flex-shrink-0" style="color:#6CB350;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
										</svg>
										<span class="text-gray-700"><strong>Nível:</strong> <?php echo esc_html( $level_name ); ?></span>
									</div>
									<?php endif; ?>

									<?php if ( $area_name ) : ?>
									<div class="flex items-center gap-3 text-sm">
										<svg class="w-4 h-4 flex-shrink-0" style="color:#6CB350;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
										</svg>
										<span class="text-gray-700"><strong>Área:</strong> <?php echo esc_html( $area_name ); ?></span>
									</div>
									<?php endif; ?>
								</div>
							</div>
						</div>

						<!-- WhatsApp -->
						<a href="https://wa.me/5561991572149" target="_blank" rel="noopener"
						   class="flex items-center gap-3 bg-green-50 hover:bg-green-100 border border-green-200 rounded-xl p-4 no-underline transition-colors">
							<svg class="w-8 h-8 text-green-600 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
								<path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
							</svg>
							<div>
								<p class="font-bold text-green-800 text-sm">Dúvidas?</p>
								<p class="text-green-700 text-xs">Fale conosco pelo WhatsApp</p>
							</div>
						</a>

					</div>
				</div>

			</div>
		</div>
	</section>


	<!-- ═══════════════════════════════════════
	     CURSOS RELACIONADOS
	     ═══════════════════════════════════════ -->
	<?php
	$related = new WP_Query( array(
		'post_type'      => 'iibpr_curso',
		'posts_per_page' => 3,
		'post__not_in'   => array( $pid ),
		'orderby'        => 'rand',
	) );
	if ( $related->have_posts() ) : ?>
	<section class="py-16 px-4 md:px-8 bg-gray-50">
		<div class="max-w-5xl mx-auto">
			<h2 class="text-2xl font-bold text-gray-900 mb-8 text-center">Outros Cursos</h2>
			<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
				<?php while ( $related->have_posts() ) : $related->the_post();
					get_template_part( 'template-parts/cards/course-card' );
				endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
	</section>
	<?php endif; ?>

</main>

<?php get_footer(); ?>

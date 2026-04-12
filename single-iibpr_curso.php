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
$modalities    = get_the_terms( $pid, 'modalidade' );
$levels        = get_the_terms( $pid, 'nivel' );
$areas         = get_the_terms( $pid, 'area' );
$modality_name = ( $modalities && ! is_wp_error( $modalities ) ) ? $modalities[0]->name : '';
$level_name    = ( $levels && ! is_wp_error( $levels ) ) ? $levels[0]->name : '';
$area_name     = ( $areas && ! is_wp_error( $areas ) ) ? $areas[0]->name : '';
$img           = get_template_directory_uri() . '/images/';

// Parse pipe-delimited fields
function iibpr_parse_pipe( $str ) {
	if ( ! $str ) return array();
	// If contains newlines, split by newline first
	if ( strpos( $str, "\n" ) !== false ) {
		return array_filter( array_map( 'trim', explode( "\n", $str ) ) );
	}
	return array_filter( array_map( 'trim', explode( '|', $str ) ) );
}

function iibpr_parse_pipe_pairs( $str ) {
	if ( ! $str ) return array();
	$pairs = array();
	// If contains newlines, each line is Title|Description
	if ( strpos( $str, "\n" ) !== false ) {
		$lines = array_filter( array_map( 'trim', explode( "\n", $str ) ) );
		foreach ( $lines as $line ) {
			$parts = explode( '|', $line, 2 );
			$pairs[] = array( trim( $parts[0] ), isset( $parts[1] ) ? trim( $parts[1] ) : '' );
		}
	} else {
		// Flat pipe: alternating key|value|key|value
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
?>

<main id="main" class="site-main">

	<!-- Hero with featured image -->
	<?php
	$hero_bg = $img . 'acao-formacao-4.jpg';
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
				<a href="<?php echo home_url( '/cursos' ); ?>" class="hover:text-white no-underline text-white/70">Cursos</a>
				<span class="mx-2">/</span>
				<span class="text-white"><?php the_title(); ?></span>
			</nav>

			<div class="flex flex-wrap gap-2 mb-4">
				<?php if ( $level_name ) : ?>
				<span class="bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-sm font-semibold"><?php echo esc_html( $level_name ); ?></span>
				<?php endif; ?>
				<?php if ( $modality_name ) : ?>
				<span class="bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-sm font-semibold"><?php echo esc_html( $modality_name ); ?></span>
				<?php endif; ?>
				<?php if ( $hours ) : ?>
				<span class="bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-sm font-semibold"><?php echo esc_html( $hours ); ?></span>
				<?php endif; ?>
				<?php if ( $area_name ) : ?>
				<span class="bg-white/20 backdrop-blur-sm px-3 py-1 rounded-full text-sm font-semibold"><?php echo esc_html( $area_name ); ?></span>
				<?php endif; ?>
			</div>

			<h1 class="text-3xl md:text-5xl font-extrabold mb-4 leading-tight"><?php the_title(); ?></h1>
			<?php if ( has_excerpt() ) : ?>
			<p class="text-xl text-white/90 max-w-3xl"><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<!-- Main content with sidebar -->
	<section class="py-12 px-4 md:px-8 bg-warm-white">
		<div class="max-w-5xl mx-auto">
			<div class="grid lg:grid-cols-3 gap-10">

				<!-- Main column -->
				<div class="lg:col-span-2 space-y-12">

					<!-- Audience tags -->
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

					<!-- Content (from editor) -->
					<?php if ( get_the_content() ) : ?>
					<div class="prose prose-lg max-w-none prose-headings:text-gray-900 prose-a:text-iibpr-green">
						<?php the_content(); ?>
					</div>
					<?php endif; ?>

					<!-- Featured image below content if present -->
					<?php if ( has_post_thumbnail() ) : ?>
					<div class="rounded-2xl overflow-hidden shadow-lg">
						<?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-auto' ) ); ?>
					</div>
					<?php endif; ?>

					<!-- Learnings -->
					<?php if ( $learning_items ) : ?>
					<div>
						<h2 class="text-2xl font-bold text-gray-900 mb-6">O que você vai aprender</h2>
						<div class="grid sm:grid-cols-2 gap-3">
							<?php foreach ( $learning_items as $item ) : ?>
							<div class="flex items-start gap-3 p-4 rounded-xl bg-white border border-gray-100 shadow-sm">
								<svg class="w-5 h-5 text-iibpr-green flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
								<span class="text-gray-700 text-sm"><?php echo esc_html( $item ); ?></span>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
					<?php endif; ?>

					<!-- Differentials -->
					<?php if ( $diff_items ) : ?>
					<div>
						<h2 class="text-2xl font-bold text-gray-900 mb-6">Diferenciais</h2>
						<div class="grid sm:grid-cols-2 gap-3">
							<?php foreach ( $diff_items as $item ) : ?>
							<div class="flex items-start gap-3 p-4 rounded-xl bg-green-50 border border-green-100">
								<svg class="w-5 h-5 text-iibpr-green flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
								<span class="text-gray-700 text-sm"><?php echo esc_html( $item ); ?></span>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
					<?php endif; ?>

					<!-- Modules Accordion -->
					<?php if ( $module_pairs ) : ?>
					<div>
						<h2 class="text-2xl font-bold text-gray-900 mb-6">Programa do Curso</h2>
						<div class="space-y-0 border border-gray-200 rounded-xl overflow-hidden" id="modules-accordion">
							<?php foreach ( $module_pairs as $idx => $pair ) : ?>
							<div class="accordion-item">
								<button class="accordion-trigger" aria-expanded="false" data-accordion="modules-<?php echo $idx; ?>">
									<span class="font-semibold"><?php echo esc_html( $pair[0] ); ?></span>
									<svg class="accordion-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
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

					<!-- Faculty -->
					<?php if ( $faculty_items ) : ?>
					<div>
						<h2 class="text-2xl font-bold text-gray-900 mb-6">Corpo Docente</h2>
						<div class="grid sm:grid-cols-2 gap-4">
							<?php foreach ( $faculty_items as $member ) :
								// Check if team member CPT exists with this name
								$team_query = new WP_Query( array(
									'post_type'      => 'iibpr_equipe',
									'posts_per_page' => 1,
									's'              => $member,
								) );
								$team_photo = '';
								$team_role  = '';
								if ( $team_query->have_posts() ) {
									$team_query->the_post();
									if ( has_post_thumbnail() ) {
										$team_photo = get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' );
									}
									$team_role = get_post_meta( get_the_ID(), '_iibpr_team_role', true );
									wp_reset_postdata();
								}
							?>
							<div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm flex items-center gap-4">
								<?php if ( $team_photo ) : ?>
								<img src="<?php echo esc_url( $team_photo ); ?>" alt="<?php echo esc_attr( $member ); ?>" class="w-14 h-14 rounded-full object-cover flex-shrink-0">
								<?php else : ?>
								<div class="w-14 h-14 bg-iibpr-green/10 rounded-full flex items-center justify-center flex-shrink-0">
									<svg class="w-7 h-7 text-iibpr-green" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
								</div>
								<?php endif; ?>
								<div>
									<p class="font-bold text-gray-900"><?php echo esc_html( $member ); ?></p>
									<?php if ( $team_role ) : ?>
									<p class="text-sm text-gray-500"><?php echo esc_html( $team_role ); ?></p>
									<?php endif; ?>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
					<?php endif; ?>

					<!-- FAQ Accordion -->
					<?php if ( $faq_pairs ) : ?>
					<div>
						<h2 class="text-2xl font-bold text-gray-900 mb-6">Perguntas Frequentes</h2>
						<div class="space-y-0 border border-gray-200 rounded-xl overflow-hidden" id="faq-accordion">
							<?php foreach ( $faq_pairs as $idx => $pair ) : ?>
							<div class="accordion-item">
								<button class="accordion-trigger" aria-expanded="false" data-accordion="faq-<?php echo $idx; ?>">
									<span class="font-semibold"><?php echo esc_html( $pair[0] ); ?></span>
									<svg class="accordion-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
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

				<!-- Sidebar -->
				<div class="lg:col-span-1">
					<div class="sticky top-24 space-y-6">

						<!-- Main CTA card -->
						<div class="bg-white rounded-2xl border border-gray-200 shadow-lg overflow-hidden">
							<div class="h-2 bg-gradient-to-r from-iibpr-green to-iibpr-green-light"></div>
							<div class="p-6 space-y-5">
								<?php if ( $price ) : ?>
								<div>
									<p class="text-sm text-gray-500 mb-1">Investimento</p>
									<p class="text-3xl font-extrabold text-gray-900"><?php echo esc_html( $price ); ?></p>
								</div>
								<?php endif; ?>

								<?php if ( $cta_url ) : ?>
								<a href="<?php echo esc_url( $cta_url ); ?>" target="_blank" rel="noopener"
								   class="btn-primary w-full text-center text-lg py-4 block">
									Inscreva-se Agora
								</a>
								<?php endif; ?>

								<div class="space-y-3 pt-2">
									<?php if ( $hours ) : ?>
									<div class="flex items-center gap-3 text-sm">
										<svg class="w-5 h-5 text-iibpr-green flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
										<span class="text-gray-700"><strong>Carga horária:</strong> <?php echo esc_html( $hours ); ?></span>
									</div>
									<?php endif; ?>

									<?php if ( $modality_name ) : ?>
									<div class="flex items-center gap-3 text-sm">
										<svg class="w-5 h-5 text-iibpr-green flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
										<span class="text-gray-700"><strong>Modalidade:</strong> <?php echo esc_html( $modality_name ); ?></span>
									</div>
									<?php endif; ?>

									<?php if ( $level_name ) : ?>
									<div class="flex items-center gap-3 text-sm">
										<svg class="w-5 h-5 text-iibpr-green flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
										<span class="text-gray-700"><strong>Nível:</strong> <?php echo esc_html( $level_name ); ?></span>
									</div>
									<?php endif; ?>

									<?php if ( $area_name ) : ?>
									<div class="flex items-center gap-3 text-sm">
										<svg class="w-5 h-5 text-iibpr-green flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
										<span class="text-gray-700"><strong>Área:</strong> <?php echo esc_html( $area_name ); ?></span>
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
								<p class="font-bold text-green-800 text-sm">Dúvidas?</p>
								<p class="text-green-700 text-xs">Fale conosco pelo WhatsApp</p>
							</div>
						</a>

					</div>
				</div>

			</div>
		</div>
	</section>

	<!-- Related Courses -->
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

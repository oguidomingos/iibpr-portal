<?php
/**
 * Template Name: Catálogo de Cursos
 * Template Post Type: page
 *
 * Course catalog with search and filter.
 */
get_header(); ?>

<main id="main" class="site-main">

	<!-- Hero with real photo -->
	<?php $img = get_template_directory_uri() . '/images/'; ?>
	<section class="py-20 px-4 md:px-8 text-white text-center -mt-[72px] pt-[92px] relative overflow-hidden"
	         style="background-image: linear-gradient(135deg, rgba(64,72,86,0.88) 0%, rgba(58,90,42,0.82) 100%), url('<?php echo esc_url( $img . 'acao-formacao-4.jpg' ); ?>'); background-size: cover; background-position: center;">
		<div class="max-w-4xl mx-auto relative z-10">
			<h1 class="text-4xl md:text-5xl font-extrabold mb-4">Nossos Cursos</h1>
			<p class="text-xl opacity-90">Formações reconhecidas em psicomotricidade relacional para profissionais de todas as áreas.</p>
		</div>
	</section>

	<!-- Search + Filters -->
	<section class="section-padding bg-warm-white">
		<div class="container-narrow">

			<div class="flex flex-col md:flex-row gap-4 mb-10">
				<!-- Search -->
				<div class="flex-1 relative">
					<svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
					<input type="text" id="course-search" placeholder="Buscar curso..."
					       class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-iibpr-green focus:ring-1 focus:ring-iibpr-green text-sm">
				</div>
				<!-- Modality filters -->
				<div class="flex flex-wrap gap-2" id="modality-filters">
					<button class="filter-btn filter-btn-active" data-filter="all">Todos</button>
					<button class="filter-btn" data-filter="Online">Online</button>
					<button class="filter-btn" data-filter="Presencial">Presencial</button>
					<button class="filter-btn" data-filter="Híbrido">Híbrido</button>
				</div>
			</div>

			<!-- Course grid -->
			<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8" id="courses-grid">
				<?php
				$courses = new WP_Query( array(
				    'post_type'      => 'iibpr_curso',
				    'posts_per_page' => -1,
				    'orderby'        => 'menu_order date',
				    'order'          => 'ASC',
				) );

				if ( $courses->have_posts() ) :
				    while ( $courses->have_posts() ) : $courses->the_post();
				        get_template_part( 'template-parts/cards/course-card' );
				    endwhile;
				    wp_reset_postdata();
				else :
				    for ( $i = 1; $i <= 3; $i++ ) :
				        $title = iibpr_get( "iibpr_course_{$i}_title" );
				        if ( ! $title ) continue;
				?>
				<article class="course-card h-full flex flex-col" data-modality="" data-level="">
					<div class="h-48 bg-primary-gradient flex items-center justify-center">
						<svg class="w-16 h-16 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
					</div>
					<div class="p-6 flex flex-col flex-1">
						<h3 class="text-lg font-bold text-gray-900 mb-2"><?php echo esc_html( $title ); ?></h3>
						<p class="text-gray-600 text-sm leading-relaxed flex-1"><?php echo wp_kses_post( iibpr_get( "iibpr_course_{$i}_desc" ) ); ?></p>
						<div class="mt-4">
							<a href="<?php echo esc_url( iibpr_get( "iibpr_course_{$i}_url", '#' ) ); ?>" class="btn-primary text-sm py-2 px-5"><?php echo esc_html( iibpr_get( "iibpr_course_{$i}_cta", 'Saiba Mais' ) ); ?></a>
						</div>
					</div>
				</article>
				<?php
				    endfor;
				endif;
				?>
			</div>

			<!-- No results message -->
			<div id="no-results" class="hidden text-center py-12">
				<p class="text-gray-500 text-lg">Nenhum curso encontrado com os filtros selecionados.</p>
			</div>

		</div>
	</section>

</main>

<?php get_footer(); ?>

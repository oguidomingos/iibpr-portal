<?php
/**
 * Template Name: Pesquisa
 * Template Post Type: page
 */
get_header(); ?>

<main id="main" class="site-main">

	<!-- Hero -->
	<section class="bg-iibpr-charcoal py-20 px-4 md:px-8 text-white text-center -mt-[72px] pt-[92px]">
		<div class="max-w-4xl mx-auto">
			<h1 class="text-4xl md:text-5xl font-extrabold mb-4">Pesquisa Científica</h1>
			<p class="text-xl opacity-90">Contribuições para o avanço da psicomotricidade relacional no Brasil e no mundo.</p>
		</div>
	</section>

	<!-- Stats -->
	<section class="section-padding bg-warm-white">
		<div class="container-narrow">
			<div class="grid md:grid-cols-3 gap-8 text-center mb-16">
				<div class="pillar-card fade-up">
					<div class="stat-number counter-animate" data-target="120" data-suffix="+">0+</div>
					<div class="stat-label mt-2">Artigos Publicados</div>
				</div>
				<div class="pillar-card fade-up fade-up-delay-1">
					<div class="stat-number counter-animate" data-target="35" data-suffix="+">0+</div>
					<div class="stat-label mt-2">Livros e Capítulos</div>
				</div>
				<div class="pillar-card fade-up fade-up-delay-2">
					<div class="stat-number counter-animate" data-target="50" data-suffix="+">0+</div>
					<div class="stat-label mt-2">Congressos e Eventos</div>
				</div>
			</div>

			<!-- Content from page -->
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php if ( get_the_content() ) : ?>
				<div class="prose prose-lg max-w-none">
					<?php the_content(); ?>
				</div>
				<?php endif; ?>
			<?php endwhile; endif; ?>

			<!-- Recent articles from blog -->
			<?php
			$research_posts = new WP_Query( array(
			    'post_type'      => 'post',
			    'posts_per_page' => 6,
			    'category_name'  => 'pesquisa',
			) );
			if ( $research_posts->have_posts() ) : ?>
			<div class="mt-16">
				<h2 class="section-title text-center mb-10">Publicações Recentes</h2>
				<div class="grid md:grid-cols-3 gap-8">
					<?php while ( $research_posts->have_posts() ) : $research_posts->the_post(); ?>
					<article class="card-hover p-6">
						<h3 class="text-lg font-bold text-gray-900 mb-2">
							<a href="<?php the_permalink(); ?>" class="no-underline text-gray-900 hover:text-iibpr-green transition-colors"><?php the_title(); ?></a>
						</h3>
						<p class="text-sm text-gray-500 mb-3"><?php echo get_the_date(); ?></p>
						<p class="text-gray-600 text-sm leading-relaxed"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?></p>
					</article>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</section>

	<!-- CTA -->
	<?php get_template_part( 'template-parts/sections/cta' ); ?>

</main>

<?php get_footer(); ?>

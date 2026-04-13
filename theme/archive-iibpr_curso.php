<?php
/**
 * Archive: Courses
 * Redirects to the Cursos page template for a unified experience.
 */
get_header(); ?>

<main id="main" class="site-main">

	<section class="bg-primary-gradient py-20 px-4 md:px-8 text-white text-center -mt-[72px] pt-[92px]">
		<div class="max-w-4xl mx-auto">
			<h1 class="text-4xl md:text-5xl font-extrabold mb-4">Nossos Cursos</h1>
			<p class="text-xl opacity-90">Todas as formações disponíveis em psicomotricidade relacional.</p>
		</div>
	</section>

	<section class="section-padding bg-warm-white">
		<div class="container-narrow">
			<?php if ( have_posts() ) : ?>
			<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/cards/course-card' ); ?>
				<?php endwhile; ?>
			</div>
			<?php the_posts_pagination( array( 'prev_text' => '&larr;', 'next_text' => '&rarr;' ) ); ?>
			<?php else : ?>
			<p class="text-center text-gray-500 text-lg">Nenhum curso disponível no momento.</p>
			<?php endif; ?>
		</div>
	</section>

</main>

<?php get_footer(); ?>

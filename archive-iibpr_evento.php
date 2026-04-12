<?php
/**
 * Archive: Events
 */
get_header(); ?>

<main id="main" class="site-main">

	<section class="cta-section py-20 px-4 md:px-8 text-white text-center -mt-[72px] pt-[92px]">
		<div class="max-w-4xl mx-auto">
			<h1 class="text-4xl md:text-5xl font-extrabold mb-4">Eventos</h1>
			<p class="text-xl opacity-90">Todos os eventos do IIBPR.</p>
		</div>
	</section>

	<section class="section-padding bg-warm-white">
		<div class="container-narrow">
			<?php if ( have_posts() ) : ?>
			<div class="grid md:grid-cols-3 gap-8">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/cards/event-card' ); ?>
				<?php endwhile; ?>
			</div>
			<?php the_posts_pagination( array( 'prev_text' => '&larr;', 'next_text' => '&rarr;' ) ); ?>
			<?php else : ?>
			<p class="text-center text-gray-500 text-lg">Nenhum evento disponível no momento.</p>
			<?php endif; ?>
		</div>
	</section>

</main>

<?php get_footer(); ?>

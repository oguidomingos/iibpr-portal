<?php
/**
 * Template Name: Blog / Notícias
 * Template Post Type: page
 */
get_header();

$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$posts_query = new WP_Query( array(
    'post_type'      => 'post',
    'posts_per_page' => 9,
    'paged'          => $paged,
) );
?>

<main id="main" class="site-main">

	<!-- Hero -->
	<section class="bg-iibpr-charcoal py-20 px-4 md:px-8 text-white text-center -mt-[72px] pt-[92px]">
		<div class="max-w-4xl mx-auto">
			<h1 class="text-4xl md:text-5xl font-extrabold mb-4">Blog</h1>
			<p class="text-xl opacity-90">Artigos, novidades e reflexões sobre psicomotricidade relacional.</p>
		</div>
	</section>

	<section class="section-padding bg-warm-white">
		<div class="container-narrow">

			<?php if ( $posts_query->have_posts() ) : ?>
			<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
				<?php while ( $posts_query->have_posts() ) : $posts_query->the_post(); ?>
				<article class="card-hover overflow-hidden fade-up">
					<?php if ( has_post_thumbnail() ) : ?>
					<div class="h-48 overflow-hidden">
						<?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-full object-cover hover:scale-105 transition-transform duration-300', 'loading' => 'lazy' ) ); ?>
					</div>
					<?php endif; ?>
					<div class="p-6">
						<?php $cats = get_the_category(); if ( $cats ) : ?>
						<span class="course-card-badge bg-green-100 text-green-700 mb-3"><?php echo esc_html( $cats[0]->name ); ?></span>
						<?php endif; ?>
						<p class="text-sm text-gray-400 mb-2"><?php echo get_the_date(); ?></p>
						<h3 class="text-lg font-bold text-gray-900 mb-2">
							<a href="<?php the_permalink(); ?>" class="no-underline text-gray-900 hover:text-iibpr-green transition-colors"><?php the_title(); ?></a>
						</h3>
						<p class="text-gray-600 text-sm leading-relaxed"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?></p>
						<a href="<?php the_permalink(); ?>" class="text-iibpr-green font-semibold text-sm mt-3 inline-block no-underline hover:text-iibpr-green-dark transition-colors">
							Ler mais &rarr;
						</a>
					</div>
				</article>
				<?php endwhile; ?>
			</div>

			<!-- Pagination -->
			<?php if ( $posts_query->max_num_pages > 1 ) : ?>
			<div class="mt-12 flex justify-center gap-2">
				<?php
				echo paginate_links( array(
				    'total'     => $posts_query->max_num_pages,
				    'current'   => $paged,
				    'prev_text' => '&larr; Anterior',
				    'next_text' => 'Próximo &rarr;',
				    'type'      => 'list',
				) );
				?>
			</div>
			<?php endif; ?>

			<?php wp_reset_postdata(); ?>

			<?php else : ?>
			<div class="text-center py-16">
				<p class="text-gray-500 text-lg">Nenhum artigo publicado ainda. Volte em breve!</p>
			</div>
			<?php endif; ?>

		</div>
	</section>

</main>

<?php get_footer(); ?>

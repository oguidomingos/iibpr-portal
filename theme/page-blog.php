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
	<?php
	$img     = get_template_directory_uri() . '/images/';
	$hero_bg = iibpr_get( 'iibpr_blog_hero_bg' );
	?>
	<section id="blog-hero" class="py-20 px-4 md:px-8 text-white text-center -mt-[72px] pt-[92px] relative overflow-hidden"
	         style="background-image: linear-gradient(135deg, rgba(64,72,86,0.88) 0%, rgba(58,90,42,0.82) 100%), url('<?php echo $hero_bg ? esc_url( $hero_bg ) : esc_url( $img . 'acao-grupo-2.jpg' ); ?>'); background-size: cover; background-position: center;">
		<div class="max-w-4xl mx-auto relative z-10">
			<h1 class="text-4xl md:text-5xl font-extrabold mb-4 page-hero-title"><?php echo esc_html( iibpr_get( 'iibpr_blog_hero_title', 'Blog' ) ); ?></h1>
			<p class="text-xl opacity-90 page-hero-subtitle"><?php echo esc_html( iibpr_get( 'iibpr_blog_hero_subtitle', 'Artigos, novidades e reflexões sobre psicomotricidade relacional.' ) ); ?></p>
		</div>
	</section>

	<section class="section-padding bg-warm-white">
		<div class="container-narrow">

			<?php if ( $posts_query->have_posts() ) : ?>
			<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
				<?php while ( $posts_query->have_posts() ) : $posts_query->the_post(); ?>
				<article class="card-hover overflow-hidden fade-up">
					<div class="h-48 overflow-hidden">
						<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-full object-cover hover:scale-105 transition-transform duration-300', 'loading' => 'lazy' ) ); ?>
						<?php else : ?>
						<div class="w-full h-full bg-gradient-to-br from-iibpr-green to-iibpr-green-dark flex items-center justify-center">
							<svg class="w-12 h-12 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
							</svg>
						</div>
						<?php endif; ?>
					</div>
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
			<nav class="pagination-nav">
				<?php
				echo paginate_links( array(
					'total'     => $posts_query->max_num_pages,
					'current'   => $paged,
					'prev_text' => '&larr; Anterior',
					'next_text' => 'Próximo &rarr;',
				) );
				?>
			</nav>
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

<?php
/**
 * The main template file (fallback para posts/blog).
 */
get_header(); ?>

<div class="max-w-4xl mx-auto px-4 md:px-8 py-16">
	<main id="main" class="site-main" role="main">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-12 bg-white rounded-xl shadow-sm p-8' ); ?>>
					<header class="mb-4">
						<h2 class="text-2xl font-bold">
							<a href="<?php the_permalink(); ?>" class="text-gray-900 hover:text-green-700 no-underline transition-colors">
								<?php the_title(); ?>
							</a>
						</h2>
						<p class="text-sm text-gray-500 mt-1"><?php the_date(); ?></p>
					</header>
					<div class="text-gray-700 leading-relaxed">
						<?php the_excerpt(); ?>
					</div>
					<a href="<?php the_permalink(); ?>" class="btn-secondary mt-4 inline-block text-sm">
						Leia Mais
					</a>
				</article>
				<?php
			endwhile;
			the_posts_navigation();
		else :
			?>
			<p class="text-gray-500">Nenhum conteúdo encontrado.</p>
		<?php endif; ?>
	</main>
</div>

<?php get_footer(); ?>

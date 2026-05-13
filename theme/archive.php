<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package iibpr_main
 */

get_header();
?>

	<main id="main" class="site-main">

		<!-- Archive Hero -->
		<section class="bg-[#404856] py-20 px-4 md:px-8 text-white text-center -mt-[72px] pt-[92px]">
			<div class="max-w-4xl mx-auto">
				<?php the_archive_title( '<h1 class="text-4xl md:text-5xl font-extrabold mb-4">', '</h1>' ); ?>
				<?php the_archive_description( '<p class="text-xl opacity-90">', '</p>' ); ?>
			</div>
		</section>

		<section class="section-padding bg-warm-white">
			<div class="container-narrow">

			<?php if ( have_posts() ) : ?>

				<!-- Posts Grid -->
				<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
					<?php
					// Start the Loop.
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content/content', 'excerpt' );

						// End the loop.
					endwhile;
					?>
				</div>

				<!-- Pagination -->
				<?php
				$pagination = paginate_links( array(
					'prev_text' => '&larr; Anterior',
					'next_text' => 'Próximo &rarr;',
					'type'      => 'plain',
					'echo'      => false
				) );

				if ( $pagination ) :
				?>
				<nav class="flex justify-center gap-2 flex-wrap mt-12">
					<?php
					// Convert pagination to styled links
					$pagination = str_replace(
						['<a class="page-numbers" href=', '<span aria-current="page" class="page-numbers"><span class="screen-reader-text">Página </span>', '</span>', '<span class="page-numbers">'],
						['<a class="page-link px-3 py-2 rounded-lg border border-gray-300 text-[#404856] hover:bg-[#6CB350] hover:text-white hover:border-[#6CB350] transition-colors text-sm font-medium" href=', '<span class="page-link px-3 py-2 rounded-lg bg-[#6CB350] text-white text-sm font-medium">', '</span>', '<span class="page-link px-3 py-2 rounded-lg border border-gray-300 text-gray-400 text-sm font-medium cursor-default">'],
						$pagination
					);
					echo wp_kses_post( $pagination );
					?>
				</nav>
				<?php endif; ?>

			<?php else :

				// If no content, include the "No posts found" template.
				get_template_part( 'template-parts/content/content', 'none' );

			endif;
			?>

			</div><!-- .container-narrow -->
		</section>

	</main><!-- #main -->

<?php
get_footer();

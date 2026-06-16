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
		<section class="bg-iibpr-charcoal py-20 px-4 md:px-8 text-white text-center -mt-[72px] pt-[92px]">
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
				<nav class="pagination-nav">
					<?php
					echo paginate_links( array(
						'prev_text' => '&larr; Anterior',
						'next_text' => 'Próximo &rarr;',
					) );
					?>
				</nav>

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

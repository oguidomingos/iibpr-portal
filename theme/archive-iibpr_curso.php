<?php
/**
 * Archive: Courses
 * Redirects to the Cursos page template for a unified experience.
 */
get_header(); ?>

<main id="main" class="site-main">

	<?php
	$img     = get_template_directory_uri() . '/images/';
	$hero_bg = iibpr_get( 'iibpr_archive_curso_hero_bg' );
	?>
	<section class="py-20 px-4 md:px-8 text-white text-center -mt-[72px] pt-[92px] relative overflow-hidden"
	         style="background-image: linear-gradient(135deg, rgba(64,72,86,0.88) 0%, rgba(58,90,42,0.82) 100%), url('<?php echo $hero_bg ? esc_url( $hero_bg ) : esc_url( $img . 'cursos-hero-bg.jpg' ); ?>'); background-size: cover; background-position: center;">
		<div class="max-w-4xl mx-auto relative z-10">
			<h1 class="text-4xl md:text-5xl font-extrabold mb-4"><?php echo esc_html( iibpr_get( 'iibpr_archive_curso_hero_title', 'Nossos Cursos' ) ); ?></h1>
			<p class="text-xl opacity-90"><?php echo esc_html( iibpr_get( 'iibpr_archive_curso_hero_subtitle', 'Todas as formações disponíveis em psicomotricidade relacional.' ) ); ?></p>
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

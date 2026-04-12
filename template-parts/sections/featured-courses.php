<?php
/**
 * Template Part: Featured Courses — with real course photos
 */
$img_base = get_template_directory_uri() . '/images/';

$courses = new WP_Query( array(
    'post_type'      => 'iibpr_curso',
    'posts_per_page' => 4,
    'meta_key'       => '_iibpr_course_featured',
    'meta_value'     => '1',
    'orderby'        => 'menu_order date',
    'order'          => 'ASC',
) );

$has_cpt_courses = $courses->have_posts();

// Default course images for customizer fallback
$course_images = array(
	1 => $img_base . 'banner3.png',
	2 => $img_base . 'formacaoprp8.jpg',
	3 => $img_base . 'grafomotricidade.png',
);
?>
<section id="cursos" class="section-padding bg-gray-50">
	<div class="container-narrow">

		<div class="text-center mb-14 fade-up">
			<p class="section-label">Formação</p>
			<h2 class="section-title">Cursos em Destaque</h2>
			<p class="section-subtitle">Formações reconhecidas para profissionais que querem fazer a diferença.</p>
		</div>

		<?php if ( $has_cpt_courses ) : ?>
		<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
			<?php while ( $courses->have_posts() ) : $courses->the_post(); ?>
				<?php get_template_part( 'template-parts/cards/course-card' ); ?>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
		<?php else : ?>
		<!-- Fallback: Customizer courses with real photos -->
		<div class="grid md:grid-cols-3 gap-8">
			<?php for ( $i = 1; $i <= 3; $i++ ) :
				$title = iibpr_get( "iibpr_course_{$i}_title" );
				$badge = iibpr_get( "iibpr_course_{$i}_badge" );
				$hours = iibpr_get( "iibpr_course_{$i}_hours" );
				$desc  = iibpr_get( "iibpr_course_{$i}_desc" );
				$price = iibpr_get( "iibpr_course_{$i}_price" );
				$cta   = iibpr_get( "iibpr_course_{$i}_cta" );
				$url   = iibpr_get( "iibpr_course_{$i}_url" );
				$image = iibpr_get( "iibpr_course_{$i}_image" );
				if ( ! $title ) continue;
				// Use customizer image, or default course image
				$course_img = $image ? $image : ( isset( $course_images[ $i ] ) ? $course_images[ $i ] : '' );
			?>
			<article class="course-card h-full flex flex-col fade-up fade-up-delay-<?php echo $i; ?>">
				<div class="h-52 overflow-hidden">
					<?php if ( $course_img ) : ?>
					<img src="<?php echo esc_url( $course_img ); ?>" alt="<?php echo esc_attr( $title ); ?>"
					     class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" loading="lazy">
					<?php else : ?>
					<div class="h-full bg-gradient-to-br from-iibpr-green to-iibpr-green-dark flex items-center justify-center">
						<svg class="w-16 h-16 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
					</div>
					<?php endif; ?>
				</div>
				<div class="p-6 flex flex-col flex-1">
					<div class="flex items-center justify-between mb-3">
						<?php if ( $badge ) : ?>
						<span class="course-card-badge bg-green-100 text-green-700"><?php echo esc_html( $badge ); ?></span>
						<?php endif; ?>
						<?php if ( $hours ) : ?>
						<span class="text-sm font-semibold text-iibpr-green"><?php echo esc_html( $hours ); ?></span>
						<?php endif; ?>
					</div>
					<h3 class="text-xl font-bold text-gray-900 mb-3"><?php echo esc_html( $title ); ?></h3>
					<p class="text-gray-600 text-sm leading-relaxed flex-1"><?php echo wp_kses_post( $desc ); ?></p>
					<div class="mt-6 flex items-center justify-between">
						<?php if ( $price ) : ?>
						<span class="text-xl font-extrabold text-gray-900"><?php echo esc_html( $price ); ?></span>
						<?php else : ?>
						<span></span>
						<?php endif; ?>
						<?php if ( $cta && $url ) : ?>
						<a href="<?php echo esc_url( $url ); ?>" class="btn-primary text-sm py-2 px-5"><?php echo esc_html( $cta ); ?></a>
						<?php endif; ?>
					</div>
				</div>
			</article>
			<?php endfor; ?>
		</div>
		<?php endif; ?>

		<div class="text-center mt-12 fade-up">
			<a href="<?php echo esc_url( site_url( '/cursos' ) ); ?>" class="btn-secondary">
				Ver Todos os Cursos
			</a>
		</div>

	</div>
</section>

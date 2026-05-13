<?php
/**
 * Template part for displaying a post in archive view
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package iibpr_main
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 flex flex-col h-full'); ?>>

	<!-- Featured Image -->
	<?php if ( has_post_thumbnail() ) : ?>
	<div class="h-48 overflow-hidden">
		<?php
		the_post_thumbnail( 'medium_large', array(
			'class' => 'w-full h-full object-cover hover:scale-105 transition-transform duration-300',
			'loading' => 'lazy'
		) );
		?>
	</div>
	<?php endif; ?>

	<!-- Content -->
	<div class="p-6 flex flex-col flex-1">
		<!-- Meta -->
		<div class="flex items-center gap-2 mb-3 flex-wrap">
			<?php
			$cats = get_the_category();
			if ( $cats ) :
			?>
			<span class="bg-[#6CB350]/10 text-[#6CB350] text-xs font-bold px-2 py-1 rounded-full">
				<?php echo esc_html( $cats[0]->name ); ?>
			</span>
			<?php endif; ?>
			<span class="text-gray-400 text-sm"><?php echo get_the_date(); ?></span>
		</div>

		<!-- Title -->
		<h2 class="text-lg font-bold text-[#404856] mb-2 font-serif">
			<a href="<?php the_permalink(); ?>" class="no-underline text-[#404856] hover:text-[#6CB350] transition-colors">
				<?php the_title(); ?>
			</a>
		</h2>

		<!-- Excerpt -->
		<p class="text-gray-600 text-sm leading-relaxed flex-1">
			<?php echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?>
		</p>

		<!-- Read More Link -->
		<a href="<?php the_permalink(); ?>" class="mt-4 text-[#6CB350] font-semibold text-sm no-underline hover:underline inline-block">
			Ler mais →
		</a>
	</div>

</article><!-- #post-## -->

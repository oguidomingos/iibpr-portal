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
	<div class="h-48 overflow-hidden">
		<?php if ( has_post_thumbnail() ) : ?>
		<?php
		the_post_thumbnail( 'medium_large', array(
			'class' => 'w-full h-full object-cover hover:scale-105 transition-transform duration-300',
			'loading' => 'lazy'
		) );
		?>
		<?php else : ?>
		<div class="w-full h-full bg-gradient-to-br from-iibpr-green to-iibpr-green-dark flex items-center justify-center">
			<svg class="w-12 h-12 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
			</svg>
		</div>
		<?php endif; ?>
	</div>

	<!-- Content -->
	<div class="p-6 flex flex-col flex-1">
		<!-- Meta -->
		<div class="flex items-center gap-2 mb-3 flex-wrap">
			<?php
			$cats = get_the_category();
			if ( $cats ) :
			?>
			<span class="bg-iibpr-green/10 text-iibpr-green text-xs font-bold px-2 py-1 rounded-full">
				<?php echo esc_html( $cats[0]->name ); ?>
			</span>
			<?php endif; ?>
			<span class="text-gray-400 text-sm"><?php echo get_the_date(); ?></span>
		</div>

		<!-- Title -->
		<h2 class="text-lg font-bold text-iibpr-charcoal mb-2 font-serif">
			<a href="<?php the_permalink(); ?>" class="no-underline text-iibpr-charcoal hover:text-iibpr-green transition-colors">
				<?php the_title(); ?>
			</a>
		</h2>

		<!-- Excerpt -->
		<p class="text-gray-600 text-sm leading-relaxed flex-1">
			<?php echo esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?>
		</p>

		<!-- Read More Link -->
		<a href="<?php the_permalink(); ?>" class="mt-4 text-iibpr-green font-semibold text-sm no-underline hover:underline inline-block">
			Ler mais →
		</a>
	</div>

</article><!-- #post-## -->

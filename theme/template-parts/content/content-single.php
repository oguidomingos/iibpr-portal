<?php
/**
 * Template part for displaying a single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package iibpr_main
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('max-w-3xl mx-auto px-4 py-16'); ?>>

	<!-- Featured Image Hero -->
	<?php if ( has_post_thumbnail() ) : ?>
	<div class="relative h-80 overflow-hidden rounded-2xl mb-10">
		<?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-full object-cover' ) ); ?>
		<div class="absolute inset-0 bg-gradient-to-t from-[#404856]/60 to-transparent"></div>
	</div>
	<?php endif; ?>

	<!-- Meta Information -->
	<div class="flex items-center gap-3 mb-6 flex-wrap">
		<?php
		$cats = get_the_category();
		if ( $cats ) :
		?>
		<span class="bg-[#6CB350] text-white text-xs font-bold px-3 py-1 rounded-full">
			<?php echo esc_html( $cats[0]->name ); ?>
		</span>
		<?php endif; ?>
		<span class="text-gray-400 text-sm"><?php echo get_the_date(); ?></span>
	</div>

	<!-- Title -->
	<h1 class="text-3xl md:text-4xl font-extrabold text-[#404856] mb-8 font-serif">
		<?php the_title(); ?>
	</h1>

	<!-- Content -->
	<div class="prose prose-lg max-w-none
		prose-headings:font-serif prose-headings:text-[#404856]
		prose-a:text-[#6CB350] prose-a:no-underline hover:prose-a:underline
		prose-img:rounded-lg prose-img:shadow-md
		prose-strong:text-[#404856]">
		<?php
		the_content();

		// Link pages for paginated posts
		wp_link_pages( array(
			'before' => '<div class="page-links"><span>' . esc_html__( 'Pages:', 'iibpr_main' ) . '</span>',
			'after'  => '</div>',
		) );
		?>
	</div>

	<!-- Navigation -->
	<nav class="mt-16 pt-8 border-t border-gray-200">
		<div class="flex justify-between gap-4">
			<?php
			$prev_post = get_previous_post();
			$next_post = get_next_post();

			if ( $prev_post ) :
			?>
			<a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" class="flex-1 p-4 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors">
				<span class="text-xs text-gray-500">← Artigo Anterior</span>
				<p class="font-semibold text-[#404856] text-sm mt-1"><?php echo esc_html( $prev_post->post_title ); ?></p>
			</a>
			<?php endif; ?>

			<?php if ( $next_post ) : ?>
			<a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" class="flex-1 p-4 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors text-right">
				<span class="text-xs text-gray-500">Próximo Artigo →</span>
				<p class="font-semibold text-[#404856] text-sm mt-1"><?php echo esc_html( $next_post->post_title ); ?></p>
			</a>
			<?php endif; ?>
		</div>
	</nav>

</article><!-- #post-## -->

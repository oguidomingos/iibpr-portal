<?php
/**
 * Template Part: Testimonial Card
 */
$role     = get_post_meta( get_the_ID(), '_iibpr_testimonial_author_role', true );
$location = get_post_meta( get_the_ID(), '_iibpr_testimonial_author_location', true );
?>
<blockquote class="testimonial-card h-full flex flex-col">
	<svg class="w-8 h-8 text-iibpr-light mb-4 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
		<path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
	</svg>
	<p class="text-gray-700 leading-relaxed mb-6 flex-1"><?php echo wp_kses_post( get_the_content() ); ?></p>
	<footer>
		<div class="font-semibold text-gray-900">— <?php the_title(); ?></div>
		<?php if ( $role || $location ) : ?>
		<div class="text-sm text-gray-500 mt-1">
			<?php echo esc_html( $role ); ?>
			<?php if ( $role && $location ) echo ' · '; ?>
			<?php echo esc_html( $location ); ?>
		</div>
		<?php endif; ?>
	</footer>
</blockquote>

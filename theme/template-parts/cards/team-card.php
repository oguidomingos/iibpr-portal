<?php
/**
 * Template Part: Team/Faculty Card
 */
$role      = get_post_meta( get_the_ID(), '_iibpr_team_role', true );
$specialty = get_post_meta( get_the_ID(), '_iibpr_team_specialty', true );
?>
<div class="team-card">
	<?php if ( has_post_thumbnail() ) : ?>
	<div class="h-56 overflow-hidden">
		<?php the_post_thumbnail( 'medium', array( 'class' => 'w-full h-full object-cover', 'loading' => 'lazy' ) ); ?>
	</div>
	<?php else : ?>
	<div class="h-56 bg-gray-100 flex items-center justify-center">
		<svg class="w-20 h-20 text-gray-300" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
	</div>
	<?php endif; ?>
	<div class="p-5">
		<h3 class="text-lg font-bold text-gray-900"><?php the_title(); ?></h3>
		<?php if ( $role ) : ?>
		<p class="text-iibpr-green text-sm font-medium mt-1"><?php echo esc_html( $role ); ?></p>
		<?php endif; ?>
		<?php if ( $specialty ) : ?>
		<p class="text-gray-500 text-sm mt-1"><?php echo esc_html( $specialty ); ?></p>
		<?php endif; ?>
	</div>
</div>

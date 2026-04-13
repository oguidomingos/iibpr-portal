	<!-- ========== FOOTER ========== -->
	<footer id="colophon" class="site-footer bg-[#3f3f3f] text-gray-300">

		<!-- Footer top -->
		<div class="max-w-7xl mx-auto px-4 md:px-8 py-16 grid md:grid-cols-2 lg:grid-cols-4 gap-12">

			<!-- Col 1: Brand + About -->
			<div>
				<div class="text-2xl font-extrabold text-white mb-3" style="font-family: var(--font-display);">IIBPR</div>
				<p class="text-sm leading-relaxed text-gray-400 mb-6">
					<?php echo wp_kses_post( iibpr_get( 'iibpr_footer_tagline', 'Instituto Italo Brasileiro de Psicomotricidade Relacional. Onde há movimento, há vida em relação!' ) ); ?>
				</p>
				<!-- Social -->
				<div class="flex gap-4">
					<?php $instagram = iibpr_get( 'iibpr_footer_instagram' ); if ( $instagram ) : ?>
					<a href="<?php echo esc_url( $instagram ); ?>" target="_blank" rel="noopener"
					   class="w-9 h-9 bg-gray-600 rounded-full flex items-center justify-center hover:bg-iibpr-green transition-colors"
					   aria-label="Instagram">
						<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
							<path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
						</svg>
					</a>
					<?php endif; ?>
					<?php $facebook = iibpr_get( 'iibpr_footer_facebook' ); if ( $facebook ) : ?>
					<a href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="noopener"
					   class="w-9 h-9 bg-gray-600 rounded-full flex items-center justify-center hover:bg-green-600 transition-colors"
					   aria-label="Facebook">
						<svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
							<path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
						</svg>
					</a>
					<?php endif; ?>
				</div>
			</div>

			<!-- Col 2: Links Rápidos -->
			<div>
				<h3 class="text-sm font-semibold uppercase tracking-wider text-gray-400 mb-4">Links Rápidos</h3>
				<nav>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'footer',
						'container'      => false,
						'menu_class'     => 'space-y-2 text-sm',
						'fallback_cb'    => function() {
							echo '<ul class="space-y-2 text-sm">
								<li><a href="' . esc_url( site_url( '/cursos' ) ) . '">Cursos</a></li>
								<li><a href="' . esc_url( site_url( '/eventos' ) ) . '">Eventos</a></li>
								<li><a href="' . esc_url( site_url( '/psicomotricidade' ) ) . '">Psicomotricidade</a></li>
								<li><a href="' . esc_url( site_url( '/pesquisa' ) ) . '">Pesquisa</a></li>
								<li><a href="' . esc_url( site_url( '/sobre' ) ) . '">Sobre Nós</a></li>
								<li><a href="' . esc_url( site_url( '/contato' ) ) . '">Contato</a></li>
							</ul>';
						},
					) );
					?>
				</nav>
			</div>

			<!-- Col 3: Contato -->
			<div>
				<h3 class="text-sm font-semibold uppercase tracking-wider text-gray-400 mb-4">Contato</h3>
				<ul class="space-y-3 text-sm">
					<?php $email = iibpr_get( 'iibpr_footer_email' ); if ( $email ) : ?>
					<li class="flex items-center gap-2">
						<svg class="w-4 h-4 text-iibpr-green flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
						</svg>
						<a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
					</li>
					<?php endif; ?>
					<?php $wabr = iibpr_get( 'iibpr_footer_whatsapp_br' ); if ( $wabr ) : ?>
					<li class="flex items-center gap-2">
						<svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
							<path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
						</svg>
						<span><?php echo esc_html( $wabr ); ?> (Brasil)</span>
					</li>
					<?php endif; ?>
					<?php $wapt = iibpr_get( 'iibpr_footer_whatsapp_pt' ); if ( $wapt ) : ?>
					<li class="flex items-center gap-2">
						<svg class="w-4 h-4 text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
							<path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
						</svg>
						<span><?php echo esc_html( $wapt ); ?> (Portugal)</span>
					</li>
					<?php endif; ?>
				</ul>
			</div>

			<!-- Col 4: Newsletter -->
			<div>
				<h3 class="text-sm font-semibold uppercase tracking-wider text-gray-400 mb-4">Newsletter</h3>
				<p class="text-sm text-gray-400 mb-4">Receba novidades sobre cursos e eventos.</p>
				<?php $newsletter_action = iibpr_get( 'iibpr_newsletter_action', '#' ); ?>
				<form action="<?php echo esc_url( $newsletter_action ); ?>" method="post" class="flex gap-2">
					<input type="email" name="email" placeholder="Seu email" required
					       class="flex-1 px-4 py-2 rounded-lg bg-gray-600 text-white placeholder-gray-400 border border-gray-500 focus:outline-none focus:border-iibpr-green text-sm">
					<button type="submit" class="px-4 py-2 bg-iibpr-green text-white rounded-lg text-sm font-semibold hover:bg-iibpr-green-dark transition-colors">
						Assinar
					</button>
				</form>
				<div class="mt-6 pt-6 border-t border-gray-600">
					<p class="text-xs text-gray-500 mb-2">Parceiros</p>
					<div class="flex items-center gap-4 text-sm font-medium text-gray-400">
						<span>IIPR</span>
						<span>ABP</span>
						<span>IESB</span>
					</div>
				</div>
			</div>

		</div>

		<!-- Footer bottom -->
		<div class="border-t border-gray-600 py-6 px-4 text-center text-xs text-gray-500">
			<div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2">
				<span><?php echo wp_kses_post( iibpr_get( 'iibpr_footer_copyright', '&copy; ' . date('Y') . ' Instituto IIBPR. Todos os direitos reservados.' ) ); ?></span>
				<div class="flex gap-4">
					<a href="<?php echo esc_url( site_url( '/politica-de-privacidade' ) ); ?>">Privacidade</a>
					<a href="<?php echo esc_url( site_url( '/termos-de-uso' ) ); ?>">Termos de Uso</a>
				</div>
			</div>
		</div>

	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'antialiased' ); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<!-- ========== HEADER / NAV ========== -->
	<header id="masthead" class="site-header" role="banner">
		<div class="max-w-7xl mx-auto px-4 md:px-8 py-4 flex justify-between items-center">

			<!-- Logo / Branding -->
			<div class="site-branding flex items-center gap-3">
				<?php
				$logo_url = iibpr_get( 'iibpr_logo' );
				if ( $logo_url ) : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="h-10 w-auto">
					</a>
				<?php else : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"
					   class="text-2xl font-extrabold gradient-text no-underline">IIBPR</a>
				<?php endif; ?>
				<span class="hidden lg:block text-xs text-gray-500 max-w-xs leading-tight">
					Onde há movimento, há vida em relação!
				</span>
			</div>

			<!-- Mobile toggle -->
			<button class="mobile-menu-toggle md:hidden text-gray-600 hover:text-iibpr-green focus:outline-none focus:ring-2 focus:ring-iibpr-green rounded p-1"
			        aria-label="<?php esc_attr_e( 'Abrir menu', 'iibpr-theme' ); ?>"
			        aria-expanded="false" aria-controls="site-navigation">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 menu-icon-open" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
				</svg>
				<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 menu-icon-close hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
				</svg>
			</button>

			<!-- Navigation -->
			<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Menu Principal', 'iibpr-theme' ); ?>">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'container'      => false,
					'fallback_cb'    => 'iibpr_fallback_menu',
				) );
				?>
				<a href="https://wa.me/5561991572149" target="_blank" rel="noopener"
				   class="nav-aluno-btn hidden md:inline-flex items-center gap-2">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
						<path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
					</svg>
					Fale Conosco
				</a>
			</nav>

		</div>
	</header><!-- #masthead -->

<?php
/**
 * Fallback menu with all navigation links.
 */
function iibpr_fallback_menu() {
    echo '<ul id="primary-menu">
        <li><a href="' . esc_url( home_url( '/' ) )              . '">Home</a></li>
        <li><a href="' . esc_url( site_url( '/cursos' ) )         . '">Cursos</a></li>
        <li><a href="' . esc_url( site_url( '/blog' ) )           . '">Notícias</a></li>
        <li><a href="' . esc_url( site_url( '/sobre' ) )          . '">Sobre Nós</a></li>
    </ul>';
}

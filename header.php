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
					Psicomotricidade Relacional
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
				<a href="<?php echo esc_url( get_permalink( get_page_by_path( 'aluno' ) ) ?: site_url( '/aluno' ) ); ?>"
				   class="nav-aluno-btn hidden md:inline-flex items-center gap-2">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
					</svg>
					Área do Aluno
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
        <li><a href="' . esc_url( home_url( '/' ) )              . '">Início</a></li>
        <li><a href="' . esc_url( site_url( '/psicomotricidade' ) ) . '">Psicomotricidade</a></li>
        <li><a href="' . esc_url( site_url( '/cursos' ) )         . '">Cursos</a></li>
        <li><a href="' . esc_url( site_url( '/eventos' ) )        . '">Eventos</a></li>
        <li><a href="' . esc_url( site_url( '/pesquisa' ) )       . '">Pesquisa</a></li>
        <li><a href="' . esc_url( site_url( '/blog' ) )           . '">Blog</a></li>
        <li><a href="' . esc_url( site_url( '/contato' ) )        . '">Contato</a></li>
    </ul>';
}

<?php
/**
 * Template Name: Área do Aluno
 * Template Post Type: page
 */
get_header(); ?>

<main id="main" class="site-main">

	<!-- Hero -->
	<section class="bg-primary-gradient py-16 px-4 md:px-8 text-white text-center -mt-[72px] pt-[92px]">
		<div class="max-w-4xl mx-auto">
			<h1 class="text-3xl md:text-4xl font-extrabold mb-2">Área do Aluno</h1>
			<p class="text-lg opacity-90">Acesse seus cursos e materiais.</p>
		</div>
	</section>

	<section class="section-padding bg-warm-white">
		<div class="max-w-lg mx-auto">

			<?php if ( ! is_user_logged_in() ) : ?>
			<!-- Login Form -->
			<div class="card-hover p-8 fade-up">
				<h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Entrar</h2>

				<?php
				wp_login_form( array(
				    'redirect'       => get_permalink(),
				    'label_username' => 'Email ou Usuário',
				    'label_password' => 'Senha',
				    'label_remember' => 'Lembrar-me',
				    'label_log_in'   => 'Entrar',
				) );
				?>

				<div class="text-center mt-6 text-sm text-gray-500">
					<a href="<?php echo esc_url( wp_lostpassword_url( get_permalink() ) ); ?>" class="text-iibpr-green no-underline hover:text-iibpr-green-dark">
						Esqueceu a senha?
					</a>
				</div>
			</div>

			<?php else : ?>
			<!-- Dashboard -->
			<div class="max-w-3xl mx-auto">
				<div class="text-center mb-10 fade-up">
					<h2 class="text-2xl font-bold text-gray-900">Bem-vindo(a), <?php echo esc_html( wp_get_current_user()->display_name ); ?>!</h2>
				</div>

				<div class="grid sm:grid-cols-3 gap-6">
					<a href="#" class="pillar-card no-underline fade-up fade-up-delay-1">
						<div class="text-3xl mb-3">📚</div>
						<h3 class="text-lg font-bold text-gray-900">Meus Cursos</h3>
						<p class="text-gray-500 text-sm mt-2">Em breve</p>
					</a>
					<a href="#" class="pillar-card no-underline fade-up fade-up-delay-2">
						<div class="text-3xl mb-3">🎓</div>
						<h3 class="text-lg font-bold text-gray-900">Certificados</h3>
						<p class="text-gray-500 text-sm mt-2">Em breve</p>
					</a>
					<a href="#" class="pillar-card no-underline fade-up fade-up-delay-3">
						<div class="text-3xl mb-3">📅</div>
						<h3 class="text-lg font-bold text-gray-900">Eventos</h3>
						<p class="text-gray-500 text-sm mt-2">Em breve</p>
					</a>
				</div>

				<div class="mt-8 p-6 bg-amber-50 border border-amber-200 rounded-xl text-center fade-up">
					<p class="text-amber-700">A integração com o ambiente de aprendizagem (LMS) está em desenvolvimento. Em breve você poderá acessar seus cursos e materiais por aqui.</p>
				</div>

				<div class="text-center mt-8">
					<a href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>" class="btn-secondary text-sm py-2 px-6">
						Sair
					</a>
				</div>
			</div>
			<?php endif; ?>

		</div>
	</section>

</main>

<?php get_footer(); ?>

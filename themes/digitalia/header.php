<?php
/**
 * The header for our theme
 *
 * @package Digitalia
 */
?>
<!doctype html>
<html <?php language_attributes(); ?> class="font-sans">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<!-- Add tab functionality -->
	<script>
	document.addEventListener('DOMContentLoaded', function() {
		// Handle mobile accordion
		document.querySelectorAll('[data-orientation="vertical"] button').forEach(button => {
			button.addEventListener('click', function() {
				const panel = document.getElementById(this.getAttribute('aria-controls'));
				const isOpen = this.getAttribute('aria-expanded') === 'true';
				
				this.setAttribute('aria-expanded', !isOpen);
				this.setAttribute('data-state', isOpen ? 'closed' : 'open');
				panel.hidden = isOpen;
				panel.setAttribute('data-state', isOpen ? 'closed' : 'open');
			});
		});

		// Handle desktop tabs
		const tabButtons = document.querySelectorAll('[role="tab"]');
		const tabPanels = document.querySelectorAll('[role="tabpanel"]');

		tabButtons.forEach(button => {
			button.addEventListener('click', function() {
				// Deactivate all tabs
				tabButtons.forEach(btn => {
					btn.setAttribute('aria-selected', 'false');
					btn.setAttribute('data-state', 'inactive');
					btn.setAttribute('tabindex', '-1');
				});

				// Hide all panels
				tabPanels.forEach(panel => {
					panel.setAttribute('data-state', 'inactive');
					panel.hidden = true;
				});

				// Activate clicked tab
				this.setAttribute('aria-selected', 'true');
				this.setAttribute('data-state', 'active');
				this.setAttribute('tabindex', '0');

				// Show corresponding panel
				const panelId = this.getAttribute('aria-controls');
				const panel = document.getElementById(panelId);
				panel.setAttribute('data-state', 'active');
				panel.hidden = false;
			});
		});
	});
	</script>
</head>

<body <?php body_class(); ?>>

<!-- Gov.co Bar -->
<div class="w-full bg-[#3366CC] h-10 flex items-center">
    <div class="container mx-auto px-8">
        <img src="/wp-content/uploads/2024/11/header_govco.png" alt="Gov.co" class="h-6">
    </div>
</div>

<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'digitalia'); ?></a>

	<nav x-data="{ open: false }" class="sticky top-0 z-[60] bg-black font-mono" id="main-navigation">
		<div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
			<div class="relative flex h-16 items-center justify-between">
				<div class="flex flex-1 items-center z-50">
					<div class="flex shrink-0 items-center" id="site-logo">
						<a href="<?php echo esc_url(home_url('/')); ?>">
							<img class="h-8 w-auto nav-logo" src="/wp-content/uploads/2024/11/logo3-white.png" alt="<?php bloginfo('name'); ?>">
						</a>
					</div>
				</div>
				<div class="flex-grow flex items-center justify-center sm:items-stretch sm:justify-end z-40">
					<div class="hidden sm:ml-6 sm:block w-full">
						<div class="flex space-x-4 justify-end" id="desktop-menu">
							<ul class="flex space-x-6">
								<li class="flex items-center">
									<a href="/que-es-digitalia/" class="nav-top-link nav-main-link text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium uppercase">
										Qué es Digitalia
									</a>
								</li>
								<li class="relative group">
									<div class="flex flex-col">
										<div class="flex items-center">
											<a href="#" class="nav-top-link nav-main-link text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium uppercase">
												Módulos
											</a>
											<button type="button" class="ml-1 text-gray-300 nav-chevron">
												<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
												</svg>
											</button>
										</div>
										<div class="hidden group-hover:block absolute top-full pt-2 left-0 nav-submenu">
											<div class="w-96 bg-white rounded-md shadow-lg z-50">
												<div class="p-4 grid grid-cols-1 gap-4">
													<a href="/modulos/" class="flex items-center space-x-3 p-2 rounded-md hover:bg-gray-100 nav-submenu-item">
														<img src="/wp-content/uploads/2024/11/Screenshot-2024-11-26-at-12.25.25%E2%80%AFPM.jpg" alt="" class="w-8 h-8" />
														<div>
															<div class="font-medium nav-menu-title">Módulos Digitalia</div>
															<div class="text-xs text-gray-500 nav-menu-description">El proyecto Digitalia se desarrolla en cinco módulos.</div>
														</div>
													</a>
													<a href="/modulos/academia/" class="flex items-center space-x-3 p-2 rounded-md hover:bg-gray-100 nav-submenu-item">
														<img src="/wp-content/uploads/2024/11/Screenshot-2024-11-18-at-12.27.21 PM.jpg" alt="" class="w-8 h-8" />
														<div>
															<div class="font-medium nav-menu-title">Academia</div>
															<div class="text-xs text-gray-500 nav-menu-description">Plataforma de autoformación en paradigmas tecnológicos y paz mediática.</div>
														</div>
													</a>
													<a href="/modulos/en-linea/" class="flex items-center space-x-3 p-2 rounded-md hover:bg-gray-100 nav-submenu-item">
														<img src="/wp-content/uploads/2024/11/Screenshot-2024-11-18-at-2.21.48 PM.jpg" alt="" class="w-8 h-8" />
														<div>
															<div class="font-medium nav-menu-title">En Línea</div>
															<div class="text-xs text-gray-500 nav-menu-description">Serie web sobre acciones ciudadanas y públicas por la paz.</div>
														</div>
													</a>
													<a href="/modulos/total-transmedia/" class="flex items-center space-x-3 p-2 rounded-md hover:bg-gray-100 nav-submenu-item">
														<img src="/wp-content/uploads/2024/11/Screenshot-2024-11-18-at-2.21.05 PM.jpg" alt="" class="w-8 h-8" />
														<div>
															<div class="font-medium nav-menu-title">Total Transmedia</div>
															<div class="text-xs text-gray-500 nav-menu-description">Estrategia de expansión Digital-IA y sinergias ciudadanas.</div>
														</div>
													</a>
													<a href="/modulos/colaboratorios/" class="flex items-center space-x-3 p-2 rounded-md hover:bg-gray-100 nav-submenu-item">
														<img src="/wp-content/uploads/2024/11/Screenshot-2024-11-18-at-2.22.28 PM.jpg" alt="" class="w-8 h-8" />
														<div>
															<div class="font-medium nav-menu-title">CoLaboratorios</div>
															<div class="text-xs text-gray-500 nav-menu-description">Espacios de aprendizaje y construcción de paz mediática.</div>
														</div>
													</a>
													<a href="/modulos/ready/" class="flex items-center space-x-3 p-2 rounded-md hover:bg-gray-100 nav-submenu-item">
														<img src="/wp-content/uploads/2024/11/Screenshot-2024-11-18-at-2.23.02 PM.jpg" alt="" class="w-8 h-8" />
														<div>
															<div class="font-medium nav-menu-title">REaDy</div>
															<div class="text-xs text-gray-500 nav-menu-description">Red de alfabetizadores en paz mediática y tecnologías.</div>
														</div>
													</a>
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="relative group">
									<div class="flex flex-col">
										<div class="flex items-center">
											<a href="#" class="nav-top-link nav-main-link text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium uppercase">
												Biblioteca Digital
											</a>
											<button type="button" class="ml-1 text-gray-300 nav-chevron">
												<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
												</svg>
											</button>
										</div>
										<div class="hidden group-hover:block absolute top-full pt-2 left-0 nav-submenu">
											<div class="w-48 bg-white rounded-md shadow-lg z-50">
												<div class="py-1">
													<a href="/biblioteca-digital/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Biblioteca Digitalia</a>
													<a href="/kit-social-media/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Kit social media</a>
												</div>
											</div>
										</div>
									</div>
								</li>
								<li class="flex items-center">
									<a href="/blog-y-noticias/" class="nav-top-link nav-main-link text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium uppercase">
										Blog
									</a>
								</li>
								<li class="flex items-center">
									<a href="/preguntas-frecuentes/" class="nav-top-link nav-main-link text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium uppercase">
										Preguntas Frecuentes
									</a>
								</li>
								<li class="flex items-center">
									<a href="/contacto/" class="nav-top-link nav-main-link text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium uppercase">
										Contacto
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
					<ul class="flex items-center space-x-4 nav-social-icons">
						<li class="font-medium duration-200 hover:scale-110 text-white hover:text-slate-300">
							<a href="https://bit.ly/49vhs86"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="size-5" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg></a>
						</li>
						<li class="font-medium duration-200 hover:scale-110 text-white hover:text-slate-300">
							<a href="https://bit.ly/3BldRwD"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="size-5" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"></path></svg></a>
						</li>
						<li class="font-medium duration-200 hover:scale-110 text-white hover:text-slate-300">
							<a href="https://x.com/Digitalia_Col"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="size-5" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg></a>
						</li>
						<li class="font-medium duration-200 hover:scale-110 text-white hover:text-slate-300">
							<a href="https://bit.ly/3ZL9Z1u"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="size-5" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"></path></svg></a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<!-- Mobile menu -->
		<div x-description="Mobile menu, show/hide based on menu state." class="sm:hidden fixed bottom-16 left-0 right-0 bg-black z-50" id="mobile-menu" x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="transform translate-y-full" x-transition:enter-end="transform translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="transform translate-y-0" x-transition:leave-end="transform translate-y-full">
			<div class="space-y-1 px-2 pb-3 pt-2 max-h-[80vh] overflow-y-auto">
				<a href="/que-es-digitalia/" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium uppercase">
					Qué es Digitalia
				</a>
				
				<!-- Módulos Dropdown -->
				<div x-data="{ modulesOpen: false }" class="relative">
					<button @click="modulesOpen = !modulesOpen" class="w-full text-left flex items-center justify-between text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-base font-medium uppercase">
						<span>Módulos</span>
						<svg class="w-4 h-4" :class="{ 'transform rotate-180': modulesOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
						</svg>
					</button>
					<div x-show="modulesOpen" class="px-4 py-2 space-y-2 bg-white">
						<a href="/modulos/" class="flex items-center space-x-3 p-2 rounded-md text-gray-300 hover:bg-gray-700 hover:text-white nav-submenu-item">
							<img src="/wp-content/uploads/2024/11/Screenshot-2024-11-26-at-12.25.25%E2%80%AFPM.jpg" alt="" class="w-8 h-8" />
							<div>
								<div class="font-medium nav-menu-title">Módulos Digitalia</div>
								<div class="text-xs text-gray-500 nav-menu-description">El proyecto Digitalia se desarrolla en cinco módulos.</div>
							</div>
						</a>
						<a href="/modulos/academia/" class="flex items-center space-x-3 p-2 rounded-md text-gray-300 hover:bg-gray-700 hover:text-white nav-submenu-item">
							<img src="/wp-content/uploads/2024/11/Screenshot-2024-11-18-at-12.27.21 PM.jpg" alt="" class="w-8 h-8" />
							<div>
								<div class="font-medium nav-menu-title">Academia</div>
								<div class="text-xs text-gray-500 nav-menu-description">Plataforma de autoformación en paradigmas tecnológicos y paz mediática.</div>
							</div>
						</a>
						<a href="/modulos/en-linea/" class="flex items-center space-x-3 p-2 rounded-md text-gray-300 hover:bg-gray-700 hover:text-white nav-submenu-item">
							<img src="/wp-content/uploads/2024/11/Screenshot-2024-11-18-at-2.21.48 PM.jpg" alt="" class="w-8 h-8" />
							<div>
								<div class="font-medium nav-menu-title">En Línea</div>
								<div class="text-xs text-gray-500 nav-menu-description">Serie web sobre acciones ciudadanas y públicas por la paz.</div>
							</div>
						</a>
						<a href="/modulos/total-transmedia/" class="flex items-center space-x-3 p-2 rounded-md text-gray-300 hover:bg-gray-700 hover:text-white nav-submenu-item">
							<img src="/wp-content/uploads/2024/11/Screenshot-2024-11-18-at-2.21.05 PM.jpg" alt="" class="w-8 h-8" />
							<div>
								<div class="font-medium nav-menu-title">Total Transmedia</div>
								<div class="text-xs text-gray-500 nav-menu-description">Estrategia de expansión Digital-IA y sinergias ciudadanas.</div>
							</div>
						</a>
						<a href="/modulos/colaboratorios/" class="flex items-center space-x-3 p-2 rounded-md text-gray-300 hover:bg-gray-700 hover:text-white nav-submenu-item">
							<img src="/wp-content/uploads/2024/11/Screenshot-2024-11-18-at-2.22.28 PM.jpg" alt="" class="w-8 h-8" />
							<div>
								<div class="font-medium nav-menu-title">CoLaboratorios</div>
								<div class="text-xs text-gray-500 nav-menu-description">Espacios de aprendizaje y construcción de paz mediática.</div>
							</div>
						</a>
						<a href="/modulos/ready/" class="flex items-center space-x-3 p-2 rounded-md text-gray-300 hover:bg-gray-700 hover:text-white nav-submenu-item">
							<img src="/wp-content/uploads/2024/11/Screenshot-2024-11-18-at-2.23.02 PM.jpg" alt="" class="w-8 h-8" />
							<div>
								<div class="font-medium nav-menu-title">REaDy</div>
								<div class="text-xs text-gray-500 nav-menu-description">Red de alfabetizadores en paz mediática y tecnologías.</div>
							</div>
						</a>
					</div>
				</div>

				<!-- Biblioteca Digital Dropdown -->
				<div x-data="{ bibliotecaOpen: false }" class="relative">
					<button @click="bibliotecaOpen = !bibliotecaOpen" class="w-full text-left flex items-center justify-between text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-base font-medium uppercase">
						<span>Biblioteca Digital</span>
						<svg class="w-4 h-4" :class="{ 'transform rotate-180': bibliotecaOpen }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
						</svg>
					</button>
					<div x-show="bibliotecaOpen" class="px-4 py-2 space-y-1">
						<a href="/biblioteca-digital/" class="block px-3 py-2 text-base text-gray-300 hover:bg-gray-700 hover:text-white rounded-md">Biblioteca Digitalia</a>
						<a href="/video/" class="block px-3 py-2 text-base text-gray-300 hover:bg-gray-700 hover:text-white rounded-md">Kit Social Media</a
						<a href="/redes-sociales/" class="block px-3 py-2 text-base text-gray-300 hover:bg-gray-700 hover:text-white rounded-md">Redes sociales</a>
					</div>
				</div>

				<a href="/preguntas-frecuentes/" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium uppercase">
					Preguntas Frecuentes
				</a>

				<a href="/blog-y-noticias/" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium uppercase">
					Blog
				</a>

				<a href="/contacto/" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium uppercase">
					Contacto
				</a>
			</div>
		</div>
	</nav>

	<?php get_template_part('template-parts/secondary-nav'); ?>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			$digitalia_description = get_bloginfo( 'description', 'display' );
			if ( $digitalia_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $digitalia_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->
	</header><!-- #masthead -->

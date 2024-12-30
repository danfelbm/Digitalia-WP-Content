<?php
/**
 * Template Name: Módulo CoLaboratorios
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="absolute inset-x-0 top-0 -z-10 h-full w-full">
        <div class="absolute inset-0 bg-gradient-to-b from-teal-50 to-white"></div>
        <div class="absolute inset-0 bg-[radial-gradient(#0f766e_0.8px,transparent_0.8px)] [background-size:16px_16px] opacity-[0.15]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(#115e59_1.2px,transparent_1.2px)] [background-size:32px_32px] opacity-[0.1]"></div>
    </div>
    
    <section class="pt-32">
        <div class="container">
            <div class="relative pb-16">
                
                <a href="#acerca" class="mx-auto flex w-fit items-center gap-2 rounded-lg bg-teal-50 p-3 sm:rounded-full sm:py-1 sm:pl-1 sm:pr-3">
                    <div class="items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-teal-600 focus:ring-offset-2 border-transparent bg-teal-700 text-white hover:bg-teal-600 hidden sm:block">
                        Digital-IA
                    </div>
                    <p class="flex items-center gap-1 text-sm text-teal-900">
                        Descubre nuestros espacios de innovación
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right mt-0.5 size-4 shrink-0">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </p>
                </a>

                <h1 class="mx-auto my-5 max-w-screen-lg text-balance text-center text-3xl md:text-5xl text-teal-900">
                    Colaboratorios: Espacios de Innovación Social y Tecnológica
                </h1>

                <p class="mx-auto max-w-screen-md text-center text-sm text-teal-700 md:text-base">
                    Los Colaboratorios representan una innovadora red de espacios físicos diseñados para democratizar el acceso a la tecnología y fomentar la alfabetización mediática en Colombia.
                </p>

                <div class="mt-8 flex items-center justify-center gap-3">
                    <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-600 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-teal-700 text-white hover:bg-teal-600 h-10 px-4 py-2">
                        Participar
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right ml-2 size-4">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </button>
                    <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-teal-600 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-teal-200 bg-white hover:bg-teal-50 hover:text-teal-700 h-10 px-4 py-2 text-teal-900">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-play mr-2 size-4">
                            <polygon points="6 3 20 12 6 21 6 3"></polygon>
                        </svg>
                        Ver Video
                    </button>
                </div>

                <div class="mt-5 flex justify-center">
                    <a href="#contacto" class="flex items-center gap-1 border-b border-dashed text-sm hover:border-solid hover:border-teal-600 text-teal-700">
                        Agenda una visita
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right size-3.5">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="rounded-t-lg border-x border-t border-teal-100 px-1 pt-1">
                <img src="https://placehold.co/1200x430/teal/white/png?text=Colaboratorios(1200x430)" alt="Colaboratorios - Espacios de innovación" class="max-h-80 w-full rounded-t-lg object-cover md:max-h-[430px]">
            </div>
        </div>
    </section>

    <section id="acerca" class="bg-teal-900 pb-32 pt-12">
        <div class="container">
            <div class="grid place-content-center gap-10 lg:grid-cols-2">
                <div class="mx-auto flex max-w-screen-md flex-col items-center justify-center gap-4 lg:items-start">
                    <div class="rounded-full border border-teal-400 text-teal-400 font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 text-foreground flex items-center gap-1 px-2.5 py-1.5 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-code-2 h-auto w-4">
                            <path d="m18 16 4-4-4-4"></path>
                            <path d="m6 8-4 4 4 4"></path>
                            <path d="m14.5 4-5 16"></path>
                        </svg>
                        Laboratorios Mediáticos
                    </div>
                    <h2 class="text-center text-3xl font-semibold lg:text-left lg:text-4xl text-white">Espacios de Innovación Digital</h2>
                    <p class="text-center text-teal-200 lg:text-left lg:text-lg">Los CoLaboratorios son espacios físicos de co-creación donde los ciudadanos desarrollan habilidades críticas para la alfabetización mediática y el uso ético de tecnologías emergentes.</p>
                    <a href="/contacto" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-teal-500 text-white hover:bg-teal-400 h-11 rounded-md px-8">Conoce nuestros espacios</a>
                    <div class="mt-9 flex w-full flex-col justify-center gap-6 md:flex-row lg:justify-start">
                        <div class="flex justify-between gap-6">
                            <div class="mx-auto">
                                <p class="mb-1.5 text-3xl font-bold text-teal-400">32</p>
                                <p class="text-teal-200">Departamentos</p>
                            </div>
                            <div data-orientation="vertical" role="none" class="shrink-0 bg-teal-700 w-[1px] h-auto"></div>
                            <div class="mx-auto">
                                <p class="mb-1.5 text-3xl font-bold text-teal-400">+50</p>
                                <p class="text-teal-200">Espacios</p>
                            </div>
                        </div>
                        <div data-orientation="vertical" role="none" class="shrink-0 bg-teal-700 w-[1px] hidden h-auto md:block"></div>
                        <div data-orientation="horizontal" role="none" class="shrink-0 bg-teal-700 h-[1px] w-full block md:hidden"></div>
                        <div class="flex justify-between gap-6">
                            <div class="mx-auto">
                                <p class="mb-1.5 text-3xl font-bold text-teal-400">24/7</p>
                                <p class="text-teal-200">Acceso</p>
                            </div>
                            <div data-orientation="vertical" role="none" class="shrink-0 bg-teal-700 w-[1px] h-auto"></div>
                            <div class="mx-auto">
                                <p class="mb-1.5 text-3xl font-bold text-teal-400">100%</p>
                                <p class="text-teal-200">Gratuito</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-auto">
                    <img src="/wp-content/uploads/2024/12/placeholder-dark-1.svg" alt="CoLaboratorios - Espacios de Innovación Digital" class="ml-auto max-h-[450px] w-full rounded-xl object-cover">
                </div>
            </div>
            <div class="mt-10 grid gap-6 md:grid-cols-3">
                <div class="flex flex-col gap-4">
                    <div class="gap flex flex-col gap-3 rounded-lg border border-teal-700 bg-teal-800/50 p-6">
                        <div class="flex flex-col items-center gap-2 lg:flex-row">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lightbulb h-auto w-6 text-teal-400">
                                <path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5"></path>
                                <path d="M9 18h6"></path>
                                <path d="M10 22h4"></path>
                            </svg>
                            <h3 class="text-center text-lg font-medium lg:text-left text-white">Innovación Mediática</h3>
                        </div>
                        <p class="text-center text-sm text-teal-200 md:text-base lg:text-left">Espacios equipados con tecnología de punta para experimentar y crear contenido digital con enfoque crítico y ético.</p>
                    </div>
                </div>
                <div class="flex flex-col gap-4">
                    <div class="gap flex flex-col gap-3 rounded-lg border border-teal-700 bg-teal-800/50 p-6">
                        <div class="flex flex-col items-center gap-2 lg:flex-row">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users h-auto w-6 text-teal-400">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <h3 class="text-center text-lg font-medium lg:text-left text-white">Comunidad Activa</h3>
                        </div>
                        <p class="text-center text-sm text-teal-200 md:text-base lg:text-left">Forma parte de una red de creadores y activistas digitales comprometidos con la construcción de una comunicación ética y responsable.</p>
                    </div>
                </div>
                <div class="flex flex-col gap-4">
                    <div class="gap flex flex-col gap-3 rounded-lg border border-teal-700 bg-teal-800/50 p-6">
                        <div class="flex flex-col items-center gap-2 lg:flex-row">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-check h-auto w-6 text-teal-400">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"></path>
                                <path d="m9 12 2 2 4-4"></path>
                            </svg>
                            <h3 class="text-center text-lg font-medium lg:text-left text-white">Seguridad Digital</h3>
                        </div>
                        <p class="text-center text-sm text-teal-200 md:text-base lg:text-left">Aprende sobre ciberseguridad, verificación de información y protección contra la desinformación en entornos digitales.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-teal-50 py-32">
        <div class="container">
            <div class="relative grid gap-16 md:grid-cols-2">
                <div class="top-40 h-fit md:sticky">
                    <p class="font-medium text-teal-600">Nuestro Enfoque</p>
                    <h2 class="mb-6 mt-4 text-4xl font-semibold md:text-5xl text-teal-950">Colaboratorios: Espacios de Alfabetización Digital</h2>
                    <p class="font-medium md:text-xl text-teal-700">Transformamos la relación ciudadana con la tecnología a través de la educación mediática.</p>
                    <div class="mt-8 flex flex-col gap-4 lg:flex-row">
                        <button class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-teal-600 text-white hover:bg-teal-500 h-11 rounded-md px-8 gap-2">Únete Ahora</button>
                        <button class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-teal-300 bg-white text-teal-700 hover:bg-teal-50 h-11 rounded-md px-8 gap-2">Conoce Más</button>
                    </div>
                </div>
                <div class="flex flex-col gap-12 md:gap-20">
                    <div class="rounded-xl border border-teal-200 bg-white p-2 shadow-sm">
                        <img src="/wp-content/uploads/2024/12/placeholder-dark-1.svg" alt="Alfabetización Mediática" class="aspect-video w-full rounded-xl border border-teal-100 object-cover">
                        <div class="p-6">
                            <h3 class="mb-1 text-2xl font-semibold text-teal-900">Alfabetización Digital</h3>
                            <p class="text-teal-600">Desarrollamos habilidades críticas para navegar el mundo digital con responsabilidad y ética.</p>
                        </div>
                    </div>
                    <div class="rounded-xl border border-teal-200 bg-white p-2 shadow-sm">
                        <img src="/wp-content/uploads/2024/12/placeholder-dark-1.svg" alt="Inteligencia Artificial" class="aspect-video w-full rounded-xl border border-teal-100 object-cover">
                        <div class="p-6">
                            <h3 class="mb-1 text-2xl font-semibold text-teal-900">Tecnologías Emergentes</h3>
                            <p class="text-teal-600">Exploramos el impacto de la inteligencia artificial y las tecnologías emergentes en la sociedad.</p>
                        </div>
                    </div>
                    <div class="rounded-xl border border-teal-200 bg-white p-2 shadow-sm">
                        <img src="/wp-content/uploads/2024/12/placeholder-dark-1.svg" alt="Espacios Colaborativos" class="aspect-video w-full rounded-xl border border-teal-100 object-cover">
                        <div class="p-6">
                            <h3 class="mb-1 text-2xl font-semibold text-teal-900">Espacios Colaborativos</h3>
                            <p class="text-teal-600">Creamos ambientes de aprendizaje colaborativo para la transformación social.</p>
                        </div>
                    </div>
                    <div class="rounded-xl border border-teal-200 bg-white p-2 shadow-sm">
                        <img src="/wp-content/uploads/2024/12/placeholder-dark-1.svg" alt="Derechos Digitales" class="aspect-video w-full rounded-xl border border-teal-100 object-cover">
                        <div class="p-6">
                            <h3 class="mb-1 text-2xl font-semibold text-teal-900">Derechos Digitales</h3>
                            <p class="text-teal-600">Protegemos y promovemos los derechos humanos en el espacio digital.</p>
                        </div>
                    </div>
                    <div class="rounded-xl border border-teal-200 bg-white p-2 shadow-sm">
                        <img src="/wp-content/uploads/2024/12/placeholder-dark-1.svg" alt="Paz Mediática" class="aspect-video w-full rounded-xl border border-teal-100 object-cover">
                        <div class="p-6">
                            <h3 class="mb-1 text-2xl font-semibold text-teal-900">Paz Mediática</h3>
                            <p class="text-teal-600">Fomentamos la comunicación no violenta y el diálogo constructivo en medios digitales.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();

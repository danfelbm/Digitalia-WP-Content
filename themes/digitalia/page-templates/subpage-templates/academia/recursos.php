<?php
/**
 * Template Name: Academia - Recursos y Herramientas
 * 
 * @package Digitalia
 */

get_header();
?>

<main class="bg-white">
    <section class="py-16 md:py-24 bg-yellow-50">
        <div class="container mx-auto px-4">
            <div class="grid items-center gap-8 lg:grid-cols-2">
                <div class="flex flex-col items-center px-4 text-center lg:items-start lg:text-left">
                    <p class="text-yellow-600 font-semibold mb-4">Recursos Educativos</p>
                    <h1 class="text-4xl lg:text-6xl font-bold mb-6 text-yellow-900">Biblioteca de Conocimiento</h1>
                    <p class="mb-8 max-w-xl text-yellow-900 lg:text-xl">
                        Explora nuestra colección de recursos educativos, guías prácticas y herramientas interactivas diseñadas para potenciar tu aprendizaje en alfabetización mediática.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#biblioteca" class="inline-flex items-center justify-center px-6 py-3 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Explorar Recursos
                        </a>
                        <a href="#herramientas" class="inline-flex items-center justify-center px-6 py-3 border border-yellow-600 text-yellow-600 rounded-lg hover:bg-yellow-50 transition-colors">
                            Ver Herramientas
                        </a>
                    </div>
                </div>
                <img src="https://placehold.co/800x600/ca8a04/fef9c3" alt="Recursos Educativos" class="w-full rounded-lg shadow-xl">
            </div>
        </div>
    </section>
    <!-- Biblioteca Digital Section -->
    <section class="py-24 sm:py-32 bg-slate-50">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">Biblioteca Digital</h2>
                <p class="mt-2 text-lg leading-8 text-slate-600">Accede a nuestra colección de recursos educativos diseñados para enriquecer tu aprendizaje.</p>
            </div>
            <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-12 sm:mt-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                <!-- Card 1: Materiales Educativos -->
                <article class="flex flex-col items-start">
                    <div class="rounded-lg bg-white p-6 w-full border border-slate-200">
                        <div class="flex items-center gap-x-4 mb-4">
                            <svg class="h-6 w-6 text-slate-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                            </svg>
                            <h3 class="text-lg font-semibold leading-6 text-slate-900">Materiales Educativos</h3>
                        </div>
                        <p class="mt-4 text-base leading-7 text-slate-600">Accede a libros digitales, artículos académicos y material complementario para tu formación.</p>
                        <div class="mt-4">
                            <a href="#" class="text-sm font-semibold leading-6 text-slate-800 hover:text-slate-900">
                                Explorar materiales <span aria-hidden="true">→</span>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Card 2: Guías Prácticas -->
                <article class="flex flex-col items-start">
                    <div class="rounded-lg bg-white p-6 w-full border border-slate-200">
                        <div class="flex items-center gap-x-4 mb-4">
                            <svg class="h-6 w-6 text-slate-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                            </svg>
                            <h3 class="text-lg font-semibold leading-6 text-slate-900">Guías Prácticas</h3>
                        </div>
                        <p class="mt-4 text-base leading-7 text-slate-600">Descubre paso a paso cómo aplicar los conceptos aprendidos en situaciones reales.</p>
                        <div class="mt-4">
                            <a href="#" class="text-sm font-semibold leading-6 text-slate-800 hover:text-slate-900">
                                Ver guías <span aria-hidden="true">→</span>
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Card 3: Recursos Multimedia -->
                <article class="flex flex-col items-start">
                    <div class="rounded-lg bg-white p-6 w-full border border-slate-200">
                        <div class="flex items-center gap-x-4 mb-4">
                            <svg class="h-6 w-6 text-slate-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                            </svg>
                            <h3 class="text-lg font-semibold leading-6 text-slate-900">Recursos Multimedia</h3>
                        </div>
                        <p class="mt-4 text-base leading-7 text-slate-600">Videos, podcasts y presentaciones interactivas para enriquecer tu experiencia de aprendizaje.</p>
                        <div class="mt-4">
                            <a href="#" class="text-sm font-semibold leading-6 text-slate-800 hover:text-slate-900">
                                Ver contenido <span aria-hidden="true">→</span>
                            </a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Centro de Apoyo Section -->
    <section class="bg-slate-200 py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-4xl divide-y divide-gray-900/10">
                <h2 class="text-2xl font-bold leading-10 tracking-tight text-gray-900">Centro de Apoyo</h2>
                <dl class="mt-10 space-y-6 divide-y divide-gray-900/10">
                    <!-- FAQ Item 1 -->
                    <div class="pt-6">
                        <dt>
                            <button type="button" class="flex w-full items-start justify-between text-left text-gray-900">
                                <span class="text-base font-semibold leading-7">¿Cómo accedo a los materiales del curso?</span>
                                <span class="ml-6 flex h-7 items-center">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                    </svg>
                                </span>
                            </button>
                        </dt>
                        <dd class="mt-2 pr-12">
                            <p class="text-base leading-7 text-gray-600">Los materiales están disponibles en la plataforma una vez que inicies sesión. Navega a la sección "Mis Cursos" y selecciona el curso deseado.</p>
                        </dd>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="pt-6">
                        <dt>
                            <button type="button" class="flex w-full items-start justify-between text-left text-gray-900">
                                <span class="text-base font-semibold leading-7">¿Cómo puedo obtener soporte técnico?</span>
                                <span class="ml-6 flex h-7 items-center">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                    </svg>
                                </span>
                            </button>
                        </dt>
                        <dd class="mt-2 pr-12">
                            <p class="text-base leading-7 text-gray-600">Nuestro equipo de soporte está disponible 24/7. Puedes contactarnos a través del chat en vivo o enviando un correo a soporte@digitalia.edu</p>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    <!-- Herramientas Interactivas Section -->
    <section class="py-24 sm:py-32">
        <div class="relative overflow-hidden">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Herramientas Interactivas</h2>
                    <p class="mt-6 text-lg leading-8 text-gray-600">
                        Explora nuestras herramientas diseñadas para facilitar tu aprendizaje y evaluar tu progreso.
                    </p>
                </div>
                <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:mx-0 lg:mt-10 lg:max-w-none lg:grid-cols-12">
                    <div class="relative lg:order-last lg:col-span-5">
                        <figure class="border-l border-blue-600 pl-8">
                            <blockquote class="text-xl font-semibold leading-8 tracking-tight text-gray-900">
                                <p>"Las herramientas interactivas han transformado mi forma de aprender. Los simuladores y ejercicios prácticos me ayudaron a comprender mejor los conceptos."</p>
                            </blockquote>
                            <figcaption class="mt-8 flex gap-x-4">
                                <img src="https://placehold.co/96x96" alt="" class="mt-1 h-10 w-10 flex-none rounded-full bg-gray-50">
                                <div class="text-sm leading-6">
                                    <div class="font-semibold text-gray-900">María González</div>
                                    <div class="text-gray-600">Estudiante de Desarrollo Web</div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="max-w-xl text-base leading-7 text-gray-700 lg:col-span-7">
                        <ul role="list" class="mt-8 max-w-xl space-y-8 text-gray-600">
                            <li class="flex gap-x-3">
                                <svg class="mt-1 h-5 w-5 flex-none text-blue-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                                </svg>
                                <span><strong class="font-semibold text-gray-900">Simuladores.</strong> Practica en entornos virtuales seguros que replican situaciones del mundo real.</span>
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="mt-1 h-5 w-5 flex-none text-blue-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                                </svg>
                                <span><strong class="font-semibold text-gray-900">Ejercicios prácticos.</strong> Refuerza tu aprendizaje con ejercicios interactivos y casos de estudio.</span>
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="mt-1 h-5 w-5 flex-none text-blue-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                                </svg>
                                <span><strong class="font-semibold text-gray-900">Evaluaciones diagnósticas.</strong> Identifica tus áreas de mejora con evaluaciones personalizadas.</span>
                            </li>
                        </ul>
                        <div class="mt-8">
                            <a href="#" class="text-sm font-semibold leading-6 text-blue-600">
                                Explorar todas las herramientas <span aria-hidden="true">→</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>

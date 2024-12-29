<?php
/**
 * Template Name: Academia - Comunidad y Colaboración
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
                    <p class="text-yellow-600 font-semibold mb-4">Academia Digital-IA</p>
                    <h1 class="text-4xl lg:text-6xl font-bold mb-6 text-yellow-900">Ecosistema Digital Educativo</h1>
                    <p class="mb-8 max-w-xl text-yellow-900 lg:text-xl">
                        Plataforma integral de formación que combina tecnología y educación para fortalecer las competencias digitales y promover la alfabetización mediática con enfoque de paz.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#plataforma" class="inline-flex items-center justify-center px-6 py-3 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Explorar Plataforma
                        </a>
                        <a href="#recursos" class="inline-flex items-center justify-center px-6 py-3 border border-yellow-600 text-yellow-600 rounded-lg hover:bg-yellow-50 transition-colors">
                            Ver Recursos
                        </a>
                    </div>
                </div>
                <img src="https://placehold.co/800x600/ca8a04/fef9c3" alt="Academia Digital-IA" class="w-full rounded-lg shadow-xl">
            </div>
        </div>
    </section>
    <!-- Red de Aprendizaje Section -->
    <section class="py-24 sm:py-32 bg-slate-50">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">Red de Aprendizaje</h2>
                <p class="mt-2 text-lg leading-8 text-slate-600">Conecta con mentores y compañeros para enriquecer tu experiencia educativa.</p>
            </div>
            <ul role="list" class="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                <?php foreach (range(1, 3) as $i): ?>
                <li>
                    <img class="aspect-[3/2] w-full rounded-2xl object-cover" src="https://placehold.co/600x400" alt="Mentor">
                    <h3 class="mt-6 text-lg font-semibold leading-8 text-slate-900">
                        <?php echo $i === 1 ? 'Dr. Ana Martínez' : ($i === 2 ? 'Prof. Carlos Ruiz' : 'Dra. Laura Sánchez'); ?>
                    </h3>
                    <p class="text-base leading-7 text-slate-600">
                        <?php echo $i === 1 ? 'Especialista en Tecnologías Emergentes' : ($i === 2 ? 'Experto en Educación Digital' : 'Investigadora en Innovación Educativa'); ?>
                    </p>
                    <ul role="list" class="mt-6 flex gap-x-6">
                        <li>
                            <a href="#" class="text-slate-600 hover:text-slate-800">
                                <span class="sr-only">LinkedIn</span>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M16.338 16.338H13.67V12.16c0-.995-.017-2.277-1.387-2.277-1.39 0-1.601 1.086-1.601 2.207v4.248H8.014v-8.59h2.559v1.174h.037c.356-.675 1.227-1.387 2.526-1.387 2.703 0 3.203 1.778 3.203 4.092v4.711zM5.005 6.575a1.548 1.548 0 11-.003-3.096 1.548 1.548 0 01.003 3.096zm-1.337 9.763H6.34v-8.59H3.667v8.59zM17.668 1H2.328C1.595 1 1 1.581 1 2.298v15.403C1 18.418 1.595 19 2.328 19h15.34c.734 0 1.332-.582 1.332-1.299V2.298C19 1.581 18.402 1 17.668 1z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-slate-600 hover:text-slate-800">
                                <span class="sr-only">Twitter</span>
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <!-- Eventos y Actividades Section -->
    <section class="py-24 sm:py-32 bg-slate-200">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">Eventos y Actividades</h2>
                <p class="mt-2 text-lg leading-8 text-slate-600">Participa en nuestros eventos y actividades diseñados para fortalecer el aprendizaje colaborativo.</p>
            </div>
            <div class="mx-auto mt-16 grid max-w-2xl auto-rows-fr grid-cols-1 gap-8 sm:mt-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                <?php 
                $events = [
                    [
                        'date' => '2024-01-15',
                        'display_date' => 'Enero 15, 2024',
                        'type' => 'Online',
                        'title' => 'Webinar: Tecnologías Emergentes en Educación'
                    ],
                    [
                        'date' => '2024-02-01',
                        'display_date' => 'Febrero 1, 2024',
                        'type' => 'Virtual',
                        'title' => 'Taller: Herramientas Digitales para la Educación'
                    ],
                    [
                        'date' => '2024-03-15',
                        'display_date' => 'Marzo 15, 2024',
                        'type' => 'Presencial',
                        'title' => 'Encuentro Regional: Innovación Educativa'
                    ]
                ];
                
                foreach ($events as $event): ?>
                <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-slate-900 px-8 pb-8 pt-80 sm:pt-48 lg:pt-80">
                    <img src="https://placehold.co/600x400" alt="<?php echo $event['title']; ?>" class="absolute inset-0 -z-10 h-full w-full object-cover">
                    <div class="absolute inset-0 -z-10 bg-gradient-to-t from-slate-900 via-slate-900/40"></div>
                    <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-slate-900/10"></div>

                    <div class="flex flex-wrap items-center gap-y-1 overflow-hidden text-sm leading-6 text-slate-300">
                        <time datetime="<?php echo $event['date']; ?>"><?php echo $event['display_date']; ?></time>
                        <div class="-ml-4 flex items-center gap-x-4">
                            <svg viewBox="0 0 2 2" class="-ml-0.5 h-0.5 w-0.5 flex-none fill-white/50">
                                <circle cx="1" cy="1" r="1" />
                            </svg>
                            <div class="flex gap-x-2.5"><?php echo $event['type']; ?></div>
                        </div>
                    </div>
                    <h3 class="mt-3 text-lg font-semibold leading-6 text-white">
                        <a href="#">
                            <span class="absolute inset-0"></span>
                            <?php echo $event['title']; ?>
                        </a>
                    </h3>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Proyectos Colaborativos Section -->
    <section class="py-24 sm:py-32 bg-slate-50">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl sm:text-center">
                <h2 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">Proyectos Colaborativos</h2>
                <p class="mt-6 text-lg leading-8 text-slate-600">
                    Participa en proyectos que conectan estudiantes y profesionales para crear soluciones innovadoras.
                </p>
            </div>
            <div class="mt-16 sm:mt-20">
                <div class="md:grid md:grid-cols-3 md:items-center md:gap-12">
                    <div class="md:col-span-2">
                        <div class="relative">
                            <img src="https://placehold.co/800x600" alt="Project Dashboard" class="w-full rounded-xl shadow-xl ring-1 ring-slate-400/10">
                            <div class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-slate-900/10"></div>
                        </div>
                    </div>
                    <div class="mt-10 md:mt-0">
                        <div class="space-y-6">
                            <h3 class="text-lg font-medium leading-6 text-slate-900">Iniciativas en Curso</h3>
                            <?php 
                            $initiatives = [
                                'Desarrollo de Recursos Educativos Abiertos',
                                'Investigación en Tecnologías Educativas',
                                'Programas de Mentorías Cruzadas'
                            ];
                            ?>
                            <div class="space-y-4">
                                <?php foreach ($initiatives as $initiative): ?>
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <svg class="h-6 w-6 text-slate-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-base text-slate-700"><?php echo $initiative; ?></p>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="mt-8">
                                <a href="#" class="text-sm font-semibold leading-6 text-slate-900">
                                    Conoce más sobre nuestros proyectos <span aria-hidden="true">→</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>

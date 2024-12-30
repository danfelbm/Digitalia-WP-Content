<?php

/**
 * Template Name: Módulo Total Transmedia
 *
 * @package Digitalia
 */
get_header();
?> 

<main id="primary" class="site-main">
  <section class="relative overflow-hidden py-32">
    <div class="absolute inset-0 overflow-hidden bg-blue-50">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1400 656" class="min-h-full min-w-full">
        <defs>
          <filter id="blur1" x="-20%" y="-20%" width="140%" height="140%">
            <feFlood flood-opacity="0" result="BackgroundImageFix"></feFlood>
            <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"></feBlend>
            <feGaussianBlur stdDeviation="180" result="effect1_foregroundBlur"></feGaussianBlur>
          </filter>
          <pattern id="innerGrid" width="40" height="40" patternUnits="userSpaceOnUse">
            <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="0.5" stroke-opacity="0.6"></path>
          </pattern>
          <pattern id="grid" width="160" height="160" patternUnits="userSpaceOnUse">
            <rect width="160" height="160" fill="url(#innerGrid)"></rect>
            <path d="M 70 80 H 90 M 80 70 V 90" fill="none" stroke="white" stroke-width="1" stroke-opacity="0.3"></path>
          </pattern>
        </defs>
        <g filter="url(#blur1)">
          <rect width="1400" height="656" fill="#f8fafc"></rect>
          <rect x="0" y="0" width="1400" height="656" fill="rgb(37 99 235 / 0.1)"></rect>
          <g transform="translate(1400, 656)">
            <path d="M-623.2 0C-611 -116.2 -598.9 -232.4 -539.7 -311.6C-480.5 -390.8 -374.3 -433.1 -276.5 -478.9C-178.7 -524.7 -89.4 -573.9 0 -623.2L0 0Z" fill="white"></path>
          </g>
          <g transform="translate(0, 0)">
            <path d="M623.2 0C606.6 108.6 590.1 217.1 539.7 311.6C489.3 406.1 405.1 486.5 309.5 536.1C213.9 585.7 107 604.4 0 623.2L0 0Z" fill="white"></path>
          </g>
        </g>
        <rect width="1400" height="900" fill="url(#grid)"></rect>
      </svg>
    </div>
    <div class="container relative mx-auto px-4">
      <div class="grid items-center gap-8 lg:grid-cols-2">
        <div class="flex flex-col items-center text-center lg:items-start lg:text-left">
          <p class="text-blue-600 font-semibold">Estrategia de Comunicación</p>
          <h1 class="my-6 text-pretty text-4xl font-bold text-blue-900 lg:text-6xl">Total Transmedia</h1>
          <p class="mb-8 max-w-xl text-blue-800 lg:text-xl"> Desarrollo de tácticas comunicacionales que integran medios tradicionales y digitales, enfocadas en la construcción de una ciudadanía digital informada y responsable. </p>
          <div class="flex w-full flex-col justify-center gap-2 sm:flex-row lg:justify-start">
            <a href="#canales" class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
              <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
              </svg> Explorar Canales </a>
            <a href="#contenidos" class="inline-flex items-center justify-center px-6 py-3 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 transition-colors"> Ver Contenidos </a>
          </div>
        </div>
        <div class="-mb-48 flex justify-start gap-4 pt-4">
          <div class="absolute">
            <div class="flex scale-75 flex-col gap-12 pl-32 pt-8 sm:scale-100">
              <div class="flex gap-x-8 odd:pl-[calc(theme(spacing.32)+16px)]">
                <div class="flex w-64 gap-x-3 rounded-xl border border-white bg-white p-4 shadow-sm">
                  <div class="flex size-7 shrink-0 items-center justify-center rounded bg-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 size-4">
                      <path d="M21 15V6"></path>
                      <path d="M18.5 18a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"></path>
                      <path d="M12 12H3"></path>
                      <path d="M16 6H3"></path>
                      <path d="M12 18H3"></path>
                    </svg>
                  </div>
                  <div>
                    <div class="mb-0.5 text-xs font-medium text-blue-900">Medios Digitales</div>
                    <div class="text-xs font-normal text-blue-700">Estrategias para redes sociales y plataformas digitales</div>
                  </div>
                </div>
                <div class="flex w-64 gap-x-3 rounded-xl border border-white bg-white p-4 shadow-sm">
                  <div class="flex size-7 shrink-0 items-center justify-center rounded bg-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 size-4">
                      <path d="M12 20h9"></path>
                      <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                    </svg>
                  </div>
                  <div>
                    <div class="mb-0.5 text-xs font-medium text-blue-900">Contenido Editorial</div>
                    <div class="text-xs font-normal text-blue-700">Creación de contenido educativo y formativo</div>
                  </div>
                </div>
              </div>
              <div class="flex gap-x-8 odd:pl-[calc(theme(spacing.32)+16px)]">
                <div class="flex w-64 gap-x-3 rounded-xl border border-white bg-white p-4 shadow-sm">
                  <div class="flex size-7 shrink-0 items-center justify-center rounded bg-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 size-4">
                      <path d="M3 7V5c0-1.1.9-2 2-2h2"></path>
                      <path d="M17 3h2c1.1 0 2 .9 2 2v2"></path>
                      <path d="M21 17v2c0 1.1-.9 2-2 2h-2"></path>
                      <path d="M7 21H5c-1.1 0-2-.9-2-2v-2"></path>
                      <rect width="7" height="5" x="7" y="7" rx="1"></rect>
                      <rect width="7" height="5" x="10" y="12" rx="1"></rect>
                    </svg>
                  </div>
                  <div>
                    <div class="mb-0.5 text-xs font-medium text-blue-900">Transmedia</div>
                    <div class="text-xs font-normal text-blue-700">Narrativas expandidas en múltiples plataformas</div>
                  </div>
                </div>
                <div class="flex w-64 gap-x-3 rounded-xl border border-white bg-white p-4 shadow-sm">
                  <div class="flex size-7 shrink-0 items-center justify-center rounded bg-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 size-4">
                      <path d="M12 20.94c1.5 0 2.75 1.06 4 1.06 3 0 6-8 6-12.22A4.91 4.91 0 0 0 17 5c-2.22 0-4 1.44-5 2-1-.56-2.78-2-5-2a4.9 4.9 0 0 0-5 4.78C2 14 5 22 8 22c1.25 0 2.5-1.06 4-1.06Z"></path>
                      <path d="M10 2c1 .5 2 2 2 5"></path>
                    </svg>
                  </div>
                  <div>
                    <div class="mb-0.5 text-xs font-medium text-blue-900">Paz Digital</div>
                    <div class="text-xs font-normal text-blue-700">Promoción de la convivencia en entornos digitales</div>
                  </div>
                </div>
              </div>
              <div class="flex gap-x-8 odd:pl-[calc(theme(spacing.32)+16px)]">
                <div class="flex w-64 gap-x-3 rounded-xl border border-white bg-white p-4 shadow-sm">
                  <div class="flex size-7 shrink-0 items-center justify-center rounded bg-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 size-4">
                      <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"></path>
                    </svg>
                  </div>
                  <div>
                    <div class="mb-0.5 text-xs font-medium text-blue-900">Alfabetización</div>
                    <div class="text-xs font-normal text-blue-700">Desarrollo de competencias mediáticas</div>
                  </div>
                </div>
                <div class="flex w-64 gap-x-3 rounded-xl border border-white bg-white p-4 shadow-sm">
                  <div class="flex size-7 shrink-0 items-center justify-center rounded bg-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 size-4">
                      <circle cx="18" cy="18" r="3"></circle>
                      <circle cx="6" cy="6" r="3"></circle>
                      <path d="M13 6h3a2 2 0 0 1 2 2v7"></path>
                      <path d="M11 18H8a2 2 0 0 1-2-2V9"></path>
                    </svg>
                  </div>
                  <div>
                    <div class="mb-0.5 text-xs font-medium text-blue-900">Interacción</div>
                    <div class="text-xs font-normal text-blue-700">Participación activa de la comunidad</div>
                  </div>
                </div>
              </div>
              <div class="flex gap-x-8 odd:pl-[calc(theme(spacing.32)+16px)]">
                <div class="flex w-64 gap-x-3 rounded-xl border border-white bg-white p-4 shadow-sm">
                  <div class="flex size-7 shrink-0 items-center justify-center rounded bg-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 size-4">
                      <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 1 7.92 12.446a1 1 0 0 1 -.813.493h-1.5a1 1 0 0 1 -1 -1v-4a1 1 0 0 0 -1 -1h-3a1 1 0 0 0 -1 1v4a1 1 0 0 1 -1 1h-1.5a1 1 0 0 1 -.813 -.493a7.5 7.5 0 0 1 7.92 -12.446a12.36 12.36 0 0 1 .393 0z"></path>
                      <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                      <path d="M12 9m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                      <path d="M12 15m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                    </svg>
                  </div>
                  <div>
                    <div class="mb-0.5 text-xs font-medium text-blue-900">Comunidad Digital</div>
                    <div class="text-xs font-normal text-blue-700">Construcción de espacios digitales colaborativos</div>
                  </div>
                </div>
                <div class="flex w-64 gap-x-3 rounded-xl border border-white bg-white p-4 shadow-sm">
                  <div class="flex size-7 shrink-0 items-center justify-center rounded bg-blue-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600 size-4">
                      <path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"></path>
                    </svg>
                  </div>
                  <div>
                    <div class="mb-0.5 text-xs font-medium text-blue-900">Innovación Digital</div>
                    <div class="text-xs font-normal text-blue-700">Exploración de nuevas tecnologías y formatos</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="relative flex aspect-[3/6] w-[240px] justify-center rounded-lg border border-border bg-background sm:w-[300px]"></div>
        </div>
      </div>
    </div>
  </section>
  <section id="estrategia" class="py-32 bg-blue-200 text-blue-900" style="margin-top: -70px;">
    <div class="container">
      <div class="grid place-content-center gap-10 lg:grid-cols-2">
        <div class="mx-auto flex max-w-screen-md flex-col items-center justify-center gap-4 lg:items-start">
          <div class="rounded-full border font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 text-foreground flex items-center gap-1 px-2.5 py-1.5 text-sm border-blue-200 bg-blue-300">
            <i class="fa-solid fa-star h-auto w-4"></i> Aspectos Clave
          </div>
          <h2 class="text-center text-3xl font-semibold lg:text-left lg:text-4xl">Estrategia Transmedia Integral</h2>
          <p class="text-center lg:text-left lg:text-lg">Desarrollamos un universo comunicacional inmersivo que consolida audiencias y experiencias, creando contenidos de impacto y gestionando estrategias de difusión para el programa Digital-IA a nivel local, regional y nacional.</p>
          <button class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-blue-600 text-primary-foreground hover:bg-blue-500 h-11 rounded-md px-8">Contáctanos</button>
          <div class="mt-9 flex w-full flex-col justify-center gap-6 md:flex-row lg:justify-start">
            <div class="flex justify-between gap-6">
              <div class="mx-auto">
                <p class="mb-1.5 text-3xl font-bold">100+</p>
                <p>Contenidos</p>
              </div>
              <div data-orientation="vertical" role="none" class="shrink-0 bg-border bg-blue-400 w-[1px] h-auto"></div>
              <div class="mx-auto">
                <p class="mb-1.5 text-3xl font-bold">32+</p>
                <p>Departamentos</p>
              </div>
            </div>
            <div data-orientation="vertical" role="none" class="shrink-0 bg-border bg-border bg-blue-400 w-[1px] hidden h-auto md:block"></div>
            <div data-orientation="horizontal" role="none" class="shrink-0 bg-border bg-border bg-blue-400 h-[1px] w-full block md:hidden"></div>
            <div class="flex justify-between gap-6">
              <div class="mx-auto">
                <p class="mb-1.5 text-3xl font-bold">5+</p>
                <p>Plataformas</p>
              </div>
              <div data-orientation="vertical" role="none" class="shrink-0 bg-border bg-border bg-blue-400 w-[1px] h-auto"></div>
              <div class="mx-auto">
                <p class="mb-1.5 text-3xl font-bold">3</p>
                <p>Niveles</p>
              </div>
            </div>
          </div>
        </div>
        <img src="/wp-content/uploads/2024/12/1-1-06-100.jpg" alt="Total Transmedia" class="ml-auto max-h-[450px] w-full rounded-xl object-cover">
      </div>
      <div class="mt-10 grid gap-6 md:grid-cols-3">
        <div class="flex flex-col gap-4">
          <div class="gap flex flex-col gap-3 rounded-lg border p-6 bg-blue-100 text-blue-900 border border-blue-600">
            <div class="flex flex-col items-center gap-2 lg:flex-row">
              <i class="fa-solid fa-bullhorn h-auto w-6"></i>
              <h3 class="text-center text-lg font-medium lg:text-left">Estrategia de Difusión</h3>
            </div>
            <p class="text-center text-sm md:text-base lg:text-left">Diseñamos y ejecutamos estrategias de comunicación efectivas para maximizar el alcance y el impacto del programa Digital-IA.</p>
          </div>
        </div>
        <div class="flex flex-col gap-4">
          <div class="gap flex flex-col gap-3 rounded-lg border p-6 bg-blue-100 text-blue-900 border border-blue-600">
            <div class="flex flex-col items-center gap-2 lg:flex-row">
              <i class="fa-solid fa-chart-line h-auto w-6"></i>
              <h3 class="text-center text-lg font-medium lg:text-left">Monitoreo y Análisis</h3>
            </div>
            <p class="text-center text-sm md:text-base lg:text-left">Realizamos seguimiento continuo y análisis de resultados para optimizar la penetración y visibilización del programa.</p>
          </div>
        </div>
        <div class="flex flex-col gap-4">
          <div class="gap flex flex-col gap-3 rounded-lg border p-6 bg-blue-100 text-blue-900 border border-blue-600">
            <div class="flex flex-col items-center gap-2 lg:flex-row">
              <i class="fa-solid fa-users h-auto w-6"></i>
              <h3 class="text-center text-lg font-medium lg:text-left">Equipo Especializado</h3>
            </div>
            <p class="text-center text-sm md:text-base lg:text-left">Contamos con profesionales expertos en comunicación y marketing digital para gestionar y supervisar la ejecución del programa.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="py-32 bg-blue-300" id="canales">
    <div class="container mx-auto px-4">
      <h2 class="mb-4 text-2xl font-semibold lg:text-4xl text-blue-900">Canales de Difusión</h2>
      <p class="text-blue-900 lg:text-lg">Identificación y utilización estratégica de múltiples canales de comunicación, incluyendo redes sociales, medios tradicionales y plataformas digitales emergentes.</p>
      <div class="mt-8 grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3">
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
          <img src="https://placehold.co/100x100/1f3a8a/bfdbfe" alt="Redes Sociales" class="w-14 h-14 object-cover rounded-lg">
          <h3 class="mb-1 mt-4 text-lg font-medium text-blue-900">Redes Sociales</h3>
          <p class="text-sm text-blue-900">Estrategias específicas para Facebook, Twitter, Instagram y LinkedIn, aprovechando las características únicas de cada plataforma.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
          <img src="https://placehold.co/100x100/1f3a8a/bfdbfe" alt="Medios Tradicionales" class="w-14 h-14 object-cover rounded-lg">
          <h3 class="mb-1 mt-4 text-lg font-medium text-blue-900">Medios Tradicionales</h3>
          <p class="text-sm text-blue-900">Integración con radio, televisión y prensa escrita para alcanzar audiencias diversas y mantener presencia multiplataforma.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
          <img src="https://placehold.co/100x100/1f3a8a/bfdbfe" alt="Plataformas Digitales" class="w-14 h-14 object-cover rounded-lg">
          <h3 class="mb-1 mt-4 text-lg font-medium text-blue-900">Plataformas Digitales</h3>
          <p class="text-sm text-blue-900">Utilización de sitios web, blogs y plataformas de contenido digital para distribuir información detallada y recursos.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
          <img src="https://placehold.co/100x100/1f3a8a/bfdbfe" alt="Email Marketing" class="w-14 h-14 object-cover rounded-lg">
          <h3 class="mb-1 mt-4 text-lg font-medium text-blue-900">Email Marketing</h3>
          <p class="text-sm text-blue-900">Campañas de correo electrónico segmentadas para mantener informados a diferentes grupos de interés sobre avances y actividades.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
          <img src="https://placehold.co/100x100/1f3a8a/bfdbfe" alt="Apps Móviles" class="w-14 h-14 object-cover rounded-lg">
          <h3 class="mb-1 mt-4 text-lg font-medium text-blue-900">Apps Móviles</h3>
          <p class="text-sm text-blue-900">Desarrollo de aplicaciones móviles para facilitar el acceso a información y servicios de manera inmediata y personalizada.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
          <img src="https://placehold.co/100x100/1f3a8a/bfdbfe" alt="Eventos Virtuales" class="w-14 h-14 object-cover rounded-lg">
          <h3 class="mb-1 mt-4 text-lg font-medium text-blue-900">Eventos Virtuales</h3>
          <p class="text-sm text-blue-900">Organización de webinars, conferencias en línea y eventos híbridos para fomentar la participación e interacción directa.</p>
        </div>
      </div>
    </div>
  </section>
  <section id="equipo" class="py-32 bg-blue-100 text-blue-900">
    <div class="container flex flex-col items-center text-center">
      <p class="semibold">Equipo Profesional</p>
      <h2 class="my-6 text-pretty text-2xl font-bold lg:text-4xl">Nuestro Equipo Transmedia</h2>
      <p class="mb-8 max-w-3xl lg:text-xl">Contamos con un equipo multidisciplinario de expertos en comunicación, marketing digital y producción de contenidos, dedicados a crear experiencias transmedia impactantes para el programa Digital-IA.</p>
      <div class="flex w-full flex-col justify-center gap-2 sm:flex-row">
        <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 w-full sm:w-auto">Únete al Equipo</button>
        <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-blue-600 text-primary-foreground hover:bg-blue-500 h-10 px-4 py-2 w-full sm:w-auto">Contáctanos</button>
      </div>
    </div>
    <div class="container mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4"> <?php
                $users = get_users();

                foreach ($users as $user) {
                  $equipo = get_field('equipo', 'user_' . $user->ID);
                  if ($equipo === 'total-transmedia') {
                    $name = $user->display_name;
                    $avatar = get_avatar_url($user->ID, array('size' => 200));
                    $frase = get_field('frase', 'user_' . $user->ID);
                    $rol = get_field('rol', 'user_' . $user->ID);
                    ?> <div class="flex flex-col items-center bg-blue-300 p-8 text-blue-900 border border-blue-600">
        <span class="relative flex shrink-0 overflow-hidden rounded-full mb-4 size-20 md:mb-5 lg:size-24">
          <img class="aspect-square h-full w-full" src="
													<?php echo esc_url($avatar); ?>" alt="
													<?php echo esc_attr($name); ?>">
        </span>
        <div class="text-center">
          <h3 class="mb-1 font-semibold">
            <a href="
															<?php echo esc_url(get_author_posts_url($user->ID)); ?>" class="hover:text-blue-600 hover:underline transition-colors"> <?php echo esc_html($name); ?> </a>
          </h3> <?php if ($rol): ?> <p class="text-sm"> <?php echo esc_html($rol); ?> </p> <?php endif; ?> <?php if ($frase): ?> <p class="mt-4 text-sm"> <?php echo esc_html($frase); ?> </p> <?php endif; ?>
        </div> <?php if (have_rows('red_social', 'user_' . $user->ID)): ?> <div class="mt-6 flex gap-4"> <?php
                            while (have_rows('red_social', 'user_' . $user->ID)):
                              the_row();
                              $social_network = get_sub_field('red_social_item');
                              $profile_url = get_sub_field('link_al_perfil');

                              if ($social_network && $profile_url):
                                $icon_class = '';
                                switch ($social_network) {
                                  case 'facebook':
                                    $icon_class = 'fa-facebook';
                                    break;
                                  case 'twitter':
                                    $icon_class = 'fa-twitter';
                                    break;
                                  case 'linkedin':
                                    $icon_class = 'fa-linkedin';
                                    break;
                                  case 'instagram':
                                    $icon_class = 'fa-instagram';
                                    break;
                                  case 'youtube':
                                    $icon_class = 'fa-youtube';
                                    break;
                                  case 'tiktok':
                                    $icon_class = 'fa-tiktok';
                                    break;
                                }
                                ?> <a href="
														<?php echo esc_url($profile_url); ?>" target="_blank" rel="noopener noreferrer" class="hover:text-blue-600">
            <i class="fa-brands 
															<?php echo esc_attr($icon_class); ?>">
            </i>
          </a> <?php endif;
                            endwhile; ?> </div> <?php endif; ?>
      </div> <?php
                  }
                }

                if (empty($users)) {
                  echo '
											<div class="col-span-full text-center text-muted-foreground">No se encontraron miembros del equipo.</div>';
                }
                ?> </div>
  </section>
  <section class="py-32 bg-blue-200" id="contenidos">
    <div class="container flex flex-col gap-16 lg:px-16">
      <div class="lg:max-w-sm">
        <h2 class="mb-3 text-xl font-semibold text-blue-900 md:mb-4 md:text-4xl lg:mb-6"> Contenidos Transmedia </h2>
        <p class="mb-8 text-blue-900 lg:text-lg"> Desarrollamos contenidos educomunicacionales transmedia que integran narrativas expandidas, interactividad y estrategias de engagement para fortalecer la alfabetización mediática y el uso ético de la inteligencia artificial. </p>
      </div>
      <div class="grid gap-6 md:grid-cols-2 lg:gap-8">
        <div class="flex flex-col overflow-clip rounded-xl border border-slate-200 bg-slate-200 md:col-span-2 md:grid md:grid-cols-2 md:gap-6 lg:gap-8">
          <div class="md:min-h-[24rem] lg:min-h-[28rem] xl:min-h-[32rem]">
            <img src="https://placehold.co/800x600/1f3a8a/bfdbfe" alt="Estrategias Transmedia" class="aspect-[16/9] h-full w-full object-cover object-center">
          </div>
          <div class="flex flex-col justify-center px-6 py-8 md:px-8 md:py-10 lg:px-10 lg:py-12">
            <h3 class="mb-3 text-lg font-semibold text-blue-900 md:mb-4 md:text-2xl lg:mb-6"> Narrativas Expandidas </h3>
            <p class="text-blue-900 lg:text-lg"> Creamos experiencias omnicanal que integran storytelling, gamificación y marketing de contenidos. Nuestras narrativas interactivas fomentan el user-generated content y aprovechan micromomentos para maximizar el engagement con diferentes audiencias. </p>
          </div>
        </div>
        <div class="flex flex-col-reverse overflow-clip rounded-xl border border-slate-200 bg-slate-200 md:col-span-2 md:grid md:grid-cols-2 md:gap-6 lg:gap-8">
          <div class="flex flex-col justify-center px-6 py-8 md:px-8 md:py-10 lg:px-10 lg:py-12">
            <h3 class="mb-3 text-lg font-semibold text-blue-900 md:mb-4 md:text-2xl lg:mb-6"> Alfabetización Digital </h3>
            <p class="text-blue-900 lg:text-lg"> Desarrollamos contenidos especializados para superar discursos de odio, identificar desinformación y fortalecer el periodismo ciudadano. Integramos tecnologías de IA para la detección de fake news y la promoción de una paz mediática. </p>
          </div>
          <div class="md:min-h-[24rem] lg:min-h-[28rem] xl:min-h-[32rem]">
            <img src="https://placehold.co/800x600/1f3a8a/bfdbfe" alt="Alfabetización Digital" class="aspect-[16/9] h-full w-full object-cover object-center">
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="portafolio" class="flex flex-col gap-16 lg:px-16 lg:pt-32 pt-16 text-blue-950 bg-blue-300">
    <div class="container mb-14 flex flex-col gap-16 lg:mb-16 lg:px-16">
      <div class="lg:max-w-lg">
        <h2 class="mb-3 text-xl font-semibold md:mb-4 md:text-4xl lg:mb-6">Portafolio y componentes clave</h2>
        <p class="mb-8 lg:text-lg">Explora los elementos fundamentales de nuestro programa de educomunicación, las estrategias, las herramientas de alfabetización mediática con énfasis en inteligencia artificial y enfoque de paz.</p>
        <a href="#" class="group flex items-center text-xs font-medium md:text-base lg:text-lg"> Conoce más <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 size-4 transition-transform group-hover:translate-x-1">
            <path d="M5 12h14"></path>
            <path d="m12 5 7 7-7 7"></path>
          </svg>
        </a>
      </div>
      <div class="hidden items-center justify-center space-x-4 space-y-4 text-center md:flex md:flex-wrap">
        <div role="radiogroup" dir="ltr" class="flex items-center justify-center flex-wrap gap-4">
          <button type="button" role="radio" aria-checked="true" data-state="on" data-radix-collection-item class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 data-[state=on]:bg-accent data-[state=on]:text-accent-foreground border border-input bg-transparent hover:bg-accent hover:text-accent-foreground h-11 px-5">Alfabetización Mediática</button>
          <button type="button" role="radio" aria-checked="false" data-state="off" data-radix-collection-item class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 data-[state=on]:bg-accent data-[state=on]:text-accent-foreground border border-input bg-transparent hover:bg-accent hover:text-accent-foreground h-11 px-5">Tecnologías Emergentes</button>
          <button type="button" role="radio" aria-checked="false" data-state="off" data-radix-collection-item class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 data-[state=on]:bg-accent data-[state=on]:text-accent-foreground border border-input bg-transparent hover:bg-accent hover:text-accent-foreground h-11 px-5">Enfoque de Paz</button>
          <button type="button" role="radio" aria-checked="false" data-state="off" data-radix-collection-item class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 data-[state=on]:bg-accent data-[state=on]:text-accent-foreground border border-input bg-transparent hover:bg-accent hover:text-accent-foreground h-11 px-5">Desarrollo Sostenible</button>
          <button type="button" role="radio" aria-checked="false" data-state="off" data-radix-collection-item class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 data-[state=on]:bg-accent data-[state=on]:text-accent-foreground border border-input bg-transparent hover:bg-accent hover:text-accent-foreground h-11 px-5">Capacidades TIC</button>
        </div>
      </div>
    </div>
  </section>
  <section class="pb-32 pt-16 bg-blue-300">
    <div class="w-full">
      <div class="relative" role="region" aria-roledescription="carousel">
        <div class="overflow-x-hidden">
          <div class="flex touch-pan-x ml-[calc(theme(container.padding)-40px)] mr-[calc(theme(container.padding))] lg:ml-[calc(200px-40px)] lg:mr-[200px] 2xl:ml-[calc(50vw-700px+200px-40px)] 2xl:mr-[calc(50vw-700px+200px)]" style="transform: translate3d(0px, 0px, 0px);">
            <div role="tabpanel" class="min-w-0 shrink-0 grow-0 basis-full pl-[40px]" data-orientation="horizontal" id="alfabetizacion" tabindex="0" data-active="true">
              <a href="#" class="group rounded-xl">
                <div class="bg-blue-200 text-blue-900 flex flex-col text-clip rounded-xl border border-border md:col-span-2 md:grid md:grid-cols-2 md:gap-6 lg:gap-8">
                  <div class="md:min-h-96 lg:min-h-[28rem] xl:min-h-[32rem]">
                    <img src="/wp-content/uploads/2024/12/1-1-02-100.jpg" alt="Alfabetización Mediática" class="aspect-[16/9] size-full object-cover object-center">
                  </div>
                  <div class="flex flex-col justify-center px-6 py-8 md:px-8 md:py-10 lg:px-10 lg:py-12">
                    <h3 class="mb-3 text-lg font-semibold md:mb-4 md:text-2xl lg:mb-6">Alfabetización Mediática</h3>
                    <p class="lg:text-lg">Programa integral de educación y alfabetización mediática que prepara a la ciudadanía ante los desafíos de la comunicación masiva, la desinformación y el uso ético de tecnologías emergentes.</p>
                  </div>
                </div>
              </a>
            </div>
            <div role="tabpanel" class="min-w-0 shrink-0 grow-0 basis-full pl-[40px]" data-orientation="horizontal" id="tecnologias" tabindex="0">
              <a href="#" class="group rounded-xl">
                <div class="bg-blue-200 text-blue-900 flex flex-col text-clip rounded-xl border border-border md:col-span-2 md:grid md:grid-cols-2 md:gap-6 lg:gap-8">
                  <div class="md:min-h-96 lg:min-h-[28rem] xl:min-h-[32rem]">
                    <img src="/wp-content/uploads/2024/12/4.png" alt="Tecnologías Emergentes" class="aspect-[16/9] size-full object-cover object-center">
                  </div>
                  <div class="flex flex-col justify-center px-6 py-8 md:px-8 md:py-10 lg:px-10 lg:py-12">
                    <h3 class="mb-3 text-lg font-semibold md:mb-4 md:text-2xl lg:mb-6">Tecnologías Emergentes</h3>
                    <p class="lg:text-lg">Abordamos los desafíos de la cuarta y quinta revolución industrial en su expresión mediática, incluyendo IA, análisis de datos masivos y tecnologías de comunicación avanzadas.</p>
                  </div>
                </div>
              </a>
            </div>
            <div role="tabpanel" class="min-w-0 shrink-0 grow-0 basis-full pl-[40px]" data-orientation="horizontal" id="paz" tabindex="0">
              <a href="#" class="group rounded-xl">
                <div class="bg-blue-200 text-blue-900 flex flex-col text-clip rounded-xl border border-border md:col-span-2 md:grid md:grid-cols-2 md:gap-6 lg:gap-8">
                  <div class="md:min-h-96 lg:min-h-[28rem] xl:min-h-[32rem]">
                    <img src="/wp-content/uploads/2024/12/3.png" alt="Enfoque de Paz" class="aspect-[16/9] size-full object-cover object-center">
                  </div>
                  <div class="flex flex-col justify-center px-6 py-8 md:px-8 md:py-10 lg:px-10 lg:py-12">
                    <h3 class="mb-3 text-lg font-semibold md:mb-4 md:text-2xl lg:mb-6">Enfoque de Paz</h3>
                    <p class="lg:text-lg">Desarrollamos capacidades comunicacionales enfocadas en la paz, fortaleciendo la resiliencia y promoviendo el uso ético de tecnologías para la expresión ciudadana.</p>
                  </div>
                </div>
              </a>
            </div>
            <div role="tabpanel" class="min-w-0 shrink-0 grow-0 basis-full pl-[40px]" data-orientation="horizontal" id="desarrollo" tabindex="0">
              <a href="#" class="group rounded-xl">
                <div class="bg-blue-200 text-blue-900 flex flex-col text-clip rounded-xl border border-border md:col-span-2 md:grid md:grid-cols-2 md:gap-6 lg:gap-8">
                  <div class="md:min-h-96 lg:min-h-[28rem] xl:min-h-[32rem]">
                    <img src="/wp-content/uploads/2024/12/2.png" alt="Desarrollo Sostenible" class="aspect-[16/9] size-full object-cover object-center">
                  </div>
                  <div class="flex flex-col justify-center px-6 py-8 md:px-8 md:py-10 lg:px-10 lg:py-12">
                    <h3 class="mb-3 text-lg font-semibold md:mb-4 md:text-2xl lg:mb-6">Desarrollo Sostenible</h3>
                    <p class="lg:text-lg">Alineamos nuestras acciones con los Objetivos de Desarrollo Sostenible de la ONU y el Plan Nacional de Desarrollo Colombia Potencia Mundial de la Vida.</p>
                  </div>
                </div>
              </a>
            </div>
            <div role="tabpanel" class="min-w-0 shrink-0 grow-0 basis-full pl-[40px]" data-orientation="horizontal" id="capacidades" tabindex="0">
              <a href="#" class="group rounded-xl">
                <div class="bg-blue-200 text-blue-900 flex flex-col text-clip rounded-xl border border-border md:col-span-2 md:grid md:grid-cols-2 md:gap-6 lg:gap-8">
                  <div class="md:min-h-96 lg:min-h-[28rem] xl:min-h-[32rem]">
                    <img src="/wp-content/uploads/2024/12/1.png" alt="Capacidades TIC" class="aspect-[16/9] size-full object-cover object-center">
                  </div>
                  <div class="flex flex-col justify-center px-6 py-8 md:px-8 md:py-10 lg:px-10 lg:py-12">
                    <h3 class="mb-3 text-lg font-semibold md:mb-4 md:text-2xl lg:mb-6">Capacidades TIC</h3>
                    <p class="lg:text-lg">Elevamos las habilidades tecnológicas y capacidades comunicacionales de la población colombiana, con especial atención a poblaciones diferenciadas.</p>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="bg-blue-50">
    <div class="container mx-auto flex flex-col items-center">
      <div class="w-full overflow-clip rounded-lg bg-blue-50/50 2xl:w-[calc(min(100vw-2*theme(container.padding),100%+8rem))]">
        <div class="grid items-center gap-8 lg:grid-cols-2">
          <div class="container flex flex-col items-center px-[4rem] py-16 text-center lg:mx-auto lg:items-start lg:px-[4rem] lg:py-32 lg:text-left">
            <p class="text-blue-600 font-semibold">Total Transmedia</p>
            <h1 class="my-6 text-pretty text-4xl font-bold text-blue-900 lg:text-6xl"> Espacios de Participación </h1>
            <p class="mb-8 max-w-xl text-blue-800 lg:text-xl"> Creamos plataformas y espacios físicos y virtuales para impulsar la interacción ciudadana, facilitando el diálogo y la construcción colectiva de conocimiento en el entorno digital. </p>
            <div class="flex w-full flex-col justify-center gap-2 sm:flex-row lg:justify-start">
              <a href="#plataformas" class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                <svg class="mr-2 size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 0118 0 9 9 0 0118 0z"></path>
                </svg> Explorar Plataformas </a>
              <a href="#participar" class="inline-flex items-center justify-center px-6 py-3 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 transition-colors"> Participar Ahora </a>
            </div>
          </div>
          <div class="flex flex-col items-center justify-center p-8">
            <div class="relative aspect-[7/8] h-full w-full">
              <div class="absolute right-[50%] top-[12%] flex aspect-square w-[24%] justify-center rounded-lg border border-blue-200 bg-blue-100 shadow-sm overflow-hidden">
                <img src="https://placehold.co/400x400/1f3a8a/bfdbfe?text=Participación+1" alt="Participación 1" class="object-cover w-full h-full" onerror="this.src='https://placehold.co/400x400/1f3a8a/bfdbfe?text=Participación+1'">
              </div>
              <div class="absolute right-[50%] top-[36%] flex aspect-[5/6] w-[40%] justify-center rounded-lg border border-blue-200 bg-blue-100 shadow-sm overflow-hidden">
                <img src="https://placehold.co/400x480/1f3a8a/bfdbfe?text=Participación+2" alt="Participación 2" class="object-cover w-full h-full" onerror="this.src='https://placehold.co/400x480/1f3a8a/bfdbfe?text=Participación+2'">
              </div>
              <div class="absolute bottom-[36%] left-[54%] flex aspect-[5/6] w-[40%] justify-center rounded-lg border border-blue-200 bg-blue-100 shadow-sm overflow-hidden">
                <img src="https://placehold.co/400x480/1f3a8a/bfdbfe?text=Participación+3" alt="Participación 3" class="object-cover w-full h-full" onerror="this.src='https://placehold.co/400x480/1f3a8a/bfdbfe?text=Participación+3'">
              </div>
              <div class="absolute bottom-[12%] left-[54%] flex aspect-square w-[24%] justify-center rounded-lg border border-blue-200 bg-blue-100 shadow-sm overflow-hidden">
                <img src="https://placehold.co/400x400/1f3a8a/bfdbfe?text=Participación+4" alt="Participación 4" class="object-cover w-full h-full" onerror="this.src='https://placehold.co/400x400/1f3a8a/bfdbfe?text=Participación+4'">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="py-32 bg-blue-200">
    <div class="container mx-auto px-4">
      <div class="grid items-center gap-8 lg:grid-cols-2 lg:gap-16">
        <img src="https://placehold.co/800x600/1f3a8a/bfdbfe?text=Formación+Ciudadana" alt="Formación Ciudadana Digital" class="max-h-96 w-full rounded-md object-cover shadow-lg" onerror="this.src='https://placehold.co/800x600/1f3a8a/bfdbfe?text=Formación+Ciudadana'">
        <div class="flex flex-col lg:text-left">
          <span class="flex size-12 items-center justify-center rounded-full bg-blue-600 text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M18 6H5c-1.1 0-2 .9-2 2v3.3c0 .7.3 1.3.8 1.8L8 17l.1.1c.5.4.8 1 .8 1.7V21c0 .6.4 1 1 1h4c.6 0 1-.4 1-1v-2.2c0-.7.3-1.3.8-1.7L20 13c.5-.4.8-1.1.8-1.8V8c0-1.1-.9-2-2-2zm-8 10v-3h4v3h-4z"></path>
            </svg>
          </span>
          <h2 class="my-6 text-pretty text-3xl font-bold text-blue-900 lg:text-4xl"> Formación Ciudadana Digital </h2>
          <p class="mb-8 max-w-xl text-blue-900 lg:max-w-none lg:text-lg"> Desarrollamos programas de capacitación y talleres especializados para fortalecer las competencias digitales y habilidades de comunicación ética en el entorno mediático actual. </p>
          <ul class="ml-4 space-y-4 text-left">
            <li class="flex items-center gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="size-6 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
              </svg>
              <p class="text-blue-900 lg:text-lg"> Talleres de alfabetización mediática e informacional con enfoque de paz </p>
            </li>
            <li class="flex items-center gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="size-6 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
              </svg>
              <p class="text-blue-900 lg:text-lg"> Capacitación en uso ético y responsable de tecnologías emergentes </p>
            </li>
            <li class="flex items-center gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="size-6 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
              </svg>
              <p class="text-blue-900 lg:text-lg"> Desarrollo de habilidades para la creación de contenido digital responsable </p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <section class="py-32 bg-blue-300">
    <div class="container mx-auto px-4">
      <div class="flex flex-col gap-6">
        <!-- Historia Principal -->
        <div class="grid grid-cols-1 items-stretch gap-x-0 gap-y-4 lg:grid-cols-3 lg:gap-4">
          <img src="https://placehold.co/800x600/1f3a8a/bfdbfe?text=Historia+Principal" alt="Historia de Impacto Principal" class="h-72 w-full rounded-md object-cover lg:h-auto shadow-lg" onerror="this.src='https://placehold.co/800x600/1f3a8a/bfdbfe?text=Historia+Principal'">
          <div class="col-span-2 flex items-center justify-center p-8 bg-white rounded-lg shadow-lg">
            <div class="flex flex-col gap-4">
              <q class="text-xl font-medium text-blue-900 lg:text-3xl"> A través del programa Total Transmedia, nuestra comunidad ha desarrollado habilidades digitales que nos permiten compartir nuestras historias y construir un diálogo más constructivo en el entorno digital. </q>
              <div class="flex flex-col items-start">
                <p class="text-blue-900 font-semibold">María González</p>
                <p class="text-blue-600">Líder Comunitaria, Medellín</p>
              </div>
            </div>
          </div>
        </div>
        <!-- Historias Secundarias -->
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
          <!-- Historia 1 -->
          <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="px-6 pt-6 leading-7 text-blue-900">
              <q> Los talleres de alfabetización mediática me ayudaron a entender mejor cómo verificar información y crear contenido responsable para mi comunidad. </q>
            </div>
            <div class="px-6 pt-6">
              <div class="flex gap-4 leading-5">
                <div class="size-9 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold"> JR </div>
                <div class="text-sm">
                  <p class="font-medium text-blue-900">Juan Ramírez</p>
                  <p class="text-blue-600">Estudiante, Bogotá</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Historia 2 -->
          <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="px-6 pt-6 leading-7 text-blue-900">
              <q> Gracias al programa, hemos creado una red de comunicadores comunitarios que promueven la paz y el diálogo en nuestro territorio. </q>
            </div>
            <div class="px-6 pt-6">
              <div class="flex gap-4 leading-5">
                <div class="size-9 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold"> CP </div>
                <div class="text-sm">
                  <p class="font-medium text-blue-900">Carolina Patiño</p>
                  <p class="text-blue-600">Comunicadora Social, Cali</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Historia 3 -->
          <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="px-6 pt-6 leading-7 text-blue-900">
              <q> El impacto del programa en nuestra comunidad ha sido transformador. Ahora tenemos las herramientas para contar nuestras propias historias digitalmente. </q>
            </div>
            <div class="px-6 pt-6">
              <div class="flex gap-4 leading-5">
                <div class="size-9 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold"> AL </div>
                <div class="text-sm">
                  <p class="font-medium text-blue-900">Ana López</p>
                  <p class="text-blue-600">Gestora Cultural, Barranquilla</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="py-16 md:py-24 bg-blue-50">
    <div class="container mx-auto px-4">
      <div class="grid items-center gap-8 lg:grid-cols-2">
        <div class="flex flex-col items-center px-4 text-center lg:items-start lg:text-left">
          <p class="text-blue-600 font-semibold mb-4">Total Transmedia</p>
          <h1 class="text-4xl lg:text-6xl font-bold mb-6 text-blue-900">Impacto Regional</h1>
          <p class="mb-8 max-w-xl text-blue-900 lg:text-xl"> Expandiendo la alfabetización mediática e informacional a través de Colombia, creando conexiones significativas y transformando comunidades mediante el poder de la comunicación digital. </p>
          <div class="flex flex-col sm:flex-row gap-4">
            <a href="#cobertura" class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
              <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
              </svg> Explorar Territorios </a>
            <a href="#alianzas" class="inline-flex items-center justify-center px-6 py-3 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 transition-colors"> Alianzas Regionales </a>
          </div>
        </div>
        <div class="relative">
          <img src="https://placehold.co/800x600/1f3a8a/bfdbfe?text=Impacto+Regional" alt="Mapa de Impacto Regional Total Transmedia" class="w-full rounded-lg shadow-xl" onerror="this.src='https://placehold.co/800x600/1f3a8a/bfdbfe?text=Impacto+Regional'">
        </div>
      </div>
    </div>
  </section>
  <section id="alianzas" class="py-32 bg-blue-200">
    <div class="container mx-auto px-4">
      <div class="grid overflow-hidden rounded-xl border border-blue-400 md:grid-cols-2">
        <div class="my-auto px-6 py-10 sm:px-10 sm:py-12 lg:p-16">
          <div class="w-full md:max-w-md">
            <h2 class="mb-4 text-2xl font-semibold text-blue-900 lg:text-3xl">Alianzas Regionales</h2>
            <p class="mb-6 text-lg text-blue-800">Fortalecemos el impacto territorial a través de colaboraciones estratégicas con actores locales, instituciones educativas y organizaciones comunitarias en toda Colombia.</p>
            <a href="#contacto" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-600 focus-visible:ring-offset-2 bg-blue-600 text-white hover:bg-blue-700 h-10 px-4 py-2 w-full md:w-fit">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2 size-5">
                <path d="M5 12h14"></path>
                <path d="m12 5 7 7-7 7"></path>
              </svg> Únete a la Red </a>
          </div>
        </div>
        <div class="grid grid-cols-3 border-t border-blue-400 md:border-l md:border-t-0">
          <div class="-mb-px flex items-center justify-center border-b border-r border-blue-400 p-5 sm:p-6 [&amp;:nth-child(3n)]:border-r-0">
            <img src="https://placehold.co/800x600/1f3a8a/bfdbfe?text=Canal13" alt="Canal 13" class="size-12 object-cover object-center sm:size-16 lg:size-24">
          </div>
          <div class="-mb-px flex items-center justify-center border-b border-r border-blue-400 p-5 sm:p-6 [&amp;:nth-child(3n)]:border-r-0">
            <img src="https://placehold.co/800x600/1f3a8a/bfdbfe?text=MinTIC" alt="MinTIC" class="size-12 object-cover object-center sm:size-16 lg:size-24">
          </div>
          <div class="-mb-px flex items-center justify-center border-b border-r border-blue-400 p-5 sm:p-6 [&amp;:nth-child(3n)]:border-r-0">
            <img src="https://placehold.co/800x600/1f3a8a/bfdbfe?text=ONU" alt="Naciones Unidas" class="size-12 object-cover object-center sm:size-16 lg:size-24">
          </div>
          <div class="-mb-px flex items-center justify-center border-b border-r border-blue-400 p-5 sm:p-6 [&amp;:nth-child(3n)]:border-r-0">
            <img src="https://placehold.co/800x600/1f3a8a/bfdbfe?text=CasaBosque" alt="Casa del Bosque" class="size-12 object-cover object-center sm:size-16 lg:size-24">
          </div>
          <div class="-mb-px flex items-center justify-center border-b border-r border-blue-400 p-5 sm:p-6 [&amp;:nth-child(3n)]:border-r-0">
            <img src="https://placehold.co/800x600/1f3a8a/bfdbfe?text=RTVC" alt="RTVC" class="size-12 object-cover object-center sm:size-16 lg:size-24">
          </div>
          <div class="-mb-px flex items-center justify-center border-b border-r border-blue-400 p-5 sm:p-6 [&amp;:nth-child(3n)]:border-r-0">
            <img src="https://placehold.co/800x600/1f3a8a/bfdbfe?text=SENA" alt="SENA" class="size-12 object-cover object-center sm:size-16 lg:size-24">
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="adaptacion" class="py-32 bg-blue-300">
    <div class="container mx-auto px-4">
      <h2 class="text-center text-4xl font-semibold text-blue-900 lg:text-6xl mb-4"> Adaptación Local </h2>
      <p class="text-center text-blue-800 text-xl mb-12 max-w-3xl mx-auto"> Estrategias de contextualización y adaptación del programa a las realidades culturales y sociales de cada región. </p>
      <div class="grid gap-6 pt-9 text-center md:grid-cols-3 lg:pt-20">
        <div class="bg-white p-8 lg:p-10 rounded-xl shadow-sm">
          <p class="mb-1 flex items-center justify-center text-2xl font-semibold text-blue-900 lg:text-3xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-8 text-blue-600" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="m5 12 7-7 7 7"></path>
              <path d="M12 19V5"></path>
            </svg> 32
          </p>
          <p class="text-blue-700"> Departamentos alcanzados con programas adaptados localmente </p>
        </div>
        <div class="bg-white p-8 lg:p-10 rounded-xl shadow-sm">
          <p class="mb-1 flex items-center justify-center text-2xl font-semibold text-blue-900 lg:text-3xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-8 text-blue-600" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="m5 12 7-7 7 7"></path>
              <path d="M12 19V5"></path>
            </svg> 15+
          </p>
          <p class="text-blue-700"> Lenguas indígenas incluidas en nuestros contenidos digitales </p>
        </div>
        <div class="bg-white p-8 lg:p-10 rounded-xl shadow-sm">
          <p class="mb-1 flex items-center justify-center text-2xl font-semibold text-blue-900 lg:text-3xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-8 text-blue-600" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="m5 12 7-7 7 7"></path>
              <path d="M12 19V5"></path>
            </svg> 85%
          </p>
          <p class="text-blue-700"> Contenido adaptado a contextos rurales y urbanos </p>
        </div>
        <div class="bg-white p-8 lg:p-10 rounded-xl shadow-sm">
          <p class="mb-1 flex items-center justify-center text-2xl font-semibold text-blue-900 lg:text-3xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-8 text-blue-600" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="m5 12 7-7 7 7"></path>
              <path d="M12 19V5"></path>
            </svg> 200+
          </p>
          <p class="text-blue-700"> Talleres de contextualización realizados </p>
        </div>
        <div class="bg-white p-8 lg:p-10 rounded-xl shadow-sm">
          <p class="mb-1 flex items-center justify-center text-2xl font-semibold text-blue-900 lg:text-3xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-8 text-blue-600" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="m5 12 7-7 7 7"></path>
              <path d="M12 19V5"></path>
            </svg> 100%
          </p>
          <p class="text-blue-700"> Cobertura en zonas de posconflicto </p>
        </div>
        <div class="bg-white p-8 lg:p-10 rounded-xl shadow-sm">
          <p class="mb-1 flex items-center justify-center text-2xl font-semibold text-blue-900 lg:text-3xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-8 text-blue-600" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="m5 12 7-7 7 7"></path>
              <path d="M12 19V5"></path>
            </svg> 24/7
          </p>
          <p class="text-blue-700"> Disponibilidad de recursos educativos adaptados </p>
        </div>
      </div>
    </div>
  </section>
</main> 

<?php
get_footer();
<?php
/**
 * Template Name: Colaboratorios - Impacto
 * Description: Página de impacto y resultados de Colaboratorios
 */

get_header();
?>

<section id="hero" class="flex flex-col gap-16 lg:px-16 pt-16 text-teal-950 bg-teal-50">
    <div class="container mb-14 flex flex-col gap-16 lg:mb-16 lg:px-16">
        <div class="lg:max-w-lg">
            <h2 class="mb-3 text-xl font-semibold md:mb-4 md:text-4xl lg:mb-6">Métricas de Impacto</h2>
            <p class="mb-8 lg:text-lg">El dashboard interactivo de los Colaboratorios proporciona una visualización dinámica del impacto del programa a través de diferentes indicadores cuantitativos y cualitativos.</p>
            <a href="#metricas" class="group flex items-center text-xs font-medium md:text-base lg:text-lg">
                Explorar métricas
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 size-4 transition-transform group-hover:translate-x-1">
                    <path d="M5 12h14"></path>
                    <path d="m12 5 7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

<section class="py-32">
    <div class="container">
        <h2 class="text-center text-4xl text-teal-950">Impacto y Alcance de los Colaboratorios</h2>
        <p class="mx-auto mt-3 max-w-3xl text-center text-2xl text-teal-600">Descubre cómo los Colaboratorios están transformando comunidades a través de la innovación, el aprendizaje y la colaboración.</p>
        
        <div class="rounded-lg border bg-card text-card-foreground shadow-sm mt-20 flex flex-col gap-6 p-6 md:flex-row md:gap-8 md:p-8">
            <div class="flex w-full flex-col justify-between">
                <h6 class="text-xl md:text-3xl text-teal-950">Métricas de Impacto</h6>
                <p class="mt-4 text-teal-700">Dashboard interactivo que visualiza indicadores cuantitativos y cualitativos, incluyendo beneficiarios por demografía, proyectos por categoría y horas de formación en múltiples modalidades.</p>
                <div class="inline-flex items-center rounded-full border text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 text-teal-950 mt-4 w-fit bg-teal-50 px-4 py-3 md:text-base">
                    Análisis de Impacto
                </div>
            </div>
            <div class="w-full">
                <img src="https://placehold.co/800x600" alt="Dashboard de métricas" class="max-h-80 w-full rounded-lg object-cover">
            </div>
        </div>

        <div class="mt-6 flex flex-col gap-6 md:mt-8 md:flex-row md:gap-8">
            <div class="rounded-lg border bg-card text-card-foreground shadow-sm flex w-full flex-col gap-6 p-6 md:gap-8 md:p-8">
                <div class="w-full">
                    <img src="https://placehold.co/800x600" alt="Proyectos destacados" class="max-h-80 w-full rounded-lg object-cover">
                </div>
                <div class="flex w-full flex-col justify-between">
                    <h6 class="text-xl md:text-3xl text-teal-950">Proyectos Destacados</h6>
                    <p class="mt-4 text-teal-700">Galería de iniciativas exitosas que documentan objetivos, desarrollo y resultados alcanzados, con evaluación de impacto comunitario y testimonios de beneficiarios.</p>
                    <div class="inline-flex items-center rounded-full border text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 text-teal-950 mt-10 w-fit bg-teal-50 px-4 py-3 md:text-base">
                        Casos de Éxito
                    </div>
                </div>
            </div>

            <div class="rounded-lg border bg-card text-card-foreground shadow-sm flex w-full flex-col gap-6 p-6 md:gap-8 md:p-8">
                <div class="w-full">
                    <img src="https://placehold.co/800x600" alt="Alianzas y colaboraciones" class="max-h-80 w-full rounded-lg object-cover">
                </div>
                <div class="flex w-full flex-col justify-between">
                    <h6 class="text-xl md:text-3xl text-teal-950">Alianzas y Colaboraciones</h6>
                    <p class="mt-4 text-teal-700">Red de colaboración que integra instituciones educativas, organizaciones sociales, entidades gubernamentales y sector privado para potenciar el impacto del programa.</p>
                    <div class="inline-flex items-center rounded-full border text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 text-teal-950 mt-10 w-fit bg-teal-50 px-4 py-3 md:text-base">
                        Ecosistema de Aliados
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="relative bg-teal-50 bg-[linear-gradient(#99f6e4_0%,#f0fdfa_100%)] py-32 sm:py-0">
    <div class="container sm:py-32">
        <div class="flex flex-col items-start gap-12 sm:flex-row sm:items-center sm:justify-between sm:gap-32">
            <div class="flex flex-1 flex-col items-start text-left">
                <h2 class="my-6 text-pretty text-2xl font-bold text-teal-950 lg:text-4xl">Historias de Transformación</h2>
                <p class="mb-8 max-w-3xl text-teal-700 lg:text-xl">La documentación audiovisual de los procesos de cambio generados por los Colaboratorios constituye un valioso archivo de memoria y aprendizaje, capturando las voces y experiencias de participantes.</p>
            </div>
        </div>
    </div>
    <div class="container mt-16 sm:mt-0">
        <div class="w-full columns-1 gap-4 sm:columns-2 lg:columns-3 lg:gap-6">
            <div class="mb-4 inline-block w-full rounded-lg border border-teal-200 bg-white p-6 lg:mb-6">
                <div class="flex flex-col">
                    <p class="mb-4 text-sm text-teal-800">"Los Colaboratorios me dieron la oportunidad de desarrollar mis habilidades digitales y conectar con otros creadores. Ahora puedo expresar mis ideas de formas que nunca imaginé posibles."</p>
                    <div class="flex items-center gap-1 md:gap-2">
                        <span class="relative flex shrink-0 overflow-hidden rounded-full size-8 md:size-10">
                            <img class="aspect-square h-full w-full" src="https://placehold.co/100x100" alt="Participante 1">
                        </span>
                        <div class="text-left">
                            <p class="text-xs font-medium text-teal-950">María González</p>
                            <p class="text-xs text-teal-600">Artista Digital</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4 inline-block w-full rounded-lg border border-teal-200 bg-white p-6 lg:mb-6">
                <div class="flex flex-col">
                    <p class="mb-4 text-sm text-teal-800">"A través de los talleres, aprendí a utilizar herramientas digitales para contar las historias de mi comunidad. El impacto ha sido transformador para todos nosotros."</p>
                    <div class="flex items-center gap-1 md:gap-2">
                        <span class="relative flex shrink-0 overflow-hidden rounded-full size-8 md:size-10">
                            <img class="aspect-square h-full w-full" src="https://placehold.co/100x100" alt="Participante 2">
                        </span>
                        <div class="text-left">
                            <p class="text-xs font-medium text-teal-950">Carlos Ramírez</p>
                            <p class="text-xs text-teal-600">Líder Comunitario</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4 inline-block w-full rounded-lg border border-teal-200 bg-white p-6 lg:mb-6">
                <div class="flex flex-col">
                    <p class="mb-4 text-sm text-teal-800">"Los documentales que creamos en los Colaboratorios han ayudado a visibilizar las necesidades y logros de nuestra comunidad. Es increíble ver el impacto de nuestras historias."</p>
                    <div class="flex items-center gap-1 md:gap-2">
                        <span class="relative flex shrink-0 overflow-hidden rounded-full size-8 md:size-10">
                            <img class="aspect-square h-full w-full" src="https://placehold.co/100x100" alt="Participante 3">
                        </span>
                        <div class="text-left">
                            <p class="text-xs font-medium text-teal-950">Ana Martínez</p>
                            <p class="text-xs text-teal-600">Documentalista</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4 inline-block w-full rounded-lg border border-teal-200 bg-white p-6 lg:mb-6">
                <div class="flex flex-col">
                    <p class="mb-4 text-sm text-teal-800">"La formación en narrativas transmedia nos ha permitido explorar nuevas formas de contar historias y conectar con diferentes audiencias."</p>
                    <div class="flex items-center gap-1 md:gap-2">
                        <span class="relative flex shrink-0 overflow-hidden rounded-full size-8 md:size-10">
                            <img class="aspect-square h-full w-full" src="https://placehold.co/100x100" alt="Participante 4">
                        </span>
                        <div class="text-left">
                            <p class="text-xs font-medium text-teal-950">Laura Pérez</p>
                            <p class="text-xs text-teal-600">Productora Digital</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4 inline-block w-full rounded-lg border border-teal-200 bg-white p-6 lg:mb-6">
                <div class="flex flex-col">
                    <p class="mb-4 text-sm text-teal-800">"El programa nos ha dado las herramientas para documentar nuestra cultura y tradiciones de manera innovadora, preservando nuestra memoria colectiva."</p>
                    <div class="flex items-center gap-1 md:gap-2">
                        <span class="relative flex shrink-0 overflow-hidden rounded-full size-8 md:size-10">
                            <img class="aspect-square h-full w-full" src="https://placehold.co/100x100" alt="Participante 5">
                        </span>
                        <div class="text-left">
                            <p class="text-xs font-medium text-teal-950">Pedro Sánchez</p>
                            <p class="text-xs text-teal-600">Gestor Cultural</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4 inline-block w-full rounded-lg border border-teal-200 bg-white p-6 lg:mb-6">
                <div class="flex flex-col">
                    <p class="mb-4 text-sm text-teal-800">"Las galerías fotográficas que hemos creado son un testimonio visual del crecimiento y la transformación de nuestra comunidad a través del tiempo."</p>
                    <div class="flex items-center gap-1 md:gap-2">
                        <span class="relative flex shrink-0 overflow-hidden rounded-full size-8 md:size-10">
                            <img class="aspect-square h-full w-full" src="https://placehold.co/100x100" alt="Participante 6">
                        </span>
                        <div class="text-left">
                            <p class="text-xs font-medium text-teal-950">Isabel Torres</p>
                            <p class="text-xs text-teal-600">Fotógrafa Comunitaria</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pointer-events-none absolute bottom-0 left-0 hidden w-full sm:block sm:h-[16.875rem] sm:bg-[linear-gradient(transparent_0%,#f0fdfa_100%)] lg:h-56"></div>
</section>

<?php
get_footer();

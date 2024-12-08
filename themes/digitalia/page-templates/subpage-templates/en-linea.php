<?php
/**
 * Template Name: Módulo En Línea
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    get_template_part('template-parts/subpage-header', null, array(
        'title' => 'En Línea',
        'subtitle' => 'Serie web que explora historias de transformación digital y paz mediática en Colombia',
        'show_cta' => true,
        'cta_text' => 'Ver episodios',
        'cta_url' => '/video'
    ));
    ?>
    
    <?php
    get_template_part('template-parts/floating-nav', null, array(
        'nav_items' => array(
            array('anchor' => 'la-historia', 'text' => 'La Historia'),
            array('anchor' => 'ver-episodios', 'text' => 'Ver Episodios'),
            array('anchor' => 'personajes', 'text' => 'Personajes'),
            array('anchor' => 'blog', 'text' => 'Blog'),
        )
    ));
    ?>

    <section class="pb-32 pt-12">
        <div class="container">
            <div class="grid items-center gap-10 md:gap-20 lg:grid-cols-2">
                <div class="flex flex-col gap-2.5 py-8">
                    <h1 class="text-4xl font-bold lg:text-5xl">Serie Web y Alfabetización Mediática</h1>
                    <p class="text-muted-foreground">Explorando historias de innovación y cambio social a través del Gobierno del Cambio, las tecnologías y la paz mediática en Colombia.</p>
                    <div class="flex flex-col gap-6 py-10 sm:flex-row sm:gap-16">
                        <div class="flex gap-4 leading-5">
                            <span class="relative flex shrink-0 overflow-hidden size-9 rounded-full ring-1 ring-input">
                                <img class="aspect-square h-full w-full" alt="avatar" src="https://www.shadcnblocks.com/images/block/avatar-1.webp">
                            </span>
                            <div class="text-sm">
                                <p class="font-medium">María González</p>
                                <p class="text-muted-foreground">Directora de Proyecto</p>
                            </div>
                        </div>
                        <div class="flex gap-4 leading-5">
                            <span class="relative flex shrink-0 overflow-hidden size-9 rounded-full ring-1 ring-input">
                                <img class="aspect-square h-full w-full" alt="avatar" src="https://www.shadcnblocks.com/images/block/avatar-2.webp">
                            </span>
                            <div class="text-sm">
                                <p class="font-medium">Carlos Ramírez</p>
                                <p class="text-muted-foreground">Director Creativo</p>
                            </div>
                        </div>
                    </div>
                    <a href="#ver-episodios" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 w-fit">
                        Ver Episodios
                    </a>
                </div>
                <img src="https://www.shadcnblocks.com/images/block/placeholder-1.svg" alt="Digital-IA Hero" class="h-full max-h-[420px] w-full rounded-xl object-cover">
            </div>
            <div data-orientation="horizontal" role="none" class="shrink-0 bg-border h-[1px] w-full my-12"></div>
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                <div>
                    <h2 class="mb-2 text-4xl font-semibold md:text-6xl">32+</h2>
                    <p class="text-muted-foreground">Departamentos alcanzados</p>
                </div>
                <div>
                    <h2 class="mb-2 text-4xl font-semibold md:text-6xl">1000+</h2>
                    <p class="text-muted-foreground">Historias documentadas</p>
                </div>
                <div>
                    <h2 class="mb-2 text-4xl font-semibold md:text-6xl">12</h2>
                    <p class="text-muted-foreground">Episodios producidos</p>
                </div>
                <div>
                    <h2 class="mb-2 text-4xl font-semibold md:text-6xl">>50k</h2>
                    <p class="text-muted-foreground">Espectadores alcanzados</p>
                </div>
            </div>
        </div>
    </section>

    <section id="la-historia" class="py-32">
        <div class="border-t">
            <div>
                <div class="container relative overflow-hidden border-x border-muted-foreground/20 py-32 text-red-950">
                    <div style="
                        position: absolute;
                        width: 100%;
                        height: 100%;
                        background: radial-gradient(#ff575885, #9198e500);
                        z-index: -1;
                        top: 0;
                        left: 0;
                    "></div>
                    <div class="isolate mx-auto flex max-w-screen-md flex-col gap-20">
                        <div class="bg absolute -left-px -top-1 -z-10 size-full bg-[linear-gradient(to_right,hsl(var(--muted-foreground))_1px,transparent_1px),linear-gradient(to_bottom,hsl(var(--muted-foreground))_1px,transparent_1px)] bg-[size:64px_64px] opacity-20 [clip-path:inset(0px_0px_50%_0px)] [mask-image:radial-gradient(ellipse_100%_120%_at_50%_50%,transparent_20%,#000_100%)]"></div>
                        <h2 class="text-center text-3xl md:text-5xl">Módulo Serie Web “En Línea”</h2>
                        <img src="https://www.shadcnblocks.com/images/block/placeholder-aspect-video-1.svg" alt="placeholder" class="max-h-64 w-full rounded-xl object-cover">
                        <p class="text-center text-xl md:text-3xl">Serie web por capítulos, cada uno entre 10 a 15 minutos de duración en su primera temporada, la cual se difundirá a dos capítulos por semana.</p>
                    </div>
                </div>
                <div class="border-t border-muted-foreground/20">
                    <div class="container border-x border-muted-foreground/20 px-0">
                        <div class="grid gap-px bg-muted-foreground/20 md:grid-cols-2 lg:grid-cols-3">
                            <div class="flex gap-4 bg-muted px-6 py-8 md:flex-col md:gap-0 md:px-8 md:pt-16">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-zoom-in size-7 shrink-0 md:size-8">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" x2="16.65" y1="21" y2="16.65"></line>
                                    <line x1="11" x2="11" y1="8" y2="14"></line>
                                    <line x1="8" x2="14" y1="11" y2="11"></line>
                                </svg>
                                <div>
                                    <h3 class="mb-2 md:mt-6 md:text-lg">Alfabetización</h3>
                                    <p class="text-muted-foreground">Mediática e informacional (análisis de coyuntura).</p>
                                </div>
                            </div>
                            <div class="flex gap-4 bg-muted px-6 py-8 md:flex-col md:gap-0 md:px-8 md:pt-16">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chart-bar size-7 shrink-0 md:size-8">
                                    <path d="M3 3v16a2 2 0 0 0 2 2h16"></path>
                                    <path d="M7 16h8"></path>
                                    <path d="M7 11h12"></path>
                                    <path d="M7 6h3"></path>
                                </svg>
                                <div>
                                    <h3 class="mb-2 md:mt-6 md:text-lg">Acciones</h3>
                                    <p class="text-muted-foreground">Afirmativas para la paz en sectores públicos, privados y asociativos.</p>
                                </div>
                            </div>
                            <div class="flex gap-4 bg-muted px-6 py-8 md:flex-col md:gap-0 md:px-8 md:pt-16">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-help size-7 shrink-0 md:size-8">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                                    <path d="M12 17h.01"></path>
                                </svg>
                                <div>
                                    <h3 class="mb-2 md:mt-6 md:text-lg">Equipos</h3>
                                    <p class="text-muted-foreground">Conformado por dos equipos de producción.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="border-x border-t border-muted-foreground/20">
                        <div class="container border-x border-muted-foreground/20 py-16"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();

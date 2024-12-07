<?php
/**
 * Template Name: Módulo Academia
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    get_template_part('template-parts/subpage-header', null, array(
        'title' => 'Academia',
        'subtitle' => 'Plataforma de autoformación con contenidos audiovisuales educativos disponible 24/7',
        'show_cta' => true,
        'cta_text' => 'Explorar cursos',
        'cta_url' => '/plataforma/courses'
    ));
    ?>

    <section class="overflow-hidden py-32">
        <div class="container relative">
            <div class="pointer-events-none absolute inset-0 -top-20 -z-10 mx-auto hidden size-[500px] bg-[radial-gradient(hsl(var(--muted-foreground))_1px,transparent_1px)] opacity-25 [background-size:6px_6px] [mask-image:radial-gradient(circle_at_center,white_250px,transparent_250px)] lg:block"></div>
            <div class="relative flex justify-between gap-16">
                <div class="pointer-events-none absolute inset-0 hidden bg-gradient-to-t from-background via-transparent to-transparent lg:block"></div>
                <div class="w-full max-w-96 shrink-0 justify-between">
                    <p class="font-mono text-xs text-muted-foreground">¿Por qué Academia Digital-IA?</p>
                    <h2 class="mb-3 mt-6 text-3xl font-medium lg:text-4xl">Formación para la era digital</h2>
                    <p class="text-sm text-muted-foreground">Academia Digital-IA es un ecosistema de soluciones tecnológicas diseñado para ofrecer servicios educativos e informativos que te preparan para los desafíos de las tecnologías emergentes.</p>
                </div>
                <div class="hidden w-full max-w-3xl shrink-0 lg:block">
                    <img src="https://www.shadcnblocks.com/images/block/placeholder-1.svg" alt="Academia Digital-IA" class="max-h-[450px] w-full min-w-[450px] max-w-3xl rounded-lg border object-cover">
                </div>
            </div>
            <div class="relative mt-8 grid md:grid-cols-3">
                <div class="flex flex-col gap-y-6 px-2 py-10 md:p-6 lg:p-8">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-timer">
                        <line x1="10" x2="14" y1="2" y2="2"></line>
                        <line x1="12" x2="15" y1="14" y2="11"></line>
                        <circle cx="12" cy="14" r="8"></circle>
                    </svg>
                    <div>
                        <h3 class="text-lg font-medium">Acceso 24/7</h3>
                        <p class="mt-1 text-sm text-muted-foreground">Accede a contenidos educativos de alta calidad en cualquier momento y lugar, adaptándose a tu ritmo de aprendizaje y disponibilidad.</p>
                    </div>
                </div>
                <div class="flex flex-col gap-y-6 px-2 py-10 md:p-6 lg:p-8">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-graduation-cap">
                        <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                        <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                    </svg>
                    <div>
                        <h3 class="text-lg font-medium">Desarrollo de talento digital</h3>
                        <p class="mt-1 text-sm text-muted-foreground">Mejora tu empleabilidad y productividad laboral a través de programas formativos diseñados para las demandas del mercado actual.</p>
                    </div>
                </div>
                <div class="flex flex-col gap-y-6 px-2 py-10 md:p-6 lg:p-8">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-key-round">
                        <path d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z"></path>
                        <circle cx="16.5" cy="7.5" r=".5" fill="currentColor"></circle>
                    </svg>
                    <div>
                        <h3 class="text-lg font-medium">Alfabetización mediática</h3>
                        <p class="mt-1 text-sm text-muted-foreground">Desarrolla habilidades críticas para navegar el mundo digital, identificar desinformación y utilizar las tecnologías emergentes de manera ética.</p>
                    </div>
                </div>
                <div class="absolute -inset-x-4 top-0 h-px bg-input md:hidden"></div>
                <div class="absolute -inset-x-4 top-[-0.5px] row-start-2 h-px bg-input md:hidden"></div>
                <div class="absolute -inset-x-4 top-[-0.5px] row-start-3 h-px bg-input md:hidden"></div>
                <div class="absolute -inset-x-4 bottom-0 row-start-4 h-px bg-input md:hidden"></div>
                <div class="absolute -left-2 -top-2 bottom-0 w-px bg-input md:hidden"></div>
                <div class="absolute -right-2 -top-2 bottom-0 col-start-2 w-px bg-input md:hidden"></div>
                <div class="absolute -inset-x-2 top-0 hidden h-px bg-input md:block"></div>
                <div class="absolute -top-2 bottom-0 left-0 hidden w-px bg-input md:block"></div>
                <div class="absolute -left-[0.5px] -top-2 bottom-0 col-start-2 hidden w-px bg-input md:block"></div>
                <div class="absolute -left-[0.5px] -top-2 bottom-0 col-start-3 hidden w-px bg-input md:block"></div>
                <div class="absolute -top-2 bottom-0 right-0 hidden w-px bg-input md:block"></div>
            </div>
        </div>
    </section>

    <section class="bg-yellow-200 text-yellow-950 py-32">
        <div class="container">
            <div class="mx-auto flex max-w-screen-md flex-col justify-center gap-7 md:text-center">
                <h2 class="text-2xl md:text-4xl">Regístrate en 3 Simples Pasos</h2>
                <p class="text-sm md:text-base">Accede a nuestra plataforma educativa de manera rápida y sencilla para comenzar tu viaje de aprendizaje en alfabetización mediática e informacional.</p>
            </div>
            <div class="mx-auto mt-14 flex max-w-screen-lg flex-col gap-4 lg:px-16">
                <div class="flex flex-col items-center justify-between min-[960px]:flex-row min-[960px]:gap-10">
                    <div class="flex gap-4 min-[960px]:max-w-md">
                        <div class="flex flex-col items-center justify-between gap-1">
                            <span class="h-20 shrink-0"></span>
                            <span class="flex size-10 shrink-0 items-center justify-center rounded-full border bg-yellow-100 font-mono text-lg text-yellow-700">1</span>
                            <span class="h-20 w-[3px] shrink-0 bg-gradient-to-b from-transparent to-yellow-500 opacity-70"></span>
                        </div>
                        <div class="flex flex-col justify-center gap-5 px-0 min-[960px]:gap-6 min-[960px]:p-4">
                            <h3 class="text-xl min-[960px]:text-2xl">Crea tu Cuenta</h3>
                            <p class="text-sm min-[960px]:text-base">Completa un sencillo formulario con tus datos básicos para crear tu perfil en la plataforma Academia Digital-IA.</p>
                        </div>
                    </div>
                    <img src="/wp-content/uploads/2024/12/hero-sections.webp" alt="Crear cuenta" class="z-10 aspect-video w-full rounded-xl border object-cover min-[960px]:max-h-56 min-[960px]:w-auto">
                </div>
                <div class="flex flex-col items-center justify-between min-[960px]:flex-row min-[960px]:gap-10">
                    <div class="flex gap-4 min-[960px]:max-w-md">
                        <div class="relative flex flex-col items-center justify-between gap-1">
                            <span class="absolute -top-8 mx-auto h-8 w-[3px] shrink-0 bg-yellow-500 opacity-70"></span>
                            <span class="absolute -bottom-8 mx-auto h-8 w-[3px] shrink-0 bg-yellow-500 opacity-70"></span>
                            <span class="h-20 w-[3px] shrink-0 bg-yellow-500 opacity-70"></span>
                            <span class="flex size-10 shrink-0 items-center justify-center rounded-full border bg-yellow-100 font-mono text-lg text-yellow-700">2</span>
                            <span class="h-20 w-[3px] shrink-0 bg-yellow-500 opacity-70"></span>
                        </div>
                        <div class="flex flex-col justify-center gap-5 px-0 min-[960px]:gap-6 min-[960px]:p-4">
                            <h3 class="text-xl min-[960px]:text-2xl">Explora el Catálogo</h3>
                            <p class="text-sm min-[960px]:text-base">Descubre nuestra amplia biblioteca de contenidos educativos y selecciona los cursos que más te interesen.</p>
                        </div>
                    </div>
                    <img src="/wp-content/uploads/2024/12/icon-sections.webp" alt="Explorar catálogo" class="z-10 max-h-56 w-full rounded-xl border object-cover min-[960px]:aspect-video min-[960px]:w-auto">
                </div>
                <div class="flex flex-col items-center justify-between min-[960px]:flex-row min-[960px]:gap-10">
                    <div class="flex gap-4 min-[960px]:max-w-md">
                        <div class="flex flex-col items-center justify-between gap-1">
                            <span class="h-20 w-[3px] shrink-0 bg-gradient-to-t from-transparent to-yellow-500 opacity-70"></span>
                            <span class="flex size-10 shrink-0 items-center justify-center rounded-full border bg-yellow-100 font-mono text-lg text-yellow-700">3</span>
                            <span class="h-20 shrink-0"></span>
                        </div>
                        <div class="flex flex-col justify-center gap-5 px-0 min-[960px]:gap-6 min-[960px]:p-4">
                            <h3 class="text-xl min-[960px]:text-2xl">Comienza a Aprender</h3>
                            <p class="text-sm min-[960px]:text-base">Accede inmediatamente a los cursos seleccionados y comienza tu formación en alfabetización mediática e informacional.</p>
                        </div>
                    </div>
                    <img src="/wp-content/uploads/2024/12/features-navs.webp" alt="Comenzar aprendizaje" class="z-10 max-h-56 w-full rounded-xl border object-cover min-[960px]:aspect-video min-[960px]:w-auto">
                </div>
            </div>
        </div>
    </section>

    <section class="py-32">
        <div class="container flex flex-col items-center gap-16 lg:px-16">
            <div class="text-center">
                <p class="mb-6 text-xs font-medium uppercase tracking-wider">Formación Digital</p>
                <h2 class="mb-3 text-pretty text-3xl font-semibold md:mb-4 md:text-4xl lg:mb-6 lg:max-w-3xl lg:text-5xl">Cursos de Alfabetización Mediática e Informacional</h2>
                <p class="mb-8 text-muted-foreground md:text-base lg:max-w-2xl lg:text-lg">Explora nuestro catálogo de cursos diseñados para desarrollar habilidades críticas en el uso de tecnologías emergentes y la navegación del mundo digital.</p>
                <a href="/plataforma/courses" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 text-primary underline-offset-4 hover:underline h-10 px-4 py-2 w-full sm:w-auto">
                    Ver todos los cursos
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 size-4">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                    </svg>
                </a>
            </div>
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 lg:gap-8">
                <?php
                $args = array(
                    'post_type' => 'curso',
                    'posts_per_page' => 3,
                );
                $query = new WP_Query($args);
                
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                        $tags = get_the_tags();
                ?>
                    <a href="<?php the_permalink(); ?>" class="flex flex-col text-clip rounded-xl border border-border">
                        <div>
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('full', array('class' => 'aspect-[16/9] size-full object-cover object-center')); ?>
                            <?php else : ?>
                                <img src="https://www.shadcnblocks.com/images/block/placeholder-dark-1.svg" alt="<?php the_title(); ?>" class="aspect-[16/9] size-full object-cover object-center">
                            <?php endif; ?>
                        </div>
                        <div class="px-6 py-8 md:px-8 md:py-10 lg:px-10 lg:py-12">
                            <?php if ($tags) : ?>
                                <div class="mb-4 flex flex-wrap gap-2">
                                    <?php foreach ($tags as $tag) : ?>
                                        <span class="inline-flex items-center rounded-full bg-gray-900 px-2.5 py-0.5 text-xs font-medium text-white">
                                            <?php echo $tag->name; ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <h3 class="mb-3 text-lg font-semibold md:mb-4 md:text-xl lg:mb-6"><?php the_title(); ?></h3>
                            <p class="mb-3 text-muted-foreground md:mb-4 lg:mb-6"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            <p class="flex items-center hover:underline">
                                Leer más
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 size-4">
                                    <path d="M5 12h14"></path>
                                    <path d="m12 5 7 7-7 7"></path>
                                </svg>
                            </p>
                        </div>
                    </a>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>

    <section class="py-32">
        <div class="container">
            <?php if (have_rows('platform_features')) : ?>
                <!-- Mobile Accordion -->
                <div class="flex flex-col gap-px overflow-hidden rounded-xl border bg-border lg:hidden" data-orientation="vertical">
                    <?php 
                    $counter = 1;
                    while (have_rows('platform_features')) : the_row(); 
                        $tab_title = get_sub_field('tab_title');
                        $tab_description = get_sub_field('tab_description');
                        $tab_icon = get_sub_field('tab_icon');
                    ?>
                        <div data-state="closed" data-orientation="vertical" class="border-b-0 bg-muted px-7 py-4 data-[state=open]:bg-background">
                            <h3 data-orientation="vertical" data-state="closed" class="flex">
                                <button type="button" aria-controls="panel-<?php echo $counter; ?>" aria-expanded="false" data-state="closed" data-orientation="vertical" id="tab-<?php echo $counter; ?>" class="flex flex-1 justify-between py-4 font-medium transition-all [&[data-state=open]>svg]:rotate-180 group relative items-start text-left hover:no-underline data-[state=active]:bg-background">
                                    <span class="absolute -left-7 -top-4 bottom-0 h-full w-[3px] bg-primary transition-opacity duration-300 group-data-[state=closed]:opacity-0"></span>
                                    <div class="flex flex-col gap-2.5">
                                        <div class="flex items-center gap-1.5">
                                            <?php echo $tab_icon; ?>
                                            <span class="text-sm font-medium"><?php echo esc_html($tab_title); ?></span>
                                        </div>
                                        <p class="text-sm text-muted-foreground"><?php echo esc_html($tab_description); ?></p>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down h-4 w-4 shrink-0 transition-transform duration-200">
                                        <path d="m6 9 6 6 6-6"></path>
                                    </svg>
                                </button>
                            </h3>
                            <div data-state="closed" id="panel-<?php echo $counter; ?>" hidden="" role="region" aria-labelledby="tab-<?php echo $counter; ?>" data-orientation="vertical" class="overflow-hidden text-sm transition-all data-[state=closed]:animate-accordion-up data-[state=open]:animate-accordion-down">
                                <div class="px-4 py-4">
                                    <p class="text-muted-foreground"><?php echo esc_html(get_sub_field('tabpanel_desc')); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php 
                        $counter++;
                    endwhile; 
                    ?>
                </div>

                <!-- Desktop Tabs -->
                <div dir="ltr" data-orientation="horizontal" class="hidden grid-cols-3 gap-px overflow-hidden rounded-xl border bg-border lg:grid">
                    <div role="tablist" aria-orientation="horizontal" class="flex flex-col gap-px bg-yellow-400" tabindex="0" data-orientation="horizontal" style="outline:none">
                        <?php 
                        $counter = 1;
                        while (have_rows('platform_features')) : the_row(); 
                            $tab_title = get_sub_field('tab_title');
                            $tab_description = get_sub_field('tab_description');
                            $tab_icon = get_sub_field('tab_icon');
                            $is_active = $counter === 1 ? 'true' : 'false';
                            $state = $counter === 1 ? 'active' : 'inactive';
                        ?>
                            <button type="button" role="tab" aria-selected="<?php echo $is_active; ?>" aria-controls="radix-:r2R2:-content-<?php echo $counter; ?>" data-state="<?php echo $state; ?>" id="radix-:r2R2:-trigger-<?php echo $counter; ?>" class="group relative flex flex-col gap-2.5 bg-yellow-100 text-yellow-950 px-6 py-9 transition-colors duration-300 data-[state=active]:bg-yellow-200 xl:py-10" tabindex="<?php echo $counter === 1 ? '0' : '-1'; ?>" data-orientation="horizontal" data-radix-collection-item="">
                                <span class="absolute inset-y-0 left-0 h-full w-[3px] bg-primary transition-opacity duration-300 group-data-[state=inactive]:opacity-0"></span>
                                <div class="flex w-full items-center justify-between">
                                    <div class="flex items-center gap-1.5">
                                        <?php echo $tab_icon; ?>
                                        <span class="font-medium"><?php echo esc_html($tab_title); ?></span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right h-auto w-4">
                                        <path d="m9 18 6-6-6-6"></path>
                                    </svg>
                                </div>
                                <p class="text-left"><?php echo esc_html($tab_description); ?></p>
                            </button>
                        <?php 
                            $counter++;
                        endwhile; 
                        ?>
                    </div>

                    <?php 
                    $counter = 1;
                    while (have_rows('platform_features')) : the_row(); 
                        $tabpanel_title = get_sub_field('tabpanel_title');
                        $tabpanel_desc = get_sub_field('tabpanel_desc');
                        $tabpanel_img = get_sub_field('tabpanel_img');
                        $state = $counter === 1 ? 'active' : 'inactive';
                        $hidden = $counter === 1 ? '' : 'hidden';
                    ?>
                        <div data-state="<?php echo $state; ?>" data-orientation="horizontal" role="tabpanel" aria-labelledby="radix-:r2R2:-trigger-<?php echo $counter; ?>" id="radix-:r2R2:-content-<?php echo $counter; ?>" tabindex="0" class="col-span-2 flex flex-col gap-7 bg-background p-10 data-[state=inactive]:hidden" <?php echo $hidden; ?>>
                            <div>
                                <h2 class="mb-2 text-2xl font-medium"><?php echo esc_html($tabpanel_title); ?></h2>
                                <p class="text-muted-foreground"><?php echo esc_html($tabpanel_desc); ?></p>
                            </div>
                            <img src="<?php echo esc_url($tabpanel_img); ?>" alt="<?php echo esc_attr($tabpanel_title); ?>" class="aspect-video max-h-[450px] rounded-xl object-cover">
                        </div>
                    <?php 
                        $counter++;
                    endwhile; 
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="py-32">
        <div class="container">
            <div class="mx-auto grid max-w-screen-xl gap-y-6 lg:grid-cols-2">
                <div class="rounded-md border p-6 md:p-10 lg:rounded-l-md lg:rounded-r-none lg:border-y lg:border-l lg:border-r-0">
                    <h2 class="mb-6 text-3xl font-semibold md:text-4xl">Cursos Comerciales Tradicionales</h2>
                    <p class="mb-6 text-lg text-muted-foreground">Los cursos comerciales tradicionales suelen presentar limitaciones que pueden afectar tu experiencia de aprendizaje y desarrollo profesional.</p>
                    <div class="mt-10">
                        <div class="flex items-center gap-7 py-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock h-auto w-8 shrink-0">
                                <circle cx="12" cy="12" r="10"/>
                                <polyline points="12 6 12 12 16 14"/>
                            </svg>
                            <p>Cursos extensos que requieren mayor inversión de tiempo y recursos.</p>
                        </div>
                        <div class="flex items-center gap-7 border-y border-dashed border-primary py-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-wallet h-auto w-8 shrink-0">
                                <path d="M21 12V7H5a2 2 0 0 1 0-4h14v4"/>
                                <path d="M3 5v14a2 2 0 0 0 2 2h16v-5"/>
                                <path d="M18 12a2 2 0 0 0 0 4h4v-4Z"/>
                            </svg>
                            <p>Acceso limitado al contenido y costos recurrentes de suscripción.</p>
                        </div>
                        <div class="flex items-center gap-7 py-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-book-open h-auto w-8 shrink-0">
                                <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                                <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                            </svg>
                            <p>Contenido generalista que no se enfoca en tecnologías emergentes ni IA.</p>
                        </div>
                    </div>
                </div>
                <div class="rounded-md border border-yellow-300 bg-yellow-200 p-6 text-yellow-950 md:p-10 lg:rounded-l-none lg:rounded-r-md">
                    <h2 class="mb-6 text-3xl font-semibold md:text-4xl">Academia Digital-IA</h2>
                    <p class="mb-6 text-lg text-yellow-950">Nuestra plataforma está diseñada para ofrecer una experiencia de aprendizaje superior, adaptada a las necesidades actuales.</p>
                    <div class="flex flex-col gap-4">
                        <a href="#" class="flex items-center gap-2 text-lg font-medium">Access documentation <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right h-auto w-4">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="mt-10">
                        <div class="flex items-center gap-7 py-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-zap h-auto w-8 shrink-0">
                                <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>
                            </svg>
                            <p>Cursos concisos y efectivos, diseñados por expertos en tecnologías emergentes.</p>
                        </div>
                        <div class="flex items-center gap-7 border-y border-dashed border-yellow-800 py-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-infinity h-auto w-8 shrink-0">
                                <path d="M12 12c-2-2.67-4-4-6-4a4 4 0 1 0 0 8c2 0 4-1.33 6-4Zm0 0c2 2.67 4 4 6 4a4 4 0 0 0 0-8c-2 0-4 1.33-6 4Z"/>
                            </svg>
                            <p>Acceso gratuito y permanente a todo el contenido de la plataforma.</p>
                        </div>
                        <div class="flex items-center gap-7 py-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-database h-auto w-8 shrink-0">
                                <ellipse cx="12" cy="5" rx="9" ry="3"/>
                                <path d="M3 5V19A9 3 0 0 0 21 19V5"/>
                                <path d="M3 12A9 3 0 0 0 21 12"/>
                            </svg>
                            <p>Extensa base de datos enfocada en IA y tecnologías emergentes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    get_template_part('template-parts/cta-modulos', null, array(
        'title' => 'Academia Digital-IA',
        'description' => 'Ecosistema de soluciones tecnológicas diseñado para ofrecer servicios educativos e informativos que te preparan para los desafíos de las tecnologías emergentes.',
        'cta_primary_text' => 'Comenzar ahora',
        'cta_primary_url' => '/plataforma/register',
        'cta_secondary_text' => 'Explorar cursos',
        'cta_secondary_url' => '/plataforma/courses',
        'doc_title' => 'Documentación',
        'doc_description' => 'Accede a guías detalladas sobre el uso de la plataforma y recursos educativos.',
        'doc_url' => '/plataforma/docs',
        'guide_title' => 'Primeros pasos',
        'guide_description' => 'Aprende a utilizar la plataforma y comienza tu formación en alfabetización mediática.',
        'guide_url' => '/plataforma/getting-started'
    ));
    ?>
</main>

<?php
get_footer();

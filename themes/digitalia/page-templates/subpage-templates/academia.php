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
    $header = get_field('header');
    get_template_part('template-parts/subpage-header', null, array(
        'title' => $header['title'],
        'subtitle' => $header['subtitle'],
        'show_cta' => true,
        'cta_text' => $header['cta']['title'],
        'cta_url' => $header['cta']['url']
    ));

    $nav_menu = get_field('nav_menu');
    get_template_part('template-parts/floating-nav', null, array(
        'nav_items' => array(
            array(
                'anchor' => 'acerca',
                'text' => $nav_menu['item_1']
            ),
            array(
                'anchor' => 'registro',
                'text' => $nav_menu['item_2']
            ),
            array(
                'anchor' => 'cursos',
                'text' => $nav_menu['item_3']
            ),
            array(
                'anchor' => 'ventajas',
                'text' => $nav_menu['item_4']
            ),
            array(
                'anchor' => 'comparacion',
                'text' => $nav_menu['item_5']
            )
        )
    ));
    ?>

    <section id="acerca" class="pb-32 pt-12">
        <div class="container">
            <div class="grid place-content-center gap-10 lg:grid-cols-2">
                <div class="mx-auto flex max-w-screen-md flex-col items-center justify-center gap-4 lg:items-start">
                    <?php 
                    $formacion = get_field('formacion_digital');
                    ?>
                    <div class="rounded-full border font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 text-foreground flex items-center gap-1 px-2.5 py-1.5 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-graduation-cap h-auto w-4">
                            <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                            <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                        </svg>
                        <?php echo esc_html($formacion['badge_text']); ?>
                    </div>
                    <h2 class="text-center text-3xl font-semibold lg:text-left lg:text-4xl"><?php echo esc_html($formacion['title']); ?></h2>
                    <p class="text-center text-muted-foreground lg:text-left lg:text-lg"><?php echo esc_html($formacion['description']); ?></p>
                    <a href="<?php echo esc_url($formacion['cta']['url']); ?>" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-11 rounded-md px-8"><?php echo esc_html($formacion['cta']['title']); ?></a>
                    <div class="mt-9 flex w-full flex-col justify-center gap-6 md:flex-row lg:justify-start">
                        <div class="flex justify-between gap-6">
                            <div class="mx-auto">
                                <p class="mb-1.5 text-3xl font-bold"><?php echo esc_html($formacion['feature_1']['number']); ?></p>
                                <p class="text-muted-foreground"><?php echo esc_html($formacion['feature_1']['text']); ?></p>
                            </div>
                            <div data-orientation="vertical" role="none" class="shrink-0 bg-border w-[1px] h-auto"></div>
                            <div class="mx-auto">
                                <p class="mb-1.5 text-3xl font-bold"><?php echo esc_html($formacion['feature_2']['number']); ?></p>
                                <p class="text-muted-foreground"><?php echo esc_html($formacion['feature_2']['text']); ?></p>
                            </div>
                        </div>
                        <div data-orientation="vertical" role="none" class="shrink-0 bg-border w-[1px] hidden h-auto md:block"></div>
                        <div data-orientation="horizontal" role="none" class="shrink-0 bg-border h-[1px] w-full block md:hidden"></div>
                        <div class="flex justify-between gap-6">
                            <div class="mx-auto">
                                <p class="mb-1.5 text-3xl font-bold"><?php echo esc_html($formacion['feature_3']['number']); ?></p>
                                <p class="text-muted-foreground"><?php echo esc_html($formacion['feature_3']['text']); ?></p>
                            </div>
                            <div data-orientation="vertical" role="none" class="shrink-0 bg-border w-[1px] h-auto"></div>
                            <div class="mx-auto">
                                <p class="mb-1.5 text-3xl font-bold"><?php echo esc_html($formacion['feature_4']['number']); ?></p>
                                <p class="text-muted-foreground"><?php echo esc_html($formacion['feature_4']['text']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-auto">
                    <?php if (!empty($formacion['image'])): ?>
                        <img src="<?php echo esc_url($formacion['image']); ?>" alt="Academia Digital-IA" class="ml-auto max-h-[450px] w-full rounded-xl object-cover">
                    <?php endif; ?>
                </div>
            </div>
            <div class="mt-10 grid gap-6 md:grid-cols-3">
                <div class="flex flex-col gap-4">
                    <div class="gap flex flex-col gap-3 rounded-lg border p-6">
                        <div class="flex flex-col items-center gap-2 lg:flex-row">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-timer h-auto w-6">
                                <line x1="10" x2="14" y1="2" y2="2"></line>
                                <line x1="12" x2="15" y1="14" y2="11"></line>
                                <circle cx="12" cy="14" r="8"></circle>
                            </svg>
                            <h3 class="text-center text-lg font-medium lg:text-left">Acceso 24/7</h3>
                        </div>
                        <p class="text-center text-sm text-muted-foreground md:text-base lg:text-left">Accede a contenidos educativos de alta calidad en cualquier momento y lugar, adaptándose a tu ritmo de aprendizaje y disponibilidad.</p>
                    </div>
                </div>
                <div class="flex flex-col gap-4">
                    <div class="gap flex flex-col gap-3 rounded-lg border p-6">
                        <div class="flex flex-col items-center gap-2 lg:flex-row">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-graduation-cap h-auto w-6">
                                <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                                <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                            </svg>
                            <h3 class="text-center text-lg font-medium lg:text-left">Mayor talento digital</h3>
                        </div>
                        <p class="text-center text-sm text-muted-foreground md:text-base lg:text-left">Mejora tu empleabilidad y productividad laboral a través de programas formativos diseñados para las demandas del mercado actual.</p>
                    </div>
                </div>
                <div class="flex flex-col gap-4">
                    <div class="gap flex flex-col gap-3 rounded-lg border p-6">
                        <div class="flex flex-col items-center gap-2 lg:flex-row">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-key-round h-auto w-6">
                                <path d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z"></path>
                                <circle cx="16.5" cy="7.5" r=".5" fill="currentColor"></circle>
                            </svg>
                            <h3 class="text-center text-lg font-medium lg:text-left">Alfabetización mediática</h3>
                        </div>
                        <p class="text-center text-sm text-muted-foreground md:text-base lg:text-left">Desarrolla habilidades críticas para navegar el mundo digital, identificar desinformación y utilizar las tecnologías emergentes de manera ética.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="registro" class="bg-yellow-200 text-yellow-950 py-32">
        <div class="container">
            <?php $registration = get_field('registration_steps'); ?>
            <div class="mx-auto flex max-w-screen-md flex-col justify-center gap-7 md:text-center">
                <h2 class="text-2xl md:text-4xl"><?php echo esc_html($registration['title']); ?></h2>
                <p class="text-sm md:text-base"><?php echo esc_html($registration['description']); ?></p>
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
                            <h3 class="text-xl min-[960px]:text-2xl"><?php echo esc_html($registration['step_1']['title']); ?></h3>
                            <p class="text-sm min-[960px]:text-base"><?php echo esc_html($registration['step_1']['description']); ?></p>
                        </div>
                    </div>
                    <img src="<?php echo esc_url($registration['step_1']['image']); ?>" alt="<?php echo esc_attr($registration['step_1']['title']); ?>" class="z-10 aspect-video w-full rounded-xl border object-cover min-[960px]:max-h-56 min-[960px]:w-auto">
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
                            <h3 class="text-xl min-[960px]:text-2xl"><?php echo esc_html($registration['step_2']['title']); ?></h3>
                            <p class="text-sm min-[960px]:text-base"><?php echo esc_html($registration['step_2']['description']); ?></p>
                        </div>
                    </div>
                    <img src="<?php echo esc_url($registration['step_2']['image']); ?>" alt="<?php echo esc_attr($registration['step_2']['title']); ?>" class="z-10 max-h-56 w-full rounded-xl border object-cover min-[960px]:aspect-video min-[960px]:w-auto">
                </div>
                <div class="flex flex-col items-center justify-between min-[960px]:flex-row min-[960px]:gap-10">
                    <div class="flex gap-4 min-[960px]:max-w-md">
                        <div class="flex flex-col items-center justify-between gap-1">
                            <span class="h-20 w-[3px] shrink-0 bg-gradient-to-t from-transparent to-yellow-500 opacity-70"></span>
                            <span class="flex size-10 shrink-0 items-center justify-center rounded-full border bg-yellow-100 font-mono text-lg text-yellow-700">3</span>
                            <span class="h-20 shrink-0"></span>
                        </div>
                        <div class="flex flex-col justify-center gap-5 px-0 min-[960px]:gap-6 min-[960px]:p-4">
                            <h3 class="text-xl min-[960px]:text-2xl"><?php echo esc_html($registration['step_3']['title']); ?></h3>
                            <p class="text-sm min-[960px]:text-base"><?php echo esc_html($registration['step_3']['description']); ?></p>
                        </div>
                    </div>
                    <img src="<?php echo esc_url($registration['step_3']['image']); ?>" alt="<?php echo esc_attr($registration['step_3']['title']); ?>" class="z-10 max-h-56 w-full rounded-xl border object-cover min-[960px]:aspect-video min-[960px]:w-auto">
                </div>
            </div>
        </div>
    </section>

    <section id="cursos" class="py-32">
        <div class="container flex flex-col items-center gap-16 lg:px-16">
            <?php $courses = get_field('courses_section'); ?>
            <div class="text-center">
                <p class="mb-6 text-xs font-medium uppercase tracking-wider">Formación Digital</p>
                <h2 class="mb-3 text-pretty text-3xl font-semibold md:mb-4 md:text-4xl lg:mb-6 lg:max-w-3xl lg:text-5xl"><?php echo esc_html($courses['title']); ?></h2>
                <p class="mb-8 text-muted-foreground md:text-base lg:max-w-2xl lg:text-lg"><?php echo esc_html($courses['description']); ?></p>
                <a href="<?php echo esc_url($courses['cta']['url']); ?>" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 text-primary underline-offset-4 hover:underline h-10 px-4 py-2 w-full sm:w-auto">
                    <?php echo esc_html($courses['cta']['title']); ?>
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

    <section id="ventajas" class="py-32">
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
                                        <path d="m6 9 6 6 6-6-6-6"></path>
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
                                        <path d="m9 18 6-6 6 6-6 6-6-6"></path>
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

    <section id="comparacion" class="py-32">
        <div class="container">
            <?php $comparison = get_field('comparison_section'); ?>
            <div class="mx-auto grid max-w-screen-xl gap-y-6 lg:grid-cols-2">
                <div class="rounded-md border p-6 md:p-10 lg:rounded-l-md lg:rounded-r-none lg:border-y lg:border-l lg:border-r-0">
                    <h2 class="mb-6 text-3xl font-semibold md:text-4xl"><?php echo esc_html($comparison['traditional_courses']['title']); ?></h2>
                    <p class="mb-6 text-lg text-muted-foreground"><?php echo esc_html($comparison['traditional_courses']['description']); ?></p>
                    <div class="mt-10">
                        <?php if (!empty($comparison['traditional_courses']['features'])) : ?>
                            <?php 
                            $feature_count = 0;
                            foreach ($comparison['traditional_courses']['features'] as $feature) : 
                                $feature_count++;
                                $class = $feature_count === 2 ? 'border-y border-dashed border-primary' : '';
                            ?>
                                <div class="flex items-center gap-7 <?php echo $class; ?> py-6">
                                    <i class="fa <?php echo esc_attr($feature['icon']); ?> h-auto w-8 shrink-0"></i>
                                    <p><?php echo esc_html($feature['text']); ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="rounded-md border border-yellow-300 bg-yellow-200 p-6 text-yellow-950 md:p-10 lg:rounded-l-none lg:rounded-r-md">
                    <h2 class="mb-6 text-3xl font-semibold md:text-4xl"><?php echo esc_html($comparison['digitalia_courses']['title']); ?></h2>
                    <p class="mb-6 text-lg text-yellow-950"><?php echo esc_html($comparison['digitalia_courses']['description']); ?></p>
                    <div class="mt-10">
                        <?php if (!empty($comparison['digitalia_courses']['features'])) : ?>
                            <?php 
                            $feature_count = 0;
                            foreach ($comparison['digitalia_courses']['features'] as $feature) : 
                                $feature_count++;
                                $class = $feature_count === 2 ? 'border-y border-dashed border-yellow-800' : '';
                            ?>
                                <div class="flex items-center gap-7 <?php echo $class; ?> py-6">
                                    <i class="fa <?php echo esc_attr($feature['icon']); ?> h-auto w-8 shrink-0"></i>
                                    <p><?php echo esc_html($feature['text']); ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();

<?php
/**
 * Template Name: Módulo REaDy
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    get_template_part('template-parts/subpage-header', null, array(
        'title' => 'REaDy',
        'subtitle' => 'Red de Aprendizaje Digital y recursos educativos',
        'show_cta' => true,
        'cta_text' => 'Unirse a la red',
        'cta_url' => '/contacto'
    ));
    ?>
    
    <section id="acerca" class="bg-purple-900 pb-32 pt-12">
        <div class="container">
            <div class="grid place-content-center gap-10 lg:grid-cols-2">
                <div class="mx-auto flex max-w-screen-md flex-col items-center justify-center gap-4 lg:items-start">
                    <div class="rounded-full border border-purple-300 text-purple-300 font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 text-foreground flex items-center gap-1 px-2.5 py-1.5 text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-graduation-cap h-auto w-4">
                            <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                            <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                        </svg>
                        Red de Aprendizaje Digital
                    </div>
                    <h2 class="text-center text-3xl font-semibold lg:text-left lg:text-4xl text-white">Alfabetización Mediática para el Futuro</h2>
                    <p class="text-center text-purple-300 lg:text-left lg:text-lg">REaDy es una red nacional de alfabetización mediática e informacional que prepara a la ciudadanía para los desafíos de las tecnologías emergentes, con énfasis en inteligencia artificial y enfoque de paz.</p>
                    <a href="/contacto" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-purple-500 text-white hover:bg-purple-400 h-11 rounded-md px-8">Unirse a la red</a>
                    <div class="mt-9 flex w-full flex-col justify-center gap-6 md:flex-row lg:justify-start">
                        <div class="flex justify-between gap-6">
                            <div class="mx-auto">
                                <p class="mb-1.5 text-3xl font-bold text-purple-300">+1000</p>
                                <p class="text-purple-400">Participantes</p>
                            </div>
                            <div data-orientation="vertical" role="none" class="shrink-0 bg-purple-700 w-[1px] h-auto"></div>
                            <div class="mx-auto">
                                <p class="mb-1.5 text-3xl font-bold text-purple-300">32</p>
                                <p class="text-purple-400">Departamentos</p>
                            </div>
                        </div>
                        <div data-orientation="vertical" role="none" class="shrink-0 bg-purple-700 w-[1px] hidden h-auto md:block"></div>
                        <div data-orientation="horizontal" role="none" class="shrink-0 bg-purple-700 h-[1px] w-full block md:hidden"></div>
                        <div class="flex justify-between gap-6">
                            <div class="mx-auto">
                                <p class="mb-1.5 text-3xl font-bold text-purple-300">24/7</p>
                                <p class="text-purple-400">Acceso</p>
                            </div>
                            <div data-orientation="vertical" role="none" class="shrink-0 bg-purple-700 w-[1px] h-auto"></div>
                            <div class="mx-auto">
                                <p class="mb-1.5 text-3xl font-bold text-purple-300">100%</p>
                                <p class="text-purple-400">Gratuito</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-auto">
                    <img src="/wp-content/uploads/2024/12/back1-1.png" alt="REaDy - Red de Aprendizaje Digital" class="ml-auto max-h-[450px] w-full rounded-xl object-cover">
                </div>
            </div>
            <div class="mt-10 grid gap-6 md:grid-cols-3">
                <div class="flex flex-col gap-4">
                    <div class="gap flex flex-col gap-3 rounded-lg border border-purple-700 bg-purple-800/50 p-6">
                        <div class="flex flex-col items-center gap-2 lg:flex-row">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-check h-auto w-6 text-purple-300">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"></path>
                                <path d="m9 12 2 2 4-4"></path>
                            </svg>
                            <h3 class="text-center text-lg font-medium lg:text-left text-white">Resiliencia Digital</h3>
                        </div>
                        <p class="text-center text-sm text-purple-300 md:text-base lg:text-left">Desarrolla habilidades críticas para identificar desinformación y utilizar las tecnologías emergentes de manera ética y responsable.</p>
                    </div>
                </div>
                <div class="flex flex-col gap-4">
                    <div class="gap flex flex-col gap-3 rounded-lg border border-purple-700 bg-purple-800/50 p-6">
                        <div class="flex flex-col items-center gap-2 lg:flex-row">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users h-auto w-6 text-purple-300">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <h3 class="text-center text-lg font-medium lg:text-left text-white">Red Nacional</h3>
                        </div>
                        <p class="text-center text-sm text-purple-300 md:text-base lg:text-left">Forma parte de una comunidad de más de 1000 personas comprometidas con la alfabetización mediática y la construcción de paz en Colombia.</p>
                    </div>
                </div>
                <div class="flex flex-col gap-4">
                    <div class="gap flex flex-col gap-3 rounded-lg border border-purple-700 bg-purple-800/50 p-6">
                        <div class="flex flex-col items-center gap-2 lg:flex-row">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-brain-circuit h-auto w-6 text-purple-300">
                                <path d="M12 4.5a2.5 2.5 0 0 0-4.96-.46 2.5 2.5 0 0 0-1.98 3 2.5 2.5 0 0 0-1.32 4.24 3 3 0 0 0 .34 5.58 2.5 2.5 0 0 0 2.96 3.08 2.5 2.5 0 0 0 4.91.05L12 20V4.5Z"></path>
                                <path d="M16 8V5c0-1.1.9-2 2-2"></path>
                                <path d="M12 13h4"></path>
                                <path d="M12 18h6a2 2 0 0 1 2 2v1"></path>
                                <path d="M12 8h8"></path>
                                <path d="M20.5 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"></path>
                                <path d="M16.5 13a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"></path>
                                <path d="M20.5 21a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"></path>
                            </svg>
                            <h3 class="text-center text-lg font-medium lg:text-left text-white">Inteligencia Artificial</h3>
                        </div>
                        <p class="text-center text-sm text-purple-300 md:text-base lg:text-left">Aprende sobre los desafíos y oportunidades de la IA en la comunicación digital, con un enfoque en la ética y la responsabilidad social.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-purple-100 py-32">
        <div class="px-0">
            <h1 class="container text-3xl font-bold lg:text-5xl">
                <span class="text-purple-700">Blog.</span><br>
                <span class="text-purple-950">Últimas novedades y actualizaciones</span>
            </h1>
            <div class="mt-8">
                <div data-orientation="horizontal" role="none" class="shrink-0 bg-purple-200 h-[1px] w-full"></div>
                <div class="">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'orderby' => 'date',
                        'order' => 'DESC'
                    );
                    
                    $query = new WP_Query($args);
                    
                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();
                        $categories = get_the_category();
                    ?>
                        <div class="container grid grid-cols-1 gap-6 py-8 lg:grid-cols-4">
                            <div class="hidden items-center gap-3 self-start lg:flex">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php echo get_the_post_thumbnail_url(null, 'thumbnail'); ?>" alt="<?php the_title(); ?>" class="h-auto w-11">
                                <?php endif; ?>
                                <div class="flex flex-col gap-1">
                                    <span class="font-semibold text-purple-900"><?php echo get_bloginfo('name'); ?></span>
                                    <span class="text-sm text-purple-600">Equipo</span>
                                </div>
                            </div>
                            <div class="col-span-2 max-w-xl">
                                <span class="mb-2 text-sm font-medium text-purple-600">
                                    <?php echo get_the_date('d F Y'); ?>
                                    <span class="inline lg:hidden"> - <?php echo get_bloginfo('name'); ?></span>
                                </span>
                                <h3 class="text-2xl font-bold hover:text-purple-700 lg:text-3xl">
                                    <a href="<?php the_permalink(); ?>" class="text-purple-900 hover:text-purple-700"><?php the_title(); ?></a>
                                </h3>
                                <div class="mt-5 flex flex-wrap gap-2">
                                    <?php
                                    if ($categories) :
                                        foreach ($categories as $category) :
                                    ?>
                                        <a href="<?php echo get_category_link($category->term_id); ?>" class="flex items-center gap-1.5 rounded-full border border-purple-200 px-3 py-1.5 text-sm font-medium text-purple-700 transition-colors hover:bg-purple-100">
                                            <?php echo $category->name; ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right h-4 w-4 text-purple-600">
                                                <path d="m9 18 6-6-6-6"></path>
                                            </svg>
                                        </a>
                                    <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </div>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-purple-200 bg-white hover:bg-purple-50 text-purple-700 h-10 w-10 ml-auto hidden lg:flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right h-4 w-4">
                                    <path d="M5 12h14"></path>
                                    <path d="m12 5 7 7-7 7"></path>
                                </svg>
                                <span class="sr-only">Leer más</span>
                            </a>
                        </div>
                        <?php if (!$query->is_last_post()) : ?>
                            <div data-orientation="horizontal" role="none" class="shrink-0 bg-purple-200 h-[1px] w-full"></div>
                        <?php endif; ?>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
                <div class="container mt-8 flex justify-center">
                    <a href="/blog-y-noticias" class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-purple-600 text-white hover:bg-purple-500 h-10 px-4 py-2">
                        Ver todas las noticias
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 h-4 w-4">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();

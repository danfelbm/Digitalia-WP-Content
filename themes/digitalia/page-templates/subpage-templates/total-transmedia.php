<?php
/**
 * Template Name: Módulo Total Transmedia
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    get_template_part('template-parts/subpage-header', null, array(
        'title' => 'Total Transmedia',
        'subtitle' => 'Experiencias multimedia que conectan diferentes plataformas y formatos',
        'show_cta' => true,
        'cta_text' => 'Explorar contenido',
        'cta_url' => '/biblioteca-digital'
    ));
    ?>

    <?php
    $nav_items = get_field('enlinea_nav');
    get_template_part('template-parts/floating-nav', null, array(
        'nav_items' => array(
            array('anchor' => 'estrategia', 'text' => 'Estrategia'),
            array('anchor' => 'equipo', 'text' => 'Equipo'),
            array('anchor' => 'portafolio', 'text' => 'Portafolio'),
            array('anchor' => 'blog', 'text' => 'Blog'),
        )
    ));
    ?>
    
    <section id="estrategia" class="py-32 bg-blue-200 text-blue-900" style="margin-top: -70px;">
        <div class="container">
            <div class="grid place-content-center gap-10 lg:grid-cols-2">
                <div class="mx-auto flex max-w-screen-md flex-col items-center justify-center gap-4 lg:items-start">
                    <div class="rounded-full border font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 text-foreground flex items-center gap-1 px-2.5 py-1.5 text-sm border-blue-200 bg-blue-300">
                        <i class="fa-solid fa-star h-auto w-4"></i>
                        Aspectos Clave
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
        <div class="container mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                <?php
                $users = get_users();

                foreach ($users as $user) {
                    $equipo = get_field('equipo', 'user_' . $user->ID);
                    if ($equipo === 'total-transmedia') {
                        $name = $user->display_name;
                        $avatar = get_avatar_url($user->ID, array('size' => 200));
                        $frase = get_field('frase', 'user_' . $user->ID);
                        $rol = get_field('rol', 'user_' . $user->ID);
                ?>
                <div class="flex flex-col items-center bg-blue-300 p-8 text-blue-900 border border-blue-600">
                    <span class="relative flex shrink-0 overflow-hidden rounded-full mb-4 size-20 md:mb-5 lg:size-24">
                        <img class="aspect-square h-full w-full" src="<?php echo esc_url($avatar); ?>" alt="<?php echo esc_attr($name); ?>">
                    </span>
                    <div class="text-center">
                        <h3 class="mb-1 font-semibold">
                            <a href="<?php echo esc_url(get_author_posts_url($user->ID)); ?>" class="hover:text-blue-600 hover:underline transition-colors">
                                <?php echo esc_html($name); ?>
                            </a>
                        </h3>
                        <?php if ($rol) : ?>
                            <p class="text-sm"><?php echo esc_html($rol); ?></p>
                        <?php endif; ?>
                        <?php if ($frase) : ?>
                            <p class="mt-4 text-sm"><?php echo esc_html($frase); ?></p>
                        <?php endif; ?>
                    </div>
                    <?php if (have_rows('red_social', 'user_' . $user->ID)) : ?>
                        <div class="mt-6 flex gap-4">
                            <?php while (have_rows('red_social', 'user_' . $user->ID)) : the_row(); 
                                $social_network = get_sub_field('red_social_item');
                                $profile_url = get_sub_field('link_al_perfil');
                                
                                if ($social_network && $profile_url) :
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
                            ?>
                                    <a href="<?php echo esc_url($profile_url); ?>" target="_blank" rel="noopener noreferrer" class="hover:text-blue-600">
                                        <i class="fa-brands <?php echo esc_attr($icon_class); ?>"></i>
                                    </a>
                            <?php endif;
                            endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php
                }
            }
            
            if (empty($users)) {
                echo '<div class="col-span-full text-center text-muted-foreground">No se encontraron miembros del equipo.</div>';
            }
            ?>
        </div>
    </section>

    <section id="portafolio" class="flex flex-col gap-16 lg:px-16 pt-16 text-blue-100 bg-blue-700">
        <div class="container mb-14 flex flex-col gap-16 lg:mb-16 lg:px-16">
            <div class="lg:max-w-lg">
                <h2 class="mb-3 text-xl font-semibold md:mb-4 md:text-4xl lg:mb-6">Portafolio y componentes clave</h2>
                <p class="mb-8 lg:text-lg">Explora los elementos fundamentales de nuestro programa de educomunicación, las estrategias, las herramientas de alfabetización mediática con énfasis en inteligencia artificial y enfoque de paz.</p>
                <a href="#" class="group flex items-center text-xs font-medium md:text-base lg:text-lg">
                    Conoce más
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 size-4 transition-transform group-hover:translate-x-1">
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

    <section class="pb-32 pt-16 bg-blue-400">
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
    <?php
    $blog_args = array(
        'post_type' => 'post',
        'posts_per_page' => 2,
        'cat' => 22
    );

    $blog_query = new WP_Query($blog_args);

    if ($blog_query->have_posts()) :
    ?>
    <section id="blog" class="flex flex-col gap-16 lg:px-16 pt-16 text-blue-900 bg-blue-200">
        <div class="container mb-14 flex flex-col gap-16 lg:mb-16 lg:px-16">
            <div class="lg:max-w-lg">
                <h2 class="mb-3 text-xl font-semibold md:mb-4 md:text-4xl lg:mb-6">Entradas del blog</h2>
                <p class="mb-8 lg:text-lg">Descubre las últimas novedades y reflexiones sobre educomunicación, alfabetización mediática e inteligencia artificial en nuestro blog, con un enfoque especial en la construcción de paz.</p>
                <a href="#" class="group flex items-center text-xs font-medium md:text-base lg:text-lg">
                    Conoce más
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 size-4 transition-transform group-hover:translate-x-1">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    <section id="blog" class="pb-32 pt-16 bg-blue-100 text-blue-900">
        <div class="container flex flex-col items-center gap-16">
            <div class="grid gap-y-10 container sm:gap-y-12 md:gap-y-16 lg:gap-y-20">
                <?php 
                while ($blog_query->have_posts()) : $blog_query->the_post();
                    $categories = get_the_category();
                ?>
                <a href="<?php the_permalink(); ?>" class="group order-last grid gap-y-6 sm:order-first sm:col-span-12 sm:grid-cols-10 sm:gap-x-5 sm:gap-y-0 md:items-center md:gap-x-8 lg:col-span-10 lg:col-start-2 lg:gap-x-12">
                    <div class="sm:col-span-5">
                        <div class="mb-4 md:mb-6">
                            <div class="flex gap-2 text-xs uppercase tracking-wider flex-wrap">
                                <?php foreach($categories as $category) : ?>
                                    <span class="rounded-full border font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 text-foreground flex items-center gap-1 px-2.5 py-1.5 text-xs border-blue-200 bg-blue-300"><?php echo esc_html($category->name); ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold md:text-2xl lg:text-3xl"><?php the_title(); ?></h3>
                        <p class="mt-3 text-sm line-clamp-3"><?php echo get_the_excerpt(); ?></p>
                        <div class="mt-4 flex items-center space-x-2 md:mt-5">
                            <span class="font-semibold md:text-base">Leer más</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 size-3 transition-transform group-hover:translate-x-1">
                                <path d="M5 12h14"></path>
                                <path d="m12 5 7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="order-first sm:order-last sm:col-span-5">
                        <div class="aspect-[16/9] text-clip rounded-lg border border-border">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', array('class' => 'size-full object-cover transition-transform group-hover:scale-105')); ?>
                            <?php else : ?>
                                <img src="<?php echo get_theme_file_uri('assets/images/placeholder.jpg'); ?>" alt="<?php the_title_attribute(); ?>" class="size-full object-cover transition-transform group-hover:scale-105">
                            <?php endif; ?>
                        </div>
                    </div>
                </a>
                <?php 
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
            <a href="/blog" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-blue-600 text-primary-foreground hover:bg-blue-500 h-11 rounded-md px-8">
                Ver todos los artículos
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 size-4">
                    <path d="M5 12h14"></path>
                    <path d="m12 5 7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </section>
    <?php endif; ?>

</main>

<?php
get_footer();

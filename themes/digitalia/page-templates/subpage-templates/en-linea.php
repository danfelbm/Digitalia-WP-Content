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

    <section class="pb-8 pt-12">
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
                    <a href="#ver-episodios" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-red-500 text-primary-foreground hover:bg-red-600 h-10 px-4 py-2 w-fit">
                        Ver Episodios
                    </a>
                </div>
                <img src="https://www.shadcnblocks.com/images/block/placeholder-1.svg" alt="Digital-IA Hero" class="h-full max-h-[420px] w-full rounded-xl object-cover">
            </div>
            <div data-orientation="horizontal" role="none" class="shrink-0 bg-border h-[1px] w-full my-12"></div>
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                <div>
                    <h2 class="mb-2 text-4xl text-red-500 font-semibold md:text-6xl">32+</h2>
                    <p class="text-muted-foreground">Departamentos alcanzados</p>
                </div>
                <div>
                    <h2 class="mb-2 text-4xl text-red-500 font-semibold md:text-6xl">1000+</h2>
                    <p class="text-muted-foreground">Historias documentadas</p>
                </div>
                <div>
                    <h2 class="mb-2 text-4xl text-red-500 font-semibold md:text-6xl">12</h2>
                    <p class="text-muted-foreground">Episodios producidos</p>
                </div>
                <div>
                    <h2 class="mb-2 text-4xl text-red-500 font-semibold md:text-6xl">>50k</h2>
                    <p class="text-muted-foreground">Espectadores alcanzados</p>
                </div>
            </div>
        </div>
    </section>

    <!-- section la historia -->
    <section class="py-32">
        <div>
            <div id="la-historia" class="flex py-40 items-center justify-center bg-[linear-gradient(rgba(0,0,0,.6),rgba(0,0,0,.6)),url(&quot;https://images.unsplash.com/photo-1536735561749-fc87494598cb?crop=entropy&amp;cs=tinysrgb&amp;fit=max&amp;fm=jpg&amp;ixid=M3w2NDI3NzN8MHwxfGFsbHwxNzd8fHx8fHwyfHwxNzIzNjM0NDc0fA&amp;ixlib=rb-4.0.3&amp;q=80&amp;w=1080&quot;)] bg-cover bg-center">
                <div class="flex flex-col gap-8 text-center text-primary-foreground max-w-6xl mx-auto px-4 md:px-8">
                    <div class="flex items-center justify-center gap-2 text-2xl font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-zap h-full w-7">
                            <path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"></path>
                        </svg> 
                        La Historia
                    </div>
                    <h2 class="text-5xl font-bold">Una Serie Web que Transforma Vidas</h2>
                    <div class="py-8 grid grid-cols-1 md:grid-cols-2 gap-8 text-left text-lg">
                        <div>
                            <p class="mb-4">"En Línea" es una serie web de 20 episodios que sigue las vidas entrelazadas de jóvenes colombianos mientras navegan por los desafíos de la era digital. A través de historias profundamente humanas, exploramos cómo la transformación digital está cambiando la forma en que nos relacionamos, aprendemos y vivimos.</p>
                            <p>La serie recorre diversos rincones de Colombia, desde las calles de Bogotá hasta las comunidades rurales, mostrando cómo la alfabetización mediática se convierte en una herramienta de empoderamiento y cambio social.</p>
                        </div>
                        <div>
                            <p class="mb-4">Cada episodio de 15 minutos teje una narrativa cautivadora donde nuestros personajes enfrentan dilemas éticos, descubren el poder de la información y aprenden a navegar en un mundo cada vez más conectado, mientras forjan amistades y relaciones que trascienden las pantallas.</p>
                            <p>Una historia que combina drama, educación y esperanza, mostrando cómo la alfabetización mediática puede transformar vidas y comunidades enteras en la era de la información digital.</p>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center gap-2 sm:flex-row pb-16">
                        <button class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-11 rounded-md px-8 bg-red-500 text-white hover:bg-red-600">Conoce Más</button>

                        <button class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border-input h-11 rounded-md px-8 border-0 bg-background/20 backdrop-blur-sm hover:bg-background/30 hover:text-primary-foreground">Contáctanos</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- section screenshots grid -->
    <section class="relative -mt-72 md:-mt-32">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Column 1 -->
                <div class="flex flex-col gap-6 md:-translate-y-12">
                    <img src="/wp-content/uploads/2024/12/yvuqlyrljsw.jpg" alt="Screenshot 1" class="w-full rounded-2xl" />
                    <img src="/wp-content/uploads/2024/12/71shxwblp5w.jpg" alt="Screenshot 4" class="w-full rounded-2xl" />
                </div>
                <!-- Column 2 (offset up) -->
                <div class="flex flex-col gap-6 md:-translate-y-32">
                    <img src="/wp-content/uploads/2024/12/2upcveoxoxc.jpg" alt="Screenshot 2" class="w-full rounded-2xl" />
                    <img src="/wp-content/uploads/2024/12/rncpixixooy.jpg" alt="Screenshot 5" class="w-full rounded-2xl" />
                </div>
                <!-- Column 3 (no offset) -->
                <div class="flex flex-col gap-6 md:-translate-y-12">
                    <img src="/wp-content/uploads/2024/12/mzjobxoxbt0.jpg" alt="Screenshot 3" class="w-full rounded-2xl" />
                    <img src="/wp-content/uploads/2024/12/lme2ye2jvo8.jpg" class="w-full rounded-2xl" />
                </div>
            </div>
        </div>
    </section>

    <!-- Case Studies Carousel Section -->
    <?php
    $args = array(
        'post_type' => 'episodio',
        'posts_per_page' => 20,
        'orderby' => 'date',
        'order' => 'ASC'
    );
    
    $episodios = new WP_Query($args);
    
    if ($episodios->have_posts()) :
    ?>
    <section id="ver-episodios" class="py-32 md:-mt-28">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8 flex items-end justify-between md:mb-14 lg:mb-16">
                <div class="max-w-4xl">
                    <h2 class="text-3xl font-medium md:text-4xl lg:text-5xl mb-8">Episodios</h2>
                    <p class="text-2xl md:text-4xl lg:text-2xl md:text-base">Ya han salido dos temporadas con 20 episodios en total, que abordan la alfabetización mediática de una forma innovadora y emocionante. A través de la ficción, exploramos los desafíos del mundo real y cómo la transformación digital está cambiando la forma en que nos relacionamos, aprendemos y vivimos.</p>
                </div>
                <div class="hidden shrink-0 gap-2 md:flex">
                    <button class="carousel-prev inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 w-10 disabled:pointer-events-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left size-5"><path d="m12 19-7-7 7-7"></path><path d="M19 12H5"></path></svg>
                    </button>
                    <button class="carousel-next inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 w-10 disabled:pointer-events-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right size-5"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="w-full overflow-hidden">
            <div class="relative" role="region" aria-roledescription="carousel">
                <div class="overflow-hidden">
                    <div class="carousel-container flex transition-transform duration-300 md:pl-24">
                        <?php
                        while ($episodios->have_posts()) : $episodios->the_post();
                            $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'large');
                            if (!$thumbnail) {
                                $thumbnail = 'https://placehold.co/800x600/jpeg';
                            }
                        ?>
                        <div role="group" aria-roledescription="slide" class="min-w-0 shrink-0 grow-0 basis-full max-w-[320px] pl-5 lg:max-w-[360px]">
                            <a href="<?php the_permalink(); ?>" class="group rounded-xl">
                                <div class="group relative h-full min-h-[27rem] max-w-full overflow-hidden rounded-xl bg-red-200 md:aspect-[5/4] lg:aspect-[16/9]">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('large', array('class' => 'absolute size-full object-cover object-center transition-transform duration-300 group-hover:scale-105')); ?>
                                        <?php endif; ?>
                                    <div class="absolute inset-0 h-full bg-gradient-to-b from-black/20 to-black/80 mix-blend-multiply"></div>
                                    <div class="absolute inset-x-0 bottom-0 flex flex-col items-start p-6 text-white md:p-8">
                                        <?php
                                        $temporadas = get_the_terms(get_the_ID(), 'temporadas');
                                        if (!empty($temporadas) && !is_wp_error($temporadas)) {
                                            $temporada = $temporadas[0]; // Get the first temporada
                                        ?>
                                            <span class="mb-2 inline-flex items-center rounded-full bg-red-500 px-3 py-1 text-xs font-medium text-white">
                                                <?php echo esc_html($temporada->name); ?>
                                            </span>
                                        <?php } ?>
                                        <div class="mb-2 pt-4 text-xl font-semibold md:mb-3 md:pt-4 lg:pt-4"><?php the_title(); ?></div>
                                        <div class="mb-8 line-clamp-2 md:mb-12 lg:mb-9"><?php 
                                            echo esc_html(get_field('sinopsis_single')); 
                                        ?></div>
                                        <div class="flex items-center text-sm">
                                            Leer más
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 size-5 transition-transform group-hover:translate-x-1">
                                                <path d="M5 12h14"></path>
                                                <path d="m12 5 7 7-7 7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php
    $personajes_args = array(
        'post_type' => 'personajes',
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key' => 'serie',
                'value' => '642',
                'compare' => '='
            )
        )
    );

    $personajes = new WP_Query($personajes_args);
    
    if ($personajes->have_posts()) :
        $serie = get_post(642);
    ?>
    <section id="personajes" class="py-32 md:-mt-28">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8 flex items-end justify-between md:mb-14 lg:mb-16">
                <div class="max-w-4xl">
                    <h2 class="text-3xl font-medium md:text-4xl lg:text-5xl mb-8">Personajes</h2>
                    <p class="text-2xl md:text-4xl lg:text-2xl md:text-base">Conoce a los personajes que dan vida a esta historia.</p>
                </div>
                <div class="hidden shrink-0 gap-2 md:flex">
                    <button class="carousel-prev inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 w-10 disabled:pointer-events-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left size-5">
                            <path d="m12 19-7-7 7-7"></path>
                            <path d="M19 12H5"></path>
                        </svg>
                    </button>
                    <button class="carousel-next inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 w-10 disabled:pointer-events-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right size-5">
                            <path d="M5 12h14"></path>
                            <path d="m12 5 7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="w-full overflow-hidden">
            <div class="relative" role="region" aria-roledescription="carousel">
                <div class="overflow-hidden">
                    <div class="carousel-container flex transition-transform duration-300 md:pl-24" style="cursor: grab; transition: transform .3s ease-out; transform: translateX(0)">
                        <?php while ($personajes->have_posts()) : $personajes->the_post(); 
                            $frase_celebre = get_field('frase_celebre');
                        ?>
                            <div role="group" aria-roledescription="slide" class="min-w-0 shrink-0 grow-0 basis-full max-w-[320px] pl-5 lg:max-w-[360px]">
                                <a href="<?php the_permalink(); ?>" class="group rounded-xl">
                                    <div class="group relative h-full min-h-[27rem] max-w-full overflow-hidden rounded-xl bg-red-200 md:aspect-[5/4] lg:aspect-[16/9]">
                                            <?php 
                                                $avatar = get_field('avatar');
                                                if ($avatar) : 
                                            ?>
                                            <img src="<?php echo esc_url($avatar); ?>" alt="<?php the_title_attribute(); ?>" class="absolute size-full object-cover object-center transition-transform duration-300 group-hover:scale-105">
                                        <?php endif; ?>
                                        <div class="absolute inset-0 h-full bg-gradient-to-b from-black/20 to-black/80 mix-blend-multiply"></div>
                                        <div class="absolute inset-x-0 bottom-0 flex flex-col items-start p-6 text-white md:p-8">
                                            <span class="mb-2 inline-flex items-center rounded-full bg-red-500 px-3 py-1 text-xs font-medium text-white"><?php echo esc_html($serie->post_title); ?></span>
                                            <div class="mb-2 pt-4 text-xl font-semibold md:mb-3 md:pt-4 lg:pt-4"><?php the_title(); ?></div>
                                            <?php if ($frase_celebre) : ?>
                                                <div class="mb-8 line-clamp-2 md:mb-12 lg:mb-9"><?php echo esc_html($frase_celebre); ?></div>
                                            <?php endif; ?>
                                            <div class="flex items-center text-sm">
                                                Leer más
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 size-5 transition-transform group-hover:translate-x-1">
                                                    <path d="M5 12h14"></path>
                                                    <path d="m12 5 7 7-7 7"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <?php
    $blog_args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'cat' => 21
    );
    
    $blog_query = new WP_Query($blog_args);
    
    if ($blog_query->have_posts()) :
    ?>
    <section id="blog" class="py-32">
        <div class="container">
            <div class="mx-auto flex max-w-screen-md flex-col items-center gap-4 text-center">
                <div class="inline-flex items-center rounded-full border px-2.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 text-foreground gap-1 py-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text h-full w-4">
                        <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                        <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                        <path d="M10 9H8"></path>
                        <path d="M16 13H8"></path>
                        <path d="M16 17H8"></path>
                    </svg>
                    Nuestros Blogs
                </div>
                <h1 class="text-balance text-4xl font-semibold">Educación Digital para la Paz Mediática</h1>
                <p class="text-muted-foreground">Explora nuestro blog para conocer artículos sobre alfabetización mediática, inteligencia artificial y transformación digital para la paz en Colombia.</p>
            </div>
            
            <div class="mt-20 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                    <a class="rounded-xl border" href="<?php the_permalink(); ?>">
                        <div class="p-2">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', array('class' => 'aspect-video w-full rounded-lg object-cover')); ?>
                            <?php endif; ?>
                        </div>
                        <div class="px-3 pb-4 pt-2">
                            <h2 class="mb-1 font-medium"><?php the_title(); ?></h2>
                            <p class="line-clamp-2 text-sm text-muted-foreground"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            <div data-orientation="horizontal" role="none" class="shrink-0 bg-border h-[1px] w-full my-5"></div>
                            <div class="flex items-center justify-between gap-4">
                                <div class="flex items-center gap-3">
                                    <?php echo get_avatar(get_the_author_meta('ID'), 36, '', '', array('class' => 'relative flex shrink-0 overflow-hidden size-9 rounded-full ring-1 ring-input')); ?>
                                    <span class="text-sm font-medium"><?php the_author(); ?></span>
                                </div>
                                <div class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-secondary text-secondary-foreground hover:bg-secondary/80 h-fit">
                                    <?php echo get_reading_time(); ?> Min Read
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endwhile; ?>
            </div>

            <div class="mt-10 flex justify-center">
                <a href="<?php echo get_category_link(21); ?>" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2">
                    Ver todos los blogs
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 h-full w-4">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    <?php 
    endif;
    wp_reset_postdata();
    ?>

    <?php
    get_template_part('template-parts/cta-modulos', null, array(
        'title' => 'Únete a Academia',
        'description' => 'Descubre una nueva forma de aprender y desarrollarte profesionalmente. Accede a todos nuestros módulos y contenido exclusivo.',
        'cta_primary_text' => 'Comenzar ahora',
        'cta_primary_url' => '/registro',
        'cta_secondary_text' => 'Contactar con ventas',
        'cta_secondary_url' => '/contacto',
        'doc_title' => 'Planes y precios',
        'doc_description' => 'Conoce nuestros planes y encuentra el que mejor se adapte a ti.',
        'doc_url' => '/planes',
        'guide_title' => 'Primeros pasos',
        'guide_description' => 'Guía completa para comenzar tu viaje en Academia.',
        'guide_url' => '/guia'
    ));
    ?>

</main>

<?php
get_footer();

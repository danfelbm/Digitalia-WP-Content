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
        'title' => get_field('enlinea_header')['title'],
        'subtitle' => get_field('enlinea_header')['subtitle'],
        'show_cta' => true,
        'cta_text' => get_field('enlinea_header')['cta']['title'],
        'cta_url' => get_field('enlinea_header')['cta']['url']
    ));
    ?>

    <section class="pb-8 pt-12">
        <div class="container">
            <div class="grid items-center gap-10 md:gap-20 lg:grid-cols-2">
                <div class="flex flex-col gap-2.5 py-8">
                    <h1 class="text-4xl font-bold lg:text-5xl"><?php echo get_field('enlinea_main_content')['main_title']; ?></h1>
                    <p class="text-muted-foreground"><?php echo get_field('enlinea_main_content')['main_description']; ?></p>
                    <div class="flex flex-col gap-6 py-10 sm:flex-row sm:gap-16">
                        <div class="flex gap-4 leading-5">
                            <span class="relative flex shrink-0 overflow-hidden size-9 rounded-full ring-1 ring-input">
                                <?php 
                                $member1 = get_field('enlinea_team')['member_1'];
                                $member1_image = $member1['image'];
                                ?>
                                <img class="aspect-square h-full w-full" alt="<?php echo esc_attr($member1['name']); ?>" 
                                     src="<?php echo esc_url($member1_image['url']); ?>">
                            </span>
                            <div class="text-sm">
                                <p class="font-medium"><?php echo $member1['name']; ?></p>
                                <p class="text-muted-foreground"><?php echo $member1['position']; ?></p>
                            </div>
                        </div>
                        <div class="flex gap-4 leading-5">
                            <span class="relative flex shrink-0 overflow-hidden size-9 rounded-full ring-1 ring-input">
                                <?php 
                                $member2 = get_field('enlinea_team')['member_2'];
                                $member2_image = $member2['image'];
                                ?>
                                <img class="aspect-square h-full w-full" alt="<?php echo esc_attr($member2['name']); ?>" 
                                     src="<?php echo esc_url($member2_image['url']); ?>">
                            </span>
                            <div class="text-sm">
                                <p class="font-medium"><?php echo $member2['name']; ?></p>
                                <p class="text-muted-foreground"><?php echo $member2['position']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php 
                    $cta_button = get_field('enlinea_main_content')['cta_button'];
                    if ($cta_button): ?>
                    <a href="<?php echo esc_url($cta_button['url']); ?>" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-red-500 text-primary-foreground hover:bg-red-600 h-10 px-4 py-2 w-fit">
                        <?php echo esc_html($cta_button['title']); ?>
                    </a>
                    <?php endif; ?>
                </div>
                <?php 
                $main_image = get_field('enlinea_main_content')['main_image'];
                if ($main_image): ?>
                <img src="<?php echo esc_url($main_image['url']); ?>" 
                     alt="<?php echo esc_attr($main_image['alt']); ?>" 
                     class="h-full max-h-[420px] w-full rounded-xl object-cover">
                <?php endif; ?>
            </div>
            <div data-orientation="horizontal" role="none" class="shrink-0 bg-border h-[1px] w-full my-12"></div>
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                <?php 
                $stats = get_field('enlinea_stats');
                $stat_items = array(
                    $stats['stat_1'],
                    $stats['stat_2'],
                    $stats['stat_3'],
                    $stats['stat_4']
                );
                
                foreach ($stat_items as $stat): ?>
                <div>
                    <h2 class="mb-2 text-4xl text-red-500 font-semibold md:text-6xl"><?php echo esc_html($stat['number']); ?></h2>
                    <p class="text-muted-foreground"><?php echo esc_html($stat['label']); ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- section la historia -->
    <section class="py-32">
        <div>
            <?php $historia = get_field('enlinea_historia'); ?>
            <div id="la-historia" class="flex py-40 items-center justify-center bg-[linear-gradient(rgba(0,0,0,.6),rgba(0,0,0,.6)),url('/wp-content/uploads/2024/12/Screenshot-2024-12-23-at-4.06.02%E2%80%AFAM.jpg')] bg-cover bg-center">
                <div class="flex flex-col gap-8 text-center text-primary-foreground max-w-6xl mx-auto px-4 md:px-8">
                    <div class="flex items-center justify-center gap-2 text-2xl font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-zap h-full w-7">
                            <path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"></path>
                        </svg> 
                        <?php echo esc_html($historia['subtitle']); ?>
                    </div>
                    <h2 class="text-5xl font-bold"><?php echo esc_html($historia['title']); ?></h2>
                    <div class="py-8 grid grid-cols-1 md:grid-cols-2 gap-8 text-left text-lg">
                        <div>
                            <?php echo wpautop(esc_html($historia['column_1'])); ?>
                        </div>
                        <div>
                            <?php echo wpautop(esc_html($historia['column_2'])); ?>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center gap-2 sm:flex-row pb-16">
                        <?php if ($historia['cta_primary']): ?>
                        <a href="<?php echo esc_url($historia['cta_primary']['url']); ?>" 
                           class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-11 rounded-md px-8 bg-red-500 text-white hover:bg-red-600">
                            <?php echo esc_html($historia['cta_primary']['title']); ?>
                        </a>
                        <?php endif; ?>

                        <?php if ($historia['cta_secondary']): ?>
                        <a href="<?php echo esc_url($historia['cta_secondary']['url']); ?>" 
                           class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border-input h-11 rounded-md px-8 border-0 bg-background/20 backdrop-blur-sm hover:bg-background/30 hover:text-primary-foreground">
                            <?php echo esc_html($historia['cta_secondary']['title']); ?>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- section screenshots grid -->
    <section class="relative -mt-72 md:-mt-32">
        <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php $screenshots = get_field('enlinea_screenshots'); ?>
                <!-- Column 1 -->
                <div class="flex flex-col gap-6 md:-translate-y-12">
                    <?php 
                    $col1 = $screenshots['column_1'];
                    if ($col1['image_1']): ?>
                        <img src="<?php echo esc_url($col1['image_1']['url']); ?>" 
                             alt="<?php echo esc_attr($col1['image_1']['alt']); ?>" 
                             class="w-full rounded-2xl" />
                    <?php endif; 
                    if ($col1['image_2']): ?>
                        <img src="<?php echo esc_url($col1['image_2']['url']); ?>" 
                             alt="<?php echo esc_attr($col1['image_2']['alt']); ?>" 
                             class="w-full rounded-2xl" />
                    <?php endif; ?>
                </div>
                <!-- Column 2 (offset up) -->
                <div class="flex flex-col gap-6 md:-translate-y-32">
                    <?php 
                    $col2 = $screenshots['column_2'];
                    if ($col2['image_1']): ?>
                        <img src="<?php echo esc_url($col2['image_1']['url']); ?>" 
                             alt="<?php echo esc_attr($col2['image_1']['alt']); ?>" 
                             class="w-full rounded-2xl" />
                    <?php endif; 
                    if ($col2['image_2']): ?>
                        <img src="<?php echo esc_url($col2['image_2']['url']); ?>" 
                             alt="<?php echo esc_attr($col2['image_2']['alt']); ?>" 
                             class="w-full rounded-2xl" />
                    <?php endif; ?>
                </div>
                <!-- Column 3 (no offset) -->
                <div class="flex flex-col gap-6 md:-translate-y-12">
                    <?php 
                    $col3 = $screenshots['column_3'];
                    if ($col3['image_1']): ?>
                        <img src="<?php echo esc_url($col3['image_1']['url']); ?>" 
                             alt="<?php echo esc_attr($col3['image_1']['alt']); ?>" 
                             class="w-full rounded-2xl" />
                    <?php endif; 
                    if ($col3['image_2']): ?>
                        <img src="<?php echo esc_url($col3['image_2']['url']); ?>" 
                             alt="<?php echo esc_attr($col3['image_2']['alt']); ?>" 
                             class="w-full rounded-2xl" />
                    <?php endif; ?>
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
                    <?php $episodes_header = get_field('enlinea_episodes_header'); ?>
                    <h2 class="text-3xl font-medium md:text-4xl lg:text-5xl mb-8"><?php echo esc_html($episodes_header['title']); ?></h2>
                    <p class="text-2xl md:text-4xl lg:text-2xl md:text-base"><?php echo esc_html($episodes_header['description']); ?></p>
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
                                            <span class="mb-2 inline-flex items-center rounded-full bg-red-500 px-3 py-1 text-xs font-medium text-white"><?php echo esc_html($temporada->name); ?></span>
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
                    <?php $characters_header = get_field('enlinea_characters_header'); ?>
                    <h2 class="text-3xl font-medium md:text-4xl lg:text-5xl mb-8"><?php echo esc_html($characters_header['title']); ?></h2>
                    <p class="text-2xl md:text-4xl lg:text-2xl md:text-base"><?php echo esc_html($characters_header['description']); ?></p>
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
                                            <?php
                                            $temporada = $serie; // Get the first temporada
                                            ?>
                                            <span class="mb-2 inline-flex items-center rounded-full bg-red-500 px-3 py-1 text-xs font-medium text-white"><?php echo esc_html($temporada->post_title); ?></span>
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
                <?php $blog_header = get_field('enlinea_blog_header'); ?>
                <div class="inline-flex items-center rounded-full border px-2.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 text-foreground gap-1 py-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text h-full w-4">
                        <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                        <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                        <path d="M10 9H8"></path>
                        <path d="M16 13H8"></path>
                        <path d="M16 17H8"></path>
                    </svg>
                    <?php echo esc_html($blog_header['subtitle']); ?>
                </div>
                <h1 class="text-balance text-4xl font-semibold"><?php echo esc_html($blog_header['title']); ?></h1>
                <p class="text-muted-foreground"><?php echo esc_html($blog_header['description']); ?></p>
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

</main>

<?php
get_footer();

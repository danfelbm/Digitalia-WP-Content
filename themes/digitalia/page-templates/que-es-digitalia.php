<?php
/**
 * Template Name: Qué es Digitalia
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    get_template_part('template-parts/page-header', null, array(
        'title' => 'Qué es Digitalia',
        'subtitle' => 'Conoce más sobre nuestra plataforma digital y su propósito.',
        'show_cta' => false,
        'cta_text' => 'Más información',
        'cta_url' => '#',
        'show_credit_card_text' => false,
        'credit_card_text' => ''
    ));
    ?>
    
    <?php get_template_part('template-parts/page-content'); ?>

    <section class="magicpattern py-32">
        <div class="container flex flex-col gap-28">
            <div class="flex flex-col gap-7">
                <h1 class="text-4xl font-semibold lg:text-7xl">Educomunicación para la <span class="bg-slate-400/30">paz</span></h1>
                <p class="max-w-xl text-lg">Digital-IA es un programa nacional de alfabetización mediática e informacional que empodera a la ciudadanía en la era digital, promoviendo la paz y la democracia a través de la educación.</p>
            </div>
            <div class="grid gap-6 md:grid-cols-2">
                <img src="https://www.shadcnblocks.com/images/block/placeholder-1.svg" alt="Educomunicación Digital" class="size-full max-h-96 rounded-2xl object-cover">
                <div class="flex flex-col justify-between gap-10 rounded-2xl bg-muted p-10">
                    <p class="text-sm text-muted-foreground">NUESTRA MISIÓN</p>
                    <p class="text-lg font-medium">Buscamos democratizar el conocimiento digital y mediático, empoderando a la ciudadanía para enfrentar los desafíos de las tecnologías emergentes, promoviendo una comunicación ética y constructiva en favor de la paz.</p>
                </div>
            </div>
            <div class="flex flex-col gap-6 md:gap-20">
                <div class="max-w-xl">
                    <h2 class="mb-2.5 text-3xl font-semibold md:text-5xl">Transformando la alfabetización digital en Colombia</h2>
                    <p class="text-muted-foreground">A través de tres módulos interconectados, construimos un futuro digital más inclusivo y consciente.</p>
                </div>
                <div class="grid gap-10 md:grid-cols-3">
                    <div class="flex flex-col">
                        <div class="mb-5 flex size-12 items-center justify-center rounded-2xl bg-accent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-graduation-cap"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                        </div>
                        <h3 class="mb-3 mt-2 text-lg font-semibold">AcadeMÍA Digital-IA</h3>
                        <p class="text-muted-foreground">Plataforma E-learning de autoformación en nuevos paradigmas tecnológicos con enfoque de paz mediática, derechos y deberes ciudadanos.</p>
                    </div>
                    <div class="flex flex-col">
                        <div class="mb-5 flex size-12 items-center justify-center rounded-2xl bg-accent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-video"><path d="m22 8-6 4 6 4V8Z"/><rect width="14" height="12" x="2" y="6" rx="2" ry="2"/></svg>
                        </div>
                        <h3 class="mb-3 mt-2 text-lg font-semibold">Serie Web "En Línea"</h3>
                        <p class="text-muted-foreground">Difusión de acciones ciudadanas, públicas, privadas y asociativas afirmativas de paz en Colombia a través de contenido audiovisual.</p>
                    </div>
                    <div class="flex flex-col">
                        <div class="mb-5 flex size-12 items-center justify-center rounded-2xl bg-accent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-network"><rect x="16" y="16" width="6" height="6" rx="1"/><rect x="2" y="16" width="6" height="6" rx="1"/><rect x="9" y="2" width="6" height="6" rx="1"/><path d="M5 16v-4h14v4"/><path d="M12 12V8"/></svg>
                        </div>
                        <h3 class="mb-3 mt-2 text-lg font-semibold">Estrategia Transmedia</h3>
                        <p class="text-muted-foreground">Expansión del mensaje Digital-IA a través de múltiples plataformas, generando sinergias entre ciudadanía y el sistema Digitalia.</p>
                    </div>
                </div>
            </div>
            <div class="grid gap-10 md:grid-cols-2">
                <div>
                    <p class="mb-10 text-sm font-medium text-muted-foreground">NUESTRO COMPROMISO</p>
                    <h2 class="mb-2.5 text-3xl font-semibold md:text-5xl">Construyendo una ciudadanía digital consciente</h2>
                </div>
                <div>
                    <img src="https://www.shadcnblocks.com/images/block/placeholder-2.svg" alt="Ciudadanía Digital" class="mb-6 max-h-36 w-full rounded-xl object-cover">
                    <p class="text-muted-foreground">En la era de la cuarta y quinta revolución industrial, cada ciudadano es un medio de comunicación. Trabajamos para empoderar a la ciudadanía con las herramientas y conocimientos necesarios para una comunicación ética y responsable.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-32">
        <div class="container flex flex-col items-start text-left">
            <p class="semibold">Nuestro equipo</p>
            <h2 class="my-6 text-pretty text-2xl font-bold lg:text-4xl">Conoce al equipo</h2>
            <p class="mb-8 max-w-3xl text-muted-foreground lg:text-xl">Somos un equipo multidisciplinario comprometido con la educomunicación y la transformación digital.</p>
        </div>
        <div class="container mt-16 grid gap-x-12 gap-y-8 lg:grid-cols-2">
            <?php
            $users = get_users();
            foreach ($users as $user) :
                $equipo = get_field('equipo', 'user_' . $user->ID);
                if ($equipo) :
                    // Get module color based on equipo value
                    $colors = digitalia_get_color_schemes('pill');
                    $pill_color = isset($colors[$equipo]) ? $colors[$equipo] : 'bg-gray-300/30';
            ?>
                <div class="flex flex-col sm:flex-row">
                    <div class="mb-4 aspect-square w-full shrink-0 text-clip bg-accent sm:mb-0 sm:mr-5 sm:size-48">
                        <?php echo get_avatar($user->ID, 192); ?>
                    </div>
                    <div class="flex flex-1 flex-col items-start">
                        <p class="w-full text-left font-medium">
                            <a href="<?php echo esc_url(get_author_posts_url($user->ID)); ?>" class="hover:text-accent-foreground transition-colors">
                                <?php echo esc_html($user->display_name); ?>
                            </a>
                        </p>
                        <p class="w-full text-left">
                            <span class="inline-flex items-center rounded-full px-2 py-1 text-xs <?php echo $pill_color; ?>">
                                <?php echo esc_html($equipo); ?>
                            </span>
                        </p>
                        <p class="w-full py-2 text-sm text-muted-foreground"><?php echo esc_html($user->description); ?></p>
                        
                        <?php if (have_rows('red_social', 'user_' . $user->ID)) : ?>
                            <div class="my-2 flex items-start gap-4">
                                <?php while (have_rows('red_social', 'user_' . $user->ID)) : the_row(); 
                                    $social_type = get_sub_field('red_social_item');
                                    $profile_link = get_sub_field('link_al_perfil');
                                    if ($profile_link) :
                                        switch ($social_type) {
                                            case 'facebook': ?>
                                                <a href="<?php echo esc_url($profile_link); ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook size-4 text-muted-foreground"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                                                </a>
                                            <?php break;
                                            case 'twitter': ?>
                                                <a href="<?php echo esc_url($profile_link); ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-twitter size-4 text-muted-foreground"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/></svg>
                                                </a>
                                            <?php break;
                                            case 'instagram': ?>
                                                <a href="<?php echo esc_url($profile_link); ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram size-4 text-muted-foreground"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                                                </a>
                                            <?php break;
                                            case 'tiktok': ?>
                                                <a href="<?php echo esc_url($profile_link); ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-music size-4 text-muted-foreground"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>
                                                </a>
                                            <?php break;
                                            case 'linkedin': ?>
                                                <a href="<?php echo esc_url($profile_link); ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-linkedin size-4 text-muted-foreground"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/></svg>
                                                </a>
                                            <?php break;
                                            case 'youtube': ?>
                                                <a href="<?php echo esc_url($profile_link); ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-youtube size-4 text-muted-foreground"><path d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17"/><path d="m10 15 5-3-5-3z"/></svg>
                                                </a>
                                            <?php break;
                                        }
                                    endif;
                                endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php 
                endif;
            endforeach; 
            ?>
        </div>
    </section>

    <section class="py-32">
        <div class="container flex flex-col items-start gap-16 lg:px-16">
            <div class="text-left">
                <p class="mb-6 text-xs font-medium uppercase tracking-wider text-muted-foreground">Blog y Noticias</p>
                <h2 class="mb-3 text-pretty text-3xl font-semibold md:mb-4 md:text-4xl lg:mb-6 lg:max-w-3xl lg:text-5xl">Últimas publicaciones</h2>
                <p class="mb-8 text-muted-foreground md:text-base lg:max-w-2xl lg:text-lg">Mantente al día con las últimas noticias y artículos sobre educomunicación, alfabetización mediática y transformación digital.</p>
                <a href="/blog-y-noticias" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 w-full sm:w-auto">
                    Leer más entradas del blog
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right ml-2 size-4">
                        <path d="M5 12h14"></path>
                        <path d="m12 5 7 7-7 7"></path>
                    </svg>
                </a>
            </div>
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 lg:gap-8">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 6,
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                $latest_posts = new WP_Query($args);

                if ($latest_posts->have_posts()) :
                    while ($latest_posts->have_posts()) : $latest_posts->the_post();
                ?>
                    <a href="<?php the_permalink(); ?>" class="flex flex-col text-clip rounded-xl border border-border">
                        <div>
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', array('class' => 'aspect-[16/9] size-full object-cover object-center')); ?>
                            <?php else : ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.jpg" alt="<?php the_title(); ?>" class="aspect-[16/9] size-full object-cover object-center">
                            <?php endif; ?>
                        </div>
                        <div class="px-6 py-8 md:px-8 md:py-10 lg:px-10 lg:py-12">
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
</main>

<?php
get_footer();

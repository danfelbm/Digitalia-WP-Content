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
        'title' => get_field('qd_header')['title'] ?: 'Qué es Digitalia',
        'subtitle' => get_field('qd_header')['subtitle'] ?: 'Conoce más sobre nuestra plataforma digital y su propósito.',
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
                <h1 class="text-4xl font-semibold lg:text-7xl"><?php echo get_field('qd_hero')['title'] ?: 'Educomunicación para la'; ?> <span class="bg-slate-400/30">paz</span></h1>
                <p class="max-w-xl text-lg"><?php echo get_field('qd_hero')['description']; ?></p>
            </div>
            <div class="grid gap-6 md:grid-cols-2">
                <?php 
                $hero_image = get_field('qd_hero')['image'];
                if ($hero_image): ?>
                    <img src="<?php echo esc_url($hero_image['url']); ?>" 
                         alt="<?php echo esc_attr($hero_image['alt']); ?>" 
                         class="size-full max-h-96 rounded-2xl object-cover">
                <?php else: ?>
                    <img src="https://www.shadcnblocks.com/images/block/placeholder-1.svg" 
                         alt="Educomunicación Digital" 
                         class="size-full max-h-96 rounded-2xl object-cover">
                <?php endif; ?>
                <div class="flex flex-col justify-between gap-10 rounded-2xl bg-muted p-10">
                    <p class="text-sm text-muted-foreground"><?php echo get_field('qd_hero')['mission_label']; ?></p>
                    <p class="text-lg font-medium"><?php echo get_field('qd_hero')['mission_text']; ?></p>
                </div>
            </div>
            <div class="flex flex-col gap-6 md:gap-20">
                <div class="max-w-xl">
                    <h2 class="mb-2.5 text-3xl font-semibold md:text-5xl"><?php echo get_field('qd_transformation')['title']; ?></h2>
                    <p class="text-muted-foreground"><?php echo get_field('qd_transformation')['subtitle']; ?></p>
                </div>
                <div class="grid gap-10 md:grid-cols-3">
                    <?php 
                    $modules = array(
                        'module1' => get_field('qd_modules')['module1'],
                        'module2' => get_field('qd_modules')['module2'],
                        'module3' => get_field('qd_modules')['module3']
                    );
                    
                    foreach ($modules as $module): ?>
                        <div class="flex flex-col">
                            <div class="mb-5 flex size-12 items-center justify-center rounded-2xl bg-accent">
                                <i class="fa <?php echo esc_attr($module['icon']); ?>"></i>
                            </div>
                            <h3 class="mb-3 mt-2 text-lg font-semibold"><?php echo $module['title']; ?></h3>
                            <p class="text-muted-foreground"><?php echo $module['description']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="grid gap-10 md:grid-cols-2">
                <div>
                    <p class="mb-10 text-sm font-medium text-muted-foreground"><?php echo get_field('qd_commitment')['label']; ?></p>
                    <h2 class="mb-2.5 text-3xl font-semibold md:text-5xl"><?php echo get_field('qd_commitment')['title']; ?></h2>
                </div>
                <div>
                    <?php 
                    $commitment_image = get_field('qd_commitment')['image'];
                    if ($commitment_image): ?>
                        <img src="<?php echo esc_url($commitment_image['url']); ?>" 
                             alt="<?php echo esc_attr($commitment_image['alt']); ?>" 
                             class="mb-6 max-h-36 w-full rounded-xl object-cover">
                    <?php else: ?>
                        <img src="https://www.shadcnblocks.com/images/block/placeholder-2.svg" 
                             alt="Ciudadanía Digital" 
                             class="mb-6 max-h-36 w-full rounded-xl object-cover">
                    <?php endif; ?>
                    <p class="text-muted-foreground"><?php echo get_field('qd_commitment')['description']; ?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-32">
        <div class="container flex flex-col items-start text-left">
            <p class="semibold"><?php echo get_field('qd_team')['label']; ?></p>
            <h2 class="my-6 text-pretty text-2xl font-bold lg:text-4xl"><?php echo get_field('qd_team')['title']; ?></h2>
            <p class="mb-8 max-w-3xl text-muted-foreground lg:text-xl"><?php echo get_field('qd_team')['description']; ?></p>
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
                                                    <i class="fa fa-facebook size-4 text-muted-foreground"></i>
                                                </a>
                                            <?php break;
                                            case 'twitter': ?>
                                                <a href="<?php echo esc_url($profile_link); ?>">
                                                    <i class="fa fa-twitter size-4 text-muted-foreground"></i>
                                                </a>
                                            <?php break;
                                            case 'instagram': ?>
                                                <a href="<?php echo esc_url($profile_link); ?>">
                                                    <i class="fa fa-instagram size-4 text-muted-foreground"></i>
                                                </a>
                                            <?php break;
                                            case 'tiktok': ?>
                                                <a href="<?php echo esc_url($profile_link); ?>">
                                                    <i class="fa fa-tiktok size-4 text-muted-foreground"></i>
                                                </a>
                                            <?php break;
                                            case 'linkedin': ?>
                                                <a href="<?php echo esc_url($profile_link); ?>">
                                                    <i class="fa fa-linkedin size-4 text-muted-foreground"></i>
                                                </a>
                                            <?php break;
                                            case 'youtube': ?>
                                                <a href="<?php echo esc_url($profile_link); ?>">
                                                    <i class="fa fa-youtube size-4 text-muted-foreground"></i>
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
        <div class="container flex flex-col items-start gap-16 lg:px-9">
            <div class="text-left">
                <p class="mb-6 text-xs font-medium uppercase tracking-wider text-muted-foreground"><?php echo get_field('qd_blog')['label']; ?></p>
                <h2 class="mb-3 text-pretty text-3xl font-semibold md:mb-4 md:text-4xl lg:mb-6 lg:max-w-3xl lg:text-5xl"><?php echo get_field('qd_blog')['title']; ?></h2>
                <p class="mb-8 text-muted-foreground md:text-base lg:max-w-2xl lg:text-lg"><?php echo get_field('qd_blog')['description']; ?></p>
                <?php 
                $blog_button = get_field('qd_blog')['button'];
                $button_text = get_field('qd_blog')['button_text'];
                if ($blog_button): ?>
                    <a href="<?php echo esc_url($blog_button['url']); ?>" 
                       class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 w-full sm:w-auto">
                        <?php echo esc_html($button_text); ?>
                        <i class="fa fa-arrow-right ml-2 size-4"></i>
                    </a>
                <?php else: ?>
                    <a href="/blog-y-noticias" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 w-full sm:w-auto">
                        <?php echo esc_html($button_text ?: 'Leer más entradas del blog'); ?>
                        <i class="fa fa-arrow-right ml-2 size-4"></i>
                    </a>
                <?php endif; ?>
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
                                <i class="fa fa-arrow-right ml-2 size-4"></i>
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

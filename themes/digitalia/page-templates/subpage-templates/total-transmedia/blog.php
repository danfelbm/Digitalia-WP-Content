<?php
/**
 * Template Name: Total Transmedia - Blog
 * Description: Page template for displaying regional impact of Total Transmedia
 */

get_header();
?>

<?php
    $blog_args = array(
        'post_type' => 'post',
        'posts_per_page' => 2,
        'cat' => 22
    );

    $blog_query = new WP_Query($blog_args);

    if ($blog_query->have_posts()):
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
                while ($blog_query->have_posts()):
                    $blog_query->the_post();
                    $categories = get_the_category();
                    ?>
                <a href="<?php the_permalink(); ?>" class="group order-last grid gap-y-6 sm:order-first sm:col-span-12 sm:grid-cols-10 sm:gap-x-5 sm:gap-y-0 md:items-center md:gap-x-8 lg:col-span-10 lg:col-start-2 lg:gap-x-12">
                    <div class="sm:col-span-5">
                        <div class="mb-4 md:mb-6">
                            <div class="flex gap-2 text-xs uppercase tracking-wider flex-wrap">
                                <?php foreach ($categories as $category): ?>
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
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('large', array('class' => 'size-full object-cover transition-transform group-hover:scale-105')); ?>
                            <?php else: ?>
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

    <?php get_footer(); ?>
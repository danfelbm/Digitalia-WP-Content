<?php
/**
 * The template for displaying single podcast posts
 *
 * @package digitalia
 */

get_header();
?>

<main id="primary" class="site-main bg-[#121212] min-h-screen text-white">
    <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <!-- Hero Section -->
            <div class="relative">
                <!-- Gradient Background -->
                <div class="absolute inset-0 bg-gradient-to-b from-[#535353] to-[#121212] opacity-90"></div>

                <!-- Main Content -->
                <div class="relative container mx-auto px-8 pt-12 pb-8">
                    <div class="flex flex-col lg:flex-row gap-8 items-start">
                        <!-- Featured Image -->
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="w-64 h-64 lg:w-[320px] lg:h-[320px] flex-shrink-0 rounded-md overflow-hidden shadow-2xl">
                                <?php the_post_thumbnail('full', ['class' => 'w-full h-full object-cover']); ?>
                            </div>
                        <?php endif; ?>

                        <!-- Episode Info -->
                        <div class="flex-1 pt-4">
                            <div class="text-sm font-medium text-white/60 mb-2">Episodio de Podcast</div>
                            <h1 class="text-5xl font-bold mb-6 text-white">
                                <?php the_title(); ?>
                            </h1>

                            <?php if (get_field('episode_excerpt') || has_excerpt()) : ?>
                            <p class="text-lg text-white/80 line-clamp-2 mb-6">
                                <?php echo get_field('episode_excerpt') ?: get_the_excerpt(); ?>
                            </p>
                            <?php endif; ?>

                            <div class="flex items-center gap-6 text-white/60 text-sm mb-8">
                                <div class="flex items-center gap-2">
                                    <img class="w-8 h-8 rounded-full" src="<?php echo get_avatar_url(get_the_author_meta('ID'), ['size' => 96]); ?>" alt="">
                                    <span><?php the_author(); ?></span>
                                </div>
                                <time datetime="<?php echo get_the_date('c'); ?>">
                                    <?php echo get_the_date(); ?>
                                </time>
                                <?php if (get_field('episode_duration')) : ?>
                                <div class="flex items-center gap-1">
                                    <i class="fa-regular fa-clock"></i>
                                    <span><?php echo get_field('episode_duration'); ?></span>
                                </div>
                                <?php endif; ?>
                            </div>

                            <!-- Player Controls -->
                            <div class="flex items-center gap-4">
                                <button class="w-14 h-14 flex items-center justify-center bg-[#1DB954] hover:bg-[#1ed760] rounded-full text-black transition-all">
                                    <i class="fa-solid fa-play text-2xl"></i>
                                </button>
                                <audio controls class="flex-1 h-12">
                                    <source src="<?php echo esc_url(get_field('episode_audio') ?: 'https://ejemplo.com/podcast-demo.mp3'); ?>" type="audio/mpeg">
                                </audio>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Sections -->
            <div class="container mx-auto px-8 py-12">
                <!-- Listen on Other Platforms -->
                <div class="mb-16">
                    <h2 class="text-2xl font-bold mb-8">Escuchar en otras plataformas</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        <a href="#spotify" class="group bg-[#282828] hover:bg-[#323232] p-4 rounded-lg transition-all">
                            <div class="flex items-center gap-4">
                                <i class="fa-brands fa-spotify text-3xl text-[#1DB954]"></i>
                                <span class="font-medium">Spotify</span>
                            </div>
                        </a>
                        <a href="#apple" class="group bg-[#282828] hover:bg-[#323232] p-4 rounded-lg transition-all">
                            <div class="flex items-center gap-4">
                                <i class="fa-brands fa-apple text-3xl"></i>
                                <span class="font-medium">Apple</span>
                            </div>
                        </a>
                        <a href="#overcast" class="group bg-[#282828] hover:bg-[#323232] p-4 rounded-lg transition-all">
                            <div class="flex items-center gap-4">
                                <i class="fa-solid fa-broadcast-tower text-3xl text-[#FC7E0F]"></i>
                                <span class="font-medium">Overcast</span>
                            </div>
                        </a>
                        <a href="#rss" class="group bg-[#282828] hover:bg-[#323232] p-4 rounded-lg transition-all">
                            <div class="flex items-center gap-4">
                                <i class="fa-solid fa-rss text-3xl text-[#FFA500]"></i>
                                <span class="font-medium">RSS</span>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Episode Description -->
                <div class="mb-16">
                    <h2 class="text-2xl font-bold mb-8">Acerca de este episodio</h2>
                    <div class="bg-[#282828] rounded-lg p-8">
                        <div class="prose prose-invert max-w-none">
                            <?php the_content(); ?>
                            
                            <?php if (!get_the_content()) : ?>
                            <p>En este episodio fascinante, exploramos las últimas tendencias en tecnología digital y su impacto en la sociedad moderna. Nuestro invitado especial, Dr. María González, experta en transformación digital, comparte sus perspectivas sobre el futuro del trabajo y la educación en la era post-pandémica.</p>
                            
                            <h3 class="text-xl font-semibold mt-8 mb-4">Temas Destacados:</h3>
                            <ul class="list-disc pl-6 space-y-3 text-white/80">
                                <li>Transformación digital en América Latina</li>
                                <li>Nuevas metodologías de trabajo remoto</li>
                                <li>Herramientas esenciales para la productividad</li>
                                <li>El futuro de la educación virtual</li>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Tags and Categories -->
                <?php if (get_the_category() || get_the_tags()) : ?>
                <div class="mb-16">
                    <h2 class="text-2xl font-bold mb-8">Temas relacionados</h2>
                    <div class="flex flex-wrap gap-3">
                        <?php
                        $categories = get_the_category();
                        foreach ($categories as $category) : ?>
                            <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" 
                               class="px-4 py-2 rounded-full bg-[#282828] hover:bg-[#323232] text-sm font-medium transition-all">
                                <?php echo esc_html($category->name); ?>
                            </a>
                        <?php endforeach; ?>
                        
                        <?php
                        $tags = get_the_tags();
                        if ($tags) : foreach ($tags as $tag) : ?>
                            <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" 
                               class="px-4 py-2 rounded-full bg-[#282828] hover:bg-[#323232] text-sm font-medium transition-all">
                                <?php echo esc_html($tag->name); ?>
                            </a>
                        <?php endforeach; endif; ?>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Episode Navigation -->
                <?php
                $prev_post = get_previous_post();
                $next_post = get_next_post();
                if ($prev_post || $next_post) :
                ?>
                <div>
                    <h2 class="text-2xl font-bold mb-8">Más episodios</h2>
                    <div class="grid sm:grid-cols-2 gap-6">
                        <?php if ($prev_post) : ?>
                        <a href="<?php echo esc_url(get_permalink($prev_post)); ?>" 
                           class="group bg-[#282828] hover:bg-[#323232] p-6 rounded-lg transition-all">
                            <div class="text-sm text-white/60 mb-2">Episodio anterior</div>
                            <h3 class="font-bold group-hover:text-[#1DB954] transition-colors">
                                <?php echo get_the_title($prev_post); ?>
                            </h3>
                        </a>
                        <?php endif; ?>
                        
                        <?php if ($next_post) : ?>
                        <a href="<?php echo esc_url(get_permalink($next_post)); ?>" 
                           class="group bg-[#282828] hover:bg-[#323232] p-6 rounded-lg transition-all">
                            <div class="text-sm text-white/60 mb-2">Siguiente episodio</div>
                            <h3 class="font-bold group-hover:text-[#1DB954] transition-colors">
                                <?php echo get_the_title($next_post); ?>
                            </h3>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </article>
    <?php endwhile; ?>
</main>

<?php
get_footer();

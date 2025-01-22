<?php
/**
 * The template for displaying episodio archive pages
 *
 * @package digitalia
 */

get_header();

// Get total number of episodes
$total_episodes = wp_count_posts('episodio')->publish;

// Get all categories and tags used in episodes
$episode_categories = get_categories(array(
    'taxonomy' => 'category',
    'object_type' => array('episodio')
));

$episode_tags = get_tags(array(
    'object_type' => array('episodio')
));

// Query to get all episode posts
$episode_query = new WP_Query(array(
    'post_type' => 'episodio',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC'
));
?>

<main id="primary" class="site-main bg-gray-50 min-h-screen py-12">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Archive Header -->
        <header class="relative mb-12 text-center">
            <div class="absolute inset-0 -z-10">
                <div class="absolute inset-0 bg-gradient-to-br from-purple-100/50 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 h-1/2 bg-gradient-to-t from-gray-50 to-transparent"></div>
            </div>
            <div class="max-w-3xl mx-auto pt-8 pb-12">
                <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-4">Nuestros Episodios</h1>
                <?php if ($total_episodes > 0) : ?>
                    <p class="text-xl text-gray-600 mb-6">
                        <?php printf(
                            _n(
                                'Descubre nuestra colección de %s episodio',
                                'Descubre nuestra colección de %s episodios',
                                $total_episodes,
                                'digitalia'
                            ),
                            number_format_i18n($total_episodes)
                        ); ?>
                    </p>
                <?php endif; ?>
                <?php
                $archive_description = get_the_archive_description();
                if ($archive_description) : ?>
                    <div class="prose max-w-2xl mx-auto text-gray-600">
                        <?php echo wp_kses_post($archive_description); ?>
                    </div>
                <?php endif; ?>
            </div>
        </header>

        <?php if ($episode_query->have_posts()) : ?>
            <!-- Filter Navigation -->
            <div class="mb-8">
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="space-y-6">
                        <!-- Categories Filter -->
                        <?php if ($episode_categories) : ?>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Categorías</h3>
                            <div class="flex flex-wrap gap-2" id="category-filters">
                                <?php foreach ($episode_categories as $category) : ?>
                                    <button 
                                        class="filter-btn px-3 py-1 rounded-full text-sm font-medium transition-colors"
                                        data-type="category"
                                        data-id="<?php echo esc_attr($category->term_id); ?>"
                                    >
                                        <?php echo esc_html($category->name); ?>
                                        <span class="ml-1 text-xs">(<?php echo $category->count; ?>)</span>
                                    </button>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Tags Filter -->
                        <?php if ($episode_tags) : ?>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Etiquetas</h3>
                            <div class="flex flex-wrap gap-2" id="tag-filters">
                                <?php foreach ($episode_tags as $tag) : ?>
                                    <button 
                                        class="filter-btn px-3 py-1 rounded-full text-sm font-medium transition-colors"
                                        data-type="tag"
                                        data-id="<?php echo esc_attr($tag->term_id); ?>"
                                    >
                                        <?php echo esc_html($tag->name); ?>
                                        <span class="ml-1 text-xs">(<?php echo $tag->count; ?>)</span>
                                    </button>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!-- Active Filters -->
                        <div id="active-filters" class="hidden border-t pt-4">
                            <h3 class="text-sm font-medium text-gray-700 mb-2">Filtros activos:</h3>
                            <div class="flex flex-wrap gap-2" id="active-filters-list"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Episodes Grid -->
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3" id="episodes-grid">
                <?php
                while ($episode_query->have_posts()) :
                    $episode_query->the_post();
                    // Get post terms
                    $post_categories = get_the_category();
                    $post_tags = get_the_tags();
                    $term_ids = array();
                    
                    if ($post_categories) {
                        foreach ($post_categories as $cat) {
                            $term_ids[] = 'category-' . $cat->term_id;
                        }
                    }
                    if ($post_tags) {
                        foreach ($post_tags as $tag) {
                            $term_ids[] = 'tag-' . $tag->term_id;
                        }
                    }
                    
                    // Get ACF fields
                    $episode_excerpt = get_field('episode_excerpt');
                    $episode_duration = get_field('episode_duration');
                    $episode_audio = get_field('episode_audio');
                    $episode_number = get_field('episode_number');
                    $episode_season = get_field('episode_season');
                ?>
                    <article <?php post_class('episode-item group bg-white rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden flex flex-col'); ?> data-terms="<?php echo esc_attr(implode(' ', $term_ids)); ?>">
                        <!-- Episode Thumbnail -->
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="block aspect-[16/9] overflow-hidden bg-gray-100 relative">
                                <?php the_post_thumbnail('medium_large', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-300']); ?>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span class="px-4 py-2 bg-white/90 text-gray-900 rounded-full text-sm font-medium">
                                        Ver Episodio
                                    </span>
                                </div>
                            </a>
                        <?php endif; ?>

                        <!-- Episode Info -->
                        <div class="flex-1 p-6">
                            <!-- Episode Number -->
                            <?php if ($episode_number || $episode_season) : ?>
                                <div class="text-sm font-medium text-purple-600 mb-2">
                                    <?php
                                    if ($episode_season) {
                                        printf('Temporada %d', $episode_season);
                                        if ($episode_number) echo ' • ';
                                    }
                                    if ($episode_number) {
                                        printf('Episodio %d', $episode_number);
                                    }
                                    ?>
                                </div>
                            <?php endif; ?>

                            <!-- Title -->
                            <h2 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-purple-700 transition-colors">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>

                            <!-- Metadata -->
                            <div class="flex items-center gap-4 text-sm text-gray-600 mb-4">
                                <time datetime="<?php echo get_the_date('c'); ?>" class="flex items-center gap-1.5">
                                    <i class="fa-regular fa-calendar text-gray-400"></i>
                                    <?php echo get_the_date(); ?>
                                </time>
                                <?php if ($episode_duration) : ?>
                                    <div class="flex items-center gap-1.5">
                                        <i class="fa-regular fa-clock text-gray-400"></i>
                                        <?php echo esc_html($episode_duration); ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Excerpt -->
                            <?php if ($episode_excerpt) : ?>
                                <div class="text-gray-600 line-clamp-3 mb-4">
                                    <?php echo wp_kses_post($episode_excerpt); ?>
                                </div>
                            <?php endif; ?>

                            <!-- Audio Player -->
                            <?php if ($episode_audio) : ?>
                                <div class="mt-auto pt-4">
                                    <div class="flex items-center gap-3 bg-gray-50 p-3 rounded-xl">
                                        <button 
                                            onclick="togglePlay(this, '<?php echo get_the_ID(); ?>')"
                                            class="play-button flex items-center justify-center w-10 h-10 rounded-full bg-purple-600 text-white hover:bg-purple-700 transition-colors"
                                            data-audio="<?php echo esc_url($episode_audio['url']); ?>"
                                        >
                                            <i class="fa-solid fa-play"></i>
                                            <i class="fa-solid fa-pause hidden"></i>
                                        </button>
                                        <div class="flex-1">
                                            <div class="progress-bar h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                                <div class="progress h-full w-0 bg-purple-600 transition-all duration-300"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <!-- No Results Message -->
            <div id="no-results" class="hidden text-center py-12">
                <div class="mb-4">
                    <i class="fa-regular fa-face-frown text-4xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-medium text-gray-900 mb-2">No se encontraron episodios</h3>
                <p class="text-gray-600">No hay episodios que coincidan con los filtros seleccionados.</p>
            </div>

        <?php else : ?>
            <div class="text-center py-12">
                <div class="mb-4">
                    <i class="fa-regular fa-face-frown text-4xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-medium text-gray-900 mb-2">No hay episodios disponibles</h3>
                <p class="text-gray-600">Todavía no hay episodios publicados.</p>
            </div>
        <?php endif; ?>
    </div>
</main>

<!-- Filter Scripts -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const episodes = document.querySelectorAll('.episode-item');
    const noResults = document.getElementById('no-results');
    const activeFilters = document.getElementById('active-filters');
    const activeFiltersList = document.getElementById('active-filters-list');

    const activeTerms = {
        category: new Set(),
        tag: new Set()
    };

    // Style states for filter buttons
    const buttonStates = {
        active: 'bg-purple-100 text-purple-800 hover:bg-purple-200',
        inactive: 'bg-gray-100 text-gray-700 hover:bg-gray-200'
    };

    // Initialize button styles
    filterButtons.forEach(btn => {
        btn.classList.add(...buttonStates.inactive.split(' '));
    });

    // Filter click handler
    filterButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const type = this.dataset.type;
            const id = this.dataset.id;
            const termKey = `${type}-${id}`;

            if (activeTerms[type].has(id)) {
                activeTerms[type].delete(id);
                this.classList.remove(...buttonStates.active.split(' '));
                this.classList.add(...buttonStates.inactive.split(' '));
            } else {
                activeTerms[type].add(id);
                this.classList.remove(...buttonStates.inactive.split(' '));
                this.classList.add(...buttonStates.active.split(' '));
            }

            updateVisibleEpisodes();
            updateActiveFilters();
        });
    });

    // Update visible episodes based on active filters
    function updateVisibleEpisodes() {
        const hasActiveFilters = activeTerms.category.size > 0 || activeTerms.tag.size > 0;
        let visibleCount = 0;

        episodes.forEach(episode => {
            if (!hasActiveFilters) {
                episode.style.display = '';
                visibleCount++;
                return;
            }

            const terms = episode.dataset.terms.split(' ');
            let showEpisode = true;

            // Check categories
            if (activeTerms.category.size > 0) {
                const hasCategory = Array.from(activeTerms.category).some(id => 
                    terms.includes(`category-${id}`)
                );
                if (!hasCategory) showEpisode = false;
            }

            // Check tags
            if (showEpisode && activeTerms.tag.size > 0) {
                const hasTag = Array.from(activeTerms.tag).some(id => 
                    terms.includes(`tag-${id}`)
                );
                if (!hasTag) showEpisode = false;
            }

            episode.style.display = showEpisode ? '' : 'none';
            if (showEpisode) visibleCount++;
        });

        noResults.style.display = visibleCount === 0 ? 'block' : 'none';
    }

    // Update active filters display
    function updateActiveFilters() {
        const hasActiveFilters = activeTerms.category.size > 0 || activeTerms.tag.size > 0;
        activeFilters.style.display = hasActiveFilters ? 'block' : 'none';
        
        if (hasActiveFilters) {
            activeFiltersList.innerHTML = '';
            
            // Add category filters
            activeTerms.category.forEach(id => {
                const btn = document.querySelector(`[data-type="category"][data-id="${id}"]`);
                if (btn) {
                    const filterTag = createFilterTag(btn.textContent.trim(), () => {
                        btn.click();
                    });
                    activeFiltersList.appendChild(filterTag);
                }
            });

            // Add tag filters
            activeTerms.tag.forEach(id => {
                const btn = document.querySelector(`[data-type="tag"][data-id="${id}"]`);
                if (btn) {
                    const filterTag = createFilterTag(btn.textContent.trim(), () => {
                        btn.click();
                    });
                    activeFiltersList.appendChild(filterTag);
                }
            });
        }
    }

    // Create filter tag element
    function createFilterTag(text, onRemove) {
        const tag = document.createElement('span');
        tag.className = 'inline-flex items-center gap-1 px-3 py-1 rounded-full bg-purple-100 text-purple-800 text-sm';
        tag.innerHTML = `
            ${text}
            <button class="text-purple-600 hover:text-purple-800">
                <i class="fa-solid fa-times"></i>
            </button>
        `;
        tag.querySelector('button').addEventListener('click', onRemove);
        return tag;
    }
});
</script>

<!-- Audio Player Scripts -->
<script>
let currentlyPlaying = null;

function togglePlay(button, postId) {
    const audio = button.dataset.audio;
    const playIcon = button.querySelector('.fa-play');
    const pauseIcon = button.querySelector('.fa-pause');
    const progressBar = button.closest('.bg-gray-50').querySelector('.progress');
    
    if (currentlyPlaying && currentlyPlaying.postId !== postId) {
        // Stop currently playing audio
        currentlyPlaying.audio.pause();
        currentlyPlaying.audio.currentTime = 0;
        currentlyPlaying.button.querySelector('.fa-play').classList.remove('hidden');
        currentlyPlaying.button.querySelector('.fa-pause').classList.add('hidden');
        currentlyPlaying.progressBar.style.width = '0%';
    }

    if (!currentlyPlaying || currentlyPlaying.postId !== postId) {
        // Start new audio
        const audioElement = new Audio(audio);
        audioElement.addEventListener('timeupdate', () => {
            const progress = (audioElement.currentTime / audioElement.duration) * 100;
            progressBar.style.width = `${progress}%`;
        });
        audioElement.addEventListener('ended', () => {
            playIcon.classList.remove('hidden');
            pauseIcon.classList.add('hidden');
            progressBar.style.width = '0%';
            currentlyPlaying = null;
        });
        audioElement.play();
        currentlyPlaying = {
            audio: audioElement,
            button: button,
            postId: postId,
            progressBar: progressBar
        };
        playIcon.classList.add('hidden');
        pauseIcon.classList.remove('hidden');
    } else {
        // Toggle current audio
        if (currentlyPlaying.audio.paused) {
            currentlyPlaying.audio.play();
            playIcon.classList.add('hidden');
            pauseIcon.classList.remove('hidden');
        } else {
            currentlyPlaying.audio.pause();
            playIcon.classList.remove('hidden');
            pauseIcon.classList.add('hidden');
        }
    }
}
</script>

<?php get_footer(); ?>

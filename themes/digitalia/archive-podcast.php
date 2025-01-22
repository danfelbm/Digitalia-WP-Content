<?php
/**
 * The template for displaying podcast archive pages
 *
 * @package digitalia
 */

get_header();

// Get total number of podcast episodes
$total_episodes = wp_count_posts('podcast')->publish;

// Get all categories and tags used in podcasts
$podcast_categories = get_categories(array(
    'taxonomy' => 'category',
    'object_type' => array('podcast')
));

$podcast_tags = get_tags(array(
    'object_type' => array('podcast')
));

// Query to get all podcast posts
$podcast_query = new WP_Query(array(
    'post_type' => 'podcast',
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
                <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-4">Nuestro Podcast</h1>
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

        <?php if ($podcast_query->have_posts()) : ?>
            <!-- Filter Navigation -->
            <div class="mb-8">
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="space-y-6">
                        <!-- Categories Filter -->
                        <?php if ($podcast_categories) : ?>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Categorías</h3>
                            <div class="flex flex-wrap gap-2" id="category-filters">
                                <?php foreach ($podcast_categories as $category) : ?>
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
                        <?php if ($podcast_tags) : ?>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Etiquetas</h3>
                            <div class="flex flex-wrap gap-2" id="tag-filters">
                                <?php foreach ($podcast_tags as $tag) : ?>
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
                while ($podcast_query->have_posts()) :
                    $podcast_query->the_post();
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
                    <article <?php post_class('podcast-episode group bg-white rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden flex flex-col'); ?> data-terms="<?php echo esc_attr(implode(' ', $term_ids)); ?>">
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

                            <!-- Categories -->
                            <?php
                            $categories = get_the_category();
                            if ($categories) : ?>
                                <div class="flex flex-wrap gap-2 mb-4">
                                    <?php foreach ($categories as $category) : ?>
                                        <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" 
                                           class="px-2 py-1 text-xs font-medium text-purple-700 bg-purple-50 rounded-full hover:bg-purple-100 transition-colors">
                                            <?php echo esc_html($category->name); ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <!-- Excerpt -->
                            <?php if ($episode_excerpt || has_excerpt()) : ?>
                                <p class="text-gray-600 mb-6 line-clamp-2">
                                    <?php echo $episode_excerpt ?: get_the_excerpt(); ?>
                                </p>
                            <?php endif; ?>

                            <!-- Audio Player -->
                            <?php if ($episode_audio) : ?>
                                <div class="mt-auto pt-4">
                                    <div class="flex items-center gap-3 bg-gray-50 p-3 rounded-xl">
                                        <button 
                                            onclick="togglePlay(this, '<?php echo get_the_ID(); ?>')"
                                            class="w-10 h-10 flex items-center justify-center bg-purple-600 hover:bg-purple-700 rounded-full text-white transition-all"
                                            data-playing="false"
                                            aria-label="Reproducir audio"
                                        >
                                            <i class="fa-solid fa-play text-sm"></i>
                                        </button>
                                        <audio 
                                            id="audio-<?php echo get_the_ID(); ?>"
                                            class="flex-1 h-10 w-full"
                                            controls
                                            onplay="updateOtherPlayers(this.id)"
                                        >
                                            <source src="<?php echo esc_url($episode_audio); ?>" type="audio/mpeg">
                                            Tu navegador no soporta el elemento de audio.
                                        </audio>
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
                <h2 class="text-2xl font-bold text-gray-900 mb-2">No se encontraron episodios</h2>
                <p class="text-gray-600">No hay episodios que coincidan con los filtros seleccionados.</p>
                <button id="clear-filters" class="mt-4 px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors">
                    Limpiar filtros
                </button>
            </div>

        <?php else : ?>
            <div class="text-center py-12">
                <div class="mb-4">
                    <i class="fa-regular fa-face-frown text-4xl text-gray-400"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">No se encontraron episodios</h2>
                <p class="text-gray-600">Parece que aún no hemos publicado ningún episodio. ¡Vuelve pronto!</p>
            </div>
        <?php endif; ?>
    </div>
</main>

<!-- Filter Scripts -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const episodes = document.querySelectorAll('.podcast-episode');
    const noResults = document.getElementById('no-results');
    const activeFilters = document.getElementById('active-filters');
    const activeFiltersList = document.getElementById('active-filters-list');
    const clearFiltersBtn = document.getElementById('clear-filters');
    
    const activeTerms = {
        category: new Set(),
        tag: new Set()
    };

    // Function to update URL with current filters
    function updateURL() {
        const params = new URLSearchParams();
        
        if (activeTerms.category.size > 0) {
            params.set('categories', Array.from(activeTerms.category).join(','));
        }
        if (activeTerms.tag.size > 0) {
            params.set('tags', Array.from(activeTerms.tag).join(','));
        }

        const newURL = `${window.location.pathname}${params.toString() ? '?' + params.toString() : ''}`;
        history.pushState({ filters: activeTerms }, '', newURL);
    }

    // Function to parse URL parameters and set filters
    function parseURLParams() {
        const params = new URLSearchParams(window.location.search);
        
        // Reset current filters
        activeTerms.category.clear();
        activeTerms.tag.clear();
        
        // Parse categories
        const categories = params.get('categories');
        if (categories) {
            categories.split(',').forEach(id => activeTerms.category.add(id));
        }
        
        // Parse tags
        const tags = params.get('tags');
        if (tags) {
            tags.split(',').forEach(id => activeTerms.tag.add(id));
        }

        // Update UI to reflect current filters
        filterButtons.forEach(button => {
            const type = button.dataset.type;
            const id = button.dataset.id;
            if (activeTerms[type].has(id)) {
                setActiveStyle(button);
            } else {
                setInactiveStyle(button);
            }
        });

        filterEpisodes();
    }

    // Style functions
    function setActiveStyle(button) {
        button.classList.remove('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
        button.classList.add('bg-purple-100', 'text-purple-700', 'hover:bg-purple-200');
    }

    function setInactiveStyle(button) {
        button.classList.remove('bg-purple-100', 'text-purple-700', 'hover:bg-purple-200');
        button.classList.add('bg-gray-100', 'text-gray-700', 'hover:bg-gray-200');
    }

    // Initialize button styles
    filterButtons.forEach(btn => setInactiveStyle(btn));

    // Filter function
    function filterEpisodes() {
        let hasActiveFilters = activeTerms.category.size > 0 || activeTerms.tag.size > 0;
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
                let hasCategory = false;
                terms.forEach(term => {
                    if (term.startsWith('category-')) {
                        const categoryId = term.replace('category-', '');
                        if (activeTerms.category.has(categoryId)) {
                            hasCategory = true;
                        }
                    }
                });
                showEpisode = showEpisode && hasCategory;
            }

            // Check tags
            if (activeTerms.tag.size > 0) {
                let hasTag = false;
                terms.forEach(term => {
                    if (term.startsWith('tag-')) {
                        const tagId = term.replace('tag-', '');
                        if (activeTerms.tag.has(tagId)) {
                            hasTag = true;
                        }
                    }
                });
                showEpisode = showEpisode && hasTag;
            }

            episode.style.display = showEpisode ? '' : 'none';
            if (showEpisode) visibleCount++;
        });

        // Show/hide no results message
        noResults.style.display = visibleCount === 0 ? 'block' : 'none';
        
        // Update active filters display
        updateActiveFilters();
    }

    // Update active filters display
    function updateActiveFilters() {
        const hasActiveFilters = activeTerms.category.size > 0 || activeTerms.tag.size > 0;
        activeFilters.style.display = hasActiveFilters ? 'block' : 'none';
        
        if (hasActiveFilters) {
            activeFiltersList.innerHTML = '';
            filterButtons.forEach(btn => {
                if (activeTerms[btn.dataset.type].has(btn.dataset.id)) {
                    const filterTag = document.createElement('span');
                    filterTag.className = 'px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-sm font-medium flex items-center gap-2';
                    filterTag.innerHTML = `
                        ${btn.textContent.split('(')[0]}
                        <button class="remove-filter" data-type="${btn.dataset.type}" data-id="${btn.dataset.id}">
                            <i class="fa-solid fa-times"></i>
                        </button>
                    `;
                    activeFiltersList.appendChild(filterTag);
                }
            });
        }
    }

    // Click handler for filter buttons
    filterButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const type = this.dataset.type;
            const id = this.dataset.id;

            if (activeTerms[type].has(id)) {
                activeTerms[type].delete(id);
                setInactiveStyle(this);
            } else {
                activeTerms[type].add(id);
                setActiveStyle(this);
            }

            filterEpisodes();
            updateURL();
        });
    });

    // Click handler for removing active filters
    activeFiltersList.addEventListener('click', function(e) {
        if (e.target.closest('.remove-filter')) {
            const btn = e.target.closest('.remove-filter');
            const type = btn.dataset.type;
            const id = btn.dataset.id;
            
            activeTerms[type].delete(id);
            const filterBtn = document.querySelector(`.filter-btn[data-type="${type}"][data-id="${id}"]`);
            if (filterBtn) setInactiveStyle(filterBtn);
            
            filterEpisodes();
            updateURL();
        }
    });

    // Clear all filters
    if (clearFiltersBtn) {
        clearFiltersBtn.addEventListener('click', function() {
            activeTerms.category.clear();
            activeTerms.tag.clear();
            filterButtons.forEach(btn => setInactiveStyle(btn));
            filterEpisodes();
            updateURL(); // Update URL to remove filter parameters
        });
    }

    // Handle browser back/forward buttons
    window.addEventListener('popstate', function(event) {
        if (event.state && event.state.filters) {
            Object.assign(activeTerms, event.state.filters);
            parseURLParams();
        }
    });

    // Initialize filters from URL on page load
    parseURLParams();
});
</script>

<!-- Audio Player Scripts -->
<script>
function togglePlay(button, postId) {
    const audio = document.getElementById(`audio-${postId}`);
    const icon = button.querySelector('i');
    
    if (audio.paused) {
        audio.play();
        icon.classList.remove('fa-play');
        icon.classList.add('fa-pause');
        button.dataset.playing = 'true';
        button.setAttribute('aria-label', 'Pausar audio');
    } else {
        audio.pause();
        icon.classList.remove('fa-pause');
        icon.classList.add('fa-play');
        button.dataset.playing = 'false';
        button.setAttribute('aria-label', 'Reproducir audio');
    }
}

function updateOtherPlayers(currentId) {
    // Pause all other audio players
    document.querySelectorAll('audio').forEach(audio => {
        if (audio.id !== currentId) {
            audio.pause();
            const button = audio.parentElement.querySelector('button');
            const icon = button.querySelector('i');
            icon.classList.remove('fa-pause');
            icon.classList.add('fa-play');
            button.dataset.playing = 'false';
            button.setAttribute('aria-label', 'Reproducir audio');
        }
    });
}

// Update play button when audio ends
document.querySelectorAll('audio').forEach(audio => {
    audio.addEventListener('ended', () => {
        const button = audio.parentElement.querySelector('button');
        const icon = button.querySelector('i');
        icon.classList.remove('fa-pause');
        icon.classList.add('fa-play');
        button.dataset.playing = 'false';
        button.setAttribute('aria-label', 'Reproducir audio');
    });
});
</script>

<?php
wp_reset_postdata();
get_footer();

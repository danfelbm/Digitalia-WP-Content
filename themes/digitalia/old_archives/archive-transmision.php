<?php
/**
 * The template for displaying transmission archive pages
 *
 * @package digitalia
 */

get_header();

// Get total number of transmissions
$total_transmisions = wp_count_posts('transmision')->publish;

// Get all categories and tags used in transmissions
$transmision_categories = get_categories(array(
    'taxonomy' => 'category',
    'object_type' => array('transmision')
));

$transmision_tags = get_tags(array(
    'object_type' => array('transmision')
));

// Query to get all transmission posts
$transmision_query = new WP_Query(array(
    'post_type' => 'transmision',
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
                <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-4">Nuestras Transmisiones</h1>
                <?php if ($total_transmisions > 0) : ?>
                    <p class="text-xl text-gray-600 mb-6">
                        <?php printf(
                            _n(
                                'Descubre nuestra colección de %s transmisión',
                                'Descubre nuestra colección de %s transmisiones',
                                $total_transmisions,
                                'digitalia'
                            ),
                            number_format_i18n($total_transmisions)
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

        <?php if ($transmision_query->have_posts()) : ?>
            <!-- Filter Navigation -->
            <div class="mb-8">
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="space-y-6">
                        <!-- Categories Filter -->
                        <?php if ($transmision_categories) : ?>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Categorías</h3>
                            <div class="flex flex-wrap gap-2" id="category-filters">
                                <?php foreach ($transmision_categories as $category) : ?>
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
                        <?php if ($transmision_tags) : ?>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Etiquetas</h3>
                            <div class="flex flex-wrap gap-2" id="tag-filters">
                                <?php foreach ($transmision_tags as $tag) : ?>
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

            <!-- Transmissions Grid -->
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3" id="transmisions-grid">
                <?php
                while ($transmision_query->have_posts()) :
                    $transmision_query->the_post();
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
                    $transmision_excerpt = get_field('transmision_excerpt');
                    $transmision_duration = get_field('transmision_duration');
                    $transmision_fecha = get_field('transmision_fecha');
                    $transmision_video = get_field('transmision_video');
                ?>
                    <article <?php post_class('transmision-item group bg-white rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden flex flex-col'); ?> data-terms="<?php echo esc_attr(implode(' ', $term_ids)); ?>">
                        <!-- Transmission Thumbnail -->
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="block aspect-video overflow-hidden bg-gray-100 relative">
                                <?php the_post_thumbnail('medium_large', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-300']); ?>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span class="px-4 py-2 bg-white/90 text-gray-900 rounded-full text-sm font-medium">
                                        Ver Transmisión
                                    </span>
                                </div>
                                <!-- Play Icon Overlay -->
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <i class="fa-solid fa-play text-white text-4xl opacity-80 group-hover:opacity-0 transition-opacity duration-300"></i>
                                </div>
                            </a>
                        <?php endif; ?>

                        <!-- Transmission Info -->
                        <div class="flex-1 p-6">
                            <!-- Title -->
                            <h2 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-purple-700 transition-colors">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>

                            <!-- Metadata -->
                            <div class="flex items-center gap-4 text-sm text-gray-600 mb-4">
                                <?php if ($transmision_fecha) : ?>
                                    <time datetime="<?php echo esc_attr($transmision_fecha); ?>" class="flex items-center gap-1.5">
                                        <i class="fa-regular fa-calendar text-gray-400"></i>
                                        <?php echo esc_html($transmision_fecha); ?>
                                    </time>
                                <?php endif; ?>
                                <?php if ($transmision_duration) : ?>
                                    <div class="flex items-center gap-1.5">
                                        <i class="fa-regular fa-clock text-gray-400"></i>
                                        <?php echo esc_html($transmision_duration); ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Excerpt -->
                            <?php if ($transmision_excerpt || has_excerpt()) : ?>
                                <p class="text-gray-600 line-clamp-2 mb-4">
                                    <?php echo $transmision_excerpt ?: get_the_excerpt(); ?>
                                </p>
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
                <h2 class="text-xl font-medium text-gray-900 mb-2">No se encontraron transmisiones</h2>
                <p class="text-gray-600">Intenta ajustar los filtros de búsqueda</p>
                <button id="clear-filters" class="mt-4 px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors">
                    Limpiar filtros
                </button>
            </div>

        <?php else : ?>
            <div class="text-center py-12">
                <div class="mb-4">
                    <i class="fa-regular fa-face-frown text-4xl text-gray-400"></i>
                </div>
                <h2 class="text-xl font-medium text-gray-900 mb-2">No hay transmisiones disponibles</h2>
                <p class="text-gray-600">Vuelve más tarde para ver nuevo contenido</p>
            </div>
        <?php endif; ?>
    </div>
</main>

<!-- Filter Scripts -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const transmisions = document.querySelectorAll('.transmision-item');
    const noResults = document.getElementById('no-results');
    const activeFilters = document.getElementById('active-filters');
    const activeFiltersList = document.getElementById('active-filters-list');
    const clearFiltersBtn = document.getElementById('clear-filters');
    const activeFilterTypes = {
        category: new Set(),
        tag: new Set()
    };

    // Function to update URL with current filters
    function updateURL() {
        const params = new URLSearchParams();
        
        if (activeFilterTypes.category.size > 0) {
            params.set('categories', Array.from(activeFilterTypes.category).join(','));
        }
        if (activeFilterTypes.tag.size > 0) {
            params.set('tags', Array.from(activeFilterTypes.tag).join(','));
        }

        const newURL = `${window.location.pathname}${params.toString() ? '?' + params.toString() : ''}`;
        history.pushState({ filters: activeFilterTypes }, '', newURL);
    }

    // Function to parse URL parameters and set filters
    function parseURLParams() {
        const params = new URLSearchParams(window.location.search);
        
        // Reset current filters
        activeFilterTypes.category.clear();
        activeFilterTypes.tag.clear();
        
        // Parse categories
        const categories = params.get('categories');
        if (categories) {
            categories.split(',').forEach(id => activeFilterTypes.category.add(id));
        }
        
        // Parse tags
        const tags = params.get('tags');
        if (tags) {
            tags.split(',').forEach(id => activeFilterTypes.tag.add(id));
        }

        // Update UI to reflect current filters
        filterButtons.forEach(button => {
            const type = button.dataset.type;
            const id = button.dataset.id;
            const isActive = activeFilterTypes[type].has(id);
            button.classList.toggle('bg-purple-100', isActive);
            button.classList.toggle('text-purple-800', isActive);
        });

        updateActiveFilters();
        updateResults();
    }

    function updateActiveFilters() {
        const hasActiveFilters = activeFilterTypes.category.size > 0 || activeFilterTypes.tag.size > 0;
        activeFilters.classList.toggle('hidden', !hasActiveFilters);
        
        if (hasActiveFilters) {
            const filterElements = [];
            
            for (const [type, ids] of Object.entries(activeFilterTypes)) {
                for (const id of ids) {
                    const button = document.querySelector(`.filter-btn[data-type="${type}"][data-id="${id}"]`);
                    if (button) {
                        filterElements.push(`
                            <span class="inline-flex items-center gap-1 px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm">
                                ${button.textContent.split('(')[0].trim()}
                                <button class="remove-filter" data-type="${type}" data-id="${id}">
                                    <i class="fa-solid fa-times"></i>
                                </button>
                            </span>
                        `);
                    }
                }
            }
            
            activeFiltersList.innerHTML = filterElements.join('');
        }
    }

    function updateResults() {
        let visibleCount = 0;
        
        transmisions.forEach(transmision => {
            const terms = transmision.dataset.terms.split(' ');
            let visible = true;
            
            // Check categories
            if (activeFilterTypes.category.size > 0) {
                visible = visible && Array.from(activeFilterTypes.category).some(id => 
                    terms.includes(`category-${id}`)
                );
            }
            
            // Check tags
            if (activeFilterTypes.tag.size > 0) {
                visible = visible && Array.from(activeFilterTypes.tag).some(id => 
                    terms.includes(`tag-${id}`)
                );
            }
            
            transmision.classList.toggle('hidden', !visible);
            if (visible) visibleCount++;
        });
        
        noResults.classList.toggle('hidden', visibleCount > 0);
    }

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const type = this.dataset.type;
            const id = this.dataset.id;
            
            if (activeFilterTypes[type].has(id)) {
                activeFilterTypes[type].delete(id);
                this.classList.remove('bg-purple-100', 'text-purple-800');
            } else {
                activeFilterTypes[type].add(id);
                this.classList.add('bg-purple-100', 'text-purple-800');
            }
            
            updateActiveFilters();
            updateResults();
            updateURL();
        });
    });

    activeFiltersList.addEventListener('click', function(e) {
        if (e.target.closest('.remove-filter')) {
            const btn = e.target.closest('.remove-filter');
            const type = btn.dataset.type;
            const id = btn.dataset.id;
            
            activeFilterTypes[type].delete(id);
            const filterBtn = document.querySelector(`.filter-btn[data-type="${type}"][data-id="${id}"]`);
            if (filterBtn) {
                filterBtn.classList.remove('bg-purple-100', 'text-purple-800');
            }
            
            updateActiveFilters();
            updateResults();
            updateURL();
        }
    });

    // Clear all filters
    if (clearFiltersBtn) {
        clearFiltersBtn.addEventListener('click', function() {
            activeFilterTypes.category.clear();
            activeFilterTypes.tag.clear();
            filterButtons.forEach(btn => {
                btn.classList.remove('bg-purple-100', 'text-purple-800');
            });
            updateActiveFilters();
            updateResults();
            updateURL(); // Update URL to remove filter parameters
        });
    }

    // Handle browser back/forward buttons
    window.addEventListener('popstate', function(event) {
        if (event.state && event.state.filters) {
            Object.assign(activeFilterTypes, event.state.filters);
            parseURLParams();
        }
    });

    // Initialize filters from URL on page load
    parseURLParams();
});
</script>

<?php
get_footer();

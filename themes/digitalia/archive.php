<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package digitalia
 */

get_header();

// Get current taxonomy and term
$queried_object = get_queried_object();

// Get post type
$post_type = is_post_type_archive() ? $queried_object->name : 'post';

// Get total number of posts for this archive
$total_posts = 0;
if (is_post_type_archive()) {
    $total_posts = wp_count_posts($post_type)->publish;
} elseif (is_category() || is_tag() || is_tax()) {
    $total_posts = $queried_object->count;
}

// Handle different archive types
if (is_category()) {
    $taxonomy = 'category';
    $term = single_cat_title('', false);
    $term_description = category_description();
    $term_id = get_queried_object_id();
} elseif (is_tag()) {
    $taxonomy = 'post_tag';
    $term = single_tag_title('', false);
    $term_description = tag_description();
    $term_id = get_queried_object_id();
} else {
    // Check if queried object is a taxonomy term
    if (is_tax() && $queried_object instanceof WP_Term) {
        $taxonomy = $queried_object->taxonomy;
        $term = $queried_object->name;
        $term_description = term_description();
        $term_id = $queried_object->term_id;
    } else {
        // Default values for other archive types
        $taxonomy = '';
        $term = '';
        $term_description = '';
        $term_id = 0;
    }
}

// Get categories and tags for the current post type
$post_categories = get_categories(array(
    'taxonomy' => 'category',
    'object_type' => array($post_type)
));

$post_tags = get_tags(array(
    'object_type' => array($post_type)
));

// Get archive title
$archive_title = '';
if (is_category()) {
    $archive_title = single_cat_title('', false);
} elseif (is_tag()) {
    $archive_title = single_tag_title('', false);
} elseif (is_author()) {
    $archive_title = get_the_author();
} elseif (is_post_type_archive()) {
    $archive_title = post_type_archive_title('', false);
} elseif (is_tax()) {
    $archive_title = single_term_title('', false);
} else {
    $archive_title = 'Archives';
}
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
                <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-4"><?php echo esc_html($archive_title); ?></h1>
                <?php if ($total_posts > 0) : ?>
                    <p class="text-xl text-gray-600 mb-6">
                        <?php 
                        $post_type_obj = get_post_type_object($post_type);
                        $post_type_name = $post_type_obj ? strtolower($post_type_obj->labels->name) : 'entradas';
                        printf(
                            _n(
                                'Mostrando %s ' . $post_type_name,
                                'Mostrando %s ' . $post_type_name,
                                $total_posts,
                                'digitalia'
                            ),
                            number_format_i18n($total_posts)
                        ); 
                        ?>
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

        <?php if (have_posts()) : ?>
            <!-- Filter Navigation -->
            <?php if ($post_categories || $post_tags) : ?>
            <div class="mb-8">
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="space-y-6">
                        <!-- Categories Filter -->
                        <?php if ($post_categories) : ?>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Categorías</h3>
                            <div class="flex flex-wrap gap-2" id="category-filters">
                                <?php foreach ($post_categories as $category) : ?>
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
                        <?php if ($post_tags) : ?>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Etiquetas</h3>
                            <div class="flex flex-wrap gap-2" id="tag-filters">
                                <?php foreach ($post_tags as $tag) : ?>
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
            <?php endif; ?>

            <!-- Posts Grid -->
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3" id="posts-grid">
                <?php
                while (have_posts()) :
                    the_post();
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
                ?>
                    <article <?php post_class('post-item group bg-white rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden flex flex-col'); ?> data-terms="<?php echo esc_attr(implode(' ', $term_ids)); ?>">
                        <!-- Post Thumbnail -->
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="block aspect-video overflow-hidden bg-gray-100 relative">
                                <?php the_post_thumbnail('medium_large', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-300']); ?>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span class="px-4 py-2 bg-white/90 text-gray-900 rounded-full text-sm font-medium">
                                        Leer más
                                    </span>
                                </div>
                            </a>
                        <?php endif; ?>

                        <!-- Post Info -->
                        <div class="flex-1 p-6">
                            <!-- Title -->
                            <h2 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-purple-700 transition-colors">
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
                                <?php if (get_the_author()) : ?>
                                    <div class="flex items-center gap-1.5">
                                        <i class="fa-regular fa-user text-gray-400"></i>
                                        <?php the_author(); ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Excerpt -->
                            <?php if (has_excerpt()) : ?>
                                <p class="text-gray-600 line-clamp-2 mb-4"><?php echo get_the_excerpt(); ?></p>
                            <?php endif; ?>

                            <!-- Categories -->
                            <?php if ($post_categories) : ?>
                                <div class="flex flex-wrap gap-2 mt-auto">
                                    <?php foreach ($post_categories as $category) : ?>
                                        <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" 
                                           class="text-xs font-medium text-purple-600 hover:text-purple-800 transition-colors">
                                            #<?php echo esc_html($category->name); ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <!-- No Results Message (Hidden by default) -->
            <div id="no-results" class="hidden text-center py-12">
                <div class="mb-4">
                    <i class="fa-regular fa-face-frown text-4xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-medium text-gray-900 mb-2">No se encontraron resultados</h3>
                <p class="text-gray-600">No hay entradas que coincidan con los filtros seleccionados.</p>
            </div>

            <?php
            // Pagination
            the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => __('Anterior', 'digitalia'),
                'next_text' => __('Siguiente', 'digitalia'),
                'class' => 'mt-12'
            ));
            ?>

        <?php else : ?>
            <div class="text-center py-12">
                <div class="mb-4">
                    <i class="fa-regular fa-face-frown text-4xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-medium text-gray-900 mb-2">No se encontraron entradas</h3>
                <p class="text-gray-600">No hay contenido disponible en este momento.</p>
            </div>
        <?php endif; ?>
    </div>
</main>

<!-- Filter Scripts -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const posts = document.querySelectorAll('.post-item');
    const noResults = document.getElementById('no-results');
    const activeFilters = document.getElementById('active-filters');
    const activeFiltersList = document.getElementById('active-filters-list');
    const postsGrid = document.getElementById('posts-grid');
    
    let activeCategories = new Set();
    let activeTags = new Set();

    // Style states for filter buttons
    const buttonStates = {
        active: 'bg-purple-100 text-purple-800 hover:bg-purple-200',
        inactive: 'bg-gray-100 text-gray-700 hover:bg-gray-200'
    };

    // Initialize button styles
    filterButtons.forEach(button => {
        button.classList.add(...buttonStates.inactive.split(' '));
    });

    // Update active filters display
    function updateActiveFilters() {
        const allActiveFilters = new Set([...activeCategories, ...activeTags]);
        
        if (allActiveFilters.size > 0) {
            activeFilters.classList.remove('hidden');
            activeFiltersList.innerHTML = '';
            
            allActiveFilters.forEach(filterId => {
                const [type, id] = filterId.split('-');
                const button = document.querySelector(`[data-type="${type}"][data-id="${id}"]`);
                if (button) {
                    const filterTag = document.createElement('span');
                    filterTag.className = 'inline-flex items-center gap-1 px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800';
                    filterTag.innerHTML = `
                        ${button.textContent}
                        <button class="remove-filter" data-type="${type}" data-id="${id}">
                            <i class="fas fa-times"></i>
                        </button>
                    `;
                    activeFiltersList.appendChild(filterTag);
                }
            });
        } else {
            activeFilters.classList.add('hidden');
        }
    }

    // Filter posts based on active filters
    function filterPosts() {
        let visiblePosts = 0;
        
        posts.forEach(post => {
            const postTerms = post.dataset.terms.split(' ');
            const hasActiveFilters = activeCategories.size > 0 || activeTags.size > 0;
            
            if (!hasActiveFilters) {
                post.style.display = '';
                visiblePosts++;
                return;
            }
            
            const matchesCategories = activeCategories.size === 0 || 
                [...activeCategories].some(category => postTerms.includes(category));
            const matchesTags = activeTags.size === 0 || 
                [...activeTags].some(tag => postTerms.includes(tag));
            
            if (matchesCategories && matchesTags) {
                post.style.display = '';
                visiblePosts++;
            } else {
                post.style.display = 'none';
            }
        });
        
        // Show/hide no results message
        if (visiblePosts === 0) {
            noResults.classList.remove('hidden');
            postsGrid.classList.add('hidden');
        } else {
            noResults.classList.add('hidden');
            postsGrid.classList.remove('hidden');
        }
    }

    // Handle filter button clicks
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const type = this.dataset.type;
            const id = this.dataset.id;
            const filterId = `${type}-${id}`;
            const filterSet = type === 'category' ? activeCategories : activeTags;
            
            if (filterSet.has(filterId)) {
                filterSet.delete(filterId);
                this.classList.remove(...buttonStates.active.split(' '));
                this.classList.add(...buttonStates.inactive.split(' '));
            } else {
                filterSet.add(filterId);
                this.classList.remove(...buttonStates.inactive.split(' '));
                this.classList.add(...buttonStates.active.split(' '));
            }
            
            updateActiveFilters();
            filterPosts();
        });
    });

    // Handle removing filters
    document.addEventListener('click', function(e) {
        if (e.target.closest('.remove-filter')) {
            const button = e.target.closest('.remove-filter');
            const type = button.dataset.type;
            const id = button.dataset.id;
            const filterId = `${type}-${id}`;
            const filterSet = type === 'category' ? activeCategories : activeTags;
            
            filterSet.delete(filterId);
            
            const filterButton = document.querySelector(`[data-type="${type}"][data-id="${id}"]`);
            if (filterButton) {
                filterButton.classList.remove(...buttonStates.active.split(' '));
                filterButton.classList.add(...buttonStates.inactive.split(' '));
            }
            
            updateActiveFilters();
            filterPosts();
        }
    });
});
</script>

<?php
get_footer();
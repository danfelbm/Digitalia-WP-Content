<?php
/**
 * The template for displaying producto archive pages
 *
 * @package digitalia
 */

get_header();

// Get total number of products
$total_products = wp_count_posts('producto')->publish;

// Get all categories and tags used in products
$product_categories = get_categories(array(
    'taxonomy' => 'category',
    'object_type' => array('producto')
));

$product_tags = get_tags(array(
    'object_type' => array('producto')
));

// Query to get all product posts
$product_query = new WP_Query(array(
    'post_type' => 'producto',
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
                <div class="absolute inset-0 bg-gradient-to-br from-teal-100/50 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 h-1/2 bg-gradient-to-t from-gray-50 to-transparent"></div>
            </div>
            <div class="max-w-3xl mx-auto pt-8 pb-12">
                <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-4">Productos de Colaboratorios</h1>
                <p class="text-xl text-gray-600 mb-6">Plataforma de lanzamiento de productos realizados en talleres Co-Laboratorios producidos por organizaciones sociales y población diferencial. Estos productos representan el resultado tangible de nuestro compromiso con el empoderamiento digital y la construcción de paz mediática.</p>
                <?php if ($total_products > 0) : ?>
                    <p class="text-xl text-gray-600 mb-6">
                        <?php printf(
                            _n(
                                'Explora nuestra colección de %s producto',
                                'Explora nuestra colección de %s productos',
                                $total_products,
                                'digitalia'
                            ),
                            number_format_i18n($total_products)
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

        <?php if ($product_query->have_posts()) : ?>
            <!-- Filter Navigation -->
            <div class="mb-8">
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <div class="space-y-6">
                        <!-- Categories Filter -->
                        <?php if ($product_categories) : ?>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Categorías</h3>
                            <div class="flex flex-wrap gap-2" id="category-filters">
                                <?php foreach ($product_categories as $category) : ?>
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
                        <?php if ($product_tags) : ?>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Etiquetas</h3>
                            <div class="flex flex-wrap gap-2" id="tag-filters">
                                <?php foreach ($product_tags as $tag) : ?>
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

            <!-- Products Grid -->
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3" id="products-grid">
                <?php
                while ($product_query->have_posts()) :
                    $product_query->the_post();
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
                    $excerpt_details = get_field('excerpt_details');
                    $organization = get_field('organization');
                ?>
                    <article <?php post_class('producto group bg-white rounded-2xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden flex flex-col'); ?> data-terms="<?php echo esc_attr(implode(' ', $term_ids)); ?>">
                        <!-- Product Thumbnail -->
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="block aspect-[16/9] overflow-hidden bg-gray-100 relative">
                                <?php the_post_thumbnail('medium_large', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-300']); ?>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <span class="px-4 py-2 bg-white/90 text-gray-900 rounded-full text-sm font-medium">
                                        Ver Producto
                                    </span>
                                </div>
                            </a>
                        <?php endif; ?>

                        <!-- Product Info -->
                        <div class="flex-1 p-6">
                            <!-- Organization -->
                            <?php if ($organization && $organization['name']) : ?>
                                <div class="flex items-center gap-2 mb-3">
                                    <?php if ($organization['logo']) : ?>
                                        <div class="w-6 h-6 rounded-full overflow-hidden">
                                            <img src="<?php echo esc_url($organization['logo']['url']); ?>" 
                                                 alt="<?php echo esc_attr($organization['name']); ?>"
                                                 class="w-full h-full object-cover" />
                                        </div>
                                    <?php endif; ?>
                                    <span class="text-sm font-medium text-teal-600">
                                        <?php echo esc_html($organization['name']); ?>
                                    </span>
                                </div>
                            <?php endif; ?>

                            <!-- Title -->
                            <h2 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2 group-hover:text-teal-700 transition-colors">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>

                            <!-- Excerpt -->
                            <?php if ($excerpt_details && $excerpt_details['excerpt_text']) : ?>
                                <p class="text-gray-600 line-clamp-3 mb-4">
                                    <?php echo esc_html($excerpt_details['excerpt_text']); ?>
                                </p>
                            <?php endif; ?>

                            <!-- Metadata -->
                            <div class="flex items-center gap-4 text-sm text-gray-600">
                                <time datetime="<?php echo get_the_date('c'); ?>" class="flex items-center gap-1.5">
                                    <i class="fa-regular fa-calendar text-gray-400"></i>
                                    <?php echo get_the_date(); ?>
                                </time>
                                <?php if ($excerpt_details && $excerpt_details['download_button']['file']) : ?>
                                    <div class="flex items-center gap-1.5">
                                        <i class="fa-regular fa-file-pdf text-gray-400"></i>
                                        PDF
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <!-- No Results Message -->
            <div id="no-results" class="hidden text-center py-12">
                <div class="mb-4">
                    <i class="fa-regular fa-folder-open text-4xl text-gray-400"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-1">No se encontraron productos</h3>
                <p class="text-gray-600">No hay productos que coincidan con los filtros seleccionados.</p>
            </div>

        <?php else : ?>
            <div class="text-center py-12">
                <div class="mb-4">
                    <i class="fa-regular fa-face-frown text-4xl text-gray-400"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-1">No hay productos disponibles</h3>
                <p class="text-gray-600">Todavía no se han publicado productos.</p>
            </div>
        <?php endif; ?>
    </div>
</main>

<!-- Filter Scripts -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const products = document.querySelectorAll('.producto');
    const noResults = document.getElementById('no-results');
    const activeFilters = document.getElementById('active-filters');
    const activeFiltersList = document.getElementById('active-filters-list');
    
    const activeTerms = {
        category: new Set(),
        tag: new Set()
    };

    // Add click event to filter buttons
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const type = this.dataset.type;
            const id = this.dataset.id;
            const termKey = `${type}-${id}`;

            // Toggle active state
            if (activeTerms[type].has(id)) {
                activeTerms[type].delete(id);
                this.classList.remove('bg-teal-50', 'text-teal-700', 'border-teal-200');
                this.classList.add('hover:bg-gray-100', 'text-gray-700');
            } else {
                activeTerms[type].add(id);
                this.classList.add('bg-teal-50', 'text-teal-700', 'border-teal-200');
                this.classList.remove('hover:bg-gray-100', 'text-gray-700');
            }

            filterProducts();
            updateActiveFilters();
        });

        // Add initial classes
        button.classList.add('hover:bg-gray-100', 'text-gray-700', 'border');
    });

    function filterProducts() {
        let visibleCount = 0;

        products.forEach(product => {
            const terms = product.dataset.terms.split(' ');
            let shouldShow = true;

            // Check if product has all active category terms
            if (activeTerms.category.size > 0) {
                shouldShow = Array.from(activeTerms.category).every(id =>
                    terms.includes(`category-${id}`)
                );
            }

            // Check if product has all active tag terms
            if (shouldShow && activeTerms.tag.size > 0) {
                shouldShow = Array.from(activeTerms.tag).every(id =>
                    terms.includes(`tag-${id}`)
                );
            }

            product.style.display = shouldShow ? 'flex' : 'none';
            if (shouldShow) visibleCount++;
        });

        // Show/hide no results message
        noResults.style.display = visibleCount === 0 ? 'block' : 'none';
    }

    function updateActiveFilters() {
        const hasActiveFilters = activeTerms.category.size > 0 || activeTerms.tag.size > 0;
        activeFilters.style.display = hasActiveFilters ? 'block' : 'none';
        
        if (hasActiveFilters) {
            activeFiltersList.innerHTML = '';
            
            // Create filter tags for categories
            activeTerms.category.forEach(id => {
                const button = document.querySelector(`.filter-btn[data-type="category"][data-id="${id}"]`);
                if (button) {
                    createActiveFilterTag('category', id, button.textContent.trim());
                }
            });

            // Create filter tags for tags
            activeTerms.tag.forEach(id => {
                const button = document.querySelector(`.filter-btn[data-type="tag"][data-id="${id}"]`);
                if (button) {
                    createActiveFilterTag('tag', id, button.textContent.trim());
                }
            });
        }
    }

    function createActiveFilterTag(type, id, text) {
        const tag = document.createElement('div');
        tag.className = 'inline-flex items-center gap-1 px-2 py-1 rounded-md bg-teal-50 text-sm text-teal-700';
        
        const label = document.createElement('span');
        label.textContent = text.replace(/\(\d+\)$/, '').trim();
        
        const removeButton = document.createElement('button');
        removeButton.innerHTML = '<i class="fa-solid fa-xmark"></i>';
        removeButton.className = 'hover:text-teal-900';
        removeButton.addEventListener('click', () => {
            const filterButton = document.querySelector(`.filter-btn[data-type="${type}"][data-id="${id}"]`);
            if (filterButton) {
                filterButton.click();
            }
        });
        
        tag.appendChild(label);
        tag.appendChild(removeButton);
        activeFiltersList.appendChild(tag);
    }
});
</script>

<?php
get_footer();
?>

<?php

/**
 * Template Name: Biblioteca Digital
 *
 * @package Digitalia
 */
get_header();
?>

<main id="primary" class="site-main">

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

    <div id="app" class="container">
        <section class="overflow-hidden rounded-[0.5rem] border bg-background shadow">
            <div class="hidden md:block">
                <div class="border-t">
                    <div class="bg-background">
                        <div class="grid lg:grid-cols-5">
                            <!-- Sidebar -->
                            <div class="pb-12 col-span-2 lg:col-span-1">
                                <!-- Reset Filters Button -->
                                <div class="px-3 py-2">
                                    <button @click="resetFilters" class="w-full inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-9 px-4 py-2">
                                        Restablecer filtros
                                    </button>
                                </div>
                                <!-- Post Types -->
                                <div class="px-3 py-2">
                                    <h2 class="mb-2 px-4 text-lg font-semibold tracking-tight">Contenidos Digitalia</h2>
                                    <div class="space-y-1">
                                        <button v-for="type in postTypes" 
                                                :key="type.slug"
                                                @click="selectPostType(type)"
                                                :class="['inline-flex items-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 h-9 px-4 py-2 w-full justify-start',
                                                selectedPostType && selectedPostType.slug === type.slug ? 'bg-secondary text-secondary-foreground shadow-sm' : 'hover:bg-accent hover:text-accent-foreground']">
                                            {{ type.name }}
                                        </button>
                                    </div>
                                </div>
                                <!-- Other Taxonomies -->
                                <div v-if="selectedPostType && otherTaxonomies.length > 0" class="space-y-4">
                                    <div v-for="tax in otherTaxonomies" :key="tax.slug" class="rounded-lg border p-4 mx-4">
                                        <h3 class="text-lg font-semibold mb-2">{{ tax.name }}</h3>
                                        <div class="space-y-1">
                                            <button v-for="term in tax.terms"
                                                    :key="term.id"
                                                    @click="selectTerm({term: term, taxonomy: tax})"
                                                    :class="['inline-flex items-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-ring disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 h-9 px-4 py-2 w-full justify-start',
                                                    selectedTerms[tax.slug]?.some(t => t.id === term.id) ? 'bg-secondary text-secondary-foreground shadow-sm' : 'hover:bg-accent hover:text-accent-foreground']">
                                                {{ term.name }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Main Content -->
                            <div class="col-span-3 lg:col-span-4 lg:border-l">
                                <div class="h-full px-4 py-6 lg:px-8">
                                    <!-- Tags (if available) -->
                                    <div v-if="selectedPostType && hasPostTags" class="mb-6">
                                        <div class="inline-flex h-9 items-center justify-center rounded-lg bg-muted p-1 text-muted-foreground">
                                            <button v-for="term in postTags"
                                                    :key="term.id"
                                                    @click="selectTerm({term: term, taxonomy: tagTaxonomy})"
                                                    :class="['inline-flex items-center justify-center whitespace-nowrap rounded-md px-3 py-1 text-sm font-medium transition-all',
                                                    selectedTerms[tagTaxonomy.slug]?.some(t => t.id === term.id) ? 'bg-background text-foreground shadow' : '']">
                                                {{ term.name }}
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Posts Grid -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                                        <a v-for="post in posts" :key="post.id" 
                                           :href="post.link"
                                           class="group flex flex-col overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm transition-all duration-200 hover:shadow-md hover:-translate-y-1">
                                            <div class="aspect-w-16 aspect-h-9 relative overflow-hidden">
                                                <img v-if="post.featured_media_url" :src="post.featured_media_url" 
                                                     :alt="post.title.rendered"
                                                     class="h-full w-full object-cover transition-transform duration-200 group-hover:scale-105">
                                                <div v-else class="h-full w-full bg-gray-100 flex items-center justify-center">
                                                    <span class="text-gray-400">No image</span>
                                                </div>
                                            </div>
                                            <div class="flex flex-col flex-grow p-4">
                                                <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-primary-600" v-html="post.title.rendered"></h3>
                                                <div class="text-sm text-gray-600 mb-4 line-clamp-2" v-html="post.excerpt.rendered"></div>
                                                <div class="mt-auto inline-flex items-center text-sm font-medium text-primary-600 group-hover:text-primary-700">
                                                    Leer más
                                                    <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const wpApiUrl = "<?php echo esc_url(rest_url('wp/v2')); ?>";
        const { createApp, ref, computed, watch } = Vue;

        createApp({
            setup() {
                const postTypes = ref([]);
                const taxonomies = ref([]);
                const posts = ref([]);
                const selectedPostType = ref(null);
                const selectedTerms = ref({}); // Store multiple selected terms by taxonomy
                const selectedTaxonomy = ref(null);
                const tagTaxonomy = ref(null);
                const taxonomyTermsMap = ref({});

                // Reset filters function
                function resetFilters() {
                    selectedPostType.value = null;
                    selectedTerms.value = {};
                    filteredTaxonomies.value = [];
                    taxonomyTermsMap.value = {};
                    tagTaxonomy.value = null;
                    fetchPosts();
                }

                // Computed properties
                const hasPostTags = computed(() => {
                    return filteredTaxonomies.value.some(tax => tax.slug === 'post_tag');
                });

                const postTags = computed(() => {
                    return taxonomyTermsMap.value['post_tag'] || [];
                });

                const otherTaxonomies = computed(() => {
                    return filteredTaxonomies.value
                        .filter(tax => tax.slug !== 'post_tag')
                        .map(tax => ({
                            ...tax,
                            terms: taxonomyTermsMap.value[tax.slug] || []
                        }));
                });

                const filteredTaxonomies = ref([]);

                // Fetch post types
                async function fetchPostTypes() {
                    try {
                        const response = await fetch(`${wpApiUrl}/types`);
                        const data = await response.json();
                        const allowedTypes = {
                            'post': 'Entradas',
                            'curso': 'Cursos',
                            'episodios': 'Episodios',
                            'actores': 'Actores',
                            'personajes': 'Personajes',
                            'series': 'Series',
                            'faq': 'Preguntas Frecuentes',
                            'descarga': 'Descargas'
                        };

                        const filteredTypes = Object.entries(data)
                            .filter(([slug]) => slug in allowedTypes)
                            .filter(([, type]) => type.rest_base)
                            .map(([slug, type]) => ({
                                name: allowedTypes[slug],
                                slug: slug,
                                rest_base: type.rest_base
                            }));
                            
                        postTypes.value = filteredTypes;
                        
                        // Auto-select first post type
                        if (filteredTypes.length > 0) {
                            selectPostType(filteredTypes[0]);
                        }
                    } catch (error) {
                        console.error('Error fetching post types:', error);
                        postTypes.value = [];
                    }
                }

                // Fetch taxonomies
                async function fetchTaxonomies() {
                    try {
                        const response = await fetch(`${wpApiUrl}/taxonomies`);
                        const data = await response.json();
                        taxonomies.value = Object.values(data)
                            .filter(tax => tax.rest_base && tax.slug && tax.types)
                            .map(tax => ({
                                name: tax.name,
                                slug: tax.slug,
                                rest_base: tax.rest_base,
                                types: Array.isArray(tax.types) ? tax.types : []
                            }));
                        updateFilteredTaxonomies();
                    } catch (error) {
                        console.error('Error fetching taxonomies:', error);
                        taxonomies.value = [];
                        filteredTaxonomies.value = [];
                    }
                }

                // Update filtered taxonomies
                function updateFilteredTaxonomies() {
                    if (selectedPostType.value && selectedPostType.value.slug && taxonomies.value) {
                        filteredTaxonomies.value = taxonomies.value.filter(tax => 
                            tax.types && Array.isArray(tax.types) && tax.types.includes(selectedPostType.value.slug)
                        );
                    } else {
                        filteredTaxonomies.value = [];
                    }
                }

                // Fetch taxonomy terms
                async function fetchTaxonomyTerms() {
                    if (!selectedPostType.value) return;
                    
                    taxonomyTermsMap.value = {};
                    
                    for (const tax of filteredTaxonomies.value) {
                        try {
                            const response = await fetch(`${wpApiUrl}/${tax.rest_base}`);
                            const terms = await response.json();
                            taxonomyTermsMap.value[tax.slug] = terms;
                            
                            if (tax.slug === 'post_tag') {
                                tagTaxonomy.value = tax;
                            }
                        } catch (error) {
                            console.error(`Error fetching terms for ${tax.name}:`, error);
                            taxonomyTermsMap.value[tax.slug] = [];
                        }
                    }
                }

                // Selection handlers
                function selectTerm({term, taxonomy}) {
                    if (!selectedTerms.value[taxonomy.slug]) {
                        selectedTerms.value[taxonomy.slug] = [];
                    }
                    
                    const termIndex = selectedTerms.value[taxonomy.slug].findIndex(t => t.id === term.id);
                    if (termIndex === -1) {
                        // Add term if not already selected
                        selectedTerms.value[taxonomy.slug].push(term);
                    } else {
                        // Remove term if already selected
                        selectedTerms.value[taxonomy.slug].splice(termIndex, 1);
                        if (selectedTerms.value[taxonomy.slug].length === 0) {
                            delete selectedTerms.value[taxonomy.slug];
                        }
                    }
                    
                    fetchPosts();
                }

                function selectPostType(type) {
                    selectedPostType.value = type;
                    selectedTerms.value = {}; // Reset selected terms
                    selectedTaxonomy.value = null;
                    updateFilteredTaxonomies();
                    fetchPosts();
                }

                // Modified fetchPosts to handle multiple terms
                async function fetchPosts() {
                    if (!selectedPostType.value || !selectedPostType.value.rest_base) return;

                    let url = `${wpApiUrl}/${selectedPostType.value.rest_base}?_embed`;
                    
                    // Add all selected terms to the query
                    const taxonomyQueries = [];
                    for (const [taxSlug, terms] of Object.entries(selectedTerms.value)) {
                        const taxonomy = taxonomies.value.find(t => t.slug === taxSlug);
                        if (taxonomy && terms.length > 0) {
                            const termIds = terms.map(t => t.id).join(',');
                            taxonomyQueries.push(`${taxonomy.rest_base}=${termIds}`);
                        }
                    }
                    
                    if (taxonomyQueries.length > 0) {
                        url += '&' + taxonomyQueries.join('&');
                    }

                    try {
                        const response = await fetch(url);
                        const data = await response.json();
                        posts.value = data.map(post => ({
                            ...post,
                            featured_media_url: post._embedded?.['wp:featuredmedia']?.[0]?.source_url || null,
                            link: post.link
                        }));
                    } catch (error) {
                        console.error('Error fetching posts:', error);
                        posts.value = [];
                    }
                }

                // Watch for post type changes
                watch(selectedPostType, () => {
                    fetchTaxonomyTerms();
                });

                // Initial data fetch
                fetchPostTypes();
                fetchTaxonomies();

                return {
                    postTypes,
                    posts,
                    selectedPostType,
                    selectedTerms,
                    hasPostTags,
                    postTags,
                    otherTaxonomies,
                    tagTaxonomy,
                    selectPostType,
                    selectTerm,
                    resetFilters
                };
            }
        }).mount('#app');
    });
    </script>
</main>

<?php
get_footer();

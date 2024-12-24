<?php
/**
 * Template for displaying single episodes
 */

get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('bg-gray-100'); ?>>
    <!-- Hero Section with Background Image -->
    <div class="relative h-[60vh] w-full">
        <?php if (has_post_thumbnail()) : ?>
            <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('<?php echo get_the_post_thumbnail_url(null, 'full'); ?>');">
                <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            </div>
        <?php endif; ?>
        <div class="relative container mx-auto px-6 h-full flex items-end pb-16">
            <div class="text-white">
                <h1 class="text-4xl md:text-5xl font-bold mb-2"><?php the_title(); ?></h1>
                <div class="text-xl text-gray-300">
                    <?php 
                    $episodio_numero = get_field('episodio_numero');
                    $temporada = wp_get_post_terms(get_the_ID(), 'temporadas', array('fields' => 'names'));
                    if ($episodio_numero && !empty($temporada)) {
                        printf('Episodio %d, %s', $episodio_numero, $temporada[0]);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-6 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column - Main Info -->
            <div class="lg:col-span-2">
                <!-- Episode Info -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <h2 class="text-2xl font-semibold mb-4">Información del Episodio</h2>
                    <div class="space-y-4">
                        <?php if ($sinopsis = get_field('sinopsis')) : ?>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Sinopsis</h3>
                            <p class="text-gray-600 mt-2"><?php echo wp_kses_post($sinopsis); ?></p>
                        </div>
                        <?php endif; ?>
                        
                        <?php 
                        $detalles_produccion = get_field('detalles_produccion');
                        if ($detalles_produccion) : ?>
                        <div class="border-t pt-4">
                            <h3 class="text-lg font-medium text-gray-900">Detalles de Producción</h3>
                            <dl class="mt-2 grid grid-cols-1 gap-x-4 gap-y-4 sm:grid-cols-2">
                                <?php if (!empty($detalles_produccion['director'])) : ?>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Director</dt>
                                    <dd class="text-sm text-gray-900"><?php echo esc_html($detalles_produccion['director']); ?></dd>
                                </div>
                                <?php endif; ?>
                                <?php if (!empty($detalles_produccion['guionista'])) : ?>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Guionista</dt>
                                    <dd class="text-sm text-gray-900"><?php echo esc_html($detalles_produccion['guionista']); ?></dd>
                                </div>
                                <?php endif; ?>
                                <?php if (!empty($detalles_produccion['fecha_estreno'])) : ?>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Fecha de Estreno</dt>
                                    <dd class="text-sm text-gray-900"><?php echo date_i18n(get_option('date_format'), strtotime($detalles_produccion['fecha_estreno'])); ?></dd>
                                </div>
                                <?php endif; ?>
                                <?php if (!empty($detalles_produccion['duracion'])) : ?>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Duración</dt>
                                    <dd class="text-sm text-gray-900"><?php echo esc_html($detalles_produccion['duracion']); ?> minutos</dd>
                                </div>
                                <?php endif; ?>
                            </dl>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Cast Section -->
                <?php if (have_rows('reparto')) : ?>
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-2xl font-semibold mb-6">Reparto Principal</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <?php while (have_rows('reparto')) : the_row(); 
                            $actor = get_sub_field('actor');
                            $personaje = get_sub_field('personaje');
                            if ($actor) : ?>
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <?php 
                                    $avatar = get_field('avatar', $actor->ID);
                                    if ($avatar) : ?>
                                        <img src="<?php echo esc_url($avatar); ?>" class="h-16 w-16 rounded-full object-cover" alt="<?php echo esc_attr($actor->post_title); ?>">
                                    <?php elseif (has_post_thumbnail($actor->ID)) : ?>
                                        <?php echo get_the_post_thumbnail($actor->ID, 'thumbnail', ['class' => 'h-16 w-16 rounded-full object-cover']); ?>
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <p class="text-lg md:text-base font-medium text-gray-900">
                                        <a href="<?php echo get_permalink($actor->ID); ?>" class="hover:text-blue-600">
                                            <?php echo esc_html($actor->post_title); ?>
                                        </a>
                                    </p>
                                    <?php if ($personaje) : ?>
                                        <p class="text-lg md:text-base text-gray-500">como 
                                            <a href="<?php echo get_permalink($personaje->ID); ?>" class="hover:text-blue-600">
                                                <?php echo esc_html($personaje->post_title); ?>
                                            </a>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endif;
                        endwhile; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <!-- Right Column - Sidebar -->
            <div class="lg:col-span-1">
                <!-- Episode Stats -->
                <?php $datos_episodio = get_field('datos_episodio'); ?>
                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <h3 class="text-xl font-semibold mb-4">Datos del Episodio</h3>
                    <div class="space-y-4">
                        <?php if (!empty($datos_episodio['calificacion'])) : ?>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Calificación</span>
                            <span class="text-yellow-500"><?php echo str_repeat('★', $datos_episodio['calificacion']) . str_repeat('☆', 5 - $datos_episodio['calificacion']); ?></span>
                        </div>
                        <?php endif; ?>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Visualizaciones</span>
                            <span class="font-medium"><?php echo number_format_i18n(get_post_meta(get_the_ID(), 'post_views_count', true) ?: 0); ?></span>
                        </div>
                        <?php 
                        $episodio_numero = get_field('episodio_numero');
                        $temporada_episodes = get_posts(array(
                            'post_type' => 'episodio',
                            'posts_per_page' => -1,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'temporadas',
                                    'field' => 'term_id',
                                    'terms' => wp_get_post_terms(get_the_ID(), 'temporadas', array('fields' => 'ids'))
                                )
                            )
                        ));
                        if ($episodio_numero) : ?>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Orden en Temporada</span>
                            <span class="font-medium">Episodio <?php echo $episodio_numero; ?> de <?php echo count($temporada_episodes); ?></span>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Share Buttons -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-4">Compartir</h3>
                    <div class="flex space-x-4">
                        <button class="flex-1 bg-blue-600 text-white py-2 px-6 rounded-md hover:bg-blue-700">
                            <i class="fab fa-twitter mr-2"></i> Twitter
                        </button>
                        <button class="flex-1 bg-blue-800 text-white py-2 px-6 rounded-md hover:bg-blue-900">
                            <i class="fab fa-facebook mr-2"></i> Facebook
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
<?php get_footer(); ?>

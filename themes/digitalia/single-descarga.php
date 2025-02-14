<?php
/**
 * Template for displaying single descarga (download) posts
 */

get_header(); ?>

<main class="bg-slate-50">
    <div class="container mx-auto px-4 py-8 max-w-7xl">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Main Content Column -->
            <div class="lg:w-2/3">
                <?php while (have_posts()) : the_post(); 
                    $file = get_field('archivo');
                    $file_size = $file ? size_format(filesize(get_attached_file($file['ID']))) : '0 KB';
                    $file_type = $file ? wp_check_filetype($file['url'])['ext'] : 'N/A';
                ?>
                    <!-- Breadcrumb -->
                    <nav class="text-sm mb-6">
                        <ol class="list-none p-0 inline-flex">
                            <li class="flex items-center">
                                <a href="<?php echo home_url(); ?>" class="text-blue-600 hover:text-blue-800">Inicio</a>
                                <i class="fas fa-chevron-right mx-3 text-gray-400 text-xs"></i>
                            </li>
                            <li class="flex items-center">
                                <a href="<?php echo get_post_type_archive_link('descarga'); ?>" class="text-blue-600 hover:text-blue-800">Descargas</a>
                                <i class="fas fa-chevron-right mx-3 text-gray-400 text-xs"></i>
                            </li>
                            <li class="text-gray-500"><?php the_title(); ?></li>
                        </ol>
                    </nav>

                    <!-- Imagen destacada -->
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="mb-6">
                            <?php the_post_thumbnail('custom-size', array(
                                'class' => 'w-full h-[280px] object-cover rounded-lg',
                                'style' => 'max-width: 765px; margin: 0 auto; display: block;'
                            )); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Título -->
                    <h1 class="text-3xl font-bold text-gray-900 mb-4"><?php the_title(); ?></h1>

                    <!-- Meta información -->
                    <div class="flex flex-wrap gap-4 mb-6 text-sm text-gray-600">
                        <div class="flex items-center">
                            <i class="far fa-calendar-alt mr-2"></i>
                            <span>Fecha de publicación: <?php echo get_the_date('d/m/Y'); ?></span>
                        </div>
                        <div class="flex items-center">
                            <i class="far fa-file-<?php echo $file_type; ?> mr-2"></i>
                            <span>Formato: <?php echo strtoupper($file_type); ?></span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-database mr-2"></i>
                            <span>Tamaño: <?php echo $file_size; ?></span>
                        </div>
                    </div>

                    <!-- Descripción -->
                    <div class="prose max-w-none mb-8">
                        <h2 class="text-xl font-semibold text-gray-900 mb-4">Descripción del Documento</h2>
                        <?php the_content(); ?>
                    </div>

                    <!-- Detalles del archivo -->
                    <div class="bg-white rounded-lg p-6 mb-8 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Información del Archivo</h3>
                        <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Autor</dt>
                                <dd class="mt-1 text-sm text-gray-900"><?php echo get_field('autor'); ?></dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Año de Publicación</dt>
                                <dd class="mt-1 text-sm text-gray-900"><?php echo get_field('ano_publicacion'); ?></dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Categoría</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    <?php
                                    $categories = get_the_category();
                                    if ($categories) {
                                        echo esc_html($categories[0]->name);
                                    }
                                    ?>
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Idioma</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    <?php 
                                    $idiomas = array(
                                        'es' => 'Español',
                                        'en' => 'Inglés',
                                        'pt' => 'Portugués',
                                        'fr' => 'Francés'
                                    );
                                    echo $idiomas[get_field('idioma')]; 
                                    ?>
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Número de Páginas</dt>
                                <dd class="mt-1 text-sm text-gray-900"><?php echo get_field('numero_paginas'); ?></dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Licencia</dt>
                                <dd class="mt-1 text-sm text-gray-900">
                                    <?php 
                                    $licencias = array(
                                        'cc-by' => 'Creative Commons BY',
                                        'cc-by-sa' => 'Creative Commons BY-SA',
                                        'cc-by-nc' => 'Creative Commons BY-NC',
                                        'cc-by-nc-sa' => 'Creative Commons BY-NC-SA',
                                        'cc-by-nd' => 'Creative Commons BY-ND',
                                        'cc-by-nc-nd' => 'Creative Commons BY-NC-ND',
                                        'copyright' => 'Todos los derechos reservados'
                                    );
                                    echo $licencias[get_field('licencia')];
                                    ?>
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Número de Descargas</dt>
                                <dd class="mt-1 text-sm text-gray-900"><?php echo get_field('numero_descargas'); ?></dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Última Actualización</dt>
                                <dd class="mt-1 text-sm text-gray-900"><?php echo get_field('ultima_actualizacion'); ?></dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Versión</dt>
                                <dd class="mt-1 text-sm text-gray-900"><?php echo get_field('version'); ?></dd>
                            </div>
                        </dl>
                    </div>

                    <!-- Botón de descarga -->
                    <div class="text-center bg-white p-6 rounded-lg shadow-sm">
                        <?php if ($file) : ?>
                            <a href="<?php echo esc_url($file['url']); ?>" 
                               class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                               download>
                                <i class="fas fa-download mr-2"></i>
                                Descargar Archivo
                            </a>
                        <?php else : ?>
                            <p class="text-red-600">Archivo no disponible</p>
                        <?php endif; ?>
                    </div>

                    <!-- Etiquetas -->
                    <?php
                    $tags = get_the_tags();
                    if ($tags) : ?>
                        <div class="mt-8 bg-white p-6 rounded-lg shadow-sm">
                            <h4 class="text-sm font-medium text-gray-900 mb-2">Etiquetas:</h4>
                            <div class="flex flex-wrap gap-2">
                                <?php foreach ($tags as $tag) : ?>
                                    <a href="<?php echo get_tag_link($tag->term_id); ?>" class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-slate-100 text-gray-800 hover:bg-slate-200">
                                        <?php echo $tag->name; ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>

            <!-- Sidebar -->
            <div class="lg:w-1/3 space-y-6">
                <!-- Autor Card -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Sobre el Autor</h3>
                    <div class="flex items-center mb-4">
                        <img class="h-12 w-12 rounded-full mr-4" src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>" alt="Autor">
                        <div>
                            <h4 class="font-medium"><?php the_author(); ?></h4>
                            <p class="text-sm text-gray-600">Especialista en Documentación</p>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 mb-4"><?php echo get_the_author_meta('description'); ?></p>
                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                        Ver más publicaciones →
                    </a>
                </div>

                <!-- Categorías Card -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Categorías</h3>
                    <?php
                    $categories = get_the_category();
                    if ($categories) : ?>
                        <div class="space-y-2">
                            <?php foreach ($categories as $category) : ?>
                                <a href="<?php echo get_category_link($category->term_id); ?>" 
                                   class="block px-4 py-2 rounded-md bg-slate-50 hover:bg-slate-100 text-gray-700">
                                    <?php echo $category->name; ?>
                                    <span class="float-right text-gray-500"><?php echo $category->count; ?></span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>

<?php
/**
 * Template for displaying single actor profiles
 */

get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('bg-gray-100'); ?>>
    <!-- Profile Header Section -->
    <div class="relative bg-gradient-to-r from-blue-500 to-red-500 text-white">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-blue opacity-50"></div>
        </div>
        
        <div class="relative container mx-auto px-6 py-16">
            <div class="md:flex items-center space-y-8 md:space-y-0 md:space-x-12">
                <!-- Profile Image -->
                <div class="flex justify-center">
                    <div class="w-48 h-48 md:w-64 md:h-64 rounded-full border-4 border-white shadow-xl overflow-hidden">
                        <img class="w-full h-full object-cover" src="https://pbs.twimg.com/profile_images/1460440947867758593/aJ113NyF_400x400.jpg" alt="Nombre del Actor">
                    </div>
                </div>
                
                <!-- Profile Info -->
                <div class="flex-1 text-center md:text-left">
                    <div class="mb-6">
                        <h1 class="text-4xl md:text-5xl font-bold mb-2">Diego Velez</h1>
                        <p class="text-xl text-gray-300">Actor • Director</p>
                    </div>
                    
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-8 text-gray-200">
                        <div>
                            <h3 class="text-sm font-medium opacity-75">Fecha de Nacimiento</h3>
                            <p>15 de Marzo, 1985</p>
                        </div>
                        <div>
                            <h3 class="text-sm font-medium opacity-75">Lugar de Nacimiento</h3>
                            <p>Madrid, España</p>
                        </div>
                        <div class="flex justify-center md:justify-start space-x-4">
                            <a href="#" class="flex-1 bg-white text-[#E4405F] py-2 px-4 rounded-md hover:bg-gray-50 text-center"><i class="fab fa-instagram text-xl"></i><span class="text-sm ml-1">Instagram</span></a>
                            <a href="#" class="flex-1 bg-white text-[#1DA1F2] py-2 px-4 rounded-md hover:bg-gray-50 text-center"><i class="fab fa-twitter text-xl"></i><span class="text-sm ml-1">Twitter</span></a>
                            <a href="#" class="flex-1 bg-white text-[#0A66C2] py-2 px-4 rounded-md hover:bg-gray-50 text-center"><i class="fab fa-linkedin text-xl"></i><span class="text-sm ml-1">LinkedIn</span></a>
                        </div>
                    </div>

                    <!-- Social Media Links -->
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-6 pt-16 pb-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Column - Main Info -->
            <div class="lg:col-span-2">
                <!-- Biography -->
                <div class="bg-white rounded-lg shadow-md p-8 mb-8">
                    <h2 class="text-2xl font-semibold mb-6">Biografía</h2>
                    <div class="prose max-w-none">
                        <p class="text-gray-600">
                            Diego Torres comenzó su carrera en el teatro a una edad temprana, participando en numerosas obras escolares antes de dar el salto a la televisión. Su breakthrough llegó con el papel protagonista en "La Ciudad Perdida" (2010), que le valió varios reconocimientos incluyendo el Premio Goya a Mejor Actor Revelación.
                        </p>
                        <p class="text-gray-600 mt-4">
                            Además de su trabajo frente a las cámaras, Diego ha dirigido varios cortometrajes y ha participado como productor en proyectos independientes. Su versatilidad como artista le ha permitido mantener una carrera diversa y exitosa en la industria del entretenimiento español.
                        </p>
                    </div>
                </div>

                <!-- Episodes -->
                <div class="bg-white rounded-lg shadow-md p-8">
                    <h2 class="text-2xl font-semibold mb-6">Episodios</h2>
                    <div class="space-y-6">
                        <!-- Episode -->
                        <div class="flex items-start space-x-4">
                            <img class="w-24 h-36 object-cover rounded-md" src="https://picsum.photos/200/300" alt="El Secreto del Valle - Episodio 5">
                            <div>
                                <h3 class="text-lg font-medium">El Secreto del Valle</h3>
                                <p class="text-gray-500">Temporada 2, Episodio 5</p>
                                <p class="text-gray-600 mt-2">Como Carlos Ruiz</p>
                                <p class="text-sm text-gray-500 mt-1">15 de Marzo, 2024</p>
                            </div>
                        </div>

                        <!-- Episode -->
                        <div class="flex items-start space-x-4">
                            <img class="w-24 h-36 object-cover rounded-md" src="https://picsum.photos/201/300" alt="El Secreto del Valle - Episodio 4">
                            <div>
                                <h3 class="text-lg font-medium">El Secreto del Valle</h3>
                                <p class="text-gray-500">Temporada 2, Episodio 4</p>
                                <p class="text-gray-600 mt-2">Como Carlos Ruiz</p>
                                <p class="text-sm text-gray-500 mt-1">8 de Marzo, 2024</p>
                            </div>
                        </div>

                        <!-- Episode -->
                        <div class="flex items-start space-x-4">
                            <img class="w-24 h-36 object-cover rounded-md" src="https://picsum.photos/202/300" alt="El Secreto del Valle - Episodio 3">
                            <div>
                                <h3 class="text-lg font-medium">El Secreto del Valle</h3>
                                <p class="text-gray-500">Temporada 2, Episodio 3</p>
                                <p class="text-gray-600 mt-2">Como Carlos Ruiz</p>
                                <p class="text-sm text-gray-500 mt-1">1 de Marzo, 2024</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Column - Sidebar -->
            <div class="lg:col-span-1">
                <!-- Awards & Recognition -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <h3 class="text-xl font-semibold mb-4">Premios y Reconocimientos</h3>
                    <ul class="space-y-4">
                        <li class="border-b pb-4">
                            <p class="font-medium">Premio Goya</p>
                            <p class="text-sm text-gray-600">Mejor Actor Revelación</p>
                            <p class="text-sm text-gray-500">La Ciudad Perdida (2010)</p>
                        </li>
                        <li class="border-b pb-4">
                            <p class="font-medium">Festival de San Sebastián</p>
                            <p class="text-sm text-gray-600">Concha de Plata</p>
                            <p class="text-sm text-gray-500">El Camino (2015)</p>
                        </li>
                        <li>
                            <p class="font-medium">Premios Feroz</p>
                            <p class="text-sm text-gray-600">Mejor Actor de Reparto</p>
                            <p class="text-sm text-gray-500">La Última Noche (2018)</p>
                        </li>
                    </ul>
                </div>

                <!-- Skills & Specialties -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-semibold mb-4">Habilidades</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-gray-100 rounded-full text-sm text-gray-700">Drama</span>
                        <span class="px-3 py-1 bg-gray-100 rounded-full text-sm text-gray-700">Comedia</span>
                        <span class="px-3 py-1 bg-gray-100 rounded-full text-sm text-gray-700">Teatro</span>
                        <span class="px-3 py-1 bg-gray-100 rounded-full text-sm text-gray-700">Voz en Off</span>
                        <span class="px-3 py-1 bg-gray-100 rounded-full text-sm text-gray-700">Dirección</span>
                        <span class="px-3 py-1 bg-gray-100 rounded-full text-sm text-gray-700">Producción</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>

<?php
get_template_part('template-parts/cta-modulos', null, array(
    'title' => 'Academia Digital-IA',
    'description' => 'Ecosistema de soluciones tecnológicas diseñado para ofrecer servicios educativos e informativos que te preparan para los desafíos de las tecnologías emergentes.',
    'cta_primary_text' => 'Comenzar ahora',
    'cta_primary_url' => '/plataforma/register',
    'cta_secondary_text' => 'Explorar cursos',
    'cta_secondary_url' => '/plataforma/courses',
    'doc_title' => 'Documentación',
    'doc_description' => 'Accede a guías detalladas sobre el uso de la plataforma y recursos educativos.',
    'doc_url' => '/plataforma/docs',
    'guide_title' => 'Primeros pasos',
    'guide_description' => 'Aprende a utilizar la plataforma y comienza tu formación en alfabetización mediática.',
    'guide_url' => '/plataforma/getting-started'
));
?>
<?php get_footer(); ?>

<?php
/**
 * Template Name: Academia - Programas Educativos
 * 
 * @package Digitalia
 */

get_header();
?>

<main class="bg-slate-50">
    <section class="py-16 md:py-24 bg-yellow-50">
        <div class="container mx-auto px-4">
            <div class="grid items-center gap-8 lg:grid-cols-2">
                <div class="flex flex-col items-center px-4 text-center lg:items-start lg:text-left">
                    <p class="text-yellow-600 font-semibold mb-4">Programas Educativos</p>
                    <h1 class="text-4xl lg:text-6xl font-bold mb-6 text-yellow-900">Formación Digital Integral</h1>
                    <p class="mb-8 max-w-xl text-yellow-900 lg:text-xl">
                        Descubre nuestro catálogo de cursos especializados en alfabetización mediática, tecnologías emergentes y comunicación digital para la paz.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#catalogo" class="inline-flex items-center justify-center px-6 py-3 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Ver Cursos
                        </a>
                        <a href="#metodologia" class="inline-flex items-center justify-center px-6 py-3 border border-yellow-600 text-yellow-600 rounded-lg hover:bg-yellow-50 transition-colors">
                            Metodología
                        </a>
                    </div>
                </div>
                <img src="https://placehold.co/800x600/ca8a04/fef9c3" alt="Programas Educativos" class="w-full rounded-lg shadow-xl">
            </div>
        </div>
    </section>
    <!-- Catálogo de Cursos Section -->
    <section class="py-32 bg-slate-50">
        <div class="container mx-auto px-4">
            <div class="mx-auto flex max-w-screen-md flex-col items-center gap-6 text-center">
                
                <h1 class="text-balance text-4xl font-semibold text-slate-900">
                    Catálogo de Cursos Educativos
                </h1>
                <p class="text-slate-600">
                    Explora nuestra selección de programas diseñados para desarrollar tus habilidades digitales y fortalecer tu presencia en línea.
                </p>
                <a href="#" class="flex items-center gap-1 text-sm font-semibold text-slate-800 hover:text-slate-900">
                    Ver todos los cursos
                    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"/>
                    </svg>
                </a>
            </div>
            <div class="mt-20 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                <!-- Card 1 -->
                <div class="flex flex-col bg-white rounded-lg transition-transform hover:-translate-y-1">
                    <div class="relative">
                        <img src="https://placehold.co/800x450" alt="Paz mediática" class="aspect-video w-full rounded-t-lg object-cover">
                        <span class="absolute right-4 top-4 rounded-full bg-slate-100 px-3 py-1 text-sm font-semibold text-slate-800 border border-slate-200">
                            Tecnología
                        </span>
                    </div>
                    <div class="flex h-full flex-col justify-between p-6 border-2 border-t-0 border-slate-200 rounded-b-lg">
                        <h2 class="mb-5 text-xl font-semibold text-slate-900">
                            Paz mediática y tecnologías emergentes
                        </h2>
                        <div class="flex justify-between gap-6 text-sm">
                            <span class="flex items-center gap-1 text-slate-600">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                12 semanas
                            </span>
                            <a href="#" class="flex items-center gap-1 text-slate-800 hover:text-slate-900">
                                Más información
                                <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="m9 18 6-6-6-6"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="flex flex-col bg-white rounded-lg transition-transform hover:-translate-y-1">
                    <div class="relative">
                        <img src="https://placehold.co/800x450" alt="Derechos digitales" class="aspect-video w-full rounded-t-lg object-cover">
                        <span class="absolute right-4 top-4 rounded-full bg-slate-100 px-3 py-1 text-sm font-semibold text-slate-800 border border-slate-200">
                            Legal
                        </span>
                    </div>
                    <div class="flex h-full flex-col justify-between p-6 border-2 border-t-0 border-slate-200 rounded-b-lg">
                        <h2 class="mb-5 text-xl font-semibold text-slate-900">
                            Derechos y deberes digitales
                        </h2>
                        <div class="flex justify-between gap-6 text-sm">
                            <span class="flex items-center gap-1 text-slate-600">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                8 semanas
                            </span>
                            <a href="#" class="flex items-center gap-1 text-slate-800 hover:text-slate-900">
                                Más información
                                <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="m9 18 6-6-6-6"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="flex flex-col bg-white rounded-lg transition-transform hover:-translate-y-1">
                    <div class="relative">
                        <img src="https://placehold.co/800x450" alt="Seguridad informática" class="aspect-video w-full rounded-t-lg object-cover">
                        <span class="absolute right-4 top-4 rounded-full bg-slate-100 px-3 py-1 text-sm font-semibold text-slate-800 border border-slate-200">
                            Seguridad
                        </span>
                    </div>
                    <div class="flex h-full flex-col justify-between p-6 border-2 border-t-0 border-slate-200 rounded-b-lg">
                        <h2 class="mb-5 text-xl font-semibold text-slate-900">
                            Seguridad informática ciudadana
                        </h2>
                        <div class="flex justify-between gap-6 text-sm">
                            <span class="flex items-center gap-1 text-slate-600">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                10 semanas
                            </span>
                            <a href="#" class="flex items-center gap-1 text-slate-800 hover:text-slate-900">
                                Más información
                                <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="m9 18 6-6-6-6"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Metodología de Aprendizaje Section -->
    <section class="py-32 bg-slate-200">
        <div class="container max-w-7xl mx-auto px-4">
            <h1 class="mb-14 max-w-2xl text-4xl font-semibold text-slate-900 md:text-5xl">
                Metodología de Aprendizaje Digital
            </h1>
            <div class="flex justify-between gap-20">
                <div class="flex flex-col gap-16 md:w-1/2">
                    <!-- Section 1 -->
                    <div class="flex flex-col gap-4 md:h-[50vh] section-content" data-index="0">
                        <div class="block rounded-2xl border border-slate-200 bg-white p-4 md:hidden">
                            <img src="https://placehold.co/600x400" alt="Aprendizaje autodirigido" class="h-full max-h-full w-full max-w-full rounded-2xl object-cover">
                        </div>
                        <p class="text-sm font-semibold text-slate-600 md:text-base">Aprendizaje Flexible</p>
                        <h2 class="text-2xl font-semibold text-slate-900 md:text-4xl">Aprendizaje Autodirigido</h2>
                        <p class="text-slate-600">Aprende a tu propio ritmo con contenido estructurado y recursos interactivos. Define tu camino de aprendizaje según tus necesidades y objetivos personales.</p>
                    </div>
                    <!-- Section 2 -->
                    <div class="flex flex-col gap-4 md:h-[50vh] section-content" data-index="1">
                        <div class="block rounded-2xl border border-slate-200 bg-white p-4 md:hidden">
                            <img src="https://placehold.co/600x400" alt="Componente práctico" class="h-full max-h-full w-full max-w-full rounded-2xl object-cover">
                        </div>
                        <p class="text-sm font-semibold text-slate-600 md:text-base">Práctica Efectiva</p>
                        <h2 class="text-2xl font-semibold text-slate-900 md:text-4xl">Componente Práctico</h2>
                        <p class="text-slate-600">Aplica lo aprendido en proyectos reales y casos de estudio. Desarrolla habilidades prácticas a través de ejercicios y simulaciones interactivas.</p>
                    </div>
                    <!-- Section 3 -->
                    <div class="flex flex-col gap-4 md:h-[50vh] section-content" data-index="2">
                        <div class="block rounded-2xl border border-slate-200 bg-white p-4 md:hidden">
                            <img src="https://placehold.co/600x400" alt="Evaluación y seguimiento" class="h-full max-h-full w-full max-w-full rounded-2xl object-cover">
                        </div>
                        <p class="text-sm font-semibold text-slate-600 md:text-base">Seguimiento Continuo</p>
                        <h2 class="text-2xl font-semibold text-slate-900 md:text-4xl">Evaluación y Seguimiento</h2>
                        <p class="text-slate-600">Recibe retroalimentación continua y monitorea tu progreso. Obtén evaluaciones detalladas y recomendaciones personalizadas para mejorar tu aprendizaje.</p>
                    </div>
                </div>
                <div class="sticky right-0 top-56 hidden h-fit w-full items-center justify-center md:flex" id="image-container">
                    <img src="https://placehold.co/600x400" alt="Placeholder" class="invisible h-full max-h-[550px] w-full max-w-full object-cover">
                    
                    <div class="absolute inset-0 flex h-full items-center justify-center rounded-2xl border border-slate-200 bg-white p-4 transition-opacity duration-200 image-overlay" data-index="0">
                        <img src="https://placehold.co/600x400" alt="Aprendizaje autodirigido" class="h-full max-h-full w-full max-w-full rounded-2xl object-cover">
                    </div>
                    <div class="absolute inset-0 flex h-full items-center justify-center rounded-2xl border border-slate-200 bg-white p-4 transition-opacity duration-200 image-overlay opacity-0" data-index="1">
                        <img src="https://placehold.co/600x400" alt="Componente práctico" class="h-full max-h-full w-full max-w-full rounded-2xl object-cover">
                    </div>
                    <div class="absolute inset-0 flex h-full items-center justify-center rounded-2xl border border-slate-200 bg-white p-4 transition-opacity duration-200 image-overlay opacity-0" data-index="2">
                        <img src="https://placehold.co/600x400" alt="Evaluación y seguimiento" class="h-full max-h-full w-full max-w-full rounded-2xl object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const sections = document.querySelectorAll('.section-content');
        const imageOverlays = document.querySelectorAll('.image-overlay');
        let activeIndex = 0;

        function updateActiveSection() {
            const viewportHeight = window.innerHeight;
            const viewportCenter = viewportHeight / 2;
            
            let closestSection = 0;
            let closestDistance = Infinity;

            sections.forEach((section, index) => {
                const rect = section.getBoundingClientRect();
                const sectionCenter = rect.top + rect.height / 2;
                const distance = Math.abs(sectionCenter - viewportCenter);

                if (distance < closestDistance) {
                    closestDistance = distance;
                    closestSection = index;
                }
            });

            if (activeIndex !== closestSection) {
                activeIndex = closestSection;
                updateImages();
            }
        }

        function updateImages() {
            imageOverlays.forEach((overlay, index) => {
                if (index === activeIndex) {
                    overlay.classList.remove('opacity-0');
                } else {
                    overlay.classList.add('opacity-0');
                }
            });
        }

        window.addEventListener('scroll', updateActiveSection);
        updateActiveSection();
    });
    </script>

    <!-- Testimonios Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">Testimonios</h2>
            <div class="grid md:grid-cols-2 gap-12">
                <!-- Testimonio 1 -->
                <div class="bg-white border-2 border-gray-200 rounded-xl p-8 relative">
                    <div class="absolute -top-6 left-8">
                        <img class="h-20 w-20 rounded-full border-4 border-gray-100" src="https://placehold.co/80x80" alt="Estudiante">
                    </div>
                    <div class="mt-8">
                        <svg class="h-8 w-8 text-yellow-300 mb-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                        </svg>
                        <p class="text-gray-700 mb-6">Los cursos han transformado mi comprensión de la seguridad digital. Ahora me siento más preparado para proteger mi información en línea.</p>
                        <div class="border-t border-gray-200 pt-4">
                            <h3 class="text-lg font-medium text-gray-900">Carlos Ramírez</h3>
                            <p class="text-gray-600 text-sm">Estudiante de Seguridad Informática</p>
                        </div>
                    </div>
                </div>
                <!-- Testimonio 2 -->
                <div class="bg-white border-2 border-gray-200 rounded-xl p-8 relative">
                    <div class="absolute -top-6 left-8">
                        <img class="h-20 w-20 rounded-full border-4 border-gray-100" src="https://placehold.co/80x80" alt="Estudiante">
                    </div>
                    <div class="mt-8">
                        <svg class="h-8 w-8 text-yellow-300 mb-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                        </svg>
                        <p class="text-gray-700 mb-6">El programa me ha ayudado a entender mejor mis derechos digitales y cómo ejercerlos de manera responsable.</p>
                        <div class="border-t border-gray-200 pt-4">
                            <h3 class="text-lg font-medium text-gray-900">Ana Martínez</h3>
                            <p class="text-gray-600 text-sm">Estudiante de Derechos Digitales</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>

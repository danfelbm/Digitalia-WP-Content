<?php
/**
 * Secondary Navigation Template Part
 *
 * @package Digitalia
 */

// Check if we're on academia page or child page
$post = get_post();
$is_academia = false;

if ($post) {
    if ($post->post_name === 'academia') {
        $is_academia = true;
    } else {
        $ancestors = get_post_ancestors($post->ID);
        foreach ($ancestors as $ancestor) {
            $ancestor_post = get_post($ancestor);
            if ($ancestor_post->post_name === 'academia') {
                $is_academia = true;
                break;
            }
        }
    }
}

// Only show if we're in academia section
if (!$is_academia) {
    return;
}
?>

<!-- Desktop Secondary Navigation -->
<nav class="hidden md:block sticky top-16 z-50 bg-yellow-100 shadow-md">
    <div class="container mx-auto px-4">
        <div class="flex justify-center space-x-8 py-3">
            <a href="/modulos/academia/introduccion" class="text-yellow-800 hover:bg-yellow-200 hover:text-yellow-900 rounded-md px-3 py-2 text-sm font-medium transition-colors duration-200">
                Introducción
            </a>
            <a href="/modulos/academia/programas" class="text-yellow-800 hover:bg-yellow-200 hover:text-yellow-900 rounded-md px-3 py-2 text-sm font-medium transition-colors duration-200">
                Programas Educativos
            </a>
            <a href="/modulos/academia/recursos" class="text-yellow-800 hover:bg-yellow-200 hover:text-yellow-900 rounded-md px-3 py-2 text-sm font-medium transition-colors duration-200">
                Recursos y Herramientas
            </a>
            <a href="/modulos/academia/comunidad" class="text-yellow-800 hover:bg-yellow-200 hover:text-yellow-900 rounded-md px-3 py-2 text-sm font-medium transition-colors duration-200">
                Comunidad
            </a>
        </div>
    </div>
</nav>

<!-- Mobile Secondary Navigation Button -->
<div x-data="{ subMenuOpen: false }" class="md:hidden fixed bottom-16 left-0 right-0 z-[44]">
    <button @click="subMenuOpen = !subMenuOpen" class="w-full bg-yellow-800 text-white h-12 flex items-center justify-center space-x-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
        <span class="text-sm font-medium">Secciones Academia</span>
    </button>

    <!-- Mobile Secondary Navigation Menu -->
    <div x-show="subMenuOpen" class="fixed bottom-28 left-0 right-0 bg-yellow-50 shadow-lg z-[44]">
        <div class="py-2">
            <a href="/modulos/academia/introduccion" class="block px-4 py-3 text-yellow-800 hover:bg-yellow-100 border-b border-yellow-100">
                Introducción
            </a>
            <a href="/modulos/academia/programas" class="block px-4 py-3 text-yellow-800 hover:bg-yellow-100 border-b border-yellow-100">
                Programas Educativos
            </a>
            <a href="/modulos/academia/recursos" class="block px-4 py-3 text-yellow-800 hover:bg-yellow-100 border-b border-yellow-100">
                Recursos y Herramientas
            </a>
            <a href="/modulos/academia/comunidad" class="block px-4 py-3 text-yellow-800 hover:bg-yellow-100 border-b border-yellow-100">
                Comunidad
            </a>
        </div>
    </div>
</div>

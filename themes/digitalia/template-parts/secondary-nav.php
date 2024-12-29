<?php
/**
 * Secondary Navigation Template Part
 *
 * @package Digitalia
 */

// Check if we're on academia or total-transmedia page or their child pages
$post = get_post();
$is_academia = false;
$is_transmedia = false;

if ($post) {
    if ($post->post_name === 'academia') {
        $is_academia = true;
    } elseif ($post->post_name === 'total-transmedia') {
        $is_transmedia = true;
    } else {
        $ancestors = get_post_ancestors($post->ID);
        foreach ($ancestors as $ancestor) {
            $ancestor_post = get_post($ancestor);
            if ($ancestor_post->post_name === 'academia') {
                $is_academia = true;
                break;
            } elseif ($ancestor_post->post_name === 'total-transmedia') {
                $is_transmedia = true;
                break;
            }
        }
    }
}

// Only show if we're in academia or total-transmedia section
if (!$is_academia && !$is_transmedia) {
    return;
}

// Get current URL path for active state
$current_url = $_SERVER['REQUEST_URI'];
$current_url = rtrim($current_url, '/');

// Helper function to check if a link is active
function is_link_active($link_url, $current_url) {
    return rtrim($link_url, '/') === $current_url;
}
?>

<!-- Desktop Secondary Navigation -->
<nav class="hidden md:block sticky top-16 z-50 <?php echo $is_academia ? 'bg-yellow-100' : 'bg-blue-100'; ?> shadow-md">
    <div class="container mx-auto px-4">
        <div class="flex justify-center space-x-8 py-3">
            <?php if ($is_academia) : ?>
                <a href="/modulos/academia" class="text-yellow-800 <?php echo is_link_active('/modulos/academia', $current_url) ? 'bg-yellow-200 font-bold' : 'hover:bg-yellow-200 hover:text-yellow-900'; ?> rounded-md px-3 py-2 text-sm font-medium transition-colors duration-200">
                    Introducción
                </a>
                <a href="/modulos/academia/programas" class="text-yellow-800 <?php echo is_link_active('/modulos/academia/programas', $current_url) ? 'bg-yellow-200 font-bold' : 'hover:bg-yellow-200 hover:text-yellow-900'; ?> rounded-md px-3 py-2 text-sm font-medium transition-colors duration-200">
                    Programas Educativos
                </a>
                <a href="/modulos/academia/recursos" class="text-yellow-800 <?php echo is_link_active('/modulos/academia/recursos', $current_url) ? 'bg-yellow-200 font-bold' : 'hover:bg-yellow-200 hover:text-yellow-900'; ?> rounded-md px-3 py-2 text-sm font-medium transition-colors duration-200">
                    Recursos y Herramientas
                </a>
                <a href="/modulos/academia/comunidad" class="text-yellow-800 <?php echo is_link_active('/modulos/academia/comunidad', $current_url) ? 'bg-yellow-200 font-bold' : 'hover:bg-yellow-200 hover:text-yellow-900'; ?> rounded-md px-3 py-2 text-sm font-medium transition-colors duration-200">
                    Comunidad
                </a>
            <?php endif; ?>
            
            <?php if ($is_transmedia) : ?>
                <a href="/modulos/total-transmedia" class="text-blue-800 <?php echo is_link_active('/modulos/total-transmedia', $current_url) ? 'bg-blue-200 font-bold' : 'hover:bg-blue-200 hover:text-blue-900'; ?> rounded-md px-3 py-2 text-sm font-medium transition-colors duration-200">
                    Visión General
                </a>
                <a href="/modulos/total-transmedia/estrategia" class="text-blue-800 <?php echo is_link_active('/modulos/total-transmedia/estrategia', $current_url) ? 'bg-blue-200 font-bold' : 'hover:bg-blue-200 hover:text-blue-900'; ?> rounded-md px-3 py-2 text-sm font-medium transition-colors duration-200">
                    Estrategia
                </a>
                <a href="/modulos/total-transmedia/participacion" class="text-blue-800 <?php echo is_link_active('/modulos/total-transmedia/participacion', $current_url) ? 'bg-blue-200 font-bold' : 'hover:bg-blue-200 hover:text-blue-900'; ?> rounded-md px-3 py-2 text-sm font-medium transition-colors duration-200">
                    Participación
                </a>
                <a href="/modulos/total-transmedia/impacto" class="text-blue-800 <?php echo is_link_active('/modulos/total-transmedia/impacto', $current_url) ? 'bg-blue-200 font-bold' : 'hover:bg-blue-200 hover:text-blue-900'; ?> rounded-md px-3 py-2 text-sm font-medium transition-colors duration-200">
                    Impacto
                </a>
                <a href="/modulos/total-transmedia/recursos" class="text-blue-800 <?php echo is_link_active('/modulos/total-transmedia/recursos', $current_url) ? 'bg-blue-200 font-bold' : 'hover:bg-blue-200 hover:text-blue-900'; ?> rounded-md px-3 py-2 text-sm font-medium transition-colors duration-200">
                    Recursos
                </a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<!-- Mobile Secondary Navigation Button -->
<div x-data="{ subMenuOpen: false }" class="md:hidden fixed bottom-16 left-0 right-0 z-[44]">
    <button @click="subMenuOpen = !subMenuOpen" class="w-full <?php echo $is_academia ? 'bg-yellow-800' : 'bg-blue-800'; ?> text-white h-12 flex items-center justify-center space-x-2">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
        <span class="text-sm font-medium"><?php echo $is_academia ? 'Secciones Academia' : 'Secciones Total Transmedia'; ?></span>
    </button>

    <!-- Mobile Secondary Navigation Menu -->
    <div x-show="subMenuOpen" class="fixed bottom-28 left-0 right-0 <?php echo $is_academia ? 'bg-yellow-50' : 'bg-blue-50'; ?> shadow-lg z-[44]">
        <div class="py-2">
            <?php if ($is_academia) : ?>
                <a href="/modulos/academia" class="block px-4 py-3 text-yellow-800 <?php echo is_link_active('/modulos/academia', $current_url) ? 'bg-yellow-200 font-bold' : 'hover:bg-yellow-100 border-b border-yellow-100'; ?>">
                    Introducción
                </a>
                <a href="/modulos/academia/programas" class="block px-4 py-3 text-yellow-800 <?php echo is_link_active('/modulos/academia/programas', $current_url) ? 'bg-yellow-200 font-bold' : 'hover:bg-yellow-100 border-b border-yellow-100'; ?>">
                    Programas Educativos
                </a>
                <a href="/modulos/academia/recursos" class="block px-4 py-3 text-yellow-800 <?php echo is_link_active('/modulos/academia/recursos', $current_url) ? 'bg-yellow-200 font-bold' : 'hover:bg-yellow-100 border-b border-yellow-100'; ?>">
                    Recursos y Herramientas
                </a>
                <a href="/modulos/academia/comunidad" class="block px-4 py-3 text-yellow-800 <?php echo is_link_active('/modulos/academia/comunidad', $current_url) ? 'bg-yellow-200 font-bold' : 'hover:bg-yellow-100'; ?>">
                    Comunidad
                </a>
            <?php endif; ?>
            
            <?php if ($is_transmedia) : ?>
                <a href="/modulos/total-transmedia" class="block px-4 py-3 text-blue-800 <?php echo is_link_active('/modulos/total-transmedia', $current_url) ? 'bg-blue-200 font-bold' : 'hover:bg-blue-100 border-b border-blue-100'; ?>">
                    Visión General
                </a>
                <a href="/modulos/total-transmedia/estrategia" class="block px-4 py-3 text-blue-800 <?php echo is_link_active('/modulos/total-transmedia/estrategia', $current_url) ? 'bg-blue-200 font-bold' : 'hover:bg-blue-100 border-b border-blue-100'; ?>">
                    Estrategia
                </a>
                <a href="/modulos/total-transmedia/participacion" class="block px-4 py-3 text-blue-800 <?php echo is_link_active('/modulos/total-transmedia/participacion', $current_url) ? 'bg-blue-200 font-bold' : 'hover:bg-blue-100 border-b border-blue-100'; ?>">
                    Participación
                </a>
                <a href="/modulos/total-transmedia/impacto" class="block px-4 py-3 text-blue-800 <?php echo is_link_active('/modulos/total-transmedia/impacto', $current_url) ? 'bg-blue-200 font-bold' : 'hover:bg-blue-100 border-b border-blue-100'; ?>">
                    Impacto
                </a>
                <a href="/modulos/total-transmedia/recursos" class="block px-4 py-3 text-blue-800 <?php echo is_link_active('/modulos/total-transmedia/recursos', $current_url) ? 'bg-blue-200 font-bold' : 'hover:bg-blue-100'; ?>">
                    Recursos
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>

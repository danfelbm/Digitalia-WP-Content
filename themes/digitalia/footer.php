<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package digitalia
 */

?>


</div><!-- #page -->

<?php
// Get CTAs from options page
if (function_exists('get_field')) {
    require_once get_template_directory() . '/inc/admin/post-type-utils.php';
    
    $ctas = get_field('ctas', 'option');
    if ($ctas) {
        $current_page_id = get_queried_object_id();
        $current_post_type = get_post_type();
        
        foreach ($ctas as $cta) {
            $should_display = false;
            
            // Check regular pages
            if (is_page() && !empty($cta['display_pages'])) {
                $should_display = in_array($current_page_id, $cta['display_pages']);
            }
            
            // Check post type specific settings
            if (!$should_display && !empty($cta['post_types_display']) && $current_post_type) {
                $config_key = digitalia_get_post_type_config_key($current_post_type);
                $post_type_config = isset($cta['post_types_display'][$config_key]) ? $cta['post_types_display'][$config_key] : null;
                
                if ($post_type_config && !empty($post_type_config['enable'])) {
                    if ($post_type_config['display_type'] === 'all') {
                        $should_display = true;
                    } elseif ($post_type_config['display_type'] === 'specific' && 
                            !empty($post_type_config['specific_items']) && 
                            in_array($current_page_id, $post_type_config['specific_items'])) {
                        $should_display = true;
                    }
                }
            }
            
            if ($should_display) {
                get_template_part('template-parts/cta-modulos', null, array(
                    'title' => $cta['title'],
                    'description' => $cta['description'],
                    'cta_primary_text' => $cta['cta_primary_text'],
                    'cta_primary_url' => $cta['cta_primary_url'],
                    'cta_secondary_text' => $cta['cta_secondary_text'],
                    'cta_secondary_url' => $cta['cta_secondary_url'],
                    'doc_title' => $cta['doc_title'],
                    'doc_description' => $cta['doc_description'],
                    'doc_url' => $cta['doc_url'],
                    'guide_title' => $cta['guide_title'],
                    'guide_description' => $cta['guide_description'],
                    'guide_url' => $cta['guide_url'],
                    'background_class' => $cta['background_class']
                ));
                break; // Show only the first matching CTA
            }
        }
    }
}
?>

<section class="py-32 bg-slate-300 text-black font-mono">
    <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8"> <!-- container mx-auto px-4 -->
        <footer>
            <div class="grid grid-cols-4 justify-between gap-10 lg:grid-cols-6 lg:text-left">
                <div class="col-span-4 flex w-full flex-col justify-between gap-6 lg:col-span-2">
                    <div>
                        <span class="flex items-center gap-4">
                            <img src="/wp-content/uploads/2024/11/logo3.png" alt="Digitalia" class="h-24">
                        </span>
                        <p class="mt-6 text-muted-foreground">Transformando el futuro digital a través de soluciones innovadoras y sostenibles.</p>
                    </div>
                    <ul class="flex flex-wrap lg:flex-nowrap items-center space-x-6">
                        <li class="font-medium duration-200 hover:scale-110 hover:text-muted-foreground">
                            <a href="https://bit.ly/49vhs86"><i class="fa-brands fa-instagram size-6"></i></a>
                        </li>
                        <li class="font-medium duration-200 hover:scale-110 hover:text-muted-foreground">
                            <a href="https://bit.ly/3BldRwD"><i class="fa-brands fa-facebook size-6"></i></a>
                        </li>
                        <li class="font-medium duration-200 hover:scale-110 hover:text-muted-foreground">
                            <a href="https://x.com/Digitalia_Col"><i class="fa-brands fa-x-twitter size-6"></i></a>
                        </li>
                        <li class="font-medium duration-200 hover:scale-110 hover:text-muted-foreground">
                            <a href="https://bit.ly/3ZL9Z1u"><i class="fa-brands fa-linkedin size-6"></i></a>
                        </li>
                        <li class="font-medium duration-200 hover:scale-110 hover:text-muted-foreground">
                            <a href="https://shorturl.at/Q7IwB"><i class="fa-brands fa-youtube size-6"></i></a>
                        </li>
                        <li class="font-medium duration-200 hover:scale-110 hover:text-muted-foreground">
                            <a href="https://bit.ly/4gnZOFh"><i class="fa-brands fa-tiktok size-6"></i></a>
                        </li>
                        <li class="font-medium duration-200 hover:scale-110 hover:text-muted-foreground">
                            <a href="https://bit.ly/4fXB1bo"><i class="fa-brands fa-spotify size-6"></i></a>
                        </li>
                        <li class="font-medium duration-200 hover:scale-110 hover:text-muted-foreground">
                            <a href="https://bit.ly/3D2Eebj"><i class="fa-brands fa-flickr size-6"></i></a>
                        </li>
                        <li class="font-medium duration-200 hover:scale-110 hover:text-muted-foreground">
                            <a href="https://bit.ly/3ZDJKd3"><i class="fa-brands fa-pinterest size-6"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-span-2 md:col-span-1">
                    <h3 class="mb-5 font-medium text-black">Menú Principal</h3>
                    <ul class="space-y-4 text-sm text-gray-600">
                        <li class="font-medium hover:text-black hover:underline"><a href="/que-es-digitalia/">¿Qué es Digitalia?</a></li>
                        <li class="font-medium hover:text-black hover:underline"><a href="/biblioteca-digital/">Biblioteca Digital</a></li>
                        <li class="font-medium hover:text-black hover:underline"><a href="/blog-y-noticias/">Blog y Noticias</a></li>
                        <li class="font-medium hover:text-black hover:underline"><a href="/preguntas-frecuentes/">Preguntas Frecuentes</a></li>
                        <li class="font-medium hover:text-black hover:underline"><a href="/contacto/">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-span-2 md:col-span-1">
                    <h3 class="mb-5 font-medium text-black">Módulos</h3>
                    <ul class="space-y-4 text-sm text-gray-600">
                        <li class="font-medium hover:text-black hover:underline"><a href="/biblioteca-digital/">Biblioteca Digitalia</a></li>
                        <li class="font-medium hover:text-black hover:underline"><a href="/academia/">Academia</a></li>
                        <li class="font-medium hover:text-black hover:underline"><a href="/plataforma/courses/">Cursos</a></li>
                        <li class="font-medium hover:text-black hover:underline"><a href="/kit-social-media/">Kit social media</a></li>
                    </ul>
                </div>
                <div class="col-span-4 md:col-span-2">
                    <h3 class="mb-5 font-medium text-black">Boletín Informativo</h3>
                    <div class="grid gap-1.5">
                        <label class="text-sm font-medium leading-none text-black peer-disabled:cursor-not-allowed peer-disabled:opacity-70" for="email">Suscríbete a nuestro boletín</label>
                        <div class="flex w-full items-center space-x-2">
                            <input type="email" class="flex h-10 w-full rounded-md border border-input bg-slate-600 px-3 py-2 text-sm text-white ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" placeholder="Email">
                            <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-white text-black hover:bg-gray-200 h-10 px-4 py-2" type="submit">Suscribir</button>
                        </div>
                    </div>
                    <p class="mt-1 text-xs font-medium text-gray-600">Al suscribirte, aceptas nuestra <a href="#" class="ml-1 text-black hover:underline">Política de Privacidad</a></p>
                </div>
            </div>
            <div class="mt-20 flex flex-col justify-between gap-4 border-t border-gray-800 pt-8 text-sm font-medium text-gray-600 lg:flex-row lg:items-center lg:text-left">
                <p><span class="mr-1 font-bold text-black">Digitalia</span> Copyleft <?php echo date('Y'); ?>. </p>
            </div>
        </footer>
    </div>
</section>

<?php get_template_part('template-parts/mobile-footer-nav'); ?>

<?php wp_footer(); ?>

</body>
</html>

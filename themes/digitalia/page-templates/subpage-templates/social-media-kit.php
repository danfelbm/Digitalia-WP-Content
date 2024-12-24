<?php
/**
 * Template Name: Social Media Kit
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    get_template_part('template-parts/subpage-header', null, array(
        'title' => 'Social Media Kit',
        'subtitle' => 'Colección de archivos para uso en redes sociales',
        'show_cta' => true,
        'cta_text' => 'Descargar',
        'cta_url' => '#'
    ));
    ?>
    
    <section class="py-32">
        <div class="container max-w-7xl">
            <h2 class="text-3xl font-medium lg:text-4xl">Kit de Herramientas para Redes Sociales</h2>
            <div class="mt-20 grid gap-9 lg:grid-cols-2">
                <div class="flex flex-col justify-between rounded-lg bg-accent">
                    <div class="flex justify-between gap-10 border-b">
                        <div class="flex flex-col justify-between gap-14 py-6 pl-4 md:py-10 md:pl-8 lg:justify-normal">
                            <p class="text-xs text-muted-foreground">MARCA DIGITALIA</p>
                            <h3 class="text-2xl md:text-4xl">Recursos de marca Digitalia</h3>
                        </div>
                        <div class="md:1/3 w-2/5 shrink-0 rounded-r-lg border-l">
                            <img src="https://shadcnblocks.com/images/block/placeholder-1.svg" alt="recursos de marca" class="h-full w-full object-cover">
                        </div>
                    </div>
                    <div class="p-4 text-muted-foreground md:p-8">
                        Descarga los recursos oficiales de la marca Digitalia, incluyendo logotipos, paleta de colores y guías de estilo para mantener una identidad visual consistente en tus comunicaciones.
                    </div>
                </div>
                <div class="flex flex-col justify-between rounded-lg bg-accent">
                    <div class="flex justify-between gap-10 border-b">
                        <div class="flex flex-col justify-between gap-14 py-6 pl-4 md:py-10 md:pl-8 lg:justify-normal">
                            <p class="text-xs text-muted-foreground">KIT DE REDES SOCIALES</p>
                            <h3 class="text-2xl md:text-4xl">Plantillas para Redes Sociales</h3>
                        </div>
                        <div class="md:1/3 w-2/5 shrink-0 rounded-r-lg border-l">
                            <img src="https://shadcnblocks.com/images/block/placeholder-4.svg" alt="plantillas sociales" class="h-full w-full object-cover">
                        </div>
                    </div>
                    <div class="p-4 text-muted-foreground md:p-8">
                        Accede a nuestro kit completo de plantillas y recursos para crear contenido atractivo en redes sociales alineado con la misión educomunicativa y de alfabetización mediática de Digitalia.
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="py-32">
        <div class="container">
            <div class="gap grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                <div class="mx-auto flex flex-col gap-4 md:col-span-2">
                    <div class="items-center rounded-full border font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 text-foreground flex w-fit gap-1 px-2.5 py-1.5 text-sm">
                        <i class="fa-solid fa-share-nodes h-auto w-4"></i>Redes Sociales
                    </div>
                    <h2 class="text-3xl font-semibold lg:text-4xl">Conéctate con Digitalia en todas las redes</h2>
                    <p class="text-muted-foreground">Síguenos en nuestras redes sociales para mantenerte actualizado sobre educación digital y alfabetización mediática.</p>
                </div>

                <a href="https://bit.ly/49vhs86" target="_blank" class="flex flex-col gap-4 rounded-xl border p-6 transition-colors duration-300 bg-[#E1306C]/5 hover:bg-[#E1306C]/10" style="border-color: #E1306C;">
                    <div class="flex items-center justify-between">
                        <span class="grid size-12 shrink-0 place-content-center rounded-md" style="color: #E1306C">
                            <i class="fa-brands fa-instagram text-2xl"></i>
                        </span>
                        <span class="flex items-center gap-1 rounded-full border px-3 py-2.5 text-sm" style="color: #E1306C; border-color: #E1306C">
                            Visitar Instagram<i class="fa-solid fa-arrow-right h-auto w-4 shrink-0 transition-all"></i>
                        </span>
                    </div>
                    <div>
                        <h3 class="font-medium md:text-lg" style="color: #E1306C">Instagram</h3>
                        <p class="text-sm text-muted-foreground md:text-base">Contenido visual e historias de Digitalia</p>
                    </div>
                </a>

                <a href="https://bit.ly/3BldRwD" target="_blank" class="flex flex-col gap-4 rounded-xl border p-6 transition-colors duration-300 bg-[#1877F2]/5 hover:bg-[#1877F2]/10" style="border-color: #1877F2;">
                    <div class="flex items-center justify-between">
                        <span class="grid size-12 shrink-0 place-content-center rounded-md" style="color: #1877F2">
                            <i class="fa-brands fa-facebook text-2xl"></i>
                        </span>
                        <span class="flex items-center gap-1 rounded-full border px-3 py-2.5 text-sm" style="color: #1877F2; border-color: #1877F2">
                            Visitar Facebook<i class="fa-solid fa-arrow-right h-auto w-4 shrink-0 transition-all"></i>
                        </span>
                    </div>
                    <div>
                        <h3 class="font-medium md:text-lg" style="color: #1877F2">Facebook</h3>
                        <p class="text-sm text-muted-foreground md:text-base">Noticias y actualizaciones diarias</p>
                    </div>
                </a>

                <a href="https://x.com/Digitalia_Col" target="_blank" class="flex flex-col gap-4 rounded-xl border p-6 transition-colors duration-300 bg-[#000000]/5 hover:bg-[#000000]/10" style="border-color: #000000;">
                    <div class="flex items-center justify-between">
                        <span class="grid size-12 shrink-0 place-content-center rounded-md" style="color: #000000">
                            <i class="fa-brands fa-x-twitter text-2xl"></i>
                        </span>
                        <span class="flex items-center gap-1 rounded-full border px-3 py-2.5 text-sm" style="color: #000000; border-color: #000000">
                            Visitar X<i class="fa-solid fa-arrow-right h-auto w-4 shrink-0 transition-all"></i>
                        </span>
                    </div>
                    <div>
                        <h3 class="font-medium md:text-lg" style="color: #000000">X (Twitter)</h3>
                        <p class="text-sm text-muted-foreground md:text-base">Últimas noticias y tendencias</p>
                    </div>
                </a>

                <a href="https://bit.ly/3ZL9Z1u" target="_blank" class="flex flex-col gap-4 rounded-xl border p-6 transition-colors duration-300 bg-[#0A66C2]/5 hover:bg-[#0A66C2]/10" style="border-color: #0A66C2;">
                    <div class="flex items-center justify-between">
                        <span class="grid size-12 shrink-0 place-content-center rounded-md" style="color: #0A66C2">
                            <i class="fa-brands fa-linkedin text-2xl"></i>
                        </span>
                        <span class="flex items-center gap-1 rounded-full border px-3 py-2.5 text-sm" style="color: #0A66C2; border-color: #0A66C2">
                            Visitar LinkedIn<i class="fa-solid fa-arrow-right h-auto w-4 shrink-0 transition-all"></i>
                        </span>
                    </div>
                    <div>
                        <h3 class="font-medium md:text-lg" style="color: #0A66C2">LinkedIn</h3>
                        <p class="text-sm text-muted-foreground md:text-base">Contenido profesional y networking</p>
                    </div>
                </a>

                <a href="https://shorturl.at/Q7IwB" target="_blank" class="flex flex-col gap-4 rounded-xl border p-6 transition-colors duration-300 bg-[#FF0000]/5 hover:bg-[#FF0000]/10" style="border-color: #FF0000;">
                    <div class="flex items-center justify-between">
                        <span class="grid size-12 shrink-0 place-content-center rounded-md" style="color: #FF0000">
                            <i class="fa-brands fa-youtube text-2xl"></i>
                        </span>
                        <span class="flex items-center gap-1 rounded-full border px-3 py-2.5 text-sm" style="color: #FF0000; border-color: #FF0000">
                            Visitar YouTube<i class="fa-solid fa-arrow-right h-auto w-4 shrink-0 transition-all"></i>
                        </span>
                    </div>
                    <div>
                        <h3 class="font-medium md:text-lg" style="color: #FF0000">YouTube</h3>
                        <p class="text-sm text-muted-foreground md:text-base">Videos educativos y tutoriales</p>
                    </div>
                </a>

                <a href="https://bit.ly/4gnZOFh" target="_blank" class="flex flex-col gap-4 rounded-xl border p-6 transition-colors duration-300 bg-[#000000]/5 hover:bg-[#000000]/10" style="border-color: #000000;">
                    <div class="flex items-center justify-between">
                        <span class="grid size-12 shrink-0 place-content-center rounded-md" style="color: #000000">
                            <i class="fa-brands fa-tiktok text-2xl"></i>
                        </span>
                        <span class="flex items-center gap-1 rounded-full border px-3 py-2.5 text-sm" style="color: #000000; border-color: #000000">
                            Visitar TikTok<i class="fa-solid fa-arrow-right h-auto w-4 shrink-0 transition-all"></i>
                        </span>
                    </div>
                    <div>
                        <h3 class="font-medium md:text-lg" style="color: #000000">TikTok</h3>
                        <p class="text-sm text-muted-foreground md:text-base">Contenido corto y dinámico</p>
                    </div>
                </a>

                <a href="https://bit.ly/4fXB1bo" target="_blank" class="flex flex-col gap-4 rounded-xl border p-6 transition-colors duration-300 bg-[#1DB954]/5 hover:bg-[#1DB954]/10" style="border-color: #1DB954;">
                    <div class="flex items-center justify-between">
                        <span class="grid size-12 shrink-0 place-content-center rounded-md" style="color: #1DB954">
                            <i class="fa-brands fa-spotify text-2xl"></i>
                        </span>
                        <span class="flex items-center gap-1 rounded-full border px-3 py-2.5 text-sm" style="color: #1DB954; border-color: #1DB954">
                            Visitar Spotify<i class="fa-solid fa-arrow-right h-auto w-4 shrink-0 transition-all"></i>
                        </span>
                    </div>
                    <div>
                        <h3 class="font-medium md:text-lg" style="color: #1DB954">Spotify</h3>
                        <p class="text-sm text-muted-foreground md:text-base">Podcasts y contenido de audio</p>
                    </div>
                </a>

                <a href="https://bit.ly/3D2Eebj" target="_blank" class="flex flex-col gap-4 rounded-xl border p-6 transition-colors duration-300 bg-[#0063DC]/5 hover:bg-[#0063DC]/10" style="border-color: #0063DC;">
                    <div class="flex items-center justify-between">
                        <span class="grid size-12 shrink-0 place-content-center rounded-md" style="color: #0063DC">
                            <i class="fa-brands fa-flickr text-2xl"></i>
                        </span>
                        <span class="flex items-center gap-1 rounded-full border px-3 py-2.5 text-sm" style="color: #0063DC; border-color: #0063DC">
                            Visitar Flickr<i class="fa-solid fa-arrow-right h-auto w-4 shrink-0 transition-all"></i>
                        </span>
                    </div>
                    <div>
                        <h3 class="font-medium md:text-lg" style="color: #0063DC">Flickr</h3>
                        <p class="text-sm text-muted-foreground md:text-base">Galería de imágenes y fotografías</p>
                    </div>
                </a>

                <a href="https://bit.ly/3ZDJKd3" target="_blank" class="flex flex-col gap-4 rounded-xl border p-6 transition-colors duration-300 bg-[#E60023]/5 hover:bg-[#E60023]/10" style="border-color: #E60023;">
                    <div class="flex items-center justify-between">
                        <span class="grid size-12 shrink-0 place-content-center rounded-md" style="color: #E60023">
                            <i class="fa-brands fa-pinterest text-2xl"></i>
                        </span>
                        <span class="flex items-center gap-1 rounded-full border px-3 py-2.5 text-sm" style="color: #E60023; border-color: #E60023">
                            Visitar Pinterest<i class="fa-solid fa-arrow-right h-auto w-4 shrink-0 transition-all"></i>
                        </span>
                    </div>
                    <div>
                        <h3 class="font-medium md:text-lg" style="color: #E60023">Pinterest</h3>
                        <p class="text-sm text-muted-foreground md:text-base">Inspiración visual y recursos gráficos</p>
                    </div>
                </a>
            </div>
        </div>
    </section>
    
</main>

<?php
get_footer();

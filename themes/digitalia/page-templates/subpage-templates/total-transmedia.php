<?php
/**
 * Template Name: Módulo Total Transmedia
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    get_template_part('template-parts/subpage-header', null, array(
        'title' => 'Total Transmedia',
        'subtitle' => 'Experiencias multimedia que conectan diferentes plataformas y formatos',
        'show_cta' => true,
        'cta_text' => 'Explorar contenido',
        'cta_url' => '/biblioteca-digital'
    ));
    ?>
    
    <div class="container mx-auto px-4 py-8">
        <?php get_template_part('template-parts/modules-content'); ?>
    </div>
</main>

<?php
get_footer();

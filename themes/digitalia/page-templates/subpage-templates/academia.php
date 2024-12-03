<?php
/**
 * Template Name: Módulo Academia
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    get_template_part('template-parts/subpage-header', null, array(
        'title' => 'Academia',
        'subtitle' => 'Plataforma de autoformación con contenidos audiovisuales educativos disponible 24/7',
        'show_cta' => true,
        'cta_text' => 'Explorar cursos',
        'cta_url' => '/plataforma/courses'
    ));
    ?>
    
    <div class="container mx-auto px-4 py-8">
        <?php get_template_part('template-parts/modules-content'); ?>
    </div>
</main>

<?php
get_footer();

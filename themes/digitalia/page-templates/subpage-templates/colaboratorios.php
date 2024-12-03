<?php
/**
 * Template Name: Módulo CoLaboratorios
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    get_template_part('template-parts/subpage-header', null, array(
        'title' => 'CoLaboratorios',
        'subtitle' => 'Espacios de co-creación y aprendizaje colaborativo',
        'show_cta' => true,
        'cta_text' => 'Participar',
        'cta_url' => '/contacto'
    ));
    ?>
    
    <div class="container mx-auto px-4 py-8">
        <?php get_template_part('template-parts/modules-content'); ?>
    </div>
</main>

<?php
get_footer();

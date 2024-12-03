<?php
/**
 * Template Name: Módulo REaDy
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    get_template_part('template-parts/subpage-header', null, array(
        'title' => 'REaDy',
        'subtitle' => 'Red de Aprendizaje Digital y recursos educativos',
        'show_cta' => true,
        'cta_text' => 'Unirse a la red',
        'cta_url' => '/contacto'
    ));
    ?>
    
    <div class="container mx-auto px-4 py-8">
        <?php get_template_part('template-parts/modules-content'); ?>
    </div>
</main>

<?php
get_footer();

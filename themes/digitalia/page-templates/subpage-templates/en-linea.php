<?php
/**
 * Template Name: Módulo En Línea
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    get_template_part('template-parts/subpage-header', null, array(
        'title' => 'En Línea',
        'subtitle' => 'Serie web que explora historias de transformación digital y paz mediática en Colombia',
        'show_cta' => true,
        'cta_text' => 'Ver episodios',
        'cta_url' => '/video'
    ));
    ?>
    
    <div class="container mx-auto px-4 py-8">
        <?php get_template_part('template-parts/modules-content'); ?>
    </div>
</main>

<?php
get_footer();

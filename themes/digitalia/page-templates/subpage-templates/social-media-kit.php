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
    
    
</main>

<?php
get_footer();

<?php
/**
 * Template Name: Preguntas Frecuentes
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    get_template_part('template-parts/page-header', null, array(
        'title' => 'Preguntas Frecuentes',
        'subtitle' => 'Encuentra respuestas a las preguntas más comunes.',
        'show_cta' => false,
        'cta_text' => 'Contactar soporte',
        'cta_url' => '/contacto',
        'show_credit_card_text' => false,
        'credit_card_text' => ''
    ));
    ?>
    
    <div class="container mx-auto px-4 py-8">
        <?php get_template_part('template-parts/faq-accordion'); ?>
    </div>
</main>

<?php
get_footer();

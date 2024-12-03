<?php
/**
 * Template Name: Qué es Digitalia
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    get_template_part('template-parts/page-header', null, array(
        'title' => 'Qué es Digitalia',
        'subtitle' => 'Conoce más sobre nuestra plataforma digital y su propósito.',
        'show_cta' => false,
        'cta_text' => 'Más información',
        'cta_url' => '#',
        'show_credit_card_text' => false,
        'credit_card_text' => ''
    ));
    ?>
    
    <div class="container mx-auto px-4 py-8">
        <?php get_template_part('template-parts/page-content'); ?>
    </div>
</main>

<?php
get_footer();

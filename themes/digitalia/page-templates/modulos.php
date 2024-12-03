<?php
/**
 * Template Name: Módulos
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    get_template_part('template-parts/page-header', null, array(
        'title' => 'Módulos',
        'subtitle' => 'Descubre los diferentes módulos y servicios que ofrecemos.',
        'show_cta' => false,
        'cta_text' => 'Explorar módulos',
        'cta_url' => '#',
        'show_credit_card_text' => false,
        'credit_card_text' => ''
    ));
    ?>
    
    <div class="container mx-auto px-4 py-8">
        <?php get_template_part('template-parts/modules-grid'); ?>
    </div>
</main>

<?php
get_footer();

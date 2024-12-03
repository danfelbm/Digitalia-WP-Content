<?php
/**
 * Template Name: Biblioteca Digital
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    get_template_part('template-parts/page-header', null, array(
        'title' => 'Biblioteca Digital',
        'subtitle' => 'Explora nuestra colección de recursos digitales y documentos.',
        'show_cta' => false,
        'cta_text' => 'Más información',
        'cta_url' => '#',
        'show_credit_card_text' => false,
        'credit_card_text' => 'No credit card required.'
    ));
    ?>
    
    <div class="container mx-auto px-4 py-8">
        <?php get_template_part('template-parts/blog-list'); ?>
    </div>
</main>

<?php
get_footer();

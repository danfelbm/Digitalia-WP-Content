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
        'title' => get_field('page_header_title') ?: 'Biblioteca Digital',
        'subtitle' => get_field('page_header_subtitle') ?: 'Explora nuestra colección de recursos digitales y documentos.',
        'show_cta' => get_field('page_header_show_cta') ?: false,
        'cta_text' => get_field('page_header_cta_text') ?: 'Más información',
        'cta_url' => get_field('page_header_cta_url') ?: '#',
        'show_credit_card_text' => get_field('page_header_show_credit_card_text') ?: false,
        'credit_card_text' => get_field('page_header_credit_card_text') ?: 'No credit card required.'
    ));
    ?>
    
    <div class="container mx-auto px-4 py-8">
        <?php get_template_part('template-parts/blog-list'); ?>
    </div>
</main>

<?php
get_footer();

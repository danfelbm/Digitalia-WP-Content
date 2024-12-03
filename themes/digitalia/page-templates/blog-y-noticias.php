<?php
/**
 * Template Name: Blog y Noticias
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    get_template_part('template-parts/page-header', null, array(
        'title' => 'Blog y Noticias',
        'subtitle' => 'Mantente al día con las últimas noticias y artículos.',
        'show_cta' => false,
        'cta_text' => 'Ver más',
        'cta_url' => '#',
        'show_credit_card_text' => false,
        'credit_card_text' => ''
    ));
    ?>
    
    <div class="container mx-auto px-4 py-8">
        <?php get_template_part('template-parts/blog-list'); ?>
    </div>
</main>

<?php
get_footer();

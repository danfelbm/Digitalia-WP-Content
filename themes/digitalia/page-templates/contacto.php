<?php
/**
 * Template Name: Contacto
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    get_template_part('template-parts/page-header', null, array(
        'title' => 'Contacto',
        'subtitle' => 'Estamos aquí para ayudarte. Ponte en contacto con nosotros.',
        'show_cta' => false,
        'cta_text' => '',
        'cta_url' => '#',
        'show_credit_card_text' => false,
        'credit_card_text' => ''
    ));
    ?>
    
    <div class="container mx-auto px-4 py-8">
        <?php get_template_part('template-parts/contact-form'); ?>
    </div>
</main>

<?php
get_footer();

<?php
/**
 * Template para mostrar un formulario individual
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                </header>

                <div class="entry-content">
                    <?php 
                    // Mostrar contenido del post (descripción del formulario)
                    the_content();

                    // Mostrar el formulario usando el shortcode
                    echo do_shortcode('[digitalia_form id="' . get_the_ID() . '"]');
                    ?>
                </div>
            </article>
        <?php endwhile; ?>
    </main>
</div>

<?php
get_sidebar();
get_footer();

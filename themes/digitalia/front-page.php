<?php
/**
 * The front page template file
 *
 * This is the template that displays the home page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package digitalia
 */

get_header();
?>

	<main id="primary" class="site-main">
		<?php get_template_part('template-parts/hero'); ?>
		<?php get_template_part('template-parts/blog-list'); ?>
		
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();

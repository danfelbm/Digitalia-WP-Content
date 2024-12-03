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
		<?php get_template_part('template-parts/modules-section'); ?>
		<?php get_template_part('template-parts/modules-details-section'); ?>
		
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

	<section class="py-32">
		<div class="container">
			<div class="flex items-center justify-center rounded-2xl border bg-[url('https://www.shadcnblocks.com/images/block/circles.svg')] bg-cover bg-center px-8 py-20 text-center md:p-20">
				<div class="mx-auto max-w-screen-md">
					<h1 class="mb-4 text-balance text-3xl font-semibold md:text-5xl">Únete a la revolución educativa digital</h1>
					<p class="text-muted-foreground md:text-lg">Explora Digital-IA, un programa innovador de alfabetización mediática e informacional. Desarrolla habilidades digitales y contribuye a la construcción de paz a través de la educomunicación.</p>
					<div class="mt-11 flex flex-col justify-center gap-2 sm:flex-row">
						<button class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-11 rounded-md px-8">Comenzar Ahora</button>
						<button class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-11 rounded-md px-8">Saber Más</button>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php
get_footer();

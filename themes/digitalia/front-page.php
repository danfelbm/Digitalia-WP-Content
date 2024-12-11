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
			<div class="flex items-center justify-center rounded-2xl border bg-[url('<?php echo get_field('intro_background') ?: 'https://www.shadcnblocks.com/images/block/circles.svg'; ?>')] bg-cover bg-center px-8 py-20 text-center md:p-20">
				<div class="mx-auto max-w-screen-md">
					<h1 class="mb-4 text-balance text-3xl font-semibold md:text-5xl"><?php echo get_field('intro_title'); ?></h1>
					<p class="text-muted-foreground md:text-lg"><?php echo get_field('intro_description'); ?></p>
					<div class="mt-11 flex flex-col justify-center gap-2 sm:flex-row">
						<?php if ($primary_button = get_field('intro_primary_button')): ?>
						<a href="<?php echo esc_url($primary_button['url']); ?>" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-11 rounded-md px-8">
							<?php echo esc_html($primary_button['text']); ?>
						</a>
						<?php endif; ?>
						<?php if ($secondary_button = get_field('intro_secondary_button')): ?>
						<a href="<?php echo esc_url($secondary_button['url']); ?>" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-11 rounded-md px-8">
							<?php echo esc_html($secondary_button['text']); ?>
						</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php
get_footer();

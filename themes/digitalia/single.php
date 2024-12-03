<?php
/**
 * The template for displaying all single posts
 *
 * @package digitalia
 */

get_header();
?>

<section class="py-32">
    <div class="container grid gap-12 md:grid-cols-12 md:gap-8">
        <div class="order-last md:order-none md:col-span-4 lg:col-span-3">
            <aside class="top-32 md:sticky">
                <div class="space-y-5 border-b border-border py-5 md:space-y-6 md:py-6">
                    <span class="text-xs font-medium uppercase tracking-wider text-muted-foreground">Categories & Tags</span>
                    <div class="grid gap-y-2 md:gap-y-3">
                        <?php
                        // Get all taxonomies for the current post
                        $taxonomies = get_object_taxonomies(get_post_type(), 'objects');
                        foreach ($taxonomies as $taxonomy) {
                            $terms = get_the_terms(get_the_ID(), $taxonomy->name);
                            if ($terms && !is_wp_error($terms)) {
                                foreach ($terms as $term) {
                                    ?>
                                    <a href="<?php echo esc_url(get_term_link($term)); ?>" 
                                       class="inline-flex items-center rounded-full bg-secondary px-3 py-1 text-sm font-medium text-secondary-foreground hover:bg-secondary/80 mr-2 mb-2">
                                        <?php echo esc_html($term->name); ?>
                                    </a>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </div>
                </div>

                <div class="space-y-5 border-b border-border py-5 md:space-y-6 md:py-6">
                    <span class="text-xs font-medium uppercase tracking-wider text-muted-foreground">Share this guide</span>
                    <ul class="flex max-w-44 items-center justify-between space-x-1">
                        <li>
                            <a href="https://www.instagram.com/share?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="flex aspect-square items-center justify-center">
                                <img src="https://www.shadcnblocks.com/images/block/logos/instagram-icon.svg" alt="Instagram" class="size-5">
                            </a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="flex aspect-square items-center justify-center">
                                <img src="https://www.shadcnblocks.com/images/block/logos/linkedin-icon.svg" alt="LinkedIn" class="size-5">
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="flex aspect-square items-center justify-center">
                                <img src="https://www.shadcnblocks.com/images/block/logos/twitter-icon.svg" alt="Twitter" class="size-5">
                            </a>
                        </li>
                    </ul>
                </div>

                <?php if (function_exists('generate_pdf_button')) : ?>
                <div class="space-y-5 py-5 md:space-y-6 md:py-6">
                    <span class="text-xs font-medium uppercase tracking-wider text-muted-foreground">Enjoy reading this?</span>
                    <div>
                        <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2">
                            Download PDF
                        </button>
                    </div>
                </div>
                <?php endif; ?>
            </aside>
        </div>

        <div class="md:col-span-7 md:col-start-5 lg:col-start-6">
            <article class="prose prose-sm pt-8">
                <?php
                while (have_posts()) :
                    the_post();
                    ?>
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?php echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>" class="mb-8 mt-0 aspect-video w-full rounded-lg object-cover">
                    <?php endif; ?>
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                    <?php
                endwhile;
                ?>
            </article>
        </div>
    </div>
</section>

<?php
get_footer();

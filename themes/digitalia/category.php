<?php
/**
 * The template for displaying category archives
 */

get_header();

// Get current category
$category = get_queried_object();
$category_name = single_cat_title('', false);
$category_description = category_description();
$category_id = get_queried_object_id();

// Get child categories
$child_categories = get_categories([
    'parent' => $category_id,
    'hide_empty' => true
]);
?>

<section class="py-32">
    <div class="container">
        <div class="mb-8 md:mb-14 lg:mb-16">
            <p class="text-wider mb-4 text-sm font-medium text-muted-foreground">
                Category
            </p>
            <h1 class="mb-4 w-full text-4xl font-medium md:mb-5 md:text-5xl lg:mb-6 lg:text-6xl">
                <?php echo esc_html($category_name); ?>
            </h1>
            <?php if ($category_description) : ?>
                <p><?php echo wp_kses_post($category_description); ?></p>
            <?php endif; ?>
        </div>

        <?php if (have_posts()) : ?>
            <?php
            // Get the first post for the featured section
            the_post();
            $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
            $post_categories = get_the_category();
            ?>
            <a href="<?php the_permalink(); ?>" class="group relative mb-8 block md:mb-14 md:text-clip md:rounded-xl lg:mb-16">
                <div class="mb-4 aspect-[4/3] text-clip rounded-xl md:mb-0 md:aspect-[8/5] lg:rounded-2xl">
                    <div class="size-full transition duration-300 group-hover:scale-105">
                        <img src="<?php echo esc_url($featured_image ?: 'https://www.shadcnblocks.com/images/block/placeholder-1.svg'); ?>" 
                             alt="<?php echo esc_attr(get_the_title()); ?>" 
                             class="relative size-full object-cover object-center">
                    </div>
                </div>
                <div class="flex flex-col gap-6 md:absolute md:inset-x-0 md:bottom-0 md:bg-gradient-to-t md:from-primary/80 md:to-transparent md:p-8 md:pt-24 md:text-primary-foreground">
                    <div>
                        <?php if ($post_categories) : ?>
                            <div class="mb-4 md:hidden">
                                <?php foreach ($post_categories as $cat) : ?>
                                    <div class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-primary text-primary-foreground hover:bg-primary/80">
                                        <?php echo esc_html($cat->name); ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <div class="mb-2 flex">
                            <div class="flex-1 text-lg font-medium md:text-2xl lg:text-3xl"><?php the_title(); ?></div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-up-right size-6">
                                <path d="M7 7h10v10"></path>
                                <path d="M7 17 17 7"></path>
                            </svg>
                        </div>
                        <div class="text-sm md:text-base"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></div>
                    </div>
                    <div class="flex items-center gap-6">
                        <div class="hidden flex-1 gap-8 md:flex lg:flex-row">
                            <div class="flex flex-col">
                                <span class="mb-2 text-xs font-medium">Written by</span>
                                <div class="flex flex-1 items-center gap-3">
                                    <span class="relative flex shrink-0 overflow-hidden rounded-full size-10">
                                        <?php echo get_avatar(get_the_author_meta('ID'), 40); ?>
                                    </span>
                                    <span class="text-xs font-medium"><?php the_author(); ?></span>
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <span class="mb-2 text-xs font-medium">Published on</span>
                                <div class="flex flex-1 items-center">
                                    <span class="text-sm font-medium"><?php echo get_the_date(); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 md:hidden">
                            <span class="relative flex shrink-0 overflow-hidden rounded-full size-12">
                                <?php echo get_avatar(get_the_author_meta('ID'), 48); ?>
                            </span>
                            <div class="flex flex-col gap-px">
                                <span class="text-xs font-medium"><?php the_author(); ?></span>
                                <span class="text-xs text-muted-foreground"><?php echo get_the_date(); ?></span>
                            </div>
                        </div>
                        <?php if ($post_categories) : ?>
                            <div class="hidden flex-col md:flex">
                                <span class="mb-2 text-xs font-medium">File under</span>
                                <div class="flex flex-1 items-center gap-2">
                                    <?php foreach ($post_categories as $cat) : ?>
                                        <div class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-primary text-primary-foreground hover:bg-primary/80">
                                            <?php echo esc_html($cat->name); ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </a>

            <?php if ($child_categories) : ?>
                <div dir="ltr" data-orientation="horizontal">
                    <div class="mb-9 flex flex-col justify-between gap-8 md:mb-14 md:flex-row lg:mb-16">
                        <div class="flex-1 overflow-x-auto max-md:container max-md:-mx-8 max-md:w-[calc(100%+4rem)]">
                            <div role="tablist" aria-orientation="horizontal" class="inline-flex h-10 items-center justify-center rounded-md bg-muted p-1 text-muted-foreground">
                                <button type="button" role="tab" aria-selected="true" class="inline-flex items-center justify-center whitespace-nowrap rounded-sm px-3 py-1.5 text-sm font-medium ring-offset-background transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 data-[state=active]:bg-background data-[state=active]:text-foreground data-[state=active]:shadow-sm">
                                    View all
                                </button>
                                <?php foreach ($child_categories as $child_cat) : ?>
                                    <button type="button" role="tab" aria-selected="false" class="inline-flex items-center justify-center whitespace-nowrap rounded-sm px-3 py-1.5 text-sm font-medium ring-offset-background transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 data-[state=active]:bg-background data-[state=active]:text-foreground data-[state=active]:shadow-sm">
                                        <?php echo esc_html($child_cat->name); ?>
                                    </button>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="grid gap-x-4 gap-y-8 md:grid-cols-2 lg:gap-x-6 lg:gap-y-12 2xl:grid-cols-3">
                <?php
                // Continue with the rest of the posts
                while (have_posts()) :
                    the_post();
                    $post_categories = get_the_category();
                    $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                ?>
                    <a href="<?php the_permalink(); ?>" class="group flex flex-col">
                        <div class="mb-4 flex text-clip rounded-xl md:mb-5">
                            <div class="size-full transition duration-300 group-hover:scale-105">
                                <img src="<?php echo esc_url($featured_image ?: 'https://www.shadcnblocks.com/images/block/placeholder-dark-1.svg'); ?>" 
                                     alt="<?php echo esc_attr(get_the_title()); ?>" 
                                     class="aspect-[3/2] size-full object-cover object-center">
                            </div>
                        </div>
                        <?php if ($post_categories) : ?>
                            <div class="mb-4">
                                <?php foreach ($post_categories as $cat) : ?>
                                    <div class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-primary text-primary-foreground hover:bg-primary/80">
                                        <?php echo esc_html($cat->name); ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <div class="mb-2 line-clamp-3 break-words text-lg font-medium md:mb-3 md:text-2xl lg:text-3xl">
                            <?php the_title(); ?>
                        </div>
                        <div class="mb-4 line-clamp-2 text-sm text-muted-foreground md:mb-5 md:text-base">
                            <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="relative flex shrink-0 overflow-hidden rounded-full size-12">
                                <?php echo get_avatar(get_the_author_meta('ID'), 48); ?>
                            </span>
                            <div class="flex flex-col gap-px">
                                <span class="text-xs font-medium"><?php the_author(); ?></span>
                                <span class="text-xs text-muted-foreground"><?php echo get_the_date(); ?></span>
                            </div>
                        </div>
                    </a>
                <?php endwhile; ?>
            </div>

            <?php
            // Pagination
            $pagination = get_the_posts_pagination([
                'mid_size' => 1,
                'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left h-4 w-4"><path d="m15 18-6-6 6-6"></path></svg><span>Previous</span>',
                'next_text' => '<span>Next</span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right h-4 w-4"><path d="m9 18 6-6-6-6"></path></svg>',
            ]);

            if ($pagination) :
            ?>
                <div class="mt-8 border-t border-border py-2 md:mt-10 lg:mt-12">
                    <nav role="navigation" aria-label="pagination" class="mx-auto flex w-full justify-center">
                        <?php echo wp_kses_post($pagination); ?>
                    </nav>
                </div>
            <?php endif; ?>

        <?php else : ?>
            <p>No posts found in this category.</p>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();

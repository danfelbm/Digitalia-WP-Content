<?php
/**
 * The template for displaying Author pages
 *
 * @package Digitalia
 */

get_header();

// Start the Loop.
while ( have_posts() ) :
    the_post();
    
    // Get author data
    $author_id = get_the_author_meta('ID');
    $author_name = get_the_author();
    $author_bio = get_the_author_meta('description');
    $author_avatar = get_avatar_url($author_id);
    
    ?>
    <section class="relative pt-36 pb-24">
        <img src="https://pagedone.io/asset/uploads/1705471739.png" alt="cover-image" class="w-full absolute top-0 left-0 z-0 h-60 object-cover">
        <div class="w-full max-w-7xl mx-auto px-6 md:px-8">
            <div class="flex items-center justify-center relative z-10 mb-2.5">
                <img src="<?php echo esc_url($author_avatar); ?>" alt="user-avatar-image" class="border-4 border-solid border-white rounded-full object-cover">
            </div>
            <div class="flex flex-col sm:flex-row max-sm:gap-5 items-center justify-between mb-5">
                <ul class="flex items-center gap-5">
                    <li> <a href="javascript:;" class="flex items-center gap-2 cursor-pointer group">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.5 14.0902L7.5 14.0902M2.5 9.09545V14.0902C2.5 15.6976 2.5 16.5013 2.98816 17.0006C3.47631 17.5 4.26198 17.5 5.83333 17.5H14.1667C15.738 17.5 16.5237 17.5 17.0118 17.0006C17.5 16.5013 17.5 15.6976 17.5 14.0902V10.9203C17.5 9.1337 17.5 8.24039 17.1056 7.48651C16.7112 6.73262 15.9846 6.2371 14.5313 5.24606L11.849 3.41681C10.9528 2.8056 10.5046 2.5 10 2.5C9.49537 2.5 9.04725 2.80561 8.151 3.41681L3.98433 6.25832C3.25772 6.75384 2.89442 7.0016 2.69721 7.37854C2.5 7.75548 2.5 8.20214 2.5 9.09545Z" stroke="black" stroke-width="1.6" stroke-linecap="round"></path>
                            </svg>
                            <span class="font-medium text-base leading-7 text-gray-900">Digitalia</span>
                        </a>
                    </li>
                    <li> <a href="javascript:;" class="flex items-center gap-2 cursor-pointer group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="5" height="20" viewBox="0 0 5 20" fill="none">
                                <path d="M4.12567 1.13672L1 18.8633" stroke="#E5E7EB" stroke-width="1.6" stroke-linecap="round"></path>
                            </svg>
                            <span class="font-medium text-base leading-7 text-gray-400">Equipo</span>
                        </a>
                    </li>
                    <li><a href="javascript:;" class="flex items-center gap-2 cursor-pointer group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="5" height="20" viewBox="0 0 5 20" fill="none">
                                <path d="M4.12567 1.13672L1 18.8633" stroke="#E5E7EB" stroke-width="1.6" stroke-linecap="round"></path>
                            </svg>
                            <span class="font-medium text-base leading-7 text-gray-400"><?php echo esc_html($author_name); ?></span>
                            <span class="rounded-full py-1.5 px-2.5 bg-indigo-50 flex items-center justify-center font-medium text-xs text-indigo-600">New</span>
                        </a>
                    </li>
                </ul>
                <div class="flex items-center gap-4">
                    <button class="rounded-full border border-solid border-indigo-600 bg-indigo-600 py-3 px-4 text-sm font-semibold text-white whitespace-nowrap shadow-sm shadow-transparent transition-all duration-500 hover:shadow-gray-200 hover:bg-indigo-700 hover:border-indigo-700">Enviar un mensaje</button>
                </div>
            </div>
            <h3 class="text-center font-manrope font-bold text-3xl leading-10 text-gray-900 mb-3"><?php echo esc_html($author_name); ?></h3>
            <p class="font-normal text-base leading-7 text-gray-500 text-center mb-8"><?php echo esc_html($author_bio); ?></p>
            <div class="flex items-center justify-center gap-5">
                <?php if (have_rows('red_social', 'user_' . $author_id)) : ?>
                    <div class="my-2 flex items-start gap-4">
                        <?php while (have_rows('red_social', 'user_' . $author_id)) : the_row(); 
                            $social_type = get_sub_field('red_social_item');
                            $profile_link = get_sub_field('link_al_perfil');
                            if ($profile_link) :
                                switch ($social_type) {
                                    case 'facebook': ?>
                                        <a href="<?php echo esc_url($profile_link); ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook size-4 text-muted-foreground"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                                        </a>
                                    <?php break;
                                    case 'twitter': ?>
                                        <a href="<?php echo esc_url($profile_link); ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-twitter size-4 text-muted-foreground"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/></svg>
                                        </a>
                                    <?php break;
                                    case 'instagram': ?>
                                        <a href="<?php echo esc_url($profile_link); ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram size-4 text-muted-foreground"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                                        </a>
                                    <?php break;
                                    case 'tiktok': ?>
                                        <a href="<?php echo esc_url($profile_link); ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-music size-4 text-muted-foreground"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>
                                        </a>
                                    <?php break;
                                    case 'linkedin': ?>
                                        <a href="<?php echo esc_url($profile_link); ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-linkedin size-4 text-muted-foreground"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/></svg>
                                        </a>
                                    <?php break;
                                    case 'youtube': ?>
                                        <a href="<?php echo esc_url($profile_link); ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-youtube size-4 text-muted-foreground"><path d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17"/><path d="m10 15 5-3-5-3z"/></svg>
                                        </a>
                                    <?php break;
                                }
                            endif;
                        endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="pt-16">
        <div class="container">
            <div class="grid gap-x-4 gap-y-8 md:grid-cols-3 lg:gap-x-6 lg:gap-y-12 2xl:grid-cols-3">
                <?php
                // Get author's posts
                $author_posts = new WP_Query(array(
                    'author' => $author_id,
                    'post_type' => 'post',
                    'posts_per_page' => 9,
                    'paged' => get_query_var('paged') ? get_query_var('paged') : 1
                ));

                if ($author_posts->have_posts()) :
                    while ($author_posts->have_posts()) : $author_posts->the_post();
                        // Get post category
                        $categories = get_the_category();
                        $category_name = !empty($categories) ? esc_html($categories[0]->name) : '';
                        ?>
                        <a href="<?php the_permalink(); ?>" class="group flex flex-col">
                            <div class="mb-4 flex text-clip rounded-xl md:mb-5">
                                <div class="size-full transition duration-300 group-hover:scale-105">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('large', array('class' => 'aspect-[3/2] size-full object-cover object-center')); ?>
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.svg" alt="<?php the_title_attribute(); ?>" class="aspect-[3/2] size-full object-cover object-center">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php if ($category_name) : ?>
                            <div>
                                <div class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-primary text-primary-foreground hover:bg-primary/80">
                                    <?php echo $category_name; ?>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="mb-2 line-clamp-3 break-words pt-4 text-lg font-medium md:mb-3 md:pt-4 md:text-2xl lg:pt-4 lg:text-3xl">
                                <?php the_title(); ?>
                            </div>
                            <div class="mb-4 line-clamp-2 text-sm text-muted-foreground md:mb-5 md:text-base">
                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="relative flex shrink-0 overflow-hidden rounded-full size-12">
                                    <?php echo get_avatar(get_the_author_meta('ID'), 48, '', '', array('class' => 'aspect-square h-full w-full')); ?>
                                </span>
                                <div class="flex flex-col gap-px">
                                    <span class="text-xs font-medium"><?php the_author(); ?></span>
                                    <span class="text-xs text-muted-foreground"><?php echo get_the_date(); ?></span>
                                </div>
                            </div>
                        </a>
                    <?php 
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>

            <?php if ($author_posts->max_num_pages > 1) : ?>
            <div class="mt-8 border-t border-border py-2 md:mt-10 lg:mt-12">
                <nav role="navigation" aria-label="pagination" class="mx-auto flex w-full justify-center">
                    <ul class="flex flex-row items-center gap-1 w-full justify-between">
                        <li>
                            <?php 
                            $prev_link = get_previous_posts_link('Previous');
                            if ($prev_link) :
                            ?>
                            <a class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 gap-1 pl-2.5" aria-label="Go to previous page" href="<?php echo get_previous_posts_page_link(); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-left h-4 w-4"><path d="m15 18-6-6 6-6"></path></svg>
                                <span>Previous</span>
                            </a>
                            <?php endif; ?>
                        </li>
                        <div class="hidden items-center gap-1 md:flex">
                            <?php
                            $current_page = max(1, get_query_var('paged'));
                            $total_pages = $author_posts->max_num_pages;
                            
                            for ($i = 1; $i <= min(3, $total_pages); $i++) :
                            ?>
                            <li>
                                <a class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 w-10 <?php echo $current_page === $i ? 'bg-accent' : ''; ?>" href="<?php echo get_pagenum_link($i); ?>">
                                    <?php echo $i; ?>
                                </a>
                            </li>
                            <?php endfor; ?>
                        </div>
                        <li>
                            <?php 
                            $next_link = get_next_posts_link('Next', $author_posts->max_num_pages);
                            if ($next_link) :
                            ?>
                            <a class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 gap-1 pr-2.5" aria-label="Go to next page" href="<?php echo get_next_posts_page_link(); ?>">
                                <span>Next</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right h-4 w-4"><path d="m9 18 6-6-6-6"></path></svg>
                            </a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </nav>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php
endwhile;

get_footer();

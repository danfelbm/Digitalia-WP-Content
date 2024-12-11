<?php
/**
 * Template part for displaying detailed modules section
 */

$header = get_field('modules_details_header');
$modules = get_field('modules_details_items');
?>

<section class="w-full bg-slate-50 py-32">
    <div class="container mx-auto px-4 md:px-6">
        <div class="grid gap-4 px-4 md:px-6 max-w-7xl mx-auto">
            <?php if ($header) : ?>
                <h2 class="mb-2 text-balance text-center text-3xl font-semibold lg:text-5xl"><?php echo esc_html($header['title']); ?></h2>
                <p class="text-center text-muted-foreground lg:text-lg"><?php echo esc_html($header['description']); ?></p>
                <?php if ($header['button']) : ?>
                    <a href="<?php echo esc_url($header['button']['url']); ?>" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 mt-6">
                        <?php echo esc_html($header['button']['text']); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right ml-1 h-4"><path d="m9 18 6-6-6-6"></path></svg>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="grid gap-8 mt-8 max-w-7xl mx-auto">
            <?php if ($modules) : ?>
                <?php foreach ($modules as $module) : ?>
                    <div class="group relative rounded-lg bg-<?php echo esc_html($module['color']); ?>-100 transition-transform hover:scale-[1.02]">
                        <a href="<?php echo esc_url($module['url']); ?>" class="flex flex-col lg:flex-row h-full">
                            <div class="flex flex-col justify-between p-8 lg:p-12 lg:w-1/2">
                                <div>
                                    <div class="mb-4 text-xs text-<?php echo esc_html($module['color']); ?>-600">MÓDULO <?php echo esc_html($module['module_number']); ?></div>
                                    <h3 class="mb-2 text-xl font-medium lg:text-2xl text-<?php echo esc_html($module['color']); ?>-700"><?php echo esc_html($module['title']); ?></h3>
                                    <p class="text-sm text-<?php echo esc_html($module['color']); ?>-600 lg:text-base"><?php echo esc_html($module['description']); ?></p>
                                </div>
                                <div class="mt-6 sm:mt-8">
                                    <button class="inline-flex items-center justify-center text-sm font-medium transition-colors bg-<?php echo esc_html($module['color']); ?>-500 text-white hover:bg-<?php echo esc_html($module['color']); ?>-600 h-9 rounded-md px-4"><?php echo esc_html($module['button_text']); ?><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-right ml-1 h-4"><path d="m9 18 6-6-6-6"></path></svg></button>
                                </div>
                            </div>
                            <div class="order-first lg:w-1/2 aspect-video sm:order-last sm:aspect-auto flex items-center justify-center bg-<?php echo esc_html($module['color']); ?>-200 border-b border-<?php echo esc_html($module['color']); ?>-300 lg:border-b-0 lg:border-l lg:h-full">
                                <?php if ($module['image']) : ?>
                                    <img src="<?php echo esc_url($module['image']); ?>" alt="<?php echo esc_attr($module['title']); ?>" class="w-24 h-24">
                                <?php endif; ?>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

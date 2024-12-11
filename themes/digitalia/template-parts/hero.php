<?php
/**
 * Template part for displaying hero section
 */
?>

<section>
  <div class="container">
    <div class="grid items-center gap-8 lg:grid-cols-2">
      <div class="flex flex-col items-center py-32 text-center lg:mx-auto lg:items-start lg:px-0 lg:text-left">
        <p><?php echo esc_html(get_field('hero_subtitle')); ?></p>
        <h1 class="my-6 text-pretty text-4xl font-bold lg:text-6xl"><?php echo esc_html(get_field('hero_title')); ?></h1>
        <p class="mb-8 max-w-xl text-muted-foreground lg:text-xl"><?php echo esc_html(get_field('hero_description')); ?></p>
        <div class="flex w-full flex-col justify-center gap-2 sm:flex-row lg:justify-start">
          <?php if ($primary_button = get_field('hero_primary_button')) : ?>
          <a href="<?php echo esc_url($primary_button['link']); ?>" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 w-full sm:w-auto">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right mr-2 size-4">
              <path d="M5 12h14"></path>
              <path d="m12 5 7 7-7 7"></path>
            </svg>
            <?php echo esc_html($primary_button['text']); ?>
          </a>
          <?php endif; ?>
          
          <?php if ($secondary_button = get_field('hero_secondary_button')) : ?>
          <a href="<?php echo esc_url($secondary_button['link']); ?>" class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 w-full sm:w-auto">
            <?php echo esc_html($secondary_button['text']); ?>
          </a>
          <?php endif; ?>
        </div>
      </div>
      <div class="relative aspect-[3/4]">
        <div class="absolute inset-0 flex items-center justify-center">
          <img class="size-full text-muted-foreground opacity-20" src="<?php echo esc_url(get_field('hero_background_image')); ?>" alt="" />
        </div>
        <?php if ($left_image = get_field('hero_image_left')) : ?>
          <img src="<?php echo esc_url($left_image); ?>" alt="" class="absolute left-[8%] top-[10%] flex aspect-[5/6] w-[38%] justify-center rounded-lg border border-border bg-accent object-cover" />
        <?php endif; ?>
        <?php if ($right_image = get_field('hero_image_right')) : ?>
          <img src="<?php echo esc_url($right_image); ?>" alt="" class="absolute right-[12%] top-[20%] flex aspect-square w-1/5 justify-center rounded-lg border border-border bg-accent object-cover" />
        <?php endif; ?>
        <?php if ($bottom_image = get_field('hero_image_bottom')) : ?>
          <img src="<?php echo esc_url($bottom_image); ?>" alt="" class="absolute bottom-[24%] right-[24%] flex aspect-[5/6] w-[38%] justify-center rounded-lg border border-border bg-accent object-cover" />
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

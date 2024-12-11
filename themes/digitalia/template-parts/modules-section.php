<?php
/**
 * Template part for displaying the modules section
 */
?>

<section class="container py-32" style="margin-top: -15rem;">
  <div class="mb-4 grid grid-cols-1 gap-4 md:grid-cols-3 md:grid-rows-3">
    <?php if (have_rows('modules')) : ?>
      <?php while (have_rows('modules')) : the_row(); ?>
        <?php
        $color = get_sub_field('color');
        $title = get_sub_field('title');
        $description = get_sub_field('description');
        $link = get_sub_field('link');
        $icon = get_sub_field('icon');
        ?>
        <a href="<?php echo esc_url($link); ?>" class="flex w-full cursor-pointer flex-col rounded-lg bg-<?php echo esc_attr($color); ?>-200 p-5 lg:p-8 group">
          <h3 class="mb-2 w-fit border-b-2 border-solid border-transparent text-xl font-semibold transition text-<?php echo esc_attr($color); ?>-950 lg:text-2xl group-hover:!border-<?php echo esc_attr($color); ?>-500/90"><?php echo esc_html($title); ?></h3>
          <p class="mb-4 text-sm text-<?php echo esc_attr($color); ?>-800 lg:text-base"><?php echo esc_html($description); ?></p>
          <div class="mt-auto flex items-end justify-between">
            <div>
              <?php if ($icon) : ?>
                <img src="<?php echo esc_url($icon); ?>" alt="" class="size-8 text-<?php echo esc_attr($color); ?>-500 md:size-12" />
              <?php endif; ?>
            </div>
            <svg type="right-chevron" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right size-7 h-fit text-<?php echo esc_attr($color); ?>-950 transition group-hover:size-7 group-hover:translate-x-2 group-hover:transform">
              <path d="M5 12h14"></path>
              <path d="m12 5 7 7-7 7"></path>
            </svg>
          </div>
        </a>
      <?php endwhile; ?>
    <?php endif; ?>

    <?php if ($featured = get_field('featured_module')) : ?>
      <div class="flex w-full flex-grow flex-col gap-4 rounded-lg bg-black p-5 md:col-span-2 md:col-start-2 md:row-span-2 md:row-start-2 lg:p-8">
        <div class="flex flex-col items-start justify-between gap-4 md:flex-row md:items-center md:gap-2">
          <h3 class="max-w-[80%] text-2xl font-bold text-white md:max-w-[60%] lg:text-4xl"><?php echo esc_html($featured['title']); ?></h3>
          <a href="<?php echo esc_url($featured['button_link']); ?>" class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-white text-black hover:bg-white/90 h-11 rounded-md px-8 w-full md:w-auto">
            <?php echo esc_html($featured['button_text']); ?>
          </a>
        </div>
        <?php if ($featured['image']) : ?>
          <img src="<?php echo esc_url($featured['image']); ?>" alt="Digital·IA" class=" aspect-square h-full w-full rounded-lg object-cover md:aspect-[3]">
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
</section>

<div class="max-w-screen-xl px-8 py-10 sm:px-6 lg:px-8 lg:py-32 mx-auto" style="margin-top: -8rem;">
  <div class="grid md:grid-cols-2 gap-12">
    <?php if ($vision = get_field('vision_section')) : 
        $vision_title = $vision['title'];
        $vision_description = $vision['description'];
        $vision_features = $vision['features'];
      ?>
      <div>
        <div class="grid gap-12">
          <div>
            <h2 class="text-3xl text-gray-800 font-bold lg:text-4xl">
              <?php echo esc_html($vision_title); ?>
            </h2>
            <p class="mt-3 text-gray-600">
              <?php echo esc_html($vision_description); ?>
            </p>
          </div>

          <div class="space-y-6 lg:space-y-10">
            <?php if ($vision_features) : ?>
              <?php foreach ($vision_features as $feature) : ?>
                <div class="flex gap-x-5 sm:gap-x-8">
                  <i class="fa <?php echo esc_attr($feature['icon']); ?> shrink-0 mt-2 size-6 text-gray-800"></i>
                  <div class="grow">
                    <h3 class="text-base sm:text-lg font-semibold text-gray-800">
                      <?php echo esc_html($feature['title']); ?>
                    </h3>
                    <p class="mt-1 text-gray-600">
                      <?php echo esc_html($feature['description']); ?>
                    </p>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <?php if ($commitment = get_field('commitment_section')) : 
        $commitment_title = $commitment['title'];
        $commitment_description = $commitment['description'];
        $commitment_features = $commitment['features'];
      ?>
      <div>
        <div class="grid gap-12">
          <div>
            <h2 class="text-3xl text-gray-800 font-bold lg:text-4xl">
              <?php echo esc_html($commitment_title); ?>
            </h2>
            <p class="mt-3 text-gray-600">
              <?php echo esc_html($commitment_description); ?>
            </p>
          </div>

          <div class="space-y-6 lg:space-y-10">
            <?php if ($commitment_features) : ?>
              <?php foreach ($commitment_features as $feature) : ?>
                <div class="flex gap-x-5 sm:gap-x-8">
                  <i class="fa <?php echo esc_attr($feature['icon']); ?> shrink-0 mt-2 size-6 text-gray-800"></i>
                  <div class="grow">
                    <h3 class="text-base sm:text-lg font-semibold text-gray-800">
                      <?php echo esc_html($feature['title']); ?>
                    </h3>
                    <p class="mt-1 text-gray-600">
                      <?php echo esc_html($feature['description']); ?>
                    </p>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>

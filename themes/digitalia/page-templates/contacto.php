<?php
/**
 * Template Name: Contacto
 *
 * @package Digitalia
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    $header = get_field('page_header') ?: array();
    get_template_part('template-parts/page-header', null, array(
        'title' => isset($header['title']) ? $header['title'] : 'Contacto',
        'subtitle' => isset($header['subtitle']) ? $header['subtitle'] : 'Estamos aquí para ayudarte. Ponte en contacto con nosotros.',
        'show_cta' => isset($header['show_cta']) ? $header['show_cta'] : false,
        'cta_text' => isset($header['cta_text']) ? $header['cta_text'] : '',
        'cta_url' => isset($header['cta_url']) ? $header['cta_url'] : '#',
        'show_credit_card_text' => isset($header['show_credit_card_text']) ? $header['show_credit_card_text'] : false,
        'credit_card_text' => isset($header['credit_card_text']) ? $header['credit_card_text'] : ''
    ));
    ?>
    
    <section class="relative py-32">
        <div class="pointer-events-none absolute -inset-y-20 inset-x-0 bg-[radial-gradient(ellipse_35%_15%_at_40%_55%,hsl(var(--accent))_0%,transparent_100%)] lg:bg-[radial-gradient(ellipse_12%_20%_at_60%_45%,hsl(var(--accent))_0%,transparent_100%)]"></div>
        <div class="pointer-events-none absolute -inset-y-20 inset-x-0 bg-[radial-gradient(ellipse_35%_20%_at_70%_75%,hsl(var(--accent))_0%,transparent_80%)] lg:bg-[radial-gradient(ellipse_15%_30%_at_70%_65%,hsl(var(--accent))_0%,transparent_80%)]"></div>
        <div class="pointer-events-none absolute -inset-y-20 inset-x-0 bg-[radial-gradient(hsl(var(--accent-foreground)/0.1)_1px,transparent_1px)] [background-size:8px_8px] [mask-image:radial-gradient(ellipse_60%_60%_at_65%_50%,#000_0%,transparent_80%)]"></div>
        <div class="container grid w-full grid-cols-1 gap-x-32 overflow-hidden lg:grid-cols-2">
            <div class="w-full pb-10 md:space-y-10 md:pb-0">
                <?php $info_session = get_field('info_session') ?: array(); ?>
                <div class="space-y-4 md:max-w-[40rem]">
                    <h1 class="text-4xl font-medium lg:text-5xl"><?php echo esc_html($info_session['title'] ?? 'Solicita una sesión informativa'); ?></h1>
                    <div class="text-muted-foreground md:text-base lg:text-lg lg:leading-7"><?php echo esc_html($info_session['description'] ?? 'Programa nacional de educomunicación y alfabetización mediática con énfasis en inteligencia artificial y enfoque de paz.'); ?></div>
                </div>
                <div class="hidden md:block">
                    <div class="space-y-16 pb-20 lg:pb-0">
                        <div class="space-y-6">
                            <?php if (!empty($info_session['avatars'])): ?>
                            <div class="mt-16 flex overflow-hidden">
                                <?php foreach ($info_session['avatars'] as $index => $avatar): ?>
                                <span class="relative flex shrink-0 overflow-hidden rounded-full <?php echo $index > 0 ? '-ml-4' : ''; ?> size-11">
                                    <img class="aspect-square h-full w-full" src="<?php echo esc_url($avatar['image']); ?>">
                                </span>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                            <div class="space-y-4">
                                <p class="text-sm font-semibold"><?php echo esc_html($info_session['features_title'] ?? 'Lo que incluye el programa:'); ?></p>
                                <?php if (!empty($info_session['features'])): 
                                    foreach ($info_session['features'] as $feature): ?>
                                <div class="flex items-center space-x-2.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check size-5 shrink-0 text-muted-foreground">
                                        <path d="M20 6 9 17l-5-5"></path>
                                    </svg>
                                    <p class="text-sm"><?php echo esc_html($feature['text']); ?></p>
                                </div>
                                <?php endforeach; 
                                endif; ?>
                            </div>
                        </div>
                        <?php if (!empty($info_session['logos'])): ?>
                        <div class="flex items-center space-x-12">
                            <?php foreach ($info_session['logos'] as $logo): ?>
                            <img src="<?php echo esc_url($logo['image']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" class="h-12">
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="flex w-full justify-center lg:mt-2.5">
                <div class="relative flex w-full min-w-80 max-w-[30rem] flex-col items-center overflow-visible md:min-w-96">
                    <form class="z-10 space-y-6">
                        <div class="w-full space-y-6 rounded-xl border border-border bg-background px-6 py-10 shadow-sm">
                            <div>
                                <div class="mb-2.5 text-sm font-medium">
                                    <label for="fullName">Nombre completo</label>
                                </div>
                                <input class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="fullName" name="fullName" placeholder="Juan Pérez">
                            </div>
                            <div>
                                <div class="mb-2.5 text-sm font-medium">
                                    <label for="company">Institución</label>
                                </div>
                                <input class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="company" name="company" placeholder="Nombre de la institución">
                            </div>
                            <div>
                                <div class="mb-2.5 text-sm font-medium">
                                    <label for="phone">Teléfono</label>
                                </div>
                                <input class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="phone" name="phone" placeholder="12 3456 7890">
                            </div>
                            <div>
                                <div class="mb-2.5 text-sm font-medium">
                                    <label for="email">Correo electrónico (institucional)</label>
                                </div>
                                <input class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" id="email" name="email" placeholder="nombre@institución.com">
                            </div>
                            <div>
                                <div class="mb-2.5 text-sm font-medium">
                                    <label for="country">País</label>
                                </div>
                                <button type="button" role="combobox" aria-controls="radix-:r0R15k:" aria-expanded="false" aria-autocomplete="none" dir="ltr" data-state="closed" data-placeholder="" class="flex h-10 w-full items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 [&>span]:line-clamp-1" id="country" name="country">
                                    <span style="pointer-events:none">Seleccionar país</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down h-4 w-4 opacity-50" aria-hidden="true">
                                        <path d="m6 9 6 6 6-6"></path>
                                    </svg>
                                </button>
                                <select aria-hidden="true" tabindex="-1" style="position: absolute; border: 0px; width: 1px; height: 1px; padding: 0px; margin: -1px; overflow: hidden; clip: rect(0px, 0px, 0px, 0px); white-space: nowrap; overflow-wrap: normal;">
                                    <option value=""></option>
                                    <option value="col">Colombia</option>
                                </select>
                            </div>
                            <div>
                                <div class="mb-2.5 text-sm font-medium">
                                    <label for="companySize">Tamaño de la institución</label>
                                </div>
                                <button type="button" role="combobox" aria-controls="radix-:r0R16k:" aria-expanded="false" aria-autocomplete="none" dir="ltr" data-state="closed" data-placeholder="" class="flex h-10 w-full items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 [&>span]:line-clamp-1" id="companySize" name="companySize">
                                    <span style="pointer-events:none">Seleccionar</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down h-4 w-4 opacity-50" aria-hidden="true">
                                        <path d="m6 9 6 6 6-6"></path>
                                    </svg>
                                </button>
                                <select aria-hidden="true" tabindex="-1" style="position: absolute; border: 0px; width: 1px; height: 1px; padding: 0px; margin: -1px; overflow: hidden; clip: rect(0px, 0px, 0px, 0px); white-space: nowrap; overflow-wrap: normal;">
                                    <option value=""></option>
                                    <option value="1-10">1-10</option>
                                    <option value="11-50">11-50</option>
                                    <option value="51-200">51-200</option>
                                    <option value="200+">200+</option>
                                </select>
                            </div>
                            <div>
                                <div class="mb-2.5 text-sm font-medium">
                                    <label for="id">¿Cómo nos conociste? <span class="text-muted-foreground">(Opcional)</span></label>
                                </div>
                                <button type="button" role="combobox" aria-controls="radix-:r0R17k:" aria-expanded="false" aria-autocomplete="none" dir="ltr" data-state="closed" data-placeholder="" class="flex h-10 w-full items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 [&>span]:line-clamp-1" id="referral" name="referral">
                                    <span style="pointer-events:none">Seleccionar</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down h-4 w-4 opacity-50" aria-hidden="true">
                                        <path d="m6 9 6 6 6-6"></path>
                                    </svg>
                                </button>
                                <select aria-hidden="true" tabindex="-1" style="position: absolute; border: 0px; width: 1px; height: 1px; padding: 0px; margin: -1px; overflow: hidden; clip: rect(0px, 0px, 0px, 0px); white-space: nowrap; overflow-wrap: normal;">
                                    <option value=""></option>
                                    <option value="search">Búsqueda web</option>
                                </select>
                            </div>
                            <div class="flex w-full flex-col justify-end space-y-3 pt-2">
                                <button class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2" type="submit">Solicitar información</button>
                                <div class="text-xs text-muted-foreground">Para más información sobre cómo manejamos tu información personal, visita nuestra <a href="#" class="underline">política de privacidad</a>.</div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
</main>

<?php
get_footer();

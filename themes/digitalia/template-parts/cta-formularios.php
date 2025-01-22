<?php
/**
 * Template part for displaying CTA form section
 *
 * @package Digitalia
 */

$args = wp_parse_args($args, array(
    'title' => 'Contáctanos',
    'description' => 'Completa el formulario y nos pondremos en contacto contigo pronto.',
    'background_class' => ''
));
?>

<section class="py-32 <?php echo esc_attr($args['background_class']); ?>">
    <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex w-full flex-col gap-16 overflow-hidden rounded-lg bg-accent p-8 md:rounded-xl lg:flex-row lg:items-center lg:p-16">
            <div class="flex-1">
                <h3 class="mb-3 text-2xl font-semibold md:mb-4 md:text-4xl lg:mb-6">
                    <?php echo esc_html($args['title']); ?>
                </h3>
                <p class="text-muted-foreground lg:text-lg">
                    <?php echo esc_html($args['description']); ?>
                </p>
            </div>
            <div class="shrink-0">
                <form id="ctaForm" class="flex flex-col gap-4">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div class="flex flex-col text-left">
                            <input type="text" placeholder="Nombres" required
                                class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" />
                        </div>
                        <div class="flex flex-col text-left">
                            <input type="text" placeholder="Apellidos" required
                                class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" />
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <div class="flex flex-col text-left">
                            <input type="text" placeholder="Ubicación" required
                                class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" />
                        </div>
                        <div class="flex flex-col text-left">
                            <input type="email" placeholder="Email" required
                                class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50" />
                        </div>
                    </div>
                    <div id="formMessage" class="hidden text-center text-sm text-green-600 font-medium">
                        Formulario enviado. Gracias por unirte
                    </div>
                    <div class="flex flex-col justify-center gap-2 sm:flex-row">
                        <button type="submit"
                            class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2">
                            Enviar
                        </button>
                    </div>
                </form>
                <p class="mt-2 text-left text-xs text-muted-foreground">
                    Ver nuestra
                    <a href="#" class="underline hover:text-foreground">
                        política de privacidad
                    </a>.
                </p>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('ctaForm');
    const formMessage = document.getElementById('formMessage');

    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Hide form fields
            const formFields = form.querySelectorAll('input, button');
            formFields.forEach(field => {
                field.style.display = 'none';
            });

            // Show success message
            formMessage.classList.remove('hidden');
            formMessage.classList.add('block');
        });
    }
});
</script>

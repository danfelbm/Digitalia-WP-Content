(function($) {
    'use strict';

    $(document).ready(function() {
        $(document).on('submit', '.digitalia-forms-form', function(e) {
            e.preventDefault();
            const $form = $(this);
            const formId = $form.data('form-id');
            const formData = new FormData();

            // Añadir nonce y acción
            formData.append('action', 'digitalia_forms_submit');
            formData.append('nonce', digitaliaForms.nonce);
            formData.append('form_id', formId);

            // Recopilar campos del formulario
            $form.find('.digitalia-forms-field').each(function() {
                const $field = $(this);
                const fieldKey = $field.data('field-id'); // This now contains the field key
                const $input = $field.find('input, select, textarea');
                
                console.log('Processing field:', {
                    fieldKey,
                    label: $field.find('label').text().trim(),
                    value: $input.val(),
                    input: $input.length ? $input.get(0).outerHTML : 'No input found'
                });
                
                if ($input.length) {
                    const value = $input.val();
                    if (value !== null && value !== undefined) {
                        // Only append if we have a valid field key
                        if (fieldKey) {
                            formData.append(`field_${fieldKey}`, value);
                            console.log(`Appending field: field_${fieldKey} = ${value}`);
                        } else {
                            console.warn('Field key is missing for field:', {
                                label: $field.find('label').text().trim(),
                                html: $field.html()
                            });
                        }
                    }
                }
            });

            // Log all form data in a more readable format
            console.log('Form data to be submitted:', 
                Array.from(formData.entries()).reduce((acc, [key, value]) => {
                    acc[key] = value;
                    return acc;
                }, {})
            );

            // Deshabilitar botón de envío
            const $submit = $form.find('button[type="submit"]');
            const originalText = $submit.text();
            $submit.prop('disabled', true).text('Enviando...');

            $.ajax({
                url: digitaliaForms.ajaxUrl,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log('AJAX response:', response);
                    if (response.success) {
                        $form.html('<div class="digitalia-forms-success">' + response.data.message + '</div>');
                    } else {
                        const $error = $form.find('.digitalia-forms-error');
                        if ($error.length) {
                            $error.html(response.data.message);
                        } else {
                            $form.prepend('<div class="digitalia-forms-error">' + response.data.message + '</div>');
                        }
                        $submit.prop('disabled', false).text(originalText);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error:', { xhr, status, error });
                    const $error = $form.find('.digitalia-forms-error');
                    if ($error.length) {
                        $error.html('Error al enviar el formulario. Por favor, inténtalo de nuevo.');
                    } else {
                        $form.prepend('<div class="digitalia-forms-error">Error al enviar el formulario. Por favor, inténtalo de nuevo.</div>');
                    }
                    $submit.prop('disabled', false).text(originalText);
                }
            });
        });
    });
})(jQuery);

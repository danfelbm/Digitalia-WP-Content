console.log('Digitalia Forms Admin JS loaded');

jQuery(document).ready(function($) {
    console.log('Digitalia Forms Admin DOM ready');
    
    // Variables globales
    var $container = $('.digitalia-forms-fields');
    var $list = $container.find('.digitalia-forms-fields-list');
    var template = $('#digitalia-forms-field-template').html();
    var nextIndex = $list.children().length;

    // Añadir campo
    $container.on('click', '.digitalia-forms-add-field', function() {
        var newField = template.replace(/{{index}}/g, nextIndex++);
        $list.append(newField);
        updateFieldOrders();
    });

    // Eliminar campo
    $container.on('click', '.delete-field', function() {
        $(this).closest('.digitalia-forms-field').remove();
        updateFieldOrders();
    });

    // Mostrar/ocultar opciones según tipo
    $container.on('change', '.field-type', function() {
        var $field = $(this).closest('.digitalia-forms-field');
        var $options = $field.find('.field-options');
        var $fileOptions = $field.find('.field-option');
        
        $options.hide();
        $fileOptions.hide();
        
        if (['select', 'radio', 'checkbox'].includes($(this).val())) {
            $options.show();
        } else if ($(this).val() === 'file') {
            $fileOptions.show();
        }
    });

    // Ordenar campos
    $list.sortable({
        handle: '.move-field',
        update: updateFieldOrders
    });

    // Actualizar orden de campos
    function updateFieldOrders() {
        $('.digitalia-forms-field').each(function(index) {
            $(this).find('input[name$="[order]"]').val(index);
        });
    }

    // Copiar shortcode
    $('.copy-shortcode').on('click', function() {
        var shortcode = $(this).data('shortcode');
        navigator.clipboard.writeText(shortcode).then(function() {
            alert('Shortcode copiado al portapapeles');
        }).catch(function(err) {
            console.error('Error al copiar shortcode:', err);
        });
    });

    // Agregar nueva acción
    $('.digitalia-forms-add-action').on('click', function(e) {
        console.log('Add action button clicked');
        e.preventDefault();
        const actionHtml = getActionTemplate(++actionCounter);
        $('.digitalia-forms-actions-list').append(actionHtml);
        initializeActionEvents(actionCounter);
    });

    // Inicializar eventos para acciones existentes
    $('.digitalia-forms-action').each(function() {
        const id = $(this).data('id') || actionCounter;
        console.log('Initializing action events for action', id);
        initializeActionEvents(id);
    });

    // Inicializar eventos para acciones
    function initializeActionEvents(id) {
        console.log('Initializing action events for action', id);
        // Eliminar acción
        $(`.digitalia-forms-action[data-id="${id}"] .delete-action`).on('click', function(e) {
            console.log('Delete action button clicked for action', id);
            e.preventDefault();
            $(this).closest('.digitalia-forms-action').remove();
        });

        // Cambiar tipo de acción
        $(`.digitalia-forms-action[data-id="${id}"] .action-type`).on('change', function() {
            console.log('Action type changed for action', id);
            const actionContainer = $(this).closest('.digitalia-forms-action');
            updateActionOptions(actionContainer, $(this).val());
        });
    }

    // Actualizar opciones de acción según el tipo
    function updateActionOptions(container, type) {
        console.log('Updating action options for type', type);
        const optionsContainer = container.find('.action-options');
        optionsContainer.empty();

        switch(type) {
            case 'email':
                optionsContainer.append(`
                    <div class="action-option">
                        <label>Destinatario:</label>
                        <input type="email" name="action_email_to[]" class="widefat" required>
                        <label>Asunto:</label>
                        <input type="text" name="action_email_subject[]" class="widefat" required>
                        <label>Mensaje:</label>
                        <textarea name="action_email_message[]" rows="4" class="widefat"></textarea>
                    </div>
                `);
                break;
            case 'webhook':
                optionsContainer.append(`
                    <div class="action-option">
                        <label>URL:</label>
                        <input type="url" name="action_webhook_url[]" class="widefat" required>
                        <label>Método:</label>
                        <select name="action_webhook_method[]" class="widefat">
                            <option value="POST">POST</option>
                            <option value="GET">GET</option>
                            <option value="PUT">PUT</option>
                        </select>
                    </div>
                `);
                break;
            case 'notification':
                optionsContainer.append(`
                    <div class="action-option">
                        <label>Mensaje:</label>
                        <textarea name="action_notification_message[]" rows="4" class="widefat"></textarea>
                    </div>
                `);
                break;
        }
    }

    // Plantilla de acción
    function getActionTemplate(id) {
        console.log('Getting action template for action', id);
        return `
            <div class="digitalia-forms-action" data-id="${id}">
                <div class="digitalia-forms-action-header">
                    <span class="move-action dashicons dashicons-move"></span>
                    <div class="digitalia-forms-action-actions">
                        <button type="button" class="delete-action button button-link-delete">
                            <span class="dashicons dashicons-trash"></span>
                        </button>
                    </div>
                </div>
                
                <div class="digitalia-forms-action-content">
                    <input type="hidden" name="action_id[]" value="0">
                    <input type="hidden" name="action_order[]" value="${id}">
                    
                    <p>
                        <label>Tipo:</label>
                        <select name="action_type[]" class="action-type widefat">
                            <option value="email">Enviar Email</option>
                            <option value="webhook">Webhook</option>
                            <option value="notification">Notificación</option>
                        </select>
                    </p>
                    
                    <div class="action-options"></div>
                </div>
            </div>
        `;
    }

    // Actualizar orden de acciones
    function updateActionOrder() {
        console.log('Updating action order');
        $('.digitalia-forms-actions-list .digitalia-forms-action').each(function(index) {
            $(this).find('input[name="action_order[]"]').val(index);
        });
    }

    // Guardar formulario
    $('#digitalia-forms-save').on('click', function(e) {
        console.log('Save button clicked');
        e.preventDefault();
        const form = $('#digitalia-forms-edit');
        form.submit();
    });
});

(function($) {
    'use strict';

    // Generar clave del campo cuando se escribe la etiqueta
    $(document).on('input', '.field-label', function() {
        const $label = $(this);
        const $field = $label.closest('.digitalia-forms-field');
        const $key = $field.find('.field-key');
        
        // Solo generar clave si el campo está vacío o no es readonly
        if (!$key.prop('readonly') && (!$key.val() || $key.data('auto-generated'))) {
            const key = $label.val()
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, '_')
                .replace(/^_+|_+$/g, '');
            
            $key.val(key).data('auto-generated', true);
        }
    });

    // Marcar la clave como no auto-generada cuando se edita manualmente
    $(document).on('input', '.field-key', function() {
        $(this).data('auto-generated', false);
    });

    // Manejar tipos de campo que requieren opciones
    $(document).on('change', '.field-type', function() {
        const $field = $(this).closest('.digitalia-forms-field');
        const type = $(this).val();
        
        $field.find('.field-options').toggle(
            ['select', 'radio', 'checkbox'].includes(type)
        );
    });

    // Manejar eliminación de campos
    $(document).on('click', '.delete-field', function() {
        if (confirm('¿Estás seguro de que quieres eliminar este campo?')) {
            $(this).closest('.digitalia-forms-field').remove();
            updateFieldOrder();
        }
    });

    // Añadir nuevo campo
    $('.digitalia-forms-add-field').on('click', function() {
        const $template = $('#digitalia-forms-field-template');
        const $fieldsList = $('.digitalia-forms-fields-list');
        const nextIndex = $('.digitalia-forms-field').length;
        
        let html = $template.html().replace(/\{\{index\}\}/g, nextIndex);
        $fieldsList.append(html);
        
        // Actualizar orden
        updateFieldOrder();
    });

    // Hacer campos ordenables
    $('.digitalia-forms-fields-list').sortable({
        handle: '.move-field',
        update: updateFieldOrder
    });

    // Actualizar orden de campos
    function updateFieldOrder() {
        $('.digitalia-forms-field').each(function(index) {
            $(this)
                .attr('data-index', index)
                .find('input[name$="[order]"]')
                .val(index);
        });
    }

    // Copiar shortcode
    $('.copy-shortcode').on('click', function() {
        const shortcode = $(this).data('shortcode');
        navigator.clipboard.writeText(shortcode).then(
            function() {
                alert('¡Shortcode copiado!');
            },
            function() {
                prompt('Copia este shortcode:', shortcode);
            }
        );
    });

})(jQuery);

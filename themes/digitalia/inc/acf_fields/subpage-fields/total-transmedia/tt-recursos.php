<?php

if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group(array(
        'key' => 'group_tt_recursos_hero',
        'title' => 'Total Transmedia - Recursos Hero',
        'fields' => array(
            array(
                'key' => 'field_tt_recursos_subtitle',
                'label' => 'Subtítulo',
                'name' => 'tt_recursos_subtitle',
                'type' => 'text',
                'instructions' => 'Ingresa el subtítulo de la sección (ej: Total Transmedia)',
                'required' => 1,
                'default_value' => 'Total Transmedia',
            ),
            array(
                'key' => 'field_tt_recursos_title',
                'label' => 'Título Principal',
                'name' => 'tt_recursos_title',
                'type' => 'text',
                'instructions' => 'Ingresa el título principal de la sección',
                'required' => 1,
                'default_value' => 'Centro de Recursos',
            ),
            array(
                'key' => 'field_tt_recursos_description',
                'label' => 'Descripción',
                'name' => 'tt_recursos_description',
                'type' => 'textarea',
                'instructions' => 'Ingresa la descripción de la sección',
                'required' => 1,
                'default_value' => 'Explora nuestra biblioteca digital completa de recursos educativos, herramientas interactivas y materiales de formación para la alfabetización mediática y la comunicación digital.',
            ),
            array(
                'key' => 'field_tt_recursos_primary_cta',
                'label' => 'Botón Principal',
                'name' => 'tt_recursos_primary_cta',
                'type' => 'group',
                'instructions' => 'Configura el botón principal',
                'required' => 1,
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_tt_recursos_primary_cta_text',
                        'label' => 'Texto del Botón',
                        'name' => 'text',
                        'type' => 'text',
                        'required' => 1,
                        'default_value' => 'Explorar Media kit',
                    ),
                    array(
                        'key' => 'field_tt_recursos_primary_cta_url',
                        'label' => 'URL del Botón',
                        'name' => 'url',
                        'type' => 'url',
                        'required' => 1,
                        'default_value' => '/kit-social-media',
                    ),
                ),
            ),
            array(
                'key' => 'field_tt_recursos_secondary_cta',
                'label' => 'Botón Secundario',
                'name' => 'tt_recursos_secondary_cta',
                'type' => 'group',
                'instructions' => 'Configura el botón secundario (opcional)',
                'required' => 0,
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_tt_recursos_secondary_cta_text',
                        'label' => 'Texto del Botón',
                        'name' => 'text',
                        'type' => 'text',
                        'required' => 0,
                        'default_value' => 'Herramientas Interactivas',
                    ),
                    array(
                        'key' => 'field_tt_recursos_secondary_cta_url',
                        'label' => 'URL del Botón',
                        'name' => 'url',
                        'type' => 'url',
                        'required' => 0,
                        'default_value' => '#herramientas',
                    ),
                ),
            ),
            array(
                'key' => 'field_tt_recursos_image',
                'label' => 'Imagen Hero',
                'name' => 'tt_recursos_image',
                'type' => 'image',
                'instructions' => 'Selecciona la imagen principal (800x600px recomendado)',
                'required' => 0,
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'mime_types' => 'jpg,jpeg,png,gif',
            ),
            array(
                'key' => 'field_tt_recursos_image_alt',
                'label' => 'Texto Alternativo de la Imagen',
                'name' => 'tt_recursos_image_alt',
                'type' => 'text',
                'instructions' => 'Ingresa el texto alternativo para la imagen',
                'required' => 0,
                'default_value' => 'Centro de Recursos Total Transmedia',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'page-templates/subpage-templates/total-transmedia/recursos.php',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));

endif;

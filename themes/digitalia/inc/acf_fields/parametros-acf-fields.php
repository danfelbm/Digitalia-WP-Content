<?php
/**
 * ACF Fields for Parameters Admin Page
 *
 * @package Digitalia
 */

if (function_exists('acf_add_local_field_group')):

    acf_add_local_field_group(array(
        'key' => 'group_parametros',
        'title' => 'Parámetros',
        'fields' => array(
            array(
                'key' => 'field_ctas',
                'label' => 'CTAs',
                'name' => 'ctas',
                'type' => 'flexible_content',
                'button_label' => 'Añadir CTA',
                'layouts' => array(
                    'layout_cta' => array(
                        'key' => 'layout_cta',
                        'name' => 'cta',
                        'label' => 'CTA',
                        'display' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_cta_title',
                                'label' => 'Título',
                                'name' => 'title',
                                'type' => 'text',
                                'required' => 1,
                            ),
                            array(
                                'key' => 'field_cta_description',
                                'label' => 'Descripción',
                                'name' => 'description',
                                'type' => 'textarea',
                                'required' => 1,
                            ),
                            array(
                                'key' => 'field_cta_primary_text',
                                'label' => 'Texto CTA Principal',
                                'name' => 'cta_primary_text',
                                'type' => 'text',
                                'required' => 1,
                            ),
                            array(
                                'key' => 'field_cta_primary_url',
                                'label' => 'URL CTA Principal',
                                'name' => 'cta_primary_url',
                                'type' => 'url',
                                'required' => 1,
                            ),
                            array(
                                'key' => 'field_cta_secondary_text',
                                'label' => 'Texto CTA Secundario',
                                'name' => 'cta_secondary_text',
                                'type' => 'text',
                            ),
                            array(
                                'key' => 'field_cta_secondary_url',
                                'label' => 'URL CTA Secundario',
                                'name' => 'cta_secondary_url',
                                'type' => 'url',
                            ),
                            array(
                                'key' => 'field_doc_title',
                                'label' => 'Título Documentación',
                                'name' => 'doc_title',
                                'type' => 'text',
                            ),
                            array(
                                'key' => 'field_doc_description',
                                'label' => 'Descripción Documentación',
                                'name' => 'doc_description',
                                'type' => 'textarea',
                            ),
                            array(
                                'key' => 'field_doc_url',
                                'label' => 'URL Documentación',
                                'name' => 'doc_url',
                                'type' => 'url',
                            ),
                            array(
                                'key' => 'field_guide_title',
                                'label' => 'Título Guía',
                                'name' => 'guide_title',
                                'type' => 'text',
                            ),
                            array(
                                'key' => 'field_guide_description',
                                'label' => 'Descripción Guía',
                                'name' => 'guide_description',
                                'type' => 'textarea',
                            ),
                            array(
                                'key' => 'field_guide_url',
                                'label' => 'URL Guía',
                                'name' => 'guide_url',
                                'type' => 'url',
                            ),
                            array(
                                'key' => 'field_background_class',
                                'label' => 'Clase de Fondo',
                                'name' => 'background_class',
                                'type' => 'text',
                                'default_value' => 'bg-slate-100',
                            ),
                            array(
                                'key' => 'field_display_pages',
                                'label' => 'Mostrar en Páginas',
                                'name' => 'display_pages',
                                'type' => 'relationship',
                                'post_type' => array('page'),
                                'filters' => array(
                                    'search',
                                    'post_type',
                                    'taxonomy'
                                ),
                                'return_format' => 'id',
                                'required' => 0,
                                'min' => 0,
                            ),
                            array(
                                'key' => 'field_post_types_display',
                                'label' => 'Configuración por Tipo de Contenido',
                                'name' => 'post_types_display',
                                'type' => 'group',
                                'layout' => 'block',
                                'sub_fields' => array(
                                    // Posts
                                    array(
                                        'key' => 'field_posts_config',
                                        'label' => 'Entradas',
                                        'name' => 'posts_config',
                                        'type' => 'group',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'field_enable_posts',
                                                'label' => 'Mostrar en Entradas',
                                                'name' => 'enable',
                                                'type' => 'true_false',
                                                'ui' => 1,
                                            ),
                                            array(
                                                'key' => 'field_posts_display_type',
                                                'label' => 'Tipo de Visualización',
                                                'name' => 'display_type',
                                                'type' => 'radio',
                                                'choices' => array(
                                                    'all' => 'Mostrar en todas las entradas',
                                                    'specific' => 'Seleccionar entradas específicas'
                                                ),
                                                'default_value' => 'all',
                                                'conditional_logic' => array(
                                                    array(
                                                        array(
                                                            'field' => 'field_enable_posts',
                                                            'operator' => '==',
                                                            'value' => '1',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            array(
                                                'key' => 'field_specific_posts',
                                                'label' => 'Seleccionar Entradas',
                                                'name' => 'specific_items',
                                                'type' => 'relationship',
                                                'post_type' => array('post'),
                                                'filters' => array('search', 'taxonomy'),
                                                'return_format' => 'id',
                                                'conditional_logic' => array(
                                                    array(
                                                        array(
                                                            'field' => 'field_enable_posts',
                                                            'operator' => '==',
                                                            'value' => '1',
                                                        ),
                                                        array(
                                                            'field' => 'field_posts_display_type',
                                                            'operator' => '==',
                                                            'value' => 'specific',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                    // Personajes
                                    array(
                                        'key' => 'field_personajes_config',
                                        'label' => 'Personajes',
                                        'name' => 'personajes_config',
                                        'type' => 'group',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'field_enable_personajes',
                                                'label' => 'Mostrar en Personajes',
                                                'name' => 'enable',
                                                'type' => 'true_false',
                                                'ui' => 1,
                                            ),
                                            array(
                                                'key' => 'field_personajes_display_type',
                                                'label' => 'Tipo de Visualización',
                                                'name' => 'display_type',
                                                'type' => 'radio',
                                                'choices' => array(
                                                    'all' => 'Mostrar en todos los personajes',
                                                    'specific' => 'Seleccionar personajes específicos'
                                                ),
                                                'default_value' => 'all',
                                                'conditional_logic' => array(
                                                    array(
                                                        array(
                                                            'field' => 'field_enable_personajes',
                                                            'operator' => '==',
                                                            'value' => '1',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            array(
                                                'key' => 'field_specific_personajes',
                                                'label' => 'Seleccionar Personajes',
                                                'name' => 'specific_items',
                                                'type' => 'relationship',
                                                'post_type' => array('personajes'),
                                                'filters' => array('search'),
                                                'return_format' => 'id',
                                                'conditional_logic' => array(
                                                    array(
                                                        array(
                                                            'field' => 'field_enable_personajes',
                                                            'operator' => '==',
                                                            'value' => '1',
                                                        ),
                                                        array(
                                                            'field' => 'field_personajes_display_type',
                                                            'operator' => '==',
                                                            'value' => 'specific',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                    // Actores
                                    array(
                                        'key' => 'field_actores_config',
                                        'label' => 'Actores',
                                        'name' => 'actores_config',
                                        'type' => 'group',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'field_enable_actores',
                                                'label' => 'Mostrar en Actores',
                                                'name' => 'enable',
                                                'type' => 'true_false',
                                                'ui' => 1,
                                            ),
                                            array(
                                                'key' => 'field_actores_display_type',
                                                'label' => 'Tipo de Visualización',
                                                'name' => 'display_type',
                                                'type' => 'radio',
                                                'choices' => array(
                                                    'all' => 'Mostrar en todos los actores',
                                                    'specific' => 'Seleccionar actores específicos'
                                                ),
                                                'default_value' => 'all',
                                                'conditional_logic' => array(
                                                    array(
                                                        array(
                                                            'field' => 'field_enable_actores',
                                                            'operator' => '==',
                                                            'value' => '1',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            array(
                                                'key' => 'field_specific_actores',
                                                'label' => 'Seleccionar Actores',
                                                'name' => 'specific_items',
                                                'type' => 'relationship',
                                                'post_type' => array('actores'),
                                                'filters' => array('search'),
                                                'return_format' => 'id',
                                                'conditional_logic' => array(
                                                    array(
                                                        array(
                                                            'field' => 'field_enable_actores',
                                                            'operator' => '==',
                                                            'value' => '1',
                                                        ),
                                                        array(
                                                            'field' => 'field_actores_display_type',
                                                            'operator' => '==',
                                                            'value' => 'specific',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                    // Episodios
                                    array(
                                        'key' => 'field_episodios_config',
                                        'label' => 'Episodios',
                                        'name' => 'episodios_config',
                                        'type' => 'group',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'field_enable_episodios',
                                                'label' => 'Mostrar en Episodios',
                                                'name' => 'enable',
                                                'type' => 'true_false',
                                                'ui' => 1,
                                            ),
                                            array(
                                                'key' => 'field_episodios_display_type',
                                                'label' => 'Tipo de Visualización',
                                                'name' => 'display_type',
                                                'type' => 'radio',
                                                'choices' => array(
                                                    'all' => 'Mostrar en todos los episodios',
                                                    'specific' => 'Seleccionar episodios específicos'
                                                ),
                                                'default_value' => 'all',
                                                'conditional_logic' => array(
                                                    array(
                                                        array(
                                                            'field' => 'field_enable_episodios',
                                                            'operator' => '==',
                                                            'value' => '1',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            array(
                                                'key' => 'field_specific_episodios',
                                                'label' => 'Seleccionar Episodios',
                                                'name' => 'specific_items',
                                                'type' => 'relationship',
                                                'post_type' => array('episodio'),
                                                'filters' => array('search'),
                                                'return_format' => 'id',
                                                'conditional_logic' => array(
                                                    array(
                                                        array(
                                                            'field' => 'field_enable_episodios',
                                                            'operator' => '==',
                                                            'value' => '1',
                                                        ),
                                                        array(
                                                            'field' => 'field_episodios_display_type',
                                                            'operator' => '==',
                                                            'value' => 'specific',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                    // Series
                                    array(
                                        'key' => 'field_series_config',
                                        'label' => 'Series',
                                        'name' => 'series_config',
                                        'type' => 'group',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'field_enable_series',
                                                'label' => 'Mostrar en Series',
                                                'name' => 'enable',
                                                'type' => 'true_false',
                                                'ui' => 1,
                                            ),
                                            array(
                                                'key' => 'field_series_display_type',
                                                'label' => 'Tipo de Visualización',
                                                'name' => 'display_type',
                                                'type' => 'radio',
                                                'choices' => array(
                                                    'all' => 'Mostrar en todas las series',
                                                    'specific' => 'Seleccionar series específicas'
                                                ),
                                                'default_value' => 'all',
                                                'conditional_logic' => array(
                                                    array(
                                                        array(
                                                            'field' => 'field_enable_series',
                                                            'operator' => '==',
                                                            'value' => '1',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            array(
                                                'key' => 'field_specific_series',
                                                'label' => 'Seleccionar Series',
                                                'name' => 'specific_items',
                                                'type' => 'relationship',
                                                'post_type' => array('series'),
                                                'filters' => array('search'),
                                                'return_format' => 'id',
                                                'conditional_logic' => array(
                                                    array(
                                                        array(
                                                            'field' => 'field_enable_series',
                                                            'operator' => '==',
                                                            'value' => '1',
                                                        ),
                                                        array(
                                                            'field' => 'field_series_display_type',
                                                            'operator' => '==',
                                                            'value' => 'specific',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                    // Cursos
                                    array(
                                        'key' => 'field_cursos_config',
                                        'label' => 'Cursos',
                                        'name' => 'cursos_config',
                                        'type' => 'group',
                                        'sub_fields' => array(
                                            array(
                                                'key' => 'field_enable_cursos',
                                                'label' => 'Mostrar en Cursos',
                                                'name' => 'enable',
                                                'type' => 'true_false',
                                                'ui' => 1,
                                            ),
                                            array(
                                                'key' => 'field_cursos_display_type',
                                                'label' => 'Tipo de Visualización',
                                                'name' => 'display_type',
                                                'type' => 'radio',
                                                'choices' => array(
                                                    'all' => 'Mostrar en todos los cursos',
                                                    'specific' => 'Seleccionar cursos específicos'
                                                ),
                                                'default_value' => 'all',
                                                'conditional_logic' => array(
                                                    array(
                                                        array(
                                                            'field' => 'field_enable_cursos',
                                                            'operator' => '==',
                                                            'value' => '1',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                            array(
                                                'key' => 'field_specific_cursos',
                                                'label' => 'Seleccionar Cursos',
                                                'name' => 'specific_items',
                                                'type' => 'relationship',
                                                'post_type' => array('curso'),
                                                'filters' => array('search'),
                                                'return_format' => 'id',
                                                'conditional_logic' => array(
                                                    array(
                                                        array(
                                                            'field' => 'field_enable_cursos',
                                                            'operator' => '==',
                                                            'value' => '1',
                                                        ),
                                                        array(
                                                            'field' => 'field_cursos_display_type',
                                                            'operator' => '==',
                                                            'value' => 'specific',
                                                        ),
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'parametros',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
    ));

endif;

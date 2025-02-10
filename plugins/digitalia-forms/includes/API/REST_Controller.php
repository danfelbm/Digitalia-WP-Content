<?php
namespace DigitaliaForms\API;

class REST_Controller extends \WP_REST_Controller {
    protected $namespace = 'digitalia-forms/v1';
    protected $db;

    public function __construct() {
        $this->db = new \DigitaliaForms\Database\Manager();
    }

    /**
     * Registrar rutas
     */
    public function register_routes() {
        // Rutas de formularios
        register_rest_route($this->namespace, '/forms', [
            [
                'methods' => \WP_REST_Server::READABLE,
                'callback' => [$this, 'get_forms'],
                'permission_callback' => [$this, 'get_forms_permissions_check']
            ],
            [
                'methods' => \WP_REST_Server::CREATABLE,
                'callback' => [$this, 'create_form'],
                'permission_callback' => [$this, 'create_form_permissions_check'],
                'args' => $this->get_form_schema()
            ]
        ]);

        register_rest_route($this->namespace, '/forms/(?P<id>\d+)', [
            [
                'methods' => \WP_REST_Server::READABLE,
                'callback' => [$this, 'get_form'],
                'permission_callback' => [$this, 'get_form_permissions_check'],
                'args' => ['id' => ['required' => true]]
            ],
            [
                'methods' => \WP_REST_Server::EDITABLE,
                'callback' => [$this, 'update_form'],
                'permission_callback' => [$this, 'update_form_permissions_check'],
                'args' => $this->get_form_schema()
            ],
            [
                'methods' => \WP_REST_Server::DELETABLE,
                'callback' => [$this, 'delete_form'],
                'permission_callback' => [$this, 'delete_form_permissions_check']
            ]
        ]);

        // Rutas de entradas
        register_rest_route($this->namespace, '/forms/(?P<form_id>\d+)/entries', [
            [
                'methods' => \WP_REST_Server::READABLE,
                'callback' => [$this, 'get_entries'],
                'permission_callback' => [$this, 'get_entries_permissions_check'],
                'args' => [
                    'page' => ['default' => 1],
                    'per_page' => ['default' => 20],
                    'orderby' => ['default' => 'date'],
                    'order' => ['default' => 'DESC']
                ]
            ]
        ]);

        register_rest_route($this->namespace, '/forms/(?P<form_id>\d+)/entries/(?P<id>\d+)', [
            [
                'methods' => \WP_REST_Server::READABLE,
                'callback' => [$this, 'get_entry'],
                'permission_callback' => [$this, 'get_entries_permissions_check']
            ],
            [
                'methods' => \WP_REST_Server::DELETABLE,
                'callback' => [$this, 'delete_entry'],
                'permission_callback' => [$this, 'delete_entry_permissions_check']
            ]
        ]);
    }

    /**
     * Verificar permisos para obtener formularios
     */
    public function get_forms_permissions_check($request) {
        return current_user_can('digitalia_forms_manage_forms');
    }

    /**
     * Verificar permisos para crear formulario
     */
    public function create_form_permissions_check($request) {
        return current_user_can('digitalia_forms_manage_forms');
    }

    /**
     * Verificar permisos para obtener formulario
     */
    public function get_form_permissions_check($request) {
        return current_user_can('digitalia_forms_manage_forms');
    }

    /**
     * Verificar permisos para actualizar formulario
     */
    public function update_form_permissions_check($request) {
        return current_user_can('digitalia_forms_manage_forms');
    }

    /**
     * Verificar permisos para eliminar formulario
     */
    public function delete_form_permissions_check($request) {
        return current_user_can('digitalia_forms_manage_forms');
    }

    /**
     * Verificar permisos para obtener entradas
     */
    public function get_entries_permissions_check($request) {
        return current_user_can('digitalia_forms_manage_entries');
    }

    /**
     * Verificar permisos para eliminar entrada
     */
    public function delete_entry_permissions_check($request) {
        return current_user_can('digitalia_forms_manage_entries');
    }

    /**
     * Obtener formularios
     */
    public function get_forms($request) {
        $forms = $this->db->get_forms();
        return rest_ensure_response($forms);
    }

    /**
     * Crear formulario
     */
    public function create_form($request) {
        $form_id = $this->db->save_form($request->get_params());
        
        if (!$form_id) {
            return new \WP_Error(
                'form_creation_failed',
                __('Error al crear el formulario.', 'digitalia-forms'),
                ['status' => 500]
            );
        }

        $form = $this->db->get_form($form_id);
        return rest_ensure_response($form);
    }

    /**
     * Obtener formulario
     */
    public function get_form($request) {
        $form = $this->db->get_form($request['id']);
        
        if (!$form) {
            return new \WP_Error(
                'form_not_found',
                __('Formulario no encontrado.', 'digitalia-forms'),
                ['status' => 404]
            );
        }

        return rest_ensure_response($form);
    }

    /**
     * Actualizar formulario
     */
    public function update_form($request) {
        $form_id = $this->db->save_form(array_merge(
            $request->get_params(),
            ['form_id' => $request['id']]
        ));
        
        if (!$form_id) {
            return new \WP_Error(
                'form_update_failed',
                __('Error al actualizar el formulario.', 'digitalia-forms'),
                ['status' => 500]
            );
        }

        $form = $this->db->get_form($form_id);
        return rest_ensure_response($form);
    }

    /**
     * Eliminar formulario
     */
    public function delete_form($request) {
        $deleted = $this->db->delete_form($request['id']);
        
        if (!$deleted) {
            return new \WP_Error(
                'form_deletion_failed',
                __('Error al eliminar el formulario.', 'digitalia-forms'),
                ['status' => 500]
            );
        }

        return rest_ensure_response(['deleted' => true]);
    }

    /**
     * Obtener entradas de un formulario
     */
    public function get_entries($request) {
        $form_id = $request['form_id'];
        $page = $request['page'];
        $per_page = $request['per_page'];
        $orderby = $request['orderby'];
        $order = $request['order'];

        $args = [
            'post_type' => 'digitalia_form_entry',
            'posts_per_page' => $per_page,
            'paged' => $page,
            'orderby' => $orderby,
            'order' => $order,
            'meta_query' => [
                [
                    'key' => '_form_id',
                    'value' => $form_id,
                    'compare' => '='
                ]
            ]
        ];

        $query = new \WP_Query($args);
        $entries = [];

        foreach ($query->posts as $post) {
            $entry = $this->prepare_entry_for_response($post);
            $entries[] = $this->prepare_response_for_collection($entry);
        }

        $response = rest_ensure_response($entries);
        $response->header('X-WP-Total', $query->found_posts);
        $response->header('X-WP-TotalPages', $query->max_num_pages);

        return $response;
    }

    /**
     * Obtener una entrada específica
     */
    public function get_entry($request) {
        $entry_id = $request['id'];
        $form_id = $request['form_id'];

        $post = get_post($entry_id);
        if (!$post || get_post_type($post) !== 'digitalia_form_entry') {
            return new \WP_Error(
                'digitalia_forms_entry_not_found',
                __('Entrada no encontrada.', 'digitalia-forms'),
                ['status' => 404]
            );
        }

        $stored_form_id = get_post_meta($post->ID, '_form_id', true);
        if ($stored_form_id != $form_id) {
            return new \WP_Error(
                'digitalia_forms_invalid_form',
                __('La entrada no pertenece a este formulario.', 'digitalia-forms'),
                ['status' => 400]
            );
        }

        $entry = $this->prepare_entry_for_response($post);
        return rest_ensure_response($entry);
    }

    /**
     * Eliminar una entrada
     */
    public function delete_entry($request) {
        $entry_id = $request['id'];
        $form_id = $request['form_id'];

        $post = get_post($entry_id);
        if (!$post || get_post_type($post) !== 'digitalia_form_entry') {
            return new \WP_Error(
                'digitalia_forms_entry_not_found',
                __('Entrada no encontrada.', 'digitalia-forms'),
                ['status' => 404]
            );
        }

        $stored_form_id = get_post_meta($post->ID, '_form_id', true);
        if ($stored_form_id != $form_id) {
            return new \WP_Error(
                'digitalia_forms_invalid_form',
                __('La entrada no pertenece a este formulario.', 'digitalia-forms'),
                ['status' => 400]
            );
        }

        $result = wp_delete_post($entry_id, true);
        if (!$result) {
            return new \WP_Error(
                'digitalia_forms_delete_failed',
                __('Error al eliminar la entrada.', 'digitalia-forms'),
                ['status' => 500]
            );
        }

        return new \WP_REST_Response(null, 204);
    }

    /**
     * Preparar entrada para respuesta
     */
    protected function prepare_entry_for_response($post) {
        $form_id = get_post_meta($post->ID, '_form_id', true);
        $fields = $this->db->get_form_fields($form_id);
        
        $data = [
            'id' => $post->ID,
            'form_id' => $form_id,
            'date' => mysql_to_rfc3339($post->post_date),
            'fields' => []
        ];

        foreach ($fields as $field) {
            $value = get_post_meta($post->ID, '_field_' . $field->id, true);
            $data['fields'][] = [
                'id' => $field->id,
                'label' => $field->label,
                'type' => $field->type,
                'value' => $value
            ];
        }

        return $data;
    }

    /**
     * Obtener esquema de formulario
     */
    protected function get_form_schema() {
        return [
            'title' => [
                'required' => true,
                'type' => 'string',
                'sanitize_callback' => 'sanitize_text_field'
            ],
            'description' => [
                'type' => 'string',
                'sanitize_callback' => 'sanitize_textarea_field'
            ],
            'status' => [
                'type' => 'string',
                'enum' => ['draft', 'published'],
                'default' => 'draft'
            ],
            'fields' => [
                'type' => 'array',
                'items' => [
                    'type' => 'object',
                    'properties' => [
                        'type' => [
                            'type' => 'string',
                            'required' => true
                        ],
                        'label' => [
                            'type' => 'string',
                            'required' => true
                        ],
                        'name' => [
                            'type' => 'string',
                            'required' => true
                        ],
                        'required' => [
                            'type' => 'boolean',
                            'default' => false
                        ],
                        'options' => [
                            'type' => 'object'
                        ]
                    ]
                ]
            ],
            'actions' => [
                'type' => 'array',
                'items' => [
                    'type' => 'object',
                    'properties' => [
                        'type' => [
                            'type' => 'string',
                            'required' => true,
                            'enum' => ['email', 'webhook']
                        ],
                        'config' => [
                            'type' => 'object'
                        ]
                    ]
                ]
            ]
        ];
    }
}

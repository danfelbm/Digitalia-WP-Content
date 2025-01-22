<?php
/**
 * Custom dashboard page for Colaboratorio role
 */

if (!defined('ABSPATH')) {
    exit;
}

function digitalia_colaboratorio_dashboard_page() {
    ?>
    <div class="wrap">
        <h1>Bienvenido al Colaboratorio</h1>
        
        <div class="welcome-panel">
            <div class="welcome-panel-content">
                <h2>¡Hola! Bienvenido a tu espacio colaborativo</h2>
                <p class="about-description">Gestiona contenido, transmisiones y espacios desde un solo lugar.</p>
                
                <div class="welcome-panel-column-container">
                    <div class="welcome-panel-column">
                        <h3>Gestión de Contenido</h3>
                        <ul>
                            <li><a href="<?php echo admin_url('edit.php'); ?>" class="welcome-icon welcome-write-blog">Gestionar Entradas</a></li>
                            <li><a href="<?php echo admin_url('post-new.php'); ?>" class="welcome-icon welcome-add-page">Crear Nueva Entrada</a></li>
                            <li><a href="<?php echo admin_url('upload.php'); ?>" class="welcome-icon welcome-media">Biblioteca de Medios</a></li>
                        </ul>
                    </div>
                    <div class="welcome-panel-column">
                        <h3>Transmisiones</h3>
                        <ul>
                            <li><a href="<?php echo admin_url('edit.php?post_type=transmision'); ?>" class="welcome-icon welcome-add-page">Ver Transmisiones</a></li>
                            <li><a href="<?php echo admin_url('post-new.php?post_type=transmision'); ?>" class="welcome-icon welcome-write-blog">Nueva Transmisión</a></li>
                        </ul>
                    </div>
                    <div class="welcome-panel-column welcome-panel-last">
                        <h3>Espacios</h3>
                        <ul>
                            <li><a href="<?php echo admin_url('edit.php?post_type=espacio'); ?>" class="welcome-icon welcome-add-page">Ver Espacios</a></li>
                            <li><a href="<?php echo admin_url('post-new.php?post_type=espacio'); ?>" class="welcome-icon welcome-write-blog">Nuevo Espacio</a></li>
                            <li><a href="<?php echo admin_url('profile.php'); ?>" class="welcome-icon welcome-edit-page">Editar Perfil</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="welcome-panel-column-container mt-4">
                    <div class="welcome-panel-column">
                        <h3>Actividad Reciente</h3>
                        <?php
                        $args = array(
                            'post_type' => array('post', 'transmision', 'espacio'),
                            'posts_per_page' => 5,
                            'orderby' => 'date',
                            'order' => 'DESC'
                        );
                        $recent_items = new WP_Query($args);
                        
                        if ($recent_items->have_posts()) :
                            echo '<ul>';
                            while ($recent_items->have_posts()) :
                                $recent_items->the_post();
                                echo '<li><i class="bi bi-clock"></i> ' . get_the_title() . ' (' . get_post_type() . ')</li>';
                            endwhile;
                            echo '</ul>';
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

<?php
/**
 * Custom dashboard page for Total Transmedia role
 */

if (!defined('ABSPATH')) {
    exit;
}

function digitalia_total_transmedia_dashboard_page() {
    ?>
    <div class="wrap">
        <h1>Bienvenido a Total Transmedia</h1>
        
        <div class="welcome-panel">
            <div class="welcome-panel-content">
                <h2>¡Hola! Bienvenido a tu centro de control de contenido</h2>
                <p class="about-description">Gestiona todo tu contenido multimedia y descargas desde aquí.</p>
                
                <div class="welcome-panel-column-container">
                    <div class="welcome-panel-column">
                        <h3>Gestión de Contenido</h3>
                        <ul>
                            <li><a href="<?php echo admin_url('edit.php'); ?>" class="welcome-icon welcome-write-blog">Gestionar Entradas</a></li>
                            <li><a href="<?php echo admin_url('upload.php'); ?>" class="welcome-icon welcome-add-page">Biblioteca de Medios</a></li>
                            <li><a href="<?php echo admin_url('edit-comments.php'); ?>" class="welcome-icon welcome-comments">Gestionar Comentarios</a></li>
                        </ul>
                    </div>
                    <div class="welcome-panel-column">
                        <h3>Recursos</h3>
                        <ul>
                            <li><a href="<?php echo admin_url('edit.php?post_type=descargas'); ?>" class="welcome-icon welcome-add-page">Gestionar Descargas</a></li>
                            <li><a href="<?php echo admin_url('profile.php'); ?>" class="welcome-icon welcome-write-blog">Editar tu Perfil</a></li>
                        </ul>
                    </div>
                    <div class="welcome-panel-column welcome-panel-last">
                        <h3>Estado del Sistema</h3>
                        <ul>
                            <li>
                                <?php
                                $count_posts = wp_count_posts();
                                $count_media = wp_count_attachments();
                                echo '<div class="welcome-icon welcome-learn-more">';
                                echo 'Entradas publicadas: ' . $count_posts->publish . '<br>';
                                echo 'Archivos multimedia: ' . array_sum((array)$count_media);
                                echo '</div>';
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

<?php
/**
 * Plugin Name: Scrollify Snap Scroll by WinstonDev
 * Description: This plugin adds Scrollify functionality for snap scroll between sections with specific classes containing the word "snap".
 * Version: 1.2
 * Author: Winston Porras
 * Author URI: https://winstondev.site
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

function scrollify_snap_enqueue_scripts() {
    // Enqueue Scrollify JS
    wp_enqueue_script('scrollify-js', plugin_dir_url(__FILE__) . 'js/jquery.scrollify.js', array('jquery'), null, true);

    // Custom script to initialize Scrollify
    wp_add_inline_script('scrollify-js', '
        jQuery(document).ready(function($) {
            // Detectar si existen secciones con la clase "snap"
            var snapSections = $("[class*=\'snap\']"); // Busca clases que contengan "snap"

            // Filtrar solo las secciones visibles
            var visibleSections = snapSections.filter(function() {
                return $(this).is(":visible"); // Filtra las secciones visibles
            });

            if (visibleSections.length > 0 && $(window).width() > 768) { // Aplicar solo en pantallas mayores de 768px
                // Inicializamos Scrollify solo si existen secciones visibles con la clase "snap"
                $.scrollify({
                    section: visibleSections, // Pasar solo las secciones visibles
                    scrollSpeed: 900, // Velocidad de scroll en milisegundos
                    setHeights: false, // No ajustar el tamaño de las secciones
                    scrollbars: true, // Mostrar scrollbars si son necesarias
                    updateHash: false, // No actualizar el hash en la URL
                    touchScroll: true, // Permitir scroll táctil en dispositivos móviles
                    before: function(index, sections) {
                        var currentSection = sections[index];

                        // Verificar si la sección está visible antes de hacer scroll
                        if (!$(currentSection).is(":visible")) {
                            return false; // Cancelar el scroll si la sección está oculta
                        }

                        console.log("Scrolling to section:", index); // Log para depuración
                    },
                    after: function(index, sections) {
                        console.log("Arrived at section:", index); // Log para depuración
                    }
                });
            } else {
                // Si no hay secciones con la clase "snap" o estamos en móvil, desactiva el efecto de scrollify
                console.log("No snap sections found or on a small screen, default scrolling enabled.");
            }
        });
    ');
}

// Añadir enlace de soporte en la página de plugins
function scrollify_add_plugin_links($links, $file) {
    if ($file == plugin_basename(__FILE__)) {
        $support_link = '<a href="mailto:winstondev01@gmail.com">Contact Support</a>';
        array_push($links, $support_link);
    }
    return $links;
}

// Hooks para activar el plugin
add_filter('plugin_row_meta', 'scrollify_add_plugin_links', 10, 2);
add_action('wp_enqueue_scripts', 'scrollify_snap_enqueue_scripts');



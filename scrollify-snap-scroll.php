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
           
            var snapSections = $("[class*=\'snap\']"); // all "snap" classes

            // Filtrar solo las secciones visibles
            var visibleSections = snapSections.filter(function() {
                return $(this).is(":visible"); 
            });

            if (visibleSections.length > 0 && $(window).width() > 768) { // apply wide 768px
                
                $.scrollify({
                    section: visibleSections,
                    scrollSpeed: 900, // speed
                    setHeights: false, 
                    scrollbars: true, 
                    updateHash: false, //do not update hash
                    touchScroll: true,
                    before: function(index, sections) {
                        var currentSection = sections[index];

                        
                        if (!$(currentSection).is(":visible")) {
                            return false; 
                        }

                        console.log("Scrolling to section:", index); 
                    },
                    after: function(index, sections) {
                        console.log("Arrived at section:", index); 
                    }
                });
            } else {
                console.log("No snap sections found or on a small screen, default scrolling enabled.");
            }
        });
    ');
}

// support
function scrollify_add_plugin_links($links, $file) {
    if ($file == plugin_basename(__FILE__)) {
        $support_link = '<a href="mailto:winstondev01@gmail.com">Contact Support</a>';
        array_push($links, $support_link);
    }
    return $links;
}

// Hooks
add_filter('plugin_row_meta', 'scrollify_add_plugin_links', 10, 2);
add_action('wp_enqueue_scripts', 'scrollify_snap_enqueue_scripts');



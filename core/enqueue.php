<?php

/**
 * Enqueue
 *
 * Enqueues bootstrap and other assets.
 */
function ps_enqueue_scripts() {
    wp_enqueue_style("bootstrap-css", get_template_directory_uri() . "/assets/css/bootstrap.min.css", array(), "4.4.1");
    wp_enqueue_style("theme-style", get_template_directory_uri() . "/assets/css/theme.css", array("bootstrap-css"), "2.0.48");
    wp_enqueue_style("theme-resp", get_template_directory_uri() . "/assets/css/responsive.css", array("bootstrap-css", "theme-style"), "2.0.45");
    wp_enqueue_style("animate", get_template_directory_uri() . "/assets/css/animate.min.css", array("bootstrap-css", "theme-style"), "1.0.0");

    wp_enqueue_script("bootstrap-js", get_template_directory_uri() . "/assets/js/bootstrap.bundle.min.js", array("jquery"), "4.4.1", true);
    wp_enqueue_script("mixitup-js", get_template_directory_uri() . "/assets/js/mixitup.min.js", array("jquery"), "3.3.1", true);
    wp_enqueue_script("jquery-easing", get_template_directory_uri() . "/assets/js/jquery.easing.1.3.js", array("jquery"), "1", true);
    wp_enqueue_script("drawsvg", get_template_directory_uri() . "/assets/js/jquery.drawsvg.js", array("jquery"), "1", true);
    wp_enqueue_script("slick", get_template_directory_uri() . "/assets/js/slick.min.js", array("jquery"), "1", true);
    wp_enqueue_script("wow", get_template_directory_uri() . "/assets/js/wow.min.js", array("jquery"), "1", true);
    wp_enqueue_script("theme-js", get_template_directory_uri() . "/assets/js/theme.js", array("jquery", "bootstrap-js"), "2.0.47", true);
}

add_action("wp_enqueue_scripts", "ps_enqueue_scripts");

?>

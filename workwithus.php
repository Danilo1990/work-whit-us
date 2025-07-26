<?php
/**
 * Plugin Name:Work With Us
 * Plugin URI: https://danilocalabrese.it/plugins/workwithus
 * Description: The easiest way to manage “Work with Us” ads on your WordPress site..
 * Version: 1.0.0
 * Author: Danilo Calabrese
 * Author URI: https://danilocalabrese.it
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domainn: wwu-plugin
 * Domain Path: /languages
 */

if (!defined('ABSPATH')) {
    exit;
}

// Codice di esempio da eseguire all'attivazione del plugin
function my_custom_plugin_activate() {
    // Qui puoi aggiungere codice per la creazione di tabelle, opzioni, ecc.
}
register_activation_hook(__FILE__, 'my_custom_plugin_activate');

// Includi funzioni WordPress se non già disponibili (per linter/IDE)

if (!function_exists('add_action')) {
    require_once(ABSPATH . 'wp-includes/plugin.php');
}
if (!function_exists('add_menu_page')) {
    require_once(ABSPATH . 'wp-admin/includes/plugin.php');
}
if (!function_exists('plugins_url')) {
    require_once(ABSPATH . 'wp-includes/link-template.php');
}
function my_custom_plugin_deactivate() {
}
register_deactivation_hook(__FILE__, 'my_custom_plugin_deactivate');


// Include file
require_once plugin_dir_path(__FILE__) . 'assets/cpt.php';
require_once plugin_dir_path(__FILE__) . 'assets/metaboxes.php';
require_once plugin_dir_path(__FILE__) . 'elementor/elementor-widgets.php';
require_once plugin_dir_path(__FILE__) . 'admin/admin-dash.php';

// Register admin dash
function wwu_register_admin_menu() {
    add_menu_page(
        'Work With Us',              // Titolo della pagina
        'Work With Us',              // Testo nel menu
        'manage_options',            // Capability
        'wwu-dashboard',             // Slug
        'wwu_render_admin_page',     // Callback funzione
        'dashicons-businessperson',  // Icona (https://developer.wordpress.org/resource/dashicons/)
        25                           // Posizione
    );
    add_submenu_page(
        'wwu-dashboard',
        'Import templates',
        'Import templates',
        'manage_options',
        'wwu-templates',
        'wwu_render_templates_page'
    );
}
add_action('admin_menu', 'wwu_register_admin_menu');

// Includi lo stile frontend del plugin
function my_custom_plugin_enqueue_styles() {
    if (!is_admin()) {
        wp_enqueue_style(
            'my-custom-plugin-style',
            plugin_dir_url(__FILE__) . 'style.css',
            array(),
            '1.0.0'
        );
        wp_enqueue_script(
            'wwu-script',
            plugin_dir_url(__FILE__) . '/js/wwu.js',
            ['jquery'], // <-- Importante: dipendenza
            '1.0',
            true // Caricalo nel footer
        );    
    }
    // Questa parte definisce la variabile JS ajaxurl
    wp_localize_script('wwu-script', 'ajax_wwu', [
        'ajax_url' => admin_url('admin-ajax.php')
    ]);
}
add_action('wp_enqueue_scripts', 'my_custom_plugin_enqueue_styles');

// Includi lo stile nella dashboard wordpress
function admin_style() {
    wp_enqueue_style('admin-styles', plugin_dir_url(__FILE__).'/admin/admin-style.css');
}
add_action('admin_enqueue_scripts', 'admin_style');


